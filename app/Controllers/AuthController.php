<?php

declare(strict_types=1);

namespace App\Controllers;

/**
 * Authentication Controller
 */
class AuthController extends BaseController
{
    /**
     * Register new user
     */
    public function register(): void
    {
        if ($this->method !== 'POST') {
            $this->errorResponse('Method not allowed', 405);
            return;
        }

        $data = $this->getData();

        // TODO: Validate input
        // TODO: Create user
        // TODO: Send verification email

        $this->jsonResponse(
            ['message' => 'Registration successful'],
            201
        );
    }

    /**
     * Login user
     */
    public function login(): void
    {
        if ($this->method !== 'POST') {
            $this->errorResponse('Method not allowed', 405);
            return;
        }

        $email = $this->getData('email');
        $password = $this->getData('password');

        // TODO: Validate credentials
        // TODO: Generate JWT token
        // TODO: Return token

        $this->jsonResponse(['token' => 'jwt_token']);
    }

    /**
     * Refresh token
     */
    public function refresh(): void
    {
        if ($this->method !== 'POST') {
            $this->errorResponse('Method not allowed', 405);
            return;
        }

        // TODO: Validate old token
        // TODO: Generate new token

        $this->jsonResponse(['token' => 'new_jwt_token']);
    }

    /**
     * Logout user
     */
    public function logout(): void
    {
        if ($this->method !== 'POST') {
            $this->errorResponse('Method not allowed', 405);
            return;
        }

        // TODO: Invalidate token

        $this->jsonResponse(['message' => 'Logout successful']);
    }
}
