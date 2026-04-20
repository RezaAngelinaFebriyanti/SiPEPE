<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailPengirimanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('detail_pengiriman')->insert([
            // Pengiriman 1
            [
                'id_pengiriman' => 1,
                'id_barang' => 1, // Samiler
                'exp_date' => '2026-07-01',
                'jumlah_kirim' => 10
            ],
            [
                'id_pengiriman' => 1,
                'id_barang' => 2, // Rengginang
                'exp_date' => '2026-08-01',
                'jumlah_kirim' => 5
            ],

            // Pengiriman 2
            [
                'id_pengiriman' => 2,
                'id_barang' => 1,
                'exp_date' => '2026-07-01',
                'jumlah_kirim' => 8
            ],
            [
                'id_pengiriman' => 2,
                'id_barang' => 2,
                'exp_date' => '2026-08-01',
                'jumlah_kirim' => 6
            ]
        ]);

        // Hitung total_pengiriman otomatis
        DB::statement("
            UPDATE pengiriman
            SET total_pengiriman = (
                SELECT SUM(dp.jumlah_kirim * b.harga)
                FROM detail_pengiriman dp
                JOIN barang b ON dp.id_barang = b.id_barang
                WHERE dp.id_pengiriman = pengiriman.id_pengiriman
            )
        ");
    }
}
