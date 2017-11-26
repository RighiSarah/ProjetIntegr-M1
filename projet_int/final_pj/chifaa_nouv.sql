-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Dim 26 Novembre 2017 à 17:32
-- Version du serveur :  5.6.35
-- Version de PHP :  7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `chifaa_nouv_2`
--

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `Identifiant` varchar(50) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `Telephone` varchar(255) DEFAULT NULL,
  `Mail` varchar(255) NOT NULL,
  `passwrd` varchar(20) NOT NULL,
  `Adresse` varchar(255) DEFAULT NULL,
  `Partage` int(255) DEFAULT NULL,
  `Role` int(2) DEFAULT NULL,
  `valide` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personnes`
--

INSERT INTO `personnes` (`Identifiant`, `Nom`, `Prenom`, `Telephone`, `Mail`, `passwrd`, `Adresse`, `Partage`, `Role`, `valide`) VALUES
('doo_daa@gmail.com', 'Doo', 'Daa', '0659483942', 'doo_daa@gmail.com', 'azerty', 'Bron', 1, 0, 1),
('nana@gmail.com', 'nana', 'chifaa', '012345678', 'nana@gmail.com', 'itsasecret', 'Lyon 3', 0, 1, 1),
('titi@gmail.com', 'titi', 'titi', '0343462642', 'titi@gmail.com', 'titi', 'Lyon', 0, NULL, 0),
('tutu@gmail.com', 'tutu', 'tutu', '098765432', 'tutu@gmail.com', 'tutu', 'Lyon 8', 1, 0, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`Identifiant`),
  ADD UNIQUE KEY `pers1` (`Identifiant`);
