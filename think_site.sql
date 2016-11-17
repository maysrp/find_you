-- phpMyAdmin SQL Dump
-- version 4.4.15.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-11-18 01:30:48
-- 服务器版本： 5.5.48-log
-- PHP Version: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ip`
--

-- --------------------------------------------------------

--
-- 表的结构 `think_site`
--

CREATE TABLE IF NOT EXISTS `think_site` (
  `id` int(11) NOT NULL,
  `rd_ad` varchar(64) NOT NULL COMMENT '用户管理查看',
  `rd` varchar(64) NOT NULL COMMENT ' 被测试用户',
  `my_ip` varchar(64) NOT NULL,
  `my_ip_location` text CHARACTER SET utf8 NOT NULL,
  `img` varchar(254) NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `time` int(11) NOT NULL,
  `ip` varchar(64) NOT NULL,
  `location` text CHARACTER SET utf8 NOT NULL,
  `is_click` int(11) NOT NULL,
  `is_show` int(11) NOT NULL,
  `show_time` int(11) NOT NULL,
  `click_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `think_site`
--
ALTER TABLE `think_site`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `think_site`
--
ALTER TABLE `think_site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
