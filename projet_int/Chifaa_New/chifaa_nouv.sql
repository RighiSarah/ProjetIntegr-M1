-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Ven 08 Décembre 2017 à 17:50
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `chifaa_nouv`
--

-- --------------------------------------------------------

--
-- Structure de la table `visites`
--

CREATE TABLE `visites` (
  `identpers` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `lien` varchar(50) DEFAULT NULL,
  `lien_autre` varchar(20) DEFAULT NULL,
  `lieu` varchar(50) DEFAULT NULL,
  `valide` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `visites`
--

INSERT INTO `visites` (`identpers`, `nom`, `prenom`, `telephone`, `email`, `lien`, `lien_autre`, `lieu`, `valide`) VALUES
('nina@gmail.com', 'nina', 'provost', '', 'nina@gmail.com', 'Famille', '', 'Établissement de santé', 1),
('kyle@gmail.com', 'kyle', 'earp', '', 'kyle@gmail.com', 'Autre', '', 'À domicile', 1),
('simon@gmail.com', 'Simon', 'provost', '', 'simon@gmail.com', 'Ami', '', 'À domicile', 1),
('doodaa@gmail.com', 'Doo', 'daa', '', 'doodaa@gmail.com', 'Ami', '', 'À domicile', 1),
('manonsaguey@gmail.com', 'Saguey', 'Manon', '', 'manonsaguey@gmail.com', 'Famille', '', 'Ã‰tablissement de santÃ©', 1),
('manonsaguey@gmail.com', 'Manon', 'Saguey', '', 'manonsaguey@gmail.com', 'Famille', '', 'Ã‰tablissement de santÃ©', 1),
('manonsaguey@gmail.com', 'Saguey', 'Manon', '', 'manonsaguey@gmail.com', 'Ami', '', 'Ã€ domicile', 1),
('nadia.benzouak@orange.fr', 'benzouak', 'nadia', '', 'nadia.benzouak@orange.fr', 'Famille', '', 'Ã€ domicile', 1);
