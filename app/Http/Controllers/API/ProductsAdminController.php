<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsAdminController extends Controller
{
    //
    public function index() {

        return response()->json([
            'status' => 0,
            'data'=> Product::all()
        ]);

    }

}
