<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\BrandInterface;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandRepository implements BrandInterface
{
    public function index()
    {
        return Brand::get();
    }

    public function create()
    {
        return Brand::get();
    }

    public function store(BrandRequest $request)
    {
        $brand = Brand::create([
            'name' => $request['name'],
        ]);
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return response()->json($brand);
    }

    public function update(BrandRequest $request, Brand $brand): Brand
    {
        $brand->name = $request['name'];
        $brand->save();
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
    }
}
