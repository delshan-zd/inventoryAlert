<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'type',
        'product_id',
        'message',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];
}
