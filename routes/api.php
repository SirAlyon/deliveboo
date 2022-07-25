<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('braintree/token', 'API\BraintreeController@index');
Route::post('braintree/payment', 'API\BraintreeController@makePayment');

Route::post('orders', 'API\OrderController@store');



Route::get('restaurants', function(){
    $restaurants = User::with('types')->paginate(12);
    //dd($restaurants);
    return $restaurants;
});
Route::get('restaurant/{restaurant:id}','API\RestaurantController@show');
Route::get('types', 'API\TypeController@index');
Route::get('orders', 'API\OrderController@index');
