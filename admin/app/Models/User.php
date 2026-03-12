<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'last_login_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get the role that owns the user.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Check if user is admin
     */
    public function isAdmin()
    {
        return $this->role && $this->role->name === 'admin';
    }

    /**
     * Check if user has a specific permission.
     */
    public function hasPermission($permission)
    {
        if (!$this->role) {
            return false;
        }

        return $this->role->hasPermission($permission);
    }

    /**
     * Check if user has any of the given permissions.
     */
    public function hasAnyPermission($permissions)
    {
        if (!$this->role) {
            return false;
        }

        return $this->role->hasAnyPermission($permissions);
    }

    /**
     * Check if user has all of the given permissions.
     */
    public function hasAllPermissions($permissions)
    {
        if (!$this->role) {
            return false;
        }

        return $this->role->hasAllPermissions($permissions);
    }

    /**
     * Check if user can access a specific module.
     */
    public function canAccess($module)
    {
        // Admin can access everything
        if ($this->isAdmin()) {
            return true;
        }

        // Check if user has any permission for the module
        if (!$this->role) {
            return false;
        }

        return $this->role->permissions()
            ->where('module', $module)
            ->exists();
    }

    /**
     * Check if user can perform a specific action on a module.
     */
    public function can($action, $module = null)
    {
        // Admin can do everything
        if ($this->isAdmin()) {
            return true;
        }

        if ($module) {
            $permission = "{$module}.{$action}";
        } else {
            $permission = $action;
        }

        return $this->hasPermission($permission);
    }

    /**
     * Get all permissions for the user through their role.
     */
    public function getAllPermissions()
    {
        if (!$this->role) {
            return collect();
        }

        return $this->role->permissions;
    }

    /**
     * Get permissions grouped by module.
     */
    public function getPermissionsByModule()
    {
        return $this->getAllPermissions()->groupBy('module');
    }
}
