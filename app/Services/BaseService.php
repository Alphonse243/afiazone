<?php

declare(strict_types=1);

namespace App\Services;

/**
 * Base Service Class
 * 
 * All services should extend this class to inherit
 * common business logic methods.
 */
abstract class BaseService
{
    /**
     * Logger instance
     */
    protected ?\Logger $logger = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->logger = logger();
    }

    /**
     * Log information
     */
    protected function log(string $message, array $context = []): void
    {
        if ($this->logger) {
            $this->logger->info($message, $context);
        }
    }

    /**
     * Log error
     */
    protected function logError(string $message, \Exception $exception): void
    {
        if ($this->logger) {
            $this->logger->error($message, ['exception' => $exception->getMessage()]);
        }
    }

    /**
     * Validate input data
     */
    protected function validate(array $data, array $rules): array
    {
        $errors = [];

        foreach ($rules as $field => $fieldRules) {
            $rules_array = explode('|', $fieldRules);
            foreach ($rules_array as $rule) {
                $this->validateField($field, $data[$field] ?? null, $rule, $errors);
            }
        }

        return $errors;
    }

    /**
     * Validate single field
     */
    protected function validateField(
        string $field,
        mixed $value,
        string $rule,
        array &$errors
    ): void {
        if ($rule === 'required' && empty($value)) {
            $errors[$field] = "{$field} is required";
        } elseif ($rule === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $errors[$field] = "{$field} must be a valid email";
        } elseif ($rule === 'numeric' && !is_numeric($value)) {
            $errors[$field] = "{$field} must be numeric";
        }
    }
}
