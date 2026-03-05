<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ReviewVoteOrSignalment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ShopController extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    public function base(){
        return view('base');
    }

    public function shopWishlist(){
        return view('shop/shop-wishlist');
    }
    public function shopCart(){
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
        'ratingDistribution', 'userVotes'

    ));
}

    public function shopFullwidth(){
        return view('shop/shop-fullwidth');
    }
    

    public function shopCheckout(){
        return view('shop/shop-checkout');
    }


    public function shopSelectProduct(){
        return view('shop/select-product');
    }
    public function shopSelectService(){
        return view('shop/select-product');
    }
    public function shopSelectLocation(){
        return view('shop/select-product');
    }
    public function shopSingleLocation(){
        return view('shop/single-location');
    }
    public function shopSingleService(){
        return view('shop/single-service');
    }

    public function viewAllProducts(){
        return view('shop/view-all-products');
    }
    public function viewAllServices(){
        return view('shop/view-all-services');
    }
    public function viewAllLocations(){
        return view('shop/view-all-locations');
    }
    public function choiceAway(){
        return view('shop/choice-away');
    }
    public function addArticle(){
        return view('shop/add-article');
    }
    public function createAccount(){
        return view('shop/create-account');
    }
    
    
    
}