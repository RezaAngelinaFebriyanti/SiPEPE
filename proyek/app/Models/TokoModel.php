<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\InfoPengirimanModel;
use App\Models\InfoPenagihanModel;
use App\Models\PengirimanModel;

class TokoModel extends Model
{
    protected $table = 'toko';
    protected $primaryKey = 'id_toko';

    protected $fillable = [
        'nama_toko'
    ];

    public $timestamps = false;

    public function pengiriman()
    {
        return $this->hasMany(PengirimanModel::class, 'id_toko');
    }

    public function infoPengiriman()
    {
        return $this->hasMany(InfoPengirimanModel::class, 'id_toko');
    }

    public function infoPenagihan()
    {
        return $this->hasMany(InfoPenagihanModel::class, 'id_toko');
    }
}