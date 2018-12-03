-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 03 déc. 2018 à 11:07
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `event`
--

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `region` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `nom`, `date`, `adresse`, `region`) VALUES
(4, 'Cremaillere', '2018-10-31', '5 rue grand gonnet', 'Rhône-Alpes'),
(5, 'Carrefour etudiants/entreprises', '2018-10-16', 'La metard', 'Rhône-Alpes'),
(6, 'Fetes des lumieres', '2018-12-08', 'Lyon', 'Rhône-Alpes'),
(8, 'Début de stage', '2019-03-04', 'SQLI, Lyon', 'Rhône-Alpes'),
(10, 'PGW', '2018-10-26', 'Paris', 'Île-de-France'),
(17, 'remise de diplome', '2018-12-07', 'tse', 'Rhône-Alpes'),
(12, 'Marseille - Saint Etienne', '2019-03-02', 'Stade Vélodrome', 'Provence-Alpes-Côte d\'Azur'),
(13, 'Championnat du monde de surf', '2019-08-15', 'Lacanau', 'Aquitaine'),
(14, 'Festival du livre', '2019-09-28', 'Saint Etienne', 'Rhône-Alpes'),
(15, 'Feux d\'artifices', '2019-07-14', 'Fréjus', 'Provence-Alpes-Côte d\'Azur'),
(16, 'Helfest', '2019-05-11', 'Paris', 'Île-de-France');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `nom` char(50) NOT NULL,
  `prenom` char(50) NOT NULL,
  `mail` varchar(75) NOT NULL,
  `idEvent` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`nom`, `prenom`, `mail`, `idEvent`) VALUES
('DELORME', 'Tanguy', 'delorme.tanguy@gmail.com', 1),
('Fournier', 'Enzo', 'fournier.enzo@gmail.com', 1),
('DELORME', 'Tanguy', 'delorme.tanguy@gmail.com', 4),
('DELORME', 'Tanguy', 'delorme.tanguy@gmail.com', 5),
('DELORME', 'Tanguy', 'delorme.tanguy@gmail.com', 8),
('DELORME', 'Tanguy', 'delorme.tanguy@gmail.com', 6),
('STER', 'Alexis', 'a.ster@outlook.fr', 12),
('Jean', 'Costes', 'costes.jean@gmail.com', 16),
('tanguy', 'delorme', 'delorme.tanguy@gmail.com', 17);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'staff', 'staff', 'staff');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
