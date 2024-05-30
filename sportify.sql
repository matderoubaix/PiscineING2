-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 30 mai 2024 à 13:59
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS `sportify`;
CREATE DATABASE `sportify`;

-- Path: base.sql
USE `sportify`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sportify`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `emetteur_id` int NOT NULL,
  `recepteur_id` int NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `emetteur_id` (`emetteur_id`),
  KEY `recepteur_id` (`recepteur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`id`, `emetteur_id`, `recepteur_id`, `date`, `heure`, `message`) VALUES
(1, 1, 2, '2021-01-01', '12:00:00', 'Hello, Jane!'),
(2, 2, 1, '2021-01-01', '12:01:00', 'Hi, John!'),
(3, 1, 2, '2021-01-01', '12:02:00', 'How are you?'),
(4, 2, 1, '2021-01-01', '12:03:00', 'I am good, thanks!'),
(5, 1, 2, '2021-01-01', '12:04:00', 'What are you up to?'),
(6, 2, 1, '2021-01-01', '12:05:00', 'Just working on some projects.'),
(7, 1, 2, '2021-01-01', '12:06:00', 'Sounds interesting!'),
(8, 2, 1, '2021-01-01', '12:07:00', 'Yes, it is!'),
(9, 1, 2, '2021-01-01', '12:08:00', 'Well, I have to go now. Talk to you later!'),
(10, 2, 1, '2021-01-01', '12:09:00', 'Sure, talk to you later!');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` int NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `carte_etudiant` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'photo.jpg',
  `typeCompte` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `email`, `nom`, `prenom`, `ville`, `code_postal`, `telephone`, `carte_etudiant`, `mdp`, `photo`, `typeCompte`) VALUES
(1, 'john.doe@example.com', 'John', 'Doe', 'New York', 12345, '123-456-7890', 'ABC123', 'password123', 'photo.png', 'client'),
(2, 'jane.smith@example.com', 'Jane', 'Smith', 'Los Angeles', 67890, '987-654-3210', 'DEF456', 'password456', 'photo.png', 'client'),
(3, 'alice.johnson@example.com', 'Alice', 'Johnson', 'Chicago', 54321, '111-222-3333', 'GHI789', 'password789', 'photo.png', 'client'),
(4, 'bob.williams@example.com', 'Bob', 'Williams', 'Houston', 98765, '444-555-6666', 'JKL012', 'password012', 'photo.png', 'client'),
(5, 'emily.brown@example.com', 'Emily', 'Brown', 'San Francisco', 13579, '777-888-9999', 'MNO345', 'password345', 'photo.png', 'client'),
(6, 'michael.jones@example.com', 'Michael', 'Jones', 'Seattle', 24680, '000-111-2222', 'PQR678', 'password678', 'photo.png', 'client'),
(7, 'sophia.davis@example.com', 'Sophia', 'Davis', 'Boston', 86420, '333-444-5555', 'STU901', 'password901', 'photo.png', 'client'),
(8, 'daniel.miller@example.com', 'Daniel', 'Miller', 'Dallas', 75309, '666-777-8888', 'VWX234', 'password234', 'photo.png', 'client'),
(9, 'olivia.wilson@example.com', 'Olivia', 'Wilson', 'Miami', 98765, '999-000-1111', 'YZA567', 'password567', 'photo.png', 'client'),
(10, 'william.taylor@example.com', 'William', 'Taylor', 'Phoenix', 12345, '222-333-4444', 'BCD890', 'password890', 'photo.png', 'client'),
(11, 'john.doe2@example.com', 'John', 'Doe', 'New York', 12345, '123-456-7890', '', 'password123', 'photo.png', 'prof'),
(12, 'jane.smith2@example.com', 'Jane', 'Smith', 'Los Angeles', 67890, '987-654-3210', '', 'password456', 'photo.png', 'prof'),
(13, 'alice.johnson2@example.com', 'Alice', 'Johnson', 'Chicago', 54321, '111-222-3333', '', 'password789', 'photo.png', 'prof'),
(14, 'emily.brown2@example.com', 'Emily', 'Brown', 'Houston', 13579, '222-333-4444', '', 'password987', 'photo.png', 'prof'),
(15, 'michael.davis2@example.com', 'Michael', 'Davis', 'Phoenix', 24680, '333-444-5555', '', 'password654', 'photo.png', 'prof'),
(16, 'chris.wilson2@example.com', 'Chris', 'Wilson', 'Philadelphia', 11223, '444-555-6666', '', 'password321', 'photo.png', 'prof'),
(17, 'david.martinez2@example.com', 'David', 'Martinez', 'San Antonio', 99887, '555-666-7777', '', 'password111', 'photo.png', 'prof'),
(18, 'sarah.taylor2@example.com', 'Sarah', 'Taylor', 'San Diego', 77654, '666-777-8888', '', 'password222', 'photo.png', 'prof'),
(19, 'laura.anderson2@example.com', 'Laura', 'Anderson', 'Dallas', 33445, '777-888-9999', '', 'password333', 'photo.png', 'prof'),
(20, 'james.thomas2@example.com', 'James', 'Thomas', 'San Jose', 55667, '888-999-0000', '', 'password444', 'photo.png', 'prof'),
(21, 'jessica.moore2@example.com', 'Jessica', 'Moore', 'Austin', 77889, '999-000-1111', '', 'password555', 'photo.png', 'prof'),
(22, 'daniel.jackson2@example.com', 'Daniel', 'Jackson', 'Jacksonville', 11234, '000-111-2222', '', 'password666', 'photo.png', 'prof'),
(23, 'olivia.white2@example.com', 'Olivia', 'White', 'Fort Worth', 22345, '111-222-3334', '', 'password777', 'photo.png', 'prof');

-- --------------------------------------------------------

--
-- Structure de la table `coordonnéebancaire`
--

DROP TABLE IF EXISTS `coordonnéebancaire`;
CREATE TABLE IF NOT EXISTS `coordonnéebancaire` (
  `type_de_paiement` varchar(255) NOT NULL,
  `numero_de_carte` varchar(255) NOT NULL,
  `date_expiration` date NOT NULL,
  `code_de_securite` int NOT NULL,
  `client_id` int NOT NULL,
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `duree` int NOT NULL,
  `prof_id` int NOT NULL,
  `prix` int NOT NULL DEFAULT '0',
  `sport_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `prof_id` (`prof_id`),
  KEY `sport_id` (`sport_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `nom`, `description`, `date`, `heure`, `duree`, `prof_id`, `prix`, `sport_id`) VALUES
(1, 'Yoga Class', 'Beginner yoga class', '2021-01-01', '10:00:00', 58, 11, 10, 1),
(2, 'Pilates Class', 'Intermediate pilates class', '2021-01-02', '11:00:00', 58, 11, 15, 2),
(3, 'Zumba Class', 'Advanced zumba class', '2021-01-03', '12:00:00', 58, 11, 20, 3),
(4, 'Boxing Class', 'Beginner boxing class', '2021-01-04', '13:00:00', 58, 11, 25, 4),
(5, 'Cycling Class', 'Intermediate cycling class', '2021-01-05', '14:00:00', 58, 11, 30, 5),
(6, 'Swimming Class', 'Advanced swimming class', '2021-01-06', '15:00:00', 58, 11, 35, 6),
(7, 'Running Class', 'Beginner running class', '2021-01-07', '16:00:00', 58, 11, 40, 7),
(8, 'Weightlifting Class', 'Intermediate weightlifting class', '2021-01-08', '17:00:00', 58, 11, 45, 8),
(9, 'Martial Arts Class', 'Advanced martial arts class', '2021-01-09', '18:00:00', 58, 11, 50, 9),
(10, 'Dance Class', 'Beginner dance class', '2021-01-10', '19:00:00', 58, 11, 55, 10);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `cours_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `cours_id` (`cours_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `client_id`, `cours_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

DROP TABLE IF EXISTS `salles`;
CREATE TABLE IF NOT EXISTS `salles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cours_id` int NOT NULL,
  `capacite` int NOT NULL,
  `horaires` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `photo_salle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cours_id` (`cours_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `salles`
--

INSERT INTO `salles` (`id`, `nom`, `adresse`, `telephone`, `email`, `cours_id`, `capacite`, `horaires`, `photo_salle`) VALUES
(2, 'Salle1', 'somewhere_somewhere', '+33655555555', 'salle1@no.no', 7, 500, '9h / 22h', '../coach.jpg'),
(3, 'salle xp 32', '5 rue de c est toujours pas ici PARIS, FRANCE', '+ 1234567890', 'onestfermé@nop.com', 9, 15, '10h / 9h55', '../coach.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

DROP TABLE IF EXISTS `sport`;
CREATE TABLE IF NOT EXISTS `sport` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `compétition` tinyint(1) NOT NULL,
  `image_sport` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `sport`
--

INSERT INTO `sport` (`id`, `nom`, `description`, `compétition`, `image_sport`) VALUES
(1, 'Yoga', 'Relaxation and stretching', 1, '../coach.jpg'),
(2, 'Pilates', 'Core strength and flexibility', 0, '../coach.jpg'),
(3, 'Zumba', 'Dance and cardio', 1, '../coach.jpg'),
(4, 'Boxing', 'Strength and conditioning', 0, '../coach.jpg'),
(5, 'Cycling', 'Cardio and endurance', 1, '../coach.jpg'),
(6, 'Swimming', 'Endurance and technique', 0, '../coach.jpg'),
(7, 'Running', 'Cardio and endurance', 1, '../coach.jpg'),
(8, 'Weightlifting', 'Strength and muscle building', 0, '../coach.jpg'),
(9, 'Martial Arts', 'Self-defense and discipline', 1, '../coach.jpg'),
(10, 'Dance', 'Expression and movement', 0, '../coach.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `sportclient`
--

DROP TABLE IF EXISTS `sportclient`;
CREATE TABLE IF NOT EXISTS `sportclient` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sport_id` int NOT NULL,
  `client_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sport_id` (`sport_id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `sportclient`
--

INSERT INTO `sportclient` (`id`, `sport_id`, `client_id`) VALUES
(1, 1, 11),
(2, 2, 11),
(3, 3, 11),
(4, 4, 11),
(5, 5, 11),
(6, 6, 11),
(7, 7, 11),
(8, 8, 11),
(9, 9, 11),
(10, 10, 11);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`emetteur_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`recepteur_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `coordonnéebancaire`
--
ALTER TABLE `coordonnéebancaire`
  ADD CONSTRAINT `coordonnéebancaire_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`prof_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `cours_ibfk_2` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`);

--
-- Contraintes pour la table `salles`
--
ALTER TABLE `salles`
  ADD CONSTRAINT `salles_ibfk_1` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`);

--
-- Contraintes pour la table `sportclient`
--
ALTER TABLE `sportclient`
  ADD CONSTRAINT `sportclient_ibfk_1` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`id`),
  ADD CONSTRAINT `sportclient_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
