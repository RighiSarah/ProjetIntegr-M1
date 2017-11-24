-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Sam 18 Novembre 2017 à 21:55
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `CHIFAA`
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
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `Identifiant` varchar(50) NOT NULL,
  `NumCompte` varchar(255) DEFAULT NULL,
  `Banque` varchar(255) DEFAULT NULL,
  `identpers` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE `etablissement` (
  `Identifiant` varchar(50) NOT NULL,
  `Appelation` varchar(50) DEFAULT NULL,
  `Presentation` varchar(3000) DEFAULT NULL,
  `Logo` blob,
  `Slogan` varchar(255) DEFAULT NULL,
  `Nature` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etab_act`
--

CREATE TABLE `etab_act` (
  `idenetab` varchar(50) DEFAULT NULL,
  `identact` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etab_pers`
--

CREATE TABLE `etab_pers` (
  `identetab` varchar(50) DEFAULT NULL,
  `identpers` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etab_val`
--

CREATE TABLE `etab_val` (
  `identetab` varchar(50) DEFAULT NULL,
  `identval` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evennements`
--

CREATE TABLE `evennements` (
  `identifiant` int(50) NOT NULL,
  `Titre` varchar(1000) NOT NULL,
  `Date` date NOT NULL,
  `Heure` time NOT NULL,
  `Objectif` varchar(1000) NOT NULL,
  `Lieu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `identifiant` varchar(50) NOT NULL,
  `Typeop` varchar(255) DEFAULT NULL,
  `Montant` float(255,0) DEFAULT NULL,
  `identpers` varchar(50) DEFAULT NULL
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
  `Partage` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Structure de la table `pers_ev_prop`
--

CREATE TABLE `pers_ev_prop` (
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
  `Commentaire` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pers_pub_prop`
--

CREATE TABLE `pers_pub_prop` (
  `identpers` varchar(50) DEFAULT NULL,
  `identpub` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pers_role`
--

CREATE TABLE `pers_role` (
  `ident_pers` varchar(50) NOT NULL,
  `ident_role` varchar(50) NOT NULL
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
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `Identifiant` varchar(50) NOT NULL,
  `Designation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `valeurs`
--

CREATE TABLE `valeurs` (
  `Identifiant` varchar(50) NOT NULL,
  `Valeur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`Identifiant`);

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`Identifiant`),
  ADD KEY `pers9` (`identpers`);

--
-- Index pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`Identifiant`);

--
-- Index pour la table `etab_act`
--
ALTER TABLE `etab_act`
  ADD KEY `etab3` (`idenetab`),
  ADD KEY `act` (`identact`);

--
-- Index pour la table `etab_pers`
--
ALTER TABLE `etab_pers`
  ADD KEY `etab1` (`identetab`),
  ADD KEY `pers7` (`identpers`);

--
-- Index pour la table `etab_val`
--
ALTER TABLE `etab_val`
  ADD KEY `val` (`identval`),
  ADD KEY `etb` (`identetab`);

--
-- Index pour la table `evennements`
--
ALTER TABLE `evennements`
  ADD PRIMARY KEY (`identifiant`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`identifiant`),
  ADD KEY `pers8` (`identpers`);

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
-- Index pour la table `pers_ev_prop`
--
ALTER TABLE `pers_ev_prop`
  ADD KEY `pers6` (`identpers`),
  ADD KEY `ev3` (`identev`);

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
-- Index pour la table `pers_role`
--
ALTER TABLE `pers_role`
  ADD PRIMARY KEY (`ident_pers`,`ident_role`),
  ADD KEY `role` (`ident_role`);

--
-- Index pour la table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`identifiant`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Identifiant`),
  ADD KEY `role1` (`Identifiant`);

--
-- Index pour la table `valeurs`
--
ALTER TABLE `valeurs`
  ADD PRIMARY KEY (`Identifiant`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `evennements`
--
ALTER TABLE `evennements`
  MODIFY `identifiant` int(50) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD CONSTRAINT `pers9` FOREIGN KEY (`identpers`) REFERENCES `personnes` (`Identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `etab_act`
--
ALTER TABLE `etab_act`
  ADD CONSTRAINT `act` FOREIGN KEY (`identact`) REFERENCES `actions` (`Identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `etab3` FOREIGN KEY (`idenetab`) REFERENCES `etablissement` (`Identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `etab_pers`
--
ALTER TABLE `etab_pers`
  ADD CONSTRAINT `etab1` FOREIGN KEY (`identetab`) REFERENCES `etablissement` (`Identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pers7` FOREIGN KEY (`identpers`) REFERENCES `personnes` (`Identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `etab_val`
--
ALTER TABLE `etab_val`
  ADD CONSTRAINT `etb` FOREIGN KEY (`identetab`) REFERENCES `etablissement` (`Identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `val` FOREIGN KEY (`identval`) REFERENCES `valeurs` (`Identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `pers8` FOREIGN KEY (`identpers`) REFERENCES `personnes` (`Identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pers_ev_part`
--
ALTER TABLE `pers_ev_part`
  ADD CONSTRAINT `pers5` FOREIGN KEY (`identpers`) REFERENCES `personnes` (`Identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pers_ev_part_ibfk_1` FOREIGN KEY (`identev`) REFERENCES `evennements` (`identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pers_ev_prop`
--
ALTER TABLE `pers_ev_prop`
  ADD CONSTRAINT `ev3` FOREIGN KEY (`identev`) REFERENCES `evennements` (`identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pers6` FOREIGN KEY (`identpers`) REFERENCES `personnes` (`Identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pers_pub_com`
--
ALTER TABLE `pers_pub_com`
  ADD CONSTRAINT `pers2` FOREIGN KEY (`identpers`) REFERENCES `personnes` (`Identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pub1` FOREIGN KEY (`identpub`) REFERENCES `publications` (`identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pers_pub_prop`
--
ALTER TABLE `pers_pub_prop`
  ADD CONSTRAINT `pers3` FOREIGN KEY (`identpers`) REFERENCES `personnes` (`Identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pub2` FOREIGN KEY (`identpub`) REFERENCES `publications` (`identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pers_role`
--
ALTER TABLE `pers_role`
  ADD CONSTRAINT `personne` FOREIGN KEY (`ident_pers`) REFERENCES `personnes` (`Identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `role` FOREIGN KEY (`ident_role`) REFERENCES `roles` (`Identifiant`) ON DELETE NO ACTION ON UPDATE NO ACTION;
