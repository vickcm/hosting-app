<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class AdminController extends Controller
{
    public function indexPosts()
    {
        $posts = Post::with('category', 'author')->get();

        return view('admin-views.posts-table', [
            'posts' => $posts,
        ]);
    }
    public function indexCategories()
    {
        $categories = Category::all();

        return view('admin-views.categories-table', [
            'categories' => $categories,
        ]);
    }

    public function indexUsers()
    {
        $users = User::with('products')
            ->select('username', 'email', 'user_id')
            ->get();

        return view('admin-views.users-table', [
            'users' => $users,
        ]);
    }
}