<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/', array(
	'uses' => 'WelcomeController@home',
	'as' => 'home')
);

Route::post('/seach', array(
	'uses' => 'ProductController@search',
	'as' => 'products.search')
);