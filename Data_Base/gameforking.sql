-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 12 Avril 2015 à 15:24
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Structure de la table `battles`
--

CREATE TABLE IF NOT EXISTS `battles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPlayer1` int(11) NOT NULL,
  `idPlayer2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=5 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=16 ;

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
-- Structure de la table `quetionoptions`
--

CREATE TABLE IF NOT EXISTS `quetionoptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idQuestion` int(11) NOT NULL,
  `answer` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `answer` (`answer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `quetionoptions`
--

INSERT INTO `quetionoptions` (`id`, `idQuestion`, `answer`) VALUES
(1, 1, '1'),
(2, 2, '2'),
(3, 3, '0'),
(4, 4, '3'),
(5, 5, '9');

-- --------------------------------------------------------

--
-- Structure de la table `quetionrelated`
--

CREATE TABLE IF NOT EXISTS `quetionrelated` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idQuestion` int(11) NOT NULL,
  `idSubject` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `quetionrelated`
--

INSERT INTO `quetionrelated` (`id`, `idQuestion`, `idSubject`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `queue`
--

CREATE TABLE IF NOT EXISTS `queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `queueDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Structure de la table `queuedetail`
--

CREATE TABLE IF NOT EXISTS `queuedetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idQueue` int(11) NOT NULL,
  `idSubject` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=53 ;

--
-- Contenu de la table `queuedetail`
--

INSERT INTO `queuedetail` (`id`, `idQueue`, `idSubject`) VALUES
(51, 7, 1),
(52, 8, 1);

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
  `firstName` varchar(20) DEFAULT 'herp',
  `lastName` varchar(20) DEFAULT 'derp',
  `Fuid` bigint(20) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `login` varchar(25) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `creation_date` date NOT NULL,
  `isPlaying` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `Fuid`, `email`, `login`, `password`, `score`, `creation_date`, `isPlaying`) VALUES
(1, 'amine', 'hakkou', 9, 'q4g@hotmail.fr', 'test', '889427e907dbb18fc2016ebae8ddfeaf', 54654, '2015-03-11', 1),
(12, NULL, NULL, NULL, 'happy', NULL, 'c2e7f00efaf0222b9856c1b10e45371e', 0, '0000-00-00', 0),
(14, NULL, NULL, NULL, 'happy-ali@live.fr', NULL, 'c320386f8abf01869bf60345e6c2ad30', 0, '0000-00-00', 0),
(15, NULL, NULL, NULL, 'ali.elouai.pro@gmail.com', NULL, '131c4d1d50214b6d1cabe5e142b70db9', 0, '0000-00-00', 0),
(16, 'amine2', 'hakkou2', 9, 'q5g@hotmail.fr', 'test2', '889427e907dbb18fc2016ebae8ddfeaf', 546, '2015-03-11', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
