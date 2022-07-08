<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Details_Transac;

class ScoreCard extends Component
{
    public $total;
    public function mount()
    {
        $this->total = $this->totalTransactionProduct();
    }
    public function render()
    {
        return view('livewire.admin.score-card', [
            'products' => Product::all(),
            'carts' => Cart::all(),
            'total' => $this->total
        ]);
    }
    private function totalTransactionProduct()
    {
        $countQtyProduct  = 0;
        $countPriceProduct  = 0;
        $data = Details_Transac::detailTransaction();
        foreach ($data as $dt) {
            $countQtyProduct  += $dt->qty;
            $countPriceProduct  += $dt->price;
        }
        $total = $countPriceProduct * $countQtyProduct;
        return $total;
    }
}
