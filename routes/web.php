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

//home
Route::get('/','HomeController@index');
//auth
Route::get('/login','Auth\LoginController@index');
Route::post('/login','Auth\LoginController@login');
Route::get('/register','Auth\RegisterController@index');
Route::post('/register','Auth\RegisterController@register');
Route::get('/logout', 'Auth\LogoutController@logout');
//others
Route::get('/viewonmaps','HomeController@viewonmaps');
Route::get('/manageaddress','AddressController@index');
Route::get('/addressdetail/{id}','AddressController@getAddressDetail');
Route::delete('/address/destroy/{id}','AddressController@destroy');
Route::put('/address/update/{id}','AddressController@update');
Route::get('/manageuser','UserController@index');
Route::get('/registeraddress','AddressController@registerAddress');
//change language
Route::get('/welcome/{locale}', 'LanguageController@changeLanguage');