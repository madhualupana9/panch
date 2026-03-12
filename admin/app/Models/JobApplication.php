<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class JobApplication extends Model
{
    protected $fillable = [
        'career_id',
        'full_name',
        'email',
        'phone',
        'position_applied',
        'resume_path',
        'resume_original_name',
        'cover_letter',
        'linkedin_url',
        'portfolio_url',
        'years_of_experience',
        'current_location',
        'expected_salary',
        'notice_period',
        'ip_address',
        'user_agent',
        'email_hash',
        'email_verified_at',
        'status',
        'admin_notes',
        'reviewed_at',
        'reviewed_by',
        'is_spam',
        'is_duplicate'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'reviewed_at' => 'datetime',
        'is_spam' => 'boolean',
        'is_duplicate' => 'boolean',
        'years_of_experience' => 'integer'
    ];

    /**
     * Relationship with Career
     */
    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    /**
     * Relationship with User (reviewer)
     */
    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    /**
     * Get the resume URL
     */
    public function getResumeUrlAttribute()
    {
        if ($this->resume_path) {
            return Storage::url($this->resume_path);
        }
        return null;
    }

    /**
     * Check if application is duplicate
     */
    public static function isDuplicate($email, $careerId = null, $withinDays = 30)
    {
        $query = self::where('email_hash', md5(strtolower(trim($email))))
            ->where('created_at', '>=', now()->subDays($withinDays));

        if ($careerId) {
            $query->where('career_id', $careerId);
        }

        return $query->exists();
    }

    /**
     * Check if IP has submitted too many applications
     */
    public static function isSpamByIp($ipAddress, $maxApplications = 5, $withinHours = 24)
    {
        $count = self::where('ip_address', $ipAddress)
            ->where('created_at', '>=', now()->subHours($withinHours))
            ->count();

        return $count >= $maxApplications;
    }

    /**
     * Scope for filtering by status
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope for non-spam applications
     */
    public function scopeNotSpam($query)
    {
        return $query->where('is_spam', false);
    }

    /**
     * Scope for recent applications
     */
    public function scopeRecent($query, $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }
}
