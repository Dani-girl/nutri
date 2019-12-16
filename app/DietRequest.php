<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DietRequest extends Model
{
    protected $fillable = [
        'client_id', 'nutritionist_id', 'birth_year', 'sex', 'height', 'weight', 'blood_type', 'diet_type', 'physical_activity', 'past_diets_title', 'past_diets_description', 'past_diets_success_rate', 'meals_per_day', 'late_meal_time', 'sweets_consumption', 'alcohol_consumption', 'consuming_everyday'
    ];

    public function client()
	{
	    return $this->belongsTo('App\User');
	}
    public function nutritionist()
    {
        return $this->belongsTo('App\Nutritionist');
    }
    public function weekMealPlan(){
        return $this->hasMany('App\WeekMealPlan');
    }
}
