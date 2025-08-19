<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded= [];

    // protected $fillable = [
    //     'thumbnail',
    //     'name',
    //     'status',
    //     'start_time',
    //     'partisipasi',
    //     'date',
    //     'description',
    // ];

    protected $casts = [
        'date' => 'date',

    ];

}
