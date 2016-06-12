-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-06-2016 a las 09:43:28
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `randomflights`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos`
--

CREATE TABLE IF NOT EXISTS `vuelos` (
  `id_vuelo` int(11) NOT NULL,
  `cia` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `origen` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `destino` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `salida` time NOT NULL,
  `max_pasajeros` int(3) NOT NULL,
  `precio` int(3) NOT NULL,
  `imagen` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_vuelo`),
  KEY `cia` (`cia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vuelos`
--

INSERT INTO `vuelos` (`id_vuelo`, `cia`, `origen`, `destino`, `fecha`, `salida`, `max_pasajeros`, `precio`, `imagen`) VALUES
(1, 'IBERIA', 'Barcelona', 'Madrid', '2016-06-11', '21:00:00', 200, 87, './media/img/companias/IBERIA.jpg'),
(2, 'SWISS', 'Barcelona', 'Madrid', '2016-08-24', '07:00:00', 200, 54, './media/img/companias/SWISS.jpg'),
(3, 'IBERIA', 'Madrid', 'Barcelona', '2016-08-25', '16:00:00', 200, 69, './media/img/companias/IBERIA.jpg'),
(4, 'AVIANCA', 'Madrid', 'Barcelona', '2015-02-24', '08:55:00', 200, 39, './media/img/companias/AVIANCA.jpg'),
(5, 'AVIANCA', 'Madrid', 'Londres', '2016-08-28', '06:50:00', 200, 51, './media/img/companias/AVIANCA.jpg'),
(6, 'LUFTHANSA', 'Madrid', 'Barcelona', '2016-06-08', '07:20:00', 200, 37, './media/img/companias/LUFTHANSA.jpg'),
(7, 'EMIRATES', 'Madrid', 'Londres', '2016-10-19', '22:45:00', 200, 56, './media/img/companias/EMIRATES.jpg'),
(8, 'IBERIA', 'Madrid', 'Barcelona', '2016-06-09', '09:15:00', 150, 55, './media/img/companias/IBERIA.jpg'),
(9, 'SWISS', 'Madrid', 'Berlin', '2016-11-23', '18:05:00', 200, 30, './media/img/companias/SWISS.jpg'),
(10, 'LUFTHANSA', 'Berlin', 'Madrid', '2015-02-24', '10:45:00', 200, 80, './media/img/companias/LUFTHANSA.jpg'),
(11, 'IBERIA', 'Paris', 'Madrid', '2015-02-28', '07:45:00', 8, 75, './media/img/companias/IBERIA.jpg'),
(12, 'EMIRATES', 'Londres', 'Madrid', '2016-10-22', '06:00:00', 200, 56, './media/img/companias/EMIRATES.jpg'),
(13, 'TURKISH', 'Berlin', 'Madrid', '2016-11-26', '12:20:00', 200, 51, './media/img/companias/TURKISH.jpg'),
(14, 'LUFTHANSA', 'Paris', 'Madrid', '2016-09-10', '19:25:00', 200, 44, './media/img/companias/LUFTHANSA.jpg'),
(15, 'IBERIA', 'Madrid', 'Paris', '2016-09-08', '06:50:00', 200, 44, './media/img/companias/IBERIA.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
