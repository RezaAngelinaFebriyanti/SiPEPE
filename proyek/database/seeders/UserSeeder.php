<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Reza Angelina',
                'username' => 'admin',
                'password' => Hash::make('12345'),
                'level_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Katrina Kaif',
                'username' => 'sales',
                'password' => Hash::make('12345'),
                'level_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
