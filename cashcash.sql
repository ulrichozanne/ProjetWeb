-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 14 oct. 2019 à 08:48
-- Version du serveur :  5.7.26
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
-- Base de données :  `cashcash`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `numeroAgence` varchar(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `codeReg` varchar(10) NOT NULL,
  PRIMARY KEY (`numeroAgence`),
  KEY `codeReg` (`codeReg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `numClient` varchar(10) NOT NULL,
  `raisonSociale` varchar(255) NOT NULL,
  `siren` varchar(255) NOT NULL,
  `codeApe` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `dureeDeplacement` time NOT NULL,
  `distanceKM` double(5,2) NOT NULL,
  `numAgence` varchar(10) NOT NULL,
  PRIMARY KEY (`numClient`),
  KEY `numAgence` (`numAgence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contratmaintenance`
--

DROP TABLE IF EXISTS `contratmaintenance`;
CREATE TABLE IF NOT EXISTS `contratmaintenance` (
  `numeroContrat` varchar(10) NOT NULL,
  `dateSignature` date NOT NULL,
  `dateEcheance` date NOT NULL,
  `numeroCli` varchar(10) NOT NULL,
  PRIMARY KEY (`numeroContrat`),
  KEY `numeroCli` (`numeroCli`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `controler`
--

DROP TABLE IF EXISTS `controler`;
CREATE TABLE IF NOT EXISTS `controler` (
  `numSerie` varchar(10) NOT NULL,
  `numIntervent` varchar(10) NOT NULL,
  `tempsPasse` time NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  PRIMARY KEY (`numSerie`,`numIntervent`),
  KEY `numSerie` (`numSerie`),
  KEY `numIntervent` (`numIntervent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `matricule` varchar(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `dateEmbauche` date NOT NULL,
  PRIMARY KEY (`matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

DROP TABLE IF EXISTS `famille`;
CREATE TABLE IF NOT EXISTS `famille` (
  `codeFam` varchar(10) NOT NULL,
  `libelleFam` varchar(255) NOT NULL,
  PRIMARY KEY (`codeFam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `numeroIntervent` varchar(10) NOT NULL,
  `dateVisite` date NOT NULL,
  `heureVisite` time NOT NULL,
  `numCli` varchar(10) NOT NULL,
  `matriculeTec` varchar(10) NOT NULL,
  PRIMARY KEY (`numeroIntervent`),
  KEY `numClient` (`numCli`,`matriculeTec`),
  KEY `matriculeTec` (`matriculeTec`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `numSerie` varchar(10) NOT NULL,
  `dateVente` date NOT NULL,
  `dateInstallation` date NOT NULL,
  `prixVente` double(5,2) NOT NULL,
  `emplacement` varchar(255) NOT NULL,
  `referenceInt` varchar(10) NOT NULL,
  `numClient` varchar(10) NOT NULL,
  PRIMARY KEY (`numSerie`),
  KEY `referenceInt` (`referenceInt`),
  KEY `numClient` (`numClient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `codeRegion` varchar(10) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`codeRegion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `technicien`
--

DROP TABLE IF EXISTS `technicien`;
CREATE TABLE IF NOT EXISTS `technicien` (
  `matriculeTech` varchar(10) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `dateObtention` date NOT NULL,
  `numeroAgence` varchar(10) NOT NULL,
  PRIMARY KEY (`matriculeTech`),
  KEY `matricule` (`matriculeTech`),
  KEY `numeroAgence` (`numeroAgence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `typemateriel`
--

DROP TABLE IF EXISTS `typemateriel`;
CREATE TABLE IF NOT EXISTS `typemateriel` (
  `reference` varchar(10) NOT NULL,
  `libelleType` varchar(255) NOT NULL,
  `codeFam` varchar(10) NOT NULL,
  PRIMARY KEY (`reference`),
  KEY `codeFam` (`codeFam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agence`
--
ALTER TABLE `agence`
  ADD CONSTRAINT `codeReg` FOREIGN KEY (`codeReg`) REFERENCES `region` (`codeRegion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `numAgence` FOREIGN KEY (`numAgence`) REFERENCES `agence` (`numeroAgence`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `contratmaintenance`
--
ALTER TABLE `contratmaintenance`
  ADD CONSTRAINT `numeroCli` FOREIGN KEY (`numeroCli`) REFERENCES `contratmaintenance` (`numeroContrat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `controler`
--
ALTER TABLE `controler`
  ADD CONSTRAINT `numIntervent` FOREIGN KEY (`numIntervent`) REFERENCES `intervention` (`numeroIntervent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `numSerie` FOREIGN KEY (`numSerie`) REFERENCES `materiel` (`numSerie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD CONSTRAINT `matriculeTec` FOREIGN KEY (`matriculeTec`) REFERENCES `technicien` (`matriculeTech`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `numCli` FOREIGN KEY (`numCli`) REFERENCES `client` (`numClient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD CONSTRAINT `numClient` FOREIGN KEY (`numClient`) REFERENCES `client` (`numClient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `referenceInt` FOREIGN KEY (`referenceInt`) REFERENCES `typemateriel` (`reference`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `technicien`
--
ALTER TABLE `technicien`
  ADD CONSTRAINT `matriculeTech` FOREIGN KEY (`matriculeTech`) REFERENCES `employe` (`matricule`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `numeroAgence` FOREIGN KEY (`numeroAgence`) REFERENCES `agence` (`numeroAgence`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `typemateriel`
--
ALTER TABLE `typemateriel`
  ADD CONSTRAINT `codeFam` FOREIGN KEY (`codeFam`) REFERENCES `famille` (`codeFam`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
