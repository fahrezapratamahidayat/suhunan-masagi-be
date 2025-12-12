<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'type',
        'content',
        'excerpt',
        'status',
        'published_at',
        'user_id',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
