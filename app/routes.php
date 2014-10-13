<?php

//Ruta per conduir laravel al frontend, on angular s'encarregarà de les rutes que veurà l'usuari
Route::get('/', function()
{
	return View::make('index');
})->before('auth.basic');

//Rutes per mostrar la api
Route::group(array('prefix' => 'api'), function() {

	Route::resource('me', 'UsersController@me');
	Route::resource('subjects', 'SubjectsController');
	Route::resource('shares', 'SharesController');
	Route::resource('topics', 'TopicsController');
	Route::resource('activities', 'ActivitiesController');
	Route::resource('answers', 'AnswersController');
});