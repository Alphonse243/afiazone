# 📋 Module: Back KYC Admin

**Phase** : Phase E — KYC Review & Verification  
**Status** : 🔵 À créer  
**Priorité** : Haute  
**Timeline estimée** : Semaine 2

---

## 📝 Description

**Panel d'administration KYC** :

- Queue soumissions en attente
- Review documents
- Approbation/Rejet
- Historique décisions

---

## 📄 Fichiers à Créer

```
back/kyc/
├── README.md                          ← Vous êtes ici
├── kyc-queue.html                     Queue submissions pending
├── kyc-submission-review.html         Détail à review
├── kyc-approve.html                   Form d'approbation
├── kyc-reject.html                    Form de rejet
├── kyc-history.html                   Historique décisions
├── css/
│   └── kyc.css
└── js/
    └── kyc.js
```

---

## 🎯 Objectifs Fonctionnels

### Queue (`kyc-queue.html`)

- [ ] Lister submissions pending
- [ ] Filtres (date, type, utilisateur)
- [ ] Afficher score risque (auto-computed)
- [ ] Actions rapides

### Review (`kyc-submission-review.html`)

- [ ] Afficher tous documents
- [ ] Status actuels documents
- [ ] Timeline soumission
- [ ] Infos utilisateur

### Approve Form (`kyc-approve.html`)

- [ ] Raison approbation
- [ ] Tier assigné
- [ ] Commentaires internes

### Reject Form (`kyc-reject.html`)

- [ ] Raison rejet
- [ ] Instructions correction
- [ ] Email utilisateur auto

---

## 🔗 Intégrations Backend

```
GET    /api/admin/kyc/queue             Queue submissions
GET    /api/admin/kyc/{id}              Détail submission
POST   /api/admin/kyc/{id}/approve      Approuver
POST   /api/admin/kyc/{id}/reject       Rejeter
GET    /api/admin/kyc/history           Historique
```

---

## 📚 Références

- **Phase E détails** : [PLAN-COMPLET.md](../../docs/PLAN-COMPLET.md#phase-e)
- **KYC workflow** : [PLAN-COMPLET.md](../../docs/PLAN-COMPLET.md) Phase E KYC spec
- **Front-end couterpart** : [../../front/kyc/](../../front/kyc/)

---

## 🚀 Next Steps

1. Créer `kyc-queue.html`
2. Créer review interface
3. Créer approve/reject forms

---

**Created** : 5 Mars 2026  
**Status** : En attente Phase E
