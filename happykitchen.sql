-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-01-13 03:37:15
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `food`
--

INSERT INTO `food` (`id`, `fname`, `foodpackage`, `time`, `money`, `exp`) VALUES
(1, '白麵包', 1, 30, 15, 2),
(2, '黑麵包', 2, 40, 40, 4),
(3, '黃麵包', 3, 50, 65, 6),
(4, '藍麵包', 4, 60, 75, 8),
(5, '橙麵包', 5, 70, 95, 10),
(6, '青麵包', 6, 80, 110, 20),
(7, '紅麵包', 7, 90, 120, 35),
(8, '漢堡', 10, 60, 400, 90),
(9, '三文治', 15, 70, 350, 100),
(10, '熱狗', 18, 90, 450, 130);

-- --------------------------------------------------------

--
-- 資料表結構 `kitchen`
--

CREATE TABLE IF NOT EXISTS `kitchen` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `food_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `kitchen`
--

INSERT INTO `kitchen` (`id`, `user_id`, `food_id`, `amount`) VALUES
(1, 1, '白麵包', 1),
(2, 1, '黑麵包', 7),
(3, 2, '黃麵包', 10),
(4, 1, '紅麵包', 21),
(5, 1, '黃麵包', 4),
(6, 1, '橙麵包', 5),
(7, 13, '白麵包', 0),
(8, 13, '藍麵包', 0),
(9, 13, '橙麵包', 0),
(10, 13, '紅麵包', 0),
(11, 22, '白麵包', 0),
(12, 22, '藍麵包', 2),
(13, 22, '紅麵包', 0),
(14, 22, '青麵包', 0),
(15, 22, '熱狗', 0),
(16, 22, '三文治', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `oven`
--

INSERT INTO `oven` (`ovenid`, `uid`, `uoven`, `fname`, `fcount`, `starttime`, `finishtime`, `status`) VALUES
(1, 1, 1, '黃麵包', 1, '00:00:00', '00:00:00', 0),
(2, 1, 2, '', 0, '00:00:00', '00:00:00', 0),
(11, 8, 1, '', 0, '00:00:00', '00:00:00', 0),
(12, 8, 2, '', 0, '00:00:00', '00:00:00', 0),
(13, 8, 3, '', 0, '00:00:00', '00:00:00', 0),
(14, 8, 4, '', 0, '00:00:00', '00:00:00', 0),
(15, 1, 3, '白麵包', 1, '12:55:38', '05:56:08', 1),
(16, 1, 4, '白麵包', 1, '12:56:02', '05:56:32', 1),
(17, 9, 1, '', 0, '00:00:00', '00:00:00', 0),
(18, 9, 2, '', 0, '00:00:00', '00:00:00', 0),
(19, 10, 1, '', 0, '00:00:00', '00:00:00', 0),
(20, 10, 2, '', 0, '00:00:00', '00:00:00', 0),
(21, 11, 1, '白麵包', 1, '10:40:34', '10:41:04', 1),
(22, 11, 2, '', 0, '00:00:00', '00:00:00', 0),
(23, 9, 3, '', 0, '00:00:00', '00:00:00', 0),
(25, 9, 4, '', 0, '00:00:00', '00:00:00', 0),
(28, 12, 1, '白麵包', 1, '10:46:03', '10:46:33', 1),
(29, 12, 2, '', 0, '00:00:00', '00:00:00', 0),
(30, 13, 1, '', 0, '00:00:00', '00:00:00', 0),
(31, 13, 2, '', 0, '00:00:00', '00:00:00', 0),
(32, 14, 1, '', 0, '00:00:00', '00:00:00', 0),
(33, 14, 2, '', 0, '00:00:00', '00:00:00', 0),
(34, 15, 1, '', 0, '00:00:00', '00:00:00', 0),
(35, 15, 2, '', 0, '00:00:00', '00:00:00', 0),
(36, 16, 1, '', 0, '00:00:00', '00:00:00', 0),
(37, 16, 2, '', 0, '00:00:00', '00:00:00', 0),
(38, 17, 1, '', 0, '00:00:00', '00:00:00', 0),
(39, 17, 2, '', 0, '00:00:00', '00:00:00', 0),
(40, 18, 1, '', 0, '00:00:00', '00:00:00', 0),
(41, 18, 2, '', 0, '00:00:00', '00:00:00', 0),
(42, 19, 1, '', 0, '00:00:00', '00:00:00', 0),
(43, 19, 2, '', 0, '00:00:00', '00:00:00', 0),
(44, 20, 1, '', 0, '00:00:00', '00:00:00', 0),
(45, 20, 2, '', 0, '00:00:00', '00:00:00', 0),
(46, 21, 1, '', 0, '00:00:00', '00:00:00', 0),
(47, 21, 2, '', 0, '00:00:00', '00:00:00', 0),
(48, 21, 3, '', 0, '00:00:00', '00:00:00', 0),
(49, 22, 1, '白麵包', 1, '07:41:40', '07:42:10', 1),
(50, 22, 2, '黃麵包', 1, '07:51:28', '07:52:18', 1),
(51, 22, 3, '', 0, '00:00:00', '00:00:00', 0),
(52, 1, 5, '橙麵包', 1, '09:59:46', '10:00:56', 1);

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
(1, '材料包', 10),
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`id`, `account`, `password`, `playername`, `level`, `exp`, `foodpackage`, `money`, `oven`) VALUES
(1, 'hi', '123', 'hiiii', 28, 152, 155, 9000, 5),
(8, '123', '123', '123', 14, 0, 5, 8000, 4),
(9, '111', '111', '111', 14, 0, 5, 1000, 4),
(10, '222', '222', '222', 1, 0, 5, 0, 2),
(11, '333', '333', '333', 1, 0, 0, 0, 2),
(12, '444', '444', '444', 1, 0, 0, 0, 2),
(13, '5555', '555', '555', 7, 35, 0, 1030, 2),
(14, '888', '888', '888', 1, 0, 5, 0, 2),
(15, '999', '999', '999', 1, 0, 5, 0, 2),
(16, '000', '000', '000', 1, 0, 5, 0, 2),
(17, '1001', '1001', '1001', 1, 0, 5, 0, 2),
(18, 'asd', 'asd', 'asd', 1, 0, 5, 0, 2),
(19, 'ppp', 'ppp', 'ppp', 1, 0, 5, 0, 2),
(20, 'zzz', 'zzz', 'zzz', 1, 0, 5, 0, 2),
(21, 'xxx', 'xxx', 'xxx', 7, 0, 7, 480, 3),
(22, 'hello', '123', 'hello', 11, 116, 4, 1535, 3);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- 使用資料表 AUTO_INCREMENT `kitchen`
--
ALTER TABLE `kitchen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- 使用資料表 AUTO_INCREMENT `oven`
--
ALTER TABLE `oven`
  MODIFY `ovenid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- 使用資料表 AUTO_INCREMENT `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
