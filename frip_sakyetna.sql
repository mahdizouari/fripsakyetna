-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2025 at 12:38 AM
-- Server version: 10.11.11-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frip_sakyetnaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `nom_de_produit` varchar(255) NOT NULL,
  `nom_de_client` varchar(255) NOT NULL,
  `numero_de_client` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id`, `nom_de_produit`, `nom_de_client`, `numero_de_client`, `adresse`, `prix`, `date`) VALUES
(21, 'hnhtynhn', 'yessin', 22000555, 'sakiet eddeier, sfax', 11, '2024-09-14'),
(22, 'czbrtbr', 'yessin', 22000555, 'sakiet eddeier, sfax', 33, '2024-09-14'),
(23, 'zfzfnbb', 'jihed', 45645634, 'uhuhu, sfax', 50, '2024-09-14'),
(24, 'chaussure', 'jihed', 45645634, 'uhuhu, sfax', 12, '2024-09-14'),
(25, 'zfzfnbb', 'ezzez', 45645634, 'zfzfvzeve, sfax', 50, '2024-09-21'),
(26, 'chaussure', 'yessin', 22000555, 'zfzf, fafz', 12, '2024-09-21'),
(27, 'zfzf', 'yessin', 22000555, 'zfzf, fafz', 200, '2024-09-21'),
(28, 'chaussure', 'erger', 24524777, 'zfzf, sfax', 12, '2024-09-21'),
(29, 'aaaaaaaaa', 'erger', 24524777, 'zfzf, sfax', 23, '2024-09-21'),
(30, 'chaussure', 'aa', 45645634, 'zfzfvzeve, sfax', 12, '2024-09-21'),
(31, 'aaaaaaaaa', 'aa', 45645634, 'zfzfvzeve, sfax', 23, '2024-09-21'),
(32, 'chaussure', 'rima', 45645634, 'uhuhu, fafz', 12, '2024-09-21'),
(33, 'aaaaaaaaa', 'rima', 45645634, 'uhuhu, fafz', 23, '2024-09-21'),
(34, 'chaussure', 'zefzzef', 45645634, 'zzef, zfzf', 12, '2024-09-21'),
(35, 'aaaaaaaaa', 'zefzzef', 45645634, 'zzef, zfzf', 23, '2024-09-21'),
(36, 'zfzfnbb', 'zefzzef', 45645634, 'zzef, zfzf', 50, '2024-09-21'),
(37, 'zfzfnbb', 'erger', 45645634, 'uhuhu, sfax', 50, '2024-09-25'),
(38, 'zfzf', 'aa', 45645634, 'uhuhu, gabes', 200, '2024-09-28'),
(39, 'zevgerverve', 'bassem', 20300495, 'uhuhu, sfax', 33, '2024-10-02'),
(40, 'zfzfnbb', 'zefz', 45645634, 'uhuhu, sfax', 50, '2024-10-05'),
(41, 'zfzfnbb', 'erger', 53678236, 'sakiet eddaier rue mahdia, Sfax', 50, '2024-10-07'),
(42, 'chaussure', 'mahdi zouari', 53678236, 'sakiet eddaier rue mahdia, Sfax', 12, '2024-10-15'),
(43, 'zfzf', 'mahdi zouari', 53678236, 'sakiet eddaier rue mahdia, Sfax', 200, '2024-10-15'),
(44, 'zfgtbrbytb', 'mahdi zouari', 53678236, 'sakiet eddaier rue mahdia, Sfax', 23, '2024-10-15'),
(45, 'el 7aj', 'mahdi zouari', 53678236, 'sakiet eddaier rue mahdia, Sfax', 90, '2024-10-15'),
(46, 'el 7aj', 'aa', 53678236, 'sakiet eddaier rue mahdia, Sfax', 90, '2024-11-09'),
(47, 'zfzf', 'aa', 53678236, 'sakiet ehhhhhhhhhhhhhhh, Sfax', 200, '2024-11-09'),
(48, 'chaussure', 'test', 55555555, 'test, sfax', 15, '2025-04-24'),
(49, 'chaussure', 'test', 55555555, 'test, sfax', 15, '2025-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_05_06_180030_create_sessions_table', 1),
(3, '2024_05_07_012003_create_users_table', 2),
(4, '2024_05_07_014034_create_cache_table', 3),
(5, '2024_05_09_225855_create_produits_table', 4),
(6, '2024_07_12_165213_add_image_to_produits_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `taille` varchar(255) NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `Catégorie` varchar(255) NOT NULL,
  `Référence` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `name`, `taille`, `image1`, `image2`, `image3`, `Catégorie`, `Référence`, `created_at`, `updated_at`, `is_active`, `prix`) VALUES
(65, 'chaussure', 'XS', 'images/1722588435_1.jpg', NULL, NULL, 'accessoire', 'casquette', '2024-08-02 07:47:15', '2025-04-22 16:03:43', 1, 15),
(66, 'zfzf', 'M', 'images/1722588453_1.jpg', NULL, NULL, 'accessoire', 'sac', '2024-08-02 07:47:33', '2025-04-22 16:03:50', 1, 200),
(67, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2XS', 'images/1722687052_1.jpg', 'images/1722687052_2.jpg', NULL, 'femme', 'sac', '2024-08-03 11:10:52', '2025-05-08 18:09:00', 1, 23),
(68, 'aa', '2XS', 'images/1722715113_1.jpg', NULL, NULL, 'femme', 'sac', '2024-08-03 18:58:33', '2024-09-17 11:07:29', 1, 12),
(69, 'hhhhhh', 'S', 'images/1724943601_1.png', NULL, NULL, 'enfant', 'casquette', '2024-08-29 14:00:01', '2024-09-12 13:05:47', 1, 11),
(71, 'hnhtynhn', 'S', 'images/1726150731_1.png', NULL, NULL, 'accessoire', 'sac', '2024-09-12 13:18:51', '2025-04-22 15:20:47', 1, 11),
(72, 'zfgtbrbytb', 'S', 'images/1726150753_1.png', NULL, NULL, 'accessoire', 'accessoire', '2024-09-12 13:19:13', '2025-04-22 15:35:34', 1, 23),
(73, 'kiloolololo', 'XXL', 'images/1726150794_1.png', NULL, NULL, 'femme', 'sac', '2024-09-12 13:19:54', '2024-09-12 13:19:54', 1, 33),
(76, 'egverge', '2XS', 'images/1726257929_1.jpg', NULL, NULL, 'femme', 'sac', '2024-09-13 19:05:29', '2024-09-17 11:07:20', 1, 11),
(77, 'zegvrbvrgbrgb', '30L', 'images/1726257941_1.png', NULL, NULL, 'homme', 'sac', '2024-09-13 19:05:41', '2024-09-29 16:33:49', 1, 23),
(78, 'zevgerverve', '3XL', 'images/1726317850_1.png', NULL, NULL, 'femme', 'accessoirevvvv', '2024-09-14 11:44:10', '2024-09-14 11:48:23', 1, 33),
(79, 'jzefizje', '2XS', 'images/1726488551_1.png', NULL, NULL, 'homme', 'enfant', '2024-09-16 11:09:11', '2025-04-22 15:00:37', 1, 44),
(80, 'el 7aj', '2XL', 'images/1726489302_1.png', NULL, NULL, 'homme', 'sac', '2024-09-16 11:21:42', '2024-09-22 11:24:16', 1, 90),
(81, 'sac', '20L', 'images/1727007793_1.jpg', NULL, NULL, 'homme', 'sac', '2024-09-22 11:23:13', '2024-09-29 11:56:57', 1, 45),
(82, 'rvvvv', '2XL', 'images/1728497963_1.png', NULL, NULL, 'enfant', 'casquette', '2024-10-09 17:19:23', '2024-10-09 17:19:23', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('fNLxXKHZHjt4ArHcH0cz3OEGZqKfjYmchnLuv6AN', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSkM2WkVEaFFJaWFKWHNNOFJTOUxoR01pZmduVE9qZ2dyN3VPSjlybSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1750369806),
('I5WcgJG56c2kxSBtHFl5aZuxabrJL69AVB2KcVDu', 1, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.6 Mobile/15E148 Safari/604.1', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVTBRbjRwQ2hCc0pKNDVyRGVnSEtIQnd4a1gwNG81ZUdBMHl3UzJ2RyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTM6Indpc2hsaXN0SXRlbXMiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1746736975);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image1`, `image2`, `image3`, `image4`, `title`, `subtitle`, `updated_at`, `created_at`) VALUES
(3, 'sliders/tLFH077XqcYYCFb9O0b91XxqMyLTtY2rqfO3gEb3.jpg', 'sliders/A3P7laVzE7tYS369UjMHqY1Lw7DRZhIEFHSYIwLk.jpg', 'sliders/Gy46b9OXLTJy5hIy9uQ9sKq9XaAiy0yWgatKknru.jpg', 'sliders/y9foxPpgPvbuMQjSvN8A5qSwE7CFOYYuPqTr8xxP.jpg', 'Welcome', 'frip sakyetna', '2025-04-24 00:35:02', '2024-09-03 15:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `created_at`, `updated_at`, `password`) VALUES
(1, 'Yessine', 'yessin.zouari100@gmail.com', 1, '2024-05-07 00:30:34', '2024-10-09 16:57:01', '$2y$12$nBIaH1.U9/LXLF/FhZbASe9OdWjgQ0VYp9Jr9pazBTZVppKBJpmjK'),
(2, 'akram', 'akrambahloul2@gmail.com', 1, '2024-05-09 17:37:09', '2024-05-09 17:37:09', '$2y$12$/VX1EleT33UJ83RJuhJCK.sCzKCvrk.Mp6cZe5ajBEkI3TgKHkAty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
