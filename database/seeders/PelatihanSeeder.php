<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelatihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelatihan')->insert([
            'nama_pelatihan' => 'Bootstrap 5',
            'waktu_pelatihan' => '2022-10-02'
        ]);
        DB::table('pelatihan')->insert([
            'nama_pelatihan' => 'Git',
            'waktu_pelatihan' => '2022-10-20'
        ]);
        DB::table('pelatihan')->insert([
            'nama_pelatihan' => 'Laravel 8',
            'waktu_pelatihan' => '2022-11-12'
        ]);
        DB::table('pelatihan')->insert([
            'nama_pelatihan' => 'Codeigniter 4',
            'waktu_pelatihan' => '2022-12-05'
        ]);
    }
}
