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

						<div class="row  text-center">
							<div class="col-12 titulo-seccion">Tipo de garantía</div><br><br>


							  <select name="tipo_garantia" id="tipo_garantia" onchange="seleccion_tipo_garantia();" class="form-control col-lg-4 offset-lg-4" required >
							  		<option value="">Seleccione</option>
							  		<?php foreach ($this->garantias as $key => $garantia): ?>
							  			<option value="<?php echo $garantia->garantia_id; ?>" <?php if($this->solicitud->tipo_garantia==$garantia->garantia_id){ echo 'selected="selected"'; }  ?>><?php echo utf8_encode($garantia->garantia_nombre); ?></option>
							  		<?php endforeach ?>
							  </select>


						</div>

						<br>
						<div id="div_paso4"></div>
						<div id="div_paso4B"></div>


					</div>

				</div>
			</div>




	</div>
	




	</div>
</div>


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