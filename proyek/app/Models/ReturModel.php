<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    protected $table = 'retur';
    protected $primaryKey = 'id_retur';

    protected $fillable = [
        'id_detail_pengiriman',
        'jumlah_retur'
    ];

    public $timestamps = false;

    public function detailPengiriman()
    {
        return $this->belongsTo(DetailPengiriman::class, 'id_detail_pengiriman');
    }
}