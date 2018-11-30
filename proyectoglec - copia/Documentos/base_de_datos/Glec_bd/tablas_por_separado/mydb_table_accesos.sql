
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesos`
--

CREATE TABLE `accesos` (
  `id` int(11) NOT NULL,
  `seccion` varchar(45) NOT NULL,
  `nivel_requerido` int(11) NOT NULL DEFAULT '0',
  `sub_seccion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
