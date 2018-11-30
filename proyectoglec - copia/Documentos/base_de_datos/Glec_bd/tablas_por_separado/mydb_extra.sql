
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesos`
--
ALTER TABLE `accesos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`idactividad`),
  ADD KEY `fk_actividad_cancha_idx` (`cancha_idcancha`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`idcaja`),
  ADD KEY `fk_caja_usuario_idx` (`usuario_idpersona`);

--
-- Indices de la tabla `cancha`
--
ALTER TABLE `cancha`
  ADD PRIMARY KEY (`idcancha`),
  ADD KEY `fk_cancha_deporte_idx` (`deporte_iddeporte`);

--
-- Indices de la tabla `comprobante_cfg`
--
ALTER TABLE `comprobante_cfg`
  ADD PRIMARY KEY (`idcomprobantecfg`);

--
-- Indices de la tabla `cuota`
--
ALTER TABLE `cuota`
  ADD PRIMARY KEY (`idcuota`),
  ADD KEY `fk_cuota_ingreso_idx` (`ingreso_idingreso`),
  ADD KEY `fk_cuota_inscripcion_idx` (`inscripcion_idinscripcion`);

--
-- Indices de la tabla `deporte`
--
ALTER TABLE `deporte`
  ADD PRIMARY KEY (`iddeporte`);

--
-- Indices de la tabla `egreso`
--
ALTER TABLE `egreso`
  ADD PRIMARY KEY (`idegreso`),
  ADD KEY `fk_egreso_caja_idx` (`caja_idcaja`);

--
-- Indices de la tabla `horario_de_actividad`
--
ALTER TABLE `horario_de_actividad`
  ADD PRIMARY KEY (`idhorario_de_actividad`),
  ADD KEY `fk_horario_de_actividad_actividad_idx` (`actividad_idactividad`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`idingreso`),
  ADD KEY `fk_ingreso_caja_idx` (`caja_idcaja`),
  ADD KEY `fk_ingreso_comprobante_cfg1_idx` (`comprobante_cfg_idcomprobantecfg`);

--
-- Indices de la tabla `ingreso_por_reserva`
--
ALTER TABLE `ingreso_por_reserva`
  ADD PRIMARY KEY (`ingreso_idingreso`,`reserva_idreserva`),
  ADD KEY `fk_ingreso_por_reserva_reserva_idx` (`reserva_idreserva`),
  ADD KEY `fk_ingreso_por_reserva_ingreso_idx` (`ingreso_idingreso`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`idinscripcion`),
  ADD KEY `fk_inscripcion_usuario_idx` (`usuario_idpersona`),
  ADD KEY `fk_inscripcion_actividad_idx` (`actividad_idactividad`);

--
-- Indices de la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD PRIMARY KEY (`idinsumo`),
  ADD KEY `fk_insumo_deporte_idx` (`deporte_iddeporte`);

--
-- Indices de la tabla `insumo_por_reserva`
--
ALTER TABLE `insumo_por_reserva`
  ADD PRIMARY KEY (`insumo_idinsumo`,`reserva_idreserva`),
  ADD KEY `fk_insumo_por_reserva_reserva_idx` (`reserva_idreserva`),
  ADD KEY `fk_insumo_por_reserva_insumo_idx` (`insumo_idinsumo`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idreserva`),
  ADD KEY `fk_reserva_cancha1_idx` (`cancha_idcancha`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idpersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesos`
--
ALTER TABLE `accesos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `idactividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `idcaja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `cancha`
--
ALTER TABLE `cancha`
  MODIFY `idcancha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `comprobante_cfg`
--
ALTER TABLE `comprobante_cfg`
  MODIFY `idcomprobantecfg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `cuota`
--
ALTER TABLE `cuota`
  MODIFY `idcuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `deporte`
--
ALTER TABLE `deporte`
  MODIFY `iddeporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `egreso`
--
ALTER TABLE `egreso`
  MODIFY `idegreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `horario_de_actividad`
--
ALTER TABLE `horario_de_actividad`
  MODIFY `idhorario_de_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `idingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `idinscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `insumo`
--
ALTER TABLE `insumo`
  MODIFY `idinsumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idreserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `fk_actividad_cancha` FOREIGN KEY (`cancha_idcancha`) REFERENCES `cancha` (`idcancha`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `caja`
--
ALTER TABLE `caja`
  ADD CONSTRAINT `fk_caja_usuario` FOREIGN KEY (`usuario_idpersona`) REFERENCES `usuario` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cancha`
--
ALTER TABLE `cancha`
  ADD CONSTRAINT `fk_cancha_deporte` FOREIGN KEY (`deporte_iddeporte`) REFERENCES `deporte` (`iddeporte`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuota`
--
ALTER TABLE `cuota`
  ADD CONSTRAINT `fk_cuota_ingreso` FOREIGN KEY (`ingreso_idingreso`) REFERENCES `ingreso` (`idingreso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cuota_inscripcion` FOREIGN KEY (`inscripcion_idinscripcion`) REFERENCES `inscripcion` (`idinscripcion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `egreso`
--
ALTER TABLE `egreso`
  ADD CONSTRAINT `fk_egreso_caja` FOREIGN KEY (`caja_idcaja`) REFERENCES `caja` (`idcaja`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario_de_actividad`
--
ALTER TABLE `horario_de_actividad`
  ADD CONSTRAINT `fk_horario_de_actividad_actividad` FOREIGN KEY (`actividad_idactividad`) REFERENCES `actividad` (`idactividad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `fk_ingreso_caja` FOREIGN KEY (`caja_idcaja`) REFERENCES `caja` (`idcaja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ingreso_comprobante_cfg1` FOREIGN KEY (`comprobante_cfg_idcomprobantecfg`) REFERENCES `comprobante_cfg` (`idcomprobantecfg`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ingreso_por_reserva`
--
ALTER TABLE `ingreso_por_reserva`
  ADD CONSTRAINT `fk_ingreso_has_reserva_ingreso1` FOREIGN KEY (`ingreso_idingreso`) REFERENCES `ingreso` (`idingreso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ingreso_has_reserva_reserva1` FOREIGN KEY (`reserva_idreserva`) REFERENCES `reserva` (`idreserva`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `fk_inscripcion_actividad` FOREIGN KEY (`actividad_idactividad`) REFERENCES `actividad` (`idactividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inscripcion_usuario` FOREIGN KEY (`usuario_idpersona`) REFERENCES `usuario` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD CONSTRAINT `fk_insumo_deporte` FOREIGN KEY (`deporte_iddeporte`) REFERENCES `deporte` (`iddeporte`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `insumo_por_reserva`
--
ALTER TABLE `insumo_por_reserva`
  ADD CONSTRAINT `fk_insumo_por_reserva_insumo` FOREIGN KEY (`insumo_idinsumo`) REFERENCES `insumo` (`idinsumo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_insumo_por_reserva_reserva` FOREIGN KEY (`reserva_idreserva`) REFERENCES `reserva` (`idreserva`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_reserva_cancha1` FOREIGN KEY (`cancha_idcancha`) REFERENCES `cancha` (`idcancha`) ON DELETE NO ACTION ON UPDATE NO ACTION;
