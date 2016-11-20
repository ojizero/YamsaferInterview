<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Route::resource('countries', 'CountryController');

//Route::get('/countries', [
//	'uses' => 'CountryController@get_countries',
//	'as'   => 'get-countries'
//]);
//
//Route::get('/hotels-country/{country_id}', [
//	'uses' => 'CountryController@get_hotels',
//	'as'   => 'hotels-country'
//]);
//
//Route::get('/add_countries', [
//	'uses' => 'CountryController@add_countries',
//	'as'   => 'add_countries'
//]);

Route::get('/hotels-city/{city_id}', [
	'uses' => 'CityController@get_hotels',
	'as'   => 'hotels-city'
]);

Route::get('/add_cities', [
	'uses' => 'CityController@add_cities',
	'as'   => 'add_cities'
]);

Route::get('/add_hotels', [
	'uses' => 'HotelController@add_hotels',
	'as'   => 'add_hotels'
]);

Route::get('/cheapest/{country_id}', [
	'uses' => 'HotelController@get_cheapest',
	'as'   => 'cheapest'
]);

Route::get('/add_items', [
	'uses' => 'HotelController@add_items'
]);

Route::get('/search/{query}', [
	'uses' => 'HotelController@search'
]);