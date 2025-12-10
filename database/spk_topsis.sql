-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2025 at 03:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_topsis`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tipe` enum('benefit','cost') NOT NULL,
  `bobot` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id`, `nama`, `tipe`, `bobot`, `created_at`, `updated_at`) VALUES
(6, 'Harga', 'cost', 5.00, '2025-11-25 17:20:03', '2025-11-25 17:20:03'),
(7, 'Jumlah Kuota', 'benefit', 5.00, '2025-11-25 17:20:26', '2025-11-25 17:20:26'),
(8, 'Kecepatan Internet', 'benefit', 5.00, '2025-11-25 17:20:41', '2025-11-25 17:20:41'),
(9, 'Bonus', 'benefit', 4.00, '2025-11-25 17:20:50', '2025-11-25 17:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_11_10_062459_create_operators_table', 1),
(6, '2025_11_10_062505_create_kriterias_table', 1),
(7, '2025_11_10_062512_create_nilais_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `operator_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilais`
--

INSERT INTO `nilais` (`id`, `operator_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 4.00, '2025-12-07 22:50:43', '2025-12-07 22:50:43'),
(2, 1, 7, 1.00, '2025-12-07 22:50:43', '2025-12-07 22:50:43'),
(3, 1, 8, 3.00, '2025-12-07 22:50:43', '2025-12-07 22:50:43'),
(4, 1, 9, 4.00, '2025-12-07 22:50:43', '2025-12-07 22:50:43'),
(5, 2, 6, 4.00, '2025-12-07 22:51:01', '2025-12-07 22:51:24'),
(6, 2, 7, 2.00, '2025-12-07 22:51:01', '2025-12-07 22:51:24'),
(7, 2, 8, 3.00, '2025-12-07 22:51:01', '2025-12-07 22:51:24'),
(8, 2, 9, 5.00, '2025-12-07 22:51:01', '2025-12-07 22:51:24'),
(9, 3, 6, 5.00, '2025-12-07 22:51:50', '2025-12-07 22:51:50'),
(10, 3, 7, 1.00, '2025-12-07 22:51:50', '2025-12-07 22:51:50'),
(11, 3, 8, 3.00, '2025-12-07 22:51:50', '2025-12-07 22:51:50'),
(12, 3, 9, 4.00, '2025-12-07 22:51:50', '2025-12-07 22:51:50'),
(13, 4, 6, 2.00, '2025-12-07 22:52:09', '2025-12-07 22:52:09'),
(14, 4, 7, 3.00, '2025-12-07 22:52:09', '2025-12-07 22:52:09'),
(15, 4, 8, 5.00, '2025-12-07 22:52:09', '2025-12-07 22:52:09'),
(16, 4, 9, 5.00, '2025-12-07 22:52:09', '2025-12-07 22:52:09'),
(17, 5, 6, 5.00, '2025-12-07 22:52:27', '2025-12-07 22:52:27'),
(18, 5, 7, 1.00, '2025-12-07 22:52:27', '2025-12-07 22:52:27'),
(19, 5, 8, 3.00, '2025-12-07 22:52:27', '2025-12-07 22:52:27'),
(20, 5, 9, 3.00, '2025-12-07 22:52:27', '2025-12-07 22:52:27'),
(21, 6, 6, 4.00, '2025-12-07 22:52:41', '2025-12-07 22:52:41'),
(22, 6, 7, 1.00, '2025-12-07 22:52:41', '2025-12-07 22:52:41'),
(23, 6, 8, 3.00, '2025-12-07 22:52:41', '2025-12-07 22:52:41'),
(24, 6, 9, 4.00, '2025-12-07 22:52:41', '2025-12-07 22:52:41'),
(25, 7, 6, 3.00, '2025-12-07 22:53:00', '2025-12-07 22:53:00'),
(26, 7, 7, 2.00, '2025-12-07 22:53:00', '2025-12-07 22:53:00'),
(27, 7, 8, 5.00, '2025-12-07 22:53:00', '2025-12-07 22:53:00'),
(28, 7, 9, 4.00, '2025-12-07 22:53:00', '2025-12-07 22:53:00'),
(29, 8, 6, 2.00, '2025-12-07 22:53:22', '2025-12-07 22:53:22'),
(30, 8, 7, 3.00, '2025-12-07 22:53:22', '2025-12-07 22:53:22'),
(31, 8, 8, 5.00, '2025-12-07 22:53:22', '2025-12-07 22:53:22'),
(32, 8, 9, 4.00, '2025-12-07 22:53:22', '2025-12-07 22:53:22');

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Three (3)', '2025-11-25 17:06:23', '2025-11-25 17:06:23'),
(2, 'IM3', '2025-11-25 17:06:32', '2025-11-25 17:06:32'),
(3, 'AXIS', '2025-11-25 17:06:41', '2025-11-25 17:06:41'),
(4, 'ByU', '2025-11-25 17:06:50', '2025-11-25 17:06:50'),
(5, 'SMARTFREN', '2025-11-25 17:07:03', '2025-11-25 17:07:03'),
(6, 'XL', '2025-11-25 17:07:10', '2025-11-25 17:07:10'),
(7, 'SIMPATI', '2025-11-25 17:07:17', '2025-11-25 17:07:17'),
(8, 'KARTU HALO', '2025-11-25 17:07:24', '2025-11-25 17:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilais_operator_id_foreign` (`operator_id`),
  ADD KEY `nilais_kriteria_id_foreign` (`kriteria_id`);

--
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilais`
--
ALTER TABLE `nilais`
  ADD CONSTRAINT `nilais_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilais_operator_id_foreign` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
