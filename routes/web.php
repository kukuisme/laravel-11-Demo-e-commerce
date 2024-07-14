<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('prouduct','ProuductController');
Route::resource('carts','CartController');
Route::resource('cart_items','CartItemsContrller');