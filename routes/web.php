<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RedirectIfAuthenticated;

Route::get('/', function () {
    $posts = [];

    if (auth()->check()) {
        // $posts = Post::where('user_id', auth()->id())->get();
        $posts = auth()->user()->userPosts()->latest()->get();
    }
    return view('home', ['posts' => $posts]);
});


// User Routes
Route::post('/register', [UserController::class, 'register'])->middleware(RedirectIfAuthenticated::class);
Route::post('/logout', [UserController::class, 'logout'])->middleware(AuthMiddleware::class);
Route::post('/login', [UserController::class, 'login'])->middleware(RedirectIfAuthenticated::class);

Route::get('/login', [UserController::class, 'showLoginPage'])->middleware(RedirectIfAuthenticated::class);
Route::get('/register', [UserController::class, 'showRegisterPage'])->middleware(RedirectIfAuthenticated::class);

// Post Routes
Route::get('/post', [PostController::class, 'create'])->middleware(AuthMiddleware::class);
Route::post('/post', [PostController::class, 'store'])->middleware(AuthMiddleware::class);
Route::get('/post/{post}', [PostController::class, 'edit'])->middleware(AuthMiddleware::class);
Route::put('/post/{post}', [PostController::class, 'update'])->middleware(AuthMiddleware::class);
Route::delete('/post/{post}', [PostController::class, 'delete'])->middleware(AuthMiddleware::class);
