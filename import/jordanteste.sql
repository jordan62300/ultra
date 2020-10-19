-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 19 oct. 2020 à 20:48
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jordanteste`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_validation`
--

DROP TABLE IF EXISTS `admin_validation`;
CREATE TABLE IF NOT EXISTS `admin_validation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` longtext COLLATE utf8mb4_unicode_ci,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DE92FDEB67B3B43D` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin_validation`
--

INSERT INTO `admin_validation` (`id`, `users_id`, `type`, `file_name`, `status`, `commentaire`, `nom`, `updated_at`, `description`) VALUES
(2, 1, 'manga', '290px-emperor_penguin_manchot_empereur_copie.jpeg', 'en attente', NULL, 'Jordanteste2', '2020-07-25 21:03:13', 'Boruto est le fils aîné de Naruto et d\'Hinata. Il est également le grand frère d\'Himawari, qu\'il adore. Il fait équipe avec Sarada et Mitsuki. Son professeur est Konohamaru.'),
(3, 1, 'manga', '290px-emperor_penguin_manchot_empereur_copie.jpeg', 'en attente', NULL, 'Jordanteste2', '2020-07-25 21:03:13', 'Boruto est le fils aîné de Naruto et d\'Hinata. Il est également le grand frère d\'Himawari, qu\'il adore. Il fait équipe avec Sarada et Mitsuki. Son professeur est Konohamaru.'),
(4, 1, 'manga', '290px-emperor_penguin_manchot_empereur_copie.jpeg', 'en attente', NULL, 'Jordanteste2', '2020-07-25 21:03:13', 'Boruto est le fils aîné de Naruto et d\'Hinata. Il est également le grand frère d\'Himawari, qu\'il adore. Il fait équipe avec Sarada et Mitsuki. Son professeur est Konohamaru.'),
(5, 1, 'manga', '290px-emperor_penguin_manchot_empereur_copie.jpeg', 'en attente', NULL, 'Jordanteste2', '2020-07-25 21:03:13', 'Boruto est le fils aîné de Naruto et d\'Hinata. Il est également le grand frère d\'Himawari, qu\'il adore. Il fait équipe avec Sarada et Mitsuki. Son professeur est Konohamaru.'),
(6, 1, 'manga', '290px-emperor_penguin_manchot_empereur_copie.jpeg', 'en attente', NULL, 'Jordanteste2', '2020-07-25 21:03:13', 'Boruto est le fils aîné de Naruto et d\'Hinata. Il est également le grand frère d\'Himawari, qu\'il adore. Il fait équipe avec Sarada et Mitsuki. Son professeur est Konohamaru.'),
(7, 1, 'manga', '290px-emperor_penguin_manchot_empereur_copie.jpeg', 'en attente', NULL, 'Jordanteste2', '2020-07-25 21:03:13', 'Boruto est le fils aîné de Naruto et d\'Hinata. Il est également le grand frère d\'Himawari, qu\'il adore. Il fait équipe avec Sarada et Mitsuki. Son professeur est Konohamaru.'),
(8, 1, 'manga', '290px-emperor_penguin_manchot_empereur_copie.jpeg', 'en attente', NULL, 'Jordanteste2', '2020-07-25 21:03:13', 'Boruto est le fils aîné de Naruto et d\'Hinata. Il est également le grand frère d\'Himawari, qu\'il adore. Il fait équipe avec Sarada et Mitsuki. Son professeur est Konohamaru.'),
(9, 1, 'manga', '290px-emperor_penguin_manchot_empereur_copie.jpeg', 'en attente', NULL, 'Jordanteste2', '2020-07-25 21:03:13', 'Boruto est le fils aîné de Naruto et d\'Hinata. Il est également le grand frère d\'Himawari, qu\'il adore. Il fait équipe avec Sarada et Mitsuki. Son professeur est Konohamaru.'),
(10, 1, 'manga', '290px-emperor_penguin_manchot_empereur_copie.jpeg', 'en attente', NULL, 'Jordanteste2', '2020-07-25 21:03:13', 'Boruto est le fils aîné de Naruto et d\'Hinata. Il est également le grand frère d\'Himawari, qu\'il adore. Il fait équipe avec Sarada et Mitsuki. Son professeur est Konohamaru.'),
(11, 1, 'manga', '290px-emperor_penguin_manchot_empereur_copie.jpeg', 'en attente', NULL, 'Jordanteste2', '2020-07-25 21:03:13', 'Boruto est le fils aîné de Naruto et d\'Hinata. Il est également le grand frère d\'Himawari, qu\'il adore. Il fait équipe avec Sarada et Mitsuki. Son professeur est Konohamaru.'),
(12, 1, 'manga', '290px-emperor_penguin_manchot_empereur_copie.jpeg', 'en attente', NULL, 'Jordanteste2', '2020-07-25 21:03:13', 'Boruto est le fils aîné de Naruto et d\'Hinata. Il est également le grand frère d\'Himawari, qu\'il adore. Il fait équipe avec Sarada et Mitsuki. Son professeur est Konohamaru.');

-- --------------------------------------------------------

--
-- Structure de la table `arcs`
--

DROP TABLE IF EXISTS `arcs`;
CREATE TABLE IF NOT EXISTS `arcs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manga_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7277EBA67B6461` (`manga_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `arcs`
--

INSERT INTO `arcs` (`id`, `manga_id`, `nom`, `numero`) VALUES
(7, 1, 'Le premier arc trop bien', 1),
(8, 1, 'Le deuxieme arc pas si bien', 2),
(9, 2, 'nouveau arc de 2eme manga ouai', 1);

-- --------------------------------------------------------

--
-- Structure de la table `chapitres`
--

DROP TABLE IF EXISTS `chapitres`;
CREATE TABLE IF NOT EXISTS `chapitres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arc_id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` longtext COLLATE utf8mb4_unicode_ci,
  `like_number` int(11) NOT NULL,
  `share_number` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_508679FC41EB8A3C` (`arc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chapitres`
--

INSERT INTO `chapitres` (`id`, `nom`, `statut`, `arc_id`, `file_name`, `commentaire`, `like_number`, `share_number`) VALUES
(3, 'Premier Chapitro', 'En attente', 7, '20200321_1_6_1_1_0_obj22396007_1.jpg', 'ffff', 0, 0),
(4, 'prems Chapitro', 'En attente', 8, '142245-full.png', NULL, 0, 0),
(5, 'deuxieme oui Chapitro', 'En attente', 7, '20200321_1_6_1_1_0_obj22396007_1.jpg', NULL, 0, 0),
(6, 'deuz Chapitro', 'En attente', 8, '142245-full.png', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `chapitre_likes`
--

DROP TABLE IF EXISTS `chapitre_likes`;
CREATE TABLE IF NOT EXISTS `chapitre_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chapitre_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_liked` tinyint(1) NOT NULL,
  `is_shared` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FD54E31C1FBEEF7B` (`chapitre_id`),
  KEY `IDX_FD54E31CA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chapitre_likes`
--

INSERT INTO `chapitre_likes` (`id`, `chapitre_id`, `user_id`, `is_liked`, `is_shared`) VALUES
(1, 3, 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_chapitres`
--

DROP TABLE IF EXISTS `commentaire_chapitres`;
CREATE TABLE IF NOT EXISTS `commentaire_chapitres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chapitre_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `like_number` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `share_number` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DF11F6CB1FBEEF7B` (`chapitre_id`),
  KEY `IDX_DF11F6CBA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commentaire_chapitres`
--

INSERT INTO `commentaire_chapitres` (`id`, `chapitre_id`, `user_id`, `commentaire`, `like_number`, `created_at`, `share_number`) VALUES
(1, 3, 1, 'Salut a tous', 1, '2020-09-02 11:48:29', 1),
(2, 3, 1, 'Salut a vs deux', 1, '2020-09-02 11:53:12', 0),
(3, 3, 1, 'Un peu claqué je me désabonne', 0, '2020-09-06 13:50:09', 0);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20200725111654', '2020-07-25 11:18:47', 46),
('DoctrineMigrations\\Version20200725113249', '2020-07-25 11:32:54', 65),
('DoctrineMigrations\\Version20200725115945', '2020-07-25 11:59:53', 44),
('DoctrineMigrations\\Version20200725121134', '2020-07-25 12:11:40', 144),
('DoctrineMigrations\\Version20200725123031', '2020-07-25 12:30:36', 96),
('DoctrineMigrations\\Version20200725205629', '2020-07-25 20:56:59', 92),
('DoctrineMigrations\\Version20200728103508', '2020-07-28 10:35:22', 541),
('DoctrineMigrations\\Version20200728113518', '2020-07-28 11:35:24', 71),
('DoctrineMigrations\\Version20200728113612', '2020-07-28 11:36:17', 75),
('DoctrineMigrations\\Version20200728115649', '2020-07-28 11:57:08', 75),
('DoctrineMigrations\\Version20200728121809', '2020-07-28 12:18:13', 107),
('DoctrineMigrations\\Version20200729092730', '2020-07-29 09:27:40', 605),
('DoctrineMigrations\\Version20200731133725', '2020-07-31 13:37:31', 524),
('DoctrineMigrations\\Version20200803074750', '2020-08-03 07:47:54', 588),
('DoctrineMigrations\\Version20200809101451', '2020-08-09 10:14:55', 577),
('DoctrineMigrations\\Version20200818173714', '2020-08-18 17:40:11', 634),
('DoctrineMigrations\\Version20200818180719', '2020-08-18 18:09:14', 99),
('DoctrineMigrations\\Version20200902112824', '2020-09-02 11:28:31', 900),
('DoctrineMigrations\\Version20200922193956', '2020-09-22 19:40:20', 591),
('DoctrineMigrations\\Version20200922211954', '2020-09-22 21:19:58', 114),
('DoctrineMigrations\\Version20201006084821', '2020-10-06 08:48:26', 615),
('DoctrineMigrations\\Version20201006102754', '2020-10-06 10:27:58', 169);

-- --------------------------------------------------------

--
-- Structure de la table `mangas`
--

DROP TABLE IF EXISTS `mangas`;
CREATE TABLE IF NOT EXISTS `mangas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `score` int(11) NOT NULL,
  `soutien` int(11) NOT NULL,
  `partenaire` tinyint(1) NOT NULL,
  `grade` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `users_id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` longtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name_vitrine_une` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8271C42F67B3B43D` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mangas`
--

INSERT INTO `mangas` (`id`, `nom`, `description`, `score`, `soutien`, `partenaire`, `grade`, `created_at`, `updated_at`, `users_id`, `file_name`, `statut`, `commentaire`, `type`, `file_name_vitrine_une`) VALUES
(1, 'NouveauMangaOuai', 'Une description de type descriptif', 0, 8, 0, 0, '2020-07-28 12:13:59', '2020-07-28 12:13:59', 1, 'baki.png', 'Accepter', 'suce', 'manga', '01.jpg'),
(2, 'NouveauMangaOuai', 'Une description de type descriptif', 0, 0, 0, 0, '2020-07-28 12:14:35', '2020-07-28 12:14:35', 1, 'psycho.png', 'en attente', NULL, 'manga', '01.jpg'),
(3, 'OuaiLeManga', 'Super bien le truc', 0, 0, 0, 0, '2020-07-29 09:12:14', '2020-07-29 09:12:15', 1, 'parasite.png', 'en attente', NULL, 'manga', '01.jpg'),
(4, 'OuaiLeManga', 'Super bien le trucgg', 0, 4, 0, 0, '2020-07-29 09:17:47', '2020-07-29 09:17:47', 1, 'parasite.png', 'en attente', NULL, 'manga', '01.jpg'),
(5, 'OuaiLeManga', 'Super bien le trucgg', 0, 8, 0, 0, '2020-07-29 09:18:18', '2020-07-29 09:18:18', 1, 'parasite.png', 'en attente', NULL, 'manga', '01.jpg'),
(6, 'Chapitro', 'Nullable ?', 0, 10, 0, 0, '2020-07-29 09:19:51', '2020-07-29 09:19:51', 1, 'parasite.png', 'en attente', NULL, 'manga', '01.jpg'),
(7, 'Naruto', 'Berserk raconte l\'histoire de la rencontre de Guts et de Griffith, chef de la Troupe du Faucon, une bande de mercenaires à la solde du royaume de Midland. De cette rencontre naîtra une amitié ambiguë, mais néanmoins efficiente : la présence de Guts, guerrier à l\'épée démesurée, se révélera vite indispensable à l\'ambition du jeune Griffith, bretteur et tacticien hors pair.', 0, 180, 0, 0, '2020-07-29 09:39:11', '2020-07-29 09:39:11', 1, 'psycho.png', 'en attente', NULL, 'manga', '01.jpg'),
(8, 'NouveauMangaOuai', 'Une description de type descriptif', 0, 5, 0, 0, '2020-07-28 12:13:59', '2020-07-28 12:13:59', 1, 'psycho.png', 'Accepter', 'suce', 'manga', '01.jpg'),
(9, 'NouveauMangaOuai', 'Une description de type descriptif', 0, 0, 0, 0, '2020-07-28 12:14:35', '2020-07-28 12:14:35', 1, 'psycho.png', 'en attente', NULL, 'manga', '01.jpg'),
(10, 'OuaiLeManga', 'Super bien le truc', 0, 0, 0, 0, '2020-07-29 09:12:14', '2020-07-29 09:12:15', 1, 'parasite.png', 'en attente', NULL, 'manga', '01.jpg'),
(11, 'OuaiLeManga', 'Super bien le trucgg', 0, 0, 0, 0, '2020-07-29 09:17:47', '2020-07-29 09:17:47', 1, 'psycho.png', 'en attente', NULL, 'manga', '01.jpg'),
(12, 'OuaiLeManga', 'Super bien le trucgg', 0, 0, 0, 0, '2020-07-29 09:18:18', '2020-07-29 09:18:18', 1, 'parasite.png', 'en attente', NULL, 'manga', '01.jpg'),
(13, 'Chapitro', 'Nullable ?', 0, 0, 0, 0, '2020-07-29 09:19:51', '2020-07-29 09:19:51', 1, 'psycho.png', 'en attente', NULL, 'manga', '01.jpg'),
(14, 'rrrr', 'eeee', 0, 0, 0, 0, '2020-07-29 09:39:11', '2020-07-29 09:39:11', 1, 'parasite.png', 'en attente', NULL, 'manga', '01.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chapitre_id` int(11) NOT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_2074E5751FBEEF7B` (`chapitre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `chapitre_id`, `numero`, `file_name`, `statut`, `commentaire`) VALUES
(5, 3, '3', '01.jpg', 'En attente', NULL),
(6, 3, '1', '02.jpg', 'En attente', NULL),
(7, 3, '2', '04.jpg', 'En attente', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E9F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `roles`, `password`, `email`) VALUES
(1, 'jordan', '[\"ROLE_ADMIN\"]', '$argon2i$v=19$m=65536,t=4,p=1$VFJHLmc2YlAuNnBVc1cuVQ$zayI/qMTgRzAT9oRSy3AoHMnzV2K04OJ0FwuY9ErPy4', '');

-- --------------------------------------------------------

--
-- Structure de la table `user_commentaire_chapitres`
--

DROP TABLE IF EXISTS `user_commentaire_chapitres`;
CREATE TABLE IF NOT EXISTS `user_commentaire_chapitres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_liked` tinyint(1) NOT NULL,
  `is_shared` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1F15BBB5BA9CD190` (`commentaire_id`),
  KEY `IDX_1F15BBB5A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_commentaire_chapitres`
--

INSERT INTO `user_commentaire_chapitres` (`id`, `commentaire_id`, `user_id`, `is_liked`, `is_shared`) VALUES
(1, 1, 1, 1, 1),
(2, 2, 1, 1, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin_validation`
--
ALTER TABLE `admin_validation`
  ADD CONSTRAINT `FK_DE92FDEB67B3B43D` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `arcs`
--
ALTER TABLE `arcs`
  ADD CONSTRAINT `FK_7277EBA67B6461` FOREIGN KEY (`manga_id`) REFERENCES `mangas` (`id`);

--
-- Contraintes pour la table `chapitres`
--
ALTER TABLE `chapitres`
  ADD CONSTRAINT `FK_508679FC41EB8A3C` FOREIGN KEY (`arc_id`) REFERENCES `arcs` (`id`);

--
-- Contraintes pour la table `chapitre_likes`
--
ALTER TABLE `chapitre_likes`
  ADD CONSTRAINT `FK_FD54E31C1FBEEF7B` FOREIGN KEY (`chapitre_id`) REFERENCES `chapitres` (`id`),
  ADD CONSTRAINT `FK_FD54E31CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `commentaire_chapitres`
--
ALTER TABLE `commentaire_chapitres`
  ADD CONSTRAINT `FK_DF11F6CB1FBEEF7B` FOREIGN KEY (`chapitre_id`) REFERENCES `chapitres` (`id`),
  ADD CONSTRAINT `FK_DF11F6CBA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `mangas`
--
ALTER TABLE `mangas`
  ADD CONSTRAINT `FK_8271C42F67B3B43D` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `FK_2074E5751FBEEF7B` FOREIGN KEY (`chapitre_id`) REFERENCES `chapitres` (`id`);

--
-- Contraintes pour la table `user_commentaire_chapitres`
--
ALTER TABLE `user_commentaire_chapitres`
  ADD CONSTRAINT `FK_1F15BBB5A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_1F15BBB5BA9CD190` FOREIGN KEY (`commentaire_id`) REFERENCES `commentaire_chapitres` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
