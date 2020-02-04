<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');


Route::group(['middleware' => 'auth:api'], function(){
//home




	Route::post('details', 'UserController@details');
	Route::post('/review/store','ReviewController@store');
	Route::post('/review/update','ReviewController@update');

	Route::get('/user/wishlistapi', 'WishlistController@wishlistapi')->name('wishlistapi');
	Route::get('/user/allmovieapi', 'ReviewController@allmovieapi')->name('allmovieapi'); //gets user all movie ratings comments
	Route::get('/user/check', 'ReviewController@check')->name('check');


	//singlepage
	Route::get('/singlePage/{id}', 'SinglePageController@showapi')->name('SinglePageShowapi');
	Route::get('/singlePageComments/{id}', 'SinglePageController@commentsapi')->name('SinglePageComments');















});

// Route::get('review/user','ReviewController@show');





