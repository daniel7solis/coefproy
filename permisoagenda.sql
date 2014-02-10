-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-02-2014 a las 03:07:02
-- Versión del servidor: 5.5.35-0ubuntu0.13.10.2
-- Versión de PHP: 5.5.3-1ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `permisoagenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE IF NOT EXISTS `citas` (
  `idCita` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `idDoctor` int(11) NOT NULL,
  PRIMARY KEY (`idPaciente`,`idDoctor`,`idCita`),
  KEY `idCita` (`idCita`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`idCita`, `fecha`, `hora`, `idPaciente`, `idDoctor`) VALUES
(2, '2014-02-06', '9:00am', 1, 2),
(1, '2014-02-06', '7:00am', 1, 3),
(3, '2014-02-06', '3:00pm', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE IF NOT EXISTS `modulos` (
  `idModulo` int(11) NOT NULL AUTO_INCREMENT,
  `modName` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idModulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`idModulo`, `modName`) VALUES
(1, 'Datos Generales'),
(2, 'Marketing'),
(3, 'Comercial/ventas'),
(4, 'Agenda'),
(5, 'Produccion'),
(6, 'Administracion'),
(7, 'Finanzas'),
(8, 'Super');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newPaciente`
--

CREATE TABLE IF NOT EXISTS `newPaciente` (
  `nombre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `apeidos` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `edad` int(3) NOT NULL,
  `fecha_nac` date NOT NULL,
  `email` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `idSucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Paciente`
--

CREATE TABLE IF NOT EXISTS `Paciente` (
  `idPaciente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `apeidos` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `edad` int(3) NOT NULL,
  `fecha_nac` date NOT NULL,
  `email` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `idSucursal` int(11) NOT NULL,
  PRIMARY KEY (`idPaciente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `Paciente`
--

INSERT INTO `Paciente` (`idPaciente`, `nombre`, `apeidos`, `direccion`, `edad`, `fecha_nac`, `email`, `tel`, `idSucursal`) VALUES
(1, 'Daniel', 'Vega Ceja', 'San Pablo #344', 21, '1192-09-07', 'ing_dvega@hotmail.com', '3515092158', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `idModulo` int(11) NOT NULL AUTO_INCREMENT,
  `idPosicion` int(11) NOT NULL,
  `accesoTotal` tinyint(1) NOT NULL,
  `creacion` tinyint(1) NOT NULL,
  `edicion` tinyint(1) NOT NULL,
  `lectura` int(11) NOT NULL,
  `anexar` tinyint(1) NOT NULL,
  `impresion` tinyint(1) NOT NULL,
  PRIMARY KEY (`idModulo`,`idPosicion`,`accesoTotal`,`creacion`,`edicion`,`lectura`,`anexar`,`impresion`),
  KEY `modulo` (`idModulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idModulo`, `idPosicion`, `accesoTotal`, `creacion`, `edicion`, `lectura`, `anexar`, `impresion`) VALUES
(1, 1, 0, 1, 1, 1, 1, 1),
(1, 2, 0, 1, 1, 1, 1, 1),
(1, 3, 0, 1, 1, 1, 1, 1),
(1, 4, 0, 0, 0, 0, 0, 0),
(1, 5, 0, 1, 1, 1, 1, 1),
(1, 6, 0, 1, 1, 1, 1, 1),
(1, 7, 0, 0, 1, 1, 1, 1),
(2, 1, 0, 1, 1, 1, 1, 1),
(2, 2, 0, 0, 1, 1, 1, 1),
(2, 3, 0, 0, 1, 1, 1, 1),
(2, 4, 0, 1, 0, 0, 0, 0),
(2, 5, 0, 1, 0, 1, 1, 1),
(2, 6, 0, 1, 0, 1, 1, 1),
(2, 7, 0, 1, 0, 1, 1, 1),
(3, 1, 0, 1, 1, 1, 1, 1),
(3, 2, 0, 1, 0, 1, 1, 1),
(3, 3, 0, 0, 0, 1, 0, 1),
(3, 5, 0, 0, 0, 1, 0, 1),
(3, 6, 0, 0, 0, 1, 0, 1),
(3, 7, 0, 0, 0, 0, 0, 0),
(4, 1, 0, 0, 0, 0, 0, 0),
(4, 2, 0, 0, 0, 0, 0, 0),
(4, 3, 0, 0, 0, 0, 0, 0),
(4, 4, 0, 0, 0, 0, 0, 0),
(4, 5, 0, 1, 1, 1, 1, 1),
(4, 6, 0, 1, 1, 1, 1, 1),
(4, 7, 0, 0, 0, 0, 0, 0),
(5, 1, 0, 1, 1, 1, 1, 1),
(5, 2, 0, 1, 0, 1, 1, 1),
(5, 3, 0, 0, 0, 1, 0, 1),
(5, 4, 0, 1, 0, 1, 1, 1),
(5, 5, 0, 0, 0, 0, 0, 0),
(5, 6, 0, 0, 0, 0, 0, 0),
(5, 7, 0, 0, 0, 0, 0, 0),
(6, 1, 0, 1, 1, 1, 1, 1),
(6, 2, 0, 1, 0, 1, 1, 1),
(6, 3, 0, 0, 0, 1, 0, 1),
(6, 4, 0, 1, 0, 1, 1, 1),
(6, 5, 0, 0, 0, 0, 0, 0),
(6, 6, 0, 0, 0, 0, 0, 0),
(6, 7, 0, 0, 0, 0, 0, 0),
(7, 1, 0, 0, 1, 1, 1, 1),
(7, 2, 0, 1, 0, 1, 1, 1),
(7, 3, 0, 0, 0, 1, 0, 1),
(7, 4, 0, 0, 0, 1, 0, 0),
(7, 5, 0, 0, 0, 1, 0, 1),
(7, 6, 0, 0, 0, 1, 0, 1),
(7, 7, 0, 1, 0, 0, 0, 1),
(8, 8, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisosforaneos`
--

CREATE TABLE IF NOT EXISTS `permisosforaneos` (
  `idModulo` int(11) NOT NULL AUTO_INCREMENT,
  `idPosicion` int(11) NOT NULL,
  `accesoTotal` tinyint(1) NOT NULL,
  `creacion` tinyint(1) NOT NULL,
  `edicion` tinyint(1) NOT NULL,
  `lectura` int(11) NOT NULL,
  `anexar` tinyint(1) NOT NULL,
  `impresion` tinyint(1) NOT NULL,
  PRIMARY KEY (`idModulo`,`idPosicion`,`accesoTotal`,`creacion`,`edicion`,`lectura`,`anexar`,`impresion`),
  KEY `modulo` (`idModulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `permisosforaneos`
--

INSERT INTO `permisosforaneos` (`idModulo`, `idPosicion`, `accesoTotal`, `creacion`, `edicion`, `lectura`, `anexar`, `impresion`) VALUES
(1, 1, 0, 0, 0, 1, 0, 1),
(1, 2, 0, 0, 0, 1, 0, 1),
(1, 3, 0, 0, 0, 1, 0, 1),
(1, 4, 0, 0, 0, 1, 0, 1),
(1, 5, 0, 0, 0, 1, 0, 1),
(1, 6, 0, 0, 0, 1, 0, 1),
(1, 7, 0, 0, 0, 1, 0, 1),
(2, 1, 0, 0, 0, 1, 0, 1),
(2, 2, 0, 0, 0, 1, 0, 1),
(2, 3, 0, 0, 0, 1, 0, 1),
(2, 4, 0, 0, 0, 1, 0, 1),
(2, 5, 0, 0, 0, 1, 0, 1),
(2, 6, 0, 0, 0, 1, 0, 1),
(2, 7, 0, 0, 0, 1, 0, 1),
(3, 1, 0, 0, 0, 1, 0, 1),
(3, 2, 0, 0, 0, 1, 0, 1),
(3, 3, 0, 0, 0, 1, 0, 1),
(3, 5, 0, 0, 0, 1, 0, 1),
(3, 6, 0, 0, 0, 1, 0, 1),
(3, 7, 0, 0, 0, 1, 0, 1),
(4, 1, 0, 0, 0, 1, 0, 1),
(4, 2, 0, 0, 0, 1, 0, 1),
(4, 3, 0, 0, 0, 1, 0, 1),
(4, 4, 0, 0, 0, 1, 0, 1),
(4, 5, 0, 0, 0, 1, 0, 1),
(4, 6, 0, 0, 0, 1, 0, 1),
(4, 7, 0, 0, 0, 1, 0, 1),
(5, 1, 0, 0, 0, 1, 0, 1),
(5, 2, 0, 0, 0, 1, 0, 1),
(5, 3, 0, 0, 0, 1, 0, 1),
(5, 4, 0, 0, 0, 1, 0, 1),
(5, 5, 0, 0, 0, 1, 0, 1),
(5, 6, 0, 0, 0, 1, 0, 1),
(5, 7, 0, 0, 0, 1, 0, 1),
(6, 1, 0, 0, 0, 1, 0, 1),
(6, 2, 0, 0, 0, 1, 0, 1),
(6, 3, 0, 0, 0, 1, 0, 1),
(6, 4, 0, 0, 0, 1, 0, 1),
(6, 5, 0, 0, 0, 1, 0, 1),
(6, 6, 0, 0, 0, 1, 0, 1),
(6, 7, 0, 0, 0, 1, 0, 1),
(7, 1, 0, 0, 0, 1, 0, 1),
(7, 2, 0, 0, 0, 1, 0, 1),
(7, 3, 0, 0, 0, 1, 0, 1),
(7, 4, 0, 0, 0, 1, 0, 1),
(7, 5, 0, 0, 0, 1, 0, 1),
(7, 6, 0, 0, 0, 1, 0, 1),
(7, 7, 0, 0, 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisosusuarios`
--

CREATE TABLE IF NOT EXISTS `permisosusuarios` (
  `idPermisos` int(11) NOT NULL AUTO_INCREMENT,
  `idSucursal` int(11) NOT NULL,
  `IdUsuarios` int(11) NOT NULL,
  `IdModulo` int(11) NOT NULL,
  `IdPosicion` int(11) NOT NULL,
  PRIMARY KEY (`idPermisos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `permisosusuarios`
--

INSERT INTO `permisosusuarios` (`idPermisos`, `idSucursal`, `IdUsuarios`, `IdModulo`, `IdPosicion`) VALUES
(1, 1, 1, 8, 8),
(2, 1, 2, 5, 1),
(3, 1, 2, 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posicion`
--

CREATE TABLE IF NOT EXISTS `posicion` (
  `idPosicion` int(11) NOT NULL AUTO_INCREMENT,
  `posicionName` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idPosicion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `posicion`
--

INSERT INTO `posicion` (`idPosicion`, `posicionName`) VALUES
(1, 'Gerente De Departamento'),
(2, 'Cabecera de Departamento'),
(3, 'Cabecera fuera de Dep'),
(4, 'Administrativo'),
(5, 'Secretario'),
(6, 'Recepcionista'),
(7, 'Empleado'),
(8, 'Super Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(1) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` text COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `curp` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `rfc` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `semilla` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `contrasena`, `nombre`, `direccion`, `telefono`, `email`, `curp`, `rfc`, `semilla`) VALUES
(1, 'root', '0ff234d1fdaaa63a658c09421162296d013fbe02ea3ec272dab25b75768f10574b02f13e736d9d5bd0374be17190a7d7b5ed3593199609c629aee5bb3445024f', '', '', '', '', '', '', 'c5045cf9b602c65154b5b1cf11de19de0501d4b41100f624d38550bd42cb0e7d06cb8afe80b06e07733273025141e3e14a1353a38645704e5f27d8820542da25'),
(2, '', '8fb29448faee18b656030e8f5a8b9e9a695900f36a3b7d7ebb0d9d51e06c8569d81a55e39b481cf50546d697e7bde1715aa6badede8ddc801c739777be77f166', ' ', '', '', '', '', '', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`idPaciente`) REFERENCES `Paciente` (`idPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
