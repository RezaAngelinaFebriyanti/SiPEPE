<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_pengiriman',
        'tgl_pembayaran',
        'nominal_pembayaran'
    ];

    public $timestamps = false;

    public function pengiriman()
    {
        return $this->belongsTo(Pengiriman::class, 'id_pengiriman');
    }
}