<?php

namespace App\Http\Livewire\Data;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ListProducts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.data.list-products', [
            'products' => Product::orderBy('product_name', 'asc')->paginate(10),

        ]);
        // return view('livewire.countries',[
        //     'continents'=>Continent::orderBy('continent_name','asc')->get(),
        //     'countries'=>Country::orderBy('country_name','asc')->paginate(5)
        // ]);
    }
}
