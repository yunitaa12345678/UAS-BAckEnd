-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 05:04 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tmhs`
--

CREATE TABLE `tmhs` (
  `id_mhs` int(11) NOT NULL,
  `nim` varchar(9) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmhs`
--

INSERT INTO `tmhs` (`id_mhs`, `nim`, `nama`, `alamat`, `prodi`) VALUES
(16, '210010022', 'Ida Ayu Made Yunita', 'Badung', 'S1 - SK'),
(17, '210010027', 'Ni Kadek Dwi Lastiari', 'Badung', 'S1-SK'),
(18, '210010138', 'I Made Budiarta Muliyana', 'Karangasem', 'S1-SK'),
(19, '210010080', 'Ghofari Krisnandito Nugroho', 'Denpasar', 'S1-SK');


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--


INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'yunita', 'password'),
(3, 'yunita', 'password'),
(4, 'ferran', 'password'),
(5, 'sinta', 'password'),
(6, 'odik', '$2y$10$F2IcHxmGWqH6ulzBAwixoOG0gU7FNvrZMBMpSoXyc9/sn5Ed374zC'),
(7, 'kuwik', '$2y$10$yHrpbdcICEABmFy1Z.6j3O6IILI0pnYNXDS2.UBZ2KesooHzmpOTm'),
(8, 'adit', '$2y$10$Q6DPnA9SJT.iN9D2LgN7bereo9ejVZeXYhkXQ0UBnRmDv//YF8pHK'),
(9, 'lita', '$2y$10$qUUDyIz2QHnWYBo6F1NgmOpf6Vh1wXzaHh2qFulpNlWN83GNreHAG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tmhs`
--
ALTER TABLE `tmhs`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tmhs`
--
ALTER TABLE `tmhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
