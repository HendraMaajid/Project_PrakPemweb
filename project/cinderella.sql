-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 10:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinderella`
--

-- --------------------------------------------------------

--
-- Table structure for table `pangeran`
--

CREATE TABLE `pangeran` (
  `id_pangeran` int(11) NOT NULL,
  `nama_pangeran` varchar(50) DEFAULT NULL,
  `id_sepatu` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pangeran`
--

INSERT INTO `pangeran` (`id_pangeran`, `nama_pangeran`, `id_sepatu`, `username`) VALUES
(1, 'Charming', 12, 'pangeran');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(50) NOT NULL,
  `password` varchar(500) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`, `nama`, `role`) VALUES
('miku', '$2y$10$7zK8i7CbuDuGgnYC61pQsu1wktPCueI6CSZMTDlDt8MSTQaiqSHCG', 'Hatsune Miku', 'putri'),
('pangeran', '$2y$10$FkoM8VdeuE/a6e4ZScNavOabEdpS4ulihj/Xfc6Fkyf/evVZMdruC', 'Charming', 'pangeran'),
('rin', '$2y$10$ZgWQomjaTWmm3/B6Bk22cePNCymtBzZM5TR3aeObhDpGxJlKnakW6', 'kagamine rin', 'putri');

-- --------------------------------------------------------

--
-- Table structure for table `putri`
--

CREATE TABLE `putri` (
  `id_putri` int(11) NOT NULL,
  `nama_putri` varchar(50) DEFAULT NULL,
  `id_sayembara` char(2) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `putri`
--

INSERT INTO `putri` (`id_putri`, `nama_putri`, `id_sayembara`, `username`) VALUES
(12, 'Hatsune in', '1', 'miku'),
(15, 'kagamine rin', 's1', 'rin');

--
-- Triggers `putri`
--
DELIMITER $$
CREATE TRIGGER `delete_pengguna_after_putri` AFTER DELETE ON `putri` FOR EACH ROW BEGIN
    DELETE FROM pengguna WHERE username = OLD.username;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_sepatu_on_putri_delete` BEFORE DELETE ON `putri` FOR EACH ROW BEGIN
    DELETE FROM sepatu WHERE id_putri = OLD.id_putri;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sayembara`
--

CREATE TABLE `sayembara` (
  `id_sayembara` char(2) NOT NULL,
  `daerah` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sayembara`
--

INSERT INTO `sayembara` (`id_sayembara`, `daerah`, `status`) VALUES
('1', 'ajibarang', 'end'),
('s1', 'jakarta', 'on going');

-- --------------------------------------------------------

--
-- Table structure for table `sepatu`
--

CREATE TABLE `sepatu` (
  `id_sepatu` int(11) NOT NULL,
  `size` float DEFAULT NULL,
  `id_putri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sepatu`
--

INSERT INTO `sepatu` (`id_sepatu`, `size`, `id_putri`) VALUES
(6, 23, 12),
(10, 23, 15),
(12, 37.85, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pangeran`
--
ALTER TABLE `pangeran`
  ADD PRIMARY KEY (`id_pangeran`),
  ADD KEY `id_sepatu` (`id_sepatu`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `putri`
--
ALTER TABLE `putri`
  ADD PRIMARY KEY (`id_putri`),
  ADD KEY `username` (`username`),
  ADD KEY `id_sayembara` (`id_sayembara`);

--
-- Indexes for table `sayembara`
--
ALTER TABLE `sayembara`
  ADD PRIMARY KEY (`id_sayembara`);

--
-- Indexes for table `sepatu`
--
ALTER TABLE `sepatu`
  ADD PRIMARY KEY (`id_sepatu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pangeran`
--
ALTER TABLE `pangeran`
  MODIFY `id_pangeran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `putri`
--
ALTER TABLE `putri`
  MODIFY `id_putri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sepatu`
--
ALTER TABLE `sepatu`
  MODIFY `id_sepatu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pangeran`
--
ALTER TABLE `pangeran`
  ADD CONSTRAINT `pangeran_ibfk_1` FOREIGN KEY (`id_sepatu`) REFERENCES `sepatu` (`id_sepatu`),
  ADD CONSTRAINT `pangeran_ibfk_2` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`);

--
-- Constraints for table `putri`
--
ALTER TABLE `putri`
  ADD CONSTRAINT `putri_ibfk_2` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`),
  ADD CONSTRAINT `putri_ibfk_3` FOREIGN KEY (`id_sayembara`) REFERENCES `sayembara` (`id_sayembara`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
