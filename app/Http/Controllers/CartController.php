<?php

namespace App\Http\Controllers;

use App\Repositories\OrderItemRepository;
use App\Repositories\OrderRepository;

class CartController extends Controller
{
    private $order;
    private $orderItem;
    public function __construct(OrderRepository $order, OrderItemRepository $orderItem) {
        $this->order = $order;
        $this->orderItem = $orderItem;
    }

    public function create()
    {
        $order = $this->order->list();
        $orderItem = $this->orderItem->list();
        return response()->json([
            'order' => $order,
            'orderItem' => $orderItem,
        ], 200);
    }
    
    public function store()
    {
        $this->order->store();
        $this->orderItem->store();
        return response()->json([
            'success'
        ], 200);
    }
}