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

Route::get('nutritionist-requests', 'NutritionistRequestsController@index');
Route::get('join-our-team', 'NutritionistRequestsController@create');
Route::post('nutritionist-requests', 'NutritionistRequestsController@store');
Route::get('nutritionist-requests/{request}', 'NutritionistRequestsController@show');
Route::delete('nutritionist-requests/{request}', 'NutritionistRequestsController@destroy');

Route::get('nutritionists', 'NutritionistsController@index');
Route::post('nutritionists', 'NutritionistsController@store');
Route::get('nutritionists/{nutritionist}', 'NutritionistsController@show');
Route::delete('nutritionists', 'NutritionistsController@destroy');