<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meals extends Model
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

   // public function scopeOfMeal($query,$user_id){
   // 	return $query->where('user_id' , $user_id);

  //  }
}
