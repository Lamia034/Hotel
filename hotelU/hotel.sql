-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 27 fév. 2023 à 20:59
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hotel`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `ClientId` int(100) NOT NULL,
  `ClientName` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`ClientId`, `ClientName`, `Email`, `Password`) VALUES
(1, 'admin', 'lamia@gmail.com', '$2y$10$LtkptZ7KeXgsQmb6RLFQW.ZQ4ErjbQRAXx/6aGWJkQAw3p7MjYZwG'),
(2, 'samia', 'samia@gmail.com', '$2y$10$iVNIC/Mdet0KSwTh2w1kF./rsXi.0ULaXtQzeFgmH6Tos2am0oXpW'),
(3, 'nouaman', 'nouaman@gmail.com', '$2y$10$CUdqUe/w.jmTh1rQmlkxdupv8w6a.Aalv0757flqvaDb8Am6HKt6S'),
(4, 'soumia', 'soumia@gmail.com', '$2y$10$lmXXgZG2vYFXpzLeSx6dTuXHgR1wZnd34Q3A5cJcUOCp6g.5Vuotu');

-- --------------------------------------------------------

--
-- Structure de la table `guests`
--

CREATE TABLE `guests` (
  `GuestId` int(100) NOT NULL,
  `GuestName` varchar(100) NOT NULL,
  `GuestDOB` date DEFAULT NULL,
  `ReservationId` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `guests`
--

INSERT INTO `guests` (`GuestId`, `GuestName`, `GuestDOB`, `ReservationId`) VALUES
(1, 'meriyem', '2023-03-04', 9),
(2, 'zef', '2023-02-25', 12),
(3, 'asa', '2023-02-17', 12),
(4, 'ss', '2023-02-17', 14),
(5, 'karim', '2023-02-17', 15),
(6, 'lamia', '2023-02-14', 16),
(7, '', NULL, 22),
(8, 'mimi', '2023-02-27', 23),
(9, '', NULL, 24),
(10, '', NULL, 25),
(11, '', NULL, 26),
(12, '', NULL, 27),
(13, '', NULL, 28),
(14, '', NULL, 29),
(15, '', NULL, 30);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `ReservationId` int(100) NOT NULL,
  `ClientName` varchar(30) NOT NULL,
  `RoomType` varchar(30) NOT NULL,
  `GuestsNumber` int(30) NOT NULL,
  `Arrive` date DEFAULT NULL,
  `SuiteType` varchar(50) DEFAULT NULL,
  `Leave` date DEFAULT NULL,
  `ClientId` int(100) NOT NULL,
  `ReservationPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`ReservationId`, `ClientName`, `RoomType`, `GuestsNumber`, `Arrive`, `SuiteType`, `Leave`, `ClientId`, `ReservationPrice`) VALUES
(23, 'samia', 'double', 1, '2023-02-27', '--', '2023-03-05', 4, 4000),
(24, 'samia', 'single', 0, '2023-02-27', '--', '2023-03-10', 2, 3000),
(26, 'nouaman', 'single', 0, '2023-03-11', '--', '2023-03-12', 3, 3000),
(27, 'nouaman', 'double', 0, '2023-03-05', '--', '2023-03-06', 3, 4000),
(28, 'nouaman', 'double', 0, '2023-03-05', '--', '2023-03-12', 3, 4000),
(29, 'nouaman', 'double', 0, '2023-03-12', '--', '2023-03-13', 3, 4000),
(30, 'samia', 'suite', 0, '2023-02-27', 'standard', '2023-03-04', 2, 10000);

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

CREATE TABLE `rooms` (
  `RoomId` int(100) NOT NULL,
  `RoomImg` varchar(255) NOT NULL,
  `RoomNumber` int(100) NOT NULL,
  `RoomPrice` int(255) NOT NULL,
  `RoomType` varchar(30) NOT NULL,
  `SuiteType` varchar(100) NOT NULL,
  `Arrive` date DEFAULT NULL,
  `Leave` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rooms`
--

INSERT INTO `rooms` (`RoomId`, `RoomImg`, `RoomNumber`, `RoomPrice`, `RoomType`, `SuiteType`, `Arrive`, `Leave`) VALUES
(1, '2.jpg', 2, 30, 'standard', 'normal room', NULL, NULL),
(4, '10.jpg', 6, 4000, 'double', '', NULL, NULL),
(5, '11.jpg', 3, 130000, 'suite', 'honeymoon', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ClientId`);

--
-- Index pour la table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`GuestId`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ReservationId`);

--
-- Index pour la table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`RoomId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `ClientId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `guests`
--
ALTER TABLE `guests`
  MODIFY `GuestId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `ReservationId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `RoomId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
