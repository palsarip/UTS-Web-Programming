-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2022 at 08:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID_Category` int(6) UNSIGNED ZEROFILL NOT NULL,
  `ID_Post` int(6) UNSIGNED ZEROFILL NOT NULL,
  `Category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID_Category`, `ID_Post`, `Category`) VALUES
(000012, 000020, 'PHP'),
(000015, 000023, 'PHP'),
(000016, 000024, 'Choose a category'),
(000017, 000025, 'Choose a category');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID_Comments` int(6) UNSIGNED ZEROFILL NOT NULL,
  `Comment` varchar(150) NOT NULL,
  `Date` datetime NOT NULL,
  `ID_Post` int(6) UNSIGNED ZEROFILL NOT NULL,
  `Username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID_Comments`, `Comment`, `Date`, `ID_Post`, `Username`) VALUES
(000003, 'ini edu', '2022-10-14 12:47:54', 000021, 'akbarmasadistya'),
(000004, 'emang kyk monyet diaman', '2022-10-14 04:17:06', 000021, 'naufalsyarif'),
(000005, 'tes', '2022-10-14 05:02:26', 000021, 'naufalsyarif'),
(000006, '123123123', '2022-10-14 19:09:02', 000021, 'akbarmasadistya');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `ID_Post` int(6) UNSIGNED ZEROFILL NOT NULL,
  `ID_User` int(6) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`ID_Post`, `ID_User`) VALUES
(000021, 000002);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `ID_Post` int(6) UNSIGNED ZEROFILL NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Picture` blob DEFAULT NULL,
  `Filename` varchar(50) DEFAULT NULL,
  `Category` varchar(20) NOT NULL,
  `Created_At` datetime NOT NULL DEFAULT current_timestamp(),
  `Creator_Picture` blob DEFAULT NULL,
  `Creator_ID` int(6) UNSIGNED ZEROFILL NOT NULL,
  `Creator_Username` varchar(20) NOT NULL,
  `Likes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`ID_Post`, `Title`, `Description`, `Picture`, `Filename`, `Category`, `Created_At`, `Creator_Picture`, `Creator_ID`, `Creator_Username`, `Likes`) VALUES
(000020, 'What does the fox say?', 'jadi gini mas', NULL, NULL, 'PHP', '2022-10-13 19:09:04', NULL, 000002, 'naufalsyarif', 0),
(000021, 'akbar kyk monyet', '123', NULL, NULL, 'Python', '2022-10-14 01:27:04', NULL, 000002, 'naufalsyarif', 0),
(000023, 'tes', 'tes123', NULL, NULL, 'PHP', '2022-10-14 16:23:04', NULL, 000002, 'naufalsyarif', 0),
(000024, 'tes', '123', NULL, NULL, 'Choose a category', '2022-10-14 16:27:33', 0x494d472d32303232313030382d5741303333322e6a7067, 000002, 'naufalsyarif', 0),
(000025, 'CCCCCCCCCCCCCCCCCCCCCCCCCCCCCC', 'CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC', NULL, NULL, 'Choose a category', '2022-10-14 23:48:59', 0x494d472d32303232313030382d5741303333322e6a7067, 000002, 'naufalsyarif', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_User` int(6) UNSIGNED ZEROFILL NOT NULL,
  `First_Name` varchar(10) NOT NULL,
  `Last_Name` varchar(10) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` char(60) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `User_Key` varchar(20) NOT NULL,
  `Picture` blob DEFAULT NULL,
  `Filename` varchar(50) DEFAULT NULL,
  `Role` varchar(10) NOT NULL,
  `Status` varchar(10) DEFAULT 'Safe'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_User`, `First_Name`, `Last_Name`, `Username`, `Password`, `Email`, `User_Key`, `Picture`, `Filename`, `Role`, `Status`) VALUES
(000002, 'M. Naufal', 'Syarif', 'naufalsyarif', '$2y$10$Rv4wQH8jhW32pHUMyIVWh.EFyykVy8Gb0xkLQP5zYTdYNI8kWiFC.', 'naufal.syarif0809@gmail.com', 'oppy', 0x6b697373706e672d736c6565702d616c61726d2d636c6f636b732d6675746f6e2d6265642d6865616c74682d342d616d7071756f742d35626532333034616462383439372e323136353434363031353431353530313534383939322e706e67, 'kisspng-sleep-alarm-clocks-futon-bed-health-4-ampq', 'Admin', 'Safe'),
(000005, 'Akbar', 'Masadistya', 'akbarmasadistya', '$2y$10$tgWsXYb/39grhT1HL49aHu3v1HN3NYfDhONd/G2YDUBm9EixhLPza', 'akbar.masadistya@gmail.com', 'valorant', 0x6b697373706e672d736c6565702d616c61726d2d636c6f636b732d6675746f6e2d6265642d6865616c74682d342d616d7071756f742d35626532333034616462383439372e323136353434363031353431353530313534383939322e706e67, 'kisspng-sleep-alarm-clocks-futon-bed-health-4-ampq', 'User', 'Safe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID_Category`),
  ADD KEY `ID_Post` (`ID_Post`),
  ADD KEY `Category_Post_Name` (`Category`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID_Comments`),
  ADD KEY `Commented_On` (`ID_Post`),
  ADD KEY `Commented_By` (`Username`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD KEY `ID_Post` (`ID_Post`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID_Post`),
  ADD KEY `Category_Name` (`Category`),
  ADD KEY `Owner_ID` (`Creator_ID`),
  ADD KEY `Owner_Username` (`Creator_Username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID_Category` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID_Comments` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `ID_Post` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `Category_Post_ID` FOREIGN KEY (`ID_Post`) REFERENCES `post` (`ID_Post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Category_Post_Name` FOREIGN KEY (`Category`) REFERENCES `post` (`Category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `Commented_By` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Commented_On` FOREIGN KEY (`ID_Post`) REFERENCES `post` (`ID_Post`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`ID_Post`) REFERENCES `post` (`ID_Post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `Owner_ID` FOREIGN KEY (`Creator_ID`) REFERENCES `user` (`ID_User`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Owner_Username` FOREIGN KEY (`Creator_Username`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
