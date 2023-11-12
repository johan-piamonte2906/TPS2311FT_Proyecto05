CREATE DATABASE  IF NOT EXISTS `project_baiatw` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `project_baiatw`;
-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: project_baiatw
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(120) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token_password` varchar(40) DEFAULT NULL,
  `password_request` tinyint NOT NULL DEFAULT '0',
  `activo` tinyint NOT NULL,
  `fecha_alta` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'JohanPiamonte','$2y$10$5XZzJBXhF4eXqAONkyiMMOmhb33wU8Fh/NoO8SRcBmOi/PFNPMPmu','Administrador','johanm2004@gmail.com',NULL,0,1,'2023-11-11 14:21:50'),(2,'KarenSofia','$2y$10$SGkBK2ugUJiJEpjriX4hsODkpiH4/XbUPgI9ewMQWGyBEnq4EEM9G','Administrador','alvarezricok@gmail.com',NULL,0,1,'2023-11-11 17:54:39');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `activo` tinyint DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Repuestos',1),(2,'Bicicleta para Adultos',1),(3,'Bicicleta para niños',1),(4,'Accesorios',1);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `telefono` varchar(80) NOT NULL,
  `identificacion` varchar(45) NOT NULL,
  `estatus` tinyint NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Johan Harry','Piamonte Martinez','johanm2004@gmail.com','3227238532','1031802061',1,'2023-10-24 19:43:04',NULL,NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compra` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_transaccion` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `email` varchar(90) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `id_cliente` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `Total` decimal(10,3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` VALUES (1,'5AM78602T19857226','2023-09-12 01:45:50','COMPLETED','johanm2004@gmail.com','1',4221.500),(2,'1V8943313F362832H','2023-09-12 03:28:17','COMPLETED','jhpiamonte16@misena.edu.co','2',4221.500);
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `configuracion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `valor` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuracion`
--

LOCK TABLES `configuracion` WRITE;
/*!40000 ALTER TABLE `configuracion` DISABLE KEYS */;
INSERT INTO `configuracion` VALUES (1,'tienda_nombre','Bicycle Association Industry Around the World'),(2,'correo_email','projectbaitw.05@gmail.com'),(3,'correo_smtp','smtp.gmail.com'),(4,'correo_password','I6UZiVEutVqe5ou5nWnuGg==:c8HeRX3GBdiFjuGONSrP8K/hRrd5AiUyaSYnpjtdo4o='),(5,'correo_puerto','465');
/*!40000 ALTER TABLE `configuracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_compra`
--

DROP TABLE IF EXISTS `detalle_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_compra` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_compra` int NOT NULL,
  `id_productos` int NOT NULL,
  `nombre` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `precio` decimal(10,3) NOT NULL,
  `cantidad` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_compra`
--

LOCK TABLES `detalle_compra` WRITE;
/*!40000 ALTER TABLE `detalle_compra` DISABLE KEYS */;
INSERT INTO `detalle_compra` VALUES (1,1,1,'Bicicleta Todo Terreno',807.500,1),(2,1,2,'Bicicleta Semiprofecional',1164.000,1),(3,1,3,'Bicicleta Profecional Todoterreno',2250.000,1),(4,2,1,'Bicicleta Todo Terreno',807.500,1),(5,2,2,'Bicicleta Semiprofecional',1164.000,1),(6,2,3,'Bicicleta Profecional Todoterreno',2250.000,1);
/*!40000 ALTER TABLE `detalle_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `descrip` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` tinyint DEFAULT NULL,
  `stock` int DEFAULT '0',
  `id_categoria` int NOT NULL,
  `activo` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Bicicleta Todo Terreno','<p>Bicicleta Hibrida todo terreno<br><strong>Características:</strong>&nbsp;</p><ul><li><strong>Marco:</strong><br>El marco de las bicicletas todoterreno es más grande y ancho que el de una convencional. También es más resistente. Sin embargo, esto no significa que sea pesado, pues hay de todo tipo de materiales, desde aluminio hasta fibra de carbono <strong>el más liviano</strong>.</li><li><strong>Ruedas:</strong><br>Son tres las ruedas, por tamaño, la de la bicicleta de montaña. Las de 26 pulgadas son las convencionales, las elegidas cuando apenas se comienza a rodar; son para usar con moderación. La de 27.5 pulgadas suelen ser la mejor opción: generan mayor tracción y volumen de aire que las rin 26. Por último, están las de 29 pulgadas, caracterizadas por dar mayor estabilidad y garantizar una conducción más suave.</li><li><strong>Suspención:</strong><br>Es útil al descender por trechos complicados a toda velocidad. Las que tienen suspensión delantera son las más utilizadas, no solo por ser más ligeras, sino baratas; son casi tan cómodas como las primeras. De otro lado, están las rígidas, sin suspensión, extralivianas y más rápidas en el asfalto.</li></ul>',900.00,5,5,2,1),(2,'Bicicleta Semiprofecional','<p><strong>Características:</strong>&nbsp;</p><ul><li><strong>Marco:</strong><br>El marco de las bicicletas todoterreno es más grande y ancho que el de una convencional. También es más resistente. Sin embargo, esto no significa que sea pesado, pues hay de todo tipo de materiales, desde aluminio hasta fibra de carbono <strong>el más liviano</strong>.</li><li><strong>Ruedas:</strong><br>Son tres las ruedas, por tamaño, la de la bicicleta de montaña. Las de 26 pulgadas son las convencionales, las elegidas cuando apenas se comienza a rodar; son para usar con moderación. La de 27.5 pulgadas suelen ser la mejor opción: generan mayor tracción y volumen de aire que las rin 26. Por último, están las de 29 pulgadas, caracterizadas por dar mayor estabilidad y garantizar una conducción más suave.</li><li><strong>Suspención:</strong><br>Es útil al descender por trechos complicados a toda velocidad. Las que tienen suspensión delantera son las más utilizadas, no solo por ser más ligeras, sino baratas; son casi tan cómodas como las primeras. De otro lado, están las rígidas, sin suspensión, extralivianas y más rápidas en el asfalto.</li></ul>',1200.00,5,4,2,1),(3,'Bicicleta Profecional Todoterreno','<p><strong>Características:</strong>&nbsp;</p><p><strong>Marco:</strong><br>El marco de las bicicletas todoterreno es más grande y ancho que el de una convencional. También es más resistente. Sin embargo, esto no significa que sea pesado, pues hay de todo tipo de materiales, desde aluminio hasta fibra de carbono <strong>el más liviano</strong>.</p><p><strong>Ruedas:</strong><br>Son tres las ruedas, por tamaño, la de la bicicleta de montaña. Las de 26 pulgadas son las convencionales, las elegidas cuando apenas se comienza a rodar; son para usar con moderación. La de 27.5 pulgadas suelen ser la mejor opción: generan mayor tracción y volumen de aire que las rin 26. Por último, están las de 29 pulgadas, caracterizadas por dar mayor estabilidad y garantizar una conducción más suave.</p><p><strong>Suspención:</strong><br>Es útil al descender por trechos complicados a toda velocidad. Las que tienen suspensión delantera son las más utilizadas, no solo por ser más ligeras, sino baratas; son casi tan cómodas como las primeras. De otro lado, están las rígidas, sin suspensión, extra livianas y más rápidas en el asfalto.</p>',2500.00,10,5,2,1),(4,'Cadena de cros','Cadena de cros',80.00,0,7,1,0),(5,'Marco','Marco de GW',9000.00,3,10,1,0);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(40) NOT NULL,
  `password` varchar(150) NOT NULL,
  `activacion` int NOT NULL DEFAULT '0',
  `token` varchar(40) NOT NULL,
  `token_password` varchar(40) DEFAULT NULL,
  `password_request` int NOT NULL DEFAULT '0',
  `id_cliente` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'JohanPiamonte','$2y$10$JyznYUqJ5t9d7ijZ7B.GH.pLZa2.aqGNehNBGEdovBPMhx.lWAFBG',1,'',NULL,0,1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-11 17:59:33
