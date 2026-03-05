# 📋 Module: Back Prescriptions

**Phase** : Phase J — Prescription Verification & Management  
**Status** : 🔵 À créer  
**Priorité** : Haute  
**Timeline estimée** : Semaine 6

---

## 📝 Description

**Vérification et gestion ordonnances côté admin** :

- Queue ordonnances à vérifier
- Vérification pharmacienne
- Approbation/Rejet
- Statistiques prescriptions

---

## 📄 Fichiers à Créer

```
back/prescriptions/
├── README.md                          ← Vous êtes ici
├── prescriptions-queue.html           Queue en attente
├── prescription-review.html           Détail à vérifier
├── prescription-approve.html          Form approbation
├── prescription-reject.html           Form rejet
├── prescription-history.html          Historique vérif
├── prescription-statistics.html       Stats prescriptions
├── css/
│   └── prescriptions.css
└── js/
    └── prescriptions.js
```

---

## 🎯 Objectifs Fonctionnels

### Queue (`prescriptions-queue.html`)

- [ ] Lister ordonnances pending
- [ ] Filtres (date, pharmacie, patient)
- [ ] Nombre ordonnances par jour

### Review (`prescription-review.html`)

- [ ] Afficher scan ordonnance
- [ ] Infos médicament
- [ ] Vérifier vs liste RDC
- [ ] Timeline soumission

### Approve (`prescription-approve.html`)

- [ ] Vérifier doses appropriées
- [ ] Contre-indications
- [ ] Date validité

### Statistics (`prescription-statistics.html`)

- [ ] Médicaments top
- [ ] Zones géographiques
- [ ] Taux rejection

---

## 🔗 Intégrations Backend

```
GET    /api/admin/prescriptions/queue       Queue
GET    /api/admin/prescriptions/{id}        Détail
POST   /api/admin/prescriptions/{id}/verify Vérifier
GET    /api/admin/prescriptions/stats       Stats
```

---

## 🏥 Conformité Médicale

- Vérification vs **liste officielle RDC**
- Dosages appropriés
- Contre-indications
- Interactions médicamenteuses

---

## 📚 Références

- **Phase J détails** : [PLAN-COMPLET.md](../../docs/PLAN-COMPLET.md#phase-j)
- **Prescription API** : [PLAN-COMPLET.md](../../docs/PLAN-COMPLET.md) Phase J
- **Front-end** : [../../front/medical/](../../front/medical/)

---

## 🚀 Next Steps

1. Créer `prescriptions-queue.html`
2. Créer review interface
3. Intégrer liste officielle RDC
4. Setup stats dashboard

---

**Created** : 5 Mars 2026  
**Status** : En attente Phase J
