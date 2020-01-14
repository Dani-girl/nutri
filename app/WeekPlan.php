<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeekPlan extends Model
{
    protected $fillable = [
    	'diet_request_id', 'week', 'avoid', 'exercise', 'explanation'
    ];

    public function dietRequest(){
    	return $this->belongsTo('App\DietRequest');
    }

    public function dailyPlan(){
    	return $this->belongsToMany('App\DailyPlan');
    }
}
