<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'food';

    protected $fillable = [
        'meal_id', 'food_name', 'protein', 'carbs', 'fat',
    ];

    public function meal()
    {
        return $this->belongsTo('App\Meal');
    }
}
