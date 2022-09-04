<?php

namespace App\Http\Services;

use App\Http\Repositories\CategoryRepository;
use App\Http\Requests\BrandRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryService
{

    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->categoryRepository->index();
    }

    /**
     * @return Product[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function create()
    {
        return $this->categoryRepository->create();
    }

    /**
     * @param $request
     * @return mixed|void
     */
    public function store(BrandRequest $request)
    {
        return $this->categoryRepository->store($request);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return array
     */
    public function edit($id)
    {
        return $this->categoryRepository->edit($id);
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return Product
     */
    public function update(BrandRequest $request, Category $category): Category
    {
        return $this->categoryRepository->update($request, $category);
    }

    /**
     * @param $id
     * @return mixed|void
     */
    public function destroy($id)
    {
        return $this->categoryRepository->destroy($id);
    }

}
