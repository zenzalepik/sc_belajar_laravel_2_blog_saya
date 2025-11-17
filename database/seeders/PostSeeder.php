<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::truncate();

        $user = User::first();
        
        if (!$user) {
            $user = User::factory()->create([
                'name' => 'Admin User',
                'email' => 'admin@blog.com',
            ]);
        }

        $posts = [
            [
                'title' => 'Belajar Laravel Part 1',
                'slug' => 'belajar-laravel-part-1',
                'content' => 'Content belajar Laravel part 1...',
                'is_published' => true,
                'user_id' => $user->id
            ],
            [
                'title' => 'Tips Programming', 
                'slug' => 'tips-programming',
                'content' => 'Tips programming untuk pemula...',
                'is_published' => true,
                'user_id' => $user->id
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}

// <?php

// namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;
// use App\Models\Post;

// class PostSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         // Hapus semua data existing
//         Post::truncate();

//         // Buat sample posts
//         $posts = [
//             [
//                 'title' => 'Belajar Laravel Part 1',
//                 'slug' => 'belajar-laravel-part-1',
//                 'content' => 'Ini adalah content untuk belajar Laravel part 1. Kita akan mempelajari basic routing dan views.',
//                 'is_published' => true
//             ],
//             [
//                 'title' => 'Tips Programming Pemula',
//                 'slug' => 'tips-programming-pemula', 
//                 'content' => 'Berikut tips untuk pemula yang ingin belajar programming: practice every day, build projects, jangan takut error.',
//                 'is_published' => true
//             ],
//             [
//                 'title' => 'Mengenal Database Relationships',
//                 'slug' => 'mengenal-database-relationships',
//                 'content' => 'Database relationships penting dalam pengembangan aplikasi. Ada one-to-one, one-to-many, dan many-to-many.',
//                 'is_published' => true
//             ],
//             [
//                 'title' => 'Draft Post Belum Publish',
//                 'slug' => 'draft-post-belum-publish',
//                 'content' => 'Ini adalah post yang masih draft dan belum dipublish.',
//                 'is_published' => false
//             ]
//         ];

//         // Insert ke database
//         foreach ($posts as $post) {
//             Post::create($post);
//         }
//     }
// }