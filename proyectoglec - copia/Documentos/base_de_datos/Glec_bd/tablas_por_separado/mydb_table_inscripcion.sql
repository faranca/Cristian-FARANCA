
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
