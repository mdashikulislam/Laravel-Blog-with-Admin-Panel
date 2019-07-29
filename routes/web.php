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

Route::get('/home', 'HomeController@index')->name('home');

//User route
Route::group(['namespace' => 'User'], function () {
    Route::get('/', 'HomeController@index')->name('user.home');
    Route::get('/post/{post?}', 'PostController@index')->name('user.post');
    Route::get('/post/tag/{tag}', 'HomeController@tag')->name('tag');
    Route::get('/post/category/{category}', 'HomeController@category')->name('category');

    //Vue Route

    Route::post('/getPost','PostController@getAllPost');
});


//Admin Route

Route::group(['namespace' => 'Admin', 'prefix' => 'backend'], function () {
    Route::get('/','HomeController@index')->middleware('auth:admin');
    Route::get('/home', 'HomeController@index')->name('admin.home')->middleware('auth:admin');
    //Post Route
    Route::resource('/post', 'PostController')->middleware('auth:admin');
    //Tag Route
    Route::resource('/tag', 'TagController')->middleware('auth:admin');
    //Category Route
    Route::resource('/category', 'CategoryController')->middleware('auth:admin');
    //User Route
    Route::resource('/user', 'UserController')->middleware('auth:admin');

    //Role Route
    Route::resource('/role','RoleController')->middleware('auth:admin');

    //Permission Route
    Route::resource('/permission','PermissionController')->middleware('auth:admin');
    //Admin Login
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('admin.logout');

});
Route::get('users',function (){
    return Auth::user()->name;
})->middleware('auth:admin');
//Route::get('/tst',function (){
//    return "as";
//})->middleware('auth:admin');
