<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class IndexCart extends Component
{
    public $totalPrice;

    public function mount()
    {
        // $carts = Cart::where('user_id', Auth::user()->id)->get();
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
            'livewire.index-cart',
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

    private function getAllCart()
    {
        return Cart::where('user_id', Auth::user()->id)->get();
    }
}



// <button wire:click.prevent="hapus({{ $dt->id }})>Hapus/Edit</button>
