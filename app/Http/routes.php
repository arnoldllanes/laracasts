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

	Route::auth();

    Route::get('/home', 'HomeController@index');

	Route::controllers([

		'auth'	=> 'Auth\AuthController',
		'password'	=> 'Auth\PasswordController',
	
	]);


	Route::get('/', function () {
	    return view('welcome');
	});

	Route::get('about', 'PagesController@about');

	Route::get('contact', 'PagesController@contact');

//Articles CRUD

	Route::resource('articles', 'ArticlesController');

//Users CRUD

	Route::resource('users', 'UserController');

});
