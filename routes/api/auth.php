<?php

use Illuminate\Support\Facades\Route;

Route::post('login', 'AuthController@login');
Route::group(['middleware' => 'auth:api'],function(){
    Route::get('logout', 'AuthController@logout');
});

