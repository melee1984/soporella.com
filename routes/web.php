<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

/* Dashboard */
Route::get('/', 'HomeController@index')->name('home');
// Display by Theme Category Type

/* Dashboard */
Route::post('/dashboard/login/submit', 'Management\DashboardController@validateLogin')
	->name('dashboard.login.submit');
Route::get('/dashboard/login', 'Management\DashboardController@login');

// Admin 
Route::group(['middleware' => 'admin'], function() {

	// Main Dashboard 
	Route::get('/dashboard', 'Management\DashboardController@index')->name('dashboard.management.dashboard');
	// Attractions 
	Route::get('/dashboard/attraction', 'Management\AttractionController@index')->name('dashboard.management.attraction');
	Route::get('/dashboard/attraction/{attraction}', 'Management\AttractionController@show')->name('dashboard.management.edit');
	// promotions
	Route::get('/dashboard/promotions', 'Management\PromotionController@index')->name('dashboard.management.promotions');
	// coupoons
	Route::get('/dashboard/coupons', 'Management\CouponsController@index')->name('dashboard.management.coupons');
	// categories
	Route::get('/dashboard/categories', 'Management\CategoryController@index')->name('dashboard.management.categories');
	// campaign
	Route::get('/dashboard/campaign', 'Management\CategoryController@index')->name('dashboard.management.categories');
	// campaign
	Route::get('/dashboard/settings', 'Management\CategoryController@index')->name('dashboard.management.categories');

	// user 
	Route::get('/dashboard/users', 'Management\UsersController@index')->name('dashboard.management.user');
	//. Logout
	Route::get('/data/dashboard/logout', 'Management\DashboardController@logout')
		->name('dashboard.logout');

});


Route::get('/{cagegoryType}', 'HomeController@displayByTheme')->name('home');

