# 📋 Module: Front Medical

**Phase** : Phase J — Medical Records & Prescriptions  
**Status** : 🔵 À créer  
**Priorité** : Moyenne  
**Timeline estimée** : Semaine 6

---

## 📝 Description

Gestion du **dossier médical électronique côté client** :

- Upload d'ordonnances
- Consultation dossier médical personnel
- Historique consultations médicales
- Partage avec prestataires

---

## 📄 Fichiers à Créer

```
front/medical/
├── README.md                            ← Vous êtes ici
├── prescription-upload.html             Upload une ordonnance
├── prescription-status.html             Suivi vérification ordonnance
├── medical-records.html                 Liste dossier médical
├── medical-record-details.html          Détail un record médical
├── medical-record-add.html              Ajouter record manuellement
├── medical-record-share.html            Partager record avec provider
├── consultations.html                   Liste consultations
├── appointment-book.html                Réserver consultation
├── appointment-view.html                Détail consultation
├── css/
│   └── medical.css
└── js/
    └── medical.js
```

---

## 🎯 Objectifs Fonctionnels

### Upload Ordonnance (`prescription-upload.html`)

- [ ] Drag & drop upload
- [ ] Validation format PDF/Image
- [ ] Aperçu avant submission
- [ ] Métadonnées (date, prescripteur)

### Dossier Médical (`medical-records.html`)

- [ ] Timeline de records
- [ ] Filtres par type (consultation, analyse, vaccination)
- [ ] Recherche par date/catégorie
- [ ] Actions (télécharger, partager, supprimer)

### Partage Records (`medical-record-share.html`)

- [ ] Sélection prestataires
- [ ] Configuration permissions (lecture seule, etc)
- [ ] Gestion durée accès

### Consultations (`consultations.html`)

- [ ] Liste consultations avec médecins
- [ ] Détails (date, motif, notes)
- [ ] PDFs résultats attachés

---

## 🔗 Intégrations Backend

```
POST   /api/medical/prescription/upload    Upload ordonnance
GET    /api/medical/records                Récupérer records
GET    /api/medical/records/{id}           Détail record
POST   /api/medical/records/share          Partager record
GET    /api/medical/consultations          Liste consultations
POST   /api/medical/consultations/book     Réserver consultation
```

---

## ⚠️ Points Importants

### Sécurité/Confidentialité

- ✅ **Chiffrement** : Données médicales sensibles
- ✅ **Audit LOG** : Tracer tous les accès
- ✅ **Anonymisation** : Pour analytics
- ✅ **Conformité** : RGPD + Régulations locales

### Données Médicales

- Pas d'historique complet visible sans authentification fort
- Vérification d'identité obligatoire
- Double authentification recommandée

---

## 📚 Références

- **Phase J détails** : [PLAN-COMPLET.md](../../docs/PLAN-COMPLET.md#phase-j)
- **Medical API** : [PLAN-COMPLET.md](../../docs/PLAN-COMPLET.md) Section Medical Phase J
- **Similar module** : `back/medical/` (admin view)
- **Encryption** : Voir architecture PHP Phase J

---

## 🚀 Next Steps

1. Créer `prescription-upload.html`
2. Créer `medical-records.html`
3. Implémenter partage records
4. Intégrer consultations

---

**Created** : 5 Mars 2026  
**Status** : En attente Phase J
