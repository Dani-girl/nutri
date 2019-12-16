<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyMealPlan extends Model
{
    $fillable = [
    	'week', 'day', 'breakfast_id', 'lunch_id', 'dinner_id', 'snack1_id', 'snack2_id', 'custom_breakfast_id', 'custom_lunch_id', 'custom_dinner_id', 'custom_snack1_id', 'custom_snack2_id'
    ];

    public function breakfast(){
    	return $this->hasMany('App\Meal');
    }
    public function custom_breakfast(){
    	return $this->hasMany('App\CustomIngredients');
    }
    public function lunch(){
    	return $this->hasMany('App\Meal');
    }
    public function custom_lunch(){
    	return $this->hasMany('App\CustomIngredients');
    }
    public function dinner(){
    	return $this->hasMany('App\Meal');
    }
    public function custom_dinner(){
    	return $this->hasMany('App\CustomIngredients');
    }
    public function snack1(){
    	return $this->hasMany('App\Meal');
    }
    public function custom_snack1(){
    	return $this->hasMany('App\CustomIngredients');
    }
    public function snack2(){
    	return $this->hasMany('App\Meal');
    }
    public function custom_snack2(){
    	return $this->hasMany('App\CustomIngredients');
    }

    public function weekMealPlan(){
        return $this->belongsTo('App\WeekMealPlan');
    }
}
