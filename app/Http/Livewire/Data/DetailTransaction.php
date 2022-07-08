<?php

namespace App\Http\Livewire\Data;

use Livewire\Component;

use App\Models\Details_Transac;
use Illuminate\Pagination\Paginator;

class DetailTransaction extends Component
{
    public function render()
    {
        $datas  = Details_Transac::detailTransaction();
        Paginator::useBootstrap();
        return view('livewire.data.detail-transaction', compact('datas'));
    }
}
