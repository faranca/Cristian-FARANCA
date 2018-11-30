
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
