<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;

class ScoreCard extends Component
{
    public function render()
    {
        return view('livewire.admin.score-card', [
            'products' => Product::all(),
            'carts' => Cart::all(),
        ]);
    }
}
