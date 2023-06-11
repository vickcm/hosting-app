<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Post;

class HomeController extends Controller
{
    public function home() 
    {
        
        $posts = Post::count() > 3 ? Post::latest()->take(3)->get() : Post::all();

        return view('home', [
            'products' => Product::all(),
            'posts' => $posts
        ]);
    }

 
}