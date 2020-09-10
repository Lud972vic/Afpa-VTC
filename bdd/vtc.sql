-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           10.4.13-MariaDB-log - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.0.0.6054
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour vtc
CREATE DATABASE IF NOT EXISTS `vtc` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `vtc`;

-- Listage de la structure de la table vtc. conducteur
CREATE TABLE IF NOT EXISTS `conducteur` (
  `idConducteur` int(11) NOT NULL AUTO_INCREMENT,
  `Prenom` varchar(50) DEFAULT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idConducteur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table vtc.conducteur : ~4 rows (environ)
/*!40000 ALTER TABLE `conducteur` DISABLE KEYS */;
INSERT INTO `conducteur` (`idConducteur`, `Prenom`, `Nom`) VALUES
	(1, 'Paul', 'Xeon'),
	(2, 'Pascal', 'Intel'),
	(3, 'Julie', 'Amd'),
	(4, 'Céline', 'Belo'),
	(5, '', '');
/*!40000 ALTER TABLE `conducteur` ENABLE KEYS */;

-- Listage de la structure de la table vtc. conducteur_vehicule
CREATE TABLE IF NOT EXISTS `conducteur_vehicule` (
  `idAssociation` int(11) NOT NULL AUTO_INCREMENT,
  `idConducteur` int(11) DEFAULT NULL,
  `idVehicule` int(11) DEFAULT NULL,
  `DateAssociation` date DEFAULT NULL,
  PRIMARY KEY (`idAssociation`),
  KEY `FK_conducteur` (`idConducteur`),
  KEY `FK_vehicule` (`idVehicule`),
  CONSTRAINT `FK_conducteur` FOREIGN KEY (`idConducteur`) REFERENCES `conducteur` (`idConducteur`),
  CONSTRAINT `FK_vehicule` FOREIGN KEY (`idVehicule`) REFERENCES `vehicule` (`idVehicule`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table vtc.conducteur_vehicule : ~4 rows (environ)
/*!40000 ALTER TABLE `conducteur_vehicule` DISABLE KEYS */;
INSERT INTO `conducteur_vehicule` (`idAssociation`, `idConducteur`, `idVehicule`, `DateAssociation`) VALUES
	(1, 4, 5, '2020-09-08'),
	(2, 1, 2, '2020-09-08'),
	(3, 2, 4, '2020-09-08'),
	(4, 2, 3, NULL),
	(5, 3, 5, NULL);
/*!40000 ALTER TABLE `conducteur_vehicule` ENABLE KEYS */;

-- Listage de la structure de la table vtc. vehicule
CREATE TABLE IF NOT EXISTS `vehicule` (
  `idVehicule` int(11) NOT NULL AUTO_INCREMENT,
  `Marque` varchar(30) DEFAULT NULL,
  `Modele` varchar(30) DEFAULT NULL,
  `Couleur` varchar(30) DEFAULT NULL,
  `Immatriculation` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idVehicule`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table vtc.vehicule : ~4 rows (environ)
/*!40000 ALTER TABLE `vehicule` DISABLE KEYS */;
INSERT INTO `vehicule` (`idVehicule`, `Marque`, `Modele`, `Couleur`, `Immatriculation`) VALUES
	(1, 'Renault', 'Zoe', 'Blue', '14j5-58cz'),
	(2, 'Renault', 'Twingo', 'Mango', '25j8-696c'),
	(3, 'Renault', 'Clio', 'Rouge', '96hj-875n'),
	(4, 'Peugeot', '208', 'Jaune', '54hj-9nhj6'),
	(5, 'Peugeot', 'Suv 3008', 'Gris', 'iop9-65f8');
/*!40000 ALTER TABLE `vehicule` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
