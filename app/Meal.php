<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = [
        'name', 'user_id',
    ];

    public function foods()
    {
        return $this->hasMany('App\Food');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
