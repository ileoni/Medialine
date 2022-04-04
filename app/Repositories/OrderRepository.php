<?php

namespace App\Repositories;

use App\Repositories\OrderRepositoryInterface;
use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface
{
    private $eloquent;
    public function __construct(Order $eloquent) {
        $this->eloquent = $eloquent;
    }

    public function list()
    {
        $order = $this->eloquent->all();
        return $order;
    }

    public function store()
    {
        $order = $this->eloquent;
        $order->user_id = request('user_id');
        $order->amount = request('amount');

        $order->save();
    }
}