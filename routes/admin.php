<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;


Route::get('/admin', [AdminController::class, 'dashboard'])->middleware(AdminMiddleware::class);
Route::get('/admin/create-post', [AdminController::class, 'add_post'])->middleware(AdminMiddleware::class);
Route::post('/admin/create-post', [AdminController::class, 'create_post'])->middleware(AdminMiddleware::class);
Route::get('/admin/view-posts', [AdminController::class, 'view_posts'])->middleware(AdminMiddleware::class);
Route::get('/admin/edit-post/{id}', [AdminController::class, 'edit_post'])->middleware(AdminMiddleware::class);
Route::put('/admin/edit-post/{id}', [AdminController::class, 'update_post'])->middleware(AdminMiddleware::class);
Route::delete('/admin/delete-post/{id}', [AdminController::class, 'delete_post'])->middleware(AdminMiddleware::class);



