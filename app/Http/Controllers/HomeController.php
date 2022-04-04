<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;

class HomeController extends Controller
{
    private $product;
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
        // $this->middleware('auth');
    }

    public function index()
    {
        $products = $this->product->list();

        return view('home', ['products' => $products]);
    }
}
