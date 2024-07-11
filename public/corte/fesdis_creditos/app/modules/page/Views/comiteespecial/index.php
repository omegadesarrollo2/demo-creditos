<?php if(($this->aprobador->user_id>0) and ($this->solicitud->validacion=="0" or $this->solicitud->validacion=="6")){ ?>

<form action="/page/comiteespecial/guardar/" method="post">

	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="row">
					<div class="col-6 text-left"><h3 class="titulo">Solicitud WEB<?php echo $this->numero; ?></h3></div>
				</div>
			</div>
				<div class="col-12">
					<div class="col-md-12 titulo-seccion no-padding">Aprobación comité especial de crédito</div>
					<div class="col-lg-10 offset-lg-1">
						<?php echo $this->tabla; ?><br>
					</div>
					<div class="col-lg-10 offset-lg-1">
						<?php echo $this->getRoutPHP('modules/page/Views/comite/anexos.php'); ?><br>
					</div>
					<div class="col-lg-10 offset-lg-1">
						<?php echo $this->getRoutPHP('modules/page/Views/comite/documentosadicionales.php'); ?><br>
					</div>
					<div class="col-lg-10 offset-lg-1">
						<br>
						<div><b>Observación del asociado</b></div>
						<div><?php if($this->solicitud->observaciones!=""){ echo $this->solicitud->observaciones; } else { echo 'Ninguna'; }?></div>
					</div>
					<div class="col-lg-10 offset-lg-1">
						<div><b>Observación del analista</b></div>
						<div><?php if($this->solicitud->observacion_analista!=""){ echo $this->solicitud->observacion_analista; } else { echo "Ninguna"; } ?></div>
					</div>
					<?php if(count($this->existe) == 0){ ?>
						<div class="row form-group formulario caja-formulario">
							<div class="col-md-6 col-lg-3"><label>Aprobador:</label><br><span class="negro"><?php echo $this->aprobador->user_names; ?></span></div>
							<div class="col-md-6 col-lg-3"><label>Aprobación</label>
								<select name="aprobacion" class="form-control" required>
									<option value="" <?php if($this->aprobacion==""){ echo 'selected';} ?>></option>
									<option value="1" <?php if($this->aprobacion=="1"){ echo 'selected';} ?>>SI</option>
									<option value="2" <?php if($this->aprobacion=="2"){ echo 'selected';} ?>>NO</option>
									<option value="3" <?php if($this->aprobacion=="3"){ echo 'selected';} ?>>APL</option>
								</select>
							</div>
							<div class="col-md-6 col-lg-9"><label>Observación</label> <input type="text" name="observacion" id="observacion" value="" class="form-control" /></div>
						</div>
					<?php } ?>
				</div>

				<?php if(count($this->existe) == 0){ ?>
					<div class="col-12 text-center"><input name="Enviar" type="submit" value="Enviar" class="btn btn-azul" /><br><br></div>
				<?php } else {?>
					<div class="col-12 text-center">Ud ya dio su opinión respecto al crédito</div>
				<?php } ?>

				<input name="id" type="hidden" value="<?php echo $this->id; ?>" />
				<input name="fecha" type="hidden" value="<?php echo date("Y-m-d H:i:s") ?>" />
				<input name="usuario" type="hidden" value="<?php echo $this->aprobador->user_id; ?>" />

		</div>
	</div>


</form>

<?php } else { ?>
	<?php if($this->solicitud->validacion=="1" or $this->solicitud->validacion=="4"){ ?>
		<div class="col-lg-12">

			<div align="center"><?php echo $this->tabla; ?></div>

			<br>
			<p align="center">La solicitud cambió de estado a: <b><?php echo $this->validaciones[$this->solicitud->validacion]; ?></b> el <b><?php echo $this->solicitud->fecha_estado; ?></b></p>
		</div>
	<?php } ?>
<?php } ?>

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


<?php
function codificar($x){
	$x = utf8_encode($x);
	return $x;
}
?>