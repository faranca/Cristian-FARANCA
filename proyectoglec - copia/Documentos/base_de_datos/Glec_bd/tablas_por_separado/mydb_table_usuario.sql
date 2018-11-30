
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idpersona` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `dni` varchar(45) NOT NULL,
  `esAdmin` bit(1) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `discontinuado` tinyint(4) DEFAULT NULL,
  `nivel` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idpersona`, `nombre`, `apellido`, `fecha_nacimiento`, `dni`, `esAdmin`, `usuario`, `clave`, `email`, `discontinuado`, `nivel`) VALUES
(1, 'Cristian', 'FARANCA', '1987-05-26', '33034506', b'1', 'FARANCA', '1234', 'cristianfaranca@yahoo.com.ar', 1, 0),
(2, 'Leandro', 'MANTELLO', '1985-07-28', '31333333', b'0', 'MANTELLO', '1234', 'leanmantello@yahoo.com.ar', 0, 0);
