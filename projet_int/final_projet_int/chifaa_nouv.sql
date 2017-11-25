-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Ven 24 Novembre 2017 à 23:23
-- Version du serveur :  5.6.35
-- Version de PHP :  7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `chifaa_nouv`
--

-- --------------------------------------------------------

--
-- Structure de la table `actions`
--

CREATE TABLE `actions` (
  `Identifiant` varchar(50) NOT NULL,
  `Action` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `identifiant` int(50) NOT NULL,
  `Titre` varchar(1000) NOT NULL,
  `Date` date DEFAULT NULL,
  `Heure` time DEFAULT NULL,
  `Objectif` varchar(1000) DEFAULT NULL,
  `Lieu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `evenements`
--

INSERT INTO `evenements` (`identifiant`, `Titre`, `Date`, `Heure`, `Objectif`, `Lieu`) VALUES
(4, 'Evenement test 3', '2017-11-26', '12:43:00', 'Ceci est un test pour les événements', 'Lyon'),
(5, 'Evenement test azerty', '2017-11-22', '12:09:00', 'Ceci est un test pour les événements bla bla ', 'Paris'),
(6, 'evenement should be like this', '2017-11-24', '12:09:00', 'Ceci est un test pour modifier les événements ', 'Paris');

-- --------------------------------------------------------

--
-- Structure de la table `partenaires`
--

CREATE TABLE `partenaires` (
  `Identifiant` varchar(50) NOT NULL,
  `Logo` blob,
  `lien` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `Identifiant` varchar(50) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `Telephone` varchar(255) DEFAULT NULL,
  `Mail` varchar(255) DEFAULT NULL,
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
('nana@gmail.com', 'nana', 'chifaa', '012345678', 'nana@gmail.com', 'itsasecret', 'Lyon 3', 0, 1, 1),
('tutu@gmail.com', 'tutu', 'tutu', '098765432', 'tutu@gmail.com', 'tutu', 'Lyon 8', 1, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `pers_ev_part`
--

CREATE TABLE `pers_ev_part` (
  `identpers` varchar(50) DEFAULT NULL,
  `identev` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pers_pub_com`
--

CREATE TABLE `pers_pub_com` (
  `identpers` varchar(50) DEFAULT NULL,
  `identpub` varchar(50) DEFAULT NULL,
  `Commentaire` varchar(1000) NOT NULL,
  `Valider` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pers_pub_prop`
--

CREATE TABLE `pers_pub_prop` (
  `identpers` varchar(50) DEFAULT NULL,
  `identpub` varchar(50) DEFAULT NULL,
  `Valider` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `presentation`
--

CREATE TABLE `presentation` (
  `Identifiant` varchar(50) NOT NULL,
  `texte` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `principes`
--

CREATE TABLE `principes` (
  `Identifiant` varchar(50) NOT NULL,
  `principe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

CREATE TABLE `publications` (
  `identifiant` varchar(255) NOT NULL,
  `Nature` varchar(255) DEFAULT NULL,
  `Lien` varchar(50) DEFAULT NULL,
  `Description` varchar(2000) DEFAULT NULL,
  `Etat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `valeurs`
--

CREATE TABLE `valeurs` (
  `Identifiant` varchar(50) NOT NULL,
  `Valeur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `visites`
--

CREATE TABLE `visites` (
  `identpers` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `lien` varchar(50) DEFAULT NULL,
  `lieu` varchar(50) DEFAULT NULL,
  `valide` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `visites`
--

INSERT INTO `visites` (`identpers`, `nom`, `prenom`, `email`, `lien`, `lieu`, `valide`) VALUES
('nina@gmail.com', 'nina', 'provost', 'nina@gmail.com', 'Famille', 'Établissement de santé', 0),
('kyle@gmail.com', 'kyle', 'earp', 'kyle@gmail.com', 'Autre', 'À domicile', 0),
('simon@gmail.com', 'Simon', 'provost', 'simon@gmail.com', 'Ami', 'À domicile', 0);
-- --------------------------------------------------------

--
-- Structure de la table `sujets forum`
--
CREATE TABLE forum_sujets (
  id int(6) NOT NULL auto_increment,
  auteur VARCHAR(30) NOT NULL,
  titre text NOT NULL,
  date_derniere_reponse datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Structure de la table `reponses forum`
--
CREATE TABLE forum_reponses (
  id int(6) NOT NULL auto_increment,
  auteur VARCHAR(30) NOT NULL,
  message text NOT NULL,
  date_reponse datetime NOT NULL default '0000-00-00 00:00:00',
  correspondance_sujet int(6) NOT NULL,
  PRIMARY KEY  (id)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Index pour les tables exportées
--

--
-- Index pour la table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`Identifiant`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`identifiant`);

--
-- Index pour la table `partenaires`
--
ALTER TABLE `partenaires`
  ADD PRIMARY KEY (`Identifiant`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`Identifiant`),
  ADD UNIQUE KEY `pers1` (`Identifiant`);

--
-- Index pour la table `pers_ev_part`
--
ALTER TABLE `pers_ev_part`
  ADD KEY `pers5` (`identpers`),
  ADD KEY `identev` (`identev`);

--
-- Index pour la table `pers_pub_com`
--
ALTER TABLE `pers_pub_com`
  ADD KEY `pers2` (`identpers`),
  ADD KEY `pub1` (`identpub`);

--
-- Index pour la table `pers_pub_prop`
--
ALTER TABLE `pers_pub_prop`
  ADD KEY `pers3` (`identpers`),
  ADD KEY `pub2` (`identpub`);

--
-- Index pour la table `presentation`
--
ALTER TABLE `presentation`
  ADD PRIMARY KEY (`Identifiant`);

--
-- Index pour la table `principes`
--
ALTER TABLE `principes`
  ADD PRIMARY KEY (`Identifiant`);

--
-- Index pour la table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`identifiant`);

--
-- Index pour la table `valeurs`
--
ALTER TABLE `valeurs`
  ADD PRIMARY KEY (`Identifiant`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `identifiant` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `pers_ev_part`
--
ALTER TABLE `pers_ev_part`
  MODIFY `identev` int(50) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `pers_ev_part`
--
ALTER TABLE `pers_ev_part`
  ADD CONSTRAINT `pers_ev_part_ibfk_1` FOREIGN KEY (`identpers`) REFERENCES `personnes` (`Identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pers_ev_part_ibfk_2` FOREIGN KEY (`identev`) REFERENCES `evenements` (`identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pers_pub_com`
--
ALTER TABLE `pers_pub_com`
  ADD CONSTRAINT `pers_pub_com_ibfk_1` FOREIGN KEY (`identpers`) REFERENCES `personnes` (`Identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pers_pub_com_ibfk_2` FOREIGN KEY (`identpub`) REFERENCES `publications` (`identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pers_pub_prop`
--
ALTER TABLE `pers_pub_prop`
  ADD CONSTRAINT `pers_pub_prop_ibfk_1` FOREIGN KEY (`identpub`) REFERENCES `publications` (`identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pers_pub_prop_ibfk_2` FOREIGN KEY (`identpers`) REFERENCES `personnes` (`Identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION;
