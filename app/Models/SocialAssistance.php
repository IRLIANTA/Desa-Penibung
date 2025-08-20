<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialAssistance extends Model
{
    use HasFactory;

    protected $guarded= [];
    
    protected $fillable = [
        'thumbnail',
        'name',
        'category',
        'amount',
        'giver_name',
        'date',
        'description',
        'availability',
    ];
}
