<?php

use Illuminate\Support\Facades\Route;

Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');
