<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Product;

/**
 * Product Repository
 */
class ProductRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(new Product());
    }

    /**
     * Find by SKU
     */
    public function findBySku(string $sku): ?Product
    {
        // TODO: Implement custom query
        return null;
    }

    /**
     * Find by category
     */
    public function findByCategory(int $categoryId): array
    {
        // TODO: Implement custom query
        return [];
    }

    /**
     * Find prescription-only products
     */
    public function findPrescriptionRequired(): array
    {
        // TODO: Implement custom query
        return [];
    }

    /**
     * Search products
     */
    public function search(string $query, int $limit = 20): array
    {
        // TODO: Implement full-text search
        return [];
    }
}
