<?php

namespace App\Repositories;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManager;

class ProductRepository implements ProductRepositoryInterface
{
    private $eloquent;
    private $eloquentImage;
    public function __construct(Product $eloquent, Image $eloquentImage) {
        $this->eloquent = $eloquent;
        $this->eloquentImage = $eloquentImage;
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

    public function pathImage($image)
    {
        $images = $this->eloquentImage;

        if($image) $name = time() . '.' . $image->extension();
        
        $images->default = ($image) ? 'imgs/'.$name : "";
        $images->small = ($image) ? 'imgs/small/'.$name : "";
        $images->thumbnail = ($image) ? 'imgs/thumbnail/'.$name : "";

        return $this;
    }

    public function uploadImage()
    {
        $image = request('image');
        $imagePath = $this->eloquentImage;
        
        if(!$image) return $imagePath;

        if(!is_dir('imgs')) {
            mkdir(public_path('imgs\thumbnail'), 0777, true);
            mkdir(public_path('imgs\small'), 0777, true);
        }
        
        $manage = new ImageManager(['drive' => 'imagick']);
        $manage->make($image->getRealPath())->widen(100)->save($imagePath->thumbnail);
        $manage->make($image->getRealPath())->widen(240)->save($imagePath->small);
        $manage->make($image->getRealPath())->widen(400)->save($imagePath->default);

        return $imagePath;
    }

    public function removeImage($path)
    {
        if($path->default != "") {
            unlink($path->default);
            unlink($path->small);
            unlink($path->thumbnail);
        }
    }

    public function store()
    {
        $product = $this->eloquent;
        $images = $this->eloquentImage;

        $product->name = request('name');
        $product->description = request('description');
        $product->price = request('price');
        $product->amount = request('amount');
        
        $image = request('image');
        $paths = $this->pathImage($image)->uploadImage();

        $images->default = $paths->default;
        $images->small = $paths->small;
        $images->thumbnail = $paths->thumbnail;

        $product->save();
        $product->images()->save($images);
    }

    public function update($id)
    {
        $product = $this->eloquent->find($id);
        $imagePaths = $product->images;

        
        $product->name = request('name');
        $product->description = request('description');
        $product->price = request('price');
        $product->amount = request('amount');
        
        $image = request('image');
        
        $paths = $this->pathImage($image)->uploadImage();
                
        $images = $product->images->first();
        
        if($images->default != "")
        {
            unlink($images->default);
            unlink($images->small);
            unlink($images->thumbnail);
        }

        if($image) 
        {
            $images->default = $paths->default;
            $images->small = $paths->small;
            $images->thumbnail = $paths->thumbnail;
        }
       
        $product->push();
    }

    public function destroy($id)
    {
        $product = $this->eloquent->find($id);
        $imagePaths = $product->images;

        if(!$product) return;

        $path = $imagePaths->first();

        if($path->default != "") {
            unlink($path->default);
            unlink($path->small);
            unlink($path->thumbnail);
        }

        $product->delete();
    }
}