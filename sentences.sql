-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2020 at 10:30 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sentences`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20200902104629', '2020-09-02 11:16:47', 761),
('DoctrineMigrations\\Version20200902104902', '2020-09-02 11:24:04', 654),
('DoctrineMigrations\\Version20200902111516', '2020-09-02 11:24:04', 1970),
('DoctrineMigrations\\Version20200902113826', '2020-09-02 11:38:36', 436),
('DoctrineMigrations\\Version20200902123726', '2020-09-02 12:37:32', 761),
('DoctrineMigrations\\Version20200903100941', '2020-09-03 10:09:47', 1502),
('DoctrineMigrations\\Version20200903102411', '2020-09-03 10:24:19', 800),
('DoctrineMigrations\\Version20200903122519', '2020-09-03 12:25:23', 292);

-- --------------------------------------------------------

--
-- Table structure for table `language_part`
--

CREATE TABLE `language_part` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_part`
--

INSERT INTO `language_part` (`id`, `name`) VALUES
(1, 'daiktavardis'),
(2, 'budvardis'),
(3, 'ivardis'),
(4, 'jaustukas');

-- --------------------------------------------------------

--
-- Table structure for table `sentences`
--

CREATE TABLE `sentences` (
  `id` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sentences`
--

INSERT INTO `sentences` (`id`, `text`, `url`) VALUES
(1, 'Oi ta graži, kiaunė', 'labas'),
(2, 'Vaje tas kreivas, išverstaakis, įspūdingas, namas', 'namas'),
(3, 'Oho kokia apsipūkavusi, graži, kiaulė', 'kiaule'),
(4, 'Ak kokia graži, plyta', 'plyta'),
(5, 'Po šimts ta graži, skraidanti, kiaunė', 'kiaune'),
(6, 'Oho koks kreivas, išverstaakis, žiogas', 'ziogas'),
(8, 'Jergulėliau ta skraidanti, ryža, rupūžė', 'rupuze'),
(12, 'Ujui tu įspūdingas, žiogas', 'skraidanti'),
(13, 'Po šimts ta apsipūkavusi, kiaunė', 'randomtext789');

-- --------------------------------------------------------

--
-- Table structure for table `word`
--

CREATE TABLE `word` (
  `id` int(11) NOT NULL,
  `language_part` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `word`
--

INSERT INTO `word` (`id`, `language_part`, `text`, `relation`) VALUES
(1, 1, 'namas', 'm'),
(2, 1, 'rupūžė', 'w'),
(3, 1, 'kiaunė', 'w'),
(4, 4, 'oi', NULL),
(5, 4, 'ak', NULL),
(6, 4, 'oho', NULL),
(7, 2, 'graži', 'w'),
(8, 2, 'įspūdingas', 'm'),
(9, 2, 'skraidanti', 'w'),
(10, 2, 'išverstaakis', 'm'),
(11, 1, 'velnias', 'm'),
(12, 1, 'žiogas', 'm'),
(13, 1, 'plyta', 'w'),
(14, 1, 'kiaulė', 'w'),
(15, 2, 'kreivas', 'm'),
(16, 2, 'baisus', 'm'),
(17, 2, 'apsipūkavusi', 'w'),
(18, 2, 'ryža', 'w'),
(19, 4, 'vaje', NULL),
(20, 4, 'vai', NULL),
(21, 4, 'jergulėliau', NULL),
(22, 4, 'po šimts', NULL),
(23, 4, 'ujui', NULL),
(24, 3, 'tu', NULL),
(25, 3, 'koks', 'm'),
(26, 3, 'kokia', 'w'),
(27, 3, 'ta', 'w'),
(28, 3, 'tas', 'm'),
(29, 3, 'ana', 'w'),
(30, 3, 'anas', 'm'),
(31, 3, 'šis', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `language_part`
--
ALTER TABLE `language_part`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sentences`
--
ALTER TABLE `sentences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_ED2A8F1EF47645AE` (`url`);

--
-- Indexes for table `word`
--
ALTER TABLE `word`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `language_part`
--
ALTER TABLE `language_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sentences`
--
ALTER TABLE `sentences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `word`
--
ALTER TABLE `word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
