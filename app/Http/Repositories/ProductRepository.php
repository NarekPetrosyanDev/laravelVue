<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ProductInterface;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductRepository implements ProductInterface
{
    public function index()
    {
        return Product::with(['category', 'brand'])->get();
    }

    public function create()
    {
        $data['categories'] = Category::where('parent_id', '>', 1)->get();
        $data['brands'] = Brand::all();
        return response()->json($data);
    }

    public function store(ProductRequest $request)
    {
        $image = $request->file('image')->store('products', 'public');
        $product = Product::create([
            'name' => $request['name'],
            'category_id' => $request['category_id'],
            'brand_id' => $request['brand_id'],
            'price' => $request['price'],
            'status' => $request['status'],
            'description' => $request['description'],
            'image' => $image,
        ]);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    public function update(ProductRequest $request, Product $product): Product
    {
        $product->name = $request['name'];
        $product->category_id = $request['category_id'];
        $product->price = $request['price'];
        $product->status = $request['status'];
        $product->description = $request['description'];
        if ($request->file('image')) {
            unlink('storage/' . $product->image);
            $image = $request->file('image')->store('products', 'public');
            $product->image = $image;
        }
        $product->save();
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        unlink('storage/' . $product->image);
        $product->delete();
    }
}
