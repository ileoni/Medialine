<?php

namespace App\Http\Controllers;

use App\Repositories\OrderItemRepository;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private $order;
    private $orderItem;
    public function __construct(OrderRepository $order, OrderItemRepository $orderItem) {
        $this->order = $order;
        $this->orderItem = $orderItem;
        $this->middleware('auth');
    }

    public function create()
    {
        $orderItem = $this->orderItem->list();
        $total = 0;

        foreach ($orderItem as $item) {
            $total += $item->price;
        }

        return view('cart.create', ['total' => $total]);
    }

    public function index()
    {
        $order = $this->order->list();
        $orderItem = $this->orderItem->list();
        return response()->json([$order, $orderItem], 200);
    }

    public function store()
    {
        $this->order->store();
        return redirect('home');
    }
    
    public function destroyItem($id)
    {
        $this->orderItem->destroy($id);
        return redirect('/carrinho/pedidos');
    }

}