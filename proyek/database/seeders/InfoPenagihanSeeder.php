<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoPenagihanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('info_penagihan')->insert([
            [
                'id_toko'=>'1',
                'hari'=>'Rabu',
                'jam_mulai'=>'08:00',
                'jam_selesai'=>'13:00'
            ],
            [
                'id_toko'=>'2',
                'hari'=>'Senin',
                'jam_mulai'=>'08:00',
                'jam_selesai'=>'14:00'
            ]
        ]);
    }
}
