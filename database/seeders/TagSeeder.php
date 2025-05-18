<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            [
                'nama_tag' => 'panggang',
                'slug_tag' => 'panggang',
            ],
            [
                'nama_tag' => 'manis',
                'slug_tag' => 'manis',
            ],
            [
                'nama_tag' => 'tumis',
                'slug_tag' => 'tumis',
            ],
            [
                'nama_tag' => 'kukus',
                'slug_tag' => 'kukus',
            ],
            [
                'nama_tag' => 'rebus',
                'slug_tag' => 'rebus',
            ],
            [
                'nama_tag' => 'bakar',
                'slug_tag' => 'bakar',
            ],
            [
                'nama_tag' => 'asam',
                'slug_tag' => 'asam',
            ],
            [
                'nama_tag' => 'gurih',
                'slug_tag' => 'gurih',
            ],
        ]);
    }
}
