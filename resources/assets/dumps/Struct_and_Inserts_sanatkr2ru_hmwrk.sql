-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 29 2018 г., 18:02
-- Версия сервера: 5.6.33-79.0-log
-- Версия PHP: 5.6.34-pl0-gentoo

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sanatkr2ru_hmwrk`
--
CREATE DATABASE IF NOT EXISTS `sanatkr2ru_hmwrk` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sanatkr2ru_hmwrk`;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `homeworks_id` int(11) NOT NULL,
  `author` int(11) DEFAULT NULL,
  `body` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `disciplines`
--

DROP TABLE IF EXISTS `disciplines`;
CREATE TABLE `disciplines` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `disciplines`
--

INSERT INTO `disciplines` (`id`, `name`, `description`) VALUES
(1, 'Математика', 'С 1 по 8 классы'),
(2, 'Русский язык', 'Великий и могучий'),
(3, 'История', NULL),
(4, 'Физика', NULL),
(5, 'Английский', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `given_tasks`
--

DROP TABLE IF EXISTS `given_tasks`;
CREATE TABLE `given_tasks` (
  `id` int(11) NOT NULL,
  `homework_id` int(11) NOT NULL,
  `theme` tinytext,
  `task` text,
  `answer` text,
  `standard` text,
  `correct_flag` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `given_tasks`
--

INSERT INTO `given_tasks` (`id`, `homework_id`, `theme`, `task`, `answer`, `standard`, `correct_flag`, `created_at`, `updated_at`) VALUES
(1, 1, '1 класс', '2+2', '4', '4', 1, '2018-03-28 22:35:16', '2018-03-28 22:36:29');

-- --------------------------------------------------------

--
-- Структура таблицы `given_tests`
--

DROP TABLE IF EXISTS `given_tests`;
CREATE TABLE `given_tests` (
  `id` int(11) NOT NULL,
  `homework_id` int(11) NOT NULL,
  `theme` tinytext,
  `task` text,
  `option_a` tinytext,
  `option_b` tinytext,
  `option_c` tinytext,
  `option_d` tinytext,
  `answer` char(1) DEFAULT NULL,
  `standard` char(1) DEFAULT NULL,
  `correct_flag` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `grades`
--

DROP TABLE IF EXISTS `grades`;
CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `char` char(1) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `grades`
--

INSERT INTO `grades` (`id`, `num`, `char`, `description`) VALUES
(1, 1, 'А', NULL),
(2, 1, 'Б', NULL),
(3, 1, 'В', NULL),
(4, 2, 'А', NULL),
(5, 2, 'Б', NULL),
(6, 2, 'В', NULL),
(7, 3, 'А', NULL),
(8, 3, 'Б', NULL),
(9, 3, 'В', NULL),
(10, 9, 'Г', NULL),
(11, 11, 'А', NULL),
(12, 11, 'Б', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `homeworks`
--

DROP TABLE IF EXISTS `homeworks`;
CREATE TABLE `homeworks` (
  `id` int(11) NOT NULL,
  `schoolkid_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `work_id` int(11) DEFAULT NULL,
  `date_to_completion` date NOT NULL,
  `date_of_completion` date DEFAULT NULL,
  `computer_mark` int(11) DEFAULT NULL,
  `teacher_comment` text,
  `teacher_mark` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `homeworks`
--

INSERT INTO `homeworks` (`id`, `schoolkid_id`, `teacher_id`, `work_id`, `date_to_completion`, `date_of_completion`, `computer_mark`, `teacher_comment`, `teacher_mark`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2018-03-30', '2018-03-29', 100, 'Задача слишком простая', 85, '2018-03-28 22:35:16', '2018-03-28 22:38:18');

-- --------------------------------------------------------

--
-- Структура таблицы `materials`
--

DROP TABLE IF EXISTS `materials`;
CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `theme` tinytext,
  `image` text,
  `title` tinytext,
  `body` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `material_work`
--

DROP TABLE IF EXISTS `material_work`;
CREATE TABLE `material_work` (
  `work_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `schoolkids`
--

DROP TABLE IF EXISTS `schoolkids`;
CREATE TABLE `schoolkids` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `schoolkids`
--

INSERT INTO `schoolkids` (`id`, `user_id`, `grade_id`, `firstname`, `middlename`, `lastname`) VALUES
(1, 3, 1, 'Константин', NULL, 'Синицын'),
(2, 14, 2, 'Николай', 'Александрович', 'Абрамов'),
(3, 15, 2, 'Светлана', 'Евгеньевна', 'Савицкая'),
(4, 16, 2, 'Василий', 'Семёнович', 'Деревянко'),
(5, 17, 3, 'Анна', 'Ивановна', 'Масловская'),
(6, 18, 3, 'Владимир', 'Владимирович', 'Никишов'),
(7, 19, 4, 'Мария', 'Семёновна', 'Поливанова'),
(8, 20, 5, 'Василий', NULL, 'Терещенко'),
(9, 21, 5, 'Анвар', NULL, 'Гатауллин'),
(10, 22, 7, 'Любовь', 'Григорьевна', 'Шевцова'),
(11, 23, 7, 'Виктор', 'Поликарпович', 'Мишенин'),
(12, 24, 7, 'Александр', 'Иванович', 'Бабаев'),
(13, 25, 7, 'Борис', 'Андреевич', 'Алексеев'),
(14, 26, 7, 'Семён', 'Сергеевич', 'Жало'),
(15, 27, 8, 'Полина', 'Денисовна', 'Осипенко'),
(16, 28, 8, 'Иван', 'Алексеевич', 'Антипин'),
(17, 29, 10, 'Николай', 'Францевич', 'Гастелло'),
(18, 30, 10, 'Фёдор', 'Фёдорович', 'Симаков'),
(19, 31, 10, 'Мария', 'Захаровна', 'Щербаченко'),
(20, 32, 12, 'Раиса', 'Ермолаевна', 'Аронова'),
(21, 33, 12, 'Вера', NULL, 'Хоружая'),
(22, 34, 12, 'Газрет', 'Агаевич', 'Алиев'),
(23, 35, 12, 'Надежда', 'Викторовна', 'Троян'),
(24, 36, 11, 'Кужабай', NULL, 'Жазыков'),
(25, 37, 11, 'Георгий', 'Семёнович', 'Болтаев');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `theme` tinytext,
  `task` text,
  `answer` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `teacher_id`, `theme`, `task`, `answer`, `created_at`, `updated_at`) VALUES
(1, 1, '1 класс', '2+2', '4', '2018-03-28 22:31:17', '2018-03-28 22:31:17');

-- --------------------------------------------------------

--
-- Структура таблицы `task_work`
--

DROP TABLE IF EXISTS `task_work`;
CREATE TABLE `task_work` (
  `work_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task_work`
--

INSERT INTO `task_work` (`work_id`, `task_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `discipline_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `discipline_id`, `firstname`, `middlename`, `lastname`) VALUES
(1, 2, 1, 'Алексей', 'Михайлович', 'Романов'),
(2, 4, 1, 'Светлана', 'Андреевна', 'Маринина'),
(3, 5, 1, 'Альберт', 'Сергеевич', 'Власов'),
(4, 6, 2, 'Юрий', 'Петрович', 'Азовкин'),
(5, 7, 2, 'Анатолий', 'Васильевич', 'Филипченко'),
(6, 8, 3, 'Галина', 'Ивановна', 'Джунковская'),
(7, 9, 3, 'Наталья', 'Венедиктовна', 'Ковшова'),
(8, 10, 4, 'Степан', 'Кузьмич', 'Нестеров'),
(9, 11, 4, 'Михаил', 'Ильич', 'Синельников'),
(10, 12, 5, 'Наталья', 'Фёдоровна', 'Кравцова'),
(11, 13, 5, 'Степан', 'Андреевич', 'Чалов');

-- --------------------------------------------------------

--
-- Структура таблицы `tests`
--

DROP TABLE IF EXISTS `tests`;
CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `theme` tinytext,
  `task` text,
  `option_a` tinytext,
  `option_b` tinytext,
  `option_c` tinytext,
  `option_d` tinytext,
  `answer` char(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `test_work`
--

DROP TABLE IF EXISTS `test_work`;
CREATE TABLE `test_work` (
  `work_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` char(1) NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `role`, `login`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'a', 'admin', NULL, '$2y$10$99IMnyx88bQfmNiyqG7tteHNxc4TCHWzb9tZ.HpuUqS7RmtUra71K', 'VSe8Af75VkSPzo4oAiWGhz68Krm03u1U4gzOSYw988l8G6jmqoE5L4jiSTmo', NULL, NULL),
(2, 't', 'teach', NULL, '$2y$10$.q7giqrE.8K9QRIb5Ghr2e/Xl08DcVvyOcg1XeJQzTE95AZpIHLf.', 'Yr5gHTABHugUbREjaNCUZNlybo1Fx63Z4dIt6hnu4iUdBj83ze5Eq4mqFXTt', '2018-03-28 22:26:38', '2018-03-28 22:26:38'),
(3, 's', 'kid', NULL, '$2y$10$Z7zGd2mHp6x4mcFwgsBypuj3uvMpXW41/Itu.N/hV52hu6PClHyQe', 'hpGDtYgmqLKQC91aHO2cEMPyZNWMPUWJJpt8kCkuiO8mmLtCPvqJcKkfQvlU', '2018-03-28 22:34:24', '2018-03-28 22:34:24'),
(4, 't', 'teach1', NULL, '$2y$10$reI0MpP3kJgI8yYUAa2Q9.y0OtYm7Qm1yAmnAKx.UpfCUM/Nstqq2', NULL, '2018-03-29 10:29:10', '2018-03-29 10:29:10'),
(5, 't', 'teach2', NULL, '$2y$10$yM.nka9ianSte5GyeBzmY.Y0VClErlcTNWNnVPU7K2q5o50nHvqQy', NULL, '2018-03-29 10:30:29', '2018-03-29 10:30:29'),
(6, 't', 'teach3', NULL, '$2y$10$xWcYQ0NnxcVs21q0Ldln2OOBcNO8FqasjnA3rqBV0qLR7pI1/oEv2', NULL, '2018-03-29 10:58:59', '2018-03-29 10:58:59'),
(7, 't', 'teach4', NULL, '$2y$10$EsK9bw/I/FJ83X6mZjuK5eygs811qxBte4KZzH.DvFGvfyiQuD/zK', NULL, '2018-03-29 11:01:05', '2018-03-29 11:01:05'),
(8, 't', 'teach5', NULL, '$2y$10$Ld6Sp.0J1RB7nMVL2E.I9OCgMo19vlSvVCu9wL.n3/iCAHpsFxz9e', NULL, '2018-03-29 11:17:52', '2018-03-29 11:17:52'),
(9, 't', 'teach6', NULL, '$2y$10$uzi4gOpOIiYGgZ89EuHFLepYsRrtBFddrRydPNnY933dX8aj4Kyfa', NULL, '2018-03-29 11:18:41', '2018-03-29 11:18:41'),
(10, 't', 'teach7', NULL, '$2y$10$.mfndGxssAjd1NclagBQI.kac3idAUoxA25hFLJAgNAFkn/LEpqXm', NULL, '2018-03-29 11:20:16', '2018-03-29 11:20:16'),
(11, 't', 'teach8', NULL, '$2y$10$4vurz.0ZnLl5CCbQiK2b4uWXrwc7dMmoyBtPDXEBVxhffKmurpBdi', NULL, '2018-03-29 11:21:20', '2018-03-29 11:21:20'),
(12, 't', 'teach9', NULL, '$2y$10$6dV/GbfkP/dI/0tYXrS9/eftUbyA.5ksJ5MHuvUzXZj95PIwPThua', NULL, '2018-03-29 11:22:08', '2018-03-29 11:22:08'),
(13, 't', 'teach10', NULL, '$2y$10$Ue.kY//mbxX3daGaw8aRluFFRGikg5t/h61MPvRptdn9u3nGGeGAS', NULL, '2018-03-29 11:23:36', '2018-03-29 11:23:36'),
(14, 's', 'kid1', NULL, '$2y$10$couBRQnR0RJvT/j.fQnUduxwOYzgi97o8q8aBDG/deQ8XL89l5Qhq', NULL, '2018-03-29 11:29:33', '2018-03-29 11:29:33'),
(15, 's', 'kid2', NULL, '$2y$10$/zNn8e.C8YyVyDixHsCwZegz.CH5.e.EdWdaswpVRjJlvqZIUfPMm', NULL, '2018-03-29 11:30:25', '2018-03-29 11:30:25'),
(16, 's', 'kid3', NULL, '$2y$10$svvlrIuc5uQlpPZUoDVHFO9bH1phRH79LT6yfViUd6mbNujC9LeLe', NULL, '2018-03-29 11:36:25', '2018-03-29 11:36:25'),
(17, 's', 'kid4', NULL, '$2y$10$myrIP3Jg.pqymXhq68QJIevv/BwUsnvumOmz3Usmq35jjdOf64zWG', NULL, '2018-03-29 11:36:40', '2018-03-29 11:36:40'),
(18, 's', 'kid5', NULL, '$2y$10$Y4.zIM2LDIo1KjeO55XZlOfAB10IrvXhzfQ9QsxrtdPd4Jc9waKKW', NULL, '2018-03-29 11:36:56', '2018-03-29 11:36:56'),
(19, 's', 'kid6', NULL, '$2y$10$VCeUkQFwklFzhnjOSGlAw./BB2UOS.WXQyIysoCIuPBEkFL00T3oa', NULL, '2018-03-29 11:37:16', '2018-03-29 11:37:16'),
(20, 's', 'kid7', NULL, '$2y$10$aLScDacPIoKkPFog.NReRuDlfjOcNL.uMvxOfYs0q3Gq3k8XsAy2K', NULL, '2018-03-29 11:37:29', '2018-03-29 11:37:29'),
(21, 's', 'kid8', NULL, '$2y$10$mI73Dwmw2HF/eocIRnyrw.ruUF9UH4CfAu348sW1wT/7llUuPBDde', NULL, '2018-03-29 11:37:45', '2018-03-29 11:37:45'),
(22, 's', 'kid9', NULL, '$2y$10$vgGKKWyyyjiZmmOIQSUFJOqrTD9YX3SNzjPkISKv3q4MSjJ9Hvlw2', NULL, '2018-03-29 11:37:59', '2018-03-29 11:37:59'),
(23, 's', 'kid10', NULL, '$2y$10$onO0CtnYoz0qnj7/Q7we3OqTIcYZ8k3TfwBoq8PWYg75mwS1XUr.G', NULL, '2018-03-29 11:38:14', '2018-03-29 11:38:14'),
(24, 's', 'kid11', NULL, '$2y$10$q9xfOSr1NdqycdySGyx2BOhbu6ZuCuNaV1fvYTj6PKc3zgdVbJ1N.', NULL, '2018-03-29 11:38:29', '2018-03-29 11:38:29'),
(25, 's', 'kid12', NULL, '$2y$10$gix76vFyqAE5Z22CG.ByxujbcRHgK7yPaQU0i14hWkcL12YEm6Hji', NULL, '2018-03-29 11:38:47', '2018-03-29 11:38:47'),
(26, 's', 'kid13', NULL, '$2y$10$fv3H0/XgeiAgTEHs6juWk.s4LAbLo25IPok1Mnd2WSlJmB3bHWTPG', NULL, '2018-03-29 11:39:07', '2018-03-29 11:39:07'),
(27, 's', 'kid14', NULL, '$2y$10$p3McItIfA9egpQtGGLqEC.kvoCO7ipyGxSAVaW6yc6eisgMUu8P8C', NULL, '2018-03-29 11:39:24', '2018-03-29 11:39:24'),
(28, 's', 'kid15', NULL, '$2y$10$aIR79qmYo.Or2j7/7JuFJe.ozo5ERr0PU1ekFpuLC.9/KJ9E5krW.', NULL, '2018-03-29 11:42:48', '2018-03-29 11:42:48'),
(29, 's', 'kid16', NULL, '$2y$10$b7bA2wD39Nb8JpmEPbr1Ju2wkvfKFFSVB6zz4H93lXJjsMi/6grXu', NULL, '2018-03-29 11:43:01', '2018-03-29 11:43:01'),
(30, 's', 'kid17', NULL, '$2y$10$VhjmDGK2SuHThO3gDj7fqu7miyO98iGroj.o0EP6qPkV2.uhYEM1m', NULL, '2018-03-29 11:43:24', '2018-03-29 11:43:24'),
(31, 's', 'kid18', NULL, '$2y$10$yRrUJ54gI2lqpdXP3AqykOx4A0zknsbvzoY3xsAAMxn7GnyjPe9EK', NULL, '2018-03-29 11:43:38', '2018-03-29 11:43:38'),
(32, 's', 'kid24', NULL, '$2y$10$VGP8gR19uYQ.XLWCOn8LRuhfPV9BaLG32Tqrevop7T6fDiSFrGWsm', NULL, '2018-03-29 11:44:53', '2018-03-29 11:44:53'),
(33, 's', 'kid23', NULL, '$2y$10$IrTAlOVgDnW5GHgNOLGI2.106hgNgno3PFfP.7T51qFOcblz2oJdO', NULL, '2018-03-29 11:45:09', '2018-03-29 11:45:09'),
(34, 's', 'kid22', NULL, '$2y$10$DXz0nI5b4xWZTOH6aOMeCOMFWfqSWPejNaYasdRHM8u5fn/iT0Heu', NULL, '2018-03-29 11:45:22', '2018-03-29 11:45:22'),
(35, 's', 'kid21', NULL, '$2y$10$4xAwYIReK/DtbYdvuwmPEef380GDrcE6lxRskotTLulC4f/9hCaCG', NULL, '2018-03-29 11:45:41', '2018-03-29 11:45:41'),
(36, 's', 'kid20', NULL, '$2y$10$aZf/RXoDPbeStHa3GepQxeCeaYyi5saAL5.0LvbHgjIyJdU4TuFcG', NULL, '2018-03-29 11:45:56', '2018-03-29 11:45:56'),
(37, 's', 'kid19', NULL, '$2y$10$Cn0NNyrPORoCLqMtLEzH4ueypNXLHaijN1PjHTeCCN.caLWBZ11kW', NULL, '2018-03-29 11:46:36', '2018-03-29 11:46:36');

-- --------------------------------------------------------

--
-- Структура таблицы `works`
--

DROP TABLE IF EXISTS `works`;
CREATE TABLE `works` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `theme` tinytext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `works`
--

INSERT INTO `works` (`id`, `teacher_id`, `theme`, `created_at`, `updated_at`) VALUES
(1, 1, 'Первая работа', '2018-03-28 22:28:52', '2018-03-28 22:28:52');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_homeworks1_idx` (`homeworks_id`);

--
-- Индексы таблицы `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD KEY `poskey` (`name`);

--
-- Индексы таблицы `given_tasks`
--
ALTER TABLE `given_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_given_tasks_homeworks1_idx` (`homework_id`);

--
-- Индексы таблицы `given_tests`
--
ALTER TABLE `given_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_given_tests_homeworks1_idx` (`homework_id`);

--
-- Индексы таблицы `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grade_UNIQUE` (`num`,`char`);

--
-- Индексы таблицы `homeworks`
--
ALTER TABLE `homeworks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_homeworks_works1_idx` (`work_id`),
  ADD KEY `fk_homeworks_schoolkids1_idx` (`schoolkid_id`),
  ADD KEY `date_to_completition` (`date_to_completion`),
  ADD KEY `fk_homeworks_teachers1_idx` (`teacher_id`);

--
-- Индексы таблицы `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_study_materials_teachers1_idx` (`teacher_id`);

--
-- Индексы таблицы `material_work`
--
ALTER TABLE `material_work`
  ADD PRIMARY KEY (`work_id`,`material_id`),
  ADD KEY `fk_blocks_of_materials_study_materials1_idx` (`material_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Индексы таблицы `schoolkids`
--
ALTER TABLE `schoolkids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poskey` (`firstname`,`lastname`),
  ADD KEY `fk_schoolkids_users1_idx` (`user_id`),
  ADD KEY `fk_schoolkids_grades1_idx` (`grade_id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tasks_teachers1_idx` (`teacher_id`);

--
-- Индексы таблицы `task_work`
--
ALTER TABLE `task_work`
  ADD PRIMARY KEY (`work_id`,`task_id`),
  ADD KEY `fk_blocks_of_tasks_tasks1_idx` (`task_id`);

--
-- Индексы таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poskey` (`firstname`,`lastname`),
  ADD KEY `fk_teachers_disciplines_idx` (`discipline_id`),
  ADD KEY `fk_teachers_users1_idx` (`user_id`);

--
-- Индексы таблицы `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tests_teachers1_idx` (`teacher_id`);

--
-- Индексы таблицы `test_work`
--
ALTER TABLE `test_work`
  ADD PRIMARY KEY (`work_id`,`test_id`),
  ADD KEY `fk_blocks_of_tests_tests1_idx` (`test_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Индексы таблицы `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_works_teachers1_idx` (`teacher_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `given_tasks`
--
ALTER TABLE `given_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `given_tests`
--
ALTER TABLE `given_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `homeworks`
--
ALTER TABLE `homeworks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `schoolkids`
--
ALTER TABLE `schoolkids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT для таблицы `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_homeworks1` FOREIGN KEY (`homeworks_id`) REFERENCES `homeworks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `given_tasks`
--
ALTER TABLE `given_tasks`
  ADD CONSTRAINT `fk_given_tasks_homeworks1` FOREIGN KEY (`homework_id`) REFERENCES `homeworks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `given_tests`
--
ALTER TABLE `given_tests`
  ADD CONSTRAINT `fk_given_tests_homeworks1` FOREIGN KEY (`homework_id`) REFERENCES `homeworks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `homeworks`
--
ALTER TABLE `homeworks`
  ADD CONSTRAINT `fk_homeworks_schoolkids1` FOREIGN KEY (`schoolkid_id`) REFERENCES `schoolkids` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_homeworks_teachers1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_homeworks_works1` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `fk_study_materials_teachers1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `material_work`
--
ALTER TABLE `material_work`
  ADD CONSTRAINT `fk_blocks_of_materials_study_materials1` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_blocks_of_materials_works1` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `schoolkids`
--
ALTER TABLE `schoolkids`
  ADD CONSTRAINT `fk_schoolkids_grades1` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_schoolkids_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_tasks_teachers1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `task_work`
--
ALTER TABLE `task_work`
  ADD CONSTRAINT `fk_blocks_of_tasks_tasks1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_blocks_of_tasks_works1` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `fk_teachers_disciplines` FOREIGN KEY (`discipline_id`) REFERENCES `disciplines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_teachers_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `fk_tests_teachers1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `test_work`
--
ALTER TABLE `test_work`
  ADD CONSTRAINT `fk_blocks_of_tests_tests1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_blocks_of_tests_works1` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `fk_works_teachers1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
