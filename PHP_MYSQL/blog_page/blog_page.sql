-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 06, 2024 at 10:26 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_page`
--

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
CREATE TABLE IF NOT EXISTS `replies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `review_id` int NOT NULL,
  `user_id` int NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `review_id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'What an awesome review.', '2024-02-06 17:27:38', '2024-02-06 17:27:38'),
(2, 5, 1, 'This is my other reply!', '2024-02-06 17:28:02', '2024-02-06 17:28:02'),
(3, 5, 2, 'This is so nice, you know!', '2024-02-06 17:35:15', '2024-02-06 17:35:15'),
(4, 4, 2, 'Where is the sample now?', '2024-02-06 18:13:51', '2024-02-06 18:13:51'),
(5, 8, 1, 'Why do you have two post?', '2024-02-06 18:24:40', '2024-02-06 18:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(5, 1, 'Just another review to see.', '2024-02-06 17:00:54', '2024-02-06 17:00:54'),
(4, 1, 'This is a sample review.', '2024-02-06 17:00:12', '2024-02-06 17:00:12'),
(6, 2, 'Hi everyone, there will be no live session tomorrow!', '2024-02-06 17:34:56', '2024-02-06 17:34:56'),
(7, 2, 'Another review post from Michael Choi.', '2024-02-06 18:16:46', '2024-02-06 18:16:46'),
(8, 2, 'Another review post from Michael Choi.', '2024-02-06 18:17:11', '2024-02-06 18:17:11'),
(9, 1, 'Tomorrow is another day!', '2024-02-06 18:24:52', '2024-02-06 18:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `password` varchar(45) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `contact`, `password`, `salt`, `created_at`, `updated_at`) VALUES
(1, 'tete', 'tete', 'tete@gmail.com', '09888888888', '2d31e8159d01d532f5e5eb282db079b1', '9a05db3b9b3988e26639', '2024-02-06 16:21:46', '2024-02-06 16:21:46'),
(2, 'Michael', 'Choi', 'mc@gmail.com', '09123456789', 'd4c466cc8d5f9dcae895bfdc5ffd3e67', 'd9b02e8bc3bb8cf9de2c', '2024-02-06 17:34:18', '2024-02-06 17:34:18');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
