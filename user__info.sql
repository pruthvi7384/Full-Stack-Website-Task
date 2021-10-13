-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2021 at 01:20 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user__profile`
--

-- --------------------------------------------------------

--
-- Table structure for table `user__info`
--

CREATE TABLE `user__info` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_id` varchar(150) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user__info`
--

INSERT INTO `user__info` (`id`, `first_name`, `last_name`, `email_id`, `contact_no`, `password`, `profile_image`, `added_on`) VALUES
(3, ' Pruthviraj', 'Rajput', 'pruthviraj.rajput011@gmail.com', '+918767286769', '123', '639530583_125530846_467957244167698_3201515383875134657_n (2).jpg', '2021-10-13 11:18:25'),
(4, ' Gaurav', 'Pawar', 'gauravpawar12@gmail.com', '1234567890', '125', '982235501_IMG_20190723_071945.jpg', '2021-10-13 11:19:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user__info`
--
ALTER TABLE `user__info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user__info`
--
ALTER TABLE `user__info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
