-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2023 at 11:14 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobhistory`
--

CREATE TABLE `jobhistory` (
  `id` int(11) NOT NULL,
  `NIP` varchar(255) NOT NULL,
  `previousJabatan` varchar(255) DEFAULT NULL,
  `newJabatan` varchar(255) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobhistory`
--

INSERT INTO `jobhistory` (`id`, `NIP`, `previousJabatan`, `newJabatan`, `startDate`, `endDate`) VALUES
(1, '1000', 'Supervisor HR', 'Manager Produksi', '2021-01-01', '2021-12-31'),
(2, '1001', 'Asisten Manager Keuangan', 'Supervisor HR', '2021-02-01', '2021-11-01'),
(3, '1002', 'Sekretaris', 'Asisten Manager Keuangan', '2020-03-01', '2021-03-01'),
(4, '1003', 'Manager Produksi', 'Supervisor HR', '2019-01-01', '2020-12-31'),
(5, '1000', 'Manager Produksi', 'Sekretaris', '2020-05-01', '2021-04-01'),
(6, '1001', 'Supervisor HR', 'Sekretaris', '2020-06-01', '2021-06-01'),
(7, '1002', 'Asisten Manager Keuangan', 'Manager Produksi', '2019-07-01', '2020-06-30'),
(8, '1003', 'Sekretaris', 'Asisten Manager Keuangan', '2021-08-01', '2021-08-31'),
(9, '1000', 'Asisten Manager Keuangan', 'Manager Produksi', '2021-09-01', '2021-10-01'),
(10, '1001', 'Manager Produksi', 'Supervisor HR', '2020-10-01', '2021-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenisKelamin` enum('Male','Female') NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `tanggalAktifJabatan` date NOT NULL,
  `tanggalMasuk` date NOT NULL,
  `statusKaryawan` enum('Active','Inactive') NOT NULL,
  `roles` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `nip`, `nama`, `jenisKelamin`, `jabatan`, `tanggalAktifJabatan`, `tanggalMasuk`, `statusKaryawan`, `roles`) VALUES
(1, 'lukman1000', 'lukman1000@example.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1000', 'Lukman Hakim', 'Male', 'Supervisor HR', '2001-01-19', '1990-05-05', 'Active', 'admin'),
(2, 'saiful1001', 'saiful1001@example.com', '12dea96fec20593566ab75692c9949596833adc9', '1001', 'Saiful Anwar', 'Male', 'Asisten Manager Keuangan', '2005-11-20', '1988-01-10', 'Active', 'user'),
(3, 'sinta1002', 'sinta1002@example.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1002', 'Sinta Mei', 'Female', 'Sekretaris', '2019-08-01', '2019-08-01', 'Active', 'admin'),
(4, 'tubagus1003', 'tubagus1003@example.com', '12dea96fec20593566ab75692c9949596833adc9', '1003', 'Tubagus', 'Male', 'Manager Produksi', '2002-02-05', '1986-03-20', 'Active', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobhistory`
--
ALTER TABLE `jobhistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_NIP` (`NIP`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobhistory`
--
ALTER TABLE `jobhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobhistory`
--
ALTER TABLE `jobhistory`
  ADD CONSTRAINT `fk_users_NIP` FOREIGN KEY (`NIP`) REFERENCES `users` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
