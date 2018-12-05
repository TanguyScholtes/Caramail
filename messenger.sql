-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le :  mer. 05 déc. 2018 à 09:15
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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `pseudo_id`, `conversation_id`, `date`) VALUES
(1, 'Hello world !', 1, 1, '2018-12-05 09:14:00'),
(2, 'Adieu RIP in pieces', 1, 1, '2018-12-05 09:14:00'),
(3, 'Coucou', 1, 1, '2018-12-05 09:14:16');

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
(13, 1, 1, '👍'),
(15, 1, 1, '😍'),
(21, 1, 1, '🚀'),
(23, 1, 1, '💋'),
(26, 1, 1, '❤️'),
(28, 1, 1, '💝'),
(29, 1, 1, '🐱'),
(30, 1, 1, '😂'),
(31, 1, 1, '😭'),
(32, 1, 1, '😝'),
(33, 1, 1, '😘'),
(34, 1, 1, '👌'),
(35, 1, 1, '😅'),
(36, 1, 1, '😎'),
(37, 1, 1, '😇'),
(38, 1, 1, '👽'),
(39, 1, 1, '💩'),
(40, 1, 1, '✌️'),
(41, 1, 1, '👎'),
(49, 1, 2, '🔱'),
(51, 1, 1, '🐷'),
(52, 1, 2, '🎓'),
(53, 1, 2, '👻'),
(54, 1, 3, '🎃'),
(55, 1, 3, '🎁'),
(56, 1, 3, '🎈'),
(57, 1, 3, '🎄'),
(58, 1, 3, '💣'),
(59, 1, 3, '🍎'),
(60, 1, 4, '🐷'),
(61, 1, 4, '💣'),
(62, 1, 4, '👎'),
(63, 1, 5, '💩'),
(64, 1, 6, '🍕'),
(67, 1, 8, '❤️'),
(68, 1, 9, '🔫'),
(69, 1, 9, '💵'),
(70, 1, 9, '💰'),
(71, 1, 4, '❤️'),
(73, 1, 4, '💩'),
(75, 1, 7, '👎'),
(77, 1, 13, '🔫'),
(78, 1, 11, '🍱'),
(79, 1, 18, '💀');

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
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `nom`, `prenom`, `mail`, `password`) VALUES
(1, 'poneyIRL', 'Georges', 'Licorne', 'poneyIRL@wonderland.com', '$2y$10$kN7b1KGVc1bA82ca4BD5funQnY7/RZVlXP2auaQGAK7TCAXgqhcEi');

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
(1, 1);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
