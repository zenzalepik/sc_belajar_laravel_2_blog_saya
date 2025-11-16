<?php
// D:\Github\sc_belajar_laravel_2_blog_saya\routes\web.php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    // return view('welcome');
    return view('home');  // Ganti dari 'welcome' ke 'home'
});

// ===== ROUTE BARU KITA =====

// Route about page
Route::get('/about', function () {
    return '<h1>About My Blog</h1><p>Ini adalah blog sederhana buatan saya!</p>';
});

// Route dengan parameter
Route::get('/user/{id}', function ($id) {
    return "User ID: " . $id;
});


// Route dengan Controller
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::get('/posts/{id}/edit', [PostController::class, 'edit']);
Route::put('/posts/{id}', [PostController::class, 'update']);
Route::delete('/posts/{id}', [PostController::class, 'destroy']);

// ===== ROUTE SOFT DELETE =====
// Route::get('/posts/trashed', [PostController::class, 'trashed'])->name('posts.trashed');
// Route::put('/posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
// Route::delete('/posts/{id}/force-delete', [PostController::class, 'forceDelete'])->name('posts.force-delete');
