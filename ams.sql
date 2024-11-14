-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2024 at 10:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `email`, `password`) VALUES
(1, 'Admin', 'admin@email.com', '$2y$10$v9J.8xc8YJ7EDIWMP8kuy.isDFpLAxkfI98qsttBwg9GBiwqsGL5e');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` enum('Present','Absent','Leave') DEFAULT 'Present',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `user_id`, `date`, `status`, `created_at`) VALUES
(93, 19, '2024-09-02', 'Present', '2024-09-02 03:30:00'),
(94, 19, '2024-09-03', 'Absent', '2024-09-03 03:31:00'),
(95, 19, '2024-09-04', 'Present', '2024-09-04 03:32:00'),
(96, 19, '2024-09-05', 'Leave', '2024-09-05 03:33:00'),
(97, 19, '2024-09-06', 'Present', '2024-09-06 03:34:00'),
(98, 19, '2024-09-09', 'Present', '2024-09-09 03:35:00'),
(99, 19, '2024-09-10', 'Absent', '2024-09-10 03:36:00'),
(100, 19, '2024-09-11', 'Present', '2024-09-11 03:37:00'),
(101, 19, '2024-09-12', 'Present', '2024-09-12 03:38:00'),
(102, 19, '2024-09-13', 'Absent', '2024-09-13 03:39:00'),
(103, 19, '2024-09-16', 'Present', '2024-09-16 03:30:00'),
(104, 19, '2024-09-17', 'Present', '2024-09-17 03:31:00'),
(105, 19, '2024-09-18', 'Absent', '2024-09-18 03:32:00'),
(106, 19, '2024-09-19', 'Present', '2024-09-19 03:33:00'),
(107, 19, '2024-09-20', 'Leave', '2024-09-20 03:34:00'),
(108, 19, '2024-09-23', 'Present', '2024-09-23 03:35:00'),
(109, 19, '2024-09-24', 'Present', '2024-09-24 03:36:00'),
(110, 19, '2024-09-25', 'Absent', '2024-09-25 03:37:00'),
(111, 19, '2024-09-26', 'Present', '2024-09-26 03:38:00'),
(112, 19, '2024-09-27', 'Present', '2024-09-27 03:39:00'),
(113, 19, '2024-09-30', 'Absent', '2024-09-30 03:30:00'),
(114, 19, '2024-10-01', 'Present', '2024-10-01 03:30:00'),
(115, 19, '2024-10-02', 'Leave', '2024-10-02 03:31:00'),
(116, 19, '2024-10-03', 'Present', '2024-10-03 03:32:00'),
(117, 19, '2024-10-04', 'Present', '2024-10-04 03:33:00'),
(118, 19, '2024-10-07', 'Absent', '2024-10-07 03:34:00'),
(119, 19, '2024-10-08', 'Present', '2024-10-08 03:35:00'),
(120, 19, '2024-10-09', 'Present', '2024-10-09 03:36:00'),
(121, 19, '2024-10-10', 'Absent', '2024-10-10 03:37:00'),
(122, 19, '2024-10-11', 'Present', '2024-10-11 03:38:00'),
(123, 19, '2024-10-14', 'Present', '2024-10-14 03:39:00'),
(124, 19, '2024-10-15', 'Absent', '2024-10-15 03:30:00'),
(125, 19, '2024-10-16', 'Present', '2024-10-16 03:31:00'),
(126, 19, '2024-10-17', 'Present', '2024-10-17 03:32:00'),
(127, 19, '2024-10-18', 'Leave', '2024-10-18 03:33:00'),
(128, 19, '2024-10-21', 'Present', '2024-10-21 03:34:00'),
(129, 19, '2024-10-22', 'Present', '2024-10-22 03:35:00'),
(130, 19, '2024-10-23', 'Absent', '2024-10-23 03:36:00'),
(131, 19, '2024-10-24', 'Present', '2024-10-24 03:37:00'),
(132, 19, '2024-10-25', 'Present', '2024-10-25 03:38:00'),
(133, 19, '2024-10-28', 'Present', '2024-10-28 03:39:00'),
(134, 19, '2024-10-29', 'Leave', '2024-10-29 03:30:00'),
(135, 19, '2024-10-30', 'Present', '2024-10-30 03:31:00'),
(136, 19, '2024-10-31', 'Present', '2024-10-31 03:32:00'),
(137, 19, '2024-11-01', 'Absent', '2024-11-01 03:30:00'),
(138, 19, '2024-11-04', 'Present', '2024-11-04 03:31:00'),
(139, 19, '2024-11-05', 'Leave', '2024-11-05 03:32:00'),
(140, 19, '2024-11-06', 'Present', '2024-11-06 03:33:00'),
(141, 19, '2024-11-07', 'Present', '2024-11-07 03:34:00'),
(142, 19, '2024-11-08', 'Absent', '2024-11-08 03:35:00'),
(143, 19, '2024-11-11', 'Present', '2024-11-11 03:36:00'),
(144, 14, '2024-11-12', 'Present', '2024-11-11 21:20:11'),
(148, 19, '2024-11-12', 'Present', '2024-11-11 22:15:19'),
(155, 14, '2024-11-13', 'Present', '2024-11-13 15:51:07'),
(158, 19, '2024-11-13', 'Present', '2024-11-13 17:00:26'),
(161, 20, '2024-11-14', 'Present', '2024-11-13 20:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `grade_id` int(11) NOT NULL,
  `grade` char(1) NOT NULL,
  `min_days` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grade_id`, `grade`, `min_days`, `description`) VALUES
(1, 'A', 26, 'Excellent Attendance'),
(2, 'B', 20, 'Good Attendance'),
(3, 'C', 15, 'Satisfactory Attendance'),
(4, 'D', 10, 'Needs Improvement'),
(5, 'F', 0, 'Unsatisfactory');

-- --------------------------------------------------------

--
-- Table structure for table `grading_rules`
--

CREATE TABLE `grading_rules` (
  `grade_id` int(11) NOT NULL,
  `grade_name` char(1) NOT NULL,
  `min_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `leave_date` date NOT NULL,
  `leave_reason` text NOT NULL,
  `status` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_requests`
--

INSERT INTO `leave_requests` (`request_id`, `user_id`, `leave_date`, `leave_reason`, `status`, `created_at`) VALUES
(19, 19, '2024-11-30', 'Shifting to another city', 'Rejected', '2024-11-11 22:57:01'),
(20, 19, '2024-11-27', 'Exam prep leave.\r\n', 'Approved', '2024-11-12 13:08:54'),
(21, 14, '2024-11-01', 'emergent leave.', 'Rejected', '2024-11-12 13:11:00'),
(22, 14, '2024-11-02', 'Dr appointment', 'Approved', '2024-11-12 13:11:18'),
(24, 19, '2024-11-15', 'MENTAL HEALTH CHECKUP', 'Approved', '2024-11-12 20:04:11'),
(26, 14, '2024-11-28', 'INTERVIEW ', 'Approved', '2024-11-13 14:31:50'),
(30, 14, '2024-11-26', 'SHIFTING!', 'Approved', '2024-11-13 15:49:08'),
(31, 14, '2024-11-25', 'URGENT WORK', 'Approved', '2024-11-13 15:53:06'),
(33, 14, '2024-11-15', 'JKL', 'Pending', '2024-11-14 20:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `roll_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `grade` char(1) DEFAULT NULL,
  `leave_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `roll_number`, `password`, `profile_picture`, `grade`, `leave_count`) VALUES
(14, 'Abdullah', 'abdullahshar01@gmail.com', 'R001', '$2y$10$08PRzfA.wcYYPaq/v5wbAu2cuX/KGbq8gBP/Eee3AcvV2vYfKhFzy', 'poster_picture.png', NULL, 0),
(19, 'Baqir', 'baqir@email.com', 'R003', '$2y$10$hXlr4iWO53wqgWuRnBAZAO6Zj1dS8qURaRIDri/J8Dxa8HiR0d75.', 'WhatsApp Image 2024-10-18 at 15.41.49_cf07f576.jpg', NULL, 0),
(20, 'johndoe', 'johndoe@example.com', 'R004', '$2y$10$Bj6E46whgoKsylfKrj57ee3xoTjJdwCNTKbb1hUK/mFZZHcHsZwm2', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `grading_rules`
--
ALTER TABLE `grading_rules`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grading_rules`
--
ALTER TABLE `grading_rules`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD CONSTRAINT `leave_requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
