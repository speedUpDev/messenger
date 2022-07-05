<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name("home");
Route::get('/wall', 'App\Http\Controllers\MessageController@show')->name("wall");
Route::get('/login', function (){
   if(Auth::check()){
       return redirect(route('home'));
   }
   return view('authorize');
})->name('login');
Route::post('/login','\App\Http\Controllers\LoginController@login');
Route::get('/registration', function (){
   if(Auth::check()){
       return redirect(route(('home')));
   }
   return view('register');
})->name('registration');
Route::post('/registration', '\App\Http\Controllers\RegisterController@save');
Route::get('/message', function () {
    return view('message_form');
})->name('message');
Route::post('/message/submit', 'App\Http\Controllers\MessageController@submit')->name('message-post');
Route::get('/logout', function (){
    Auth::logout();
    return redirect(route('home'));
})->name('logout');
Route::get('/delete/{id}', 'App\Http\Controllers\MessageController@delete')->name('message-delete');
