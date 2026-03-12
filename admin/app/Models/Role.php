<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];

    /**
     * Get the users for the role.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the permissions for the role.
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }

    /**
     * Check if role has a specific permission.
     */
    public function hasPermission($permission)
    {
        if (is_string($permission)) {
            return $this->permissions->contains('name', $permission);
        }

        return $this->permissions->contains($permission);
    }

    /**
     * Check if role has any of the given permissions.
     */
    public function hasAnyPermission($permissions)
    {
        if (is_string($permissions)) {
            $permissions = [$permissions];
        }

        foreach ($permissions as $permission) {
            if ($this->hasPermission($permission)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if role has all of the given permissions.
     */
    public function hasAllPermissions($permissions)
    {
        if (is_string($permissions)) {
            $permissions = [$permissions];
        }

        foreach ($permissions as $permission) {
            if (!$this->hasPermission($permission)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Assign permission to role.
     */
    public function givePermissionTo($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::where('name', $permission)->first();
        }

        if ($permission && !$this->hasPermission($permission)) {
            $this->permissions()->attach($permission);
        }

        return $this;
    }

    /**
     * Remove permission from role.
     */
    public function revokePermissionTo($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::where('name', $permission)->first();
        }

        if ($permission) {
            $this->permissions()->detach($permission);
        }

        return $this;
    }

    /**
     * Sync permissions for role.
     */
    public function syncPermissions($permissions)
    {
        $permissionIds = [];

        foreach ($permissions as $permission) {
            if (is_string($permission)) {
                $permissionModel = Permission::where('name', $permission)->first();
                if ($permissionModel) {
                    $permissionIds[] = $permissionModel->id;
                }
            } elseif (is_numeric($permission)) {
                $permissionIds[] = $permission;
            } elseif ($permission instanceof Permission) {
                $permissionIds[] = $permission->id;
            }
        }

        $this->permissions()->sync($permissionIds);
        return $this;
    }
}
