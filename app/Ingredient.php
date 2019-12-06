<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
    	'name', 'allergen'
    ];

    public function meals()
    {
        return $this->belongsToMany('App\Meal');
    }
}
