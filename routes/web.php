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
Route::get("MyProperty","MyPropertyController@index");
Route::get("xx","MyPropertyController@create");
Route::get("yy","MyPropertyController@store");
Route::post("Search","MyPropertyController@show");
Route::post("Crazy","MyPropertyController@edit");
Route::post("Crazy2","MyPropertyController@update");
Route::post("Register","MyPropertyController@destroy");
Route::post("lolo","MyPropertyController@soso");
Route::get("lols","MyPropertyController@lola");
Route::post("out","MyPropertyController@out");
Route::post("MyProperty","MyPropertyController@Nina");
Route::post("updateData","MyPropertyController@updateData");
Route::get("Locations","MyPropertyController@Locations");
Route::post("clicked","MyPropertyController@clicked");
Route::post("share","MyPropertyController@share");
Route::get("Notifications","MyPropertyController@Notifications");
Route::get("experience","MyPropertyController@experience");
Route::get("videos1","MyPropertyController@videos");
Route::get("tryMaps","MyPropertyController@tryMaps");