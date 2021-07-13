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

Route::post('login/submit', 'User\LoginController@login');

Route::group(['middleware' => 'auth:api'], function() { 
	
	Route::get('checkout', 'Api\Cart\CheckoutController@checkout')->name('checkout');
	Route::post('checkout/submit', 'Api\Cart\CheckoutController@proceed')->name('checkout.proceed');
	Route::post('checkout/payment/submit', 'Api\Cart\CheckoutController@updatepayment')->name('checkout.updatepayment');

	Route::get('management/get/countries', 'Api\Management\CountriesController@getList');
	Route::post('management/set/language', 'Api\Management\LanguageController@setLocale');
	Route::post('management/{attraction}/attraction/submit', 'Api\Management\AttractionController@update');
	Route::post('management/{attraction}/upload/submit', 'Api\Management\AttractionController@upload');
	Route::get('management/{attraction}/rates', 'Api\Management\AttractionController@rates');
	Route::post('management/{attraction}/rates/submit', 'Api\Management\AttractionController@storeRates');
	Route::post('management/{attractionRateHeader}/rates/delete/submit', 'Api\Management\AttractionController@deleteRates');
	Route::post('management/{attractionRateHeader}/rates/update/submit', 'Api\Management\AttractionController@updateRates');
	Route::post('management/{attractionRateHeader}/rateDetail/submit', 'Api\Management\AttractionController@storeRateDetails');
	Route::post('management/{attractionRateDetail}/rateDetail/update/submit', 'Api\Management\AttractionController@updateRateDetails');
	Route::post('management/{attractionRateDetail}/rateDetail/delete/submit', 'Api\Management\AttractionController@deleteRateDetails');
	Route::post('management/{attraction}/gallery/upload', 'Api\Management\AttractionController@uploadGallery');
	Route::get('management/attraction/{attraction}/category', 'Api\Management\AttractionCategoryController@getCategoryByAttraction');
	Route::post('management/attraction/{attraction}/category/{category}/map/submit', 'Api\Management\AttractionCategoryController@insertAttractionCategoryMapping');
	Route::post('management/seo/{attraction}/submit', 'Api\Management\AttractionController@seoUpdate');	

	Route::post('management/{attraction}/attraction/delete/submit', 'Api\Management\AttractionController@destroy');	

	Route::get('management/category', 'Api\Management\CategoryController@index');	
	Route::post('management/category/submit', 'Api\Management\CategoryController@store');	
	Route::post('management/category/{category}/status/submit', 'Api\Management\CategoryController@updateStatus');	
	Route::post('management/category/{category}/menu/submit', 'Api\Management\CategoryController@updateMenu');	
	Route::post('management/category/{category}/delete/submit', 'Api\Management\CategoryController@destroy');	
	Route::post('management/category/{category}/update/submit', 'Api\Management\CategoryController@update');	

	Route::get('management/user', 'Api\Management\UserController@index');	
	Route::post('management/user/submit', 'Api\Management\UserController@store');	
	Route::post('management/user/{category}/status/submit', 'Api\Management\UserController@updateStatus');	
	Route::post('management/user/{category}/menu/submit', 'Api\Management\UserController@updateMenu');	
	Route::post('management/user/{category}/delete/submit', 'Api\Management\UserController@destroy');	
	Route::post('management/user/{category}/update/submit', 'Api\Management\UserController@update');
	Route::get('management/{attraction}/upsell', 'Api\Management\AttractionUpSellController@index');	
	Route::post('management/upsell/{attraction}/add/{refid}/submit', 'Api\Management\AttractionUpSellController@store');	

	Route::get('management/{attraction}/related', 'Api\Management\AttractionRelatedController@index');	
	Route::post('management/related/{attraction}/add/{refid}/submit', 'Api\Management\AttractionRelatedController@store');	
	Route::get('management/attraction/{attraction}/gallery', 'Api\Management\AttractionImageController@index');	
	Route::post('management/{attraction}/gallery/{image}/delete/submit', 'Api\Management\AttractionImageController@destroy');	


	Route::get('management/promotion/list', 'Api\Management\PromotionController@index');	
	Route::post('management/promotion/{attraction}/add/submit', 'Api\Management\PromotionController@store');	
	Route::get('management/topattraction/list', 'Api\Management\TopAttractionController@index');	
	Route::post('management/topattraction/{attraction}/add/submit', 'Api\Management\TopAttractionController@store');	

	Route::get('management/campaign', 'Api\Management\CampaignController@index');	
	Route::post('management/campaign/submit', 'Api\Management\CampaignController@store');	
	Route::post('management/campaign/{campaign}/delete/submit', 'Api\Management\CampaignController@destroy');	
	Route::post('management/campaign/{campaign}/update/submit', 'Api\Management\CampaignController@update');	
	Route::post('management/campaign/{campaign}/status/submit', 'Api\Management\CampaignController@updateStatus');	
	Route::post('management/campaign/{campaign}/delete/{option}/submit', 'Api\Management\CampaignController@destroyImg');	
		
	Route::post('management/{cart}/report/attach/submit', 'Api\Management\CartController@uploadFiles');	
	Route::post('/dashboard/attraction/add', 'Management\AttractionController@store')->name('dashboard.attraction.submit');

	Route::get('management/language', 'Api\Management\LanguageController@index');	
	Route::post('management/language/submit', 'Api\Management\LanguageController@store');	
	Route::post('management/language/{country}/status/submit', 'Api\Management\LanguageController@updateStatus');	
	Route::post('management/language/{country}/delete/submit', 'Api\Management\LanguageController@destroy');	
	Route::post('management/language/{country}/update/submit', 'Api\Management\LanguageController@update');	

	Route::get('management/coupon', 'Api\Management\CouponController@index');
	Route::post('management/coupon/{coupon}/delete/submit', 'Api\Management\CouponController@destroy');	
	Route::post('management/coupon/submit', 'Api\Management\CategoryController@store');	
	Route::post('management/coupon/{coupon}/status/submit', 'Api\Management\CategoryController@updateStatus');	
	Route::post('management/coupon/{coupon}/update/submit', 'Api\Management\CategoryController@update');	
});

// Add to Cart
Route::post('cart/add/{attraction}/submit', 'Api\Cart\BasketController@addCart')->name('addtocart');
Route::get('cart/summary', 'Api\Cart\BasketController@summary')->name('cart.summary');
Route::post('cart/item/{cartDetail}/delete', 'Api\Cart\BasketController@deleteDetail')->name('cart.summary.deletedetails');
Route::post('cart/item/{cartDetail}/update', 'Api\Cart\BasketController@updateDetail')->name('cart.summary.updateDetail');

Route::get('cart', 'Api\Cart\BasketController@index')->name('cart');


Route::post('newsletter/submit', 'NewsletterController@subscribe');

