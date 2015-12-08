-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2015-12-08 13:59:12
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
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `food`
--

INSERT INTO `food` (`id`, `fname`, `description`) VALUES
(1, '蘋果派', '蘋果 1 香蕉 2 草莓 3 巧克力 4'),
(2, '布丁', '布 1 丁 2');

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
-- 資料表結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(20) NOT NULL,
  `account` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `playername` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `exp` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`id`, `account`, `password`, `playername`, `level`, `exp`) VALUES
(1, 'hi', '123', 'hiiii', 3, 22);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `material`
--
ALTER TABLE `material`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
