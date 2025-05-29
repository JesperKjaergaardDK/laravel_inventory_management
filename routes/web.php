<?php
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StorageItemController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    if (session()->has('laravel_session')) { 
        dump('inside test');
        return redirect('/storage');
    }
    dump('test');
    return view('login');
})
->name('login');


//Resourves for multiple routes
Route::resource('storage', StorageItemController::class)
->middleware('auth');


//Only uses one route
Route::post('login', LoginController::class)
->middleware('throttle:5, 1')
->name('loginAttempt');


Route::post('logout', function(){
    Auth::guard('web')->logout();

    Session::invalidate();
    Session::regenerateToken();

    return redirect('/');
})->name('logout');