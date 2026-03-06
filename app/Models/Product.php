<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Product Model
 */
class Product extends BaseModel
{
    protected string $table = 'products';
    protected string $primaryKey = 'id';

    protected array $fillable = [
        'merchant_id',
        'sku',
        'name',
        'description',
        'category_id',
        'price',
        'prescription_required',
        'created_at',
        'updated_at',
    ];

    /**
     * Get product images
     */
    public function getImages(): array
    {
        // TODO: Fetch images from database
        return [];
    }

    /**
     * Get product variants
     */
    public function getVariants(): array
    {
        // TODO: Fetch variants from database
        return [];
    }

    /**
     * Get product reviews
     */
    public function getReviews(): array
    {
        // TODO: Fetch reviews from database
        return [];
    }
}
