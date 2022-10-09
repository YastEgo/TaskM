-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 09 2022 г., 15:19
-- Версия сервера: 10.4.22-MariaDB
-- Версия PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `taskm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id_tasks` int(16) NOT NULL,
  `tasks_name` varchar(32) NOT NULL,
  `tasks_text` varchar(512) NOT NULL,
  `tasks_dateon` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `tasks_dateoff` datetime DEFAULT NULL,
  `tasks_id_userswho` int(16) NOT NULL,
  `tasks_id_userswhom` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id_tasks`, `tasks_name`, `tasks_text`, `tasks_dateon`, `tasks_dateoff`, `tasks_id_userswho`, `tasks_id_userswhom`) VALUES
(1, 'Измененная 1 запись', 'проверка вылмыовимчслт', '2022-10-08 14:31:50.051327', '2022-10-20 15:04:00', 3, 1),
(3, 'Вторя проверка даты', 'dfdfdfdfdfdf dfdfdf asxasd  dtwet wfcv xwqew vfv ascx   wqrrqw xcer vc', '2022-10-08 16:16:17.925075', '2022-10-13 00:00:00', 3, 3),
(5, '5 запись для проверки', 'пишу здесь задание ', '2022-10-09 12:23:17.018767', '2022-11-05 20:28:00', 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_users` int(16) NOT NULL,
  `users_mail` varchar(32) NOT NULL,
  `users_name` varchar(64) NOT NULL,
  `users_password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_users`, `users_mail`, `users_name`, `users_password`) VALUES
(1, 'email@email.ru', 'Егор', '1234'),
(3, 'mail@email.ru', 'Петя', '4321'),
(4, 'sobaka@mail.ru', 'Евгений', '1234'),
(5, 'petr@mail.ru', 'Владимир', '54321');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_tasks`),
  ADD KEY `tasks_id-userswhom` (`tasks_id_userswhom`),
  ADD KEY `tasks_id-userswho_2` (`tasks_id_userswho`),
  ADD KEY `tasks_id_userswho` (`tasks_id_userswho`) USING BTREE;

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_tasks` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`tasks_id_userswho`) REFERENCES `users` (`id_users`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`tasks_id_userswhom`) REFERENCES `users` (`id_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
