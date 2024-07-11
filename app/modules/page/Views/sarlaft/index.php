<?php
function codificar($x){
	$x = utf8_encode($x);
	return $x;
}

?>


		<form action="/page/sarlaft/guardar/" method="post" enctype="multipart/form-data">

			<div class="container">
				<div class="row">
						<div class="col-12">
							<h3 class="titulo">Modulo SARLAFT</h3>
							<div align="left">
								<div class="separador_login2"></div>
							</div>
						</div>
						<?php if($_GET['mod']!="detalle_solicitud"){ ?>
							<div class="col-12"><br><h4>Por favor actualice su información SARLAFT 2021</h4></div>
						<?php } ?>
						<?php echo $this->getRoutPHP('modules/page/Views/sistema/paso1_sarlaft.php'); ?>
						<?php //echo $this->getRoutPHP('modules/page/Views/sistema/paso6_sarlaft.php'); ?>
						<?php //echo $this->getRoutPHP('modules/page/Views/sistema/terminos_codeudor.php'); ?>

						<?php if($_GET['mod']!="detalle_solicitud"){ ?>
							<div class="col-12 text-center"><input name="Enviar" type="submit" value="Enviar" class="btn btn-azul" /><br><br></div>
						<?php } ?>

						<input name="id" type="hidden" value="<?php echo $this->id; ?>" />

				</div>
			</div>


		</form>


<script type="text/javascript">
function calcularEdad() {
	var fecha = document.getElementById('fecha_nacimiento').value;
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }
    document.getElementById('edad').value=edad;
    $("#error1").html();
	if(edad<18){
		var mensaje = ("Debe ser mayor de edad");
		document.getElementById('fecha_nacimiento').value="";
		document.getElementById('edad').value="";
		$("#error1").html('<div class="alert alert-danger error"><i class="far fa-times-circle error"></i> '+mensaje+'</div>');
	}
}

	calcularEdad();
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