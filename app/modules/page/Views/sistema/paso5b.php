

<div class="container">
	<div class="row">
	    <form id="form1" name="form1" method="post" action="/page/sistema/guardarpaso/" class="col-12">
			<div class="col-12">
				<div class="row">
					<div class="col-6 text-left"><h3 class="titulo">Solicitud WEB<?php echo $this->numero; ?></h3></div>
					<div align="left" class="col-12">
						<div class="separador_login2"></div>
					</div>
					<div class="col-6 text-left"><h3 class="paso">Paso 5/6</h3></div>
				</div>
			</div>
			<div class="col-12">
				<div class="row form-group">

					<div class="col-md-12 col-lg-12">
						<br><br>

						<div class="row formulario">
							<div class="col-12"><h4 class="datosResaltados text-center"><b>Anexos documentales</b></h4></div>
							<div align="center" class="col-12">
								<div class="separador_login5"></div><br>
							</div>


							<div align="left" class="col-12"><strong>Asociado</strong></div>

							<?php if($this->linea->archivo1==1){ ?>
							    <div align="left" class="col-lg-4">Cédula </div>
							    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							   		<input name="cedula" id="cedula" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos->cedula=="" or $this->documentos->cedula=="0"){ echo 'required'; } ?> /> <?php if($this->documentos->cedula!="" and $this->documentos->cedula!="0"){ ?><img src="corte/ok.png" /><?php }?><br />
									<input name="cedula_ant" type="hidden" value="<?php echo $this->documentos->cedula; ?>" />
								<?php } else {?>
							    	<a class="enlace1" href="documentos/<?php echo $this->documentos->cedula; ?>" target="_blank"><?php echo $this->documentos->cedula; ?></a><br />
							    <?php }?>
							<?php }?>

							<?php if($this->linea->archivo2==1){ ?>
							    <div align="left" class="col-lg-4">Desprendible de Pago (excepto junio o diciembre) </div>
							    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							    	<input name="desprendible_pago" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos->desprendible_pago=="" or 1==1){ echo 'required'; } ?> /> <?php if($this->documentos->desprendible_pago!="" and 1==0){ ?><img src="corte/ok.png" /><?php }?><br />
									<input name="desprendible_pago_ant" type="hidden" value="<?php echo $this->documentos->desprendible_pago; ?>" />
								<?php } else {?>
							    	<a class="enlace1" href="documentos/<?php echo $this->documentos->desprendible_pago; ?>" target="_blank"><?php echo $this->documentos->desprendible_pago; ?></a><br />
							    <?php }?>
							<?php }?>

							<?php if($this->linea->archivo22==1){ ?>
							    <div align="left" class="col-lg-4">Desprendible de Pago (excepto junio o diciembre) </div>
							    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							    	<input name="desprendible_pago2" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos->desprendible_pago2=="" or 1==1){ echo 'required'; } ?> /> <?php if($this->documentos->desprendible_pago2!="" and 1==0){ ?><img src="corte/ok.png" /><?php }?><br />
									<input name="desprendible_pago2_ant" type="hidden" value="<?php echo $this->documentos->desprendible_pago2; ?>" />
								<?php } else {?>
							    	<a class="enlace1" href="documentos/<?php echo $this->documentos->desprendible_pago2; ?>" target="_blank"><?php echo $this->documentos->desprendible_pago2; ?></a><br />
							    <?php }?>
							<?php }?>

							<?php if($this->linea->archivo23==1){ ?>
							    <div align="left" class="col-lg-4">Desprendible de Pago (excepto junio o diciembre) </div>
							    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							    	<input name="desprendible_pago3" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos->desprendible_pago3=="" or 1==1){ echo 'required'; } ?> /> <?php if($this->documentos->desprendible_pago3!="" and 1==0){ ?><img src="corte/ok.png" /><?php }?><br />
									<input name="desprendible_pago3_ant" type="hidden" value="<?php echo $this->documentos->desprendible_pago3; ?>" />
								<?php } else {?>
							    	<a class="enlace1" href="documentos/<?php echo $this->documentos->desprendible_pago3; ?>" target="_blank"><?php echo $this->documentos->desprendible_pago3; ?></a><br />
							    <?php }?>
							<?php }?>

							<?php if($this->linea->archivo24==1){ ?>
							    <div align="left" class="col-lg-4">Desprendible de Pago (excepto junio o diciembre) </div>
							    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							    	<input name="desprendible_pago4" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos->desprendible_pago4=="" or 1==1){ echo ''; } ?> /> <?php if($this->documentos->desprendible_pago4!="" and 1==0){ ?><img src="corte/ok.png" /><?php }?><br />
									<input name="desprendible_pago4_ant" type="hidden" value="<?php echo $this->documentos->desprendible_pago4; ?>" />
								<?php } else {?>
							    	<a class="enlace1" href="documentos/<?php echo $this->documentos->desprendible_pago4; ?>" target="_blank"><?php echo $this->documentos->desprendible_pago4; ?></a><br />
							    <?php }?>
							<?php }?>

							<?php if($this->linea->archivo3==1){ ?>
							    <div align="left" class="col-lg-4">Certificado laboral </div>
							    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							    	<input name="certificado_laboral" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos->certificado_laboral=="" or $this->documentos->certificado_laboral=="0"){ echo 'required'; } ?> /> <?php if($this->documentos->certificado_laboral!="" and $this->documentos->certificado_laboral!="0"){ ?><img src="corte/ok.png" /><?php }?><br />
									<input name="certificado_laboral_ant" type="hidden" value="<?php echo $this->documentos->certificado_laboral; ?>" />
								<?php } else {?>
							    	<a class="enlace1" href="documentos/<?php echo $this->documentos->certificado_laboral; ?>" target="_blank"><?php echo $this->documentos->certificado_laboral; ?></a><br />
							    <?php }?>
							<?php }?>

							<?php if($this->linea->archivo4==1){ ?>
							    <div align="left" class="col-lg-4">Otros documentos </div>
							    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							    	<input name="otros_ingresos" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos->otros_ingresos==""){ echo ''; } ?> /> <?php if($this->documentos->otros_ingresos!=""){ ?><img src="corte/ok.png" /><?php }?><br />
									<input name="otros_ingresos_ant" type="hidden" value="<?php echo $this->documentos->otros_ingresos; ?>" />
								<?php } else {?>
							    	<a class="enlace1" href="documentos/<?php echo $this->documentos->otros_ingresos; ?>" target="_blank"><?php echo $this->documentos->otros_ingresos; ?></a><br />
							    <?php }?>
							<?php }?>

							<?php if($this->linea->certificado_tradicion==1 and ($this->solicitud->destino=="VIVIENDA USADA" or $this->solicitud->destino=="MEJORA VIVIENDA" or $this->solicitud->tipo_garantia=="GARANTIA PERSONAL") ){ ?>
							    <div align="left" class="col-lg-4">Certificado de Tradición y Libertad </div>
							    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							    	<input name="certificado_tradicion" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos->certificado_tradicion==""){ echo 'required'; } ?> /> <?php if($this->documentos->certificado_tradicion!="" and $this->documentos->certificado_tradicion!="0"){ ?><img src="corte/ok.png" /><?php }?><br />
									<input name="certificado_tradicion_ant" type="hidden" value="<?php echo $this->documentos->certificado_tradicion; ?>" />
								<?php } else {?>
							    	<a class="enlace1" href="documentos/<?php echo $this->documentos->certificado_tradicion; ?>" target="_blank"><?php echo $this->documentos->certificado_tradicion; ?></a><br />
							    <?php }?>
							<?php }?>

							<?php if($this->linea->codigo=="251"){ ?>
								<?php
									$titulo = "";
									if($this->solicitud->destino=="VIVIENDA USADA"){
										$titulo = "Contrato vivienda elaborado por los dos";
									}
									if($this->solicitud->destino=="VIVIENDA NUEVA"){
										$titulo = "Contrato constructora";
									}
									if($this->solicitud->destino=="MEJORA VIVIENDA"){
										$titulo = "Contrato de obra maestro/constructora";
									}
								?>
							    <div align="left" class="col-lg-4"><?php echo $titulo ?> </div>
							    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							    	<input name="contrato_vivienda" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos->contrato_vivienda==""){ echo 'required'; } ?> /> <?php if($this->documentos->contrato_vivienda!=""){ ?><img src="corte/ok.png" /><?php }?><br />
									<input name="contrato_vivienda_ant" type="hidden" value="<?php echo $this->documentos->contrato_vivienda; ?>" />
								<?php } else {?>
							    	<a class="enlace1" href="documentos/<?php echo $this->documentos->contrato_vivienda; ?>" target="_blank"><?php echo $this->documentos->contrato_vivienda; ?></a><br />
							    <?php }?>
							<?php }?>

							<?php if($this->linea->estado_obligacion==1){ ?>
							    <div align="left" class="col-lg-4">Estado de Cuenta de la Obligación </div>
							    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							    	<input name="estado_obligacion" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos->certificado_tradicion==""){ echo 'required'; } ?> /> <?php if($this->documentos->estado_obligacion2!=""){ ?><img src="corte/ok.png" /><?php }?><br />
									<input name="estado_obligacion_ant" type="hidden" value="<?php echo $this->documentos->estado_obligacion; ?>" />
								<?php } else {?>
							    	<a class="enlace1" href="documentos/<?php echo $this->documentos->estado_obligacion; ?>" target="_blank"><?php echo $this->documentos->estado_obligacion; ?></a><br />
							    <?php }?>
							<?php }?>

							<?php if($this->linea->estado_obligacion2==1){ ?>
							    <div align="left" class="col-lg-4">Estado de Cuenta de la Obligación </div>
							    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							    	<input name="estado_obligacion2" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos->estado_obligacion2==""){ echo 'required'; } ?> /> <?php if($this->documentos->estado_obligacion2!=""){ ?><img src="corte/ok.png" /><?php }?><br />
									<input name="estado_obligacion2_ant" type="hidden" value="<?php echo $this->documentos->estado_obligacion2; ?>" />
								<?php } else {?>
							    	<a class="enlace1" href="documentos/<?php echo $this->documentos->estado_obligacion2; ?>" target="_blank"><?php echo $this->documentos->estado_obligacion2; ?></a><br />
							    <?php }?>
							<?php }?>

							<?php if($this->linea->estado_obligacion3==1){ ?>
							    <div align="left" class="col-lg-4">Estado de Cuenta de la Obligación </div>
							    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							    	<input name="estado_obligacion3" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos->estado_obligacion3==""){ echo 'required'; } ?> /> <?php if($this->documentos->estado_obligacion3!=""){ ?><img src="corte/ok.png" /><?php }?><br />
									<input name="estado_obligacion3_ant" type="hidden" value="<?php echo $this->documentos->estado_obligacion3; ?>" />
								<?php } else {?>
							    	<a class="enlace1" href="documentos/<?php echo $this->documentos->estado_obligacion3; ?>" target="_blank"><?php echo $this->documentos->estado_obligacion3; ?></a><br />
							    <?php }?>
							<?php }?>

							<?php if($this->linea->factura_proforma==1){ ?>
							    <div align="left" class="col-lg-4">Factura Proforma </div>
							    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							    	<input name="factura_proforma" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos->factura_proforma==""){ echo ''; } ?> /> <?php if($this->documentos->factura_proforma!=""){ ?><img src="corte/ok.png" /><?php }?><br />
									<input name="factura_proforma_ant" type="hidden" value="<?php echo $this->documentos->factura_proforma; ?>" />
								<?php } else {?>
							    	<a class="enlace1" href="documentos/<?php echo $this->documentos->factura_proforma; ?>" target="_blank"><?php echo $this->documentos->factura_proforma; ?></a><br />
							    <?php }?>
							<?php }?>

							<?php if($this->linea->recibo_matricula==1){ ?>
							    <div align="left" class="col-lg-4">Recibo Matricula </div>
							    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							    	<input name="recibo_matricula" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos->recibo_matricula==""){ echo 'required'; } ?> /> <?php if($this->documentos->recibo_matricula!=""){ ?><img src="corte/ok.png" /><?php }?><br />
									<input name="recibo_matricula_ant" type="hidden" value="<?php echo $this->documentos->recibo_matricula; ?>" />
								<?php } else {?>
							    	<a class="enlace1" href="documentos/<?php echo $this->documentos->recibo_matricula; ?>" target="_blank"><?php echo $this->documentos->recibo_matricula; ?></a><br />
							    <?php }?>
							<?php }?>

							<?php if($this->solicitud->declara_renta=="Si" and $this->solicitud->linea!="12" and $this->solicitud->linea!="35"){ ?>
							    <div align="left" class="col-lg-4">Declaración de renta </div>
							    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							    	<input name="declaracion_renta" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos->declaracion_renta==""){ echo 'required'; } ?> /> <?php if($this->documentos->declaracion_renta!="" and $this->documentos->declaracion_renta!="0"){ ?><img src="corte/ok.png" /><?php }?><br />
									<input name="declaracion_renta_ant" type="hidden" value="<?php echo $this->documentos->declaracion_renta; ?>" />
								<?php } else {?>
							    	<a class="enlace1" href="documentos/<?php echo $this->documentos->declaracion_renta; ?>" target="_blank"><?php echo $this->documentos->declaracion_renta; ?></a><br />
							    <?php }?>
							<?php }?>


							<?php if($this->solicitud->tipo_garantia=="DEUDOR SOLIDARIO"){ ?>
								<div><strong>Deudor solidario</strong></div>

								<?php if($this->linea->archivo1==1){ ?>
							        <div align="left" class=" col-lg-4 enlinea">Cédula </div>
							        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							            <input name="cedula2" id="cedula2" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos2->cedula==""){ echo 'required'; } ?> /> <?php if($this->documentos2->cedula!=""){ ?><img src="corte/ok.png" /><?php }?>		<br />
							            <input name="cedula2_ant" type="hidden" value="<?php echo $this->documentos2->cedula; ?>" />
							        <?php } else {?>
							            <a class="enlace1" href="documentos/<?php echo $this->documentos2->cedula; ?>" target="_blank"><?php echo $this->documentos2->cedula; ?></a><br />
							        <?php }?>
							    <?php }?>

							    <?php if($this->linea->archivo2==1){ ?>
							        <div align="left" class=" col-lg-4 enlinea">Desprendible de Pago (excepto junio o diciembre) </div>
							        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							            <input name="desprendible_pagoB" id="desprendible_pago2" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos2->desprendible_pago==""){ echo 'required'; } ?> /> <?php if($this->documentos2->desprendible_pago!=""){ ?><img src="corte/ok.png" /><?php }?><br />
							            <input name="desprendible_pagoB_ant" type="hidden" value="<?php echo $this->documentos2->desprendible_pago; ?>" />
							        <?php } else {?>
							            <a class="enlace1" href="documentos/<?php echo $this->documentos2->desprendible_pago; ?>" target="_blank"><?php echo $this->documentos2->desprendible_pago; ?></a><br />
							        <?php }?>
							    <?php }?>

							    <?php if($this->linea->archivo22==1){ ?>
							        <div align="left" class=" col-lg-4 enlinea">Desprendible de Pago (excepto junio o diciembre) </div>
							        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							            <input name="desprendible_pagoB2" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos2->desprendible_pago2==""){ echo 'required'; } ?> /> <?php if($this->documentos2->desprendible_pago2!=""){ ?><img src="corte/ok.png" /><?php }?><br />
							            <input name="desprendible_pagoB2_ant" type="hidden" value="<?php echo $this->documentos2->desprendible_pago2; ?>" />
							        <?php } else {?>
							            <a class="enlace1" href="documentos/<?php echo $this->documentos2->desprendible_pago2; ?>" target="_blank"><?php echo $this->documentos2->desprendible_pago2; ?></a><br />
							        <?php }?>
							    <?php }?>

							    <?php if($this->linea->archivo23==1){ ?>
							        <div align="left" class=" col-lg-4 enlinea">Desprendible de Pago (excepto junio o diciembre) </div>
							        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							            <input name="desprendible_pagoB3" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos2->desprendible_pago3==""){ echo 'required'; } ?> /> <?php if($this->documentos2->desprendible_pago3!=""){ ?><img src="corte/ok.png" /><?php }?><br />
							            <input name="desprendible_pagoB3_ant" type="hidden" value="<?php echo $this->documentos2->desprendible_pago3; ?>" />
							        <?php } else {?>
							            <a class="enlace1" href="documentos/<?php echo $this->documentos2->desprendible_pago3; ?>" target="_blank"><?php echo $this->documentos2->desprendible_pago3; ?></a><br />
							        <?php }?>
							    <?php }?>

							    <?php if($this->linea->archivo24==1){ ?>
							        <div align="left" class=" col-lg-4 enlinea">Desprendible de Pago (excepto junio o diciembre) </div>
							        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							            <input name="desprendible_pagoB4" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos2->desprendible_pago4==""){ echo ''; } ?> /> <?php if($this->documentos2->desprendible_pago4!=""){ ?><img src="corte/ok.png" /><?php }?><br />
							            <input name="desprendible_pagoB4_ant" type="hidden" value="<?php echo $this->documentos2->desprendible_pago4; ?>" />
							        <?php } else {?>
							            <a class="enlace1" href="documentos/<?php echo $this->documentos2->desprendible_pago4; ?>" target="_blank"><?php echo $this->documentos2->desprendible_pago4; ?></a><br />
							        <?php }?>
							    <?php }?>

							    <?php if($this->linea->archivo3==1){ ?>
							        <div align="left" class=" col-lg-4 enlinea">Certificado laboral </div>
							        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							            <input name="certificado_laboral2" id="certificado_laboral2" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos2->certificado_laboral==""){ echo 'required'; } ?> /> <?php if($this->documentos2->certificado_laboral!=""){ ?><img src="corte/ok.png" /><?php }?><br />
							            <input name="certificado_laboral2_ant" type="hidden" value="<?php echo $this->documentos2->certificado_laboral; ?>" />
							        <?php } else {?>
							            <a class="enlace1" href="documentos/<?php echo $this->documentos2->certificado_laboral; ?>" target="_blank"><?php echo $this->documentos2->certificado_laboral; ?></a><br />
							        <?php }?>
							    <?php }?>

							    <?php if($this->linea->archivo4==1){ ?>
							        <div align="left" class=" col-lg-4 enlinea">Certificado otros ingresos </div>
							        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							            <input name="otros_ingresos2" id="otros_ingresos2" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos2->otros_ingresos==""){ echo ''; } ?> /> <?php if($this->documentos2->otros_ingresos!=""){ ?><img src="corte/ok.png" /><?php }?><br />
							            <input name="otros_ingresos2_ant" type="hidden" value="<?php echo $this->documentos2->otros_ingresos; ?>" />
							        <?php } else {?>
							            <a class="enlace1" href="documentos/<?php echo $this->documentos2->otros_ingresos; ?>" target="_blank"><?php echo $this->documentos2->otros_ingresos; ?></a><br />
							        <?php }?>
							    <?php }?>


								<?php if($this->linea->certificado_tradicion==1){ ?>
								    <div align="left" class=" col-lg-4 enlinea">Certificado de Tradición y Libertad </div>
								    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
								    	<input name="certificado_tradicionB" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos2->certificado_tradicion==""){ echo 'required'; } ?> /> <?php if($this->documentos2->certificado_tradicion!=""){ ?><img src="corte/ok.png" /><?php }?><br />
										<input name="certificado_tradicionB_ant" type="hidden" value="<?php echo $this->documentos2->certificado_tradicion; ?>" />
									<?php } else {?>
								    	<a class="enlace1" href="documentos/<?php echo $this->documentos2->certificado_tradicion; ?>" target="_blank"><?php echo $this->documentos2->certificado_tradicion; ?></a><br />
								    <?php }?>
								<?php }?>

								<?php if($this->linea->estado_obligacion==1 and 1==0){ ?>
							        <div align="left" class=" col-lg-4 enlinea">Estado de Cuenta de la Obligación </div>
							        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							            <input name="estado_obligacionB" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos2->certificado_tradicion==""){ echo 'required'; } ?> /> <?php if($this->documentos2->estado_obligacion2!=""){ ?><img src="corte/ok.png" /><?php }?><br />
							            <input name="estado_obligacionB_ant" type="hidden" value="<?php echo $this->documentos2->estado_obligacion; ?>" />
							        <?php } else {?>
							            <a class="enlace1" href="documentos/<?php echo $this->documentos2->estado_obligacion; ?>" target="_blank"><?php echo $this->documentos2->estado_obligacion; ?></a><br />
							        <?php }?>
							    <?php }?>

							    <?php if($this->linea->estado_obligacion2==1 and 1==0){ ?>
							        <div align="left" class=" col-lg-4 enlinea">Estado de Cuenta de la Obligación </div>
							        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							            <input name="estado_obligacion2B" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos2->estado_obligacion2==""){ echo 'required'; } ?> /> <?php if($this->documentos2->estado_obligacion2!=""){ ?><img src="corte/ok.png" /><?php }?><br />
							            <input name="estado_obligacion2B_ant" type="hidden" value="<?php echo $this->documentos2->estado_obligacion2; ?>" />
							        <?php } else {?>
							            <a class="enlace1" href="documentos/<?php echo $this->documentos2->estado_obligacion2; ?>" target="_blank"><?php echo $this->documentos2->estado_obligacion2; ?></a><br />
							        <?php }?>
							    <?php }?>

							    <?php if($this->linea->estado_obligacion3==1 and 1==0){ ?>
							        <div align="left" class=" col-lg-4 enlinea">Estado de Cuenta de la Obligación </div>
							        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							            <input name="estado_obligacion3B" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos2->estado_obligacion3==""){ echo 'required'; } ?> /> <?php if($this->documentos2->estado_obligacion3!=""){ ?><img src="corte/ok.png" /><?php }?><br />
							            <input name="estado_obligacion3B_ant" type="hidden" value="<?php echo $this->documentos2->estado_obligacion3; ?>" />
							        <?php } else {?>
							            <a class="enlace1" href="documentos/<?php echo $this->documentos2->estado_obligacion3; ?>" target="_blank"><?php echo $this->documentos2->estado_obligacion3; ?></a><br />
							        <?php }?>
							    <?php }?>

							    <?php if($this->linea->factura_proforma==1 and 1==0){ ?>
							        <div align="left" class=" col-lg-4 enlinea">Factura Proforma </div>
							        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							            <input name="factura_proformaB" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos2->factura_proforma==""){ echo 'required'; } ?> /> <?php if($this->documentos2->factura_proforma!=""){ ?><img src="corte/ok.png" /><?php }?><br />
							            <input name="factura_proformaB_ant" type="hidden" value="<?php echo $this->documentos2->factura_proforma; ?>" />
							        <?php } else {?>
							            <a class="enlace1" href="documentos/<?php echo $this->documentos2->factura_proforma; ?>" target="_blank"><?php echo $this->documentos2->factura_proforma; ?></a><br />
							        <?php }?>
							    <?php }?>

							    <?php if($this->linea->recibo_matricula==1 and 1==0){ ?>
							        <div align="left" class=" col-lg-4 enlinea">Recibo Matricula </div>
							        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
							            <input name="recibo_matriculaB" type="file" class="col-lg-8" accept="image/*, application/pdf" <?php if($this->documentos2->recibo_matricula==""){ echo ''; } ?> /> <?php if($this->documentos2->recibo_matricula!=""){ ?><img src="corte/ok.png" /><?php }?><br />
							            <input name="recibo_matriculaB_ant" type="hidden" value="<?php echo $this->documentos2->recibo_matricula; ?>" />
							        <?php } else {?>
							            <a class="enlace1" href="documentos/<?php echo $this->documentos2->recibo_matricula; ?>" target="_blank"><?php echo $this->documentos2->recibo_matricula; ?></a><br />
							        <?php }?>
							    <?php }?>

							<?php }?>




						<div align="center" class="col-lg-12">

							<br>
							<strong>AUTORIZACIÓN DE DESCUENTO</strong><br />

						    <div align="justify">
						    Yo (Nosotros) <strong><?php echo $this->user->nombre; ?><?php if($this->solicitud->tipo_garantia=="DEUDOR SOLIDARIO"){ echo ", ".$this->codeudor->nombres; } ?></strong> Identificados como aparece al pie de mi firma digital, autorizamos permanente, expresa e irrevocablemente al pagador de la empresa donde laboramos, o a las empresas que paguen nuestras pensiones, o a las empresas en las que por ley debamos mantener nuestras cesantías, para que de conformidad con los artículos 55 y 56 del Decreto Ley 1481 de 1989, 142 y 144 de la ley 79 de 1988 y el artículo 4 de la ley 920 de 2004, deduzca de nuestros salarios, prestaciones legales o extralegales, bonificaciones, indemnizaciones, cesantías, pensión y en general de cualquier valor a nuestro favor, las cuotas a nuestro cargo generadas según el plan de amortización definido para esta obligación con el Fondo de Empleados FEDEAA. Igualmente queda plenamente autorizado para que descuente de nuestras prestaciones sociales y demás derechos de carácter laboral que nos correspondan, los saldos que adeudemos al Fondo de Empleados FEDEAA en la fecha que por cualquier causal o motivo nos retiremos de la empresa en la que laboramos. Así mismo autorizamos expresa e irrevocablemente al Fondo de Empleados FEDEAA, a descontar de nuestra cuenta de ahorros o cuenta corriente, o de nuestra cuenta de nómina, el valor correspondiente al saldo mensual que no descuente la empresa a la que nos encontremos vinculados laboralmente. De igual manera autorizo irrevocablemente para descontar cualquier otro valor que se genere con ocasión de la domiciliación que por este documento se realiza.<br />
						    Autorizamos expresa e irrevocablemente al Fondo de Empleados FEDEAA a quien represente sus derechos u ostente en el futuro la calidad de acreedor, para consultar, reportar, procesar, solicitar y divulgar a las centrales de riesgo toda la información correspondiente a nuestras obligaciones vigentes o vencidas que contraigamos o hayamos contraído con el Fondo de Empleados FEDEAA. <br /><br />
						    <strong>Autorizo el descuento:</strong> <input name="autorizo" type="checkbox" value="1" <?php if($_GET['mod']=="detalle_solicitud"){ echo 'checked="checked" '; } ?> required />
						    </div>

							<br />

							<p align="justify">
							Así mismo declaro que he sido informado que El Fondo de Empleados FEDEAA, actuara como el responsable del Tratamiento de mis datos personales y ha puesto a mi disposición la línea de atención al asociado (1) 327 53 00, en su domicilio principal en la página www.fedeaa.com, la atención de requerimientos relacionados con el tratamiento de mis datos personales y el ejercicio de los derechos mencionados en esta autorización. Mis datos serán tratados para fines asociativos, estatutarios, contractuales, comerciales, de atención al asociado y marketing y mis derechos como titular son los previstos en la constitución y la ley en especial el de revocar este consentimiento cuando sean vulnerados mis derechos que se consagran en esta autorización.
							</p>

							<div align="left"><strong>Aceptación:</strong> <input name="autorizo2" type="checkbox" value="1" <?php if($_GET['mod']=="detalle_solicitud"){ echo 'checked="checked" '; } ?> required /></div><br />

							<p align="justify">
							Conforme a la circular externa 004 de 2017 de la Superintendencia de la Economía Solidaria y las demás normas legales concordantes sobre prevención de lavado de activos, Declaro que el origen de mis ingresos, no provienen de ninguna actividad ilícita de las contempladas en el código penal colombiano o en cualquier norma que lo modifique o adicione. Autorizo al FONDO DE EMPLEADOS FEDEAA a saldar las cuentas y depósitos que mantenga en esta institución, de comprobarse que tengo vínculos comerciales o personales, con empresas o personas incursas en actividades ilícitas, eximiendo a la entidad de toda responsabilidad que se derive por información errónea, falsa o inexacta que yo hubiere proporcionado.
							</p>

							<div align="left"><strong>Aceptación:</strong> <input name="autorizo3" type="checkbox" value="1" <?php if($_GET['mod']=="detalle_solicitud"){ echo 'checked="checked" '; } ?> required /></div><br />

						</div>


						</div>

					</div>

				</div>
			</div>




		    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
		    	<div align="center"><input name="Anterior" type="button" value="Anterior" class="btn btn-azul" onclick="window.location='/page/sistema/paso4/?id=<?php echo $this->id; ?>';" /> <input name="Enviar" type="submit" value="Siguiente" class="btn btn-azul" /></div><br>
		    <?php }?>

		    <input name="paso" type="hidden" value="5" />
		    <input name="id" type="hidden" value="<?php echo $this->id; ?>" />
	    </form>
	</div>
</div>


<script type="text/javascript">
</script>