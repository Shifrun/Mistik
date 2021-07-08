-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2019 at 10:54 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

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

--
-- Dumping data for table `donasis`
--

INSERT INTO `donasis` (`id`, `donatur`, `kontak`, `updated_at`, `created_at`) VALUES
(1, 2, '0824824724', '2018-12-18 15:15:42', '2018-12-18 15:15:42'),
(7, 5, '082324156', '2018-12-18 15:37:30', '2018-12-18 15:37:30'),
(8, 5, '0982424', '2018-12-18 16:20:06', '2018-12-18 16:20:06'),
(16, 5, '08222142134', '2018-12-18 16:27:49', '2018-12-18 16:27:49'),
(21, 5, '09820', '2018-12-18 16:33:35', '2018-12-18 16:33:35'),
(22, 5, '0892892', '2018-12-18 16:36:22', '2018-12-18 16:36:22'),
(23, 5, '21098209', '2018-12-18 16:37:03', '2018-12-18 16:37:03'),
(24, 5, '9024891248', '2018-12-18 16:49:39', '2018-12-18 16:49:39');

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
(1, 'Sandang', '2018-12-17 07:52:35', '2018-12-17 07:52:14'),
(2, 'Pangan', '2018-12-17 07:52:38', '2018-12-17 07:52:14'),
(3, 'Papan', '2018-12-17 07:52:40', '2018-12-17 07:52:14');

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
(8724, 'Usman', '08232428742', 2, 3, 'Tenda komando berukuran besar untuk dapur darurat. Dibutuhkan segera untuk bisa memulai pengolahan makanan darurat untuk korban bencana', '2018-12-17 07:52:59', '2018-12-17 00:00:24'),
(8726, 'Afwan', '098234279', 1, 1, 'Butuh Tenda dan Selimut', '2018-12-17 07:53:04', '2018-12-11 17:06:20'),
(8737, 'Salman', '09072491829', 2, 2, 'Butuh banyak', '2018-12-14 09:08:11', '2018-12-11 21:38:05'),
(8741, 'Aulia', '0821482742', 1, 2, 'Buat stok di rumah', '2018-12-17 07:53:11', '2018-12-11 23:15:01'),
(8742, 'Vadil', '0928193074902', 3, 3, 'Tenda komando untuk markas bantuan', '2018-12-17 07:53:13', '2018-12-11 17:23:35'),
(8743, 'Smith', '012470914809', 1, 1, 'Butuh ini ini ini', '2018-12-18 16:53:14', '2018-12-18 16:53:14'),
(8744, 'Steve', '08124749212', 3, 1, 'Butuh pakaian layak pakai untuk anak-anak', '2018-12-18 16:55:17', '2018-12-18 16:55:17'),
(8745, 'Yusril', '08094724942', 1, 2, 'Kotak P3K untuk penanganan korban luka', '2018-12-18 16:57:08', '2018-12-18 16:57:08');

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
  `daerah` int(12) NOT NULL,
  `sumber` int(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logistiks`
--

INSERT INTO `logistiks` (`id`, `nama`, `stok`, `kadaluarsa`, `kategori`, `daerah`, `sumber`, `created_at`, `updated_at`) VALUES
(5, 'Biskuit Darurat', 500, '2019-08-20', 2, 2, 1, '2018-12-18 21:48:22', '2018-12-18 13:59:35'),
(6, 'Tenda Bencana', 40, '2022-08-08', 3, 4, 5, '2018-12-18 21:48:24', '2018-12-18 13:59:49'),
(3598, 'Mi Instan', 500, '2019-12-31', 2, 1, 2, '2018-12-18 21:48:36', '2018-11-30 02:27:39'),
(8274, 'Betadines', 200, '2018-11-28', 2, 3, 5, '2018-12-18 21:48:38', '2018-11-30 06:21:07'),
(9823, 'Bantal', 200, '2017-10-29', 2, 1, 2, '2018-12-18 21:48:41', '2018-11-30 02:27:10'),
(9824, 'Mi Instan', 500, '2020-01-20', 2, 4, 8, '2018-12-18 21:48:54', '2018-12-17 23:12:05'),
(9825, 'Selimut dan Bantal', 500, '2020-01-20', 1, 2, 2, '2018-12-18 14:51:26', '2018-12-18 14:51:26'),
(9826, 'Tikar dan Tempat TIdur', 500, '2021-01-22', 3, 1, 5, '2018-12-18 15:37:30', '2018-12-18 15:37:30'),
(9837, 'Terpal', 200, '2021-01-20', 1, 1, 5, '2018-12-18 16:31:17', '2018-12-18 16:31:17'),
(9838, 'Peralatan Masak', 200, '2021-01-20', 2, 2, 5, '2018-12-18 16:33:35', '2018-12-18 16:33:35');

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
(3, 'Mission Control GOR UII', 200, 'Jln. Kaliurang KM. 14,5', 'Sleman', -7.686667, 110.409439, '2018-12-14 01:44:00', '2018-12-14 01:44:00'),
(4, 'BNPB HQ', 200, 'Malang', 'Jawa Timur', -7.967652, 112.636490, '2018-12-17 00:55:34', '2018-12-17 00:55:34');

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
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'innofiction', 'innofiction@inno.com', NULL, '$2y$10$v.XG7qmgTp3XGGrBlu8dwutwRCrtIimnufJa5ocBpekzo0mRwkCj6', 'Relawan', 'vhnJEIL7t3tL4Rw0LXD3gPaVTtP8IwzOcxscWNn81xkNCDYu8gGEHd9CpNZp', '2018-12-06 08:41:10', '2018-12-06 08:41:10'),
(2, 'John Doe', 'john@doe.com', NULL, '$2y$10$Wy4z6XVVTd8y4wICg0CTqOOQI1naEDzIminiAZUHV3S0FvB73w7Hi', 'Relawan', 'Ti3gnQdYCSgk9NkldBstoaWdrFzmyAQK0T1V0B6Web2RaeBpIyVsIKKfj0pA', '2018-12-14 21:20:47', '2018-12-14 21:20:47'),
(5, 'James Doe', 'james@doe.com', NULL, '$2y$10$nZwHhX9PHXAjhodO4TbHaebGc/OQCwZkD/alOa6g5yeiAJqdZJf0C', 'Donatur', 'GOpuoF6rQcaMOyqrEKWJG4IRj3WjimkvCih3tDufu6qzMtMQpjwOKiTvUKo9', '2018-12-14 21:34:06', '2018-12-14 21:34:06'),
(9, 'BPBD', 'bpbd@gov.id', NULL, '$2y$10$6NTODIZc8Ux1VVgd598A0OLtKK6hNISNKliK30aoqPGKzvi54zrqS', 'BPBD', NULL, '2019-03-21 02:53:02', '2019-03-21 02:53:02');

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8746;

--
-- AUTO_INCREMENT for table `logistiks`
--
ALTER TABLE `logistiks`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9842;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengungsis`
--
ALTER TABLE `pengungsis`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
