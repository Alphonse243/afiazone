<?php

declare(strict_types=1);

namespace App\Middleware;

/**
 * Base Middleware Class
 * 
 * All middleware should extend this class.
 */
abstract class Middleware
{
    /**
     * Handle the request
     * 
     * Return true to continue, false to stop
     */
    abstract public function handle(): bool;

    /**
     * Get value from request header
     */
    protected function getHeader(string $name): ?string
    {
        $headerName = 'HTTP_' . strtoupper(str_replace('-', '_', $name));
        return $_SERVER[$headerName] ?? null;
    }

    /**
     * Get authorization bearer token
     */
    protected function getBearerToken(): ?string
    {
        $header = $this->getHeader('Authorization');
        if ($header && preg_match('/Bearer\s+(.+)/', $header, $matches)) {
            return $matches[1];
        }
        return null;
    }

    /**
     * Send JSON response
     */
    protected function sendJsonResponse(array $data, int $statusCode = 400): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }
}

/**
 * CORS Middleware
 */
class CorsMiddleware extends Middleware
{
    public function handle(): bool
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS, PATCH');
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
        header('Access-Control-Max-Age: 86400');

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(204);
            exit;
        }

        return true;
    }
}

/**
 * Authentication Middleware
 */
class AuthMiddleware extends Middleware
{
    public function handle(): bool
    {
        $token = $this->getBearerToken();

        if (!$token) {
            $this->sendJsonResponse(
                ['error' => 'Missing authorization token'],
                401
            );
        }

        // TODO: Validate JWT token and set user
        // $user = JWTHelper::validate($token);
        // if (!$user) {
        //     $this->sendJsonResponse(['error' => 'Invalid token'], 401);
        // }

        return true;
    }
}

/**
 * RBAC Middleware (Role-Based Access Control)
 */
class RbacMiddleware extends Middleware
{
    protected array $requiredRoles = [];

    public function __construct(array $requiredRoles = [])
    {
        $this->requiredRoles = $requiredRoles;
    }

    public function handle(): bool
    {
        // TODO: Check user roles
        return true;
    }
}

/**
 * Rate Limit Middleware
 */
class RateLimitMiddleware extends Middleware
{
    protected int $maxRequests = 60;
    protected int $windowInSeconds = 60;

    public function handle(): bool
    {
        $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        $key = "rate_limit:{$ip}";
        
        // File-based rate limiting
        $cacheFile = storage_path('cache') . '/' . md5($key) . '.txt';
        $now = time();
        
        if (file_exists($cacheFile)) {
            $data = json_decode(file_get_contents($cacheFile), true);
            $resetTime = $data['reset_time'] ?? 0;
            $count = $data['count'] ?? 0;
            
            if ($now > $resetTime) {
                // Window expired, reset counter
                $count = 1;
                $resetTime = $now + $this->windowInSeconds;
            } else {
                // Within window
                $count++;
                if ($count > $this->maxRequests) {
                    http_response_code(429);
                    die(json_encode(['error' => 'Too many requests']));
                }
            }
        } else {
            // First request
            $count = 1;
            $resetTime = $now + $this->windowInSeconds;
        }
        
        // Save updated counter
        file_put_contents($cacheFile, json_encode([
            'count' => $count,
            'reset_time' => $resetTime,
        ]));
        
        return true;
    }
}

/**
 * Logging Middleware
 */
class LoggingMiddleware extends Middleware
{
    public function handle(): bool
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
        
        logger()->info("Request: {$method} {$path}");
        
        return true;
    }
}
