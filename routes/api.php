<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(ClientController::class)->group(function(){

    Route::get('/clients', 'index');
    Route::post('/clients', 'store');
    Route::get('/clients/{client}', 'show');
    Route::put('/clients/{client}', 'update');
    Route::delete('/clients/{client}', 'destroy');
    Route::post('clients/{client}/services/{service}', 'attach');
   
}); 

Route::controller(ServiceController::class)->group(function(){

    Route::get('/services', 'index');
    Route::post('/services', 'store');
    Route::get('/services/{service}', 'show');
    Route::put('/services/{service}', 'update');
    Route::delete('/services/{service}', 'delete');

});
