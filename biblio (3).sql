-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 18 jan. 2026 à 13:45
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `biblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `emprunter`
--

CREATE TABLE `emprunter` (
  `id` int(11) NOT NULL,
  `CodeEtudiant` int(11) DEFAULT NULL,
  `CodeLivre` int(11) DEFAULT NULL,
  `DateEmprunt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `CodeEtudiant` int(11) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `Adresse` varchar(255) DEFAULT NULL,
  `Classe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `CodeLivre` int(11) NOT NULL,
  `Titre` varchar(255) DEFAULT NULL,
  `Auteur` varchar(255) DEFAULT NULL,
  `DateEdition` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`CodeLivre`, `Titre`, `Auteur`, `DateEdition`) VALUES
(1, 'Reaction en chaine', 'Blake pierce', '2016-07-20'),
(2, 'La queue entre les jambes', 'Blake pierce', '0000-00-00'),
(3, 'Reaction en chaine', 'Blake pierce', '2016-07-20'),
(4, 'La queue entre les jambes', 'Blake pierce', '0000-00-00'),
(5, 'Pour toujours, avec toi', 'Sophie love', '0000-00-00'),
(6, 'Le monde du reseau', 'Gilbert Moisio', '0000-00-00'),
(7, 'Pour toujours, avec toi', 'Sophie love', '0000-00-00'),
(8, 'Le monde du reseau', 'Gilbert Moisio', '0000-00-00'),
(9, 'Windows 11 pour les nuls', 'Andy Rathbone et Jean-Pierre Cano', '0000-00-00'),
(10, 'Trucs et astuces windows 10 pour les nuls', 'Andy Rathbone', '0000-00-00'),
(11, 'Les miserables', 'Victor Hugo', '0000-00-00'),
(12, 'Woman down', 'Colleen Hoover', '0000-00-00'),
(13, 'Resolu', 'Blake pierce', '0000-00-00'),
(14, 'Les fiances de l\'hiver', 'Christelle Dabos', '0000-00-00'),
(15, 'Riviere maudite', 'Douglas Preston et Lincoln Child', '0000-00-00'),
(16, 'Le sang et la cendre', 'Jennifer L. Armentrout', '0000-00-00'),
(17, 'Le couple d\'a cote', 'Shari Lapena', '0000-00-00'),
(18, 'Derniers adieux', 'Cecile Deniard et Lisa Gardner', '0000-00-00'),
(19, 'Le manuscrit inacheve', 'Franck Thilliez', '0000-00-00'),
(20, 'Par la force des choses', 'Claire Norton', '0000-00-00'),
(21, 'Famille parfaite', 'Cecile Deniard et Lisa Gardner', '0000-00-00'),
(22, 'Les assasins', 'R.J. Ellory', '0000-00-00'),
(23, 'Zero contrainte pour maigrir . Surtout, ne faites pas de regime', 'Jimmy Mohamed', '0000-00-00'),
(24, 'Louve noire', 'Juan Gomez-Jurado', '0000-00-00'),
(25, 'Mon mari', 'Maud Ventura', '0000-00-00'),
(26, 'Le serment des limbres', 'Jean-Christophe Grange', '0000-00-00'),
(27, 'Les petits secrets d\'Emma', 'Sophie Kinsella', '0000-00-00'),
(28, 'Reparer les vivants', 'Maylis de kerangal', '0000-00-00'),
(29, 'Les morsures de l\'ombre', 'Karine Giebel', '0000-00-00'),
(30, 'Trois vies par semaine', 'Michel Bussi', '0000-00-00'),
(31, 'Windows 11 pour les nuls', 'Andy Rathbone et Jean-Pierre Cano', '0000-00-00'),
(32, 'Trucs et astuces windows 10 pour les nuls', 'Andy Rathbone', '0000-00-00'),
(33, 'Les miserables', 'Victor Hugo', '0000-00-00'),
(34, 'Woman down', 'Colleen Hoover', '0000-00-00'),
(35, 'Resolu', 'Blake pierce', '0000-00-00'),
(36, 'Les fiances de l\'hiver', 'Christelle Dabos', '0000-00-00'),
(37, 'Riviere maudite', 'Douglas Preston et Lincoln Child', '0000-00-00'),
(38, 'Le sang et la cendre', 'Jennifer L. Armentrout', '0000-00-00'),
(39, 'Le couple d\'a cote', 'Shari Lapena', '0000-00-00'),
(40, 'Derniers adieux', 'Cecile Deniard et Lisa Gardner', '0000-00-00'),
(41, 'Le manuscrit inacheve', 'Franck Thilliez', '0000-00-00'),
(42, 'Par la force des choses', 'Claire Norton', '0000-00-00'),
(43, 'Famille parfaite', 'Cecile Deniard et Lisa Gardner', '0000-00-00'),
(44, 'Les assasins', 'R.J. Ellory', '0000-00-00'),
(45, 'Zero contrainte pour maigrir . Surtout, ne faites pas de regime', 'Jimmy Mohamed', '0000-00-00'),
(46, 'Louve noire', 'Juan Gomez-Jurado', '0000-00-00'),
(47, 'Mon mari', 'Maud Ventura', '0000-00-00'),
(48, 'Le serment des limbres', 'Jean-Christophe Grange', '0000-00-00'),
(49, 'Les petits secrets d\'Emma', 'Sophie Kinsella', '0000-00-00'),
(50, 'Reparer les vivants', 'Maylis de kerangal', '0000-00-00'),
(51, 'Les morsures de l\'ombre', 'Karine Giebel', '0000-00-00'),
(52, 'Trois vies par semaine', 'Michel Bussi', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `NomUtilisateur` varchar(255) NOT NULL,
  `MotDePasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CodeEtudiant` (`CodeEtudiant`),
  ADD KEY `CodeLivre` (`CodeLivre`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`CodeEtudiant`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`CodeLivre`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `emprunter`
--
ALTER TABLE `emprunter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `CodeEtudiant` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `CodeLivre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD CONSTRAINT `emprunter_ibfk_1` FOREIGN KEY (`CodeEtudiant`) REFERENCES `etudiant` (`CodeEtudiant`),
  ADD CONSTRAINT `emprunter_ibfk_2` FOREIGN KEY (`CodeLivre`) REFERENCES `livre` (`CodeLivre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
