<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Services\CategoryService;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->index();
        return response()->json($categories);
    }

    public function create()
    {
        return $this->categoryService->create();
    }

    public function store(BrandRequest $request)
    {
        return $this->categoryService->store($request);
    }

    public function edit($id)
    {
        return $this->categoryService->edit($id);
    }

    public function update(BrandRequest $request, Category $category)
    {
        return $this->categoryService->update($request, $category);
    }


    public function destroy($id)
    {
        return $this->categoryService->destroy($id);
    }

}
