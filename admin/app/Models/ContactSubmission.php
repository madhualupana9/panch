<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'service',
        'message',
        'status',
        'admin_notes',
        'read_at'
    ];

    protected $casts = [
        'read_at' => 'datetime'
    ];

    public function markAsRead()
    {
        if (!$this->read_at) {
            $this->update([
                'read_at' => now(),
                'status' => 'read'
            ]);
        }
    }
}
