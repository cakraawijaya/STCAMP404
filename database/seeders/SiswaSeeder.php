<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siswa')->insert([
            'nis' => '20220101',
            'nama_siswa' => 'Jaya Mangunati',
            'pelatihan' => 'Bootstrap 5'
        ]);
        DB::table('siswa')->insert([
            'nis' => '20220102',
            'nama_siswa' => 'Jadiyan Marto',
            'pelatihan' => 'Codeigniter 4'
        ]);
        DB::table('siswa')->insert([
            'nis' => '20220103',
            'nama_siswa' => 'Chondro Aminoto',
            'pelatihan' => 'Git'
        ]);
        DB::table('siswa')->insert([
            'nis' => '20220104',
            'nama_siswa' => 'Gatot Subroto',
            'pelatihan' => 'Laravel 8'
        ]);
        DB::table('siswa')->insert([
            'nis' => '20220105',
            'nama_siswa' => 'Jihan Minarti',
            'pelatihan' => 'Codeigniter 4'
        ]);
    }
}
