<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;


class PagesController extends Controller
{
    public function pagesAbout(){
    return view('pages/about');
    }
    public function pagesContact(){
        return view('pages/contact');
    }
    public function pagesSignin(){
        return view('pages/signin');
    }
    public function pagesSignup(){
        return view('pages/signup');
    }
     public function pagesForgotPassword(){
        return view('pages/forgot-password');
    }
//   public function pagesForgotPassword(){
//     return redirect()->route('password.request');
// }

}