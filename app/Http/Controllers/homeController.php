<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;


class homeController extends Controller
{
    function home()
    {
        // $products = Product::all();
        $products = Product::paginate(12);
        Paginator::useBootstrap();
        return view('home.catalogue.katalog-product', compact('products'));
    }
    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
