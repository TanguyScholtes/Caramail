# Oufti

> A PHP chatting website, part of the BeCode studentship
> Made by Dan Gjonaj, Olivier Huttmacher, Tanguy Scholtes & Julie Vanderbyse

* * *

## Fonctionnalités

L'utilisateur à la capacité de s'inscrire à la messagerie , une fois connecté il lui est permi de voir et de modifier son profil, de participer à la conversation générale, de réagir aux messages envoyés. Il lui est permi de supprimer et modifier ses propres messages ainsi que ses réactions et son profil.

## Présentation

Des maquettes ont été réalisées, une partie du CSS issu de ces maquettes est actuellement inséré.

## Structure de la base de donnée
La base de donnée se compose comme suit:
- Conversation: 
    * id
    * Author Id
    * Subject
    * Slug
- Messages:
    * id
    * Message
    * Pseudo_id
    * Conversation_id
    * Date
    > Note: La base de donnée doit être UTF8MB4 pour permettre le stockage des emojis.
- Reactions: 
    * id
    * Author_id
    * Message_id 
    * Emoji
    > Note: La base de donnée doit être UTF8MB4 pour permettre le stockage des emojis.
- Users:
    * id
    * Pseudo
    * Nom
    * Prenom
    * Mail
    * Password
    * Avatar
- Users_conversations:
    * User_id
    * Conversation_id 
   
## Structure des fichiers
# Css + Fonts + Images
> Stockage du CSS
# Lib
>Stockage de la librairie attribuée au emoji picker (https://github.com/OneSignal/emoji-picker)
# Mockup 
> Maquette du chat + architecture de la DB
# Objects
> Stockage des classes:
    - Message.php: Où sont définies l'ensembles de méthodes concernant les messages
    - Model.php: Constructeur permettant la connexion à la base de donnée et dont toute les autres classes héritent.
    - Reaction.php: L'ensemble des méthodes concernant les réactions
    - User.php: L'ensemble des métodes concernant les utilisateurs
# Partials
> Footer, Header, Menu -> HTML scindé permettant la réutilisation simplifiée sur chacune des pages.
#SCSS:
> Fichiers SASS utilisé par tanguy_styles.css
# Templates:
> Template du chat principal
# Utils
> Fonctions utilisables tout au long de l'application n'appartenant pas à une classe définie
# chat.php
> Récupère toutes les données inclues dans le chat et les affiches dans chat-template.php
# config.php
> Défini les constantes utilisées pour l'affichage, et dans quel fichier les données permettant la connexion à la base de donnée doivent être cherchées, initialise un session_start(), appelle l'ensemble des classes.
# createmessage.php
>Traitement de l'ajout d'un nouveau message dans la base de donnée
# createReaction.php
> Traitement de l'ajout d'une nouvelle réaction dans la base de donnée
# db.ini
> Le fichier doit être créé par l'utilisateur pour permettre la connexion à la base de donnée et doit contenir les informations de connexion à la base de donnée: driver, host, dbname, username, password.
# deconnection.php
> Traitement de la déconnexion d'un utilisateur -> suppression de la session et des cookies
# deleteReaction.php
> Traitement de la suppression d'une réaction de la base de donnée
# edit_profile.php
> Traitement et affichage des updates des données des utilisateurs au sein de la base de donnée
# erase_traitement.php
> Traitement de la suppression en cascade des données de l'utilisateur
# erase.php
> Page transitoire de l'affichage de confirmation de suppression de l'utilisateur
# index.php
> Affichage du formulaire de log-in et la redirection à l'inscription 
# inscription_post.php
> Traitement de l'ajout d'un utilisateur à la base de donnée
# Inscription.php
> Affichage du formulaire d'inscription
# Login_traitement.php
> Traitement de la connexion d'un utilisateur
# message_delete.php
> Traitement de la suppression d'un message de la base de donnée
# message_edit.php
> Affichage et traitement du formulaire d'édition de message
# profile.php
> Affichage du profile de l'utilisateur


## Mise en place

PHP, comme MySQL, ont besoin d'un serveur pour fonctionner. Nous pourrions passer par des systèmes comme [WAMP](http://www.wampserver.com/) (sur Windows), [MAMP](https://www.mamp.info/en/) (sur macOS), voire installer chaque élement _à la main_ sur Linux.
Nous allons plutôt utiliser [Docker](https://www.docker.com/), une solution performante, utilisable en développement comme en production, devenu un standard de l'industrie.

> *"Ouais, mais, c'est quoi, Docker, comment ça marche ?"* : pour être honnête, Docker, c'est assez complexe, et on va donc pas se tracasser du _quoi_ pour le moment. On va utiliser l'outil, et on se penchera sur ses possibilités plus tard.

### Installer docker

Pour commencer, nous devons installer **docker** sur nos machines :

- Sur macOS, suivez la procédure expliquée sur [cette page](https://docs.docker.com/docker-for-mac/install/)
- Sur windows, suivez la procédure expliquée sur [cette page](https://docs.docker.com/docker-for-windows/install/)
- Sur Linux, suivez la procédure expliquée sur [cette page](https://docs.docker.com/install/linux/docker-ce/ubuntu/)

Pour tester votre installation, lancez la commande `docker run hello-world`.

> **NOTE :** sur linux, il est possible que vous ayez une erreur de droits, que vous pouvez corriger en vous référant à [cette adresse](https://techoverflow.net/2017/03/01/solving-docker-permission-denied-while-trying-to-connect-to-the-docker-daemon-sockethttps://techoverflow.net/2017/03/01/solving-docker-permission-denied-while-trying-to-connect-to-the-docker-daemon-socket//).

Ensuite, installez **docker-compose** :

- Sur macOS et windows, c'est déjà installé avec docker
- Sur Linux, suivez la procédure expliquée sur [cette page](https://docs.docker.com/compose/install/#install-compose)

### Lancer docker

Une fois docker installé, il vous suffit de la lancer pour commencer à travailler.
Pour ce faire, depuis le dossier du repo, lancez la commande suivante :

    docker-compose up

Une fois lancé, les services suivants seront accessibles :

- le site sur l'adresse [localhost:8000](http://localhost:8000)
- _phpmyadmin_ sur l'adresse [localhost:8001](http://localhost:8001)
- _mailcatcher_ (utilisé dans une consigne bonus) sur l'adresse [localhost:8002](http://localhost:8002)

### Accès à MySQL

Pour connecter vos scripts PHP à la base de données MySQL, utilisez les paramètres suivants :

- host : `mysql`
- login : `messenger`
- password : `messenger`

> **NOTE:** ce mot de passe n'est pas très _safe_, mais cet environnement de travail est uniquement accessible en local.

* * *

