<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories()
    {
        return $this->belongsToMany(Categories::class,
            'category_product',
            'product_id',
            'category_id')->withTimestamps();
    }
}