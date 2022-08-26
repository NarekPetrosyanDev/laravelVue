<?php

namespace App\Http\Services;

use App\Http\Repositories\ProductRepository;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductService
{

    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->productRepository->index();
    }

    /**
     * @return Product[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function create()
    {
        return $this->productRepository->create();
    }

    /**
     * @param $request
     * @return mixed|void
     */
    public function store($request)
    {
        return $this->productRepository->store($request);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return array
     */
    public function edit(Request $request, int $id): array
    {
        return $this->productRepository->edit($request,$id);
    }

    public function update(Request $request, Product $product): Product
    {
        return $this->productRepository->update($request, $product);
    }

    /**
     * @param $id
     * @return mixed|void
     */
    public function destroy($id)
    {
        return $this->productRepository->destroy($id);
    }

}
