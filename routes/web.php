<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();



Route::get('/', 'FrontController@index');


Route::get('search/{id}', 'FrontController@search');

Route::get('doctor-profile/{id}', 'FrontController@doctor');

Route::group(['middleware' => 'auth'], function(){

	Route::get('home', 'HomeController@index');


	// Doctors

	Route::resource('admin', 'DoctorsController');


	// Hospital
	
	Route::resource('hospitals', 'HospitalController');


	// Education

	Route::resource('education', 'EducationController');


	// Specialty

	Route::resource('specialties', 'SpecialtyController');


	// Location
	
	Route::resource('location', 'LocationController');

});

Route::get('something', 'DoctorsController@something');

Route::get('download/{id}', 'FrontController@download');	

Route::get('result', 'SearchController@getResults');