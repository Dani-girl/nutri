<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;
use App\Nutritionist;

class MealsController extends Controller
{
    public function index(){
    	$meals = Meal::all();
    	return view('pages.nutritionist.meals.index')->with(compact('meals'));
    }

    public function create(){
    	return view('pages.nutritionist.meals.create');
    }

    protected function store(Request $request){
        $meals_fields = collect(['title', 'meal_type', 'diet_type', 'preparation_time', 'cooking_time', 'original_ingredients', 'instructions', 'calories', 'fat', 'carbs', 'protein']);
        $nutritionist = Nutritionist::where('user_id', auth() -> user() -> id)->first();
        
        $meal = new Meal;
        $meal -> nutritionist_id = $nutritionist -> id;
        foreach ($meals_fields as $meals_field) {
            $meal->$meals_field = $request->$meals_field;
        }
        $meal -> save();
        return redirect('meals') -> with('message', 'You added a meal successfully');
    }

    public function show($id){
    	$meal = Meal::find($id);
    	return view('pages.nutritionist.meals.show')->with(compact('meal'));
    }
}
