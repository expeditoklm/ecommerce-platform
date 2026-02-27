<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;


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
    // Recherche par UUID au lieu de slug
    $product = Product::with(['images', 'type', 'categories', 'shop'])
        ->where('uuid', $uuid)
        ->where('deleted', 0)
        ->where('status', 1)
        ->firstOrFail();
    
    // Produits similaires (même type ou même catégorie)
    $relatedProducts = Product::with(['images'])
        ->where('deleted', 0)
        ->where('status', 1)
        ->where('id', '!=', $product->id)
        ->where(function($query) use ($product) {
            $query->where('type_id', $product->type_id)
                ->orWhereHas('categories', function($q) use ($product) {
                    $q->whereIn('categories.id', $product->categories->pluck('id'));
                });
        })
        ->limit(5)
        ->get();
    
    return view('shop/shop-single', compact('product', 'relatedProducts'));
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