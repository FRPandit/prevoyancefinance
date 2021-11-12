-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 12 nov. 2021 à 16:19
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `prevoyancefinance`
--

-- --------------------------------------------------------

--
-- Structure de la table `access`
--

DROP TABLE IF EXISTS `access`;
CREATE TABLE IF NOT EXISTS `access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a_label` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `access`
--

INSERT INTO `access` (`id`, `a_label`) VALUES
(1, 'Abonné'),
(2, 'Libre');

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `way` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pc` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_admin_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `access_id` int(11) DEFAULT NULL,
  `thematic_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `art_name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `art_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creation_date` date NOT NULL,
  `exp_date` date DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nb_of_view` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_23A0E6684A66610` (`user_admin_id`),
  KEY `IDX_23A0E665D83CC1` (`state_id`),
  KEY `IDX_23A0E664FEA67CF` (`access_id`),
  KEY `IDX_23A0E662395FCED` (`thematic_id`),
  KEY `IDX_23A0E6612469DE2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `user_admin_id`, `state_id`, `access_id`, `thematic_id`, `category_id`, `art_name`, `description`, `art_img`, `creation_date`, `exp_date`, `short_description`, `nb_of_view`) VALUES
(5, 1, 3, 2, 1, 1, 'Toto à la plage', 'Lorem ipsum dolor sit amet. Ut iste nemo ad totam quas qui nihil doloremque ut nisi nesciunt ex vitae optio sit officia reiciendis aut animi accusantium. Qui ipsum tempora ut neque accusamus hic eligendi natus aut repudiandae nihil eum quia laboriosam. Non omnis delectus non impedit tempora omnis sapiente sit eligendi nisi.\r\n\r\nQui ratione molestias eum voluptatem sapiente et similique ratione aut blanditiis consequatur ut voluptas sunt est itaque consequatur sit quod obcaecati. Ut error doloribus nam laudantium repudiandae ex obcaecati dolor non placeat quam hic blanditiis vero eos praesentium molestiae sed fugiat beatae.\r\n\r\nHic sint accusantium ab magnam optio eos iste incidunt et sequi c', NULL, '2021-10-01', '2022-05-13', 'Toto est à la plage sous le soleil', 0),
(6, 1, 2, NULL, 2, 2, 'Toto à la montagne', 'Lorem ipsum dolor sit amet. Ut iste nemo ad totam quas qui nihil doloremque ut nisi nesciunt ex vitae optio sit officia reiciendis aut animi accusantium. Qui ipsum tempora ut neque accusamus hic eligendi natus aut repudiandae nihil eum quia laboriosam. Non omnis delectus non impedit tempora omnis sapiente sit eligendi nisi.\r\n\r\nQui ratione molestias eum voluptatem sapiente et similique ratione aut blanditiis consequatur ut voluptas sunt est itaque consequatur sit quod obcaecati. Ut error doloribus nam laudantium repudiandae ex obcaecati dolor non placeat quam hic blanditiis vero eos praesentium molestiae sed fugiat beatae.\r\n\r\nHic sint accusantium ab magnam optio eos iste incidunt et sequi c', 'assur-carte-pro-main-61605469368b7.jpg', '2021-10-22', '2021-11-18', 'Toto fait du ski à la montagne', 4),
(7, 1, 2, 2, 1, 2, 'Toto à la campagne', 'Test image', 'barre-615c00ba5b8dc.png', '2022-01-01', '2023-01-01', 'Toto chasse les papillons à la campagne', 0),
(8, 1, 2, NULL, 5, 2, 'Toto en Laponie', 'Lorem ipsum dolor sit amet. Ut iste nemo ad totam quas qui nihil doloremque ut nisi nesciunt ex vitae optio sit officia reiciendis aut animi accusantium. Qui ipsum tempora ut neque accusamus hic eligendi natus aut repudiandae nihil eum quia laboriosam. Non omnis delectus non impedit tempora omnis sapiente sit eligendi nisi.\r\n\r\nQui ratione molestias eum voluptatem sapiente et similique ratione aut blanditiis consequatur ut voluptas sunt est itaque consequatur sit quod obcaecati. Ut error doloribus nam laudantium repudiandae ex obcaecati dolor non placeat quam hic blanditiis vero eos praesentium molestiae sed fugiat beatae.\r\n\r\nHic sint accusantium ab magnam optio eos iste incidunt et sequi c', NULL, '2021-10-01', '2022-05-13', 'Toto essaye de chopper le père noël', 0),
(9, 1, 2, 1, 4, 1, 'Toto à fini son JS', 'Bien ouej toto', 'assur-carte-pro-main-616054f1a7756.jpg', '2023-01-01', '2016-01-01', 'Toto est content', 0),
(12, 1, 1, NULL, 6, 2, 'TOTO n\'arrive PAS avec son JS', 'Est-ce que ca marche ?,', NULL, '2022-01-01', '2023-01-01', 'Toto commence à s\'énerver', 0),
(13, 1, 1, NULL, 3, 2, 'Toto à réussi son JS', 'ENFIN !', NULL, '2022-01-01', '2023-01-01', 'Toto est très heureux', 0),
(14, 1, 1, NULL, 1, 2, 'Toto veut plus de 10 articles', 'Article 8 ?', NULL, '2022-01-01', '2023-01-01', 'Toto à 8 articles', 0),
(15, 1, 1, NULL, 3, 2, 'Toto veut plus de 10 articles', 'Article 9', NULL, '2022-01-01', '2023-01-01', 'Toto à 9 articles', 0),
(16, 1, 2, 1, 3, 1, 'Toto a 10 articles', 'Article 10', 'barre-61692789d8664.png', '2022-01-01', '2023-01-01', 'Toto à enfin 10 articles', 0),
(17, 1, 1, NULL, 3, 2, 'Il manque un article à toto', 'Article 11', 'assur-carte-pro-main-61603bf42aa81.jpg', '2019-01-01', '2020-01-01', 'Il manquait un article à toto pour tester', 1),
(18, 1, 2, NULL, 6, 2, 'Test actualité', 'Bonjour bonjour, ceci est un test', NULL, '2021-10-11', '2022-01-01', 'blablabla', 1),
(19, 1, 2, 2, 2, 1, 'Test2', 'blablbalbal', NULL, '2022-01-01', NULL, '', 0),
(20, 1, 2, 2, 2, 1, 'toto test son JS', 'blablabla', NULL, '2023-01-01', NULL, NULL, 2),
(21, 1, 2, 2, 2, 1, 'test 3', 'test acces', 'barre-616931d5ec87f.png', '2023-01-01', '2016-01-01', NULL, 5),
(22, 1, 2, 1, 3, 1, 'test abonné', 'test abonné', 'assur-carte-pro-main-616931b476ec9.jpg', '2022-01-01', '2016-01-01', NULL, 14),
(23, 1, 2, NULL, 5, 2, 'Test1', 'vfvzvffv', NULL, '2016-01-01', NULL, 'dcedvdv', 0),
(24, 1, 2, NULL, 3, 2, 'Test1', 'p:nçp:_à:! à', '00-sexion-dassaut-lecole-des-points-vitaux-fr-2010-61891c7096ff0.jpg', '2021-01-01', NULL, 'om!:o!:_o!', 0);

-- --------------------------------------------------------

--
-- Structure de la table `audit`
--

DROP TABLE IF EXISTS `audit`;
CREATE TABLE IF NOT EXISTS `audit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `part_one_id` int(11) NOT NULL,
  `part_two_id` int(11) DEFAULT NULL,
  `part_three_id` int(11) DEFAULT NULL,
  `part_four_id` int(11) DEFAULT NULL,
  `part_five_id` int(11) DEFAULT NULL,
  `part_six_id` int(11) DEFAULT NULL,
  `part_seven_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `creation_date` date NOT NULL,
  `enclose_date` date DEFAULT NULL,
  `progress` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9218FF79C20A0E86` (`part_one_id`),
  KEY `IDX_9218FF79A956E949` (`part_two_id`),
  KEY `IDX_9218FF79E0F3881A` (`part_three_id`),
  KEY `IDX_9218FF7965F0F7AF` (`part_four_id`),
  KEY `IDX_9218FF7939C70144` (`part_five_id`),
  KEY `IDX_9218FF79A64D9F34` (`part_six_id`),
  KEY `IDX_9218FF79C77125D4` (`part_seven_id`),
  KEY `IDX_9218FF79A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `audit`
--

INSERT INTO `audit` (`id`, `part_one_id`, `part_two_id`, `part_three_id`, `part_four_id`, `part_five_id`, `part_six_id`, `part_seven_id`, `user_id`, `creation_date`, `enclose_date`, `progress`) VALUES
(13, 17, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-11-10', NULL, 1),
(14, 18, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2021-11-11', NULL, 1),
(15, 19, 10, 5, 7, NULL, NULL, NULL, 2, '2021-11-11', NULL, 4);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_label` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_64C19C14FEA67CF` (`access_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `cat_label`, `access_id`) VALUES
(1, 'Actualité', NULL),
(2, 'Offre du moment', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `children`
--

DROP TABLE IF EXISTS `children`;
CREATE TABLE IF NOT EXISTS `children` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yob` int(11) DEFAULT NULL,
  `handicapped` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `children`
--

INSERT INTO `children` (`id`, `yob`, `handicapped`) VALUES
(1, NULL, 0),
(2, NULL, 0),
(3, NULL, 0),
(4, NULL, 0),
(5, NULL, 0),
(6, NULL, 0),
(7, NULL, 0),
(8, NULL, 0),
(13, NULL, 0),
(14, NULL, 0),
(15, NULL, 0),
(16, NULL, 0),
(17, NULL, 0),
(18, NULL, 0),
(19, NULL, 0),
(20, NULL, 0),
(21, NULL, 0),
(22, NULL, 0),
(23, NULL, 0),
(24, NULL, 0),
(25, NULL, 0),
(26, NULL, 0),
(27, NULL, 0),
(28, NULL, 0),
(29, NULL, 0),
(30, NULL, 0),
(31, NULL, 0),
(32, NULL, 0),
(33, NULL, 0),
(34, NULL, 0),
(35, NULL, 0),
(36, NULL, 0),
(37, NULL, 0),
(38, NULL, 0),
(39, NULL, 0),
(40, NULL, 0),
(41, NULL, 0),
(42, NULL, 0),
(43, NULL, 0),
(44, NULL, 0),
(45, NULL, 0),
(46, NULL, 0),
(47, NULL, 0),
(48, NULL, 0),
(49, NULL, 0),
(50, NULL, 0),
(51, NULL, 0),
(52, NULL, 0),
(53, NULL, 0),
(54, NULL, 0),
(55, NULL, 0),
(56, NULL, 0),
(61, NULL, 0),
(62, NULL, 0),
(63, NULL, 0),
(64, NULL, 0),
(65, NULL, 0),
(66, NULL, 0),
(67, NULL, 0),
(68, NULL, 0),
(69, NULL, 0),
(70, NULL, 0),
(71, NULL, 0),
(72, NULL, 0),
(73, NULL, 0),
(74, NULL, 0),
(75, NULL, 0),
(76, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `collective_foresight`
--

DROP TABLE IF EXISTS `collective_foresight`;
CREATE TABLE IF NOT EXISTS `collective_foresight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cf_label` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `collective_foresight`
--

INSERT INTO `collective_foresight` (`id`, `cf_label`) VALUES
(1, 'Arrêt de travail'),
(2, 'Décès'),
(3, 'Invalidité'),
(4, 'Santé'),
(5, 'Rente éducation'),
(6, 'Pension de conjoint');

-- --------------------------------------------------------

--
-- Structure de la table `collective_retirement`
--

DROP TABLE IF EXISTS `collective_retirement`;
CREATE TABLE IF NOT EXISTS `collective_retirement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `collective_retirement_label` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `collective_retirement`
--

INSERT INTO `collective_retirement` (`id`, `collective_retirement_label`) VALUES
(1, 'Article 83'),
(2, 'Article 82'),
(3, 'Article 39'),
(4, 'Inconnue');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9474526CA76ED395` (`user_id`),
  KEY `IDX_9474526C7294869C` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `article_id`, `comment`) VALUES
(1, 1, 20, 'first'),
(2, 1, 20, 'pouce bleu'),
(3, 1, 20, 'Ahaha'),
(4, 1, 20, 'Ahaha'),
(5, 1, 20, 'Ahaha'),
(6, 1, 20, 'Ahaha'),
(7, 1, 20, 'Ahaha'),
(8, 1, 20, 'Ahaha'),
(9, 1, 20, 'Ahaha'),
(10, 1, 20, 'Ahaha'),
(11, 1, 20, 'Ahaha'),
(12, 1, 20, 'Ahaha');

-- --------------------------------------------------------

--
-- Structure de la table `credit_leasing`
--

DROP TABLE IF EXISTS `credit_leasing`;
CREATE TABLE IF NOT EXISTS `credit_leasing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_remaining` int(11) DEFAULT NULL,
  `end` date DEFAULT NULL,
  `rate` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mensuality` int(11) DEFAULT NULL,
  `cover_first_insured` int(11) DEFAULT NULL,
  `cover_second_insured` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `credit_leasing`
--

INSERT INTO `credit_leasing` (`id`, `total_remaining`, `end`, `rate`, `mensuality`, `cover_first_insured`, `cover_second_insured`) VALUES
(49, NULL, NULL, NULL, NULL, NULL, NULL),
(50, NULL, NULL, NULL, NULL, NULL, NULL),
(51, NULL, NULL, NULL, NULL, NULL, NULL),
(52, NULL, NULL, NULL, NULL, NULL, NULL),
(53, NULL, NULL, NULL, NULL, NULL, NULL),
(54, NULL, NULL, NULL, NULL, NULL, NULL),
(55, NULL, NULL, NULL, NULL, NULL, NULL),
(56, NULL, NULL, NULL, NULL, NULL, NULL),
(57, NULL, NULL, NULL, NULL, NULL, NULL),
(58, NULL, NULL, NULL, NULL, NULL, NULL),
(59, NULL, NULL, NULL, NULL, NULL, NULL),
(60, NULL, NULL, NULL, NULL, NULL, NULL),
(61, NULL, NULL, NULL, NULL, NULL, NULL),
(62, NULL, NULL, NULL, NULL, NULL, NULL),
(63, NULL, NULL, NULL, NULL, NULL, NULL),
(64, NULL, NULL, NULL, NULL, NULL, NULL),
(65, NULL, NULL, NULL, NULL, NULL, NULL),
(66, NULL, NULL, NULL, NULL, NULL, NULL),
(67, NULL, NULL, NULL, NULL, NULL, NULL),
(68, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `death_funds`
--

DROP TABLE IF EXISTS `death_funds`;
CREATE TABLE IF NOT EXISTS `death_funds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `consumption` tinyint(1) DEFAULT NULL,
  `acquisition` tinyint(1) DEFAULT NULL,
  `amount_acquisition` int(11) DEFAULT NULL,
  `investment` tinyint(1) DEFAULT NULL,
  `amount_investment` int(11) DEFAULT NULL,
  `preference` tinyint(1) DEFAULT NULL,
  `preference_name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `death_funds`
--

INSERT INTO `death_funds` (`id`, `consumption`, `acquisition`, `amount_acquisition`, `investment`, `amount_investment`, `preference`, `preference_name`) VALUES
(9, 1, 0, NULL, 0, NULL, 1, NULL),
(10, 0, 0, NULL, 0, NULL, NULL, NULL),
(11, 1, 0, NULL, 0, NULL, 1, NULL),
(12, 0, 0, NULL, 0, NULL, NULL, NULL),
(13, 1, 0, NULL, 0, NULL, 1, NULL),
(14, 0, 0, NULL, 0, NULL, NULL, NULL),
(15, 1, 0, NULL, 0, NULL, 1, NULL),
(16, 1, 0, NULL, 0, NULL, 1, NULL);

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
('DoctrineMigrations\\Version20210924145731', '2021-10-01 12:25:18', 715),
('DoctrineMigrations\\Version20210929095351', '2021-10-01 12:25:19', 21),
('DoctrineMigrations\\Version20211001124731', '2021-10-06 07:13:30', 241),
('DoctrineMigrations\\Version20211004133803', '2021-10-04 13:42:05', 830),
('DoctrineMigrations\\Version20211008121345', '2021-10-08 12:14:05', 577),
('DoctrineMigrations\\Version20211012085740', '2021-10-13 07:50:52', 244),
('DoctrineMigrations\\Version20211021122455', '2021-11-02 13:14:56', 178),
('DoctrineMigrations\\Version20211021133003', '2021-11-02 13:16:22', 251),
('DoctrineMigrations\\Version20211021145302', '2021-11-02 13:16:52', 1154),
('DoctrineMigrations\\Version20211025083826', '2021-11-02 13:22:44', 395),
('DoctrineMigrations\\Version20211026144918', '2021-11-02 13:23:26', 218),
('DoctrineMigrations\\Version20211102135319', '2021-11-02 13:54:27', 708),
('DoctrineMigrations\\Version20211102151308', '2021-11-03 08:35:03', 541),
('DoctrineMigrations\\Version20211103160645', '2021-11-04 08:30:12', 515),
('DoctrineMigrations\\Version20211104105147', '2021-11-04 10:52:53', 158),
('DoctrineMigrations\\Version20211104113506', '2021-11-05 13:25:10', 341),
('DoctrineMigrations\\Version20211104125616', '2021-11-05 13:25:11', 254),
('DoctrineMigrations\\Version20211105135048', '2021-11-05 13:51:05', 563),
('DoctrineMigrations\\Version20211108093731', '2021-11-08 13:46:01', 335),
('DoctrineMigrations\\Version20211108155121', '2021-11-09 08:21:50', 492),
('DoctrineMigrations\\Version20211110125922', '2021-11-10 13:04:30', 78),
('DoctrineMigrations\\Version20211110131224', '2021-11-10 13:12:37', 121);

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `documents`
--

INSERT INTO `documents` (`id`, `document`) VALUES
(1, '01-023e9-rYX7RpoYMjyopn66LEaobQRu-61892a2ab93d1.jpg'),
(2, '01-023e9-rYX7RpoYMjyopn66LEaobQRu-61892a5b2750b.jpg'),
(3, 'Chemise-a-carreau-61892b518d299.jpg'),
(4, '146380328-172653647625904-8249287563142760706-n-61892bf4422f7.jpg'),
(5, '117951084-1061898767660136-6702607711451195264-n-61892c78c01f4.jpg'),
(6, '117968861-2854465944787409-3701909630688206132-n-61892c78c33a4.jpg'),
(7, 'toto@email.fr-118275555-312155333546650-8352942559493700924-n-61892d519a1d5.jpg'),
(8, 'toto@email.fr-manteau-2-61892d519d996.jpg'),
(9, 'Toto-118275555-312155333546650-8352942559493700924-n-61892d963630d.jpg'),
(10, 'Toto-manteau-2-61892d9638565.jpg'),
(11, 'Toto1-manteau-4-61892e2953c7f.jpg'),
(12, 'Toto1-manteau-5-61892e29577b5.jpg'),
(13, 'Toto1-Capture-d-ecran-171-618a85bf12a40.png'),
(14, 'Toto1-Capture-d-ecran-172-618a85bf24ca8.png');

-- --------------------------------------------------------

--
-- Structure de la table `drop_reaction`
--

DROP TABLE IF EXISTS `drop_reaction`;
CREATE TABLE IF NOT EXISTS `drop_reaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `drop_label` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `drop_reaction`
--

INSERT INTO `drop_reaction` (`id`, `drop_label`) VALUES
(1, 'Je réoriente mon épargne vers des fonds non risqués'),
(2, 'Je ne fais rien, j\'ai fait un placement de long terme'),
(3, 'C\'est le moment d\'investir les prix ont baissé');

-- --------------------------------------------------------

--
-- Structure de la table `evolution`
--

DROP TABLE IF EXISTS `evolution`;
CREATE TABLE IF NOT EXISTS `evolution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evolution_choice` tinyint(1) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `pro_status_id` int(11) DEFAULT NULL,
  `salary_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_420C28937B3C8E45` (`pro_status_id`),
  KEY `IDX_420C2893B0FDF16E` (`salary_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `evolution`
--

INSERT INTO `evolution` (`id`, `evolution_choice`, `year`, `pro_status_id`, `salary_id`) VALUES
(3, 1, 1342, 2, 40),
(4, 1, 2120, 2, 68),
(7, 1, 2121, 2, 130),
(9, 1, 2021, 3, 168),
(10, 1, 2021, 3, 178),
(12, 1, 2021, 3, 207),
(14, 1, 2021, 1, 242),
(16, 0, NULL, NULL, NULL),
(17, 0, NULL, NULL, NULL),
(18, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `family_needs`
--

DROP TABLE IF EXISTS `family_needs`;
CREATE TABLE IF NOT EXISTS `family_needs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `funeral` int(11) NOT NULL,
  `income_taxes` int(11) NOT NULL,
  `property_taxes` int(11) NOT NULL,
  `housing_taxes` int(11) NOT NULL,
  `torew` int(11) NOT NULL,
  `professional_load` int(11) NOT NULL,
  `corporate_taxes` int(11) NOT NULL,
  `professional_vehicle` tinyint(1) NOT NULL,
  `spouse_additional_capital` int(11) NOT NULL,
  `other_additional_capital` int(11) NOT NULL,
  `spouse_salary` int(11) NOT NULL,
  `sufficient_salary` tinyint(1) NOT NULL,
  `wwdc` tinyint(1) NOT NULL,
  `missing_monthly_income` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `family_needs`
--

INSERT INTO `family_needs` (`id`, `funeral`, `income_taxes`, `property_taxes`, `housing_taxes`, `torew`, `professional_load`, `corporate_taxes`, `professional_vehicle`, `spouse_additional_capital`, `other_additional_capital`, `spouse_salary`, `sufficient_salary`, `wwdc`, `missing_monthly_income`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, 0, 1),
(2, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, 0, 1),
(3, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, 0, 1),
(4, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `financial_investment`
--

DROP TABLE IF EXISTS `financial_investment`;
CREATE TABLE IF NOT EXISTS `financial_investment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fi_label` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `financial_investment`
--

INSERT INTO `financial_investment` (`id`, `fi_label`) VALUES
(1, 'Je n\'ai aucune expérience préalable'),
(2, 'Je m\'appuie essentiellement sur un professionnel financier pour réaliser mes placements'),
(3, 'Je réalise seul mes placements financiers');

-- --------------------------------------------------------

--
-- Structure de la table `financial_products`
--

DROP TABLE IF EXISTS `financial_products`;
CREATE TABLE IF NOT EXISTS `financial_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nothing` tinyint(1) DEFAULT NULL,
  `bank_account` tinyint(1) DEFAULT NULL,
  `financial_savings` tinyint(1) DEFAULT NULL,
  `life_insurance` tinyint(1) DEFAULT NULL,
  `life_insurance_uc` int(11) DEFAULT NULL,
  `retirement_investment` tinyint(1) DEFAULT NULL,
  `retirement_investment_uc` int(11) DEFAULT NULL,
  `employee_savings` tinyint(1) DEFAULT NULL,
  `employee_savings_uc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `financial_products`
--

INSERT INTO `financial_products` (`id`, `nothing`, `bank_account`, `financial_savings`, `life_insurance`, `life_insurance_uc`, `retirement_investment`, `retirement_investment_uc`, `employee_savings`, `employee_savings_uc`) VALUES
(1, 0, 0, 0, 1, NULL, 0, NULL, 0, NULL),
(2, 0, 1, 0, 0, NULL, 0, NULL, 0, NULL),
(3, 0, 0, 0, 1, NULL, 0, NULL, 0, NULL),
(4, 0, 1, 0, 0, NULL, 0, NULL, 0, NULL),
(5, 1, 0, 0, 0, NULL, 0, NULL, 0, NULL),
(6, 0, 0, 0, 0, NULL, 0, NULL, 0, NULL),
(7, 0, 0, 1, 0, NULL, 0, NULL, 0, NULL),
(8, 0, 0, 1, 0, NULL, 0, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `future_income`
--

DROP TABLE IF EXISTS `future_income`;
CREATE TABLE IF NOT EXISTS `future_income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year_label` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_status_id` int(11) DEFAULT NULL,
  `salary_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5EB9C5E97B3C8E45` (`pro_status_id`),
  KEY `IDX_5EB9C5E9B0FDF16E` (`salary_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `future_income`
--

INSERT INTO `future_income` (`id`, `year_label`, `pro_status_id`, `salary_id`) VALUES
(10, 'Dans 10ans', 1, 42),
(11, 'Dans 20ans', 1, 43),
(12, 'Dans 30ans', 1, 44),
(16, 'Dans 10ans', 1, 70),
(17, 'Dans 20ans', 1, 71),
(18, 'Dans 30ans', 1, 72),
(34, 'Dans 10ans', NULL, NULL),
(35, 'Dans 20ans', NULL, NULL),
(36, 'Dans 30ans', NULL, NULL),
(46, 'Dans 10ans', NULL, NULL),
(47, 'Dans 20ans', NULL, NULL),
(48, 'Dans 30ans', NULL, NULL),
(49, 'Dans 10ans', NULL, NULL),
(50, 'Dans 20ans', NULL, NULL),
(51, 'Dans 30ans', NULL, NULL),
(58, 'Dans 10ans', NULL, NULL),
(59, 'Dans 20ans', NULL, NULL),
(60, 'Dans 30ans', NULL, NULL),
(67, 'Dans 10ans', NULL, NULL),
(68, 'Dans 20ans', NULL, NULL),
(69, 'Dans 30ans', NULL, NULL),
(73, 'Dans 10ans', NULL, NULL),
(74, 'Dans 20ans', NULL, NULL),
(75, 'Dans 30ans', NULL, NULL),
(76, 'Dans 10ans', NULL, NULL),
(77, 'Dans 20ans', NULL, NULL),
(78, 'Dans 30ans', NULL, NULL),
(79, 'Dans 10ans', NULL, NULL),
(80, 'Dans 20ans', NULL, NULL),
(81, 'Dans 30ans', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `gender`
--

DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `glabel` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `gender`
--

INSERT INTO `gender` (`id`, `glabel`) VALUES
(1, 'Homme'),
(2, 'Femme'),
(3, 'Indéfini');

-- --------------------------------------------------------

--
-- Structure de la table `guarantee`
--

DROP TABLE IF EXISTS `guarantee`;
CREATE TABLE IF NOT EXISTS `guarantee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_of_guarantees` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `contribution` int(11) DEFAULT NULL,
  `madelin` tinyint(1) NOT NULL,
  `beneficiaries` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guarantee_label_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_589198D8E7A1D12E` (`guarantee_label_id`)
) ENGINE=InnoDB AUTO_INCREMENT=331 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `guarantee`
--

INSERT INTO `guarantee` (`id`, `company`, `amount_of_guarantees`, `date`, `contribution`, `madelin`, `beneficiaries`, `guarantee_label_id`) VALUES
(31, 'A', NULL, '2016-01-01', NULL, 0, NULL, 1),
(32, 'B', NULL, '2016-01-01', NULL, 0, NULL, 2),
(33, 'C', NULL, '2016-01-01', NULL, 0, NULL, 3),
(34, 'D', NULL, '2016-01-01', NULL, 0, NULL, 4),
(35, 'E', NULL, '2016-01-01', NULL, 0, NULL, 5),
(36, 'F', NULL, '2016-01-01', NULL, 0, NULL, 6),
(37, 'G', NULL, '2016-01-01', NULL, 0, NULL, 7),
(38, 'H', NULL, '2016-01-01', NULL, 0, NULL, 8),
(39, 'I', NULL, '2016-01-01', NULL, 0, NULL, 9),
(40, 'J', NULL, '2016-01-01', NULL, 0, NULL, 10),
(71, 'A', 1, '2016-01-01', 2, 0, 'MOI', 1),
(72, 'B', 2, '2016-01-01', 1, 1, 'TOTO', 2),
(73, 'C', 3, '2016-01-01', 3, 0, 'TATA', 3),
(74, 'D', NULL, '2016-01-01', 4, 0, NULL, 4),
(75, 'E', NULL, '2016-01-01', NULL, 0, NULL, 5),
(76, 'F', 4, '2016-01-01', NULL, 0, NULL, 6),
(77, 'G', 5, '2016-01-01', NULL, 0, NULL, 7),
(78, 'H', 6, '2016-01-01', NULL, 0, NULL, 8),
(79, 'I', 7, '2016-01-01', NULL, 0, NULL, 9),
(80, 'J', NULL, '2016-01-01', NULL, 0, NULL, 10),
(141, NULL, NULL, '2016-01-01', NULL, 0, NULL, 1),
(142, NULL, NULL, '2016-01-01', NULL, 0, NULL, 2),
(143, NULL, NULL, '2016-01-01', NULL, 0, NULL, 3),
(144, NULL, NULL, '2016-01-01', NULL, 0, NULL, 4),
(145, NULL, NULL, '2016-01-01', NULL, 0, NULL, 5),
(146, NULL, NULL, '2016-01-01', NULL, 0, NULL, 6),
(147, NULL, NULL, '2016-01-01', NULL, 0, NULL, 7),
(148, NULL, NULL, '2016-01-01', NULL, 0, NULL, 8),
(149, NULL, NULL, '2016-01-01', NULL, 0, NULL, 9),
(150, NULL, NULL, '2016-01-01', NULL, 0, NULL, 10),
(181, NULL, NULL, '2016-01-01', NULL, 0, NULL, 1),
(182, NULL, NULL, '2016-01-01', NULL, 0, NULL, 2),
(183, NULL, NULL, '2016-01-01', NULL, 0, NULL, 3),
(184, NULL, NULL, '2016-01-01', NULL, 0, NULL, 4),
(185, NULL, NULL, '2016-01-01', NULL, 0, NULL, 5),
(186, NULL, NULL, '2016-01-01', NULL, 0, NULL, 6),
(187, NULL, NULL, '2016-01-01', NULL, 0, NULL, 7),
(188, NULL, NULL, '2016-01-01', NULL, 0, NULL, 8),
(189, NULL, NULL, '2016-01-01', NULL, 0, NULL, 9),
(190, NULL, NULL, '2016-01-01', NULL, 0, NULL, 10),
(191, NULL, NULL, '2016-01-01', NULL, 0, NULL, 1),
(192, NULL, NULL, '2016-01-01', NULL, 0, NULL, 2),
(193, NULL, NULL, '2016-01-01', NULL, 0, NULL, 3),
(194, NULL, NULL, '2016-01-01', NULL, 0, NULL, 4),
(195, NULL, NULL, '2016-01-01', NULL, 0, NULL, 5),
(196, NULL, NULL, '2016-01-01', NULL, 0, NULL, 6),
(197, NULL, NULL, '2016-01-01', NULL, 0, NULL, 7),
(198, NULL, NULL, '2016-01-01', NULL, 0, NULL, 8),
(199, NULL, NULL, '2016-01-01', NULL, 0, NULL, 9),
(200, NULL, NULL, '2016-01-01', NULL, 0, NULL, 10),
(221, NULL, NULL, '2016-01-01', NULL, 0, NULL, 1),
(222, NULL, NULL, '2016-01-01', NULL, 0, NULL, 2),
(223, NULL, NULL, '2016-01-01', NULL, 0, NULL, 3),
(224, NULL, NULL, '2016-01-01', NULL, 0, NULL, 4),
(225, NULL, NULL, '2016-01-01', NULL, 0, NULL, 5),
(226, NULL, NULL, '2016-01-01', NULL, 0, NULL, 6),
(227, NULL, NULL, '2016-01-01', NULL, 0, NULL, 7),
(228, NULL, NULL, '2016-01-01', NULL, 0, NULL, 8),
(229, NULL, NULL, '2016-01-01', NULL, 0, NULL, 9),
(230, NULL, NULL, '2016-01-01', NULL, 0, NULL, 10),
(271, NULL, NULL, '2016-01-01', NULL, 0, NULL, 1),
(272, NULL, NULL, '2016-01-01', NULL, 0, NULL, 2),
(273, NULL, NULL, '2016-01-01', NULL, 0, NULL, 3),
(274, NULL, NULL, '2016-01-01', NULL, 0, NULL, 4),
(275, NULL, NULL, '2016-01-01', NULL, 0, NULL, 5),
(276, NULL, NULL, '2016-01-01', NULL, 0, NULL, 6),
(277, NULL, NULL, '2016-01-01', NULL, 0, NULL, 7),
(278, NULL, NULL, '2016-01-01', NULL, 0, NULL, 8),
(279, NULL, NULL, '2016-01-01', NULL, 0, NULL, 9),
(280, NULL, NULL, '2016-01-01', NULL, 0, NULL, 10),
(301, NULL, NULL, '2016-01-01', NULL, 0, NULL, 1),
(302, NULL, NULL, '2016-01-01', NULL, 0, NULL, 2),
(303, NULL, NULL, '2016-01-01', NULL, 0, NULL, 3),
(304, NULL, NULL, '2016-01-01', NULL, 0, NULL, 4),
(305, NULL, NULL, '2016-01-01', NULL, 0, NULL, 5),
(306, NULL, NULL, '2016-01-01', NULL, 0, NULL, 6),
(307, NULL, NULL, '2016-01-01', NULL, 0, NULL, 7),
(308, NULL, NULL, '2016-01-01', NULL, 0, NULL, 8),
(309, NULL, NULL, '2016-01-01', NULL, 0, NULL, 9),
(310, NULL, NULL, '2016-01-01', NULL, 0, NULL, 10),
(311, NULL, NULL, '2016-01-01', NULL, 0, NULL, 1),
(312, NULL, NULL, '2016-01-01', NULL, 0, NULL, 2),
(313, NULL, NULL, '2016-01-01', NULL, 0, NULL, 3),
(314, NULL, NULL, '2016-01-01', NULL, 0, NULL, 4),
(315, NULL, NULL, '2016-01-01', NULL, 0, NULL, 5),
(316, NULL, NULL, '2016-01-01', NULL, 0, NULL, 6),
(317, NULL, NULL, '2016-01-01', NULL, 0, NULL, 7),
(318, NULL, NULL, '2016-01-01', NULL, 0, NULL, 8),
(319, NULL, NULL, '2016-01-01', NULL, 0, NULL, 9),
(320, NULL, NULL, '2016-01-01', NULL, 0, NULL, 10),
(321, NULL, NULL, '2016-01-01', NULL, 0, NULL, 1),
(322, NULL, NULL, '2016-01-01', NULL, 0, NULL, 2),
(323, NULL, NULL, '2016-01-01', NULL, 0, NULL, 3),
(324, NULL, NULL, '2016-01-01', NULL, 0, NULL, 4),
(325, NULL, NULL, '2016-01-01', NULL, 0, NULL, 5),
(326, NULL, NULL, '2016-01-01', NULL, 0, NULL, 6),
(327, NULL, NULL, '2016-01-01', NULL, 0, NULL, 7),
(328, NULL, NULL, '2016-01-01', NULL, 0, NULL, 8),
(329, NULL, NULL, '2016-01-01', NULL, 0, NULL, 9),
(330, NULL, NULL, '2016-01-01', NULL, 0, NULL, 10);

-- --------------------------------------------------------

--
-- Structure de la table `guarantee_label`
--

DROP TABLE IF EXISTS `guarantee_label`;
CREATE TABLE IF NOT EXISTS `guarantee_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guarantee_label` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `guarantee_label`
--

INSERT INTO `guarantee_label` (`id`, `guarantee_label`) VALUES
(1, 'Décès'),
(2, 'Arrêt de travail'),
(3, 'Invalidité'),
(4, 'Complémentaire santé'),
(5, 'Dépendances'),
(6, 'Retraite ( PERP, Medelin, PERCO...)'),
(7, 'Etudes et installation des enfants'),
(8, 'Garanties accidents de la vie'),
(9, 'Protection juridique'),
(10, 'Protection internet/eCommerce');

-- --------------------------------------------------------

--
-- Structure de la table `health_needs`
--

DROP TABLE IF EXISTS `health_needs`;
CREATE TABLE IF NOT EXISTS `health_needs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mutual_health_satisfaction` tinyint(1) NOT NULL,
  `glasses` tinyint(1) NOT NULL,
  `dental_care` tinyint(1) NOT NULL,
  `fee_overruns` tinyint(1) NOT NULL,
  `not_reimbursed` tinyint(1) NOT NULL,
  `spa_treatment` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `health_needs`
--

INSERT INTO `health_needs` (`id`, `mutual_health_satisfaction`, `glasses`, `dental_care`, `fee_overruns`, `not_reimbursed`, `spa_treatment`) VALUES
(1, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `individual_form`
--

DROP TABLE IF EXISTS `individual_form`;
CREATE TABLE IF NOT EXISTS `individual_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `death_funds_id` int(11) DEFAULT NULL,
  `previous_financial_products_id` int(11) NOT NULL,
  `financial_products_id` int(11) NOT NULL,
  `financial_investment_id` int(11) NOT NULL,
  `risk_id` int(11) NOT NULL,
  `share_of_investment_id` int(11) NOT NULL,
  `unplanned_id` int(11) NOT NULL,
  `drop_reaction_id` int(11) NOT NULL,
  `preference_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9A4A67FC2EBD7B35` (`financial_products_id`),
  KEY `IDX_9A4A67FC36A17427` (`previous_financial_products_id`),
  KEY `IDX_9A4A67FCEE87D3F6` (`financial_investment_id`),
  KEY `IDX_9A4A67FC235B6D1` (`risk_id`),
  KEY `IDX_9A4A67FC328E815D` (`share_of_investment_id`),
  KEY `IDX_9A4A67FC200761` (`unplanned_id`),
  KEY `IDX_9A4A67FC6BF8A3D3` (`drop_reaction_id`),
  KEY `IDX_9A4A67FCD81022C0` (`preference_id`),
  KEY `IDX_9A4A67FCD3D321CA` (`death_funds_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `individual_form`
--

INSERT INTO `individual_form` (`id`, `death_funds_id`, `previous_financial_products_id`, `financial_products_id`, `financial_investment_id`, `risk_id`, `share_of_investment_id`, `unplanned_id`, `drop_reaction_id`, `preference_id`) VALUES
(1, 9, 2, 1, 1, 1, 1, 11, 2, 2),
(2, 10, 3, 2, 3, 3, 2, 10, 2, 1),
(3, 11, 2, 3, 1, 1, 1, 11, 2, 2),
(4, 12, 3, 4, 3, 3, 2, 10, 2, 1),
(5, 13, 2, 5, 3, 1, 1, 11, 3, 1),
(6, 14, 2, 6, 3, 2, 2, 10, 2, 2),
(7, 15, 2, 7, 2, 4, 3, 11, 2, 1),
(8, 16, 2, 8, 2, 4, 3, 11, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `intelligence`
--

DROP TABLE IF EXISTS `intelligence`;
CREATE TABLE IF NOT EXISTS `intelligence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `woman` tinyint(1) NOT NULL,
  `man` tinyint(1) NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `native_country` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compagny_form` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `axa_customer` tinyint(1) NOT NULL,
  `social_security_number` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `intelligence`
--

INSERT INTO `intelligence` (`id`, `woman`, `man`, `name`, `firstname`, `phone`, `email`, `native_country`, `department`, `job`, `compagny_form`, `axa_customer`, `social_security_number`) VALUES
(1, 1, 0, 'Quintyn', 'Pauline', '00000000', 'toto@gmail.com', 'France', '79', 'Chomeur', NULL, 0, 29483849402),
(2, 1, 0, 'QUINTYN', 'PAULINE', '0', 'toto@gmail.com', 'France', '79', 'Chomeur', 'QUINTYN', 0, 1),
(4, 1, 0, 'QUINTYN', 'PAULINE', '0', 'toto@gmail.com', 'France', '79', 'Chomeur', 'QUINTYN', 0, 1),
(5, 0, 1, 'QUINTYN', 'PAULINE', '0622096359', 'quintynpauline@ymail.com', 'France', '79', 'CHomeur', 'QUINTYN', 0, 1),
(6, 0, 1, 'QUINTYN', 'PAULINE', '0622096359', 'quintynpauline@ymail.com', 'France', '79', 'CHomeur', 'QUINTYN', 0, 1),
(7, 0, 1, 'QUINTYN', 'PAULINE', '0622096359', 'quintynpauline@ymail.com', 'France', '79', 'Chomeur', 'QUINTYN', 1, 1),
(8, 0, 1, 'QUINTYN', 'PAULINE', '0622096359', 'quintynpauline@ymail.com', 'France', '79', 'Chomeur', 'QUINTYN', 1, 1),
(9, 0, 1, 'QUINTYN', 'PAULINE', '0622096359', 'quintynpauline@ymail.com', 'France', '79', 'Chomeur', 'QUINTYN', 1, 1),
(10, 0, 0, 'Gautier', 'Morgane', '00', 'mg@e.fr', 'France', '79', 'Assistante administrative', NULL, 0, 0),
(11, 1, 0, 'Toto2', 'Toto2', '00000000', 'toto@gmail.com', 'France', '79', 'Artiste', NULL, 0, 209087092),
(12, 0, 1, 'Quintyn', 'Pauline', '+33622096359', 'quintynpauline@gmail.com', 'France', '79', 'Chomeur', NULL, 0, 20293837),
(13, 0, 1, 'Quintyn', 'Pauline', '+33622096359', 'quintynpauline@gmail.com', 'France', '79', 'Chomeur', NULL, 0, 12222112),
(14, 1, 0, 'Quintyn', 'Pauline', '+33622096359', 'quintynpauline@gmail.com', 'France', '79', 'Chomeur', NULL, 0, 11111),
(16, 0, 1, 'Quintyn', 'Pauline', '+33622096359', 'quintynpauline@gmail.com', 'France', '79', 'Chomeur', NULL, 0, 1),
(17, 1, 0, 'QUINTYN', 'PAULINE', '0622096359', 'quintynpauline@ymail.com', 'France', '79', 'Chomeur', 'QUINTYN', 0, 11),
(18, 1, 0, 'QUINTYN', 'PAULINE', '0622096359', 'quintynpauline@ymail.com', 'France', '79', 'Artiste', 'QUINTYN', 0, 20843984698369),
(19, 0, 1, 'Dupont', 'Jacques', '0549000000', 'dupontjacques@email.fr', 'France', '86', 'Professeur', NULL, 0, 18586298176);

-- --------------------------------------------------------

--
-- Structure de la table `maried`
--

DROP TABLE IF EXISTS `maried`;
CREATE TABLE IF NOT EXISTS `maried` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `community_before` tinyint(1) NOT NULL,
  `community_after` tinyint(1) NOT NULL,
  `separation_of_property` tinyint(1) NOT NULL,
  `part_acquisitions` tinyint(1) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `previous_wedding` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `maried`
--

INSERT INTO `maried` (`id`, `community_before`, `community_after`, `separation_of_property`, `part_acquisitions`, `year`, `previous_wedding`) VALUES
(1, 0, 0, 0, 0, NULL, 0),
(2, 0, 0, 0, 0, NULL, 0),
(4, 0, 0, 0, 0, NULL, 0),
(5, 0, 0, 0, 0, NULL, 0),
(6, 0, 0, 0, 0, NULL, 0),
(7, 0, 0, 0, 0, NULL, 0),
(8, 0, 0, 0, 0, NULL, 0),
(9, 0, 0, 0, 0, NULL, 0),
(10, 0, 0, 0, 0, NULL, 0),
(11, 0, 0, 0, 0, NULL, 0),
(12, 0, 0, 1, 0, 2021, 0),
(13, 0, 0, 1, 0, 2021, 0),
(14, 0, 0, 0, 0, NULL, 0),
(16, 0, 0, 0, 0, NULL, 0),
(17, 0, 0, 0, 0, NULL, 0),
(18, 0, 0, 0, 0, NULL, 0),
(19, 0, 0, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `movable_heritage`
--

DROP TABLE IF EXISTS `movable_heritage`;
CREATE TABLE IF NOT EXISTS `movable_heritage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detained_by` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_date` date DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `organization` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interest_rate` int(11) DEFAULT NULL,
  `monthly_annual_payment` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `goal` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beneficiary` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `movable_heritage_label_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BD28D1F77F5FC5D8` (`movable_heritage_label_id`)
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `movable_heritage`
--

INSERT INTO `movable_heritage` (`id`, `detained_by`, `open_date`, `amount`, `organization`, `interest_rate`, `monthly_annual_payment`, `goal`, `beneficiary`, `movable_heritage_label_id`) VALUES
(47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(55, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9),
(56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(57, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11),
(58, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12),
(59, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13),
(60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14),
(61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15),
(62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16),
(63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17),
(64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18),
(65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(66, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20),
(67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21),
(68, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22),
(69, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23),
(70, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(71, 'B', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(72, 'C', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(73, 'D', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(74, 'E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(75, 'F', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(76, 'G', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(77, 'I', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(78, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9),
(79, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11),
(81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12),
(82, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13),
(83, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14),
(84, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15),
(85, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16),
(86, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17),
(87, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18),
(88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20),
(90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21),
(91, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22),
(92, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23),
(93, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(94, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(95, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(97, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(98, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(101, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9),
(102, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(103, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11),
(104, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12),
(105, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13),
(106, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14),
(107, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15),
(108, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16),
(109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17),
(110, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18),
(111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(112, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20),
(113, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21),
(114, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22),
(115, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23),
(116, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(117, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(118, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(119, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(120, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(121, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(122, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(123, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(124, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9),
(125, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(126, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11),
(127, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12),
(128, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13),
(129, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14),
(130, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15),
(131, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16),
(132, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17),
(133, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18),
(134, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(135, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20),
(136, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21),
(137, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22),
(138, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23),
(139, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(140, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(141, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(142, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(143, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(144, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(145, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(146, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(147, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9),
(148, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(149, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11),
(150, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12),
(151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13),
(152, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14),
(153, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15),
(154, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16),
(155, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17),
(156, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18),
(157, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(158, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20),
(159, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21),
(160, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22),
(161, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23),
(162, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(163, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(164, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(165, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(166, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(167, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(168, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(169, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(170, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9),
(171, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(172, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11),
(173, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12),
(174, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13),
(175, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14),
(176, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15),
(177, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16),
(178, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17),
(179, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18),
(180, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(181, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20),
(182, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21),
(183, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22),
(184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23),
(185, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(186, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(187, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(188, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(189, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(190, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(191, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(192, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(193, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9),
(194, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(195, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11),
(196, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12),
(197, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13),
(198, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14),
(199, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15),
(200, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16),
(201, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17),
(202, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18),
(203, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(204, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20),
(205, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21),
(206, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22),
(207, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23);

-- --------------------------------------------------------

--
-- Structure de la table `movable_heritage_label`
--

DROP TABLE IF EXISTS `movable_heritage_label`;
CREATE TABLE IF NOT EXISTS `movable_heritage_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movable_heritage_label` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `movable_heritage_label`
--

INSERT INTO `movable_heritage_label` (`id`, `movable_heritage_label`) VALUES
(1, 'Compte courant 1'),
(2, 'Compte courant 2'),
(3, 'Compte joint'),
(4, 'Compte professionnel'),
(5, 'Compte d\'associés'),
(6, 'PEL / CEL (plan épargne logement )'),
(7, 'Livret (A, B, Bleu)'),
(8, 'LDD( Livret développement durable )'),
(9, 'Compte à termes'),
(10, 'Parts sociales'),
(11, 'Compte titre monétaire'),
(12, 'Compte titre obligation'),
(13, 'Compte titre actions'),
(14, 'Compte titre FCPI / FIP'),
(15, 'PEA'),
(16, 'Assurance vie 1'),
(17, 'Assurance vie 2'),
(18, 'Assurance vie 3'),
(19, 'Assurance vie 4'),
(20, 'Plan d\'Epargne Populaire'),
(21, 'Stock options'),
(22, 'Ancien plan d\'épargne entreprise'),
(23, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `objective`
--

DROP TABLE IF EXISTS `objective`;
CREATE TABLE IF NOT EXISTS `objective` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `audit` tinyint(1) NOT NULL,
  `retirement_solution` tinyint(1) NOT NULL,
  `succession_solution` tinyint(1) NOT NULL,
  `foresight_solution` tinyint(1) NOT NULL,
  `saving_solution` tinyint(1) NOT NULL,
  `health_solution` tinyint(1) NOT NULL,
  `tax_solution` tinyint(1) NOT NULL,
  `borrower_insurance` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `objective`
--

INSERT INTO `objective` (`id`, `audit`, `retirement_solution`, `succession_solution`, `foresight_solution`, `saving_solution`, `health_solution`, `tax_solution`, `borrower_insurance`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0),
(2, 1, 0, 0, 0, 0, 0, 0, 0),
(4, 1, 0, 0, 0, 0, 0, 0, 0),
(5, 1, 0, 0, 0, 0, 0, 0, 0),
(6, 1, 0, 0, 0, 0, 0, 0, 0),
(7, 0, 0, 1, 0, 0, 0, 0, 0),
(8, 0, 0, 1, 0, 0, 0, 0, 0),
(9, 0, 0, 1, 0, 0, 0, 0, 0),
(10, 1, 0, 0, 0, 0, 0, 0, 0),
(11, 1, 0, 0, 0, 0, 0, 0, 0),
(12, 1, 0, 0, 0, 0, 0, 0, 0),
(13, 0, 1, 0, 0, 0, 0, 0, 0),
(14, 0, 0, 1, 0, 0, 0, 0, 0),
(16, 0, 1, 0, 0, 0, 0, 0, 0),
(17, 0, 1, 0, 0, 0, 0, 0, 0),
(18, 0, 0, 1, 0, 0, 0, 0, 0),
(19, 0, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `part_five`
--

DROP TABLE IF EXISTS `part_five`;
CREATE TABLE IF NOT EXISTS `part_five` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `part_five`
--

INSERT INTO `part_five` (`id`) VALUES
(1),
(2),
(3),
(4),
(5);

-- --------------------------------------------------------

--
-- Structure de la table `part_five_individual_form`
--

DROP TABLE IF EXISTS `part_five_individual_form`;
CREATE TABLE IF NOT EXISTS `part_five_individual_form` (
  `part_five_id` int(11) NOT NULL,
  `individual_form_id` int(11) NOT NULL,
  PRIMARY KEY (`part_five_id`,`individual_form_id`),
  KEY `IDX_1935577439C70144` (`part_five_id`),
  KEY `IDX_19355774662A1AF0` (`individual_form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `part_five_individual_form`
--

INSERT INTO `part_five_individual_form` (`part_five_id`, `individual_form_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6),
(4, 7),
(5, 8);

-- --------------------------------------------------------

--
-- Structure de la table `part_four`
--

DROP TABLE IF EXISTS `part_four`;
CREATE TABLE IF NOT EXISTS `part_four` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `main_bank` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisfaction` tinyint(1) NOT NULL,
  `advice_frequency` tinyint(1) NOT NULL,
  `missing_service` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthly_saving` int(11) NOT NULL,
  `open_to_proposals` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `part_four`
--

INSERT INTO `part_four` (`id`, `main_bank`, `satisfaction`, `advice_frequency`, `missing_service`, `monthly_saving`, `open_to_proposals`) VALUES
(1, 'kjhhfgd', 1, 0, 'RAS', 11, 1),
(2, 'AA', 1, 0, 'AA', 111, 1),
(3, 'kjhhfgd', 0, 0, 'ghqgjj', 1, 0),
(4, 'AA', 0, 0, 'szadzad', 1, 0),
(5, 'AA', 0, 0, 'szadzad', 1, 0),
(6, 'zhaioefh', 0, 0, 'dfhdçhrzg', 1, 0),
(7, 'Crédit Mutuel', 1, 1, 'Aucun', 50, 1);

-- --------------------------------------------------------

--
-- Structure de la table `part_four_movable_heritage`
--

DROP TABLE IF EXISTS `part_four_movable_heritage`;
CREATE TABLE IF NOT EXISTS `part_four_movable_heritage` (
  `part_four_id` int(11) NOT NULL,
  `movable_heritage_id` int(11) NOT NULL,
  PRIMARY KEY (`part_four_id`,`movable_heritage_id`),
  KEY `IDX_B630E8D565F0F7AF` (`part_four_id`),
  KEY `IDX_B630E8D57B5CFC7C` (`movable_heritage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `part_four_movable_heritage`
--

INSERT INTO `part_four_movable_heritage` (`part_four_id`, `movable_heritage_id`) VALUES
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(2, 70),
(2, 71),
(2, 72),
(2, 73),
(2, 74),
(2, 75),
(2, 76),
(2, 77),
(2, 78),
(2, 79),
(2, 80),
(2, 81),
(2, 82),
(2, 83),
(2, 84),
(2, 85),
(2, 86),
(2, 87),
(2, 88),
(2, 89),
(2, 90),
(2, 91),
(2, 92),
(3, 93),
(3, 94),
(3, 95),
(3, 96),
(3, 97),
(3, 98),
(3, 99),
(3, 100),
(3, 101),
(3, 102),
(3, 103),
(3, 104),
(3, 105),
(3, 106),
(3, 107),
(3, 108),
(3, 109),
(3, 110),
(3, 111),
(3, 112),
(3, 113),
(3, 114),
(3, 115),
(4, 116),
(4, 117),
(4, 118),
(4, 119),
(4, 120),
(4, 121),
(4, 122),
(4, 123),
(4, 124),
(4, 125),
(4, 126),
(4, 127),
(4, 128),
(4, 129),
(4, 130),
(4, 131),
(4, 132),
(4, 133),
(4, 134),
(4, 135),
(4, 136),
(4, 137),
(4, 138),
(5, 139),
(5, 140),
(5, 141),
(5, 142),
(5, 143),
(5, 144),
(5, 145),
(5, 146),
(5, 147),
(5, 148),
(5, 149),
(5, 150),
(5, 151),
(5, 152),
(5, 153),
(5, 154),
(5, 155),
(5, 156),
(5, 157),
(5, 158),
(5, 159),
(5, 160),
(5, 161),
(6, 162),
(6, 163),
(6, 164),
(6, 165),
(6, 166),
(6, 167),
(6, 168),
(6, 169),
(6, 170),
(6, 171),
(6, 172),
(6, 173),
(6, 174),
(6, 175),
(6, 176),
(6, 177),
(6, 178),
(6, 179),
(6, 180),
(6, 181),
(6, 182),
(6, 183),
(6, 184),
(7, 185),
(7, 186),
(7, 187),
(7, 188),
(7, 189),
(7, 190),
(7, 191),
(7, 192),
(7, 193),
(7, 194),
(7, 195),
(7, 196),
(7, 197),
(7, 198),
(7, 199),
(7, 200),
(7, 201),
(7, 202),
(7, 203),
(7, 204),
(7, 205),
(7, 206),
(7, 207);

-- --------------------------------------------------------

--
-- Structure de la table `part_one`
--

DROP TABLE IF EXISTS `part_one`;
CREATE TABLE IF NOT EXISTS `part_one` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donation` tinyint(1) NOT NULL,
  `testament` tinyint(1) NOT NULL,
  `notary` tinyint(1) NOT NULL,
  `notary_name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donation_between_spouses` tinyint(1) NOT NULL,
  `objective_id` int(11) NOT NULL,
  `intelligence_id` int(11) NOT NULL,
  `share_in_company_id` int(11) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `maried_id` int(11) DEFAULT NULL,
  `pro_status_id` int(11) NOT NULL,
  `child` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B848A37A73484933` (`objective_id`),
  KEY `IDX_B848A37A7584E372` (`intelligence_id`),
  KEY `IDX_B848A37A8AFB327A` (`share_in_company_id`),
  KEY `IDX_B848A37A6BF700BD` (`status_id`),
  KEY `IDX_B848A37A7FFEC9A3` (`maried_id`),
  KEY `IDX_B848A37A7B3C8E45` (`pro_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `part_one`
--

INSERT INTO `part_one` (`id`, `donation`, `testament`, `notary`, `notary_name`, `donation_between_spouses`, `objective_id`, `intelligence_id`, `share_in_company_id`, `status_id`, `maried_id`, `pro_status_id`, `child`) VALUES
(1, 1, 0, 0, NULL, 0, 1, 1, 1, 2, 1, 1, 0),
(2, 1, 0, 0, NULL, 0, 2, 2, 1, 2, 2, 1, 0),
(4, 1, 0, 0, NULL, 0, 4, 4, 1, 2, 4, 1, 0),
(5, 1, 0, 0, NULL, 0, 5, 5, 1, 2, 5, 1, 0),
(6, 1, 0, 0, NULL, 0, 6, 6, 1, 2, 6, 1, 0),
(7, 1, 0, 0, NULL, 0, 7, 7, 1, 2, 7, 1, 0),
(8, 1, 0, 0, NULL, 0, 8, 8, 1, 2, 8, 1, 0),
(9, 1, 0, 0, NULL, 0, 9, 9, 1, 3, 9, 1, 0),
(12, 1, 0, 0, NULL, 0, 12, 12, 1, 3, 12, 1, 0),
(13, 0, 1, 0, NULL, 0, 13, 13, 1, 3, 13, 1, 0),
(14, 0, 0, 0, NULL, 0, 14, 14, 1, 1, 14, 1, 0),
(16, 0, 0, 0, NULL, 0, 16, 16, 1, 2, 16, 1, 0),
(17, 0, 0, 0, NULL, 0, 17, 17, 1, 2, 17, 1, 0),
(18, 1, 0, 0, NULL, 0, 18, 18, 1, 2, 18, 1, 0),
(19, 0, 1, 0, NULL, 0, 19, 19, 1, 1, 19, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `part_one_children`
--

DROP TABLE IF EXISTS `part_one_children`;
CREATE TABLE IF NOT EXISTS `part_one_children` (
  `part_one_id` int(11) NOT NULL,
  `children_id` int(11) NOT NULL,
  PRIMARY KEY (`part_one_id`,`children_id`),
  KEY `IDX_4F65F7F8C20A0E86` (`part_one_id`),
  KEY `IDX_4F65F7F83D3D2749` (`children_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `part_one_children`
--

INSERT INTO `part_one_children` (`part_one_id`, `children_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(4, 13),
(4, 14),
(4, 15),
(4, 16),
(5, 17),
(5, 18),
(5, 19),
(5, 20),
(6, 21),
(6, 22),
(6, 23),
(6, 24),
(7, 25),
(7, 26),
(7, 27),
(7, 28),
(8, 29),
(8, 30),
(8, 31),
(8, 32),
(9, 33),
(9, 34),
(9, 35),
(9, 36),
(12, 45),
(12, 46),
(12, 47),
(12, 48),
(13, 49),
(13, 50),
(13, 51),
(13, 52),
(14, 53),
(14, 54),
(14, 55),
(14, 56),
(16, 61),
(16, 62),
(16, 63),
(16, 64),
(17, 65),
(17, 66),
(17, 67),
(17, 68),
(18, 69),
(18, 70),
(18, 71),
(18, 72),
(19, 73),
(19, 74),
(19, 75),
(19, 76);

-- --------------------------------------------------------

--
-- Structure de la table `part_seven`
--

DROP TABLE IF EXISTS `part_seven`;
CREATE TABLE IF NOT EXISTS `part_seven` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `part_seven`
--

INSERT INTO `part_seven` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9);

-- --------------------------------------------------------

--
-- Structure de la table `part_seven_documents`
--

DROP TABLE IF EXISTS `part_seven_documents`;
CREATE TABLE IF NOT EXISTS `part_seven_documents` (
  `part_seven_id` int(11) NOT NULL,
  `documents_id` int(11) NOT NULL,
  PRIMARY KEY (`part_seven_id`,`documents_id`),
  KEY `IDX_5A718CF5C77125D4` (`part_seven_id`),
  KEY `IDX_5A718CF55F0F2752` (`documents_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `part_seven_documents`
--

INSERT INTO `part_seven_documents` (`part_seven_id`, `documents_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(5, 6),
(6, 7),
(6, 8),
(7, 9),
(7, 10),
(8, 11),
(8, 12),
(9, 13),
(9, 14);

-- --------------------------------------------------------

--
-- Structure de la table `part_six`
--

DROP TABLE IF EXISTS `part_six`;
CREATE TABLE IF NOT EXISTS `part_six` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `single_min_income` int(11) NOT NULL,
  `couple_min_income` int(11) NOT NULL,
  `stop_working` int(11) NOT NULL,
  `retirement_capital` tinyint(1) NOT NULL,
  `amount_retirement_capital` int(11) DEFAULT NULL,
  `medical_history` tinyint(1) NOT NULL,
  `family_medical_history` tinyint(1) NOT NULL,
  `smoking` tinyint(1) NOT NULL,
  `stop_smoking` tinyint(1) DEFAULT NULL,
  `cover` tinyint(1) NOT NULL,
  `comment` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `have_reco` tinyint(1) NOT NULL,
  `family_needs_id` int(11) NOT NULL,
  `health_needs_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_813303706F76B9E5` (`family_needs_id`),
  KEY `IDX_8133037045E92F38` (`health_needs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `part_six`
--

INSERT INTO `part_six` (`id`, `single_min_income`, `couple_min_income`, `stop_working`, `retirement_capital`, `amount_retirement_capital`, `medical_history`, `family_medical_history`, `smoking`, `stop_smoking`, `cover`, `comment`, `have_reco`, `family_needs_id`, `health_needs_id`) VALUES
(1, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, '11', 0, 1, 1),
(2, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, '11', 0, 2, 2),
(3, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, '11', 0, 3, 3),
(4, 1, 1, 1, 0, NULL, 0, 0, 0, 0, 0, '11', 0, 4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `part_six_recommendation`
--

DROP TABLE IF EXISTS `part_six_recommendation`;
CREATE TABLE IF NOT EXISTS `part_six_recommendation` (
  `part_six_id` int(11) NOT NULL,
  `recommendation_id` int(11) NOT NULL,
  PRIMARY KEY (`part_six_id`,`recommendation_id`),
  KEY `IDX_A4A72444A64D9F34` (`part_six_id`),
  KEY `IDX_A4A72444D173940B` (`recommendation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `part_six_recommendation`
--

INSERT INTO `part_six_recommendation` (`part_six_id`, `recommendation_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 16);

-- --------------------------------------------------------

--
-- Structure de la table `part_three`
--

DROP TABLE IF EXISTS `part_three`;
CREATE TABLE IF NOT EXISTS `part_three` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `have_credit_leasing` tinyint(1) NOT NULL,
  `project` tinyint(1) NOT NULL,
  `needs` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trusted_lawyer` tinyint(1) NOT NULL,
  `legal_specificity` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `law_firm` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `part_three`
--

INSERT INTO `part_three` (`id`, `have_credit_leasing`, `project`, `needs`, `trusted_lawyer`, `legal_specificity`, `law_firm`) VALUES
(1, 0, 0, NULL, 0, NULL, NULL),
(2, 0, 0, NULL, 0, NULL, NULL),
(3, 0, 0, NULL, 0, NULL, NULL),
(4, 0, 0, NULL, 0, NULL, NULL),
(5, 0, 0, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `part_three_credit_leasing`
--

DROP TABLE IF EXISTS `part_three_credit_leasing`;
CREATE TABLE IF NOT EXISTS `part_three_credit_leasing` (
  `part_three_id` int(11) NOT NULL,
  `credit_leasing_id` int(11) NOT NULL,
  PRIMARY KEY (`part_three_id`,`credit_leasing_id`),
  KEY `IDX_AD5E0BE4E0F3881A` (`part_three_id`),
  KEY `IDX_AD5E0BE43A14DD68` (`credit_leasing_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `part_three_credit_leasing`
--

INSERT INTO `part_three_credit_leasing` (`part_three_id`, `credit_leasing_id`) VALUES
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(2, 53),
(2, 54),
(2, 55),
(2, 56),
(3, 57),
(3, 58),
(3, 59),
(3, 60),
(4, 61),
(4, 62),
(4, 63),
(4, 64),
(5, 65),
(5, 66),
(5, 67),
(5, 68);

-- --------------------------------------------------------

--
-- Structure de la table `part_three_patrimony`
--

DROP TABLE IF EXISTS `part_three_patrimony`;
CREATE TABLE IF NOT EXISTS `part_three_patrimony` (
  `part_three_id` int(11) NOT NULL,
  `patrimony_id` int(11) NOT NULL,
  PRIMARY KEY (`part_three_id`,`patrimony_id`),
  KEY `IDX_AFC67A0CE0F3881A` (`part_three_id`),
  KEY `IDX_AFC67A0C9A60D1F0` (`patrimony_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `part_three_patrimony`
--

INSERT INTO `part_three_patrimony` (`part_three_id`, `patrimony_id`) VALUES
(1, 112),
(1, 113),
(1, 114),
(1, 115),
(1, 116),
(1, 117),
(1, 118),
(1, 119),
(1, 120),
(1, 121),
(1, 122),
(2, 123),
(2, 124),
(2, 125),
(2, 126),
(2, 127),
(2, 128),
(2, 129),
(2, 130),
(2, 131),
(2, 132),
(2, 133),
(3, 134),
(3, 135),
(3, 136),
(3, 137),
(3, 138),
(3, 139),
(3, 140),
(3, 141),
(3, 142),
(3, 143),
(3, 144),
(4, 145),
(4, 146),
(4, 147),
(4, 148),
(4, 149),
(4, 150),
(4, 151),
(4, 152),
(4, 153),
(4, 154),
(4, 155),
(5, 156),
(5, 157),
(5, 158),
(5, 159),
(5, 160),
(5, 161),
(5, 162),
(5, 163),
(5, 164),
(5, 165),
(5, 166);

-- --------------------------------------------------------

--
-- Structure de la table `part_two`
--

DROP TABLE IF EXISTS `part_two`;
CREATE TABLE IF NOT EXISTS `part_two` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active_company_savings_plan` tinyint(1) DEFAULT NULL,
  `actual_saving` int(11) DEFAULT NULL,
  `contribution_class` tinyint(1) NOT NULL,
  `contribution_class_label` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trusted_account` tinyint(1) NOT NULL,
  `trusted_account_name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collective_foresight_id` int(11) DEFAULT NULL,
  `savings_plan_id` int(11) DEFAULT NULL,
  `collective_retirement_id` int(11) DEFAULT NULL,
  `evolution_id` int(11) DEFAULT NULL,
  `salary_id` int(11) NOT NULL,
  `able_to_measure` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D3EEAFED81CAE112` (`collective_foresight_id`),
  KEY `IDX_D3EEAFED7F8E4905` (`savings_plan_id`),
  KEY `IDX_D3EEAFED97F4F26A` (`collective_retirement_id`),
  KEY `IDX_D3EEAFEDCDFF215A` (`evolution_id`),
  KEY `IDX_D3EEAFEDB0FDF16E` (`salary_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `part_two`
--

INSERT INTO `part_two` (`id`, `active_company_savings_plan`, `actual_saving`, `contribution_class`, `contribution_class_label`, `trusted_account`, `trusted_account_name`, `collective_foresight_id`, `savings_plan_id`, `collective_retirement_id`, `evolution_id`, `salary_id`, `able_to_measure`) VALUES
(1, NULL, 11, 0, NULL, 0, NULL, 3, 2, 2, 3, 41, 'OUI'),
(2, 1, 1, 1, 'A', 1, 'TOTO comptable', 2, 2, 3, 4, 69, 'OUI'),
(3, 1, 11, 0, NULL, 0, NULL, 1, 1, 2, 7, 131, 'NON'),
(4, 1, 11, 0, NULL, 0, NULL, 2, 3, 3, 9, 169, 'NON'),
(5, 1, 11, 0, NULL, 0, NULL, 2, 3, 3, 10, 179, 'NON'),
(6, 1, 1, 0, NULL, 0, NULL, 2, 3, 3, 12, 208, 'NON'),
(7, 1, 1, 0, NULL, 0, NULL, 2, 2, 2, 14, 243, 'NON'),
(8, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, 16, 262, 'NON'),
(9, 0, NULL, 0, NULL, 0, NULL, 3, 2, 3, 17, 271, 'NON'),
(10, NULL, NULL, 0, NULL, 0, NULL, 2, 2, 2, 18, 280, 'NON');

-- --------------------------------------------------------

--
-- Structure de la table `part_two_future_income`
--

DROP TABLE IF EXISTS `part_two_future_income`;
CREATE TABLE IF NOT EXISTS `part_two_future_income` (
  `part_two_id` int(11) NOT NULL,
  `future_income_id` int(11) NOT NULL,
  PRIMARY KEY (`part_two_id`,`future_income_id`),
  KEY `IDX_4AC070CCA956E949` (`part_two_id`),
  KEY `IDX_4AC070CCC4420662` (`future_income_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `part_two_future_income`
--

INSERT INTO `part_two_future_income` (`part_two_id`, `future_income_id`) VALUES
(1, 10),
(1, 11),
(1, 12),
(2, 16),
(2, 17),
(2, 18),
(3, 34),
(3, 35),
(3, 36),
(4, 46),
(4, 47),
(4, 48),
(5, 49),
(5, 50),
(5, 51),
(6, 58),
(6, 59),
(6, 60),
(7, 67),
(7, 68),
(7, 69),
(8, 73),
(8, 74),
(8, 75),
(9, 76),
(9, 77),
(9, 78),
(10, 79),
(10, 80),
(10, 81);

-- --------------------------------------------------------

--
-- Structure de la table `part_two_guarantee`
--

DROP TABLE IF EXISTS `part_two_guarantee`;
CREATE TABLE IF NOT EXISTS `part_two_guarantee` (
  `part_two_id` int(11) NOT NULL,
  `guarantee_id` int(11) NOT NULL,
  PRIMARY KEY (`part_two_id`,`guarantee_id`),
  KEY `IDX_E07DDCB2A956E949` (`part_two_id`),
  KEY `IDX_E07DDCB2DB4B0220` (`guarantee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `part_two_guarantee`
--

INSERT INTO `part_two_guarantee` (`part_two_id`, `guarantee_id`) VALUES
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(2, 71),
(2, 72),
(2, 73),
(2, 74),
(2, 75),
(2, 76),
(2, 77),
(2, 78),
(2, 79),
(2, 80),
(3, 141),
(3, 142),
(3, 143),
(3, 144),
(3, 145),
(3, 146),
(3, 147),
(3, 148),
(3, 149),
(3, 150),
(4, 181),
(4, 182),
(4, 183),
(4, 184),
(4, 185),
(4, 186),
(4, 187),
(4, 188),
(4, 189),
(4, 190),
(5, 191),
(5, 192),
(5, 193),
(5, 194),
(5, 195),
(5, 196),
(5, 197),
(5, 198),
(5, 199),
(5, 200),
(6, 221),
(6, 222),
(6, 223),
(6, 224),
(6, 225),
(6, 226),
(6, 227),
(6, 228),
(6, 229),
(6, 230),
(7, 271),
(7, 272),
(7, 273),
(7, 274),
(7, 275),
(7, 276),
(7, 277),
(7, 278),
(7, 279),
(7, 280),
(8, 301),
(8, 302),
(8, 303),
(8, 304),
(8, 305),
(8, 306),
(8, 307),
(8, 308),
(8, 309),
(8, 310),
(9, 311),
(9, 312),
(9, 313),
(9, 314),
(9, 315),
(9, 316),
(9, 317),
(9, 318),
(9, 319),
(9, 320),
(10, 321),
(10, 322),
(10, 323),
(10, 324),
(10, 325),
(10, 326),
(10, 327),
(10, 328),
(10, 329),
(10, 330);

-- --------------------------------------------------------

--
-- Structure de la table `part_two_total_annual_income`
--

DROP TABLE IF EXISTS `part_two_total_annual_income`;
CREATE TABLE IF NOT EXISTS `part_two_total_annual_income` (
  `part_two_id` int(11) NOT NULL,
  `total_annual_income_id` int(11) NOT NULL,
  PRIMARY KEY (`part_two_id`,`total_annual_income_id`),
  KEY `IDX_B9EAAD0FA956E949` (`part_two_id`),
  KEY `IDX_B9EAAD0F81AC812C` (`total_annual_income_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `part_two_total_annual_income`
--

INSERT INTO `part_two_total_annual_income` (`part_two_id`, `total_annual_income_id`) VALUES
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(3, 89),
(3, 90),
(3, 91),
(3, 92),
(3, 93),
(3, 94),
(3, 95),
(3, 96),
(4, 121),
(4, 122),
(4, 123),
(4, 124),
(4, 125),
(4, 126),
(4, 127),
(4, 128),
(5, 129),
(5, 130),
(5, 131),
(5, 132),
(5, 133),
(5, 134),
(5, 135),
(5, 136),
(6, 153),
(6, 154),
(6, 155),
(6, 156),
(6, 157),
(6, 158),
(6, 159),
(6, 160),
(7, 177),
(7, 178),
(7, 179),
(7, 180),
(7, 181),
(7, 182),
(7, 183),
(7, 184),
(8, 193),
(8, 194),
(8, 195),
(8, 196),
(8, 197),
(8, 198),
(8, 199),
(8, 200),
(9, 201),
(9, 202),
(9, 203),
(9, 204),
(9, 205),
(9, 206),
(9, 207),
(9, 208),
(10, 209),
(10, 210),
(10, 211),
(10, 212),
(10, 213),
(10, 214),
(10, 215),
(10, 216);

-- --------------------------------------------------------

--
-- Structure de la table `patrimony`
--

DROP TABLE IF EXISTS `patrimony`;
CREATE TABLE IF NOT EXISTS `patrimony` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detained_by` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method_of_detention` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimated_value` int(11) DEFAULT NULL,
  `acquisition_value` int(11) DEFAULT NULL,
  `taxation` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent` int(11) DEFAULT NULL,
  `sale` tinyint(1) DEFAULT NULL,
  `capital_of_rest` int(11) DEFAULT NULL,
  `lender` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `borrowing_date` date DEFAULT NULL,
  `during` int(11) DEFAULT NULL,
  `percentage_of_insurance` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patrimony_label_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_986416E23DA10740` (`patrimony_label_id`)
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `patrimony`
--

INSERT INTO `patrimony` (`id`, `detained_by`, `method_of_detention`, `estimated_value`, `acquisition_value`, `taxation`, `rent`, `sale`, `capital_of_rest`, `lender`, `borrowing_date`, `during`, `percentage_of_insurance`, `rate`, `patrimony_label_id`) VALUES
(112, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(113, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(114, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(115, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(116, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(117, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(118, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(119, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(120, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 9),
(121, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(122, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 11),
(123, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(124, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(125, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(126, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(127, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(128, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(129, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(130, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(131, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 9),
(132, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(133, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 11),
(134, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(135, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(136, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(137, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(138, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(139, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(140, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(141, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(142, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 9),
(143, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(144, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 11),
(145, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(146, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(147, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(148, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(149, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(150, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(151, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(152, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(153, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 9),
(154, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(155, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 11),
(156, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(157, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(158, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(159, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(160, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(161, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(162, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(163, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(164, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 9),
(165, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(166, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 11);

-- --------------------------------------------------------

--
-- Structure de la table `patrimony_label`
--

DROP TABLE IF EXISTS `patrimony_label`;
CREATE TABLE IF NOT EXISTS `patrimony_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patrimony_label` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `patrimony_label`
--

INSERT INTO `patrimony_label` (`id`, `patrimony_label`) VALUES
(1, 'Résidence principale'),
(2, 'Résidence secondaire'),
(3, 'Autres biens'),
(4, 'Bien locatif 1'),
(5, 'Bien locatif 2'),
(6, 'Bien locatif 3'),
(7, 'Pats de SCI ou SCPI'),
(8, 'Autres'),
(9, 'Immobilier professionnel'),
(10, 'Placement foncier'),
(11, 'Objet: Meubles et Véhicules');

-- --------------------------------------------------------

--
-- Structure de la table `preference`
--

DROP TABLE IF EXISTS `preference`;
CREATE TABLE IF NOT EXISTS `preference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pref_label` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `preference`
--

INSERT INTO `preference` (`id`, `pref_label`) VALUES
(1, 'La protection du capital à tout moment, en acceptant une performance limitée'),
(2, 'La performance en limitant les risques de partes associés'),
(3, 'La performance avant tout, en acceptant les risques de pertes associés');

-- --------------------------------------------------------

--
-- Structure de la table `previous_financial_products`
--

DROP TABLE IF EXISTS `previous_financial_products`;
CREATE TABLE IF NOT EXISTS `previous_financial_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pfp_label` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `previous_financial_products`
--

INSERT INTO `previous_financial_products` (`id`, `pfp_label`) VALUES
(1, 'Oui, il y a moins de 2ans'),
(2, 'Oui, il y a plus de 2ans'),
(3, 'Non, jamais');

-- --------------------------------------------------------

--
-- Structure de la table `pro_status`
--

DROP TABLE IF EXISTS `pro_status`;
CREATE TABLE IF NOT EXISTS `pro_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_label` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pro_status`
--

INSERT INTO `pro_status` (`id`, `pro_label`) VALUES
(1, 'Salarié'),
(2, 'Indépendant travailleur non salarié (TNS)'),
(3, 'Indépendant Assimilé salarié'),
(4, 'Fonctionnaire titulaire'),
(5, 'Fonctionnaire non titulaire'),
(6, 'Retraité'),
(7, 'Sans emploi'),
(8, 'Invalide ou sous pension'),
(9, 'Etudiant/autre');

-- --------------------------------------------------------

--
-- Structure de la table `recommendation`
--

DROP TABLE IF EXISTS `recommendation`;
CREATE TABLE IF NOT EXISTS `recommendation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `relationship` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calling_times` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `recommendation`
--

INSERT INTO `recommendation` (`id`, `name`, `firstname`, `job`, `age`, `relationship`, `phone`, `mail`, `calling_times`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `risk`
--

DROP TABLE IF EXISTS `risk`;
CREATE TABLE IF NOT EXISTS `risk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `risk_label` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `risk`
--

INSERT INTO `risk` (`id`, `risk_label`) VALUES
(1, 'Oui, toujours'),
(2, 'Cela, dépend du type d\'obligation'),
(3, 'Non'),
(4, 'Ne sait pas');

-- --------------------------------------------------------

--
-- Structure de la table `salary`
--

DROP TABLE IF EXISTS `salary`;
CREATE TABLE IF NOT EXISTS `salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) DEFAULT NULL,
  `gross_net` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=289 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `salary`
--

INSERT INTO `salary` (`id`, `amount`, `gross_net`) VALUES
(40, 111, 0),
(41, 1, 0),
(42, 1, 0),
(43, 2, 0),
(44, 3, 0),
(45, 11, 0),
(46, 22, 0),
(47, 33, 0),
(48, 44, 0),
(49, 55, 0),
(50, 66, 0),
(51, 77, 0),
(52, 88, 0),
(68, 2, 0),
(69, 12, 0),
(70, 123, 0),
(71, 0, 0),
(72, 0, 0),
(73, 16, 0),
(74, 17, 0),
(75, 18, 0),
(76, 0, 0),
(77, 0, 0),
(78, 0, 0),
(79, 0, 0),
(80, 0, 0),
(130, 11, 0),
(131, 11, 0),
(132, 1, 0),
(133, 1, 0),
(134, 1, 0),
(135, 1, 0),
(136, 1, 0),
(137, 1, 0),
(138, 1, 0),
(139, 1, 0),
(168, 1, 0),
(169, 1, 0),
(170, 1, 0),
(171, 1, 0),
(172, 1, 0),
(173, 1, 0),
(174, 1, 0),
(175, 1, 0),
(176, 1, 0),
(177, 1, 0),
(178, 1, 0),
(179, 1, 0),
(180, 1, 0),
(181, 1, 0),
(182, 1, 0),
(183, 1, 0),
(184, 1, 0),
(185, 1, 0),
(186, 1, 0),
(187, 1, 0),
(207, 1, 0),
(208, 1, 0),
(209, 1, 0),
(210, 1, 0),
(211, 1, 0),
(212, 1, 0),
(213, 1, 0),
(214, 1, 0),
(215, 1, 0),
(216, 1, 0),
(242, 1, 0),
(243, 1, 0),
(244, 1, 0),
(245, 1, 0),
(246, 1, 0),
(247, 1, 0),
(248, 1, 0),
(249, 1, 0),
(250, 1, 0),
(251, 1, 0),
(262, 1, 0),
(263, NULL, 0),
(264, NULL, 0),
(265, NULL, 0),
(266, NULL, 0),
(267, NULL, 0),
(268, NULL, 0),
(269, NULL, 0),
(270, NULL, 0),
(271, 1, 0),
(272, NULL, 0),
(273, NULL, 0),
(274, NULL, 0),
(275, NULL, 0),
(276, NULL, 0),
(277, NULL, 0),
(278, NULL, 0),
(279, NULL, 0),
(280, 1, 0),
(281, NULL, 0),
(282, NULL, 0),
(283, NULL, 0),
(284, NULL, 0),
(285, NULL, 0),
(286, NULL, 0),
(287, NULL, 0),
(288, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `savings_plan`
--

DROP TABLE IF EXISTS `savings_plan`;
CREATE TABLE IF NOT EXISTS `savings_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `savings_label` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `savings_plan`
--

INSERT INTO `savings_plan` (`id`, `savings_label`) VALUES
(1, 'Moins de 1000€'),
(2, 'Entre 1000 et 5000€'),
(3, 'Entre 5000 et 10000€'),
(4, 'Plus de 10000€');

-- --------------------------------------------------------

--
-- Structure de la table `share_in_compagny`
--

DROP TABLE IF EXISTS `share_in_compagny`;
CREATE TABLE IF NOT EXISTS `share_in_compagny` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `share_label` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `share_in_compagny`
--

INSERT INTO `share_in_compagny` (`id`, `share_label`) VALUES
(1, 'Majoritaire'),
(2, 'Minoritaire'),
(3, 'Egalitaire');

-- --------------------------------------------------------

--
-- Structure de la table `share_of_investment`
--

DROP TABLE IF EXISTS `share_of_investment`;
CREATE TABLE IF NOT EXISTS `share_of_investment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soi_label` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `share_of_investment`
--

INSERT INTO `share_of_investment` (`id`, `soi_label`) VALUES
(1, 'Moins de 10%'),
(2, 'Entre 10 et 30%'),
(3, 'Plus de 30%');

-- --------------------------------------------------------

--
-- Structure de la table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_label` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `state`
--

INSERT INTO `state` (`id`, `state_label`) VALUES
(1, 'Créé'),
(2, 'Publié'),
(3, 'Archivé');

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_label` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`id`, `s_label`) VALUES
(1, 'Célibataire'),
(2, 'En couple'),
(3, 'Marié(e)');

-- --------------------------------------------------------

--
-- Structure de la table `thematic`
--

DROP TABLE IF EXISTS `thematic`;
CREATE TABLE IF NOT EXISTS `thematic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `th_label` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `thematic`
--

INSERT INTO `thematic` (`id`, `th_label`) VALUES
(1, 'Mutuelle'),
(2, 'Prévoyance'),
(3, 'Epargne'),
(4, 'Retraite'),
(5, 'Impôt'),
(6, 'Succession'),
(7, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `total_annual_income`
--

DROP TABLE IF EXISTS `total_annual_income`;
CREATE TABLE IF NOT EXISTS `total_annual_income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `income_label` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3BB45A54B0FDF16E` (`salary_id`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `total_annual_income`
--

INSERT INTO `total_annual_income` (`id`, `income_label`, `salary_id`) VALUES
(25, 'Traitements, salaire, et dividens', 45),
(26, 'Bénéfices non commerciaux', 46),
(27, 'Bénéfices industriels et commerciaux', 47),
(28, 'Bénéfices agricoles', 48),
(29, 'Pensions, retraites et rentres', 49),
(30, 'Revenus immobiliers', 50),
(31, 'Revenus mobiliers', 51),
(32, 'Revenus divers', 52),
(41, 'Traitements, salaire, et dividens', 73),
(42, 'Bénéfices non commerciaux', 74),
(43, 'Bénéfices industriels et commerciaux', 75),
(44, 'Bénéfices agricoles', 76),
(45, 'Pensions, retraites et rentres', 77),
(46, 'Revenus immobiliers', 78),
(47, 'Revenus mobiliers', 79),
(48, 'Revenus divers', 80),
(89, 'Traitements, salaire, et dividens', 132),
(90, 'Bénéfices non commerciaux', 133),
(91, 'Bénéfices industriels et commerciaux', 134),
(92, 'Bénéfices agricoles', 135),
(93, 'Pensions, retraites et rentres', 136),
(94, 'Revenus immobiliers', 137),
(95, 'Revenus mobiliers', 138),
(96, 'Revenus divers', 139),
(121, 'Traitements, salaire, et dividens', 170),
(122, 'Bénéfices non commerciaux', 171),
(123, 'Bénéfices industriels et commerciaux', 172),
(124, 'Bénéfices agricoles', 173),
(125, 'Pensions, retraites et rentres', 174),
(126, 'Revenus immobiliers', 175),
(127, 'Revenus mobiliers', 176),
(128, 'Revenus divers', 177),
(129, 'Traitements, salaire, et dividens', 180),
(130, 'Bénéfices non commerciaux', 181),
(131, 'Bénéfices industriels et commerciaux', 182),
(132, 'Bénéfices agricoles', 183),
(133, 'Pensions, retraites et rentres', 184),
(134, 'Revenus immobiliers', 185),
(135, 'Revenus mobiliers', 186),
(136, 'Revenus divers', 187),
(153, 'Traitements, salaire, et dividens', 209),
(154, 'Bénéfices non commerciaux', 210),
(155, 'Bénéfices industriels et commerciaux', 211),
(156, 'Bénéfices agricoles', 212),
(157, 'Pensions, retraites et rentres', 213),
(158, 'Revenus immobiliers', 214),
(159, 'Revenus mobiliers', 215),
(160, 'Revenus divers', 216),
(177, 'Traitements, salaire, et dividens', 244),
(178, 'Bénéfices non commerciaux', 245),
(179, 'Bénéfices industriels et commerciaux', 246),
(180, 'Bénéfices agricoles', 247),
(181, 'Pensions, retraites et rentres', 248),
(182, 'Revenus immobiliers', 249),
(183, 'Revenus mobiliers', 250),
(184, 'Revenus divers', 251),
(193, 'Traitements, salaire, et dividens', 263),
(194, 'Bénéfices non commerciaux', 264),
(195, 'Bénéfices industriels et commerciaux', 265),
(196, 'Bénéfices agricoles', 266),
(197, 'Pensions, retraites et rentres', 267),
(198, 'Revenus immobiliers', 268),
(199, 'Revenus mobiliers', 269),
(200, 'Revenus divers', 270),
(201, 'Traitements, salaire, et dividens', 272),
(202, 'Bénéfices non commerciaux', 273),
(203, 'Bénéfices industriels et commerciaux', 274),
(204, 'Bénéfices agricoles', 275),
(205, 'Pensions, retraites et rentres', 276),
(206, 'Revenus immobiliers', 277),
(207, 'Revenus mobiliers', 278),
(208, 'Revenus divers', 279),
(209, 'Traitements, salaire, et dividens', 281),
(210, 'Bénéfices non commerciaux', 282),
(211, 'Bénéfices industriels et commerciaux', 283),
(212, 'Bénéfices agricoles', 284),
(213, 'Pensions, retraites et rentres', 285),
(214, 'Revenus immobiliers', 286),
(215, 'Revenus mobiliers', 287),
(216, 'Revenus divers', 288);

-- --------------------------------------------------------

--
-- Structure de la table `unplanned`
--

DROP TABLE IF EXISTS `unplanned`;
CREATE TABLE IF NOT EXISTS `unplanned` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unpl_label` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `unplanned`
--

INSERT INTO `unplanned` (`id`, `unpl_label`) VALUES
(10, 'Non, j\'ai d\'autres économies disponibles rapidement'),
(11, 'Oui, je pourrais avoir besoin d\'une partie de cet investissement en cas d\'imprévu'),
(12, 'Oui, je dois pouvoir disposer de cette épargne à tout moment');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gender_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pseudo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mutual_health` tinyint(1) DEFAULT NULL,
  `retirement` tinyint(1) DEFAULT NULL,
  `foresight` tinyint(1) DEFAULT NULL,
  `tax` tinyint(1) DEFAULT NULL,
  `saving` tinyint(1) DEFAULT NULL,
  `succession` tinyint(1) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `partner_offers` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64986CC499D` (`pseudo`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  KEY `IDX_8D93D649708A0E0` (`gender_id`),
  KEY `IDX_8D93D649F5B7AF75` (`address_id`),
  KEY `IDX_8D93D6496BF700BD` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `gender_id`, `address_id`, `status_id`, `img`, `name`, `firstname`, `pseudo`, `pwd`, `birthday`, `email`, `phone`, `mobile`, `mutual_health`, `retirement`, `foresight`, `tax`, `saving`, `succession`, `admin`, `newsletter`, `partner_offers`) VALUES
(1, 1, NULL, 1, NULL, 'Toto', 'Toto', 'Toto', '$2y$13$lvR9c7VJrJfS68gzHB/lKOFiWOYNrFtqzs2v6aa3aa8L0VFAvynKK', '1917-05-08', 'toto@email.fr', NULL, NULL, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(2, NULL, NULL, NULL, NULL, 'Titi', 'Titi', 'Toto2', '$2y$13$lvR9c7VJrJfS68gzHB/lKOFiWOYNrFtqzs2v6aa3aa8L0VFAvynKK', NULL, 'toto2@email.fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(3, NULL, NULL, NULL, NULL, 'Tata', 'Tata', 'Tata', '$2y$13$.5yOe2l3FQCfsiRplyyMPORxVM0H4sAX4Lj.PEb3sBHPqvGopS0vW', NULL, 'tata@e.fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_23A0E6612469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_23A0E662395FCED` FOREIGN KEY (`thematic_id`) REFERENCES `thematic` (`id`),
  ADD CONSTRAINT `FK_23A0E664FEA67CF` FOREIGN KEY (`access_id`) REFERENCES `access` (`id`),
  ADD CONSTRAINT `FK_23A0E665D83CC1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`),
  ADD CONSTRAINT `FK_23A0E6684A66610` FOREIGN KEY (`user_admin_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `audit`
--
ALTER TABLE `audit`
  ADD CONSTRAINT `FK_9218FF7939C70144` FOREIGN KEY (`part_five_id`) REFERENCES `part_five` (`id`),
  ADD CONSTRAINT `FK_9218FF7965F0F7AF` FOREIGN KEY (`part_four_id`) REFERENCES `part_four` (`id`),
  ADD CONSTRAINT `FK_9218FF79A64D9F34` FOREIGN KEY (`part_six_id`) REFERENCES `part_six` (`id`),
  ADD CONSTRAINT `FK_9218FF79A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_9218FF79A956E949` FOREIGN KEY (`part_two_id`) REFERENCES `part_two` (`id`),
  ADD CONSTRAINT `FK_9218FF79C20A0E86` FOREIGN KEY (`part_one_id`) REFERENCES `part_one` (`id`),
  ADD CONSTRAINT `FK_9218FF79C77125D4` FOREIGN KEY (`part_seven_id`) REFERENCES `part_seven` (`id`),
  ADD CONSTRAINT `FK_9218FF79E0F3881A` FOREIGN KEY (`part_three_id`) REFERENCES `part_three` (`id`);

--
-- Contraintes pour la table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_64C19C14FEA67CF` FOREIGN KEY (`access_id`) REFERENCES `access` (`id`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C7294869C` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `FK_9474526CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `evolution`
--
ALTER TABLE `evolution`
  ADD CONSTRAINT `FK_420C28937B3C8E45` FOREIGN KEY (`pro_status_id`) REFERENCES `pro_status` (`id`),
  ADD CONSTRAINT `FK_420C2893B0FDF16E` FOREIGN KEY (`salary_id`) REFERENCES `salary` (`id`);

--
-- Contraintes pour la table `future_income`
--
ALTER TABLE `future_income`
  ADD CONSTRAINT `FK_9413BB71C4420662` FOREIGN KEY (`salary_id`) REFERENCES `salary` (`id`),
  ADD CONSTRAINT `FK_DD02E94BC4420662` FOREIGN KEY (`pro_status_id`) REFERENCES `pro_status` (`id`);

--
-- Contraintes pour la table `guarantee`
--
ALTER TABLE `guarantee`
  ADD CONSTRAINT `FK_589198D8E7A1D12E` FOREIGN KEY (`guarantee_label_id`) REFERENCES `guarantee_label` (`id`);

--
-- Contraintes pour la table `individual_form`
--
ALTER TABLE `individual_form`
  ADD CONSTRAINT `FK_9A4A67FC200761` FOREIGN KEY (`unplanned_id`) REFERENCES `unplanned` (`id`),
  ADD CONSTRAINT `FK_9A4A67FC235B6D1` FOREIGN KEY (`risk_id`) REFERENCES `risk` (`id`),
  ADD CONSTRAINT `FK_9A4A67FC2EBD7B35` FOREIGN KEY (`financial_products_id`) REFERENCES `financial_products` (`id`),
  ADD CONSTRAINT `FK_9A4A67FC328E815D` FOREIGN KEY (`share_of_investment_id`) REFERENCES `share_of_investment` (`id`),
  ADD CONSTRAINT `FK_9A4A67FC36A17427` FOREIGN KEY (`previous_financial_products_id`) REFERENCES `previous_financial_products` (`id`),
  ADD CONSTRAINT `FK_9A4A67FC6BF8A3D3` FOREIGN KEY (`drop_reaction_id`) REFERENCES `drop_reaction` (`id`),
  ADD CONSTRAINT `FK_9A4A67FCD3D321CA` FOREIGN KEY (`death_funds_id`) REFERENCES `death_funds` (`id`),
  ADD CONSTRAINT `FK_9A4A67FCD81022C0` FOREIGN KEY (`preference_id`) REFERENCES `preference` (`id`),
  ADD CONSTRAINT `FK_9A4A67FCEE87D3F6` FOREIGN KEY (`financial_investment_id`) REFERENCES `financial_investment` (`id`);

--
-- Contraintes pour la table `movable_heritage`
--
ALTER TABLE `movable_heritage`
  ADD CONSTRAINT `FK_BD28D1F77F5FC5D8` FOREIGN KEY (`movable_heritage_label_id`) REFERENCES `movable_heritage_label` (`id`);

--
-- Contraintes pour la table `part_five_individual_form`
--
ALTER TABLE `part_five_individual_form`
  ADD CONSTRAINT `FK_1935577439C70144` FOREIGN KEY (`part_five_id`) REFERENCES `part_five` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_19355774662A1AF0` FOREIGN KEY (`individual_form_id`) REFERENCES `individual_form` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `part_four_movable_heritage`
--
ALTER TABLE `part_four_movable_heritage`
  ADD CONSTRAINT `FK_B630E8D565F0F7AF` FOREIGN KEY (`part_four_id`) REFERENCES `part_four` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B630E8D57B5CFC7C` FOREIGN KEY (`movable_heritage_id`) REFERENCES `movable_heritage` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `part_one`
--
ALTER TABLE `part_one`
  ADD CONSTRAINT `FK_B848A37A6BF700BD` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `FK_B848A37A73484933` FOREIGN KEY (`objective_id`) REFERENCES `objective` (`id`),
  ADD CONSTRAINT `FK_B848A37A7584E372` FOREIGN KEY (`intelligence_id`) REFERENCES `intelligence` (`id`),
  ADD CONSTRAINT `FK_B848A37A7B3C8E45` FOREIGN KEY (`pro_status_id`) REFERENCES `pro_status` (`id`),
  ADD CONSTRAINT `FK_B848A37A7FFEC9A3` FOREIGN KEY (`maried_id`) REFERENCES `maried` (`id`),
  ADD CONSTRAINT `FK_B848A37A8AFB327A` FOREIGN KEY (`share_in_company_id`) REFERENCES `share_in_compagny` (`id`);

--
-- Contraintes pour la table `part_one_children`
--
ALTER TABLE `part_one_children`
  ADD CONSTRAINT `FK_4F65F7F83D3D2749` FOREIGN KEY (`children_id`) REFERENCES `children` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4F65F7F8C20A0E86` FOREIGN KEY (`part_one_id`) REFERENCES `part_one` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `part_seven_documents`
--
ALTER TABLE `part_seven_documents`
  ADD CONSTRAINT `FK_5A718CF55F0F2752` FOREIGN KEY (`documents_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5A718CF5C77125D4` FOREIGN KEY (`part_seven_id`) REFERENCES `part_seven` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `part_six`
--
ALTER TABLE `part_six`
  ADD CONSTRAINT `FK_8133037045E92F38` FOREIGN KEY (`health_needs_id`) REFERENCES `health_needs` (`id`),
  ADD CONSTRAINT `FK_813303706F76B9E5` FOREIGN KEY (`family_needs_id`) REFERENCES `family_needs` (`id`);

--
-- Contraintes pour la table `part_six_recommendation`
--
ALTER TABLE `part_six_recommendation`
  ADD CONSTRAINT `FK_A4A72444A64D9F34` FOREIGN KEY (`part_six_id`) REFERENCES `part_six` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A4A72444D173940B` FOREIGN KEY (`recommendation_id`) REFERENCES `recommendation` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `part_three_credit_leasing`
--
ALTER TABLE `part_three_credit_leasing`
  ADD CONSTRAINT `FK_AD5E0BE43A14DD68` FOREIGN KEY (`credit_leasing_id`) REFERENCES `credit_leasing` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_AD5E0BE4E0F3881A` FOREIGN KEY (`part_three_id`) REFERENCES `part_three` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `part_three_patrimony`
--
ALTER TABLE `part_three_patrimony`
  ADD CONSTRAINT `FK_AFC67A0C9A60D1F0` FOREIGN KEY (`patrimony_id`) REFERENCES `patrimony` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_AFC67A0CE0F3881A` FOREIGN KEY (`part_three_id`) REFERENCES `part_three` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `part_two`
--
ALTER TABLE `part_two`
  ADD CONSTRAINT `FK_D3EEAFED7F8E4905` FOREIGN KEY (`savings_plan_id`) REFERENCES `savings_plan` (`id`),
  ADD CONSTRAINT `FK_D3EEAFED81CAE112` FOREIGN KEY (`collective_foresight_id`) REFERENCES `collective_foresight` (`id`),
  ADD CONSTRAINT `FK_D3EEAFED97F4F26A` FOREIGN KEY (`collective_retirement_id`) REFERENCES `collective_retirement` (`id`),
  ADD CONSTRAINT `FK_D3EEAFEDB0FDF16E` FOREIGN KEY (`salary_id`) REFERENCES `salary` (`id`),
  ADD CONSTRAINT `FK_D3EEAFEDCDFF215A` FOREIGN KEY (`evolution_id`) REFERENCES `evolution` (`id`);

--
-- Contraintes pour la table `part_two_future_income`
--
ALTER TABLE `part_two_future_income`
  ADD CONSTRAINT `FK_4AC070CCA956E949` FOREIGN KEY (`part_two_id`) REFERENCES `part_two` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4AC070CCC4420662` FOREIGN KEY (`future_income_id`) REFERENCES `future_income` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `part_two_guarantee`
--
ALTER TABLE `part_two_guarantee`
  ADD CONSTRAINT `FK_E07DDCB2A956E949` FOREIGN KEY (`part_two_id`) REFERENCES `part_two` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_E07DDCB2DB4B0220` FOREIGN KEY (`guarantee_id`) REFERENCES `guarantee` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `part_two_total_annual_income`
--
ALTER TABLE `part_two_total_annual_income`
  ADD CONSTRAINT `FK_B9EAAD0F81AC812C` FOREIGN KEY (`total_annual_income_id`) REFERENCES `total_annual_income` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B9EAAD0FA956E949` FOREIGN KEY (`part_two_id`) REFERENCES `part_two` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `patrimony`
--
ALTER TABLE `patrimony`
  ADD CONSTRAINT `FK_986416E23DA10740` FOREIGN KEY (`patrimony_label_id`) REFERENCES `patrimony_label` (`id`);

--
-- Contraintes pour la table `total_annual_income`
--
ALTER TABLE `total_annual_income`
  ADD CONSTRAINT `FK_3BB45A54B0FDF16E` FOREIGN KEY (`salary_id`) REFERENCES `salary` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6496BF700BD` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `FK_8D93D649708A0E0` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `FK_8D93D649F5B7AF75` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
