<?php

use Illuminate\Http\Request;

Route::get('/user','UserAPIController@getUser');

//reset password
Route::Post('/resetPassword','UserAPIController@resetPassword');



Route::get('document_categories','DocumentCategoryAPIController@getCats');
Route::get('docCatsByRoot/{id}','DocumentCategoryAPIController@getCatsByRoot');
Route::get('documents','DocumentAPIController@index');
Route::resource('userMessages','IndividualMessageAPIController');
//Route::get('userNotifications/{id}',"IndividualMessageAPIController@getNotifications");
Route::get('userNotifications',"IndividualMessageAPIController@getNotifications");
Route::get('updateNotification/{id}',"IndividualMessageAPIController@updateNotification");

//get 10 most recent documents in a category
Route::post('getCatDocuments',"IndividualMessageAPIController@getCatDocs");// params:document_category

//get all documents in a category by date
Route::post('getCatDocumentsByDate',"IndividualMessageAPIController@getCatDocByDate");// params:document_category date:format -> Y/m/d
//mark notification as read
Route::post('mark-as-read','IndividualMessageAPIController@markAsRead');//paramss {notification_id: {id}}

Route::get('root-categories','DocumentCategoryAPIController@getRootCategories');


//committee routes
Route::get('committees',"CommitteeAPIController@index");
Route::get('committeeDocCategories',"CommitteeAPIController@committeeDocumentCategories");
Route::post('getCommitteeDocsByCat',"CommitteeAPIController@getCommitteeDocsByCat");
//all unread committee documents
Route::any('allUnreadCommitteeDocs',"CommitteeAPIController@allUnreadCommitteeDocs");
