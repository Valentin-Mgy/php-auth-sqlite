# Système d'authentification PHP & SQLite

Projet d'authentification from scratch en PHP natif sans framework.

## Fonctionnalités
- Initialisation et gestion de base de données SQLite via **PDO**.
- Protection contre les injections SQL (requêtes préparées).
- Hachage sécurisé des mots de passe (`BCRYPT` via `password_hash` / `password_verify`).
- Gestion de session et contrôle d'accès basé sur les rôles (**Admin** / **Client**).
- Déconnexion propre et destruction de session.

## Installation et lancement
1. Cloner le dépôt.
2. Initialiser la base SQLite :
   ```bash
   php init_db.php
