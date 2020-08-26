-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2020 at 11:55 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wemeet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `user_name`, `password`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin'),
(2, 'vbb', 'aa', ''),
(4, 'hello@gmail.com', 'addd', ''),
(6, '', '', ''),
(7, '1', 'a', ''),
(8, '1', '1', ''),
(10, '111', '111', ''),
(11, 'xxx@gg.com', 'aaa', ''),
(12, 'asd223@gmail.com', 'rakibhgh', ''),
(14, 'ass@gmail.com', 'qqq', ''),
(21, 'abc@gmail.com', 'dd', ''),
(24, 'aaa@gmail.com', 'djkfhkdj', '');

-- --------------------------------------------------------

--
-- Table structure for table `all_seminar`
--

CREATE TABLE `all_seminar` (
  `seminar_id` int(15) NOT NULL,
  `seminar_tittle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `seminar_date` date NOT NULL,
  `seminar_time` varchar(15) NOT NULL,
  `speaker` varchar(255) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `seminar_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_seminar`
--

INSERT INTO `all_seminar` (`seminar_id`, `seminar_tittle`, `description`, `seminar_date`, `seminar_time`, `speaker`, `venue`, `seminar_img`) VALUES
(31, 'Web Design and Development', '                                        Web design encompasses many different skills and disciplines in the production and maintenance of websites. The different areas of web design include web graphic design; interface design; authoring, including standardised code and proprietary software; user experience design; and search engine optimization.                                ', '2020-08-30', '11:30', 'Rokeybur Rahman', 'Bangladesh Scout seminar hall', '1598416399-indexccc.png'),
(32, 'Cloud computing', 'Cloud computing is the on-demand availability of computer system resources, especially data storage (cloud storage) and computing power, without direct active management by the user. The term is generally used to describe data centers available to many users over the Internet.', '2020-08-28', '12:00', 'Md. Rezaul Mia', 'BAF Falcon Hall', '1598416606-inde22x.jpg'),
(33, 'Blockchain Technology', 'Blockchain technology is most simply defined as a decentralized, distributed ledger that records the provenance of a digital asset. ... Blockchain is most simply defined as a decentralized, distributed ledger technology that records the provenance of a digital asset.', '2020-09-03', '11:00', 'Md.Hossain', 'Central Auditorium (SAU)', '1598416732-index11.jpg'),
(34, 'Machine Learning ', '                    Machine learning is an application of artificial intelligence (AI) that provides systems the ability to automatically learn and improve from experience without being explicitly programmed. Machine learning focuses on the development of computer programs that can access data and use it learn for themselves.                ', '2020-10-14', '09:30', 'Istiak Mahmud', 'Daffodil International University', '1598416873-index.jpg'),
(35, 'Smart City', 'A smart city is an urban area that uses different types of electronic Internet of things (IoT) ... Hybrid spaces can serve to actualize future-state projects for smart city services and integration. Information city: The multiplicity of interactive devices in ...', '2020-09-28', '14:00', 'Md.Rashed Hossain', 'ICCB', '1598417029-iqqndex.jpg'),
(37, 'Software Architecture', 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2020-08-29', '11:00', 'Navin Ready', 'ICCB', '1598417361-2.jpg'),
(38, 'Digital Design Conference 2020 DDC', 'One of the best ways to follow industry trends and get ahead in your field is by attending conferences.To help you find the perfect design conference to attend in 2020, we have assembled a list of 12 conferences that besides providing the invaluable knowledge, allow you to travel to places you haven’t visited before.', '2020-08-27', '11:30', 'Abdul Khalek Khan', 'ICCB,Dhaka', '1598419317-indexaaa.jpg'),
(39, 'Artificial Intelligence', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.', '2020-10-27', '09:30', 'Sohidullah Kaisar', 'DIU', '1598430090-3.jpg'),
(40, 'Web', 'gfbngfbgfbgf', '2020-08-23', '17:08', 'fbgff', 'dddd', '1598432757-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `name`, `email`, `message`) VALUES
(6, 'Monirul Islam', 'monirul@gmail.com', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.'),
(7, 'atikul Islam', 'atik@gmail.com', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `user_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `seminar_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`user_id`, `name`, `email`, `phone`, `seminar_id`) VALUES
(5, 'Atiqul Islam ', 'akislam3@gmail.com', '01722377725', 121),
(6, 'Rakibul Islam', 'mrislam4141@gmail.com', '01716701041', 111),
(7, 'Md Hasan Mahmud', 'hasanmahmud123@gmail.com', '01193456787', 112),
(8, 'Tonmoy Das', 'tonmoy@gmail.com', '01645678909', 112),
(9, 'Hello World', 'helloworld@gmail.com', '01234567891', 111),
(11, 'bbb', 'bbb@gmail.com', '09123456', 124),
(15, 'Monirul Islam', 'monirul35@gmail.com', '09876543212', 31),
(16, 'AHR Shohag', 'ahrsohag@gmail.com', '01723242434', 36),
(17, 'Sumon Hassan', 'summon@gmail.com', '01950986687', 31);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `all_seminar`
--
ALTER TABLE `all_seminar`
  ADD PRIMARY KEY (`seminar_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `all_seminar`
--
ALTER TABLE `all_seminar`
  MODIFY `seminar_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
