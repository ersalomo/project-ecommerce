<?php

namespace App\Http\Livewire\Data;

use Livewire\Component;

use App\Models\Details_Transac;
use Illuminate\Pagination\Paginator;

class DetailTransaction extends Component
{
    public function render()
    {
        Paginator::useBootstrap();
        return view('livewire.data.detail-transaction', [
            "data_transactions" => Details_Transac::paginate(10)
        ]);
    }
}
