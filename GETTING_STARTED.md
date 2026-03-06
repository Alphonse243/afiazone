# 🚀 Guide de Démarrage — AfiaZone Architecture MVC

## Configuration Initiale

### 1. Cloner le .env
```bash
# Windows (PowerShell)
Copy-Item .env.example .env

# Ou Linux/Mac
cp .env.example .env
```

### 2. Générer la clé d'application

Votre clé APP_KEY générée :
```
APP_KEY=base64:YfZStbkopE0AEsw9HP7VCbOB+bA0DtpLoRbLVWimwCI=
```

**Ensuite** :
1. Ouvrez le fichier `.env` (créé à l'étape 1)
2. Remplacez la ligne :
   ```
   APP_KEY=base64:GENERATED_KEY_HERE
   ```
   Par :
   ```
   APP_KEY=base64:YfZStbkopE0AEsw9HP7VCbOB+bA0DtpLoRbLVWimwCI=
   ```
3. Sauvegardez le fichier

**Ou avec PowerShell** (automatisé) :
```powershell
(Get-Content .env) -replace 'APP_KEY=.*', 'APP_KEY=base64:YfZStbkopE0AEsw9HP7VCbOB+bA0DtpLoRbLVWimwCI=' | Set-Content .env
```

### 3. Installer les dépendances Composer

Installez les dépendances PHP requises :

```bash
composer install
```

Cela créera le dossier `vendor/` avec toutes les dépendances nécessaires. L'application utilise le file-based caching par défaut (stocké dans `storage/cache/`).

### 4. Initialiser la base de données

```bash
# Créer la BD et appliquer le schéma
php bin/setup-db.php
```

**Note** : Cette commande crée la base de données `afiazone` et applique automatiquement tout le schéma. C'est tout ce qu'il faut ! ✅

### 5. Accéder au site
```bash
# Avec Laragon (Windows)
# Double-cliquez sur "afiazone" dans Laragon ou ouvrez
http://afiazone.test/
http://localhost/afiazone/

# Le serveur Apache/PHP est automatiquement lancé par Laragon