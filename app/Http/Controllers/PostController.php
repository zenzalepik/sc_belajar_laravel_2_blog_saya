<?php
// D:\Github\sc_belajar_laravel_2_blog_saya\app\Http\Controllers\PostController.php

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

    /**
     * Show form untuk create new post
     */
    public function create()
    {
        return view('posts.create', [
            'title' => 'Create New Post'
        ]);
    }

    /**
     * Store new post ke database
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required|min:10',
        ]);

        // Auto-generate slug dari title
        $validated['slug'] = \Str::slug($validated['title']);

        // Create post
        Post::create($validated);

        return redirect('/posts')->with('success', 'Post created successfully!');
    }

    /**
     * Show form untuk edit post
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', [
            'post' => $post,
            'title' => 'Edit Post: ' . $post->title
        ]);
    }

    /**
     * Update post di database
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required|min:10',
            'is_published' => 'boolean'
        ]);

        // Update slug hanya jika title berubah
        if ($post->title !== $validated['title']) {
            $validated['slug'] = \Str::slug($validated['title']);
        }

        $post->update($validated);

        return redirect('/posts/' . $id)->with('success', 'Post updated successfully!');
    }

    /**
     * Delete post dari database
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/posts')->with('success', 'Post deleted successfully!');
    }
}
