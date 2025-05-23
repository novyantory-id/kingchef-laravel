<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'nama_kategori' => 'Makanan Utama',
                'slug_kategori' => 'makanan-utama',
                'gambar_kategori' => 'gambar-kategori.jpg'
            ],
        ]);
    }
}
