-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 05 月 18 日 21:42
-- 伺服器版本: 10.1.32-MariaDB
-- PHP 版本： 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `60lan`
--

-- --------------------------------------------------------

--
-- 資料表結構 `會員`
--

CREATE TABLE `會員` (
  `帳號` varchar(15) NOT NULL,
  `密碼` varchar(6) DEFAULT NULL,
  `地址` varchar(30) DEFAULT NULL,
  `電話` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `會員`
--

INSERT INTO `會員` (`帳號`, `密碼`, `地址`, `電話`) VALUES
('alex123', '123123', '貧民窟三號', '0939393939'),
('wayne870811', '111', '青田街一號', '0987813977'),
('wayne870812', 'qwed', '台北市天龍國二號', '0988888888'),
('wayne870813', '789', '重慶南路一段122號', '0888888888');

-- --------------------------------------------------------

--
-- 資料表結構 `菜單`
--

CREATE TABLE `菜單` (
  `品項編號` int(11) NOT NULL,
  `品項名稱` varchar(10) NOT NULL,
  `單價` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `菜單`
--

INSERT INTO `菜單` (`品項編號`, `品項名稱`, `單價`) VALUES
(1, '阿薩姆紅茶', 30),
(2, '茉莉綠茶', 30),
(3, '四季春青茶', 25),
(4, '黃金烏龍', 40),
(5, '嚴選奶茶', 35),
(6, '檸檬綠茶', 40),
(7, '多多綠茶', 40),
(8, '冰淇淋紅茶', 45),
(9, '波霸奶茶', 40),
(10, '紅茶瑪奇朵', 45),
(11, '阿華田', 50),
(12, '紅茶拿鐵', 55),
(13, '抹茶拿鐵', 45);

-- --------------------------------------------------------

--
-- 資料表結構 `訂單`
--

CREATE TABLE `訂單` (
  `訂單編號` int(11) NOT NULL,
  `帳號` varchar(15) NOT NULL,
  `訂單時間` datetime NOT NULL,
  `總金額` int(11) NOT NULL,
  `電話` varchar(10) NOT NULL,
  `地址` varchar(30) NOT NULL,
  `已送達` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `訂單`
--

INSERT INTO `訂單` (`訂單編號`, `帳號`, `訂單時間`, `總金額`, `電話`, `地址`, `已送達`) VALUES
(1, 'wayne870811', '2018-05-26 16:03:10', 1430, '0912345678', '貧民窟一號', 0),
(2, 'wayne870812', '2018-05-26 16:04:14', 2430, '0888888888', '大同大學814', 1),
(3, 'alex123', '2018-05-30 00:49:06', 2215, '0939393939', '貧民窟87號', 1),
(4, 'wayne870811', '2018-05-30 00:52:18', 470, '0981873977', '青田街二號', 0),
(5, 'wayne870812', '2018-05-30 21:37:03', 430, '0888888888', '貧民窟三號', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `訂單詳細記錄`
--

CREATE TABLE `訂單詳細記錄` (
  `紀錄編號` int(11) NOT NULL,
  `訂單編號` int(11) NOT NULL,
  `品項編號` int(11) NOT NULL,
  `數量` int(11) NOT NULL,
  `小計` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `訂單詳細記錄`
--

INSERT INTO `訂單詳細記錄` (`紀錄編號`, `訂單編號`, `品項編號`, `數量`, `小計`) VALUES
(1, 1, 1, 10, 300),
(2, 1, 4, 8, 320),
(3, 1, 6, 13, 520),
(4, 1, 8, 2, 90),
(5, 1, 11, 4, 200),
(6, 2, 3, 40, 1000),
(7, 2, 6, 2, 80),
(8, 2, 8, 30, 1350),
(9, 3, 3, 87, 2175),
(10, 3, 9, 1, 40),
(11, 4, 6, 3, 120),
(12, 4, 11, 7, 350),
(13, 5, 3, 1, 25),
(14, 5, 6, 1, 40),
(15, 5, 7, 8, 320),
(16, 5, 8, 1, 45);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `會員`
--
ALTER TABLE `會員`
  ADD PRIMARY KEY (`帳號`);

--
-- 資料表索引 `菜單`
--
ALTER TABLE `菜單`
  ADD PRIMARY KEY (`品項編號`),
  ADD KEY `品項編號` (`品項編號`);

--
-- 資料表索引 `訂單`
--
ALTER TABLE `訂單`
  ADD PRIMARY KEY (`訂單編號`),
  ADD KEY `帳號` (`帳號`);

--
-- 資料表索引 `訂單詳細記錄`
--
ALTER TABLE `訂單詳細記錄`
  ADD PRIMARY KEY (`紀錄編號`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `菜單`
--
ALTER TABLE `菜單`
  MODIFY `品項編號` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表 AUTO_INCREMENT `訂單`
--
ALTER TABLE `訂單`
  MODIFY `訂單編號` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表 AUTO_INCREMENT `訂單詳細記錄`
--
ALTER TABLE `訂單詳細記錄`
  MODIFY `紀錄編號` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
