<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TokoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('toko')->insert([
            [
                'nama_toko' => "Boe Liem"
            ],
            [
                'nama_toko' => "Amanda Brownies"
            ]
        ]);
    }
}
