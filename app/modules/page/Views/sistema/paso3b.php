<style type="text/css">
	.empleado1, .empleado2, .empleado3, .empleado4{
		display: none;
	}
</style>

<div class="container-fluid">
	<div class="row">
	    <form id="form1" name="form1" method="post" action="/page/sistema/guardarpaso/" class="col-12">
			<div class="col-12">
				<div class="row">
					<div class="col-6 text-left"><h3 class="titulo">Solicitud WEB<?php echo $this->numero; ?></h3></div>
					<div align="left" class="col-12">
						<div class="separador_login2"></div>
					</div>
					<div class="col-6 text-left"><h3 class="paso">Paso 3/6</h3></div>
				</div>
			</div>
			<div class="col-12">
				<div class="row form-group">

					<div class="col-md-12 col-lg-12">
						<br><br>

						<div class="row formulario">
							<h4 class="col-12 datosResaltados text-center"><b>Referencias familiares</b></h4>
							<div class="col-12" align="center">
								<div class="separador_login5"></div>
							</div>
							<h5 class="col-12"><b><br>Familiar1</b></h5>
							<div class="col-md-3">
								<label>Nombres y apellidos</label>
								<input type="text" name="nombres1" id="nombres1" value="<?php echo $this->referencias['1']->nombres; ?>" required  class="form-control" />
							</div>
							<div class="col-md-3">
								<label>Parentesco</label>
								<input type="text" name="parentesco1" id="parentesco1" value="<?php echo $this->referencias['1']->parentesco; ?>" required class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Dirección Residencia</label>
								<input type="text" name="direccion1" id="direccion1" value="<?php echo $this->referencias['1']->direccion; ?>" required="required" class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Departamento</label>
								<input type="text" name="departamento1" id="departamento1" value="<?php echo $this->referencias['1']->departamento; ?>" required="required" class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Ciudad</label>
								<input type="text" name="ciudad1" id="ciudad1" value="<?php echo $this->referencias['1']->ciudad; ?>" required="required" class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Teléfono fijo</label>
								<input type="number" name="telefono1" id="telefono1" value="<?php echo $this->referencias['1']->telefono; ?>" maxlength="7" minlenght="7" min="1000000" max="9999999" class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Celular</label>
								<input type="number" name="celular1" id="celular1" value="<?php echo $this->referencias['1']->celular; ?>" maxlength="10" minlenght="10" min="1000000000" max="9999999999" required="required"  class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Actividad</label>
								<select name="actividad1" id="actividad1" onchange="validar_actividad('1')" required class="form-control">
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
								<input type="number" name="telefono_empresa1" id="telefono_empresa1" value="<?php echo $this->referencias['1']->telefono_empresa; ?>" maxlength="7" minlenght="7" min="1000000" max="9999999" class="form-control" />
							</div>


							<h5 class="col-12"><b><br>Familiar2</b></h5>
							<div class="col-md-3">
								<label>Nombres y apellidos</label>
								<input type="text" name="nombres2" id="nombres2" value="<?php echo $this->referencias['2']->nombres; ?>" required  class="form-control" />
							</div>
							<div class="col-md-3">
								<label>Parentesco</label>
								<input type="text" name="parentesco2" id="parentesco2" value="<?php echo $this->referencias['2']->parentesco; ?>" required class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Dirección Residencia</label>
								<input type="text" name="direccion2" id="direccion2" value="<?php echo $this->referencias['2']->direccion; ?>" required="required" class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Departamento</label>
								<input type="text" name="departamento2" id="departamento2" value="<?php echo $this->referencias['2']->departamento; ?>" required="required" class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Ciudad</label>
								<input type="text" name="ciudad2" id="ciudad2" value="<?php echo $this->referencias['2']->ciudad; ?>" required="required" class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Teléfono fijo</label>
								<input type="number" name="telefono2" id="telefono2" value="<?php echo $this->referencias['2']->telefono; ?>" maxlength="7" minlenght="7" min="1000000" max="9999999" class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Celular</label>
								<input type="number" name="celular2" id="celular2" value="<?php echo $this->referencias['2']->celular; ?>" maxlength="10" minlenght="10" min="1000000000" max="9999999999" required="required"  class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Actividad</label>
								<select name="actividad2" id="actividad2" onchange="validar_actividad('2')" required class="form-control">
						        <option value=""></option>
						        <option value="EMPLEADO" <?php if($this->referencias['2']->actividad=="EMPLEADO"){ echo 'selected="selected"';} ?>>EMPLEADO</option>
						        <option value="HOGAR" <?php if($this->referencias['2']->actividad=="HOGAR"){ echo 'selected="selected"';} ?>>HOGAR</option>
						        <option value="INDEPENDIENTE" <?php if($this->referencias['2']->actividad=="INDEPENDIENTE"){ echo 'selected="selected"';} ?>>INDEPENDIENTE</option>
						        <option value="PENSIONADO" <?php if($this->referencias['2']->actividad=="PENSIONADO"){ echo 'selected="selected"';} ?>>PENSIONADO</option>
						        <option value="OTRO" <?php if($this->referencias['2']->actividad=="OTRO"){ echo 'selected="selected"';} ?>>OTRO</option>
						      </select>
							</div>

							<div class="col-md-3 empleado2">
								<label>Nombre empresa</label>
								<input type="text" name="nombre_empresa2" id="nombre_empresa2" value="<?php echo $this->referencias['2']->empresa; ?>"  class="form-control" />
							</div>

							<div class="col-md-3 empleado2">
								<label>Cargo</label>
								<input type="text" name="cargo2" id="cargo2" value="<?php echo $this->referencias['2']->cargo; ?>" class="form-control" />
							</div>

							<div class="col-md-3 empleado2">
								<label>Teléfono empresa</label>
								<input type="number" name="telefono_empresa2" id="telefono_empresa2" value="<?php echo $this->referencias['2']->telefono_empresa; ?>" maxlength="7" minlenght="7" min="1000000" max="9999999" class="form-control" />
							</div>

							<div class="col-12"><br></div>
							<div class="col-12 text-center"><h4 class="col-12 datosResaltados"><b>Referencias personales</b></h4></div>
							<div class="col-12" align="center">
								<div class="separador_login5"></div>
							</div>
							<h5 class="col-12"><b><br>Referencia1</b></h5>

							<div class="col-md-3">
								<label>Nombres y apellidos</label>
								<input type="text" name="nombres3" id="nombres3" value="<?php echo $this->referencias['3']->nombres; ?>" required  class="form-control" />
							</div>
							<div class="col-md-3">
								<label>Parentesco</label>
								<input type="text" name="parentesco3" id="parentesco3" value="<?php echo $this->referencias['3']->parentesco; ?>" required class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Dirección Residencia</label>
								<input type="text" name="direccion3" id="direccion3" value="<?php echo $this->referencias['3']->direccion; ?>" required="required" class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Departamento</label>
								<input type="text" name="departamento3" id="departamento3" value="<?php echo $this->referencias['3']->departamento; ?>" required="required" class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Ciudad</label>
								<input type="text" name="ciudad3" id="ciudad3" value="<?php echo $this->referencias['3']->ciudad; ?>" required="required" class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Teléfono fijo</label>
								<input type="number" name="telefono3" id="telefono3" value="<?php echo $this->referencias['3']->telefono; ?>" maxlength="7" minlenght="7" min="1000000" max="9999999" class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Celular</label>
								<input type="number" name="celular3" id="celular3" value="<?php echo $this->referencias['3']->celular; ?>" maxlength="10" minlenght="10" min="1000000000" max="9999999999" required="required"  class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Actividad</label>
								<select name="actividad3" id="actividad3" onchange="validar_actividad('3')" required class="form-control">
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
								<input type="number" name="telefono_empresa3" id="telefono_empresa3" value="<?php echo $this->referencias['3']->telefono_empresa; ?>" maxlength="7" minlenght="7" min="1000000" max="9999999" class="form-control" />
							</div>

							<h5 class="col-12"><b><br>Referencia2</b></h5>

							<div class="col-md-3">
								<label>Nombres y apellidos</label>
								<input type="text" name="nombres4" id="nombres4" value="<?php echo $this->referencias['4']->nombres; ?>" required  class="form-control" />
							</div>
							<div class="col-md-3">
								<label>Parentesco</label>
								<input type="text" name="parentesco4" id="parentesco4" value="<?php echo $this->referencias['4']->parentesco; ?>" required class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Dirección Residencia</label>
								<input type="text" name="direccion4" id="direccion4" value="<?php echo $this->referencias['4']->direccion; ?>" required="required" class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Departamento</label>
								<input type="text" name="departamento4" id="departamento4" value="<?php echo $this->referencias['4']->departamento; ?>" required="required" class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Ciudad</label>
								<input type="text" name="ciudad4" id="ciudad4" value="<?php echo $this->referencias['4']->ciudad; ?>" required="required" class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Teléfono fijo</label>
								<input type="number" name="telefono4" id="telefono4" value="<?php echo $this->referencias['4']->telefono; ?>" maxlength="7" minlenght="7" min="1000000" max="9999999" class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Celular</label>
								<input type="number" name="celular4" id="celular4" value="<?php echo $this->referencias['4']->celular; ?>" maxlength="10" minlenght="10" min="1000000000" max="9999999999" required="required"  class="form-control" />
							</div>

							<div class="col-md-3">
								<label>Actividad</label>
								<select name="actividad4" id="actividad4" onchange="validar_actividad('4')" required class="form-control">
						        <option value=""></option>
						        <option value="EMPLEADO" <?php if($this->referencias['4']->actividad=="EMPLEADO"){ echo 'selected="selected"';} ?>>EMPLEADO</option>
						        <option value="HOGAR" <?php if($this->referencias['4']->actividad=="HOGAR"){ echo 'selected="selected"';} ?>>HOGAR</option>
						        <option value="INDEPENDIENTE" <?php if($this->referencias['4']->actividad=="INDEPENDIENTE"){ echo 'selected="selected"';} ?>>INDEPENDIENTE</option>
						        <option value="PENSIONADO" <?php if($this->referencias['4']->actividad=="PENSIONADO"){ echo 'selected="selected"';} ?>>PENSIONADO</option>
						        <option value="OTRO" <?php if($this->referencias['4']->actividad=="OTRO"){ echo 'selected="selected"';} ?>>OTRO</option>
						      </select>
							</div>

							<div class="col-md-3 empleado4">
								<label>Nombre empresa</label>
								<input type="text" name="nombre_empresa3" id="nombre_empresa3" value="<?php echo $this->referencias['4']->empresa; ?>"  class="form-control" />
							</div>

							<div class="col-md-3 empleado4">
								<label>Cargo</label>
								<input type="text" name="cargo4" id="cargo4" value="<?php echo $this->referencias['4']->cargo; ?>" class="form-control" />
							</div>

							<div class="col-md-3 empleado4">
								<label>Teléfono empresa</label>
								<input type="number" name="telefono_empresa4" id="telefono_empresa4" value="<?php echo $this->referencias['4']->telefono_empresa; ?>" maxlength="7" minlenght="7" min="1000000" max="9999999" class="form-control" />
							</div>

						</div>


					</div>

				</div>
			</div>




		    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
		    	<div align="center"><input name="Anterior" type="button" value="Anterior" class="btn btn-azul" onclick="window.location='/page/sistema/paso2/?id=<?php echo $this->id; ?>';" /> <input name="Enviar" type="submit" value="Siguiente" class="btn btn-azul" /></div><br>
		    <?php }?>

		    <input name="paso" type="hidden" value="3" />
		    <input name="id" type="hidden" value="<?php echo $this->id; ?>" />
	    </form>
	</div>
</div>


<script type="text/javascript">

validar_actividad('1');
validar_actividad('2');
req_referido('2');
validar_actividad('3');
validar_actividad('4');
req_referido('4');

</script>