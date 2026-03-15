<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrrEnquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'source',
        'status',
        'admin_notes',
        'read_at',
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    public function markAsRead()
    {
        if (!$this->read_at) {
            $this->update([
                'read_at' => now(),
                'status' => 'read',
            ]);
        }
    }
}
