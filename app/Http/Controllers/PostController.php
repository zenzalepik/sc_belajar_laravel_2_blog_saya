<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = [
            ['id' => 1, 'title' => 'Belajar Laravel', 'content' => 'Content post 1...'],
            ['id' => 2, 'title' => 'Tips Programming', 'content' => 'Content post 2...'],
            ['id' => 3, 'title' => 'Web Development', 'content' => 'Content post 3...'],
        ];

        return view('posts.index', [
            'posts' => $posts,
            'title' => 'All Blog Posts'
        ]);
    }

    public function show($id)
    {
        $post = ['id' => $id, 'title' => 'Post ' . $id, 'content' => 'Ini adalah content untuk post ' . $id];
        
        return view('posts.show', [
            'post' => $post,
            'title' => 'Post Detail'
        ]);
    }
}