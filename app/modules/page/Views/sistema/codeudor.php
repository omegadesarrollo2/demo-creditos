<div class="container">
	<div class="row">
			<div class="col-12">
				<div class="row form-group formulario">
					<div class="col-lg-12"><b>Información del codeudor</b></div>
					<div class="col-md-6 col-lg-3"><label>Primer nombre</label> <input type="text" name="nombres" id="nombres" value="<?php echo $this->nombres; ?>" required  class="form-control" /></div>
					<div class="col-md-6 col-lg-3"><label>Segundo nombre</label> <input type="text" name="nombres2" id="nombres2" value="<?php echo $this->nombres2; ?>"  class="form-control" /></div>
					<div class="col-md-6 col-lg-3"><label>Primer apellido</label> <input type="text" name="apellido1" id="apellido1" value="<?php echo $this->apellido1; ?>"  class="form-control" /></div>
					<div class="col-md-6 col-lg-3"><label>Segundo apellido</label> <input type="text" name="apellido2" id="apellido2" value="<?php echo $this->apellido2; ?>" class="form-control" /></div>

					<div class="col-md-6 col-lg-3"><label>Sexo</label>
						<select name="sexo" class="form-control" required>
							<option value="" <?php if($this->sexo==""){ echo 'selected';} ?>></option>
							<option value="Femenino" <?php if($this->sexo=="Femenino"){ echo 'selected';} ?>>Femenino</option>
							<option value="Masculino" <?php if($this->sexo=="Masculino"){ echo 'selected';} ?>>Masculino</option>
						</select>
					</div>
					<div class="col-md-6 col-lg-3"><label>Tipo de identificación</label>
						<select name="tipo_documento" class="form-control" required>
							<option value="" <?php if($this->tipo_documento==""){ echo 'selected';} ?>></option>
							<option value="CC" <?php if($this->tipo_documento=="CC"){ echo 'selected';} ?>>CC</option>
							<option value="CE" <?php if($this->tipo_documento=="CE"){ echo 'selected';} ?>>CE</option>
							<option value="Pasaporte" <?php if($this->tipo_documento=="Pasaporte"){ echo 'selected';} ?>>Pasaporte</option>
							<option value="Otro" <?php if($this->tipo_documento=="Otro"){ echo 'selected';} ?>>Otro</option>
						</select>
					</div>

					<div class="col-md-6 col-lg-3"><label>Documento</label> <input type="text" name="documento" id="documento" value="<?php echo $this->documento; ?>" required class="form-control" /></div>

					<div class="col-md-6 col-lg-3"><label>Fecha expedición</label> <input type="date" name="fecha_documento" id="fecha_documento" value="<?php echo $this->fecha_documento; ?>" required class="form-control" onchange="validar_fecha_expedicion();"  /></div>

					<div class="col-md-6 col-lg-3"><label>Ciudad expedición</label>
						<select name="ciudad_documento" id="ciudad_documento" required class="form-control">
							<?php foreach ($this->ciudades as $ciudad): ?>
								<option value="<?php echo $ciudad->codigo; ?>" <?php if($this->ciudad_documento==$ciudad->codigo){ echo 'selected'; } ?> ><?php echo capital(codificar($ciudad->nombre))." (".codificar($ciudad->departamento).")"; ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="col-md-6 col-lg-3"><label>Fecha nacimiento</label> <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $this->fecha_nacimiento; ?>" required class="form-control" onchange="calcularEdad();"  /></div>

					<div class="col-md-6 col-lg-3"><label>Edad</label> <input type="text" name="edad" id="edad" value="<?php echo $this->edad; ?>" readonly class="form-control"  /></div>

					<div class="col-md-6 col-lg-3"><label>Empresa</label> <input type="text" name="ciudad_documento" id="ciudad_documento" value="<?php echo $this->ciudad_documento; ?>" required class="form-control"  /></div>

					<div class="col-md-6 col-lg-3"><label>Dependencia/Área</label> <input type="text" name="dependencia" id="dependencia" value="<?php echo $this->dependencia; ?>" required class="form-control"  /></div>

					<div class="col-md-6 col-lg-6"><label>Dirección oficina</label>
						<div class="row">
							<div class="col-lg-6">
								<select name="nomenclatura1" id="nomenclatura1" class="form-control" required="required">
									<option value="">Nomenclatura</option>
									<?php foreach ($this->nomenclaturas as $key => $value): ?>
										<option value="<?php echo $value->codigo; ?>"><?php echo $value->nombre; ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="col-lg-6">
								<input type="text" name="direccion_oficina" id="direccion_oficina" value="<?php echo $this->direccion_oficina; ?>" required class="form-control" placeholder="Complemento dirección"  />
							</div>
						</div>

					</div>

					<div class="col-md-6 col-lg-3"><label>Ciudad oficina</label>
						<select name="ciudad_oficina" id="ciudad_oficina" required class="form-control">
							<?php foreach ($this->ciudades as $ciudad): ?>
								<option value="<?php echo $ciudad->codigo; ?>" <?php if($this->ciudad_oficina==$ciudad->codigo){ echo 'selected'; } ?> ><?php echo capital(codificar($ciudad->nombre))." (".codificar($ciudad->departamento).")"; ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="col-md-6 col-lg-3"><label>Teléfono fijo oficina</label> <input type="number" name="telefono_oficina" id="telefono_oficina" value="<?php echo $this->telefono_oficina; ?>" required class="form-control" maxlength="7" minlenght="7" min="1000000" max="9999999"  /></div>

					<div class="col-md-6 col-lg-3"><label>Celular</label> <input type="number" name="celular" id="celular" value="<?php echo $this->celular; ?>" required class="form-control" maxlength="10" minlenght="10" min="1000000000" max="9999999999"  /></div>

					<div class="col-md-6 col-lg-6">
						<label>Dirección residencia</label>
						<div class="row">
							<div class="col-lg-6">
								<select name="nomenclatura2" id="nomenclatura2" class="form-control" required="required">
									<option value="">Nomenclatura</option>
									<?php foreach ($this->nomenclaturas as $key => $value): ?>
										<option value="<?php echo $value->codigo; ?>"><?php echo $value->nombre; ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="col-lg-6">
								<input type="text" name="direccion_residencia" id="direccion_residencia" value="<?php echo $this->direccion_residencia; ?>" required class="form-control" placeholder="Complemento dirección"  />
							</div>
						</div>


					</div>

					<div class="col-md-6 col-lg-3"><label>Barrio</label> <input type="text" name="barrio" id="barrio" value="<?php echo $this->barrio; ?>" required class="form-control"  /></div>

					<div class="col-md-6 col-lg-3"><label>Ciudad</label>
						<select name="ciudad_residencia" id="ciudad_residencia" required class="form-control">
							<?php foreach ($this->ciudades as $ciudad): ?>
								<option value="<?php echo $ciudad->codigo; ?>" <?php if($this->ciudad_residencia==$ciudad->codigo){ echo 'selected'; } ?> ><?php echo capital(codificar($ciudad->nombre))." (".codificar($ciudad->departamento).")"; ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="col-md-6 col-lg-3"><label>Teléfono fijo residencia</label> <input type="number" name="telefono" id="telefono" value="<?php echo $this->telefono; ?>" required class="form-control" maxlength="7" minlenght="7" min="1000000" max="9999999"  /></div>

					<div class="col-md-6 col-lg-3"><label>Correo electrónico empresarial</label> <input type="email" name="correo_empresarial" id="correo_empresarial" value="<?php echo $this->correo_empresarial; ?>" required class="form-control"  /></div>

					<div class="col-md-6 col-lg-3"><label>Correo electrónico personal</label> <input type="email" name="correo_personal" id="correo_personal" value="<?php echo $this->correo_personal; ?>" required class="form-control"  /></div>

					<div class="col-md-6 col-lg-3">
					</div>

					<div class="col-md-6 col-lg-3">
						<label>Situación laboral</label>
						<select name="situacion_laboral" class="form-control" required>
							<option value="" <?php if($this->situacion_laboral==""){ echo 'selected';} ?>></option>
							<option value="Contrato termino indefinido" <?php if($this->situacion_laboral=="Contrato termino indefinido"){ echo 'selected';} ?>>Contrato término indefinido</option>
							<option value="Pensionado" <?php if($this->situacion_laboral=="Pensionado"){ echo 'selected';} ?>>Pensionado</option>
							<option value="Contrato termino fijo" <?php if($this->situacion_laboral=="Contrato termino fijo"){ echo 'selected';} ?>>Contrato término fijo</option>
							<option value="Independiente" <?php if($this->situacion_laboral=="Independiente"){ echo 'selected';} ?>>Independiente</option>
							<option value="Independiente" <?php if($this->situacion_laboral=="Independiente"){ echo 'selected';} ?>>Otro</option>
						</select>

					</div>

					<div class="col-md-6 col-lg-3">
						<label>Otro ¿Cuál?</label> <input type="text" name="cual" id="cual" value="<?php echo $this->cual; ?>" class="form-control"  />
					</div>

					<div class="col-md-6 col-lg-3"><label>Ocupación</label> <input type="text" name="ocupacion" id="ocupacion" value="<?php echo $this->ocupacion; ?>" required class="form-control"  /></div>

					<div class="col-md-6 col-lg-3">
						<label>Estado civil</label>
						<select name="estado_civil" id="estado_civil" class="form-control" onchange="validar_conyuge();" required>
							<option value="" <?php if($this->estado_civil==""){ echo 'selected';} ?>></option>
							<option value="Soltero(a)" <?php if($this->estado_civil=="Soltero(a)"){ echo 'selected';} ?>>Soltero(a)</option>
							<option value="Casado(a)" <?php if($this->estado_civil=="Casado(a)"){ echo 'selected';} ?>>Casado(a)</option>
							<option value="Viudo(a)" <?php if($this->estado_civil=="Viudo(a)"){ echo 'selected';} ?>>Viudo(a)</option>
							<option value="Union libre" <?php if($this->estado_civil=="Union libre"){ echo 'selected';} ?>>Unión libre</option>
						</select>
					</div>

					<div class="col-12" id="div_conyuge" <?php if($this->estado_civil!="Casado(a)" and $this->estado_civil=="Union libre"){ echo 'style="display:none"'; }  ?>>
						<div class="row">
							<div class="col-md-6 col-lg-6"><label>Nombre del conyuge o compañero(a)</label> <input type="text" name="conyuge_nombre" id="conyuge_nombre" value="<?php echo $this->conyuge_nombre; ?>" required class="form-control"  /></div>
							<div class="col-md-6 col-lg-3"><label>Teléfono</label> <input type="number" name="conyuge_telefono" id="conyuge_telefono" value="<?php echo $this->conyuge_telefono; ?>" required class="form-control" maxlength="7" minlenght="7" min="1000000" max="9999999"  /></div>
							<div class="col-md-6 col-lg-3"><label>Celular</label> <input type="number" name="conyuge_celular" id="conyuge_celular" value="<?php echo $this->conyuge_celular; ?>" required class="form-control" maxlength="10" minlenght="10" min="1000000000" max="9999999999" /></div>
						</div>
					</div>

					<div class="col-md-6 col-lg-3"><label>Peso (Kg)</label> <input type="number" name="peso" id="peso" value="<?php echo $this->peso; ?>" min="40" max="110" required class="form-control"  /></div>

					<div class="col-md-6 col-lg-3"><label>Estatura (cm)</label> <input type="number" name="estatura" id="estatura" value="<?php echo $this->estatura; ?>" min="120" max="200" required class="form-control"  /></div>

					<div class="col-md-6 col-lg-3">
						<label>¿Declara renta?</label>
						<select name="declara_renta" id="declara_renta" class="form-control" required>
							<option value="" <?php if($this->declara_renta==""){ echo 'selected';} ?>></option>
							<option value="Si" <?php if($this->declara_renta=="Si"){ echo 'selected';} ?>>Si</option>
							<option value="No" <?php if($this->declara_renta=="No"){ echo 'selected';} ?>>No</option>
						</select>
					</div>

					<div class="col-md-6 col-lg-8">
						<label>¿Persona expuesta publicamente? <strong>(Empleado público, político, militar, judicial)</strong></label>
						<select name="persona_publica" id="persona_publica" class="form-control" required>
							<option value="" <?php if($this->persona_publica==""){ echo 'selected';} ?>></option>
							<option value="Si" <?php if($this->persona_publica=="Si"){ echo 'selected';} ?>>Si</option>
							<option value="No" <?php if($this->persona_publica=="No"){ echo 'selected';} ?>>No</option>
						</select>
					</div>

					<div class="col-lg-4"></div>


					<div class="col-md-6 col-lg-3" style="display: none;">
						<label>Cuenta Bancaria No</label> <input type="text" name="cuenta_numero" id="cuenta_numero" value="<?php echo $this->cuenta_numero; ?>" class="form-control"  />
					</div>

					<div class="col-md-6 col-lg-3" style="display: none;">
						<label>Tipo de cuenta</label>
						<select name="cuenta_tipo" id="cuenta_tipo" class="form-control">
							<option value="" <?php if($this->cuenta_tipo==""){ echo 'selected';} ?>></option>
							<option value="AHORROS" <?php if($this->cuenta_tipo=="AHORROS"){ echo 'selected';} ?>>AHORROS</option>
							<option value="CORRIENTE" <?php if($this->cuenta_tipo=="CORRIENTE"){ echo 'selected';} ?>>CORRIENTE</option>
						</select>
					</div>

					<div class="col-md-6 col-lg-3" style="display: none;">
						<label>Entidad bancaria</label>
						<select name="entidad_bancaria" id="entidad_bancaria"  class="form-control">
							<option value="" <?php if($this->entidad_bancaria==""){ echo 'selected'; } ?>></option>
							<?php foreach ($this->bancos as $key => $value): ?>
								<option value="<?php echo $value->nombre; ?>" <?php if($this->entidad_bancaria==$value->nombre){ echo 'selected';} ?>><?php echo $value->nombre; ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="col-md-12 col-lg-12">
						<br><br>
						<table border="0" cellspacing="0" cellpadding="1" class="textos2 tabla2 col-lg-8 offset-lg-2">
						  <tr>
						    <td colspan="4"><div align="center" class="fondo_verde2"><h5>INFORMACIÓN PATRIMONIAL</h5></div></td>
						  </tr>
						  <tr>
						    <td>&nbsp;</td>
						    <td><div align="center"><strong>VALOR BIEN</strong></div></td>
						    <td><div align="center"><strong>VALOR PRENDARIO</strong></div></td>
						    <td><div align="center"><strong>VALOR CUOTA</strong></div></td>
						  </tr>

							<?php $concepto = "VIVIENDA"; ?>
						  <tr>
						    <td>VIVIENDA</td>
						    <td><div align="center">

						      <input type="text" name="VIVIENDA_v1" id="VIVIENDA_v1" value="<?php echo formato_pesos($this->info[$concepto]->v1); ?>" class="form-control" onkeyup="puntitos(this); total_patrimonio();" onchange="total_patrimonio();" />

						    </div></td>
						    <td><div align="center"></div></td>
						    <td><div align="center"></div></td>
						  </tr>

							<?php $concepto = "OTRAS"; ?>
						  <tr>
						    <td>OTROS INMUEBLES</td>
						    <td><div align="center"><input type="text" name="OTRAS_v1" id="OTRAS_v1" value="<?php echo formato_pesos($this->info[$concepto]->v1); ?>" class="form-control" onkeyup="puntitos(this); total_patrimonio();" onchange="total_patrimonio();" /></div></td>
						    <td><div align="center"></div></td>
						    <td><div align="center"></div></td>
						  </tr>

							<?php $concepto = "HIPOTECA"; ?>
						  <tr>
						    <td>HIPOTECA</td>
						    <td><div align="center"><input name="HIPOTECA_v1" id="HIPOTECA_v1" type="checkbox" value="1" <?php if($this->info[$concepto]->v1==1){ echo 'checked="checked"'; } ?>  onclick="validar_hipoteca();" class="form-control" /></div></td>
						    <td><div align="center"><input type="text" name="HIPOTECA_v2" id="HIPOTECA_v2" value="<?php echo formato_pesos($this->info[$concepto]->v2); ?>" class="form-control" onkeyup="puntitos(this); total_patrimonio2();" onchange="total_patrimonio2();" /></div></td>
						    <td><div align="center"><input type="text" name="HIPOTECA_v3" id="HIPOTECA_v3" value="<?php echo formato_pesos($this->info[$concepto]->v3); ?>" class="form-control" onkeyup="puntitos(this); total_patrimonio3();" onchange="total_patrimonio3();" /></div></td>
						  </tr>

							<?php $concepto = "VEHICULO"; ?>
						  <tr>
						    <td>VEHICULO</td>
						    <td><div align="center"><input type="text" name="VEHICULO_v1" id="VEHICULO_v1" value="<?php echo formato_pesos($this->info[$concepto]->v1); ?>" onkeyup="puntitos(this); total_patrimonio();" onchange="total_patrimonio();" class="form-control"  /></div></td>
						    <td><div align="center"></div></td>
						    <td><div align="center"></div></td>
						  </tr>

							<?php $concepto = "OTROS"; ?>
						  <tr>
						    <td>OTROS VEHICULOS</td>
						    <td><div align="center"><input type="text" name="OTROS_v1" id="OTROS_v1" value="<?php echo formato_pesos($this->info[$concepto]->v1); ?>" onkeyup="puntitos(this); total_patrimonio();" onchange="total_patrimonio();" class="form-control"  /></div></td>
						    <td><div align="center"></div></td>
						    <td><div align="center"></div></td>
						  </tr>

							<?php $concepto = "PRENDA";	?>
						  <tr>
						    <td>PRENDA</td>
						    <td><div align="center"><input name="PRENDA_v1" id="PRENDA_v1" type="checkbox" value="1" <?php if($this->info[$concepto]->v1==1){ echo 'checked="checked"'; } ?> onclick="validar_prenda();" class="form-control"  /></div></td>
						    <td><div align="center"><input type="text" name="PRENDA_v2" id="PRENDA_v2" value="<?php echo formato_pesos($this->info[$concepto]->v2); ?>"  onkeyup="puntitos(this); total_patrimonio2();" onchange="total_patrimonio2();" class="form-control"  /></div></td>
						    <td><div align="center"><input type="text" name="PRENDA_v3" id="PRENDA_v3" value="<?php echo formato_pesos($this->info[$concepto]->v3); ?>" onkeyup="puntitos(this); total_patrimonio3();" onchange="total_patrimonio3();" class="form-control"  /></div></td>
						  </tr>
						  <tr>
						    <td><strong>OTROS BIENES MUEBLES</strong></td>
						    <td><div align="center"></div></td>
						    <td><div align="center"></div></td>
						    <td><div align="center"></div></td>
						  </tr>

							<?php $concepto = "CLASE"; ?>
						  <tr>
						    <td>VALOR</td>
						    <td><div align="center"><input type="text" name="CLASE_v1" id="CLASE_v1" value="<?php echo formato_pesos($this->info[$concepto]->v1); ?>" onkeyup="puntitos(this); total_patrimonio();" onchange="total_patrimonio();" class="form-control"  /></div></td>
						    <td><div align="center"></div></td>
						    <td><div align="center"></div></td>
						  </tr>

							<?php $concepto = "PATRIMONIO"; ?>
						  <tr>
						    <td><strong>TOTAL PATRIMONIO</strong></td>
						    <td><div align="center"><input type="text" name="PATRIMONIO_v1" id="PATRIMONIO_v1" value="<?php echo formato_pesos($this->info[$concepto]->v1); ?>" readonly="readonly" class="campo_total form-control" /></div></td>
						    <td><div align="center"><input type="text" name="PATRIMONIO_v2" id="PATRIMONIO_v2" value="<?php echo formato_pesos($this->info[$concepto]->v2); ?>" readonly="readonly" class="campo_total form-control" /></div></td>
						    <td><div align="center"><input type="text" name="PATRIMONIO_v3" id="PATRIMONIO_v3" value="<?php echo formato_pesos($this->info[$concepto]->v3); ?>" readonly="readonly" class="campo_total form-control" /></div></td>
						  </tr>
						  <tr>
						    <td>&nbsp;</td>
						    <td><div align="center"></div></td>
						    <td><div align="center"></div></td>
						    <td><div align="center"></div></td>
						  </tr>
						  <tr>
						    <td><strong>OTRAS OBLIGACIONES FINANCIERAS</strong></td>
						    <td><div align="center"></div></td>
						    <td><div align="center"></div></td>
						    <td><div align="center"></div></td>
						  </tr>
						  <tr>
						    <td>&nbsp;</td>
						    <td><div align="center"><strong>SALDO OBLIGACION</strong></div></td>
						    <td><div align="center"></div></td>
						    <td><div align="center"><strong>VALOR CUOTA</strong></div></td>
						  </tr>

							<?php $concepto = "TARJETAS"; ?>
						  <tr>
						    <td>TARJETAS DE CREDITOS</td>
						    <td><div align="center"><input type="text" name="TARJETAS_v1" id="TARJETAS_v1" value="<?php echo formato_pesos($this->info[$concepto]->v1); ?>" onkeyup="puntitos(this); total_otras();" onchange="total_otras();" class="form-control" /></div></td>
						    <td><div align="center"></div></td>
						    <td><div align="center"><input type="text" name="TARJETAS_v3" id="TARJETAS_v3" value="<?php echo formato_pesos($this->info[$concepto]->v3); ?>" onkeyup="puntitos(this); total_otras3();" onchange="total_otras3();" class="form-control" /></div></td>
						  </tr>

							<?php $concepto = "OTROS2";	?>
						  <tr>
						    <td>OTROS PRESTAMOS DIFERENTES A FESDIS</td>
						    <td><div align="center"><input type="text" name="OTROS2_v1" id="OTROS2_v1" value="<?php echo formato_pesos($this->info[$concepto]->v1); ?>" onkeyup="puntitos(this); total_otras();" onchange="total_otras();" class="form-control" /></div></td>
						    <td><div align="center"></div></td>
						    <td><div align="center"><input type="text" name="OTROS2_v3" id="OTROS2_v3" value="<?php echo formato_pesos($this->info[$concepto]->v3); ?>" onkeyup="puntitos(this); total_otras3();" onchange="total_otras3();" class="form-control" /></div></td>
						  </tr>

							<?php $concepto = "OBLIGACIONES"; ?>
						  <tr>
						    <td><strong>TOTAL OTRAS OBLIGACIONES</strong></td>
						    <td><div align="center"><input type="text" name="OBLIGACIONES_v1" id="OBLIGACIONES_v1" value="<?php echo formato_pesos($this->info[$concepto]->v1); ?>" onkeyup="puntitos(this);" onchange class="campo_total form-control" readonly="readonly" /></div></td>
						    <td><div align="center"></div></td>
						    <td><div align="center"><input type="text" name="OBLIGACIONES_v3" id="OBLIGACIONES_v3" value="<?php echo formato_pesos($this->info[$concepto]->v3); ?>" onkeyup="puntitos(this);" onchange="" class="campo_total form-control" readonly="readonly" /></div></td>
						  </tr>
						  <tr>
						    <td>TOTAL OBLIGACIONES</td>
						    <td>&nbsp;</td>
						    <td>&nbsp;</td>
						    <td><input type="text" name="TOTAL_OBLIGACIONES" id="TOTAL_OBLIGACIONES" value="" readonly="readonly"  class="campo_total form-control" /></td>
						  </tr>

							<?php $concepto = "TOTALPATRIMONIAL"; ?>
						  <tr>
						    <td><strong>TOTAL INFORMACION PATRIMONIAL</strong></td>
						    <td><div align="center"></div></td>
						    <td><div align="center"></div></td>
						    <td><div align="center"><input type="text" name="TOTALPATRIMONIAL_v3" id="TOTALPATRIMONIAL_v3" value="<?php echo formato_pesos($this->info[$concepto]->v3); ?>" readonly="readonly"  class="campo_total form-control" /></div></td>
						  </tr>
						</table>
					</div>



					<div class="col-md-12 col-lg-12 text">
						<br><br>
						<table border="0" cellspacing="0" cellpadding="1" class="textos2 tabla2 col-lg-8 offset-lg-2">
						  <tr>
						    <td colspan="2"><div align="center" class="fondo_verde2"><strong>INFORMACIÓN FINANCIERA</strong></div></td>
						  </tr>
						  <tr>
						    <td><strong>INGRESOS MENSUALES</strong></td>
						    <td>&nbsp;</td>
						  </tr>
						  <tr>
						    <td>SALARIO</td>
						    <td><label>
						      <input type="text" name="salario1" id="salario1" value="<?php echo formato_pesos($this->financiera->salario); ?>"  onkeyup="puntitos(this); total_ingresos1();" onchange="total_ingresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>PENSION</td>
						    <td><label>
						      <input type="text" name="pension" id="pension" value="<?php echo formato_pesos($this->financiera->pension); ?>"  onkeyup="puntitos(this); total_ingresos1();" onchange="total_ingresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td><strong>OTROS INGRESOS</strong></td>
						    <td><label></label></td>
						  </tr>
						  <tr>
						    <td>ARRIENDOS</td>
						    <td><label>
						      <input type="text" name="arriendos" id="arriendos" value="<?php echo formato_pesos($this->financiera->arriendos); ?>"  onkeyup="puntitos(this); total_ingresos1();" onchange="total_ingresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>DIVIDENDOS</td>
						    <td><label>
						      <input type="text" name="dividendos" id="dividendos" value="<?php echo formato_pesos($this->financiera->dividendos); ?>"  onkeyup="puntitos(this); total_ingresos1();" onchange="total_ingresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>RENTAS</td>
						    <td><label>
						      <input type="text" name="rentas" id="rentas" value="<?php echo formato_pesos($this->financiera->rentas); ?>"  onkeyup="puntitos(this); total_ingresos1();" onchange="total_ingresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>OTROS</td>
						    <td><label><input type="text" name="otros_ingresos" id="otros_ingresos" value="<?php echo formato_pesos($this->financiera->otros_ingresos); ?>"  onkeyup="puntitos(this); total_ingresos1();" onchange="total_ingresos1();" class="form-control" /></label></td>
						  </tr>
						  <tr>
						    <td><strong>(1) TOTAL INGRESOS MENSUALES</strong></td>
						    <td><label>
						      <input type="text" name="total_ingresos" id="total_ingresos" value="<?php echo formato_pesos($this->financiera->total_ingresos); ?>" required readonly="readonly" class="campo_total form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>&nbsp;</td>
						    <td>&nbsp;</td>
						  </tr>

						  <tr>
						    <td><strong>GASTOS MENSUALES</strong></td>
						    <td><label></label></td>
						  </tr>
						  <tr>
						    <td>&nbsp;</td>
						    <td>&nbsp;</td>
						  </tr>
						  <tr>
						    <td>ARRENDAMIENTOS</td>
						    <td><label>
						      <input type="text" name="arrendamientos" id="arrendamientos" value="<?php echo formato_pesos($this->financiera->arrendamientos); ?>"   onkeyup="puntitos(this); total_egresos1();" onchange="total_egresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>GASTOS FAMILIARES</td>
						    <td><label>
						      <input type="text" name="gastos_familiares" id="gastos_familiares" value="<?php echo formato_pesos($this->financiera->gastos_familiares); ?>"  onkeyup="puntitos(this); total_egresos1();" onchange="total_egresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>OBLIGACIONES FINANCIERAS</td>
						    <td><label>
						      <input type="text" name="obligaciones_financieras" id="obligaciones_financieras" value="<?php echo formato_pesos($this->total_obligaciones); ?>"  onkeyup="puntitos(this); total_egresos1();" onchange="total_egresos1();" readonly="readonly" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>OTROS GASTOS</td>
						    <td><label>
						      <input type="text" name="otros_gastos" id="otros_gastos" value="<?php echo formato_pesos($this->financiera->otros_gastos); ?>"  onkeyup="puntitos(this); total_egresos1();" onchange="total_egresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td><strong>(2) TOTAL GASTOS MENSUALES</strong></td>
						    <td><label>
						      <input type="text" name="total_gastos" id="total_gastos" value="<?php echo formato_pesos($this->financiera->total_gastos); ?>"  readonly="readonly" class="campo_total form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>&nbsp;</td>
						    <td>&nbsp;</td>
						  </tr>
						  <tr>
						    <td><strong>CAPACIDAD DE ENDEUDAMIENTO</strong></td>
						    <td>&nbsp;</td>
						  </tr>
						  <tr>
						    <td><strong>(1) TOTAL INGRESOS - (2) TOTAL GASTOS</strong></td>
						    <td><label>
						      <input type="text" name="capacidad_endeudamiento" id="capacidad_endeudamiento" value="<?php echo formato_pesos($this->financiera->capacidad_endeudamiento); ?>"  readonly="readonly" class="campo_total form-control" />
						    </label></td>
						  </tr>
						</table>
						<div class="caja_error" id="error_gastos_familiares" style="display:none;">Debe llenar los gastos familiares</div>
						<div class="caja_error" id="error_salario_pension" style="display:none;">Debe llenar salario o pensión</div>
					</div>

					<div class="col-lg-8 offset-lg-2">
						<div class="row">
							<div class="col-12"><br><br></div>
							<div align="left" class="col-12"><label>Indique a que corresponden los otros ingresos</label>
							  <textarea name="descripcion_ingresos" id="descripcion_ingresos" class="form-control"><?php echo $this->solicitud->descripcion_ingresos; ?></textarea>
							</div>
							<div align="left" class="col-12"><label>Procedencia de los recursos que relaciona</label>
							  <textarea name="descripcion_recursos" id="descripcion_recursos" class="form-control"><?php echo $this->solicitud->descripcion_recursos; ?></textarea>
							</div>
						</div>
					</div>

				</div>
			</div>



	</div>
</div>


<script type="text/javascript">
	calcularEdad();
</script>

<?php
function formato_pesos($x){
	$res = number_format($x,0,',','.');
	return $res;
}
?>