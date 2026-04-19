<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Anastasya Geralda',
            'role' => 'admin',
            'email' => 'admin@stcamp404.ac.id',
            'image' => 'asset\img\profile\admin.jpg',
            'password' => bcrypt('123456')
        ]);
        DB::table('users')->insert([
            'siswa_id' => '20220101',
            'name' => 'Jaya Mangunati',
            'role' => 'siswa',
            'email' => '20220101@stcamp404.ac.id',
            'image' => 'asset\img\profile\siswa.jpg',
            'password' => bcrypt('123456')
        ]);
        DB::table('users')->insert([
            'siswa_id' => '20220102',
            'name' => 'Jadiyan Marto',
            'role' => 'siswa',
            'email' => '20220102@stcamp404.ac.id',
            'image' => 'asset\img\profile\default.jpg',
            'password' => bcrypt('123456')
        ]);
        DB::table('users')->insert([
            'siswa_id' => '20220103',
            'name' => 'Chondro Aminoto',
            'role' => 'siswa',
            'email' => '20220103@stcamp404.ac.id',
            'image' => 'asset\img\profile\default.jpg',
            'password' => bcrypt('123456')
        ]);
        DB::table('users')->insert([
            'siswa_id' => '20220104',
            'name' => 'Gatot Subroto',
            'role' => 'siswa',
            'email' => '20220104@stcamp404.ac.id',
            'image' => 'asset\img\profile\default.jpg',
            'password' => bcrypt('123456')
        ]);
        DB::table('users')->insert([
            'siswa_id' => '20220105',
            'name' => 'Jihan Minarti',
            'role' => 'siswa',
            'email' => '20220105@stcamp404.ac.id',
            'image' => 'asset\img\profile\default.jpg',
            'password' => bcrypt('123456')
        ]);
    }
}
