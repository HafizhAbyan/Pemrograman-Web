-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2025 at 01:54 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuis`
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `foto`) VALUES
(1, 'andi', '$2y$10$wy6oItdgvRfkYwVw9BzX/um8GOfV3mNyRbNukKCaqxZBSUdYfRTMC', 'user', '1748310005_patrick.jpg'),
(2, 'aku', '$2y$10$59p0LfBq4qGjiq/zqpUBeuhFJG2z8HOptzaIDcU2d8cV1TFUvT2em', 'user', NULL),
(4, 'admin', '$2y$10$F7ANi.e0AAo2mnSObfLSg.eJ.5HoCFx4/NVdzpkaMeHw1k4u.UYHu', 'admin', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
