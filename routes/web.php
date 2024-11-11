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

// Route::middleware(RedirectIfAuthenticated::class)->group(function () {
//     Route::get('/login', [UserController::class, 'showLoginPage']);
//     Route::get('/register', [UserController::class, 'showRegisterPage']);
//     Route::post('/register', [UserController::class, 'register']);
//     Route::post('/login', [UserController::class, 'login']);
// });

Route::middleware(AuthMiddleware::class)->group(function () {
    Route::get('/post', [PostController::class, 'create'])->middleware(AuthMiddleware::class);
    Route::post('/post', [PostController::class, 'store'])->middleware(AuthMiddleware::class);
    Route::get('/post/{post}', [PostController::class, 'edit'])->middleware(AuthMiddleware::class);
    Route::put('/post/{post}', [PostController::class, 'update'])->middleware(AuthMiddleware::class);
    Route::delete('/post/{post}', [PostController::class, 'delete'])->middleware(AuthMiddleware::class);
});

require __DIR__.'/auth.php';
