<?php

//Ruta per conduir laravel al frontend, on angular s'encarregarà de les rutes que veurà l'usuari
Route::get('/', function()
{
	return View::make('index');
});

//Rutes per mostrar la api
Route::group(array('prefix' => 'api'), function() {

	Route::resource('subjects', 'SubjectsController');
});