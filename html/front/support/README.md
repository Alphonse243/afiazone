# 📋 Module: Front Support

**Phase** : Phase N — Customer Support & Help Center  
**Status** : 🔵 À créer  
**Priorité** : Moyenne  
**Timeline estimée** : Semaine 8

---

## 📝 Description

**Centre d'aide et support client** :

- FAQ publique
- Création tickets support
- Suivi tickets en cours
- Chat support (optionnel)
- Centre de ressources

---

## 📄 Fichiers à Créer

```
front/support/
├── README.md                          ← Vous êtes ici
├── support-tickets.html               Liste mes tickets
├── support-ticket-create.html         Créer nouveau ticket
├── support-ticket-detail.html         Détail ticket + messages
├── faq.html                           FAQ publique
├── contact.html                       Page contact
├── helpdesk.html                      Centre d'aide
├── chatbot.html                       Chat bot AI (optionnel)
├── css/
│   └── support.css
└── js/
    └── support.js
```

---

## 🎯 Objectifs Fonctionnels

### Tickets Support (`support-ticket-*.html`)

- [ ] Créer ticket avec catégorie
- [ ] Lister mes tickets avec statut
- [ ] Détail ticket avec timeline messages
- [ ] Upload attachments
- [ ] Évaluer réponse

### FAQ (`faq.html`)

- [ ] Catégories FAQ
- [ ] Recherche questions
- [ ] Accordion/Collapse
- [ ] Vote "Utile/Pas utile"

### Centre d'Aide (`helpdesk.html`)

- [ ] Pages guides
- [ ] Vidéos tutoriels (links)
- [ ] Étapes dépannage
- [ ] Liens ressources externes

---

## 🔗 Intégrations Backend

```
POST   /api/support/tickets              Créer ticket
GET    /api/support/tickets              Mes tickets
GET    /api/support/tickets/{id}         Détail ticket
POST   /api/support/tickets/{id}/reply   Répondre ticket
GET    /api/support/faq                  Questions FAQ
GET    /api/support/helpdesk             Articles helpdesk
```

---

## 📚 Références

- **Phase N détails** : [PLAN-COMPLET.md](../../docs/PLAN-COMPLET.md#phase-n)
- **Similar** : `back/moderation/` (admin view des tickets)
- **Templates** : [back/templates/](../templates/)

---

## 🚀 Next Steps

1. Créer `support-ticket-create.html`
2. Créer `support-tickets.html`
3. Créer `faq.html`
4. Créer `helpdesk.html`

---

**Created** : 5 Mars 2026  
**Status** : En attente Phase N
