<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Services\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->index();
        return response()->json($products);
    }

    public function create()
    {
        return $this->productService->create();
    }

    public function store(ProductRequest $request)
    {
        return $this->productService->store($request);
    }

    public function edit($id)
    {
        return $this->productService->edit($id);
    }


    public function update(ProductRequest $request, Product $product)
    {
        return $this->productService->update($request, $product);
    }


    public function destroy($id)
    {
        return $this->productService->destroy($id);
    }

}
