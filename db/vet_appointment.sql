-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 07:02 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vet_appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `client_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pet_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `breed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`client_id`, `user_id`, `appointment_date`, `owner_name`, `pet_type`, `contact`, `breed`, `email_address`, `age`, `address`, `service`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(1, 4, '2023-12-08', 'deib@gmail.com', 'dogs', '09132323651', 'ragdal', 'deib@gmail.com', 2, 'vigan', 'Grooming', 2, 'sorry fully booked', '2023-12-06 06:38:44', '2023-12-07 21:13:56'),
(2, 5, '2023-12-16', 'Maxpein', 'dogs', '09123456789', 'ascal', 'maxpein@gmail.com', 2, 'Urdaneta', 'Vaccination', 1, NULL, '2023-12-14 21:42:17', '2023-12-14 21:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'cats', '2023-12-06 06:20:22', '2023-12-06 06:20:22'),
(2, 'dogs', '2023-12-06 06:20:30', '2023-12-06 06:20:30'),
(3, 'birds', '2023-12-06 06:20:41', '2023-12-06 06:20:41');

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
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `footer_id` int(10) UNSIGNED NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_hours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`footer_id`, `contact_number`, `email_address`, `location`, `work_hours`, `copyright`, `created_at`, `updated_at`) VALUES
(1, '09132323651', 'kingdomanimalia0316@gmail.com', 'St. Francis Bldg, Mcarthur Highway, Brgy. San Vicente Urdaneta City 2428 Pangasinan Philippines', 'Monday - Saturday: 9:00 AM – 6:00 PM  Sunday: 9:00 AM – 4:00 PM', 'Copyright © 2023. All Rights Reserved.', '2023-12-06 03:32:45', '2023-12-07 21:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `inquiry_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`inquiry_id`, `user_id`, `name`, `email`, `message`, `reply`, `created_at`, `updated_at`) VALUES
(2, 2, '', 'sanya@gmail.com', 'adad', 'ok thanks', '2023-12-06 03:59:54', '2023-12-06 04:00:22'),
(3, 2, 'sanya lopes', 'sanya@gmail.com', 'asa', NULL, '2023-12-06 04:04:32', '2023-12-06 04:04:32'),
(4, 2, 'sanya lopes', 'sanya@gmail.com', 'dd', 'sds', '2023-12-06 04:10:06', '2023-12-12 15:19:43'),
(5, 2, 'Rhoxine F. Umayam', 'rhoxineumayam25@gmail.com', 'ssd', NULL, '2023-12-06 04:12:08', '2023-12-06 04:12:08'),
(6, 2, 'ss', 'sample@gmail.com', 'sdsd', NULL, '2023-12-06 04:16:30', '2023-12-06 04:16:30'),
(8, 3, 'Rhoxine F. Umayam', 'rhoxineumayam25@gmail.com', 'sdsdd', NULL, '2023-12-06 04:23:50', '2023-12-06 04:23:50'),
(11, 3, '', '', 'Sample message', 'dsd', '2023-12-12 14:58:33', '2023-12-12 15:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_image` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manage_services`
--

CREATE TABLE `manage_services` (
  `services_id` int(10) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` int(11) NOT NULL,
  `service_img` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manage_services`
--

INSERT INTO `manage_services` (`services_id`, `service_name`, `fee`, `service_img`, `created_at`, `updated_at`) VALUES
(1, 'Deworming', 100, 0x696d616765735f75706c6f6164732f52554c44655a79634a32614a316d4b6666596b4936777378794170336d42726a62513558574d6c442e6a7067, '2023-12-06 06:26:11', '2023-12-06 06:26:11'),
(2, 'Vaccination', 100, 0x696d616765735f75706c6f6164732f535677544d42616a4a70665966676a58686d3477694549327470694852584467516170346e4339452e6a7067, '2023-12-06 06:26:38', '2023-12-14 21:37:44'),
(3, 'Grooming', 500, 0x696d616765735f75706c6f6164732f4c7a72444f48475874447a647a514c6a6274544674364a677971734339773441485575384c4778512e6a7067, '2023-12-06 06:26:57', '2023-12-06 06:26:57'),
(4, 'Confinement', 1500, 0x696d616765735f75706c6f6164732f6c496b704664366c655255413579394e797355314c635a4c675a6838694267513975664d504144732e6a7067, '2023-12-06 06:27:21', '2023-12-06 06:27:21'),
(5, 'Home Services', 2000, 0x696d616765735f75706c6f6164732f53774e38446f6d6b736b55694a5478656531444b4e50474e6e375263625a6f3674495950575a35702e6a7067, '2023-12-06 06:27:57', '2023-12-06 06:27:57'),
(6, 'Treatment', 700, 0x696d616765735f75706c6f6164732f6538346e686b4b4431506c71374f724344614c35674c433372466e353967594e55675845747a7a742e6a7067, '2023-12-06 06:28:31', '2023-12-14 21:38:46'),
(7, 'Surgical Procedures', 2500, 0x696d616765735f75706c6f6164732f72646c716d324332344561726269554950597130756a4b62427a5038624a566564633832685a36492e6a7067, '2023-12-06 06:28:50', '2023-12-06 06:28:50'),
(8, 'Diagnostics', 1300, 0x696d616765735f75706c6f6164732f535141494c745273534d48414e475570626f585847453171416651385351435a35353445587549392e6a7067, '2023-12-06 06:29:34', '2023-12-06 06:30:17');

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
(168, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(169, '2019_08_19_000000_create_failed_jobs_table', 1),
(170, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(171, '2023_10_16_092549_create_users_table', 1),
(172, '2023_10_16_134932_create_services_table', 1),
(173, '2023_10_17_054723_create_appointments_table', 1),
(174, '2023_10_21_071513_create_categories_table', 1),
(175, '2023_11_14_093458_create_inquiries_table', 1),
(176, '2023_11_15_024149_create_inventories_table', 1),
(177, '2023_11_17_105212_create_footers_table', 1),
(178, '2023_11_18_081402_create_manage_services_table', 1),
(179, '2023_12_01_005633_create_special_cases_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_fee` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `category_id`, `service`, `service_fee`, `created_at`, `updated_at`) VALUES
(1, 1, 'Deworming', 100, '2023-12-06 06:21:23', '2023-12-06 06:21:50'),
(2, 2, 'Vaccination', 100, '2023-12-06 06:21:41', '2023-12-06 06:21:41'),
(3, 2, 'Confinement', 1500, '2023-12-06 06:22:06', '2023-12-14 21:38:17'),
(4, 1, 'Grooming', 500, '2023-12-06 06:22:23', '2023-12-06 06:22:23'),
(5, 2, 'Treatment', 700, '2023-12-14 21:34:56', '2023-12-14 21:34:56');

-- --------------------------------------------------------

--
-- Table structure for table `special_cases`
--

CREATE TABLE `special_cases` (
  `special_case_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(11) NOT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pet_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `pet_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `special_cases`
--

INSERT INTO `special_cases` (`special_case_id`, `service_id`, `owner_name`, `pet_name`, `age`, `pet_type`, `created_at`, `updated_at`) VALUES
(2, 1, 'Paula', 'bruno', 2, 'dog', '2023-12-14 21:31:16', '2023-12-14 21:31:16'),
(3, 4, 'Laureen', 'sussy', 1, 'cat', '2023-12-14 21:31:57', '2023-12-14 21:31:57'),
(4, 2, 'Khaila', 'pony', 3, 'dog', '2023-12-14 21:32:31', '2023-12-14 21:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` blob DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `username`, `password`, `confirm_password`, `user_type`, `profile`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'User', 'admin', '$2y$10$Od5QZC9oJ5r7HeTPiOcnTe6A2i3PFF21dKcZ9eKqEZL3ASNv9XiYO', '$2y$10$n7wj7tgXpdEI84zM6h5/l.BpfeAMIHH4UbsJg5guoKt4nPoXo7cuS', 'admin', NULL, '2023-12-06 03:06:06', '2023-12-06 03:06:06'),
(2, 'Rhoxine', 'Umayam', 'roxineee', '$2y$10$buyRKaYCyFhdfJw73bAfsu6w/k1HDmK6Qg9WIOBOTV967ohjf4D8e', '$2y$10$b2r5SHulkm80cIFvryBtm.cDeW/vswrnKkGynGRHoDAxn9XEFXE8S', 'user', 0x64656661756c745f70726f66696c655f76616c7565, '2023-12-06 03:08:08', '2023-12-06 03:08:08'),
(3, 'sanya', 'lopes', 'sanyalop', '$2y$10$BgwFVe9suvBK7Vja451MJenDUzB48OpnCV2mQbMcGIDqcfZcGZ7Ty', '$2y$10$Eqg1O5IL0ydudRZgZoW0eOwwdsQLsUA/USQbyXduyXNYeRJMByrPe', 'user', 0x64656661756c745f70726f66696c655f76616c7565, '2023-12-06 04:17:15', '2023-12-06 04:17:15'),
(4, 'deibl', 'enrile', 'deiblohr', '$2y$10$Hge8Y9yxXh19qh5W5p8Mj.cB9r/OQgtyUvE/wbYYR1o.y/0xV9lIe', '$2y$10$11sHaBBKeqOZYPynwB/BVuS8bOMCO9iPxkSXj4RAJl1YGyTct38Gi', 'user', 0x64656661756c745f70726f66696c655f76616c7565, '2023-12-06 06:35:24', '2023-12-12 15:21:41'),
(5, 'maxpein', 'del valle', 'maxpein', '$2y$10$W/nl3Sh3LMDNailT.L37NuJIrv17qkwaqzXOaoKzlEguAYBmp7XAK', '$2y$10$Wgm7J/peH2NRYWJcvnJI/.iyIHztZyjPlqf7e/8kUhFICFMY6Ac/W', 'user', 0x64656661756c745f70726f66696c655f76616c7565, '2023-12-06 07:57:20', '2023-12-06 07:57:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`footer_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `manage_services`
--
ALTER TABLE `manage_services`
  ADD PRIMARY KEY (`services_id`);

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
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `special_cases`
--
ALTER TABLE `special_cases`
  ADD PRIMARY KEY (`special_case_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `client_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `footer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `inquiry_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manage_services`
--
ALTER TABLE `manage_services`
  MODIFY `services_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `special_cases`
--
ALTER TABLE `special_cases`
  MODIFY `special_case_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
