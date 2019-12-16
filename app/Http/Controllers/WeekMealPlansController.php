<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DietRequest;
use App\Meal;

class WeekMealPlansController extends Controller
{
    public function create(Request $request){
    	$diet_request = DietRequest::find($request->id);
    	$meal_types = collect(['Breakfast', 'Lunch', 'Dinner', 'Snack1', 'Snack2']);
    	$meals = Meal::all();
    	return view('pages.nutritionist.create_weekmp')->with(compact('diet_request', 'meal_types', 'meals'));
    }
}
