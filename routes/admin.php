<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;


Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');
    Route::get('/admin/create-post', [AdminController::class, 'add_post'])->name('create_post_page');
    Route::post('/admin/create-post', [AdminController::class, 'create_post'])->name('create_post');
    Route::get('/admin/view-posts', [AdminController::class, 'view_posts'])->name('view_posts');
    Route::get('/admin/edit-post/{id}', [AdminController::class, 'edit_post'])->name('edit_post');
    Route::put('/admin/edit-post/{id}', [AdminController::class, 'update_post'])->name('update_post');
    Route::delete('/admin/delete-post/{id}', [AdminController::class, 'delete_post'])->name('delete_post');
});



