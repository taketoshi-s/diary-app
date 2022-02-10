<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeightRecord extends Model
{
    public function user()
    {   
        return $this->belongTo('App\User');
    }

}
