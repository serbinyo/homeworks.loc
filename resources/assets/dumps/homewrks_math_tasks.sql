-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 22 2018 г., 03:41
-- Версия сервера: 5.7.16-log
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `homewrks`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

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

CREATE TABLE `disciplines` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `disciplines`
--

INSERT INTO `disciplines` (`id`, `name`, `description`) VALUES
(1, 'Грибоведение', 'О грибах - суровых и спорожадных, любящих и прощающиx'),
(2, 'История', 'Всемирная история. Особое внимание уделено Римскому праву.'),
(3, 'Русский язык', 'Русский язык'),
(4, 'Физика', 'Физика'),
(5, 'Математика', 'Математика, это просто... добро пожаловать');

-- --------------------------------------------------------

--
-- Структура таблицы `given_tasks`
--

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
(1, 2, 'Война грибов', 'Решите уравнение:\r\n65 дубрав на 3 лукошка', '17', '115', NULL, '2018-03-16 23:17:08', '2018-03-17 14:00:21'),
(2, 3, 'Война грибов', 'Решите уравнение:\r\n65 дубрав на 3 лукошка', '21', '115', NULL, '2018-03-17 19:13:15', '2018-03-17 20:29:08'),
(7, 5, 'Простые задачи', 'На одной странице 5 рисунков. Сколько рисунков на 2 таких же страницах?', '10', '10', 1, '2018-03-17 21:01:07', '2018-03-17 21:03:45'),
(8, 5, 'составные задачи для 1-2 класса', 'Маша съела 4 мандарина, а Саша съел на 2 мандарина меньше Маши.\r\nСколько всего мандаринов съели ребята?', 'не знаю', '6', NULL, '2018-03-17 21:01:07', '2018-03-17 21:03:55'),
(9, 5, 'составные задачи для 1-2 класса', 'Сравни выражения:\r\n10 + 25 ? 15 + 20.\r\nКакой знак нужно вставить', '=', '=', 1, '2018-03-17 21:01:07', '2018-03-17 21:04:09'),
(10, 5, 'составные задачи для 1-2 класса', 'Лена живет на 4 этаже, если считать сверху. На каком этаже живет Лена, если всего у дома 9 этажей?', '5', '6', NULL, '2018-03-17 21:01:07', '2018-03-17 21:04:15'),
(11, 7, 'Простые задачи', 'На одной странице 5 рисунков. Сколько рисунков на 2 таких же страницах?', '10', '10', 1, '2018-03-18 23:53:37', '2018-03-18 23:59:31'),
(12, 7, 'составные задачи для 1-2 класса', 'Маша съела 4 мандарина, а Саша съел на 2 мандарина меньше Маши.\r\nСколько всего мандаринов съели ребята?', '6', '6', 1, '2018-03-18 23:53:37', '2018-03-18 23:59:10'),
(13, 7, 'составные задачи для 1-2 класса', 'Сравни выражения:\r\n10 + 25 ? 15 + 20.\r\nКакой знак нужно вставить', '=', '=', 1, '2018-03-18 23:53:37', '2018-03-18 23:58:56'),
(14, 7, 'составные задачи для 1-2 класса', 'Лена живет на 4 этаже, если считать сверху. На каком этаже живет Лена, если всего у дома 9 этажей?', '6', '6', 1, '2018-03-18 23:53:37', '2018-03-18 23:59:36');

-- --------------------------------------------------------

--
-- Структура таблицы `given_tests`
--

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

--
-- Дамп данных таблицы `given_tests`
--

INSERT INTO `given_tests` (`id`, `homework_id`, `theme`, `task`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`, `standard`, `correct_flag`, `created_at`, `updated_at`) VALUES
(1, 1, 'Война грибов', 'Кто одержал победу в \"Битве при соснах\"?', 'Мышата', 'Опята', 'Дубки', 'Мухоморы', 'A', 'A', 1, '2018-03-16 23:15:03', '2018-03-16 23:16:21'),
(2, 2, 'Война грибов', 'Сколько отрядов участвовало в Осаде Леса?', '3', '4', '6', '29', 'D', 'D', 1, '2018-03-16 23:17:08', '2018-03-17 14:00:15'),
(3, 3, 'Война грибов', 'Сколько отрядов участвовало в Осаде Леса?', '3', '4', '6', '29', 'C', 'D', NULL, '2018-03-17 19:13:14', '2018-03-17 20:29:02'),
(7, 5, 'тесты по математике для 2 класса', 'На столе лежали ручки, карандаши и фломастеры, всего 15 штук. Карандашей было в 7 раз больше, чем ручек. Сколько фломастеров лежало на столе?', '1', '14', '7', '10', 'A', 'C', NULL, '2018-03-17 21:01:07', '2018-03-17 21:04:20'),
(8, 5, 'тесты по математике для 2 класса', 'У Саши и Коли вместе 18 марок. Саше подарили еще 8. Сколько после этого стало марок у мальчиков?', '26', '25', '35', '12', 'A', 'A', 1, '2018-03-17 21:01:07', '2018-03-17 21:04:25'),
(9, 5, 'тесты по математике для 2 класса', 'Значение какого выражения равно 14 ?', '6 + 7', '5 + 9', '7 + 5', '4 + 11', 'A', 'B', NULL, '2018-03-17 21:01:07', '2018-03-17 21:04:38'),
(10, 6, 'тесты по математике для 2 класса', 'На столе лежали ручки, карандаши и фломастеры, всего 15 штук. Карандашей было в 7 раз больше, чем ручек. Сколько фломастеров лежало на столе?', '1', '14', '7', '10', 'A', 'C', NULL, '2018-03-18 22:52:10', '2018-03-18 23:48:15'),
(11, 7, 'тесты по математике для 2 класса', 'На столе лежали ручки, карандаши и фломастеры, всего 15 штук. Карандашей было в 7 раз больше, чем ручек. Сколько фломастеров лежало на столе?', '1', '14', '7', '10', 'C', 'C', 1, '2018-03-18 23:53:37', '2018-03-18 23:59:43'),
(12, 7, 'тесты по математике для 2 класса', 'У Саши и Коли вместе 18 марок. Саше подарили еще 8. Сколько после этого стало марок у мальчиков?', '26', '25', '35', '12', 'A', 'A', 1, '2018-03-18 23:53:37', '2018-03-18 23:59:59'),
(13, 7, 'тесты по математике для 2 класса', 'Значение какого выражения равно 14 ?', '6 + 7', '5 + 9', '7 + 5', '4 + 11', 'B', 'B', 1, '2018-03-18 23:53:37', '2018-03-19 00:00:09');

-- --------------------------------------------------------

--
-- Структура таблицы `grades`
--

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
(3, 8, 'В', NULL),
(4, 9, 'А', 'Математический'),
(5, 9, 'Б', NULL),
(7, 10, 'А', 'Физмат'),
(8, 10, 'Б', 'Исторический'),
(9, 10, 'В', NULL),
(10, 11, 'А', NULL),
(11, 11, 'Б', NULL),
(12, 11, 'В', NULL),
(13, 2, 'А', 'Этот довольно узкий блок текста центрирован. Заметьте, что строки внутри блока не центрированы (они выровнены влево), в отличие от предыдущего примера.');

-- --------------------------------------------------------

--
-- Структура таблицы `homeworks`
--

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
(1, 1, 1, 3, '2018-06-06', '2018-03-16', 100, 'Снижаю оценку за плохое поведение на уроке', 80, '2018-03-16 23:15:03', '2018-03-17 19:54:42'),
(2, 2, 1, 18, '2018-11-15', '2018-03-17', NULL, NULL, NULL, '2018-03-16 23:17:08', '2018-03-17 14:00:22'),
(3, 1, 1, 18, '2018-11-15', '2018-03-17', 1, 'Изменяю оценку по звонку папы', 60, '2018-03-17 19:13:14', '2018-03-17 20:30:30'),
(5, 5, 6, 21, '2018-03-22', '2018-03-17', NULL, 'Изменил по звонку папы', NULL, '2018-03-17 21:01:07', '2018-03-17 21:08:58'),
(6, 4, 6, 22, '2018-03-22', '2018-03-18', NULL, NULL, NULL, '2018-03-18 22:52:10', '2018-03-19 00:53:56'),
(7, 4, 6, 21, '2018-03-22', '2018-03-19', 100, NULL, NULL, '2018-03-18 23:53:37', '2018-03-19 00:00:12');

-- --------------------------------------------------------

--
-- Структура таблицы `materials`
--

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

--
-- Дамп данных таблицы `materials`
--

INSERT INTO `materials` (`id`, `teacher_id`, `theme`, `image`, `title`, `body`, `created_at`, `updated_at`) VALUES
(2, 1, 'Война грибов', 'no image', 'Операция \"Белый лед\"', 'Важное событие которое повлияло на исход 4 брюховецкой ветви операция \"Белый лед\"', '2018-02-15 02:05:45', '2018-02-18 00:07:11'),
(3, 1, 'Война грибов', 'no image', 'Предпосылки к войне.', '1. Заговор поганок.\r\n2. Кража плесени 213 года.\r\n3. Принц Вешанок пришедший к власти во времена \"Сухой ночи\".', '2018-02-17 14:08:53', '2018-02-18 00:55:56'),
(5, 3, 'Игра престолов', 'no image', 'Семья Старков', 'Нед Старк -> Роб Старк...\r\nпродолжение следует', '2018-02-18 18:03:54', '2018-02-18 18:04:45');

-- --------------------------------------------------------

--
-- Структура таблицы `material_work`
--

CREATE TABLE `material_work` (
  `work_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `material_work`
--

INSERT INTO `material_work` (`work_id`, `material_id`) VALUES
(3, 2),
(3, 3),
(4, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `schoolkids`
--

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
(1, 2, 5, 'Филипп', 'Кирилович', 'Лозовец'),
(2, 3, 11, 'Данил', 'Робертович', 'Волков'),
(4, 11, 13, 'Дима', NULL, 'Сорокин'),
(5, 12, 13, 'Света', NULL, 'Кукушкина');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

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
(5, 1, 'Война грибов', 'В каком столетии грибы начали войну против человечества?', '100', '2018-02-14 20:37:39', '2018-02-14 20:37:39'),
(10, 1, 'Война грибов', 'Кто победил в войне грибов?', 'Подосиновики', '2018-02-14 21:37:54', '2018-02-17 23:21:47'),
(12, 1, 'Война грибов', 'Если соглашение о мире заключено между 5 фракциями то сколько должно великих стражей у соглашения?', '5', '2018-02-17 13:33:59', '2018-02-17 23:19:44'),
(13, 2, 'Термостаты', 'Сколько градусов по шкале Фаренгейта в одном градусе по шкале Цельсия?', '33,8', '2018-02-17 22:04:36', '2018-02-18 16:11:47'),
(15, 1, 'Война грибов', 'Сколько потомков у Первого Белого?', '17', '2018-02-17 23:26:40', '2018-02-17 23:38:01'),
(22, 1, 'Война грибов', 'Дата начала споростояния?', '555', '2018-02-17 23:42:21', '2018-02-17 23:42:59'),
(25, 2, 'ТОРНКО', 'Месторождение \"Белой Луны\"?', 'Мексика', '2018-02-18 17:13:17', '2018-02-18 18:29:58'),
(34, 5, 'Война грибов', 'Решите уравнение:\r\n65 дубрав на 3 лукошка', '115', '2018-02-21 00:48:54', '2018-02-21 00:48:54'),
(35, 6, 'Простые задачи', 'На одной странице 5 рисунков. Сколько рисунков на 2 таких же страницах?', '10', '2018-03-17 20:39:23', '2018-03-17 20:39:23'),
(36, 6, 'составные задачи для 1-2 класса', 'Маша съела 4 мандарина, а Саша съел на 2 мандарина меньше Маши.\r\nСколько всего мандаринов съели ребята?', '6', '2018-03-17 20:40:48', '2018-03-17 20:40:48'),
(37, 6, 'составные задачи для 1-2 класса', 'Сравни выражения:\r\n10 + 25 ? 15 + 20.\r\nКакой знак нужно вставить', '=', '2018-03-17 20:41:23', '2018-03-17 20:41:23'),
(38, 6, 'составные задачи для 1-2 класса', 'Лена живет на 4 этаже, если считать сверху. На каком этаже живет Лена, если всего у дома 9 этажей?', '6', '2018-03-17 20:46:21', '2018-03-17 20:46:21');

-- --------------------------------------------------------

--
-- Структура таблицы `task_work`
--

CREATE TABLE `task_work` (
  `work_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task_work`
--

INSERT INTO `task_work` (`work_id`, `task_id`) VALUES
(19, 25),
(18, 34),
(21, 35),
(21, 36),
(21, 37),
(21, 38);

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

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
(1, 1, 1, 'Александр', 'Александрович', 'Сербин'),
(2, 4, 4, 'Кирилл', 'Андреевич', 'Иванов'),
(3, 5, 2, 'Константин', 'Леонидович', 'Старков'),
(5, 9, 1, 'Артем', 'Евгениевич', 'Ромашин'),
(6, 10, 5, 'Вадим', 'Леонидович', 'Кузьмин');

-- --------------------------------------------------------

--
-- Структура таблицы `tests`
--

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

--
-- Дамп данных таблицы `tests`
--

INSERT INTO `tests` (`id`, `teacher_id`, `theme`, `task`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`, `created_at`, `updated_at`) VALUES
(2, 1, 'Война грибов', 'Сколько отрядов участвовало в Осаде Леса?', '3', '4', '6', '29', 'D', '2018-02-16 22:10:59', '2018-02-18 00:34:51'),
(12, 1, 'Война грибов', 'Потери бледной поганки?', '45 010 грибов', '4 200 грибов', '6 300 слив', '5 поганок', 'B', '2018-02-17 12:07:07', '2018-02-18 00:52:15'),
(13, 3, 'Программирование', 'Сколько байт в килобойте', '1000', '1012', '1024', '1036', 'C', '2018-02-18 17:29:15', '2018-02-18 17:29:15'),
(14, 2, 'Оценка интеллектуальных способностей домашних животных', 'Каков высший балл по шкале Кофенгенца?', '4', '7', '10', '12', 'C', '2018-02-20 00:43:59', '2018-02-20 00:44:19'),
(15, 5, 'Война грибов', 'Кто одержал победу в \"Битве при соснах\"?', 'Мышата', 'Опята', 'Дубки', 'Мухоморы', 'A', '2018-02-21 14:37:44', '2018-02-21 14:37:44'),
(16, 6, 'тесты по математике для 2 класса', 'На столе лежали ручки, карандаши и фломастеры, всего 15 штук. Карандашей было в 7 раз больше, чем ручек. Сколько фломастеров лежало на столе?', '1', '14', '7', '10', 'C', '2018-03-17 20:48:43', '2018-03-17 20:48:43'),
(17, 6, 'тесты по математике для 2 класса', 'У Саши и Коли вместе 18 марок. Саше подарили еще 8. Сколько после этого стало марок у мальчиков?', '26', '25', '35', '12', 'A', '2018-03-17 20:49:40', '2018-03-17 20:49:40'),
(18, 6, 'тесты по математике для 2 класса', 'Значение какого выражения равно 14 ?', '6 + 7', '5 + 9', '7 + 5', '4 + 11', 'B', '2018-03-17 20:51:45', '2018-03-17 20:51:45');

-- --------------------------------------------------------

--
-- Структура таблицы `test_work`
--

CREATE TABLE `test_work` (
  `work_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `test_work`
--

INSERT INTO `test_work` (`work_id`, `test_id`) VALUES
(18, 2),
(20, 13),
(3, 15),
(21, 16),
(22, 16),
(21, 17),
(21, 18);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

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
(1, 't', 'teach', 'serbinyo@gmail.com', '$2y$10$qSxHc8hDFYcYqiNK46REMecvw5FOlVG1dItdVDWZ7tSO.NhaDZlT.', 'dtvx1N0zwDl5hQ3DGFjsJl093cGUgrVlZPMUsQ4NCpzUZny0i9l984NzCCC5', '2018-02-06 18:03:08', '2018-02-06 18:03:08'),
(2, 's', 'kid', NULL, '$2y$10$o7qfY4IfDrtKU5QD1s3nA.iYvLmzvnODJDMRvCiDCrimC8frLjLmS', 'NQ7o5cZ5rFRAyEFb41gKc17XNUyMY5yLZJWdxSvT0i6riAHPtzTzdNE9JVt9', '2018-02-06 18:13:46', '2018-02-06 18:13:46'),
(3, 's', 'kid1', NULL, '$2y$10$riUGzrdPEwJh11gSYxpbvujoDlUtQj68A6T.GL4SSQM31TfMTc7FK', 'ANR8Cm5tXKzpJddVmdaIMTOSbM8A8Oah6jEuGyhDslwQkyKb2iNLUm5KtZ17', '2018-02-06 18:15:40', '2018-02-06 18:15:40'),
(4, 't', 'teach1', NULL, '$2y$10$1ccBxyP/lbuhpJeoDwHdR.RHxcPJ8qi44TzRdzrK3oNVteVcjfJjy', '4miGcB1a2B5DFQyB9OFmQaKJTK9LHqZVj2Ae2kxUzGsk11LTZyzbq7z9dsf7', '2018-02-08 17:38:42', '2018-02-08 17:38:42'),
(5, 't', 'teach2', NULL, '$2y$10$.t5HOAxjs1Sfrwt/m88lJu0SO0oUJgApgiUxQsfEw4FY8YGec6klK', '3PRn2pCw3Y7NlSaoeE8ZhBbM1803yix4PDkF4YZWFg4n4841fi3IqOq1leOZ', '2018-02-08 17:40:03', '2018-02-08 17:40:03'),
(9, 't', 'teach4', NULL, '$2y$10$KehVgXzmk8ExZTMkyGyPI.UtxJzfIhOHtl7qcsju3Ed.apbBmtWki', '7YeGl4SBT8Svyc7t5cOhccl4Ic9MRqzZKpZgc8pS1ck0zBOhffhvNm887fcH', '2018-02-21 00:47:50', '2018-02-21 00:47:50'),
(10, 't', 'teach5', NULL, '$2y$10$VrGo2ZUad7SizRmx4f3j4OFi0Ki4Gnt8wmh5D7Fx7FTa65mrtX776', NULL, '2018-03-17 20:34:39', '2018-03-17 20:34:39'),
(11, 's', 'kid11', NULL, '$2y$10$S1QkCBx.VBFvP3H3vCshDubcKs8Psv1wqbmVFDb7t1UFO7KdTcVDy', NULL, '2018-03-17 20:54:14', '2018-03-17 20:54:14'),
(12, 's', 'kid12', NULL, '$2y$10$99IMnyx88bQfmNiyqG7tteHNxc4TCHWzb9tZ.HpuUqS7RmtUra71K', NULL, '2018-03-17 20:55:52', '2018-03-17 20:55:52'),
(13, 'a', 'admin', 'admin@test.com', '$2y$10$99IMnyx88bQfmNiyqG7tteHNxc4TCHWzb9tZ.HpuUqS7RmtUra71K', 'BhA1OhoWjR7vH91uIz9uVssez57yG5d8OLkR31EmrYUUFIKfyjSChD6jMkyw', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `works`
--

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
(3, 1, 'Война грибов', '2018-02-22 23:25:01', '2018-02-22 23:25:01'),
(4, 3, 'Работа Старкова', '2018-02-23 01:25:01', '2018-02-23 01:25:01'),
(18, 1, 'Работа Сербина', '2018-02-23 18:15:14', '2018-02-23 18:15:14'),
(19, 2, 'Работа по физике', '2018-02-23 18:31:39', '2018-02-23 18:31:39'),
(20, 5, 'Работа Ромашина', '2018-02-23 18:33:50', '2018-02-23 18:33:57'),
(21, 6, 'Первое задание', '2018-03-17 20:35:34', '2018-03-17 20:35:42'),
(22, 6, 'Новая', '2018-03-18 22:51:32', '2018-03-18 22:51:32');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `given_tests`
--
ALTER TABLE `given_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `homeworks`
--
ALTER TABLE `homeworks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `schoolkids`
--
ALTER TABLE `schoolkids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
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
