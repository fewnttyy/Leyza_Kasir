-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2024 at 10:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_modal` decimal(10,2) NOT NULL,
  `harga_jual` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `user_id`, `foto`, `nama_barang`, `harga_modal`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
(2, 2, 'barang/LUYiPLWWvgoQ71E3eGBto9IgAVidJtOkWtdN27dx.png', 'kue keju', 300000.00, 20000.00, 5, '2024-12-04 20:57:29', '2024-12-08 01:33:59'),
(3, 2, 'barang/b9GWLcR52rupEt3jFwBWjGcmQ0u4sQRvHvT9XGNe.png', 'kue bulan', 400000.00, 30000.00, 8, '2024-12-04 21:13:00', '2024-12-08 01:03:15'),
(4, 2, 'barang/7m6x5t2hgdJo5A9KuhnhfJ0WTdWM1hpIjbM0vDIk.png', 'kue ulangtahun', 400000.00, 45000.00, 8, '2024-12-04 21:13:39', '2024-12-08 01:03:15'),
(5, 1, 'barang/jfSQkDm5LgnUk2RnxSeIYJS3Dv69KTQhOLTQvS2d.jpg', 'Kaos Polos - hitam', 1000000.00, 125000.00, 0, '2024-12-04 21:16:20', '2024-12-07 23:25:35'),
(6, 1, 'barang/iyammawdPxyuFHYHoc1kHz3hDkC6KU0VDXF6UoJb.jpg', 'Jeans - highwaist', 500000.00, 240000.00, 0, '2024-12-04 21:17:01', '2024-12-08 00:16:22'),
(7, 1, 'barang/upWuTGpISDQfhZf1VL6HqCKYd7s80fpKZq0yzuoP.jpg', 'Kemeja - putih', 300000.00, 100000.00, 1, '2024-12-04 21:17:29', '2024-12-05 09:16:23'),
(8, 3, 'barang/xNPtV8LXkr77fNMEuketTFXdIsNxzdkeikwEH8il.jpg', 'Strawberry - juice', 40000.00, 15000.00, 9, '2024-12-04 21:19:30', '2024-12-05 08:10:16'),
(9, 3, 'barang/4hqrSnmVGmbsSzoXaSUV1bOShfmVDk16dsHnA8lw.jpg', 'smoothies mango - juice', 70000.00, 23000.00, 11, '2024-12-04 21:20:03', '2024-12-05 08:10:16'),
(10, 3, 'barang/ZQK0dYr1mnD5XmM64JVxY7aIxGhBqwaRR6v5bjqZ.jpg', 'Orange - juice', 30000.00, 10000.00, 9, '2024-12-04 21:20:29', '2024-12-05 08:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` bigint(20) UNSIGNED NOT NULL,
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_barang`, `kuantitas`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, 40000.00, '2024-12-05 07:00:38', '2024-12-05 07:00:38'),
(2, 2, 2, 2, 40000.00, '2024-12-05 07:12:45', '2024-12-05 07:12:45'),
(3, 3, 4, 2, 90000.00, '2024-12-05 07:19:46', '2024-12-05 07:19:46'),
(4, 3, 3, 1, 30000.00, '2024-12-05 07:19:46', '2024-12-05 07:19:46'),
(5, 4, 8, 1, 15000.00, '2024-12-05 08:10:16', '2024-12-05 08:10:16'),
(6, 4, 9, 1, 23000.00, '2024-12-05 08:10:16', '2024-12-05 08:10:16'),
(7, 4, 10, 2, 20000.00, '2024-12-05 08:10:16', '2024-12-05 08:10:16'),
(8, 5, 5, 1, 125000.00, '2024-12-05 08:39:36', '2024-12-05 08:39:36'),
(9, 5, 6, 1, 240000.00, '2024-12-05 08:39:36', '2024-12-05 08:39:36'),
(10, 6, 5, 1, 125000.00, '2024-12-05 08:40:27', '2024-12-05 08:40:27'),
(11, 6, 6, 1, 240000.00, '2024-12-05 08:40:27', '2024-12-05 08:40:27'),
(12, 7, 5, 1, 125000.00, '2024-12-05 08:42:53', '2024-12-05 08:42:53'),
(13, 7, 6, 1, 240000.00, '2024-12-05 08:42:53', '2024-12-05 08:42:53'),
(14, 8, 7, 1, 100000.00, '2024-12-05 09:04:25', '2024-12-05 09:04:25'),
(15, 9, 7, 1, 100000.00, '2024-12-05 09:05:59', '2024-12-05 09:05:59'),
(16, 9, 6, 1, 240000.00, '2024-12-05 09:05:59', '2024-12-05 09:05:59'),
(17, 10, 7, 2, 200000.00, '2024-12-05 09:16:23', '2024-12-05 09:16:23'),
(18, 11, 2, 2, 40000.00, '2024-12-06 08:27:20', '2024-12-06 08:27:20'),
(19, 12, 3, 1, 30000.00, '2024-12-06 08:41:55', '2024-12-06 08:41:55'),
(20, 13, 5, 1, 125000.00, '2024-12-07 23:06:28', '2024-12-07 23:06:28'),
(21, 14, 5, 1, 125000.00, '2024-12-07 23:25:35', '2024-12-07 23:25:35'),
(22, 15, 6, 1, 240000.00, '2024-12-08 00:16:22', '2024-12-08 00:16:22'),
(23, 16, 2, 2, 40000.00, '2024-12-08 00:47:27', '2024-12-08 00:47:27'),
(24, 16, 4, 1, 45000.00, '2024-12-08 00:47:27', '2024-12-08 00:47:27'),
(25, 17, 4, 1, 45000.00, '2024-12-08 01:03:15', '2024-12-08 01:03:15'),
(26, 17, 3, 1, 30000.00, '2024-12-08 01:03:15', '2024-12-08 01:03:15'),
(27, 18, 2, 1, 20000.00, '2024-12-08 01:33:59', '2024-12-08 01:33:59');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_04_133012_create_barang_table', 2),
(6, '2024_12_05_032235_create_barang_table', 3),
(7, '2024_12_05_133758_create_transaksi_table', 4),
(8, '2024_12_05_133931_create_detail_transaksi_table', 4),
(9, '2024_12_05_141526_add_stok_to_barang_table', 5),
(10, '2024_12_05_144118_add_stok_to_barang_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_harga` decimal(15,2) NOT NULL,
  `uang_dibayar` decimal(15,2) NOT NULL,
  `kembalian` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `user_id`, `total_harga`, `uang_dibayar`, `kembalian`, `created_at`, `updated_at`) VALUES
(1, 3, 100000.00, 120000.00, 20000.00, '2024-12-05 07:00:38', '2024-12-05 07:00:38'),
(2, 3, 40000.00, 120000.00, 80000.00, '2024-12-05 07:12:43', '2024-12-05 07:12:43'),
(3, 3, 120000.00, 120000.00, 0.00, '2024-12-05 07:19:46', '2024-12-05 07:19:46'),
(4, 3, 58000.00, 60000.00, 2000.00, '2024-12-05 08:10:15', '2024-12-05 08:10:15'),
(5, 1, 365000.00, 400000.00, 35000.00, '2024-12-05 08:39:36', '2024-12-05 08:39:36'),
(6, 1, 365000.00, 400000.00, 35000.00, '2024-12-05 08:40:27', '2024-12-05 08:40:27'),
(7, 1, 365000.00, 400000.00, 35000.00, '2024-12-05 08:42:53', '2024-12-05 08:42:53'),
(8, 1, 100000.00, 100000.00, 0.00, '2024-12-05 09:04:25', '2024-12-05 09:04:25'),
(9, 1, 340000.00, 350000.00, 10000.00, '2024-12-05 09:05:59', '2024-12-05 09:05:59'),
(10, 1, 200000.00, 200000.00, 0.00, '2024-12-05 09:16:23', '2024-12-05 09:16:23'),
(11, 2, 40000.00, 50000.00, 10000.00, '2024-12-06 08:27:19', '2024-12-06 08:27:19'),
(12, 2, 30000.00, 50000.00, 20000.00, '2024-12-06 08:41:55', '2024-12-06 08:41:55'),
(13, 1, 125000.00, 150000.00, 25000.00, '2024-12-07 23:06:28', '2024-12-07 23:06:28'),
(14, 1, 125000.00, 150000.00, 25000.00, '2024-12-07 23:25:35', '2024-12-07 23:25:35'),
(15, 1, 240000.00, 250000.00, 10000.00, '2024-12-08 00:16:22', '2024-12-08 00:16:22'),
(16, 2, 85000.00, 100000.00, 15000.00, '2024-12-08 00:47:27', '2024-12-08 00:47:27'),
(17, 2, 75000.00, 80000.00, 5000.00, '2024-12-08 01:03:15', '2024-12-08 01:03:15'),
(18, 2, 20000.00, 50000.00, 30000.00, '2024-12-08 01:33:59', '2024-12-08 01:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_pengguna`, `nama_toko`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'leyza', 'toko baju amanah', 'bajuamanah@gmail.com', '$2y$12$2bC5tjGftlhUnhjnojOAzOyZOycHR6lqLup4penP/wuXc7sm.uF8G', '2024-12-04 05:38:13', '2024-12-04 05:38:13'),
(2, 'caca', 'toko kue manies', 'kuemanies@gmail.com', '$2y$12$onMbIoXQIb.r61qkAIDLG.Zh3YZ7OUEEsxpXdRTVX7teXR8lTXPga', '2024-12-04 05:39:58', '2024-12-04 05:39:58'),
(3, 'kayla', 'toko jus', 'jusenak@gmail.com', '$2y$12$I6MCWgQHc8xgfS47o/GIneDS0gWzdoKs.HJzwQW7mcbQAOoYwshai', '2024-12-04 19:53:14', '2024-12-04 19:53:14'),
(4, 'fauzya', 'syariah', 'syariah@gmail.com', '$2y$12$HK1zEfWVlrR2uXbdGPQ2WOzqs09MWz2L.XfYOeDegwAZpe9ZSpJ6u', '2024-12-07 08:44:12', '2024-12-07 08:44:12'),
(5, 'syifa', 'donatsyiff', 'donat@gmail.com', '$2y$12$gSyiCL2CGieMeECJIrkoFeQGYkpt3rqSb.XCrZ4cXFYk6SA1.Le/G', '2024-12-07 08:50:50', '2024-12-07 08:50:50'),
(6, 'fenty', 'fentybeauty', 'fentybeauty@gmail.com', '$2y$12$P8kwwiT1rzA68i4wwj9I1OHt0m3TZQ03Y2PTgJV/2jPG4IG8PuoqW', '2024-12-07 09:10:54', '2024-12-07 09:10:54'),
(7, 'maryana', 'marcake', 'marcake@gmail.com', '$2y$12$5qWmkkOa4OjPwn8bNMxYjew5jeJ.q/zYwsA.OtuEUUwMv3zeB6an.', '2024-12-07 09:13:13', '2024-12-07 09:13:13'),
(8, 'anton', 'gelang anton', 'gelanganton@gmail.com', '$2y$12$vVGHWlOdxLKGWp3/QkmiYeN4mrfAugzk8FZmxqpa/j79.EVvsSacC', '2024-12-08 01:39:27', '2024-12-08 01:39:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `barang_user_id_foreign` (`user_id`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `detail_transaksi_id_transaksi_foreign` (`id_transaksi`),
  ADD KEY `detail_transaksi_id_barang_foreign` (`id_barang`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `transaksi_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_transaksi_id_transaksi_foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
