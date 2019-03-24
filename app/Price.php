<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = ['price'];
    // public function membership()
    // {
    //     return $this->belongTo('App\Membership', 'membership_id');
    // }

    public function product()
    {
        return $this->hasOne('App\Product', 'product_id');
    }
    public function membership()
    {
        return $this->hasOne('App\membership', 'membership_id');
    }
}
