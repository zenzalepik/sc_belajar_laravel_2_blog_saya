<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Field yang boleh diisi (mass assignment)
    protected $fillable = [
        'title', 
        'slug', 
        'content', 
        'is_published'
    ];

    // Field yang defaultnya
    protected $attributes = [
        'is_published' => true
    ];
}