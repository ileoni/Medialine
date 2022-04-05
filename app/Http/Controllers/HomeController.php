<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $product;
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->list();
        return view('home', ['products' => $products]);
    }
}
