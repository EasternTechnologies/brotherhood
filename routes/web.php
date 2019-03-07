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

Route::post('login', 'Auth\LoginController@login')->name('login.admin');

Auth::routes();

Route::group(['namespace' => 'Forum'], function(){
    Route::get('/', 'HomeController@index')->name('forum.home');
    Route::post('/sendMail', 'HomeController@sendMail')->name('forum.home.mail');
    Route::get('/language', 'HomeController@selectedLanguage');
});


Route::group(['namespace' => 'Forum', 'prefix' => 'project'], function(){
    Route::get('/{id}', 'ProjectController@index')->name('forum.project');
    Route::get('/{id}/loadpost', 'ProjectController@loadPost')->name('forum.project.load_post');
    Route::post('/{id}/newpost', 'ProjectController@newPost')->name('forum.project.new_post');
});

Route::group(['namespace' => 'Forum\Admin',  'prefix' => 'admin',  'middleware' => 'roles',
    'roles' => ['Admin', 'Author']], function (){
    Route::get('/', 'DashboardController@index')->name('admin.dashboard.index');
    Route::get('/autocomplite', 'DashboardController@show');
    Route::resource('forum/categories', 'CategoryController')->names('forum.admin.categories');
});
