<?php

namespace App\Http\Livewire\Data;

use Livewire\Component;
use App\Models\Cart;

class DataCarts extends Component
{
    public function render()
    {
        $carts = Cart::orderBy('user_id', 'asc')->paginate(10);
        return view('livewire.data.data-carts', compact('carts'));
    }
}
