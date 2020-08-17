-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2019 at 01:03 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhs_bloods`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(8) NOT NULL,
  `appointment_date` datetime NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `appointment_date`, `location`) VALUES
(6, 'OL2816', '2019-03-29 01:00:00', 'somewhere out there'),
(94, 'EB1972', '2019-04-23 15:59:00', 'KCL'),
(111, 'UH7261', '2019-02-08 01:00:00', 'somewhere');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` varchar(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text,
  `contact_no` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `comments` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `address`, `contact_no`, `email`, `type`, `comments`) VALUES
('AB9721', 'Ken Rogers', '48 Caerfai Bay Road, GL20 1SA', '078 6476 0688', 'ken2187@gmail.com', 'GP', NULL),
('MX298', 'Sonny Lemon', 'Bruno street, W2 3DS', '091238129', 'sonny927@gmail.com', 'Carer', 'very sunny haha'),
('OS1', 'Apple Hospital', 'Lol street, WC1N EHD', '0287310221', 'applehospital@nhs.com', 'Hospital', 'haha');

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
(3, '2019_03_11_153414_add_ratings_to_patient_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('test@gmail.com', '$2y$10$W1jqYfszyvHbSZ9kn.MMTOOiYH2uQmsSPPSH2txksq6a46mhDl8Ly', '2019-03-25 20:07:00'),
('resetter@gmail.com', '$2y$10$Hn7i8Pdcgb3FBe1k8HM5je3IXkMBqaDDU1h1bw.nMZxkbvl6v3xAW', '2019-03-29 10:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` varchar(8) NOT NULL,
  `forename` varchar(80) NOT NULL,
  `surname` varchar(80) NOT NULL,
  `dob` date NOT NULL,
  `sex` char(1) NOT NULL,
  `diagnosis` varchar(1500) DEFAULT NULL,
  `transplant_details` varchar(255) DEFAULT NULL,
  `hospital_id` varchar(8) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_method` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT '1',
  `bt_results_date` date DEFAULT NULL,
  `bt_status` varchar(50) DEFAULT NULL,
  `bloods_contact_no` varchar(50) DEFAULT NULL,
  `contact_no` varchar(50) DEFAULT NULL,
  `comments` text,
  `appointment_recurrence` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `forename`, `surname`, `dob`, `sex`, `diagnosis`, `transplant_details`, `hospital_id`, `email`, `contact_method`, `rating`, `bt_results_date`, `bt_status`, `bloods_contact_no`, `contact_no`, `comments`, `appointment_recurrence`) VALUES
('EB1972', 'Sarah', 'Connorio', '1985-02-14', 'M', 'liver problem b', '2010-02-21', 'OS1', 'sc81236@gmail.com', 'Phone', 1, '2019-03-19', 'Unreceived', NULL, NULL, NULL, 7),
('EC1212', 'Tom', 'Jones', '1980-09-27', 'F', 'liver problem 3', '12/12/2012', 'MX298', 'tomjones9271@gmail.com', 'Email', 2, '2019-03-01', 'Reviewed', NULL, NULL, NULL, NULL),
('GG1212', 'Sean', 'Kingston', '2010-03-11', 'M', 'liver problem 1', '12/12/2013', 'MX298', 'sk21973@gmail.com', 'Email', 2, '2019-03-14', 'Received', NULL, NULL, NULL, NULL),
('IJ2816', 'Anna', 'Williams', '1953-05-28', 'F', 'Diagnosis eoka', 'Transplant C', 'OS1', 'anna129387@gmail.com', 'Email', 3, NULL, NULL, NULL, NULL, NULL, NULL),
('OK8181', 'Ada', 'Wong', '1948-12-30', 'F', NULL, NULL, 'MX298', 'adawong123@gmail.com', NULL, 1, NULL, NULL, NULL, NULL, NULL, 7),
('OL2816', 'Nina', 'Williams', '1953-05-28', 'F', 'Diagnosis eoka', 'Transplant C', 'OS1', 'nina129387@gmail.com', 'Email', 3, '2019-02-16', 'Unreceived', NULL, NULL, NULL, NULL),
('UH7261', 'Brad', 'Pitt', '2018-10-11', 'M', NULL, NULL, 'None', 'someemail@gmail.com', NULL, 1, NULL, NULL, NULL, NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(15, 'tester', 'test@gmail.com', NULL, '$2y$10$tI28a3drbVO.TguH/xvpce8lMI0GyEtESimHaJhDhjlM5LWfgUING', NULL, '2019-03-14 12:08:57', '2019-03-14 12:08:57'),
(35, 'deleteguy', 'deleteguy@gmail.com', NULL, '$2y$10$.Taz0VB.xQ1nClUCjhaDN.nm6gb7fa7tLNqGvqGIMohdhJ1iMfiA.', 'uEvI3JyyqENWZyKmzvm5lnJh7ZcUM7q270dBeNQSfRc8Sxa8hFj2I1J0r4Kf', '2019-03-28 09:54:21', '2019-03-28 09:58:22'),
(42, 'resetter', 'resetter@gmail.com', NULL, '$2y$10$6iiFCdHio2KvW/Iy/kYkO.G6ktLRjh/xUeNL1dRa.BX55nkz8d3a6', NULL, '2019-03-29 10:16:11', '2019-03-29 10:16:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

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
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
