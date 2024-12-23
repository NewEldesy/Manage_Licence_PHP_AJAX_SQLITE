# Prototype : Système de Licence d'Activation

## Description
Ce prototype met en œuvre un système de licence d'activation basé sur les technologies PHP, AJAX, et SQLite. L'application vérifie la validité de la licence après la connexion de l'utilisateur. Ce projet est conçu pour être extensible et adaptable à divers cas d'utilisation.

## Fonctionnalités Principales
1. **Authentification utilisateur :**
   - Connexion via nom d'utilisateur et mot de passe.
   - Validation des identifiants contre une base de données SQLite.

2. **Gestion des licences :**
   - Association des licences aux utilisateurs.
   - Vérification de la validité de la licence (statut et date d'expiration).

3. **Notification de l'état de la licence :**
   - Licence valide.
   - Licence expirée.
   - Aucune licence trouvée.

## Structure des Fichiers
```
project/
├── BDD/Gestion.db
├── assets/
│   ├── css/style.css
│   ├── js/script.js
├── includes/
│   ├── db.php
│   ├── license.php
│   ├── user.php
├── index.php
├── dashboard.php
└── ajax/
    ├── login.php
    ├── check_license.php
```

## Schéma de la Base de Données

### Table : `users`
```sql
CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
);
```

### Table : `licenses`
```sql
CREATE TABLE licenses (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER NOT NULL,
    license_key TEXT NOT NULL UNIQUE,
    status TEXT DEFAULT 'inactive',
    expiration_date DATE,
    FOREIGN KEY (user_id) REFERENCES users (id)
);
```

## Améliorations Futures
- Ajout de la gestion des utilisateurs (inscription, mise à jour, suppression).
- Notifications par e-mail pour les licences expirées.
- Interface utilisateur améliorée avec Bootstrap ou autres frameworks CSS.
- Implémentation d'un tableau de bord pour gérer les licences.
