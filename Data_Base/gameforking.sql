-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 08 Avril 2015 à 23:32
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

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
-- Structure de la table `battle`
--

CREATE TABLE IF NOT EXISTS `battle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `player1` int(11) NOT NULL,
  `player2` int(11) NOT NULL,
  `winner` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(20) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `false_answer`
--

CREATE TABLE IF NOT EXISTS `false_answer` (
  `id_false` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_question` int(11) NOT NULL,
  PRIMARY KEY (`id_false`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
  `id_grade` int(11) NOT NULL AUTO_INCREMENT,
  `grade` varchar(40) NOT NULL,
  PRIMARY KEY (`id_grade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `king`
--

CREATE TABLE IF NOT EXISTS `king` (
  `king_score` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `prince`
--

CREATE TABLE IF NOT EXISTS `prince` (
  `score_prince` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id_question` bigint(20) NOT NULL AUTO_INCREMENT,
  `question` varchar(100) NOT NULL,
  `answer` varchar(60) NOT NULL,
  `tag` int(11) NOT NULL,
  PRIMARY KEY (`id_question`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `queue`
--

CREATE TABLE IF NOT EXISTS `queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `queueDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `queue`
--

INSERT INTO `queue` (`id`, `userId`, `queueDate`) VALUES
(5, 15, '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `queuedetail`
--

CREATE TABLE IF NOT EXISTS `queuedetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idQueue` int(11) NOT NULL,
  `idSubject` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=20 ;

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
(19, 5, 10);

-- --------------------------------------------------------

--
-- Structure de la table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(25) COLLATE utf16_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `Fuid`, `email`, `login`, `password`, `total_score`, `creation_date`, `week_score`) VALUES
(1, 'amine', 'hakkou', 9, 'q4g@hotmail.fr', 'test', '889427e907dbb18fc2016ebae8ddfeaf', 54654, '2015-03-11', 55465),
(12, NULL, NULL, NULL, 'happy', NULL, 'c2e7f00efaf0222b9856c1b10e45371e', NULL, '0000-00-00', NULL),
(14, NULL, NULL, NULL, 'happy-ali@live.fr', NULL, 'c320386f8abf01869bf60345e6c2ad30', NULL, '0000-00-00', NULL),
(15, NULL, NULL, NULL, 'ali.elouai.pro@gmail.com', NULL, '131c4d1d50214b6d1cabe5e142b70db9', NULL, '0000-00-00', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
