<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Order Model
 */
class Order extends BaseModel
{
    protected string $table = 'orders';
    protected string $primaryKey = 'id';

    protected array $fillable = [
        'user_id',
        'order_number',
        'status',
        'total_amount',
        'tax_amount',
        'shipping_amount',
        'created_at',
        'updated_at',
    ];

    /**
     * Get order items
     */
    public function getItems(): array
    {
        // TODO: Fetch order items from database
        return [];
    }

    /**
     * Get shipment
     */
    public function getShipment(): ?array
    {
        // TODO: Fetch shipment from database
        return null;
    }

    /**
     * Get status history
     */
    public function getStatusHistory(): array
    {
        // TODO: Fetch status history from database
        return [];
    }
}
