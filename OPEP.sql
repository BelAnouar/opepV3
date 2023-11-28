-- MySQL dump 10.13  Distrib 8.2.0, for Linux (x86_64)
--
-- Host: localhost    Database: OPEP
-- ------------------------------------------------------
-- Server version	8.2.0

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
-- Table structure for table `ROLE`
--

DROP TABLE IF EXISTS `ROLE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ROLE` (
  `idRole` int NOT NULL AUTO_INCREMENT,
  `ROLE` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idRole`),
  UNIQUE KEY `ROLE` (`ROLE`),
  UNIQUE KEY `ROLE_2` (`ROLE`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ROLE`
--

LOCK TABLES `ROLE` WRITE;
/*!40000 ALTER TABLE `ROLE` DISABLE KEYS */;
INSERT INTO `ROLE` VALUES (2,'Admin'),(3,'client'),(1,'superAdmin');
/*!40000 ALTER TABLE `ROLE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `idCategorie` int NOT NULL AUTO_INCREMENT,
  `nomCateforie` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idCategorie`),
  UNIQUE KEY `nomCateforie` (`nomCateforie`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Flowering Plants'),(5,'Herbs'),(4,'Shrubs'),(3,'Trees'),(6,'Vegetables');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commande` (
  `idCommande` int NOT NULL AUTO_INCREMENT,
  `idPlante` int DEFAULT NULL,
  `iduser` int DEFAULT NULL,
  `dateCommande` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idCommande`),
  KEY `iduser` (`iduser`),
  KEY `idPlante` (`idPlante`),
  CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`idUser`),
  CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`idPlante`) REFERENCES `plante` (`idPlante`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commande`
--

LOCK TABLES `commande` WRITE;
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
INSERT INTO `commande` VALUES (1,3,3,'2023-11-28 16:20:20'),(2,2,3,'2023-11-28 16:20:21'),(3,3,3,'2023-11-28 16:20:21'),(4,3,3,'2023-11-28 16:20:21'),(5,2,3,'2023-11-28 16:20:21');
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `panier`
--

DROP TABLE IF EXISTS `panier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `panier` (
  `idPanier` int NOT NULL AUTO_INCREMENT,
  `plante_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`idPanier`),
  KEY `plante_id` (`plante_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`plante_id`) REFERENCES `plante` (`idPlante`),
  CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `panier`
--

LOCK TABLES `panier` WRITE;
/*!40000 ALTER TABLE `panier` DISABLE KEYS */;
INSERT INTO `panier` VALUES (5,2,1),(6,2,1),(7,2,1),(8,2,1),(9,2,1),(10,2,1),(11,2,1),(12,2,1),(13,3,1),(14,2,1),(20,3,9);
/*!40000 ALTER TABLE `panier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plante`
--

DROP TABLE IF EXISTS `plante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plante` (
  `idPlante` int NOT NULL AUTO_INCREMENT,
  `nomPlante` varchar(30) DEFAULT NULL,
  `categirie_id` int DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`idPlante`),
  KEY `categirie_id` (`categirie_id`),
  CONSTRAINT `plante_ibfk_1` FOREIGN KEY (`categirie_id`) REFERENCES `categories` (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plante`
--

LOCK TABLES `plante` WRITE;
/*!40000 ALTER TABLE `plante` DISABLE KEYS */;
INSERT INTO `plante` VALUES (2,'Rose',1,'./assets/images/rose.jfif',46),(3,'Rose ',3,'./assets/images/logo.png',45);
/*!40000 ALTER TABLE `plante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) DEFAULT NULL,
  `Prenom` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `email` (`email`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `ROLE` (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'amine','belhasan','amine.ihab96@gmail.com','04ad1536bbbfd8b56f277fb2ad3989e9',2,200),(2,'amine','belhasan','amine.ihab@gmail.com','db70a976d972068400aec96f36133fb1',1,200),(3,'amine','belhasan','amine@gmail.com','6a2237ffd88e048192d9349e3b262d28',3,200),(4,'amine','belhasan','amine.ihab6@gmail.com','1d2eea1d60c84042991415a8aa4dd6a8',3,200),(5,'amine','belhasan','ihab96@gmail.com','6ff5e6e5c36d4eff4467e5ad847f297e',1,401),(6,'amine','belhasan','amine.i6@gmail.com','b5325101803b808f0c148a6866234da0',NULL,401),(7,'amine','belhasan','amhab96@gmail.com','0f05570f84fa8684f1b68f4f0d9b6b5d',NULL,401),(8,'amine','belhasan','ami@gmail.com','bf90e897041e8571fc419d067a2fb8e6',2,403),(9,'amine','belhasan','amin6@gmail.com','3eddfcf2760587801226e0d91bcc6886',2,403),(10,'amine','belhasan','ane.ihab96@gmail.com','2d01ec80ec3257217c2f75f65779d291',3,401),(11,'amine','belhasan','amine.i96@gmail.com','01221f384c48fa691c579e87555a2dda',3,200),(12,'amine','belhasan','amine.b96@gmail.com','f38468473a4ae24c66e2c8be5d9fe17d',3,200),(13,'amine','belhasan','amine.ih96@gmail.com','feb031f2cef8310b7fbc6bb7c068a77e',3,401),(14,'amine','belhasan','amine.ab96@gmail.com','ad0a5ca6ceec1224064c4c5370608713',3,401),(15,'amine','belhasan','amine.ihab9@gmail.com','5e1686d264afa3dd1e57c0c1143df9f6',3,200),(16,'qkjqskj','belhasanjc','amihab96@gmail.com','0216a553b07160e681cc17495d34e281',3,200),(17,'amine','belhasan','amiihab96@gmail.com','e3e805bea9ffd872993182ccd8d3ed05',3,200);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-28 19:06:38
