<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Wallet;

/**
 * Wallet Repository
 */
class WalletRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(new Wallet());
    }

    /**
     * Find by user ID
     */
    public function findByUserId(int $userId): ?Wallet
    {
        // TODO: Implement custom query
        return null;
    }

    /**
     * Get balance
     */
    public function getBalance(int $userId): float
    {
        $wallet = $this->findByUserId($userId);
        return $wallet ? $wallet->balance : 0;
    }

    /**
     * Get available funds
     */
    public function getAvailable(int $userId): float
    {
        $wallet = $this->findByUserId($userId);
        return $wallet ? $wallet->getAvailable() : 0;
    }
}
