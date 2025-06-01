<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StorageItemController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

//Use Auth::check() to see if remember me token is in the session
Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/storage');
    } else {
        return view('login');
    }
})->name('login');


//Resource for make multiple routes for storage related metods
//Cheks if you are a logged in user before giving you access
Route::resource('storage', StorageItemController::class)
    ->middleware('auth');


//Route for a specific call
Route::post('login', LoginController::class)
    //5 tries before next login in 1min
    ->middleware('throttle:5, 1')
    ->name('loginAttempt');


//Removes login info from the session and creates a new tokem 
// Helps agenst (CSRF) Cross Site Request Forgery
Route::post('logout', function () {

    Auth::logout();
    Session::invalidate();
    Session::regenerateToken();

    return redirect('/');
})->name('logout');
