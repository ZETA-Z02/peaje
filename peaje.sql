-- MySQL dump 10.13  Distrib 8.0.37, for Linux (x86_64)
--
-- Host: localhost    Database: peaje
-- ------------------------------------------------------
-- Server version	8.0.37-0ubuntu0.22.04.3

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
-- Table structure for table `caja`
--

DROP TABLE IF EXISTS `caja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `caja` (
  `id_caja` int NOT NULL AUTO_INCREMENT,
  `id_personal` int NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `monto_inicial` double(4,1) DEFAULT NULL,
  PRIMARY KEY (`id_caja`),
  UNIQUE KEY `id_caja` (`id_caja`),
  KEY `id_personal` (`id_personal`),
  CONSTRAINT `caja_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caja`
--

LOCK TABLES `caja` WRITE;
/*!40000 ALTER TABLE `caja` DISABLE KEYS */;
/*!40000 ALTER TABLE `caja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `id_login` int NOT NULL AUTO_INCREMENT,
  `id_personal` int DEFAULT NULL,
  `usuario` int DEFAULT NULL,
  `password` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nivel_usuario` tinyint DEFAULT NULL,
  PRIMARY KEY (`id_login`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `id_personal` (`id_personal`),
  CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (3,2,72535244,'$2y$10$ABAd5dD856on6cdrO/EzUOAH2duouMJmOjVhnjzkB.LeY0DJEjg.i',1),(4,3,72535242,'$2y$10$omjDZLPX0vVRxhu8BzOkmOFSl9Z4SWhdN/b7jgXOKW5a0kMPGGMDW',2),(5,5,123,'$2y$10$qLIQO0a3xk.gjXaJ3Ma/Eu/vLrrQrqfoQHSKD9A4JOG/qWCShSDZK',1),(6,6,75925341,'$2y$10$D0TXk8E1tScgxyVlz4tPfuRs0pD2EK47M3TgEPIiHsxKebrieC/Tq',1),(7,7,76543210,'$2y$10$w/u1Y/.y22xMNNZORobB3ORprL6JBd4ixoe.dl0QEyheYmx2qPLt2',3),(8,16,71441862,'$2y$10$Lf0Ew3ib0JiM6FpU2V.74OdChCK.SQCMlgH2twJOR5XdKMRGTAFSW',2),(9,17,40963139,'$2y$10$Lx9.5baf.OgmX4yEIznHUe018jIj6BQ8Kh7DbCZlRlTJ2nSstO2XS',3),(11,21,74815001,'$2y$10$TzJ1618rmTWvt1jJJ9Mnd.ChKW8zlpqhnEc3yGwE2Dx4Qe/sWfAjm',3),(12,22,98310001,'$2y$10$68TmFwuyFrTyT4jU5ll/2ucyB5qhKYy705apWYPjrnP8tYraDW.L.',1),(13,24,1887733,'$2y$10$CyXkX4e/uadU2/ygQkpCaO89PvkWuLV7GBY.3KZRFM51nnNuWxaym',2);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal` (
  `id_personal` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dni` int DEFAULT NULL,
  `telefono` int DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `direccion` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `genero` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_personal`),
  UNIQUE KEY `dni` (`dni`),
  UNIQUE KEY `telefono` (`telefono`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (2,'jersson','quispe',72535244,998777712,'jersson@gmail.com','jr tupac tupanqui','masculino'),(3,'johan','quispe',72535242,921421413,'joha@gmail.com','jr tupac','masculino'),(5,'zeta','zeta',7232344,9324324,'zeta@gmail.com','jrpierdetebuscando','masculino'),(6,'diana','pacco',75925341,990803047,'paccochiquedia@senati.pe','salcedo','femenino'),(7,'edwim','quispe',76543210,123456789,'edwin@senati.pe','puno','masculino'),(14,'nbnb','nbhhghjgbhj',22555521,2147483647,'b','14jhighjkjhgcxcvbnm','mvnbv'),(16,'luchito','enrique',71441862,932646229,'lemaq.enrique@hotmail.com','mz 11 lt 03','masculino'),(17,'juliana','chique',40963139,987654321,'juliana@gmail.com','moquegua','femenino'),(21,'paola','cardenas',74815001,999999999,'paola@senati.pe','tacna','femenino'),(22,'gloria','chique',98310001,111111111,'gloria@gmail.com','arequipa','femenino'),(24,'orlando','yaba',1887733,555555555,'olrando@gmail.com','sicuani','masculino');
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registrovehiculos`
--

DROP TABLE IF EXISTS `registrovehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registrovehiculos` (
  `id_registro` int NOT NULL AUTO_INCREMENT,
  `placa` varchar(8) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_categoria` int DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `opcion_pago` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `monto` float DEFAULT NULL,
  `id_login` int DEFAULT NULL,
  `vuelto` float DEFAULT NULL,
  PRIMARY KEY (`id_registro`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_login` (`id_login`),
  CONSTRAINT `registroVehiculos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `tarifa` (`id_categoria`),
  CONSTRAINT `registroVehiculos_ibfk_2` FOREIGN KEY (`id_login`) REFERENCES `login` (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrovehiculos`
--

LOCK TABLES `registrovehiculos` WRITE;
/*!40000 ALTER TABLE `registrovehiculos` DISABLE KEYS */;
INSERT INTO `registrovehiculos` VALUES (1,'z2a-222',1,'2023-06-07','20:40:50','efectivo',20,5,NULL),(2,'z2a-222',1,'2023-06-07','22:34:34','ruc',957764000,5,NULL),(3,'z2a-222',1,'2023-06-07','22:39:38','efectivo',100,5,NULL),(4,'z2a-222',1,'2023-06-08','08:25:12','efectivo',99992100000,5,NULL),(5,'zx2-213',2,'2023-06-08','08:37:14','efectivo',100,5,NULL),(6,'zx2-213',3,'2023-06-08','08:38:18','efectivo',100,5,NULL),(7,'zx2-213',3,'2023-06-08','08:39:09','efectivo',100,5,NULL),(8,'z2a-222',1,'2023-06-08','08:41:14','efectivo',100,5,NULL),(9,'z2a-222',1,'2023-06-08','08:42:23','efectivo',20,5,NULL),(10,'z2a-222',1,'2023-06-08','08:44:10','efectivo',20,5,NULL),(11,'123-dfs',5,'2023-06-08','08:44:36','efectivo',200,5,NULL),(12,'123-dfs',5,'2023-06-08','08:44:44','efectivo',200,5,NULL),(13,'z2a-222',2,'2023-06-08','08:45:29','efectivo',40,5,NULL),(14,'z2a-222',1,'2023-06-08','08:46:14','efectivo',20,5,NULL),(15,'z2a-222',1,'2023-06-08','08:46:30','efectivo',50,5,NULL),(16,'z2a-222',1,'2023-06-08','08:50:55','efectivo',123,5,NULL),(17,'Z2AZZ',1,'2023-06-08','13:40:34','ruc',20,5,NULL),(18,'Z2AZZ',1,'2023-06-08','13:42:46','efectivo',40,5,NULL),(19,'Z2AZZ',1,'2023-06-08','14:14:22','efectivo',50,5,NULL);
/*!40000 ALTER TABLE `registrovehiculos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarifa`
--

DROP TABLE IF EXISTS `tarifa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tarifa` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `descripcion` text COLLATE utf8mb4_general_ci,
  `tarifa` float DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarifa`
--

LOCK TABLES `tarifa` WRITE;
/*!40000 ALTER TABLE `tarifa` DISABLE KEYS */;
INSERT INTO `tarifa` VALUES (1,'vehiculos ligeros',18.4),(2,'vehiculos pesados**2 ejes',36.8),(3,'vehiculos pesados**3 ejes',55.2),(4,'vehiculos pesados**4 ejes',73.6),(5,'vehiculos pesados**5 ejes',92),(6,'vehiculos pesados**6 ejes',110.4),(7,'vehiculos pesados**7 ejes',128.8),(8,'vehiculos pesados**8 ejes',147.2),(9,'vehiculos pesados**9 ejes',165.6),(10,'vehiculos pesados**10 ejes',184),(11,'vehiculos pesados**11 ejes',202.4),(12,'vehiculos pesados**12 ejes',220.8),(13,'vehiculos pesados**13 ejes',239.2),(14,'vehiculos pesados**14 ejes',257.6),(15,'vehiculos pesados**15 ejes',276);
/*!40000 ALTER TABLE `tarifa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-17 15:55:10
