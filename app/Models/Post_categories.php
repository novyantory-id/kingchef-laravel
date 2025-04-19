<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post_categories extends Model
{
    protected $fillable = ['post_id', 'category_id'];

    // Relasi ke tabel posts
    public function post()
    {
        // many-to-one
        return $this->belongsTo(Post::class);
    }

    // Relasi ke tabel categories
    public function category()
    {
        // many-to-one
        return $this->belongsTo(Category::class);
    }

    // public function tag()
    // {
    //     // many-to-one
    //     return $this->belongsTo(Tag::class);
    // }
}
