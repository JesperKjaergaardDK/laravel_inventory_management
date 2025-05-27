<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StorageItemController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('storage', StorageItemController::class);