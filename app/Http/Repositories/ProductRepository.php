<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ProductInterface;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductRepository implements ProductInterface
{
    public function index()
    {
        return Product::all();
    }

    public function create()
    {
        $data['categories'] = Category::where('parent_id', '>', 1)->get();
        $data['brands'] = Brand::all();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $image = $request->file('image')->store('products', 'public');
        if (is_null($request['slug'])) {
            $request['slug'] = Str::slug($request['name']);
        }
        $product = Product::create([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'category_id' => $request['category_id'],
            'brand_id' => $request['brand_id'],
            'price' => $request['price'],
            'status' => $request['status'],
            'description' => $request['description'],
            'image' => $image,
        ]);
    }

    public function edit(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $categoryList = Category::all();
        $brandList = Brand::all();
        $data['product'] = $product;
        $data['categoryList'] = $categoryList;
        $data['brandList'] = $brandList;
        return $data;
    }

    public function update(Request $request, Product $product): Product
    {
        if (is_null($request['slug'])) {
            $request['slug'] = Str::slug($request['name']);
        }
        $product->name = $request['name'];
        $product->slug = $request['slug'];
        $product->category_id = $request['category_id'];
        $product->price = $request['price'];
        $product->status = $request['status'];
        $product->description = $request['description'];
        if ($request->has('image')) {
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
        foreach ($product->gallery as $image) {
            $image->delete();
            unlink('storage/' . $image->gallery_image);
        }
    }
}
