# Plan de développement — AfiaZone

> Basé sur le document source fourni.

---

## 0. Résumé exécutif

**Projet** : ["organization","AfiaZone","medical marketplace project"]— marketplace médicale avec un e‑wallet santé et fonctionnalités annexes (catalogue produits médicaux, dossier médical digital, wallet pour épargne/paiement assurance, KYC, livraison, etc.).

Ce document décrit un plan de développement complet, étape par étape, pour implémenter **AfiaZone** en **PHP + MySQL** suivant l'architecture **MVC**. Il couvre l'analyse, la conception de la base de données, l'architecture applicative (routes, contrôleurs, modèles, vues), la sécurité, l'intégration paiement/mobile money, tests, déploiement et maintenance.

---

## 1. Prérequis techniques

* Langage serveur : PHP 8.1+ (ou plus récent et sans framework)
* Serveur web : Nginx ou Apache
* Base de données : MySQL 8+
* Gestionnaire dépendances : Composer
* Ce plan ne doit utiliser aucun framework mais reste applicable à un MVC personnalisé.
* Environnement local : Docker (compose) pour PHP+MySQL ou Laragon pour Windows
* Outils CI/CD : GitHub Actions / GitLab CI
* Stockage d'objets : S3 (ou compatible) pour fichiers (ordonnances, images produits)
* Versionnage : Git
* Monitoring / Logs : Sentry, Prometheus/Grafana (optionnel)

---

## 2. Phases de développement (haute niveau)

1. Phase A — Analyse & Spécifications (1–2 semaines)
2. Phase B — Architecture & Modélisation BD (1 semaine)
3. Phase C — Installation & Boilerplate MVC (2–3 jours)
4. Phase D — Authentification / RBAC / KYC (1–2 semaines)
5. Phase E — Catalogue produits & gestion marchands (2–3 semaines)
6. Phase F — Panier / Commandes / Livraison (2 semaines)
7. Phase G — Wallet santé & transactions (3–4 semaines)
8. Phase H — Paiements (Mobile Money, cartes) & réconciliations (2–3 semaines)
9. Phase I — Dossier médical digital & prescriptions (2–3 semaines)
10. Phase J — Admin / Moderation / Statistiques (2 semaines)
11. Phase K — Tests, sécurité, conformité (2 semaines)
12. Phase L — Déploiement & monitoring (1 semaine)

> Les durées sont indicatives et dépendent de l’équipe.

---

## 3. Spécification fonctionnelle par module (étape par étape)

### 3.1. Module Auth / Utilisateurs

**Objectifs** : inscription/login, validation email/phone, roles (admin, modérateur, marchant, client, livreur, partenaire), 2FA, KYC workflow.

Étapes :

1. Créer tables `users`, `roles`, `user_roles`, `user_profiles`, `kyc_submissions`.
2. Implémenter registration + validation email/phone (OTP via SMS si possible).
3. Implémenter login, refresh token (JWT ou session), logout.
4. RBAC middleware pour protéger routes (ex : `isMerchant`, `isAdmin`).
5. KYC : upload documents (ID, justificatif), statuts `pending/approved/rejected`, audit trail.
6. 2FA (TOTP) optionnel.

### 3.2. Module Catalogue & Produit

**Objectifs** : CRUD produits, catégories, attributs (prescription required), stock par marchand, variantes, images.

Étapes :

1. Modèles/tables : `products`, `categories`, `product_images`, `product_attributes`, `merchant_stocks`.
2. Import initial catalogue ou synchronisation via CSV/Excel.
3. UI vendeur pour gérer stock/prix, marked as prescription_required flag.
4. Affichage catalogue public, filtres, recherche (Elasticsearch ou MySQL fulltext).
5. Gestion des fiches produits avec validation et modération (workflow draft → published).

### 3.3. Module Panier & Commande

Étapes :

1. Tables : `carts`, `cart_items`, `orders`, `order_items`, `order_status_logs`, `shipments`.
2. Workflow : ajout panier → validation → vérification ordonnance si nécessaire → paiement → préparation → livraison.
3. Générer QR code + 5‑digit token dans le ticket.
4. Notifications (email/SMS/push) sur étapes de commande.

### 3.4. Module Livraison / Livreurs

Étapes :

1. Tables : `delivery_providers`, `deliveries`, `delivery_assignments`.
2. Interface livreur : prendre livraison, statut (accepted, picked_up, delivered, failed).
3. API/QRCode vérification à la livraison (token ou signature mobile).

### 3.5. Module Wallet Santé & Transactions

**Objectifs** : wallet utilisateur, top‑up, épargne santé, micro‑assurance, paiements internes, transferts.

Étapes :

1. Tables : `wallets`, `wallet_transactions`, `wallet_balances_history`.
2. Modèle comptable : ledger double‑entry (débits/crédits) pour audit.
3. Top‑up via Mobile Money / cartes (intégration tierce), ainsi que virement interne.
4. Fonction `reserve_funds` lors d'une commande pour éviter over‑spend.
5. Règles : frais transaction, commissions, float interest (déposits non investis).
6. Reconciliation batch pour rapprocher transactions mobile money / banque.

### 3.6. Module Paiements & Réconciliations

Étapes :

1. Intégrer prestataires Mobile Money locaux (Orange Money, MTN MoMo, Wave, etc) via API.
2. Intégrer un PSP pour cartes (Stripe/Monetico) si disponible en RDC.
3. Implémenter webhooks sécurisés pour notifications paiement.
4. Créer module d’automatisation de réconciliation et reporting (journaux, exports CSV).

### 3.7. Module Dossier Médical (EMR) & Ordonnances

Étapes :

1. Tables : `medical_records`, `appointments`, `prescriptions`, `prescription_images`.
2. UI patient/clinique pour consulter historique, partager avec praticien.
3. Privacy by design : encryptage des données sensibles, logs d'accès.
4. Vérification manuelle des ordonnances pour produits prescrits.

### 3.8. Module Administration & Modération

Étapes :

1. Dashboard admin : KPIs (transactions, TTM, churn), gestion utilisateurs, produits, flags.
2. Moderation queue : fiches produits, ordonnances douteuses, retours utilisateurs.
3. Gestion des plans d'abonnement marchands et facturation récurrente.

### 3.9. Module Statistiques & Data Anonymisée

Étapes :

1. ETL basique pour extraire/anonymiser données médicales sensibles.
2. Table `analytics_events`, exports CSV/JSON pour ventes, prescriptions, disponibilité stock.

---

## 4. Schéma de base de données (extrait SQL)

> Ci‑dessous un jeu d'exemples simplifiés. À adapter en production (indexations, partitions, contraintes FK, etc.).

```sql
CREATE TABLE users (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) UNIQUE,
  phone VARCHAR(30) UNIQUE,
  password VARCHAR(255),
  name VARCHAR(255),
  status ENUM('active','inactive','banned') DEFAULT 'active',
  created_at DATETIME,
  updated_at DATETIME
);

CREATE TABLE roles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) UNIQUE
);

CREATE TABLE user_roles (
  user_id BIGINT,
  role_id INT,
  PRIMARY KEY (user_id, role_id)
);

CREATE TABLE products (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  merchant_id BIGINT,
  sku VARCHAR(100),
  title VARCHAR(512),
  description TEXT,
  category_id INT,
  prescription_required BOOLEAN DEFAULT FALSE,
  price DECIMAL(12,2),
  created_at DATETIME,
  updated_at DATETIME
);

CREATE TABLE wallets (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  user_id BIGINT UNIQUE,
  balance DECIMAL(14,2) DEFAULT 0,
  created_at DATETIME,
  updated_at DATETIME
);

CREATE TABLE wallet_transactions (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  wallet_id BIGINT,
  amount DECIMAL(14,2),
  type ENUM('credit','debit'),
  reference VARCHAR(255),
  metadata JSON,
  created_at DATETIME
);
```

> Ajouter indexations sur `merchant_id`, `category_id`, `user_id` et champs utilisés pour recherche.

---

## 5. Architecture MVC — Routines & conventions

* **Routes** : RESTful routes pour resources (e.g. `GET /products`, `POST /orders`).
* **Controllers** : un controller par ressource (ProductController, OrderController, WalletController, KycController, AdminController).
* **Models** : ActiveRecord / Eloquent‑like, chaque table a son modèle.
* **API JSON** : Réponses JSON structurées ; aucun moteur de template (API REST pure)
* **Services** : pour logique métier lourde (WalletService, PaymentGatewayService, KycService).
* **Repositories** (optionnel) : couche d'accès DB pour faciliter tests.
* **Jobs / Queues** : tâches asynchrones (envoi mails, génération factures, reconciliation). Utiliser file-based queue ou job runner.

---

## 6. Sécurité & conformité

* Chiffrer les données sensibles (dossiers médicaux) au repos et en transit (TLS1.2+).
* Respecter la législation locale et normes pharmaceutiques (se référer aux documents législatifs fournis dans le fichier source). Source : fileciteturn0file0
* Protections : prepared statements/ORM pour éviter injections SQL, validation côté serveur, contrôle d'accès RBAC strict.
* Stockage sécurisé des fichiers (S3 avec politiques, virus scanning pour uploads).
* Logs d'audit pour accès aux dossiers médicaux.
* PCI‑DSS : si traitement carte, utiliser tokenisation via PSP—ne jamais stocker les numéros de carte.

---

## 7. Tests

* Unit tests (PHPUnit) pour modèles et services.
* Integration tests pour flux critiques (paiement, wallet reserve, KYC acceptance).
* End‑to‑end tests (Cypress/Playwright) pour parcours utilisateur.
* Tests de charge (k6) sur APIs critiques (checkout, recherche catalogue).

---

## 8. Déploiement & exploitation

* Environnements : dev → staging → production.
* Conteneurisation avec Docker, orchestrer via Docker Compose (petit déploiement) ou Kubernetes.
* CI pipeline : tests → build → déploiement staging → approbation → prod.
* Backups réguliers MySQL (binlog + dumps), stratégie RPO/RTO.
* Monitoring : uptime, erreurs, transactions par minute, temps réponse API.

---

## 9. Checklist de mise en production

* [ ] Audit sécurité complet
* [ ] Contrats et intégrations PSP signés
* [ ] Générateur de clés et rotation (JWT/SSH)
* [ ] Politique de confidentialité et conditions d’utilisation en place
* [ ] Procédures KYC opérationnelles
* [ ] Formation équipe support & modérateurs

---

## 10. Annexes — bonnes pratiques techniques

* Toujours utiliser transactions BD pour opérations financières.
* Implémenter idempotence sur webhooks (PSP/mobile money).
* Isoler services critiques (payments, wallet) dans services/containers distincts.
* Documenter l’API (OpenAPI/Swagger).
* Mettre en place feature flags pour déployer wallet progressivement (stratégie mentionnée dans le document source).

---

*Fin du document — plan d’exécution détaillé prêt à être transformé en backlog (tickets Jira/Trello) et feuille de route sprint.*
