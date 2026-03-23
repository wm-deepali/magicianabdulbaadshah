<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'title',
        'price',
        'features',
        'is_popular',
        'button_text'
    ];

    protected $casts = [
        'features' => 'array'
    ];
}