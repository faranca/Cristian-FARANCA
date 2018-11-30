
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
(4, 1);
