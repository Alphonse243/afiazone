# 📋 Module: Back Promotions

**Phase** : Phase I+ — Promotions & Marketing  
**Status** : 🔵 À créer  
**Priorité** : Moyenne  
**Timeline estimée** : Semaine 5

---

## 📝 Description

**Gestion codes promos et campagnes** :

- Codes de réduction
- Campagnes marketing
- Tracking utilisation
- Analytics performance

---

## 📄 Fichiers à Créer

```
back/promotions/
├── README.md                          ← Vous êtes ici
├── promo-codes.html                   Lister codes
├── promo-code-create.html             Créer code
├── promo-code-edit.html               Éditer code
├── promo-code-detail.html             Détail usage code
├── promo-campaigns.html               Campagnes marketing
├── promo-analytics.html               Performance promos
├── css/
│   └── promotions.css
└── js/
    └── promotions.js
```

---

## 🎯 Objectifs Fonctionnels

### Codes (`promo-code-*.html`)

- [ ] CRUD codes
- [ ] Type réduction (%)$(fixe)
- [ ] Conditions (min order, catégorie)
- [ ] Validité (dates)
- [ ] Limite usage (per user, global)

### Campaigns (`promo-campaigns.html`)

- [ ] Créer campagne
- [ ] Codes associés
- [ ] Dates activation
- [ ] Cible (utilisateurs, catégories)

### Analytics (`promo-analytics.html`)

- [ ] Utilisation codes
- [ ] Revenue impact
- [ ] Taux conversion
- [ ] ROI par campagne

---

## 💰 Types de Codes

```
Réductions
├── Montant fixe (e.g., $5)
├── Pourcentage (e.g., 10%)
├── Free shipping
└── Buy X get Y

Restrictions
├── Minimum order
├── Catégories spécifiques
├── Premier achat only
├── Usage limite (1x/user, 100x global)
└── Dates (start/end)
```

---

## 🔗 Intégrations Backend

```
GET    /api/admin/promos/codes           Codes
POST   /api/admin/promos/codes           Créer
PUT    /api/admin/promos/codes/{id}      Éditer
GET    /api/admin/promos/codes/{id}      Détail
GET    /api/promos/validate              Valider code (API client)
GET    /api/admin/promos/analytics       Stats
```

---

## 📚 Références

- **Phase I+ détails** : [PLAN-COMPLET.md](../../docs/PLAN-COMPLET.md)
- **Marketing strategy** : [PLAN-COMPLET.md](../../docs/PLAN-COMPLET.md) Phase I+

---

## 🚀 Next Steps

1. Créer `promo-codes.html`
2. Créer `promo-campaigns.html`
3. Implémenter validation codes
4. Setup analytics

---

**Created** : 5 Mars 2026  
**Status** : En attente Phase I+
