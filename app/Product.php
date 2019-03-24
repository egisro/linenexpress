<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   // protected $table = 'products';

    // protected $fillable = [
    //     'product_name',
    //     'category_id'
    // ];


    /**
     * One Product can have one Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function price()
    {
        return $this->hasMany('App\Price');
    }

    public function membership()
    {
        return $this->belongsToMany('App\Membership');
    }

}
