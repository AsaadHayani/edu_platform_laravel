-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 07:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edu_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Course 1', 'Description 1', '1.jpg', '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(2, 'Course 2', 'Description 2', '1.jpg', '2023-09-09 06:46:55', '2023-11-08 15:33:22'),
(3, 'Course 3', 'Description 3', '1.jpg', '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(4, 'Eos.', 'In officia qui nam molestiae.', '1.jpg', '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(5, 'Minus.', 'Voluptas aut quo quia id.', '1.jpg', '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(6, 'Alias.', 'Odio veritatis dolore quis.', '1.jpg', '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(7, 'Qui.', 'Quod eveniet optio totam ut.', '1.jpg', '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(8, 'Non et.', 'Et quo est assumenda.', '1.jpg', '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(9, 'Iusto.', 'Ab dolores illum minus sit.', '1.jpg', '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(10, 'Quidem.', 'Minus ut enim at.', '1.jpg', '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(11, 'Beatae.', 'Ut similique animi et saepe.', '1.jpg', '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(12, 'A et.', 'Earum ut aliquid vel.', '1.jpg', '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(13, 'Amet et.', 'Hic numquam at ex esse et.', '1.jpg', '2023-09-09 06:46:55', '2023-09-09 06:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `course_user`
--

CREATE TABLE `course_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_user`
--

INSERT INTO `course_user` (`id`, `user_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 6, 1, NULL, NULL),
(4, 6, 2, NULL, NULL),
(5, 4, 3, NULL, NULL),
(6, 2, 2, NULL, NULL),
(7, 5, 5, NULL, NULL),
(8, 3, 10, NULL, NULL),
(9, 3, 11, NULL, NULL),
(10, 4, 9, NULL, NULL),
(11, 1, 8, NULL, NULL),
(12, 5, 4, NULL, NULL);

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
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_08_22_093645_create_courses_table', 1),
(7, '2023_08_22_093706_create_tutorials_table', 1),
(8, '2023_08_23_144401_create_resumes_table', 1),
(9, '2023_09_02_082540_create_course_user_table', 1);

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 7, 'admin-token', 'fad62b5c00fba14d048b0fa5dcd100bdc286d564b609b25568526980199c6d71', '[\"create\",\"update\",\"delete\"]', '2023-09-10 15:45:21', NULL, '2023-09-10 15:41:52', '2023-09-10 15:45:21'),
(2, 'App\\Models\\User', 7, 'author-token', '7ae9005b556b943df62041e08abaebe891dfcff3f7821520d1891ea230fa8233', '[\"create\",\"update\"]', NULL, NULL, '2023-09-10 15:41:52', '2023-09-10 15:41:52'),
(3, 'App\\Models\\User', 7, 'basic-token', '615090690fd8f502a98dc76ceebccf79bd88d7c9506cec71780c1de697129f97', '[\"read\"]', NULL, NULL, '2023-09-10 15:41:52', '2023-09-10 15:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `skills` int(11) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `job_type`, `education`, `skills`, `resume`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 'Developer', 'Univercity Idleb', 90, '1699640282.pdf', 2, '2023-11-10 15:18:02', '2023-11-10 15:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE `tutorials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `is_done` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`id`, `title`, `content`, `video`, `is_done`, `user_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'Lesson 1', 'Content 1', '1.mp4', 0, 1, 1, '2023-09-09 06:46:55', '2023-11-10 08:17:41'),
(2, 'Lesson 2', 'Content 2', NULL, 0, 1, 2, '2023-09-09 06:46:55', '2023-11-10 08:17:37'),
(3, 'Lesson 3', 'Content 3', '1.mp4', 1, 1, 3, '2023-09-09 06:46:55', '2023-09-10 15:38:59'),
(4, 'Facilis.', 'Velit incidunt hic ut.', '1.mp4', 0, 1, 4, '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(5, 'Eaque.', 'Est odit ipsum quibusdam quo.', '1.mp4', 0, 1, 5, '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(6, 'Ducimus.', 'Aut qui ex quidem.', '1.mp4', 0, 1, 6, '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(7, 'Magnam.', 'Consectetur rerum qui eos.', '1.mp4', 0, 1, 7, '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(8, 'Quidem.', 'Illo illo doloribus autem.', '1.mp4', 0, 1, 8, '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(9, 'Soluta.', 'Non quo amet eos iusto.', '1.mp4', 0, 1, 9, '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(10, 'Quam.', 'Id est placeat et labore.', '1.mp4', 0, 1, 10, '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(11, 'Dolores.', 'Placeat quidem dolorem iste.', '1.mp4', 0, 1, 11, '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(12, 'Magnam.', 'Quos ea similique vitae sed.', '1.mp4', 0, 1, 12, '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(13, 'Aliquam.', 'Amet dolor et sunt quia et.', '1.mp4', 0, 1, 1, '2023-09-09 06:46:55', '2023-09-09 06:46:55');

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
  `role` tinyint(1) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'asaad', 'asaad@gmail.com', '2023-09-09 06:46:55', '$2y$10$iGI19GFFp/PK809egRcgoOcsyz3Yvp.Xy0mOz7a6hAt1w729IAp3m', 2, 'W653z1f4WZEH9o3jsxNNELXDpSvU2wB3kEVVMBMLWYEv2FNdyMfBfzzbvYZ6', '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(2, 'Nour', 'nour@example.com', '2023-09-09 06:46:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'avlSLraT3g', '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(3, 'Rami', 'rami@example.com', '2023-09-09 06:46:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'q04BOhZNCQ', '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(4, 'ahmed', 'ahmed@example.com', '2023-09-09 06:46:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'l5RZBDu4n2', '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(5, 'asmaa', 'omar@example.com', '2023-09-09 06:46:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'KnGXCUwflo', '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(6, 'salem.', 'salem@example.com', '2023-09-09 06:46:55', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'Hhta5wWFwb', '2023-09-09 06:46:55', '2023-09-09 06:46:55'),
(7, 'admin', 'admin@gmail.com', NULL, '$2y$10$kumBARcAmvQV1euicKPW4O2Cy5sb3z4zNVdyMYPgd2S8410YlpIcq', 2, NULL, '2023-09-10 15:41:52', '2023-09-10 15:41:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_user`
--
ALTER TABLE `course_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_user_user_id_foreign` (`user_id`),
  ADD KEY `course_user_course_id_foreign` (`course_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resumes_user_id_foreign` (`user_id`);

--
-- Indexes for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutorials_user_id_foreign` (`user_id`),
  ADD KEY `tutorials_course_id_foreign` (`course_id`);

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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `course_user`
--
ALTER TABLE `course_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tutorials`
--
ALTER TABLE `tutorials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_user`
--
ALTER TABLE `course_user`
  ADD CONSTRAINT `course_user_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `resumes`
--
ALTER TABLE `resumes`
  ADD CONSTRAINT `resumes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD CONSTRAINT `tutorials_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tutorials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
