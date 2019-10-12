-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2019 at 12:46 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ga-pso`
--
CREATE DATABASE IF NOT EXISTS `ga-pso` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ga-pso`;

-- --------------------------------------------------------

--
-- Table structure for table `cari_cw_pso0`
--

CREATE TABLE `cari_cw_pso0` (
  `kode` longtext,
  `id_partikel` int(11) DEFAULT NULL,
  `iterasi_ke` int(11) DEFAULT NULL,
  `lo1` float DEFAULT NULL,
  `lo2` float DEFAULT NULL,
  `lo3` float DEFAULT NULL,
  `lo4` float DEFAULT NULL,
  `lo5` float DEFAULT NULL,
  `lo6` float DEFAULT NULL,
  `lo7` float DEFAULT NULL,
  `lo8` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cari_cw_pso1`
--

CREATE TABLE `cari_cw_pso1` (
  `kode` longtext,
  `id_partikel` int(11) DEFAULT NULL,
  `iterasi_ke` int(11) DEFAULT NULL,
  `lo1` float DEFAULT NULL,
  `lo2` float DEFAULT NULL,
  `lo3` float DEFAULT NULL,
  `lo4` float DEFAULT NULL,
  `lo5` float DEFAULT NULL,
  `lo6` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cari_cw_pso2`
--

CREATE TABLE `cari_cw_pso2` (
  `kode` longtext,
  `id_partikel` int(11) DEFAULT NULL,
  `iterasi_ke` int(11) DEFAULT NULL,
  `lo1` float DEFAULT NULL,
  `lo2` float DEFAULT NULL,
  `lo3` float DEFAULT NULL,
  `lo4` float DEFAULT NULL,
  `lo5` float DEFAULT NULL,
  `lo6` float DEFAULT NULL,
  `lo7` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cari_cw_pso3`
--

CREATE TABLE `cari_cw_pso3` (
  `kode` longtext,
  `id_partikel` int(11) DEFAULT NULL,
  `iterasi_ke` int(11) DEFAULT NULL,
  `lo1` float DEFAULT NULL,
  `lo2` float DEFAULT NULL,
  `lo3` float DEFAULT NULL,
  `lo4` float DEFAULT NULL,
  `lo5` float DEFAULT NULL,
  `lo6` float DEFAULT NULL,
  `lo7` float DEFAULT NULL,
  `lo8` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cari_cw_pso3`
--

INSERT INTO `cari_cw_pso3` (`kode`, `id_partikel`, `iterasi_ke`, `lo1`, `lo2`, `lo3`, `lo4`, `lo5`, `lo6`, `lo7`, `lo8`) VALUES
('partikel', 1, 0, 8, 4, 3, 2, 1, 6, 7, 5),
('dbb', 1, 0, 2.23607, 1, 1, 1, 2.82843, 2.23607, 3.16228, 3),
('dbo', 1, 0, 1.5, 1, 0.5, 0.5, 3, 0.5, 1, 1),
('cw', 1, 0, 7.88622, 16.6667, 18.1818, 18.1818, 5.83358, 8.56139, 5.94835, 6.25),
('partikel', 2, 0, 8, 1, 4, 5, 3, 2, 6, 7),
('dbb', 2, 0, 4.47214, 2.23607, 1.41421, 1, 1, 2.23607, 2.23607, 1),
('dbo', 2, 0, 3, 2, 0.5, 1, 0.5, 2.5, 0.5, 2),
('cw', 2, 0, 3.94311, 7.58706, 13.2082, 16.6667, 18.1818, 7.30976, 8.56139, 14.2857),
('partikel', 3, 0, 2, 6, 3, 5, 8, 1, 7, 4),
('dbb', 3, 0, 2.23607, 1.41421, 1, 3, 4.47214, 4.12311, 2, 2),
('dbo', 3, 0, 2.5, 2, 1, 1, 3, 3, 1.5, 1.5),
('cw', 3, 0, 7.30976, 11.0241, 16.6667, 6.25, 3.94311, 4.2345, 8.69565, 8.69565),
('partikel', 4, 0, 1, 8, 4, 3, 7, 2, 6, 5),
('dbb', 4, 0, 4.47214, 2.23607, 1, 3, 4, 2.23607, 1, 2.23607),
('dbo', 4, 0, 3, 1.5, 1, 2, 2.5, 2.5, 1, 2),
('cw', 4, 0, 3.94311, 7.88622, 16.6667, 5.88235, 4.44444, 7.30976, 16.6667, 7.58706),
('partikel', 5, 0, 7, 2, 1, 6, 3, 4, 5, 8),
('dbb', 5, 0, 4, 1, 2.82843, 1.41421, 1, 1.41421, 3, 1),
('dbo', 5, 0, 2.5, 0.5, 3, 2, 1, 0.5, 1, 2),
('cw', 5, 0, 4.44444, 18.1818, 5.83358, 11.0241, 16.6667, 13.2082, 6.25, 14.2857),
('partikel', 1, 1, 7, 2, 1, 4, 3, 6, 8, 5),
('dbb', 1, 1, 4, 1, 2.23607, 1, 1.41421, 2, 3, 3.16228),
('dbo', 1, 1, 2.5, 0.5, 2, 1, 2, 1.5, 1, 1),
('cw', 1, 1, 4.44444, 18.1818, 7.58706, 16.6667, 11.0241, 8.69565, 6.25, 5.94835),
('partikel', 2, 1, 7, 2, 4, 5, 3, 1, 6, 8),
('dbb', 2, 1, 4, 2, 1.41421, 1, 1.41421, 2.82843, 2, 1),
('dbo', 2, 1, 2.5, 1.5, 0.5, 1, 0.5, 3, 1.5, 2),
('cw', 2, 1, 4.44444, 8.69565, 13.2082, 16.6667, 13.2082, 5.83358, 8.69565, 14.2857),
('partikel', 3, 1, 7, 2, 1, 5, 8, 3, 6, 4),
('dbb', 3, 1, 4, 1, 2.23607, 3, 3.16228, 1.41421, 1, 2),
('dbo', 3, 1, 2.5, 0.5, 2, 1, 2, 2, 1.5, 1.5),
('cw', 3, 1, 4.44444, 18.1818, 7.58706, 6.25, 5.61439, 11.0241, 15.3846, 8.69565),
('partikel', 4, 1, 7, 2, 1, 6, 4, 8, 3, 5),
('dbb', 4, 1, 4, 1, 2.82843, 1, 2.23607, 3.16228, 1, 3.16228),
('dbo', 4, 1, 2.5, 0.5, 3, 1.5, 1.5, 2, 1, 1),
('cw', 4, 1, 4.44444, 18.1818, 5.83358, 15.3846, 7.88622, 5.61439, 16.6667, 5.94835),
('partikel', 5, 1, 7, 2, 1, 6, 3, 4, 5, 8),
('dbb', 5, 1, 4, 1, 2.82843, 1.41421, 1, 1.41421, 3, 1),
('dbo', 5, 1, 2.5, 0.5, 3, 2, 1, 0.5, 1, 2),
('cw', 5, 1, 4.44444, 18.1818, 5.83358, 11.0241, 16.6667, 13.2082, 6.25, 14.2857),
('partikel', 1, 2, 7, 2, 1, 4, 3, 6, 8, 5),
('dbb', 1, 2, 4, 1, 2.23607, 1, 1.41421, 2, 3, 3.16228),
('dbo', 1, 2, 2.5, 0.5, 2, 1, 2, 1.5, 1, 1),
('cw', 1, 2, 4.44444, 18.1818, 7.58706, 16.6667, 11.0241, 8.69565, 6.25, 5.94835),
('partikel', 2, 2, 7, 2, 4, 5, 3, 1, 6, 8),
('dbb', 2, 2, 4, 2, 1.41421, 1, 1.41421, 2.82843, 2, 1),
('dbo', 2, 2, 2.5, 1.5, 0.5, 1, 0.5, 3, 1.5, 2),
('cw', 2, 2, 4.44444, 8.69565, 13.2082, 16.6667, 13.2082, 5.83358, 8.69565, 14.2857),
('partikel', 3, 2, 7, 2, 1, 6, 3, 8, 5, 4),
('dbb', 3, 2, 4, 1, 2.82843, 1.41421, 3.16228, 3, 1.41421, 2),
('dbo', 3, 2, 2.5, 0.5, 3, 2, 2, 1, 0.5, 1.5),
('cw', 3, 2, 4.44444, 18.1818, 5.83358, 11.0241, 5.61439, 6.25, 13.2082, 8.69565),
('partikel', 4, 2, 7, 2, 1, 6, 3, 4, 8, 5),
('dbb', 4, 2, 4, 1, 2.82843, 1.41421, 1, 2.23607, 3, 3.16228),
('dbo', 4, 2, 2.5, 0.5, 3, 2, 1, 1.5, 1, 1),
('cw', 4, 2, 4.44444, 18.1818, 5.83358, 11.0241, 16.6667, 7.88622, 6.25, 5.94835),
('partikel', 5, 2, 7, 2, 1, 6, 3, 4, 5, 8),
('dbb', 5, 2, 4, 1, 2.82843, 1.41421, 1, 1.41421, 3, 1),
('dbo', 5, 2, 2.5, 0.5, 3, 2, 1, 0.5, 1, 2),
('cw', 5, 2, 4.44444, 18.1818, 5.83358, 11.0241, 16.6667, 13.2082, 6.25, 14.2857),
('partikel', 1, 3, 7, 2, 1, 4, 3, 6, 8, 5),
('dbb', 1, 3, 4, 1, 2.23607, 1, 1.41421, 2, 3, 3.16228),
('dbo', 1, 3, 2.5, 0.5, 2, 1, 2, 1.5, 1, 1),
('cw', 1, 3, 4.44444, 18.1818, 7.58706, 16.6667, 11.0241, 8.69565, 6.25, 5.94835),
('partikel', 2, 3, 7, 2, 4, 5, 3, 1, 6, 8),
('dbb', 2, 3, 4, 2, 1.41421, 1, 1.41421, 2.82843, 2, 1),
('dbo', 2, 3, 2.5, 1.5, 0.5, 1, 0.5, 3, 1.5, 2),
('cw', 2, 3, 4.44444, 8.69565, 13.2082, 16.6667, 13.2082, 5.83358, 8.69565, 14.2857),
('partikel', 3, 3, 7, 2, 1, 6, 3, 8, 5, 4),
('dbb', 3, 3, 4, 1, 2.82843, 1.41421, 3.16228, 3, 1.41421, 2),
('dbo', 3, 3, 2.5, 0.5, 3, 2, 2, 1, 0.5, 1.5),
('cw', 3, 3, 4.44444, 18.1818, 5.83358, 11.0241, 5.61439, 6.25, 13.2082, 8.69565),
('partikel', 4, 3, 7, 2, 1, 6, 3, 4, 8, 5),
('dbb', 4, 3, 4, 1, 2.82843, 1.41421, 1, 2.23607, 3, 3.16228),
('dbo', 4, 3, 2.5, 0.5, 3, 2, 1, 1.5, 1, 1),
('cw', 4, 3, 4.44444, 18.1818, 5.83358, 11.0241, 16.6667, 7.88622, 6.25, 5.94835),
('partikel', 5, 3, 7, 2, 1, 6, 3, 4, 5, 8),
('dbb', 5, 3, 4, 1, 2.82843, 1.41421, 1, 1.41421, 3, 1),
('dbo', 5, 3, 2.5, 0.5, 3, 2, 1, 0.5, 1, 2),
('cw', 5, 3, 4.44444, 18.1818, 5.83358, 11.0241, 16.6667, 13.2082, 6.25, 14.2857);

-- --------------------------------------------------------

--
-- Table structure for table `dbb`
--

CREATE TABLE `dbb` (
  `id` int(11) DEFAULT NULL,
  `singkatan` text,
  `nilai_x` int(11) DEFAULT NULL,
  `nilai_y` int(11) DEFAULT NULL,
  `learning_object` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbb`
--

INSERT INTO `dbb` (`id`, `singkatan`, `nilai_x`, `nilai_y`, `learning_object`) VALUES
(1, 'KC2', 2, 2, 1),
(2, 'PC2', 3, 2, 2),
(3, 'PC3', 3, 3, 3),
(4, 'PC4', 3, 4, 4),
(5, 'MC3', 4, 3, 5),
(6, 'MC4', 4, 4, 6),
(7, 'PC6', 3, 6, 7),
(8, 'MC6', 4, 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `dbo`
--

CREATE TABLE `dbo` (
  `id` int(11) DEFAULT NULL,
  `nilai_x` int(11) DEFAULT NULL,
  `nilai_y` int(11) DEFAULT NULL,
  `jarak` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbo`
--

INSERT INTO `dbo` (`id`, `nilai_x`, `nilai_y`, `jarak`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 0.5),
(3, 3, 1, 0.5),
(4, 4, 1, 2),
(5, 5, 1, 2),
(6, 6, 1, 3),
(7, 7, 1, 3),
(8, 8, 1, 3),
(9, 1, 2, 0.5),
(10, 2, 2, 0),
(11, 3, 2, 0.5),
(12, 4, 2, 1.5),
(13, 5, 2, 2),
(14, 6, 2, 2.5),
(15, 7, 2, 2.5),
(16, 8, 2, 2.5),
(17, 1, 3, 1),
(18, 2, 3, 0.5),
(19, 3, 3, 0),
(20, 4, 3, 1),
(21, 5, 3, 1),
(22, 6, 3, 2),
(23, 7, 3, 2),
(24, 8, 3, 2),
(25, 1, 4, 2),
(26, 2, 4, 1.5),
(27, 3, 4, 1),
(28, 4, 4, 0),
(29, 5, 4, 0.5),
(30, 6, 4, 1.5),
(31, 7, 4, 1.5),
(32, 8, 4, 1.5),
(33, 1, 5, 2),
(34, 2, 5, 2),
(35, 3, 5, 1),
(36, 4, 5, 0.5),
(37, 5, 5, 0),
(38, 6, 5, 1),
(39, 7, 5, 1),
(40, 8, 5, 1),
(41, 1, 6, 3),
(42, 2, 6, 2.5),
(43, 3, 6, 2),
(44, 4, 6, 1.5),
(45, 5, 6, 1),
(46, 6, 6, 0),
(47, 7, 6, 0.5),
(48, 8, 6, 1.5),
(49, 1, 7, 3),
(50, 2, 7, 2.5),
(51, 3, 7, 2),
(52, 4, 7, 1.5),
(53, 5, 7, 1),
(54, 6, 7, 0.5),
(55, 7, 7, 0),
(56, 8, 7, 2),
(57, 1, 8, 3),
(58, 2, 8, 2.5),
(59, 3, 8, 2),
(60, 4, 8, 1.5),
(61, 5, 8, 1),
(62, 6, 8, 1.5),
(63, 7, 8, 2),
(64, 8, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gbest_pso_0`
--

CREATE TABLE `gbest_pso_0` (
  `iterasi_ke` int(11) DEFAULT NULL,
  `id_partikel` int(11) DEFAULT NULL,
  `lo1` int(11) DEFAULT NULL,
  `lo2` int(11) DEFAULT NULL,
  `lo3` int(11) DEFAULT NULL,
  `lo4` int(11) DEFAULT NULL,
  `lo5` int(11) DEFAULT NULL,
  `lo6` int(11) DEFAULT NULL,
  `lo7` int(11) DEFAULT NULL,
  `lo8` int(11) DEFAULT NULL,
  `total_fitness` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gbest_pso_1`
--

CREATE TABLE `gbest_pso_1` (
  `iterasi_ke` int(11) DEFAULT NULL,
  `id_partikel` int(11) DEFAULT NULL,
  `lo1` int(11) DEFAULT NULL,
  `lo2` int(11) DEFAULT NULL,
  `lo3` int(11) DEFAULT NULL,
  `lo4` int(11) DEFAULT NULL,
  `lo5` int(11) DEFAULT NULL,
  `lo6` int(11) DEFAULT NULL,
  `total_fitness` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gbest_pso_2`
--

CREATE TABLE `gbest_pso_2` (
  `iterasi_ke` int(11) DEFAULT NULL,
  `id_partikel` int(11) DEFAULT NULL,
  `lo1` int(11) DEFAULT NULL,
  `lo2` int(11) DEFAULT NULL,
  `lo3` int(11) DEFAULT NULL,
  `lo4` int(11) DEFAULT NULL,
  `lo5` int(11) DEFAULT NULL,
  `lo6` int(11) DEFAULT NULL,
  `lo7` int(11) DEFAULT NULL,
  `total_fitness` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gbest_pso_3`
--

CREATE TABLE `gbest_pso_3` (
  `iterasi_ke` int(11) DEFAULT NULL,
  `id_partikel` int(11) DEFAULT NULL,
  `lo1` int(11) DEFAULT NULL,
  `lo2` int(11) DEFAULT NULL,
  `lo3` int(11) DEFAULT NULL,
  `lo4` int(11) DEFAULT NULL,
  `lo5` int(11) DEFAULT NULL,
  `lo6` int(11) DEFAULT NULL,
  `lo7` int(11) DEFAULT NULL,
  `lo8` int(11) DEFAULT NULL,
  `total_fitness` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_pso_0`
--

CREATE TABLE `master_pso_0` (
  `id_partikel` int(11) DEFAULT NULL,
  `lo1` int(11) DEFAULT NULL,
  `lo2` int(11) DEFAULT NULL,
  `lo3` int(11) DEFAULT NULL,
  `lo4` int(11) DEFAULT NULL,
  `lo5` int(11) DEFAULT NULL,
  `lo6` int(11) DEFAULT NULL,
  `lo7` int(11) DEFAULT NULL,
  `lo8` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_pso_1`
--

CREATE TABLE `master_pso_1` (
  `id_partikel` int(11) DEFAULT NULL,
  `lo1` int(11) DEFAULT NULL,
  `lo2` int(11) DEFAULT NULL,
  `lo3` int(11) DEFAULT NULL,
  `lo4` int(11) DEFAULT NULL,
  `lo5` int(11) DEFAULT NULL,
  `lo6` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_pso_2`
--

CREATE TABLE `master_pso_2` (
  `id_partikel` int(11) DEFAULT NULL,
  `lo1` int(11) DEFAULT NULL,
  `lo2` int(11) DEFAULT NULL,
  `lo3` int(11) DEFAULT NULL,
  `lo4` int(11) DEFAULT NULL,
  `lo5` int(11) DEFAULT NULL,
  `lo6` int(11) DEFAULT NULL,
  `lo7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_pso_3`
--

CREATE TABLE `master_pso_3` (
  `id_partikel` int(11) DEFAULT NULL,
  `lo1` int(11) DEFAULT NULL,
  `lo2` int(11) DEFAULT NULL,
  `lo3` int(11) DEFAULT NULL,
  `lo4` int(11) DEFAULT NULL,
  `lo5` int(11) DEFAULT NULL,
  `lo6` int(11) DEFAULT NULL,
  `lo7` int(11) DEFAULT NULL,
  `lo8` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_pso_3`
--

INSERT INTO `master_pso_3` (`id_partikel`, `lo1`, `lo2`, `lo3`, `lo4`, `lo5`, `lo6`, `lo7`, `lo8`) VALUES
(1, 8, 4, 3, 2, 1, 6, 7, 5),
(2, 8, 1, 4, 5, 3, 2, 6, 7),
(3, 2, 6, 3, 5, 8, 1, 7, 4),
(4, 1, 8, 4, 3, 7, 2, 6, 5),
(5, 7, 2, 1, 6, 3, 4, 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `partikel_pso_0`
--

CREATE TABLE `partikel_pso_0` (
  `kode` varchar(21845) DEFAULT NULL,
  `id_partikel` int(11) DEFAULT NULL,
  `iterasi_ke` int(11) DEFAULT NULL,
  `lo1` int(11) DEFAULT NULL,
  `lo2` int(11) DEFAULT NULL,
  `lo3` int(11) DEFAULT NULL,
  `lo4` int(11) DEFAULT NULL,
  `lo5` int(11) DEFAULT NULL,
  `lo6` int(11) DEFAULT NULL,
  `lo7` int(11) DEFAULT NULL,
  `lo8` int(11) DEFAULT NULL,
  `fitness_pso_0` float DEFAULT NULL,
  `pso0_cw` float DEFAULT NULL,
  `pso0_a` float DEFAULT NULL,
  `pso0_b` float DEFAULT NULL,
  `pso0_unlo` int(11) DEFAULT NULL,
  `total_fitness` int(11) DEFAULT NULL,
  `v_pso0_lo1` int(11) DEFAULT NULL,
  `v_pso0_lo2` int(11) DEFAULT NULL,
  `v_pso0_lo3` int(11) DEFAULT NULL,
  `v_pso0_lo4` int(11) DEFAULT NULL,
  `v_pso0_lo5` int(11) DEFAULT NULL,
  `v_pso0_lo6` int(11) DEFAULT NULL,
  `v_pso0_lo7` int(11) DEFAULT NULL,
  `v_pso0_lo8` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `partikel_pso_1`
--

CREATE TABLE `partikel_pso_1` (
  `kode` longtext,
  `id_partikel` int(11) DEFAULT NULL,
  `iterasi_ke` int(11) DEFAULT NULL,
  `lo1` int(11) DEFAULT NULL,
  `lo2` int(11) DEFAULT NULL,
  `lo3` int(11) DEFAULT NULL,
  `lo4` int(11) DEFAULT NULL,
  `lo5` int(11) DEFAULT NULL,
  `lo6` int(11) DEFAULT NULL,
  `fitness_pso_6` float DEFAULT NULL,
  `pso6_cw` float DEFAULT NULL,
  `pso6_a` float DEFAULT NULL,
  `pso6_b` float DEFAULT NULL,
  `pso6_unlo` int(11) DEFAULT NULL,
  `total_fitness` float DEFAULT NULL,
  `v_pso6_lo1` float DEFAULT NULL,
  `v_pso6_lo2` float DEFAULT NULL,
  `v_pso6_lo3` float DEFAULT NULL,
  `v_pso6_lo4` float DEFAULT NULL,
  `v_pso6_lo5` float DEFAULT NULL,
  `v_pso6_lo6` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `partikel_pso_2`
--

CREATE TABLE `partikel_pso_2` (
  `kode` varchar(21845) DEFAULT NULL,
  `id_partikel` int(11) DEFAULT NULL,
  `iterasi_ke` int(11) DEFAULT NULL,
  `lo1` int(11) DEFAULT NULL,
  `lo2` int(11) DEFAULT NULL,
  `lo3` int(11) DEFAULT NULL,
  `lo4` int(11) DEFAULT NULL,
  `lo5` int(11) DEFAULT NULL,
  `lo6` int(11) DEFAULT NULL,
  `lo7` int(11) DEFAULT NULL,
  `fitness_pso_7` float DEFAULT NULL,
  `pso7_cw` float DEFAULT NULL,
  `pso7_a` float DEFAULT NULL,
  `pso7_b` int(11) DEFAULT NULL,
  `pso7_unlo` int(11) DEFAULT NULL,
  `total_fitness` float DEFAULT NULL,
  `v_pso7_lo1` int(11) DEFAULT NULL,
  `v_pso7_lo2` int(11) DEFAULT NULL,
  `v_pso7_lo3` int(11) DEFAULT NULL,
  `v_pso7_lo4` int(11) DEFAULT NULL,
  `v_pso7_lo5` int(11) DEFAULT NULL,
  `v_pso7_lo6` int(11) DEFAULT NULL,
  `v_pso7_lo7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `partikel_pso_3`
--

CREATE TABLE `partikel_pso_3` (
  `kode` varchar(21845) DEFAULT NULL,
  `id_partikel` int(11) DEFAULT NULL,
  `iterasi_ke` int(11) DEFAULT NULL,
  `lo1` int(11) DEFAULT NULL,
  `lo2` int(11) DEFAULT NULL,
  `lo3` int(11) DEFAULT NULL,
  `lo4` int(11) DEFAULT NULL,
  `lo5` int(11) DEFAULT NULL,
  `lo6` int(11) DEFAULT NULL,
  `lo7` int(11) DEFAULT NULL,
  `lo8` int(11) DEFAULT NULL,
  `fitness_pso_8` float DEFAULT NULL,
  `pso8_cw` float DEFAULT NULL,
  `pso8_a` float DEFAULT NULL,
  `pso8_b` float DEFAULT NULL,
  `pso8_unlo` int(11) DEFAULT NULL,
  `total_fitness` int(11) DEFAULT NULL,
  `v_pso8_lo1` int(11) DEFAULT NULL,
  `v_pso8_lo2` int(11) DEFAULT NULL,
  `v_pso8_lo3` int(11) DEFAULT NULL,
  `v_pso8_lo4` int(11) DEFAULT NULL,
  `v_pso8_lo5` int(11) DEFAULT NULL,
  `v_pso8_lo6` int(11) DEFAULT NULL,
  `v_pso8_lo7` int(11) DEFAULT NULL,
  `v_pso8_lo8` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partikel_pso_3`
--

INSERT INTO `partikel_pso_3` (`kode`, `id_partikel`, `iterasi_ke`, `lo1`, `lo2`, `lo3`, `lo4`, `lo5`, `lo6`, `lo7`, `lo8`, `fitness_pso_8`, `pso8_cw`, `pso8_a`, `pso8_b`, `pso8_unlo`, `total_fitness`, `v_pso8_lo1`, `v_pso8_lo2`, `v_pso8_lo3`, `v_pso8_lo4`, `v_pso8_lo5`, `v_pso8_lo6`, `v_pso8_lo7`, `v_pso8_lo8`) VALUES
('xi', 1, 0, 8, 4, 3, 2, 1, 6, 7, 5, 17.502, 87.5098, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('v_update', 1, 0, 8, 4, 3, 2, 1, 6, 7, 5, 17.502, 87.5098, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('xi', 2, 0, 8, 1, 4, 5, 3, 2, 6, 7, 17.9487, 89.7437, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('v_update', 2, 0, 8, 1, 4, 5, 3, 2, 6, 7, 17.9487, 89.7437, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('xi', 3, 0, 2, 6, 3, 5, 8, 1, 7, 4, 13.3639, 66.8194, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('v_update', 3, 0, 2, 6, 3, 5, 8, 1, 7, 4, 13.3639, 66.8194, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('xi', 4, 0, 1, 8, 4, 3, 7, 2, 6, 5, 14.0773, 70.3863, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('v_update', 4, 0, 1, 8, 4, 3, 7, 2, 6, 5, 14.0773, 70.3863, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('xi', 5, 0, 7, 2, 1, 6, 3, 4, 5, 8, 17.9789, 89.8945, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('v_update', 5, 0, 7, 2, 1, 6, 3, 4, 5, 8, 17.9789, 89.8945, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('pbest', 1, 0, 8, 4, 3, 2, 1, 6, 7, 5, 17.502, 87.5098, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('pbest', 2, 0, 8, 1, 4, 5, 3, 2, 6, 7, 17.9487, 89.7437, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('pbest', 3, 0, 2, 6, 3, 5, 8, 1, 7, 4, 13.3639, 66.8194, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('pbest', 4, 0, 1, 8, 4, 3, 7, 2, 6, 5, 14.0773, 70.3863, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('pbest', 5, 0, 7, 2, 1, 6, 3, 4, 5, 8, 17.9789, 89.8945, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('gbest', 5, 0, 7, 2, 1, 6, 3, 4, 5, 8, 17.9789, 89.8945, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('xi', 1, 1, 7, 2, 1, 4, 3, 6, 8, 5, 15.7596, 78.798, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('v_update', 1, 1, 7, 2, 1, 4, 3, 6, 8, 5, 15.7596, 78.798, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('xi', 2, 1, 7, 2, 4, 5, 3, 1, 6, 8, 17.0076, 85.0381, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('v_update', 2, 1, 7, 2, 4, 5, 3, 1, 6, 8, 17.0076, 85.0381, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('xi', 3, 1, 7, 2, 1, 5, 8, 3, 6, 4, 15.4364, 77.182, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('v_update', 3, 1, 7, 2, 1, 5, 8, 3, 6, 4, 15.4364, 77.182, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('xi', 4, 1, 7, 2, 1, 6, 4, 8, 3, 5, 15.992, 79.9601, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('v_update', 4, 1, 7, 2, 1, 6, 4, 8, 3, 5, 15.992, 79.9601, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('xi', 5, 1, 7, 2, 1, 6, 3, 4, 5, 8, 17.9789, 89.8945, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('v_update', 5, 1, 7, 2, 1, 6, 3, 4, 5, 8, 17.9789, 89.8945, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('pbest', 1, 1, 8, 4, 3, 2, 1, 6, 7, 5, 17.502, 87.5098, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('pbest', 2, 1, 8, 1, 4, 5, 3, 2, 6, 7, 17.9487, 89.7437, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('pbest', 3, 1, 7, 2, 1, 5, 8, 3, 6, 4, 15.4364, 77.182, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('pbest', 4, 1, 7, 2, 1, 6, 4, 8, 3, 5, 15.992, 79.9601, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('pbest', 5, 1, 7, 2, 1, 6, 3, 4, 5, 8, 17.9789, 89.8945, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('gbest', 5, 1, 7, 2, 1, 6, 3, 4, 5, 8, 17.9789, 89.8945, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('xi', 1, 2, 7, 2, 1, 4, 3, 6, 8, 5, 15.7596, 78.798, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('v_update', 1, 2, 7, 2, 1, 4, 3, 6, 8, 5, 15.7596, 78.798, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('xi', 2, 2, 7, 2, 4, 5, 3, 1, 6, 8, 17.0076, 85.0381, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('v_update', 2, 2, 7, 2, 4, 5, 3, 1, 6, 8, 17.0076, 85.0381, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('xi', 3, 2, 7, 2, 1, 6, 3, 8, 5, 4, 14.6504, 73.2521, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('v_update', 3, 2, 7, 2, 1, 6, 3, 8, 5, 4, 14.6504, 73.2521, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('xi', 4, 2, 7, 2, 1, 6, 3, 4, 8, 5, 15.247, 76.2351, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('v_update', 4, 2, 7, 2, 1, 6, 3, 4, 8, 5, 15.247, 76.2351, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('xi', 5, 2, 7, 2, 1, 6, 3, 4, 5, 8, 17.9789, 89.8945, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('v_update', 5, 2, 7, 2, 1, 6, 3, 4, 5, 8, 17.9789, 89.8945, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('pbest', 1, 2, 8, 4, 3, 2, 1, 6, 7, 5, 17.502, 87.5098, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('pbest', 2, 2, 8, 1, 4, 5, 3, 2, 6, 7, 17.9487, 89.7437, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('pbest', 3, 2, 7, 2, 1, 5, 8, 3, 6, 4, 15.4364, 77.182, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('pbest', 4, 2, 7, 2, 1, 6, 4, 8, 3, 5, 15.992, 79.9601, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('pbest', 5, 2, 7, 2, 1, 6, 3, 4, 5, 8, 17.9789, 89.8945, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('gbest', 5, 2, 7, 2, 1, 6, 3, 4, 5, 8, 17.9789, 89.8945, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('xi', 1, 3, 7, 2, 1, 4, 3, 6, 8, 5, 15.7596, 78.798, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('v_update', 1, 3, 7, 2, 1, 4, 3, 6, 8, 5, 15.7596, 78.798, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('xi', 2, 3, 7, 2, 4, 5, 3, 1, 6, 8, 17.0076, 85.0381, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('v_update', 2, 3, 7, 2, 4, 5, 3, 1, 6, 8, 17.0076, 85.0381, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('xi', 3, 3, 7, 2, 1, 6, 3, 8, 5, 4, 14.6504, 73.2521, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('v_update', 3, 3, 7, 2, 1, 6, 3, 8, 5, 4, 14.6504, 73.2521, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('xi', 4, 3, 7, 2, 1, 6, 3, 4, 8, 5, 15.247, 76.2351, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('v_update', 4, 3, 7, 2, 1, 6, 3, 4, 8, 5, 15.247, 76.2351, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('xi', 5, 3, 7, 2, 1, 6, 3, 4, 5, 8, 17.9789, 89.8945, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('v_update', 5, 3, 7, 2, 1, 6, 3, 4, 5, 8, 17.9789, 89.8945, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('pbest', 1, 3, 8, 4, 3, 2, 1, 6, 7, 5, 17.502, 87.5098, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('pbest', 2, 3, 8, 1, 4, 5, 3, 2, 6, 7, 17.9487, 89.7437, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('pbest', 3, 3, 7, 2, 1, 5, 8, 3, 6, 4, 15.4364, 77.182, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('pbest', 4, 3, 7, 2, 1, 6, 4, 8, 3, 5, 15.992, 79.9601, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('pbest', 5, 3, 7, 2, 1, 6, 3, 4, 5, 8, 17.9789, 89.8945, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('gbest', 5, 3, 7, 2, 1, 6, 3, 4, 5, 8, 17.9789, 89.8945, 0.2, 0.6, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0),
('xi', 1, 4, 7, 2, 1, 4, 3, 6, 8, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('v_update', 1, 4, 7, 2, 1, 4, 3, 6, 8, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('xi', 2, 4, 7, 2, 4, 5, 3, 1, 6, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('v_update', 2, 4, 7, 2, 4, 5, 3, 1, 6, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('xi', 3, 4, 7, 2, 1, 6, 3, 8, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('v_update', 3, 4, 7, 2, 1, 6, 3, 8, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('xi', 4, 4, 7, 2, 1, 6, 3, 4, 8, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('v_update', 4, 4, 7, 2, 1, 6, 3, 4, 8, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('xi', 5, 4, 7, 2, 1, 6, 3, 4, 5, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('v_update', 5, 4, 7, 2, 1, 6, 3, 4, 5, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transpos_ke_1`
--

CREATE TABLE `transpos_ke_1` (
  `iterasi_ke` int(11) DEFAULT NULL,
  `id_pbest` int(11) DEFAULT NULL,
  `langkah_ke` int(11) DEFAULT NULL,
  `posisi_awal` int(11) DEFAULT NULL,
  `posisi_akhir` int(11) DEFAULT NULL,
  `lo1` int(11) DEFAULT NULL,
  `lo2` int(11) DEFAULT NULL,
  `lo3` int(11) DEFAULT NULL,
  `lo4` int(11) DEFAULT NULL,
  `lo5` int(11) DEFAULT NULL,
  `lo6` int(11) DEFAULT NULL,
  `lo7` int(11) DEFAULT NULL,
  `lo8` int(11) DEFAULT NULL,
  `kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transpos_ke_1`
--

INSERT INTO `transpos_ke_1` (`iterasi_ke`, `id_pbest`, `langkah_ke`, `posisi_awal`, `posisi_akhir`, `lo1`, `lo2`, `lo3`, `lo4`, `lo5`, `lo6`, `lo7`, `lo8`, `kategori`) VALUES
(0, 1, 1, 1, 7, 7, 4, 3, 2, 1, 6, 8, 5, 3),
(0, 1, 2, 2, 4, 7, 2, 3, 4, 1, 6, 8, 5, 3),
(0, 1, 3, 3, 5, 7, 2, 1, 4, 3, 6, 8, 5, 3),
(0, 1, 4, 4, 6, 7, 2, 1, 6, 3, 4, 8, 5, 3),
(0, 1, 5, 7, 8, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(0, 2, 1, 1, 8, 7, 1, 4, 5, 3, 2, 6, 8, 3),
(0, 2, 2, 2, 6, 7, 2, 4, 5, 3, 1, 6, 8, 3),
(0, 2, 3, 3, 6, 7, 2, 1, 5, 3, 4, 6, 8, 3),
(0, 2, 4, 4, 7, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(0, 3, 1, 1, 7, 7, 6, 3, 5, 8, 1, 2, 4, 3),
(0, 3, 2, 2, 7, 7, 2, 3, 5, 8, 1, 6, 4, 3),
(0, 3, 3, 3, 6, 7, 2, 1, 5, 8, 3, 6, 4, 3),
(0, 3, 4, 4, 7, 7, 2, 1, 6, 8, 3, 5, 4, 3),
(0, 3, 5, 5, 6, 7, 2, 1, 6, 3, 8, 5, 4, 3),
(0, 3, 6, 6, 8, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(0, 4, 1, 1, 5, 7, 8, 4, 3, 1, 2, 6, 5, 3),
(0, 4, 2, 2, 6, 7, 2, 4, 3, 1, 8, 6, 5, 3),
(0, 4, 3, 3, 5, 7, 2, 1, 3, 4, 8, 6, 5, 3),
(0, 4, 4, 4, 7, 7, 2, 1, 6, 4, 8, 3, 5, 3),
(0, 4, 5, 5, 7, 7, 2, 1, 6, 3, 8, 4, 5, 3),
(0, 4, 6, 6, 7, 7, 2, 1, 6, 3, 4, 8, 5, 3),
(0, 4, 7, 7, 8, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(0, 5, 1, 0, 0, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(1, 1, 1, 1, 7, 7, 4, 3, 2, 1, 6, 8, 5, 3),
(1, 1, 2, 2, 4, 7, 2, 3, 4, 1, 6, 8, 5, 3),
(1, 1, 3, 3, 5, 7, 2, 1, 4, 3, 6, 8, 5, 3),
(1, 1, 4, 4, 6, 7, 2, 1, 6, 3, 4, 8, 5, 3),
(1, 1, 5, 7, 8, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(1, 2, 1, 1, 8, 7, 1, 4, 5, 3, 2, 6, 8, 3),
(1, 2, 2, 2, 6, 7, 2, 4, 5, 3, 1, 6, 8, 3),
(1, 2, 3, 3, 6, 7, 2, 1, 5, 3, 4, 6, 8, 3),
(1, 2, 4, 4, 7, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(1, 3, 1, 4, 7, 7, 2, 1, 6, 8, 3, 5, 4, 3),
(1, 3, 2, 5, 6, 7, 2, 1, 6, 3, 8, 5, 4, 3),
(1, 3, 3, 6, 8, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(1, 4, 1, 5, 7, 7, 2, 1, 6, 3, 8, 4, 5, 3),
(1, 4, 2, 6, 7, 7, 2, 1, 6, 3, 4, 8, 5, 3),
(1, 4, 3, 7, 8, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(1, 5, 1, 0, 0, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(2, 1, 1, 1, 7, 7, 4, 3, 2, 1, 6, 8, 5, 3),
(2, 1, 2, 2, 4, 7, 2, 3, 4, 1, 6, 8, 5, 3),
(2, 1, 3, 3, 5, 7, 2, 1, 4, 3, 6, 8, 5, 3),
(2, 1, 4, 4, 6, 7, 2, 1, 6, 3, 4, 8, 5, 3),
(2, 1, 5, 7, 8, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(2, 2, 1, 1, 8, 7, 1, 4, 5, 3, 2, 6, 8, 3),
(2, 2, 2, 2, 6, 7, 2, 4, 5, 3, 1, 6, 8, 3),
(2, 2, 3, 3, 6, 7, 2, 1, 5, 3, 4, 6, 8, 3),
(2, 2, 4, 4, 7, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(2, 3, 1, 4, 7, 7, 2, 1, 6, 8, 3, 5, 4, 3),
(2, 3, 2, 5, 6, 7, 2, 1, 6, 3, 8, 5, 4, 3),
(2, 3, 3, 6, 8, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(2, 4, 1, 5, 7, 7, 2, 1, 6, 3, 8, 4, 5, 3),
(2, 4, 2, 6, 7, 7, 2, 1, 6, 3, 4, 8, 5, 3),
(2, 4, 3, 7, 8, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(2, 5, 1, 0, 0, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(3, 1, 1, 1, 7, 7, 4, 3, 2, 1, 6, 8, 5, 3),
(3, 1, 2, 2, 4, 7, 2, 3, 4, 1, 6, 8, 5, 3),
(3, 1, 3, 3, 5, 7, 2, 1, 4, 3, 6, 8, 5, 3),
(3, 1, 4, 4, 6, 7, 2, 1, 6, 3, 4, 8, 5, 3),
(3, 1, 5, 7, 8, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(3, 2, 1, 1, 8, 7, 1, 4, 5, 3, 2, 6, 8, 3),
(3, 2, 2, 2, 6, 7, 2, 4, 5, 3, 1, 6, 8, 3),
(3, 2, 3, 3, 6, 7, 2, 1, 5, 3, 4, 6, 8, 3),
(3, 2, 4, 4, 7, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(3, 3, 1, 4, 7, 7, 2, 1, 6, 8, 3, 5, 4, 3),
(3, 3, 2, 5, 6, 7, 2, 1, 6, 3, 8, 5, 4, 3),
(3, 3, 3, 6, 8, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(3, 4, 1, 5, 7, 7, 2, 1, 6, 3, 8, 4, 5, 3),
(3, 4, 2, 6, 7, 7, 2, 1, 6, 3, 4, 8, 5, 3),
(3, 4, 3, 7, 8, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(3, 5, 1, 0, 0, 7, 2, 1, 6, 3, 4, 5, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transpos_ke_2`
--

CREATE TABLE `transpos_ke_2` (
  `iterasi_ke` int(11) DEFAULT NULL,
  `id_pbest` int(11) DEFAULT NULL,
  `langkah_ke` int(11) DEFAULT NULL,
  `posisi_awal` int(11) DEFAULT NULL,
  `posisi_akhir` int(11) DEFAULT NULL,
  `lo1` int(11) DEFAULT NULL,
  `lo2` int(11) DEFAULT NULL,
  `lo3` int(11) DEFAULT NULL,
  `lo4` int(11) DEFAULT NULL,
  `lo5` int(11) DEFAULT NULL,
  `lo6` int(11) DEFAULT NULL,
  `lo7` int(11) DEFAULT NULL,
  `lo8` int(11) DEFAULT NULL,
  `kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transpos_ke_2`
--

INSERT INTO `transpos_ke_2` (`iterasi_ke`, `id_pbest`, `langkah_ke`, `posisi_awal`, `posisi_akhir`, `lo1`, `lo2`, `lo3`, `lo4`, `lo5`, `lo6`, `lo7`, `lo8`, `kategori`) VALUES
(0, 1, 1, 1, 7, 7, 4, 3, 2, 1, 6, 8, 5, 3),
(0, 1, 2, 2, 4, 7, 2, 3, 4, 1, 6, 8, 5, 3),
(0, 1, 3, 3, 5, 7, 2, 1, 4, 3, 6, 8, 5, 3),
(0, 2, 1, 1, 8, 7, 1, 4, 5, 3, 2, 6, 8, 3),
(0, 2, 2, 2, 6, 7, 2, 4, 5, 3, 1, 6, 8, 3),
(0, 3, 1, 1, 7, 7, 6, 3, 5, 8, 1, 2, 4, 3),
(0, 3, 2, 2, 7, 7, 2, 3, 5, 8, 1, 6, 4, 3),
(0, 3, 3, 3, 6, 7, 2, 1, 5, 8, 3, 6, 4, 3),
(0, 4, 1, 1, 5, 7, 8, 4, 3, 1, 2, 6, 5, 3),
(0, 4, 2, 2, 6, 7, 2, 4, 3, 1, 8, 6, 5, 3),
(0, 4, 3, 3, 5, 7, 2, 1, 3, 4, 8, 6, 5, 3),
(0, 4, 4, 4, 7, 7, 2, 1, 6, 4, 8, 3, 5, 3),
(0, 5, 1, 0, 0, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(1, 1, 1, 1, 7, 7, 4, 3, 2, 1, 6, 8, 5, 3),
(1, 1, 2, 2, 4, 7, 2, 3, 4, 1, 6, 8, 5, 3),
(1, 1, 3, 3, 5, 7, 2, 1, 4, 3, 6, 8, 5, 3),
(1, 2, 1, 1, 8, 7, 1, 4, 5, 3, 2, 6, 8, 3),
(1, 2, 2, 2, 6, 7, 2, 4, 5, 3, 1, 6, 8, 3),
(1, 3, 1, 4, 7, 7, 2, 1, 6, 8, 3, 5, 4, 3),
(1, 3, 2, 5, 6, 7, 2, 1, 6, 3, 8, 5, 4, 3),
(1, 4, 1, 5, 7, 7, 2, 1, 6, 3, 8, 4, 5, 3),
(1, 4, 2, 6, 7, 7, 2, 1, 6, 3, 4, 8, 5, 3),
(1, 5, 1, 0, 0, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(2, 1, 1, 1, 7, 7, 4, 3, 2, 1, 6, 8, 5, 3),
(2, 1, 2, 2, 4, 7, 2, 3, 4, 1, 6, 8, 5, 3),
(2, 1, 3, 3, 5, 7, 2, 1, 4, 3, 6, 8, 5, 3),
(2, 2, 1, 1, 8, 7, 1, 4, 5, 3, 2, 6, 8, 3),
(2, 2, 2, 2, 6, 7, 2, 4, 5, 3, 1, 6, 8, 3),
(2, 3, 1, 4, 7, 7, 2, 1, 6, 8, 3, 5, 4, 3),
(2, 3, 2, 5, 6, 7, 2, 1, 6, 3, 8, 5, 4, 3),
(2, 4, 1, 5, 7, 7, 2, 1, 6, 3, 8, 4, 5, 3),
(2, 4, 2, 6, 7, 7, 2, 1, 6, 3, 4, 8, 5, 3),
(2, 5, 1, 0, 0, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(3, 1, 1, 1, 7, 7, 4, 3, 2, 1, 6, 8, 5, 3),
(3, 1, 2, 2, 4, 7, 2, 3, 4, 1, 6, 8, 5, 3),
(3, 1, 3, 3, 5, 7, 2, 1, 4, 3, 6, 8, 5, 3),
(3, 2, 1, 1, 8, 7, 1, 4, 5, 3, 2, 6, 8, 3),
(3, 2, 2, 2, 6, 7, 2, 4, 5, 3, 1, 6, 8, 3),
(3, 3, 1, 4, 7, 7, 2, 1, 6, 8, 3, 5, 4, 3),
(3, 3, 2, 5, 6, 7, 2, 1, 6, 3, 8, 5, 4, 3),
(3, 4, 1, 5, 7, 7, 2, 1, 6, 3, 8, 4, 5, 3),
(3, 4, 2, 6, 7, 7, 2, 1, 6, 3, 4, 8, 5, 3),
(3, 5, 1, 0, 0, 7, 2, 1, 6, 3, 4, 5, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transpos_ke_3`
--

CREATE TABLE `transpos_ke_3` (
  `iterasi_ke` int(11) DEFAULT NULL,
  `id_pbest` int(11) DEFAULT NULL,
  `langkah_ke` int(11) DEFAULT NULL,
  `posisi_awal` int(11) DEFAULT NULL,
  `posisi_akhir` int(11) DEFAULT NULL,
  `lo1` int(11) DEFAULT NULL,
  `lo2` int(11) DEFAULT NULL,
  `lo3` int(11) DEFAULT NULL,
  `lo4` int(11) DEFAULT NULL,
  `lo5` int(11) DEFAULT NULL,
  `lo6` int(11) DEFAULT NULL,
  `lo7` int(11) DEFAULT NULL,
  `lo8` int(11) DEFAULT NULL,
  `kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transpos_ke_3`
--

INSERT INTO `transpos_ke_3` (`iterasi_ke`, `id_pbest`, `langkah_ke`, `posisi_awal`, `posisi_akhir`, `lo1`, `lo2`, `lo3`, `lo4`, `lo5`, `lo6`, `lo7`, `lo8`, `kategori`) VALUES
(0, 1, 1, 1, 7, 7, 4, 3, 2, 1, 6, 8, 5, 3),
(0, 1, 2, 2, 4, 7, 2, 3, 4, 1, 6, 8, 5, 3),
(0, 1, 3, 3, 5, 7, 2, 1, 4, 3, 6, 8, 5, 3),
(0, 2, 1, 1, 8, 7, 1, 4, 5, 3, 2, 6, 8, 3),
(0, 2, 2, 2, 6, 7, 2, 4, 5, 3, 1, 6, 8, 3),
(0, 3, 1, 1, 7, 7, 6, 3, 5, 8, 1, 2, 4, 3),
(0, 3, 2, 2, 7, 7, 2, 3, 5, 8, 1, 6, 4, 3),
(0, 3, 3, 3, 6, 7, 2, 1, 5, 8, 3, 6, 4, 3),
(0, 4, 1, 1, 5, 7, 8, 4, 3, 1, 2, 6, 5, 3),
(0, 4, 2, 2, 6, 7, 2, 4, 3, 1, 8, 6, 5, 3),
(0, 4, 3, 3, 5, 7, 2, 1, 3, 4, 8, 6, 5, 3),
(0, 4, 4, 4, 7, 7, 2, 1, 6, 4, 8, 3, 5, 3),
(0, 5, 1, 0, 0, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(1, 1, 1, 0, 0, 7, 2, 1, 4, 3, 6, 8, 5, 3),
(1, 2, 1, 0, 0, 7, 2, 4, 5, 3, 1, 6, 8, 3),
(1, 3, 1, 4, 7, 7, 2, 1, 6, 8, 3, 5, 4, 3),
(1, 3, 2, 5, 6, 7, 2, 1, 6, 3, 8, 5, 4, 3),
(1, 4, 1, 5, 7, 7, 2, 1, 6, 3, 8, 4, 5, 3),
(1, 4, 2, 6, 7, 7, 2, 1, 6, 3, 4, 8, 5, 3),
(1, 5, 1, 0, 0, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(2, 1, 1, 0, 0, 7, 2, 1, 4, 3, 6, 8, 5, 3),
(2, 2, 1, 0, 0, 7, 2, 4, 5, 3, 1, 6, 8, 3),
(2, 3, 1, 0, 0, 7, 2, 1, 6, 3, 8, 5, 4, 3),
(2, 4, 1, 0, 0, 7, 2, 1, 6, 3, 4, 8, 5, 3),
(2, 5, 1, 0, 0, 7, 2, 1, 6, 3, 4, 5, 8, 3),
(3, 1, 1, 0, 0, 7, 2, 1, 4, 3, 6, 8, 5, 3),
(3, 2, 1, 0, 0, 7, 2, 4, 5, 3, 1, 6, 8, 3),
(3, 3, 1, 0, 0, 7, 2, 1, 6, 3, 8, 5, 4, 3),
(3, 4, 1, 0, 0, 7, 2, 1, 6, 3, 4, 8, 5, 3),
(3, 5, 1, 0, 0, 7, 2, 1, 6, 3, 4, 5, 8, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
