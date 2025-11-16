<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // JANGAN LUPA IMPORT MODEL

class PostController extends Controller
{
    public function index()
    {
        // Ambil data dari database (hanya yang published)
        $posts = Post::where('is_published', true)
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('posts.index', [
            'posts' => $posts,
            'title' => 'All Blog Posts'
        ]);
    }

    public function show($id)
    {
        // Cari post by ID
        $post = Post::find($id);

        // Jika post tidak ditemukan
        if (!$post) {
            abort(404, 'Post tidak ditemukan');
        }

        // Jika post tidak published, redirect
        if (!$post->is_published) {
            return redirect('/posts')->with('error', 'Post tidak tersedia');
        }

        return view('posts.show', [
            'post' => $post,
            'title' => $post->title
        ]);
    }
}