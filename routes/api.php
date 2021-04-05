<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:api'], function() { 
	Route::get('checkout', 'Api\Cart\CheckoutController@checkout')->name('checkout');
	Route::post('checkout/submit', 'Api\Cart\CheckoutController@proceed')->name('checkout.proceed');
	Route::post('checkout/payment/submit', 'Api\Cart\CheckoutController@updatepayment')->name('checkout.updatepayment');
	
});


// Add to Cart
Route::post('cart/add/{attraction}/submit', 'Api\Cart\BasketController@addCart')->name('addtocart');
Route::get('cart/summary', 'Api\Cart\BasketController@summary')->name('cart.summary');

Route::get('cart', 'Api\Cart\BasketController@index')->name('cart');


Route::post('login/submit', 'User\LoginController@login');



