<?php

namespace App\Http\Interfaces;

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
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request);

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function edit(Request $request, $id);

    /**
     * @param Request $request
     * @param Product $product
     * @return Product
     */
    public function update(Request $request, Product $product): Product;

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);

}
