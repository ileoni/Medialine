<?php

namespace App\Repositories;

use App\Repositories\OrderRepositoryInterface;
use App\Models\Order;
use App\Models\OrderItem;

class OrderRepository implements OrderRepositoryInterface
{
    private $eloquent;
    private $eloquentItem;
    public function __construct(Order $eloquent, OrderItem $eloquentItem) {
        $this->eloquent = $eloquent;
        $this->eloquentItem = $eloquentItem;
    }

    public function list()
    {
        $order = $this->eloquent->all();
        return $order;
    }

    public function store()
    {
        $user = auth()->user();
        
        $order = $this->eloquent;
        $orderItem = $this->eloquentItem;

        $price = request('price');
        $qnt = 1;
        $total = $price * $qnt; 

        $order->user_id = $user->id;
        $order->amount = $total;

        $orderItem->product_id = request('id');
        $orderItem->quantity = $qnt;
        $orderItem->price = $price;

        $order->save();
        $order->order_items()->save($orderItem);
    }
}