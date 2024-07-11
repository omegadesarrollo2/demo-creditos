
<div class="container">
	<div class="row">

			<div class="col-12">
				<div class="row form-group formulario">
					<div class="col-lg-12"><b>Información del codeudor</b></div>
					<div class="col-md-6 col-lg-3"><label>Documento</label> <input type="text" name="documento_codeudor" id="documento_codeudor" value="<?php echo $this->documento; ?>" required class="form-control" onkeyup="consultar_codeudor();" onchange="consultar_codeudor();" /></div>
					<div class="col-md-6 col-lg-3"><label>Primer nombre</label> <input type="text" name="nombres_codeudor" id="nombres_codeudor" value="<?php echo $this->nombres; ?>" required  class="form-control" /></div>
					<div class="col-md-6 col-lg-3"><label>Segundo nombre</label> <input type="text" name="nombres2_codeudor" id="nombres2_codeudor" value="<?php echo $this->nombres2; ?>"  class="form-control" /></div>
					<div class="col-md-6 col-lg-3"><label>Primer apellido</label> <input type="text" name="apellido1_codeudor" id="apellido1_codeudor" value="<?php echo $this->apellido1; ?>"  class="form-control" /></div>
					<div class="col-md-6 col-lg-3"><label>Segundo apellido</label> <input type="text" name="apellido2_codeudor" id="apellido2_codeudor" value="<?php echo $this->apellido2; ?>" class="form-control" /></div>

					<div class="col-md-6 col-lg-3"><label>Correo electrónico personal</label> <input type="email" name="correo_personal_codeudor" id="correo_personal_codeudor" value="<?php echo $this->correo_personal; ?>" required class="form-control"  /></div>


					<div class="col-12 error" style="display: none;" id="error_codeudor">
						<br>El codeudor no es asociado<br>
					</div>
				</div>
			</div>



	</div>
</div>


<script type="text/javascript">

function consultar_codeudor(){
	var cedula = $("#documento_codeudor").val();
	$.post("/page/sistema/consultarcodeudor/",{"cedula":cedula },function(res){
		$("#nombres_codeudor").val(res.nombre1);
		$("#nombres2_codeudor").val(res.nombre2);
		$("#apellido1_codeudor").val(res.apellido1);
		$("#apellido2_codeudor").val(res.apellido2);
		$("#correo_personal_codeudor").val(res.email);
		if(res.existe=="1"){
			$("#error_codeudor").hide();
		}else{
			$("#error_codeudor").show();
		}
	});
}

</script>

<?php
function formato_pesos($x){
	$res = number_format($x,0,',','.');
	return $res;
}
?>