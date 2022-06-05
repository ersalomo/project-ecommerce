<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Cart;
use App\Models\User;
use App\Jobs\CheckOutJob;

class checkOutInsertTransactionController extends Controller
{

    function checkout(Request $request)
    {
        $carts = Cart::where('user_id', Auth::user()->id);

        $user = User::where('email', Auth::user()->email)->first();
        $cardDatas = $carts->get();
        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
        ]);

        foreach ($cardDatas as $card) {
            $transaction->getTransaction()->create([
                'product_id' => $card->product_id,
                'qty'        => $card->qty
            ]);
        }

        $data = array(
            'name' => $user->name,
            'dataPesanan' => $cardDatas
        );
        dispatch(new CheckOutJob($data, $user));

        Cart::where('user_id', Auth::user()->id)->delete();
        session()->flash('success', "We have e-mailed your password reset");
        return redirect(route('home-page'))->with("succes", "Pesanan Anda Berhasil Diproses");
    }
}
