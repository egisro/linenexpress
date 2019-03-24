<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{

    public function client()
    {
        return $this->hasMany('App\Client');
    }

    public function price()
    {
        return $this->hasMany('App\Price');
    }

    public function product()
    {
        return $this->belongsToMany('App\Product');
    }
}
