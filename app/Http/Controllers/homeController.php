<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use App\Models\LogUser;


class homeController extends Controller
{
    function home()
    {
        // $products = Product::all();
        $products = Product::paginate(8);
        Paginator::useBootstrap();
        return view('home.catalogue.katalog-product', compact('products'));
    }
    function logout(Request $request)
    {
        $name_user = Auth::user()->name;
        Auth::logout();
        $message = "$name_user melakukan logout ";
        LogUser::setMessageLog($message);
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
