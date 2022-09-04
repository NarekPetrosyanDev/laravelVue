<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Services\BrandService;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function index()
    {
        $brands = $this->brandService->index();
        return response()->json($brands);
    }

    public function create()
    {
        return $this->brandService->create();
    }

    public function store(BrandRequest $request)
    {
        return $this->brandService->store($request);
    }

    public function edit($id)
    {
        return $this->brandService->edit($id);
    }

    public function update(BrandRequest $request, Brand $brand)
    {
        return $this->brandService->update($request, $brand);
    }


    public function destroy($id)
    {
        return $this->brandService->destroy($id);
    }

}
