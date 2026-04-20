<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('levels')->insert([
            [
                'id' => 1,
                'level_kode' => 'ADM',
                'level_nama' => 'Administrator',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'level_kode' => 'SLS',
                'level_nama' => 'Sales',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
