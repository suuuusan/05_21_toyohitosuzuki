-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2020 年 6 月 20 日 10:52
-- サーバのバージョン： 10.4.13-MariaDB
-- PHP のバージョン: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `guestbook`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `message1`
--

CREATE TABLE `message1` (
  `m_id` int(12) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `m_mail` varchar(100) NOT NULL,
  `m_message` varchar(128) NOT NULL,
  `m_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `message1`
--

INSERT INTO `message1` (`m_id`, `m_name`, `m_mail`, `m_message`, `m_dt`) VALUES
(1, '佐藤', 'sato@mail.com', 'よろしく', '0000-00-00 00:00:00'),
(2, '田中', 'sato@mail.com', 'よろしく', '2020-06-20 00:00:00'),
(3, 'test太郎', '11111@kk', '解決？', '2020-06-20 17:46:04'),
(4, 'test二郎', '11111@mail', 'お腹すいた', '2020-06-20 17:49:50');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `message1`
--
ALTER TABLE `message1`
  ADD PRIMARY KEY (`m_id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `message1`
--
ALTER TABLE `message1`
  MODIFY `m_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
