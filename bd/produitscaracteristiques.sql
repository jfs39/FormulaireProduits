-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 28 mai 2020 à 19:28
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
(1, 'Rond', 'Possède 365 degrés', 'physique'),
(3, 'Carré', 'A 4 cotés', 'physique');

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
(38, 'Banane', 'Fruit jaune', '5', 'sucré', 1),
(39, 'Orange', 'Fruit orange et rond', '4', 'Sucré/acidulé/amer', 1),
(41, 'Fusil de chasse', 'Utilise cartouche 12mm', '150', 'DANGEREUX', 1),
(42, 'Sledgehammer', 'Longueur: 85cm', '40', 'Assez lourd', 1),
(44, 'Marteau', 'Manche en bois', '30', 'Bout en métal', 1),
(46, 'banane', 'dawdawdawd', '333', 'wddda', 1),
(47, 'Chocolat', '350 calories', '3', 'Expire bientôt', 1),
(60, 'Alexandre Michaud', 'Gérant MST', '6969', 'Kinda gay', 1),
(61, 'Jorge Junior Hoyos Mendoza', 'the best mom in the world', '696969', 'likes the number 69', 1),
(63, 'yasser soliman', 'fsefesf', '3333', 'awdwadwad', 1),
(64, 'Poire', 'Ceci est une poire', '2', 'Sucré', 1),
(67, 'Dumbbell', 'Pèse 25lb', '45', 'Hexagonal', 1),
(68, 'Disque', 'Vieux disque de AC/DC', '45', 'Mauvais état', 1),
(69, 'Guillaume', 'hot boi', '3', 'Entrez les autres détails ici', 1),
(70, 'gr', 'Entrez la description du produit ici', '4', 'Entrez les autres détails ici', 1),
(71, 'Guillaume', 'Entrez la description du produit ici', '2', 'Entrez les autres détails ici', 2),
(72, 'Guillaume', 'Entrez la description du produit ici', '69', 'Entrez les autres détails ici', 2),
(73, 'd', 'Entrez la description du produit ici', '2', 'Entrez les autres détails ici', 1),
(74, 'Jaygualine', 'Entrez la description du produit ici', '2', 'Entrez les autres détails ici', 2);

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
(38, 1);

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
(1, 'Jf', 'JfSergerie', '12345'),
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
  MODIFY `ID_CARACTERISTIQUE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

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
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `produits_caracteristiques`
--
ALTER TABLE `produits_caracteristiques`
  ADD CONSTRAINT `produits_caracteristiques_ibfk_1` FOREIGN KEY (`ID_PRODUIT`) REFERENCES `products` (`PRODUCT_ID`),
  ADD CONSTRAINT `produits_caracteristiques_ibfk_2` FOREIGN KEY (`ID_CARACTERISTIQUE`) REFERENCES `caracteristiques` (`ID_CARACTERISTIQUE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
