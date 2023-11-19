
# AMPP

## Apache MySQL PhpMyAdmin Proxy

Ce docker-compose configure un serveur web Apache avec MySQL et phpMyAdmin, tous configurables par Nginx Proxy Manager.

La racine du site correspond au répertoire 'www' au sein du dossier.



## Prérequis
- Docker
- Docker Compose
- Nginx Proxy Manager installé et configuré avec un réseau bridge appelé 'frontend'

## Installation

1. Clonez ce référentiel sur votre serveur :

```bash
git clone https://github.com/NvhNvhsi/AMPP.git
cd AMPP
```
2. Renommez le projet

```bash
mv AMPP/ <NomDuProjet>
```

2. Entrez dans le repertoire dur projet
```bash
cd <NomDuProjet>
```
## Configuration de l'environement

Modifiez le fichier `.env` à la racine du projet. Ce fichier est utilisé pour stocker les variables d'environnement.

   ```env
   SITE_NAME=site1
   DOMAIN=yourdomain.com
   PHPMYADMIN_SUBDOMAIN=phpmyadmin
   MYSQL_ROOT_PASSWORD=azerty
   MYSQL_DATABASE=mydatabase
   MYSQL_USER=myuser
   MYSQL_PASSWORD=azerty
   ```

Le nom des variable sont reférencées dans la documentation :

`<SITE_NAME>`, `<DOMAIN>`, `<PHPMYADMIN_SUBDOMAIN>`, `<MYSQL_ROOT_PASSWORD>`, `<MYSQL_DATABASE>`, `<MYSQL_USER>`, `<MYSQL_PASSWORD>`
## Configuration de Nginx Proxy Manager

###  1. Vérifiez le réseau docker
Pour permettre a Nginx Proxy Manager de configurer le serveur web, un docker-network est utilisé.

Le reséau utilisé est `frontend`.


Pour verifier que le réseau existe:

```bash
  sudo docker network ls
```
Si il existe, verifiez que Nginx Proxy Manager y est connecté :

```bash
  sudo docker inspect frontend
```

###  2. Accédez à l'interface web

`http://<adresse_IP_de_votre_serveur>:81`

Connectez-vous à l'interface avec vos identifiants.

Dans le panneau de gauche, cliquez sur "Proxy Hosts" pour accéder à la configuration des hôtes proxy.


### 3. Ajouter un Host Proxy pour Apache

Cliquez sur le bouton "+ CREATE A NEW PROXY HOST".

Remplissez les champs suivants :

- **Domain Names**: `<SITE_NAME>.<DOMAIN>` *(exemple : site1.yourdomain.com)*

- **Scheme**: `http`

- **Forward Hostname/IP**: `<SITE_NAME>-apache` *(exemple : site1-apache)*

- **Forward Port**: `80`

Cliquez sur le bouton "Save" pour enregistrer la configuration.

###  4. Ajouter un Host Proxy pour phpmyadmin

Cliquez sur le bouton "+ CREATE A NEW PROXY HOST".

Remplissez les champs suivants :

- **Domain Names**: `<PHPMYADMIN_SUBDOMAIN>.<DOMAIN>` *(exemple : phpmyadmin.yourdomain.com)*

- **Scheme**: `http`

- **Forward Hostname/IP**: `<SITE_NAME>-phpmyadmin` *(exemple : site1-phpmyadmin)*

- **Forward Port**: `80`

Cliquez sur le bouton "Save" pour enregistrer la configuration.
## Déploiement

1. Lancez les services en utilisant Docker Compose :

```bash
  sudo docker-compose up -d
```

2. Vérifiez que les conteneurs sont en cours d'exécution :


```bash
  sudo docker ps
```

Assurez-vous que les conteneurs apache, mysql, et phpmyadmin sont en cours d'exécution.

## Accès

Pour acceder au site site web : `http://<SITE_NAME>.<DOMAINE>` *(ex: site1.yourdomain.com)*

Pour acceder a PhpmyAdmin : `http://<PHPMYADMIN_SUBDOMAIN>.<DOMAINE>` *(ex: phpmyadmin.yourdomain.com)*

**User :** `<MYSQL_USER>` *(défaut: user)*

**Password :** `<MYSQL_PASSWORD>` *(défaut: azerty)*
