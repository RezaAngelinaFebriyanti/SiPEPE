<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\DetailPengirimanModel;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'nama_barang',
        'harga'
    ];

    public $timestamps = false;

    public function detailPengiriman()
    {
        return $this->hasMany(DetailPengiriman::class, 'id_barang');
    }
}