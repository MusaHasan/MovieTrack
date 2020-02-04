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


//usercontroller
Route::get('/user/home', 'UserController@home')->name('userHome');
Route::get('/user/profileid', 'UserController@profileid')->name('profileid');
Route::get('/user/profile', 'UserController@profile')->name('profile.view');

Route::get('/user/profile/edit', 'UserController@profile_edit')->name('profileedit');
Route::post('/user/profile/update', 'UserController@profile_update')->name('profile.update');


Route::get('/user/wishlist', 'WishlistController@wishlist')->name('wishlist');
Route::get('/user/singlePage/{id}', 'SinglePageController@show')->name('SinglePageShow');


Route::get('/user/reviews','ReviewController@show');




