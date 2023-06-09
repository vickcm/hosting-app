<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class AdminController extends Controller
{
    public function indexPosts()
    {
        $posts = Post::with('category', 'author')->paginate(10);

        return view('admin-views.posts-table', [
            'posts' => $posts,
        ]);
    }
    public function indexCategories()
    {
        $categories = Category::paginate(10);

        return view('admin-views.categories-table', [
            'categories' => $categories,
        ]);
    }

    public function indexUsers()
    {
        $users = User::with('products')
            ->select('username', 'email', 'user_id')
            ->paginate(10);

        return view('admin-views.users-table', [
            'users' => $users,
        ]);
    }
}