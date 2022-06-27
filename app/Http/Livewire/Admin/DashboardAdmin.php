<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Cart;
use App\Models\Transaction;

class DashboardAdmin extends Component
{
    // http://tabler-icons.io/#
    public function render()
    {
        return view('livewire.admin.dashboard-admin', [
            'users' => User::all(),
            'carts' => Cart::all(),
            'transactions' => Transaction::all(),
        ]);
        // return view('livewire.countries',[
        //     'continents'=>Continent::orderBy('continent_name','asc')->get(),
        //     'countries'=>Country::orderBy('country_name','asc')->paginate(5)
        // ]);
    }
}
