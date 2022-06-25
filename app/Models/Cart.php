<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];
    // user_id	product_id	qty

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function getProducts()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function getProductsById()
    {
    }
}
