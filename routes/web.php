<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserCommentController;
use App\Http\Controllers\UserController;
use App\Mail\CommentPosted;
use App\Mail\CommentPostedMarkdown;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/secret', [App\Http\Controllers\HomeController::class, 'secret'])->name('secret')->middleware('can:home.secret');

Route::resource('posts', PostsController::class);
Route::resource('posts.comments', PostCommentController::class)->only(['store']);
Route::resource('users', UserController::class)->only(['show', 'edit', 'update']);
Route::resource('users.comments', UserCommentController::class)->only(['store']);

Route::get('/posts/tag/{tag}', [App\Http\Controllers\PostTagController::class, 'index'])->name('posts.tags.index');

Auth::routes();

Route::get('mailable', function () {
    // Cache::flush();
    $comment = Comment::find(1);
    return new CommentPosted($comment);
});
