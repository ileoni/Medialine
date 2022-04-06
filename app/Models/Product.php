<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $with = ['images'];

    protected $fillable = [
        'name', 'description', 'price', 'amount'
    ];

    public function images()
    {
        return $this->hasMany('App\Models\Image', 'product_id', 'id');
    }
}