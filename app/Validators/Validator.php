<?php

declare(strict_types=1);

namespace App\Validators;

/**
 * Base Validator Class
 */
abstract class Validator
{
    /**
     * Data to validate
     */
    protected array $data = [];

    /**
     * Validation rules
     */
    protected array $rules = [];

    /**
     * Error messages
     */
    protected array $errors = [];

    /**
     * Constructor
     */
    public function __construct(array $data, array $rules)
    {
        $this->data = $data;
        $this->rules = $rules;
    }

    /**
     * Validate data
     */
    public function validate(): bool
    {
        $this->errors = [];

        foreach ($this->rules as $field => $rules) {
            $rules_array = explode('|', $rules);
            $value = $this->data[$field] ?? null;

            foreach ($rules_array as $rule) {
                if (!$this->validateRule($field, $value, $rule)) {
                    break;
                }
            }
        }

        return empty($this->errors);
    }

    /**
     * Validate single rule
     */
    protected function validateRule(string $field, mixed $value, string $rule): bool
    {
        $method = 'validate' . ucfirst($rule);

        if (!method_exists($this, $method)) {
            return true;
        }

        if (!$this->$method($field, $value)) {
            return false;
        }

        return true;
    }

    /**
     * Required rule
     */
    protected function validateRequired(string $field, mixed $value): bool
    {
        if (empty($value)) {
            $this->errors[$field] = "{$field} is required";
            return false;
        }
        return true;
    }

    /**
     * Email rule
     */
    protected function validateEmail(string $field, mixed $value): bool
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = "{$field} must be a valid email";
            return false;
        }
        return true;
    }

    /**
     * Numeric rule
     */
    protected function validateNumeric(string $field, mixed $value): bool
    {
        if (!is_numeric($value)) {
            $this->errors[$field] = "{$field} must be numeric";
            return false;
        }
        return true;
    }

    /**
     * Min length rule
     */
    protected function validateMinLength(string $field, mixed $value, int $length): bool
    {
        if (strlen((string)$value) < $length) {
            $this->errors[$field] = "{$field} must be at least {$length} characters";
            return false;
        }
        return true;
    }

    /**
     * Max length rule
     */
    protected function validateMaxLength(string $field, mixed $value, int $length): bool
    {
        if (strlen((string)$value) > $length) {
            $this->errors[$field] = "{$field} must not exceed {$length} characters";
            return false;
        }
        return true;
    }

    /**
     * Get errors
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
