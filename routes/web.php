<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->name('admin.')->namespace('Admin')->prefix('admin')->group(function ()
{
    Route::get('/', 'HomeController@index')->name('dashboard');

    Route::resource('products', 'ProductController');
    Route::resource('orders', 'OrderController');

});

Route::get("{any?}", function(){
    return view('guest.home');
})->where('any' , '.*');