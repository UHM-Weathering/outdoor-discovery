-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 27, 2020 at 12:03 AM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `outdoor_discovery`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `created` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `modified` int(10) UNSIGNED NOT NULL,
  `modified_by` int(10) UNSIGNED NOT NULL,
  `event_name` varchar(64) NOT NULL,
  `event_start` int(10) UNSIGNED NOT NULL,
  `event_end` int(10) UNSIGNED NOT NULL,
  `event_location` varchar(64) NOT NULL,
  `event_latitude` decimal(9,6) DEFAULT NULL,
  `event_longitude` decimal(9,6) DEFAULT NULL,
  `max_participants` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `created`, `created_by`, `modified`, `modified_by`, `event_name`, `event_start`, `event_end`, `event_location`, `event_latitude`, `event_longitude`, `max_participants`, `description`) VALUES
(1, 1587943355, 1, 1587943355, 1, 'Beginning Surfing', 1588381200, 1588392000, 'Diamond Head', '21.254953', '-157.807098', 6, 'Learn the water sport of Hawai\'i!! This class is for beginners and transportation and equipment are provided. Participants must be able to swim.\r\nOne Day Classes\r\n$30 UHM Student & WRC Members\r\n$35 Faculty, Staff, & Guest (must be a guest of UH participant)\r\n**The maximum amount of spots per surfing class is 6.** Classes are held at Diamond Head.'),
(2, 1587944291, 1, 1587944291, 1, 'Body Boarding', 1588464000, 1588474800, 'Waimanalo', '21.332178', '-157.695230', 10, 'Body Boarding is enjoyed at most beaches in the State of Hawai\'i. Come learn the basics of body boarding and water safety at a beach with shore break. Transportation and equipment are provided. Participants must be able to swim. Body boarding is limited to UH students, faculty, staff and their guests. All excursions take place at Waimanalo\r\n$22 UHM Student & WRC Members\r\n$27 Faculty, Staff, & Guest (must be a guest of UH participant)\r\nClasses are held at Waimanalo.'),
(3, 1587944802, 1, 1587944802, 1, 'Hiking', 1588962600, 1588975200, 'Manoa Falls', '21.332487', '-157.800194', 10, 'Explore the island of Oahu. Join organized hikes to scenic locations.\r\nTransportation provided.\r\n$7 UHM Student & WRC Members\r\n$12 Faculty, Staff, & Guest (must be a guest of UH participant)');

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE `login_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `created` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(46) NOT NULL,
  `user_agent_hash` char(64) NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `created` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `paid` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `event_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` char(32) NOT NULL,
  `created` int(10) UNSIGNED NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL,
  `last_active` int(10) UNSIGNED NOT NULL,
  `user_agent_hash` char(64) NOT NULL,
  `ip_address` varchar(46) NOT NULL,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `id` int(10) UNSIGNED NOT NULL,
  `created` int(10) UNSIGNED NOT NULL,
  `data` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `created` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_history` text NOT NULL,
  `password_salt` char(64) NOT NULL,
  `password_hash` char(64) NOT NULL,
  `permissions` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created`, `email`, `email_history`, `password_salt`, `password_hash`, `permissions`) VALUES
(1, 1586740418, 'admin@hawaii.edu', 'a:1:{i:1586740418;s:16:\"admin@hawaii.edu\";}', 'f43d0cba8c8b30343d0618d7412723746e4a624900be3ec236a716b209ac9bf8', 'f9e24efe3d21184ed1399353c6ec9707e63d811cec2d49d97a8f7159289861c7', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_agents`
--

CREATE TABLE `user_agents` (
  `hash` char(64) NOT NULL,
  `user_agent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created` (`created`),
  ADD KEY `modified` (`modified`),
  ADD KEY `event_name` (`event_name`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `modified_by` (`modified_by`);

--
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_agent_hash` (`user_agent_hash`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `created` (`created`),
  ADD KEY `ip_address` (`ip_address`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created` (`created`),
  ADD KEY `paid` (`paid`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`),
  ADD KEY `user_agent_hash` (`user_agent_hash`),
  ADD KEY `expires` (`expires`),
  ADD KEY `created` (`created`),
  ADD KEY `last_active` (`last_active`),
  ADD KEY `ip_address` (`ip_address`);

--
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `created` (`created`),
  ADD KEY `password_hash` (`password_hash`),
  ADD KEY `permissions` (`permissions`);

--
-- Indexes for table `user_agents`
--
ALTER TABLE `user_agents`
  ADD PRIMARY KEY (`hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD CONSTRAINT `login_logs_ibfk_1` FOREIGN KEY (`user_agent_hash`) REFERENCES `user_agents` (`hash`),
  ADD CONSTRAINT `login_logs_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `registrations_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`user_agent_hash`) REFERENCES `user_agents` (`hash`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
