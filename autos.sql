-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 10.1.2.127:3306
-- Tiempo de generación: 29-03-2019 a las 00:25:32
-- Versión del servidor: 10.2.16-MariaDB
-- Versión de PHP: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u756079281_alqui`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos`
--

CREATE TABLE `autos` (
  `id_auto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `marca` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `modelo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `patente` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `viaja_chile` tinyint(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `autos`
--

INSERT INTO `autos` (`id_auto`, `id_categoria`, `marca`, `modelo`, `patente`, `viaja_chile`, `date`) VALUES
(1, 0, 'Renault', 'Clio', 'AA766KG', 0, '2019-01-23 22:24:46'),
(2, 0, 'chevrolet', 'Onix', 'AC173ZU', 1, '2019-01-23 22:25:21'),
(3, 0, 'Volkswagen', 'Gol Trend', 'AD308NK', 0, '2019-01-23 22:26:31'),
(4, 0, 'Volkswagen', 'Gol', 'OKX790', 0, '2019-01-23 22:27:10'),
(5, 0, 'Chevrolet', 'Corsa', 'AA635GB', 1, '2019-01-23 22:27:41'),
(6, 0, 'Chevrolet', 'Corsa', 'PGR449', 0, '2019-01-23 22:28:27'),
(7, 0, 'Chevrolet', 'Corsa', 'PIU834', 0, '2019-01-23 22:29:05'),
(8, 0, 'Renault', 'Kwid', 'AC287PN', 0, '2019-01-23 22:29:50'),
(9, 0, 'Chevrolet', 'Corsa', 'PQJ361', 0, '2019-01-23 22:30:11'),
(10, 0, 'Chevrolet', 'Corsa', 'AA701GC', 0, '2019-01-23 22:32:12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id_auto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autos`
--
ALTER TABLE `autos`
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autos`
--
ALTER TABLE `autos`
  ADD CONSTRAINT `autos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
