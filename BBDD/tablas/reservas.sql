-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-06-2016 a las 09:43:19
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
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destino` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `vuelo_ida` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `vuelo_vuelta` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `hotel` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion_hotel` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pvp_final` int(5) NOT NULL,
  `email_user` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `salida` date NOT NULL,
  `llegada` date NOT NULL,
  `hora_salida` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `hora_llegada` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pagado` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `destino`, `vuelo_ida`, `vuelo_vuelta`, `hotel`, `direccion_hotel`, `pvp_final`, `email_user`, `salida`, `llegada`, `hora_salida`, `hora_llegada`, `pagado`) VALUES
(9, 'Londres', 'EMIRATES', 'EMIRATES', 'St Giles London', 'Bedford Avenue, Camden, Londres, WC1B 3GH, Reino Unido', 936, 'Adri', '2016-02-02', '2016-02-06', '22:45:00', '06:00:00', 'Si'),
(14, 'Barcelona', 'LUFTHANSA', 'IBERIA', 'Catalonia Sagrada Familia', 'Aragón, 569 Bis, Sant Martí, 08026 Barcelona, España', 732, 'Adri', '2016-06-08', '2016-06-11', '07:20:00', '21:00:00', 'No'),
(17, 'Barcelona', 'IBERIA', 'IBERIA', 'Catalonia Sagrada Familia', 'Aragón, 569 Bis, Sant Martí, 08026 Barcelona, España', 666, 'Adri', '2016-06-09', '2016-06-11', '09:15:00', '21:00:00', 'No'),
(23, 'Barcelona', 'IBERIA', 'IBERIA', 'Catalonia Sagrada Familia', 'Aragón, 569 Bis, Sant Martí, 08026 Barcelona, España', 666, 'Adri', '2016-06-09', '2016-06-11', '09:15:00', '21:00:00', 'No'),
(24, 'Barcelona', 'IBERIA', 'IBERIA', 'Hotel Market', 'Comte Borrell, 68, Eixample, 08015 Barcelona, España', 696, 'Usuario', '2016-06-09', '2016-06-11', '09:15:00', '21:00:00', 'No'),
(25, 'Barcelona', 'IBERIA', 'IBERIA', 'Hotel Market', 'Comte Borrell, 68, Eixample, 08015 Barcelona, España', 696, 'Usuario', '2016-06-09', '2016-06-11', '09:15:00', '21:00:00', 'Si');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
