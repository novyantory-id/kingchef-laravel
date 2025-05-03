<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostView extends Model
{
    protected $fillable = [
        'post_id',
        'ip_address',
        'device_id',
        'user_agent'
    ]; // Izinkan semua kolom diisi

    // Relasi ke Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
