<style type="text/css">
	.empleado1, .empleado2, .empleado3, .empleado4{
		display: none;
	}
</style>

<div class="container">
	<div class="row">

			<div class="col-12">
				<div class="row form-group">

					<div class="col-md-12 col-lg-12">


						<div class="row">
							<div class="col-12 titulo-seccion text-center">Referencias familiares</div>
							<div class="col-12 caja-formulario azul">
								<div class="row">
										<div class="col-md-3">
											<label>Nombres y apellidos</label>
											<input type="text" name="nombres1" id="nombres1" value="<?php echo $this->referencias['1']->nombres; ?>" required  class="form-control" onkeyup="validar_referencia();" onchange="validar_referencia();" />
										</div>
										<div class="col-md-3">
											<label>Parentesco</label>
											<select name="parentesco1" id="parentesco1" class="form-control" required="required">
												<option value=""></option>
												<?php foreach ($this->parentescos as $parentesco): ?>
													<option value="<?php echo $parentesco->nombre; ?>" <?php if($this->referencias['1']->parentesco==$parentesco->nombre){ echo 'selected'; } ?> ><?php echo ($parentesco->nombre); ?></option>
												<?php endforeach ?>
											</select>
										</div>

										<div class="col-md-6">
											<label>Dirección Residencia</label>
											<div class="row">
												<div class="col-6 d-none">
													<select name="nomenclatura1" id="nomenclatura1" class="form-control">
														<option value="">Nomenclatura</option>
														<?php foreach ($this->nomenclaturas as $key => $value): ?>
															<option value="<?php echo $value->codigo; ?>" <?php if($value->codigo==$this->referencias['1']->nomenclatura){ echo 'selected'; } ?> ><?php echo codificar($value->nombre); ?></option>
														<?php endforeach ?>
													</select>
												</div>
												<div class="col-12">
													<input type="text" name="direccion1" id="direccion1" value="<?php echo $this->referencias['1']->direccion; ?>" class="form-control" />
												</div>
											</div>
										</div>

										<div class="col-md-3">
											<label>Ciudad</label>
											<select name="ciudad1" id="ciudad1" class="form-control" required>
												<option value=""></option>
												<?php foreach ($this->ciudades as $ciudad): ?>
													<option value="<?php echo $ciudad->codigo; ?>" <?php if($this->referencias['1']->ciudad==$ciudad->codigo){ echo 'selected'; } ?> ><?php echo codificar($ciudad->nombre." (".$ciudad->departamento.")"); ?></option>
												<?php endforeach ?>
											</select>
										</div>

										<div class="col-md-3">
											<label>Teléfono fijo</label>
											<input type="text" name="telefono1" id="telefono1" value="<?php echo $this->referencias['1']->telefono; ?>" class="form-control" required />
										</div>

										<div class="col-md-3">
											<label>Celular</label>
											<input type="number" name="celular1" id="celular1" value="<?php echo $this->referencias['1']->celular; ?>" maxlength="10" minlenght="10" min="1000000000" max="9999999999" required="required"  class="form-control" />
										</div>

										<div class="col-md-3">
											<label>Correo</label>
											<input type="email" name="correo1" id="correo1" value="<?php echo $this->referencias['1']->correo; ?>" class="form-control" />
										</div>

										<div class="col-md-3">
											<label>Actividad</label>
											<select name="actividad1" id="actividad1" onchange="validar_actividad1('1')" required class="form-control">
									        <option value=""></option>
									        <option value="EMPLEADO" <?php if($this->referencias['1']->actividad=="EMPLEADO"){ echo 'selected="selected"';} ?>>EMPLEADO</option>
									        <option value="HOGAR" <?php if($this->referencias['1']->actividad=="HOGAR"){ echo 'selected="selected"';} ?>>HOGAR</option>
									        <option value="INDEPENDIENTE" <?php if($this->referencias['1']->actividad=="INDEPENDIENTE"){ echo 'selected="selected"';} ?>>INDEPENDIENTE</option>
									        <option value="PENSIONADO" <?php if($this->referencias['1']->actividad=="PENSIONADO"){ echo 'selected="selected"';} ?>>PENSIONADO</option>
									        <option value="OTRO" <?php if($this->referencias['1']->actividad=="OTRO"){ echo 'selected="selected"';} ?>>OTRO</option>
									      </select>
										</div>

										<div class="col-md-3 empleado1">
											<label>Nombre empresa</label>
											<input type="text" name="nombre_empresa1" id="nombre_empresa1" value="<?php echo $this->referencias['1']->empresa; ?>"  class="form-control" />
										</div>

										<div class="col-md-3 empleado1">
											<label>Cargo</label>
											<input type="text" name="cargo1" id="cargo1" value="<?php echo $this->referencias['1']->cargo; ?>" class="form-control" />
										</div>

										<div class="col-md-3 empleado1">
											<label>Teléfono empresa</label>
											<input type="text" name="telefono_empresa1" id="telefono_empresa1" value="<?php echo $this->referencias['1']->telefono_empresa; ?>" class="form-control" />
										</div>

									<div class="col-12"><br></div>



								</div>
							</div>
							<div class="col-12 titulo-seccion text-center">Referencias personales</div>
							<div class="col-12 caja-formulario azul">
								<div class="row">


									<div class="col-md-3">
										<label>Nombres y apellidos</label>
										<input type="text" name="nombres3" id="nombres3" value="<?php echo $this->referencias['3']->nombres; ?>" required  class="form-control" onkeyup="validar_referencia();" onchange="validar_referencia();" />
									</div>
									<div class="col-md-3">
										<label>Relación</label>
										<input type="text" name="parentesco3" id="parentesco3" value="<?php echo $this->referencias['3']->parentesco; ?>" required class="form-control" />
									</div>

									<div class="col-md-6">
										<label>Dirección Residencia</label>
										<div class="row">
											<div class="col-6 d-none">
												<select name="nomenclatura3" id="nomenclatura3" class="form-control" >
													<option value="">Nomenclatura</option>
													<?php foreach ($this->nomenclaturas as $key => $value): ?>
														<option value="<?php echo $value->codigo; ?>" <?php if($value->codigo==$this->referencias['3']->nomenclatura){ echo 'selected'; } ?> ><?php echo codificar($value->nombre); ?></option>
													<?php endforeach ?>
												</select>
											</div>
											<div class="col-12">
												<input type="text" name="direccion3" id="direccion3" value="<?php echo $this->referencias['3']->direccion; ?>"  class="form-control" />
											</div>
										</div>
									</div>

									<div class="col-md-3">
										<label>Ciudad</label>
										<select name="ciudad3" id="ciudad3" class="form-control" required >
											<option value=""></option>
											<?php foreach ($this->ciudades as $ciudad): ?>
												<option value="<?php echo $ciudad->codigo; ?>" <?php if($this->referencias['3']->ciudad==$ciudad->codigo){ echo 'selected'; } ?> ><?php echo codificar($ciudad->nombre." (".$ciudad->departamento.")"); ?></option>
											<?php endforeach ?>
										</select>
									</div>

									<div class="col-md-3">
										<label>Teléfono fijo</label>
										<input type="text" name="telefono3" id="telefono3" value="<?php echo $this->referencias['3']->telefono; ?>" class="form-control" required />
									</div>

									<div class="col-md-3">
										<label>Celular</label>
										<input type="number" name="celular3" id="celular3" value="<?php echo $this->referencias['3']->celular; ?>" maxlength="10" minlenght="10" min="1000000000" max="9999999999" required="required"  class="form-control" />
									</div>

									<div class="col-md-3">
										<label>Correo</label>
										<input type="email" name="correo3" id="correo3" value="<?php echo $this->referencias['3']->correo; ?>" class="form-control" />
									</div>

									<div class="col-md-3">
										<label>Actividad</label>
										<select name="actividad3" id="actividad3" onchange="validar_actividad1('3')" required class="form-control">
								        <option value=""></option>
								        <option value="EMPLEADO" <?php if($this->referencias['3']->actividad=="EMPLEADO"){ echo 'selected="selected"';} ?>>EMPLEADO</option>
								        <option value="HOGAR" <?php if($this->referencias['3']->actividad=="HOGAR"){ echo 'selected="selected"';} ?>>HOGAR</option>
								        <option value="INDEPENDIENTE" <?php if($this->referencias['3']->actividad=="INDEPENDIENTE"){ echo 'selected="selected"';} ?>>INDEPENDIENTE</option>
								        <option value="PENSIONADO" <?php if($this->referencias['3']->actividad=="PENSIONADO"){ echo 'selected="selected"';} ?>>PENSIONADO</option>
								        <option value="OTRO" <?php if($this->referencias['3']->actividad=="OTRO"){ echo 'selected="selected"';} ?>>OTRO</option>
								      </select>
									</div>

									<div class="col-md-3 empleado3">
										<label>Nombre empresa</label>
										<input type="text" name="nombre_empresa3" id="nombre_empresa3" value="<?php echo $this->referencias['3']->empresa; ?>"  class="form-control" />
									</div>

									<div class="col-md-3 empleado3">
										<label>Cargo</label>
										<input type="text" name="cargo3" id="cargo3" value="<?php echo $this->referencias['3']->cargo; ?>" class="form-control" />
									</div>

									<div class="col-md-3 empleado3">
										<label>Teléfono empresa</label>
										<input type="text" name="telefono_empresa3" id="telefono_empresa3" value="<?php echo $this->referencias['3']->telefono_empresa; ?>"  class="form-control" />
									</div>
									<div class="col-12"><br></div>

								</div>
							</div>
						</div>


					</div>

				</div>
			</div>

	</div>
</div>


<script type="text/javascript">

//validar_actividad('1');
//validar_actividad('2');
//req_referido('2');
//validar_actividad('3');
//validar_actividad('4');
//req_referido('4');

function validar_referencia(){
	var i = 0;
	var j = 0;
	for(i=1;i<=4;i++){
		for(j=1;j<=4;j++){
			if(i==1 || i==3){
				if(i!=j){
					if($("#nombres"+i).val() == $("#nombres"+j).val()){
						//$("#nombres"+j).val('');
						//alert('Las referencias no pueden estar repetidas');
					}
				}
			}
		}
	}
}

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