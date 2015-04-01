-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 01 Avril 2015 à 17:39
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `game`
--

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
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` bigint(11) NOT NULL AUTO_INCREMENT,
  `Fuid` bigint(20) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(25) DEFAULT NULL,
  `total_score` int(11) NOT NULL,
  `creation_date` date NOT NULL,
  `week_score` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `Fuid`, `email`, `login`, `password`, `total_score`, `creation_date`, `week_score`) VALUES
(1, 9, 'emai1', 'test', '123', 54654, '2015-03-11', 55465),
(2, 6, 'eklma', 't', 'ghj', 9787, '2015-03-17', 898),
(3, 4, 'email3', 'test3', 'hgjkl', 54654, '2015-03-11', 55465),
(4, 3, 'email4', 'test4', 'ghj', 9787, '2015-03-17', 898),
(5, 12, 'test_face', 'test_login', NULL, 0, '0000-00-00', 0),
(6, 1, 'email', 'tjttjkl', NULL, 0, '0000-00-00', 0),
(7, 14, 'eklma', 't', NULL, 0, '0000-00-00', 0),
(9, 78, 'tetttt', 'doha', NULL, 0, '2015-04-01', 0),
(10, 794080757343065, 'testt', 'Soukaina', NULL, 0, '2015-04-01', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
