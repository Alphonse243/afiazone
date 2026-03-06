<?php

declare(strict_types=1);

namespace App\Controllers;

/**
 * Wallet Controller
 */
class WalletController extends BaseController
{
    /**
     * Get wallet balance
     */
    public function show(): void
    {
        $this->authorize('view_wallet');

        // TODO: Fetch wallet balance and details

        $this->jsonResponse([
            'wallet' => [
                'id' => 1,
                'balance' => 0,
                'reserved' => 0,
                'available' => 0,
            ],
        ]);
    }

    /**
     * Top up wallet
     */
    public function topup(): void
    {
        if ($this->method !== 'POST') {
            $this->errorResponse('Method not allowed', 405);
            return;
        }

        $this->authorize('topup_wallet');

        $amount = $this->getData('amount');
        $paymentMethod = $this->getData('payment_method');

        // TODO: Validate amount
        // TODO: Initialize payment
        // TODO: Create transaction record

        $this->jsonResponse([
            'transaction' => [
                'id' => 1,
                'amount' => $amount,
                'status' => 'pending',
            ],
        ], 201);
    }

    /**
     * Get transaction history
     */
    public function transactions(): void
    {
        $this->authorize('view_wallet');

        // TODO: Fetch wallet transactions
        // TODO: Pagination

        $this->jsonResponse([
            'transactions' => [],
            'total' => 0,
        ]);
    }

    /**
     * Transfer funds
     */
    public function transfer(): void
    {
        if ($this->method !== 'POST') {
            $this->errorResponse('Method not allowed', 405);
            return;
        }

        $this->authorize('transfer_funds');

        $amount = $this->getData('amount');
        $recipient = $this->getData('recipient');

        // TODO: Validate recipient
        // TODO: Create transfer transaction
        // TODO: Update both wallets

        $this->jsonResponse(['transaction' => []], 201);
    }
}
