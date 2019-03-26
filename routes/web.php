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

Route::get('setlocale/{locale}', function ($locale) {

	if (in_array($locale, \Config::get('app.locales'))) {
		Session::put('locale', $locale);
	}
	return redirect()->back();
})->name('change.locale');

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
	Route::get('/projects/project_slug', 'DashboardController@projectSlug');
	Route::get('/{slug}/show', 'UserController@show');
	Route::get('/{slug}/project_cards', 'DashboardController@index');
	Route::get('/projects/{slug}/{publish}/posts', 'PostController@index');
	Route::get('/projects/{slug}/{publish}/editPost', 'PostController@editPost');
	Route::post('/projects/{slug}/{publish}/searchCountry', 'PostController@searchCountry');
	Route::get('/{slug}', function () { return view('forum.admin.layouts.admin');})->where('slug', '[\/\w\.-]*');
	//    Route::get('/', 'DashboardController@index')->name('admin.dashboard.index');
//    Route::get('/autocomplite', 'DashboardController@show');
});
