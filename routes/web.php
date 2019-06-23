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
//User route

Route::group(['namespace'=>'User'],function (){
    Route::get('/','HomeController@index');
    Route::get('/post','PostController@index')->name('user.post');
});


//Admin Route

Route::group(['namespace' => 'Admin','prefix'=>'backend'],function (){

    Route::get('/home','HomeController@index')->name('admin.home');
    //Post Route
    Route::resource('/post','PostController');
    //Tag Route
    Route::resource('/tag','TagController');
    //Category Route
    Route::resource('/category','CategoryController');
    //User Route
    Route::resource('/user','UserController');
});

