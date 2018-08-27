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

//Home pagina en authenticatie
Route::get('/', 'EventController@index');

Auth::routes();

Route::get('/home', 'EventController@index')->name('home');


//Weergave
Route::get('/events/{id}', 'EventController@show');

Route::get('/events/{id}/invites/{invite}', 'InviteController@show');


//Toevoegen
Route::post('/events/create', 'EventController@store');

Route::post('/events/{id}/invites/create', 'InviteController@store');

Route::post('/events/{id}/feed/create', 'NewsFeedController@store');


//Aanpassen
Route::post('/events/{id}/update', 'EventController@update');

Route::post('/events/{id}/feed/{feed}/update', 'NewsFeedController@update');

Route::post('/events/{id}/invites/{invite}/update', 'InviteController@update');


//Verwijderen
Route::post('/events/{id}/destroy', 'EventController@destroy');

Route::post('/events/{id}/feed/{feed}/destroy', 'NewsFeedController@destroy');

Route::post('/events/{id}/invites/{invite}/destroy', 'InviteController@destroy');













