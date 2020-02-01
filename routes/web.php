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

Route::get('/test', function () {
    return view('test');
});
Route::resource('/event', 'EventController');
Route::resource('/contract', 'ContractController');
Route::get('/contract/search', 'ContractController@autocomplete');



Route::get('/search', 'AutocompleteController@index');
Route::post('/search/fetch', 'AutocompleteController@fetch')->name('autocomplete.fetch');
