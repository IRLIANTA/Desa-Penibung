<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'thumbnail',
        'name',
        'status',
        'start_time',
        'partispasi',
        'date',
        'description',
    ];

    protected $casts = [
        'date' => 'date',
        'partisipasi' => 'number',
        'start_time' => 'datetime',
    ];

}
