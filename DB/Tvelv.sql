-- phpMyAdmin SQL Dump
-- version 4.4.15
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Час створення: Січ 12 2016 р., 15:37
-- Версія сервера: 5.5.45
-- Версія PHP: 5.4.44

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `Tvelv`
--

-- --------------------------------------------------------

--
-- Структура таблиці `Tvelv_6rWvDg2SPi24mdJ3_classes`
--

CREATE TABLE IF NOT EXISTS `Tvelv_6rWvDg2SPi24mdJ3_classes` (
  `Name` text COLLATE utf8_unicode_ci NOT NULL,
  `Teacher_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `Tvelv_6rWvDg2SPi24mdJ3_marks`
--

CREATE TABLE IF NOT EXISTS `Tvelv_6rWvDg2SPi24mdJ3_marks` (
  `Date` date NOT NULL,
  `Time` time DEFAULT NULL,
  `LastEdit` time NOT NULL,
  `Class` int(11) NOT NULL,
  `Student` text NOT NULL,
  `Teacher` text NOT NULL,
  `Mark` text NOT NULL,
  `Info` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `Tvelv_6rWvDg2SPi24mdJ3_marks`
--

INSERT INTO `Tvelv_6rWvDg2SPi24mdJ3_marks` (`Date`, `Time`, `LastEdit`, `Class`, `Student`, `Teacher`, `Mark`, `Info`) VALUES
('2015-11-04', '18:07:00', '00:00:00', 31, 'vikakozun', 'dersm', '7', 'ахахахахах'),
('2015-11-04', '18:07:00', '00:00:00', 31, 'da411d', 'dersm', '12', '-'),
('2015-11-04', '18:07:00', '00:00:00', 31, 'da411d', 'dersm', '12', ''),
('2015-11-04', '18:07:00', '00:00:00', 31, 'da411d', 'dersm', '12', ''),
('2015-11-04', '18:07:00', '00:00:00', 31, 'vikakozun', 'dersm', '1', 'rgersdgvs'),
('2015-11-09', '22:27:00', '00:00:00', 31, 'da411d', 'dersm', '5', ''),
('2015-11-09', '22:29:00', '00:00:00', 31, 'vikakozun', 'dersm', '11', ''),
('2015-11-09', '22:29:00', '00:00:00', 31, 'da411d', 'dersm', '10', 'Тру-ляля'),
('2015-11-23', '20:46:00', '00:00:00', 31, 'baba', 'dersm', '10', ''),
('2015-11-23', '20:46:00', '00:00:00', 31, 'petriv', 'dersm', '10', ''),
('2015-11-23', '20:46:00', '00:00:00', 31, 'petrova', 'dersm', '11', ''),
('2015-11-23', '20:46:00', '00:00:00', 31, 'da411d', 'dersm', '12', ''),
('2015-11-23', '20:46:00', '00:00:00', 31, 'vikakozun', 'dersm', '11', ''),
('2015-12-26', '17:38:00', '00:00:00', 31, 'petrova', 'dersm', '9', ''),
('2015-12-26', '17:38:00', '00:00:00', 31, 'baba', 'dersm', '8', '');

-- --------------------------------------------------------

--
-- Структура таблиці `Tvelv_6rWvDg2SPi24mdJ3_parents`
--

CREATE TABLE IF NOT EXISTS `Tvelv_6rWvDg2SPi24mdJ3_parents` (
  `Login` text NOT NULL,
  `Name` text NOT NULL,
  `SecondName` text NOT NULL,
  `Class` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `Tvelv_6rWvDg2SPi24mdJ3_parents`
--

INSERT INTO `Tvelv_6rWvDg2SPi24mdJ3_parents` (`Login`, `Name`, `SecondName`, `Class`) VALUES
('lena', 'Олена', 'Манжула', '31');

-- --------------------------------------------------------

--
-- Структура таблиці `Tvelv_6rWvDg2SPi24mdJ3_students`
--

CREATE TABLE IF NOT EXISTS `Tvelv_6rWvDg2SPi24mdJ3_students` (
  `Login` text COLLATE utf8_unicode_ci NOT NULL,
  `Name` text COLLATE utf8_unicode_ci NOT NULL,
  `SecondName` text COLLATE utf8_unicode_ci NOT NULL,
  `Class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `Tvelv_6rWvDg2SPi24mdJ3_students`
--

INSERT INTO `Tvelv_6rWvDg2SPi24mdJ3_students` (`Login`, `Name`, `SecondName`, `Class`) VALUES
('da411d', 'Давид', 'Манжула', 31),
('vikakozun', 'Віка', 'Козунь', 31),
('baba', 'Володя', 'Бабій', 31),
('petrova', 'Надія', 'Петрова', 31),
('petriv', 'Назар', 'Петрів', 31);

-- --------------------------------------------------------

--
-- Структура таблиці `Tvelv_6rWvDg2SPi24mdJ3_teachers`
--

CREATE TABLE IF NOT EXISTS `Tvelv_6rWvDg2SPi24mdJ3_teachers` (
  `Login` text COLLATE utf8_unicode_ci NOT NULL,
  `Name` text COLLATE utf8_unicode_ci NOT NULL,
  `SecondName` text COLLATE utf8_unicode_ci NOT NULL,
  `Class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `Tvelv_6rWvDg2SPi24mdJ3_teachers`
--

INSERT INTO `Tvelv_6rWvDg2SPi24mdJ3_teachers` (`Login`, `Name`, `SecondName`, `Class`) VALUES
('dersm', 'Сергій', 'Дерюга', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `Tvelv_6rWvDg2SPi24mdJ3_users`
--

CREATE TABLE IF NOT EXISTS `Tvelv_6rWvDg2SPi24mdJ3_users` (
  `Login` text COLLATE utf8_unicode_ci NOT NULL,
  `Password` text COLLATE utf8_unicode_ci NOT NULL,
  `Salt` text COLLATE utf8_unicode_ci NOT NULL,
  `Permission` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `Tvelv_6rWvDg2SPi24mdJ3_users`
--

INSERT INTO `Tvelv_6rWvDg2SPi24mdJ3_users` (`Login`, `Password`, `Salt`, `Permission`) VALUES
('da411d', 'wEDO0UTYzIG0OAjZlRGMmdzYwYzNlRTO3MmZxYGN5U2Y3M2MhNTZmNDNiVWY5gDN5YWY1cTNxMWYxYjZhNTZmNDNiVWY5gDN5QTM2YTNiVWY5gDNhNTZmNDNiVWY5gDN', '6454741d98d3f918d286cbad7db98de7', 'student'),
('vikakozun', 'yIGMlBDOyIGMlBDO4MDZ1QDM5EGMkVWY0MDN2MTNhRTZkRDM1UmY0YWZmZzNklTYiRDZwMDOzgzNidzY1UmY0YWZmZzNklTY4UzNxITMmZzNklTY1UmY0YWZmZzNklTY', '79024e2e29770e902fa7b40ae4b2d249', 'student'),
('dersm', 'idDMjhTNidDMjhTNkJmY1IWOxUDZiZDOkVmNhNTY5YTNkVmY4ITO0ADZhZDO2QDO1EmMhF2NmljM4ATY1gzN0kTMhZDO2QDO4ITO0ADZlNmY2czMmRDNhBjYxUDZiZDO', 'f6058e06d7f58c440fcd98c11f57eb54', 'teacher'),
('lena', '3YzY0AzM3YzY0AzMjJWZxEGO3gzYhJzY3UTMjFWN5MjYkdTN1IWM3MzM3gzYhJzY', '89be9ab106b68c32f5de04cc75f4589d', 'parent'),
('baba', '2YTYkJGNwgjNiVWNhNGM0IzNhZmMiRGMmdTNmhTYhF2NxMTZzU2MiFTNmJmYxQjN5kTY2YTYmJmMmVGM5ITOiNzMmJmYxQjNzU2MiFTN5EjZ3ETYwYDM0YDNhZmMiRGM', '78a6ccb8113761e330c181d183a78480', 'student'),
('petrova', '2I2YjRjMlFzN5U2NjdTM5QWOhNWNygzMxkjNxgjZxYmNmNWZxMWOxYWN5MTN2YWN', 'e49db0c4e8f68f1afb10b7cc5c0e2440', 'student'),
('petriv', 'kJWOiJjZwcTNiJjM1EWZmhDMxkjNiNGO5YTY0YjN2ITNhNDZhZDNxADZwQmZhRDZ', 'e06749e4860fa96b32c4b59c54b5ccb2', 'student');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
