<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ReviewVoteOrSignalment;
use App\Models\Shop;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ShopController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function base()
    {
        return view('base');
    }

    public function shopWishlist()
{
    $wishlists = Wishlist::with(['product.images', 'product.categories', 'product.shop'])
        ->where('user_id', FacadesAuth::id())
        ->where('deleted', 0)
        ->latest()
        ->paginate(10);

    return view('shop.shop-wishlist', compact('wishlists'));
}
    public function shopCart()
    {
        return view('shop/shop-cart');
    }
    // Dans ShopController.php
    public function shopSingle($uuid)
    {
        // Dans shopSingle()
        $sortParam = request('sort', 'top');
        $product = Product::with(['images', 'type', 'categories', 'shop'])
            ->where('uuid', $uuid)
            ->where('deleted', 0)
            ->where('status', 1)
            ->firstOrFail();

        // Reviews avec user et images
        $reviewsQuery  = $product->reviews()
            ->with(['user', 'images'])
            ->where('deleted', 0);


        // Calcul note moyenne
        $averageRating = $product->reviews()
            ->where('deleted', 0)
            ->avg('rating') ?? 0;

        // Calcul total reviews
        $reviewsCount = $product->reviews()
            ->where('deleted', 0)
            ->count();

        // Distribution par étoiles
        $ratingDistribution = [];
        for ($i = 5; $i >= 1; $i--) {
            $count = $product->reviews()
                ->where('deleted', 0)
                ->where('rating', $i)
                ->count();
            $ratingDistribution[$i] = [
                'count'      => $count,
                'percentage' => $reviewsCount > 0
                    ? round(($count / $reviewsCount) * 100)
                    : 0,
            ];
        }

        // Produits similaires
        $relatedProducts = Product::with(['images'])
            ->where('deleted', 0)
            ->where('status', 1)
            ->where('id', '!=', $product->id)
            ->where(function ($query) use ($product) {
                $query->where('type_id', $product->type_id)
                    ->orWhereHas('categories', function ($q) use ($product) {
                        $q->whereIn('categories.id', $product->categories->pluck('id'));
                    });
            })
            ->limit(5)
            ->get();


        $userVotes = [];
        if (FacadesAuth::check()) {
            $userVotes = ReviewVoteOrSignalment::where('user_id', FacadesAuth::id())
                ->where('type', 'LIKE')
                ->where('deleted', 0)
                ->pluck('review_id')
                ->toArray();
        }


        // Appliquer le tri
        switch ($sortParam) {
            case 'recent':
                $reviewsQuery->latest();
                break;
            case 'oldest':
                $reviewsQuery->oldest();
                break;
            case 'best':
                $reviewsQuery->orderBy('rating', 'desc');
                break;
            case 'worst':
                $reviewsQuery->orderBy('rating', 'asc');
                break;
            case 'helpful':
                $reviewsQuery->orderBy('likes_count', 'desc');
                break;
            case 'top':
            default:
                // Top = meilleure note + plus utile
                $reviewsQuery->orderBy('rating', 'desc')
                    ->orderBy('likes_count', 'desc');
                break;
        }

        $reviews = $reviewsQuery->paginate(5)->withQueryString();

        return view('shop/shop-single', compact(
            'product',
            'relatedProducts',
            'reviews',
            'averageRating',
            'reviewsCount',
            'ratingDistribution',
            'userVotes'

        ));
    }

    public function shopFullwidth()
    {
        return view('shop/shop-fullwidth');
    }


    public function shopCheckout()
    {
        return view('shop/shop-checkout');
    }


    public function shopSelectProduct()
    {
        return view('shop/select-product');
    }
    public function shopSelectService()
    {
        return view('shop/select-product');
    }
    public function shopSelectLocation()
    {
        return view('shop/select-product');
    }
    public function shopSingleLocation()
    {
        return view('shop/single-location');
    }
    public function shopSingleService()
    {
        return view('shop/single-service');
    }

    public function viewAllProducts()
    {
        return view('shop/view-all-products');
    }
    public function viewAllServices()
    {
        return view('shop/view-all-services');
    }
    public function viewAllLocations()
    {
        return view('shop/view-all-locations');
    }
    public function choiceAway()
    {
        return view('shop/choice-away');
    }
    public function addArticle()
    {
        return view('shop/add-article');
    }
    public function createAccount()
    {
        return view('shop/create-account');
    }












private function getShopData(string $uuid): array
{
    $shop = Shop::with('mainCategory')
        ->where('shops.uuid', $uuid)
        ->where('shops.is_active', 1)
        ->where('shops.deleted', 0)
        ->firstOrFail();

    $shopCategories = Category::whereHas('products', function ($q) use ($shop) {
            $q->where('products.shop_id', $shop->id)
              ->where('products.deleted', 0)
              ->where('products.status', 1)
              ->where('category_product.deleted', 0); // ← pivot aussi qualifié
        })
        ->where('categories.deleted', 0)
        ->where('categories.status', 1)
        ->get();

    return compact('shop', 'shopCategories');
}
    // Utilisation dans chaque méthode
 

    public function storeReviews(Request $request, string $uuid)
    {
        $data = $this->getShopData($uuid);
        // ... reste de la logique
        return view('store.reviews', array_merge($data, compact('reviews')));
    }

    public function storeContact(string $uuid)
    {
        $data = $this->getShopData($uuid);
        return view('store.contact', $data);
    }


    public function storeSingle(Request $request, string $uuid)
{
    $data = $this->getShopData($uuid);  // ← fournit $shop et $shopCategories
    $shop = $data['shop'];

    $sortParam = $request->get('sort', 'top');

    $productsQuery = Product::with(['images', 'type', 'categories'])
        ->where('shop_id', $shop->id)
        ->where('deleted', 0)
        ->where('status', 1);

    if ($request->filled('category')) {
        $productsQuery->whereHas('categories', function ($q) use ($request) {
            $q->where('categories.id', $request->category);
        });
    }

    if ($request->filled('search')) {
        $productsQuery->where('name', 'like', '%' . $request->search . '%');
    }

    $wishlistedIds = FacadesAuth::check()
    ? Wishlist::where('user_id', FacadesAuth::id())
              ->where('deleted', 0)
              ->pluck('product_id')
              ->toArray()
    : [];


    $products = $productsQuery->paginate(12)->appends(request()->query());

    return view('store.store-single', array_merge($data, compact('products', 'sortParam', 'wishlistedIds')));
}


public function toggleWishlist(string $uuid)
{
    $product = Product::where('uuid', $uuid)->where('deleted', 0)->firstOrFail();
    $userId  = Auth::id();

    $existing = Wishlist::where('user_id', $userId)
                        ->where('product_id', $product->id)
                        ->where('deleted', 0)
                        ->first();

    if ($existing) {
        $existing->update(['deleted' => 1]);

        // Si requête AJAX → JSON, sinon redirect
        if (request()->expectsJson()) {
            return response()->json(['wishlisted' => false]);
        }
        return redirect()->route('shop.wishlist')
                         ->with('success', 'Produit retiré de la wishlist.');
    }

    Wishlist::create([
        'uuid'       => \Illuminate\Support\Str::uuid(),
        'user_id'    => $userId,
        'product_id' => $product->id,
        'deleted'    => 0,
    ]);

    if (request()->expectsJson()) {
        return response()->json(['wishlisted' => true]);
    }
    return back()->with('success', 'Ajouté à la wishlist.');
}

}
