-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-01-06 14:57:58
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
  `time` int(10) NOT NULL,
  `money` int(11) NOT NULL,
  `exp` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `food`
--

INSERT INTO `food` (`id`, `fname`, `foodpackage`, `time`, `money`, `exp`) VALUES
(1, '白麵包', 5, 30, 10, 2),
(2, '黑麵包', 16, 40, 20, 4),
(3, '黃麵包', 7, 50, 30, 6),
(4, '藍麵包', 23, 60, 40, 8),
(5, '橙麵包', 8, 70, 50, 10),
(6, '青麵包', 16, 80, 60, 20),
(7, '紅麵包', 25, 90, 70, 35);

-- --------------------------------------------------------

--
-- 資料表結構 `kitchen`
--

CREATE TABLE IF NOT EXISTS `kitchen` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `food_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `kitchen`
--

INSERT INTO `kitchen` (`id`, `user_id`, `food_id`, `amount`) VALUES
(1, 1, '白麵包', 11),
(2, 1, '黑麵包', 7),
(3, 2, '黃麵包', 10),
(4, 1, '紅麵包', 1),
(5, 1, '黃麵包', 3),
(6, 1, '橙麵包', 5);

-- --------------------------------------------------------

--
-- 資料表結構 `oven`
--

CREATE TABLE IF NOT EXISTS `oven` (
  `ovenid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `uoven` int(11) NOT NULL,
  `fname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcount` int(11) NOT NULL,
  `starttime` time NOT NULL,
  `finishtime` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `oven`
--

INSERT INTO `oven` (`ovenid`, `uid`, `uoven`, `fname`, `fcount`, `starttime`, `finishtime`, `status`) VALUES
(1, 1, 1, '', 0, '00:00:00', '00:00:00', 0),
(2, 1, 2, '', 0, '00:00:00', '00:00:00', 0),
(11, 8, 1, '', 0, '00:00:00', '00:00:00', 0),
(12, 8, 2, '', 0, '00:00:00', '00:00:00', 0),
(13, 8, 3, '', 0, '00:00:00', '00:00:00', 0),
(14, 8, 4, '', 0, '00:00:00', '00:00:00', 0),
(15, 1, 3, '', 0, '00:00:00', '00:00:00', 0),
(16, 1, 4, '', 0, '00:00:00', '00:00:00', 0),
(17, 9, 1, '', 0, '00:00:00', '00:00:00', 0),
(18, 9, 2, '', 0, '00:00:00', '00:00:00', 0),
(19, 10, 1, '', 0, '00:00:00', '00:00:00', 0),
(20, 10, 2, '', 0, '00:00:00', '00:00:00', 0),
(21, 11, 1, '', 0, '00:00:00', '00:00:00', 0),
(22, 11, 2, '', 0, '00:00:00', '00:00:00', 0),
(23, 9, 3, '', 0, '00:00:00', '00:00:00', 0),
(25, 9, 4, '', 0, '00:00:00', '00:00:00', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`id`, `account`, `password`, `playername`, `level`, `exp`, `foodpackage`, `money`, `oven`) VALUES
(1, 'hi', '123', 'hiiii', 15, 118, 359, 300, 4),
(8, '123', '123', '123', 14, 0, 5, 8000, 4),
(9, '111', '111', '111', 14, 0, 5, 1000, 4),
(10, '222', '222', '222', 1, 0, 5, 0, 2);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `kitchen`
--
ALTER TABLE `kitchen`
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
-- 使用資料表 AUTO_INCREMENT `kitchen`
--
ALTER TABLE `kitchen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- 使用資料表 AUTO_INCREMENT `oven`
--
ALTER TABLE `oven`
  MODIFY `ovenid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- 使用資料表 AUTO_INCREMENT `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
