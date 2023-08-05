<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('products',  ['App\Http\Controllers\API\ProductsAdminController', 'index'] ); // listado de productos

Route::get('posts',  ['App\Http\Controllers\API\PostsAdminController', 'index'] ); // listado de posteos/entradas
Route::post('posts',  ['App\Http\Controllers\API\PostsAdminController', 'createPost'] ); // listado de posteos/entradas
Route::get('posts/{id}',  ['App\Http\Controllers\API\PostsAdminController', 'view'] ); // listado de posteos/entradas
