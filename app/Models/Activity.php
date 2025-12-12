<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'date',
        'start_time',
        'end_time',
        'location',
        'status',
        'content',
        'excerpt',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
