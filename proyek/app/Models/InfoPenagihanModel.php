<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TokoModel;

class InfoPenagihanModel extends Model
{
    protected $table = 'info_penagihan';
    protected $primaryKey = 'id_penagihan';

    protected $fillable = [
        'id_toko',
        'hari',
        'jam_mulai',
        'jam_selesai'
    ];

    public $timestamps = false;

    public function toko()
    {
        return $this->belongsTo(TokoModel::class, 'id_toko');
    }
}