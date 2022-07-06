<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Cart;
use App\Models\User;
use App\Models\Transaction;
use App\Jobs\CheckOutJob;

class IndexCart extends Component
{
    public $totalPrice;
    public $userEmail;

    public function mount()
    {
        $this->userEmail = Auth::user()->email;
        foreach ($this->getAllCart() as $value) {
            $this->totalPrice += $value->getProducts->price * $value->qty;
        }
        return $this->totalPrice;
        // 'countries'=>Country::orderBy('country_name','asc')->paginate(5);
    }
    public function render()
    {

        $carts = $this->getAllCart();
        return view(
            'livewire/index-cart',
            [
                'carts' => $carts,
                'items' => $carts->count(),
            ]
        );
    }
    function deleteCart($id)
    {
        Cart::findOrFail($id)->delete();
        return back()->with('success', 'item deleted successfully');
    }
    function checkout()
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
        $this->dispatchBrowserEvent('checkOutProduct');
    }

    private function getAllCart()
    {
        return Cart::where('user_id', Auth::user()->id)->get();
    }
}
