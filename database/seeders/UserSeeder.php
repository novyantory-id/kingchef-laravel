<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     [
        //         'username' => 'admin',
        //         'fullname' => 'Administrator',
        //         'email' => 'admin@gmail.com',
        //         'password' => bcrypt('123456'),
        //         'nohp' => '089722223333',
        //         'avatar' => 'default.png',
        //         'role' => 'admin',
        //         'status_user' => 'aktif'
        //     ],
        // ]);

        DB::table('users')->insert([
            [
                'username' => 'admin',
                'fullname' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'nohp' => '0897222232222',
                'avatar' => '48E9UQkTr2Sg0Xfaq2xk5zSDTf1F6HZWXHnrhGHA.jpg',
                'role' => 'admin',
                'status_user' => 'aktif'
            ],
            [
                'username' => 'budiono',
                'fullname' => 'Budiono Siregar',
                'email' => 'budiono@gmail.com',
                'password' => bcrypt('123456'),
                'nohp' => '089722223111',
                'avatar' => '48E9UQkTr2Sg0Xfaq2xk5zSDTf1F6HZWXHnrhGHA.jpg',
                'role' => 'writer',
                'status_user' => 'aktif'
            ],
        ]);
    }
}
