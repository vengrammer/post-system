<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::resource('posts', PostController::class);
Route::post('/posts/{post}/like', [PostController::class, 'likepost'])->name('posts.likepost');
