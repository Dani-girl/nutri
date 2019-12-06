<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nutritionist extends Model
{
    protected $fillable = [
        'photo', 'education', 'expertise', 'diploma', 'experience', 'summary', 'user_id'
    ];

    public function user()
	{
	    return $this->belongsTo('App\User');
	}

	public function meal(){
		return $this->hasMany('App\Meal');
	}
}
