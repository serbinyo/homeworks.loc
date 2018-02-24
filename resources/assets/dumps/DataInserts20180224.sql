-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: homewrks
-- ------------------------------------------------------
-- Server version	5.7.16-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `disciplines`
--

LOCK TABLES `disciplines` WRITE;
/*!40000 ALTER TABLE `disciplines` DISABLE KEYS */;
INSERT INTO `disciplines` VALUES (1,'Грибоведение','О грибах - суровых и спорожадных, любящих и прощающих'),(2,'История','История'),(3,'Русский язык','Русский язык'),(4,'Физика','Физика'),(5,'Математика','Математика, это просто... добро пожаловать');
/*!40000 ALTER TABLE `disciplines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
INSERT INTO `grades` VALUES (1,'8-А',NULL),(2,'8-Б',NULL),(3,'8-В',NULL),(4,'9-А','Математический'),(5,'9-Б',NULL),(6,'9-В',NULL),(7,'10-А','Физмат'),(8,'10-Б','Исторический'),(9,'10-В',NULL),(10,'11-А',NULL),(11,'11-Б',NULL),(12,'11-В',NULL);
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `homeworks`
--

LOCK TABLES `homeworks` WRITE;
/*!40000 ALTER TABLE `homeworks` DISABLE KEYS */;
/*!40000 ALTER TABLE `homeworks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `material_work`
--

LOCK TABLES `material_work` WRITE;
/*!40000 ALTER TABLE `material_work` DISABLE KEYS */;
INSERT INTO `material_work` VALUES (3,2),(3,3),(4,5);
/*!40000 ALTER TABLE `material_work` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `materials`
--

LOCK TABLES `materials` WRITE;
/*!40000 ALTER TABLE `materials` DISABLE KEYS */;
INSERT INTO `materials` VALUES (2,1,'Война грибов','no image','Операция \"Белый лед\"','Важное событие которое повлияло на исход 4 брюховецкой ветви операция \"Белый лед\"','2018-02-15 02:05:45','2018-02-18 00:07:11'),(3,1,'Война грибов','no image','Предпосылки к войне.','1. Заговор поганок.\r\n2. Кража плесени 213 года.\r\n3. Принц Вешанок пришедший к власти во времена \"Сухой ночи\".','2018-02-17 14:08:53','2018-02-18 00:55:56'),(5,3,'Игра престолов','no image','Семья Старков','Нед Старк -> Роб Старк...\r\nпродолжение следует','2018-02-18 18:03:54','2018-02-18 18:04:45');
/*!40000 ALTER TABLE `materials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `schoolkids`
--

LOCK TABLES `schoolkids` WRITE;
/*!40000 ALTER TABLE `schoolkids` DISABLE KEYS */;
INSERT INTO `schoolkids` VALUES (1,2,5,'Филипп','Кирилович','Лозовец'),(2,3,11,'Данил','Робертович','Волков'),(3,7,3,'Андрей','Исаакович','Сербин');
/*!40000 ALTER TABLE `schoolkids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `task_work`
--

LOCK TABLES `task_work` WRITE;
/*!40000 ALTER TABLE `task_work` DISABLE KEYS */;
INSERT INTO `task_work` VALUES (19,25),(18,34);
/*!40000 ALTER TABLE `task_work` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (5,1,'Война грибов','В каком столетии грибы начали войну против человечества?','100','2018-02-14 20:37:39','2018-02-14 20:37:39'),(10,1,'Война грибов','Кто победил в войне грибов?','Подосиновики','2018-02-14 21:37:54','2018-02-17 23:21:47'),(12,1,'Война грибов','Если соглашение о мире заключено между 5 фракциями то сколько должно великих стражей у соглашения?','5','2018-02-17 13:33:59','2018-02-17 23:19:44'),(13,2,'Термостаты','Сколько градусов по шкале Фаренгейта в одном градусе по шкале Цельсия?','33,8','2018-02-17 22:04:36','2018-02-18 16:11:47'),(15,1,'Война грибов','Сколько потомков у Первого Белого?','17','2018-02-17 23:26:40','2018-02-17 23:38:01'),(22,1,'Война грибов','Дата начала споростояния?','555','2018-02-17 23:42:21','2018-02-17 23:42:59'),(25,2,'ТОРНКО','Месторождение \"Белой Луны\"?','Мексика','2018-02-18 17:13:17','2018-02-18 18:29:58'),(34,5,'Война грибов','Решите уравнение:\r\n65 дубрав на 3 лукошка','115','2018-02-21 00:48:54','2018-02-21 00:48:54');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES (1,1,1,'Александр','Александрович','Сербин'),(2,4,4,'Кирилл','Андреевич','Иванов'),(3,5,2,'Константин','Леонидович','Старков'),(4,6,3,'Илья','Рапортович','Киров'),(5,9,1,'Артем','Евгениевич','Ромашин');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `test_work`
--

LOCK TABLES `test_work` WRITE;
/*!40000 ALTER TABLE `test_work` DISABLE KEYS */;
INSERT INTO `test_work` VALUES (18,2),(20,13),(3,15);
/*!40000 ALTER TABLE `test_work` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tests`
--

LOCK TABLES `tests` WRITE;
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
INSERT INTO `tests` VALUES (2,1,'Война грибов','Сколько отрядов участвовало в Осаде Леса?','3','4','6','29','D','2018-02-16 22:10:59','2018-02-18 00:34:51'),(12,1,'Война грибов','Потери бледной поганки?','45 010 грибов','4 200 грибов','6 300 слив','5 поганок','B','2018-02-17 12:07:07','2018-02-18 00:52:15'),(13,3,'Программирование','Сколько байт в килобойте','1000','1012','1024','1036','C','2018-02-18 17:29:15','2018-02-18 17:29:15'),(14,2,'Оценка интеллектуальных способностей домашних животных','Каков высший балл по шкале Кофенгенца?','4','7','10','12','C','2018-02-20 00:43:59','2018-02-20 00:44:19'),(15,5,'Война грибов','Кто одержал победу в \"Битве при соснах\"?','Мышата','Опята','Дубки','Мухоморы','A','2018-02-21 14:37:44','2018-02-21 14:37:44');
/*!40000 ALTER TABLE `tests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'t','teach','serbinyo@gmail.com','$2y$10$qSxHc8hDFYcYqiNK46REMecvw5FOlVG1dItdVDWZ7tSO.NhaDZlT.','3tlQ2YVZDNOntHkMnN3eBTD8IgdV3NEmvoF6YxjV4toU09i9Jgcy22yH0QJv','2018-02-06 18:03:08','2018-02-06 18:03:08'),(2,'s','kid',NULL,'$2y$10$o7qfY4IfDrtKU5QD1s3nA.iYvLmzvnODJDMRvCiDCrimC8frLjLmS',NULL,'2018-02-06 18:13:46','2018-02-06 18:13:46'),(3,'s','kid1',NULL,'$2y$10$riUGzrdPEwJh11gSYxpbvujoDlUtQj68A6T.GL4SSQM31TfMTc7FK','pt9ZRLPAyaDJh7CI9uedFZi7MN0IIojy2Dlwv4esfzqBCxndS23DjQMVI2BE','2018-02-06 18:15:40','2018-02-06 18:15:40'),(4,'t','teach1','serbinyo@gmail.com','$2y$10$1ccBxyP/lbuhpJeoDwHdR.RHxcPJ8qi44TzRdzrK3oNVteVcjfJjy','IgS9ePFqFNMaFtukSuKRHN4Y3peN7izTC2rpnSivEVPVfZqzcvWRJHps5V2I','2018-02-08 17:38:42','2018-02-08 17:38:42'),(5,'t','teach2','serbinyo@gmail.com','$2y$10$.t5HOAxjs1Sfrwt/m88lJu0SO0oUJgApgiUxQsfEw4FY8YGec6klK','WNQeSjU36zDik639nAkoD99CfiwlWXQQ5k8WLH95BCWCZXpLKL0MIAAtnokW','2018-02-08 17:40:03','2018-02-08 17:40:03'),(6,'t','teach3','serbinyo@gmail.com','$2y$10$owqp4FQpaRDSODFSVrXBWeK0fc61jofiGrm8MEiXjGUUi14ymwIku','ZDfhDgUppDngyCQQBpe9F89rWkMFLTi2PfedBkqTvGnTWvwMQR1kYiNbDLk5','2018-02-08 17:50:55','2018-02-08 17:50:55'),(7,'s','kid3',NULL,'$2y$10$AHgspaQtuqnflmyCdcQ5.eVyUrsgWgXSPlScblnYkXSlsCa08xYiK',NULL,'2018-02-08 17:51:31','2018-02-08 17:51:31'),(9,'t','teach4','serbinyo@gmail.com','$2y$10$KehVgXzmk8ExZTMkyGyPI.UtxJzfIhOHtl7qcsju3Ed.apbBmtWki','R8PhYlBfopEvJN2BqWjYAmJL7SMHisHLFmIu1p50M6GSQQRq1JRdOAzRHVgy','2018-02-21 00:47:50','2018-02-21 00:47:50');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `works`
--

LOCK TABLES `works` WRITE;
/*!40000 ALTER TABLE `works` DISABLE KEYS */;
INSERT INTO `works` VALUES (3,1,'Война грибов','2018-02-22 23:25:01','2018-02-22 23:25:01'),(4,3,'Работа Старкова','2018-02-23 01:25:01','2018-02-23 01:25:01'),(18,1,'Работа Сербина','2018-02-23 18:15:14','2018-02-23 18:15:14'),(19,2,'Работа по физике','2018-02-23 18:31:39','2018-02-23 18:31:39'),(20,5,'Работа Ромашина','2018-02-23 18:33:50','2018-02-23 18:33:57');
/*!40000 ALTER TABLE `works` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-24 13:54:36
