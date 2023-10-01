-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql106.infinityfree.com
-- Generation Time: Sep 30, 2023 at 09:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_35113994_bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodamount`
--

CREATE TABLE `bloodamount` (
  `id` int(20) NOT NULL,
  `hid` varchar(20) NOT NULL,
  `bloodgroup` varchar(20) NOT NULL,
  `amount` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodamount`
--

INSERT INTO `bloodamount` (`id`, `hid`, `bloodgroup`, `amount`) VALUES
(6, '12345', 'B+', '100'),
(11, 'Vinay', 'A+', '15'),
(9, '11223', 'O+', '30'),
(8, '11223', 'AB+', '35');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hname` varchar(40) NOT NULL,
  `hid` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `street` varchar(200) NOT NULL,
  `street2` varchar(200) NOT NULL,
  `country` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `region` varchar(20) NOT NULL,
  `postal` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hname`, `hid`, `email`, `password`, `phone`, `street`, `street2`, `country`, `city`, `region`, `postal`) VALUES
('Safe', '11223', 'safe@gmail.com', '$2y$10$ESDUPHCZBsg6dxPdQkMDX.NiDVTs2iUdQxaMxcYdDJixP7eVZWhge', '098735641', 'j', 'k', 'America', 'q', 'w', '12345'),
('Safe', '11223', 'safe@gmail.com', '$2y$10$jjTw173wAAkYuYep0pHWDuNp5bUZOW3tl6V.ngrBtsMIX69PzWmzy', '098735641', 'j', 'k', 'America', 'q', 'w', '12345'),
('Vinay', 'Vinay', 'chsvinayraj@gmail.com', '$2y$10$4o9p1IGYSKHo5Cxv5pXUxu.IP0Cb4huvvfkqcOWtvUDGl3MkrX.Wa', '09491604860', 'Gsr colony', '2', 'India', 'Amalapuram', 'Nalla garden', '533320'),
('Vinay', 'Vinay', 'chsvinayraj@gmail.com', '$2y$10$YZ4/7mDYyoiowxBf3CVTZOwyptQMexUYgZoXF2NU1qHZ3LAAFFjvG', '09491604860', 'Gsr colony', '2', 'India', 'Amalapuram', 'Nalla garden', '533320'),
('Vinay', 'chs', 'chsvinayraj1@gmail.com', '$2y$10$xcvVXkxCX89pvi8hqtR/O.S8szVyJ511VK2tCbTdaiWTiGk3zL/Ke', '09491604860', 'Gsr colony', '2', 'India', 'Amalapuram', 'Nalla garden', '533320'),
('Vinay Raj', '1234', 'chsvinayraj1@gmail.com', '$2y$10$O7KC1PeyVxbPUzjKL6s/aeI0fQVYfotmha73HdlJZGho9Az/XkT5W', '09491604860', 'Gsr colonyj', '22', 'India', 'Amalapuram', 'Nalla garden', '533320'),
('Vinay', 'Vinay', 'Vinay', '$2y$10$06QZ.49xb3PGqOpJgIu95efX2xE02nrgkpt30WsPvfhwNIRvCg3Ka', '1', '1', '1', 'India', 'Amalapuram', 'Nalla garden', '533320'),
('vinay', 'vinay', 'vinay', '$2y$10$ABpCAl3HMkQAAhioodguQefh6djIO42e3VXNI8VGO8DtXtGHsNJDC', '4', 'kakinada', '4', 'India', 'kakinada', 'Andhra Pradesh', '533003');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `age` varchar(3) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `bloodgroup` varchar(4) NOT NULL,
  `address` varchar(200) NOT NULL,
  `country` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `region` varchar(30) NOT NULL,
  `postal_code` varchar(6) NOT NULL,
  `registered_time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `phone_number`, `age`, `gender`, `bloodgroup`, `address`, `country`, `city`, `region`, `postal_code`, `registered_time`) VALUES
(1, 'saiteja', 'saiteja.trinadha@gmail.com', '$2y$10$/l2tqEMlWSWKU3lNUGe2yONeLlWaHRvYh8YWBj9vxqxh9EQeiPvCu', '0824772795', '19', 'on', 'B+', '12-35, Vengayyammapeta, Peddapuram Mandal', 'India', 'Peddapuram', 'AndhraÂ Pradesh', '533437', '09:50:54'),
(2, 'Raj', 'raj@gmail.com', '$2y$10$DG5fxpwg0lwVIadeqkaOCuDS7BC8GgkcpqAfF7BLVHkxNRPRE.sci', '9999999999', '21', 'on', 'A-', 'rajghat', 'India', 'solapur', 'Noida', '500202', '09:50:54'),
(7, 'teja', 'adapa@gmail.com', '$2y$10$.cNxU2RxulRIulJjfy2S9OEn0El7/DnN8UM0JrKpXuyDahtdzt.ni', '1234567890', '12', 'on', 'B+', 'ktp', 'India', 'Peddapuram', 'AndhraÂ Pradesh', '533437', '12:46:48'),
(6, 'sss', 'saiteja.trinada@gmail.com', '$2y$10$qxshhLUNDhxBkbyFcSB3Mep8nIKPqxnzJ0BssEhk4PdHKZ8.NdjDK', '0824772795', '12', 'on', 'B-', '12-35, Vengayyammapeta, Peddapuram Mandal', 'India', 'Peddapuram', 'AndhraÂ Pradesh', '533437', '10:17:48'),
(8, 'Vinay', 'chsvinayraj@gmail.com', '$2y$10$q2ggXGUfurMo3I.wiuQMiuckTHkQNoSFR4L49y5wE9vnACI5k9PN2', '9491604860', '19', 'Male', 'B+', 'Gsr colony ', 'India', 'Amalapuram ', 'Nalla garden', '533320', '15:13:48'),
(9, 'VinayRaj', 'vinayraj', '$2y$10$4bAXP02iI/Fzb9r6wH4O8OdlARG4tK5f6dsrNoy8KrsqdvInGgs7.', '1', '19', 'Male', 'A+', 'Gsr colony', 'India', 'Amalapuram', 'Nalla garden', '533320', '09:24:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloodamount`
--
ALTER TABLE `bloodamount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloodamount`
--
ALTER TABLE `bloodamount`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
