-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2020 at 07:50 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `description` varchar(300) NOT NULL,
  `org_name` varchar(25) NOT NULL,
  `event_manager` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` int(25) NOT NULL,
  `image` varchar(35) NOT NULL,
  `title` varchar(25) NOT NULL,
  `event_type` varchar(25) NOT NULL,
  `location` varchar(25) NOT NULL,
  `time` time(6) NOT NULL,
  `speaker` varchar(25) NOT NULL,
  `day` date NOT NULL,
  `logo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`description`, `org_name`, `event_manager`, `email`, `phone`, `image`, `title`, `event_type`, `location`, `time`, `speaker`, `day`, `logo`) VALUES
('$description', '$org_name', '$event_manager', '$email', 0, '$image', '$title', '$event_type', '$location', '00:00:00.000000', '$speaker', '0000-00-00', 0x246c6f676f),
('', 'jgjgjjf', '', 'nfjfnfn@KMAIL', 595959595, '', 'jgjgjf', '', '', '14:54:00.000000', 'mgmg', '2020-08-19', ''),
('', 'Giyani', '', 'tt@gmail', 575484873, '', 'Job offer', '', '', '18:08:00.000000', '', '2020-08-31', ''),
('', 'Giyani', '', 'tt@gmail', 575484873, '', 'Job offer', '', '', '18:08:00.000000', '', '2020-08-31', ''),
('', 'dscdscd', '', 'tt@fbf', 334334, '', 'vv', '', 'vvvvvv', '15:13:00.000000', '', '2020-08-14', ''),
('', 'ss', '', 'ss@gmail', 34567, '', 'ss', '', 'ss', '20:36:00.000000', '', '2020-08-06', ''),
('', 'ss', '', 'ss@gmail', 34567, '', 'ss', '', 'ss', '20:36:00.000000', '', '2020-08-06', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `reciver` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `feedbackdata` varchar(500) NOT NULL,
  `attachment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `sender`, `reciver`, `title`, `feedbackdata`, `attachment`) VALUES
(1234, 'Lambos', 'Titi Mlambo', 'Job', 'Successfully got a job', '');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offer_type` varchar(25) NOT NULL,
  `offer_faculty` varchar(25) NOT NULL,
  `offer_title` varchar(25) NOT NULL,
  `Location` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`offer_type`, `offer_faculty`, `offer_title`, `Location`, `Email`) VALUES
('Internship', 'Science', 'Software developer in jav', 'Cape Town', 'hey@gmail.com'),
('Vacation work', 'Health sciences', 'Muongori', 'Giyani, Nkhensani Hospita', 'Nkhensani@gov.co.za');

-- --------------------------------------------------------

--
-- Table structure for table `organisations`
--

CREATE TABLE `organisations` (
  `Organisation_Name` varchar(25) NOT NULL,
  `Employee_No` int(25) NOT NULL,
  `Registration_Number` int(25) NOT NULL,
  `Organisation_email` varchar(25) NOT NULL,
  `Date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisations`
--

INSERT INTO `organisations` (`Organisation_Name`, `Employee_No`, `Registration_Number`, `Organisation_email`, `Date_registered`) VALUES
('Mlambo Holdings', 778833653, 366466363, 'info@mlambo.co.za', '2020-08-05'),
('Questions', 65746363, 64646464, 'questions@gmai.com', '2020-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Name` varchar(25) NOT NULL,
  `Student_No` int(10) NOT NULL,
  `Number_Of_SMS` int(10) NOT NULL,
  `Number_Of_Email` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Name`, `Student_No`, `Number_Of_SMS`, `Number_Of_Email`) VALUES
('Titi', 7564646, 64, 6373),
('Joel', 6463327, 44, 744),
('Chrissy', 6476433, 44, 6473),
('Harvey', 43652, 233, 3232);

-- --------------------------------------------------------

--
-- Table structure for table `titi`
--

CREATE TABLE `titi` (
  `user_id` int(10) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `titi`
--

INSERT INTO `titi` (`user_id`, `name`, `password`) VALUES
(2000, 'Harvey Mlambo', 'lambos'),
(1825454, 'Titi Mlambo', 'lambos');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titi`
--
ALTER TABLE `titi`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1235;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
