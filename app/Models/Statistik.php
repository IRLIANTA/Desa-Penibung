<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistik extends Model
{
    protected $table = 'statistik';

    protected $fillable = [
        'id',
        'jml_penduduk',
        'jml_rumah',
        'jml_pria',
        'jml_wanita',
        'jml_kepala_keluarga',
        'jml_kk',
        'pembangunan',
    ];
    public $timestamps = false;

}
