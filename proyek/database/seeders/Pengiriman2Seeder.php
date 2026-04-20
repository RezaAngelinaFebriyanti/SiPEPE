<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Pengiriman2Seeder extends Seeder
{
    public function run(): void
    {
        DB::table('pengiriman')->insert([
            [
                'id_pengiriman' => 1,
                'id_toko' => 1,
                'tgl_kirim' => '2026-04-20',
                'nota_kirim' => 'nota1.jpg',
                'total_pengiriman' => 0
            ],
            [
                'id_pengiriman' => 2,
                'id_toko' => 1,
                'tgl_kirim' => '2026-04-21',
                'nota_kirim' => 'nota2.jpg',
                'total_pengiriman' => 0
            ]
        ]);
    }
}
