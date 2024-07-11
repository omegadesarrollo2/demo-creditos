
<div class="container">
	<div class="row">

			<div class="col-12">
				<div class="row form-group formulario">
					<div class="col-lg-12"><b>Información del codeudor2</b></div>
					<div class="col-md-6 col-lg-3"><label>Documento</label> <input type="text" name="documento_codeudor2" id="documento_codeudor2" value="<?php echo $this->documento; ?>" required class="form-control" onkeyup="consultar_codeudor2();" onchange="consultar_codeudor2();" /></div>
					<div class="col-md-6 col-lg-3"><label>Primer nombre</label> <input type="text" name="nombres_codeudor2" id="nombres_codeudor2" value="<?php echo $this->nombres; ?>" required  class="form-control" /></div>
					<div class="col-md-6 col-lg-3"><label>Segundo nombre</label> <input type="text" name="nombres2_codeudor2" id="nombres2_codeudor2" value="<?php echo $this->nombres2; ?>"  class="form-control" /></div>
					<div class="col-md-6 col-lg-3"><label>Primer apellido</label> <input type="text" name="apellido1_codeudor2" id="apellido1_codeudor2" value="<?php echo $this->apellido1; ?>"  class="form-control" /></div>
					<div class="col-md-6 col-lg-3"><label>Segundo apellido</label> <input type="text" name="apellido2_codeudor2" id="apellido2_codeudor2" value="<?php echo $this->apellido2; ?>" class="form-control" /></div>

					<div class="col-md-6 col-lg-3"><label>Correo electrónico personal</label> <input type="email" name="correo_personal_codeudor2" id="correo_personal_codeudor2" value="<?php echo $this->correo_personal; ?>" required class="form-control"  /></div>


					<div class="col-12 error" style="display: none;" id="error_codeudor2">
						<br>El codeudor no es asociado<br>
					</div>
				</div>
			</div>



	</div>
</div>


<script type="text/javascript">

function consultar_codeudor2(){
	var cedula = $("#documento_codeudor2").val();
	$.post("/page/sistema/consultarcodeudor/",{"cedula":cedula },function(res){
		$("#nombres_codeudor2").val(res.nombre1);
		$("#nombres2_codeudor2").val(res.nombre2);
		$("#apellido1_codeudor2").val(res.apellido1);
		$("#apellido2_codeudor2").val(res.apellido2);
		$("#correo_personal_codeudor2").val(res.email);
		if(res.existe=="1"){
			$("#error_codeudor2").hide();
		}else{
			$("#error_codeudor2").show();
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