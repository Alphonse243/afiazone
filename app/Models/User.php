<?php

declare(strict_types=1);

namespace App\Models;

/**
 * User Model
 */
class User extends BaseModel
{
    protected string $table = 'users';
    protected string $primaryKey = 'id';

    protected array $fillable = [
        'email',
        'phone',
        'password',
        'name',
        'status',
        'created_at',
        'updated_at',
    ];

    /**
     * Get user roles
     */
    public function getRoles(): array
    {
        // TODO: Fetch user roles from database
        return [];
    }

    /**
     * Check if user has role
     */
    public function hasRole(string $role): bool
    {
        return in_array($role, $this->getRoles());
    }

    /**
     * Get user permissions
     */
    public function getPermissions(): array
    {
        // TODO: Fetch permissions based on roles
        return [];
    }
}
