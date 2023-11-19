# AMPP

## Apache MySQL PhpMyAdmin Proxy

Ce docker-compose configure un serveur web Apache avec MySQL et phpMyAdmin, tous configurables par Nginx Proxy Manager. La racine du site correspond au répertoire 'www' au sein du dossier.

## Prérequis
- Docker
- Docker Compose
- Nginx Proxy Manager installé et configuré avec un réseau bridge appelé 'frontend'

## Structure du Répertoire

La structure du répertoire devrait ressembler à ceci :

.
├── docker-compose.yml
└── www
└── index.html

bash


Assurez-vous d'avoir le fichier `docker-compose.yml` à la racine du dossier et le répertoire `www` contenant vos fichiers de site.

## Instructions d'Installation et de Configuration

### 1. Cloner le Référentiel

```bash
git clone https://github.com/votre-utilisateur/AMPP.git

2. Accéder au Répertoire du Projet

bash

cd AMPP

3. Configuration de Nginx Proxy Manager

    Accédez à l'interface web de Nginx Proxy Manager à l'adresse http://<adresse_IP_de_votre_serveur>:<port_Nginx_Proxy_Manager>.
    Connectez-vous à l'interface avec vos identifiants.
    Dans le panneau de gauche, cliquez sur "Proxy Hosts" pour accéder à la configuration des hôtes proxy.

Configuration de l'Hôte Apache

    Cliquez sur le bouton "+ CREATE A NEW PROXY HOST".
    Remplissez les champs suivants :
        Domain Names: site1.yourdomain.com (ou le domaine que vous avez choisi)
        Scheme: http
        Forward Hostname/IP: apache
        Forward Port: 80
    Cliquez sur le bouton "Save" pour enregistrer la configuration.

Configuration de l'Hôte phpMyAdmin

    Cliquez sur le bouton "+ CREATE A NEW PROXY HOST".
    Remplissez les champs suivants :
        Domain Names: phpmyadmin.yourdomain.com (ou le sous-domaine que vous avez choisi)
        Scheme: http
        Forward Hostname/IP: phpmyadmin
        Forward Port: 80
    Cliquez sur le bouton "Save" pour enregistrer la configuration.

4. Instructions d'Utilisation

    Lancez les services en utilisant Docker Compose :

    bash

docker-compose up -d

Vérifiez que les conteneurs sont en cours d'exécution :

bash

    docker ps

    Assurez-vous que les conteneurs apache, mysql, et phpmyadmin sont en cours d'exécution.

    Testez l'accès aux sites via les noms de domaine configurés.

N'oubliez pas de remplacer les mots de passe par des valeurs plus sécurisées dans un environnement de production.

rust


J'espère que cela répond à vos attentes. N'hésitez pas si vous avez d'autres ajustements ou questions.

