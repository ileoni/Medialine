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

    public function addItem(Request $request)
    {
        $accurent = session()->get('cart');
        
        if($accurent != []) {
            array_push($accurent, $request->get('cart'));

            session()->put('cart', $accurent);
            return response()->json([
                'dentro',
                $accurent
            ], 200);
        }

        session()->put('cart', [$request->get('cart')]);
        
        return response()->json([
            session()->get('cart')
        ], 200);
    }

    public function destroyItem($index)
    {
        $accurent = session()->get('cart');
        array_splice($accurent, $index, 1);
        
        session()->put('cart', $accurent);
        return redirect('/carrinho/pedidos');
    }

    public function create()
    {
        $cart = session()->get('cart') ? session()->get('cart'): [];
        $total = 0;

        foreach($cart as $item) {
            $total += $item['price'];
        }
        
        return view('cart.create', ['cart' => $cart, 'total' => $total]);
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