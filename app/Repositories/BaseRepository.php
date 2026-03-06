<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\BaseModel;

/**
 * Base Repository Class
 * 
 * All repositories should extend this class to provide
 * abstract data access operations.
 */
abstract class BaseRepository
{
    /**
     * Model instance
     */
    protected BaseModel $model;

    /**
     * Constructor
     */
    public function __construct(BaseModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find by ID
     */
    public function find(mixed $id): ?BaseModel
    {
        return $this->model::find($id);
    }

    /**
     * Get all
     */
    public function all(): array
    {
        return $this->model::all();
    }

    /**
     * Create
     */
    public function create(array $attributes): ?BaseModel
    {
        return $this->model::create($attributes);
    }

    /**
     * Update
     */
    public function update(mixed $id, array $attributes): bool
    {
        $model = $this->find($id);
        if ($model) {
            return $model->update($attributes);
        }
        return false;
    }

    /**
     * Delete
     */
    public function delete(mixed $id): bool
    {
        $model = $this->find($id);
        if ($model) {
            return $model->delete();
        }
        return false;
    }
}
