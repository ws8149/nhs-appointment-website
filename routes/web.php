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


//Page routes
Route::get('/', 'PagesController@home');
Route::get('/home', 'PagesController@home')->name('home');
Route::get('/faq', 'PagesController@faq')->name('faq');
Route::get('/tutorial', 'PagesController@tutorial')->name('tutorial');
Route::get('/send', 'EmailTestController@send')->name('send');


//Set up routes for all resources
Route::get('patients/results', 'PatientsController@results')->name('patients.results');
Route::resource('patients','PatientsController');
Route::resource('appointments','AppointmentsController');
Route::resource('hospitals','HospitalsController');
Route::resource('users', 'UsersController');

//Set up routes for authentication
Auth::routes();





