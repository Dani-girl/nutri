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

//nutritionist-requests
Route::get('nutritionist-requests', 'NutritionistRequestsController@index');
Route::get('join-our-team', 'NutritionistRequestsController@create');
Route::post('nutritionist-requests', 'NutritionistRequestsController@store');
Route::get('nutritionist-requests/{request}', 'NutritionistRequestsController@show');
Route::delete('nutritionist-requests/{request}', 'NutritionistRequestsController@destroy');

//nutritionists
Route::get('nutritionists', 'NutritionistsController@index');
Route::post('nutritionists', 'NutritionistsController@store');
Route::get('nutritionists/{nutritionist}', 'NutritionistsController@show');
Route::delete('nutritionists', 'NutritionistsController@destroy');

//clients
Route::get('clients', 'ClientsController@index');
Route::get('clients/{client}', 'ClientsController@show');

//admins

//diet-requests
Route::get('diet-requests', 'DietRequestsController@index');
Route::get('my-diet-query', 'DietRequestsController@myDietQuery');
Route::get('diet-request/create', 'DietRequestsController@create');
Route::post('diet-request', 'DietRequestsController@store');
Route::get('diet-request', 'DietRequestsController@showClient');
Route::get('diet-request/{diet_request}', 'DietRequestsController@show');

//meals
Route::get('meals', 'MealsController@index');
Route::get('meal/create', 'MealsController@create');
Route::post('meal', 'MealsController@store');
Route::get('meal/{meal}', 'MealsController@show');