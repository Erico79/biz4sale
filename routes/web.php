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

Route::get('/', function () {
    return view('welcome');
});
Route::get('business-listing', 'BusinessListingController@index')
    ->name('upload-business')
    ->middleware('email.verified', 'phone.verified', 'logged.in');
Route::get('email-verification', 'SellerRegistrationController@emailVerification');
Route::get('phone-verification', 'SellerRegistrationController@phoneVerification');

Route::group(['prefix' => 'register'], function (){
    Route::post('seller', 'SellerRegistrationController@store');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categories', 'CategoryController');