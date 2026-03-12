<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name',
        'display_name',
        'description',
        'module',
    ];

    /**
     * Get the roles that have this permission.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission');
    }

    /**
     * Get the users that have this permission through roles.
     */
    public function users()
    {
        return $this->hasManyThrough(User::class, Role::class, 'id', 'role_id', 'id', 'id')
            ->whereHas('roles', function ($query) {
                $query->whereHas('permissions', function ($subQuery) {
                    $subQuery->where('permissions.id', $this->id);
                });
            });
    }
}
