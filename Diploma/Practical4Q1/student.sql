-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-07-26 15:59:24
-- 服务器版本： 10.4.13-MariaDB
-- PHP 版本： 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `practical_3`
--

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE `student` (
  `StudentID` char(10) NOT NULL,
  `StudentName` varchar(30) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Program` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`StudentID`, `StudentName`, `Gender`, `Program`) VALUES
('12QWE12345', 'qweqwe', 'M', 'IT'),
('18QWE12345', 'qwe', 'F', 'IB'),
('19QWE12345', 'qwe', 'F', 'IA'),
('19QWE12567', 'qwe', 'F', 'IB'),
('20ABC00001', 'TAN ZIN WEI', 'M', 'IA'),
('20ABC00002', 'WONG LIN', 'F', 'IT'),
('20ABC00003', 'TEE WENG YONG', 'M', 'IB'),
('20ABC00004', 'TAN YANG LIN', 'F', 'IA'),
('20ABC00005', 'LIN SONG YIN', 'F', 'IT'),
('20ABC00006', 'LAU ZHEN WEI', 'M', 'IB'),
('22QWE12345', 'GG', 'F', 'IA'),
('23QWE12345', 'very gg', 'M', 'IA');

--
-- 转储表的索引
--

--
-- 表的索引 `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`),
  ADD UNIQUE KEY `StudentID` (`StudentID`),
  ADD KEY `StudentID_2` (`StudentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
