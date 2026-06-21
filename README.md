# Bloom - Fitness & Well-being Tracker

Bloom est une application web fullstack de suivi de fitness et de bien-être, développée avec **PHP Symfony** et **PostgreSQL**. Elle permet aux utilisateurs de planifier leurs routines d'entraînement et de suivre leurs indicateurs quotidiens (sommeil, nutrition, humeur) via un tableau de bord épuré.

## Fonctionnalités

### Étape Initiale & Sécurité
* **Authentification sécurisée** : Inscription et connexion sécurisée.
* **Onboarding Utilisateur** : Parcours d'initialisation pour configurer son profil (pseudo, niveau, objectifs).

### Suivi & Entraînements
* **Dashboard Centralisé** : Vue d'ensemble quotidienne des indicateurs de santé.
* **Daily Logging** : Enregistrement quotidien du temps et de la qualité du sommeil, ainsi que des notes de nutrition.
* **Workout Routines** : Gestion des séances et des exercices associés.

---

## Stack Technique

* **Back-end** : PHP 8.2+ / Symfony 7
* **Base de données** : PostgreSQL / Doctrine ORM
* **Front-end** : Twig / CSS3 (Mobile-First, animations calmes) + Javascript
* **Tests** : PHPUnit

---

## Qualité, Accessibilité & Éco-conception

* **Sémantique HTML5 & Accessibilité (RGAA)** : Utilisation rigoureuse des balises structurelles et intégration d'attributs pour les lecteurs d'écran.
* **Sobriété Numérique** : Interface épurée, absence de frameworks CSS lourds, gestion native des icônes et styles CSS optimisés pour limiter le poids des pages et les requêtes HTTP.
* **Robustesse** : Gestion des pages d'erreurs personnalisées.
* **Tests Automatisés** : Tests unitaires en place sur les entités clés.

---

## ⚙️ Installation & Configuration

### Prerequis
* PHP 8.2
* Composer
* PostgreSQL
* Symfony CLI

### 1. Cloner le dépôt

```bash
git clone https://github.com/beetiips/Bloom
cd bloom```

### 2. Installer les dépendances

```bash
composer install```

### 3. Configurer l'environnement

Créez un fichier .env.local à la racine et configurez votre chaîne de connexion à la base de données.

### 4. Créer la base de données et lancer les migrations

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate```

### 5. Lancer les tests unitaires

```bash
php bin/phpunit```

### 6. Lancer le serveur de développement

```bash
symfony server:start```

L'application sera disponible sur http://localhost:8000.

Bloom 00.01.00
