<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $table = 'products';

    protected $fillable = [
        'product_name',
        'price',
        'category_id'
    ];


    /**
     * One Product can have one Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category() {
        return $this->hasOne('App\Category', 'id');
    }

}
