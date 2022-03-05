<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
  
    public function characters()
    {   
        return $this->hasMany('App\Models\Character');
    }
   
    public function WeightRecords()
    {   
        return $this->hasMany('App\Models\WeightRecord');  
    }

    public function FoodRecords()
    {   
        return $this->hasMany('App\Models\FoodRecord');  
    }

    public function diaries()
    {   
        return $this->hasMany('App\Models\diaries');  
    }

    public function Frends()
    {   
        return $this->belongstoMany('App\Models\Frends');  
    }

    public function Comments()
    {   
        return $this->belongstoMany('App\Models\Comments');  
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','icon','nickname','age','height','weight','gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
