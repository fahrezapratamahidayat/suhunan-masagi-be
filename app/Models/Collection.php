<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'gallery',
        'description',
        'type',
        'is_visible',
    ];

    protected $casts = [
        'gallery' => 'array',
        'is_visible' => 'boolean',
    ];
}
