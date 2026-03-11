<?php

namespace App\Providers;

use App\Models\Wishlist;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         Paginator::defaultView('vendor.pagination.custom');
         View::composer('*', function ($view) {
        $wishlistCount = 0;
        if (Auth::check()) {
            $wishlistCount = Wishlist::where('user_id', Auth::id())
                                     ->where('deleted', 0)
                                     ->count();
        }
        $view->with('wishlistCount', $wishlistCount);
    });


    

    View::composer('*', function ($view) {
        // Wishlist count
        $wishlistCount = 0;
        if (Auth::check()) {
            $wishlistCount = \App\Models\Wishlist::where('user_id', Auth::id())
                                                 ->where('deleted', 0)
                                                 ->count();
        }

        // Catégories groupées par section
        $navCategories = \App\Models\Category::where('deleted', 0)
                                              ->where('status', 1)
                                              ->orderBy('section')
                                              ->orderBy('name')
                                              ->get()
                                              ->groupBy('section');

                                              $navCities = \App\Models\Product::where('deleted', 0)
    ->where('status', 1)
    ->whereNotNull('city')
    ->select('city', 'district')
    ->distinct()
    ->orderBy('city')
    ->get()
    ->groupBy('city');

        $view->with('wishlistCount', $wishlistCount);
        $view->with('navCategories', $navCategories);
        $view->with('navCities', $navCities);
    });
    }


    
}
