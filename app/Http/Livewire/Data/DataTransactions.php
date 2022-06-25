<?php

namespace App\Http\Livewire\Data;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class DataTransactions extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginator = 10;
    public $cari;
    // function mount()
    // {
    //     $this->paginator = ;
    // }
    public function render()
    {

        return view('livewire.data.data-transactions', [
            'transactions' => Transaction::distinct()->paginate($this->paginator)
            // 'transactions' => DB::table('transactions')->select('user_id')->distinct()->paginate(10)//tisak bisa memangil fun getUer
        ]);
        // $items = DB::table('item')->select('item_name')->distinct()->get();
    }
}
