<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\LogUser;

class cartController extends Controller
{
    function index()
    {
        return view('home.cart.index-cart');
    }

    function addToCart(Request $request)
    {
        $user_id = Auth::user()->id;
        $product_id = $request->product_id;
        $checkRecord = DB::select('SELECT CARTS.PRODUCT_ID, CARTS.USER_ID FROM CARTS WHERE USER_ID =' . $user_id . ' AND PRODUCT_ID = ' . $product_id);
        $isDuplicate = $checkRecord != null;
        if ($isDuplicate) {
            return back()->with('error', 'The item has been added in your cart');
        }
        Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'qty' => 1
        ]);
        $product_name = $request->product_name;
        $name_user    = Auth::user()->name;
        $message = "$name_user menambah $product_name ke cart ";
        LogUser::setMessageLog($message);
        return redirect('home-page/all-cards');
    }
    function updateQty(Request $request, $id)
    {
        Cart::where('id', $id)->update([
            'qty' => $request->quantity
        ]);
        // dd("Dd");
        return response()->json([
            'success' => true
        ]);
    }
}
