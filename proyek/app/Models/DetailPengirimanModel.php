<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPengiriman extends Model
{
    protected $table = 'detail_pengiriman';
    protected $primaryKey = 'id_detail_pengiriman';

    protected $fillable = [
        'id_pengiriman',
        'id_barang',
        'exp_date',
        'jumlah_kirim'
    ];

    public $timestamps = false;

    public function pengiriman()
    {
        return $this->belongsTo(Pengiriman::class, 'id_pengiriman');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    public function retur()
    {
        return $this->hasMany(Retur::class, 'id_detail_pengiriman');
    }
}