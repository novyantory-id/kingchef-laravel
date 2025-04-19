<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tag',
        'slug_tag',
        'img_tag'
    ];

    // Relasi ke tabel post_categories
    public function postTags()
    {
        return $this->hasMany(Post_tags::class);
    }

    // Relasi ke tabel posts melalui post_categories
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags', 'tag_id', 'post_id')
            ->where('status_post', 'publish');
    }

    //popular tags
    public function scopePopular($query)
    {
        return $query->withCount('posts')
            ->having('posts_count', '>', 0) // Hanya tag dengan post publish
            ->orderBy('posts_count', 'desc');
        //posts_count adalah hasil dari operasi withCount() yang disediakan oleh Eloquent Laravel.
    }
}
