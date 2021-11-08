-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2021 at 01:29 PM
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
(1, 'Carl Smith ETIENNE', 21, 1037826620, '2021-10-13', '36787853', 'carlsmithetienne2000@gmail.com', 'Haiti', 12345),
(5, 'Sainnamise Desire', 40, 1035526620, '2019-02-22', '36500075', 'sainnamisedesire1985@gmail.com', 'USA', 55),
(6, 'Sainnamise Desire', 40, 1035526620, '2021-10-20', '36500075', 'sainnamisedesire1985@gmail.com', 'USA', 12211),
(7, 'Gandy Desire', 26, 1037844620, '2018-10-16', '35543643', 'desiregandy123@gmail.com', 'Haiti', 1),
(8, 'Marc Tyson Clebert', 27, 1007826620, '2015-10-05', '367555553', 'marctysoncleber123@gmail.com', 'Japon', 1112),
(9, 'Wenchy Price Cadet', 22, 1007826620, '2021-10-08', '3674453', 'wenchypricecadet12@gmai.com', 'Canada', 36787853);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_voiture` int(11) NOT NULL,
  `dateDebut` datetime NOT NULL,
  `dateFin` datetime NOT NULL,
  `pays` varchar(250) NOT NULL,
  `montantTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `id_client`, `id_voiture`, `dateDebut`, `dateFin`, `pays`, `montantTotal`) VALUES
(34, 1, 15, '2021-11-19 00:00:00', '2021-11-19 00:00:00', 'Haiti', 0),
(35, 1, 15, '2021-11-19 00:00:00', '2021-11-19 00:00:00', 'Haiti', 0),
(36, 1, 15, '2021-11-19 00:00:00', '2021-11-19 00:00:00', 'Haiti', 0),
(37, 5, 19, '2021-11-09 00:00:00', '2021-11-24 00:00:00', 'Haiti', 0),
(38, 5, 19, '2021-11-09 00:00:00', '2021-11-24 00:00:00', 'Haiti', 0),
(39, 9, 8, '2021-11-17 00:00:00', '2021-11-19 00:00:00', 'Bahamas', 0),
(40, 1, 1, '2021-11-11 00:00:00', '2021-12-01 00:00:00', 'Haiti', 0),
(41, 5, 13, '2021-11-10 06:16:00', '2021-11-14 03:16:00', 'Argentine', 0),
(42, 5, 18, '2021-11-08 03:35:00', '2021-11-25 03:35:00', 'Barbade', 0),
(43, 5, 19, '2021-11-02 04:16:00', '2021-11-14 16:19:00', 'Autriche', 0),
(44, 5, 17, '2021-11-08 01:07:00', '2021-11-09 01:07:00', 'Haiti', 0),
(45, 5, 5, '2021-11-16 02:58:00', '2021-11-17 02:58:00', 'Haiti', 0),
(46, 5, 17, '2021-11-16 02:59:00', '2021-11-17 02:59:00', 'Autriche', 0),
(47, 5, 5, '2021-11-16 03:02:00', '2021-11-26 03:02:00', 'Haiti', 0),
(48, 5, 8, '2021-11-07 03:10:00', '2021-11-10 03:10:00', 'Barbade', 0),
(49, 5, 18, '2021-11-25 03:13:00', '2021-11-25 03:13:00', 'Bahamas', 0),
(50, 5, 6, '2021-11-17 07:42:00', '2021-11-09 07:42:00', 'Bahamas', 5360),
(51, 5, 17, '2021-11-10 16:48:00', '2021-11-03 16:48:00', 'Haiti', 1540),
(52, 5, 19, '2021-11-10 06:15:00', '2021-11-11 06:16:00', 'Barbade', 800);

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
(40, 4, 'Baz', '2021-11-07', '07:58:53'),
(41, 4, 'Sak gen la', '2021-11-07', '07:59:07'),
(42, 8, 'poze wi man, sak regle', '2021-11-07', '08:00:05'),
(43, 4, 'Sak gen la', '2021-11-07', '08:00:20'),
(44, 8, 'M diw manfom', '2021-11-07', '08:00:48'),
(45, 4, 'jnnn', '2021-11-07', '08:20:17'),
(46, 4, 'jnnn', '2021-11-07', '08:20:47'),
(47, 4, 'jnnn', '2021-11-07', '08:21:33'),
(48, 4, 'jnnn', '2021-11-07', '08:21:55'),
(49, 4, 'jnnn', '2021-11-07', '08:22:11'),
(50, 4, 'jnnn', '2021-11-07', '08:22:38'),
(51, 4, 'jnnn', '2021-11-07', '08:23:34'),
(52, 4, 'jnnn', '2021-11-07', '08:23:47'),
(53, 4, 'jnnn', '2021-11-07', '08:34:25'),
(54, 4, 'jnnn', '2021-11-07', '08:35:06'),
(55, 4, 'jnnn', '2021-11-07', '08:36:09'),
(56, 4, 'jnnn', '2021-11-07', '08:37:48'),
(57, 4, 'baz', '2021-11-07', '08:38:16'),
(58, 4, 'baz', '2021-11-07', '08:38:55'),
(59, 4, 'baz', '2021-11-07', '08:39:14'),
(60, 4, 'baz', '2021-11-07', '08:39:28'),
(61, 4, 'baz', '2021-11-07', '08:39:42'),
(62, 4, 'baz', '2021-11-07', '08:40:19'),
(63, 4, 'baz', '2021-11-07', '08:41:09'),
(64, 4, 'baz', '2021-11-07', '08:42:02'),
(65, 4, 'baz', '2021-11-07', '08:42:41'),
(66, 4, 'baz', '2021-11-07', '08:43:08'),
(67, 4, 'baz', '2021-11-07', '08:43:46'),
(68, 4, 'baz', '2021-11-07', '08:48:10'),
(69, 79, 'Bonsoir tout moun', '2021-11-07', '09:53:40'),
(70, 82, 'Mwen rantre wi', '2021-11-08', '05:11:57'),
(71, 82, 'Mwen rantre wi', '2021-11-08', '05:12:33'),
(72, 82, 'Mwen rantre wi', '2021-11-08', '05:13:07'),
(73, 82, 'Mwen rantre wi', '2021-11-08', '05:13:29'),
(74, 82, 'Mwen rantre wi', '2021-11-08', '05:14:08'),
(75, 82, 'Mwen rantre wi', '2021-11-08', '05:14:46'),
(76, 82, 'Mwen rantre wi', '2021-11-08', '05:15:28'),
(77, 82, 'Mwen rantre wi', '2021-11-08', '05:16:22'),
(78, 82, 'Mwen rantre wi', '2021-11-08', '05:16:37');

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
(4, 'Smith', 1, 'smith123'),
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
(20, 'Nidia', 0, '2019'),
(79, 'GanBass', 0, '1234'),
(81, 'Vanel', 0, '00'),
(82, 'Stephane', 1, 'carl1234'),
(83, 'true', 0, 'true1234'),
(84, 'Alin', 0, '1111');

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
(1, 'LO-68-088', 'Rang Rover', 'Sport', 2022, 'Auto', 'Gaziline', 4, 500, 'Noire', '800 km/h', 1, 4, 4, 'Rang-removebg-preview.png'),
(2, 'LO-68-588', 'Jepp', 'Gladiator', 2020, 'Automatique', 'Diesel', 8, 1000, ' Noire', '800 km/h', 1, 4, 6, '448125-un-jeep-gladiator-willys-s-ajoute-pour-2021-removebg-preview.png'),
(3, 'LO-68-588', 'Infiniti', 'Q50', 2022, 'Auto', 'Gazoline', 1, 600, 'Rouge & Noire', '530 km/h', 1, 2, 4, '79e3979d55a0467395d79a9c56f59022_c560x0-912x686-removebg-preview (1).png'),
(4, 'LO-08-588', 'Ford', 'F-150', 2022, 'Manuel', 'Gasoline', 6, 200, 'Jaune & Noire', '430 km/h', 1, 4, 4, 'ford_f150_raptor_2021_0000-removebg-preview.png'),
(5, 'LO-198-99', 'Rang Rover', 'Vogue', 2021, 'Auto', 'Diesel', 4, 350, 'Dorer', '600 km/h', 1, 4, 4, 'fivestars-rentals_vehicules-land-rover-range-rover-vogue-01-removebg-preview.png'),
(6, 'LO-008-99', 'Rang Rover', 'Evroque', 2019, 'Manuel', 'Gazoline', 4, 670, 'Blanc', '700 km/h', 1, 4, 4, '1200px-2019_Land_Rover_Range_Rover_Evoque_R-Dynamic_2.0.png'),
(7, 'LO-228-99', 'Rang Rover', 'Vogue SE', 2022, 'Manuel', 'Diesel', 3, 550, 'Noire', '600 km/h', 1, 3, 5, 'rang-over-removebg-preview.png'),
(8, 'LO-99-009', 'Infiniti', 'QX70', 2021, 'Auto', 'Gazoline', 2, 730, 'Gris', '670 jm/h km/h', 1, 4, 4, 'Infiniti QX70.png'),
(9, 'LO-99-009', 'Infiniti', 'QX80', 2018, 'Auto', 'Diesel', 2, 750, 'wheat', '850 km/h', 1, 4, 4, '324503_2018_Infiniti_QX80-removebg-preview.png'),
(10, 'LO-99-009', 'Infiniti', 'QX50', 2020, 'Auto', 'Gazoline', 3, 720, 'Blanc', ' 600 km/h', 1, 4, 4, 'g14268_qx50_20201585157396878-removebg-preview.png'),
(11, 'LO-343-09', 'Ford', 'F-150', 2019, 'Manuel', 'Diesel', 8, 500, 'Bleu', '680 km/h', 1, 4, 5, '470050-ford-f-150-hybride-2021-le-poids-lourd-a-l-appetit-d-oiseau-removebg-preview (1).png'),
(12, 'LO-343-79', 'Ford', 'Mustang', 2020, 'Manuel', 'Gazoline', 1, 1000, 'Blanche', '980 km/h', 1, 2, 2, 'FORD-Mustang-Shelby-GT350-5339_26-removebg-preview.png'),
(13, 'LO-943-79', 'Ford', 'F-250', 2020, 'Manuel', 'Gazoline', 1, 600, 'Jaune', '980 km/h', 1, 4, 5, 'Ford_F150_Raptor_SingleCab_2013_0000.jpg7f1ed211-8e0a-4429-bb76-d11a855f6a68Original-removebg-preview.png'),
(14, 'LO-33-002', 'Fiat', 'SUV', 2020, 'Auto', 'Gazoline', 2, 470, 'Gris Noire', '560 km/h', 1, 4, 5, 'fiat-363-suvfiat__1_-removebg-preview.png'),
(15, 'LO-23-002', 'Fiat', 'PUL SE', 2021, 'Auto', 'Gazoline', 3, 570, 'Rouge', '760 km/h', 1, 4, 5, '20210602-FIAT-PULSE-02-removebg-preview.png'),
(16, 'LO-93-102', 'Fiat', 'XL-200', 2021, 'Manuel', 'Diesel', 3, 570, 'Jaune', '560 km/h', 1, 4, 4, 'Nouvelle-Fiat-Tipo-Cross-10-removebg-preview.png'),
(17, 'LO-22-102', 'Fiat', 'SL 1500', 2018, 'Auto', 'Diesel', 1, 220, 'Rouge', '460 km/h', 1, 2, 2, '81lKVnvMiyL._AC_SL1500_.png'),
(18, 'LO-22-300', 'Jepp', 'Compass', 2022, 'Auto', 'Gazoline', 4, 800, 'Rouge', '1000 km/h', 1, 4, 4, '2022-jeep-compass-trailhawk-4xe-109-1617814641-removebg-preview.png'),
(19, 'LO-22-390', 'Jepp', 'Wrangler', 2021, 'Auto', 'Gazoline', 4, 800, 'Rouge', '800 km/h', 1, 4, 4, 'Jeep_Wrangler_80th_FirecrackerRed_2p_565x330.png'),
(20, 'LO-22-110', 'Jepp', 'Wrangler', 2021, 'Auto', 'Gazoline', 0, 220, 'Bleu marine', '800 km/h', 1, 2, 2, 'jeep-cj_7-removebg-preview.png');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

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
