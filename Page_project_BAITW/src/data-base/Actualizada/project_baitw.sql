-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2023 a las 03:46:23
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

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
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `id_transaccion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `status` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `id_cliente` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Total` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_productos` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,3) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nombres` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descrip` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` tinyint(3) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `nombres`, `descrip`, `precio`, `descuento`, `id_categoria`, `activo`) VALUES
(1, 'Bicicleta Todo Terreno', '<br>\r\n<p>Bicicleta Hibrida todo terreno</p>\r\n<br>\r\n<b>Características:</b>\r\n<br>\r\n<ul>\r\n  <li><b>Marco:</b><br>El marco de las bicicletas todoterreno es más grande y ancho que el de una convencional. También es más resistente. Sin embargo, esto no significa que sea pesado, pues hay de todo tipo de materiales, desde aluminio hasta fibra de carbono <b>el más liviano</b>.</li>\r\n\r\n  <li><b>Ruedas:</b><br>Son tres las ruedas, por tamaño, la de la bicicleta de montaña. Las de 26 pulgadas son las convencionales, las elegidas cuando apenas se comienza a rodar; son para usar con moderación. La de 27.5 pulgadas suelen ser la mejor opción: generan mayor tracción y volumen de aire que las rin 26. Por último, están las de 29 pulgadas, caracterizadas por dar mayor estabilidad y garantizar una conducción más suave.</li>\r\n\r\n  <li><b>Suspención:</b><br> Es útil al descender por trechos complicados a toda velocidad. Las que tienen suspensión delantera son las más utilizadas, no solo por ser más ligeras, sino baratas; son casi tan cómodas como las primeras. De otro lado, están las rígidas, sin suspensión, extralivianas y más rápidas en el asfalto.</li>\r\n</ul>', '850.00', 5, 1, 1),
(2, 'Bicicleta Semiprofecional', '<br>\r\n<p>Bicicleta Semi todo terreno</p>\r\n<br>\r\n<b>Características:</b>\r\n<br>\r\n<ul>\r\n  <li><b>Marco:</b><br>El marco de las bicicletas todoterreno es más grande y ancho que el de una convencional. También es más resistente. Sin embargo, esto no significa que sea pesado, pues hay de todo tipo de materiales, desde aluminio hasta fibra de carbono <b>el más liviano</b>.</li>\r\n\r\n  <li><b>Ruedas:</b><br>Son tres las ruedas, por tamaño, la de la bicicleta de montaña. Las de 26 pulgadas son las convencionales, las elegidas cuando apenas se comienza a rodar; son para usar con moderación. La de 27.5 pulgadas suelen ser la mejor opción: generan mayor tracción y volumen de aire que las rin 26. Por último, están las de 29 pulgadas, caracterizadas por dar mayor estabilidad y garantizar una conducción más suave.</li>\r\n\r\n  <li><b>Suspención:</b><br> Es útil al descender por trechos complicados a toda velocidad. Las que tienen suspensión delantera son las más utilizadas, no solo por ser más ligeras, sino baratas; son casi tan cómodas como las primeras. De otro lado, están las rígidas, sin suspensión, extralivianas y más rápidas en el asfalto.</li>\r\n</ul>', '1200.00', 3, 1, 1),
(3, 'Bicicleta Profecional Todoterreno', '<br>\r\n<p>Bicicleta Hibrida todo terreno</p>\r\n<br>\r\n<b>Características:</b>\r\n<br>\r\n<ul>\r\n  <li><b>Marco:</b><br>El marco de las bicicletas todoterreno es más grande y ancho que el de una convencional. También es más resistente. Sin embargo, esto no significa que sea pesado, pues hay de todo tipo de materiales, desde aluminio hasta fibra de carbono <b>el más liviano</b>.</li>\r\n\r\n  <li><b>Ruedas:</b><br>Son tres las ruedas, por tamaño, la de la bicicleta de montaña. Las de 26 pulgadas son las convencionales, las elegidas cuando apenas se comienza a rodar; son para usar con moderación. La de 27.5 pulgadas suelen ser la mejor opción: generan mayor tracción y volumen de aire que las rin 26. Por último, están las de 29 pulgadas, caracterizadas por dar mayor estabilidad y garantizar una conducción más suave.</li>\r\n\r\n  <li><b>Suspención:</b><br> Es útil al descender por trechos complicados a toda velocidad. Las que tienen suspensión delantera son las más utilizadas, no solo por ser más ligeras, sino baratas; son casi tan cómodas como las primeras. De otro lado, están las rígidas, sin suspensión, extralivianas y más rápidas en el asfalto.</li>\r\n</ul>', '2500.00', 10, 1, 1),
(4, 'N/a', 'N/A', '0.00', 0, 1, 1),
(5, 'N/A', 'N/A', '0.00', 0, 1, 1),
(6, 'N/A', 'N/A', '0.00', 0, 1, 1),
(7, 'N/a', 'N/A', '0.00', 0, 1, 1),
(8, 'N/A', 'N/A', '0.00', 0, 1, 1),
(9, 'N/A', 'N/A', '0.00', 0, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
