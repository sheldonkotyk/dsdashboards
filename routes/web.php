<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::view('/dashboard-hor', 'dashboard-hor')->name('dashboard-hor');
