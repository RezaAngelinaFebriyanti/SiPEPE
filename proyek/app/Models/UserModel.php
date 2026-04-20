<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Models\LevelModel;

class UserModel extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'username',
        'password',
        'level_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function level()
    {
        return $this->belongsTo(LevelModel::class, 'level_id');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
