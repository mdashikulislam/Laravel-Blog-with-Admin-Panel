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
    return view('user.home');
});
Route::get('/post',function (){
    return view('user.post');
});

Route::get('/admins',function (){
    return view('admin.home');
});
Route::get('/admins/post',function (){
    return view('admin.post.create');
});
Route::get('/admins/tag',function (){
    return view('admin.tag.create');
});
Route::get('/admins/category',function (){
    return view('admin.category.create');
});