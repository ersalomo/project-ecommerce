<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details_Transac extends Model
{
    use HasFactory;
    protected $guarded = [];

    //menggunakan relation pada table transactions -> get data user
    public function getTransactionWithUser()
    {
        return $this->belongsToMany(Transaction::class, 'transactions', null, null, 'id', 'transaction_id');
    }
    //menggunakan relation pada table products -> get data products
    public  function getProducts()
    {
        return $this->belongsToMany(Product::class, 'details__transacs', 'product_id', 'id');
    }
}
