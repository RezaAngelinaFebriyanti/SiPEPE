<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoPengiriman extends Model
{
    protected $table = 'info_pengiriman';
    protected $primaryKey = 'id_pengiriman_info';

    protected $fillable = [
        'id_toko',
        'hari',
        'jam_mulai',
        'jam_selesai'
    ];

    public $timestamps = false;

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }
}