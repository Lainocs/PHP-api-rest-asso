-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 30 juin 2021 à 21:05
-- Version du serveur :  10.5.9-MariaDB
-- Version de PHP : 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `api_asso`
--

-- --------------------------------------------------------

--
-- Structure de la table `associations`
--

CREATE TABLE `associations` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `mail` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `discord` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `associations`
--

INSERT INTO `associations` (`id`, `nom`, `logo`, `description`, `mail`, `facebook`, `twitter`, `instagram`, `discord`, `created_at`) VALUES
(5, 'IIMPACT', 'https://scontent-cdg2-1.xx.fbcdn.net/v/t1.6435-9/70153563_1200486796803252_1677695426469298176_n.png?_nc_cat=104&amp;ccb=1-3&amp;_nc_sid=09cbfe&amp;_nc_ohc=BMjLyGB8-UUAX8Q4uKW&amp;_nc_ht=scontent-cdg2-1.xx&amp;oh=ec77a631355b9a8c5af8f2acdc807c14&amp;oe=60E26280', 'Club école pour les étudiants de l\'IIM au pôle Léonard de Vinci à la Défense. ', 'http://www.iim.fr/', 'IIMPACT', 'IIMPACT', 'PULVIIMPACT', 'IIMPACT', '2021-06-30 22:55:17');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `associations`
--
ALTER TABLE `associations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `associations`
--
ALTER TABLE `associations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
