<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Wallet Model
 */
class Wallet extends BaseModel
{
    protected string $table = 'wallets';
    protected string $primaryKey = 'id';

    protected array $fillable = [
        'user_id',
        'balance',
        'reserved',
        'created_at',
        'updated_at',
    ];

    /**
     * Get available balance
     */
    public function getAvailable(): float
    {
        return ($this->balance ?? 0) - ($this->reserved ?? 0);
    }

    /**
     * Get transactions
     */
    public function getTransactions(?int $limit = null): array
    {
        // TODO: Fetch transactions from database
        return [];
    }
}
