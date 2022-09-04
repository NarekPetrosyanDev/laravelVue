<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    public function authUser()
    {
        $authUser = auth()->user();
        return response()->json($authUser);
    }
}
