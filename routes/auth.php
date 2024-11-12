<?php
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\UserController;

// Routes for authentication
Route::middleware(RedirectIfAuthenticated::class)->group(function () {
    Route::get('/login', [UserController::class, 'showLoginPage']);
    Route::get('/register', [UserController::class, 'showRegisterPage']);
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);
});

Route::post('/logout', [UserController::class, 'logout'])->middleware(AuthMiddleware::class);
