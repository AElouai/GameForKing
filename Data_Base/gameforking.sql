-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 12 Avril 2015 à 20:08
-- Version du serveur :  5.6.16
-- Version de PHP :  5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gameforking`
--

-- --------------------------------------------------------

--
-- Structure de la table `battledetail`
--

CREATE TABLE IF NOT EXISTS `battledetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idBattle` int(11) NOT NULL,
  `idGame` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=41 ;

--
-- Contenu de la table `battledetail`
--

INSERT INTO `battledetail` (`id`, `idBattle`, `idGame`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 2, 6),
(7, 2, 7),
(8, 2, 8),
(9, 2, 9),
(10, 2, 10),
(11, 3, 11),
(12, 3, 12),
(13, 3, 13),
(14, 3, 14),
(15, 3, 15),
(16, 4, 16),
(17, 4, 17),
(18, 4, 18),
(19, 4, 19),
(20, 4, 20),
(21, 5, 21),
(22, 5, 22),
(23, 5, 23),
(24, 5, 24),
(25, 5, 25),
(26, 6, 26),
(27, 6, 27),
(28, 6, 28),
(29, 6, 29),
(30, 6, 30),
(31, 7, 31),
(32, 7, 32),
(33, 7, 33),
(34, 7, 34),
(35, 7, 35),
(36, 8, 36),
(37, 8, 37),
(38, 8, 38),
(39, 8, 39),
(40, 8, 40);

-- --------------------------------------------------------

--
-- Structure de la table `battles`
--

CREATE TABLE IF NOT EXISTS `battles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPlayer1` int(11) NOT NULL,
  `idPlayer2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `battles`
--

INSERT INTO `battles` (`id`, `idPlayer1`, `idPlayer2`) VALUES
(1, 16, 1),
(3, 1, 16),
(4, 1, 16),
(5, 1, 16),
(6, 1, 16),
(7, 16, 1),
(8, 1, 16);

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idQuestion` int(11) NOT NULL,
  `player1Answer` int(11) DEFAULT NULL,
  `player2Answer` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=41 ;

--
-- Contenu de la table `games`
--

INSERT INTO `games` (`id`, `idQuestion`, `player1Answer`, `player2Answer`) VALUES
(1, 2, NULL, NULL),
(2, 5, NULL, NULL),
(3, 3, NULL, NULL),
(4, 4, NULL, NULL),
(5, 1, NULL, NULL),
(6, 5, NULL, NULL),
(7, 4, NULL, NULL),
(8, 2, NULL, NULL),
(9, 3, NULL, NULL),
(10, 1, NULL, NULL),
(11, 4, NULL, NULL),
(12, 3, NULL, NULL),
(13, 1, NULL, NULL),
(14, 2, NULL, NULL),
(15, 5, NULL, NULL),
(16, 4, NULL, NULL),
(17, 3, NULL, NULL),
(18, 1, NULL, NULL),
(19, 5, NULL, NULL),
(20, 2, NULL, NULL),
(21, 2, NULL, NULL),
(22, 5, NULL, NULL),
(23, 3, NULL, NULL),
(24, 4, NULL, NULL),
(25, 1, NULL, NULL),
(26, 3, NULL, NULL),
(27, 1, NULL, NULL),
(28, 4, NULL, NULL),
(29, 5, NULL, NULL),
(30, 2, NULL, NULL),
(31, 3, NULL, NULL),
(32, 4, NULL, NULL),
(33, 2, NULL, NULL),
(34, 1, NULL, NULL),
(35, 5, NULL, NULL),
(36, 4, NULL, NULL),
(37, 5, NULL, NULL),
(38, 2, NULL, NULL),
(39, 1, NULL, NULL),
(40, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `questionoptions`
--

CREATE TABLE IF NOT EXISTS `questionoptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idQuestion` int(11) NOT NULL,
  `answer` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `answer` (`answer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `questionoptions`
--

INSERT INTO `questionoptions` (`id`, `idQuestion`, `answer`) VALUES
(1, 1, '1'),
(2, 2, '2'),
(3, 3, '0'),
(4, 4, '3'),
(5, 5, '9');

-- --------------------------------------------------------

--
-- Structure de la table `questionrelated`
--

CREATE TABLE IF NOT EXISTS `questionrelated` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idQuestion` int(11) NOT NULL,
  `idSubject` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `questionrelated`
--

INSERT INTO `questionrelated` (`id`, `idQuestion`, `idSubject`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf16_unicode_ci NOT NULL,
  `idAnswer` int(11) NOT NULL,
  `idRelated` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id`, `description`, `idAnswer`, `idRelated`) VALUES
(1, '1+1=?', 2, 1),
(2, '2-1=?', 1, 1),
(3, '5-5=?', 3, 1),
(4, '9-6=?', 4, 1),
(5, '9-0=?', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `queue`
--

CREATE TABLE IF NOT EXISTS `queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `queueDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Structure de la table `queuedetail`
--

CREATE TABLE IF NOT EXISTS `queuedetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idQueue` int(11) NOT NULL,
  `idSubject` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=86 ;

-- --------------------------------------------------------

--
-- Structure de la table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(20) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categorie` (`label`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=16 ;

--
-- Contenu de la table `subjects`
--

INSERT INTO `subjects` (`id`, `label`) VALUES
(13, 'art'),
(4, 'biology'),
(3, 'chemistry'),
(15, 'fitness'),
(6, 'geography'),
(5, 'history'),
(8, 'literature'),
(1, 'math'),
(12, 'movies'),
(11, 'music'),
(2, 'physics'),
(14, 'politics'),
(9, 'problems'),
(7, 'religion'),
(10, 'tech');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(20) CHARACTER SET latin1 DEFAULT 'herp',
  `lastName` varchar(20) CHARACTER SET latin1 DEFAULT 'derp',
  `Fuid` bigint(20) DEFAULT NULL,
  `email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `login` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(40) CHARACTER SET latin1 NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `creation_date` date NOT NULL,
  `isPlaying` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=17 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `Fuid`, `email`, `login`, `password`, `score`, `creation_date`, `isPlaying`) VALUES
(1, 'amine', 'hakkou', 9, 'q4g@hotmail.fr', 'test', '889427e907dbb18fc2016ebae8ddfeaf', 54654, '2015-03-11', 0),
(12, NULL, NULL, NULL, 'happy', NULL, 'c2e7f00efaf0222b9856c1b10e45371e', 0, '0000-00-00', 0),
(14, NULL, NULL, NULL, 'happy-ali@live.fr', NULL, 'c320386f8abf01869bf60345e6c2ad30', 0, '0000-00-00', 0),
(15, NULL, NULL, NULL, 'ali.elouai.pro@gmail.com', NULL, '131c4d1d50214b6d1cabe5e142b70db9', 0, '0000-00-00', 0),
(16, 'amine2', 'hakkou2', 9, 'q5g@hotmail.fr', 'test2', '889427e907dbb18fc2016ebae8ddfeaf', 546, '2015-03-11', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
