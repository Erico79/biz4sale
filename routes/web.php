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
})->middleware('');
Route::get('business-listing', 'BusinessListingController@index')
    ->name('upload-business')
    ->middleware('email.verified', 'phone.verified', 'logged.in');
Route::get('email-verification', 'SellerRegistrationController@emailVerification')->middleware('logged.in');
Route::get('resend/verification/email', 'SellerRegistrationController@resendVerificationEmail')->middleware('logged.in');
Route::get('phone-verification', 'SellerRegistrationController@phoneVerification')->middleware('logged.in');
Route::get('resend/verification/sms', 'SellerRegistrationController@resendVerificationSMS')->middleware('logged.in');

Route::group(['prefix' => 'register'], function (){
    Route::post('seller', 'SellerRegistrationController@store');
});
Route::group(['prefix' => 'confirm', 'middleware' => 'logged.in'], function (){
    Route::get('seller/{user_id}', 'SellerRegistrationController@verifyEmail');
    Route::post('phone-verification', 'SellerRegistrationController@verifyPhoneNumber');
});
Route::group(['prefix' => 'seller'], function() {
    Route::post('login', 'SessionsController@login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categories', 'CategoryController');