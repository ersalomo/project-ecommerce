<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class DashboardAdmin extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard-admin');
        // return view('livewire.countries',[
        //     'continents'=>Continent::orderBy('continent_name','asc')->get(),
        //     'countries'=>Country::orderBy('country_name','asc')->paginate(5)
        // ]);
    }
}
