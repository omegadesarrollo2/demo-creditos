

<div class="container">
	<div class="row">
	    <form id="form1" name="form1" method="post" action="/page/sistema/guardarpaso/" class="col-12">
			<div class="col-12">
				<?php if ($_GET['consulta']==""): ?>
					<div class="row">
						<div class="col-6 text-left"><h3 class="titulo">Solicitud WEB<?php echo $this->numero; ?></h3></div>
						<div class="col-6 text-right"><h3 class="paso">Paso 7/7</h3></div>
						<div align="left" class="col-12">
							<div class="separador_login2"></div>
						</div>
					</div>
				<?php endif ?>
			</div>
			<div class="col-12">
				<div class="row form-group">

					<div class="col-md-12 col-lg-12">

						<div class="row">
							<div class="col-12 text-center"><span class="titulo-seccion text-center"><b>Datos del seguro</b></span><br><br></div>



							<div class="col-12 caja-formulario">
								<br>
								<p class="azul">1. No conozco o no me han diagnosticado ningún tipo de enfermedad, por lo tanto me encuentro en buen estado de salud. </p>
								<div class="col-12"><input type="checkbox" <?php if($this->asegurabilidad[0]->no_conozco==1){ echo 'checked'; } ?> name="no_conozco" id="no_conozco" value="1"><br><br></div>
								<p class="azul">2. Padezco o he padecido las enfermedades que a continuación marco:</p>

								<?php foreach ($this->enfermedades as $key => $value): ?>
							    	<div class="col-12">
							    		<label class="margen_enfermedad" onclick="validar_tiene();"><input name="c<?php echo $value->id; ?>" id="c<?php echo $value->id; ?>" type="checkbox" value="1" <?php if($this->enfermedades_array[$value->id]==1){ echo 'checked'; } ?> onchange="validar_tiene();" /> <?php echo utf8_encode($value->nombre); ?></label>
							    	</div>
							    <?php endforeach ?>
							    <br>
							    <span class="margen_enfermedad azul">Otra enfermedad no mencionada anteriormente (especifique): <input name="otra_cual"  id="otra_cual" value="<?php echo $this->asegurabilidad[0]->otra_cual; ?>" type="text" onchange="validar_tiene();" onkeyup="validar_tiene();"/></span>
							    <br><br>
							    <span class="margen_enfermedad azul">En caso de haber padecido alguna de las enfermedades anteriormente mencionadas, explique: <input name="otra_cual2"  id="otra_cual2" value="<?php echo $this->asegurabilidad[0]->otra_cual2; ?>" type="text" onchange="validar_tiene();" onkeyup="validar_tiene();"/></span>
								<br><br>
								<div class="col-12">
									<div class="row">
									    <div class="margen_enfermedad col-lg-3 azul">Enfermedad: <input name="enfermedad"  id="enfermedad" value="<?php echo $this->asegurabilidad[0]->enfermedad; ?>" type="text" onchange="validar_tiene();" onkeyup="validar_tiene();"/></div>
										<br>
									    <div class="margen_enfermedad col-lg-3 azul">Año en que fue diagnosticada: <input name="anio"  id="anio" value="<?php echo $this->asegurabilidad[0]->anio; ?>" type="number" onchange="validar_tiene();" onkeyup="validar_tiene();"/></div>
										<br>
									    <div class="margen_enfermedad col-lg-3 azul">Tratamiento: <input name="tratamiento"  id="tratamiento" value="<?php echo $this->asegurabilidad[0]->tratamiento; ?>" type="text" onchange="validar_tiene();" onkeyup="validar_tiene();"/></div>
								    </div>
							    </div>

							</div>



						</div>

					</div>

				</div>
			</div>




		    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
		    	<div align="center"><br><input name="Anterior" type="button" value="Anterior" class="btn btn-azul" onclick="window.location='/page/sistema/paso6/?id=<?php echo $this->id; ?>';" /> <input name="Enviar" type="submit" value="Siguiente" class="btn btn-azul" /></div><br>
		    <?php }?>

		    <input name="paso" type="hidden" value="7" />
		    <input name="id" type="hidden" value="<?php echo $this->id; ?>" />
	    </form>
	</div>
</div>


<script type="text/javascript">
</script>