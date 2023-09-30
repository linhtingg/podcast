-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2023 at 05:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `podcast`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `campaignid` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`campaignid`, `name`, `description`, `creator`, `duration`) VALUES
(2, 'White rhinos preservation', 'The tools developed by Colossal might be instrumental in the pursuit to rewild a healthy northern white rhino population.\r\n“We want to save a keystone species, which played a very crucial role in a complex ecosystem in Central Africa.”', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `campaignfollow`
--

CREATE TABLE `campaignfollow` (
  `id` int(11) NOT NULL,
  `campaignid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `podcast`
--

CREATE TABLE `podcast` (
  `podcastid` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `topic` varchar(50) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `trending` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `podcast`
--

INSERT INTO `podcast` (`podcastid`, `name`, `description`, `creator`, `topic`, `duration`, `trending`) VALUES
(1, '6 mass extinctions in 440 Million Years', 'Whether you\'re a seasoned vintage lover or just starting out, we hope you\'ll join us for this journey through time. We\'re here to show you that vintage isn\'t just about the past.', 2, 'Extintion', 4, NULL),
(2, 'Last 2 northern white rhinos left on Earth', 'Scientists are teaming up with a company known for attempting to resurrect the woolly mammoth. But can “de-extinction” technology really save living rhinos - and is it worth it?', 3, 'Natural resource', 9, 1),
(3, 'The Sustainable Plate: Food for Thought', 'The Sustainable Plate delves into sustainable food choices and their impact on the environment. Listen to discussions about sustainable agriculture, ethical eating, and reducing food waste.', 4, 'Food', 15, 1),
(4, 'Wildlife Chronicles: Nature\'s Untold Stories', 'Listen to Wildlife Chronicles as we uncover the fascinating stories of animals, ecosystems, and conservation efforts worldwide. Explore the beauty and diversity of our natural world.', 5, 'Animal', 10, 0),
(5, 'PlanetProtectors: Guardians of the Earth', 'PlanetProtectors is your guide to understanding and taking action on pressing environmental issues. Dive into informative discussions and interviews with experts', 4, 'Earth', 15, 1),
(6, 'Ocean Odyssey: Beneath the Surface', 'Dive into the mysteries of the deep blue with Ocean Odyssey. Explore marine life, ocean conservation, and the critical role our oceans play in the health of our planet.', 5, 'Occean', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `podcastfollow`
--

CREATE TABLE `podcastfollow` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `podcastid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `podcast_campain`
--

CREATE TABLE `podcast_campain` (
  `id` int(11) NOT NULL,
  `podcastid` int(11) NOT NULL,
  `campainid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `podcast_user`
-- (See below for the actual view)
--
CREATE TABLE `podcast_user` (
`userid` int(11)
,`username` varchar(50)
,`fullName` varchar(50)
,`pass` varchar(50)
,`trending` int(11)
,`podcastid` int(11)
,`name` varchar(200)
,`description` text
,`creator` int(11)
,`topic` varchar(50)
,`duration` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `fullName` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `trending` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `fullName`, `pass`, `trending`) VALUES
(1, 'Lin', 'Hoàng Mai Thùy Linh', '123456', 1),
(2, 'HaF', 'Nguyễn Thu Hà', '123456', 0),
(3, 'Lyly', 'Ngô Khánh Ly', '123456', 0),
(4, 'Mai', 'Đỗ Lê Quỳnh Mai', '123456', 1),
(5, 'Taylor', 'Taylor Lautner', '123456', 1),
(6, 'Lisa', 'Lisa Simpson', '123456', 1),
(13, 'se', 'Selena Gomez', '123456', NULL),
(14, 'Hailey', 'Hailey Beiber', '123456', NULL),
(15, 'Hailey', 'Hailey Beiber', '123456', NULL),
(16, 'ha', 'Hailey Beiber', '123456', NULL),
(17, 'ddd', 'Selena Gomez', '123456', NULL),
(18, 'aaa', 'Hailey Beiber', '123456', NULL),
(19, 'aaaaa', 'Hoàng Mai Thùy Linh', '123456', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userfollow`
--

CREATE TABLE `userfollow` (
  `id` int(11) NOT NULL,
  `followed` int(11) NOT NULL,
  `following` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure for view `podcast_user`
--
DROP TABLE IF EXISTS `podcast_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `podcast_user`  AS SELECT `user`.`userid` AS `userid`, `user`.`username` AS `username`, `user`.`fullName` AS `fullName`, `user`.`pass` AS `pass`, `user`.`trending` AS `trending`, `podcastid` AS `podcastid`, `name` AS `name`, `description` AS `description`, `creator` AS `creator`, `topic` AS `topic`, `duration` AS `duration` FROM (`user` join `podcast`) WHERE `user`.`userid` = `creator` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`campaignid`);

--
-- Indexes for table `campaignfollow`
--
ALTER TABLE `campaignfollow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `podcast`
--
ALTER TABLE `podcast`
  ADD PRIMARY KEY (`podcastid`);

--
-- Indexes for table `podcastfollow`
--
ALTER TABLE `podcastfollow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `podcast_campain`
--
ALTER TABLE `podcast_campain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `userfollow`
--
ALTER TABLE `userfollow`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `campaignid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `campaignfollow`
--
ALTER TABLE `campaignfollow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `podcast`
--
ALTER TABLE `podcast`
  MODIFY `podcastid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `podcastfollow`
--
ALTER TABLE `podcastfollow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `podcast_campain`
--
ALTER TABLE `podcast_campain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `userfollow`
--
ALTER TABLE `userfollow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `campaign`
--
ALTER TABLE `campaign`
  ADD CONSTRAINT `campaign_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
