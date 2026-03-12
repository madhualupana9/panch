<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'status',
        'read_at'
    ];

    protected $casts = [
        'read_at' => 'datetime'
    ];
}
