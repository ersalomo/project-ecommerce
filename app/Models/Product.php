<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // protected $guarded = [];
    protected $fillable = [
        "category_id",
        "product_name",
        "price",
        "image",
        "description",
        "created_at",
        "updated_at"
    ];

    public function getCategoryName()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
}
