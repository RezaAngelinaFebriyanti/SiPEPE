<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table = 'pengiriman';
    protected $primaryKey = 'id_pengiriman';

    protected $fillable = [
        'id_toko',
        'tgl_kirim',
        'nota_kirim',
        'total_pengiriman'
    ];

    public $timestamps = false;

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }

    public function detailPengiriman()
    {
        return $this->hasMany(DetailPengiriman::class, 'id_pengiriman');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_pengiriman');
    }
}