<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'user_id' => 12,
                'title_post' => 'Resep Magic Water',
                'slug_post' => 'resep-magic-water',
                'keyword_post' => 'resep magic water',
                'thumbnail_post' => 'image-content.jpg',
                'content_post' => 'Membuat minuman magic water ternyata sangat mudah hanya dua bahan saja',
                'status_post' => 'publish',
            ],
        ]);
    }
}
