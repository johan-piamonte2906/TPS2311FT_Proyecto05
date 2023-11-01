-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2023 a las 16:10:24
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `project_baitw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(120) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token_password` varchar(40) DEFAULT NULL,
  `password_request` tinyint(4) NOT NULL DEFAULT 0,
  `activo` tinyint(4) NOT NULL,
  `fecha_alta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `usuario`, `password`, `nombre`, `email`, `token_password`, `password_request`, `activo`, `fecha_alta`) VALUES
(1, 'admin', '$2y$10$dkp.OmEJZgo7Cg8kaNJsvOHY5Hl.2ZYLgRzuw0isk.Uw3yjYCsjN.', 'Administrador', 'projectbaitw.05@gmail.com', NULL, 0, 1, 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `activo`) VALUES
(1, 'Repuestos', 1),
(2, 'Bicicleta Para  Adultos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `telefono` varchar(80) NOT NULL,
  `identificacion` varchar(45) NOT NULL,
  `estatus` tinyint(4) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `apellidos`, `email`, `telefono`, `identificacion`, `estatus`, `fecha_alta`, `fecha_modificacion`, `fecha_baja`) VALUES
(1, 'Johan Harry', 'Piamonte Martinez', 'johanharry002@hotmail.com', '3227238532', '3227238532', 1, '2023-09-06 16:47:58', NULL, NULL),
(2, 'Mao', 'Martin', 'mamartinezo@sena.edu.co', '3112111111', '80189664', 1, '2023-09-13 16:06:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `id_transaccion` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `email` varchar(90) NOT NULL,
  `id_cliente` varchar(20) NOT NULL,
  `Total` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `id_transaccion`, `fecha`, `status`, `email`, `id_cliente`, `Total`) VALUES
(1, '3TF23850TM377225E', '2023-08-09 20:11:12', 'COMPLETED', 'sb-iyykj25393096@personal.example.com', '1', '1164.000'),
(2, '80S29759RT493563E', '2023-08-09 20:17:49', 'COMPLETED', 'sb-iyykj25393096@personal.example.com', '1', '2126.000'),
(3, '32F71545112155723', '2023-09-06 22:55:38', 'COMPLETED', 'sb-iyykj25393096@personal.example.com', '1', '3456.000'),
(4, '5KH16094KB2836037', '2023-09-11 20:16:39', 'COMPLETED', 'johanharry002@hotmail.com', '1', '5000.000'),
(5, '5Y490101E8926340X', '2023-09-11 22:47:24', 'COMPLETED', 'johanharry002@hotmail.com', '1', '1615.000'),
(6, '4UT39738684628213', '2023-09-13 23:13:59', 'COMPLETED', 'mamartinezo@sena.edu.co', '2', '2236.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `valor` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `nombre`, `valor`) VALUES
(1, 'tienda_nombre', 'Bicycle Association Industry Around the World'),
(2, 'correo_email', 'projectbaiatw.05@gmail.com'),
(3, 'correo_smtp', 'smtp.gmail.com'),
(4, 'correo_password', 'H6tk3uWlOeotyfzsyq8lXQ==:S2ypVsu18TnUv4RQJhxS0+ZJcT8WXH7DuxIca3oIAqk='),
(5, 'correo_puerto', '465');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_productos` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` decimal(10,3) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `id_compra`, `id_productos`, `nombre`, `precio`, `cantidad`) VALUES
(1, 1, 2, 'Bicicleta Semiprofecional', '1164.000', 1),
(2, 2, 1, 'Bicicleta Todo Terreno', '807.500', 1),
(3, 2, 2, 'Bicicleta Semiprofecional', '1164.000', 1),
(4, 2, 3, 'Bicicleta Profecional Todoterreno', '2250.000', 1),
(5, 3, 1, 'Bicicleta Todo Terreno', '807.500', 1),
(6, 3, 2, 'Bicicleta Semiprofecional', '1164.000', 1),
(7, 3, 3, 'Bicicleta Profecional Todoterreno', '2250.000', 1),
(8, 4, 1, 'Bicicleta Todo Terreno', '807.500', 1),
(9, 4, 2, 'Bicicleta Semiprofecional', '1164.000', 1),
(10, 4, 3, 'Bicicleta Profecional Todoterreno', '2250.000', 1),
(11, 5, 1, 'Bicicleta Todo Terreno', '807.500', 2),
(12, 6, 2, 'Bicicleta Semiprofecional', '1164.000', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `descrip` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` tinyint(3) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `id_categoria` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `nombres`, `descrip`, `precio`, `descuento`, `stock`, `id_categoria`, `activo`) VALUES
(1, 'Bicicleta Todo Terreno', '<br>\r\n<p>Bicicleta Hibrida todo terreno</p>\r\n<br>\r\n<b>Características:</b>\r\n<br>\r\n<ul>\r\n  <li><b>Marco:</b><br>El marco de las bicicletas todoterreno es más grande y ancho que el de una convencional. También es más resistente. Sin embargo, esto no significa que sea pesado, pues hay de todo tipo de materiales, desde aluminio hasta fibra de carbono <b>el más liviano</b>.</li>\r\n\r\n  <li><b>Ruedas:</b><br>Son tres las ruedas, por tamaño, la de la bicicleta de montaña. Las de 26 pulgadas son las convencionales, las elegidas cuando apenas se comienza a rodar; son para usar con moderación. La de 27.5 pulgadas suelen ser la mejor opción: generan mayor tracción y volumen de aire que las rin 26. Por último, están las de 29 pulgadas, caracterizadas por dar mayor estabilidad y garantizar una conducción más suave.</li>\r\n\r\n  <li><b>Suspención:</b><br> Es útil al descender por trechos complicados a toda velocidad. Las que tienen suspensión delantera son las más utilizadas, no solo por ser más ligeras, sino baratas; son casi tan cómodas como las primeras. De otro lado, están las rígidas, sin suspensión, extralivianas y más rápidas en el asfalto.</li>\r\n</ul>', '850.00', 5, 0, 1, 1),
(2, 'Bicicleta Semiprofecional', '<br>\r\n<p>Bicicleta Semi todo terreno</p>\r\n<br>\r\n<b>Características:</b>\r\n<br>\r\n<ul>\r\n  <li><b>Marco:</b><br>El marco de las bicicletas todoterreno es más grande y ancho que el de una convencional. También es más resistente. Sin embargo, esto no significa que sea pesado, pues hay de todo tipo de materiales, desde aluminio hasta fibra de carbono <b>el más liviano</b>.</li>\r\n\r\n  <li><b>Ruedas:</b><br>Son tres las ruedas, por tamaño, la de la bicicleta de montaña. Las de 26 pulgadas son las convencionales, las elegidas cuando apenas se comienza a rodar; son para usar con moderación. La de 27.5 pulgadas suelen ser la mejor opción: generan mayor tracción y volumen de aire que las rin 26. Por último, están las de 29 pulgadas, caracterizadas por dar mayor estabilidad y garantizar una conducción más suave.</li>\r\n\r\n  <li><b>Suspención:</b><br> Es útil al descender por trechos complicados a toda velocidad. Las que tienen suspensión delantera son las más utilizadas, no solo por ser más ligeras, sino baratas; son casi tan cómodas como las primeras. De otro lado, están las rígidas, sin suspensión, extralivianas y más rápidas en el asfalto.</li>\r\n</ul>', '1200.00', 3, 0, 1, 1),
(3, 'Bicicleta Profecional Todoterreno', '<br>\r\n<p>Bicicleta Hibrida todo terreno</p>\r\n<br>\r\n<b>Características:</b>\r\n<br>\r\n<ul>\r\n  <li><b>Marco:</b><br>El marco de las bicicletas todoterreno es más grande y ancho que el de una convencional. También es más resistente. Sin embargo, esto no significa que sea pesado, pues hay de todo tipo de materiales, desde aluminio hasta fibra de carbono <b>el más liviano</b>.</li>\r\n\r\n  <li><b>Ruedas:</b><br>Son tres las ruedas, por tamaño, la de la bicicleta de montaña. Las de 26 pulgadas son las convencionales, las elegidas cuando apenas se comienza a rodar; son para usar con moderación. La de 27.5 pulgadas suelen ser la mejor opción: generan mayor tracción y volumen de aire que las rin 26. Por último, están las de 29 pulgadas, caracterizadas por dar mayor estabilidad y garantizar una conducción más suave.</li>\r\n\r\n  <li><b>Suspención:</b><br> Es útil al descender por trechos complicados a toda velocidad. Las que tienen suspensión delantera son las más utilizadas, no solo por ser más ligeras, sino baratas; son casi tan cómodas como las primeras. De otro lado, están las rígidas, sin suspensión, extralivianas y más rápidas en el asfalto.</li>\r\n</ul>', '2500.00', 10, 0, 1, 1),
(4, 'N/a', 'N/A', '0.00', 0, 0, 1, 0),
(5, 'N/A', 'N/A', '0.00', 0, 0, 1, 0),
(6, 'N/A', 'N/A', '0.00', 0, 0, 1, 0),
(7, 'N/a', 'N/A', '0.00', 0, 0, 1, 0),
(8, 'N/A', 'N/A', '0.00', 0, 0, 1, 0),
(9, 'N/A', 'N/A', '0.00', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `password` varchar(150) NOT NULL,
  `activacion` int(11) NOT NULL DEFAULT 0,
  `token` varchar(40) NOT NULL,
  `token_password` varchar(40) DEFAULT NULL,
  `password_request` int(11) NOT NULL DEFAULT 0,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `activacion`, `token`, `token_password`, `password_request`, `id_cliente`) VALUES
(1, 'Johan2906', '$2y$10$F2WKhoH9ReL8kowvzqtyjuuUXzdH9A31je.twLkQnoK0JA6mZA092', 1, '', '', 0, 1),
(2, 'Mao', '$2y$10$h87s0so0L1zjwR8Hxx2C0e6C0r7Gz4dov0Y3sjh4d/oxCZjQAMqvq', 1, '', NULL, 0, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
