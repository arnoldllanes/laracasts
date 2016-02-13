<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

	Route::get('/', function () {
	    return view('welcome');
	});

	Route::get('about', 'PagesController@about');

	Route::get('contact', 'PagesController@contact');

//Articles

	// Route::get('articles', 'ArticlesController@index');

	// Route::get('articles/create', 'ArticlesController@create');

	// //capturing anything in this segment of the URI
	// Route::get('articles/{id}', 'ArticlesController@show');

	// Route::post('articles/create', 'ArticlesController@store');

	Route::resource('articles', 'ArticlesController');

//Users

	Route::get('users', 'UserController@getUsers');

	Route::post('users', 'UserController@postUsers');
    
});
