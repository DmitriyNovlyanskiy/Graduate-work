-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 18 2022 г., 12:47
-- Версия сервера: 10.6.7-MariaDB-log
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `social_passport`
--

-- --------------------------------------------------------

--
-- Структура таблицы `corpus`
--

CREATE TABLE `corpus` (
  `id` int(11) NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `corpus`
--

INSERT INTO `corpus` (`id`, `text`) VALUES
(1, 'Главный корпус'),
(2, 'Корпус на Булавина'),
(3, 'Корпус на Гоголя');

-- --------------------------------------------------------

--
-- Структура таблицы `expelled`
--

CREATE TABLE `expelled` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parents` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `age` date NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parent_phone_number` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `groop` int(11) NOT NULL,
  `social_groop` int(11) NOT NULL,
  `documents` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `social_scholarship` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `pass` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `nutrition` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `expelled`
--

INSERT INTO `expelled` (`id`, `name`, `parents`, `gender`, `age`, `phone_number`, `parent_phone_number`, `groop`, `social_groop`, `documents`, `social_scholarship`, `pass`, `nutrition`) VALUES
(1, 'Васёв Дмитрий Сергеевич', 'Васёв Сергей Сергеевич', 'М', '1905-06-29', '+7(999)286-51-58', '+7(999)628-93-37', 1, 4, 'Documents', NULL, 'on', 'on'),
(2, 'Дубовский Ярослав Романович', 'Дубовский Роман Романович', 'М', '1905-06-22', '+7(999)415-81-82', '+7(999)747-03-28', 7, 6, 'Documents', NULL, 'on', 'NULL'),
(3, 'Зернина Наталья Андреевна', 'Зернина Елена Андреевна', 'Ж', '1905-06-24', '+7(999)374-67-24', '+7(999)628-93-37', 7, 6, 'Documents', NULL, 'NULL', 'NULL');

-- --------------------------------------------------------

--
-- Структура таблицы `groops`
--

CREATE TABLE `groops` (
  `id` int(11) NOT NULL,
  `name_groop` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `groops`
--

INSERT INTO `groops` (`id`, `name_groop`) VALUES
(1, 'А-220'),
(2, 'А-319'),
(3, 'Б-121'),
(4, 'Б-220'),
(5, 'Б-319'),
(6, 'Б-418'),
(7, 'В-121'),
(8, 'В-220'),
(9, 'В-319'),
(10, 'В-418'),
(11, 'Д-121/1'),
(12, 'Д-121/2'),
(13, 'Д-121С'),
(14, 'Д-121/1-з'),
(15, 'Д-121/2-з'),
(16, 'Д-121/3-з'),
(17, 'Д-121/4-з'),
(18, 'Д-121/3'),
(19, 'Ж-121'),
(20, 'Ж-220'),
(21, 'Ж-319'),
(22, 'Ж-418'),
(23, 'И-121'),
(24, 'И-220'),
(25, 'И-319'),
(26, 'И-418'),
(27, 'М-121/1'),
(28, 'М-121/2'),
(29, 'М-121-з'),
(30, 'М-220/1'),
(31, 'М-220/2'),
(32, 'М-220-з'),
(33, 'М-319/1'),
(34, 'М-319/2'),
(35, 'М-319-з'),
(36, 'М-418/1'),
(37, 'М-418/2'),
(38, 'М-418-з'),
(39, 'О-121'),
(40, 'О-220'),
(41, 'О-319'),
(42, 'О-418'),
(43, 'С-121'),
(44, 'С-220'),
(45, 'С-319'),
(46, 'С-418'),
(47, 'Х-121'),
(48, 'Х-220'),
(49, 'Х-319'),
(50, 'Х-418');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `text`) VALUES
(1, 'Администратор'),
(2, 'Социальный педагог'),
(3, 'Руководитель службы педагогического и психологического сопровождения');

-- --------------------------------------------------------

--
-- Структура таблицы `social_groops`
--

CREATE TABLE `social_groops` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `social_groops`
--

INSERT INTO `social_groops` (`id`, `name`) VALUES
(1, 'Дети сироты старше 18 лет'),
(2, 'Дети сироты до 18 лет (росли в гос. учреждении)'),
(3, 'Дети сироты до 18 лет (живут с опекунами)'),
(4, 'Дети инвалиды до 18 лет (1 и 2 группа)'),
(5, 'Дети инвалиды до 18 лет (3 группа)'),
(6, 'Дети инвалиды с рождения старше 18 лет'),
(7, 'Дети с приобретенной инвалидностью старше 18 лет'),
(8, 'Группа риска (многодетные)'),
(9, 'Группа риска (неблагополучные семьи)'),
(10, 'Группа риска (состоят на учёте)');

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parents` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `age` date NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parent_phone_number` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `groop` int(11) NOT NULL,
  `social_groop` int(11) NOT NULL,
  `documents` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `corpus` int(11) NOT NULL,
  `social_scholarship` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `pass` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `nutrition` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id`, `name`, `parents`, `gender`, `age`, `phone_number`, `parent_phone_number`, `groop`, `social_groop`, `documents`, `corpus`, `social_scholarship`, `pass`, `nutrition`) VALUES
(1, 'Алонов Максим Алексеевич', 'Алонова Оксана Николаевна', 'М', '1905-06-26', '+7(999)663-34-62', '+7(999)129-04-39', 1, 6, 'Documents', 1, 'on', 'NULL', 'NULL'),
(3, 'Вишняков Михаил Михайлович', 'Вишняков Михаил Алексеевич', 'М', '1905-06-22', '+7(999)628-93-37', '+7(999)747-03-28', 7, 6, 'Documents', 3, 'NULL', 'on', 'NULL'),
(5, 'Дубровина Алина Викторовна', 'Дубровина Елена Викторовна', 'Ж', '1905-06-23', '+7(999)108-88-73', '+7(999)528-11-10', 1, 6, 'Documents', 1, 'on', 'NULL', 'NULL'),
(6, 'Звягин Артем Павлович', 'Звягин Павел Павлович', 'М', '1905-06-23', '+7(999)225-82-80', '+7(999)374-67-24', 31, 6, 'Documents', 2, 'NULL', 'on', 'on'),
(8, 'Исупова Наталия Андреевна', 'Исупова Жанна Андреевна', 'Ж', '1905-06-24', '+7(999)237-03-66', '+7(999)878-26-60', 32, 6, 'Documents', 2, 'NULL', 'NULL', 'on'),
(9, 'Крюкова Алиса Сергеевна', 'Крюкова Алиса Павловна', 'Ж', '1905-06-26', '+7(999)249-10-96', '+7(999)370-15-54', 7, 6, 'Documents', 3, 'NULL', 'on', 'NULL'),
(10, 'Кульшева Софья Андреевна', 'Кульшева Инга Андреевна', 'Ж', '1905-06-26', '+7(999)315-25-79', '+7(999)147-65-31', 34, 6, 'Documents', 2, 'NULL', 'on', 'NULL'),
(11, 'Лысов Александр Александрович', 'Лысов Александр Сергеевич', 'М', '1905-06-23', '+7(999)253-27-23', '+7(999)315-25-79', 34, 6, 'Documents', 2, 'NULL', 'on', 'NULL'),
(12, 'Нестерова Валерия Александровна', 'Нестерова Алина Александровна', 'Ж', '1905-06-23', '+7(999)253-27-23', '+7(999)654-67-29', 35, 6, 'Documents', 2, 'NULL', 'on', 'NULL'),
(13, 'Никитин Демид Сергеевич', 'Никитин Сергей Сергеевич', 'М', '1905-06-24', '+7(999)225-82-80', '+7(999)663-64-03', 35, 6, 'Documents', 2, 'on', 'NULL', 'NULL'),
(14, 'Оломпиева Надежда Вадимовна', 'Оломпиева Надежда Павловна', 'Ж', '1905-06-23', '+7(999)747-03-28', '+7(999)659-86-69', 35, 6, 'Documents', 2, 'on', 'on', 'on');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `corpus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `rol`, `corpus`) VALUES
(1, 'admin', '$2y$10$sUg1xZd6ac18RJ0WgrGkT.R4AqVpTa1Din4h3NWali5vYr81JL6.2', 'Сергеев Сергей Сергеевич', 1, 1),
(6, 'user3', '$2y$10$VfafKkrk9k70R67BpEjJ/eVpmfWVd4ztdBByG1zITYbC6uvEH7JVC', 'Сорокин Георгий Авксентьевич', 2, 2),
(7, 'user4', '$2y$10$TalVvrn8.A.xB5UXQcwIAON5lqFFm0xXZUG.n9jRu.wY6Rf3w2alW', 'Стрелков Модест Георгиевич', 2, 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `corpus`
--
ALTER TABLE `corpus`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `expelled`
--
ALTER TABLE `expelled`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `groops`
--
ALTER TABLE `groops`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `social_groops`
--
ALTER TABLE `social_groops`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_ibfk_1` (`groop`),
  ADD KEY `social_groop` (`social_groop`),
  ADD KEY `corpus` (`corpus`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`rol`),
  ADD KEY `corpus` (`corpus`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `corpus`
--
ALTER TABLE `corpus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `expelled`
--
ALTER TABLE `expelled`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `groops`
--
ALTER TABLE `groops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `social_groops`
--
ALTER TABLE `social_groops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`corpus`) REFERENCES `corpus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
