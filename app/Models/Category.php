<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori',
        'slug_kategori'
    ];

    // Relasi ke tabel post_categories
    public function postCategories()
    {
        return $this->hasMany(Post_categories::class);
    }

    // Relasi ke tabel posts melalui post_categories
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_categories', 'category_id', 'post_id');
    }
}
