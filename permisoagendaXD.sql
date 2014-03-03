-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-03-2014 a las 20:34:17
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
  `minutos` int(3) NOT NULL,
  PRIMARY KEY (`idPaciente`,`idDoctor`,`idCita`),
  KEY `idCita` (`idCita`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`idCita`, `fecha`, `hora`, `idPaciente`, `idDoctor`, `minutos`) VALUES
(2, '2014-03-04', '6:30am', 1, 2, 30),
(3, '2014-03-04', '7:00am', 1, 4, 60),
(4, '2014-03-03', '6:00am', 1, 6, 45),
(5, '2014-03-03', '6:00am', 2, 1, 60),
(6, '2014-03-04', '6:00am', 2, 2, 60);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `Paciente`
--

INSERT INTO `Paciente` (`idPaciente`, `nombre`, `apeidos`, `direccion`, `edad`, `fecha_nac`, `email`, `tel`, `idSucursal`) VALUES
(1, 'Daniel', 'Vega Ceja', 'San Pablo #344', 21, '1192-09-07', 'ing_dvega@hotmail.com', '3515092158', 1),
(2, 'Deheny', 'Sierra Rosas', 'Cobalto 46 Col. Salinas d', 23, '1991-01-21', 'flower_de@hotmail.com', '3511234567', 1);

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
(8, 8, 1, 1, 1, 1, 1, 1),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `permisosusuarios`
--

INSERT INTO `permisosusuarios` (`idPermisos`, `idSucursal`, `IdUsuarios`, `IdModulo`, `IdPosicion`) VALUES
(1, 0, 1, 9, 9),
(2, 1, 2, 8, 8),
(3, 1, 3, 4, 6);

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
(1, 'SUCURSAL NUMERO 1', 'OCOTLAN JALISCO'),
(2, 'SUCURSAL NUMERO 2', 'JIQUILPAN MICHOACAN');

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
  `minutos` int(3) NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`idPaciente`,`idDoctor`,`idCita`),
  UNIQUE KEY `idCita_2` (`idCita`),
  KEY `idCita` (`idCita`),
  KEY `idCita_3` (`idCita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tempCitas`
--

INSERT INTO `tempCitas` (`idCita`, `fecha`, `hora`, `idPaciente`, `idDoctor`, `minutos`, `usuario`) VALUES
(7, '2014-03-03', '6:00am', 1, 3, 30, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(3) NOT NULL AUTO_INCREMENT,
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
(2, 'VegaCejaD', '521327041573bb189b2b924dc64aeb364e29cbca1c75ac80a6d2e54cbb77b01d74755867abf620247d2ebe6b1f107cb5d688e42575080103d80fe2bf0873894a', 'Daniel Vega Ceja', 'San Pablo #344 FFracc. Va', '3515092158', 'ingdanielito@youporn.com', 'qweqweqwe123', 'qweqweqwe456', '063b7c9bd56ffa53924387a1282a7c3e7a626d6171d4500b34f76b94306b245337dd5bae2d02d24991f18f6a1d0f4473d25459e134b7100ab3a2e1221b61d06e'),
(3, 'qq', '7e2e8d0627218ec9226d92e907eaaeb606d954335b244c0d1c26cddf80b0821579f23f2987928c8c34daa4ccba8462621c43b5e26a15da7ed678c7b10a9b67d3', 'q q', 'q', 'q', 'q', 'q', 'q', '2e96772232487fb3a058d58f2c310023e07e4017c94d56cc5fae4b54b44605f42a75b0b1f358991f8c6cbe9b68b64e5b2a09d0ad23fcac07ee9a9198a745e1d5');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
