<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $with = 'products';

    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'price'
    ];

    public function products()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}