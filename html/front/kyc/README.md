# 📋 Module: Front KYC (Know Your Customer)

**Phase** : Phase E — KYC & Merchant Onboarding  
**Status** : 🔵 À créer  
**Priorité** : Moyenne  
**Timeline estimée** : Semaine 2

---

## 📝 Description

Ce module gère le **processus KYC côté client** :

- Soumission de documents d'identité
- Vérification d'adresse
- Suivi du statut de validation
- Gestion des rejets et corrections

---

## 📄 Fichiers à Créer

```
front/kyc/
├── README.md                      ← Vous êtes ici
├── kyc-submit.html               Formulaire principal KYC
├── kyc-documents.html            Upload de documents (ID, adresse)
├── kyc-status.html               Statut de la demande en cours
├── kyc-rejected.html             Page si demande rejetée
├── kyc-success.html              Confirmation d'approbation KYC
├── css/
│   └── kyc.css                   Styles spécifiques KYC
└── js/
    └── kyc.js                    Logique formulaires KYC
```

---

## 🎯 Objectifs Fonctionnels

### Formulaire KYC (`kyc-submit.html`)

- [ ] Champs pour infos personnelles (nom, prénom, date naissance)
- [ ] Options d'upload pour ID/Passeport
- [ ] Champ adresse avec validation
- [ ] Validation en temps réel
- [ ] Bouton soumettre avec confirmation

### Upload Documents (`kyc-documents.html`)

- [ ] Drag & drop pour fichiers
- [ ] Validation taille/format
- [ ] Aperçu documents
- [ ] Gestion uploads multiples

### Statut (`kyc-status.html`)

- [ ] Affichage statut actuel (pending, approved, rejected)
- [ ] Timeline du processus
- [ ] Messages de statut
- [ ] Lien pour modifier si rejeté

### Page Rejection (`kyc-rejected.html`)

- [ ] Raison du rejet
- [ ] Instructions pour correction
- [ ] Lien pour réessayer

### Confirmation (`kyc-success.html`)

- [ ] Message de bienvenue
- [ ] Prochaines étapes
- [ ] Liens vers modules débloqués

---

## 🔗 Intégrations Backend

### API Endpoints à Utiliser

```
POST   /api/kyc/submit               Soumettre KYC
GET    /api/kyc/status               Récupérer statut
GET    /api/kyc/requirements         Ressources acceptées
POST   /api/kyc/upload-document      Uploader document
DELETE /api/kyc/document/{id}        Supprimer document
```

---

## 🎨 Inspiration & Références

- **Template similaire** : `back/kyc/` (admin review)
- **Upload components** : `back/templates/forms/forms-file-upload.html`
- **Status tracking** : `front/shopping/order-details.html` (timeline)

---

## 🗂️ Assets Nécessaires

### CSS

- Styles pour formulaire
- Styles pour upload zone
- Styles pour timeline statut
- Styles pour messages d'erreur

### JavaScript

- Validation formulaire
- Gestion upload fichiers
- Polling statut automatique
- Gestion erreurs API

---

## ✅ Critères d'Acceptation

- [ ] Formulaire valide avant envoi
- [ ] Upload fichiers fonctionne
- [ ] Statut se synchronise avec backend
- [ ] Messages d'erreur clairs
- [ ] Responsive design (mobile OK)
- [ ] Accessibilité WCAG AA
- [ ] Performance optimale

---

## 📚 Références Documentation

- **Phase E détails** : [PLAN-COMPLET.md](../../docs/PLAN-COMPLET.md#phase-e)
- **KYC workflow** : [PLAN-COMPLET.md](../../docs/PLAN-COMPLET.md) API endpoints PhaseE
- **Formulaires templates** : [back/templates/forms/](../templates/forms/)
- **File upload** : [forms-file-upload.html](../templates/forms/forms-file-upload.html)

---

## 🚀 Prochaines Étapes

1. Cloner structure depuis `back/kyc/` pour inspiration
2. Créer `kyc-submit.html`
3. Créer `kyc-documents.html` avec upload
4. Implémenter statut tracking
5. Intégrer avec API backend

---

**Created** : 5 Mars 2026  
**Module Lead** : À assigner  
**Status** : En attente Phase E
