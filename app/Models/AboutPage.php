<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $fillable = [
        'title',
        'description',
        'story',
        'mission',
        'vision',
        'image',
        'years',
        'events',
        'success_rate',
        'button_text'
    ];
}
