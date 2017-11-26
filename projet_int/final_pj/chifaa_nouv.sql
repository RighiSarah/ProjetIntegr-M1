-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Dim 26 Novembre 2017 à 18:24
-- Version du serveur :  5.6.35
-- Version de PHP :  7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `chifaa_nouv_2`
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
(5, 'Evenement test azerty&é\"\'(-è_çà)', '2017-11-22', '12:09:00', 'Ceci est un test pour l\' événement bla bla ', 'Paris\'s');

-- --------------------------------------------------------

--
-- Structure de la table `forum_reponses`
--

CREATE TABLE `forum_reponses` (
  `id` int(6) NOT NULL,
  `auteur` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `date_reponse` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `correspondance_sujet` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `forum_reponses`
--

INSERT INTO `forum_reponses` (`id`, `auteur`, `message`, `date_reponse`, `correspondance_sujet`) VALUES
(1, 'aaaaa', 'aaaaa', '2017-11-26 00:24:18', 1),
(2, 'aaaaa', 'aaaaa', '2017-11-26 00:24:35', 2),
(3, 'vzev', 'zevzev', '2017-11-26 00:25:08', 2),
(4, 'zefzef', 'zefzf', '2017-11-26 00:29:03', 3),
(5, 'efzfz', 'zfzefz', '2017-11-26 00:31:13', 3),
(6, 'sdsdfs', 'qsfsqfq', '2017-11-26 00:38:50', 4),
(7, 'sdsdfs', 'qsfsqfq', '2017-11-26 00:40:02', 5),
(8, 'sdsdfs', 'qsfsqfq', '2017-11-26 00:41:05', 6),
(9, 'rgeg', 'ergeg', '2017-11-26 00:42:36', 7),
(10, 'rgeg', 'ergeg', '2017-11-26 00:45:55', 8),
(11, 'ezvav', 'azvzav', '2017-11-26 00:52:53', 9),
(12, 'ezvav', 'azvzav', '2017-11-26 00:53:26', 10),
(13, 'nana chifaa', 'fze', '2017-11-26 00:57:16', 11),
(14, 'nana chifaa', 'zefzef', '2017-11-26 00:57:54', 12),
(15, 'nana chifaa', 'zgzeg', '2017-11-26 01:09:55', 13),
(16, 'nana chifaa', 'zgzeg', '2017-11-26 01:10:35', 14),
(17, 'nana chifaa', 'zgzeg', '2017-11-26 01:18:37', 15),
(18, 'nana chifaa', 'ezvzvzevzv', '2017-11-26 01:19:33', 15),
(19, 'nana chifaa', 'hgghf', '2017-11-26 16:49:07', 15),
(20, 'tutu tutu', 'jkherdkjh', '2017-11-26 16:55:04', 16),
(21, 'tutu tutu', 'kjhhjjh', '2017-11-26 16:55:28', 16);

-- --------------------------------------------------------

--
-- Structure de la table `forum_sujets`
--

CREATE TABLE `forum_sujets` (
  `id` int(6) NOT NULL,
  `auteur` varchar(30) NOT NULL,
  `titre` text NOT NULL,
  `date_derniere_reponse` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `forum_sujets`
--

INSERT INTO `forum_sujets` (`id`, `auteur`, `titre`, `date_derniere_reponse`) VALUES
(13, 'nana chifaa', 'zgzg', '2017-11-26 01:09:55'),
(14, 'nana chifaa', 'zgzg', '2017-11-26 01:10:35'),
(15, 'nana chifaa', 'zgzg', '2017-11-26 01:18:37'),
(16, 'tutu tutu', 'gggg', '2017-11-26 16:55:04');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `identifiant` int(10) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `sujet` text NOT NULL,
  `mess` text NOT NULL,
  `repond` varchar(20) DEFAULT 'En attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('kyle@gmail.com', 'kyle', 'earp', 'kyle@gmail.com', 'Autre', 'À domicile', 1),
('simon@gmail.com', 'Simon', 'provost', 'simon@gmail.com', 'Ami', 'À domicile', 0),
('doodaa@gmail.com', 'Doo', 'daa', 'doodaa@gmail.com', 'Ami', 'À domicile', 1);

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
-- Index pour la table `forum_reponses`
--
ALTER TABLE `forum_reponses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forum_sujets`
--
ALTER TABLE `forum_sujets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
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
  MODIFY `identifiant` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `forum_reponses`
--
ALTER TABLE `forum_reponses`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `forum_sujets`
--
ALTER TABLE `forum_sujets`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `identifiant` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
