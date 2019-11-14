<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nutritionist extends Model
{
    protected $fillable = [
        'education', 'expertise', 'user_id'
    ];

    public function user()
	{
	    return $this->belongsTo('App\User');
	}
}
