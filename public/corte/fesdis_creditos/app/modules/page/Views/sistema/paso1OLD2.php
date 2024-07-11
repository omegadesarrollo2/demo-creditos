<?php
function capital($x){
	$x = mb_strtolower($x);
	$x = ucfirst($x);
	return $x;
}
?>
<div class="container">
	<div class="row">
			<div class="col-12">
				<div class="row justify-content-center titulo-seccion no-padding">Información Personal</div>
				<div class="row form-group formulario caja-formulario">
					<div class="col-md-6 col-lg-3"><label>Primer nombre</label> <input type="text" name="nombres" id="nombres" value="<?php echo $this->nombres; ?>" required readonly="readonly" class="form-control" /></div>
					<div class="col-md-6 col-lg-3"><label>Segundo nombre</label> <input type="text" name="nombres2" id="nombres2" value="<?php echo $this->nombres2; ?>" required readonly="readonly" class="form-control" /></div>
					<div class="col-md-6 col-lg-3"><label>Primer apellido</label> <input type="text" name="apellido1" id="apellido1" value="<?php echo $this->apellido1; ?>" required readonly="readonly" class="form-control" /></div>
					<div class="col-md-6 col-lg-3"><label>Segundo apellido</label> <input type="text" name="apellido2" id="apellido2" value="<?php echo $this->apellido2; ?>" required readonly="readonly" class="form-control" /></div>

					<div class="col-md-6 col-lg-3"><label>Sexo</label>
						<select name="sexo2" class="form-control" required disabled>
							<option value="" <?php if($this->sexo==""){ echo 'selected';} ?>></option>
							<option value="Femenino" <?php if($this->sexo=="Femenino"){ echo 'selected';} ?>>Femenino</option>
							<option value="Masculino" <?php if($this->sexo=="Masculino"){ echo 'selected';} ?>>Masculino</option>
						</select>
					</div>
					<input type="hidden" name="sexo" value="<?php echo $this->sexo; ?>">
					<div class="col-md-6 col-lg-3"><label>Tipo de identificación</label>
						<select name="tipo_documento2" class="form-control" required disabled>
							<option value="" <?php if($this->tipo_documento==""){ echo 'selected';} ?>></option>
							<option value="CC" <?php if($this->tipo_documento=="CC"){ echo 'selected';} ?>>CC</option>
							<option value="CE" <?php if($this->tipo_documento=="CE"){ echo 'selected';} ?>>CE</option>
							<option value="Pasaporte" <?php if($this->tipo_documento=="Pasaporte"){ echo 'selected';} ?>>Pasaporte</option>
							<option value="Otro" <?php if($this->tipo_documento=="Otro"){ echo 'selected';} ?>>Otro</option>
						</select>
					</div>
					<input type="hidden" name="tipo_documento" value="<?php echo $this->tipo_documento; ?>">
					<div class="col-md-6 col-lg-3"><label>Documento</label> <input type="text" name="documento" id="documento" value="<?php echo $this->documento; ?>" readonly required class="form-control" /></div>

					<div class="col-md-6 col-lg-3"><label>Fecha de expedición</label> <input type="date" name="fecha_documento2" id="fecha_documento" value="<?php echo $this->fecha_documento; ?>" required class="form-control" onchange="validar_fecha_expedicion();"  disabled /></div>
						<input type="hidden" value="<?php echo $this->fecha_documento; ?>" name="fecha_documento" >
					<div class="col-md-6 col-lg-3"><label>Ciudad de expedición</label>
						<select name="ciudad_documento2" id="ciudad_documento" required class="form-control" disabled>
							<?php foreach ($this->ciudades as $ciudad): ?>
								<option value="<?php echo $ciudad->codigo; ?>" <?php if($this->ciudad_documento==$ciudad->codigo){ echo 'selected'; } ?> ><?php echo  utf8_encode(capital($ciudad->nombre))." (".codificar($ciudad->departamento).")"; ?></option>
							<?php endforeach ?>
						</select>
					</div>
								<input type="hidden" value="<?php echo $ciudad->codigo; ?>" name="ciudad_documento">
					<div class="col-md-6 col-lg-3"><label>Fecha nacimiento</label> <input disabled type="date" name="fecha_nacimiento2" id="fecha_nacimiento" value="<?php echo $this->fecha_nacimiento; ?>" max="<?php echo (date("Y")-18).date("-m-d"); ?>" required class="form-control" onchange="calcularEdad();"  /></div>
					<input type="hidden" value="<?php echo $ciudad->codigo; ?>" name="fecha_nacimiento">
					<div class="col-md-6 col-lg-3"><label>Edad</label> <input type="text" name="edad" id="edad" value="<?php echo $this->edad; ?>" readonly class="form-control"  /></div>
					<div class="col-12"><div id="error1"></div></div>


					<div class="col-md-6 col-lg-3"><label>Correo electrónico personal</label> <input disabled type="email" name="correo_personal2" id="correo_personal" value="<?php echo $this->correo_personal; ?>" required class="form-control"  /></div>
					<input type="hidden" value="<?php echo $ciudad->codigo; ?>" name="correo_personal">

					<div class="col-md-6 col-lg-3"><label>Celular</label> <input type="number" disabled name="celular" id="celular2" value="<?php echo $this->celular; ?>" required class="form-control" maxlength="10" minlenght="10" min="1000000000" max="9999999999"  /></div>
					<input type="hidden" name="celular" value="<?php echo $this->celular; ?>"  class="form-control" maxlength="10" minlenght="10" min="1000000000" max="9999999999"  />
								


					<div class="col-md-6 col-lg-6">
						<label>Dirección residencia</label>
						<div class="row">
							<div class="col-lg-6 d-none">
								<select name="nomenclatura2" id="nomenclatura2" class="form-control">
									<option value="">Nomenclatura</option>
									<?php foreach ($this->nomenclaturas as $key => $value): ?>
										<option value="<?php echo $value->codigo; ?>" <?php if($value->codigo==$this->nomenclatura2){ echo 'selected'; } ?> ><?php echo codificar($value->nombre); ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="col-lg-12">
								<input type="text" name="direccion_residencia2" disabled id="direccion_residencia" value="<?php echo $this->direccion_residencia; ?>" required class="form-control" placeholder="Complemento dirección"  />
								<input type="hidden" name="direccion_residencia"  value="<?php echo $this->direccion_residencia; ?>"  />
							</div>
						</div>
					</div>

					<div class="col-md-6 col-lg-3"><label>Barrio</label> <input type="text" disabled name="barrio2" id="barrio" value="<?php echo $this->barrio; ?>" required class="form-control"  /></div>
					<input type="hidden" name="barrio"  value="<?php echo $this->barrio; ?>"  />

					<div class="col-md-6 col-lg-3"><label>Ciudad de Residencia</label>
						<select name="ciudad_residencia" id="ciudad_residencia2" required class="form-control" disabled>
							<?php foreach ($this->ciudades as $ciudad): ?>
								<option value="<?php echo $ciudad->codigo; ?>" <?php if($this->ciudad_residencia==$ciudad->codigo){ echo 'selected'; } ?> ><?php echo utf8_encode(capital($ciudad->nombre))." (".codificar($ciudad->departamento).")"; ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<input type="hidden" name="ciudad_residencia"  value="<?php echo $this->ciudad_residencia; ?>"  />
					<div class="col-md-6 col-lg-3"><label>Teléfono fijo residencia</label> <input type="text" name="telefono2" id="telefono" value="<?php echo $this->telefono; ?>" required class="form-control" disabled  /></div>
					<input type="hidden" name="telefono"  value="<?php echo $this->telefono; ?>"  />


					<div class="col-md-6 col-lg-3">
						<label>Estado civil</label>
						<select name="estado_civil2" id="estado_civil" class="form-control" onchange="validar_conyuge();" required disabled>
							<option value="" <?php if($this->estado_civil==""){ echo 'selected';} ?>></option>
							<option value="Soltero(a)" <?php if($this->estado_civil=="Soltero(a)"){ echo 'selected';} ?>>Soltero(a)</option>
							<option value="Casado(a)" <?php if($this->estado_civil=="Casado(a)"){ echo 'selected';} ?>>Casado(a)</option>
							<option value="Separado(a)" <?php if($this->estado_civil=="Separado(a)"){ echo 'selected';} ?>>Separado(a)</option>
							<option value="Viudo(a)" <?php if($this->estado_civil=="Viudo(a)"){ echo 'selected';} ?>>Viudo(a)</option>
							<option value="Union libre" <?php if($this->estado_civil=="Union libre"){ echo 'selected';} ?>>Unión libre</option>
						</select>
					</div>
					<input type="hidden" name="estado_civil"  value="<?php echo $this->estado_civil; ?>"  />

				</div>
				<div class="row justify-content-center titulo-seccion no-padding">Información Laboral</div>
				<div class="row form-group formulario caja-formulario">


					<div class="col-md-6 col-lg-3"><label>Entidad</label> <input type="hidden" name="empresa" id="empresa" value="<?php echo $this->empresa; ?>" required class="form-control"  />
					<input type="text" name="empresa2" id="empresa2" value="<?php echo $this->empresa; ?>" required class="form-control" disabled />
					</div>

					<div class="col-md-6 col-lg-3"><label>Dependencia/Área</label> <input type="hidden" name="dependencia" id="dependencia" value="<?php echo $this->dependencia; ?>" required class="form-control"  />
					<input type="text" name="dependencia2" id="dependencia2" value="<?php echo $this->dependencia; ?>" required class="form-control" disabled />
					</div>



					<div class="col-md-6 col-lg-6"><label>Dirección oficina</label>
						<div class="row">
							<div class="col-lg-6 d-none">
								<select name="nomenclatura1" id="nomenclatura1" class="form-control">
									<option value="">Nomenclatura</option>
									<?php foreach ($this->nomenclaturas as $key => $value): ?>
										<option value="<?php echo $value->codigo; ?>" <?php if($value->codigo==$this->nomenclatura1){ echo 'selected'; } ?> ><?php echo codificar($value->nombre); ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="col-lg-12">
								<input type="hidden" name="direccion_oficina" id="direccion_oficina" value="<?php echo $this->direccion_oficina; ?>" required class="form-control" placeholder="Complemento dirección"  />
								<input type="text" name="direccion_oficina2" id="direccion_oficina2" value="<?php echo $this->direccion_oficina; ?>" required class="form-control" disabled  />
							</div>
						</div>

					</div>

					<div class="col-md-6 col-lg-3"><label>Ciudad oficina</label>
						<select name="ciudad_oficina2" id="ciudad_oficina" required class="form-control" disabled>
							<?php foreach ($this->ciudades as $ciudad): ?>
								<option value="<?php echo $ciudad->codigo; ?>" <?php if($this->ciudad_oficina==$ciudad->codigo){ echo 'selected'; } ?> ><?php echo  utf8_encode(capital($ciudad->nombre))." (".codificar($ciudad->departamento).")"; ?></option>
							<?php endforeach ?>
						</select>
						<input type="hidden" name="ciudad_oficina" id="ciudad_oficina2" value="<?php echo $this->ciudad_oficina; ?>" required class="form-control"   />

					</div>

					<div class="col-md-6 col-lg-3"><label>Teléfono fijo oficina</label> <input type="hidden" name="telefono_oficina" id="telefono_oficina" value="<?php echo $this->telefono_oficina; ?>" required class="form-control"   />
					<input type="text" name="telefono_oficina2" id="telefono_oficina2" value="<?php echo $this->telefono_oficina; ?>" required class="form-control" disabled  />
					</div>

					<div class="col-md-6 col-lg-3"><label>Correo electrónico empresarial</label> <input type="hidden" name="correo_empresarial" id="correo_empresarial" value="<?php echo $this->correo_empresarial; ?>" required class="form-control"  />
					<input type="email" name="correo_empresarial2" id="correo_empresarial2" value="<?php echo $this->correo_empresarial; ?>" required class="form-control" disabled />
					</div>

					<div class="col-md-6 col-lg-3"><label>Fecha ingreso</label> <input type="hidden" name="fecha_ingreso" id="fecha_ingreso" value="<?php echo $this->fecha_ingreso; ?>" required class="form-control" />
					<input type="date" name="fecha_ingreso2" id="fecha_ingreso2" value="<?php echo $this->fecha_ingreso; ?>" required class="form-control" disabled />
					</div>

					<div class="col-md-6 col-lg-3"><label>Cargo</label> <input type="hidden" name="cargo" id="cargo" value="<?php echo $this->cargo; ?>" required class="form-control"  />
					<input type="text" name="cargo2" id="cargo2" value="<?php echo $this->cargo; ?>" required class="form-control" disabled />
					</div>

					<div class="col-md-6 col-lg-3"><label>Fecha afiliación</label> <input type="hidden" name="fecha_afiliacion" id="fecha_afiliacion" value="<?php echo $this->fecha_afiliacion; ?>" required class="form-control" />
					<input type="date" name="fecha_afiliacion2" id="fecha_afiliacion2" value="<?php echo $this->fecha_afiliacion; ?>" required class="form-control" disabled />
					</div>


					<div class="col-md-6 col-lg-3">
						<label>Tipo de vinculación</label>
						<?php $bandera=0;
						 ?>
						<select name="situacion_laboral2" id="situacion_laboral" class="form-control" required disabled >
							<option value="" <?php if($this->situacion_laboral==""){ echo 'selected'; $bandera=1;} ?>></option>
							<option value="Carrera Administrativa" <?php if($this->situacion_laboral=="Carrera Administrativa"){ echo 'selected'; $bandera=1;} ?>>Carrera Administrativa</option>
							<option value="Provisional" <?php if($this->situacion_laboral=="Provisional"){ echo 'selected'; $bandera=1;} ?>>Provisional</option>
							<option value="Libre nombramiento" <?php if($this->situacion_laboral=="Libre nombramiento"){ echo 'selected'; $bandera=1;} ?>>Libre nombramiento</option>
							<option value="Contratista" <?php if($this->situacion_laboral=="Contratista"){ echo 'selected'; $bandera=1;} ?>>Contratista</option>
							<option value="Pensionado" <?php if($this->situacion_laboral=="Pensionado"){ echo 'selected'; $bandera=1;} ?>>Pensionado</option>
							<option value="<?php if($this->situacion_laboral!="" & $bandera==0){ echo $this->situacion_laboral; }else { echo "otro";} ?>" id="otro" <?php if($this->situacion_laboral!="" & $bandera==0){ echo 'selected'; } ?>>Otro</option>
						</select>
							<div class="<?php if($this->situacion_laboral!="" & $bandera==0){ echo "d-block "; }else{ echo "d-none ";} ?>" id="campo_otro" >
								<label>¿Cuál?</label>
								<input type="text"  class="form-control" value="<?php if($this->situacion_laboral!="" & $bandera==0){ echo $this->situacion_laboral; } ?>" disabled>
							</div>
							<input type="hidden" name="situacion_laboral"  class="form-control" value="<?php  echo $this->situacion_laboral;  ?>">
						</div>
					<div class="col-md-6 col-lg-3"><label>Número asignado</label> <input type="text" name="numero_asignado" id="numero_asignado" value="<?php echo $this->numero_asignado; ?>" required class="form-control"  /></div>

					<!-- <div class="col-md-6 col-lg-3"><label>Salario</label> <input type="number" name="salario" id="salario" value="<?php echo $this->salario; ?>" required class="form-control"  /></div> -->

				</div>

				<div class="row justify-content-center  titulo-seccion no-padding">Información Bancaria (Para desembolso)</div>
				<div class="row form-group formulario caja-formulario">




					<div class="col-md-6 col-lg-3">
						<label>Cuenta Bancaria No</label> <input type="text" name="cuenta_numero" id="cuenta_numero" value="<?php echo $this->cuenta_numero; ?>" required class="form-control"  />
					</div>

					<div class="col-md-6 col-lg-3">
						<label>Tipo de cuenta</label>
						<select name="cuenta_tipo" id="cuenta_tipo" class="form-control">
							<option value="" <?php if($this->cuenta_tipo==""){ echo 'selected';} ?>></option>
							<option value="AHORROS" <?php if($this->cuenta_tipo=="AHORROS"){ echo 'selected';} ?>>AHORROS</option>
							<option value="CORRIENTE" <?php if($this->cuenta_tipo=="CORRIENTE"){ echo 'selected';} ?>>CORRIENTE</option>
						</select>
					</div>

					<div class="col-md-6 col-lg-3">
						<label>Entidad bancaria</label>
						<select name="entidad_bancaria" id="entidad_bancaria" required class="form-control">
							<option value="" <?php if($this->entidad_bancaria==""){ echo 'selected'; } ?>></option>
							<?php foreach ($this->bancos as $key => $value): ?>
								<option value="<?php echo $value->nombre; ?>" <?php if($this->entidad_bancaria==$value->nombre){ echo 'selected';} ?>><?php echo $value->nombre; ?></option>
							<?php endforeach ?>
						</select>
					</div>

				</div>
			</div>


	</div>
</div>
<script type="text/javascript">
	calcularEdad();
</script>


<?php if($_GET['mod']=="detalle_solicitud"){ ?>
	<script type="text/javascript">
		function f1(){
			$("input").prop("disabled", true);
			$("select").prop("disabled", true);
		}
		setTimeout(f1(),1000);
		setTimeout(f1(),2000);
		setTimeout(f1(),3000);
	</script>


<?php } ?>
<script type="text/javascript">
$( "#situacion_laboral" ).change(function() {
	var id = $(this).children(":selected").attr("id");
  if(id=="otro"){
	  $("#campo_otro").addClass("d-block");
	  $("#campo_otro").removeClass("d-none");
	  $("#campo_otro input").prop('required',true);
  }else{
	$("#campo_otro").addClass("d-none");
	  $("#campo_otro").removeClass("d-block");
	  $("#campo_otro input").prop('required',false);
  }
});
$('body').on('keyup', '#campo_otro input', function(){
	$("#otro").val(this.value);
});
</script>