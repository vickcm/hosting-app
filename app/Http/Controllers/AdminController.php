<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index()
    {
        $posts = Post::with('category', 'author')->get();

        // Obtener la fecha de hace un mes desde hoy
        $fechaUnMesAtras = Carbon::now()->subMonth();
        $fechaInicioMes = Carbon::now()->startOfMonth();


        // Filtrar los posteos que fueron creados en el último mes
        $postsUltimoMes = $posts->filter(function ($post) use ($fechaUnMesAtras) {
            return $post->created_at >= $fechaUnMesAtras;
        });

        // Contar la cantidad de posteos del último mes
        $cantidadPosteosUltimoMes = $postsUltimoMes->count();

        // Obtener la cantidad de posteos por autor
        $cantidadPosteosPorAutor = Author::withCount('posts')->get();

        // Obtener el autor con más posteos en el último mes
        $autorConMasPosteosUltimoMes = Author::withCount(['posts' => function ($query) use ($fechaUnMesAtras) {
            $query->where('created_at', '>=', $fechaUnMesAtras);
        }])->orderBy('posts_count', 'desc')->first();

        // Obtener las transacciones del mes actual con status = true
        $transaccionesMesActual = DB::table('users_has_products')
            ->where('created_at', '>=', $fechaInicioMes)
            ->where('status', true)
            ->get();

        // Calcular el monto total recaudado en el mes actual
        $montoTotalRecaudadoMesActual = $transaccionesMesActual->sum('price_paid');
        // Contar la cantidad de productos vendidos en el mes 
        $cantidadProductosVendidosMesActual = $transaccionesMesActual->count();

        // Obtener el cliente (user) con la mayor suma de productos adquiridos en el mes actual

        // Obtener el cliente (user) con la mayor suma de productos adquiridos en el mes actual (con status = true)
        $clienteMayorSumaDineroGastado = DB::table('users')
            ->join(DB::raw('(SELECT user_id, SUM(price_paid) as total_amount_spent FROM users_has_products WHERE status = true GROUP BY user_id) as uhp'), 'users.user_id', '=', 'uhp.user_id')
            ->select('users.*', 'uhp.total_amount_spent')
            ->orderByDesc('uhp.total_amount_spent')
            ->first();

        return view('admin-views.dashboard', [
            'posts' => $posts,
            'cantidadPosteosUltimoMes' => $cantidadPosteosUltimoMes,
            'cantidadPosteosPorAutor' => $cantidadPosteosPorAutor,
            'autorConMasPosteosUltimoMes' => $autorConMasPosteosUltimoMes,
            'montoTotalRecaudadoMesActual' => $montoTotalRecaudadoMesActual,
            'cantidadProductosVendidosMesActual' => $cantidadProductosVendidosMesActual,
            'clienteMayorSumaDineroGastado' => $clienteMayorSumaDineroGastado,



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
