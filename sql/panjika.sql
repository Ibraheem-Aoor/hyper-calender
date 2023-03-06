-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 16, 2021 at 11:02 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_infos`
--

CREATE TABLE `company_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sys_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_infos`
--

INSERT INTO `company_infos` (`id`, `company_name`, `address`, `city`, `state`, `zip_code`, `country`, `telephone`, `sys_email`, `from_email`, `reg_no`, `created_at`, `updated_at`) VALUES
(1, 'Bender and Dyer Associates', 'Aliquid unde molesti', 'Quo ea quo aperiam t', 'Non quisquam tempore', '94088', 'Odio laudantium vol', '+1 (321) 244-1355', 'gukesutif@mailinator.com', 'qaxyvylaj@mailinator.com', 'Quae voluptates quod', '2021-05-19 12:35:25', '2021-05-24 14:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `email_settings`
--

CREATE TABLE `email_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_driver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_host` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_port` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encryption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `repeat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `guests` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locations` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_email_sent` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `title`, `start_date`, `start_time`, `end_date`, `end_time`, `repeat_id`, `guests`, `locations`, `description`, `last_email_sent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Ea et atque sint nih', '2021-05-31', '00:00:00', '2021-05-31', '00:00:00', 2, 'Et sit voluptate tem', 'Dolor aliqua Quia r', 'Delectus non libero', NULL, '2021-05-19 12:32:42', '2021-05-19 12:32:42', NULL),
(2, 1, 'Nesciunt voluptate', '2021-05-25', '23:00:00', '2021-05-25', '23:00:00', 4, 'Tempora dolor repreh', 'Fugiat sed quia pos', 'Sit nesciunt quos v la ke', NULL, '2021-05-19 12:33:50', '2021-05-23 13:37:11', NULL),
(3, 2, 'Porro omnis ea ullam', '2021-05-15', '00:00:00', '2021-05-15', '00:00:00', 3, 'Voluptatibus corpori', 'Fugiat praesentium', 'Ipsam aut nisi proid', NULL, '2021-05-19 13:06:53', '2021-05-19 13:06:53', NULL),
(4, 2, 'Voluptate qui aliqua', '2021-05-25', '00:00:00', '2021-05-26', '00:00:00', 2, 'Commodo amet dolore', 'Ex sit blanditiis f', 'Pariatur Sunt sunt', NULL, '2021-05-19 13:07:08', '2021-05-19 13:07:08', NULL),
(5, 2, 'Enim tempor qui sequ', '2021-05-03', '00:00:00', '2021-05-03', '00:00:00', 3, 'Qui optio itaque ei', 'Provident quaerat v', 'Voluptatem natus in', NULL, '2021-05-19 13:12:24', '2021-05-19 13:12:24', NULL),
(6, 1, 'Delectus sed et sin', '2021-06-03', '23:00:00', '2021-06-05', '23:00:00', 3, 'Non cumque officia e', 'Cumque aliquam vel m', 'Suscipit est officia', NULL, '2021-05-23 13:36:47', '2021-05-28 12:39:24', NULL),
(7, 3, 'Est aliquam culpa u', '2021-05-18', '00:00:00', '2021-05-18', '00:00:00', 2, 'Rerum velit molestia', 'Corrupti laboriosam', 'Repudiandae voluptat', NULL, '2021-05-23 14:29:52', '2021-05-23 14:29:52', NULL),
(8, 1, 'Do sunt ducimus nos', '2021-05-08', '23:00:00', '2021-05-10', '23:00:00', 2, 'Aliquip qui et sed o', 'Qui nostrud sapiente', 'Repudiandae debitis', NULL, '2021-05-26 05:34:47', '2021-05-28 12:39:31', '2021-05-28 12:39:31'),
(9, 1, 'Corrupti quo simili', '2021-06-08', '23:00:00', '2021-06-08', '23:00:00', 2, 'Assumenda enim et al', 'Labore ullamco dolor', 'Cum eos ipsum dicta', NULL, '2021-05-28 13:22:55', '2021-05-28 13:23:25', NULL);

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_01_17_121213_create_sessions_table', 1),
(7, '2021_01_19_193327_create_reminders_table', 1),
(8, '2021_03_03_190038_create_events_table', 1),
(9, '2021_03_03_210551_create_tasks_table', 1),
(10, '2021_03_08_095704_create_email_settings_table', 1),
(11, '2021_03_11_200843_create_company_infos_table', 1),
(12, '2021_03_22_194855_create_system_settings_table', 1),
(13, '2021_03_27_172434_create_repeats_table', 1),
(14, '2021_03_27_172735_seed_repeat_table', 1),
(15, '2021_05_12_095921_seed_system_table', 1),
(16, '2021_05_17_092247_seed_user_table', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `repeat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_all_day` tinyint(1) DEFAULT NULL,
  `last_email_sent` timestamp NULL DEFAULT NULL,
  `is_done` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `user_id`, `title`, `date`, `time`, `repeat_id`, `is_all_day`, `last_email_sent`, `is_done`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Error soluta sint a', '2021-05-21', '00:00:00', 1, 1, NULL, NULL, '2021-05-19 12:33:25', '2021-05-19 12:33:25', NULL),
(2, 1, 'Ad sequi alias dolor', '2021-05-25', '23:00:00', NULL, 0, NULL, NULL, '2021-05-19 12:34:09', '2021-05-28 12:39:49', NULL),
(3, 2, 'Eligendi Nam eligend', '2021-05-13', '00:00:00', 5, 1, NULL, NULL, '2021-05-19 13:04:58', '2021-05-19 13:05:37', NULL),
(4, 2, 'Dolor sit repellend', '2021-05-30', '00:00:00', 2, 1, NULL, NULL, '2021-05-19 13:05:31', '2021-05-19 13:05:31', NULL),
(5, 3, 'Quis labore quam dig', '2021-05-26', '00:00:00', 4, 1, NULL, NULL, '2021-05-23 14:11:58', '2021-05-23 14:11:58', NULL),
(6, 1, 'Et voluptatem vitae', '2021-06-08', '23:00:00', 2, 0, NULL, NULL, '2021-05-28 13:23:43', '2021-05-28 13:23:52', NULL),
(7, 1, 'Culpa ut doloribus t', '2021-06-13', '00:00:00', 1, 1, NULL, NULL, '2021-05-28 13:24:59', '2021-05-28 13:24:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `repeats`
--

CREATE TABLE `repeats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interval` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `repeats`
--

INSERT INTO `repeats` (`id`, `name`, `interval`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Daily', 1, 1, '2021-05-19 12:32:00', '2021-05-19 12:32:00'),
(2, 'Weekly', 7, 1, '2021-05-19 12:32:00', '2021-05-19 12:32:00'),
(3, 'Monthly', 30, 1, '2021-05-19 12:32:00', '2021-05-19 12:32:00'),
(4, 'Annually', 365, 1, '2021-05-19 12:32:00', '2021-05-19 12:32:00'),
(5, 'Every weekday (Monday to Friday)', 5, 1, '2021-05-19 12:32:00', '2021-05-19 12:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('MMZAbo5rgpWTDgtnOmVmb4pCo58ucf0w6A9jltJE', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:88.0) Gecko/20100101 Firefox/88.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUDBpMURwZmtFeEVMSURoYTN6QzJQNUxPaTBvWGdIMnJ4QVRqSkJ4OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1622230260),
('qj15WqYYdTovHBZIS1dcQE981HG1wd1rlQ2KQjVo', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:88.0) Gecko/20100101 Firefox/88.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVjBDaDhtN1hPRWZmeTZUS1VMWHVtMWdsWFMyajNLN3RzME91VzVYdCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1622198326),
('WceP3OJ7h6AugH3iuyNRPnwLx29myxPzk6HEBNkH', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:88.0) Gecko/20100101 Firefox/88.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTlkyenFNdTVUUkJ6bHl2NTJ4MXRRekwwTEh6SW1rc1Jnbm5Na1JZWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1622202764);

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_format` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_format` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `logo`, `favicon`, `title`, `date_format`, `time_format`, `language`, `created_at`, `updated_at`) VALUES
(1, 'logo.png', 'favicon.ico', 'Panjika', 'Y-m-d', 'h:i:s', 'en', '2021-05-19 12:32:00', '2021-05-19 12:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_all_day` tinyint(1) DEFAULT NULL,
  `last_email_sent` timestamp NULL DEFAULT NULL,
  `is_done` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `title`, `date`, `time`, `description`, `is_all_day`, `last_email_sent`, `is_done`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Quaerat elit aspern', '2021-05-27', '00:00:00', 'Numquam sequi odit t', 0, NULL, NULL, '2021-05-19 12:33:02', '2021-05-19 12:33:02', NULL),
(2, 1, 'Voluptas commodi ut', '2021-05-25', '00:00:00', 'Magni consequatur V', 1, NULL, NULL, '2021-05-19 12:34:24', '2021-05-19 12:34:24', NULL),
(3, 2, 'A quia est molestia', '2021-05-19', '00:00:00', 'Quia praesentium ven', 1, NULL, NULL, '2021-05-19 13:05:56', '2021-05-19 13:15:33', NULL),
(4, 2, 'Id sequi consequat', '2021-05-20', '00:00:00', 'Labore laudantium a', 0, '2021-05-19 14:40:09', NULL, '2021-05-19 13:06:32', '2021-05-19 14:40:09', NULL),
(5, 1, 'Et fugiat facere el', '2021-06-05', '01:30:15', 'fdasfd', 1, NULL, 1, '2021-05-23 13:37:35', '2021-05-28 12:39:38', NULL),
(6, 1, 'Hic deserunt volupta', '2021-06-08', '11:00:00', 'Est qui similique ni', 0, NULL, NULL, '2021-05-28 13:24:14', '2021-05-28 13:24:14', NULL),
(7, 1, 'Velit unde qui dign', '2021-06-17', '00:00:00', 'Saepe magni veritati', 1, NULL, NULL, '2021-05-28 13:24:37', '2021-05-28 13:24:37', NULL),
(8, 1, 'Ex ut vitae aliquid', '2021-06-11', '00:00:00', 'Dolorem similique eu', 0, NULL, NULL, '2021-05-28 13:25:26', '2021-05-28 13:25:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `is_admin`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jhon Doe', 'admin@gmail.com', NULL, '$2y$10$zxdf9TKptZ6kb5U8RSxWh.wqTUghd2BXoDqI2lThU35DDi8cU9kJq', NULL, NULL, 'avatar.png', NULL, '2021-05-19 12:32:00', '2021-05-19 12:32:00'),
(2, 0, 'Fitzgerald Mckenzie', 'smartrahat@hotmail.com', NULL, '$2y$10$HAZuj1f5V3iXaloAdsGS0O6sPEqwNRY6W0mDRVw4mzYlJzP2olA4q', NULL, NULL, '2021-05-19 19:02:26.png', NULL, '2021-05-19 12:39:48', '2021-05-19 13:02:26'),
(3, 0, 'Angela Guerrero', 'benuji@mailinator.com', NULL, '$2y$10$ecA66Cswfzes0BhUgwFtneIfyle..cadE01sENfZbkjNwMLJ31eXu', NULL, NULL, 'avatar.png', NULL, '2021-05-23 13:38:41', '2021-05-23 13:38:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_infos`
--
ALTER TABLE `company_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repeats`
--
ALTER TABLE `repeats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `repeats_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `company_infos`
--
ALTER TABLE `company_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `repeats`
--
ALTER TABLE `repeats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
