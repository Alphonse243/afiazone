<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

/**
 * Base HTTP Exception
 */
class HttpException extends Exception
{
    protected int $statusCode = 500;

    public function __construct(
        string $message = '',
        int $statusCode = 500,
        ?Exception $previous = null
    ) {
        $this->statusCode = $statusCode;
        parent::__construct($message, $statusCode, $previous);
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}

/**
 * Validation Exception
 */
class ValidationException extends HttpException
{
    protected array $errors = [];

    public function __construct(string $message = '', array $errors = [])
    {
        $this->errors = $errors;
        parent::__construct($message, 422);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}

/**
 * Unauthorized Exception
 */
class UnauthorizedException extends HttpException
{
    public function __construct(string $message = 'Unauthorized')
    {
        parent::__construct($message, 401);
    }
}

/**
 * Forbidden Exception
 */
class ForbiddenException extends HttpException
{
    public function __construct(string $message = 'Forbidden')
    {
        parent::__construct($message, 403);
    }
}

/**
 * Not Found Exception
 */
class NotFoundException extends HttpException
{
    public function __construct(string $message = 'Not Found')
    {
        parent::__construct($message, 404);
    }
}
