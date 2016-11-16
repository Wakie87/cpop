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
});


Auth::routes();

Route::get('/home', 'HomeController@index');
