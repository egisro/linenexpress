<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public function membership()
    {
        return $this->belongTo('App\Membership');
    }

    public function product()
    {
        return $this->belongTo('App\Product');
    }
}
