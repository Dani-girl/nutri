<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomIngredients extends Model
{
    $fillable = [
    	'meal_id', 'ingredients'
    ];

    public function meal(){
    	return $this->hasMany('App\Meal');
    }
}
