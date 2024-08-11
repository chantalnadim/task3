<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';



// // Home route
// Route::get('/', [PostController::class, 'index'])->name('home');

// // Post resource routes
// Route::resource('posts', PostController::class);

// // Comment store route
// Route::post('comments', [CommentController::class, 'store'])->name('comments.store');

// // Comment management routes
// Route::patch('comments/{comment}/toggle-visibility', [CommentController::class, 'toggleVisibility'])->name('comments.toggleVisibility');
// Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

// // Authentication routes
// require __DIR__.'/auth.php';  // or Auth::routes() for older versions

// // User profile and management routes
// Route::middleware(['auth'])->group(function () {
//     Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');

//     Route::middleware('admin')->group(function () {
//         Route::get('users', [UserController::class, 'index'])->name('users.index');
//         Route::patch('users/{user}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');
//     });
// });

// // Example of media upload route (optional)
// Route::post('media/upload', [MediaController::class, 'upload'])->name('media.upload');




// User profile routes
Route::middleware('auth')->group(function () {
    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('user/profile/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('user/profile', [UserController::class, 'update'])->name('user.update');
    // (Optional) Account deletion route
    Route::post('user/profile/delete', [UserController::class, 'destroy'])->name('user.destroy');
});

// Admin routes (for listing users)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');
});


// Home route (public)
Route::get('/', [PostController::class, 'index'])->name('home');

// Post resource routes
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Routes requiring authentication
Route::middleware('auth')->group(function () {
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::post('posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('comments/{comment}/toggle-visibility', [CommentController::class, 'toggleVisibility'])->name('comments.toggleVisibility');
    Route::post('comments/{comment}/delete', [CommentController::class, 'destroy'])->name('comments.destroy');
});

// Authentication routes
require __DIR__.'/auth.php';
