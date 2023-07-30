<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function index()
    {
        $posts = Post::with('category', 'author')->get();

        // Obtener la fecha de hace un mes desde hoy
        $fechaUnMesAtras = Carbon::now()->subMonth();

        // Filtrar los posteos que fueron creados en el último mes
        $postsUltimoMes = $posts->filter(function ($post) use ($fechaUnMesAtras) {
            return $post->created_at >= $fechaUnMesAtras;
        });

        // Contar la cantidad de posteos del último mes
        $cantidadPosteosUltimoMes = $postsUltimoMes->count();

        // Obtener la cantidad de posteos por autor
        $cantidadPosteosPorAutor = Author::withCount('posts')->get();
        // Obtener todos los autores para enviarlos a la vista

        return view('admin-views.dashboard', [
            'posts' => $posts,
            'cantidadPosteosUltimoMes' => $cantidadPosteosUltimoMes,
            'cantidadPosteosPorAutor' => $cantidadPosteosPorAutor,
            

        ]);
    }
    
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