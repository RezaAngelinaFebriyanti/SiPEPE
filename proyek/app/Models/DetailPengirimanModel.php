<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BarangModel;
use App\Models\PengirimanModel;

class DetailPengirimanModel extends Model
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
        return $this->belongsTo(PengirimanModel::class, 'id_pengiriman');
    }

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'id_barang');
    }

    public function retur()
    {
        return $this->hasMany(Retur::class, 'id_detail_pengiriman');
    }
}