<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $table = 'toko';
    protected $primaryKey = 'id_toko';

    protected $fillable = [
        'nama_toko'
    ];

    public $timestamps = false;

    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class, 'id_toko');
    }

    public function infoPengiriman()
    {
        return $this->hasMany(InfoPengiriman::class, 'id_toko');
    }

    public function infoPenagihan()
    {
        return $this->hasMany(InfoPenagihan::class, 'id_toko');
    }
}