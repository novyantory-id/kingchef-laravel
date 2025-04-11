<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title_post',
        'slug_post',
        'keyword_post',
        'thumbnail_post',
        'content_post',
        'status_post',
        'is_editor_pick',
        'editor_pick_priority'
    ];

    // Relasi ke tabel users
    public function user()
    {
        // many-to-one
        return $this->belongsTo(User::class);
    }

    // Relasi ke tabel post_categories
    public function postCategories()
    {
        //one-to-many
        return $this->hasMany(Post_categories::class);
    }

    // Relasi ke tabel categories melalui post_categories
    public function categories()
    {
        //many-to-many
        return $this->belongsToMany(Category::class, 'post_categories', 'post_id', 'category_id');
    }
    // Karena relasi many-to-many tidak bisa langsung dilakukan antara dua tabel, kita membutuhkan tabel pivot (perantara) yang menghubungkan kedua tabel tersebut. Dalam kasus ini, tabel pivotnya adalah post_categories.

    // Struktur tabel post_categories:
    // post_id: Foreign key yang merujuk ke tabel posts.
    // category_id: Foreign key yang merujuk ke tabel categories.

    public function tags()
    {
        //many-to-many
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
}
