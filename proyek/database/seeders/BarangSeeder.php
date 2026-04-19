<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('barang')->insert([
            [
                'nama_barang' => 'Samiler',
                'harga' => 13000
            ],
            [
                'nama_barang' => 'Rengginang',
                'harga' => 13000
            ]
        ]);
    }
}