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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('forum.index');
});



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Forum\Admin',  'prefix' => 'admin',  'middleware' => 'roles',
    'roles' => ['Admin', 'Author']], function (){
    Route::get('/', 'DashboardController@index')->name('admin.dashboard.index');
    Route::resource('forum/categories', 'CategoryController')->names('forum.admin.categories');
});
