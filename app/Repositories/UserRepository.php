<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;

/**
 * User Repository
 */
class UserRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(new User());
    }

    /**
     * Find by email
     */
    public function findByEmail(string $email): ?User
    {
        // TODO: Implement custom query to find by email
        return null;
    }

    /**
     * Find by phone
     */
    public function findByPhone(string $phone): ?User
    {
        // TODO: Implement custom query to find by phone
        return null;
    }

    /**
     * Find active users
     */
    public function findActive(): array
    {
        // TODO: Implement custom query
        return [];
    }
}
