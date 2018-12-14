-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2018 at 10:19 AM
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
-- Table structure for table `donasis`
--

CREATE TABLE `donasis` (
  `id` int(12) NOT NULL,
  `donatur` int(12) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` int(12) NOT NULL,
  `kategori` varchar(80) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `kategori`, `updated_at`, `created_at`) VALUES
(1, 'Makanan', '2018-12-12 06:41:23', '2018-12-11 23:02:14'),
(3, 'Minuman', '2018-12-11 23:21:58', '2018-12-11 23:21:58'),
(4, 'Perkakas dan Peralatan', '2018-12-11 23:22:27', '2018-12-11 23:22:27'),
(5, 'Tempat Tinggal Darurat', '2018-12-11 23:22:40', '2018-12-11 23:22:40'),
(6, 'Obat-obatan', '2018-12-11 23:22:55', '2018-12-11 23:22:55'),
(7, 'Bahan Bakar', '2018-12-11 23:23:05', '2018-12-11 23:23:05'),
(8, 'Bahan Makanan', '2018-12-11 23:23:33', '2018-12-11 23:23:33'),
(9, 'Material Bangunan', '2018-12-11 23:23:44', '2018-12-11 23:23:44'),
(10, 'Pakaian', '2018-12-11 23:23:53', '2018-12-11 23:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `laporans`
--

CREATE TABLE `laporans` (
  `id` int(12) NOT NULL,
  `nama_pelapor` varchar(80) DEFAULT NULL,
  `kontak` varchar(20) DEFAULT NULL,
  `lokasi` int(12) DEFAULT NULL,
  `kategori_kebutuhan` int(12) DEFAULT NULL,
  `catatan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporans`
--

INSERT INTO `laporans` (`id`, `nama_pelapor`, `kontak`, `lokasi`, `kategori_kebutuhan`, `catatan`, `created_at`, `updated_at`) VALUES
(8724, 'Usman', '08232428742', 2, 5, 'Tenda komando berukuran besar untuk dapur darurat.', '2018-12-14 09:08:03', '2018-12-11 17:29:59'),
(8726, 'Afwan', '098234279', 1, 4, 'Butuh Tenda dan Selimut', '2018-12-14 09:08:08', '2018-12-11 17:06:20'),
(8737, 'Salman', '09072491829', 2, 2, 'Butuh banyak', '2018-12-14 09:08:11', '2018-12-11 21:38:05'),
(8741, 'Aulia', '0821482742', 1, 1849, 'Buat stok di rumah', '2018-12-14 09:08:14', '2018-12-11 23:15:01'),
(8742, 'Vadil', '0928193074902', 3, 5, 'Tenda komando untuk markas bantuan', '2018-12-14 09:08:16', '2018-12-11 17:23:35');

-- --------------------------------------------------------

--
-- Table structure for table `logistiks`
--

CREATE TABLE `logistiks` (
  `id` int(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `stok` int(100) NOT NULL,
  `kadaluarsa` date NOT NULL,
  `kategori` int(12) NOT NULL,
  `daerah` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logistiks`
--

INSERT INTO `logistiks` (`id`, `nama`, `stok`, `kadaluarsa`, `kategori`, `daerah`, `created_at`, `updated_at`) VALUES
(5, 'Biskuit Darurat', 500, '2019-08-20', 1, 'Gunungkidul', '2018-12-12 06:54:36', '2018-12-11 23:54:36'),
(6, 'Tenda Bencana', 40, '2022-08-08', 5, 'Sleman', '2018-12-12 06:25:33', '2018-12-06 15:42:39'),
(2736, 'Selimut', 100, '2018-11-29', 10, 'Yogyakarta', '2018-12-12 06:25:17', '0000-00-00 00:00:00'),
(3598, 'Mi Instan', 500, '2019-12-31', 1, 'Yogyakarta', '2018-12-12 06:25:20', '2018-11-30 02:27:39'),
(8274, 'Betadines', 200, '2018-11-28', 6, 'Yogyakarta', '2018-12-12 06:25:51', '2018-11-30 06:21:07'),
(9823, 'Bantal', 200, '2017-10-29', 5, 'Yogyakarta', '2018-12-12 06:25:37', '2018-11-30 02:27:10');

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
-- Table structure for table `pengungsis`
--

CREATE TABLE `pengungsis` (
  `id` int(12) NOT NULL,
  `nama_pengungsian` varchar(80) NOT NULL,
  `jumlah_pengungsi` int(20) NOT NULL,
  `alamat` text NOT NULL,
  `daerah` varchar(100) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengungsis`
--

INSERT INTO `pengungsis` (`id`, `nama_pengungsian`, `jumlah_pengungsi`, `alamat`, `daerah`, `lat`, `lng`, `updated_at`, `created_at`) VALUES
(1, 'Pakem 1', 200, 'Jln. Raya Pakem', 'Sleman', -7.665572, 110.420036, '2018-12-14 00:59:41', '2018-12-14 00:59:41'),
(2, 'Pakem 2', 100, 'Jln. Pakem Turi', 'Sleman', -7.659277, 110.396996, '2018-12-14 01:30:36', '2018-12-14 01:30:36'),
(3, 'Mission Control GOR UII', 200, 'Jln. Kaliurang KM. 14,5', 'Sleman', -7.686667, 110.409439, '2018-12-14 01:44:00', '2018-12-14 01:44:00');

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
-- Indexes for table `donasis`
--
ALTER TABLE `donasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporans`
--
ALTER TABLE `laporans`
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
-- Indexes for table `pengungsis`
--
ALTER TABLE `pengungsis`
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
-- AUTO_INCREMENT for table `donasis`
--
ALTER TABLE `donasis`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8743;

--
-- AUTO_INCREMENT for table `logistiks`
--
ALTER TABLE `logistiks`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9824;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengungsis`
--
ALTER TABLE `pengungsis`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
