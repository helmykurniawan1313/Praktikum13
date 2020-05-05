-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03 Mei 2020 pada 13.31
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `praktikun13`
--

CREATE TABLE `praktikun13` (
  `Country` varchar(30) NOT NULL,
  `Total_Cases` int(22) NOT NULL,
  `New_Cases` int(22) NOT NULL,
  `Total_Deaths` int(22) NOT NULL,
  `New_Deaths` int(22) NOT NULL,
  `Total_Recovered` int(22) NOT NULL,
  `Active_Cases` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `praktikun13`
--

INSERT INTO `praktikun13` (`Country`, `Total_Cases`, `New_Cases`, `Total_Deaths`, `New_Deaths`, `Total_Recovered`, `Active_Cases`) VALUES
('China', 82836, 6, 4633, 0, 77555, 648),
('France', 165911, 2638, 23660, 367, 46886, 95365),
('Germany', 159431, 673, 6215, 89, 117400, 35816),
('Iran', 92584, 1112, 5877, 71, 72439, 14268),
('Italy', 201505, 2091, 27359, 382, 68941, 105205),
('Russia', 93558, 6411, 867, 73, 8456, 84235),
('Spain', 232128, 2706, 23822, 301, 123903, 8440),
('Turkey', 114653, 2392, 2992, 92, 38809, 72852),
('UK', 161145, 3996, 21678, 586, 0, 139123),
('USA', 1029878, 19522, 58640, 1843, 140138, 831100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `praktikun13`
--
ALTER TABLE `praktikun13`
  ADD PRIMARY KEY (`Country`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
