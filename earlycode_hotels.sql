-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2022 at 03:45 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `earlycode_hotels`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `roomid` varchar(11) NOT NULL,
  `userid` varchar(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `booked_room` varchar(100) NOT NULL,
  `no_of_rooms` varchar(10) NOT NULL,
  `check_out` datetime NOT NULL,
  `booking_status` varchar(100) NOT NULL,
  `date_booked` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `roomid`, `userid`, `full_name`, `booked_room`, `no_of_rooms`, `check_out`, `booking_status`, `date_booked`) VALUES
(4, '4', '2', 'Andak Shipping', 'Presidential Suite', '2', '2022-03-17 01:48:24', 'Checked Out', '2022-03-17 01:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `room_stock` varchar(10) NOT NULL,
  `price` varchar(100) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `room_stock`, `price`, `date_created`) VALUES
(1, 'Deluxe Rooms', '20', '100000', '2022-03-10'),
(3, 'Single Rooms', '10', '10000', '2022-03-10'),
(4, 'Presidential Suite', '7', '1000000', '2022-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `user_password` varchar(300) NOT NULL,
  `user_pic` varchar(30) NOT NULL,
  `user_role` varchar(10) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `dob`, `email`, `phone`, `user_password`, `user_pic`, `user_role`, `date_created`) VALUES
(1, 'Chris', 'Graham', '2022-03-10', 'admin@gmail.com', '+2348124423122', '$2y$10$YOoxZH.SINOsBM8G2qS75eFw6TnFHWyUhNCWVezetEPUQRacCXhWq', '', 'admin', '2022-03-09 03:10:46'),
(2, 'Andak', 'Shipping', '2022-03-10', 'tester@gmail.com', '+495402058450', '$2y$10$Tvp1j2Gfa.AttCME.EMvbOXPa2nEJfrgK4.jANjvMSBAKtNgLXqfO', 'profile2.jpg', 'user', '2022-03-10 12:16:37'),
(3, 'Emmanuel', 'Graham', '2022-03-14', 'emmanuelodobo10@gmail.com', '08142237388', '$2y$10$hMKFv0t/oK99YzcCet3k6e427fU2oOZGtfVEAzogdfYJSGxGzfMkm', '', 'user', '2022-03-14 03:16:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
