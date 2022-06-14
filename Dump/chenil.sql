-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 13 juin 2022 à 22:21
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chenil`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_animals`
--

DROP TABLE IF EXISTS `t_animals`;
CREATE TABLE IF NOT EXISTS `t_animals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_animal` varchar(20) NOT NULL,
  `gender_animal` tinyint(1) NOT NULL,
  `bday_animal` date NOT NULL,
  `sterilized_animal` tinyint(1) NOT NULL,
  `microship_animal` bigint(15) NOT NULL,
  `fk_id_person` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `microship_animal` (`microship_animal`),
  KEY `fk_animals_persons` (`fk_id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_animals`
--

INSERT INTO `t_animals` (`id`, `name_animal`, `gender_animal`, `bday_animal`, `sterilized_animal`, `microship_animal`, `fk_id_person`) VALUES
(5, 'Coton', 1, '2021-03-12', 1, 1111111111111112, 18),
(6, 'Cerise', 0, '2002-06-19', 1, 111111111111113, 19),
(8, 'fsesfse', 1, '2022-06-06', 1, 156155161651615, 18);

-- --------------------------------------------------------

--
-- Structure de la table `t_boardings`
--

DROP TABLE IF EXISTS `t_boardings`;
CREATE TABLE IF NOT EXISTS `t_boardings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startDate_boarding` date NOT NULL,
  `endDate_boarding` date NOT NULL,
  `fk_id_animal` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_boarding_animals` (`fk_id_animal`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_boardings`
--

INSERT INTO `t_boardings` (`id`, `startDate_boarding`, `endDate_boarding`, `fk_id_animal`) VALUES
(5, '2022-06-06', '2022-08-01', 5);

-- --------------------------------------------------------

--
-- Structure de la table `t_persons`
--

DROP TABLE IF EXISTS `t_persons`;
CREATE TABLE IF NOT EXISTS `t_persons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_person` varchar(50) NOT NULL,
  `firstname_person` varchar(50) NOT NULL,
  `bday_person` date NOT NULL,
  `email_person` varchar(120) NOT NULL,
  `phone_person` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_persons`
--

INSERT INTO `t_persons` (`id`, `name_person`, `firstname_person`, `bday_person`, `email_person`, `phone_person`) VALUES
(18, 'Pauwels', 'Donatian', '1992-09-16', 'donatian.pauwels@gmail.com', '0497089411'),
(19, 'Perroncel', 'Gaelle', '2002-06-19', 'gaelle.perroncel@gmail.com', '0497089411'),
(31, 'Jean-francois', 'Pierart', '1991-08-20', 'fdssdfs@fdfsff.com', '415451415');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_animals`
--
ALTER TABLE `t_animals`
  ADD CONSTRAINT `fk_animals_persons` FOREIGN KEY (`fk_id_person`) REFERENCES `t_persons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `t_boardings`
--
ALTER TABLE `t_boardings`
  ADD CONSTRAINT `fk_boarding_animals` FOREIGN KEY (`fk_id_animal`) REFERENCES `t_animals` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
