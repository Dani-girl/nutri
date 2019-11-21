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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('waiting-for-approval', function (){
	return view('waiting-for-approval');
});

Route::get('join-our-team', 'NutritionistRequestsController@create');
Route::post('nutritionist-request', 'NutritionistRequestsController@store');