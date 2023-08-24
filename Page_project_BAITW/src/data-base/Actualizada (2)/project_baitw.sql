-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: project_baitw
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (4,'Johan Harry','Piamonte Martinez','johanm2004@gmail.com','3227238532','1031802060',1,'2023-08-21 19:29:24',NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` VALUES (1,'1DP4184351266823A','2023-06-06 06:56:04','COMPLETED','sb-iyykj25393096@personal.example.com','D9L2986Y6XPTY',0.010),(2,'76C51051CY2611114','2023-06-06 07:03:30','COMPLETED','sb-iyykj25393096@personal.example.com','D9L2986Y6XPTY',0.010),(3,'68F47669DH123542N','2023-06-07 05:58:58','COMPLETED','sb-iyykj25393096@personal.example.com','D9L2986Y6XPTY',0.010),(4,'01130289R95021914','2023-06-07 06:18:01','COMPLETED','sb-iyykj25393096@personal.example.com','D9L2986Y6XPTY',0.010),(5,'0SV15204AL477544R','2023-08-21 04:26:57','COMPLETED','sb-iyykj25393096@personal.example.com','D9L2986Y6XPTY',0.010),(6,'69T10696GU957404L','2023-08-21 04:29:58','COMPLETED','sb-iyykj25393096@personal.example.com','D9L2986Y6XPTY',0.010),(7,'79L07225SA359110C','2023-08-21 04:36:16','COMPLETED','sb-iyykj25393096@personal.example.com','D9L2986Y6XPTY',0.010),(8,'3RL275587S841301W','2023-08-21 04:37:37','COMPLETED','sb-iyykj25393096@personal.example.com','D9L2986Y6XPTY',0.010),(9,'3XG8495464389924R','2023-08-21 04:41:56','COMPLETED','sb-iyykj25393096@personal.example.com','D9L2986Y6XPTY',0.010),(10,'1BL00314GK6906448','2023-08-21 04:45:07','COMPLETED','sb-iyykj25393096@personal.example.com','D9L2986Y6XPTY',0.010);
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_compra`
--

LOCK TABLES `detalle_compra` WRITE;
/*!40000 ALTER TABLE `detalle_compra` DISABLE KEYS */;
INSERT INTO `detalle_compra` VALUES (1,1,1,'Bicicleta Todo Terreno',807.500,3),(2,1,2,'Bicicleta Semiprofecional',1164.000,1),(3,1,3,'Bicicleta Profecional Todoterreno',2250.000,1),(4,2,3,'Bicicleta Profecional Todoterreno',2250.000,2),(5,3,1,'Bicicleta Todo Terreno',807.500,1),(6,4,1,'Bicicleta Todo Terreno',807.500,1),(7,5,1,'Bicicleta Todo Terreno',807.500,2),(8,6,1,'Bicicleta Todo Terreno',807.500,2),(9,7,1,'Bicicleta Todo Terreno',807.500,2),(10,8,1,'Bicicleta Todo Terreno',807.500,2),(11,9,1,'Bicicleta Todo Terreno',807.500,2),(12,9,2,'Bicicleta Semiprofecional',1164.000,1),(13,9,3,'Bicicleta Profecional Todoterreno',2250.000,1),(14,10,2,'Bicicleta Semiprofecional',1164.000,4);
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
  `id_categoria` int NOT NULL,
  `activo` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Bicicleta Todo Terreno','<br>\r\n<p>Bicicleta Hibrida todo terreno</p>\r\n<br>\r\n<b>Características:</b>\r\n<br>\r\n<ul>\r\n  <li><b>Marco:</b><br>El marco de las bicicletas todoterreno es más grande y ancho que el de una convencional. También es más resistente. Sin embargo, esto no significa que sea pesado, pues hay de todo tipo de materiales, desde aluminio hasta fibra de carbono <b>el más liviano</b>.</li>\r\n\r\n  <li><b>Ruedas:</b><br>Son tres las ruedas, por tamaño, la de la bicicleta de montaña. Las de 26 pulgadas son las convencionales, las elegidas cuando apenas se comienza a rodar; son para usar con moderación. La de 27.5 pulgadas suelen ser la mejor opción: generan mayor tracción y volumen de aire que las rin 26. Por último, están las de 29 pulgadas, caracterizadas por dar mayor estabilidad y garantizar una conducción más suave.</li>\r\n\r\n  <li><b>Suspención:</b><br> Es útil al descender por trechos complicados a toda velocidad. Las que tienen suspensión delantera son las más utilizadas, no solo por ser más ligeras, sino baratas; son casi tan cómodas como las primeras. De otro lado, están las rígidas, sin suspensión, extralivianas y más rápidas en el asfalto.</li>\r\n</ul>',850.00,5,1,1),(2,'Bicicleta Semiprofecional','<br>\r\n<p>Bicicleta Semi todo terreno</p>\r\n<br>\r\n<b>Características:</b>\r\n<br>\r\n<ul>\r\n  <li><b>Marco:</b><br>El marco de las bicicletas todoterreno es más grande y ancho que el de una convencional. También es más resistente. Sin embargo, esto no significa que sea pesado, pues hay de todo tipo de materiales, desde aluminio hasta fibra de carbono <b>el más liviano</b>.</li>\r\n\r\n  <li><b>Ruedas:</b><br>Son tres las ruedas, por tamaño, la de la bicicleta de montaña. Las de 26 pulgadas son las convencionales, las elegidas cuando apenas se comienza a rodar; son para usar con moderación. La de 27.5 pulgadas suelen ser la mejor opción: generan mayor tracción y volumen de aire que las rin 26. Por último, están las de 29 pulgadas, caracterizadas por dar mayor estabilidad y garantizar una conducción más suave.</li>\r\n\r\n  <li><b>Suspención:</b><br> Es útil al descender por trechos complicados a toda velocidad. Las que tienen suspensión delantera son las más utilizadas, no solo por ser más ligeras, sino baratas; son casi tan cómodas como las primeras. De otro lado, están las rígidas, sin suspensión, extralivianas y más rápidas en el asfalto.</li>\r\n</ul>',1200.00,3,1,1),(3,'Bicicleta Profecional Todoterreno','<br>\r\n<p>Bicicleta Hibrida todo terreno</p>\r\n<br>\r\n<b>Características:</b>\r\n<br>\r\n<ul>\r\n  <li><b>Marco:</b><br>El marco de las bicicletas todoterreno es más grande y ancho que el de una convencional. También es más resistente. Sin embargo, esto no significa que sea pesado, pues hay de todo tipo de materiales, desde aluminio hasta fibra de carbono <b>el más liviano</b>.</li>\r\n\r\n  <li><b>Ruedas:</b><br>Son tres las ruedas, por tamaño, la de la bicicleta de montaña. Las de 26 pulgadas son las convencionales, las elegidas cuando apenas se comienza a rodar; son para usar con moderación. La de 27.5 pulgadas suelen ser la mejor opción: generan mayor tracción y volumen de aire que las rin 26. Por último, están las de 29 pulgadas, caracterizadas por dar mayor estabilidad y garantizar una conducción más suave.</li>\r\n\r\n  <li><b>Suspención:</b><br> Es útil al descender por trechos complicados a toda velocidad. Las que tienen suspensión delantera son las más utilizadas, no solo por ser más ligeras, sino baratas; son casi tan cómodas como las primeras. De otro lado, están las rígidas, sin suspensión, extralivianas y más rápidas en el asfalto.</li>\r\n</ul>',2500.00,10,1,1),(4,'N/a','N/A',0.00,0,1,0),(5,'N/A','N/A',0.00,0,1,0),(6,'N/A','N/A',0.00,0,1,0),(7,'N/a','N/A',0.00,0,1,0),(8,'N/A','N/A',0.00,0,1,0),(9,'N/A','N/A',0.00,0,1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (3,'Johan2906','$2y$10$9mu6zxFopPBCktLSCbiqz.nniZbQCfRlrwgpSSXY3z10Vnw9.uuv2',0,'e56bee7cf2f8c24fb971110322995718',NULL,0,4);
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

-- Dump completed on 2023-08-23 18:06:25
