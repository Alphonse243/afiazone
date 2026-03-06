<?php

declare(strict_types=1);

namespace App\Controllers;

/**
 * Order Controller
 */
class OrderController extends BaseController
{
    /**
     * List user orders
     */
    public function index(): void
    {
        $this->authorize('view_orders');

        // TODO: Fetch user orders with status
        // TODO: Pagination

        $this->jsonResponse([
            'orders' => [],
            'total' => 0,
        ]);
    }

    /**
     * Get order details
     */
    public function show(int $id): void
    {
        // TODO: Fetch order with items, shipping, status history

        $this->jsonResponse(['order' => []]);
    }

    /**
     * Create order from cart
     */
    public function store(): void
    {
        if ($this->method !== 'POST') {
            $this->errorResponse('Method not allowed', 405);
            return;
        }

        $this->authorize('create_order');

        // TODO: Validate cart
        // TODO: Create order
        // TODO: Reserve funds/process payment
        // TODO: Create shipment

        $this->jsonResponse(['order' => []], 201);
    }

    /**
     * Update order status
     */
    public function updateStatus(int $id): void
    {
        if (!in_array($this->method, ['PUT', 'PATCH'])) {
            $this->errorResponse('Method not allowed', 405);
            return;
        }

        $this->authorize('update_order');

        $status = $this->getData('status');

        // TODO: Update order status
        // TODO: Log status change
        // TODO: Notify user

        $this->jsonResponse(['order' => []]);
    }

    /**
     * Cancel order
     */
    public function cancel(int $id): void
    {
        if ($this->method !== 'POST') {
            $this->errorResponse('Method not allowed', 405);
            return;
        }

        // TODO: Check if order can be cancelled
        // TODO: Refund payment
        // TODO: Update status

        $this->jsonResponse(['message' => 'Order cancelled']);
    }
}
