-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le :  Dim 09 déc. 2018 à 13:48
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `messenger`
--

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(10) NOT NULL,
  `author_id` int(10) NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `conversation`
--

INSERT INTO `conversation` (`id`, `author_id`, `subject`, `slug`) VALUES
(1, 0, 'Général', 'general');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) NOT NULL,
  `message` varchar(2000) COLLATE utf8mb4_bin NOT NULL,
  `pseudo_id` int(10) NOT NULL,
  `conversation_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_edit` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `pseudo_id`, `conversation_id`, `date`, `date_edit`) VALUES
(1, 'Hello world !', 1, 1, '2018-12-05 09:14:00', '2018-12-07 15:28:07'),
(2, 'Adieu RIP in pieces', 1, 1, '2018-12-05 09:14:00', '2018-12-07 15:28:07'),
(3, 'Coucou', 1, 1, '2018-12-05 09:14:16', '2018-12-07 15:28:07');

-- --------------------------------------------------------

--
-- Structure de la table `reactions`
--

CREATE TABLE `reactions` (
  `id` int(255) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `message_id` int(10) UNSIGNED NOT NULL,
  `emoji` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `reactions`
--

INSERT INTO `reactions` (`id`, `author_id`, `message_id`, `emoji`) VALUES
(1, 10, 3, '😈'),
(2, 10, 2, '💀');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `nom`, `prenom`, `mail`, `password`, `avatar`) VALUES
(1, 'poneyIRL', 'Georges', 'Licorne', 'poneyIRL@wonderland.com', '$2y$10$kN7b1KGVc1bA82ca4BD5funQnY7/RZVlXP2auaQGAK7TCAXgqhcEi', 'https://api.adorable.io/avatars/285/poneyIRL@adorable.png'),
(9, 'toto', 'toto', 'toto', 'toto@toto.toto', '$2y$10$yQEAk1hAA0N2E4jrMqZJOu1xcxiLYngkeW/KTaDhpZjVHMbAOk6V2', 'https://api.adorable.io/avatars/285/toto@adorable.png'),
(10, 'Tanguy', 'Aurion', 'Kratos', 'kratos@aurion.com', '$2y$10$OOQiJ..3nlCHxNxxgctWOOplzDV7shbNHAILEhI46tMdBi0zq02Uu', 'https://api.adorable.io/avatars/285/Tanguy@adorable.png'),
(13, 'Revan', 'Revan', 'Tanguy', 'revan@sith.com', '$2y$10$An2bfgH/lBqvf/SGtEs2Ju/YGbZTOXTQTUHpIDG9u47QsXghDp1gq', 'https://api.adorable.io/avatars/285/Revan@adorable.png');

-- --------------------------------------------------------

--
-- Structure de la table `users_conversations`
--

CREATE TABLE `users_conversations` (
  `user_id` int(10) NOT NULL,
  `conversation_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `users_conversations`
--

INSERT INTO `users_conversations` (`user_id`, `conversation_id`) VALUES
(1, 1),
(9, 1),
(10, 1),
(12, 1),
(13, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD UNIQUE KEY `subject` (`subject`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
