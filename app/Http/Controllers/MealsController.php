<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;
use App\Nutritionist;
use App\Allergy;

class MealsController extends Controller
{
    public function index(){
        //****DINAMICNI UNOS ALERGIJA**** JEDNOM SE IZVRSAVA
        // $allergies = collect(['peanuts', 'eggs', 'gluten', 'fish', 'soya', 'milk', 'tree nuts', 'celery', 'sesame']);
        // foreach ($allergies as $allergy) {
        //     $newA = new Allergy;
        //     $newA->name = $allergy;
        //     $newA->save();
        // }
    	$meals = Meal::all();
        // $mealsarray = collect([
        //     ['title' => 'kupusnik', 'ingredients' => 'kupus glavica, ulje 1tbsp, kore za pitu', 'instructions' => 'iseckati kupus, isprziti kupus i naredjati u kore i ispeci', 'diet_type' => 'vegeterian'], 
        //     ['title' => 'mac n cheese', 'ingredients' => 'makarone 1pakovanje, sira 200g', 'instructions' => 'skuvati makarone, ubaciti sir, ispeci u rerni', 'diet_type' => 'vegan'], 
        //     ['title' => 'peceni krompir i meso', 'ingredients' => 'krompir 500g, svinjsko meso 300g, ulje 2tbsp', 'instructions' => 'ocistiti krompir, iseckati krompir u serpi, dodati meso, ispeci u rerni', 'diet_type' => 'normal']
        // ]);
    	return view('pages.nutritionist.meals.index')->with(compact('meals'));
    }

    public function create(){
    	return view('pages.nutritionist.meals.create');
    }

    protected function store(Request $request){
        $meals_fields = collect(['title', 'meal_type', 'diet_type', 'preparation_time', 'cooking_time', 'original_ingredients', 'instructions', 'calories', 'fat', 'carbs', 'protein']);
        $nutritionist = Nutritionist::find(auth()->user()->nutritionist()->id);
        $meal = new Meal;
        $meal -> nutritionist_id = $nutritionist -> id;
        foreach ($meals_fields as $meals_field) {
            $meal->$meals_field = $request->$meals_field;
        }
        $meal -> save();
        return redirect('meals') -> with('message', 'You added a meal successfully');
    }

    protected function update(Request $request){
        $meals_fields = collect(['title', 'meal_type', 'diet_type', 'preparation_time', 'cooking_time', 'original_ingredients', 'instructions', 'calories', 'fat', 'carbs', 'protein']);
        $meal = Meal::find($request->meal_id);
        foreach ($meals_fields as $meals_field) {
            $meal->$meals_field = $request->$meals_field;
        }
        $meal -> save();
        return redirect('meals') -> with('status', 'You edited a meal successfully');
    }

    public function show($id){
    	$meal = Meal::find($id);
    	return view('pages.nutritionist.meals.show')->with(compact('meal'));
    }

    public function myMeals(){
        $meals = Meal::where('nutritionist_id', auth()->user()->nutritionist->id)->get();
        return view('pages.nutritionist.meals.index')->with(compact('meals'));
    }

    protected function edit($id){
        $meal = Meal::find($id);
        return view('pages.nutritionist.meals.edit')->with(compact('meal'));
    }
}
