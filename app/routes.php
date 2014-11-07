<?php

//Ruta per conduir laravel al frontend, on angular s'encarregarà de les rutes que veurà l'usuari
Route::get('/', function()
{
	return View::make('index');
});

//Rutes per mostrar la api
Route::group(array('prefix' => 'api'), function() {

	Route::get('users/me', 'UsersController@me');
	Route::get('logout', 'SessionsController@destroy');
	Route::resource('sessions', 'SessionsController');
	Route::resource('users', 'UsersController');
	Route::resource('subjects', 'SubjectsController');
	Route::resource('shares', 'SharesController');
	Route::resource('topics', 'TopicsController');
	Route::resource('activities', 'ActivitiesController');
	Route::resource('answers', 'AnswersController');
	Route::resource('famouses', 'FamousesController');
	Route::get('famouses/{famouses}/tweets', 'FamousesController@tweets');
	Route::resource('articles', 'ArticlesController');
	Route::resource('reddits', 'RedditsController');
});