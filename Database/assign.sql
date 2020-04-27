-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2020 at 05:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assign`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `datetime` timestamp(5) NOT NULL DEFAULT current_timestamp(5) ON UPDATE current_timestamp(5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `password`, `photo`, `status`, `datetime`) VALUES
(1, 'Akhi Pathan', 'pathanahad', 'ahadcseuits4@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'pathanahad.jpg', 'inactive', '2020-02-29 20:59:24.94127');

-- --------------------------------------------------------

--
-- Table structure for table `comment_table`
--

CREATE TABLE `comment_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_type` varchar(8) NOT NULL,
  `name` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `cur_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment_table`
--

INSERT INTO `comment_table` (`id`, `user_id`, `post_id`, `user_type`, `name`, `comment`, `cur_date`) VALUES
(1, 2, 2, 'teacher', 'Uchswas Paul', 'Asba na Ahad?', '2020-03-04'),
(2, 1, 2, 'student', 'MD Ahad Pathan', 'asbo sir!', '2020-03-04'),
(3, 2, 2, 'student', 'Jhuma Akter', 'i\'m jhuma!', '2020-03-04'),
(4, 1, 1, 'student', 'MD Ahad Pathan', 'Hey all..\r\n', '2020-03-05'),
(5, 2, 2, 'student', 'Jhuma Akter', 'hi..\r\n', '2020-03-06'),
(6, 2, 1, 'student', 'Jhuma Akter', 'hey', '2020-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contract` int(50) NOT NULL,
  `sub_code` varchar(100) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `name`, `contract`, `sub_code`, `faculty`, `file`) VALUES
(3, 'Bappy Mridha', 1845392010, 'bba201', 'bba', 'newproject.rar'),
(4, 'Asma Khatun', 1981732712, 'eee301', 'eee', 'man25.jpg'),
(6, 'Jhuma Akter', 1845392010, 'civil2012', 'civil', 'CSE 201 L1.pptx'),
(7, 'Sabbir', 1845392010, 'ece201', 'ece', 'Logic Gates.ppt');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `messages` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  `sender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `username`, `faculty`, `messages`, `status`, `sender`) VALUES
(1, 2, 'Uchswa Paul', 'cse', 'I\'m cse Teacher Ucchaspal', 'no', 'teacher'),
(2, 3, 'PriyoRanjan', 'cse', 'i\'m teacher prioronjon', 'no', 'teacher'),
(3, 1, 'ahadpathan', 'cse', 'I\'m student Ahad', 'no', 'student'),
(4, 1, 'ahadpathan', 'cse', 'Ahad', 'no', 'student'),
(5, 3, 'PriyoRanjan', 'cse', 'I\'m prio', 'no', 'teacher'),
(6, 3, 'PriyoRanjan', 'cse', 'Hi', 'no', 'teacher'),
(7, 2, 'Uchswa Paul', 'cse', 'hi', 'no', 'teacher'),
(8, 1, 'ahadpathan', 'cse', 'helo', 'no', 'student'),
(9, 2, 'Uchswa Paul', 'cse', 'hi teacher!', 'no', 'teacher'),
(10, 1, 'ahadpathan', 'cse', 'Hi student!', 'no', 'student'),
(11, 2, 'jhumaakter', 'cse', 'hi..', 'no', 'student'),
(12, 2, 'jhumaakter', 'cse', 'Ami jhum!', 'no', 'student'),
(13, 1, 'ahadpathan', 'cse', 'ami ahad!', 'no', 'student'),
(14, 3, 'PriyoRanjan', 'cse', 'I\'m lab teacher!', 'no', 'teacher'),
(15, 1, 'Yasin Ali01', 'eee', 'Hi ASma ami eee', 'no', 'teacher'),
(16, 3, 'asmakhatun', 'eee', 'Sir ami asma!', 'no', 'student'),
(17, 3, 'PriyoRanjan', 'cse', 'prio', 'no', 'teacher'),
(18, 2, 'jhumaakter', 'cse', 'hi..', 'no', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `post` varchar(500) NOT NULL,
  `date_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `teacher_name`, `faculty`, `title`, `post`, `date_time`) VALUES
(1, 0, 'MD AHAD PATHAN', 'cse', 'Re -schedule classs', 'rom day-to-day, stopping to take a minute for yourself is probably on the tippy end of your to-do list. You\'ll find yourself putting off moments of self care for later in the week, later in the month, and then finally realizing you have yet to enjoy a new book or listen to your favorite podcast in quite some time. But even the most successful people — thought leaders like, authors, and even our favorite stars — all take time to practice self care, and they\'ve shared their thoughts on just how im', '2020-03-04'),
(2, 2, 'Uchswa Paul', 'cse', 'Re -schedule classs', 'rom day-to-day, stopping to take a minute for yourself is probably on the tippy end of your to-do list. You\'ll find yourself putting off moments of self care for later in the week, later in the month, and then finally realizing you have yet to enjoy a new book or listen to your favorite', '2020-03-04'),
(3, 3, 'Prio', 'cse', 'nothong', 'yeap', '2020-03-06'),
(4, 0, '', '', '', '', '2020-03-09'),
(5, 0, '', '', '', '', '2020-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `replays`
--

CREATE TABLE `replays` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `replay` varchar(50) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `replays`
--

INSERT INTO `replays` (`id`, `user_id`, `comment_id`, `replay`, `user_type`) VALUES
(1, 1, 1, 'Hae sir!', 'student'),
(2, 2, 1, 'hae Sir amra sbai asbo!', 'student'),
(3, 1, 5, 'hello!', 'student'),
(4, 2, 5, 'Sir ki next Classs nibe!', 'student'),
(5, 2, 1, 'hello!ami teacher!', 'teacher'),
(6, 2, 5, 'lol', 'teacher'),
(7, 2, 2, 'tmi asba ahad?', 'student'),
(8, 1, 2, 'hae ami asbo!', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `faculty` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL,
  `datetime` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `username`, `faculty`, `email`, `password`, `photo`, `status`, `datetime`) VALUES
(1, 'MD Ahad Pathan', 'ahadpathan', 'cse', 'ahadcseuits@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'ahadpathan.jpg', 'active', '2020-03-04 09:56:54.311013'),
(2, 'Jhuma Akter', 'jhumaakter', 'cse', 'sadiaafrinjhuma@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'jhumaakter.jpg', 'active', '2020-03-04 09:56:59.739005'),
(3, 'Asma Akter', 'asmakhatun', 'eee', 'asmakhatun@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'asmakhatun.jpg', 'active', '2020-03-04 20:48:06.622103');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `datetime` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `username`, `faculty`, `email`, `password`, `photo`, `status`, `datetime`) VALUES
(1, 'Mr. Md. Yasin Ali', 'Yasin Ali01', 'eee', 'pathan_ant@ovi.com', '25d55ad283aa400af464c76d713c07ad', 'Yasin Ali01.jpg', 'active', '2020-03-04 09:52:14.678007'),
(2, 'Uchswas Paul', 'Uchswa Paul', 'cse', 'UchswasPaul@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Uchswa Paul.jpg', 'active', '2020-03-04 09:52:21.966599'),
(3, 'Priyo Ranjan Kundu Prosun', 'PriyoRanjan', 'cse', 'PriyoRanjan@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'PriyoRanjan.jpg', 'active', '2020-03-04 09:52:28.266837');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_table`
--
ALTER TABLE `comment_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replays`
--
ALTER TABLE `replays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment_table`
--
ALTER TABLE `comment_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `replays`
--
ALTER TABLE `replays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
