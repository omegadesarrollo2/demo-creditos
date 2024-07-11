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
							    <?php if($this->solicitud->linea!=12 and $this->solicitud->linea!=21 and $this->solicitud->linea!=27 and $this->solicitud->linea!=22 and $this->solicitud->linea!=28 and $this->solicitud->linea!=29 and $this->solicitud->linea!=35 and $this->solicitud->linea!=38 and $this->solicitud->linea!=39 and $this->solicitud->linea!=37 and $this->solicitud->linea!=44 and $this->solicitud->linea!=49){ ?>
							        <option value="DEUDOR SOLIDARIO" <?php if($this->solicitud->tipo_garantia=="DEUDOR SOLIDARIO"){ echo 'selected="selected"'; }  ?>>DEUDOR SOLIDARIO</option>
							        <?php if($this->solicitud->monto_solicitado<=12000000){ ?>
							        	<option value="FONDO MUTUAL" <?php if($this->solicitud->tipo_garantia=="FONDO MUTUAL"){ echo 'selected="selected"'; }  ?>>FONDO MUTUAL</option>
							        <?php }?>
							    <?php }?>

							    <?php if($this->solicitud->linea==12 or $this->solicitud->linea==35){ //ordinario?>
							        <option value="APORTES Y AHORROS" <?php if($this->solicitud->tipo_garantia=="APORTES Y AHORROS"){ echo 'selected="selected"'; }  ?>>APORTES Y AHORROS</option>
							    <?php }?>
							    <?php if($this->solicitud->linea==21 or $this->solicitud->linea==27 or $this->solicitud->linea==38 or $this->solicitud->linea==39){ ?>
							        <option value="PRENDA" <?php if($this->solicitud->tipo_garantia=="PRENDA"){ echo 'selected="selected"'; }  ?>>PRENDA</option>							    <?php }?>

							    <?php if($this->solicitud->linea==22 or $this->solicitud->linea==37){ //foe apoyo vivienda ?>
							        <option value="DEUDOR SOLIDARIO" <?php if($this->solicitud->tipo_garantia=="DEUDOR SOLIDARIO"){ echo 'selected="selected"'; }  ?>>DEUDOR SOLIDARIO</option>
							        <?php if($this->solicitud->monto_solicitado<=12000000){ ?>
							        	<option value="FONDO MUTUAL FOE" <?php if($this->solicitud->tipo_garantia=="FONDO MUTUAL FOE"){ echo 'selected="selected"'; }  ?>>FONDO MUTUAL FOE</option>
							        <?php }?>
							    <?php }?>

								<?php if($this->solicitud->linea==28 or $this->solicitud->linea==44){ ?>
							        <option value="PRIMA" <?php if($this->solicitud->tipo_garantia=="PRIMA"){ echo 'selected="selected"'; }  ?>>PRIMA</option>
							    <?php }?>

								<?php if($this->solicitud->linea==29 or $this->solicitud->linea==49){ ?>
							        <option value="AUTORIZACION BBVA" <?php if($this->solicitud->tipo_garantia=="AUTORIZACION BBVA"){ echo 'selected="selected"'; }  ?>>AUTORIZACION BBVA</option>
							    <?php }?>

								<?php if($this->solicitud->linea!=12 and $this->solicitud->linea!=28 and $this->solicitud->linea!=35 and $this->solicitud->linea!=44 and $this->solicitud->declara_renta=="Si" and $this->solicitud->monto_solicitado<=30000000){ //151 credito ordinario y 447 paga prima ?>
							        <option value="GARANTIA PERSONAL" <?php if($this->solicitud->tipo_garantia=="GARANTIA PERSONAL"){ echo 'selected="selected"'; }  ?>>GARANTIA PERSONAL</option>
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