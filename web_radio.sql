-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 11 nov. 2020 à 21:59
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `web_radio`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `podcast_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `podcasts`
--

CREATE TABLE `podcasts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_add` datetime NOT NULL DEFAULT current_timestamp(),
  `picture_file` varchar(255) NOT NULL DEFAULT 'default_picture.jpg',
  `sound_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `podcasts`
--

INSERT INTO `podcasts` (`id`, `title`, `content`, `date_add`, `picture_file`, `sound_file`) VALUES
(27, 'Sting', 'Sting, de son vrai nom Gordon Matthew Thomas Sumner, né le 2 octobre 1951 à Wallsend, est un auteur-compositeur-interprète et musicien britannique, brièvement instituteur et occasionnellement acteur.', '2020-11-11 21:24:48', 'img/picture_file/1605126288.jpg', 'sound_file/1605126288.mp3'),
(28, 'Robert Trujillo', 'Robert Trujillo est un bassiste américain. Il a joué pour Suicidal Tendencies, Mass Mental, Infectious Grooves, Black Label Society, Jerry Cantrell et Ozzy Osbourne avant de rejoindre Metallica en 2003.', '2020-11-11 21:28:35', 'img/picture_file/1605126515.jpg', 'sound_file/1605126515.mp3'),
(29, 'Lemmy Kilmister', 'an Fraser Kilmister dit Lemmy Kilmister, né le 24 décembre 1945 à Burslem (Angleterre, Royaume-Uni) et mort le 28 décembre 2015 à Los Angeles (Californie, États-Unis), est un musicien britannique, célèbre pour avoir été le fondateur, bassiste, chanteur, parolier principal et seul membre permanent du groupe de heavy metal Motörhead jusqu\'à sa mort, et pour avoir été membre du groupe de space rock Hawkwind. Sa voix éraillée voire gutturale, son physique imposant, sa pilosité faciale caractéristique et son attitude rock \'n\' roll en font une figure légendaire du heavy metal. Pendant un temps, il porta le nom de Ian Willis, avant d\'opter pour « Lemmy ».', '2020-11-11 21:30:00', 'img/picture_file/1605126600.jpg', 'sound_file/1605126600.mp3'),
(30, 'Terence &quot;Geezer&quot; Butler', 'Terence &quot;Geezer&quot; Butler (né Terence Michael Joseph &quot;Geezer&quot; Butler le 17 juillet 1949 à Birmingham en Angleterre) est le bassiste du groupe Black Sabbath. ', '2020-11-11 21:32:24', 'img/picture_file/1605126744.jpg', 'sound_file/1605126744.mp3'),
(31, 'Jaco Pastorius', 'John Francis Anthony Pastorius III, plus connu sous le nom de Jaco Pastorius, est un bassiste de jazz et jazz-rock américain, né le 1ᵉʳ décembre 1951 à Norristown et mort le 21 septembre 1987 après avoir été violemment battu dix jours plus tôt à Fort Lauderdale.', '2020-11-11 21:34:19', 'img/picture_file/1605126859.jpg', 'sound_file/1605126859.mp3'),
(32, 'Flea', 'Michael Peter « Flea » Balzary est un bassiste, pianiste, trompettiste et acteur australo-américain né le 16 octobre 1962 à Melbourne, en Australie. Il est l\'un des membres fondateurs du groupe de rock Red Hot Chili Peppers, avec le chanteur Anthony Kiedis. Il est surnommé Flea (puce en anglais) à cause de sa petite taille et de sa façon assez sautillante d\'occuper l\'espace d\'une scène.  Le magazine Rolling Stone le classe second meilleur bassiste de tous les temps derrière John Entwistle1. ', '2020-11-11 21:36:57', 'img/picture_file/1605127017.jpg', 'sound_file/1605127017.mp3'),
(33, 'Melissa Auf der Maur', 'Melissa Gaboriau Auf der Maur est une musicienne de rock, photographe, chanteuse et actrice canadienne née le 17 mars 1972 à Montréal, Québec. ', '2020-11-11 21:38:22', 'img/picture_file/1605127102.jpg', 'sound_file/1605127102.mp3'),
(34, 'D\'arcy Wretzky', 'D\'arcy Elizabeth Wretzky-Brown, née le 1er mai 1968 à South Haven, Michigan, aux États-Unis, est une musicienne de rock américain, connue comme bassiste au sein de l\'un des plus populaires groupes de rock alternatif des années 1990, les Smashing Pumpkins. ', '2020-11-11 21:39:19', 'img/picture_file/1605127159.jpg', 'sound_file/1605127159.mp3'),
(35, 'Rhonda Smith', 'Rhonda Smith est une bassiste canadienne, surtout connue pour son travail avec Prince. ', '2020-11-11 21:40:22', 'img/picture_file/1605127222.jpg', 'sound_file/1605127222.mp3'),
(36, 'Gaby', 'Gaby Bassiste est, né à Paris en 4 avril 1954, est un musicien, auteur compositeur et interprète français, membres des groupes The Lazies, Sunburst', '2020-11-11 21:50:28', 'img/picture_file/1605127828.jpg', 'sound_file/1605127828.mp3');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cityZIp` varchar(10) NOT NULL,
  `city` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'default.png',
  `role` enum('peon','moderateur','admin') NOT NULL DEFAULT 'peon'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone`, `address`, `cityZIp`, `city`, `password`, `avatar`, `role`) VALUES
(10, 'aaa', 'zzz', 'aaa@aaa.aa', '0123456789', 'd 54fd dfsfd', '12345', 'sderrtt', '$2y$10$2nF/jebaU/wIKUxvwy2y9.sUV1eGun8UyLer34KcMGFRT7/zuJn/.', 'default.png', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `podcasts`
--
ALTER TABLE `podcasts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `podcasts`
--
ALTER TABLE `podcasts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
