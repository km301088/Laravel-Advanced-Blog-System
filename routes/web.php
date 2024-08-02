<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{LoginController,PostController,CommentController,
    UserActivityLogController};
    use App\Http\Controllers\auth\SocialAuthController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);

Route::get('auth/facebook', [SocialAuthController::class, 'redirectToFacebook'])->name('facebook.login');
Route::get('auth/facebook/callback', [SocialAuthController::class, 'handleFacebookCallback']);

Route::middleware(['auth', 'logactivity', 'verified'])->group(function () {
    Route::get('/home', [LoginController::class, 'authenticate_user'])->name('home');

    Route::group(['as' => 'user.', 'prefix' => 'user'], function () {

    Route::get('/dashboard', [LoginController::class, 'User_Dashboard'])->name('dashboard');
    Route::get('/panel/posts', [PostController::class, 'user_panel_index'])->name('posts.panel');
    Route::get('/comments', [CommentController::class, 'commentByuser'])->name('comments.index');

    });
    
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/posts', [PostController::class, 'store'])->name('post.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/posts/update', [PostController::class, 'update'])->name('post.update');
    Route::get('/posts/{post}/delete', [PostController::class, 'destroy'])->name('post.delete');

    Route::get('/comments/{post}/delete', [CommentController::class, 'destroy'])->name('comments.delete');

});

Route::middleware(['auth', 'logactivity', 'admin', 'verified'])->group(function () {

    Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
        Route::get('/admin/dashboard', [LoginController::class, 'Admin_Dashboard'])->name('dashboard');
        Route::get('/panel/posts', [PostController::class, 'admin_panel_index'])->name('posts.panel');
        Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
        Route::get('/logs', [UserActivityLogController::class, 'index'])->name('logs.index');
    });

});

require __DIR__.'/auth.php';
