-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2014 at 11:30 PM
-- Server version: 5.5.35-0ubuntu0.13.10.2
-- PHP Version: 5.5.3-1ubuntu2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `permisoagenda`
--

-- --------------------------------------------------------

--
-- Table structure for table `citas`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `citas`
--

INSERT INTO `citas` (`idCita`, `fecha`, `hora`, `idPaciente`, `idDoctor`, `minutos`, `isPac`, `idSucursal`) VALUES
(7, '2014-03-10', '6:00am', 1, 3, 30, 0, 1),
(3, '2014-03-10', '7:00am', 1, 4, 60, 0, 1),
(8, '2014-03-11', '7:00am', 1, 5, 150, 1, 1),
(4, '2014-03-10', '7:00am', 1, 6, 45, 0, 1),
(5, '2014-03-10', '6:00am', 2, 1, 90, 0, 1),
(6, '2014-03-10', '8:00am', 2, 2, 60, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ConsultaSub`
--

CREATE TABLE IF NOT EXISTS `ConsultaSub` (
  `idConsulta` int(3) NOT NULL AUTO_INCREMENT,
  `idPaciente` int(3) NOT NULL,
  `mamas` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `genitales` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dx` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `rx` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ex` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idConsulta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `modulos`
--

CREATE TABLE IF NOT EXISTS `modulos` (
  `idModulo` int(11) NOT NULL AUTO_INCREMENT,
  `modName` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idModulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `newPaciente`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Paciente`
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
-- Dumping data for table `Paciente`
--

INSERT INTO `Paciente` (`idPaciente`, `nombre`, `apeidos`, `direccion`, `edad`, `fecha_nac`, `email`, `tel`, `idSucursal`, `fConsuCons`, `peso`, `ta`, `ahf`, `varicela`, `rubeola`, `sarampion`, `parotiditis`, `fiebre_reum`, `otros`, `qx`, `fx`, `alergias`, `hospitalizaciones`, `alimentacion`, `tabaquis`, `alcoho`, `transf`, `grupoRH`, `g`, `p`, `c`, `a`, `ivsa`, `par`, `fum`, `ritmo`, `dismino`, `dispare`, `fupap`, `mpf`, `embPrev`, `tumMama`, `infGeni`, `ardor`, `prurito`) VALUES
(1, 'Daniel', 'Vega Ceja', 'San Pablo #344', 21, '1192-09-07', 'ing_dvega@hotmail.com', '3515092158', 1, '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `permisosusuarios`
--

INSERT INTO `permisosusuarios` (`idPermisos`, `idSucursal`, `IdUsuarios`, `IdModulo`, `IdPosicion`) VALUES
(1, 0, 1, 9, 9),
(2, 1, 2, 8, 8);

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
-- Table structure for table `Sucursal`
--

CREATE TABLE IF NOT EXISTS `Sucursal` (
  `idSucursal` int(3) NOT NULL AUTO_INCREMENT,
  `nombreSucursal` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `direccionSucursal` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idSucursal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Sucursal`
--

INSERT INTO `Sucursal` (`idSucursal`, `nombreSucursal`, `direccionSucursal`) VALUES
(1, 'SUCURSAL NUMERO 1', 'OCOTLAN JALISCO'),
(2, 'SUCURSAL NUMERO 2', 'JIQUILPAN MICHOACAN');

-- --------------------------------------------------------

--
-- Table structure for table `tempCitas`
--

CREATE TABLE IF NOT EXISTS `tempCitas` (
  `idCita` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `idDoctor` int(11) NOT NULL,
  `minutos` int(3) NOT NULL,
  `usuario` int(11) NOT NULL,
  `isPac` int(11) NOT NULL,
  `idSucursal` int(11) NOT NULL,
  PRIMARY KEY (`idPaciente`,`idDoctor`,`idCita`),
  KEY `idCita` (`idCita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tempCitas`
--

INSERT INTO `tempCitas` (`idCita`, `fecha`, `hora`, `idPaciente`, `idDoctor`, `minutos`, `usuario`, `isPac`, `idSucursal`) VALUES
(2, '2014-03-10', '11:15am', 1, 2, 30, 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(3) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` text COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `curp` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `rfc` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `semilla` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `contrasena`, `nombre`, `direccion`, `telefono`, `email`, `curp`, `rfc`, `semilla`) VALUES
(1, 'root', '0ff234d1fdaaa63a658c09421162296d013fbe02ea3ec272dab25b75768f10574b02f13e736d9d5bd0374be17190a7d7b5ed3593199609c629aee5bb3445024f', 'ROOT', '', '', '', '', '', 'c5045cf9b602c65154b5b1cf11de19de0501d4b41100f624d38550bd42cb0e7d06cb8afe80b06e07733273025141e3e14a1353a38645704e5f27d8820542da25'),
(2, 'vegacejad', '521327041573bb189b2b924dc64aeb364e29cbca1c75ac80a6d2e54cbb77b01d74755867abf620247d2ebe6b1f107cb5d688e42575080103d80fe2bf0873894a', 'Daniel Vega Ceja', 'San Pablo 344 Valle de San Agustín', '3512434567', 'ing_dvega@hotmail.com', 'VECD1234567890', 'VECD1234567898', '063b7c9bd56ffa53924387a1282a7c3e7a626d6171d4500b34f76b94306b245337dd5bae2d02d24991f18f6a1d0f4473d25459e134b7100ab3a2e1221b61d06e');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
