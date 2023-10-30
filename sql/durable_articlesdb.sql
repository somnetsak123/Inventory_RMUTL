-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 05:37 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `durable_articlesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kp_buildings`
--

CREATE TABLE `kp_buildings` (
  `building_id` bigint(20) UNSIGNED NOT NULL,
  `building_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kp_histories`
--

CREATE TABLE `kp_histories` (
  `histories_id` bigint(20) UNSIGNED NOT NULL,
  `da_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `da_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caregiver_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_get` datetime NOT NULL,
  `time_of_use` datetime NOT NULL,
  `da_price` int(11) NOT NULL,
  `da_flag` int(11) NOT NULL,
  `da_recheck_year` datetime NOT NULL,
  `room_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kp_pictures`
--

CREATE TABLE `kp_pictures` (
  `picture_id` bigint(20) UNSIGNED NOT NULL,
  `da_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `da_flag` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kp_report_das`
--

CREATE TABLE `kp_report_das` (
  `report_id` bigint(20) UNSIGNED NOT NULL,
  `da_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `da_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caregiver_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_get` datetime DEFAULT NULL,
  `time_of_use` datetime DEFAULT NULL,
  `da_price` int(11) DEFAULT NULL,
  `da_flag` int(11) DEFAULT NULL,
  `da_recheck_year` datetime DEFAULT NULL,
  `room_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_report` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kp_rooms`
--

CREATE TABLE `kp_rooms` (
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `room_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kp_tb_cargivers`
--

CREATE TABLE `kp_tb_cargivers` (
  `cargiver_id` bigint(20) UNSIGNED NOT NULL,
  `caregiver_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_statuses` int(11) DEFAULT NULL,
  `cargiver_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargiver_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kp_tb_cargivers`
--

INSERT INTO `kp_tb_cargivers` (`cargiver_id`, `caregiver_name`, `user_statuses`, `cargiver_username`, `cargiver_password`, `created_at`, `updated_at`) VALUES
(4, 'admin1', 1, 'admin', '123456', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kp_tb_durable_articles`
--

CREATE TABLE `kp_tb_durable_articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `da_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `da_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargiver_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_get` datetime DEFAULT NULL,
  `time_of_use` datetime DEFAULT NULL,
  `da_price` int(11) DEFAULT NULL,
  `da_flag` int(11) DEFAULT NULL,
  `da_recheck_year` datetime DEFAULT NULL,
  `room_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL,
  `count_report` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kp_tb_flag`
--

CREATE TABLE `kp_tb_flag` (
  `da_flag` bigint(20) UNSIGNED NOT NULL,
  `da_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kp_tb_flag`
--

INSERT INTO `kp_tb_flag` (`da_flag`, `da_status`, `created_at`, `updated_at`) VALUES
(1, 'ใช้งานได้', NULL, NULL),
(2, 'ชำรุด', NULL, NULL),
(3, 'สูญหาย', NULL, NULL),
(4, 'จำหน่าย', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kp_tb_save_pdfs`
--

CREATE TABLE `kp_tb_save_pdfs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `da_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kp_tb_templates`
--

CREATE TABLE `kp_tb_templates` (
  `id_template` bigint(20) UNSIGNED NOT NULL,
  `template_data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template_spec` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kp_tb_templates`
--

INSERT INTO `kp_tb_templates` (`id_template`, `template_data`, `template_spec`, `created_at`, `updated_at`) VALUES
(1, 'ครุภัณฑ์ สาขาวิศวกรรมคอมพิวเตอร์', 'title', NULL, NULL),
(2, '7573100-.1576777273-im.jpg', 'banner', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kp_tb_types`
--

CREATE TABLE `kp_tb_types` (
  `id_type` bigint(20) UNSIGNED NOT NULL,
  `da_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kp_users`
--

CREATE TABLE `kp_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kp_user_statuses`
--

CREATE TABLE `kp_user_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kp_user_statuses`
--

INSERT INTO `kp_user_statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ผู้ดูแลระบบ', NULL, NULL),
(2, 'ผู้ดูแลครุภัณฑ์', NULL, NULL),
(3, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2022_12_20_141007_create_tb_durable_articles_table', 1),
(6, '2022_12_20_144726_create_tb_cargivers_table', 1),
(7, '2022_12_20_145215_create_report_das_table', 1),
(8, '2022_12_20_145430_create_pictures_table', 1),
(9, '2022_12_20_145804_create_histories_table', 1),
(10, '2023_02_06_120038_tb_flag', 1),
(11, '2023_02_07_125711_create_tb_type_table', 1),
(12, '2023_02_08_021142_create_tb_template_table', 1),
(13, '2023_02_08_024523_create_building_table', 1),
(14, '2023_02_08_024539_create_room_table', 1),
(15, '2023_03_13_045501_create_user_statuses_table', 1),
(16, '2023_03_20_092604_create_tb_save_pdfs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
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
-- Indexes for table `kp_buildings`
--
ALTER TABLE `kp_buildings`
  ADD PRIMARY KEY (`building_id`);

--
-- Indexes for table `kp_histories`
--
ALTER TABLE `kp_histories`
  ADD PRIMARY KEY (`histories_id`);

--
-- Indexes for table `kp_pictures`
--
ALTER TABLE `kp_pictures`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `kp_report_das`
--
ALTER TABLE `kp_report_das`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `kp_rooms`
--
ALTER TABLE `kp_rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `kp_tb_cargivers`
--
ALTER TABLE `kp_tb_cargivers`
  ADD PRIMARY KEY (`cargiver_id`);

--
-- Indexes for table `kp_tb_durable_articles`
--
ALTER TABLE `kp_tb_durable_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kp_tb_flag`
--
ALTER TABLE `kp_tb_flag`
  ADD PRIMARY KEY (`da_flag`);

--
-- Indexes for table `kp_tb_save_pdfs`
--
ALTER TABLE `kp_tb_save_pdfs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kp_tb_templates`
--
ALTER TABLE `kp_tb_templates`
  ADD PRIMARY KEY (`id_template`);

--
-- Indexes for table `kp_tb_types`
--
ALTER TABLE `kp_tb_types`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `kp_users`
--
ALTER TABLE `kp_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kp_user_statuses`
--
ALTER TABLE `kp_user_statuses`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kp_buildings`
--
ALTER TABLE `kp_buildings`
  MODIFY `building_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kp_histories`
--
ALTER TABLE `kp_histories`
  MODIFY `histories_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kp_pictures`
--
ALTER TABLE `kp_pictures`
  MODIFY `picture_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424;

--
-- AUTO_INCREMENT for table `kp_report_das`
--
ALTER TABLE `kp_report_das`
  MODIFY `report_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kp_rooms`
--
ALTER TABLE `kp_rooms`
  MODIFY `room_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT for table `kp_tb_cargivers`
--
ALTER TABLE `kp_tb_cargivers`
  MODIFY `cargiver_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kp_tb_durable_articles`
--
ALTER TABLE `kp_tb_durable_articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `kp_tb_flag`
--
ALTER TABLE `kp_tb_flag`
  MODIFY `da_flag` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kp_tb_save_pdfs`
--
ALTER TABLE `kp_tb_save_pdfs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kp_tb_templates`
--
ALTER TABLE `kp_tb_templates`
  MODIFY `id_template` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kp_tb_types`
--
ALTER TABLE `kp_tb_types`
  MODIFY `id_type` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kp_users`
--
ALTER TABLE `kp_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kp_user_statuses`
--
ALTER TABLE `kp_user_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
