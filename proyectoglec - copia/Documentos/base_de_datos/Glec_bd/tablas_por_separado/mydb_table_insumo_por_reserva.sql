
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
