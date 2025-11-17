<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'content', 'is_published', 'user_id'
    ];

    protected $attributes = [
        'is_published' => true
    ];

    // Relationship dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            // Auto-generate slug
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
            
            // Auto-set user_id
            if (Auth::check()) {
                $post->user_id = Auth::id();
            }
        });
    }
}

// <?php
// // D:\Github\sc_belajar_laravel_2_blog_saya\app\Models\Post.php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Post extends Model
// {
//     use HasFactory;

//     // Field yang boleh diisi (mass assignment)
//     protected $fillable = [
//         'title',
//         'slug',
//         'content',
//         'is_published'
//     ];

//     // Field yang defaultnya
//     protected $attributes = [
//         'is_published' => true
//     ];
// }
