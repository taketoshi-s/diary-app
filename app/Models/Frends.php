<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Frends extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'frends', 'user_id', 'friend_id');
    }
}
