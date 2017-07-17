-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: edn_forum
-- ------------------------------------------------------
-- Server version	5.6.34-log

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
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (2,'Bootstrap'),(3,'Git'),(4,'Gulp vs Grunt'),(1,'HTML/css'),(5,'JavaScript'),(7,'MySql'),(6,'PHP'),(8,'Ski');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sujet_id` int(10) unsigned NOT NULL,
  `auteur_id` int(10) unsigned NOT NULL,
  `titre` varchar(200) NOT NULL,
  `resume` text,
  `contenu` text NOT NULL,
  `date_publication` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sujet_post` (`sujet_id`),
  KEY `fk_auteur_post` (`auteur_id`),
  CONSTRAINT `fk_auteur_post` FOREIGN KEY (`auteur_id`) REFERENCES `utilisateur` (`id`),
  CONSTRAINT `fk_sujet_post` FOREIGN KEY (`sujet_id`) REFERENCES `sujet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sujet`
--

DROP TABLE IF EXISTS `sujet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sujet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categorie_id` int(10) unsigned NOT NULL,
  `auteur_id` int(10) unsigned NOT NULL,
  `titre` varchar(255) NOT NULL,
  `def` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `dateCreation` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categorie_sujet` (`categorie_id`),
  KEY `fk_auteur_sujet` (`auteur_id`),
  CONSTRAINT `fk_auteur_sujet` FOREIGN KEY (`auteur_id`) REFERENCES `utilisateur` (`id`),
  CONSTRAINT `fk_categorie_sujet` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sujet`
--

LOCK TABLES `sujet` WRITE;
/*!40000 ALTER TABLE `sujet` DISABLE KEYS */;
INSERT INTO `sujet` VALUES (1,1,1,'le html/css pour les null','Cour présentant les doux amis du developpeur : le HTML et le CSS','assets/suj_img/html5-css3.png','2010-04-02 15:28:22'),(2,4,1,'Gulp the best','Utiliser gulp c\'est mieux que grunt n\'est ce pas alfonso ?','assets/suj_img/featured.gif','2010-04-02 15:28:22'),(3,6,2,'PHP objet','PHP Objet vous allez transpirer du sang !!!','assets/suj_img/PHP.png','2010-04-02 15:28:22'),(4,8,4,'On ski où ces vacances ?',' Possibilités : Argentine, Alpes, Népal, si vous avez d\'autres suggestions ...','assets/suj_img/ski.jpg','2010-04-02 15:28:22'),(5,7,3,'Le sql pour les dingues','Utilisation des transactions et des triggers, conseption avancée des regex complexes AHAHAH','assets/suj_img/sql.png','2010-04-02 15:28:22');
/*!40000 ALTER TABLE `sujet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateur` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `uPassword` varchar(64) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `dateInscription` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_email` (`email`),
  UNIQUE KEY `unique_pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,'Pierre','Pierre@email.com','mar','','2010-04-02'),(2,'Paul','Paul@email.com','mar','','2010-04-02'),(3,'Alfonso','Alfonso@email.com','fernandez','assets/avatar/Alfonso.jpg','2010-04-02'),(4,'Fred','Fred@email.com','mas','','2010-04-02'),(5,'qsfdqsdfqsdfqsdf','qsdfqsdfsqdf@mail.com','qsdfqsdfqsdf',NULL,'2017-07-11'),(6,'qsfdqsdfqsdfqqsdfsdfqsfd','qsdfqsdfsqqsdfdf@mail.com','qsdfqsdfqsdf',NULL,'2017-07-11'),(7,'qsfdqsdfqsdqsfqqsdfsdfqsfd','qsdfqsdfsqqsqsdfdf@mail.com','qsdfqsdfqsdf',NULL,'2017-07-11'),(8,'qsdfsqdfqsdfqsdfqsdf','qsdfqsdf@mail.com','qsdfqsdfqsdf',NULL,'2017-07-11');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-11 17:01:23
