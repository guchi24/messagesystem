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


Auth::routes();

Route::get('/', 'MessagesController@index')->name('home');
Route::get('/home', 'MessagesController@index')->name('home');
Route::get('/create/{id?}/{subject?}', 'MessagesController@create')->name('create');
Route::post('/send', 'MessagesController@send')->name('send');
Route::get('/sent', 'MessagesController@sent')->name('sent-messages');
Route::get('/read/{id}', 'MessagesController@read')->name('read');
Route::get('/read/sent/{id}', 'MessagesController@readSentItem')->name('read-sent-item');
Route::get('/delete/{id}', 'MessagesController@delete')->name('delete');
Route::get('/deleted', 'MessagesController@deleted')->name('deleted-messages');
Route::get('/return/{id}', 'MessagesController@return')->name('return');
// Route::get('/return/sent/{id}', 'MessagesController@returnSentItem')->name('return-sent-item');
