<?php

declare(strict_types=1);

namespace App\Controllers;

/**
 * Product Controller
 */
class ProductController extends BaseController
{
    /**
     * List products
     */
    public function index(): void
    {
        // TODO: Fetch products with filters
        // TODO: Pagination

        $this->jsonResponse([
            'products' => [],
            'total' => 0,
            'page' => 1,
            'per_page' => 20,
        ]);
    }

    /**
     * Get product by ID
     */
    public function show(int $id): void
    {
        // TODO: Fetch product details
        // TODO: Fetch reviews
        // TODO: Fetch variants

        $this->jsonResponse([
            'product' => [],
        ]);
    }

    /**
     * Create product (merchant only)
     */
    public function store(): void
    {
        if ($this->method !== 'POST') {
            $this->errorResponse('Method not allowed', 405);
            return;
        }

        $this->authorize('create_product');

        $data = $this->getData();

        // TODO: Validate product data
        // TODO: Create product
        // TODO: Handle images

        $this->jsonResponse(['product' => []], 201);
    }

    /**
     * Update product
     */
    public function update(int $id): void
    {
        if (!in_array($this->method, ['PUT', 'PATCH'])) {
            $this->errorResponse('Method not allowed', 405);
            return;
        }

        $this->authorize('update_product');

        // TODO: Validate and update product

        $this->jsonResponse(['product' => []]);
    }

    /**
     * Delete product
     */
    public function destroy(int $id): void
    {
        if ($this->method !== 'DELETE') {
            $this->errorResponse('Method not allowed', 405);
            return;
        }

        $this->authorize('delete_product');

        // TODO: Delete product

        $this->jsonResponse(['message' => 'Product deleted']);
    }
}
