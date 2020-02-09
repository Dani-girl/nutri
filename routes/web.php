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

//League table
Route::get('league', function(){
	class LeagueTable
	{
	    public function __construct(array $players)
	    {
	        $this->standings = [];
	        foreach($players as $index => $p) {
	            $this->standings[$p] = [
	                'index'        => $index,
	                'games_played' => 0,
	                'score'        => 0,
	                'rank'		   => 0
	            ];
	        }
	    }

	    public function recordResult(string $player, int $score) : void
	    {
	        $this->standings[$player]['games_played']++;
	        $this->standings[$player]['score'] += $score;
	    }

	    public function playerRank(int $rank) : string
	    {
	        return 'something';
	    }
	}

	$table = new LeagueTable(array('Mike', 'Chris', 'Arnold'));
	$table->recordResult('Mike', 2);
	$table->recordResult('Mike', 3);
	$table->recordResult('Arnold', 5);
	$table->recordResult('Chris', 5);
	echo $table->playerRank(1);
});



Route::get('/', function () {
     return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('waiting-for-approval', function (){
	return view('waiting-for-approval');
});

//nutritionist-requests
Route::get('nutritionist-requests', 'NutritionistRequestsController@index')->middleware('checkAdmin');
Route::get('join-our-team', 'NutritionistRequestsController@create');
Route::post('nutritionist-requests', 'NutritionistRequestsController@store');
Route::get('nutritionist-requests/{request}', 'NutritionistRequestsController@show')->middleware('checkAdmin');
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
Route::get('diet-requests', 'DietRequestsController@index')->middleware('checkNutritionist');
Route::get('my-diet-query', 'DietRequestsController@myDietQuery');
Route::get('diet-request/create', 'DietRequestsController@create');
Route::post('diet-request', 'DietRequestsController@store');
Route::get('diet-request', 'DietRequestsController@showMyDietRequest');
Route::get('diet-request/{diet_request}', 'DietRequestsController@show')->middleware('checkNutritionist');
Route::get('my-clients', 'DietRequestsController@myClients');

//meals
Route::get('meals', 'MealsController@index')->middleware('checkNutritionist');
Route::get('meal/create', 'MealsController@create')->middleware('checkNutritionist');
Route::post('meal', 'MealsController@store');
Route::get('meal/{meal}', 'MealsController@show')->middleware('checkNutritionist');
Route::get('my-meals', 'MealsController@myMeals');
Route::get('meals/{meal}/edit', 'MealsController@edit');
Route::put('meals/{meal}', 'MealsController@update');

//week meal plan
Route::get('week-meal-plan/create', 'WeekMealPlansController@create');
Route::post('week-meal-plan', 'WeekMealPlansController@store');
Route::get('my-diet', 'WeekMealPlansController@myDiet');