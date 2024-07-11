<?php
//echo $this->aprobador->user_id;
if($this->aprobador->user_id>0){
  //echo "ok1";
}
if($this->solicitud->validacion=="0" or $this->solicitud->validacion=="6" or $this->solicitud->validacion=="4" or $this->solicitud->validacion=="3" or $this->solicitud->validacion=="9"){
  //echo "ok2";
}

if($this->solicitud->acepto_cambios=="0" AND $this->solicitud->confimar_solicitud=="0"){
  //echo "ok3";
}

?>

<?php if(($this->aprobador->user_id>0) and ($this->solicitud->validacion=="0" or $this->solicitud->validacion=="6" or $this->solicitud->validacion=="4" or $this->solicitud->validacion=="3" or $this->solicitud->validacion=="9") AND $this->solicitud->acepto_cambios=="0" AND $this->solicitud->confimar_solicitud=="0" ){ ?>

<form action="/page/comite/guardar/" method="post">

	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="row">
					<div class="col-6 text-left"><h3 class="titulo">Solicitud WEB<?php echo $this->numero; ?></h3></div>
				</div>
			</div>
				<div class="col-12">
					<div class="col-md-12 titulo-seccion no-padding">Aprobación comité ordinario de crédito</div>
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
            <div class="row">
              <div class="col-12 titulo-seccion text-center">Anexos del Codeudor</div>
              <div class="col-12">
                <table width="100%" border="1">
                  <tr class="fondo-gris2">
                    <th>
                      <div align="center">Documento</div>
                    </th>
                    <th>
                      <div align="center">Archivo</div>
                    </th>
                  </tr>
                  <tr>
                    <td>
                      <div align="center">Desprendible(s) de pago<div>
                    </td>
                    <td>
                      <div align="center">
                        <?php if($this->documentos_codeudor->desprendible_pago!=""){ ?>
                        <a href="/images/<?php echo $this->documentos_codeudor->desprendible_pago; ?>" target="_blank"><button type="button"
                            class="btn btn-sm btn-secondary">1</button></a>
                        <?php } ?>
                        <?php if($this->documentos_codeudor->desprendible_pago2!=""){ ?>
                        <a href="/images/<?php echo $this->documentos_codeudor->desprendible_pago2; ?>" target="_blank"><button type="button"
                            class="btn btn-sm btn-secondary">2</button></a>
                        <?php } ?>
                        <?php if($this->documentos_codeudor->desprendible_pago3!=""){ ?>
                        <a href="/images/<?php echo $this->documentos_codeudor->desprendible_pago3; ?>" target="_blank"><button type="button"
                            class="btn btn-sm btn-secondary">3</button></a>
                        <?php } ?>
                        <?php if($this->documentos_codeudor->desprendible_pago4!=""){ ?>
                        <a href="/images/<?php echo $this->documentos_codeudor->desprendible_pago4; ?>" target="_blank"><button type="button"
                            class="btn btn-sm btn-secondary">4</button></a>
                        <?php } ?>
                        <div>
                    </td>
                  </tr>
                  <?php if($this->documentos_codeudor->certificado_laboral!=""){ ?>
                  <tr>
                    <td>
                      <div align="center">Certificado Laboral<div>
                    </td>
                    <td>
                      <div align="center">
                        <?php if($this->documentos_codeudor->certificado_laboral!=""){ ?>
                        <a href="/images/<?php echo $this->documentos_codeudor->certificado_laboral; ?>" target="_blank"><button
                            type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                    </td>
                  </tr>
                  <?php } ?>
                  <?php if($this->documentos_codeudor->cotizacion!=""){ ?>
                  <tr>
                    <td>
                      <div align="center">Cotización<div>
                    </td>
                    <td>
                      <div align="center">
                        <?php if($this->documentos_codeudor->cotizacion!=""){ ?>
                        <a href="/images/<?php echo $this->documentos_codeudor->cotizacion; ?>" target="_blank"><button type="button"
                            class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                    </td>
                  </tr>
                  <?php } ?>
                  <?php if($this->documentos_codeudor->certificado_tradicion!=""){ ?>
                  <tr>
                    <td>
                      <div align="center">Certificado tradición<div>
                    </td>
                    <td>
                      <div align="center">
                        <?php if($this->documentos_codeudor->certificado_tradicion!=""){ ?>
                        <a href="/images/<?php echo $this->documentos_codeudor->certificado_tradicion; ?>" target="_blank"><button
                            type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                    </td>
                  </tr>
                  <?php } ?>
                  <?php if($this->documentos_codeudor->recibo_matricula!=""){ ?>
                  <tr>
                    <td>
                      <div align="center">Recibo de matricula<div>
                    </td>
                    <td>
                      <div align="center">
                        <?php if($this->documentos_codeudor->recibo_matricula!=""){ ?>
                        <a href="/images/<?php echo $this->documentos_codeudor->recibo_matricula; ?>" target="_blank"><button type="button"
                            class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                    </td>
                  </tr>
                  <?php } ?>
                  <?php if($this->documentos_codeudor->impuesto_vehiculo!=""){ ?>
                  <tr>
                    <td>
                      <div align="center">Impuesto del vehículo<div>
                    </td>
                    <td>
                      <div align="center">
                        <?php if($this->documentos_codeudor->impuesto_vehiculo!=""){ ?>
                        <a href="/images/<?php echo $this->documentos_codeudor->impuesto_vehiculo; ?>" target="_blank"><button type="button"
                            class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                    </td>
                  </tr>
                  <?php } ?>
                  <?php if($this->documentos_codeudor->soat!=""){ ?>
                  <tr>
                    <td>
                      <div align="center">Soat<div>
                    </td>
                    <td>
                      <div align="center">
                        <?php if($this->documentos_codeudor->soat!=""){ ?>
                        <a href="/images/<?php echo $this->documentos_codeudor->soat; ?>" target="_blank"><button type="button"
                            class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                    </td>
                  </tr>
                  <?php } ?>
                  <?php if($this->documentos_codeudor->otros_ingresos!=""){ ?>
                  <tr>
                    <td>
                      <div align="center">Otros documentos<div>
                    </td>
                    <td>
                      <div align="center">
                        <?php if($this->documentos_codeudor->otros_ingresos!=""){ ?>
                        <a href="/images/<?php echo $this->documentos_codeudor->otros_ingresos; ?>" target="_blank"><button type="button"
                            class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                    </td>
                  </tr>
                  <?php } ?>
                  <?php if($this->documentos_codeudor->otros_documentos1!=""){ ?>
                  <tr>
                    <td>
                      <div align="center">Otros documentos<div>
                    </td>
                    <td>
                      <div align="center">
                        <?php if($this->documentos_codeudor->otros_documentos1!=""){ ?>
                        <a href="/images/<?php echo $this->documentos_codeudor->otros_documentos1; ?>" target="_blank"><button type="button"
                            class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <?php if($this->documentos_codeudor->otros_documentos2!=""){ ?>
                        <br><a href="/images/<?php echo $this->documentos_codeudor->otros_documentos2; ?>" target="_blank"><button
                            type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <?php if($this->documentos_codeudor->otros_documentos3!=""){ ?>
                        <br><a href="/images/<?php echo $this->documentos_codeudor->otros_documentos3; ?>" target="_blank"><button
                            type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <?php if($this->documentos_codeudor->otros_documentos4!=""){ ?>
                        <br><a href="/images/<?php echo $this->documentos_codeudor->otros_documentos4; ?>" target="_blank"><button
                            type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <?php if($this->documentos_codeudor->otros_documentos5!=""){ ?>
                        <br><a href="/images/<?php echo $this->documentos_codeudor->otros_documentos4; ?>" target="_blank"><button
                            type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                    </td>
                  </tr>
                  <?php } ?>
                </table>
              </div>
            </div>
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
									<option value="9" <?php if($this->aprobacion=="9"){ echo 'selected';} ?>>Devolver al analista</option>
									<!-- <option value="3" <?php if($this->aprobacion=="3"){ echo 'selected';} ?>>APL</option> -->
									<option value="4" <?php if($this->aprobacion=="4"){ echo 'selected';} ?>>Cambio de condiciones</option>

								</select>
							</div>
							<div class="col-md-6 col-lg-9"><label>Observación</label> <input type="text" name="observacion" id="observacion" value="" class="form-control" /></div>
						</div>
					<?php } ?>
				</div>

				<?php if(count($this->existe) == 0 || 0==0){ ?>
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