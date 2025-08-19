<?php

// app/Models/Event.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'thumbnail',
        'name',
        'status',
        'start_time',
        'date',
        'duration_days',
        'description'
    ];
}
