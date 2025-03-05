-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 12:18 PM
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
-- Database: `db_project_and_professionalism`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `article_name` varchar(255) NOT NULL,
  `article_overview` text NOT NULL,
  `article_description` text NOT NULL,
  `article_author` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `article_name`, `article_overview`, `article_description`, `article_author`, `date`) VALUES
(3, 'NAWALT', 'Not All Women Are Like That', 'why NAWALT is the first thing women hit men with when stated with facts', 'Bob Jones', '2023-05-23 15:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `livesearch`
--

CREATE TABLE `livesearch` (
  `id` int(11) NOT NULL,
  `article_name_live` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `searchbar`
--

CREATE TABLE `searchbar` (
  `id` int(11) NOT NULL,
  `article_name` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `user_contacted` varchar(255) NOT NULL,
  `query_or_question` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `user_contacted`, `query_or_question`, `type`, `date`) VALUES
(0, 'Muhammad Qasim', 'Issues with FileZilla', 'Important', '2023-05-23 18:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `type` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `password`, `type`, `date`) VALUES
(1, 23313, 'DwayneJohn980', 'DwayneJohn980', 0, '2023-05-23 17:09:50'),
(2, 2312, 'DwayneJohn980', 'DwayneJohn980', 0, '2023-05-23 17:10:23'),
(3, 5450, 'DwayneJohn980', 'DwayneJohn980', 0, '2023-05-23 17:10:45');

-- --------------------------------------------------------

--
-- Table structure for table `website_log`
--

CREATE TABLE `website_log` (
  `id` int(11) NOT NULL,
  `total_users` int(11) NOT NULL,
  `total_revenue` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `website_review`
--

CREATE TABLE `website_review` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `website_survey`
--

CREATE TABLE `website_survey` (
  `id` int(11) NOT NULL,
  `website_layout` text NOT NULL,
  `website_functionality` text NOT NULL,
  `website_design` text NOT NULL,
  `website_animation` text NOT NULL,
  `comments` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livesearch`
--
ALTER TABLE `livesearch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `searchbar`
--
ALTER TABLE `searchbar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_log`
--
ALTER TABLE `website_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_review`
--
ALTER TABLE `website_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_survey`
--
ALTER TABLE `website_survey`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `livesearch`
--
ALTER TABLE `livesearch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `searchbar`
--
ALTER TABLE `searchbar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `website_log`
--
ALTER TABLE `website_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `website_review`
--
ALTER TABLE `website_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `website_survey`
--
ALTER TABLE `website_survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
