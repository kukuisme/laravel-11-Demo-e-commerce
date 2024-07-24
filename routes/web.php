<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>'check.dirty'],function(){
   
});
Route::resource('products','ProuductController');
Route::post('signup','AuthController@signup');
Route::post('login','Authcontroller@login');

Route::group(['middleware'=>'auth:api'],function(){
    Route::get('logout','AuthController@logout');
    Route::get('user','AuthController@user');
    Route::post('carts/checkout','CartController@checkout');
    Route::resource('carts','CartController');
    Route::resource('cart-items','CartItemsContrller');
});
