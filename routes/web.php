<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});
// Index Route
Route::get('/posts', [PostController::class, 'index'])-> name('posts.index');
// Store Route
Route::post('/posts', [PostController::class, 'store'])-> name('posts.store');
// Create Route
Route::get('/posts/create', [PostController::class, 'create'])-> name('posts.create');
// Show Route
Route::get('/posts/{post}', [PostController::class, 'show'])-> name('posts.show');
// Edit Route
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])-> name('posts.edit');
//  Update Route
Route::put('/posts/{post}', [PostController::class, 'update'])-> name('posts.update');
// Destroy Route
Route::delete('/posts/{post}', [PostController::class, 'destroy'])-> name('posts.destroy');