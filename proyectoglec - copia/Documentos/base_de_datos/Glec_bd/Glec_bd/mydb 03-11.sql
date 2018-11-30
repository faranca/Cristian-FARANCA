-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2018 a las 03:26:05
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `idactividad` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `precio` float NOT NULL,
  `cancha_idcancha` int(11) NOT NULL,
  `discontinuada` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`idactividad`, `descripcion`, `precio`, `cancha_idcancha`, `discontinuada`) VALUES
(1, 'Futbol chicos', 350, 1, NULL),
(2, 'Futbol chicas', 350, 2, NULL),
(3, 'Futbol grandes', 350, 5, NULL),
(4, 'Basquet chicos', 400, 6, NULL),
(5, 'Basquet grandes', 400, 7, NULL),
(6, 'Basquet chicas', 400, 8, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `idcaja` int(11) NOT NULL,
  `monto_inicial` float NOT NULL,
  `fecha_apertura` date NOT NULL,
  `hora_apertura` time NOT NULL,
  `monto_final` float DEFAULT NULL,
  `fecha_cierre` date DEFAULT NULL,
  `hora_cierre` time DEFAULT NULL,
  `usuario_idpersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`idcaja`, `monto_inicial`, `fecha_apertura`, `hora_apertura`, `monto_final`, `fecha_cierre`, `hora_cierre`, `usuario_idpersona`) VALUES
(1, 500, '2018-10-03', '08:00:00', 2500, '2018-10-03', '23:00:00', 1),
(4, 500, '2018-10-04', '08:00:00', 2500, '2018-10-04', '23:00:00', 1),
(5, 0, '2018-10-05', '08:00:00', 1500, '2018-10-05', '23:00:00', 1),
(6, 50, '2018-10-06', '08:00:00', 2200, NULL, '20:35:38', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancha`
--

CREATE TABLE `cancha` (
  `idcancha` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `valor` float NOT NULL,
  `deporte_iddeporte` int(11) NOT NULL,
  `discontinuado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cancha`
--

INSERT INTO `cancha` (`idcancha`, `descripcion`, `valor`, `deporte_iddeporte`, `discontinuado`) VALUES
(1, 'Futbol cancha1', 350, 1, 0),
(2, 'Futbol cancha2', 350, 1, 0),
(5, 'Futbol cancha3', 350, 1, 0),
(6, 'Basquet cancha1', 450, 2, 0),
(7, 'Basquet cancha2', 450, 2, 0),
(8, 'Basquet cancha3', 450, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobante_cfg`
--

CREATE TABLE `comprobante_cfg` (
  `idcomprobantecfg` int(11) NOT NULL,
  `tipo` varchar(3) NOT NULL,
  `prefijo` int(11) NOT NULL,
  `numero_inicial` int(11) NOT NULL,
  `ultimo_numero` int(11) NOT NULL,
  `discontinuado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comprobante_cfg`
--

INSERT INTO `comprobante_cfg` (`idcomprobantecfg`, `tipo`, `prefijo`, `numero_inicial`, `ultimo_numero`, `discontinuado`) VALUES
(1, 'A', 1, 111, 36, NULL),
(2, 'B', 1, 222, 4, NULL),
(3, 'C', 1, 333, 7, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuota`
--

CREATE TABLE `cuota` (
  `idcuota` int(11) NOT NULL,
  `numero_cuota` int(11) DEFAULT NULL,
  `ingreso_idingreso` int(11) NOT NULL,
  `inscripcion_idinscripcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuota`
--

INSERT INTO `cuota` (`idcuota`, `numero_cuota`, `ingreso_idingreso`, `inscripcion_idinscripcion`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 2, 5, 1),
(19, 2, 21, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deporte`
--

CREATE TABLE `deporte` (
  `iddeporte` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `discontinuado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `deporte`
--

INSERT INTO `deporte` (`iddeporte`, `descripcion`, `discontinuado`) VALUES
(1, 'Futbol', NULL),
(2, 'Basquet', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egreso`
--

CREATE TABLE `egreso` (
  `idegreso` int(11) NOT NULL,
  `importe` float NOT NULL,
  `motivo` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `caja_idcaja` int(11) NOT NULL,
  `hora_egreso` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `egreso`
--

INSERT INTO `egreso` (`idegreso`, `importe`, `motivo`, `fecha`, `caja_idcaja`, `hora_egreso`) VALUES
(2, 50, 'Error de cobro', '2018-10-07', 6, '08:13:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_de_actividad`
--

CREATE TABLE `horario_de_actividad` (
  `idhorario_de_actividad` int(11) NOT NULL,
  `dia` date NOT NULL,
  `hora_inicio` varchar(45) NOT NULL,
  `hora_fin` varchar(45) NOT NULL,
  `actividad_idactividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horario_de_actividad`
--

INSERT INTO `horario_de_actividad` (`idhorario_de_actividad`, `dia`, `hora_inicio`, `hora_fin`, `actividad_idactividad`) VALUES
(1, '2018-10-03', '19:00:00', '20:00:00', 5),
(2, '2018-10-04', '18:00:00', '19:00:00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `idingreso` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `importe` float NOT NULL,
  `caja_idcaja` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `comprobante_cfg_idcomprobantecfg` int(11) NOT NULL,
  `hora_ingreso` time NOT NULL,
  `descripcion_ingreso` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ingreso`
--

INSERT INTO `ingreso` (`idingreso`, `fecha`, `importe`, `caja_idcaja`, `numero`, `comprobante_cfg_idcomprobantecfg`, `hora_ingreso`, `descripcion_ingreso`) VALUES
(1, '2018-10-03', 350, 1, 2, 1, '08:00:00', 'Cuota Futbol Adultos 05 Leandro'),
(2, '2018-10-03', 400, 6, 2, 1, '09:11:00', 'Cuota Basquet Adultos 05 Leandro'),
(3, '2018-10-07', 350, 6, 4, 2, '08:10:00', 'Insumo canillera Pepe'),
(4, '2018-10-07', 100, 6, 4, 2, '08:07:00', 'Reserva 1 Pepe'),
(5, '2018-10-03', 350, 6, 6, 2, '08:00:00', 'Cuota Futbol Adultos 06 Leandro'),
(21, '2018-11-03', 400, 6, 36, 1, '00:06:58', 'Cuota Basquet grandes 31333333 '),
(22, '2018-11-03', 100, 6, 4, 2, '08:00:00', 'Reserva 1 Cristian'),
(23, '2018-11-03', 100, 6, 6, 2, '09:11:00', 'Resereva 1 Leandro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_por_reserva`
--

CREATE TABLE `ingreso_por_reserva` (
  `ingreso_idingreso` int(11) NOT NULL,
  `reserva_idreserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ingreso_por_reserva`
--

INSERT INTO `ingreso_por_reserva` (`ingreso_idingreso`, `reserva_idreserva`) VALUES
(4, 1),
(22, 2),
(23, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `idinscripcion` int(11) NOT NULL,
  `fecha_alta` date NOT NULL,
  `fecha_baja` date DEFAULT NULL,
  `usuario_idpersona` int(11) NOT NULL,
  `actividad_idactividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`idinscripcion`, `fecha_alta`, `fecha_baja`, `usuario_idpersona`, `actividad_idactividad`) VALUES
(1, '2018-05-03', NULL, 2, 3),
(2, '2018-05-03', NULL, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo`
--

CREATE TABLE `insumo` (
  `idinsumo` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `stock` smallint(2) NOT NULL,
  `precio` float NOT NULL,
  `deporte_iddeporte` int(11) NOT NULL,
  `discontinuado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `insumo`
--

INSERT INTO `insumo` (`idinsumo`, `descripcion`, `stock`, `precio`, `deporte_iddeporte`, `discontinuado`) VALUES
(1, 'Zapatillas de basquet', 2, 100, 2, NULL),
(2, 'Canilleras adulto', 2, 50, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo_por_reserva`
--

CREATE TABLE `insumo_por_reserva` (
  `insumo_idinsumo` int(11) NOT NULL,
  `reserva_idreserva` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `insumo_por_reserva`
--

INSERT INTO `insumo_por_reserva` (`insumo_idinsumo`, `reserva_idreserva`, `cantidad`) VALUES
(2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `idreserva` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `dni` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `observacion` varchar(45) DEFAULT NULL,
  `cancha_idcancha` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `hora_desde` time NOT NULL,
  `hora_hasta` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`idreserva`, `nombre`, `dni`, `telefono`, `observacion`, `cancha_idcancha`, `fecha_reserva`, `hora_desde`, `hora_hasta`) VALUES
(1, 'Pepe', '55555555', '01144449999', 'nada', 1, '2018-10-04', '09:00:00', '10:00:00'),
(2, 'Cristian', '33034506', '0', '0', 1, '2018-10-04', '11:00:00', '12:00:00'),
(3, 'Leandro', '31333333', NULL, NULL, 1, '2018-11-03', '08:00:00', '09:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idpersona` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `dni` varchar(45) NOT NULL,
  `esAdmin` bit(1) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `discontinuado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idpersona`, `nombre`, `apellido`, `fecha_nacimiento`, `dni`, `esAdmin`, `usuario`, `clave`, `email`, `discontinuado`) VALUES
(1, 'Cristian', 'FARANCA', '1987-05-26', '33034506', b'1', 'FARANCA', '1234', 'cristianfaranca@yahoo.com.ar', 1),
(2, 'Leandro', 'MANTELLO', '1985-07-28', '31333333', b'0', 'MANTELLO', '1234', 'leanmantello@yahoo.com.ar', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`idactividad`),
  ADD KEY `fk_actividad_cancha_idx` (`cancha_idcancha`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`idcaja`),
  ADD KEY `fk_caja_usuario_idx` (`usuario_idpersona`);

--
-- Indices de la tabla `cancha`
--
ALTER TABLE `cancha`
  ADD PRIMARY KEY (`idcancha`),
  ADD KEY `fk_cancha_deporte_idx` (`deporte_iddeporte`);

--
-- Indices de la tabla `comprobante_cfg`
--
ALTER TABLE `comprobante_cfg`
  ADD PRIMARY KEY (`idcomprobantecfg`);

--
-- Indices de la tabla `cuota`
--
ALTER TABLE `cuota`
  ADD PRIMARY KEY (`idcuota`),
  ADD KEY `fk_cuota_ingreso_idx` (`ingreso_idingreso`),
  ADD KEY `fk_cuota_inscripcion_idx` (`inscripcion_idinscripcion`);

--
-- Indices de la tabla `deporte`
--
ALTER TABLE `deporte`
  ADD PRIMARY KEY (`iddeporte`);

--
-- Indices de la tabla `egreso`
--
ALTER TABLE `egreso`
  ADD PRIMARY KEY (`idegreso`),
  ADD KEY `fk_egreso_caja_idx` (`caja_idcaja`);

--
-- Indices de la tabla `horario_de_actividad`
--
ALTER TABLE `horario_de_actividad`
  ADD PRIMARY KEY (`idhorario_de_actividad`),
  ADD KEY `fk_horario_de_actividad_actividad_idx` (`actividad_idactividad`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`idingreso`),
  ADD KEY `fk_ingreso_caja_idx` (`caja_idcaja`),
  ADD KEY `fk_ingreso_comprobante_cfg1_idx` (`comprobante_cfg_idcomprobantecfg`);

--
-- Indices de la tabla `ingreso_por_reserva`
--
ALTER TABLE `ingreso_por_reserva`
  ADD PRIMARY KEY (`ingreso_idingreso`,`reserva_idreserva`),
  ADD KEY `fk_ingreso_por_reserva_reserva_idx` (`reserva_idreserva`),
  ADD KEY `fk_ingreso_por_reserva_ingreso_idx` (`ingreso_idingreso`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`idinscripcion`),
  ADD KEY `fk_inscripcion_usuario_idx` (`usuario_idpersona`),
  ADD KEY `fk_inscripcion_actividad_idx` (`actividad_idactividad`);

--
-- Indices de la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD PRIMARY KEY (`idinsumo`),
  ADD KEY `fk_insumo_deporte_idx` (`deporte_iddeporte`);

--
-- Indices de la tabla `insumo_por_reserva`
--
ALTER TABLE `insumo_por_reserva`
  ADD PRIMARY KEY (`insumo_idinsumo`,`reserva_idreserva`),
  ADD KEY `fk_insumo_por_reserva_reserva_idx` (`reserva_idreserva`),
  ADD KEY `fk_insumo_por_reserva_insumo_idx` (`insumo_idinsumo`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idreserva`),
  ADD KEY `fk_reserva_cancha1_idx` (`cancha_idcancha`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idpersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `idactividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `idcaja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cancha`
--
ALTER TABLE `cancha`
  MODIFY `idcancha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `comprobante_cfg`
--
ALTER TABLE `comprobante_cfg`
  MODIFY `idcomprobantecfg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cuota`
--
ALTER TABLE `cuota`
  MODIFY `idcuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `deporte`
--
ALTER TABLE `deporte`
  MODIFY `iddeporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `egreso`
--
ALTER TABLE `egreso`
  MODIFY `idegreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `horario_de_actividad`
--
ALTER TABLE `horario_de_actividad`
  MODIFY `idhorario_de_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `idingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `idinscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `insumo`
--
ALTER TABLE `insumo`
  MODIFY `idinsumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idreserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `fk_actividad_cancha` FOREIGN KEY (`cancha_idcancha`) REFERENCES `cancha` (`idcancha`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `caja`
--
ALTER TABLE `caja`
  ADD CONSTRAINT `fk_caja_usuario` FOREIGN KEY (`usuario_idpersona`) REFERENCES `usuario` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cancha`
--
ALTER TABLE `cancha`
  ADD CONSTRAINT `fk_cancha_deporte` FOREIGN KEY (`deporte_iddeporte`) REFERENCES `deporte` (`iddeporte`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuota`
--
ALTER TABLE `cuota`
  ADD CONSTRAINT `fk_cuota_ingreso` FOREIGN KEY (`ingreso_idingreso`) REFERENCES `ingreso` (`idingreso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cuota_inscripcion` FOREIGN KEY (`inscripcion_idinscripcion`) REFERENCES `inscripcion` (`idinscripcion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `egreso`
--
ALTER TABLE `egreso`
  ADD CONSTRAINT `fk_egreso_caja` FOREIGN KEY (`caja_idcaja`) REFERENCES `caja` (`idcaja`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario_de_actividad`
--
ALTER TABLE `horario_de_actividad`
  ADD CONSTRAINT `fk_horario_de_actividad_actividad` FOREIGN KEY (`actividad_idactividad`) REFERENCES `actividad` (`idactividad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `fk_ingreso_caja` FOREIGN KEY (`caja_idcaja`) REFERENCES `caja` (`idcaja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ingreso_comprobante_cfg1` FOREIGN KEY (`comprobante_cfg_idcomprobantecfg`) REFERENCES `comprobante_cfg` (`idcomprobantecfg`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ingreso_por_reserva`
--
ALTER TABLE `ingreso_por_reserva`
  ADD CONSTRAINT `fk_ingreso_has_reserva_ingreso1` FOREIGN KEY (`ingreso_idingreso`) REFERENCES `ingreso` (`idingreso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ingreso_has_reserva_reserva1` FOREIGN KEY (`reserva_idreserva`) REFERENCES `reserva` (`idreserva`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `fk_inscripcion_actividad` FOREIGN KEY (`actividad_idactividad`) REFERENCES `actividad` (`idactividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inscripcion_usuario` FOREIGN KEY (`usuario_idpersona`) REFERENCES `usuario` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD CONSTRAINT `fk_insumo_deporte` FOREIGN KEY (`deporte_iddeporte`) REFERENCES `deporte` (`iddeporte`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `insumo_por_reserva`
--
ALTER TABLE `insumo_por_reserva`
  ADD CONSTRAINT `fk_insumo_por_reserva_insumo` FOREIGN KEY (`insumo_idinsumo`) REFERENCES `insumo` (`idinsumo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_insumo_por_reserva_reserva` FOREIGN KEY (`reserva_idreserva`) REFERENCES `reserva` (`idreserva`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_reserva_cancha1` FOREIGN KEY (`cancha_idcancha`) REFERENCES `cancha` (`idcancha`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
