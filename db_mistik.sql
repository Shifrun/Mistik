-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2018 at 09:51 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mistik`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` int(12) NOT NULL,
  `kategori` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laporans`
--

CREATE TABLE `laporans` (
  `id` int(12) NOT NULL,
  `nama_pelapor` varchar(80) DEFAULT NULL,
  `kontak` varchar(20) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `kategori_kebutuhan` int(12) DEFAULT NULL,
  `catatan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporans`
--

INSERT INTO `laporans` (`id`, `nama_pelapor`, `kontak`, `lokasi`, `kategori_kebutuhan`, `catatan`, `created_at`, `updated_at`) VALUES
(8724, 'Usman', '08232428742', 'Sleman', 8, 'Tenda komando berukuran besar untuk dapur darurat', '2018-12-07 08:41:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `logistiks`
--

CREATE TABLE `logistiks` (
  `id` int(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `stok` int(100) NOT NULL,
  `kadaluarsa` date NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `daerah` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logistiks`
--

INSERT INTO `logistiks` (`id`, `nama`, `stok`, `kadaluarsa`, `kategori`, `daerah`, `created_at`, `updated_at`) VALUES
(5, 'Biskuit Darurat', 500, '2019-08-20', 'Makanan', 'Gunungkidul', '2018-12-06 15:42:03', '2018-12-06 15:42:03'),
(6, 'Tenda Bencana', 40, '2022-08-08', 'Alat', 'Sleman', '2018-12-06 15:42:39', '2018-12-06 15:42:39'),
(2736, 'Selimut', 100, '2018-11-29', 'Peralatan', 'Yogyakarta', '2018-12-06 17:19:57', '0000-00-00 00:00:00'),
(3598, 'Mi Instan', 500, '2019-12-31', 'Makanan', 'Yogyakarta', '2018-12-06 17:20:14', '2018-11-30 02:27:39'),
(8274, 'Betadines', 200, '2018-11-28', 'Obat', 'Yogyakarta', '2018-12-06 17:20:04', '2018-11-30 06:21:07'),
(9823, 'Bantal', 200, '2017-10-29', 'Alat', 'Yogyakarta', '2018-12-06 17:20:09', '2018-11-30 02:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Relawan',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'innofiction', 'innofiction@inno.com', NULL, '$2y$10$v.XG7qmgTp3XGGrBlu8dwutwRCrtIimnufJa5ocBpekzo0mRwkCj6', 'Relawan', 'fUCdlRaFPlUg4e6ZRXtVHGPCnwP0EtS0r03TmOmeZQB35sHJrprOfrojV5cZ', '2018-12-06 08:41:10', '2018-12-06 08:41:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logistiks`
--
ALTER TABLE `logistiks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logistiks`
--
ALTER TABLE `logistiks`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
