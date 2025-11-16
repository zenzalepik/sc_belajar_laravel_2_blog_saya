<?php

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
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);

