<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodRecord extends Model
{
    public function user()
    {   
        return $this->belongTo('App\User');
    }

}
