
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
(4, 2, 5, 2);