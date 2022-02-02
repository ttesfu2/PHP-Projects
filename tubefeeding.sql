-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: tubefeeding
-- ------------------------------------------------------
-- Server version	8.0.22-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `nurse_log`
--

DROP TABLE IF EXISTS `nurse_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nurse_log` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL,
  `type` enum('Admin','User') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'User',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nurse_log`
--

LOCK TABLES `nurse_log` WRITE;
/*!40000 ALTER TABLE `nurse_log` DISABLE KEYS */;
INSERT INTO `nurse_log` VALUES (8,'Admin','d033e22ae348aeb5660fc2140aec35850c4da997','Admin'),(9,'Happy1','1461b0d8355715b741f294780f7721b0f16f4094','User'),(10,'one','fe05bcdcdc4928012781a5f1a2a77cbb5398e106','User'),(11,'Ruby','18e40e1401eef67e1ae69efab09afb71f87ffb81','User'),(12,'Titi','f7e79ca8eb0b31ee4d5d6c181416667ffee528ed','User'),(13,'Telu','2e26a3ce27f300a7ded9a140c3d4a2bcec1defda','User'),(14,'Happy','3978d009748ef54ad6ef7bf851bd55491b1fe6bb','User'),(15,'Hirut','09ca89e13d3147a1d189dba0a3ef77fad67d6b14','User'),(16,'sara','dea04453c249149b5fc772d9528fe61afaf7441c','User'),(17,'don','1f1e67e5fdb25d2e5cd18ddc0fee425272daab56','User'),(21,'Mary','5665331b9b819ac358165f8c38970dc8c7ddb47d','User');
/*!40000 ALTER TABLE `nurse_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tube_feeding`
--

DROP TABLE IF EXISTS `tube_feeding`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tube_feeding` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `first_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `last_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `dr_order` decimal(6,2) DEFAULT NULL,
  `jevity` int DEFAULT NULL,
  `nurse_name` varchar(32) DEFAULT NULL,
  `tube_feed_date` datetime DEFAULT NULL,
  `total_volume` decimal(10,2) DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tube_feeding_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `nurse_log` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tube_feeding`
--

LOCK TABLES `tube_feeding` WRITE;
/*!40000 ALTER TABLE `tube_feeding` DISABLE KEYS */;
INSERT INTO `tube_feeding` VALUES (85,10,'Gary','Sams','Male','2020-11-30',2.00,1,NULL,'2020-12-08 00:00:00',118.50,NULL),(88,10,'Gary','Sams','Male','2020-11-30',2.00,1,NULL,'2020-12-08 00:00:00',118.50,NULL),(89,10,'Gary','Sams','Male','2020-11-30',2.00,1,NULL,'2020-12-08 00:00:00',118.50,NULL),(90,10,'Gary','Sams','Male','2020-11-30',2.00,1,NULL,'2020-12-08 00:00:00',118.50,NULL),(91,10,'Gary','Sams','Male','2020-11-30',2.00,1,NULL,'2020-12-08 00:00:00',118.50,NULL),(92,10,'Gary','Sams','Male','2020-11-30',2.00,1,NULL,'2020-12-08 00:00:00',118.50,NULL),(93,10,'Gary','Sams','Male','2020-11-30',2.00,1,NULL,'2020-12-08 00:00:00',118.50,NULL),(94,10,'Gary','Sams','Male','2020-11-29',1.20,4,NULL,'2020-12-08 00:00:00',790.00,NULL),(95,10,'Gary','Sams','Male','2020-11-29',1.20,4,NULL,'2020-12-08 00:00:00',790.00,NULL),(100,8,'Ruby','Ruby','Female','2020-11-30',343.00,3,NULL,'2020-12-08 00:00:00',2.07,NULL),(101,8,'Gary','Sams','Male','2020-11-30',1.20,1,NULL,'2020-12-08 00:00:00',237.00,NULL),(104,14,'Lulla','Kebed','Female','2020-11-30',2.20,52,NULL,'2020-12-10 00:00:00',5601.82,NULL),(105,8,'Mimi','Metiku','Female','2020-11-29',1.30,52,'','2020-12-10 00:00:00',9480.00,NULL),(106,8,'Mimi','Metiku','Female','2020-11-29',1.30,52,'','2020-12-10 00:00:00',9480.00,NULL),(107,8,'Gary','Gary','Male','2020-11-17',1.30,121,'Hallel Rodas','2020-12-10 00:00:00',22059.23,NULL),(108,8,'Maria','Girma','Female','2020-11-29',1.20,52,'Hallel Rodas','2020-12-10 00:00:00',10270.00,NULL),(109,15,'Brad','Sams','Male','2020-11-02',12.30,2,'Hirut Lema','2020-12-10 00:00:00',29.29,NULL),(110,10,'Gary','Sams','Male','2020-11-30',1.20,123,'Mulu Birhan','2020-12-10 00:00:00',24292.50,NULL),(111,10,'Gary','Sams','Male','2020-11-30',1.20,123,'Mulu Birhan','2020-12-10 00:00:00',24292.50,NULL),(112,10,'Gary','Sams','Male','2020-11-30',1.20,123,'Mulu Birhan','2020-12-10 00:00:00',24292.50,NULL),(113,10,'Gary','Sams','Male','2020-11-30',1.20,123,'Mulu Birhan','2020-12-10 00:00:00',24292.50,NULL),(114,10,'Gary','Sams','Male','2020-11-30',1.20,123,'Mulu Birhan','2020-12-10 00:00:00',24292.50,NULL),(115,10,'Gary','Sams','Male','2020-11-30',1.20,123,'Mulu Birhan','2020-12-10 00:00:00',24292.50,NULL),(116,10,'Gary','Sams','Male','2020-11-30',1.20,123,'Mulu Birhan','2020-12-10 00:00:00',24292.50,NULL),(117,10,'Gary','Sams','Male','2020-11-30',1.20,123,'Mulu Birhan','2020-12-10 00:00:00',24292.50,NULL),(118,10,'Gary','Sams','Male','2020-11-30',1.20,123,'Mulu Birhan','2020-12-10 00:00:00',24292.50,NULL),(119,10,'Gary','Sams','Male','2020-11-30',1.20,123,'Mulu Birhan','2020-12-10 00:00:00',24292.50,NULL),(120,10,'Gary','Sams','Male','2020-11-30',1.20,123,'Mulu Birhan','2020-12-10 00:00:00',24292.50,NULL),(122,10,'Gary','Sams','Male','2020-11-30',1.20,12,'Lori Sams','2020-12-10 00:00:00',2419.38,NULL),(123,10,'Gary','Sams','Male','2020-11-30',1.20,12,'Lori Sams','2020-12-10 00:00:00',2419.38,NULL),(124,10,'Gary','Sams','Male','2020-11-30',1.20,12,'Lori Sams','2020-12-10 00:00:00',2419.38,NULL),(125,10,'Gary','Sams','Male','2020-11-30',1.20,12,'Lori Sams','2020-12-10 00:00:00',2419.38,NULL),(126,10,'Gary','Sams','Male','2020-11-01',1.20,52,'Erika Branden','2020-12-10 00:00:00',10270.00,NULL),(127,10,'Gary','Sams','Male','2020-11-01',1.20,125,'Yokob Sams','2020-12-10 00:00:00',24687.50,NULL),(128,10,'Gary','Sams','Male','2020-11-01',1.20,125,'Yokob Sams','2020-12-10 00:00:00',24687.50,NULL),(129,8,'brad','Sams','Male','2020-11-29',34.20,12,'Hallel Rodas','2020-12-10 00:00:00',83.16,NULL),(130,8,'Brad','Sams','Male','2020-11-29',2.24,343,'Hallel Rodas','2020-12-10 00:00:00',36290.63,NULL),(131,8,'Meti ','Mulat','Female','2020-12-01',234.00,1,'Rodas Abera','2020-12-10 00:00:00',1.22,NULL),(154,10,'Brad','Sams','Male','2020-11-30',4.50,3,'Ashil Luna','2020-12-10 00:00:00',158.00,NULL),(155,8,'Dani','Gutem','Male','2020-12-01',1.30,2,'Nina Tom','2020-12-10 00:00:00',364.62,NULL),(158,8,'Meti ','Ruby','Male','2020-12-14',23.00,232,'Hallel Rodas','2020-12-10 00:00:00',2390.61,NULL);
/*!40000 ALTER TABLE `tube_feeding` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-11 11:04:43
