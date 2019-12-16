<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeekMealPlan extends Model
{
    $fillable = [
    	'diet_request_id', 'week', 'day1_id', 'day2_id', 'day3_id', 'day4_id', 'day5_id', 'day6_id', 'day7_id', 'avoid', 'exercise_plan', 'explanation'
    ];

    public function dietRequest(){
    	return $this->belongsTo('App\DietRequest');
    }

    public function day1(){
    	return $this->hasMany('App\DailyMealPlan');
    }
    public function day2(){
    	return $this->hasMany('App\DailyMealPlan');
    }
    public function day3(){
    	return $this->hasMany('App\DailyMealPlan');
    }
    public function day4(){
    	return $this->hasMany('App\DailyMealPlan');
    }
    public function day5(){
    	return $this->hasMany('App\DailyMealPlan');
    }
    public function day6(){
    	return $this->hasMany('App\DailyMealPlan');
    }
    public function day7(){
    	return $this->hasMany('App\DailyMealPlan');
    }
}
