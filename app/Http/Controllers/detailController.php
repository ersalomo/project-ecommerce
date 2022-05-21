<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class detailController extends Controller
{
    function detailProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        return view('home.shop.shop-detail', ['product' => $product]);
    }
}
