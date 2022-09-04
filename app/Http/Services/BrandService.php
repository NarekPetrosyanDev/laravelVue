<?php

namespace App\Http\Services;

use App\Http\Repositories\BrandRepository;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandService
{

    protected $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->brandRepository->index();
    }

    /**
     * @return Product[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function create()
    {
        return $this->brandRepository->create();
    }

    /**
     * @param $request
     * @return mixed|void
     */
    public function store(BrandRequest $request)
    {
        return $this->brandRepository->store($request);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return array
     */
    public function edit($id)
    {
        return $this->brandRepository->edit($id);
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return Product
     */
    public function update(BrandRequest $request, Brand $brand): Brand
    {
        return $this->brandRepository->update($request, $brand);
    }

    /**
     * @param $id
     * @return mixed|void
     */
    public function destroy($id)
    {
        return $this->brandRepository->destroy($id);
    }

}
