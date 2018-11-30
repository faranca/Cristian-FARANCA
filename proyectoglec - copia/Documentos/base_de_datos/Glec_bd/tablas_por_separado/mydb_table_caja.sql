
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `idcaja` int(11) NOT NULL,
  `monto_inicial` float NOT NULL,
  `fecha_apertura` date NOT NULL,
  `hora_apertura` time NOT NULL,
  `monto_final` float DEFAULT NULL,
  `fecha_cierre` date DEFAULT NULL,
  `hora_cierre` time DEFAULT NULL,
  `usuario_idpersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`idcaja`, `monto_inicial`, `fecha_apertura`, `hora_apertura`, `monto_final`, `fecha_cierre`, `hora_cierre`, `usuario_idpersona`) VALUES
(1, 500, '2018-10-03', '08:00:00', 2500, '2018-10-03', '23:00:00', 1),
(4, 500, '2018-10-04', '08:00:00', 2500, '2018-10-04', '23:00:00', 1),
(5, 0, '2018-10-05', '08:00:00', 1500, '2018-10-05', '23:00:00', 1),
(6, 50, '2018-10-06', '08:00:00', 2200, NULL, '23:58:50', 1);
