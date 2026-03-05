# 📋 Module: Front Wallet

**Phase** : Phase I — E-Wallet & Insurance  
**Status** : 🔵 À créer  
**Priorité** : Haute  
**Timeline estimée** : Semaine 5

---

## 📝 Description

Gestion **e-wallet côté client** :

- Solde et historique transactions
- Top-up (dépôts)
- Virements internes
- Assurances santé
- Micro-assurances
- Épargne santé

---

## 📄 Fichiers à Créer

```
front/wallet/
├── README.md                            ← Vous être ici
├── wallet-dashboard.html                Dashboard solde
├── wallet-topup.html                    Faire top-up
├── wallet-topup-method.html             Choisir méthode dépôt
├── wallet-transactions.html             Historique transactions
├── wallet-transfer.html                 Virement utilisateur
├── wallet-withdraw.html                 Retrait argent
├── insurance-plans.html                 Plans d'assurance
├── insurance-subscribe.html             Souscrire assurance
├── insurance-list.html                  Mes assurances actives
├── micro-insurance.html                 Micro-assurances (optionnel)
├── savings.html                         Épargne santé (optionnel)
├── wallet-help.html                     Help wallet
├── css/
│   └── wallet.css
└── js/
    └── wallet.js
```

---

## 🎯 Objectifs Fonctionnels

### Dashboard (`wallet-dashboard.html`)

- [ ] Afficher solde actuel
- [ ] Dernieres transactions
- [ ] Boutons actions rapides
- [ ] Graphique utilisation

### Top-up (`wallet-topup-*.html`)

- [ ] Choisir méthode (Orange Money, MTN, Wave, Card)
- [ ] Entrer montant
- [ ] Confirmation & paiement
- [ ] Suivi transaction

### Transactions (`wallet-transactions.html`)

- [ ] Historique complet
- [ ] Filtres (date, type, montant)
- [ ] Export CSV/PDF
- [ ] Détail transaction

### Assurances (`insurance-*.html`)

- [ ] Afficher plans disponibles
- [ ] Détails couverture
- [ ] Prix/avantages
- [ ] Souscrire plan
- [ ] Gérer souscriptions

---

## 💰 Méthodes de Paiement

```
Orange Money     ✓ RDC principal
MTN MoMo         ✓ Alternative
Wave             ✓ Alternative
Stripe Card      ✓ Optionnel/International
```

---

## 🔗 Intégrations Backend

```
GET    /api/wallet/balance              Solde actuel
GET    /api/wallet/transactions         Historique
POST   /api/wallet/topup/initiate       Créer top-up
GET    /api/wallet/topup/{id}           Statut top-up
POST   /api/wallet/transfer             Virement
POST   /api/wallet/withdraw             Retrait
GET    /api/insurance/plans             Plans disponibles
POST   /api/insurance/subscribe         Souscrire
GET    /api/insurance/subscriptions     Mes plans actifs
```

---

## 🏦 Double-Entry Bookkeeping

⚠️ Important : Wallet transactions utilisent **double-entry bookkeeping** :

- Chaque transaction = débit + crédit
- Audit trail complet
- Réconciliation facile

---

## 📚 Références

- **Phase I détails** : [PLAN-COMPLET.md](../../docs/PLAN-COMPLET.md#phase-i)
- **Wallet API** : [PLAN-COMPLET.md](../../docs/PLAN-COMPLET.md) Phase I endpoints
- **Payment methods** : [PLAN-COMPLET.md](../../docs/PLAN-COMPLET.md) Integrations
- **Similar** : `back/wallet/` (admin oversight)

---

## ⚠️ Points Sécurité

- ✅ Chiffrement montants sensibles
- ✅ PCI compliance pour cartes
- ✅ Audit logs de tous mouvements
- ✅ 2FA recommandé pour retraits >X

---

## 🚀 Next Steps

1. Créer `wallet-dashboard.html`
2. Créer `wallet-topup-method.html` + payment gateway
3. Créer `wallet-transactions.html`
4. Créer `insurance-plans.html`
5. Intégrer avec API backend

---

**Created** : 5 Mars 2026  
**Status** : En attente Phase I
