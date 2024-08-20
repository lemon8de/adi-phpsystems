-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2024 at 02:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adiphp_systems`
--

-- --------------------------------------------------------

--
-- Table structure for table `critical_dates`
--

CREATE TABLE `critical_dates` (
  `id` int(255) NOT NULL,
  `generic` varchar(255) NOT NULL,
  `silicon_ad_initial` date DEFAULT NULL,
  `silicon_ad_recommit` date DEFAULT NULL,
  `charlot_ad_initial` date DEFAULT NULL,
  `charlot_ad_recommit` date DEFAULT NULL,
  `transfer_package_initial` date DEFAULT NULL,
  `transfer_package_recommit` date DEFAULT NULL,
  `iblot_ad_initial` date DEFAULT NULL,
  `iblot_ad_recommit` date DEFAULT NULL,
  `target_release_initial` date DEFAULT NULL,
  `target_release_recommit` date DEFAULT NULL,
  `tde_activities_completed` date DEFAULT NULL,
  `actual_release` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `critical_dates`
--

INSERT INTO `critical_dates` (`id`, `generic`, `silicon_ad_initial`, `silicon_ad_recommit`, `charlot_ad_initial`, `charlot_ad_recommit`, `transfer_package_initial`, `transfer_package_recommit`, `iblot_ad_initial`, `iblot_ad_recommit`, `target_release_initial`, `target_release_recommit`, `tde_activities_completed`, `actual_release`) VALUES
(1, 'generic3', '2024-08-03', '2024-08-04', '2024-08-05', '2024-08-06', '2024-08-07', '2024-08-08', '2024-08-09', '2024-08-10', '2024-08-11', '2024-08-12', '2024-08-13', '2024-08-14'),
(2, 'generic44', '2024-08-03', '2024-08-04', '2024-08-05', '2024-08-06', '2024-08-07', '2024-08-08', '2024-08-09', '2024-08-10', '2024-08-11', '2024-08-12', '2024-08-13', '2024-08-14'),
(3, 'generic444', '2024-08-03', '2024-08-04', '2024-08-05', '2024-08-06', '2024-08-07', '2024-08-08', '2024-08-09', '2024-08-10', '2024-08-11', '2024-08-12', '2024-08-13', '2024-08-14'),
(4, 'generic44476', '2024-08-03', '2024-08-04', '2024-08-05', '2024-08-06', '2024-08-07', '2024-08-08', '2024-08-09', '2024-08-10', '2024-08-11', '2024-08-12', '2024-08-13', '2024-08-14'),
(5, 'generic444762', '2024-08-03', '2024-08-04', '2024-08-05', '2024-08-06', '2024-08-07', '2024-08-08', '2024-08-09', '2024-08-10', '2024-08-11', '2024-08-12', '2024-08-13', '2024-08-14'),
(6, 'generic4447627', '2024-08-03', '2024-08-04', '2024-08-05', '2024-08-06', '2024-08-07', '2024-08-08', '2024-08-09', '2024-08-10', '2024-08-11', '2024-08-12', '2024-08-13', '2024-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(255) NOT NULL,
  `generic` varchar(255) NOT NULL,
  `tester` varchar(255) NOT NULL,
  `handler` varchar(255) NOT NULL,
  `prober` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_project_info`
--

CREATE TABLE `general_project_info` (
  `id` int(255) NOT NULL,
  `generic` varchar(255) NOT NULL,
  `ple_partname` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `project_category` varchar(255) NOT NULL,
  `tde_status` varchar(255) NOT NULL,
  `sub_bu` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `modified_date` date NOT NULL,
  `modified_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `handler_masterlist`
--

CREATE TABLE `handler_masterlist` (
  `id` int(255) NOT NULL,
  `handler` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `handler_masterlist`
--

INSERT INTO `handler_masterlist` (`id`, `handler`, `display_name`) VALUES
(1, 'rasco1000', 'RASCO 1000'),
(2, 'na', 'NA'),
(3, 'tbd', 'TBD');

-- --------------------------------------------------------

--
-- Table structure for table `key_personnel`
--

CREATE TABLE `key_personnel` (
  `id` int(255) NOT NULL,
  `generic` varchar(255) NOT NULL,
  `primary_tde` varchar(255) NOT NULL,
  `releasing_tde` varchar(255) NOT NULL,
  `primary_pe` varchar(255) NOT NULL,
  `releasing_pe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `generic` varchar(255) NOT NULL,
  `ple_lnk` varchar(255) NOT NULL,
  `prime_link` varchar(255) NOT NULL,
  `apr_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prober_masterlist`
--

CREATE TABLE `prober_masterlist` (
  `id` int(255) NOT NULL,
  `prober` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prober_masterlist`
--

INSERT INTO `prober_masterlist` (`id`, `prober`, `display_name`) VALUES
(1, 'telp8', 'TEL P8'),
(2, 'na', 'NA'),
(3, 'tbd', 'TBD');

-- --------------------------------------------------------

--
-- Table structure for table `project_category_masterlist`
--

CREATE TABLE `project_category_masterlist` (
  `id` int(255) NOT NULL,
  `project_category` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_category_masterlist`
--

INSERT INTO `project_category_masterlist` (`id`, `project_category`, `display_name`) VALUES
(1, 'newproduct', 'New Product Development'),
(2, 'directrelease', 'Direct Release B'),
(3, 'npcodevelopment', 'NP Co-Development'),
(4, 'qualprogram', 'Qual Program Development'),
(5, 'wafersort', 'Wafersort Development');

-- --------------------------------------------------------

--
-- Table structure for table `sub_bu_masterlist`
--

CREATE TABLE `sub_bu_masterlist` (
  `id` int(255) NOT NULL,
  `sub_bu` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_bu_masterlist`
--

INSERT INTO `sub_bu_masterlist` (`id`, `sub_bu`, `display_name`) VALUES
(1, 'ips', 'IPS'),
(2, 'hpp', 'HPP'),
(3, 'mps', 'MPS'),
(4, 'hps', 'HPS'),
(5, 'nonmmp', 'NON-MMP');

-- --------------------------------------------------------

--
-- Table structure for table `tde_status_masterlist`
--

CREATE TABLE `tde_status_masterlist` (
  `id` int(255) NOT NULL,
  `tde_status` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tde_status_masterlist`
--

INSERT INTO `tde_status_masterlist` (`id`, `tde_status`, `display_name`) VALUES
(1, 'cancelled', 'Cancelled'),
(2, 'onhold', 'On-hold'),
(3, 'notallocated', 'Not Allocated'),
(4, 'allocated', 'Allocated'),
(5, 'completed', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `tester_masterlist`
--

CREATE TABLE `tester_masterlist` (
  `id` int(255) NOT NULL,
  `tester` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tester_masterlist`
--

INSERT INTO `tester_masterlist` (`id`, `tester`, `display_name`) VALUES
(1, 'ets364b', 'ETS364B'),
(2, 'tbd', 'TBD');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `users_role` varchar(255) NOT NULL,
  `users_group` varchar(255) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `users_role`, `users_group`, `approved`) VALUES
(8, 'Jay Andrew Miñon', 'jayandrew.minon@gmail.com', '123', 'admin', 'product', 1),
(9, '123', '123', '123', 'admin', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_group_masterlist`
--

CREATE TABLE `users_group_masterlist` (
  `id` int(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_group_masterlist`
--

INSERT INTO `users_group_masterlist` (`id`, `role`, `display_name`) VALUES
(1, 'product', 'Product Engineer (PE)'),
(2, 'test', 'Test Development Engineer (TE)');

-- --------------------------------------------------------

--
-- Table structure for table `users_role_masterlist`
--

CREATE TABLE `users_role_masterlist` (
  `id` int(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_role_masterlist`
--

INSERT INTO `users_role_masterlist` (`id`, `role`, `display_name`) VALUES
(1, 'admin', 'Admin'),
(2, 'leader', 'Leader'),
(3, 'member', 'Member'),
(4, 'guest', 'Guest');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `critical_dates`
--
ALTER TABLE `critical_dates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `generic` (`generic`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_project_info`
--
ALTER TABLE `general_project_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `generic` (`generic`);

--
-- Indexes for table `handler_masterlist`
--
ALTER TABLE `handler_masterlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `key_personnel`
--
ALTER TABLE `key_personnel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `generic` (`generic`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `generic` (`generic`);

--
-- Indexes for table `prober_masterlist`
--
ALTER TABLE `prober_masterlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_category_masterlist`
--
ALTER TABLE `project_category_masterlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_bu_masterlist`
--
ALTER TABLE `sub_bu_masterlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tde_status_masterlist`
--
ALTER TABLE `tde_status_masterlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tester_masterlist`
--
ALTER TABLE `tester_masterlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_group_masterlist`
--
ALTER TABLE `users_group_masterlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_role_masterlist`
--
ALTER TABLE `users_role_masterlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `critical_dates`
--
ALTER TABLE `critical_dates`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_project_info`
--
ALTER TABLE `general_project_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `handler_masterlist`
--
ALTER TABLE `handler_masterlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `key_personnel`
--
ALTER TABLE `key_personnel`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prober_masterlist`
--
ALTER TABLE `prober_masterlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_category_masterlist`
--
ALTER TABLE `project_category_masterlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_bu_masterlist`
--
ALTER TABLE `sub_bu_masterlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tde_status_masterlist`
--
ALTER TABLE `tde_status_masterlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tester_masterlist`
--
ALTER TABLE `tester_masterlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_group_masterlist`
--
ALTER TABLE `users_group_masterlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_role_masterlist`
--
ALTER TABLE `users_role_masterlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
