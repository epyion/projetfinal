-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 18 août 2022 à 13:11
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `anime-project`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

DROP TABLE IF EXISTS `appartenir`;
CREATE TABLE IF NOT EXISTS `appartenir` (
  `id_categorie` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  PRIMARY KEY (`id_categorie`,`id_produit`),
  KEY `Appartenir_produit0_FK` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `appartenir`
--

INSERT INTO `appartenir` (`id_categorie`, `id_produit`) VALUES
(3, 22),
(3, 23);

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

DROP TABLE IF EXISTS `avoir`;
CREATE TABLE IF NOT EXISTS `avoir` (
  `id_entite` int(11) NOT NULL,
  `id_univer` int(11) NOT NULL,
  PRIMARY KEY (`id_entite`,`id_univer`),
  KEY `avoir_univer0_FK` (`id_univer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `avoir`
--

INSERT INTO `avoir` (`id_entite`, `id_univer`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'adulte'),
(2, 'Goodies'),
(3, 'figurine-pop'),
(4, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `entite`
--

DROP TABLE IF EXISTS `entite`;
CREATE TABLE IF NOT EXISTS `entite` (
  `id_entite` int(11) NOT NULL AUTO_INCREMENT,
  `nom_entite` varchar(255) NOT NULL,
  PRIMARY KEY (`id_entite`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entite`
--

INSERT INTO `entite` (`id_entite`, `nom_entite`) VALUES
(1, 'luffy'),
(2, 'Autre'),
(3, 'ichigo');

-- --------------------------------------------------------

--
-- Structure de la table `fournir`
--

DROP TABLE IF EXISTS `fournir`;
CREATE TABLE IF NOT EXISTS `fournir` (
  `id_univer` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id_univer`,`id_categorie`),
  KEY `Fournir_categorie0_FK` (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fournir`
--

INSERT INTO `fournir` (`id_univer`, `id_categorie`) VALUES
(1, 1),
(2, 1),
(1, 2),
(1, 3),
(3, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `possede`
--

DROP TABLE IF EXISTS `possede`;
CREATE TABLE IF NOT EXISTS `possede` (
  `id_role` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_role`,`id_user`),
  KEY `possede_user0_FK` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `possede`
--

INSERT INTO `possede` (`id_role`, `id_user`) VALUES
(2, 7),
(1, 12),
(1, 13),
(1, 14),
(1, 16),
(1, 19),
(1, 21),
(1, 25),
(1, 28),
(1, 29);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(255) NOT NULL,
  `description_produit` varchar(255) NOT NULL,
  `image_produit` varchar(255) NOT NULL,
  `prix_produit` float NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `description_produit`, `image_produit`, `prix_produit`) VALUES
(22, 'Figurine pop Monkey .D Luffy', 'figurine pop de Monkey .D luffy personnage principale de l’œuvre One Piece d\'Eichiiro Oda ', 'img_62ecd4e0d3c52.png', 19),
(23, 'popoo', 'eihgzipurht', 'img_62f101a038b3c.png', 24);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(255) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `nom_role`) VALUES
(1, 'membre'),
(2, 'administrateur'),
(3, 'banni');

-- --------------------------------------------------------

--
-- Structure de la table `univer`
--

DROP TABLE IF EXISTS `univer`;
CREATE TABLE IF NOT EXISTS `univer` (
  `id_univer` int(11) NOT NULL AUTO_INCREMENT,
  `nom_univer` varchar(255) NOT NULL,
  PRIMARY KEY (`id_univer`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `univer`
--

INSERT INTO `univer` (`id_univer`, `nom_univer`) VALUES
(1, 'One piece'),
(2, 'Autre'),
(3, 'bleach');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(255) NOT NULL,
  `prenom_user` varchar(255) NOT NULL,
  `pseudo_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `mdp_user` varchar(255) NOT NULL,
  `ddn_user` date NOT NULL COMMENT 'date de naissance',
  `addresse_user` varchar(255) DEFAULT NULL,
  `ville_user` varchar(255) DEFAULT NULL COMMENT 'vile',
  `cp_user` int(11) DEFAULT NULL COMMENT 'code postal',
  `ddi_user` date NOT NULL COMMENT 'Date d''inscription',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom_user`, `prenom_user`, `pseudo_user`, `email_user`, `mdp_user`, `ddn_user`, `addresse_user`, `ville_user`, `cp_user`, `ddi_user`) VALUES
(7, 'chris', 'sauvat', 'epyion', 'christopher.sauvat@gmail.com', '21417d8d58e022f87bd849fe4aefa423125a99f39f21c2646fc31f25a3b019ed', '1989-08-10', NULL, NULL, NULL, '2022-06-29'),
(12, 'cotton', 'kevin', 'kevin', 'kevin@hotmail.fr', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9', '2022-07-06', NULL, NULL, NULL, '2022-07-28'),
(13, 'bouq', 'teddy', 'tedd', 'tedd@gmail.com', 'bfac7260ccb3871bde30f8f07c5782b3b22ce7dfae5b85746a90dc0060cb0d15', '1987-02-10', NULL, NULL, NULL, '2022-07-28'),
(14, 'jeaodo', 'jfei', 'jean', 'tedd@gmail.com', 'bfac7260ccb3871bde30f8f07c5782b3b22ce7dfae5b85746a90dc0060cb0d15', '1987-02-10', NULL, NULL, NULL, '2022-07-28'),
(15, 'jean', 'loool', 'jascque', 'tedd@gmail.com', 'bfac7260ccb3871bde30f8f07c5782b3b22ce7dfae5b85746a90dc0060cb0d15', '1987-02-10', NULL, NULL, NULL, '2022-07-28'),
(16, 'jumper', 'atro', 'joly', 'toto@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9', '1987-02-10', NULL, NULL, NULL, '2022-07-28'),
(17, 'fourt', 'tropma', 'fol', 'trop@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9', '1987-02-10', NULL, NULL, NULL, '2022-07-28'),
(19, 'moto', 'aberr', 'yealoww', 'troptroptrop@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9', '1987-02-10', NULL, NULL, NULL, '2022-07-28'),
(20, 'lokp', 'hefjzej', 'red', 'troptroptroptrop@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9', '1987-02-10', NULL, NULL, NULL, '2022-07-28'),
(21, 'flitttttt', 'ajzoeoe', 'froid', 'troptroptroptroptrop@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9', '1987-02-10', NULL, NULL, NULL, '2022-07-28'),
(22, 'trop', 'tard', 'golll', 'tardtroptroptroptroptrop@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9', '1987-02-10', NULL, NULL, NULL, '2022-07-28'),
(23, 'plopp', 'rett', 'flok', 'hello@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9', '1989-08-10', NULL, NULL, NULL, '2022-07-28'),
(25, 'zhefh', 'jdiduff', 'gearge', 'gogo@hotmail.fr', '21417d8d58e022f87bd849fe4aefa423125a99f39f21c2646fc31f25a3b019ed', '1928-08-10', NULL, NULL, NULL, '2022-07-28'),
(26, 'la', 'fin', 'voila', 'destemp^gmail.com', '21417d8d58e022f87bd849fe4aefa423125a99f39f21c2646fc31f25a3b019ed', '1928-08-10', NULL, NULL, NULL, '2022-07-28'),
(27, 'jean', 'michel', 'jean michel', 'jena.michel@gmail.com', '21417d8d58e022f87bd849fe4aefa423125a99f39f21c2646fc31f25a3b019ed', '1928-08-10', NULL, NULL, NULL, '2022-07-28'),
(28, 'zhoei', 'okjdee', 'VOILAOU', 'qui.denoudeux@gmail.com', 'c6699150f8e653dd5fd88b5ccbff7d15f54be7dc505d133529c3f7408ae4e510', '1928-08-10', NULL, NULL, NULL, '2022-07-28'),
(29, 'aaaa', 'aaaa', 'aaaa', 'aa@aa.fr', '4f0d24b941645161ed5ee39bc053f9ea5afc63f19ee3a0f4323f2092851886c1', '1990-01-01', NULL, NULL, NULL, '2022-07-29');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `Appartenir_categorie_FK` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`),
  ADD CONSTRAINT `Appartenir_produit0_FK` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);

--
-- Contraintes pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD CONSTRAINT `avoir_entite_FK` FOREIGN KEY (`id_entite`) REFERENCES `entite` (`id_entite`),
  ADD CONSTRAINT `avoir_univer0_FK` FOREIGN KEY (`id_univer`) REFERENCES `univer` (`id_univer`);

--
-- Contraintes pour la table `fournir`
--
ALTER TABLE `fournir`
  ADD CONSTRAINT `Fournir_categorie0_FK` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`),
  ADD CONSTRAINT `Fournir_univer_FK` FOREIGN KEY (`id_univer`) REFERENCES `univer` (`id_univer`);

--
-- Contraintes pour la table `possede`
--
ALTER TABLE `possede`
  ADD CONSTRAINT `possede_role_FK` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`),
  ADD CONSTRAINT `possede_user0_FK` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
