<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreAndUpdateRequest as ProductRequest;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    private $product;
    public function __construct(ProductRepository $product) {
        $this->product = $product;
        $this->middleware('auth');
    }
    
    public function index()
    {
        $product = $this->product->list();
        return view('product.index', ['products' => $product]);
    }

    public function create()
    {
        return view('product.create');
    }
    
    public function store(ProductRequest $request)
    {
        if(!Gate::allows('admin')) {
            return response()->json('error', 403);
        }

        $this->product->store($request);
        return redirect('/produto');
    }

    public function edit($id)
    {
        $product = $this->product->findById($id);
        return view('product.edit', ['product' => $product]);
    }

    public function update(ProductRequest $request, $id)
    {
        if(!Gate::allows('admin')) {
            return response()->json('error', 403);
        }

        $this->product->update($id);
        return redirect('/produto');
    }

    public function destroy($id)
    {
        if(!Gate::allows('admin')) {
            return response()->json('error', 403);
        }
        
        $this->product->destroy($id);
        return redirect('/produto');
    }
}