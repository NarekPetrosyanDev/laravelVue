<?php

namespace App\Http\Interfaces;

use App\Models\Category;
use Illuminate\Http\Request;

interface CategoryInterface
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
     * @param Category $category
     * @return Category
     */
    public function update(Request $request, Category $category): Category;

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);

}
