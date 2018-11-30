
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_de_actividad`
--

CREATE TABLE `horario_de_actividad` (
  `idhorario_de_actividad` int(11) NOT NULL,
  `dia` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `actividad_idactividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horario_de_actividad`
--

INSERT INTO `horario_de_actividad` (`idhorario_de_actividad`, `dia`, `hora_inicio`, `hora_fin`, `actividad_idactividad`) VALUES
(1, '2018-10-03', '19:00:00', '20:00:00', 5),
(2, '2018-10-04', '18:00:00', '19:00:00', 3);
