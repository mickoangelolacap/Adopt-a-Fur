<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function(){

	Route::get('/pet/form', 'PetController@viewRescuePetPage');
	Route::post('/pet/form/rescue', 'PetController@rescuePet');
	
	Route::get('/catalog', 'PetController@viewCatalogPage');

	Route::resource('/shelter', 'ShelterController');
	Route::get('/clearshelter', 'ShelterController@clear');
	Route::resource('/orders', 'OrderController');
});

Route::middleware(['admin'])->group(function(){
	Route::get('/pet/list', 'PetController@viewPetList');
	Route::get('/pet/rescue/deny/{petid}/{petname}', 'PetController@denyRescue');
	Route::get('/pet/rescue/approve/{petid}/{petname}', 'PetController@approveRescue');
	Route::get('/pet/adoption/deny/{petid}/{petname}', 'PetController@denyAdoption');
	Route::get('/pet/adoption/approve/{petid}/{petname}', 'PetController@approveAdoption');
	Route::get('/pet/adoption/failed/{petid}/{petname}', 'PetController@failedScreening');
	Route::get('/pet/adoption/passed/{petid}/{petname}', 'PetController@passedScreening');
	Route::get('/pet/remove/{petid}/{petname}', 'PetController@removePet');
	Route::get('/pet/restore/{petid}/{petname}', 'PetController@restorePet');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
