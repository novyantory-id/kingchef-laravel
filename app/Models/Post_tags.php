<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post_tags extends Model
{
    // Relasi ke tabel posts
    public function post()
    {
        // many-to-one
        return $this->belongsTo(Post::class);
    }

    public function tag()
    {
        // many-to-one
        return $this->belongsTo(Tag::class);
    }
}
