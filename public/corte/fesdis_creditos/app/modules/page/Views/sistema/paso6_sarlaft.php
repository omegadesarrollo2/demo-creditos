<?php //print_r($this->solicitud); ?>

<div class="container">
	<div class="row">

			<div class="col-12">
				<div class="row form-group">

					<div class="col-md-12 col-lg-12">

						<div class="row  text-center">
							<div class="col-12 titulo-seccion">Anexos documentales</div><br><br>

						<?php if($_GET['e']=="" and $_GET['n']==""){ ?>
							<div align="left" class="col-12 fondo-gris2 d-none"><strong>Asociado</strong></div>

							<div class="col-12 fondo-gris3">
								<div class="row">
								    <div align="left" class="col-lg-6">Fotocopia de la cédula ampliada al 150%</div>
								    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
								   		<input name="cedula" id="cedula" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" required >
									<?php } else {?>
								    	<a class="enlace1" href="/images/<?php echo $this->documentos->cedula; ?>" target="_blank"><?php echo $this->documentos->cedula; ?></a><br />
								    <?php }?>
								</div>


							</div>

							<div class="col-12 fondo-gris3">
								<div class="row">
								    <div align="left" class="col-lg-6">Último certificado de ingresos y retención<br><small>(En caso de no tenerlo adjuntar Última declaración de renta)</small></div>
								    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
								   		<input name="certificado_ingresos" id="certificado_ingresos" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" required onchange="validar_certificado();"  >
									<?php } else {?>
								    	<a class="enlace1" href="/images/<?php echo $this->documentos->certificado_ingresos; ?>" target="_blank"><?php echo $this->documentos->certificado_ingresos; ?></a><br />
								    <?php }?>
								</div>
							</div>

							<div class="col-12 fondo-gris3">
								<div class="row">
								    <div align="left" class="col-lg-6">Última declaración de renta</div>
								    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
								   		<input name="declaracion_renta" id="declaracion_renta" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" required onchange="validar_certificado();" >
									<?php } else {?>
								    	<a class="enlace1" href="/images/<?php echo $this->documentos->declaracion_renta; ?>" target="_blank"><?php echo $this->documentos->declaracion_renta; ?></a><br />
								    <?php }?>
								</div>
							</div>

							<div class="col-12 fondo-gris3">
								<div class="row">
								    <div align="left" class="col-lg-6">Último desprendible de nómina</div>
								    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
								   		<input name="desprendible" id="desprendible" type="file" class="col-lg-6 file-document1" required accept="image/*, application/pdf"  >
									<?php } else {?>
								    	<a class="enlace1" href="/images/<?php echo $this->documentos->desprendible; ?>" target="_blank"><?php echo $this->documentos->desprendible; ?></a><br />
								    <?php }?>
								</div>
							</div>

						<?php } ?>


					</div>

				</div>
			</div>


	</div>
</div>



</div>

<script type="text/javascript">

function validar_certificado(){
	if(document.getElementById("certificado_ingresos").files.length != 0){
		$("#declaracion_renta").prop("required",false);
	}
	if(document.getElementById("declaracion_renta").files.length != 0){
		$("#certificado_ingresos").prop("required",false);
	}
	if(document.getElementById("declaracion_renta").files.length == 0 && document.getElementById("certificado_ingresos").files.length == 0){
		$("#certificado_ingresos").prop("required",true);
		$("#declaracion_renta").prop("required",true);
	}
}

	$(".file-document1").removeClass("file-document");
	$(".file-document1").addClass("file-document");

	$("#desprendible_pago").change(function(){
		$("#div_desprendible_pago2").show();
	});
	$("#desprendible_pago2").change(function(){
		$("#div_desprendible_pago3").show();
	});
	$("#desprendible_pago3").change(function(){
		$("#div_desprendible_pago4").show();
	});
	$("#desprendible_pago4").change(function(){
		$("#div_desprendible_pago5").show();
	});


	$("#desprendible_pagoB").change(function(){
		$("#div_desprendible_pagoB2").show();
	});
	$("#desprendible_pagoB2").change(function(){
		$("#div_desprendible_pagoB3").show();
	});
	$("#desprendible_pagoB3").change(function(){
		$("#div_desprendible_pagoB4").show();
	});
	$("#desprendible_pagoB4").change(function(){
		$("#div_desprendible_pagoB5").show();
	});
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