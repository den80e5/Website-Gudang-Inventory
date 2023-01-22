-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2021 at 02:54 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_pengajuan`
--

CREATE TABLE `form_pengajuan` (
  `id` int(11) NOT NULL,
  `no_lot` varchar(25) NOT NULL,
  `nama_jenis_tinta` varchar(35) NOT NULL,
  `status` varchar(10) NOT NULL,
  `kg` int(10) NOT NULL,
  `no_mesin` varchar(25) NOT NULL,
  `nama_order` varchar(25) NOT NULL,
  `no_spk` varchar(50) NOT NULL,
  `status_pengajuan` varchar(15) NOT NULL,
  `pengaju` varchar(25) NOT NULL,
  `tgl_diajukan` varchar(30) NOT NULL,
  `catatan` text NOT NULL,
  `kode_form` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_pengajuan`
--

INSERT INTO `form_pengajuan` (`id`, `no_lot`, `nama_jenis_tinta`, `status`, `kg`, `no_mesin`, `nama_order`, `no_spk`, `status_pengajuan`, `pengaju`, `tgl_diajukan`, `catatan`, `kode_form`) VALUES
(52, '3tert4', 'fghfg', 'gfhf', 5, '245', 'yy5465', '098', '', '', '2021-08-23', 'rtyryr', '0001');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tingkatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `tingkatan`) VALUES
(2, 'gudang tinta', 'gudang@gmail.com', 'gudang', '123', 'gudang'),
(3, 'operator tinta', 'op@gmail.com', 'operator', '123', 'operator'),
(4, 'ppic', 'ppic@gmail.com', 'ppic', '123', 'ppic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_pengajuan`
--
ALTER TABLE `form_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_pengajuan`
--
ALTER TABLE `form_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
