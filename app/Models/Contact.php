<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'service_id',
        'event_date',
        'message',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}