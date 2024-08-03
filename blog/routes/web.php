<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Finance\BankController;
use App\Http\Controllers\Finance\FinanceController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\EnsureUserIsAdminOrManager;
use App\Models\Post;
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
// Route::get('/posts/trashed', [PostController::class, 'trashedPosts'])
// ->middleware(EnsureUserIsAdminOrManager::class)->name('trash.posts');
Route::middleware(EnsureUserIsAdminOrManager::class)->group(function () {
    Route::get('/posts/trashed', [PostController::class, 'trashedPosts'])->name('trash.posts');
    Route::get('/posts/trashed/{id}', [PostController::class, 'restoreTrashedPost']);
    Route::delete('/posts/trashed/{id}', [PostController::class, 'deletePermanentlyPost']);
});
Route::resource('/posts', PostController::class);
Route::get('/posts/user/{id}', [PostController::class, 'userPosts'])
->name('user.posts');
Route::get('/search/', [PostController::class, 'searchPost'])
->name('search.posts');



Route::get('/pricing', [FinanceController::class, 'pricingView'])
->name('pricing');
Route::get('/vip-purchase', [FinanceController::class, 'checkoutForm']);
Route::post('/vip-purchase', [FinanceController::class, 'checkout'])
->name('checkout');
Route::post('/payment/{gateway}/callback', [BankController::class, 'verify'])
->name('payment.verify');