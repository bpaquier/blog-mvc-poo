-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : dim. 05 déc. 2021 à 18:59
-- Version du serveur : 10.6.5-MariaDB-1:10.6.5+maria~focal
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `author_name`, `content`, `date`) VALUES
(11, 7, 'Nice!', 'looks like awsome', '2021-12-05'),
(12, 6, 'Random Man', 'Random comment', '2021-12-05');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `author_id` int(11) NOT NULL,
  `post_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_image`, `post_date`, `author_id`, `post_content`) VALUES
(5, 'My vacations', '61ad0b3f0bb0aCes-paysages-ensoleilles-boosteront-votre-moral-toute-l-annee.jpg', '2021-12-05', 5, 'Eum molestias cumque qui odio consectetur qui reiciendis ratione ut adipisci galisum qui doloremque quasi id officia accusantium. Et odit autem At beatae sint sit veniam facilis non labore iusto. Ut Quis quos aut officia soluta ut alias dolor et ipsa alias quo enim ullam et quibusdam fuga aut unde laborum.\r\n\r\n'),
(6, 'Hello world', '', '2021-12-05', 5, 'In consequatur voluptatem qui libero dolorem eum iusto perspiciatis. Et itaque laudantium ut nulla omnis quo vitae alias.\r\n\r\n'),
(7, 'Hello world', '61ad0bca5de59PANO.jpg', '2021-12-05', 6, 'In consequatur voluptatem qui libero dolorem eum iusto perspiciatis. Et itaque laudantium ut nulla omnis quo vitae alias.\r\n\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `role`, `password`) VALUES
(5, 'Bastien', 'Paquier', 'bastien.paquier@hetic.net', 'admin', '$2y$10$VMErBCq1iRJim8hKvrKi/ek1J21E1GVU9fo89PlN4bvAy0YAFX/pu'),
(6, 'Toto', 'toto', 'toto@hetic.net', 'default', '$2y$10$fofNAHgMlTmTg9dZWU2egu2g9uIHcGsC/9m4cDJ2fGl9nSgLyOXuy');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
