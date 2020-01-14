<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyPlan extends Model
{
    protected $fillable = [
    	'week', 'day'
    ];

    public function meal(){
    	return $this->belongsToMany('App\Meal')->withPivot('custom_ingredients');
    }

    public function weekPlan(){
    	return $this->belongsToMany('App\WeekPlan');
    }
}
