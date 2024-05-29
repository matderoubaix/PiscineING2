DROP DATABASE IF EXISTS `sportify`;
CREATE DATABASE `sportify`;

-- Path: base.sql
USE `sportify`;
CREATE TABLE `Client` (
  `nom` VARCHAR(255) NOT NULL,
  `prenom` VARCHAR(255) NOT NULL,
  `ville` VARCHAR(255) NOT NULL,
  `code_postal` INT(11) NOT NULL,
  `telephone` VARCHAR(255) NOT NULL,
  `carte_etudiant` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `mdp` VARCHAR(255) NOT NULL,
  `photo` VARCHAR(255) NOT NULL DEFAULT 'photo.jpg',
  `typeCompte` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Sport` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `SportClient` (
    `sport_id` INT(11) NOT NULL,
    `client_email` INT(11) NOT NULL,
    PRIMARY KEY (`sport_id`, `client_email`),
    FOREIGN KEY (`sport_id`) REFERENCES `Sport`(`id`),
    FOREIGN KEY (`client_email`) REFERENCES `Client`(`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Cours` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `date` DATE NOT NULL,
    `heure` TIME NOT NULL,
    `duree` INT(11) NOT NULL,
    `prof_email` INT(11) NOT NULL,
    `prix` INT(11) NOT NULL DEFAULT '0',
    `sport_id` INT(11) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`prof_email`) REFERENCES `Client`(`email`),
    FOREIGN KEY (`sport_id`) REFERENCES `Sport`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Reservation` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `client_email` INT(11) NOT NULL,
    `cours_id` INT(11) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`client_email`) REFERENCES `Client`(`email`),
    FOREIGN KEY (`cours_id`) REFERENCES `Cours`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Salles` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(255) NOT NULL,
    `adresse` VARCHAR(255) NOT NULL,
    `telephone` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `cours_id` INT(11) NOT NULL,
    `capacite` INT(11) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`cours_id`) REFERENCES `Cours`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `CoordonnéeBancaire` (
    `type_de_paiement` VARCHAR(255) NOT NULL,
    `numero_de_carte` VARCHAR(255) NOT NULL,
    `date_expiration` DATE NOT NULL,
    `code_de_securite` INT(11) NOT NULL,
    `client_email` INT(11) NOT NULL,
    FOREIGN KEY (`client_email`) REFERENCES `Client`(`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Chat` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `emetteur_email` INT(11) NOT NULL,
    `recepteur_email` INT(11) NOT NULL,
    `date` DATE NOT NULL,
    `heure` TIME NOT NULL,
    `message` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`emetteur_email`) REFERENCES `Client`(`email`),
    FOREIGN KEY (`recepteur_email`) REFERENCES `Client`(`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;