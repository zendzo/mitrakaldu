<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'admin'], function(){

	Route::get('/',[
		'as'	=>	'dashboard',
		'uses'	=>	'AdminController@index'
	]);

	Route::resource('pelanggan','PelangganController');

	Route::resource('rumah','RumahController');

	Route::resource('angsuran','AngsuranController');

	Route::group([
		'prefix'=>'master',
		'as'=>'master.'
	], function(){
		Route::resource('perumahan','PerumahanController');
	});

});

Route::group(['prefix'=>'user','as'=>'user.'], function(){

	Route::resource('/profile','UserProfileController',['only' => ['show','update']]);

	Route::resource('documents','UploadDocumentController')	;

	Route::resource('rumah','RumahController',['only' => 'show']);

	Route::get('/booking/{id}',[
		'as'	=>	'booking.rumah',
		'uses'	=>	'BookingController@booking'
	]);
	
});


Route::get('/user/profile/{id}','UserProfileController@show');

Route::view('test', 'documents.upload_form');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
