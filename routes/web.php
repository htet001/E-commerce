<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

Route::get('/', function () {
    return "Hey welcome to my website";
});

//Route::get('/posts/{username}/{password}', [PostsController::class, 'test']);

//Route::resource('posts', PostsController::class);

Route::get('/home', [PostsController::class, 'home']);
Route::get('/about', [PostsController::class, 'about']);
Route::get('/contact', [PostsController::class, 'contact']);
