<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Post;

class HomeController extends Controller
{
    public function home() {
        return view('home', [
            'products' => Product::all(),
            'posts' => Post::all(),

        ]);
    }

    public function about() {
        return view('about');
    }


}
