<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getTransaction()
    {
        return $this->hasMany(Details_Transac::class, 'transaction_id', 'id');
    }
    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
