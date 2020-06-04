-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 03 juin 2020 à 07:54
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `symfony4`
--

-- --------------------------------------------------------

--
-- Structure de la table `collection`
--

DROP TABLE IF EXISTS `collection`;
CREATE TABLE IF NOT EXISTS `collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `dimensions` int(11) NOT NULL,
  `parts_number` smallint(6) NOT NULL,
  `price` int(11) NOT NULL,
  `possession` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `collection`
--

INSERT INTO `collection` (`id`, `title`, `description`, `dimensions`, `parts_number`, `price`, `possession`, `created_at`, `image`) VALUES
(1, 'Vanilla Nekopara', 'A fully Cast-Off figure of the most kawaii catgirl from La Soleil.', 35, 1, 390, 0, '2020-05-26 13:35:13', 'https://a9c22acaee44c3022afd-09904985198ceb8a8dc81ac3bda18303.ssl.cf3.rackcdn.com/p/25291-146758-large.jpg'),
(2, 'Chocola Nekopara', 'The other most cute catgirl from La Soleil !', 35, 1, 400, 0, '2020-05-27 09:18:00', 'https://a9c22acaee44c3022afd-09904985198ceb8a8dc81ac3bda18303.ssl.cf3.rackcdn.com/p/25157-145680-large.jpg'),
(3, 'Zero Two - Darling in the Franxx', 'An incredible figure from the show Darling in the Franxx representing the perfect best girl : Zero Two', 30, 1, 150, 0, '2020-05-27 09:19:00', 'https://a9c22acaee44c3022afd-09904985198ceb8a8dc81ac3bda18303.ssl.cf3.rackcdn.com/p/28242-171977-large.jpg'),
(4, '2B - NieR Automata', 'A 2B figure from the best game of all time', 24, 3, 80, 0, '2020-05-27 09:21:00', 'https://a9c22acaee44c3022afd-09904985198ceb8a8dc81ac3bda18303.ssl.cf3.rackcdn.com/p/26376-156063-large.jpg'),
(5, 'Raphtalia - The Rising of the Shield Hero', 'A nice figure for a nice girl !', 25, 2, 130, 0, '2020-05-27 09:22:00', 'https://a9c22acaee44c3022afd-09904985198ceb8a8dc81ac3bda18303.ssl.cf3.rackcdn.com/p/29736-185192-large.jpg'),
(6, 'Jotaro - JoJo\'s Bizarre Adventure', 'Yare yare daze...', 25, 4, 140, 0, '2020-05-27 09:24:00', 'https://a9c22acaee44c3022afd-09904985198ceb8a8dc81ac3bda18303.ssl.cf3.rackcdn.com/p/23733-135025-large.jpg'),
(7, 'Shinji Ikari - Neon Genesis Evangelion', 'GET IN THE FUCKING ROBOT SHINJI !!!!', 18, 1, 55, 0, '2020-05-27 09:25:00', 'https://a9c22acaee44c3022afd-09904985198ceb8a8dc81ac3bda18303.ssl.cf3.rackcdn.com/p/30054-187844-large.jpg'),
(8, 'Asuka - Neon Genesis Evangelion', 'BAKAAAAAAAA', 18, 1, 55, 0, '2020-05-27 09:26:00', 'https://a9c22acaee44c3022afd-09904985198ceb8a8dc81ac3bda18303.ssl.cf3.rackcdn.com/p/27677-167076-large.jpg'),
(9, 'Asuna - Sword Art Online', 'One of the most badass woman with a sword', 20, 2, 70, 0, '2020-05-27 09:28:00', 'https://a9c22acaee44c3022afd-09904985198ceb8a8dc81ac3bda18303.ssl.cf3.rackcdn.com/p/30044-187770-large.jpg'),
(10, 'Sinon - Sword Art Online', 'The real best girl from SAO coming to your shelf !', 20, 2, 70, 0, '2020-05-27 09:28:30', 'https://a9c22acaee44c3022afd-09904985198ceb8a8dc81ac3bda18303.ssl.cf3.rackcdn.com/p/23786-135460-large.jpg'),
(11, 'Revy - Black Lagoon', 'Honestly the most badass and cool woman in anime world', 25, 2, 100, 0, '2020-05-27 09:31:00', 'https://a9c22acaee44c3022afd-09904985198ceb8a8dc81ac3bda18303.ssl.cf3.rackcdn.com/p/18204-93797-large.jpg'),
(12, 'Roberta - Black Lagoon', 'The most passionated maid', 20, 2, 90, 0, '2020-05-27 09:33:00', 'https://a9c22acaee44c3022afd-09904985198ceb8a8dc81ac3bda18303.ssl.cf3.rackcdn.com/p/10385-49485-large.jpg'),
(13, 'Mia Karnstein - Code Vein', 'If you read this, then you have good taste !', 30, 3, 120, 0, '2020-05-27 09:35:00', 'https://a9c22acaee44c3022afd-09904985198ceb8a8dc81ac3bda18303.ssl.cf3.rackcdn.com/p/25346-147250-large.jpg'),
(14, 'Jack Skellington - The Nightmare before Christmas', 'This is Halloween, THIS IS HALLOWEEN !', 35, 1, 150, 0, '2020-05-27 09:37:00', 'https://a9c22acaee44c3022afd-09904985198ceb8a8dc81ac3bda18303.ssl.cf3.rackcdn.com/p/5241-22629-large.jpg'),
(15, 'Sally - The Nightmare before Christmas', 'Cutie from old Disney\'s animation', 35, 1, 150, 0, '2020-05-27 09:38:00', 'https://www.chauffage-stroh.fr/gallery/photos/photos/1.jpg'),
(16, 'Akagi - Azur Lane', 'The perfect Yandere carrier from the mobile game Azur Lane', 25, 2, 130, 0, '2020-05-28 08:10:38', 'https://a9c22acaee44c3022afd-09904985198ceb8a8dc81ac3bda18303.ssl.cf3.rackcdn.com/p/29424-182423-large.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200526131322', '2020-05-26 13:13:44'),
('20200526131837', '2020-05-26 13:19:01'),
('20200527100059', '2020-05-27 10:01:17'),
('20200529080317', '2020-05-29 08:03:27');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'demo', '$2y$12$.dMt.C6ilLJb9rLcNNe4HOja7XD/X18JvDOJEIMw1iAfok96DATRm'),
(3, 'MajorDuky', '$2y$12$C75Sfv1pBfGCZ.0k/Gmj8ukKNbv7wJcc7ck53z8s5pPo9mZle9Lme'),
(4, 'ItWorks', '$2y$12$lJ35WNQ4N.baUoEgfI9pPOKMERpqU.O2i89pap8WxqWXNccjGm2H6'),
(5, 'Ziboula', '$2y$12$8tJuiWuNT0qjpXYfguIPwu1Xzjah/wUSK2D/VppgIApny0izf0rIO'),
(6, 'Oups', '$2y$12$cShFzO9tp58TIZkHx.EmU.KMdKyCi6LjaeAl7UfbCJNKcHQM7AU6u'),
(7, 'Incroyable', '$2y$12$.Em3whD2QvyQvjXHGr0nNutWClqbHlgpwbwKqt62ojz5kkVG4a2QK');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
