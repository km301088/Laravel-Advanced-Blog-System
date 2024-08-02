<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EncryptCookies;
use Illuminate\Session\Middleware\StartSession;
use App\Http\Controllers\{LoginController,PostController,CommentController,UserActivityLogController};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', [LoginController::class, 'get_post_via_api']);
Route::post('/login', [LoginController::class, 'login_via_api']);

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
    Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
});
