<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus semua data existing
        Post::truncate();

        // Buat sample posts
        $posts = [
            [
                'title' => 'Belajar Laravel Part 1',
                'slug' => 'belajar-laravel-part-1',
                'content' => 'Ini adalah content untuk belajar Laravel part 1. Kita akan mempelajari basic routing dan views.',
                'is_published' => true
            ],
            [
                'title' => 'Tips Programming Pemula',
                'slug' => 'tips-programming-pemula', 
                'content' => 'Berikut tips untuk pemula yang ingin belajar programming: practice every day, build projects, jangan takut error.',
                'is_published' => true
            ],
            [
                'title' => 'Mengenal Database Relationships',
                'slug' => 'mengenal-database-relationships',
                'content' => 'Database relationships penting dalam pengembangan aplikasi. Ada one-to-one, one-to-many, dan many-to-many.',
                'is_published' => true
            ],
            [
                'title' => 'Draft Post Belum Publish',
                'slug' => 'draft-post-belum-publish',
                'content' => 'Ini adalah post yang masih draft dan belum dipublish.',
                'is_published' => false
            ]
        ];

        // Insert ke database
        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}