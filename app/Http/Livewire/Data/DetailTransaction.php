<?php

namespace App\Http\Livewire\Data;

use Livewire\Component;

use App\Models\Details_Transac;
use Illuminate\Pagination\Paginator;

class DetailTransaction extends Component
{
    public function render()
    {
        $data_transactions = Details_Transac::paginate(10);
        // $data_transactions = Details_Transac::get();
        $data_transactions->timestamps = false;
        Paginator::useBootstrap();
        return view('livewire.data.detail-transaction', compact('data_transactions'));
    }
}
