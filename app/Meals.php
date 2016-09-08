<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meals extends Model
{
    public function meals(){
    	return $this->hasMany();
    }
}
