<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::post('/','ProuductController@create');
Route::resource('prouduct','ProuductController');