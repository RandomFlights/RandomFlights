-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-06-2016 a las 09:42:46
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
-- Estructura de tabla para la tabla `hoteles`
--

CREATE TABLE IF NOT EXISTS `hoteles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `ciudad` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `hoteles`
--

INSERT INTO `hoteles` (`id`, `nombre`, `precio`, `ciudad`, `direccion`, `imagen`) VALUES
(1, 'Clement_Barajas', 40, 'Madrid', 'Avenida_General,_43,_Barajas,_28042_Madrid,_España', ''),
(2, 'Holiday_Inn_Paris_Gare_de_l''Est', 50, 'Paris', '5_rue_du_8_Mai_1945,_République_-_10º_distrito,_75010_París,_Francia', ''),
(3, 'Motel_One_Berlin-Tiergarten', 35, 'Berlin', 'An_der_Urania_12/14,_Tempelhof-Schöneberg,_10787_Berlín,_Alemania', ''),
(4, 'Kyriad_Hotel_Paris_Bercy_Village', 70, 'Paris', '19,_Rue_Baron_Le_Roy,_Bercy_-_12º_distrito,_75012_París,_Francia', ''),
(5, 'Quentin_Boutique_Hotel', 60, 'Berlin', 'Neue_Kantstraße_1,_Charlottenburg-Wilmersdorf,_14057_Berlín,_Alemania', ''),
(6, 'Hotel_Market', 45, 'Barcelona', 'Comte_Borrell,_68,_Eixample,_08015_Barcelona,_España', ''),
(7, 'St_Giles_London', 50, 'Londres', 'Bedford_Avenue,_Camden,_Londres,_WC1B_3GH,_Reino_Unido', ''),
(9, 'Catalonia_Sagrada_Familia', 40, 'Barcelona', 'Aragón,_569_Bis,_Sant_Martí,_08026_Barcelona,_España', ''),
(10, 'Hôtel_de_France_Gare_de_Lyon_Bastille', 55, 'Paris', '12_rue_de_Lyon,_Bercy_-_12º_distrito,_75012_París,_Francia', ''),
(12, 'Hotel_Mora', 55, 'Madrid', 'Paseo_del_Prado,_32,_Centro_de_Madrid,_28014_Madrid,_España', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `nombre` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` int(9) NOT NULL,
  `fechaNac` varchar(25) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`nombre`, `password`, `email`, `telefono`, `fechaNac`) VALUES
('Adri', 'adri', 'adri@gmail.com', 123456789, '1995-04-02'),
('Diego', 'Diego', 'diego@gmail.com', 789456123, '1989-01-01'),
('Jaime', 'jaime', 'jaime@gmail.com', 987654321, '1996-07-09'),
('Usuario', 'prueba', 'usuario@gmail.com', 123456789, '01-01-1990');

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
