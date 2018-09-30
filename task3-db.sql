-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 21 2018 г., 13:15
-- Версия сервера: 5.6.37
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `task3-db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Category`
--

CREATE TABLE `Category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Category`
--

INSERT INTO `Category` (`id`, `name`, `status`) VALUES
(1, 'tes', 0),
(2, 'test', 1),
(3, 'bal', 1),
(4, 'kaka', 0),
(5, 'category', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Post`
--

CREATE TABLE `Post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Post`
--

INSERT INTO `Post` (`id`, `user_id`, `content`, `status`, `created_at`, `update_at`, `category_id`) VALUES
(1, 1, '1', 1, '2018-09-21 06:52:43', '0000-00-00 00:00:00', 1),
(2, 1, '321', 1, '2018-09-21 06:52:52', '0000-00-00 00:00:00', 1),
(3, 1, '32131312', 1, '2018-09-21 06:52:54', '0000-00-00 00:00:00', 1),
(4, 1, '3123142352', 1, '2018-09-21 06:52:55', '0000-00-00 00:00:00', 1),
(5, 1, '213463 gh fhg', 1, '2018-09-21 06:52:58', '0000-00-00 00:00:00', 1),
(6, 1, 'fdsfsdaadsf', 1, '2018-09-21 06:52:59', '0000-00-00 00:00:00', 1),
(7, 1, 'asdfsafs', 1, '2018-09-21 06:53:00', '0000-00-00 00:00:00', 1),
(8, 1, 'safgdsfghfs', 1, '2018-09-21 06:53:02', '0000-00-00 00:00:00', 1),
(9, 2, 'dsadada', 1, '2018-09-21 06:53:10', '0000-00-00 00:00:00', 1),
(10, 1, 'dsadada', 1, '2018-09-21 06:53:11', '0000-00-00 00:00:00', 1),
(11, 1, '11', 1, '2018-09-21 06:53:12', '0000-00-00 00:00:00', 1),
(12, 2, '32131', 1, '2018-09-21 06:53:16', '0000-00-00 00:00:00', 3),
(13, 3, 'dsadsada', 1, '2018-09-21 06:53:20', '0000-00-00 00:00:00', 4),
(14, 5, 'das', 1, '2018-09-21 06:53:23', '0000-00-00 00:00:00', 1),
(15, 1, 'dsadadagf', 1, '2018-09-21 06:53:26', '0000-00-00 00:00:00', 2),
(16, 1, '3213142', 1, '2018-09-21 06:53:30', '0000-00-00 00:00:00', 3),
(17, 1, ' 23 4gxn f', 1, '2018-09-21 06:53:33', '0000-00-00 00:00:00', 4),
(18, 1, 'dsa sfgdx ', 1, '2018-09-21 06:53:36', '0000-00-00 00:00:00', 5),
(19, 19, 'dsf gdfh dgf', 1, '2018-09-21 06:53:51', '0000-00-00 00:00:00', 3),
(20, 1, 'dsgdsgdsgfd', 1, '2018-09-21 06:53:54', '0000-00-00 00:00:00', 2),
(21, 1, 'afsafaf', 1, '2018-09-21 06:53:56', '0000-00-00 00:00:00', 4),
(22, 2, 'sadfsafassf', 1, '2018-09-21 06:53:59', '0000-00-00 00:00:00', 1),
(23, 2, 'dfsafsafdsaf', 1, '2018-09-21 06:54:02', '0000-00-00 00:00:00', 2),
(24, 2, 'dfs dafg43 435', 1, '2018-09-21 06:54:09', '0000-00-00 00:00:00', 3),
(25, 2, 'dsada dsagf ', 1, '2018-09-21 06:54:15', '0000-00-00 00:00:00', 4),
(26, 2, ' 43 gghf dj dghxc ', 1, '2018-09-21 06:54:20', '0000-00-00 00:00:00', 5),
(27, 3, 'sad ', 1, '2018-09-21 06:54:24', '0000-00-00 00:00:00', 1),
(28, 3, '32 2342', 1, '2018-09-21 06:54:29', '0000-00-00 00:00:00', 2),
(29, 3, 'sa dfg df', 1, '2018-09-21 06:54:36', '0000-00-00 00:00:00', 3),
(30, 3, 'a sdas fsdg sd', 1, '2018-09-21 06:54:40', '0000-00-00 00:00:00', 4),
(31, 3, 'dgf dfshd fc', 1, '2018-09-21 06:54:44', '0000-00-00 00:00:00', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `User`
--

INSERT INTO `User` (`id`, `name`, `email`, `status`) VALUES
(1, 'Andrey', 'andrey@gm.com', 1),
(2, 'Andrey33', 'andrey4@gm.com', 1),
(3, 'dima', 'gaaas@g.s', 1),
(4, 'andton', 'da2@g.s', 1),
(5, 'testing', 'gaga@fa.ds', 1),
(6, 'teser', 'ga222ga@fa.ds', 1),
(7, 'bet', 'bet@s.sa', 1),
(8, 'gwet', 'ge@g.g', 1),
(10, 'mb', 'bm@d.d', 1),
(12, 'gdsf', 'dsa@a.a', 1),
(14, 'dur', 'deu@a.a', 1),
(19, 'dafa', 'dafw@f.h', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);
ALTER TABLE `Post` ADD FULLTEXT KEY `Text` (`content`);

--
-- Индексы таблицы `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Category`
--
ALTER TABLE `Category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `Post`
--
ALTER TABLE `Post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT для таблицы `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Post`
--
ALTER TABLE `Post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `Category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
