<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class LogUser extends Model
{
    use HasFactory;
    protected $fillable = ['message', 'created_at', 'updated_at'];

    private static $instance = null;


    public static function setMessageLog(string $message)
    {
        $carbon = new Carbon();
        LogUser::create([
            'message' =>  $message . $carbon->toDayDateTimeString(),
            'created_at' => $carbon->toFormattedDateString(),
            'updated_at' => $carbon->toFormattedDateString(),
        ]);
    }
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new LogUser();
        }
        return self::$instance;
    }
}
