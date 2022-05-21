<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    function index()
    {
        // $carts = Cart::get();
        // $carts = Cart::where('user_id', Auth::user()->id);
        return view('home.cart.index-cart');
    }

    function addToCart(Request $request)
    {
        $is_duplicate = Cart::where('product_id', $request->product_id)->first();

        if ($is_duplicate) {
            return back()->with('error', 'The item has been added in your cart');
        } else {
            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
                'qty' => 1
            ]);
        }
        return redirect('home-page/all-cards');
    }
    function updateQty(Request $request, $id)
    {
        Cart::where('id', $id)->update([
            'qty' => $request->quantity
        ]);
        dd("Dd");
        return response()->json([
            'success' => true
        ]);
    }
}
