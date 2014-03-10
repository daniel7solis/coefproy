-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2014 at 08:46 PM
-- Server version: 5.6.11
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `permisoagenda`
--
CREATE DATABASE IF NOT EXISTS `permisoagenda` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `permisoagenda`;

-- --------------------------------------------------------

--
-- Table structure for table `modulos`
--

CREATE TABLE IF NOT EXISTS `modulos` (
  `idModulo` int(11) NOT NULL AUTO_INCREMENT,
  `modName` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idModulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10;

--
-- Dumping data for table `modulos`
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


--
-- Table structure for table `permisos`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10;

--
-- Dumping data for table `permisos`
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
-- Table structure for table `permisosforaneos`
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
-- Dumping data for table `permisosforaneos`
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
-- Table structure for table `permisosusuarios`
--

CREATE TABLE IF NOT EXISTS `permisosusuarios` (
  `idPermisos` int(11) NOT NULL AUTO_INCREMENT,
  `idSucursal` int(11) NOT NULL,
  `IdUsuarios` int(11) NOT NULL,
  `IdModulo` int(11) NOT NULL,
  `IdPosicion` int(11) NOT NULL,
  PRIMARY KEY (`idPermisos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2;

--
-- Dumping data for table `permisosusuarios`
--

INSERT INTO `permisosusuarios` (`idPermisos`, `idSucursal`, `IdUsuarios`, `IdModulo`, `IdPosicion`) VALUES
(1, 0, 1, 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `posicion`
--

CREATE TABLE IF NOT EXISTS `posicion` (
  `idPosicion` int(11) NOT NULL AUTO_INCREMENT,
  `posicionName` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idPosicion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `posicion`
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
-- Table structure for table `usuarios`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `contrasena`,`nombre`,`semilla`) VALUES
(1, 'root', '0ff234d1fdaaa63a658c09421162296d013fbe02ea3ec272dab25b75768f10574b02f13e736d9d5bd0374be17190a7d7b5ed3593199609c629aee5bb3445024f','ROOT','c5045cf9b602c65154b5b1cf11de19de0501d4b41100f624d38550bd42cb0e7d06cb8afe80b06e07733273025141e3e14a1353a38645704e5f27d8820542da25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newPaciente`
--

CREATE TABLE IF NOT EXISTS `newPaciente` (
  `idPacTemp` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `apeidos` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `edad` int(3) NOT NULL,
  `fecha_nac` date NOT NULL,
  `email` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `idSucursal` int(11) NOT NULL,
  PRIMARY KEY (`idPacTemp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

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
  `fConsuCons` date NOT NULL,
  `peso` int(3) NOT NULL,
  `ta` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ahf` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `varicela` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `rubeola` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `sarampion` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `parotiditis` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `fiebre_reum` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `otros` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `qx` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `fx` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `alergias` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `hospitalizaciones` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `alimentacion` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `tabaquis` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `alcoho` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `transf` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `grupoRH` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `g` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `p` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `c` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `a` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `ivsa` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `par` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `fum` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `ritmo` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `dismino` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `dispare` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `fupap` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `mpf` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `embPrev` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `tumMama` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `infGeni` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `ardor` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `prurito` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idPaciente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `Paciente`
--

INSERT INTO `Paciente` (`idPaciente`, `nombre`, `apeidos`, `direccion`, `edad`, `fecha_nac`, `email`, `tel`, `idSucursal`) VALUES
(1, 'Daniel', 'Vega Ceja', 'San Pablo #344', 21, '1192-09-07', 'ing_dvega@hotmail.com', '3515092158', 1);

-- -------------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `ConsultaSub` (
  `idConsulta` int(3) NOT NULL AUTO_INCREMENT,
  `idPaciente` int(3) NOT NULL,
  `mamas` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `genitales` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dx` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `rx` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ex` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idConsulta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `Sucursal` (
  `idSucursal` int(3) NOT NULL AUTO_INCREMENT,
  `nombreSucursal` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `direccionSucursal` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idSucursal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3;

INSERT INTO `Sucursal` (`idSucursal`, `nombreSucursal`, `direccionSucursal`) VALUES
(1, 'SUCURSAL NUMERO 1','OCOTLAN JALISCO'),
(2,'SUCURSAL NUMERO 2','JIQUILPAN MICHOACAN');

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
  `isPac` int(3) NOT NULL,
  `idSucursal` int(3) NOT NULL,
  PRIMARY KEY (`idPaciente`,`idDoctor`,`idCita`),
  KEY `idCita` (`idCita`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`idCita`, `fecha`, `hora`, `idPaciente`, `idDoctor`, `minutos`,`isPac`,`idSucursal`) VALUES
(2, '2014-02-06', '9:00am', 1, 2, 30,1,1),
(1, '2014-02-06', '7:00am', 1, 3, 60,1,1),
(3, '2014-02-06', '3:00pm', 1, 4, 45,1,1);


-- --------------------------------------------------------
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
  KEY `idCita` (`idCita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tempCitas`
--

INSERT INTO `tempCitas` (`idCita`, `fecha`, `hora`, `idPaciente`, `idDoctor`, `minutos`, `usuario`) VALUES
(3, '2014-02-25', '6:30am', 1, 4, 60, 2);



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
