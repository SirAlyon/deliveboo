<?php

use App\Mail\OrderSuccess;
use App\Mail\OrderSuccessRestaurant;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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



Route::middleware('auth')->name('admin.')->namespace('Admin')->prefix('admin')->group(function ()
{

    Route::get('/', 'HomeController@index')->name('dashboard');

    Route::resource('products', 'ProductController');
    Route::resource('orders', 'OrderController');

});

Route::get('testmail/{id}',function($id) {
    $order = Order::find($id);
    Mail::to($order->guest_email)->send(new OrderSuccess($order));
    //Fra: pensare ad una relazione migliore per ordine/ristorante
    $restaurant = User::find($order->products()->first()->user_id);
    Mail::to($restaurant->email)->send(new OrderSuccessRestaurant($order));
    return $order;
});

Route::get("{any?}", function(){
    return view('guest.home');
})->where('any' , '.*');

