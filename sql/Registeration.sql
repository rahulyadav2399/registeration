-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 21, 2020 at 10:54 AM
-- Server version: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `Registeration`
--

CREATE TABLE `Registeration` (
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `contact` bigint NOT NULL,
  `age` int NOT NULL,
  `password` varchar(15) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Registeration`
--

INSERT INTO `Registeration` (`firstname`, `lastname`, `email_id`, `contact`, `age`, `password`, `image`) VALUES
('Abhilasha', 'Mishra', 'abhilasha@gmail.com', 9555944457, 22, '1234567', 'imge/avatar.png'),
('Rahul', 'Yadav', 'rahul.in1999@gmail.com', 9702972014, 21, '1234567', 'imge/IMG_20200404_142115_423.jpg'),
('Vikas', 'Yadav', 'vikas.in1999@gmail.com', 9555944456, 22, 'vikas123', 'imge/B612_20200106_220218_631.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Registeration`
--
ALTER TABLE `Registeration`
  ADD UNIQUE KEY `email_id` (`email_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
