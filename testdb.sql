-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Час створення: Бер 17 2019 р., 10:48
-- Версія сервера: 10.1.38-MariaDB
-- Версія PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `testdb`
--

-- --------------------------------------------------------

--
-- Структура таблиці `rev`
--

CREATE TABLE `rev` (
  `rev_id` int(11) NOT NULL,
  `mail` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `text` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп даних таблиці `rev`
--

INSERT INTO `rev` (`rev_id`, `mail`, `name`, `text`, `rate`, `img`) VALUES
(2, 'bilanchuksemensemenovich@gmail.com', 'bilanchuk', 'sss', 4, 'images/photo_2017-05-23_20-18-50.jpg'),
(3, 'si@li.ua', 'semen', 'asdasd', 5, 'images/'),
(4, 'li@li.ru', 'Kristina', 'some text of', 3, 'images/Ð’Ñ‹Ð´ÐµÐ»ÐµÐ½Ð¸Ðµ_015.png'),
(5, 'si@lika.ua', 'Lika', 'asdasd', 3, 'images/'),
(6, 'bilanchuksemensemenovich@gmail.com', 'semen', 'Ñ„Ñ–Ð²Ñ„Ñ–Ð²Ñ„Ñ–Ð²', 3, 'images/'),
(8, 'bilanchuksemensemenovich@gmail.com', 'semen', 'Ñ„Ñ–Ð²Ñ„Ñ–Ð²Ñ„Ñ–Ð²', 3, 'images/'),
(9, 'bilanchuksemensemenovich@gmail.com', 'bilanchuk', 'asdasd', 4, 'images/Ð’Ñ‹Ð´ÐµÐ»ÐµÐ½Ð¸Ðµ_014.png'),
(10, 'bilanchuksemensemenovich@gmail.com', 'semen', 'adsasd', 1, 'images/'),
(11, 'bilanchuksemensemenovich@gmail.com', 'semen', 'asdasd', 4, 'images/'),
(12, 'bilanchuksemensemenovich@gmail.com', 'semen', 'asdgajsdgka', 5, 'images/Ð’Ñ‹Ð´ÐµÐ»ÐµÐ½Ð¸Ðµ_017.png'),
(13, 'bilanchuksemensemenovich@gmail.com', 'asd', 'asdasd', 1, 'images/');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `rev`
--
ALTER TABLE `rev`
  ADD PRIMARY KEY (`rev_id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `rev`
--
ALTER TABLE `rev`
  MODIFY `rev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
