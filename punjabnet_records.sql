-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2019 at 08:22 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.1.32-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `punjabnet_records`
--

-- --------------------------------------------------------

--
-- Table structure for table `books_record`
--

CREATE TABLE `books_record` (
  `ID` int(11) NOT NULL,
  `book` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `download_url` varchar(500) DEFAULT NULL,
  `image_url` varchar(500) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_record`
--

INSERT INTO `books_record` (`ID`, `book`, `author`, `topic`, `download_url`, `image_url`, `created_at`) VALUES
(12, 'Indian History', 'Dharminder Singh', 'History', 'https://phppot.com/php/import-csv-file-into-mysql-using-php/', 'https://i.pinimg.com/originals/66/d7/bc/66d7bcfd7becad7304563a7da3e6a8a5.jpg', '2019-03-16 15:34:53'),
(13, 'History of Punjab', 'Dharminder Singh', 'punjab', 'https://phppot.com/php/import-csv-file-into-mysql-using-php/', 'https://i.pinimg.com/originals/66/d7/bc/66d7bcfd7becad7304563a7da3e6a8a5.jpg', '2019-03-16 15:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `email`, `password`, `firstname`, `lastname`, `created_at`) VALUES
(2, 'dhaliwal.dharminder@yahoo.com', 'admin', 'Dharminder', 'Singh', '2019-03-16 15:34:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books_record`
--
ALTER TABLE `books_record`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books_record`
--
ALTER TABLE `books_record`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
