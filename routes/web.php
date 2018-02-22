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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('masterFiles', 'MasterFileController');

Route::group(['prefix' => 'admin'], function() {
    Route::get('routes', 'RoutesController@index');
});



//user management
Route::resource('users', 'UserController');
Route::post("/activatedeactivate/{id}",'UserController@actDeact');


Route::resource('roles', 'RoleController');

Route::resource('audits', 'AuditController');
Route::get('getPermissions/{id}','RoutesController@getPermissions');
Route::any('/give-permission/','RoutesController@assignPermissions');


Route::resource('committees', 'CommitteeController');

Route::resource('documentCategories', 'DocumentCategoryController');

Route::resource('sessions', 'SessionController');

Route::resource('committeeMembers', 'CommitteeMemberController');
Route::get('getCommitteeMembers/{id}', 'CommitteeMemberController@getCommitteeMembers');




Route::resource('broadcasts', 'BroadcastController');

Route::resource('documents', 'DocumentController');
Route::any('download', 'DocumentController@fileDownload');

Route::resource('broadcastTypes', 'BroadcastTypeController');

Route::resource('individualMessages', 'IndividualMessageController');

Route::get('/mailable', function () {
//    $invoice = App\Invoice::find(1);
    $user = \App\User::find(1);
    return new App\Mail\UserCredentials($user);
//    return $this->markdown('emails.user.usercredentials');
});

//Route::get('mailable','UserCredentials@build');

Route::resource('plenarySittings', 'PlenarySittingController');

Route::resource('committeeDocuments', 'CommitteeDocumentController');