<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])
    ->name('home');
Route::get('/quienes-somos', [\App\Http\Controllers\HomeController::class, 'about'])
    ->name('about');
Route::get('/blog', [\App\Http\Controllers\PostController::class, 'posts'])
    ->name('posts');

Route::get('/productos', [\App\Http\Controllers\ProductController::class, 'index'])
    ->name('products.products');


// ABM 
Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])
    ->name('dashboard');

Route::get('entradas/nueva', [\App\Http\Controllers\PostController::class, 'formNew'])
    ->name('posts.formNew');
Route::post('entradas/nueva', [\App\Http\Controllers\PostController::class, 'processNew'])
    ->name('posts.processNew');

Route::get('entradas/{id}/editar', [\App\Http\Controllers\PostController::class, 'formEdit'])
    ->name('posts.formEdit');
Route::post('entradas/{id}/editar', [\App\Http\Controllers\PostController::class, 'processEdit'])
    ->name('posts.processEdit');

Route::get('entradas/{id}', [\App\Http\Controllers\PostController::class, 'view'])
    ->name('posts.view');

Route::get('entradas/{id}/eliminar', [\App\Http\Controllers\PostController::class, 'confirmDelete'])
    ->name('posts.confirmDelete');
Route::post('entradas/{id}/eliminar', [\App\Http\Controllers\PostController::class, 'processDelete'])
    ->name('posts.processDelete');
