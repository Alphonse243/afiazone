<?php

declare(strict_types=1);

namespace App\Models;

/**
 * Base Model Class
 * 
 * All models should extend this class to inherit
 * common database operations.
 */
abstract class BaseModel
{
    /**
     * Table name
     */
    protected string $table = '';

    /**
     * Primary key
     */
    protected string $primaryKey = 'id';

    /**
     * Database connection
     */
    protected ?\PDO $connection = null;

    /**
     * Fillable attributes
     */
    protected array $fillable = [];

    /**
     * Attributes
     */
    protected array $attributes = [];

    /**
     * Constructor
     */
    public function __construct(?array $attributes = null)
    {
        $this->connection = db();
        
        if ($attributes !== null) {
            $this->fill($attributes);
        }
    }

    /**
     * Get table name
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * Fill model with attributes
     */
    public function fill(array $attributes): self
    {
        foreach ($attributes as $key => $value) {
            if (in_array($key, $this->fillable) || empty($this->fillable)) {
                $this->attributes[$key] = $value;
            }
        }

        return $this;
    }

    /**
     * Get attribute value
     */
    public function getAttribute(string $key): mixed
    {
        return $this->attributes[$key] ?? null;
    }

    /**
     * Set attribute value
     */
    public function setAttribute(string $key, mixed $value): self
    {
        $this->attributes[$key] = $value;
        return $this;
    }

    /**
     * Get all attributes
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * Magic getter
     */
    public function __get(string $name): mixed
    {
        return $this->getAttribute($name);
    }

    /**
     * Magic setter
     */
    public function __set(string $name, mixed $value): void
    {
        $this->setAttribute($name, $value);
    }

    /**
     * Find by ID
     */
    public static function find(mixed $id): ?self
    {
        $instance = new static();
        $stmt = $instance->connection->prepare(
            "SELECT * FROM {$instance->table} WHERE {$instance->primaryKey} = ? LIMIT 1"
        );
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        if ($data) {
            return new static($data);
        }

        return null;
    }

    /**
     * Create new record
     */
    public static function create(array $attributes): ?self
    {
        $instance = new static($attributes);
        $instance->save();
        return $instance;
    }

    /**
     * Save model to database
     */
    public function save(): bool
    {
        if (!$this->attributes) {
            return false;
        }

        $keys = array_keys($this->attributes);
        $values = array_values($this->attributes);
        $placeholders = implode(',', array_fill(0, count($keys), '?'));

        $sql = "INSERT INTO {$this->table} (" . implode(',', $keys) . ") VALUES ({$placeholders})";
        $stmt = $this->connection->prepare($sql);

        if ($stmt->execute($values)) {
            $this->attributes[$this->primaryKey] = $this->connection->lastInsertId();
            return true;
        }

        return false;
    }

    /**
     * Update model in database
     */
    public function update(array $attributes = []): bool
    {
        if (!empty($attributes)) {
            $this->fill($attributes);
        }

        $updates = [];
        $values = [];

        foreach ($this->attributes as $key => $value) {
            if ($key !== $this->primaryKey) {
                $updates[] = "{$key} = ?";
                $values[] = $value;
            }
        }

        if (empty($updates)) {
            return false;
        }

        $values[] = $this->attributes[$this->primaryKey];
        $sql = "UPDATE {$this->table} SET " . implode(',', $updates) . " WHERE {$this->primaryKey} = ?";
        $stmt = $this->connection->prepare($sql);

        return $stmt->execute($values);
    }

    /**
     * Delete model from database
     */
    public function delete(): bool
    {
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = ?";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute([$this->attributes[$this->primaryKey]]);
    }

    /**
     * Get all records
     */
    public static function all(): array
    {
        $instance = new static();
        $stmt = $instance->connection->query("SELECT * FROM {$instance->table}");
        $results = [];

        while ($row = $stmt->fetch()) {
            $results[] = new static($row);
        }

        return $results;
    }
}
