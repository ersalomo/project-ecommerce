<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use Illuminate\Support\Facades\Mail;
use App\Models\Cart;
use App\Models\User;


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

        Mail::send('product-send-email', $data, function ($message) use ($user) {
            $message->from("noreply@example.com", "Ersalomo Str");
            $message->to($user->email, $user->name)
                ->subject("Succes to order products ");
        });
        Cart::where('user_id', Auth::user()->id)->delete();
        session()->flash('success', "We have e-mailed your password reset");
        return redirect(route('home-page'));


        // Mail::send('forgot-email-template', $data, function ($message) use ($user) {
        //     $message->from('noreply@example.com', 'Larablog');
        //     $message->to($user->email, $user->name)
        //         ->subject('Reset Passwor');
        // });

        // $this->email = null;
    }
}
