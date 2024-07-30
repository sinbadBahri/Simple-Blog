<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\EnsureUserIsAdminOrManager;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [PostController::class, 'userDashboard'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('/admin/all-users', AdminController::class)
->middleware(EnsureUserIsAdminOrManager::class);

Route::get('/', function () {
    return redirect(to:'/posts');
});
Route::resource('/posts', PostController::class);
Route::get('/posts/user/{id}', [PostController::class, 'userPosts'])
->name('user.posts');
