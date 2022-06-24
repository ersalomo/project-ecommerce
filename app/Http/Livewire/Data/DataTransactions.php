<?php

namespace App\Http\Livewire\Data;

use Livewire\Component;
use App\Models\Transaction;

class DataTransactions extends Component
{
    public function render()
    {

        return view('livewire.data.data-transactions', [
            'transactions' => Transaction::paginate(10)
        ]);
    }
}
