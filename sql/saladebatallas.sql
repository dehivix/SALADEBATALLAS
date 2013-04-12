-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-03-2011 a las 16:36:47
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `saladebatallas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `cedula` char(10) NOT NULL,
  `nombres` char(30) NOT NULL,
  `apellidos` char(50) NOT NULL,
  `sexo` char(10) NOT NULL,
  `fecha` date NOT NULL,
  `direccion` char(100) NOT NULL,
  `celular` char(15) NOT NULL,
  `telecasa` char(15) NOT NULL,
  `usuario` char(30) NOT NULL,
  `clave` char(15) NOT NULL,
  PRIMARY KEY  (`cedula`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `admin`
--

INSERT INTO `admin` (`cedula`, `nombres`, `apellidos`, `sexo`, `fecha`, `direccion`, `celular`, `telecasa`, `usuario`, `clave`) VALUES
('19833191', 'Eliezer Jose', 'Romero Carrasquero', 'Masculino', '1990-10-08', 'C/ 23 de Enero numero 1 la pica - palo negro', '04162381181', '02432677173', 'admin', '0000'),
('20363511', 'Dehivis', 'Perez', 'M', '1990-06-05', 'Tucupido-Edo Guarico', '0000000', '0000000', 'dehivix', '123'),
('19418493', 'Jhonny Jose', 'Perez Alvarado', 'm', '1990-01-24', 'Villa de cura - Edo Aragua', '04163465470', '0000000', 'jhonny', 'system240190');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carpetas`
--

CREATE TABLE IF NOT EXISTS `carpetas` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `carpetas`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `asunto` varchar(50) NOT NULL,
  `mensaje` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `email`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL auto_increment,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `sitio` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `informacion` varchar(500) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `eventos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `titulo` text,
  `texto` text,
  `fecha` date default NULL,
  `tipo_noticia` varchar(12) default NULL,
  `imagen` varchar(30) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `noticias`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `video_id` int(11) NOT NULL auto_increment,
  `video_url` varchar(255) default NULL,
  `video_title` varchar(255) default NULL,
  PRIMARY KEY  (`video_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `videos`
--

