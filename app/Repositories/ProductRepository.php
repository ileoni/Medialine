<?php

namespace App\Repositories;

use App\Models\Product;
use Intervention\Image\ImageManager;

class ProductRepository implements ProductRepositoryInterface
{
    private $eloquent;
    public function __construct(Product $eloquent) {
        $this->eloquent = $eloquent;
    }

    public function list()
    {
        $product = $this->eloquent;
        $search = request('search');

        $product = $product->select('*')->where('name', 'like', $search.'%');

        return $product->get();
    }

    public function findById($id)
    {
        $user = $this->eloquent->find($id);
        
        if(!$user) return; 

        return $user;
    }

    public function uploadFile($image)
    {
        $name = time() . '.' . $image->extension();
        $path = "/images/" . $name;

        if(!is_dir('images')) {
            mkdir(public_path('images\thumbnail'), 0777, true);
            mkdir(public_path('images\small'), 0777, true);
        }

        $manage = new ImageManager(['drive' => 'imagick']);
        
        $manage->make($image->getRealPath())->resize(100, 75)->save('images/thumbnail/'.$name);

        $manage->make($image->getRealPath())->resize(240, 188)->save('images/small/'.$name);
        
        $image->move(public_path('images'), $name);
        
        return $name;
    }

    public function store()
    {
        $product = $this->eloquent;

        $product->name = request('name');
        $product->description = request('description');
        $product->price = request('price');
        $product->amount = request('amount');
        
        $path = (request('image') != null) ? $this->uploadFile(request('image')): "";
        $product->path = $path;
        
        $product->save();
    }

    public function update($id)
    {
        $product = $this->eloquent->find($id);

        if(!$product) return;
        
        $product->name = request('name');
        $product->description = request('description');
        $product->price = request('price');
        $product->amount = request('amount');

        $oldPath = ($product->path != "") ? base_path('public') . $product->path: null;
        $path = (request('image') != null) ? $this->uploadFile(request('image')): "";

        $product->path = $path;
        
        $product->update();
        if(!!$oldPath) unlink($oldPath);
    }

    public function destroy($id)
    {
        $product = $this->eloquent->find($id);
        $oldPath = ($product->path != "") ? base_path('public') . $product->path: null;

        if(!$product) return;
        
        $product->delete();
        if(!!$oldPath) unlink($oldPath);
    }
}