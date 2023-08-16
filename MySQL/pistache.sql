-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 27 juin 2023 à 15:09
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pistache`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Entrée'),
(2, 'Plat'),
(3, 'Dessert');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `bin` varchar(255) DEFAULT NULL,
  `date_crea` varchar(255) DEFAULT NULL,
  `id_categorie` int DEFAULT NULL,
  `statut` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `titre`, `description`, `bin`, `date_crea`, `id_categorie`, `statut`) VALUES
(2, 'titre2', 'titre2', 'plat1.jpg', '25/06/2023', NULL, ''),
(3, 'titre2', 'titre2', 'plat1.jpg', '25/06/2023', NULL, ''),
(5, 'tian au saumon', 'Test', 'plat3.jpg', '25/06/2023', NULL, ''),
(37, 'Aubergines farcies', 'Des aubergines sont évidées et remplies d\'une farce savoureuse à base de viande hachée, d\'oignons, d\'ail, de tomates et d\'herbes, puis cuites au four.', 'plat2.jpg', '27/06/2023', 2, 'publier'),
(38, 'Côte de bœuf à la bordelaise', 'Une côte de bœuf grillée ou rôtie, accompagnée d\'une sauce bordelaise riche à base de vin rouge, d\'échalotes et d\'herbes aromatiques.', 'plat3.jpg', '27/06/2023', 2, 'publier'),
(39, 'Tian d\'aubergines', 'Un plat français de Provence, similaire à la version méditerranéenne. Les aubergines sont tranchées et cuites avec des tomates, des oignons, de l\'ail et des herbes, puis gratinées au four.', 'plat1.jpg', '27/06/2023', 2, 'publier'),
(40, 'Entrée de poisson', 'Une entrée pas comme les autres ', 'image1.png', '27/06/2023', 1, 'publier'),
(41, 'En dessert au poisson', 'Un dessert pas comme les autres', 'image1.png', '27/06/2023', 3, 'publier'),
(26, 'TEST SAUVER', 'oooooooo', 'plat1.jpg', '26/06/2023', 2, 'sauver');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(150) NOT NULL,
  `mdp` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `mail`, `mdp`) VALUES
(1, 'Admin', 'abcd');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
