<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;


class StoreController extends Controller
{

    public function store(){
        return view('store/store');
    }

    public function storeGrid(){
    return view('store/store-grid');
    }

    public function storeSingle(){
        return view('store/store-single');
    }

    public function storeReviews(){
        return view('store/reviews');
    }
    public function storeContact(){
        return view('store/contact');
    }

}