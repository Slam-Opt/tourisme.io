-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: 127.0.0.1
-- Généré le : Lun 14 Novembre 2022 à 17:51
-- Version du serveur: 5.5.10
-- Version de PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `tourisme`
--

-- --------------------------------------------------------

--
-- Structure de la table `organisme`
--

CREATE TABLE IF NOT EXISTS `organisme` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `raison_sociale` char(25) NOT NULL,
  `etoile` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `prix` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `type_user` char(15) NOT NULL,
  `login_user` varchar(30) NOT NULL,
  `pwd_user` varchar(30) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `organisme`
--

INSERT INTO `organisme` (`code`, `raison_sociale`, `etoile`, `adresse`, `email`, `tel`, `prix`, `logo`, `ville`, `type_user`, `login_user`, `pwd_user`) VALUES
(1, 'BNP Paribas', '4', '8, rue de Vilgénis', 'bnp@email.com', '0203040506', '3000', 'Koala.jpg', 'Vilgénis', 'Entreprise', 'bnp@email.com', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `code_user` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `typeprofil` varchar(20) NOT NULL,
  PRIMARY KEY (`code_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`code_user`, `login`, `password`, `typeprofil`) VALUES
(1, 'test', 'test', '');
