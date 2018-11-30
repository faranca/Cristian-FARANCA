
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
