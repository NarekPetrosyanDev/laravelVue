<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\CategoryInterface;
use App\Http\Requests\BrandRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryRepository implements CategoryInterface
{
    public function index()
    {
        return Category::with('parent')->get();
    }

    public function create()
    {
        return Category::with('parent')->get();
    }

    public function store(BrandRequest $request)
    {
        $category = Category::create([
            'name' => $request['name'],
            'parent_id' => $request['parent_id'],
        ]);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id)->load('parent');
        $categoryList = Category::where('id', '!=', $category->id)->with('parent')->get();
        $data['category'] = $category;
        $data['categoryList'] = $categoryList;
        return $data;
    }

    public function update(BrandRequest $request, Category $category): Category
    {
        $category->name = $request['name'];
        $category->parent_id = $request['parent_id'];
        $category->save();
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}
