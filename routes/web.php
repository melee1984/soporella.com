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

Route::get('/product/image', 'ImageController@product')->name('product.image');

Route::get('/lang/{locale}', function($locale) {
	session()->put('locale', $locale);
	return redirect()->back();
});

Auth::routes();

/* Dashboard */
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about-us', 'PageController@aboutus')->name('aboutus');
Route::get('/sell-tickets-with-us', 'PageController@sellticketwithus')->name('sellticketwithus');
Route::get('/disclaimer', 'PageController@disclaimer')->name('disclaimer');
Route::get('/terms-and-condition', 'PageController@termsandconditions')->name('termsandconditions');
Route::get('/privacy-policy', 'PageController@primvacypolicy')->name('primvacypolicy');
Route::get('/shipping-and-return-policy', 'PageController@shippingandreturnpolicy')->name('shippingandreturnpolicy');
Route::get('/contact-us', 'PageController@contactus')->name('contactus');
Route::get('/sitemap', 'PageController@sitemap')->name('sitemap');

Route::get('/promotions', 'PromotionsController@index')->name('promotions');
Route::get('/shopping-cart/basket', 'Shopping\CartController@index')->name('shopping.basket');
Route::get('/logout', 'User\LoginController@userlogout')->name('user.logout');

// Display by Theme Category Type

/* Dashboard */
Route::post('/dashboard/login/submit', 'Management\DashboardController@validateLogin')
	->name('dashboard.login.submit');
Route::get('/dashboard/login', 'Management\DashboardController@login');

// Diriah nako display sa iyaha Ticket s
// 
Route::group(['middleware' => 'auth'], function() {

	Route::get('/checkout', 'Shopping\CheckoutController@checkout')->name('checkout');
	Route::get('/checkout/success', 'Shopping\CheckoutController@success')->name('checkout.success');
	// Route::get('/checkout', 'Shopping\CheckoutController@checkout')->name('checkout.failed');

	Route::get('/myaccount', 'User\ProfileController@profile')->name('profile.dashboard');
	Route::get('/myaccount/tickets', 'User\ProfileController@tickets')->name('profile.tickets');
	Route::get('/myaccount/information', 'User\ProfileController@tickets')->name('profile.information');
	Route::get('/myaccount/personal-information', 'User\ProfileController@tickets')->name('profile.personal-information');
	Route::get('/myaccount/billing-information', 'User\ProfileController@tickets')->name('profile.billing-information');

});

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

Route::get('promotion/{attraction:slug}', 'AttractionController@inside')->name('page.promotion');
Route::get('visit/{attraction:slug}', 'AttractionController@inside')->name('page.visit');
Route::get('top/{attraction:slug}', 'AttractionController@inside')->name('page.top');
Route::get('attraction/{attraction:slug}', 'AttractionController@inside')->name('page.attraction.view');
Route::get('{category:slug}/{attraction:slug}', 'AttractionController@show')->name('page.attraction');
Route::get('{category:slug}', 'CategoryController@index')->name('page.category');

