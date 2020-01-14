<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = [
    	'nutritionist_id', 'title', 'meal_type', 'diet_type', 'preparation_time', 'cooking_time', 'instructions', 'original_ingredients', 'calories', 'fat', 'carbs', 'protein'
    ];

    public function nutritionist(){
    	return $this->belongsTo('App\Nutritionist');
    }
    public function dailyPlan(){
        return $this->belongsToMany('App\DailyPlan');
    }
}
