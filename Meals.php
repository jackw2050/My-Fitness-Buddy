<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meals extends Model
{

	protected $fillable = [
        'name', 'user_id',
    ];

    public function meal(){
    	return $this->hasMany('Food');
    }


    public function user(){
    	return $this->belongsTo('user', 'name', 'user_id', 'id');
    }

   // public function scopeOfMeal($query,$user_id){
   // 	return $query->where('user_id' , $user_id);

  //  }
}
