<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'HomeController@index');
//Route::get('login', 'AuthController@postLogin');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

	Route::group(['middleware' => 'auth'], function () {
   	Route::post('apply/upload', 'CancionController@store');
    Route::resource('artistas', 'ArtistaController');
	Route::resource('canciones', 'CancionController');
	Route::get('canciones/{id}/agregarLista', 'CancionController@agregarLista');
    
});

    



  