<?php

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

use App\Events\UserCreated;
use App\User;

Route::get('/', function () {
    // $user = User::find(1);
    // event(new UserCreated($user));
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
