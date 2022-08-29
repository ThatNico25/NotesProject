-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 08:18 PM
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
-- Database: `projectnotesphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `loginform`
--

CREATE TABLE `loginform` (
  `ID` int(11) NOT NULL,
  `User` varchar(50) NOT NULL,
  `Pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginform`
--

INSERT INTO `loginform` (`ID`, `User`, `Pass`) VALUES
(1, 'admin', 'admin'),
(2, 'test', 'test'),
(3, 'nic', 'nic'),
(8, 'Admin15', '*0'),
(9, 'wdadasd', '*0'),
(10, '123', '*0');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `ID` int(11) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Description` longtext NOT NULL,
  `Author` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`ID`, `Title`, `Description`, `Author`) VALUES
(1, 'asdcccccc', 'sadfcccccccc', 'admin'),
(4, 'Hello!', 'test123', 'admin'),
(9, 'hi', 'yayayayaya', 'test'),
(10, '23423aa', '235435aa', 'admin'),
(19, 'Hiii!!', 'How are you?', 'admin'),
(25, 'sad', 'asdasdas', 'admin'),
(26, 'safsdfda', 'dsFsdfsd\r\ndsfsd', 'admin'),
(29, 'ggggggggg', 'asdasd', 'admin'),
(32, 'aasd', 'asddsa', 'Admin12'),
(33, 'sadsda', 'dsada', 'Admin12'),
(34, 'Hello!', 'How are you? \r\nGood, really good!\r\n:D\r\n', 'miko1'),
(36, 'zxczxczxceeeeeeeeeeeeeeeeeeee', 'xzc\r\ngsd\r\nff\r\ndsf\r\nfds\r\nf\r\nsewrewrewrewrew\r\ndf\r\nsd\r\nf\r\nsdwerewrewrewr\r\nf', 'miko1'),
(38, 'Note A', '// Account\r\n// Username : Miko1\r\n// Password : test\r\n// Account 2\r\n// Username : owo\r\n// Password : 123\r\n\r\n// TODO\r\n// - Fix BUG Space - Done\r\n// - Make it Secure! (Mostly Password) - DONE\r\n// - Try link notes and account table with SQL ONLY + Try out things in php\r\n// - Read Notes - Done\r\n// - Understand Session + READ PHP Book\r\n// - CSS\r\n// - Fix bug : F5 Make a copy of a note - Done', 'owo'),
(39, 'Hello!', 'sadasd\r\nsa\r\nf\r\nds\r\nf\r\nsd\r\nf', 'Miko11'),
(41, 'Holla, come come', 'Nothing here', 'Miko11'),
(42, 'vvvvvvvv', 'vvvvvvvvvvvvv', 'Miko11'),
(45, 'testc', ':D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n', 'miko1'),
(48, 'testc3e77', '\r\n:D\r\n:D\r\nqwewqe', 'miko1'),
(49, 'qweqwe', 'wqe', 'miko1'),
(50, 'wqewqee', 'qwewqe', 'miko1'),
(51, 'qweweq', 'qwewqe', 'miko1'),
(52, 'testce', ':D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n', 'miko1'),
(53, 'Hello!e', 'How are you? \r\nGood, really good!\r\n:D\r\n', 'miko1'),
(54, 'Hello!d', 'How are you? \r\nGood, really good!\r\n:D\r\n', 'miko1'),
(55, 'testcasdasd', ':D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n:D\r\n', 'miko1'),
(56, 'AAAAAAAAA123', 'AAAAAAAAAAA\r\nA\r\nAAAAAAAAAAA\r\nA\r\nAAAAAAAAAAA\r\nA\r\nAAAAAAAAAAA\r\nA\r\nAAAAAAAAAAA\r\nA\r\nAAAAAAAAAAA\r\nA\r\nAAAAAAAAAAA\r\nA123\r\n', 'testA'),
(57, 'FFFFFFFFFFF', 'VVVVVVVV\r\nV\r\nV', 'testA'),
(58, 'sasd', 'asdsadasd', 'testB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loginform`
--
ALTER TABLE `loginform`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loginform`
--
ALTER TABLE `loginform`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

