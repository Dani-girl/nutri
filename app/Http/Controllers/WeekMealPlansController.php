<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WeekPlan;
use App\DailyPlan;
// use App\WeekMealPlan;
// use App\DailyMealPlan;
// use App\CustomIngredients;
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

    protected function store(Request $request){
    	$diet_request = DietRequest::find($request->diet_request_id);
    	$diet_request->nutritionist_id = auth()->user()->nutritionist->id;
    	$diet_request->save();
    	$week_plan = new WeekPlan;
        $week_plan->user_id = $diet_request->client_id;
    	$week_plan->diet_request_id = $diet_request->id;
        $week_plan->week = 1;
        $week_plan->avoid = $request->avoid;
        $week_plan->exercise = $request->exercise_plan;
        $week_plan->explanation = $request->explanation;
        $week_plan->save();

        for($i=1; $i<8; $i++){
            $meal_types = collect(['Breakfast', 'Lunch', 'Dinner', 'Snack1', 'Snack2']);
            $daily_plan = new DailyPlan;
            $daily_plan->week = 1;
            $daily_plan->day = $i;
            $daily_plan->save();
            foreach ($meal_types as $meal_type) {
                $meal_id_day = $meal_type.'_id'.$i;
                $custom_ingredients = $meal_type.'_ingredients'.$i;
                if($request->$custom_ingredients == true){
                    $daily_plan->meal()->attach($request->$meal_id_day, ['custom_ingredients' => $request->$custom_ingredients]);
                }else{
                    $daily_plan->meal()->attach($request->$meal_id_day);
                }
            }
            
            $week_plan->dailyPlan()->attach($daily_plan);
        }
        

        return redirect('diet-requests')->with('status', 'Meal plan created successfully!');
    }

    public function myDiet(){
    	$weekPlan = WeekPlan::where('user_id', auth()->user()->id)->first();
    	// $plan = '';
    	// foreach ($week_plans as $week_plan) {
    	// 	if($week_plan->dietRequest->client_id == auth()->user()->id){
    	// 		$plan = $week_plan;
    	// 	}
    	// }
        // dd($weekPlan->dailyPlan());

        //NACIN KOJI RADI
        // foreach ($weekPlan->dailyPlan()->get() as $dailyPlans) {
        //     foreach ($dailyPlans->meal()->get() as $meal) {
        //         dd($meal->title);
        //     }
        // }
    	
    	return view('pages.client.my_diet')->with(compact('weekPlan'));
    }
}
