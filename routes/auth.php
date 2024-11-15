<?php
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\UserController;

Route::middleware(RedirectIfAuthenticated::class)->group(function () {
    Route::get('/login', [UserController::class, 'showLoginPage'])->name('login_page');
    Route::get('/register', [UserController::class, 'showRegisterPage'])->name('register_page');
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware(AuthMiddleware::class);
