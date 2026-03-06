<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;

/**
 * Authentication Service
 */
class AuthService extends BaseService
{
    /**
     * Register new user
     */
    public function register(array $data): ?User
    {
        // Validate
        $errors = $this->validate($data, [
            'email' => 'required|email',
            'password' => 'required|minLength:8',
            'name' => 'required',
        ]);

        if (!empty($errors)) {
            throw new \Exception('Validation failed');
        }

        // Create user
        $user = User::create([
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => password_hash($data['password'], PASSWORD_BCRYPT),
            'status' => 'pending',
        ]);

        $this->log('User registered', ['user_id' => $user->id]);

        // TODO: Send verification email

        return $user;
    }

    /**
     * Login user
     */
    public function login(string $email, string $password): ?array
    {
        $user = User::find($email); // TODO: Fix - find by email instead of ID

        if (!$user || !password_verify($password, $user->password)) {
            $this->logError('Login failed', new \Exception("Invalid credentials"));
            return null;
        }

        $this->log('User logged in', ['user_id' => $user->id]);

        // TODO: Generate JWT token
        return [
            'user' => $user->getAttributes(),
            'token' => 'jwt_token', // TODO: Generate real token
        ];
    }

    /**
     * Verify email
     */
    public function verifyEmail(string $token): bool
    {
        // TODO: Verify token and update user status
        return true;
    }

    /**
     * Reset password
     */
    public function resetPassword(string $email): bool
    {
        // TODO: Generate reset token
        // TODO: Send email

        return true;
    }
}
