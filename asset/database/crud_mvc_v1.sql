-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2025 at 05:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_mvc_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `mvc_tb_departemen`
--

CREATE TABLE `mvc_tb_departemen` (
  `crudmvc_id_departemen` int(10) NOT NULL,
  `crudmvc_kategori_departemen` enum('Medis','Non Medis','Manajemen') NOT NULL,
  `crudmvc_nama_departemen` varchar(50) NOT NULL,
  `crudmvc_kode_departemen` varchar(50) NOT NULL,
  `crudmvc_departemen_ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mvc_tb_departemen`
--

INSERT INTO `mvc_tb_departemen` (`crudmvc_id_departemen`, `crudmvc_kategori_departemen`, `crudmvc_nama_departemen`, `crudmvc_kode_departemen`, `crudmvc_departemen_ket`) VALUES
(1, 'Medis', 'Instalasi Gawat Darurat', 'IGD', 'Instalasi Gawat Darurat'),
(2, 'Medis', 'Laboratorium', 'LAB', 'Laboratorium'),
(3, 'Manajemen', 'SDM', 'SDM', 'SDM'),
(8, 'Manajemen', 'Keuangan', 'KEU', 'Keuangan'),
(9, 'Non Medis', 'Linen/Laundry', 'LAU', 'Linen/Laundry'),
(10, 'Non Medis', 'Security', 'SEC', 'Security');

-- --------------------------------------------------------

--
-- Table structure for table `mvc_tb_karyawan`
--

CREATE TABLE `mvc_tb_karyawan` (
  `mvc_id_karyawan` int(5) NOT NULL,
  `mvc_nip_karyawan` varchar(50) NOT NULL,
  `mvc_nama_karyawan` varchar(50) NOT NULL,
  `mvc_jk_karyawan` varchar(20) NOT NULL,
  `mvc_id_departemen` int(5) NOT NULL,
  `mvc_foto_karyawan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mvc_tb_karyawan`
--

INSERT INTO `mvc_tb_karyawan` (`mvc_id_karyawan`, `mvc_nip_karyawan`, `mvc_nama_karyawan`, `mvc_jk_karyawan`, `mvc_id_departemen`, `mvc_foto_karyawan`) VALUES
(5, 'RSP.2025.01.001', 'Adele Laurie Blue Adkins MBE', 'Perempuan', 3, '68bee3ac44db0.jpg'),
(9, 'RSP.2025.01.002', 'Olivia Rodrigo', 'Perempuan', 2, '68bee43feb78b.jpg'),
(10, 'RSP.2025.01.003', 'Taylor Alison Swift', 'Perempuan', 8, '68bee4659896d.jpg'),
(12, 'RSP.2025.01.004', 'Avril Ramona Lavigne', 'Laki - Laki', 9, '68bee493785fe.jpg'),
(16, 'RSP2025.001.009', 'Billie Eilish Pirate Baird O\'Connell ', 'Laki - Laki', 10, '68bee4ce85c7e.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mvc_tb_departemen`
--
ALTER TABLE `mvc_tb_departemen`
  ADD PRIMARY KEY (`crudmvc_id_departemen`);

--
-- Indexes for table `mvc_tb_karyawan`
--
ALTER TABLE `mvc_tb_karyawan`
  ADD PRIMARY KEY (`mvc_id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mvc_tb_departemen`
--
ALTER TABLE `mvc_tb_departemen`
  MODIFY `crudmvc_id_departemen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mvc_tb_karyawan`
--
ALTER TABLE `mvc_tb_karyawan`
  MODIFY `mvc_id_karyawan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
