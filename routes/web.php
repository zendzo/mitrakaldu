<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'admin'], function(){

	Route::get('/',[
		'as'	=>	'dashboard',
		'uses'	=>	'AdminController@index'
	]);

});

Route::group(['prefix'=>'user','as'=>'user.'], function(){

	Route::resource('/profile','UserProfileController',['only' => ['show','update']]);

	
});


Route::get('/user/profile/{id}','UserProfileController@show');

Route::view('test', 'test.page');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');