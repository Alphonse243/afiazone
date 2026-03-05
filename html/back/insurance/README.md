# 📋 Module: Back Insurance

**Phase** : Phase I — Insurance Partner Management  
**Status** : 🔵 À créer  
**Priorité** : Moyenne  
**Timeline estimée** : Semaine 5

---

## 📝 Description

**Gestion assurances et partenaires** :

- Plans d'assurance
- Partenaires mutuelles
- Souscriptions utilisateurs
- Sinistres (optionnel)

---

## 📄 Fichiers à Créer

```
back/insurance/
├── README.md                          ← Vous êtes ici
├── insurance-plans.html               Lister plans
├── insurance-plan-create.html         Créer plan
├── insurance-plan-edit.html           Éditer plan
├── insurance-subscriptions.html       Souscriptions users
├── insurance-partners.html            Gestion partenaires
├── insurance-claims.html              Gestion sinistres (opt)
├── insurance-analytics.html           Analytics assurance
├── css/
│   └── insurance.css
└── js/
    └── insurance.js
```

---

## 🎯 Objectifs Fonctionnels

### Plans (`insurance-plan-*.html`)

- [ ] CRUD plans d'assurance
- [ ] Prix/conditions
- [ ] Couvertures
- [ ] Exclusions

### Subscriptions (`insurance-subscriptions.html`)

- [ ] Lister souscriptions actives
- [ ] Utilisateur → Plans
- [ ] Statut souscription
- [ ] Date expiration

### Partners (`insurance-partners.html`)

- [ ] Lister partenaires
- [ ] Commission par vente
- [ ] Reporting

### Analytics (`insurance-analytics.html`)

- [ ] Ventes par plan
- [ ] Revenue assurance
- [ ] Taux adoption

---

## 🏥 Types de Plans

```
Assurances Maladie
├── Plan Bronze (base)
├── Plan Silver (standard)
├── Plan Gold (premium)
└── Plan Platinum (maximum)

Micro-assurances
├── Accident
├── Maladie grave
├── Hospitalisation
└── Maternité (optionnel)

Épargne Santé (optionnel)
├── Fonds personnels
├── Croissance composée
└── Retrait libre
```

---

## 🔗 Intégrations Backend

```
GET    /api/admin/insurance/plans         Plans
POST   /api/admin/insurance/plans         Créer
GET    /api/admin/insurance/plans/{id}    Détail
PUT    /api/admin/insurance/plans/{id}    Éditer
GET    /api/admin/insurance/subscriptions Souscriptions
GET    /api/admin/insurance/partners      Partenaires
```

---

## 📚 Références

- **Phase I détails** : [PLAN-COMPLET.md](../../docs/PLAN-COMPLET.md#phase-i)
- **Insurance spec** : [PLAN-COMPLET.md](../../docs/PLAN-COMPLET.md) Phase I Insurance
- **Front-end** : [../../front/wallet/](../../front/wallet/)

---

## 🚀 Next Steps

1. Créer `insurance-plans.html`
2. Créer `insurance-subscriptions.html`
3. Intégrer pricing engine

---

**Created** : 5 Mars 2026  
**Status** : En attente Phase I
