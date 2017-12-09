-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Sam 09 Décembre 2017 à 12:18
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `evenements`
--

INSERT INTO `evenements` (`identifiant`, `Titre`, `Date`, `Heure`, `Objectif`, `Lieu`) VALUES
(12, 'Gala de charitÃ© ', '2017-12-28', '20:00:00', 'Afin de rÃ©colter des fonds pour notre association, nous organisons un gala de charitÃ©. Partagez l''information avec vos amis ! ', 'Vieux Lyon');

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `forum_reponses`
--

INSERT INTO `forum_reponses` (`id`, `auteur`, `message`, `date_reponse`, `correspondance_sujet`) VALUES
(27, 'Durand Marie', 'Bonjour, j''aimerais prévoir une visite mais je ne sais pas comment faire ? ', '2017-11-28 11:15:44', 19),
(28, 'Dupont Jacques', 'Salut Marie, il suffit que tu te rendes sur la page "Prévoir une visite", onglet "Nous aider" ou bien tu peux directement te rendre sur la page d''accueil et clier sur le bouton central (vert) prévoir une visite ! :) ', '2017-11-28 11:17:31', 19),
(29, 'Dupont Jacques', 'Bonjour, un ami aimerait devenir bénévole de l''association, puis-je valider son inscription ? ', '2017-11-28 11:19:00', 20),
(30, 'Benzouak Nadia', 'Bonjour Jacques, seule l''administratrice du site peut valider les demandes d''inscription. Ton ami peut faire une demande d''inscription et je me chargerai de le contacter avant de valider son inscription. Il pourra alors se connecter et accéder à son espace membre !', '2017-11-28 11:20:47', 20),
(31, 'Benzouak Nadia', 'merci', '2017-11-28 14:35:22', 20);

-- --------------------------------------------------------

--
-- Structure de la table `forum_sujets`
--

CREATE TABLE `forum_sujets` (
  `id` int(6) NOT NULL,
  `auteur` varchar(30) NOT NULL,
  `titre` text NOT NULL,
  `date_derniere_reponse` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `forum_sujets`
--

INSERT INTO `forum_sujets` (`id`, `auteur`, `titre`, `date_derniere_reponse`) VALUES
(19, 'Durand Marie', 'Comment prévoir une visite ? ', '2017-11-28 11:15:44'),
(20, 'Dupont Jacques', 'Peut-on inscrire un membre ? ', '2017-11-28 11:19:00');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `identifiant` int(10) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `sujet` text NOT NULL,
  `mess` text NOT NULL,
  `repond` varchar(20) DEFAULT 'En attente'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`identifiant`, `nom`, `prenom`, `mail`, `date`, `sujet`, `mess`, `repond`) VALUES
(4, 'Reiss', 'ValÃ©rie', 'valerie.reiss@gmail.com', '2017-12-07', 'Devenir bÃ©nÃ©vole', 'Bonjour j''aimerais devenir bÃ©nÃ©vole ! ', 'En attente');

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
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `identifiant` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `lieu` varchar(20) NOT NULL,
  `adresse` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `patient`
--

INSERT INTO `patient` (`identifiant`, `nom`, `prenom`, `lieu`, `adresse`) VALUES
(1, 'Saguey', 'Danielle', 'Ã€ domicile', '12 avenue Jean JaurÃ¨s 69007 Lyon'),
(3, 'Frejusse', 'Robert', 'Ã‰tablissement de sa', '36 rue Albert Montblanc');

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
  `benevole` int(11) NOT NULL DEFAULT '0',
  `xp_benevole` text,
  `Role` int(2) DEFAULT '0',
  `valide` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personnes`
--

INSERT INTO `personnes` (`Identifiant`, `Nom`, `Prenom`, `Telephone`, `Mail`, `passwrd`, `Adresse`, `Partage`, `benevole`, `xp_benevole`, `Role`, `valide`) VALUES
('johnsmith@yahoo.fr', 'Smith', 'John', '09876543', 'johnsmith@yahoo.fr', 'john', 'Lyon', 0, 0, '', 0, 1),
('mariedurand@hotmail.fr', 'Durand', 'Marie', '0678435218', 'mariedurand@hotmail.fr', 'marie', 'Parilly', 1, 1, 'Dans une Ã©picerie ! ', 0, 1),
('nadia.benzouak@orange.fr', 'Benzouak', 'Nadia', '0615748937', 'nadia.benzouak@orange.fr', 'itsasecret', 'Lyon', 1, 0, '', 1, 1);

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
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`identifiant`);

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
  MODIFY `identifiant` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `forum_reponses`
--
ALTER TABLE `forum_reponses`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `forum_sujets`
--
ALTER TABLE `forum_sujets`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `identifiant` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `identifiant` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
