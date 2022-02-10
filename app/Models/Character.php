<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    public function characters()
    {   
        return $this->belongTo('App\User');
    }
}
