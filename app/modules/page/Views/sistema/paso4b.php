<style type="text/css">
	.empleado1, .empleado2, .empleado3, .empleado4{
		display: none;
	}
</style>

<div class="container">
	<div class="row">
	    <form id="form1" name="form1" method="post" action="/page/sistema/guardarpaso/" class="col-12">
			<div class="col-12">
				<div class="row">
					<div class="col-6 text-left"><h3 class="titulo">Solicitud WEB<?php echo $this->numero; ?></h3></div>
					<div align="left" class="col-12">
						<div class="separador_login2"></div>
					</div>
					<div class="col-6 text-left"><h3 class="paso">Paso 4/6</h3></div>
				</div>
			</div>
			<div class="col-12">
				<div class="row form-group">

					<div class="col-md-12 col-lg-12">
						<br><br>

						<div class="row formulario">
							<div class="col-12"><h4 class="datosResaltados text-center"><b>Tipo de garantía</b></h4></div>
							<div align="center" class="col-12">
								<div class="separador_login5"></div><br>
							</div>


							  <select name="tipo_garantia" id="tipo_garantia" onchange="seleccion_tipo_garantia();" class="form-control col-lg-4 offset-lg-4" required >
							  		<option value=""></option>

							    <?php if($this->solicitud->linea==6 or $this->solicitud->linea==7 or $this->solicitud->linea==4 or $this->solicitud->linea==5 or $this->solicitud->linea==46){ ?>
							        <option value="CODEUDOR" <?php if($this->solicitud->tipo_garantia=="CODEUDOR"){ echo 'selected="selected"'; }  ?>>CODEUDOR</option>
							    <?php }?>

							    <?php if($this->solicitud->linea==18 or $this->solicitud->linea==6 or $this->solicitud->linea==7 or $this->solicitud->linea==22){ ?>
							        <option value="APORTES SOCIALES INDIVIDUALES" <?php if($this->solicitud->tipo_garantia=="APORTES SOCIALES INDIVIDUALES"){ echo 'selected="selected"'; }  ?>>APORTES SOCIALES INDIVIDUALES</option>
							    <?php }?>

							    <?php if($this->solicitud->linea==18 or $this->solicitud->linea==6 or $this->solicitud->linea==7 or $this->solicitud->linea==22){ ?>
							        <option value="AHORROS PERMANENTES" <?php if($this->solicitud->tipo_garantia=="AHORROS PERMANENTES"){ echo 'selected="selected"'; }  ?>>AHORROS PERMANENTES</option>
							    <?php }?>

							    <?php if($this->solicitud->linea==18){ ?>
							        <option value="SALARIO" <?php if($this->solicitud->tipo_garantia=="SALARIO"){ echo 'selected="selected"'; }  ?>>SALARIO</option>
							    <?php }?>

							    <?php if($this->solicitud->linea==4 or $this->solicitud->linea==5){ ?>
							        <option value="PRENDA" <?php if($this->solicitud->tipo_garantia=="PRENDA"){ echo 'selected="selected"'; }  ?>>PRENDA</option>
							    <?php }?>

								<?php if($this->solicitud->linea==0){ ?>
							        <option value="PRIMA" <?php if($this->solicitud->tipo_garantia=="PRIMA"){ echo 'selected="selected"'; }  ?>>PRIMA</option>
							    <?php }?>


								<?php if($this->solicitud->linea==0){ ?>
							        <option value="GARANTIA PERSONAL" <?php if($this->solicitud->tipo_garantia=="GARANTIA PERSONAL"){ echo 'selected="selected"'; }  ?>>GARANTIA PERSONAL</option>
							    <?php }?>

								<?php if($this->solicitud->linea==1 or $this->solicitud->linea==2 or $this->solicitud->linea==48 or $this->solicitud->linea==3){ ?>
							        <option value="HIPOTECA" <?php if($this->solicitud->tipo_garantia=="HIPOTECA"){ echo 'selected="selected"'; }  ?>>HIPOTECA</option>
							    <?php }?>

							  </select>


						</div>

						<br><br>
						<div id="div_paso4">

						</div>


					</div>

				</div>
			</div>


			<div class="col-12"><input type="checkbox" required name="terminos"> Acepto términos y condiciones</div>
			<div class="col-12"><input type="checkbox" required name="terminos"> Certifico bajo la gravedad de juramento que la información ingresada corresponde a la realidad y se ajusta a la ley 1581 de 2012</div>
			<div class="col-12"><br></div>

		    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
		    	<div align="center"><input name="Anterior" type="button" value="Anterior" class="btn btn-azul" onclick="window.location='/page/sistema/paso3/?id=<?php echo $this->id; ?>';" /> <input name="Enviar" type="submit" value="Siguiente" class="btn btn-azul" /></div><br>
		    <?php }?>

		    <input name="paso" type="hidden" value="4" />
		    <input name="id" type="hidden" value="<?php echo $this->id; ?>" />
	    </form>
	</div>
</div>


<script type="text/javascript">
</script>