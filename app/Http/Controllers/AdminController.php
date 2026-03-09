<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Type;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function adminIndex()
    {
        return view('admin/index');
    }


    public function adminProducts(Request $request)
    {
        $user = Auth::user();
        $shopId = null;

        if ($user) {
            if (isset($user->shop_id) && $user->shop_id) {
                $shopId = $user->shop_id;
            } elseif (isset($user->shop) && is_object($user->shop) && isset($user->shop->id)) {
                $shopId = $user->shop->id;
            }
        }

        $query = Product::with(['images', 'type', 'categories', 'shop'])
            ->where('deleted', 0)
            ->where('section', 'product');


        // Filtre section
        if ($request->filled('section')) {
            $query->where('section', $request->section);
        }

        if ($shopId) {
            $query->where('shop_id', $shopId);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('slug', 'LIKE', "%{$search}%")
                    ->orWhere('code', 'LIKE', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('type_id')) {
            $query->where('type_id', $request->type_id);
        }

        if ($request->filled('is_on_sale')) {
            $query->where('is_on_sale', $request->is_on_sale);
        }

        $query->orderBy('created_at', 'desc');

        $products = $query->paginate(15)->appends($request->query());
        $types = Type::where('deleted', 0)->get();

        // Compteurs par section pour les badges des tabs
        $baseQuery = Product::where('deleted', 0);
        $counts = [
            'all'     => (clone $baseQuery)->count(),
            'product' => (clone $baseQuery)->where('section', 'product')->count(),
            'service' => (clone $baseQuery)->where('section', 'service')->count(),
            'rental'  => (clone $baseQuery)->where('section', 'rental')->count(),
        ];

        return view('admin/products', compact('products', 'types', 'counts'));
    }


    /**
     * Afficher le formulaire d'ajout
     */
    public function adminAddProductForm()
    {
        $categories = Category::where('deleted', 0)->get();
        $types = Type::where('deleted', 0)->get();

        return view('admin/add-product', compact('categories', 'types'));
    }

    /**
     * Enregistrer un nouveau produit
     */
    public function adminAddProduct(Request $request)
    {
        $validated = $request->validate(
            [
                'name'               => 'required|string|max:255',
                'type_id'            => 'required|exists:types,id',
                'categories'         => 'required|array|min:1',
                'categories.*'       => 'exists:categories,id',
                'description'        => 'nullable|string',
                'price'              => 'required|numeric|min:0',
                'stock'              => 'required|integer|min:0',
                'city'               => 'required|string|max:100',
                'district'           => 'nullable|string|max:100',
                'is_on_sale'         => 'nullable|boolean',
                'sale_price'         => 'nullable|numeric|min:0',
                'sale_end_date'      => 'nullable|date',
                'status'             => 'required|in:0,1',
                'file_url'           => 'nullable|file|mimes:pdf,doc,docx|max:10240',
                'images'            => 'nullable|array|max:4',
                'images.*'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120|dimensions:min_width=400,min_height=300,ratio=4/3',
                'target_segment'     => 'nullable|string|max:255',
                'exclusive_discount' => 'nullable|numeric|min:0|max:100',
                'carousel_priority'  => 'nullable|integer|min:0|max:100',
                'auto_display'       => 'nullable|boolean',
                'manual_display'     => 'nullable|boolean',
                // Ajouter dans la validation :
                'section'      => 'required|in:product,service,rental',
                'price_7days'  => 'nullable|numeric|min:0',
                'price_30days' => 'nullable|numeric|min:0',
                'label'        => 'nullable|in:new,exchange,none',

            ],
            [
                'images.max' => 'Vous ne pouvez télécharger que 4 images.',
                'images.*.dimensions' => 'Chaque image doit avoir une résolution minimale de 400x300 pixels et un ratio de 4:3.',
            ]
        );

        // Générer un slug unique
        $slug = Str::slug($request->name);
        $slugOriginal = $slug;
        $counter = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $slugOriginal . '-' . $counter++;
        }

        // Générer un code produit unique (ex: PRD-20240304-A1B2)
        $code = 'PRD-' . now()->format('Ymd') . '-' . strtoupper(Str::random(4));
        while (Product::where('code', $code)->exists()) {
            $code = 'PRD-' . now()->format('Ymd') . '-' . strtoupper(Str::random(4));
        }

        // je souhaite que par defaut que le statut de lechange soit "En Echange"
        $exchangeStatus = 'En Echange';


        // Upload du fichier document
        $fileUrl = null;
        if ($request->hasFile('file_url')) {
            $file = $request->file('file_url');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/products/files'), $fileName);
            $fileUrl = 'uploads/products/files/' . $fileName;
        }

        // Déterminer le shop de l'utilisateur connecté
        $user = Auth::user();
        $shopId = 1;
        if ($user) {
            if (isset($user->shop_id) && $user->shop_id) {
                $shopId = $user->shop_id;
            } elseif (isset($user->shop) && is_object($user->shop) && isset($user->shop->id)) {
                $shopId = $user->shop->id;
            }
        }

        // Créer le produit
        $product = Product::create([
            'name'               => $request->name,
            'slug'               => $slug,
            'code'               => $code,
            'condition'          => $request->condition,
            'online_date'        => now()->toDateString(),
            'description'        => $request->description,
            'type_id'            => $request->type_id,
            'shop_id'            => $shopId,
            'price'              => $request->price,
            'stock'              => $request->stock,
            'exchange_status'    => $exchangeStatus,
            'city'               => $request->city,
            'district'           => $request->district,
            'is_on_sale'         => $request->has('is_on_sale') ? 1 : 0,
            'sale_price'         => $request->sale_price,
            'sale_end_date'      => $request->sale_end_date,
            'status'             => $request->status,
            'file_url'           => $fileUrl,
            'target_segment'     => $request->target_segment,
            'exclusive_discount' => $request->exclusive_discount,
            'carousel_priority'  => $request->carousel_priority ?? 0,
            'auto_display'       => $request->has('auto_display') ? 1 : 0,
            'manual_display'     => $request->has('manual_display') ? 1 : 0,
            'popularity_score'   => 0,
            'deleted'            => 0,
            // Ajouter dans Product::create() et $product->update() :
            'section'      => $request->section,
            'price_7days'  => $request->price_7days,
            'price_30days' => $request->price_30days,
            'label'        => $request->label ?? 'new',
        ]);

        // Attacher les catégories
        $product->categories()->attach($request->categories);

        // Upload des images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/products/images'), $imageName);

                ProductImage::create([
                    'product_id' => $product->id,
                    'url'        => 'uploads/products/images/' . $imageName,
                    'deleted'    => 0,
                ]);
            }
        }

        return redirect()->route('admin.products')->with('success', 'Produit créé avec succès !');
    }


    /**
     * Afficher le formulaire d'édition
     */
    public function adminEditProduct($uuid)
    {
        $product = Product::with(['images', 'type', 'categories', 'shop'])
            ->where('deleted', 0)
            ->where('uuid', $uuid)
            ->firstOrFail();

        $user = Auth::user();
        $shopId = $user->shop_id ?? $user->shop->id ?? null;

        if ($shopId && $product->shop_id != $shopId) {
            abort(403, 'Unauthorized action.');
        }

        $categories = Category::where('deleted', 0)->get();
        $types = Type::where('deleted', 0)->get();

        return view('admin/add-product', compact('product', 'categories', 'types'));
    }

    /**
     * Mettre à jour un produit
     */
    public function adminUpdateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $user = Auth::user();
        $shopId = $user->shop_id ?? $user->shop->id ?? null;


        if ($shopId && $product->shop_id != $shopId) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'name'               => 'required|string|max:255',
            'type_id'            => 'required|exists:types,id',
            'categories'         => 'required|array|min:1',
            'categories.*'       => 'exists:categories,id',
            'description'        => 'nullable|string',
            'price'              => 'required|numeric|min:0',
            'stock'              => 'required|integer|min:0',
            'city'               => 'required|string|max:100',
            'district'           => 'nullable|string|max:100',
            'is_on_sale'         => 'nullable|boolean',
            'sale_price'         => 'nullable|numeric|min:0',
            'sale_end_date'      => 'nullable|date',
            'status'             => 'required|in:0,1',
            'file_url'           => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'images.*'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'target_segment'     => 'nullable|string|max:255',
            'exclusive_discount' => 'nullable|numeric|min:0|max:100',
            'carousel_priority'  => 'nullable|integer|min:0|max:100',
            'auto_display'       => 'nullable|boolean',
            'manual_display'     => 'nullable|boolean',
        ]);

        // Régénérer le slug si le nom a changé
        if ($product->name !== $request->name) {
            $slug = Str::slug($request->name);
            $slugOriginal = $slug;
            $counter = 1;
            while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                $slug = $slugOriginal . '-' . $counter++;
            }
            $product->slug = $slug;
        }

        // Upload du fichier si nouveau
        if ($request->hasFile('file_url')) {
            if ($product->file_url && file_exists(public_path($product->file_url))) {
                unlink(public_path($product->file_url));
            }
            $file = $request->file('file_url');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/products/files'), $fileName);
            $product->file_url = 'uploads/products/files/' . $fileName;
        }
        // je souhaite que par defaut que le statut de lechange soit "En Echange"
        $exchangeStatus = 'En Echange';

        // Mettre à jour le produit
        $product->update([
            'name'               => $request->name,
            'description'        => $request->description,
            'type_id'            => $request->type_id,
            'price'              => $request->price,
            'stock'              => $request->stock,
            'exchange_status'    => $exchangeStatus,
            'city'               => $request->city,
            'district'           => $request->district,
            'is_on_sale'         => $request->has('is_on_sale') ? 1 : 0,
            'sale_price'         => $request->sale_price,
            'sale_end_date'      => $request->sale_end_date,
            'status'             => $request->status,
            'target_segment'     => $request->target_segment,
            'exclusive_discount' => $request->exclusive_discount,
            'carousel_priority'  => $request->carousel_priority ?? 0,
            'auto_display'       => $request->has('auto_display') ? 1 : 0,
            'manual_display'     => $request->has('manual_display') ? 1 : 0,
        ]);

        // Pour l'édition — vérifier le total existant + nouvelles
        if (isset($product)) {
            $existingCount = $product->images()->where('deleted', 0)->count();
            $newCount      = $request->hasFile('images') ? count($request->file('images')) : 0;

            if ($existingCount + $newCount > 4) {
                return back()->withErrors([
                    'images' => "Vous avez déjà {$existingCount} image(s). Vous ne pouvez ajouter que " . (4 - $existingCount) . " image(s) supplémentaire(s)."
                ])->withInput();
            }
        }

        // Mettre à jour les catégories
        $product->categories()->sync($request->categories);

        // Upload de nouvelles images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/products/images'), $imageName);

                ProductImage::create([
                    'product_id' => $product->id,
                    'url'        => 'uploads/products/images/' . $imageName,
                    'deleted'    => 0,
                ]);
            }
        }

        return redirect()->route('admin.products')->with('success', 'Produit mis à jour avec succès !');
    }

    public function adminDeleteProductImage($id)
    {
        try {
            $image = ProductImage::findOrFail($id);

            // Supprimer le fichier physique
            if (file_exists(public_path($image->url))) {
                unlink(public_path($image->url));
            }

            // Supprimer en base
            $image->delete();

            return response()->json([
                'success' => true,
                'message' => 'Image supprimée avec succès.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression.'
            ], 500);
        }
    }


    /**
     * Supprimer un produit (soft delete)
     */
    public function adminDeleteProduct($id)
    {
        try {
            $product = Product::findOrFail($id);

            $user = Auth::user();
            $shopId = $user->shop_id ?? $user->shop->id ?? null;

            if ($shopId && $product->shop_id != $shopId) {
                return response()->json(['success' => false, 'message' => 'Unauthorized action.'], 403);
            }

            $product->deleted = 1;
            $product->save();

            return response()->json(['success' => true, 'message' => 'Produit supprimé avec succès !']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Une erreur est survenue.'], 500);
        }
    }

    /**
     * Changer le statut d'un produit
     */
    public function adminToggleProductStatus($id)
    {
        try {
            $product = Product::findOrFail($id);

            $user = Auth::user();
            $shopId = $user->shop_id ?? $user->shop->id ?? null;

            if ($shopId && $product->shop_id != $shopId) {
                return response()->json(['success' => false, 'message' => 'Unauthorized action.'], 403);
            }

            $product->status = !$product->status;
            $product->save();

            return response()->json([
                'success'    => true,
                'message'    => 'Statut mis à jour avec succès !',
                'new_status' => $product->status
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Une erreur est survenue.'], 500);
        }
    }

    /**
     * Supprimer plusieurs produits en masse
     */
    public function adminBulkDeleteProducts(Request $request)
    {
        try {
            $productIds = $request->input('product_ids', []);

            if (empty($productIds)) {
                return response()->json(['success' => false, 'message' => 'Aucun produit sélectionné.'], 400);
            }

            $user = Auth::user();
            $shopId = $user->shop_id ?? $user->shop->id ?? null;

            $query = Product::whereIn('id', $productIds);
            if ($shopId) {
                $query->where('shop_id', $shopId);
            }

            $query->update(['deleted' => 1]);

            return response()->json([
                'success' => true,
                'message' => count($productIds) . ' produit(s) supprimé(s) avec succès !'
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Une erreur est survenue.'], 500);
        }
    }

    /**
     * Voir les détails d'un produit
     */
    public function adminViewProduct($id)
    {
        $product = Product::with(['images', 'type', 'categories', 'shop'])
            ->where('deleted', 0)
            ->findOrFail($id);

        $user = Auth::user();
        $shopId = $user->shop_id ?? $user->shop->id ?? null;

        if ($shopId && $product->shop_id != $shopId) {
            abort(403, 'Unauthorized action.');
        }

        return view('admin/view-product', compact('product'));
    }


    // -------------------------------------------------------------------------
    // Autres méthodes
    // -------------------------------------------------------------------------

    // public function adminServices(Request $request)
    // {
    //     $query = Product::with(['images', 'type', 'categories', 'shop'])
    //         ->where('deleted', 0)
    //         ->where('section', 'service');
    //     // ...
    //     // return view('admin/services', compact('products', 'types'));
    //     return view('admin/services');
    // }

    // public function adminLocations(Request $request)
    // {
    //     $query = Product::with(['images', 'type', 'categories', 'shop'])
    //         ->where('deleted', 0)
    //         ->where('section', 'rental');
    //     // ...
    //     // return view('admin/locations', compact('products', 'types'));
    //     return view('admin/locations');
    // }

    public function adminAddService()
    {
        return view('admin/add-service');
    }

    public function adminAddLocation()
    {
        return view('admin/add-location');
    }

    public function adminCategories(Request $request)
    {
        $query = Category::where('deleted', 0);

        if ($request->filled('section')) {
            $query->where('section', $request->section);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $categories = $query->latest()->paginate(10)->withQueryString();

        $counts = [
            'all'     => Category::where('deleted', 0)->count(),
            'product' => Category::where('deleted', 0)->where('section', 'product')->count(),
            'service' => Category::where('deleted', 0)->where('section', 'service')->count(),
            'rental'  => Category::where('deleted', 0)->where('section', 'rental')->count(),
        ];

        return view('admin/categories', compact('categories', 'counts'));
    }

    public function adminCategoryStore(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'section'     => 'required|in:product,service,rental',
            'description' => 'nullable|string',
            'icon_cat'    => 'nullable|image|mimes:svg,png,jpg|max:1024',
        ]);

        $iconPath = null;
        if ($request->hasFile('icon_cat')) {
            $iconPath = $request->file('icon_cat')->store('assets/images/icons', 'public');
        }

        Category::create([
            'uuid'        => \Illuminate\Support\Str::uuid(),
            'name'        => $request->name,
            'section'     => $request->section,
            'description' => $request->description,
            'icon_cat'    => $iconPath,
            'status'      => 1,
            'deleted'     => 0,
        ]);

        return back()->with('success', 'Catégorie ajoutée avec succès.');
    }

    public function adminCategoryToggleStatus($id)
    {
        $category = Category::findOrFail($id);
        $category->update(['status' => $category->status ? 0 : 1]);

        return response()->json([
            'success' => true,
            'message' => 'Statut mis à jour.',
            'status'  => $category->status,
        ]);
    }

    public function adminCategoryDelete($id)
    {
        $category = Category::findOrFail($id);
        $category->update(['deleted' => 1]);

        return response()->json(['success' => true, 'message' => 'Catégorie supprimée.']);
    }
    public function adminAddCategory()
    {
        return view('admin/add-category');
    }

    public function adminOrderList(Request $request)
    {
        $query = Order::with(['user', 'product.images'])
            ->where('orders.deleted', 0)
            ->where('orders.user_id', '!=', Auth::id());

        if ($request->filled('search')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%');
            })->orWhereHas('product', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('section')) {
            $query->whereHas('product', fn($q) => $q->where('section', $request->section));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // paginate and keep the current query parameters
        $orders = $query->latest()
            ->paginate(15)
            ->appends($request->query());

        $counts = [
            'all'       => Order::where('deleted', 0)->where('orders.user_id', '!=', Auth::id())->count(),
            'pending'   => Order::where('deleted', 0)->where('orders.user_id', '!=', Auth::id())->where('status', 'pending')->count(),
            'accepted'  => Order::where('deleted', 0)->where('orders.user_id', '!=', Auth::id())->where('status', 'accepted')->count(),
            'completed' => Order::where('deleted', 0)->where('orders.user_id', '!=', Auth::id())->where('status', 'completed')->count(),
            'rejected'  => Order::where('deleted', 0)->where('orders.user_id', '!=', Auth::id())->where('status', 'rejected')->count(),
            'cancelled' => Order::where('deleted', 0)->where('orders.user_id', '!=', Auth::id())->where('status', 'cancelled')->count(),
        ];

        return view('admin/order-list', compact('orders', 'counts'));
    }

    public function adminOrderUpdateStatus(Request $request, $uuid)
    {
        $request->validate(['status' => 'required|in:pending,accepted,rejected,completed,cancelled']);

        $order = Order::where('uuid', $uuid)->firstOrFail();
        $order->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Statut mis à jour.',
            'status'  => $request->status,
        ]);
    }

    public function adminOrderDelete($uuid)
    {
        $order = Order::where('uuid', $uuid)->firstOrFail();
        $order->update(['deleted' => 1]);

        return response()->json(['success' => true, 'message' => 'Commande supprimée.']);
    }

    public function adminOrderSingle($uuid)
{
    $order = Order::with([
        'user',
        'owner',
        'product.images',
        'offeredProduct.images',
    ])->where('uuid', $uuid)->firstOrFail();

    return view('admin/order-single', compact('order'));
}

    public function adminOrderSingleLocation()
    {
        return view('admin/order-single-location');
    }

    public function adminVendorGrid()
    {
        return view('admin/vendor-grid');
    }

    public function adminCustomers()
    {
        return view('admin/customers');
    }

    public function adminReviews()
    {
        return view('admin/reviews');
    }

    // public function adminMeOrderList()
    // {
    //     return view('admin/me-order-list');
    // }


      public function adminMeOrderList(Request $request)
    {
        $query = Order::with(['user', 'product.images'])
            ->where('orders.deleted', 0)
            ->where('orders.user_id',  Auth::id());

        if ($request->filled('search')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('firstname', 'like', '%' . $request->search . '%');
            })->orWhereHas('product', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('section')) {
            $query->whereHas('product', fn($q) => $q->where('section', $request->section));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // paginate and keep the current query parameters
        $orders = $query->latest()
            ->paginate(15)
            ->appends($request->query());

        $counts = [
            'all'       => Order::where('deleted', 0)->where('orders.user_id',  Auth::id())->count(),
            'pending'   => Order::where('deleted', 0)->where('orders.user_id',  Auth::id())->where('status', 'pending')->count(),
            'accepted'  => Order::where('deleted', 0)->where('orders.user_id',  Auth::id())->where('status', 'accepted')->count(),
            'completed' => Order::where('deleted', 0)->where('orders.user_id',  Auth::id())->where('status', 'completed')->count(),
            'rejected'  => Order::where('deleted', 0)->where('orders.user_id',  Auth::id())->where('status', 'rejected')->count(),
            'cancelled' => Order::where('deleted', 0)->where('orders.user_id',  Auth::id())->where('status', 'cancelled')->count(),
        ];

        return view('admin/me-order-list', compact('orders', 'counts'));
    }
public function adminMeOrderSingle($uuid)
{
    $order = Order::with([
        'product.images',
        'offeredProduct.images',
        'owner',
    ])->where('uuid', $uuid)
      ->where('user_id', Auth::id()) // sécurité : seulement mes commandes
      ->firstOrFail();

    return view('admin/me-order-single', compact('order'));
}

    public function adminMeOrderSingleLocation()
    {
        return view('admin/order-single-location');
    }

    public function adminBlogSetting()
    {
        return view('admin/setting-blog');
    }

    public function adminAddBlog()
    {
        return view('admin/add-blog');
    }
}
