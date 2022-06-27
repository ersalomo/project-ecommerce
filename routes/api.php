<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Details_Transac;
use App\Http\Livewire\Data\DetailTransaction;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getDetails', function () {
    $dataTransaction = Details_Transac::get();

    return response()->json(
        [
            "status" => 200,
            "data" => $dataTransaction,
        ]
    );
});

Route::get('getDetailsTransaction', function () {

    $dt = Details_Transac::get();
    $dataArr = [];

    foreach ($dt as $data) {
        foreach ($data->getTransactionWithUser as $element)
            array_push($dataArr, $element);
    }
    return response()->json(
        [
            "status" => 200,
            "message" => "success",
            "data" => $dataArr,
        ]
    );
});
Route::get('getDetailsProducts', function () {
    $dt = Details_Transac::get();
    $data =  $dt->getProducts;

    return response()->json(
        [
            "status" => 200,
            "message" => "success",
            "data" => $data,
        ]
    );
});
