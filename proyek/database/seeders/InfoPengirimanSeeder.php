<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoPengirimanSeeder extends Seeder
{ 
    public function run(): void
    {
        DB::table('info_pengiriman')->insert([
            [
                'id_toko'=>'1',
                'hari'=>'Weekday',
                'jam_mulai'=>'09:00',
                'jam_selesai'=>'15:00'
            ],
            [
                'id_toko'=>'2',
                'hari'=>'Weekday',
                'jam_mulai'=>'07:00',
                'jam_selesai'=>'12:00'
            ]
        ]);
    }
}