-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 15, 2022 at 04:24 AM
-- Server version: 10.3.36-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `komodofo_database`
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
(000047, 000055, 'PHP');

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
(000010, 'hii\r\n', '2022-10-14 21:05:05', 000055, 'jojo'),
(000011, 'no', '2022-10-14 21:07:35', 000055, 'johnthor'),
(000012, 'aaa', '2022-10-14 21:07:59', 000055, 'johnthor'),
(000013, 'as', '2022-10-14 21:08:02', 000055, 'johnthor'),
(000014, 'aaaa', '2022-10-14 21:13:40', 000055, 'johnthor');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `ID_Post` int(6) UNSIGNED ZEROFILL NOT NULL,
  `ID_User` int(6) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(000055, 'Does C better than Python?', 'What do you guys think?', NULL, NULL, 'PHP', '2022-10-15 04:01:48', 0x6b697373706e672d736c6565702d616c61726d2d636c6f636b732d6675746f6e2d6265642d6865616c74682d342d616d7071756f742d35626532333034616462383439372e323136353434363031353431353530313534383939322e706e67, 000002, 'naufalsyarif', 0);

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
(000002, 'M. Naufal', 'Syarif', 'naufalsyarif', '$2y$10$V.BdVNDvryFzS1LMf3wB1eTzb70w8O3MA20zkhzmo7oDxGwCXzqv6', 'naufal.syarif0809@gmail.com', 'oppy', 0x6b697373706e672d736c6565702d616c61726d2d636c6f636b732d6675746f6e2d6265642d6865616c74682d342d616d7071756f742d35626532333034616462383439372e323136353434363031353431353530313534383939322e706e67, 'kisspng-sleep-alarm-clocks-futon-bed-health-4-ampq', 'Admin', 'Safe'),
(000005, 'Akbar', 'Masadistya', 'akbarmasadistya', '$2y$10$tgWsXYb/39grhT1HL49aHu3v1HN3NYfDhONd/G2YDUBm9EixhLPza', 'akbar.masadistya@gmail.com', 'valorant', 0x6b697373706e672d736c6565702d616c61726d2d636c6f636b732d6675746f6e2d6265642d6865616c74682d342d616d7071756f742d35626532333034616462383439372e323136353434363031353431353530313534383939322e706e67, 'kisspng-sleep-alarm-clocks-futon-bed-health-4-ampq', 'User', 'Safe'),
(000011, 'Aloysius', 'Jonathan', 'jojo', '$2y$10$Tp5mYoJ4pG6LFbAJMZ7xROHHJPGqglaAywgxpNZIu7gF/pazi8ghO', 'aloysiusjonathan452@gmail.com', 'ps10', 0x507265794e65656473322e706e67, 'PreyNeeds2.png', 'Admin', 'Safe'),
(000016, 'John', 'Thor', 'johnthor', '$2y$10$XQs35un9/ACCeC6nbleRP.j1TrNWsLE2/oQv6Y.CNY80WPIIDKfC2', 'johnthor@gmail.com', 'ps5', 0x3538343563613763313034366162353433643235323338622e706e67, '5845ca7c1046ab543d25238b.png', 'User', 'Safe');

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
  MODIFY `ID_Category` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID_Comments` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `ID_Post` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
