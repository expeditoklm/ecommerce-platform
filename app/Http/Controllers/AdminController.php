<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
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
        // Récupérer l'utilisateur connecté et son shop
        $user = Auth::user();
        $shopId = null;

        if ($user) {
            if (isset($user->shop_id) && $user->shop_id) {
                $shopId = $user->shop_id;
            } elseif (isset($user->shop) && is_object($user->shop) && isset($user->shop->id)) {
                $shopId = $user->shop->id;
            }
        }

        // Construire la requête de base
        $query = Product::with(['images', 'type', 'categories', 'shop'])
            ->where('deleted', 0);

        // Filtrer par shop si l'utilisateur a un shop
        if ($shopId) {
            $query->where('shop_id', $shopId);
        }

        // Filtres de recherche
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('slug', 'LIKE', "%{$search}%");
            });
        }

        // Filtre par statut
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filtre par type
        if ($request->filled('type_id')) {
            $query->where('type_id', $request->type_id);
        }

        // Filtre par promotion
        if ($request->filled('is_on_sale')) {
            $query->where('is_on_sale', $request->is_on_sale);
        }

        // Tri par défaut (plus récents en premier)
        $query->orderBy('created_at', 'desc');

        // Pagination (15 produits par page)
        $products = $query->paginate(15)->appends($request->query());

        // Récupérer tous les types pour le filtre
        $types = Type::where('deleted', 0)->get();

        return view('admin/products', compact('products', 'types'));
    }








// Ajouter ces méthodes dans AdminController

    /**
     * Supprimer un produit (soft delete)
     */
    public function adminDeleteProduct($id)
    {
        try {
            $product = Product::findOrFail($id);

            // Vérifier que le produit appartient au shop de l'utilisateur
            $user = Auth::user();
            $shopId = $user->shop_id ?? $user->shop->id ?? null;

            if ($shopId && $product->shop_id != $shopId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized action.'
                ], 403);
            }

            // Soft delete
            $product->deleted = 1;
            $product->save();

            return response()->json([
                'success' => true,
                'message' => 'Product deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the product.'
            ], 500);
        }
    }

    /**
     * Changer le statut d'un produit
     */
    public function adminToggleProductStatus($id)
    {
        try {
            $product = Product::findOrFail($id);

            // Vérifier que le produit appartient au shop de l'utilisateur
            $user = Auth::user();
            $shopId = $user->shop_id ?? $user->shop->id ?? null;

            if ($shopId && $product->shop_id != $shopId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized action.'
                ], 403);
            }

            // Toggle status
            $product->status = !$product->status;
            $product->save();

            return response()->json([
                'success' => true,
                'message' => 'Product status updated successfully!',
                'new_status' => $product->status
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating the product status.'
            ], 500);
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
                return response()->json([
                    'success' => false,
                    'message' => 'No products selected.'
                ], 400);
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
                'message' => count($productIds) . ' product(s) deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting products.'
            ], 500);
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

        // Vérifier que le produit appartient au shop de l'utilisateur
        $user = Auth::user();
        $shopId = $user->shop_id ?? $user->shop->id ?? null;

        if ($shopId && $product->shop_id != $shopId) {
            abort(403, 'Unauthorized action.');
        }

        return view('admin/view-product', compact('product'));
    }

    /**
     * Éditer un produit
     */
    public function adminEditProduct($id)
    {
        $product = Product::with(['images', 'categories'])
            ->where('deleted', 0)
            ->findOrFail($id);

        // Vérifier que le produit appartient au shop de l'utilisateur
        $user = Auth::user();
        $shopId = $user->shop_id ?? $user->shop->id ?? null;

        if ($shopId && $product->shop_id != $shopId) {
            abort(403, 'Unauthorized action.');
        }

        $categories = Category::where('deleted', 0)->get();
        $types = Type::where('deleted', 0)->get();

        return view('admin/edit-product', compact('product', 'categories', 'types'));
    }

    /**
     * Mettre à jour un produit
     */
    public function adminUpdateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Vérifier que le produit appartient au shop de l'utilisateur
        $user = Auth::user();
        $shopId = $user->shop_id ?? $user->shop->id ?? null;

        if ($shopId && $product->shop_id != $shopId) {
            abort(403, 'Unauthorized action.');
        }

        // Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'is_on_sale' => 'nullable|boolean',
            'sale_price' => 'nullable|numeric|min:0',
            'sale_end_date' => 'nullable|date',
            'status' => 'required|in:0,1',
            'file_url' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'target_segment' => 'nullable|string',
            'exclusive_discount' => 'nullable|numeric|min:0|max:100',
            'carousel_priority' => 'nullable|integer|min:0',
            'auto_display' => 'nullable|boolean',
            'manual_display' => 'nullable|boolean',
        ]);

        // Générer le slug si le nom a changé
        if ($product->name !== $request->name) {
            $product->slug = Str::slug($request->name);
        }

        // Upload du fichier si nouveau
        if ($request->hasFile('file_url')) {
            // Supprimer l'ancien fichier
            if ($product->file_url && file_exists(public_path($product->file_url))) {
                unlink(public_path($product->file_url));
            }

            $file = $request->file('file_url');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/products/files'), $fileName);
            $product->file_url = 'uploads/products/files/' . $fileName;
        }

        // Mettre à jour le produit
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'type_id' => $request->type_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'is_on_sale' => $request->has('is_on_sale') ? 1 : 0,
            'sale_price' => $request->sale_price,
            'sale_end_date' => $request->sale_end_date,
            'status' => $request->status,
            'target_segment' => $request->target_segment,
            'exclusive_discount' => $request->exclusive_discount,
            'carousel_priority' => $request->carousel_priority ?? 0,
            'auto_display' => $request->has('auto_display') ? 1 : 0,
            'manual_display' => $request->has('manual_display') ? 1 : 0,
        ]);

        // Mettre à jour les catégories
        $product->categories()->sync($request->categories);

        // Upload de nouvelles images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/products/images'), $imageName);

                ProductImage::create([
                    'product_id' => $product->id,
                    'url' => 'uploads/products/images/' . $imageName,
                    'deleted' => 0,
                ]);
            }
        }

        return redirect()->route('admin.products')->with('success', 'Product updated successfully!');
    }




























































































    public function adminServices()
    {
        return view('admin/services');
    }
    public function adminLocations()
    {
        return view('admin/locations');
    }
    public function adminAddProduct()
    {
        $categories = Category::where('deleted', 0)->get();
        $types = Type::where('deleted', 0)->get();

        return view('admin/add-product', compact('categories', 'types'));
    }

    public function adminAddProduct2(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'is_on_sale' => 'nullable|boolean',
            'sale_price' => 'nullable|numeric|min:0',
            'sale_end_date' => 'nullable|date',
            'status' => 'required|in:0,1',
            'file_url' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'target_segment' => 'nullable|string',
            'exclusive_discount' => 'nullable|numeric|min:0|max:100',
            'carousel_priority' => 'nullable|integer|min:0',
            'auto_display' => 'nullable|boolean',
            'manual_display' => 'nullable|boolean',
        ]);

        // Générer le slug
        $slug = Str::slug($request->name);

        // Upload du fichier
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
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'type_id' => $request->type_id,
            'shop_id' => $shopId,
            'price' => $request->price,
            'stock' => $request->stock,
            'is_on_sale' => $request->has('is_on_sale') ? 1 : 0,
            'sale_price' => $request->sale_price,
            'sale_end_date' => $request->sale_end_date,
            'status' => $request->status,
            'file_url' => $fileUrl,
            'target_segment' => $request->target_segment,
            'exclusive_discount' => $request->exclusive_discount,
            'carousel_priority' => $request->carousel_priority ?? 0,
            'auto_display' => $request->has('auto_display') ? 1 : 0,
            'manual_display' => $request->has('manual_display') ? 1 : 0,
            'popularity_score' => 0,
            'deleted' => 0,
        ]);

        // Attacher les catégories au produit (relation many-to-many)
        // Assurez-vous d'avoir une table pivot 'category_product' ou 'product_category'
        $product->categories()->attach($request->categories);

        // Upload des images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/products/images'), $imageName);

                ProductImage::create([
                    'product_id' => $product->id,
                    'url' => 'uploads/products/images/' . $imageName,
                    'deleted' => 0,
                ]);
            }
        }

        return redirect()->route('admin.products')->with('success', 'Produit créé avec succès!');
    }


    public function adminAddService()
    {
        return view('admin/add-service');
    }
    public function adminAddLocation()
    {
        return view('admin/add-location');
    }


    public function adminCategories()
    {
        return view('admin/categories');
    }


    public function adminAddCategory()
    {
        return view('admin/add-category');
    }
    public function adminOrderList()
    {
        return view('admin/order-list');
    }

    public function adminOrderSingle()
    {
        return view('admin/order-single');
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
    public function adminMeOrderList()
    {
        return view('admin/me-order-list');
    }
    public function adminMeOrderSingle()
    {
        return view('admin/me-order-single');
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
