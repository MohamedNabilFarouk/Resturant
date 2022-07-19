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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/socialLogin','AuthController@socialLogin');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::namespace("Api")->group(function () {

    Route::get('getProducts', 'ProductController@getProducts');
    Route::get('getCategories', 'ProductController@getCategories');
    Route::get('getProductCategory/{id}', 'ProductController@getProductCategory');
    Route::get('getUserOrders/{id}', 'OrderController@getUserOrders');
    Route::get('getProduct/{id}', 'ProductController@getProduct');
    Route::get('getBranches', 'BranchesController@getBranches');
    Route::get('getUserWishlist/{id}', 'UserController@getUserWishlist');
    Route::post('addUserWishlist', 'UserController@addUserWishlist');
    Route::post('isFav', 'UserController@isFav');

    Route::post('addOrder', 'OrderController@addOrder');
    Route::get('search/{param}', 'ProductController@search');

    Route::get('allPackages', 'PackageController@getpackages');
    Route::post('PackageBooking', 'PackageController@packageBooking');

    Route::get('UserReservation/{user_id}', 'TableReservationController@getUserReservation');
    Route::post('TableReservation', 'TableReservationController@TableReservation');

    Route::get('search', 'UserController@searchProducts');

    Route::post('addMessage','ContactUsController@addmessage');

    Route::post('updatePayment', 'OrderController@updatePayment');
    Route::post('getCopon', 'ProductController@promocode');
    Route::get('getSlider', 'SliderController@getSlider');
    Route::get('getBanner', 'BannerController@getBanner');


    // deliveryBoy

    Route::get('getDeliveryBoy/{id}', 'DeliveryboyController@getDeliveryBoy'); //delivery by data
    Route::get('newRequests/{user_id}', 'DeliveryboyController@newRequests'); //order in request
    Route::get('deliverdRequests/{id}', 'DeliveryboyController@deliverdRequests'); //order done
    Route::get('isActive/{id}', 'DeliveryboyController@isActive'); //check delivery boy status
    Route::post('active', 'DeliveryboyController@active'); //active or in active delivery boy

    Route::post('UpdateOrderStatus', 'DeliveryboyController@UpdateOrderStatus'); //update order status from delivery boy
// region
    Route::get('getRegions', 'DeliveryboyController@getRegions'); //get regions

    // update user data
    Route::post('updateUser', 'UserController@updateUser');

// admin application
Route::get('getOrders', 'OrderController@getOrders');
Route::post('assignOrder', 'OrderController@assignOrder');
Route::get('getbookedPackages', 'PackageController@getbookedPackages');
Route::post('updateBookingStatus', 'PackageController@updateBookingStatus');
Route::get('getbookedTabels', 'TableReservationController@getbookedTabels');
Route::post('confirmBooking', 'TableReservationController@confirmBooking');
Route::get('getActiveDelivery', 'OrderController@getActiveDelivery');
// hotline
Route::get('getSettings', 'UserController@Setting');

// homepage API
Route::get('homePage/{main_cat_id}','MainCategoryController@homePage');

//home api
Route::get('getHome', 'ProductController@getHome');
});
