-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Hoszt: 127.0.0.1
-- Létrehozás ideje: 2019. Sze 02. 12:58
-- Szerver verzió: 5.6.17
-- PHP verzió: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `insta`
--
CREATE DATABASE IF NOT EXISTS `insta` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `insta`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `follows`
--

CREATE TABLE IF NOT EXISTS `follows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `follower` int(11) NOT NULL,
  `followed` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `follower` (`follower`),
  KEY `followed by` (`followed`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='követések nyomon követése' AUTO_INCREMENT=39 ;

--
-- A tábla adatainak kiíratása `follows`
--

INSERT INTO `follows` (`id`, `follower`, `followed`) VALUES
(35, 1, 3),
(25, 1, 4),
(27, 3, 1),
(29, 14, 1),
(30, 15, 14),
(38, 1, 14),
(34, 16, 14);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL COMMENT 'user id',
  `img` char(100) COLLATE utf8_hungarian_ci NOT NULL COMMENT 'img neve',
  `imgdesc` char(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `uploaddate` datetime NOT NULL COMMENT 'feltöltés ideje',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='feltöltött képek' AUTO_INCREMENT=35 ;

--
-- A tábla adatainak kiíratása `images`
--

INSERT INTO `images` (`id`, `userid`, `img`, `imgdesc`, `uploaddate`) VALUES
(18, 3, '0C53A1DD-4F3F-4760-841B-35B594FDA02C.jpg', '', '2019-04-20 02:47:52'),
(19, 3, '0C81E1B8-DDDC-4D55-91CE-15159D078BA7.jpg', 'old, but gold!', '2019-04-20 02:48:28'),
(3, 1, 'FB_IMG_1543474727934.jpg', 'Patrik haverom az első kép az oldalon! haha', '2019-04-20 01:54:19'),
(17, 3, '1.jpg', 'owwww', '2019-04-20 02:46:58'),
(13, 1, 'képfeltöltés.jpg', 'Ha valakinek nem menne a képfeltöltés, itt egy kis példa! Jó gyakorlást! :)', '2019-04-20 02:29:25'),
(15, 3, 'jquery_ajax_kerelem.PNG', 'Simon után, én is megosztok egy kis segítséget! Query ajax alapja', '2019-04-20 02:39:01'),
(11, 1, 'M5QHWsp2vgZ-3QDZ4m-qS58lsOUgDNHau8trSFzS8H0.jpg', 'Ez egy tök jó ábra! Ajánlom mindenkinek az elemzését!', '2019-04-20 02:26:45'),
(16, 3, '4.jpg', 'Kis dagadék :333', '2019-04-20 02:40:51'),
(20, 3, '1D3FE68C-C3CB-4546-ADF9-CD10A28D1788.jpg', '', '2019-04-20 02:50:15'),
(21, 1, '0CC5C4B0-22BF-4E66-8261-6836C4674C3C.jpg', '', '2019-04-20 10:25:34'),
(22, 1, '0F645B6E-9DFD-4D6C-9A33-7F7A7A69CAA7.jpg', '', '2019-04-20 10:27:02'),
(23, 1, 'MySpotifyWrapped2018.jpg', '', '2019-04-20 10:59:32'),
(24, 4, '2DAD627B-0E4C-41A3-8018-57509C95777D.jpg', 'cica', '2019-04-20 17:33:46'),
(27, 12, '0BED9BDA-4D6B-4A82-B963-60ADF7152B78.jpg', 'hehe', '2019-04-20 21:25:03'),
(29, 13, '0D424960-3E3E-4876-8F14-F356879C302C.jpg', '', '2019-04-20 21:30:46'),
(30, 1, '1BA3C2AA-8C34-4F91-97C5-A20C076E4F21.jpg', '', '2019-04-23 10:26:14'),
(31, 14, '1A177826-3D76-4EF5-A018-33AEE94C08E8.jpg', 'haha', '2019-04-24 09:40:06'),
(32, 16, '20190126_010954.jpg', 'asdasd', '2019-04-28 11:35:36'),
(33, 1, '0-32.jpg', '', '2019-05-20 06:23:26'),
(34, 1, 'cicc.jpg', '', '2019-08-05 19:46:50');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) COLLATE utf8_hungarian_ci NOT NULL,
  `pwd` char(50) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=17 ;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `pwd`) VALUES
(1, 'Simon', '85136c79cbf9fe36bb9d05d0639c70c265c18d37'),
(2, 'asdasd', '85136c79cbf9fe36bb9d05d0639c70c265c18d37'),
(3, 'Béla', '85136c79cbf9fe36bb9d05d0639c70c265c18d37'),
(4, 'Judit', '85136c79cbf9fe36bb9d05d0639c70c265c18d37'),
(16, 'Test1', '85136c79cbf9fe36bb9d05d0639c70c265c18d37'),
(15, 'Gyuri', '2891baceeef1652ee698294da0e71ba78a2a4064'),
(14, 'Alex', '85136c79cbf9fe36bb9d05d0639c70c265c18d37'),
(13, 'Test2', '85136c79cbf9fe36bb9d05d0639c70c265c18d37'),
(12, 'Test', '85136c79cbf9fe36bb9d05d0639c70c265c18d37');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
