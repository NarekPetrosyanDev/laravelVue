<?php

namespace App\Http\Services;

use App\Http\Repositories\ProductRepository;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminDataService
{

    public function authUser()
    {
        return auth()->user();
    }

}
