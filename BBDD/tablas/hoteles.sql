-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-06-2016 a las 09:42:58
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
