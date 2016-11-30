<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware' => ['web']], function() {
	Route::resource('suppliers','SupplierController');  
	Route::resource('doctors','DoctorController');  
	Route::resource('users','UserController');
	Route::resource('roles','RoleController'); 
	Route::resource('permissions','PermissionController');
	Route::get('utilities','UtilitiesController@index')->name('utilities.index');
	Route::post('utilities/backup/{task?}', 'UtilitiesController@backup')->name('utilities.backup');
	Route::post('utilities/cache', 'UtilitiesController@cache')->name('utilities.cache');
	Route::post('utilities', 'UtilitiesController@views')->name('utilities.views');
	Route::post('utilities/rebuild-menu', 'UtilitiesController@rebuildMenu')->name('utilities.rebuildMenu');
	Route::post('utilities/rebuild-category', 'UtilitiesController@rebuildCategory')->name('utilities.rebuildCategory');
	Route::post('utilities/config/{task}', 'UtilitiesController@config')->name('utilities.config');
	Route::get('utilities/logs', 'UtilitiesController@logs')->name('utilities.logs');
});

Route::get('/home', 'HomeController@index');
