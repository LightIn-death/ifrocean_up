-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le :  mer. 22 jan. 2020 à 09:57
-- Version du serveur :  10.3.14-MariaDB
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ifrocean`
--
DROP DATABASE IF EXISTS `ifrocean`;
CREATE DATABASE IF NOT EXISTS `ifrocean` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ifrocean`;

-- --------------------------------------------------------

--
-- Structure de la table `especes`
--

DROP TABLE IF EXISTS `especes`;
CREATE TABLE IF NOT EXISTS `especes` (
  `id_especes` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_especes`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `especes`
--

INSERT INTO `especes` (`id_especes`, `nom`) VALUES
(3, 'Dendrobaena venta'),
(4, 'Lumbricus rubellus'),
(5, 'Eisenia andrei'),
(8, 'SERPENDE DE LE CIEL'),
(9, 'Mechant Verre De la Terre'),
(11, 'Mechant Verre De le Ciel');

-- --------------------------------------------------------

--
-- Structure de la table `etudes`
--

DROP TABLE IF EXISTS `etudes`;
CREATE TABLE IF NOT EXISTS `etudes` (
  `id_etudes` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date DEFAULT NULL,
  `reference` varchar(255) NOT NULL,
  PRIMARY KEY (`id_etudes`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudes`
--

INSERT INTO `etudes` (`id_etudes`, `nom`, `dateDebut`, `dateFin`, `reference`) VALUES
(14, 'Lo', '2020-01-07', '2020-01-07', '8ef8w49'),
(16, 'Etude du NORD', '2020-01-17', '2020-01-17', 'les viking toussa'),
(17, 'ETUDE DU SUD', '2020-01-17', '2020-01-21', 'les tribu anthropophage toussa');

-- --------------------------------------------------------

--
-- Structure de la table `instanceespeces`
--

DROP TABLE IF EXISTS `instanceespeces`;
CREATE TABLE IF NOT EXISTS `instanceespeces` (
  `FK_id_especes` int(11) NOT NULL,
  `FK_zone` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  KEY `FK_id_especes` (`FK_id_especes`),
  KEY `FK_zone` (`FK_zone`),
  KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `instanceespeces`
--

INSERT INTO `instanceespeces` (`FK_id_especes`, `FK_zone`, `nombre`) VALUES
(3, 14, 44),
(4, 14, 45),
(3, 15, 88);

-- --------------------------------------------------------

--
-- Structure de la table `instanceplages`
--

DROP TABLE IF EXISTS `instanceplages`;
CREATE TABLE IF NOT EXISTS `instanceplages` (
  `id_instancePlages` int(11) NOT NULL AUTO_INCREMENT,
  `FK_id_etudes` int(11) NOT NULL,
  `FK_id_plages` int(11) NOT NULL,
  `superficieTotal` int(11) NOT NULL,
  PRIMARY KEY (`id_instancePlages`),
  KEY `FK_id_etudes` (`FK_id_etudes`),
  KEY `FK_Plages` (`FK_id_plages`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `instanceplages`
--

INSERT INTO `instanceplages` (`id_instancePlages`, `FK_id_etudes`, `FK_id_plages`, `superficieTotal`) VALUES
(46, 14, 1, 846),
(47, 14, 2, 2584848),
(48, 14, 5, 588448),
(49, 14, 9, 1),
(52, 16, 5, 994494),
(53, 17, 9, 5644646),
(54, 17, 2, 4848448),
(55, 16, 1, 4664),
(56, 16, 1, 4664),
(57, 17, 1, 89);

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

DROP TABLE IF EXISTS `personnes`;
CREATE TABLE IF NOT EXISTS `personnes` (
  `id_personnes` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_personnes`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id_personnes`, `nom`, `prenom`, `email`, `tel`, `password`, `admin`) VALUES
(1, 'Takin', 'Gerard', 'gerard.takin@gmail.com', '+336.25.14.85.65', 'motdepasse123', 0),
(2, 'Franc', 'Kevin', 'kevin.franc@gmail.com', '06.15.13.85.69', 'motdepasse123', 1),
(3, 'Gautier', 'Maxime', 'maxime.gautier@gmail.com', '0735188565', 'motdepasse123', 0),
(4, 'Arnaux', 'Nicolas', 'nicolas.arnaux@gmail.com', '+33734181525', 'motdepasse123', 0),
(5, 'Floris', 'Melanie', 'michu@live.fr', '0689457115', '123456', 0),
(7, 'Ivan', 'Truckle', 'ivan.truckle@electron.js', '+332 56 54 89 87', '123456789', 0),
(8, 'lo', 'lo', 'ASDASDD@WEE.FR', '8558458uh', 'lo', 0),
(9, 'Jean Ã©uDe', 'â™«RTu', '1@fr.5', 'Lyt 5252  5252 252 5', '123', 0),
(10, 'TEST', 'TEst', 'test@efefefef.fr', '01 02 03 04 05', '12345678', 0);

-- --------------------------------------------------------

--
-- Structure de la table `plage`
--

DROP TABLE IF EXISTS `plage`;
CREATE TABLE IF NOT EXISTS `plage` (
  `id_plages` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET latin1 NOT NULL,
  `commune` varchar(255) CHARACTER SET latin1 NOT NULL,
  `departement` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_plages`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `plage`
--

INSERT INTO `plage` (`id_plages`, `nom`, `commune`, `departement`) VALUES
(1, 'plage de lâ€™ile vierge', 'Crozon', '29'),
(2, 'Plage de Lortouais', 'Erquy ', '22'),
(5, 'ROCHER', 'ROCHER', 'ROCHER'),
(9, 'Kervenac', 'Pontivy', '56'),
(10, 'Plageun', 'Nantes', '56');

-- --------------------------------------------------------

--
-- Structure de la table `zones`
--

DROP TABLE IF EXISTS `zones`;
CREATE TABLE IF NOT EXISTS `zones` (
  `id_zones` int(11) NOT NULL AUTO_INCREMENT,
  `FK_instance_plages` int(11) NOT NULL,
  `point1` varchar(255) NOT NULL DEFAULT '0;0',
  `point2` varchar(255) NOT NULL DEFAULT '0;0',
  `point3` varchar(255) NOT NULL DEFAULT '0;0',
  `point4` varchar(255) NOT NULL DEFAULT '0;0',
  `nombrePersonne` int(11) NOT NULL,
  PRIMARY KEY (`id_zones`),
  KEY `FK_instance_plages` (`FK_instance_plages`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `zones`
--

INSERT INTO `zones` (`id_zones`, `FK_instance_plages`, `point1`, `point2`, `point3`, `point4`, `nombrePersonne`) VALUES
(14, 53, '0;0', '0;0', '0;0', '0;0', 684),
(15, 53, '0;0', '0;0', '0;0', '0;0', 84848),
(16, 53, '0;1', '10;0', '20;0', '0;30', 58),
(17, 53, '1;0', '2;0', '2;5', '1;5', 5);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `instanceespeces`
--
ALTER TABLE `instanceespeces`
  ADD CONSTRAINT `instanceespeces_ibfk_1` FOREIGN KEY (`FK_id_especes`) REFERENCES `especes` (`id_especes`) ON DELETE CASCADE,
  ADD CONSTRAINT `instanceespeces_ibfk_2` FOREIGN KEY (`FK_zone`) REFERENCES `zones` (`id_zones`) ON DELETE CASCADE;

--
-- Contraintes pour la table `instanceplages`
--
ALTER TABLE `instanceplages`
  ADD CONSTRAINT `instanceplages_ibfk_1` FOREIGN KEY (`FK_id_etudes`) REFERENCES `etudes` (`id_etudes`) ON DELETE CASCADE,
  ADD CONSTRAINT `plages_ibfk_1` FOREIGN KEY (`FK_id_plages`) REFERENCES `plage` (`id_plages`) ON DELETE CASCADE;

--
-- Contraintes pour la table `zones`
--
ALTER TABLE `zones`
  ADD CONSTRAINT `zones_ibfk_1` FOREIGN KEY (`FK_instance_plages`) REFERENCES `instanceplages` (`id_instancePlages`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
