-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2019 at 01:14 PM
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
-- Table structure for table `bt_process`
--

CREATE TABLE `bt_process` (
  `test_id` varchar(8) NOT NULL,
  `hospital_id` int(8) NOT NULL,
  `patient_id` varchar(8) NOT NULL,
  `allocation_date` date NOT NULL,
  `due_date` date NOT NULL,
  `delivered` tinyint(1) NOT NULL,
  `comments` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospital_id` int(8) NOT NULL,
  `surgery_hospital` varchar(255) NOT NULL,
  `contact_for_BT` varchar(255) NOT NULL,
  `comments` varchar(1000) NOT NULL,
  `tAC` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospital_id`, `surgery_hospital`, `contact_for_BT`, `comments`, `tAC`) VALUES
(2, ' Frimley park', '', '', ''),
(3, ' KINGSTON (Not Royal Free)', '', '', ''),
(4, ' William Harvey pathology reception: 01227 864 151', '', '', ''),
(5, '? ', '', '', ''),
(6, '? Blackpool', '', '', ''),
(7, '? Colchester /  Queens Romford', '', '', ''),
(8, '? KCH OR QUEEN ELIZABETH WOOLWICH ', '', '', ''),
(9, '?? St Georges ', '', '', ''),
(10, '?Homerton ? GOS ', '', '', ''),
(11, '?Noriwch and Norfolk/Queen Eliz Kings Lynn', '', '', ''),
(12, '?Ryl Brompton', '', '', ''),
(13, 'Aberdeen ', '', '', ''),
(14, 'Aberdeen kai: 1602020949', '', '', ''),
(15, 'Abroad', '', '', ''),
(16, 'Addenbrookes', 'swab sent to Bedford', '', ''),
(17, 'Alder Hey ', '', '', ''),
(18, 'Barnet', '', '', ''),
(19, 'Barnet / Chase Farm 12007506', '', '', ''),
(20, 'Barnett', '', '', ''),
(21, 'Basildon ', '', '', ''),
(22, 'Basildon D272804', '', '', ''),
(23, 'Basingstoke ', '', '', ''),
(24, 'Bedford ', '', '', ''),
(25, 'Brighton ', '', '', ''),
(26, 'Bristol ', '', '', 'Bristol '),
(27, 'Broomfield ', '', '', 'Harefield'),
(28, 'Buckland / William Harvey ', '', '', ''),
(29, 'Bury St Edmunds usually but sometimes Ipswich', '', '', ''),
(30, 'Carshalton Queen Mary\'s', 'St Helier 40983505', '', ''),
(31, 'CCN / IPSWICH ', '', '', ''),
(32, 'CCN Harlow Essex', '', '', ''),
(33, 'CENTRAL MIDDLESEX', '', '', ''),
(34, 'Chase Farm ', '', '', ''),
(35, 'Chelsea & Westminster ', '', '', ''),
(36, 'colchester', '01206 747474', 'EBV sent to KINGS', 'kings'),
(37, 'Croydon ', '', '', ''),
(38, 'Croydon (adult)', '', '', ''),
(39, 'Darent Valley ', '', '', ''),
(40, 'Derriford ', '', '', ''),
(41, 'Derriford f350351', '', '', 'KINGS'),
(42, 'Dorset County', '', '', ''),
(43, 'Ealing ', 'if GP goes to Hillingdon', '', ''),
(44, 'East Surrey', 'East Surrey CCN Sarah Thompson Tel 01737 214 784', '', 'KINGS'),
(45, 'East Surrey Hospital', '', '', ''),
(46, 'Eastbourne district gen hospital', '', 'carer says blds are done at:The Conquest, Hastings', 'Harefield'),
(47, 'EMAIL', '', '', ''),
(48, 'Epsom & St Heiler ', '', '', ''),
(49, 'Frimley Park ', 'GP faxes within a few days', '', ''),
(50, 'Frimley Park/St Peters Chertsey', '', '', ''),
(51, 'Gloucester ', '', '', ''),
(52, 'GOSH ', '', '', ''),
(53, 'GOSH/UCLH', '', '', ''),
(54, 'GP ', '', '', ''),
(55, 'GP (Lewisham)', '', '', ''),
(56, 'GP / St Georges ', '', '', ''),
(57, 'GP will email us', '', '', ''),
(58, 'gp will fax', '', '', ''),
(59, 'GP/Brighton ', '', '', ''),
(60, 'Great Western', '', '', ''),
(61, 'Great Western / GP ', '', '', ''),
(62, 'Greece', '', '', ''),
(63, 'Guernsey', '', '', 'KINGS'),
(64, 'Hammersmith /  Acton Health ctr who sends it to Hillingdon Hospital', '', '', ''),
(65, 'Hamps Basingstoke', '', '', 'kings'),
(66, 'Harrogata/York', '', '', 'York'),
(67, 'Hertfordshire SN00822106', 'ccn will fax next day', '', ''),
(68, 'Hichingbrook / Addenbrookes? Cambridge University Hospital', '', '', ''),
(69, 'High Wycombe ', '', '', ''),
(70, 'Hillingdon ', '01895279285      TAC LEVEL SENT TO HAREFIELD- 01895828570  Lorna', '', ''),
(71, 'HILLINGDON (Lorna)', '', '', ''),
(72, 'Hillingdon / GOSH', '', '', ''),
(73, 'HOMERTON', '02085107892  - Haem       02085107888 - Biochem childrens outpatients- 5018 / 7425', '', ''),
(74, 'Ipswich ', '', '', ''),
(75, 'Ipswich Hospital pt no: 6443250397', '', '', 'Bristol'),
(76, 'Isle of Wight', '', '', ''),
(77, 'Jenner Practice/QE Woolwich', 'send fax request: 0203 049 2961', '', ''),
(78, 'KCH', '', '', ''),
(79, 'Keele GP practice as she is now at Keele University', '', '', ''),
(80, 'Kent & Canterbury ', '', '', ''),
(81, 'Kettering ', '', '', ''),
(82, 'King George', '', '', 'Kings'),
(83, 'King George (tooting)', '', '', ''),
(84, 'King\'s', '', '', ''),
(85, 'kings ', '', '', ''),
(86, 'Kingsmill ', '', '', 'Kingsmill'),
(87, 'Kingston ', '', '', ''),
(88, 'Lewisham (not gosh)', '', '', ''),
(89, 'Lewisham / GP ', '', '', ''),
(90, 'Lewisham / KCH ', '', '', ''),
(91, 'Lincoln County', '', '', ''),
(92, 'Lister', '', '', ''),
(93, 'Lister/QE2 Welwy Gdn', '', '', ''),
(94, 'Loxford GP surgery (email is best)', 'REDCCG.Y02987discharge@nhs.net', '', ''),
(95, 'Luton', '', 'quick turnaround, call in two days', ''),
(96, 'Luton  61111772', '', '', ''),
(97, 'Luton & Dunstable ', '', '', ''),
(98, 'Luton & Dunstable /Cambridge CCN emails to Lisa', '', '', 'KINGS/Harefield'),
(99, 'Maidstone', '', '', ''),
(100, 'Malta', '', '', ''),
(101, 'MALTA - MUM EMAILS', '', '', ''),
(102, 'Margate', '', '', ''),
(103, 'MAYDAY (Croydon)', '', '', ''),
(104, 'Medway', '', '', 'Kings'),
(105, 'Milton Keynes ', '', '', ''),
(106, 'Musgrove', '', '', ''),
(107, 'Newham ', '', '', 'KINGS'),
(108, 'NHS Grampian', '', '', ''),
(109, 'NHS Tayside', '', '', ''),
(110, 'Norfolk', '', '', ''),
(111, 'Norfolk & Norwich', '', '', ''),
(112, 'Norfolk and Norwich ', '', '', ''),
(113, 'North Hampshire ', '', '', ''),
(114, 'North Middlesex', '', '', ''),
(115, 'North Middlesex/GOSH', '', '', ''),
(116, 'North Middx', '', '', ''),
(117, 'Northwick Park ', '0208 869 3000', '', ''),
(118, 'O/R Scotland', '', '', ''),
(119, 'O/R SOUTHAMPTON', '', '', ''),
(120, 'ORSETT HOSPITAL (Basildion & Thurrock)', '', '', ''),
(121, 'Outreach', '', '', ''),
(122, 'Outreach - Singleton ', '', '', ''),
(123, 'Pembury ', '', '', ''),
(124, 'Pembury / Maidstone if blds taken at GP surgery', '', '', ''),
(125, 'Peterborough ', '', 'tac & siro KINGS', 'Sirolimus tested at Harefield Hospital'),
(126, 'POLAND', '', '', ''),
(127, 'POOLE', '', '', 'Bournemouth'),
(128, 'Portsmouth ', '', '', ''),
(129, 'Princess Alexander in Essex', '', '', ''),
(130, 'Princess Alexandra Harlow ', '', '', ''),
(131, 'PRINCESS ALEXANDRA, HARLOW ', '', '', ''),
(132, 'PRUH ', '', '', ''),
(133, 'QE Woolwich', '', '', ''),
(134, 'QEII ', '', '', ''),
(135, 'Qeqm  Margate', '', '', ''),
(136, 'QEQM - MARGATE', '', '', ''),
(137, 'Queen Mary Carshalton ', '', '', ''),
(138, 'Queen Mary\'s Sidcup ', '', '', ''),
(139, 'Queens Romfor d', '', 'Kings', ''),
(140, 'Queens Romford /Redbridge CCN ', '', '', ''),
(141, 'Raigmore  ', '', '', ''),
(142, 'RAIGMORE CHI: 0610030841 Hosp no: R519476H', '', '', ''),
(143, 'Royal Aberdeen childrens hospital', 'Gastro nurses Carol Cameron/Brnda Smart', '', ''),
(144, 'royal alex brighton', '', '', ''),
(145, 'Royal Alexandra Brighton ', '', '', ''),
(146, 'Royal Berkshire ', '', '', 'john radcliff in oxford'),
(147, 'Royal Cornwall', '', 'Derriford', ''),
(148, 'Royal Free', '', '', ''),
(149, 'Royal Free/Barnet', '', '', ''),
(150, 'Royal Hampshire ', '', '', ''),
(151, 'Royal Hamsphire', '', '', ''),
(152, 'Royal Hospital Chesterfield', '', '', ''),
(153, 'Royal London ', '', '', ''),
(154, 'Royal Surrey', '', '', ''),
(155, 'Royal Surrey (Frimley Park)', '', '', ''),
(156, 'Royal United ', '', '', ''),
(157, 'Royal United Bath / Bristol', '', '', 'Southmead'),
(158, 'Ryl Berks but if blds from GP goes to Wexham', '', '', 'Kings'),
(159, 'Ryl Berks/RAIGMORE', '', '', ''),
(160, 'Salisbury', '', '', ''),
(161, 'Scotland O/R', '', '', ''),
(162, 'sidcup', '', '', ''),
(163, 'simeon1960@gmail.com Raigmore', '', '', ''),
(164, 'Singleton ', '', '', 'Cardiff'),
(165, 'Southampton', '01590 672212', 'Mycophenolate levels faxed to us', ''),
(166, 'Southampton (O/R)', '', '', ''),
(167, 'Southend', '', '', ''),
(168, 'Southend / ?Royal Free', '', '', ''),
(169, 'St Georges ', '', '', ''),
(170, 'St Georges / Croydon', '', '', ''),
(171, 'St Georges / Mayday ', '', '', ''),
(172, 'St Heiler ', '', '', ''),
(173, 'St Helier', '', '', ''),
(174, 'St Heliers', '', '', ''),
(175, 'St Marks Middlesex', '', '', ''),
(176, 'St Mary\'s  ', 'TAC = Lesley Brent Laboratory 02033136637 Hammersmith Hsptl', '', ''),
(177, 'St Mary\'s London W2', '', '', ''),
(178, 'St Peters ', '', '', ''),
(179, 'St Peters / GP is good will fax over straight away', '', '', ''),
(180, 'ST PETERS CHERTSEY', '', '', ''),
(181, 'Stoke Mandeville', '', '', ''),
(182, 'UCL ', '', '', ''),
(183, 'UCLH', '', '', ''),
(184, 'Watford ', '', '', ''),
(185, 'Watford  or Hemel', '', '', ''),
(186, 'West Middlesex ', '020 8321 5931  02083215925  nice lady    biochem-ext-5930', '', ''),
(187, 'West Suffolk ', '', '', ''),
(188, 'Weston General ', '', '', ''),
(189, 'Wexham', '', '', 'KING\'S'),
(190, 'WEXHAM PARK', 'Val 01753633403 01753633412, 01753633472, 01753633415 - haem ext. 3442 - send away virology - 3462', '', 'Kings'),
(191, 'Wexham Park 1652344', '', '', 'Kings'),
(192, 'Whipps Cross', '2085356464', '', 'Ryl London'),
(193, 'Whittington ', '', '', ''),
(194, 'William Harvey ', '', '', ''),
(195, 'Woolwich', '', '', ''),
(196, 'Worthing', '', '', 'kings'),
(197, 'YORK ', '', '', 'YORK results ready next day'),
(198, 'Yorkhill', '', '', '');

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
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` varchar(8) NOT NULL,
  `forename` varchar(80) NOT NULL,
  `surname` varchar(80) NOT NULL,
  `dob` date NOT NULL,
  `sex` char(1) NOT NULL,
  `diagnosis` varchar(1500) NOT NULL,
  `transplant_details` varchar(255) DEFAULT NULL,
  `surgery_hospital` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `contact_method` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `forename`, `surname`, `dob`, `sex`, `diagnosis`, `transplant_details`, `surgery_hospital`, `email`, `appointment_date`, `contact_method`) VALUES
('EB1972', 'Sarah', 'Connorio', '1985-02-23', 'F', 'liver problem b', '2010-02-21', 'Alpha Clinic', 'sc81236@gmail.com', '2019-03-25', 'Phone'),
('GE1213', 'tom', 'kingston', '1980-03-10', 'M', 'liver problem c', '12/12/2011', 'Lobster City Hospital ', 'sk21973@gmail.com', '0000-00-00', 'Email'),
('GG1212', 'sean', 'kingston', '2010-03-11', 'M', 'liver problem 1', '12/12/2013', 'Raccoon City Hospital ', 'sk21973@gmail.com', '2019-03-31', 'Email');

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
(1, 'test', 'test@gmail.com', NULL, '$2y$10$gY.MI1nyhdX0xeE.q6syPO00KoE1LOxCoQCDLMlRYzHr7.hY8YpWK', NULL, '2019-03-04 21:10:16', '2019-03-04 21:10:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bt_process`
--
ALTER TABLE `bt_process`
  ADD PRIMARY KEY (`test_id`),
  ADD UNIQUE KEY `test_id` (`test_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospital_id`),
  ADD UNIQUE KEY `hospital_id` (`hospital_id`);

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
-- Indexes for table `patient`
--
ALTER TABLE `patient`
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
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hospital_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bt_process`
--
ALTER TABLE `bt_process`
  ADD CONSTRAINT `bt_process_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hospital`
--
ALTER TABLE `hospital`
  ADD CONSTRAINT `hospital_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
