-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 13 2020 г., 03:23
-- Версия сервера: 10.1.38-MariaDB
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `football`
--

-- --------------------------------------------------------

--
-- Структура таблицы `game`
--

CREATE TABLE `game` (
  `id_game` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `place` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `score` text CHARACTER SET utf8 COLLATE utf8_bin,
  `fid_team` int(11) DEFAULT NULL,
  `fid_team2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `game`
--

INSERT INTO `game` (`id_game`, `date`, `place`, `score`, `fid_team`, `fid_team2`) VALUES
(1, '2020-03-28', 'Kharkiv', '1:1', 1, 2),
(2, '2020-03-30', 'Madrid', '0:0', 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `player`
--

CREATE TABLE `player` (
  `id_player` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fid_team` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `player`
--

INSERT INTO `player` (`id_player`, `name`, `fid_team`) VALUES
(1, 'KAKA', 1),
(2, 'KOKO', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `team`
--

CREATE TABLE `team` (
  `id_team` int(11) NOT NULL,
  `name_team` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `league` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coach` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `team`
--

INSERT INTO `team` (`id_team`, `name_team`, `league`, `coach`) VALUES
(1, 'Shakhtar', 'football', 'Vasiliy Coachev'),
(2, 'Metalist', 'football-volleyball', 'IGOR Coachev'),
(3, 'Liverpool', 'football', 'Semechkin'),
(4, 'football_club', 'football', 'Kto-to');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id_game`),
  ADD KEY `fid_team` (`fid_team`),
  ADD KEY `fid_team2` (`fid_team2`);

--
-- Индексы таблицы `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id_player`),
  ADD KEY `fid_team` (`fid_team`);

--
-- Индексы таблицы `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `game`
--
ALTER TABLE `game`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `player`
--
ALTER TABLE `player`
  MODIFY `id_player` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `team`
--
ALTER TABLE `team`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`fid_team`) REFERENCES `team` (`id_team`),
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`fid_team2`) REFERENCES `team` (`id_team`);

--
-- Ограничения внешнего ключа таблицы `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`fid_team`) REFERENCES `team` (`id_team`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
