-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 27 Janvier 2018 à 13:54
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
CREATE DATABASE IF NOT EXIST  madera_2017;
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
(2, '', 'Vandame', 'Jean-Claude', 'Paris', '75000', '0666666', 'jc.v@jcv.com');

-- --------------------------------------------------------

--
-- Structure de la table `cli_projet`
--

CREATE TABLE `cli_projet` (
  `id_cli` int(10) NOT NULL,
  `id_projet` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `caracteristique_compo` varchar(100) NOT NULL,
  `uniter_usage_compo` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE `devis` (
  `id_devis` int(10) NOT NULL,
  `id_projet` int(10) NOT NULL,
  `ref_devis` varchar(30) NOT NULL,
  `montant_devis_ht` float NOT NULL,
  `etat_devis` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `famille_composant`
--

CREATE TABLE `famille_composant` (
  `id_famille` int(10) NOT NULL,
  `famille` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `id_module` int(10) NOT NULL,
  `ref_module` varchar(30) NOT NULL,
  `coup_module` varchar(100) NOT NULL,
  `cctp_module` varchar(20) NOT NULL,
  `description_module` varchar(1000) NOT NULL,
  `prix_module` float NOT NULL,
  `angle_module` float NOT NULL,
  `nom_module` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mod_compo`
--

CREATE TABLE `mod_compo` (
  `id_mod` int(10) NOT NULL,
  `id_compo` int(10) NOT NULL,
  `quantiter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD UNIQUE KEY `id_famille` (`id_famille`);

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
  ADD UNIQUE KEY `id_gamme` (`id_gamme`);

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
  MODIFY `id_cli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `commercials`
--
ALTER TABLE `commercials`
  MODIFY `id_com` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `composant`
--
ALTER TABLE `composant`
  MODIFY `id_composant` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `id_devis` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `famille_composant`
--
ALTER TABLE `famille_composant`
  MODIFY `id_famille` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fourni` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `gamme`
--
ALTER TABLE `gamme`
  MODIFY `id_gam` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `id_module` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_projet` int(10) NOT NULL AUTO_INCREMENT;
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
