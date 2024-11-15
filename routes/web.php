<?php

use App\Models\Post;
use App\Models\AdminPost;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RedirectIfAuthenticated;

Route::get('/', function () {
    // $posts = [];

    // if (auth()->check()) {
    //     // $posts = Post::where('user_id', auth()->id())->get();
    //     $posts = auth()->user()->userPosts()->latest()->get();
    // }

    $posts = AdminPost::all();
    return view('home', ['posts' => $posts]);
})->name('home');

// Route::middleware(RedirectIfAuthenticated::class)->group(function () {
//     Route::get('/login', [UserController::class, 'showLoginPage']);
//     Route::get('/register', [UserController::class, 'showRegisterPage']);
//     Route::post('/register', [UserController::class, 'register']);
//     Route::post('/login', [UserController::class, 'login']);
// });

// Post routes
Route::middleware(AuthMiddleware::class)->group(function () {
    Route::get('/post', [PostController::class, 'create'])->name('post_page');
    Route::post('/post', [PostController::class, 'store'])->name('post');
    Route::get('/post/{post}', [PostController::class, 'edit'])->name('edit_user_post');
    Route::put('/post/{post}', [PostController::class, 'update'])->name('update_user_post');
    Route::delete('/post/{post}', [PostController::class, 'delete'])->name('delete_user_post');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
