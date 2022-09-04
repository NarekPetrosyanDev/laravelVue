<?php

namespace App\Http\Interfaces;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

interface ProductInterface
{

    /**
     * @return mixed
     */
    public function index();

    /**
     * @return mixed
     */
    public function create();

    /**
     * @param ProductRequest $request
     * @return mixed
     */
    public function store(ProductRequest $request);

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function edit($id);

    /**
     * @param Request $request
     * @param Product $product
     * @return Product
     */
    public function update(ProductRequest $request, Product $product): Product;

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);

}
