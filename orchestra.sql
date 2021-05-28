-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: orchestra
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `orchestra_library`
--

DROP TABLE IF EXISTS `orchestra_library`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orchestra_library` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `season_music_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fkol_smid` (`season_music_id`),
  CONSTRAINT `fkol_smid` FOREIGN KEY (`season_music_id`) REFERENCES `season_music` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orchestra_library`
--

LOCK TABLES `orchestra_library` WRITE;
/*!40000 ALTER TABLE `orchestra_library` DISABLE KEYS */;
INSERT INTO `orchestra_library` VALUES (1,1);
/*!40000 ALTER TABLE `orchestra_library` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `performance`
--

DROP TABLE IF EXISTS `performance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `performance` (
  `venue_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_vid` (`venue_id`),
  KEY `fk_prid` (`programme_id`),
  CONSTRAINT `fk_prid` FOREIGN KEY (`programme_id`) REFERENCES `programme` (`id`),
  CONSTRAINT `fk_vid` FOREIGN KEY (`venue_id`) REFERENCES `venue` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `performance`
--

LOCK TABLES `performance` WRITE;
/*!40000 ALTER TABLE `performance` DISABLE KEYS */;
INSERT INTO `performance` VALUES (3,2,'2021-06-22 19:30:00',1),(2,3,'2021-06-15 19:30:00',2),(3,3,'2021-06-15 19:30:00',3),(2,1,'2021-05-07 19:30:00',4),(3,3,'2021-05-23 13:00:00',6);
/*!40000 ALTER TABLE `performance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programme`
--

DROP TABLE IF EXISTS `programme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `length_min` float(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programme`
--

LOCK TABLES `programme` WRITE;
/*!40000 ALTER TABLE `programme` DISABLE KEYS */;
INSERT INTO `programme` VALUES (1,'first performance',48.00),(2,'second performance',25.00),(3,'third performance',10.00);
/*!40000 ALTER TABLE `programme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programmed_music`
--

DROP TABLE IF EXISTS `programmed_music`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programmed_music` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `programme_id` int(11) NOT NULL,
  `season_music_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pid` (`programme_id`),
  KEY `fkpm_smid` (`season_music_id`),
  CONSTRAINT `fk_pid` FOREIGN KEY (`programme_id`) REFERENCES `programme` (`id`),
  CONSTRAINT `fkpm_smid` FOREIGN KEY (`season_music_id`) REFERENCES `season_music` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programmed_music`
--

LOCK TABLES `programmed_music` WRITE;
/*!40000 ALTER TABLE `programmed_music` DISABLE KEYS */;
INSERT INTO `programmed_music` VALUES (1,1,1),(2,1,2),(3,1,3),(4,2,7),(5,2,8),(6,2,9),(7,3,10),(8,3,11),(9,3,12);
/*!40000 ALTER TABLE `programmed_music` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `season_music`
--

DROP TABLE IF EXISTS `season_music`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `season_music` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `performable_music` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `season_music`
--

LOCK TABLES `season_music` WRITE;
/*!40000 ALTER TABLE `season_music` DISABLE KEYS */;
INSERT INTO `season_music` VALUES (1,'anti-fanfare'),(2,'i sleep alone'),(3,'hafan'),(7,'two national anthems'),(8,'we cannot let this stand'),(9,'compassion.love.'),(10,'storms don\'t last forever'),(11,'somewhere'),(12,'we used to');
/*!40000 ALTER TABLE `season_music` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venue`
--

DROP TABLE IF EXISTS `venue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venue`
--

LOCK TABLES `venue` WRITE;
/*!40000 ALTER TABLE `venue` DISABLE KEYS */;
INSERT INTO `venue` VALUES (1,'royal festival hall',2700),(2,'Barbican Hall',1943),(3,'Kings Place',415);
/*!40000 ALTER TABLE `venue` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-28 17:25:11
