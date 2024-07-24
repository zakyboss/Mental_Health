-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 11:02 AM
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
-- Database: `wad`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'Zakyboss Mohamed', 'boochimo9@gmail.com', '0783281584', 'Hell0');

-- --------------------------------------------------------

--
-- Table structure for table `mhp`
--

CREATE TABLE `mhp` (
  `id` int(11) NOT NULL,
  `photo` text NOT NULL,
  `title` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `license_number` varchar(100) NOT NULL,
  `special` varchar(50) NOT NULL,
  `yos` int(11) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mhp`
--

INSERT INTO `mhp` (`id`, `photo`, `title`, `name`, `contact`, `license_number`, `special`, `yos`, `location`) VALUES
(1, 'assets/images/Professionals/alice.jpeg', 'Clinical Psychologist', 'Dr Alice Johnson', 'aliceJohn@example.com', '123456', 'Clinical Psychologist', 10, 'Hope House, Nairobi County'),
(2, 'assets/images/Professionals/robert.jpeg', 'Licensed Therapist', 'Mr Robert Smith', 'robertSmith@example.com', '12456', 'Licensed Therapist', 8, 'Unity Building, Lagos State'),
(3, 'assets/images/Professionals/maria.jpeg', 'Counseling Psychologist', 'Dr Maria Garcia', 'mariaGarcia@example.com', '756834', 'Counseling Psychologist', 12, 'Liberty Plaza, Accra, Greater Accra'),
(4, 'assets/images/Professionals/emily.jpeg', 'Marriage and Family Therapist', 'Ms Emily Brown', 'emilyBrown@example.com', '546237', 'Marriage and Family Therapist', 7, 'Peace Tower, Kampala, Central Region'),
(5, 'assets/images/Professionals/michael.jpeg', 'Licensed Professional Counselor', 'Mr Michael Lee', 'michaellee@example.com', '24362', 'Licensed Professional Counselor', 9, 'Service Center, Johannesburg');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `q5` int(11) NOT NULL,
  `q6` int(11) NOT NULL,
  `q7` int(11) NOT NULL,
  `q8` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `score`, `status`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 2, 1, 2, 0, 2, 0, 2, 0, 0),
(3, 0, 2, 1, 2, 0, 2, 0, 2, 9, 0),
(4, 0, 1, 2, 0, 1, 0, 0, 1, 5, 0),
(5, 1, 2, 1, 2, 1, 0, 1, 0, 8, 0),
(6, 1, 2, 1, 2, 1, 2, 1, 0, 10, 1),
(7, 1, 2, 1, 2, 1, 2, 1, 0, 10, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mhp`
--
ALTER TABLE `mhp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mhp`
--
ALTER TABLE `mhp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
