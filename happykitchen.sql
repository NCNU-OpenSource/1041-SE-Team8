-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-01-04 13:55:05
-- 伺服器版本: 5.6.26
-- PHP 版本： 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `happykitchen`
--

-- --------------------------------------------------------

--
-- 資料表結構 `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `id` int(20) NOT NULL,
  `fname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foodpackage` int(10) DEFAULT '0',
  `time` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `food`
--

INSERT INTO `food` (`id`, `fname`, `foodpackage`, `time`) VALUES
(1, '白麵包', 5, 30),
(2, '黑麵包', 16, 40),
(3, '黃麵包', 7, 50),
(4, '黑麵包', 23, 60),
(5, '橙麵包', 8, 70),
(6, '青麵包', 16, 80),
(7, '紅麵包', 25, 90);

-- --------------------------------------------------------

--
-- 資料表結構 `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `id` int(20) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `material`
--

INSERT INTO `material` (`id`, `name`) VALUES
(1, '蘋果'),
(2, '香蕉'),
(3, '草莓'),
(4, '巧克力');

-- --------------------------------------------------------

--
-- 資料表結構 `oven`
--

CREATE TABLE IF NOT EXISTS `oven` (
  `ovenid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `foodname` varchar(20) NOT NULL,
  `starttime` time NOT NULL DEFAULT '00:00:00',
  `finishtime` time NOT NULL DEFAULT '00:00:00',
  `state` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `oven`
--

INSERT INTO `oven` (`ovenid`, `uid`, `foodname`, `starttime`, `finishtime`, `state`) VALUES
(1, 1, '', '00:00:00', '00:00:00', 0),
(2, 1, '', '00:00:00', '00:00:00', 0),
(11, 8, '', '00:00:00', '00:00:00', 0),
(12, 8, '', '00:00:00', '00:00:00', 0),
(13, 8, '', '00:00:00', '00:00:00', 0),
(14, 8, '', '00:00:00', '00:00:00', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(11) NOT NULL,
  `name` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `shop`
--

INSERT INTO `shop` (`id`, `name`, `price`) VALUES
(1, '材料包', 100),
(2, '烤爐', 1000);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(20) NOT NULL,
  `account` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `playername` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `exp` int(11) NOT NULL DEFAULT '0',
  `foodpackage` int(10) NOT NULL DEFAULT '0',
  `money` int(11) DEFAULT '0',
  `oven` int(11) DEFAULT '2'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`id`, `account`, `password`, `playername`, `level`, `exp`, `foodpackage`, `money`, `oven`) VALUES
(1, 'hi', '123', 'hiiii', 14, 0, 5, 7300, 4),
(8, '123', '123', '123', 14, 0, 5, 8000, 4);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `oven`
--
ALTER TABLE `oven`
  ADD PRIMARY KEY (`ovenid`);

--
-- 資料表索引 `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `food`
--
ALTER TABLE `food`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- 使用資料表 AUTO_INCREMENT `material`
--
ALTER TABLE `material`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- 使用資料表 AUTO_INCREMENT `oven`
--
ALTER TABLE `oven`
  MODIFY `ovenid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- 使用資料表 AUTO_INCREMENT `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
