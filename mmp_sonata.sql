SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

DROP TABLE IF EXISTS `critical_dates`;
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

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE `equipment` (
  `id` int(255) NOT NULL,
  `generic` varchar(255) NOT NULL,
  `tester` varchar(255) NOT NULL,
  `handler` varchar(255) NOT NULL,
  `prober` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `general_project_info`;
CREATE TABLE `general_project_info` (
  `id` int(255) NOT NULL,
  `generic` varchar(255) NOT NULL,
  `ple_partname` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `project_category` varchar(255) NOT NULL,
  `tde_status` varchar(255) NOT NULL,
  `sub_bu` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `date_created` date DEFAULT NULL,
  `modified_date` date NOT NULL,
  `modified_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `handler_masterlist`;
CREATE TABLE `handler_masterlist` (
  `id` int(255) NOT NULL,
  `handler` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `handler_masterlist` VALUES(1, 'rasco1000', 'RASCO 1000');
INSERT INTO `handler_masterlist` VALUES(2, 'na', 'NA');
INSERT INTO `handler_masterlist` VALUES(3, 'tbd', 'TBD');

DROP TABLE IF EXISTS `key_personnel`;
CREATE TABLE `key_personnel` (
  `id` int(255) NOT NULL,
  `generic` varchar(255) NOT NULL,
  `primary_tde` varchar(255) NOT NULL,
  `releasing_tde` varchar(255) NOT NULL,
  `primary_pe` varchar(255) NOT NULL,
  `releasing_pe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `links`;
CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `generic` varchar(255) NOT NULL,
  `ple_lnk` varchar(255) NOT NULL,
  `prime_link` varchar(255) NOT NULL,
  `apr_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `prober_masterlist`;
CREATE TABLE `prober_masterlist` (
  `id` int(255) NOT NULL,
  `prober` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `prober_masterlist` VALUES(1, 'telp8', 'TEL P8');
INSERT INTO `prober_masterlist` VALUES(2, 'na', 'NA');
INSERT INTO `prober_masterlist` VALUES(3, 'tbd', 'TBD');

DROP TABLE IF EXISTS `project_category_masterlist`;
CREATE TABLE `project_category_masterlist` (
  `id` int(255) NOT NULL,
  `project_category` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `project_category_masterlist` VALUES(1, 'newproduct', 'New Product Development');
INSERT INTO `project_category_masterlist` VALUES(2, 'directrelease', 'Direct Release B');
INSERT INTO `project_category_masterlist` VALUES(3, 'npcodevelopment', 'NP Co-Development');
INSERT INTO `project_category_masterlist` VALUES(4, 'qualprogram', 'Qual Program Development');
INSERT INTO `project_category_masterlist` VALUES(5, 'wafersort', 'Wafersort Development');

DROP TABLE IF EXISTS `sub_bu_masterlist`;
CREATE TABLE `sub_bu_masterlist` (
  `id` int(255) NOT NULL,
  `sub_bu` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `sub_bu_masterlist` VALUES(1, 'ips', 'IPS');
INSERT INTO `sub_bu_masterlist` VALUES(2, 'hpp', 'HPP');
INSERT INTO `sub_bu_masterlist` VALUES(3, 'mps', 'MPS');
INSERT INTO `sub_bu_masterlist` VALUES(4, 'hps', 'HPS');
INSERT INTO `sub_bu_masterlist` VALUES(5, 'nonmmp', 'NON-MMP');

DROP TABLE IF EXISTS `tde_status_masterlist`;
CREATE TABLE `tde_status_masterlist` (
  `id` int(255) NOT NULL,
  `tde_status` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tde_status_masterlist` VALUES(1, 'cancelled', 'Cancelled');
INSERT INTO `tde_status_masterlist` VALUES(2, 'onhold', 'On-hold');
INSERT INTO `tde_status_masterlist` VALUES(3, 'notallocated', 'Not Allocated');
INSERT INTO `tde_status_masterlist` VALUES(4, 'allocated', 'Allocated');
INSERT INTO `tde_status_masterlist` VALUES(5, 'completed', 'Completed');

DROP TABLE IF EXISTS `tester_masterlist`;
CREATE TABLE `tester_masterlist` (
  `id` int(255) NOT NULL,
  `tester` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tester_masterlist` VALUES(1, 'ets364b', 'ETS364B');
INSERT INTO `tester_masterlist` VALUES(2, 'tbd', 'TBD');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `users_role` varchar(255) NOT NULL,
  `users_group` varchar(255) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `users_group_masterlist`;
CREATE TABLE `users_group_masterlist` (
  `id` int(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users_group_masterlist` VALUES(1, 'product', 'Product Engineer (PE)');
INSERT INTO `users_group_masterlist` VALUES(2, 'test', 'Test Development Engineer (TE)');

DROP TABLE IF EXISTS `users_role_masterlist`;
CREATE TABLE `users_role_masterlist` (
  `id` int(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users_role_masterlist` VALUES(1, 'admin', 'Admin');
INSERT INTO `users_role_masterlist` VALUES(2, 'leader', 'Leader');
INSERT INTO `users_role_masterlist` VALUES(3, 'member', 'Member');
INSERT INTO `users_role_masterlist` VALUES(4, 'guest', 'Guest');


ALTER TABLE `critical_dates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `generic` (`generic`);

ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `general_project_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `generic` (`generic`);

ALTER TABLE `handler_masterlist`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `key_personnel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `generic` (`generic`);

ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `generic` (`generic`);

ALTER TABLE `prober_masterlist`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `project_category_masterlist`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `sub_bu_masterlist`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tde_status_masterlist`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tester_masterlist`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users_group_masterlist`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users_role_masterlist`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `critical_dates`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

ALTER TABLE `equipment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

ALTER TABLE `general_project_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

ALTER TABLE `handler_masterlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

ALTER TABLE `key_personnel`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `prober_masterlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

ALTER TABLE `project_category_masterlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

ALTER TABLE `sub_bu_masterlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tde_status_masterlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tester_masterlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users_group_masterlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users_role_masterlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
