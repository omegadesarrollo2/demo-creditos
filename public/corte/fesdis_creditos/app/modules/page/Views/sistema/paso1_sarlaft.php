<style type="text/css">
.input-terminos input[type='checkbox'] {
    -webkit-appearance:none;
    width:30px;
    height:30px;
    background:white;
    border-radius:5px;
    border:2px solid #555;
    margin-bottom: -9px;
}
.input-terminos input[type='checkbox']:checked {
    background: #abd;
    background: url('/corte/ok.png');
    background-size: cover;
}
</style>

<?php
function capital($x){
	$x = mb_strtolower($x);
	$x = ucfirst($x);
	return $x;
}
?>
<script type="text/javascript">
function calcular_edad1(id) {
	var anio = document.getElementById('fecha_aB_'+id).value;
	var mes = document.getElementById('fecha_mB_'+id).value;
	var dia = document.getElementById('fecha_dB_'+id).value;

	var fecha = anio+"-"+mes+"-"+dia;
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }
    if(edad){
    	document.getElementById('edadB_'+id).value=edad;
	}
}
function validar_porcentaje(){
	var total = 0;
	for(i=1;i<=5;i++){
		porcentaje = document.getElementById('porcentaje_'+i).value;
		if(porcentaje!=""){
			porcentaje = parseFloat(porcentaje);
			total+=porcentaje;
			if(total>100){
				alert("El porcentaje de beneficiarios no puede superar el 100%");
				total = total-porcentaje;
				document.getElementById('porcentaje_'+i).value=0;
			}
		}
	}
	if(total<100){
		document.getElementById('error_porcentaje').style.display='';
		document.getElementById('continuar').style.visibility='hidden';
	}else{
		document.getElementById('continuar').style.visibility='visible';
		document.getElementById('error_porcentaje').style.display='none';
	}
}
</script>
<div class="container">
	<div class="row">
			<div class="col-12">
				<div class="col-md-12 titulo-seccion no-padding">I. Información Personal</div>
				<div class="row form-group formulario caja-formulario">
					<div class="col-md-6 col-lg-6"><label>Nombres</label> <input type="text" value="<?php echo $this->nombres; ?>"  readonly="readonly" class="form-control" /></div>
					<div class="col-md-6 col-lg-6"><label>Apellidos</label> <input type="text" value="<?php echo $this->apellidos; ?>" readonly class="form-control" /></div>

					<div class="col-md-6 col-lg-3"><label>Fecha nacimiento</label> <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $this->fecha_nacimiento; ?>" max="<?php echo (date("Y")-18).date("-m-d"); ?>" required class="form-control" onchange="calcularEdad();"  /></div>

					<div class="col-md-6 col-lg-3"><label>Ciudad de nacimiento</label>
						<select name="ciudad_nacimiento" id="ciudad_nacimiento" required class="form-control">
							<option value="" <?php if($this->ciudad_nacimiento==""){echo "selected";}?>>Seleccione...</option>
							<?php foreach ($this->ciudades as $ciudad): ?>
								<option value="<?php echo $ciudad->codigo; ?>" <?php if($this->ciudad_nacimiento==$ciudad->codigo){ echo 'selected'; } ?> ><?php echo utf8_encode($ciudad->nombre)." (".utf8_encode($ciudad->departamento).")"; ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="col-md-6 col-lg-3"><label>Documento</label> <input type="text" name="documento" id="documento" value="<?php echo $this->documento; ?>" readonly class="form-control" /></div>

					<div class="col-md-6 col-lg-3"><label>Tipo de identificación</label>
						<select name="tipo_documento" class="form-control" required>
							<option value="" <?php if($this->tipo_documento==""){ echo 'selected';} ?>></option>
							<option value="CC" <?php if($this->tipo_documento=="CC"){ echo 'selected';} ?>>CC</option>
							<option value="CE" <?php if($this->tipo_documento=="CE"){ echo 'selected';} ?>>CE</option>
							<option value="Pasaporte" <?php if($this->tipo_documento=="Pasaporte"){ echo 'selected';} ?>>Pasaporte</option>
							<option value="Otro" <?php if($this->tipo_documento=="Otro"){ echo 'selected';} ?>>Otro</option>
						</select>
					</div>



					<div class="col-md-6 col-lg-4"><label>Nacionalidad</label> <input type="text" name="pais" id="pais" value="<?php echo $this->pais; ?>" required class="form-control"  /></div>

					<div class="col-md-6 col-lg-4"><label>Fecha de expedición del documento</label> <input type="date" name="fecha_documento" id="fecha_documento" value="<?php echo $this->fecha_documento; ?>" required class="form-control" onchange="validar_fecha_expedicion();"  /></div>

					<div class="col-md-6 col-lg-4"><label>Ciudad de expedición del documento</label>
						<select name="ciudad_documento" id="ciudad_documento" required class="form-control">
						<option value="" <?php if($this->ciudad_documento==""){echo "selected";}?>>Seleccione...</option>
							<?php foreach ($this->ciudades as $ciudad): ?>
								<option value="<?php echo $ciudad->codigo; ?>" <?php if($this->ciudad_documento==$ciudad->codigo){ echo 'selected'; } ?> ><?php echo utf8_encode($ciudad->nombre)." (".utf8_encode($ciudad->departamento).")"; ?></option>
							<?php endforeach ?>
						</select>
					</div>


					<div class="col-md-6 col-lg-3">
						<label>Estado civil</label>
						<select name="estado_civil" id="estado_civil" class="form-control" required>
							<option value="" <?php if($this->estado_civil==""){ echo 'selected';} ?>></option>
							<option value="SOLTERO-A" <?php if($this->estado_civil=="SOLTERO-A"){ echo 'selected';} ?>>Soltero(a)</option>
							<option value="CASADO-A" <?php if($this->estado_civil=='CASADO-A'){ echo 'selected';} ?>>Casado(a)</option>
							<option value="DIVORCIADO-A" <?php if($this->estado_civil=="DIVORCIADO-A"){ echo 'selected';} ?>>Separado(a)</option>
							<option value="VIUDO-A" <?php if($this->estado_civil=="VIUDO-A"){ echo 'selected';} ?>>Viudo(a)</option>
							<option value="UNION LIBRE" <?php if($this->estado_civil=="UNIONLIBRE"){ echo 'selected';} ?>>Unión libre</option>
						</select>
					</div>

					<div class="col-md-6 col-lg-3"><label>Sexo</label>
						<select name="sexo" class="form-control" required>
							<option value="" <?php if($this->sexo==""){ echo 'selected';} ?>></option>
							<option value="F" <?php if($this->sexo=="F"){ echo 'selected';} ?>>Femenino</option>
							<option value="M" <?php if($this->sexo=="M"){ echo 'selected';} ?>>Masculino</option>
						</select>
					</div>

					<div class="col-md-6 col-lg-3">
						<label>Nivel educativo</label>
						<select name="nivel_educativo" id="nivel_educativo" class="form-control" required>
							<option value="" <?php if($this->nivel_educativo==""){ echo 'selected';} ?>></option>
							<option value="Ninguno" <?php if($this->nivel_educativo=="Ninguno"){ echo 'selected';} ?>>Ninguno</option>
							<option value="Primaria" <?php if($this->nivel_educativo=="Primaria"){ echo 'selected';} ?>>Primaria</option>
							<option value="Bachillerato" <?php if($this->nivel_educativo=="Bachillerato"){ echo 'selected';} ?>>Bachillerato</option>
							<option value="Técnico" <?php if($this->nivel_educativo=="Técnico"){ echo 'selected';} ?>>Técnico</option>
							<option value="Tecnología" <?php if($this->nivel_educativo=="Tecnología"){ echo 'selected';} ?>>Tecnología</option>
							<option value="Universitario" <?php if($this->nivel_educativo=="Universitario"){ echo 'selected';} ?>>Universitario</option>
							<option value="Especialización" <?php if($this->nivel_educativo=="Especialización"){ echo 'selected';} ?>>Especialización</option>
						</select>
					</div>


					<div class="col-md-6 col-lg-3"><label>¿Titulo?</label> <input type="text" name="titulo" id="titulo" value="<?php echo $this->titulo; ?>" class="form-control"  /></div>


					<div class="col-md-6 col-lg-6">
						<label>Dirección residencia</label>
						<input type="text" name="direccion_residencia" id="direccion_residencia" value="<?php echo $this->direccion_residencia; ?>" required class="form-control" placeholder="Complemento dirección"  />
					</div>

					<div class="col-md-6 col-lg-6"><label>Barrio</label> <input type="text" name="barrio" id="barrio" value="<?php echo $this->barrio; ?>" required class="form-control"  /></div>


					<div class="col-md-6 col-lg-4"><label>Teléfono fijo residencia</label> <input type="text" name="telefono" id="telefono" value="<?php echo $this->telefono; ?>" required class="form-control"  /></div>

					<div class="col-md-6 col-lg-4"><label>Celular</label> <input type="number" name="celular" id="celular" value="<?php echo $this->celular; ?>" required class="form-control" maxlength="10" minlenght="10" min="1000000000" max="9999999999"  /></div>


					<div class="col-md-6 col-lg-4"><label>Correo electrónico personal</label> <input type="email" name="correo_personal" id="correo_personal" value="<?php echo $this->correo_personal; ?>" required class="form-control"  /></div>

					<?php $intereses = array("Cine","Teatro","Conciertos y espectaculos","Suscripciones","Gimnasio"); ?>
					<div class="col-md-12 col-lg-12 d-none"><label>Intereses</label>
						<input type="hidden" id="intereses" name="intereses" value="<?php echo $this->intereses; ?>">
						<?php foreach ($intereses as $key => $value) { ?>
							<label onclick="llenar_intereses();" class="espacio"><?php echo $value; ?> <input type="checkbox" id="interes<?php echo $key; ?>" value="1" <?php if($this->intereses=="".$key or (strpos($this->intereses,"".$key)!==false) ){ echo 'checked'; } ?> >
							</label>
						<?php } ?>
						<script type="text/javascript">
							function llenar_intereses(){
								var res = "";
								var key = 0;
								<?php foreach ($intereses as $key => $value) { ?>
									key = '<?php echo $key; ?>';
									if($("#interes"+key).prop('checked')===true){
										res=res+key+",";
									}
								<?php } ?>
								res = res.substring(0, res.length - 1);
								$("#intereses").val(res);
							}
						</script>
					</div>



				</div>
				<div class="col-md-12 titulo-seccion no-padding">II. Información Laboral</div>
				<div class="row form-group formulario caja-formulario">

					<div class="col-md-6 col-lg-4"><label>Fecha ingreso</label> <input type="date" name="fecha_ingreso" id="fecha_ingreso" value="<?php echo $this->fecha_ingreso; ?>" required class="form-control" /></div>


					<div class="col-md-6 col-lg-4">
						<label>Tipo de vinculación</label>
						<select name="situacion_laboral" id="tipo_vinculacion" class="form-control" required>
							<option value="" <?php if($this->situacion_laboral==""){ echo 'selected';} ?>></option>
                    <option value="Carrera Administrativa" <?php if($this->situacion_laboral=="Carrera Administrativa"){ echo 'selected';} ?>>Carrera Administrativa</option>
                    <option value="Provisional" <?php if($this->situacion_laboral=="Provisional"){ echo 'selected';} ?>>Provisional</option>
                    <option value="Libre nombramiento" <?php if($this->situacion_laboral=="Libre nombramiento"){ echo 'selected';} ?>>Libre nombramiento</option>
                    <option value="Contratista" <?php if($this->situacion_laboral=="Contratista"){ echo 'selected';} ?>>Contratista</option>
                    <option value="Pensionado" <?php if($this->situacion_laboral=="Pensionado"){ echo 'selected';} ?>>Pensionado</option>
                    <option value="otro" id="otro">Otro</option>
						</select>
						<div class="d-none" id="campo_otro">
                    <label>¿Cuál?</label>
                    <input type="text" class="form-control" value="">

                </div>

					</div>

					<div class="col-md-6 col-lg-4 d-none"><label>Código CIUU</label> <input type="text" name="codigo_ciuu" id="codigo_ciuu" value="<?php echo $this->codigo_ciuu; ?>"  class="form-control"  /></div>


					<div class="col-md-6 col-lg-6"><label>Cargo</label> <input type="text" name="cargo" id="cargo" value="<?php echo $this->cargo; ?>" required class="form-control"  /></div>

					<div class="col-md-6 col-lg-6"><label>Salario</label> <input type="text" name="salario" id="salario" value="<?php echo $this->salario; ?>" required class="form-control" onkeyup="puntitos(this);" /></div>



					<div class="col-md-6 col-lg-3"><label>Dependencia</label> <input type="text" name="dependencia" id="dependencia" value="<?php echo $this->dependencia; ?>" required class="form-control"  /></div>


					<div class="col-md-6 col-lg-3"><label>Ciudad Laboral</label>
						<select name="ciudad_oficina" id="ciudad_oficina" required class="form-control">
							<?php foreach ($this->ciudades as $ciudad): ?>
								<option value="" <?php if($this->ciudad_oficina==""){echo "selected";}?>>Seleccione...</option>
								<option value="<?php echo $ciudad->codigo; ?>" <?php if($this->ciudad_oficina==$ciudad->codigo){ echo 'selected'; } ?> ><?php echo capital(codificar($ciudad->nombre))." (".codificar($ciudad->departamento).")"; ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="col-md-6 col-lg-6"><label>subdirección</label>
								<input type="text" name="direccion_oficina" id="direccion_oficina" value="<?php echo $this->direccion_oficina; ?>" required class="form-control" placeholder="Complemento dirección"  />

					</div>

					<div class="col-md-6 col-lg-6 d-none">
						<label>Pagador</label>
						<select name="empresa" id="empresa" class="form-control" >
							<option value="" <?php if($this->empresa==""){ echo 'selected';} ?>></option>
							<option value="Codensa" <?php if($this->empresa=="Codensa"){ echo 'selected';} ?>>Codensa</option>
							<option value="Emgesa" <?php if($this->empresa=="Emgesa"){ echo 'selected';} ?>>Emgesa</option>
							<option value="Enel Green Power" <?php if($this->empresa=="Enel Green Power"){ echo 'selected';} ?>>Enel Green Power</option>
							<option value="Colpensiones" <?php if($this->empresa=="Colpensiones"){ echo 'selected';} ?>>Técnologo</option>
							<option value="TGI" <?php if($this->empresa=="TGI"){ echo 'selected';} ?>>TGI</option>
							<option value="Otra" <?php if($this->empresa=="Otra"){ echo 'selected';} ?>>Otra</option>
						</select>
					</div>

					<div class="col-md-6 col-lg-6 d-none">
						<label>Otra</label>
						<input type="text" name="empresa_cual" value="<?php echo $this->empresa_cual; ?>" class="form-control" placeholder="¿Cuál?">
					</div>


					<div class="col-md-6 col-lg-4 d-none">
						<label>Valor cuota periódica</label>
						<input type="text" name="valor_cuota_periodica" value="<?php echo $this->valor_cuota_periodica; ?>" class="form-control" onkeyup="puntitos(this);">
					</div>
					<div class="col-md-6 col-lg-4 d-none">
						<label>Valor ahorro voluntario</label>
						<input type="text" name="valor_ahorro_voluntario" value="<?php echo $this->valor_ahorro_voluntario; ?>" class="form-control" onkeyup="puntitos(this);">
					</div>
					<div class="col-md-6 col-lg-4 d-none">
						<label>Valor ahorro incentivo</label>
						<input type="text" name="valor_ahorro_incentivo" value="<?php echo $this->valor_ahorro_incentivo; ?>" class="form-control" onkeyup="puntitos(this);">
					</div>


				</div>



				<div class="col-md-12 titulo-seccion no-padding d-none">III. Información Financiera</div>
				<div class="row form-group formulario caja-formulario d-none">
					<div class="col-md-6 col-lg-6">
						<label>¿Por su cargo o actividad, maneja recursos públicos?</label>
						<select name="recursos_publicos" id="recursos_publicos" class="form-control" >
							<option value="" <?php if($this->recursos_publicos==""){ echo 'selected';} ?>></option>
							<option value="S" <?php if($this->recursos_publicos=="S"){ echo 'selected';} ?>>SI</option>
							<option value="N" <?php if($this->recursos_publicos=="N"){ echo 'selected';} ?>>NO</option>
						</select>
					</div>
					<div class="col-md-6 col-lg-6">
						<label>¿Por su cargo o actividad, ejerce algún grado de poder público?</label>
						<select name="poder_publico" id="poder_publico" class="form-control" >
							<option value="" <?php if($this->poder_publico==""){ echo 'selected';} ?>></option>
							<option value="S" <?php if($this->poder_publico=="S"){ echo 'selected';} ?>>SI</option>
							<option value="N" <?php if($this->poder_publico=="N"){ echo 'selected';} ?>>NO</option>
						</select>
					</div>
					<div class="col-md-6 col-lg-6">
						<label>¿Por su actividad u oficio, goza usted de reconocimiento público general?</label>
						<select name="reconocimiento" id="reconocimiento" class="form-control" >
							<option value="" <?php if($this->reconocimiento==""){ echo 'selected';} ?>></option>
							<option value="S" <?php if($this->reconocimiento=="S"){ echo 'selected';} ?>>SI</option>
							<option value="N" <?php if($this->reconocimiento=="N"){ echo 'selected';} ?>>NO</option>
						</select>
					</div>
					<div class="col-md-6 col-lg-6">
						<label>¿Tiene Familiares hasta el segundo grado de consanguinidad y afinidad que encajen en los escenarios descritos previamente?</label>
						<select name="familiares" id="familiares" class="form-control" >
							<option value="" <?php if($this->familiares==""){ echo 'selected';} ?>></option>
							<option value="SI" <?php if($this->familiares=="S"){ echo 'selected';} ?>>SI</option>
							<option value="NO" <?php if($this->familiares=="N"){ echo 'selected';} ?>>NO</option>
						</select>
					</div>

					<div class="col-md-12 col-lg-12">
						<label>Si alguna de las preguntas anteriores es afirmativa por favor especifique</label>
						<input type="text" name="especifique" value="<?php echo $this->especifique; ?>" class="form-control">
					</div>

					<div class="col-md-6 col-lg-6">
						<label>Ingresos mensuales</label>
						<input type="text" name="ingresos_mensuales" value="<?php echo $this->ingresos_mensuales; ?>"  class="form-control" onkeyup="puntitos(this);">
					</div>
					<div class="col-md-6 col-lg-6">
						<label>Egreso mensual</label>
						<input type="text" name="egresos_mensuales" value="<?php echo $this->egresos_mensuales; ?>"  class="form-control" onkeyup="puntitos(this);">
					</div>
					<div class="col-md-6 col-lg-6">
						<label>Activos</label>
						<input type="text" name="activos" value="<?php echo $this->activos; ?>" class="form-control" onkeyup="puntitos(this);">
					</div>
					<div class="col-md-6 col-lg-6">
						<label>Pasivos</label>
						<input type="text" name="pasivos" value="<?php echo $this->pasivos; ?>" class="form-control" onkeyup="puntitos(this);">
					</div>
					<div class="col-md-6 col-lg-6">
						<label>Otros ingresos</label>
						<input type="text" name="otros_ingresos" value="<?php echo $this->otros_ingresos; ?>" class="form-control" onkeyup="puntitos(this);">
					</div>
					<div class="col-md-6 col-lg-6">
						<label>Concepto de otros ingresos</label>
						<input type="text" name="concepto_otros_ingresos" value="<?php echo $this->concepto_otros_ingresos; ?>" class="form-control">
					</div>

				</div>



				<div class="col-md-12 titulo-seccion no-padding d-none">IV. Actividad de Operaciones Internacionales</div>
				<div class="row form-group formulario caja-formulario d-none">


					<div class="col-md-12 col-lg-4">
						<label>¿Realiza transacciones en moneda extranjera?</label>
						<select name="familiares" id="familiares" class="form-control" >
							<option value="" <?php if($this->familiares==""){ echo 'selected';} ?>></option>
							<option value="SI" <?php if($this->familiares=="SI"){ echo 'selected';} ?>>SI</option>
							<option value="NO" <?php if($this->familiares=="NO"){ echo 'selected';} ?>>NO</option>
						</select>
					</div>


					<?php $operaciones = array("Importaciones","Exportaciones","Inversiones","Transferencias","Productos financieros en el exterior","Pago de servicios","Otro"); ?>
					<div class="col-md-12 col-lg-8">
						<input type="hidden" id="operaciones_internacionales" name="operaciones_internacionales" value="<?php echo $this->operaciones_internacionales; ?>">
						<?php foreach ($operaciones as $key => $value) { ?>
							<label onclick="llenar_operaciones();" class="espacio"><?php echo $value; ?> <input type="checkbox" id="operacion<?php echo $key; ?>" value="1" <?php if($this->operaciones_internacionales=="".$key or (strpos($this->operaciones_internacionales,"".$key)!==false) ){ echo 'checked'; } ?> >
							</label>
						<?php } ?>
						<input type="text" name="operaciones_cual" value="<?php echo $this->operaciones_cual; ?>" class="form-control" placeholder="Otro ¿Cuál?">

						<script type="text/javascript">
							function llenar_operaciones(){
								var res = "";
								var key = 0;
								<?php foreach ($operaciones as $key => $value) { ?>
									key = '<?php echo $key; ?>';
									if($("#operacion"+key).prop('checked')===true){
										res=res+key+",";
									}
								<?php } ?>
								res = res.substring(0, res.length - 1);
								$("#operaciones_internacionales").val(res);
							}
						</script>
					</div>



					<div class="col-md-6 col-lg-3">
						<label>Tipo de producto</label> <input type="text" name="producto_tipo" id="producto_tipo" value="<?php echo $this->producto_tipo; ?>" class="form-control"  />
					</div>
					<div class="col-md-6 col-lg-6">
						<label>Identificación o número del Producto</label> <input type="text" name="producto_numero" id="producto_numero" value="<?php echo $this->producto_numero; ?>" class="form-control"  />
					</div>
					<div class="col-md-6 col-lg-3">
						<label>Entidad</label> <input type="text" name="producto_entidad" id="producto_entidad" value="<?php echo $this->producto_entidad; ?>" class="form-control"  />
					</div>
					<div class="col-md-6 col-lg-3">
						<label>Monto</label> <input type="text" name="producto_monto" id="producto_monto" value="<?php echo $this->producto_monto; ?>" class="form-control" onkeyup="puntitos(this);"  />
					</div>
					<div class="col-md-6 col-lg-3">
						<label>Ciudad</label> <input type="text" name="producto_ciudad" id="producto_ciudad" value="<?php echo $this->producto_ciudad; ?>" class="form-control"  />
					</div>
					<div class="col-md-6 col-lg-3">
						<label>País</label> <input type="text" name="producto_pais" id="producto_pais" value="<?php echo $this->producto_pais; ?>" class="form-control"  />
					</div>
					<div class="col-md-6 col-lg-3">
						<label>Moneda</label> <input type="text" name="producto_moneda" id="producto_moneda" value="<?php echo $this->producto_moneda; ?>" class="form-control"  />
					</div>



				</div>


				<div class="col-md-12 titulo-seccion no-padding d-none">V. Información Familiar</div>
				<div class="row form-group formulario caja-formulario d-none">
					<div class="col-12"><label>Beneficiarios</label></div>
					<div class="col-12">
						<table width="100%" border="1" cellpadding="5" class="tabla2">
							<tr class="fondo-gris">
								<td>Nombres y Apellidos</td>
								<td>Identificación</td>
								<td colspan="3" class="text-center">Fecha de Nacimiento</td>
								<td>Parentesco</td>
								<td>% Autorizado</td>
							</tr>
							<tr class="fondo-gris">
								<td></td>
								<td></td>
								<td class="text-center">Día</td>
								<td class="text-center">Mes</td>
								<td class="text-center">Año</td>
								<td></td>
								<td></td>
							</tr>
							<?php for($i=1;$i<=5;$i++){ ?>
								<?php $beneficiario = $this->beneficiarios[$i-1];  ?>
								<tr>
									<td><input type="text" name="nombres_<?php echo $i; ?>" class="form-control" value="<?php echo $beneficiario->nombres; ?>"></td>
									<td><input type="number" name="documento_<?php echo $i; ?>" class="form-control" value="<?php echo $beneficiario->documento; ?>"></td>
									<td width="80"><input type="number" name="fecha_d_<?php echo $i; ?>" class="form-control" value="<?php echo $beneficiario->fecha_d; ?>" min="1" max="31"></td>
									<td width="80"><input type="number" name="fecha_m_<?php echo $i; ?>" class="form-control" value="<?php echo $beneficiario->fecha_m; ?>" min="1" max="12"></td>
									<td width="80"><input type="number" name="fecha_a_<?php echo $i; ?>" class="form-control" value="<?php echo $beneficiario->fecha_a; ?>" min="1900" max="<?php echo date("Y") ?>"></td>
									<td><input type="text" name="parentesco_<?php echo $i; ?>" class="form-control" value="<?php echo $beneficiario->parentesco; ?>"></td>
									<td><input type="text" name="porcentaje_<?php echo $i; ?>" id="porcentaje_<?php echo $i; ?>" class="form-control" value="<?php echo $beneficiario->porcentaje; ?>" onkeyup="validar_porcentaje();" onchange="validar_porcentaje();" min="1" max="100" step="0.01"></td>
								</tr>
							<?php } ?>
						</table>
						<div id="error_porcentaje" class="error text-right" style="display: none;">El porcentaje debe sumar 100%</div>
					</div>
					<div class="col-12"><label>Hijos</label></div>
					<div class="col-12">
						<table width="100%" border="1" cellpadding="5" class="tabla2">
							<tr class="fondo-gris">
								<td>Nombres y Apellidos</td>
								<td colspan="3" class="text-center">Fecha de Nacimiento</td>
								<td>Edad</td>
								<td>Nivel escolar</td>
							</tr>
							<tr class="fondo-gris">
								<td></td>
								<td class="text-center">Día</td>
								<td class="text-center">Mes</td>
								<td class="text-center">Año</td>
								<td></td>
								<td></td>
							</tr>
							<?php for($i=1;$i<=5;$i++){ ?>
								<?php $hijo = $this->hijos[$i-1]; ?>
								<tr>
									<td><input type="text" name="nombresB_<?php echo $i; ?>" class="form-control" value="<?php echo $hijo->nombres; ?>"></td>
									<td width="80"><input type="number" name="fecha_dB_<?php echo $i; ?>" id="fecha_dB_<?php echo $i; ?>" class="form-control" value="<?php echo $hijo->fecha_d; ?>" min="1" max="31" onkeyup="calcular_edad1('<?php echo $i; ?>')" onchange="calcular_edad1('<?php echo $i; ?>')"></td>
									<td width="80"><input type="number" name="fecha_mB_<?php echo $i; ?>" id="fecha_mB_<?php echo $i; ?>" class="form-control" value="<?php echo $hijo->fecha_m; ?>" min="1" max="12" onkeyup="calcular_edad1('<?php echo $i; ?>')" onchange="calcular_edad1('<?php echo $i; ?>')"></td>
									<td width="80"><input type="number" name="fecha_aB_<?php echo $i; ?>" id="fecha_aB_<?php echo $i; ?>" class="form-control" value="<?php echo $hijo->fecha_a; ?>" min="1900" max="<?php echo date("Y") ?>" onkeyup="calcular_edad1('<?php echo $i; ?>')" onchange="calcular_edad1('<?php echo $i; ?>')"></td>
									<td width="80"><input type="text" name="edadB_<?php echo $i; ?>" id="edadB_<?php echo $i; ?>" class="form-control" value="<?php echo $hijo->edad; ?>" readonly></td>
									<td>
										<select name="nivel_escolarB_<?php echo $i; ?>" id="nivel_escolarB_<?php echo $i; ?>" class="form-control">
											<option value="" <?php if($hijo->nivel_escolar==""){ echo 'selected';} ?>></option>
											<option value="Primaria" <?php if($hijo->nivel_escolar=="Primaria"){ echo 'selected';} ?>>Primaria</option>
											<option value="Bachiller" <?php if($hijo->nivel_escolar=="Bachiller"){ echo 'selected';} ?>>Bachiller</option>
											<option value="Tecnico" <?php if($hijo->nivel_escolar=="Tecnico"){ echo 'selected';} ?>>Técnico</option>
											<option value="Tecnologo" <?php if($hijo->nivel_escolar=="Tecnologo"){ echo 'selected';} ?>>Técnologo</option>
											<option value="Universitario" <?php if($hijo->nivel_escolar=="Universitario"){ echo 'selected';} ?>>Universitario</option>
										</select>
									</td>
								</tr>
								<script type="text/javascript"> calcular_edad1('<?php echo $i; ?>'); </script>
							<?php } ?>
						</table>
					</div>
				</div>

				<div class="col-12">
					En caso fortuito o fuerza mayor el Fondo de Empleados Grupo Endesa Colombia “FESDIS” – hará entrega a sus beneficiarios dentro de los términos establecidos en los estatutos y de acuerdo a la normatividad legal vigente (Articulo 15 parágrafo 1 Estatutos vigentes FENDIS) los saldos a favor en razón de su asociación.
					Es responsabilidad del asociado mantener actualizada la información de sus beneficiarios.
				</div>


				<div class="col-md-12 titulo-seccion no-padding">VI. Autorizaciones y Declaraciones</div>
				<div class="row form-group formulario caja-formulario">
					<div class="col-12 negro input-terminos"><br>
						Bajo la gravedad de juramento y actuando en nombre propio realizo la siguiente declaración de origen y destinación de recursos a Fondo de Empleados Grupo Endesa Colombia “FESDIS”, con el fin de cumplir con las disposiciones señaladas en su Sistema de Administración del Riesgo de Lavado de Activos y de la Financiación del Terrorismo:
						1. Declaro que los activos, ingresos, bienes y demás recursos provienen de actividades legales conforme a lo descrito en mi actividad y ocupación.
						2. No admitiré que terceros vinculen mi actividad con dineros, recursos o activos relacionadas con el delito de lavado de activos o destinados a la financiación del terrorismo.
						3. Eximo a Fondo de Empleados Grupo Endesa Colombia “FESDIS”, de toda responsabilidad que se derive del comportamiento o el que se ocasione por la información falsa ó errónea suministrada en la presente declaración y en los documentos que respaldan o soporten mis afirmaciones.
						4. Autorizo a Fondo de Empleados Grupo Endesa Colombia “FESDIS”, para que verifique y realice las consultas que estime necesarias con el propósito de confirmar la información registrada en este formulario.
						5. Los recursos que utilizo para realizar los pagos e inversiones en Fondo de Empleados Grupo Endesa Colombia “FESDIS” tienen procedencia lícita y están soportados con el desarrollo de actividades legítimas.
						6. No he sido, ni me encuentro incluido en investigaciones relacionadas con Lavado de Activos o Financiación del Terrorismo.
						7. Estoy informado de mi obligación de actualizar anualmente la información que solicite la entidad por cada producto o servicio que utilice, suministrando la información documental exigida por Fondo de Empleados Grupo Endesa Colombia “FESDIS” para dar cumplimiento a la normatividad vigente.<br><br>
						<strong>Autorizo:</strong> <input name="autorizo" id="continuar" type="checkbox" value="1" <?php if($_GET['mod']=="detalle_solicitud" or $this->existe->fecha!=""){ echo 'checked="checked" '; } ?> required />
					</div>
				</div>



			</div>


	</div>
</div>
<script type="text/javascript">
	//calcularEdad();
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



//Código para colocar
//los indicadores de miles mientras se escribe
//script por tunait!
function puntitos(donde){
	var caracter = donde.value.charAt(donde.value.length-1);
	var pat = /[\*,\+,\(,\),\?,\,$,\[,\],\^]/
	var valor = donde.value;
	var largo = valor.length;
	var crtr = true;

	if(isNaN(caracter) || pat.test(caracter) == true){
		if (pat.test(caracter)==true){
		//caracter = '\' + caracter;
		}
		carcter = new RegExp(caracter,"g")
		valor = valor.replace(carcter,"")
		donde.value = valor
		crtr = false
	}
	else{
		var nums = new Array()
		cont = 0
		for(m=0;m<largo;m++){
			if(valor.charAt(m) == "." || valor.charAt(m) == " ")
				{continue;}
			else{
				nums[cont] = valor.charAt(m)
				cont++
			}
		}
	}

	var cad1="",cad2="",tres=0
	if(largo > 3 && crtr == true){
		for (k=nums.length-1;k>=0;k--){
			cad1 = nums[k];
			cad2 = cad1 + cad2;
			tres++;
			if((tres%3) == 0){
				if(k!=0){
					cad2 = "." + cad2;
				}
			}
		}
		donde.value = cad2
	}
	if(donde.value==""){
		//donde.value=0;
	}
}
//puntitos
$("#tipo_vinculacion").change(function() {
    var id = $(this).children(":selected").attr("id");
    if (id == "otro") {
        $("#campo_otro").addClass("d-block");
        $("#campo_otro").removeClass("d-none");
        $("#campo_otro input").prop('required', true);
    } else {
        $("#campo_otro").addClass("d-none");
        $("#campo_otro").removeClass("d-block");
        $("#campo_otro input").prop('required', false);
    }
});
</script>


