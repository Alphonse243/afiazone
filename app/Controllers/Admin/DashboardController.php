<?php declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    /**
     * Dashboard principal pour les administrateurs
     */
    public function adminDashboard(): void
    {
        $this->renderAdmin('back.dashboard.admin-dashboard', [
            'pageTitle' => 'Admin Dashboard - Analytics',
            'dashboardScripts' => [
                '/assets/js/dashboards-analytics.js',
            ],
        ]);
    }

    /**
     * Dashboard pour les marchands/vendeurs
     */
    public function merchantDashboard(): void
    {
        $this->renderAdmin('back.dashboard.marchant-dashboard', [
            'pageTitle' => 'Merchant Dashboard - eCommerce',
            'dashboardScripts' => [
                '/assets/js/dashboards-ecommerce.js',
            ],
        ]);
    }

    /**
     * Dashboard pour les partenaires
     */
    public function partnerDashboard(): void
    {
        $this->renderAdmin('back.dashboard.partener-dashboard', [
            'pageTitle' => 'Partner Dashboard - CRM',
            'dashboardScripts' => [
                '/assets/js/dashboards-crm.js',
            ],
        ]);
    }

    /**
     * Dashboard simplifié par défaut
     */
    public function dashboard(): void
    {
        // Rediriger vers le dashboard admin par défaut
        $this->adminDashboard();
    }
}
