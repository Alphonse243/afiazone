<?php declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    /**
     * Affiche la page de connexion admin
     */
    public function showLogin(): void
    {
        $this->renderAuth('back.auth.admin-login', [
            'pageTitle' => 'Admin Login - AfiaZone',
        ]);
    }

    /**
     * Traite la soumission du formulaire de connexion
     * TODO: Implémenter la logique d'authentification
     */
    public function login(): void
    {
        // Récupérer les données POST
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // TODO: Valider les credentials contre la base de données
        // TODO: Créer une session/JWT token
        // TODO: Rediriger vers le dashboard si succès

        // Pour l'instant, afficher un message d'erreur
        http_response_code(401);
        echo json_encode(['error' => 'Not implemented yet']);
    }

    /**
     * Affiche la page d'inscription admin
     */
    public function showRegister(): void
    {
        $this->renderAuth('back.auth.admin-register', [
            'pageTitle' => 'Admin Register - AfiaZone',
        ]);
    }

    /**
     * Traite la soumission du formulaire d'inscription
     * TODO: Implémenter la logique d'inscription
     */
    public function register(): void
    {
        // TODO: Valider les données
        // TODO: Créer l'utilisateur en base de données
        // TODO: Rediriger vers le dashboard
        http_response_code(501);
        echo json_encode(['error' => 'Not implemented yet']);
    }

    /**
     * Affiche la page de récupération de mot de passe
     */
    public function showForgotPassword(): void
    {
        $this->renderAuth('back.auth.admin-forgot-password', [
            'pageTitle' => 'Forgot Password - AfiaZone',
        ]);
    }

    /**
     * Affiche la page de réinitialisation de mot de passe
     */
    public function showResetPassword(): void
    {
        $this->renderAuth('back.auth.admin-reset-password', [
            'pageTitle' => 'Reset Password - AfiaZone',
        ]);
    }

    /**
     * Affiche la page de vérification 2FA
     */
    public function show2FA(): void
    {
        $this->renderAuth('back.auth.admin-2fa', [
            'pageTitle' => '2FA Verification - AfiaZone',
        ]);
    }

    /**
     * Déconnecte l'utilisateur
     * TODO: Implémenter la logique de déconnexion
     */
    public function logout(): void
    {
        // TODO: Détruire la session/token
        // TODO: Rediriger vers la page de login
        http_response_code(501);
        echo json_encode(['error' => 'Not implemented yet']);
    }
}
