
<div class="container">
	<div class="row">

			<div class="col-12">
				<div class="row form-group formulario">
					<div class="col-lg-12"><b></b></div>
					<div class="col-lg-12">

					  <p><strong>REQUISITOS:</strong><br />
					    </p>
					  <p>1.       CAPACIDAD DE ENDEUDAMIENTO NO SUPERIOR AL 50% <br />
					    2.       SOLO CUBRE HASTA 50 SMLV
					      <br />
					      3.       VALIDACION DE LAS CENTRALES DE RIESGO <br />
					      <br />
					      4.       DEBE ADJUNTAR ADICIONAL LA ULTIMA DECLARACION DE RENTA. </p>

					</div>



				</div>
			</div>



	</div>
</div>



<?php
function formato_pesos($x){
	$res = number_format($x,0,',','.');
	return $res;
}
?>

<?php if($_GET['mod']=="detalle_solicitud"){ ?>
	<script type="text/javascript">
		$("input").prop("disabled", true);
		$("select").prop("disabled", true);
	</script>
<?php }?>

<script type="text/javascript">
	document.getElementById('Enviar').style.display='';
</script>