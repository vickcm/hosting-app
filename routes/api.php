<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// listado de productos sin auth 
Route::get('products',  ['App\Http\Controllers\API\ProductsAdminController', 'index']); // listado de productos

//ABM ENTRADAS POSTEOS

// listado de posteos/entradas sin auth 
Route::get('posts',  ['App\Http\Controllers\API\PostsAdminController', 'index'])
    ->middleware(['auth', 'isAdminAPI']);

// Creación de posteos/entradas con ADMIN
Route::post('posts',  ['App\Http\Controllers\API\PostsAdminController', 'createPost'])
    ->middleware(['auth', 'isAdminAPI']);

// listado de posteos o entrada con ID sin auth
Route::get('posts/{id}',  ['App\Http\Controllers\API\PostsAdminController', 'view'])
    ->middleware(['auth', 'isAdminAPI']);

// Actualización completa de un posteo/entrada con ADMIN
Route::put('posts/{id}', ['App\Http\Controllers\API\PostsAdminController', 'updatePost'])
    ->middleware(['auth', 'isAdminAPI']);

// Actualización parcial de un posteo/entrada con ADMIN
Route::patch('posts/{id}', ['App\Http\Controllers\API\PostsAdminController', 'updatePartialPost'])
    ->middleware(['auth', 'isAdminAPI']);

// Eliminación de un posteo/entrada con ADMIN
Route::delete('posts/{id}', ['App\Http\Controllers\API\PostsAdminController', 'deletePost'])
    ->middleware(['auth', 'isAdminAPI']);