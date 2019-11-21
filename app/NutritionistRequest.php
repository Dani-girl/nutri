<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NutritionistRequest extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'photo', 'education', 'expertise', 'diploma', 'experience', 'summary'
    ];

    protected $hidden = [
        'password'
    ];
}
