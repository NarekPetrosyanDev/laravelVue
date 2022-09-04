<?php

namespace App\Http\Interfaces;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

interface BrandInterface
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
    public function store(BrandRequest $request);

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function edit($id);

    /**
     * @param Request $request
     * @param Brand $brand
     * @return Brand
     */
    public function update(BrandRequest $request, Brand $brand): Brand;

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);

}
