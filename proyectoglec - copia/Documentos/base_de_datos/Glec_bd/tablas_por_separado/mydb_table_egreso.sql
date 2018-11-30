
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
