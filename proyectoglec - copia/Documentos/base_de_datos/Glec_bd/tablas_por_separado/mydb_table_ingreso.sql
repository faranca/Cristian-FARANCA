
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
(6, '2018-11-03', 400, 6, 36, 1, '00:06:58', 'Cuota Basquet grandes 31333333 '),
(7, '2018-11-03', 100, 6, 4, 2, '08:00:00', 'Reserva 1 Cristian'),
(8, '2018-11-03', 100, 6, 6, 2, '09:11:00', 'Resereva 1 Leandro');