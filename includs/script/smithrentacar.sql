-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 01:56 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smithrentacar`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `nomComplet` varchar(255) NOT NULL,
  `age` int(5) NOT NULL,
  `cin` bigint(20) NOT NULL,
  `dateExpirationPermis` date NOT NULL,
  `numero` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id_client`, `nomComplet`, `age`, `cin`, `dateExpirationPermis`, `numero`, `mail`, `adresse`) VALUES
(1, 'Carl Smith ETIENNE', 21, 1037826620, '2021-10-13', '36787853', 'carlsmithetienne2000@gmail.com', 'Haiti'),
(5, 'Sainnamise Desire', 40, 1035526620, '2019-02-22', '36500075', 'sainnamisedesire1985@gmail.com', 'USA'),
(6, 'Sainnamise Desire', 40, 1035526620, '2021-10-20', '36500075', 'sainnamisedesire1985@gmail.com', 'USA'),
(7, 'Gandy Desire', 26, 1037844620, '2018-10-16', '35543643', 'desiregandy123@gmail.com', 'Haiti'),
(8, 'Marc Tyson Clebert', 27, 1007826620, '2015-10-05', '367555553', 'marctysoncleber123@gmail.com', 'Japon'),
(9, 'Wenchy Price Cadet', 22, 1007826620, '2021-10-08', '3674453', 'wenchypricecadet12@gmai.com', 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_voiture` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `heureDebut` time NOT NULL,
  `heureFin` time NOT NULL,
  `pays` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `id_client`, `id_voiture`, `dateDebut`, `dateFin`, `heureDebut`, `heureFin`, `pays`) VALUES
(1, 1, 3, '2021-09-10', '2021-10-10', '16:00:00', '16:00:00', ''),
(2, 5, 1, '2021-10-19', '2021-11-24', '12:00:00', '12:00:00', ''),
(5, 7, 4, '2021-09-05', '2021-10-10', '09:00:00', '18:00:00', ''),
(7, 1, 2, '2021-10-14', '2021-10-05', '04:10:00', '04:15:00', 'Azerbaidjan');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `id_utilisateurs`, `message`) VALUES
(2, 4, 'Bonjour Tout le monde, mespere nou byen, svp eske nou panse ap gen kou demn si Dieu veut po janm tande lari a ye la son bagay grave wi'),
(4, 9, 'Monsieur Andy di depi gen pasaj la la wi li men m'),
(5, 8, 'ebyen mespere gen pasaj man epi m bezwen jere yon bagay nan projelan');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `pseudo`, `password`) VALUES
(4, 'Smith', 'smith123'),
(5, 'Djeby', 'j1235'),
(8, 'Wenchy', 'wpc1234'),
(9, 'Tyson', 'ty2020');

-- --------------------------------------------------------

--
-- Table structure for table `voitures`
--

CREATE TABLE `voitures` (
  `id` int(11) NOT NULL,
  `imm` varchar(250) NOT NULL,
  `marque` varchar(250) NOT NULL,
  `model` varchar(255) NOT NULL,
  `annee` year(4) NOT NULL,
  `transmition` varchar(255) NOT NULL,
  `essence` varchar(250) DEFAULT NULL,
  `modeFonct` varchar(250) NOT NULL,
  `prix` double NOT NULL,
  `couleur` varchar(255) NOT NULL,
  `vitesse` varchar(255) NOT NULL,
  `disponibilite` tinyint(1) NOT NULL,
  `nombrePorte` int(5) NOT NULL,
  `nombreSiege` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voitures`
--

INSERT INTO `voitures` (`id`, `imm`, `marque`, `model`, `annee`, `transmition`, `essence`, `modeFonct`, `prix`, `couleur`, `vitesse`, `disponibilite`, `nombrePorte`, `nombreSiege`) VALUES
(1, 'LO-68-088', 'Rang Over', 'RGO-2022', 2022, 'Automatique', 'Diesel', 'hybride', 300, 'Rouge & Noire', '800 km/h', 1, 4, 5),
(2, 'LO-68-588', 'Jeep Cherokee', 'Cherokee', 2021, 'Automatique', 'Diesel', 'electrique', 250, 'Blan & Noire', '500 km/h', 1, 4, 5),
(3, 'LO-68-588', 'Tesla', 'Y', 2022, 'Automatique', NULL, 'electrique', 400, 'Rouge & Noire', '530 km/h', 1, 2, 4),
(4, 'LO-08-588', 'Ford', 'T', 2022, 'Manuel', 'Gasoline', 'essence', 200, 'Jaune & Noire', '430 km/h', 1, 4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_client` (`id_client`),
  ADD KEY `fk_voiture` (`id_voiture`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_utilisateurs` (`id_utilisateurs`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Indexes for table `voitures`
--
ALTER TABLE `voitures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `voitures`
--
ALTER TABLE `voitures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_voiture` FOREIGN KEY (`id_voiture`) REFERENCES `voitures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_id_utilisateurs` FOREIGN KEY (`id_utilisateurs`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
