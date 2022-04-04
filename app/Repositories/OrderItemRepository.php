<?php

namespace App\Repositories;

use App\Models\OrderItem;

class OrderItemRepository implements OrderItemRepositoryInterface
{
    private $eloquent;
    public function __construct(OrderItem $eloquent) {
        $this->eloquent = $eloquent;
    }

    public function list()
    {
        $orderItem = $this->eloquent->all();
        return $orderItem;
    } 

    public function store()
    {
        $orderItem = $this->eloquent;
        $orderItem->order_id = request('order_id');
        $orderItem->product_id = request('product_id');
        $orderItem->quantity = request('quantity');
        $orderItem->price = request('price');

        $orderItem->save();
    }
}