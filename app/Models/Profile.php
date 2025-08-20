<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';
    protected $fillable = [
        'id',
        'desa_name',
        'location',
        'kepala_desa_name',
        'kepala_desa_profil',
        'luas_petanian',
        'luas_area',
        'tgl_desa_dibangun',
        'description',
    ];

    public $timestamps = false;
}
