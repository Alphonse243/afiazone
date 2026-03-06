<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Product;

/**
 * Product Service
 */
class ProductService extends BaseService
{
    /**
     * Get all products with filters
     */
    public function getAll(array $filters = [], int $page = 1, int $perPage = 20): array
    {
        // TODO: Query products with filters
        // TODO: Apply pagination
        // TODO: Cache results

        $products = Product::all();

        return [
            'products' => $products,
            'total' => count($products),
            'page' => $page,
            'per_page' => $perPage,
        ];
    }

    /**
     * Get product by ID
     */
    public function getById(int $id): ?Product
    {
        return Product::find($id);
    }

    /**
     * Create product
     */
    public function create(array $data, int $merchantId): ?Product
    {
        // Validate
        $errors = $this->validate($data, [
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
        ]);

        if (!empty($errors)) {
            throw new \Exception('Validation failed');
        }

        $product = Product::create([
            'merchant_id' => $merchantId,
            'name' => $data['name'],
            'description' => $data['description'] ?? '',
            'price' => $data['price'],
            'category_id' => $data['category_id'],
            'prescription_required' => $data['prescription_required'] ?? false,
        ]);

        $this->log('Product created', ['product_id' => $product?->id]);

        return $product;
    }

    /**
     * Update product
     */
    public function update(int $id, array $data): bool
    {
        $product = Product::find($id);

        if (!$product) {
            return false;
        }

        if ($product->update($data)) {
            $this->log('Product updated', ['product_id' => $id]);
            return true;
        }

        return false;
    }

    /**
     * Delete product
     */
    public function delete(int $id): bool
    {
        $product = Product::find($id);

        if ($product && $product->delete()) {
            $this->log('Product deleted', ['product_id' => $id]);
            return true;
        }

        return false;
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
