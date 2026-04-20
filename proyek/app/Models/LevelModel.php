<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserModel;

class LevelModel extends Model
{
    protected $table = 'levels';

    protected $fillable = [
        'level_kode',
        'level_nama'
    ];

    // relasi ke user (1 level punya banyak user)
    public function users()
    {
        return $this->hasMany(UserModel::class, 'level_id');
    }
}
