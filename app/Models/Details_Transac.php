<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Details_Transac extends Model
{
    use HasFactory;
    protected $guarded = [];
    // public $timestamps = false;

    //menggunakan relation pada table transactions -> get data user
    public function getTransactionWithUser()
    {
        return $this->belongsToMany(Transaction::class, 'details__transacs', 'transaction_id', 'id');
        //->using(User::class); //->withPivot('transaction_id');
    }
    //menggunakan relation pada table products -> get data products
    public  function getProducts()
    {
        return $this->belongsToMany(Product::class, 'details__transacs', 'product_id', 'id'); //->withPivot('product_id');
    }
    // relation inner join
    public static function detailTransaction()
    {
        $hasil = DB::select('SELECT transactions.user_id,
                                    (select users.name from users where users.id = user_id) as nama_user,
                                    products.product_name,
                                    products.price,
                                    details__transacs.qty,
                                    details__transacs.created_at
                            from details__transacs inner join transactions
                            on details__transacs.transaction_id = transactions.id
                            inner join products
                            on details__transacs.product_id = products.id;');
        return $hasil;
    }
    public function getNameUser($id)
    {
        $hasil = DB::select('SELECT USERS.NAME FROM USERS WHERE USERS.ID = ' . $id);
        return $hasil;
    }
}
