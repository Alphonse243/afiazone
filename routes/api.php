<?php

declare(strict_types=1);

/**
 * API Routes
 *
 * All API routes are defined here.
 * Routes follow RESTful conventions.
 */

return [
    // Home/Welcome
    [
        'method' => 'GET',
        'path' => '/',
        'controller' => 'HealthController@welcome',
    ],

    // Health check
    [
        'method' => 'GET',
        'path' => '/health',
        'controller' => 'HealthController@check',
    ],

    // Authentication Routes
    [
        'method' => 'POST',
        'path' => '/auth/register',
        'controller' => 'AuthController@register',
    ],
    [
        'method' => 'POST',
        'path' => '/auth/login',
        'controller' => 'AuthController@login',
    ],
    [
        'method' => 'POST',
        'path' => '/auth/logout',
        'controller' => 'AuthController@logout',
        'middleware' => ['auth'],
    ],
    [
        'method' => 'POST',
        'path' => '/auth/refresh',
        'controller' => 'AuthController@refresh',
        'middleware' => ['auth'],
    ],

    // User Routes
    [
        'method' => 'GET',
        'path' => '/users/{id}',
        'controller' => 'UserController@show',
        'middleware' => ['auth'],
    ],
    [
        'method' => 'PUT',
        'path' => '/users/{id}',
        'controller' => 'UserController@update',
        'middleware' => ['auth'],
    ],
    [
        'method' => 'GET',
        'path' => '/me',
        'controller' => 'UserController@current',
        'middleware' => ['auth'],
    ],

    // Product Routes
    [
        'method' => 'GET',
        'path' => '/products',
        'controller' => 'ProductController@index',
    ],
    [
        'method' => 'GET',
        'path' => '/products/{id}',
        'controller' => 'ProductController@show',
    ],

    // Cart Routes
    [
        'method' => 'GET',
        'path' => '/cart',
        'controller' => 'CartController@show',
        'middleware' => ['auth'],
    ],
    [
        'method' => 'POST',
        'path' => '/cart/items',
        'controller' => 'CartController@addItem',
        'middleware' => ['auth'],
    ],
    [
        'method' => 'PUT',
        'path' => '/cart/items/{id}',
        'controller' => 'CartController@updateItem',
        'middleware' => ['auth'],
    ],
    [
        'method' => 'DELETE',
        'path' => '/cart/items/{id}',
        'controller' => 'CartController@removeItem',
        'middleware' => ['auth'],
    ],

    // Order Routes
    [
        'method' => 'POST',
        'path' => '/orders',
        'controller' => 'OrderController@create',
        'middleware' => ['auth'],
    ],
    [
        'method' => 'GET',
        'path' => '/orders/{id}',
        'controller' => 'OrderController@show',
        'middleware' => ['auth'],
    ],
    [
        'method' => 'GET',
        'path' => '/orders',
        'controller' => 'OrderController@index',
        'middleware' => ['auth'],
    ],

    // Wallet Routes
    [
        'method' => 'GET',
        'path' => '/wallet',
        'controller' => 'WalletController@show',
        'middleware' => ['auth'],
    ],
    [
        'method' => 'POST',
        'path' => '/wallet/topup',
        'controller' => 'WalletController@topUp',
        'middleware' => ['auth'],
    ],
    [
        'method' => 'POST',
        'path' => '/wallet/transfer',
        'controller' => 'WalletController@transfer',
        'middleware' => ['auth'],
    ],

    // KYC Routes
    [
        'method' => 'POST',
        'path' => '/kyc/submit',
        'controller' => 'KycController@submit',
        'middleware' => ['auth'],
    ],
    [
        'method' => 'GET',
        'path' => '/kyc/status',
        'controller' => 'KycController@status',
        'middleware' => ['auth'],
    ],

    // Admin Routes - Authentication
    [
        'method' => 'GET',
        'path' => '/admin',
        'controller' => 'Admin\AuthController@showLogin',
    ],
    [
        'method' => 'GET',
        'path' => '/admin/login',
        'controller' => 'Admin\AuthController@showLogin',
    ],
    [
        'method' => 'POST',
        'path' => '/admin/login',
        'controller' => 'Admin\AuthController@login',
    ],
    [
        'method' => 'GET',
        'path' => '/admin/register',
        'controller' => 'Admin\AuthController@showRegister',
    ],
    [
        'method' => 'POST',
        'path' => '/admin/register',
        'controller' => 'Admin\AuthController@register',
    ],
    [
        'method' => 'GET',
        'path' => '/admin/forgot-password',
        'controller' => 'Admin\AuthController@showForgotPassword',
    ],
    [
        'method' => 'GET',
        'path' => '/admin/reset-password',
        'controller' => 'Admin\AuthController@showResetPassword',
    ],
    [
        'method' => 'GET',
        'path' => '/admin/2fa',
        'controller' => 'Admin\AuthController@show2FA',
    ],
    [
        'method' => 'POST',
        'path' => '/admin/logout',
        'controller' => 'Admin\AuthController@logout',
        'middleware' => ['auth'],
    ],

    // Admin Routes - Dashboard
    [
        'method' => 'GET',
        'path' => '/admin/dashboard',
        'controller' => 'Admin\DashboardController@dashboard',
        'middleware' => ['auth'],
    ],
    [
        'method' => 'GET',
        'path' => '/admin/dashboard/analytics',
        'controller' => 'Admin\DashboardController@adminDashboard',
        'middleware' => ['auth', 'admin'],
    ],
    [
        'method' => 'GET',
        'path' => '/admin/dashboard/ecommerce',
        'controller' => 'Admin\DashboardController@merchantDashboard',
        'middleware' => ['auth'],
    ],
    [
        'method' => 'GET',
        'path' => '/admin/dashboard/crm',
        'controller' => 'Admin\DashboardController@partnerDashboard',
        'middleware' => ['auth'],
    ],
];
