<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Order;

/**
 * Order Repository
 */
class OrderRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(new Order());
    }

    /**
     * Find by order number
     */
    public function findByOrderNumber(string $orderNumber): ?Order
    {
        // TODO: Implement custom query
        return null;
    }

    /**
     * Find user orders
     */
    public function findByUser(int $userId): array
    {
        // TODO: Implement custom query
        return [];
    }

    /**
     * Find orders by status
     */
    public function findByStatus(string $status): array
    {
        // TODO: Implement custom query
        return [];
    }
}
