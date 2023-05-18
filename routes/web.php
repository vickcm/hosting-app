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

// Generales Web 

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])
    ->name('home');
Route::get('/quienes-somos', [\App\Http\Controllers\HomeController::class, 'about'])
    ->name('about');

// Autenticación 

Route::get('/iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'formLogin'])
    ->name('auth.formLogin');

Route::post('/iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'processLogin'])
    ->name('auth.processLogin');

Route::post('/cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'processLogout'])
    ->name('auth.processLogout');


// Posteos - Entradas 
Route::get('/blog', [\App\Http\Controllers\PostController::class, 'posts'])
    ->name('posts');

// Productos
Route::get('/productos', [\App\Http\Controllers\ProductController::class, 'index'])
    ->name('products.products');


// ADMIN - POSTEOS - ENTRADAS
Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'indexPosts'])
    ->name('dashboardPosts')
    ->middleware('auth');

// ADMIN - CATEGORIAS 
Route::get('/dashboard/categorias', [\App\Http\Controllers\AdminController::class, 'indexCategories'])
    ->name('dashboardCategories')
    ->middleware('auth');

Route::get('entradas/nueva', [\App\Http\Controllers\PostController::class, 'formNew'])
    ->name('posts.formNew')
    ->middleware('auth');

Route::post('entradas/nueva', [\App\Http\Controllers\PostController::class, 'processNew'])
    ->name('posts.processNew')
    ->middleware('auth');


Route::get('entradas/{id}/editar', [\App\Http\Controllers\PostController::class, 'formEdit'])
    ->name('posts.formEdit')
    ->middleware('auth');


Route::post('entradas/{id}/editar', [\App\Http\Controllers\PostController::class, 'processEdit'])
    ->name('posts.processEdit')
    ->middleware('auth');



Route::get('entradas/{id}', [\App\Http\Controllers\PostController::class, 'view'])
    ->name('posts.view');

Route::get('entradas/{id}/eliminar', [\App\Http\Controllers\PostController::class, 'confirmDelete'])
    ->name('posts.confirmDelete')
    ->middleware('auth');

Route::post('entradas/{id}/eliminar', [\App\Http\Controllers\PostController::class, 'processDelete'])
    ->name('posts.processDelete')
    ->middleware('auth');

