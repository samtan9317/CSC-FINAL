-- MySQL dump 10.13  Distrib 5.1.56, for redhat-linux-gnu (i386)
--
-- Host: localhost    Database: imdb_small
-- ------------------------------------------------------
-- Server version	5.1.56-log

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
-- Table structure for table `logins`
--

DROP TABLE IF EXISTS `logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logins` (
  `id` int(11) NOT NULL DEFAULT '0',
  `account_name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logins`
--

LOCK TABLES `logins` WRITE;
/*!40000 ALTER TABLE `logins` DISABLE KEYS */;
INSERT INTO `logins` VALUES (0, 'admin', 'password');
INSERT INTO `logins` VALUES (1, 'sam', 'password');
UNLOCK TABLES;


--
-- Table structure for table `userQuotes`
--

DROP TABLE IF EXISTS `userQuotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userQuotes` (
  `userId` int(11) NOT NULL DEFAULT '0',
  `quoteId` int(11) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userQuotes`
--

LOCK TABLES `userQuotes` WRITE;
/*!40000 ALTER TABLE `userQuotes` DISABLE KEYS */;
INSERT INTO `userQuotes` VALUES (0, 1, 7, 0);
INSERT INTO `userQuotes` VALUES (0, 2, 6, 0);
INSERT INTO `userQuotes` VALUES (0, 3, 5, 0);
INSERT INTO `userQuotes` VALUES (0, 4, 4, 0);
INSERT INTO `userQuotes` VALUES (0, 5, 2, 0);
INSERT INTO `userQuotes` VALUES (0, 6, 3, 0);
INSERT INTO `userQuotes` VALUES (0, 7, 1, 0);
INSERT INTO `userQuotes` VALUES (1, 1, 7, 0);
INSERT INTO `userQuotes` VALUES (1, 2, 6, 0);
INSERT INTO `userQuotes` VALUES (1, 3, 5, 0);
UNLOCK TABLES;

--
-- Table structure for table `quotes`
--

DROP TABLE IF EXISTS `quotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotes` (
  `quoteId` int(11) NOT NULL DEFAULT '0', 
  `phrase` varchar(1000) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL

) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotes`
--

LOCK TABLES `quotes` WRITE;
/*!40000 ALTER TABLE `quotes` DISABLE KEYS */;
INSERT INTO `quotes` VALUES (1, 'The earlyworm gets the bird', 'Dave Farber');
INSERT INTO `quotes` VALUES (2, 'Walking on water and developing software from a specification are easy if both are frozen', 'Edward Berard');
INSERT INTO `quotes` VALUES (3, 'My mission in life is notmerely to survive, but to thrive; and to do so with some passion, some compassion, some humor, and some style.', 'Maya Angelou');
INSERT INTO `quotes` VALUES (4, 'You will be free or die', 'Harriet Tubman');
INSERT INTO `quotes` VALUES (5, 'We realize the importance of our voices only when we are silenced.' , 'Malala Yousafzai');
INSERT INTO `quotes` VALUES (6, "Eccentricity is the greatest grief's greatest remedy", 'Vladimir Nabokov');
INSERT INTO `quotes` VALUES (7, 'Nothin drives me more crazy than human stupidity', 'someone');

/*!40000 ALTER TABLE `quotes` ENABLE KEYS */;
UNLOCK TABLES;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-04-27 18:06:49
