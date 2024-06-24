<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Route::apiResource('/products', \App\Http\Controllers\ProductController::class); // bu yapı ile product/{id} vs şeklinde kullanım saglanabilir
Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index']);
