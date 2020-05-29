-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 29 mai 2020 à 19:03
-- Version du serveur :  8.0.18
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `produitscaracteristiques`
--

-- --------------------------------------------------------

--
-- Structure de la table `caracteristiques`
--

CREATE TABLE `caracteristiques` (
  `ID_CARACTERISTIQUE` int(11) NOT NULL,
  `Nom_Caracteristique` varchar(50) NOT NULL,
  `Details_Caracteristique` text NOT NULL,
  `Type_Donnees_Caracteristique` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `caracteristiques`
--

INSERT INTO `caracteristiques` (`ID_CARACTERISTIQUE`, `Nom_Caracteristique`, `Details_Caracteristique`, `Type_Donnees_Caracteristique`) VALUES
(3, 'Carré', 'A 4 cotés', 'physique'),
(4, 'Métallique', 'A un reflet reluisant du métal', 'physique'),
(5, 'Rectangulaire', 'Forme qui a 4 côtés mais qui n\'est pas un carré', 'physique'),
(6, 'Triangulaire', 'A une forme de triangle', 'forme');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `PRODUCT_ID` int(11) NOT NULL,
  `Product_Name` varchar(30) NOT NULL,
  `Product_Description` text NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `Other_Details` text,
  `USER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`PRODUCT_ID`, `Product_Name`, `Product_Description`, `Price`, `Other_Details`, `USER_ID`) VALUES
(38, 'Banane', 'Fruit jaune', '5', 'très sucré', 1),
(39, 'Orange', 'Fruit orange et rond', '4', 'Sucré/acidulé/amer', 1),
(41, 'Fusil de chasse', 'Utilise cartouche 12mm', '150', 'DANGEREUX', 1),
(42, 'Sledgehammer', 'Longueur: 85cm', '40', 'Assez lourd', 1),
(44, 'Marteau', 'Manche en bois', '30', 'Bout en métal', 1),
(46, 'banane', 'dawdawdawd', '333', 'wddda', 1),
(47, 'Chocolat', '350 calories', '3', 'Expire bientôt', 1),
(64, 'Poire', 'Ceci est une poire', '2', 'Sucré', 1),
(67, 'Dumbbell', 'Pèse 25lb', '45', 'Hexagonal', 1),
(68, 'Disque', 'Vieux disque de AC/DC', '45', 'Mauvais état', 1),
(69, 'Papier de toilette', 'Assez pour 10 passages', '3', 'Blanc et gris', 1),
(80, 'Advil', 'Médicament bon pour la santé', '2', 'Goute pas bon', 1),
(81, 'Bakugan', 'Jouet en plastique', '4', 'Magnétique', 2);

-- --------------------------------------------------------

--
-- Structure de la table `produits_caracteristiques`
--

CREATE TABLE `produits_caracteristiques` (
  `ID_PRODUIT` int(11) NOT NULL,
  `ID_CARACTERISTIQUE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits_caracteristiques`
--

INSERT INTO `produits_caracteristiques` (`ID_PRODUIT`, `ID_CARACTERISTIQUE`) VALUES
(47, 5),
(67, 4),
(80, 5);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `identifiant` varchar(35) NOT NULL,
  `mot_de_passe` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `identifiant`, `mot_de_passe`) VALUES
(1, 'anonyme', 'anonyme', 'anonyme'),
(2, 'admin', 'admin', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `caracteristiques`
--
ALTER TABLE `caracteristiques`
  ADD PRIMARY KEY (`ID_CARACTERISTIQUE`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PRODUCT_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Index pour la table `produits_caracteristiques`
--
ALTER TABLE `produits_caracteristiques`
  ADD KEY `ID_CARACTERISTIQUE` (`ID_CARACTERISTIQUE`),
  ADD KEY `ID_PRODUIT` (`ID_PRODUIT`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `caracteristiques`
--
ALTER TABLE `caracteristiques`
  MODIFY `ID_CARACTERISTIQUE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `produits_caracteristiques`
--
ALTER TABLE `produits_caracteristiques`
  ADD CONSTRAINT `produits_caracteristiques_ibfk_1` FOREIGN KEY (`ID_PRODUIT`) REFERENCES `products` (`PRODUCT_ID`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `produits_caracteristiques_ibfk_2` FOREIGN KEY (`ID_CARACTERISTIQUE`) REFERENCES `caracteristiques` (`ID_CARACTERISTIQUE`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
