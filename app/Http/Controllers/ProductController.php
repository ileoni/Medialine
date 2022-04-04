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
        $this->middleware('auth', ['except' => ['create', 'findById']]);
    }
    
    public function create()
    {
        $product = $this->product->list();
        return view('product.create', ['products' => $product]);
    }

    public function findById($id)
    {
        $product = $this->product->findById($id);
        return response()->json($product, 200);
    }

    public function store(ProductRequest $request)
    {
        if(!Gate::allows('admin')) {
            return response()->json('error', 403);
        }

        $this->product->store();
        return response()->json('success', 200);
    }

    public function update(ProductRequest $request, $id)
    {
        if(!Gate::allows('admin')) {
            return response()->json('error', 403);
        }

        $this->product->update($id);
        return response()->json('success', 200);
    }

    public function destroy($id)
    {
        if(!Gate::allows('admin')) {
            return response()->json('error', 403);
        }
        
        $this->product->destroy($id);
        return response()->json('success', 200);
    }
}