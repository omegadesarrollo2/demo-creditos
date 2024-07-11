<?php
function codificar($x){
	$x = utf8_encode($x);
	return $x;
}

function capital($x){
	$x = mb_strtolower($x);
	$x = ucfirst($x);
	return $x;
}
?>

<?php if(($this->e == $this->hash and $this->e!="" and $this->hash!="") or $_GET['mod']=="detalle_solicitud"){ ?>


	<?php if($this->hoy <= $this->nuevafecha or $_GET['prueba']=="1" or $_GET['mod']=="detalle_solicitud"){ ?>
		<form action="/page/codeudor/guardar/" method="post" enctype="multipart/form-data">

			<div class="container">
				<div class="row">
						<?php if($_GET['mod']!="detalle_solicitud"){ ?>
							<div class="col-12">
								<br><?php echo $this->tabla; ?><br>
							</div>
						<div class="col-12"><br><h3>Por favor actualice su información</h3></div>
						<?php } ?>
						<div class="col-12">
							<div class="col-md-12 titulo-seccion no-padding text-center">Información Personal</div>
							<div class="row form-group formulario caja-formulario">
								<div class="col-md-6 col-lg-3"><label>Primer nombre</label> <input type="text" name="nombres" id="nombres" value="<?php echo $this->nombres; ?>" required class="form-control" /></div>
								<div class="col-md-6 col-lg-3"><label>Segundo nombre</label> <input type="text" name="nombres2" id="nombres2" value="<?php echo $this->nombres2; ?>"  class="form-control" /></div>
								<div class="col-md-6 col-lg-3"><label>Primer apellido</label> <input type="text" name="apellido1" id="apellido1" value="<?php echo $this->apellido1; ?>" required class="form-control" /></div>
								<div class="col-md-6 col-lg-3"><label>Segundo apellido</label> <input type="text" name="apellido2" id="apellido2" value="<?php echo $this->apellido2; ?>"  class="form-control" /></div>

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

								<div class="col-md-6 col-lg-3"><label>Fecha de expedición</label> <input type="date" name="fecha_documento" id="fecha_documento" value="<?php echo $this->fecha_documento; ?>" required class="form-control" onchange="validar_fecha_expedicion();"  /></div>

								<div class="col-md-6 col-lg-3"><label>Ciudad de expedición</label>
									<select name="ciudad_documento" id="ciudad_documento" required class="form-control">
										<?php foreach ($this->ciudades as $ciudad): ?>
											<option value="<?php echo $ciudad->codigo; ?>" <?php if($this->ciudad_documento==$ciudad->codigo){ echo 'selected'; } ?> ><?php echo capital(codificar($ciudad->nombre))." (".codificar($ciudad->departamento).")"; ?></option>
										<?php endforeach ?>
									</select>
								</div>

								<div class="col-md-6 col-lg-3"><label>Fecha nacimiento</label> <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $this->fecha_nacimiento; ?>" max="<?php echo (date("Y")-18).date("-m-d"); ?>" required class="form-control" onchange="calcularEdad();"  /></div>

								<div class="col-md-6 col-lg-3"><label>Edad</label> <input type="text" name="edad" id="edad" value="<?php echo $this->edad; ?>" readonly class="form-control"  /></div>
								<div class="col-12"><div id="error1"></div></div>


								<div class="col-md-6 col-lg-3"><label>Correo electrónico personal</label> <input type="email" name="correo" id="correo" value="<?php echo $this->correo_personal; ?>" required class="form-control" readonly  /></div>


								<div class="col-md-6 col-lg-3"><label>Celular</label> <input type="number" name="celular" id="celular" value="<?php echo $this->celular; ?>" required class="form-control" maxlength="10" minlenght="10" min="1000000000" max="9999999999"  /></div>



								<div class="col-md-6 col-lg-6">
									<label>Dirección residencia</label>
									<div class="row">
										<div class="col-lg-6 d-none">
											<select name="nomenclatura2" id="nomenclatura2" class="form-control" >
												<option value="">Nomenclatura</option>
												<?php foreach ($this->nomenclaturas as $key => $value): ?>
													<option value="<?php echo $value->codigo; ?>" <?php if($value->codigo==$this->nomenclatura2){ echo 'selected'; } ?> ><?php echo codificar($value->nombre); ?></option>
												<?php endforeach ?>
											</select>
										</div>
										<div class="col-lg-12">
											<input type="text" name="direccion_residencia" id="direccion_residencia" value="<?php echo $this->direccion_residencia; ?>" required class="form-control" placeholder="Complemento dirección"  />
										</div>
									</div>
								</div>

								<div class="col-md-6 col-lg-3"><label>Barrio</label> <input type="text" name="barrio" id="barrio" value="<?php echo $this->barrio; ?>" required class="form-control"  /></div>

								<div class="col-md-6 col-lg-3"><label>Ciudad de Residencia</label>
									<select name="ciudad_residencia" id="ciudad_residencia" required class="form-control">
										<?php foreach ($this->ciudades as $ciudad): ?>
											<option value="<?php echo $ciudad->codigo; ?>" <?php if($this->ciudad_residencia==$ciudad->codigo){ echo 'selected'; } ?> ><?php echo capital(codificar($ciudad->nombre))." (".codificar($ciudad->departamento).")"; ?></option>
										<?php endforeach ?>
									</select>
								</div>

								<div class="col-md-6 col-lg-3"><label>Teléfono fijo residencia</label> <input type="number" name="telefono" id="telefono" value="<?php echo $this->telefono; ?>" required class="form-control" maxlength="7" minlenght="7" min="1000000" max="9999999"  /></div>


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


							</div>
							<div class="col-md-12 titulo-seccion no-padding text-center">Información Laboral</div>
							<div class="row form-group formulario caja-formulario">


								<div class="col-md-6 col-lg-3"><label>Empresa</label> <input type="text" name="empresa" id="empresa" value="<?php echo $this->empresa; ?>" required class="form-control"  /></div>

								<div class="col-md-6 col-lg-3"><label>Dependencia/Área</label> <input type="text" name="dependencia" id="dependencia" value="<?php echo $this->dependencia; ?>" required class="form-control"  /></div>



								<div class="col-md-6 col-lg-6"><label>Dirección oficina</label>
									<div class="row">
										<div class="col-lg-6 d-none">
											<select name="nomenclatura1" id="nomenclatura1" class="form-control" >
												<option value="">Nomenclatura</option>
												<?php foreach ($this->nomenclaturas as $key => $value): ?>
													<option value="<?php echo $value->codigo; ?>" <?php if($value->codigo==$this->nomenclatura1){ echo 'selected'; } ?> ><?php echo codificar($value->nombre); ?></option>
												<?php endforeach ?>
											</select>
										</div>
										<div class="col-lg-12">
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

								<div class="col-md-6 col-lg-3"><label>Correo electrónico empresarial</label> <input type="email" name="correo_empresarial" id="correo_empresarial" value="<?php echo $this->correo_empresarial; ?>" required class="form-control"  /></div>

								<div class="col-md-6 col-lg-3"><label>Fecha ingreso</label> <input type="date" name="fecha_ingreso" id="fecha_ingreso" value="<?php echo $this->fecha_ingreso; ?>" required class="form-control" /></div>

								<div class="col-md-6 col-lg-3"><label>Cargo</label> <input type="text" name="cargo" id="cargo" value="<?php echo $this->cargo; ?>" required class="form-control"  /></div>

							</div>

						</div>

						<?php echo $this->getRoutPHP('modules/page/Views/sistema/paso6.php'); ?>
						<?php echo $this->getRoutPHP('modules/page/Views/sistema/terminos_codeudor.php'); ?>

						<?php if($_GET['mod']!="detalle_solicitud"){ ?>
							<div class="col-12 text-center"><input name="Enviar" type="submit" value="Enviar" class="btn btn-azul" /><br><br></div>
						<?php } ?>

						<input name="id" type="hidden" value="<?php echo $this->id; ?>" />
						<input name="n" type="hidden" value="<?php echo $this->n; ?>" />

				</div>
			</div>


		</form>
	<?php }else{ ?>
		<div class="col-12 text-center"><br><br>El enlace ha expirado.</div>
	<?php } ?>

<?php } ?>

<script type="text/javascript">
function calcularEdad() {
	var fecha = document.getElementById('fecha_nacimiento').value;
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }
    document.getElementById('edad').value=edad;
    $("#error1").html();
	if(edad<18){
		var mensaje = ("Debe ser mayor de edad");
		document.getElementById('fecha_nacimiento').value="";
		document.getElementById('edad').value="";
		$("#error1").html('<div class="alert alert-danger error"><i class="far fa-times-circle error"></i> '+mensaje+'</div>');
	}
}

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