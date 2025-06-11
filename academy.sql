-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le : mer. 11 juin 2025 à 11:53
-- Version du serveur : 8.0.42
-- Version de PHP : 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `academy`
--

-- --------------------------------------------------------

--
-- Structure de la table `bestiary`
--

CREATE TABLE `bestiary` (
  `id` int NOT NULL,
  `best_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `descriptions` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `author` int DEFAULT NULL,
  `types` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `type_id` int DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `bestiary`
--

INSERT INTO `bestiary` (`id`, `best_name`, `descriptions`, `author`, `types`, `type_id`, `img`) VALUES
(37, 'fantome', 'lorem ipsum', 17, 'mort-vivant', NULL, 'fantome68483fb99641a.jpg'),
(38, 'squelette', 'lorem ipsum', 17, 'mort-vivant', NULL, 'squelette68483fcd5fcdb.jpg'),
(39, 'lamasu', 'lorem ipsum', 18, 'mort-vivant', NULL, 'lamasu68483fec47d6f.jpg'),
(40, 'liche', 'lorem ipsum', 18, 'mort-vivant', NULL, 'liche68483ff6302e1.jpg'),
(41, 'elementaire d&#039;eau', 'lorem ipsum', 19, 'aquatique', NULL, 'elementaire_d\'eau68484018f0780.jpg'),
(42, 'Kirin', 'lorem ipsum', 19, 'aquatique', NULL, 'kirin6848402279d01.jpg'),
(43, 'kappa', 'lorem ipsum', 20, 'aquatique', NULL, 'kappa6848403812040.jpg'),
(44, 'cerbere', 'lorem ipsum', 20, 'demoniaque', NULL, 'cerbere68484047d635c.jpg'),
(45, 'Seigneur des abimes', 'lorem ipsum', 23, 'demoniaque', NULL, 'seigneur des abimes684840a670022.jpg'),
(46, 'Succube', 'lorem ipsum', 23, 'demoniaque', NULL, 'succube684840b3ae7e2.jpg'),
(47, 'Tourmenteur', 'lorem ipsum', 23, 'demoniaque', NULL, 'tourmenteur684840bde1aaa.jpg'),
(48, 'Centaure', 'lorem ipsum', 21, 'mi-bete', NULL, 'centaure684840dbe124a.jpg'),
(49, 'Cyclope', 'lorem ipsum', 21, 'mi-bete', NULL, 'cyclope684840e637816.jpg'),
(50, 'Harpie', 'lorem ipsum', 21, 'mi-bete', NULL, 'harpie684840f1c80cd.jpg'),
(51, 'Minotaure', 'lorem ipsum', 21, 'mi-bete', NULL, 'minotaure684840fca15b6.png');

-- --------------------------------------------------------

--
-- Structure de la table `creature_type`
--

CREATE TABLE `creature_type` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(2, 'admin'),
(1, 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `spell`
--

CREATE TABLE `spell` (
  `id` int NOT NULL,
  `spell_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `element` varchar(50) DEFAULT NULL,
  `author_id` int DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `spell`
--

INSERT INTO `spell` (`id`, `spell_name`, `element`, `author_id`, `img`) VALUES
(30, 'Eclair', 'air', 21, 'Eclair684842721f9d8.webp'),
(31, 'Vent Violent', 'air', 21, 'Vent violent6848427d261ad.webp'),
(32, 'Elementair d&#039;air', 'air', 20, 'Elementair d\'air684842b3729cb.webp'),
(33, 'Armure de glace', 'eau', 20, 'Armure de glace684842cfe219a.webp'),
(34, 'Blizzard', 'eau', 20, 'Blizzard684842ea7164f.webp'),
(35, 'Cercle de l&#039;hiver', 'eau', 20, 'Cercle de l\'hiver684842f3b23e7.webp'),
(36, 'Elementair d&#039;eau', 'eau', 19, 'Elementaire d\'eau68484314c6434.webp'),
(37, 'Mur de glace', 'eau', 19, 'mur_de_glace684843222dfb3.webp'),
(38, 'Bouclier de feu', 'feu', 19, 'bouclier_de_feu68484334ba34a.webp'),
(39, 'Boule de feu', 'feu', 19, 'boule_de_feu6848433e75203.webp'),
(40, 'Elementaire de feu', 'feu', 19, 'Elementaire de feu6848434e129a1.webp'),
(41, 'Immolation', 'feu', 23, 'Immolation684843674ca68.webp'),
(42, 'Tempête de feu', 'feu', 23, 'Tempête de feu68484375e4ad0.webp'),
(43, 'armure celeste', 'light', 23, 'armure_celeste6848438d9a280.webp'),
(44, 'Elementaire de lumière', 'light', 23, 'Elementaire de lumière684843980c2ce.webp'),
(45, 'Purification', 'light', 18, 'Purification684843af32bb9.webp'),
(46, 'Retribution', 'light', 18, 'Retribution684843b730efe.webp'),
(47, 'Soin', 'light', 18, 'soin684843bcd2574.webp');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `wordpass` varchar(255) NOT NULL,
  `spell` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `firstname`, `email`, `wordpass`, `spell`, `role_id`) VALUES
(14, 'Sasha', 'sasha', 'giraudsasha@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$QkxQWFU2L0dLdVBaREVCWA$WBB5wVNL9BFU6nHXj1ZgHd1BcN8LTdiEI8N2JnLXRY4', 'light', 1),
(17, 'Anastasya', 'Anastasya', 'email@mail.com', '$argon2i$v=19$m=65536,t=4,p=1$cS9lZEU3cG8vTHlVcHhIdQ$H06T/Fk/DQHu2ZFMcN1triQaNWxbClH4q8ItyiE4mSQ', 'light', 1),
(18, 'Kiril', 'Kiril', 'email@mail.com', '$argon2i$v=19$m=65536,t=4,p=1$dy8vSmNyaWp5NTZOaDdSNA$fNJdRbah2gY12bLYEjhuAQzBGV3buC6ao56qMeF10GY', 'light', 1),
(19, 'Anton', 'Anton', 'email@mail.com', '$argon2i$v=19$m=65536,t=4,p=1$N0ZYVmFMcDdCNlJLT01uQQ$dPj5qk4z1N2lRPt/BEyV13szeiU03wqJvbGN8mlREbw', 'water', 1),
(20, 'Irina', 'Irina', 'email@mail.com', '$argon2i$v=19$m=65536,t=4,p=1$Uzg5SW5pUjU5S1RSQkZwUQ$8geWBWCyJBPEjkXS4lTMZRZ+EGIot3wZ/jWUQYtCE6A', 'light', 1),
(21, 'Kalindra', 'Kalindra', 'email@mail.com', '$argon2i$v=19$m=65536,t=4,p=1$cloudk9KMTNTLnFWcUhJWQ$Ek1xzI0S67Q5t8Nl+u6ZAnL4o4UKh8bBMWb04XckY7M', 'air', 1),
(22, 'Catherine', 'Catherine', 'email@mail.com', '$argon2i$v=19$m=65536,t=4,p=1$M0h1UEVXOFBiRXlFMVRsbA$X19x2S9sIIdcSQFmLzwBzUUcQO4Rm8gS8NaM29wenu0', 'light', 1),
(23, 'Jorgen', 'Jorgen', 'email@mail.com', '$argon2i$v=19$m=65536,t=4,p=1$a2F4V0lRWjdpV2wxeXB3Nw$2k8zxGhfq4NKmrb1UyPnZj8W7fnHcjVwi2WbS44vhZQ', 'fire', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_element`
--

CREATE TABLE `user_element` (
  `user_id` int NOT NULL,
  `element` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bestiary`
--
ALTER TABLE `bestiary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bestiary_author` (`author`),
  ADD KEY `fk_bestiary_type` (`type_id`);

--
-- Index pour la table `creature_type`
--
ALTER TABLE `creature_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `spell`
--
ALTER TABLE `spell`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_role` (`role_id`);

--
-- Index pour la table `user_element`
--
ALTER TABLE `user_element`
  ADD PRIMARY KEY (`user_id`,`element`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bestiary`
--
ALTER TABLE `bestiary`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `creature_type`
--
ALTER TABLE `creature_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `spell`
--
ALTER TABLE `spell`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bestiary`
--
ALTER TABLE `bestiary`
  ADD CONSTRAINT `fk_bestiary_author` FOREIGN KEY (`author`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_bestiary_type` FOREIGN KEY (`type_id`) REFERENCES `creature_type` (`id`);

--
-- Contraintes pour la table `spell`
--
ALTER TABLE `spell`
  ADD CONSTRAINT `spell_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Contraintes pour la table `user_element`
--
ALTER TABLE `user_element`
  ADD CONSTRAINT `user_element_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
