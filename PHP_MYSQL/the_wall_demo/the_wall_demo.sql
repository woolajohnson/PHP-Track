-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 07, 2024 at 09:16 AM
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
-- Database: `the_wall_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `message_id` int NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `message_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'This is a sample comment muna.', '2024-02-07 15:26:44', '2024-02-07 15:26:44'),
(2, 3, 1, 'This is a sample comment muna.', '2024-02-07 15:26:46', '2024-02-07 15:26:46'),
(3, 3, 6, 'sdampl comment', '2024-02-07 16:22:29', '2024-02-07 16:22:29'),
(4, 4, 6, 'Thats very good Michael Choi', '2024-02-07 17:13:14', '2024-02-07 17:13:14'),
(5, 4, 5, 'Ok ok ok :)', '2024-02-07 17:14:44', '2024-02-07 17:14:44'),
(6, 4, 7, 'Agree sir Lenard? XD', '2024-02-07 17:15:14', '2024-02-07 17:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 3, 'This is a sample message muna.', '2024-02-07 15:25:41', '2024-02-07 15:25:41'),
(2, 1, 'This is a sample message muna.', '2024-02-07 15:25:50', '2024-02-07 15:25:50'),
(3, 1, 'This is the second sample message.', '2024-02-07 15:26:15', '2024-02-07 15:26:15'),
(4, 3, 'This is the second sample message.', '2024-02-07 15:26:18', '2024-02-07 15:26:18'),
(5, 3, 'abc', '2024-02-07 16:17:09', '2024-02-07 16:17:09'),
(6, 3, '123', '2024-02-07 16:17:36', '2024-02-07 16:17:36'),
(7, 4, 'Miss Karen here, ^3^', '2024-02-07 17:12:17', '2024-02-07 17:12:17');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `contact`, `password`, `salt`, `created_at`, `updated_at`) VALUES
(3, 'Michael', 'Choi', 'mc@gmail.com', '09123456789', 'fdeb828732b311b88b611ffc391c76ea', '0ec55b182b501eb28ec7', '2024-02-07 15:24:31', '2024-02-07 15:24:31'),
(4, 'karen', 'maganda', 'karen@gmail.com', '09997777777', 'cd1fd48f623dd0ead95359471b50d237', 'ed9499a038fe06b4cc81', '2024-02-07 17:11:38', '2024-02-07 17:11:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
