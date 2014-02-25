-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-02-2014 a las 22:43:53
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
  `hora` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `idDoctor` int(11) NOT NULL,
  PRIMARY KEY (`idPaciente`,`idDoctor`,`idCita`),
  KEY `idCita` (`idCita`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`idCita`, `fecha`, `hora`, `idPaciente`, `idDoctor`) VALUES
(6, '0000-00-00', '6:15am', 0, 0),
(1, '2014-02-25', '6:30am', 1, 3),
(5, '2014-02-25', '7:45am', 1, 5),
(4, '2014-02-25', '9:00am', 2, 1),
(2, '2014-02-25', '6:15am', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE IF NOT EXISTS `modulos` (
  `idModulo` int(11) NOT NULL AUTO_INCREMENT,
  `modName` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idModulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

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
(8, 'Super'),
(9, 'root');

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
(1, 'a', 'a', 'a', 21, '2014-02-11', 'a', 'a', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

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
(9, 9, 1, 1, 1, 1, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `permisosusuarios`
--

INSERT INTO `permisosusuarios` (`idPermisos`, `idSucursal`, `IdUsuarios`, `IdModulo`, `IdPosicion`) VALUES
(1, 1, 1, 9, 9),
(2, 2, 2, 6, 2),
(3, 2, 5, 6, 2),
(4, 1, 15, 3, 5),
(5, 1, 23, 2, 1),
(6, 1, 28, 4, 6),
(7, 1, 3, 8, 8),
(8, 1, 3, 8, 8),
(9, 1, 4, 3, 4),
(10, 1, 5, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posicion`
--

CREATE TABLE IF NOT EXISTS `posicion` (
  `idPosicion` int(11) NOT NULL AUTO_INCREMENT,
  `posicionName` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idPosicion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

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
(8, 'Super Usuario'),
(9, 'root');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Sucursal`
--

CREATE TABLE IF NOT EXISTS `Sucursal` (
  `idSucursal` int(3) NOT NULL AUTO_INCREMENT,
  `nombreSucursal` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `direccionSucursal` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idSucursal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `Sucursal`
--

INSERT INTO `Sucursal` (`idSucursal`, `nombreSucursal`, `direccionSucursal`) VALUES
(1, '1', 'OCOTLAN JALISCO'),
(2, '2', 'JIQUILPAN MICHOACAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tempCitas`
--

CREATE TABLE IF NOT EXISTS `tempCitas` (
  `idCita` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `idDoctor` int(11) NOT NULL,
  PRIMARY KEY (`idPaciente`,`idDoctor`,`idCita`),
  UNIQUE KEY `idCita_2` (`idCita`),
  KEY `idCita` (`idCita`),
  KEY `idCita_3` (`idCita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tempCitas`
--

INSERT INTO `tempCitas` (`idCita`, `fecha`, `hora`, `idPaciente`, `idDoctor`) VALUES
(3, '2014-02-25', '6:30am', 1, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `contrasena`, `nombre`, `direccion`, `telefono`, `email`, `curp`, `rfc`, `semilla`) VALUES
(1, 'root', '0ff234d1fdaaa63a658c09421162296d013fbe02ea3ec272dab25b75768f10574b02f13e736d9d5bd0374be17190a7d7b5ed3593199609c629aee5bb3445024f', 'ROOT', '', '', '', '', '', 'c5045cf9b602c65154b5b1cf11de19de0501d4b41100f624d38550bd42cb0e7d06cb8afe80b06e07733273025141e3e14a1353a38645704e5f27d8820542da25'),
(2, 'VegaCejaD', '521327041573bb189b2b924dc64aeb364e29cbca1c75ac80a6d2e54cbb77b01d74755867abf620247d2ebe6b1f107cb5d688e42575080103d80fe2bf0873894a', 'Daniel Vega Ceja', 'San Pablo 344 Valle de Sa', '3512345678', 'ingdanivega@hotmail.com', 'VECD1234567890', 'VECD1234567898', '063b7c9bd56ffa53924387a1282a7c3e7a626d6171d4500b34f76b94306b245337dd5bae2d02d24991f18f6a1d0f4473d25459e134b7100ab3a2e1221b61d06e'),
(3, 'SierraRosasD', '9124a06df6094565cf6e0991602878ded6f630f9d440895e1cb3f8c4ac3a4080ee628b4906b3d398e293b4ca2ba73ed2bec973eac5ac41f44c6af1ff1b22a82a', 'Deheny Sierra Rosas', 'Cobalto 56 Col. Salinas d', '3512345678', 'deheny_12@gmail.com', 'SRDE12345678', 'SRDE987654', '0f231d7b7268963ee414678cfac293ee71345ea5c9fcbb37f97a99bab3353788a1b16a860416988618ea9531fc87f20498c101680b2fc73f432231caa3f1fe37');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
