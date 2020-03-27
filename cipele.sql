-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 27, 2020 at 05:32 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cipele`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

DROP TABLE IF EXISTS `anketa`;
CREATE TABLE IF NOT EXISTS `anketa` (
  `web_dizajn` int(100) NOT NULL,
  `web_programiranje` int(100) NOT NULL,
  `php` int(100) NOT NULL,
  PRIMARY KEY (`web_dizajn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`web_dizajn`, `web_programiranje`, `php`) VALUES
(15, 10, 11);

-- --------------------------------------------------------

--
-- Table structure for table `emailcontact`
--

DROP TABLE IF EXISTS `emailcontact`;
CREATE TABLE IF NOT EXISTS `emailcontact` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(20) CHARACTER SET latin1 NOT NULL,
  `email` varchar(20) CHARACTER SET latin1 NOT NULL,
  `subject` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emailcontact`
--

INSERT INTO `emailcontact` (`id`, `firstName`, `email`, `subject`) VALUES
(7, 'Aleksandar', 'test@t1est3.com', 'Proba'),
(8, 'Aleksandar', 'test@t1est3.com', 'Proba');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

DROP TABLE IF EXISTS `footer`;
CREATE TABLE IF NOT EXISTS `footer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `link` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `name`, `link`) VALUES
(1, 'Documentation', 'dokumentacija.pdf'),
(2, 'Contact Us', 'index.php?page=contact'),
(3, 'About Me', 'index.php?page=aboutme'),
(4, 'Gallery', 'index.php?page=gallery');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

DROP TABLE IF EXISTS `korisnici`;
CREATE TABLE IF NOT EXISTS `korisnici` (
  `id_korisnik` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `datum` datetime NOT NULL DEFAULT current_timestamp(),
  `ulogaId` int(10) NOT NULL,
  PRIMARY KEY (`id_korisnik`),
  UNIQUE KEY `email` (`email`),
  KEY `ulogaId` (`ulogaId`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id_korisnik`, `username`, `email`, `password`, `name`, `datum`, `ulogaId`) VALUES
(46, 'Admin12', 'admin@admin.com', '25d55ad283aa400af464c76d713c07ad', 'Admin', '2020-03-26 19:31:18', 1),
(73, 'Aco995', 'aleksandarjanjic10@hotmail.com', 'f4e41819109e82d555e6be38edb329a6', 'Aleksandar', '2020-03-27 11:47:44', 2);

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

DROP TABLE IF EXISTS `korpa`;
CREATE TABLE IF NOT EXISTS `korpa` (
  `idKorpa` int(10) NOT NULL AUTO_INCREMENT,
  `kolicina` int(255) NOT NULL,
  `idKorisnik` int(10) NOT NULL,
  `idProizvod` int(10) NOT NULL,
  PRIMARY KEY (`idKorpa`),
  KEY `idKorisnik` (`idKorisnik`),
  KEY `idProizvod` (`idProizvod`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korpa`
--

INSERT INTO `korpa` (`idKorpa`, `kolicina`, `idKorisnik`, `idProizvod`) VALUES
(11, 1, 73, 43),
(12, 2, 73, 50);

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

DROP TABLE IF EXISTS `meni`;
CREATE TABLE IF NOT EXISTS `meni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`id`, `name`, `link`) VALUES
(1, 'Home', 'index.php'),
(2, 'Contact Us', 'index.php?page=contact'),
(3, 'Gallery', 'index.php?page=gallery'),
(4, 'About Me', 'index.php?page=aboutme');

-- --------------------------------------------------------

--
-- Table structure for table `pol`
--

DROP TABLE IF EXISTS `pol`;
CREATE TABLE IF NOT EXISTS `pol` (
  `id_pol` int(10) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pol`
--

INSERT INTO `pol` (`id_pol`, `naziv`) VALUES
(1, 'Muskarac'),
(2, 'Zena'),
(3, 'Deca');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

DROP TABLE IF EXISTS `proizvodi`;
CREATE TABLE IF NOT EXISTS `proizvodi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `opis` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `slika` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `cena` float NOT NULL,
  `idPol` int(10) NOT NULL,
  `idVrsta` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idPol` (`idPol`),
  KEY `idVrednost` (`idVrsta`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `name`, `opis`, `slika`, `cena`, `idPol`, `idVrsta`) VALUES
(33, 'Zenska cipela', 'Jeftina', 'g2.png', 4000, 2, 3),
(34, 'Zenska cipela', 'Udobne', 'g4.png', 1400, 2, 3),
(35, 'Zenska cipela', 'Crvena boja', 'g5.png', 3900, 2, 3),
(36, 'Zenska cipela', 'Lanena', 'g6.png', 8500, 2, 3),
(43, 'Zenska cipela', 'Povoljno', 'g3.png', 42000, 2, 3),
(44, 'Adidas patika', 'Odlicna cena', 'bo1.jpg', 10000, 1, 2),
(45, 'Nike patika', 'Nike za zene', 'bo2.jpg', 9000, 2, 2),
(46, 'Patike za trcanje', 'Odlicne patike za trening', 'bo3.jpg', 31000, 1, 2),
(48, 'Patike za decu', 'Patike za sve uzraste', 'bo4.jpg', 1900, 1, 2),
(49, 'Balance patike', 'Moderne patike', 'bo6.jpg', 6800, 1, 2),
(50, 'Adidas patike', 'Veliki popust', 'bo5.jpg', 6900, 3, 2),
(52, 'Zenska cipela', 'Poslednji broj u ponudi', 'sa1.jpg', 3600, 1, 1),
(53, 'Kopacke', 'Profesionalne kopacke', 'sa2.jpg', 9500, 2, 1),
(54, 'Zenske cipele', 'Popust i do 50%', 'sa3.jpg', 5200, 3, 1),
(56, 'Sjajna cipela', 'Udobna', 'sa4.jpg', 42000, 3, 1),
(57, 'Zenska cipela', 'Odlicna cena', 'g1.png', 3300, 2, 3),
(58, 'Puma patike', 'Za decu svih uzrasta', 'sa5.jpeg', 7000, 1, 1),
(59, 'Muska patika', 'Sportska patikae', 'sa6.jpg', 70000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

DROP TABLE IF EXISTS `uloge`;
CREATE TABLE IF NOT EXISTS `uloge` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `vrsta`
--

DROP TABLE IF EXISTS `vrsta`;
CREATE TABLE IF NOT EXISTS `vrsta` (
  `id_vrsta` int(10) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(100) NOT NULL,
  PRIMARY KEY (`id_vrsta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vrsta`
--

INSERT INTO `vrsta` (`id_vrsta`, `naziv`) VALUES
(1, 'Sale'),
(2, 'Best Offer'),
(3, 'Must Have');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD CONSTRAINT `korisnici_ibfk_1` FOREIGN KEY (`ulogaId`) REFERENCES `uloge` (`id`);

--
-- Constraints for table `korpa`
--
ALTER TABLE `korpa`
  ADD CONSTRAINT `korpa_ibfk_1` FOREIGN KEY (`idProizvod`) REFERENCES `proizvodi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `korpa_ibfk_2` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnici` (`id_korisnik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD CONSTRAINT `proizvodi_ibfk_1` FOREIGN KEY (`idPol`) REFERENCES `pol` (`id_pol`),
  ADD CONSTRAINT `proizvodi_ibfk_2` FOREIGN KEY (`idVrsta`) REFERENCES `vrsta` (`id_vrsta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
