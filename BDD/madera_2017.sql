-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 03 Avril 2018 à 21:41
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `madera_2017`
--
CREATE DATABASE IF NOT EXISTS madera_2017;
USE madera_2017;
-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_cli` int(10) NOT NULL,
  `ref_cli` varchar(10) NOT NULL,
  `nom_cli` varchar(30) NOT NULL,
  `prenom_cli` varchar(30) NOT NULL,
  `adresse_cli` varchar(150) NOT NULL,
  `code_postal_cli` varchar(5) NOT NULL,
  `telephone_cli` varchar(10) NOT NULL,
  `email_cli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id_cli`, `ref_cli`, `nom_cli`, `prenom_cli`, `adresse_cli`, `code_postal_cli`, `telephone_cli`, `email_cli`) VALUES
(1, '', 'Paul', 'Pogba', 'Manchester', '55000', '024544', 'paul.pob@ppb.com'),
(2, '', 'Vandame', 'Jean-Claude', 'Paris', '75000', '0666666', 'jc.v@jcv.com'),
(3, 'TOTO#toto#', 'Dupond', 'Toto', 'Marseille', '13000', '066666', 'toto@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `cli_projet`
--

CREATE TABLE `cli_projet` (
  `id_cli` int(10) NOT NULL,
  `id_projet` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cli_projet`
--

INSERT INTO `cli_projet` (`id_cli`, `id_projet`) VALUES
(3, 3),
(3, 5),
(1, 6),
(1, 7),
(2, 8),
(2, 9),
(1, 10),
(2, 11),
(1, 12),
(1, 13),
(3, 14);

-- --------------------------------------------------------

--
-- Structure de la table `commercials`
--

CREATE TABLE `commercials` (
  `id_com` int(10) NOT NULL,
  `ref_com` varchar(30) NOT NULL,
  `nom_com` varchar(30) NOT NULL,
  `prenom_com` varchar(30) NOT NULL,
  `telephone_com` varchar(10) NOT NULL,
  `email_com` varchar(50) NOT NULL,
  `mdp_com` varchar(15) NOT NULL,
  `actif_com` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commercials`
--

INSERT INTO `commercials` (`id_com`, `ref_com`, `nom_com`, `prenom_com`, `telephone_com`, `email_com`, `mdp_com`, `actif_com`) VALUES
(1, 'test', 'Edwarde', 'Newgate', '0666666', 'test@t.com', 'test1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `composant`
--

CREATE TABLE `composant` (
  `id_composant` int(10) NOT NULL,
  `id_famille` int(10) NOT NULL,
  `ref_compo` varchar(30) NOT NULL,
  `nom_compo` varchar(30) NOT NULL,
  `caracteristique_compo` varchar(100) DEFAULT NULL,
  `unite_usage_compo` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `quantite` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `composant`
--

INSERT INTO `composant` (`id_composant`, `id_famille`, `ref_compo`, `nom_compo`, `caracteristique_compo`, `unite_usage_compo`, `description`, `prix`, `quantite`) VALUES
(1, 6, 'boulon', 'Boulon', '', 'Pièce', 'Boulon', 0, 500),
(2, 4, 'ardoise', 'Ardoise', '', 'Pièce', 'Ardoise', 0, 600),
(3, 2, 'lame_bardage_bois', 'Lame de bardage bois', '', 'Mètre', '', 0, 500),
(4, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 180),
(6, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 180),
(7, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 180),
(8, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 180),
(9, 6, 'Contreforts#6', 'Contreforts', '', 'Pièce', '', NULL, 0),
(10, 6, 'Sabots d\'assemblage#6', 'Sabots d\'assemblage', '', 'Pièce', '', NULL, 4000),
(11, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 180),
(12, 6, 'Contreforts#6', 'Contreforts', '', 'Pièce', '', NULL, 0),
(13, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 180),
(14, 6, 'Contreforts#6', 'Contreforts', '', 'Pièce', '', NULL, 0),
(15, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 180),
(16, 6, 'Contreforts#6', 'Contreforts', '', 'Pièce', '', NULL, 0),
(17, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 180),
(18, 6, 'Contreforts#6', 'Contreforts', '', 'Pièce', '', NULL, 0),
(19, 6, 'Sabots d\'assemblage#6', 'Sabots d\'assemblage', '', 'Pièce', '', NULL, 32),
(20, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 180),
(21, 6, 'Contreforts#6', 'Contreforts', '', 'Pièce', '', NULL, 0),
(22, 6, 'Sabots d\'assemblage#6', 'Sabots d\'assemblage', '', 'Pièce', '', NULL, 32),
(23, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 180),
(24, 6, 'Contreforts#6', 'Contreforts', '', 'Pièce', '', NULL, 0),
(25, 6, 'Sabots d\'assemblage#6', 'Sabots d\'assemblage', '', 'Pièce', '', NULL, 32),
(26, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 180),
(27, 6, 'Contreforts#6', 'Contreforts', '', 'Pièce', '', NULL, 0),
(28, 6, 'Sabots d\'assemblage#6', 'Sabots d\'assemblage', '', 'Pièce', '', NULL, 32),
(29, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 180),
(30, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 190),
(31, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 190),
(32, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 200),
(33, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 150),
(34, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 150),
(35, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 52),
(36, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 50),
(37, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 50),
(38, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 59),
(39, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 458),
(40, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 50),
(41, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 50),
(42, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 56),
(43, 5, 'Lisses#5', 'Lisses', '', 'Longeur en cm', '', NULL, 50);

-- --------------------------------------------------------

--
-- Structure de la table `compo_fourni`
--

CREATE TABLE `compo_fourni` (
  `id_compo` int(10) NOT NULL,
  `id_fourni` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `com_projet`
--

CREATE TABLE `com_projet` (
  `id_com` int(10) NOT NULL,
  `id_projet` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `com_projet`
--

INSERT INTO `com_projet` (`id_com`, `id_projet`) VALUES
(1, 3),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14);

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE `devis` (
  `id_devis` int(10) NOT NULL,
  `id_projet` int(10) NOT NULL,
  `ref_devis` varchar(200) NOT NULL,
  `montant_devis_ht` float NOT NULL,
  `etat_devis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `devis`
--

INSERT INTO `devis` (`id_devis`, `id_projet`, `ref_devis`, `montant_devis_ht`, `etat_devis`) VALUES
(1, 13, 'Devis du projet : projet mader', 2610, 'B'),
(2, 14, 'Devis du projet : test ; référ', 3501, 'Brouillon');

-- --------------------------------------------------------

--
-- Structure de la table `famille_composant`
--

CREATE TABLE `famille_composant` (
  `id_famille` int(10) NOT NULL,
  `famille` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `famille_composant`
--

INSERT INTO `famille_composant` (`id_famille`, `famille`) VALUES
(1, 'Plancher'),
(2, 'Panneaux extérieurs'),
(3, 'Panneaux intérieurs'),
(4, 'Couverture'),
(5, 'Montant'),
(6, 'Élément de montage'),
(7, 'P. d’isolation et  pare-pluie');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fourni` int(10) NOT NULL,
  `ref_fourni` varchar(30) NOT NULL,
  `nom_fourni` varchar(50) NOT NULL,
  `telephone_fourni` varchar(10) NOT NULL,
  `description_fourni` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `gamme`
--

CREATE TABLE `gamme` (
  `id_gam` int(10) NOT NULL,
  `ref_gam` varchar(30) NOT NULL,
  `nom_gam` varchar(30) NOT NULL,
  `finition_gam` varchar(50) NOT NULL,
  `isolant_gam` varchar(50) NOT NULL,
  `type_couverture_gam` varchar(50) NOT NULL,
  `huisserie_gam` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `gamme`
--

INSERT INTO `gamme` (`id_gam`, `ref_gam`, `nom_gam`, `finition_gam`, `isolant_gam`, `type_couverture_gam`, `huisserie_gam`, `description`) VALUES
(1, 'premium', 'Premium', 'Crépis', 'Biologique', 'Tuiles', 'Bois', 'Gamme Premium'),
(2, 'wood', 'Wood', 'Bois', 'Naturel', 'Ardoise', 'Bois', 'Gamme Wood'),
(3, 'stone', 'Stone', 'Crépis', 'Synthétique', 'Tuile', 'PVC', 'Gamme Stone');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `id_module` int(10) NOT NULL,
  `ref_module` varchar(30) NOT NULL,
  `coupe_module` varchar(100) NOT NULL,
  `cctp_module` varchar(20) NOT NULL,
  `description_module` varchar(1000) NOT NULL,
  `prix_module` float NOT NULL,
  `angle_module` float NOT NULL,
  `nom_module` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `module`
--

INSERT INTO `module` (`id_module`, `ref_module`, `coupe_module`, `cctp_module`, `description_module`, `prix_module`, `angle_module`, `nom_module`) VALUES
(1, 'projet1_mur_exterieur', 'Droite', '', 'Mur extérieur Projet 1', 0, 90, 'Mur extérieur Projet 1'),
(2, 'projet1_plancher', 'Droite', '', 'Plancher Projet 1', 0, 90, 'Plancher Projet 1'),
(3, 'projet1_couverture', 'Droite', '', 'Couverture Projet 1', 0, 120, 'Couverture Projet 1'),
(4, '_Mur extérieur', 'droite', 'Dalle béton', 'efezf', 1250, 90, 'Mur extérieur'),
(5, '_Mur extérieur', 'droite', 'Dalle béton', 'efezf', 2250, 90, 'Mur extérieur'),
(6, '_Mur extérieur', 'droite', 'Dalle béton', 'efezf', 2250, 90, 'Mur extérieur'),
(7, '_Mur extérieur', 'droite', 'Dalle béton', 'efezf', 2250, 90, 'Mur extérieur'),
(8, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'efezf', 2250, 90, 'Mur extérieur'),
(9, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'efezf', 2250, 90, 'Mur extérieur'),
(10, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'efezf', 2250, 90, 'Mur extérieur'),
(11, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'efezf', 2250, 90, 'Mur extérieur'),
(12, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'efezf', 2250, 90, 'Mur extérieur'),
(13, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,', 2340, 92, 'Mur extérieur'),
(14, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,', 2340, 92, 'Mur extérieur'),
(15, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,', 2340, 92, 'Mur extérieur'),
(16, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,', 2340, 92, 'Mur extérieur'),
(17, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,', 2340, 92, 'Mur extérieur'),
(18, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,', 2340, 92, 'Mur extérieur'),
(19, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,', 2340, 92, 'Mur extérieur'),
(20, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'bdfb', 2340, 90, 'Mur extérieur'),
(21, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'bdfb', 2340, 90, 'Mur extérieur'),
(22, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'dfbhh', 2340, 90, 'Mur extérieur'),
(23, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'dfbhh', 2340, 90, 'Mur extérieur'),
(24, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'dfbhh', 2340, 90, 'Mur extérieur'),
(25, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'dfbhh', 2340, 90, 'Mur extérieur'),
(26, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'dfbhh', 2340, 90, 'Mur extérieur'),
(27, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'dfbhh', 2340, 90, 'Mur extérieur'),
(28, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'dfbhh', 2340, 90, 'Mur extérieur'),
(29, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'dfbhh', 2340, 90, 'Mur extérieur'),
(30, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'dfbhh', 2340, 90, 'Mur extérieur'),
(31, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'dfbhh', 2340, 90, 'Mur extérieur'),
(32, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(33, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(34, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(35, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(36, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(37, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(38, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(39, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(40, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(41, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(42, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(43, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(44, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(45, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(46, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(47, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(48, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(49, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(50, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(51, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(52, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(53, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(54, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(55, 'projet1_Mur extérieur', 'droite', 'Dalle béton', 'gh,;g', 2340, 90, 'Mur extérieur'),
(56, 'projet madera_Mur extérieur', 'Droite', 'Dalle béton', 'kjg', 1080, 90, 'Mur extérieur'),
(57, 'projet madera_Mur extérieur', 'Gauche', 'Plots béton', 'plots', 75, 0, 'Mur extérieur'),
(58, 'projet madera_Mur extérieur', 'Droite', 'Dalle béton', 'dalle', 2655, 90, 'Mur extérieur'),
(59, 'projet madera_Mur extérieur', 'Gauche', 'Dalle béton', 'gauche', 2610, 180, 'Mur extérieur'),
(60, 'test_Mur extérieur', 'Droite', 'Dalle béton', 'test', 810, 180, 'Mur extérieur'),
(61, 'test_Mur extérieur', 'Gauche', 'Dalle béton', 'test2', 810, 180, 'Mur extérieur'),
(62, 'test_Mur extérieur', 'devant', 'Dalle béton', 'test', 3955, 90, 'Mur extérieur'),
(63, 'test_Mur extérieur', 'en travers', 'Dalle béton', 'efefe', 9800, 90, 'Mur extérieur'),
(64, 'test_Mur intérieur', 'centrale', 'Dalle béton', 'gyk,gy', 3770, 90, 'Mur intérieur'),
(65, 'test_Mur intérieur', 'Droite', 'Dalle béton', 'k:jv', 3995, 80, 'Mur intérieur'),
(66, 'test_Mur intérieur', '6', 'Dalle béton', 'gnfx', 38360, 90, 'Mur intérieur'),
(67, 'test_Mur extérieur', '6', 'Dalle béton', 'ergerg', 3590, 120, 'Mur extérieur'),
(68, 'test_Mur extérieur', 'rg', 'Dalle béton', 'om', 3500, 90, 'Mur extérieur'),
(69, 'test_Mur intérieur', 'klb', 'Dalle béton', 'kjcf', 2570, 90, 'Mur intérieur'),
(70, 'test_dfn', 'fnfdg', 'Dalle béton', 'hk,', 3500, 50, 'dfn');

-- --------------------------------------------------------

--
-- Structure de la table `mod_compo`
--

CREATE TABLE `mod_compo` (
  `id_mod` int(10) NOT NULL,
  `id_compo` int(10) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `mod_compo`
--

INSERT INTO `mod_compo` (`id_mod`, `id_compo`, `quantite`) VALUES
(24, 6, 0),
(26, 7, 0),
(28, 8, 0),
(29, 9, 0),
(30, 10, 0),
(32, 11, 0),
(33, 12, 0),
(35, 13, 0),
(36, 14, 0),
(38, 15, 0),
(39, 16, 0),
(41, 17, 0),
(42, 18, 0),
(43, 19, 0),
(45, 20, 0),
(46, 21, 0),
(47, 22, 0),
(49, 23, 0),
(50, 24, 0),
(51, 25, 0),
(53, 26, 0),
(54, 27, 0),
(55, 28, 0),
(56, 29, 0),
(57, 30, 0),
(58, 31, 0),
(59, 32, 0),
(60, 33, 0),
(61, 34, 0),
(62, 35, 0),
(63, 36, 0),
(64, 37, 0),
(65, 38, 0),
(66, 39, 0),
(67, 40, 0),
(68, 41, 0),
(69, 42, 0),
(70, 43, 0);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id_projet` int(10) NOT NULL,
  `id_gamme` int(10) NOT NULL,
  `ref_projet` varchar(30) NOT NULL,
  `date_projet` date NOT NULL,
  `nom_projet` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `id_gamme`, `ref_projet`, `date_projet`, `nom_projet`) VALUES
(3, 1, 'projet1_Dupond_1', '0000-00-00', 'projet1'),
(5, 1, 'projet1bis_Dupond_#Gamme1', '0000-00-00', 'projet1bis'),
(6, 2, 'projet2_Paul_#Gamme2', '0000-00-00', 'projet2'),
(7, 3, 'projet2bis_Paul_#Gamme3', '2030-01-18', 'projet2bis'),
(8, 1, 'projet3_Vandame_#Gamme1', '0000-00-00', 'projet3'),
(9, 2, 'projet3bis_Vandame_#Gamme2', '2030-01-18', 'projet3bis'),
(10, 3, 'projet4_Paul_#Gamme3', '0000-00-00', 'projet4'),
(11, 1, 'projet4bis_Vandame_#Gamme1', '2018-01-30', 'projet4bis'),
(12, 1, 'projet madera_Paul_#Gamme1', '2018-02-04', 'projet madera'),
(13, 1, 'projet madera_Paul_#Gamme1', '2018-02-04', 'projet madera'),
(14, 1, 'test_Dupond_#Gamme1', '2018-02-04', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `projet_mod`
--

CREATE TABLE `projet_mod` (
  `id_projet` int(10) NOT NULL,
  `id_mod` int(10) NOT NULL,
  `num_mod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `projet_mod`
--

INSERT INTO `projet_mod` (`id_projet`, `id_mod`, `num_mod`) VALUES
(3, 8, 0),
(3, 9, 0),
(3, 10, 0),
(3, 11, 0),
(3, 12, 0),
(3, 13, 0),
(3, 14, 0),
(3, 15, 0),
(3, 16, 0),
(3, 17, 0),
(3, 18, 0),
(3, 19, 0),
(3, 20, 0),
(3, 21, 0),
(3, 22, 0),
(3, 23, 0),
(3, 24, 0),
(3, 25, 0),
(3, 26, 0),
(3, 27, 0),
(3, 28, 0),
(3, 29, 0),
(3, 30, 0),
(3, 31, 0),
(3, 32, 0),
(3, 33, 0),
(3, 34, 0),
(3, 35, 0),
(3, 36, 0),
(3, 37, 0),
(3, 38, 0),
(3, 39, 0),
(3, 40, 0),
(3, 41, 0),
(3, 42, 0),
(3, 43, 0),
(3, 44, 0),
(3, 45, 0),
(3, 46, 0),
(3, 47, 0),
(3, 48, 0),
(3, 49, 0),
(3, 50, 0),
(3, 51, 0),
(3, 52, 0),
(3, 53, 0),
(3, 54, 0),
(3, 55, 0),
(12, 56, 0),
(12, 57, 0),
(13, 58, 0),
(13, 59, 0),
(14, 60, 0),
(14, 61, 0),
(14, 62, 0),
(14, 63, 0),
(14, 64, 0),
(14, 65, 0),
(14, 66, 0),
(14, 67, 0),
(14, 68, 0),
(14, 69, 0),
(14, 70, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_cli`);

--
-- Index pour la table `cli_projet`
--
ALTER TABLE `cli_projet`
  ADD KEY `id_cli` (`id_cli`),
  ADD KEY `id_projet` (`id_projet`);

--
-- Index pour la table `commercials`
--
ALTER TABLE `commercials`
  ADD PRIMARY KEY (`id_com`);

--
-- Index pour la table `composant`
--
ALTER TABLE `composant`
  ADD PRIMARY KEY (`id_composant`),
  ADD KEY `fk_famille` (`id_famille`);

--
-- Index pour la table `compo_fourni`
--
ALTER TABLE `compo_fourni`
  ADD KEY `id_compo` (`id_compo`),
  ADD KEY `id_fourni` (`id_fourni`);

--
-- Index pour la table `com_projet`
--
ALTER TABLE `com_projet`
  ADD KEY `id_com` (`id_com`),
  ADD KEY `id_projet` (`id_projet`);

--
-- Index pour la table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id_devis`),
  ADD UNIQUE KEY `id_projet` (`id_projet`);

--
-- Index pour la table `famille_composant`
--
ALTER TABLE `famille_composant`
  ADD PRIMARY KEY (`id_famille`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fourni`);

--
-- Index pour la table `gamme`
--
ALTER TABLE `gamme`
  ADD PRIMARY KEY (`id_gam`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`);

--
-- Index pour la table `mod_compo`
--
ALTER TABLE `mod_compo`
  ADD KEY `id_mod` (`id_mod`),
  ADD KEY `id_compo` (`id_compo`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id_projet`),
  ADD KEY `fk_gamme_projet` (`id_gamme`);

--
-- Index pour la table `projet_mod`
--
ALTER TABLE `projet_mod`
  ADD KEY `id_projet` (`id_projet`),
  ADD KEY `id_mod` (`id_mod`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_cli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `commercials`
--
ALTER TABLE `commercials`
  MODIFY `id_com` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `composant`
--
ALTER TABLE `composant`
  MODIFY `id_composant` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `id_devis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `famille_composant`
--
ALTER TABLE `famille_composant`
  MODIFY `id_famille` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fourni` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `gamme`
--
ALTER TABLE `gamme`
  MODIFY `id_gam` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `id_module` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_projet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cli_projet`
--
ALTER TABLE `cli_projet`
  ADD CONSTRAINT `fk_client_projet` FOREIGN KEY (`id_cli`) REFERENCES `clients` (`id_cli`),
  ADD CONSTRAINT `fk_projet_client` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`);

--
-- Contraintes pour la table `composant`
--
ALTER TABLE `composant`
  ADD CONSTRAINT `fk_famille` FOREIGN KEY (`id_famille`) REFERENCES `famille_composant` (`id_famille`);

--
-- Contraintes pour la table `compo_fourni`
--
ALTER TABLE `compo_fourni`
  ADD CONSTRAINT `fk_composant` FOREIGN KEY (`id_compo`) REFERENCES `composant` (`id_composant`),
  ADD CONSTRAINT `fk_fournisseur` FOREIGN KEY (`id_fourni`) REFERENCES `fournisseur` (`id_fourni`);

--
-- Contraintes pour la table `com_projet`
--
ALTER TABLE `com_projet`
  ADD CONSTRAINT `pk_commercial` FOREIGN KEY (`id_com`) REFERENCES `commercials` (`id_com`),
  ADD CONSTRAINT `pk_projet_com` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`);

--
-- Contraintes pour la table `devis`
--
ALTER TABLE `devis`
  ADD CONSTRAINT `fk_projet_devis` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`);

--
-- Contraintes pour la table `mod_compo`
--
ALTER TABLE `mod_compo`
  ADD CONSTRAINT `pk_compo_module` FOREIGN KEY (`id_compo`) REFERENCES `composant` (`id_composant`),
  ADD CONSTRAINT `pk_module_compo` FOREIGN KEY (`id_mod`) REFERENCES `module` (`id_module`);

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `fk_gamme_projet` FOREIGN KEY (`id_gamme`) REFERENCES `gamme` (`id_gam`);

--
-- Contraintes pour la table `projet_mod`
--
ALTER TABLE `projet_mod`
  ADD CONSTRAINT `fk_module_projet` FOREIGN KEY (`id_mod`) REFERENCES `module` (`id_module`),
  ADD CONSTRAINT `fk_projet_module` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
