<?php

use App\Http\Controllers\ShowDashboard;
use App\Http\Controllers\NewsletterSubscriptionController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostFeedController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\PostThumbnailController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MediaLibraryController;

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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/feed', [PostFeedController::class, 'index'])->name('posts.feed');
Route::resource('posts', PostController::class)->only('show');
Route::resource('users', UserController::class)->only('show');
Route::resource('posts.comments', PostCommentController::class)->only('index');

Route::get('newsletter-subscriptions/unsubscribe', [NewsletterSubscriptionController::class, 'unsubscribe'])->name('newsletter-subscriptions.unsubscribe');


Route::get('dashboard', ShowDashboard::class)->name('dashboard');
Route::resource('userposts', UserPostController::class);
Route::delete('/posts/{post}/thumbnail', [PostThumbnailController::class, 'destroy'])->name('posts_thumbnail.destroy');
Route::resource('comments', CommentController::class)->only(['index', 'edit', 'update', 'destroy']);
Route::resource('media', MediaLibraryController::class)->only(['index', 'show', 'create', 'store', 'destroy']);
