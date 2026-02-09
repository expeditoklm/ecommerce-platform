<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;


class AccountController extends Controller
{

    public function accountOrders(){
    return view('account/orders');
    }

    public function accountAdress(){
    return view('account/address');
    }

    public function accountSettings(){
    return view('account/settings');
    }

    public function accountNotification(){
    return view('account/notification');
    }




}