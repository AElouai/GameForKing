-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 10 Avril 2015 à 00:47
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
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `battles`
--

CREATE TABLE IF NOT EXISTS `battles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idQueue1` int(11) NOT NULL,
  `idQueue2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quetionId` int(11) NOT NULL,
  `queue1Answer` int(11) NOT NULL,
  `queue2Answer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `quetionoptions`
--

CREATE TABLE IF NOT EXISTS `quetionoptions` (
  `id` int(11) NOT NULL,
  `idQuestion` int(11) NOT NULL,
  `answer` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  UNIQUE KEY `answer` (`answer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `quetionrelated`
--

CREATE TABLE IF NOT EXISTS `quetionrelated` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idQuestion` int(11) NOT NULL,
  `idSubject` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `queue`
--

CREATE TABLE IF NOT EXISTS `queue` (
  `userId` int(11) NOT NULL,
  `queueDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `random` tinyint(1) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Contenu de la table `queue`
--

INSERT INTO `queue` (`userId`, `queueDate`, `random`) VALUES
(12, '2015-04-09 13:53:00', 0),
(15, '2015-04-08 23:42:14', 1);

-- --------------------------------------------------------

--
-- Structure de la table `queuedetail`
--

CREATE TABLE IF NOT EXISTS `queuedetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idQueue` int(11) NOT NULL,
  `idSubject` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=48 ;

--
-- Contenu de la table `queuedetail`
--

INSERT INTO `queuedetail` (`id`, `idQueue`, `idSubject`) VALUES
(1, 1, 0),
(2, 2, 14),
(3, 2, 15),
(4, 3, 14),
(5, 3, 159),
(6, 3, 13),
(7, 3, 14),
(8, 3, 15),
(9, 4, 14),
(10, 4, 159),
(11, 4, 13),
(12, 4, 14),
(13, 4, 15),
(14, 5, 1),
(15, 5, 3),
(16, 5, 4),
(17, 5, 8),
(18, 5, 9),
(19, 5, 10),
(20, 6, 1),
(21, 6, 3),
(22, 6, 4),
(23, 6, 8),
(24, 6, 9),
(25, 6, 10),
(26, 7, 1),
(27, 7, 3),
(28, 7, 4),
(29, 7, 8),
(30, 7, 9),
(31, 7, 10),
(32, 8, 1),
(33, 8, 3),
(34, 8, 4),
(35, 8, 8),
(36, 8, 9),
(37, 8, 10),
(38, 9, 1),
(39, 9, 3),
(40, 9, 4),
(41, 9, 8),
(42, 9, 9),
(43, 9, 10),
(44, 10, 0),
(45, 11, 1),
(46, 11, 6),
(47, 11, 14);

-- --------------------------------------------------------

--
-- Structure de la table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categorie` (`label`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

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
  `firstName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `Fuid` bigint(20) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `login` varchar(25) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `total_score` int(11) DEFAULT NULL,
  `creation_date` date NOT NULL,
  `week_score` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `Fuid`, `email`, `login`, `password`, `total_score`, `creation_date`, `week_score`) VALUES
(1, 'amine', 'hakkou', 9, 'q4g@hotmail.fr', 'test', '889427e907dbb18fc2016ebae8ddfeaf', 54654, '2015-03-11', 55465),
(12, NULL, NULL, NULL, 'happy', NULL, 'c2e7f00efaf0222b9856c1b10e45371e', NULL, '0000-00-00', NULL),
(14, NULL, NULL, NULL, 'happy-ali@live.fr', NULL, 'c320386f8abf01869bf60345e6c2ad30', NULL, '0000-00-00', NULL),
(15, NULL, NULL, NULL, 'ali.elouai.pro@gmail.com', NULL, '131c4d1d50214b6d1cabe5e142b70db9', NULL, '0000-00-00', NULL),
(16, 'amine2', 'hakkou2', 9, 'q5g@hotmail.fr', 'test2', '889427e907dbb18fc2016ebae8ddfeaf', 546, '2015-03-11', 554);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
