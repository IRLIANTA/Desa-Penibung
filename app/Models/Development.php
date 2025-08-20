<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Development extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_dana',
        'thumbnail',
        'nama_projek',
        'giver',
        'status',
        'tanggal_pembangunan',
        'hari',
        'deskripsi',
    ];
}
