-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2021 at 01:43 PM
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
  `adresse` varchar(255) NOT NULL,
  `codeConnexion` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id_client`, `nomComplet`, `age`, `cin`, `dateExpirationPermis`, `numero`, `mail`, `adresse`, `codeConnexion`) VALUES
(1, 'Carl Smith ETIENNE', 21, 1037826620, '2021-10-13', '36787853', 'carlsmithetienne2000@gmail.com', 'Haiti', 0),
(5, 'Sainnamise Desire', 40, 1035526620, '2019-02-22', '36500075', 'sainnamisedesire1985@gmail.com', 'USA', 0),
(6, 'Sainnamise Desire', 40, 1035526620, '2021-10-20', '36500075', 'sainnamisedesire1985@gmail.com', 'USA', 0),
(7, 'Gandy Desire', 26, 1037844620, '2018-10-16', '35543643', 'desiregandy123@gmail.com', 'Haiti', 0),
(8, 'Marc Tyson Clebert', 27, 1007826620, '2015-10-05', '367555553', 'marctysoncleber123@gmail.com', 'Japon', 0),
(9, 'Wenchy Price Cadet', 22, 1007826620, '2021-10-08', '3674453', 'wenchypricecadet12@gmai.com', 'Canada', 0);

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
(7, 1, 2, '2021-10-14', '2021-10-05', '04:10:00', '04:15:00', 'Azerbaidjan'),
(10, 1, 2, '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 'Bolivie'),
(11, 1, 19, '2021-09-30', '2021-10-12', '08:24:00', '09:58:00', 'Haiti'),
(12, 1, 19, '2021-10-15', '2021-10-18', '11:00:00', '07:05:00', 'Haiti'),
(13, 1, 19, '2021-10-15', '2021-10-18', '11:00:00', '07:05:00', 'Haiti'),
(14, 1, 3, '2021-10-17', '2021-10-22', '10:02:00', '00:02:00', 'Allemagne');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  `message` text NOT NULL,
  `dateDenvoi` date NOT NULL,
  `heureDenvoi` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `id_utilisateurs`, `message`, `dateDenvoi`, `heureDenvoi`) VALUES
(1, 5, 'kyugo8o9', '2021-10-25', '12:10:40'),
(2, 5, 'Bonjour', '2021-10-25', '03:43:10'),
(3, 5, 'Komanw ye', '2021-10-25', '03:43:33'),
(4, 5, 'Komanw ye', '2021-10-25', '03:44:51'),
(5, 8, 'apa nou nap frap', '2021-10-25', '03:45:21'),
(6, 5, 'Komanw ye', '2021-10-25', '03:45:40'),
(7, 5, 'sak regle men\r\n', '2021-10-25', '03:46:01'),
(8, 8, 'apa nou nap frap', '2021-10-25', '03:46:24'),
(9, 8, 'Nap gad sann k f\r\n', '2021-10-25', '03:46:57'),
(10, 5, 'sak regle men\r\n', '2021-10-25', '03:47:21'),
(11, 8, 'Dim non koman madan\'m ou ye', '2021-10-25', '03:47:53'),
(12, 5, 'sak regle men\r\n', '2021-10-25', '03:48:13'),
(13, 4, 'bonjour\r\n', '2021-10-28', '07:36:13'),
(14, 4, 'wanfom', '2021-10-28', '07:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `pseudo`, `statut`, `password`) VALUES
(4, 'Smith', 0, 'smith123'),
(5, 'Djeby', 0, 'j1235'),
(8, 'Wenchy', 0, 'wpc1234'),
(9, 'Tyson', 0, 'ty2020'),
(11, 'TOTO', 0, '12345'),
(12, 'Nina', 0, '123'),
(13, 'Lola', 0, '0000'),
(14, 'Lalo', 0, '1111'),
(15, 'pipo', 0, '2222'),
(16, 'Woodly', 0, '3333'),
(17, 'Mama', 0, '1222'),
(18, 'Lima', 0, '0101'),
(19, 'Lissanne', 0, '2020'),
(20, 'Nidia', 0, '2019');

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
  `nbMalette` int(11) NOT NULL,
  `prix` double NOT NULL,
  `couleur` varchar(255) NOT NULL,
  `vitesse` varchar(255) NOT NULL,
  `disponibilite` tinyint(1) NOT NULL,
  `nombrePorte` int(5) NOT NULL,
  `nombreSiege` int(5) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voitures`
--

INSERT INTO `voitures` (`id`, `imm`, `marque`, `model`, `annee`, `transmition`, `essence`, `nbMalette`, `prix`, `couleur`, `vitesse`, `disponibilite`, `nombrePorte`, `nombreSiege`, `img`) VALUES
(1, 'LO-68-088', 'Rang Rover', 'Sport', 2022, 'Auto', 'Gaziline', 4, 500, 'Noire', '800 km/h', 1, 4, 4, 'Rang.jpg'),
(2, 'LO-68-588', 'Jepp', 'Gladiator', 2020, 'Automatique', 'Diesel', 8, 1000, ' Noire', '800 km/h', 1, 4, 6, '2020-jeep-gladiator-6x6-super-villain-is-a-sinister-140000-monster-146923-7.jpeg'),
(3, 'LO-68-588', 'Infiniti', 'Q50', 2022, 'Auto', 'Gazoline', 1, 600, 'Rouge & Noire', '530 km/h', 1, 2, 4, '2020-infiniti-q50-mmp-1-1568910523.jpg'),
(4, 'LO-08-588', 'Ford', 'F-150', 2022, 'Manuel', 'Gasoline', 6, 200, 'Jaune & Noire', '430 km/h', 1, 4, 4, 'ford_f150_raptor_2021_0000.jpg'),
(5, 'LO-198-99', 'Rang Rover', 'Vogue', 2021, 'Auto', 'Diesel', 4, 350, 'Dorer', '600 km/h', 1, 4, 4, 'Vogue.jfif'),
(6, 'LO-008-99', 'Rang Rover', 'Evroque', 2019, 'Manuel', 'Gazoline', 4, 670, 'Blanc', '700 km/h', 1, 4, 4, '1200px-2019_Land_Rover_Range_Rover_Evoque_R-Dynamic_2.0.jpg'),
(7, 'LO-228-99', 'Rang Rover', 'Vogue SE', 2022, 'Manuel', 'Diesel', 3, 550, 'Noire', '600 km/h', 1, 3, 5, 'rang-over.png'),
(8, 'LO-99-009', 'Infiniti', 'QX70', 2021, 'Auto', 'Gazoline', 2, 730, 'Gris', '670 jm/h km/h', 1, 4, 4, '79e3979d55a0467395d79a9c56f59022_c560x0-912x686.jpg'),
(9, 'LO-99-009', 'Infiniti', 'QX80', 2018, 'Auto', 'Diesel', 2, 750, 'wheat', '850 km/h', 1, 4, 4, '324503_2018_Infiniti_QX80.jpg'),
(10, 'LO-99-009', 'Infiniti', 'QX50', 2020, 'Auto', 'Gazoline', 3, 720, 'Blanc', ' 600 km/h', 1, 4, 4, 'g14268_qx50_20201585157396878.jpg'),
(11, 'LO-343-09', 'Ford', 'F-150', 2019, 'Manuel', 'Diesel', 8, 500, 'Bleu', '680 km/h', 1, 4, 5, '470050-ford-f-150-hybride-2021-le-poids-lourd-a-l-appetit-d-oiseau.jpeg'),
(12, 'LO-343-79', 'Ford', 'Mustang', 2020, 'Manuel', 'Gazoline', 1, 1000, 'Blanche', '980 km/h', 1, 2, 2, 'FORD-Mustang-Shelby-GT350-5339_26.jpg'),
(13, 'LO-943-79', 'Ford', 'F-250', 2020, 'Manuel', 'Gazoline', 1, 600, 'Jaune', '980 km/h', 1, 4, 5, 'Ford_F150_Raptor_SingleCab_2013_0000.jpg7f1ed211-8e0a-4429-bb76-d11a855f6a68Original.jpg'),
(14, 'LO-33-002', 'Fiat', 'SUV', 2020, 'Auto', 'Gazoline', 2, 470, 'Gris Noire', '560 km/h', 1, 4, 5, 'fiat-363-suvfiat (1).jpg'),
(15, 'LO-23-002', 'Fiat', 'PUL SE', 2021, 'Auto', 'Gazoline', 3, 570, 'Rouge', '760 km/h', 1, 4, 5, '20210602-FIAT-PULSE-02.jpg'),
(16, 'LO-93-102', 'Fiat', 'XL-200', 2021, 'Manuel', 'Diesel', 3, 570, 'Jaune', '560 km/h', 1, 4, 4, 'Nouvelle-Fiat-Tipo-Cross-10.jpg'),
(17, 'LO-22-102', 'Fiat', 'SL 1500', 2018, 'Auto', 'Diesel', 1, 220, 'Rouge', '460 km/h', 1, 2, 2, '81lKVnvMiyL._AC_SL1500_.jpg'),
(18, 'LO-22-300', 'Jepp', 'Compass', 2022, 'Auto', 'Gazoline', 4, 800, 'Rouge', '1000 km/h', 1, 4, 4, '2022-jeep-compass-trailhawk-4xe-109-1617814641.jpg'),
(19, 'LO-22-390', 'Jepp', 'Wrangler', 2021, 'Auto', 'Gazoline', 4, 800, 'Rouge', '800 km/h', 1, 4, 4, 'Jeep_Wrangler_80th_FirecrackerRed_2p_565x330.png'),
(20, 'LO-22-110', 'Jepp', 'Wrangler', 2021, 'Auto', 'Gazoline', 0, 220, 'Bleu marine', '800 km/h', 1, 2, 2, 'jeep-cj_7.jpg');

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
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `voitures`
--
ALTER TABLE `voitures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
