<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class homeController extends Controller
{
    function home(Request $request)
    {
        $products = Product::all();

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
