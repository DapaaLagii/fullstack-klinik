-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 06:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbklinik_02`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrasis`
--

CREATE TABLE `administrasis` (
  `id` int(10) NOT NULL,
  `kode_administrasi` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `pasien_id` int(10) NOT NULL,
  `dokter_id` int(10) NOT NULL,
  `biaya` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrasis`
--

INSERT INTO `administrasis` (`id`, `kode_administrasi`, `tanggal`, `pasien_id`, `dokter_id`, `biaya`) VALUES
(1, 'a001', '2023-10-02', 1, 1, 20000),
(2, 'a002', '2023-10-02', 2, 2, 10000),
(3, 'a001', '2023-10-02', 1, 1, 20000),
(4, 'a002', '2023-10-02', 2, 2, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `dokters`
--

CREATE TABLE `dokters` (
  `id` int(10) NOT NULL,
  `kode_dokter` varchar(10) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `spesialis` varchar(30) NOT NULL,
  `nomor_hp` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokters`
--

INSERT INTO `dokters` (`id`, `kode_dokter`, `nama_dokter`, `spesialis`, `nomor_hp`, `created_at`, `updated_at`) VALUES
(1, 'd001', 'yazid', 'syaraf', '082123242526', '2023-10-02 04:26:36', '2023-10-02 04:26:36'),
(2, 'd002', 'sonic', 'kandungan', '082123242527', '2023-10-02 04:27:17', '2023-10-02 04:27:17'),
(3, 'd003', 'wahyu', 'cinta', '082123242528', '2023-10-02 04:28:36', '2023-10-02 04:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `pasiens`
--

CREATE TABLE `pasiens` (
  `id` int(10) NOT NULL,
  `kode_pasien` varchar(10) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasiens`
--

INSERT INTO `pasiens` (`id`, `kode_pasien`, `nama_pasien`, `jenis_kelamin`, `status`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'p001', 'alfani', 'laki-laki', 'pacaran', 'talang bakung, jambi', '2023-10-02 04:25:10', '2023-10-02 04:25:10'),
(2, 'p002', 'novan', 'laki-laki', 'pacaran', 'handil,kota jambi', '2023-10-02 04:20:38', '2023-10-02 04:20:38'),
(3, 'p003', 'riski', 'laki-laki', 'jomblo', 'kota baru, jambi', '2023-10-02 04:25:46', '2023-10-02 04:25:46'),
(4, 'p001', 'budi', 'laki-laki', 'menikah', 'jalan a', '2023-10-02 06:13:48', '2023-10-02 06:13:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrasis`
--
ALTER TABLE `administrasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokters`
--
ALTER TABLE `dokters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasiens`
--
ALTER TABLE `pasiens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrasis`
--
ALTER TABLE `administrasis`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dokters`
--
ALTER TABLE `dokters`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
