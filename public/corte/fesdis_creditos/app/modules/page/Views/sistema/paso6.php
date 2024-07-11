<?php //print_r($this->solicitud); ?>

<div class="container">
	<div class="row">

			<div class="col-12">
				<div class="row form-group">

					<div class="col-md-12 col-lg-12">

						<div class="row  text-center">
							<div class="col-12 titulo-seccion">Anexos documentales</div><br><br>

						<?php if($_GET['e']=="" and $_GET['n']==""){ ?>
							<?php if($_GET['mod']=="detalle_solicitud"){ ?>
								<?php if($_SESSION['kt_login_level']=="1" or $_SESSION['kt_login_level']=="3"){ ?>
									<div class="text-right col-12"><a class="btn btn-primary btn-sm" href="/administracion/editardocumentos/manage/?id=<?php echo $this->documentos->id; ?>&solicitud=<?php echo $this->documentos->solicitud; ?>&tipo=<?php echo $this->documentos->tipo; ?>" target="_top">Editar documentos asociado</a><br><br></div>
								<?php } ?>
							<?php } ?>
							<div align="left" class="col-12 fondo-gris2"><strong>Asociado</strong></div>
									<?php if($this->linea->orden_medica==1){ ?>
										<div class="col-12 fondo-gris3">
											<div class="row">
										        <div align="left" class=" col-lg-6 enlinea">Orden médica o de servicios</div>
										        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
										            <input name="orden_medica" required type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos->orden_medica==""){ echo ''; } ?> /> <?php if($this->documentos->orden_medica!=""){ ?><img src="corte/ok.png" /><?php }?><br />
										            <input name="orden_medica_ant" type="hidden" value="<?php echo $this->documentos->orden_medica; ?>" />
										        <?php } else {?>
										            <a class="enlace1" href="/images/<?php echo $this->documentos->orden_medica; ?>" target="_blank"><?php echo $this->documentos->orden_medica; ?></a><br />
										        <?php }?>
										    </div>
										</div>
									<?php }?>
									<?php if($this->linea->certificacion==1){ ?>
										<div class="col-12 fondo-gris3">
											<div class="row">
										        <div align="left" class=" col-lg-6 enlinea">Certificación</div>
										        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
										            <input name="certificacion" required type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos->certificacion==""){ echo ''; } ?> /> <?php if($this->documentos->certificacion!=""){ ?><img src="corte/ok.png" /><?php }?><br />
										            <input name="certificacion_ant" type="hidden" value="<?php echo $this->documentos->certificacion; ?>" />
										        <?php } else {?>
										            <a class="enlace1" href="/images/<?php echo $this->documentos->certificacion; ?>" target="_blank"><?php echo $this->documentos->certificacion; ?></a><br />
										        <?php }?>
										    </div>
										</div>
									<?php }?>
									<?php if($this->linea->cotizacion==1){ ?>
										<div class="col-12 fondo-gris3">
											<div class="row">
										        <div align="left" class=" col-lg-6 enlinea">Cotización</div>
										        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
										            <input name="cotizacion" required type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos->cotizacion==""){ echo ''; } ?> /> <?php if($this->documentos->cotizacion!=""){ ?><img src="corte/ok.png" /><?php }?><br />
										            <input name="cotizacion_ant" type="hidden" value="<?php echo $this->documentos->cotizacion; ?>" />
										        <?php } else {?>
										            <a class="enlace1" href="/images/<?php echo $this->documentos->cotizacion; ?>" target="_blank"><?php echo $this->documentos->cotizacion; ?></a><br />
										        <?php }?>
										    </div>
										</div>
									<?php }?>
									<?php if($this->linea->peritaje_vehiculo==1){ ?>
										<div class="col-12 fondo-gris3">
											<div class="row">
										        <div align="left" class=" col-lg-6 enlinea">Peritaje del vehículo</div>
										        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
										            <input name="peritaje_vehiculo"  required type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos->peritaje_vehiculo==""){ echo ''; } ?> /> <?php if($this->documentos->peritaje_vehiculo!=""){ ?><img src="corte/ok.png" /><?php }?><br />
										            <input name="peritaje_vehiculo_ant" type="hidden" value="<?php echo $this->documentos->peritaje_vehiculo; ?>" />
										        <?php } else {?>
										            <a class="enlace1" href="/images/<?php echo $this->documentos->peritaje_vehiculo; ?>" target="_blank"><?php echo $this->documentos->peritaje_vehiculo; ?></a><br />
										        <?php }?>
										    </div>
										</div>
									<?php }?>
									<?php if($this->linea->impuesto_vehiculo==1){ ?>
										<div class="col-12 fondo-gris3">
											<div class="row">
										        <div align="left" class=" col-lg-6 enlinea">Paz y salvo del impuesto del vehículo</div>
										        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
										            <input name="impuesto_vehiculo"  required type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos->impuesto_vehiculo==""){ echo ''; } ?> /> <?php if($this->documentos->impuesto_vehiculo!=""){ ?><img src="corte/ok.png" /><?php }?><br />
										            <input name="impuesto_vehiculo_ant" type="hidden" value="<?php echo $this->documentos->impuesto_vehiculo; ?>" />
										        <?php } else {?>
										            <a class="enlace1" href="/images/<?php echo $this->documentos->impuesto_vehiculo; ?>" target="_blank"><?php echo $this->documentos->impuesto_vehiculo; ?></a><br />
										        <?php }?>
										    </div>
										</div>
									<?php }?>
									<?php if($this->linea->soat==1){ ?>
										<div class="col-12 fondo-gris3">
											<div class="row">
										        <div align="left" class=" col-lg-6 enlinea">SOAT vigente del vehiculo</div>
										        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
										            <input name="soat"  required type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos->soat==""){ echo ''; } ?> /> <?php if($this->documentos->soat!=""){ ?><img src="corte/ok.png" /><?php }?><br />
										            <input name="soat_ant" type="hidden" value="<?php echo $this->documentos->soat; ?>" />
										        <?php } else {?>
										            <a class="enlace1" href="/images/<?php echo $this->documentos->soat; ?>" target="_blank"><?php echo $this->documentos->soat; ?></a><br />
										        <?php }?>
										    </div>
										</div>
									<?php }?>
									<?php if($this->linea->evidencia_calamidad==1){ ?>
										<div class="col-12 fondo-gris3">
											<div class="row">
										        <div align="left" class=" col-lg-6 enlinea">Evidencia de la calamidad</div>
										        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
										            <input name="evidencia_calamidad" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos->evidencia_calamidad==""){ echo ''; } ?> required /> <?php if($this->documentos->evidencia_calamidad!=""){ ?><img src="corte/ok.png" /><?php }?><br />
										            <input name="evidencia_calamidad_ant" type="hidden" value="<?php echo $this->documentos->evidencia_calamidad; ?>" />
										        <?php } else {?>
										            <a class="enlace1" href="/images/<?php echo $this->documentos->evidencia_calamidad; ?>" target="_blank"><?php echo $this->documentos->evidencia_calamidad; ?></a><br />
										        <?php }?>
										    </div>
										</div>
								    <?php }?>
							<?php if($this->linea->archivo1==1){ ?>
								<div class="col-12 fondo-gris3">
									<div class="row">
									    <div align="left" class="col-lg-6">Cédula </div>
									    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									   		<input name="cedula" id="cedula" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos->cedula=="" or $this->documentos->cedula=="0"){ echo 'required'; } ?> /> <?php if($this->documentos->cedula!="" and $this->documentos->cedula!="0"){ ?><img src="corte/ok.png" /><?php }?><br />
											<input name="cedula_ant" type="hidden" value="<?php echo $this->documentos->cedula; ?>" />
										<?php } else {?>
									    	<a class="enlace1" href="/images/<?php echo $this->documentos->cedula; ?>" target="_blank"><?php echo $this->documentos->cedula; ?></a><br />
									    <?php }?>
									</div>
								</div>
							<?php }?>

							<?php if($this->linea->archivo2==1){ ?>
								<div class="col-12 fondo-gris3">
									<div class="row">
									    <div align="left" class="col-lg-6">Desprendible(s) de Pago</div>

									    <?php if($this->linea->archivo2==1){ ?>
									    	<div class="col-lg-6">
									    		<div class="row">
											    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
											    	<div class="col-1 margin5 text-right d-none">1.</div><div class="col-7" style="padding: 0;"><input name="desprendible_pago" id="desprendible_pago" type="file" class="file-document1" accept="image/*, application/pdf" <?php if($this->documentos->desprendible_pago=="" or 1==1){ echo 'required'; } ?> /> <?php if($this->documentos->desprendible_pago!="" and 1==0){ ?><img src="corte/ok.png" /><?php }?><br />
													<input name="desprendible_pago_ant" type="hidden" value="<?php echo $this->documentos->desprendible_pago; ?>" />
											    	</div>
												<?php } else {?>
											    	<a class="enlace1" href="/images/<?php echo $this->documentos->desprendible_pago; ?>" target="_blank"><?php echo $this->documentos->desprendible_pago; ?></a><br />
											    <?php }?>

												</div>
											</div>
										<?php } ?>


										<?php for($i=2;$i<=5;$i++){ ?>
								    		<div class="col-lg-6 offset-lg-6" id="div_desprendible_pago<?php echo $i; ?>" <?php if($_GET['mod']!="detalle_solicitud"){ echo 'style="display:none;"'; } ?>>
								    			<div class="row">
												    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
												    	<div class="col-1 margin5 text-right d-none">2.</div><div class="col-7" style="padding: 0;"><input name="desprendible_pago<?php echo $i; ?>" id="desprendible_pago<?php echo $i; ?>" type="file" class="file-document1" accept="image/*, application/pdf" <?php if($this->documentos->{'desprendible_pago'.$i}=="" and $i<=3 and 1==0){ echo 'required'; } ?> /> <?php if($this->documentos->{'desprendible_pago'.$i}!="" and 1==0){ ?><img src="corte/ok.png" /><?php }?><br />
														<input name="desprendible_pago<?php echo $i; ?>_ant" type="hidden" value="<?php echo $this->documentos->{'desprendible_pago'.$i}; ?>" />
														</div>
													<?php } else {?>
												    	<a class="enlace1" href="/images/<?php echo $this->documentos->{'desprendible_pago'.$i}; ?>" target="_blank"><?php echo $this->documentos->{'desprendible_pago'.$i}; ?></a><br />
												    <?php }?>
											    </div>
											</div>
										<?php } ?>
									</div>
								</div>
							<?php }?>


							<?php if($this->linea->archivo1==1){ ?>
								<div class="col-12 fondo-gris3">
									<div class="row">
									    <div align="left" class="col-lg-6">Formulario de Seguro Obligatorio</div>
									    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									   		<input name="formulario_seguro" id="formulario_seguro" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos->formulario_seguro=="" or $this->documentos->formulario_seguro=="0"){ echo 'required'; } ?> /> <?php if($this->documentos->formulario_seguro!="" and $this->documentos->formulario_seguro!="0"){ ?><img src="corte/ok.png" /><?php }?><br />
											<input name="formulario_seguro_ant" type="hidden" value="<?php echo $this->documentos->formulario_seguro; ?>" />
										<?php } else {?>
									    	<a class="enlace1" href="/images/<?php echo $this->documentos->formulario_seguro; ?>" target="_blank"><?php echo $this->documentos->formulario_seguro; ?></a><br />
									    <?php }?>
									</div>
								</div>
							<?php } ?>

							<?php if($this->linea->archivo3==1){ ?>
								<div class="col-12 fondo-gris3">
									<div class="row">
									    <div align="left" class="col-lg-6">Certificado laboral </div>
									    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									    	<input name="certificado_laboral" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos->certificado_laboral=="" or $this->documentos->certificado_laboral=="0"){ echo 'required'; } ?> /> <?php if($this->documentos->certificado_laboral!="" and $this->documentos->certificado_laboral!="0"){ ?><img src="corte/ok.png" /><?php }?><br />
											<input name="certificado_laboral_ant" type="hidden" value="<?php echo $this->documentos->certificado_laboral; ?>" />
										<?php } else {?>
									    	<a class="enlace1" href="/images/<?php echo $this->documentos->certificado_laboral; ?>" target="_blank"><?php echo $this->documentos->certificado_laboral; ?></a><br />
									    <?php }?>
							   	</div>
							</div>
							<?php }?>

							<?php if($this->linea->archivo4==1){ ?>
								<div class="col-12 fondo-gris3">
									<div class="row">
								    	<div align="left" class="col-lg-6">Otros documentos </div>
									    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									    	<input name="otros_ingresos" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos->otros_ingresos==""){ echo ''; } ?> /> <?php if($this->documentos->otros_ingresos!=""){ ?><img src="corte/ok.png" /><?php }?><br />
											<input name="otros_ingresos_ant" type="hidden" value="<?php echo $this->documentos->otros_ingresos; ?>" />
										<?php } else {?>
									    	<a class="enlace1" href="/images/<?php echo $this->documentos->otros_ingresos; ?>" target="_blank"><?php echo $this->documentos->otros_ingresos; ?></a><br />
									    <?php }?>
									</div>
								</div>
							<?php }?>

							<?php if($this->linea->certificado_tradicion==1 and ($this->solicitud->destino=="VIVIENDA USADA" or $this->solicitud->destino=="MEJORA VIVIENDA" or $this->solicitud->tipo_garantia=="GARANTIA PERSONAL") ){ ?>
								<div class="col-12 fondo-gris3">
									<div class="row">
									    <div align="left" class="col-lg-6">Certificado de Tradición y Libertad </div>
									    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									    	<input name="certificado_tradicion" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos->certificado_tradicion==""){ echo 'required'; } ?> /> <?php if($this->documentos->certificado_tradicion!="" and $this->documentos->certificado_tradicion!="0"){ ?><img src="corte/ok.png" /><?php }?><br />
											<input name="certificado_tradicion_ant" type="hidden" value="<?php echo $this->documentos->certificado_tradicion; ?>" />
										<?php } else {?>
									    	<a class="enlace1" href="/images/<?php echo $this->documentos->certificado_tradicion; ?>" target="_blank"><?php echo $this->documentos->certificado_tradicion; ?></a><br />
									    <?php }?>
									</div>
								</div>
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
								<div class="col-12 fondo-gris3">
									<div class="row">
									    <div align="left" class="col-lg-6"><?php echo $titulo ?> </div>
									    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									    	<input name="contrato_vivienda" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos->contrato_vivienda==""){ echo 'required'; } ?> /> <?php if($this->documentos->contrato_vivienda!=""){ ?><img src="corte/ok.png" /><?php }?><br />
											<input name="contrato_vivienda_ant" type="hidden" value="<?php echo $this->documentos->contrato_vivienda; ?>" />
										<?php } else {?>
									    	<a class="enlace1" href="/images/<?php echo $this->documentos->contrato_vivienda; ?>" target="_blank"><?php echo $this->documentos->contrato_vivienda; ?></a><br />
									    <?php }?>
									</div>
								</div>
							<?php }?>

							<?php if($this->linea->estado_obligacion==1){ ?>
								<div class="col-12 fondo-gris3">
									<div class="row">
									    <div align="left" class="col-lg-6">Estado de Cuenta de la Obligación </div>
									    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									    	<input name="estado_obligacion" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos->certificado_tradicion==""){ echo 'required'; } ?> /> <?php if($this->documentos->estado_obligacion2!=""){ ?><img src="corte/ok.png" /><?php }?><br />
											<input name="estado_obligacion_ant" type="hidden" value="<?php echo $this->documentos->estado_obligacion; ?>" />
										<?php } else {?>
									    	<a class="enlace1" href="/images/<?php echo $this->documentos->estado_obligacion; ?>" target="_blank"><?php echo $this->documentos->estado_obligacion; ?></a><br />
									    <?php }?>
									</div>
								</div>
							<?php }?>

							<?php if($this->linea->estado_obligacion2==1){ ?>
								<div class="col-12 fondo-gris3">
									<div class="row">
									    <div align="left" class="col-lg-6">Estado de Cuenta de la Obligación </div>
									    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									    	<input name="estado_obligacion2" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos->estado_obligacion2==""){ echo 'required'; } ?> /> <?php if($this->documentos->estado_obligacion2!=""){ ?><img src="corte/ok.png" /><?php }?><br />
											<input name="estado_obligacion2_ant" type="hidden" value="<?php echo $this->documentos->estado_obligacion2; ?>" />
										<?php } else {?>
									    	<a class="enlace1" href="/images/<?php echo $this->documentos->estado_obligacion2; ?>" target="_blank"><?php echo $this->documentos->estado_obligacion2; ?></a><br />
									    <?php }?>
									</div>
								</div>
							<?php }?>

							<?php if($this->linea->estado_obligacion3==1){ ?>
								<div class="col-12 fondo-gris3">
									<div class="row">
									    <div align="left" class="col-lg-6">Estado de Cuenta de la Obligación </div>
									    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									    	<input name="estado_obligacion3" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos->estado_obligacion3==""){ echo 'required'; } ?> /> <?php if($this->documentos->estado_obligacion3!=""){ ?><img src="corte/ok.png" /><?php }?><br />
											<input name="estado_obligacion3_ant" type="hidden" value="<?php echo $this->documentos->estado_obligacion3; ?>" />
										<?php } else {?>
									    	<a class="enlace1" href="/images/<?php echo $this->documentos->estado_obligacion3; ?>" target="_blank"><?php echo $this->documentos->estado_obligacion3; ?></a><br />
									    <?php }?>
							    	</div>
							    </div>
							<?php }?>

							<?php if($this->linea->factura_proforma==1){ ?>
								<div class="col-12 fondo-gris3">
									<div class="row">
									    <div align="left" class="col-lg-6">Factura Proforma </div>
									    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									    	<input name="factura_proforma" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos->factura_proforma==""){ echo ''; } ?> /> <?php if($this->documentos->factura_proforma!=""){ ?><img src="corte/ok.png" /><?php }?><br />
											<input name="factura_proforma_ant" type="hidden" value="<?php echo $this->documentos->factura_proforma; ?>" />
										<?php } else {?>
									    	<a class="enlace1" href="/images/<?php echo $this->documentos->factura_proforma; ?>" target="_blank"><?php echo $this->documentos->factura_proforma; ?></a><br />
									    <?php }?>
									</div>
								</div>
							<?php }?>

							<?php if($this->linea->recibo_matricula==1){ ?>
								<div class="col-12 fondo-gris3">
									<div class="row">
									    <div align="left" class="col-lg-6">Recibo Matricula </div>
									    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									    	<input name="recibo_matricula" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos->recibo_matricula==""){ echo 'required'; } ?> /> <?php if($this->documentos->recibo_matricula!=""){ ?><img src="corte/ok.png" /><?php }?><br />
											<input name="recibo_matricula_ant" type="hidden" value="<?php echo $this->documentos->recibo_matricula; ?>" />
										<?php } else {?>
									    	<a class="enlace1" href="/images/<?php echo $this->documentos->recibo_matricula; ?>" target="_blank"><?php echo $this->documentos->recibo_matricula; ?></a><br />
									    <?php }?>
									</div>
								</div>
							<?php }?>

							<?php if($this->solicitud->declara_renta=="Si" and $this->solicitud->linea!="12" and $this->solicitud->linea!="35"){ ?>
								<div class="col-12 fondo-gris3">
									<div class="row">
									    <div align="left" class="col-lg-6">Declaración de renta </div>
									    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									    	<input name="declaracion_renta" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos->declaracion_renta==""){ echo 'required'; } ?> /> <?php if($this->documentos->declaracion_renta!="" and $this->documentos->declaracion_renta!="0"){ ?><img src="corte/ok.png" /><?php }?><br />
											<input name="declaracion_renta_ant" type="hidden" value="<?php echo $this->documentos->declaracion_renta; ?>" />
										<?php } else {?>
									    	<a class="enlace1" href="/images/<?php echo $this->documentos->declaracion_renta; ?>" target="_blank"><?php echo $this->documentos->declaracion_renta; ?></a><br />
									    <?php }?>
									</div>
								</div>
							<?php }?>
						<?php }?>


							<?php if($this->solicitud->tipo_garantia=="2" and ($_GET['e']!="" or $_GET['mod']=="detalle_solicitud")){ ?>
								<div class="col-12"><br><br></div>
								<?php if($_GET['mod']=="detalle_solicitud"){ ?>
									<?php if($_SESSION['kt_login_level']=="1" or $_SESSION['kt_login_level']=="3"){ ?>
										<div class="text-right col-12"><a class="btn btn-primary btn-sm" href="/administracion/editardocumentos/manage/?id=<?php echo $this->documentos2->id; ?>&solicitud=<?php echo $this->documentos2->solicitud; ?>&tipo=<?php echo $this->documentos2->tipo; ?>" target="_top">Editar documentos codeudor</a><br><br></div>
									<?php } ?>
								<?php } ?>
								<div class="fondo-gris2 col-12 text-left"><strong>Codeudor</strong></div>

								<?php if($this->linea->archivo1==1){ ?>
									<div class="col-12 fondo-gris3">
										<div class="row">
									        <div align="left" class=" col-lg-6 enlinea">Cédula </div>
									        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									            <input name="cedula2" id="cedula2" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos2->cedula==""){ echo 'required'; } ?> /> <?php if($this->documentos2->cedula!=""){ ?><img src="corte/ok.png" /><?php }?>		<br />
									            <input name="cedula2_ant" type="hidden" value="<?php echo $this->documentos2->cedula; ?>" />
									        <?php } else {?>
									            <a class="enlace1" href="/images/<?php echo $this->documentos2->cedula; ?>" target="_blank"><?php echo $this->documentos2->cedula; ?></a><br />
									        <?php }?>
									    </div>
									</div>
							    <?php }?>

								<?php if($this->linea->archivo2==1 or $this->linea->archivo22==1 or $this->linea->archivo23==1 or $this->linea->archivo24==1){ ?>
									<div class="col-12 fondo-gris3">
										<div class="row">
										    <div align="left" class="col-lg-6">Desprendible(s) de Pago</div>
										    <?php if($this->linea->archivo2==1){ ?>
										    	<div class="col-lg-6">
										    		<div class="row">
												    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
												    	<div class="col-1 margin5 text-right d-none">1.</div><div class="col-7" style="padding: 0px;"><input name="desprendible_pagoB" id="desprendible_pagoB" type="file" class="file-document1" accept="image/*, application/pdf" <?php if($this->documentos2->desprendible_pago=="" or 1==1){ echo 'required'; } ?> /> <?php if($this->documentos2->desprendible_pago!="" and 1==0){ ?><img src="corte/ok.png" /><?php }?><br />
														<input name="desprendible_pagoB_ant" type="hidden" value="<?php echo $this->documentos2->desprendible_pago; ?>" />
												    	</div>
													<?php } else {?>
												    	<a class="enlace1" href="/images/<?php echo $this->documentos2->desprendible_pago; ?>" target="_blank"><?php echo $this->documentos2->desprendible_pago; ?></a><br />
												    <?php }?>

													</div>
												</div>
											<?php } ?>

											<?php for($i=2;$i<=5;$i++){ ?>
									    		<div class="col-lg-6 offset-lg-6" id="div_desprendible_pagoB<?php echo $i; ?>" <?php if($_GET['mod']!="detalle_solicitud"){ echo 'style="display:none;"'; } ?>>
									    			<div class="row">
													    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
													    	<div class="col-1 margin5 text-right d-none">2.</div><div class="col-7" style="padding: 0px;"><input name="desprendible_pagoB<?php echo $i; ?>" id="desprendible_pagoB<?php echo $i; ?>" type="file" class="file-document1" accept="image/*, application/pdf" <?php if($this->documentos2->{'desprendible_pagoB'.$i}=="" and $i<=3 and 1==0){ echo 'required'; } ?> /> <?php if($this->documentos2->{'desprendible_pagoB'.$i}!="" and 1==0){ ?><img src="corte/ok.png" /><?php }?><br />
															<input name="desprendible_pagoB<?php echo $i; ?>_ant" type="hidden" value="<?php echo $this->documentos2->{'desprendible_pagoB'.$i}; ?>" />
															</div>
														<?php } else {?>
													    	<a class="enlace1" href="/images/<?php echo $this->documentos2->{'desprendible_pagoB'.$i}; ?>" target="_blank"><?php echo $this->documentos2->{'desprendible_pagoB'.$i}; ?></a><br />
													    <?php }?>
												    </div>
												</div>
											<?php } ?>

										</div>
									</div>
								<?php }?>



							    <?php if($this->linea->archivo3==1){ ?>
									<div class="col-12 fondo-gris3">
										<div class="row">
									        <div align="left" class=" col-lg-6 enlinea">Certificado laboral </div>
									        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									            <input name="certificado_laboral2" id="certificado_laboral2" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos2->certificado_laboral==""){ echo 'required'; } ?> /> <?php if($this->documentos2->certificado_laboral!=""){ ?><img src="corte/ok.png" /><?php }?><br />
									            <input name="certificado_laboral2_ant" type="hidden" value="<?php echo $this->documentos2->certificado_laboral; ?>" />
									        <?php } else {?>
									            <a class="enlace1" href="/images/<?php echo $this->documentos2->certificado_laboral; ?>" target="_blank"><?php echo $this->documentos2->certificado_laboral; ?></a><br />
									        <?php }?>
									    </div>
									</div>
							    <?php }?>

							    <?php if($this->linea->archivo4==1){ ?>
									<div class="col-12 fondo-gris3">
										<div class="row">
									        <div align="left" class=" col-lg-6 enlinea">Certificado otros ingresos </div>
									        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									            <input name="otros_ingresos2" id="otros_ingresos2" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos2->otros_ingresos==""){ echo ''; } ?> /> <?php if($this->documentos2->otros_ingresos!=""){ ?><img src="corte/ok.png" /><?php }?><br />
									            <input name="otros_ingresos2_ant" type="hidden" value="<?php echo $this->documentos2->otros_ingresos; ?>" />
									        <?php } else {?>
									            <a class="enlace1" href="/images/<?php echo $this->documentos2->otros_ingresos; ?>" target="_blank"><?php echo $this->documentos2->otros_ingresos; ?></a><br />
									        <?php }?>
									    </div>
									</div>
							    <?php }?>


								<?php if($this->linea->certificado_tradicion==1){ ?>
									<div class="col-12 fondo-gris3">
										<div class="row">
										    <div align="left" class=" col-lg-6 enlinea">Certificado de Tradición y Libertad </div>
										    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
										    	<input name="certificado_tradicionB" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos2->certificado_tradicion==""){ echo 'required'; } ?> /> <?php if($this->documentos2->certificado_tradicion!=""){ ?><img src="corte/ok.png" /><?php }?><br />
												<input name="certificado_tradicionB_ant" type="hidden" value="<?php echo $this->documentos2->certificado_tradicion; ?>" />
											<?php } else {?>
										    	<a class="enlace1" href="/images/<?php echo $this->documentos2->certificado_tradicion; ?>" target="_blank"><?php echo $this->documentos2->certificado_tradicion; ?></a><br />
										    <?php }?>
										</div>
									</div>
								<?php }?>

								<?php if($this->linea->estado_obligacion==1 and 1==0){ ?>
									<div class="col-12 fondo-gris3">
										<div class="row">
									        <div align="left" class=" col-lg-6 enlinea">Estado de Cuenta de la Obligación </div>
									        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									            <input name="estado_obligacionB" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos2->certificado_tradicion==""){ echo 'required'; } ?> /> <?php if($this->documentos2->estado_obligacion2!=""){ ?><img src="corte/ok.png" /><?php }?><br />
									            <input name="estado_obligacionB_ant" type="hidden" value="<?php echo $this->documentos2->estado_obligacion; ?>" />
									        <?php } else {?>
									            <a class="enlace1" href="/images/<?php echo $this->documentos2->estado_obligacion; ?>" target="_blank"><?php echo $this->documentos2->estado_obligacion; ?></a><br />
									        <?php }?>
									    </div>
									</div>
							    <?php }?>

							    <?php if($this->linea->estado_obligacion2==1 and 1==0){ ?>
									<div class="col-12 fondo-gris3">
										<div class="row">
									        <div align="left" class=" col-lg-6 enlinea">Estado de Cuenta de la Obligación </div>
									        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									            <input name="estado_obligacion2B" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos2->estado_obligacion2==""){ echo 'required'; } ?> /> <?php if($this->documentos2->estado_obligacion2!=""){ ?><img src="corte/ok.png" /><?php }?><br />
									            <input name="estado_obligacion2B_ant" type="hidden" value="<?php echo $this->documentos2->estado_obligacion2; ?>" />
									        <?php } else {?>
									            <a class="enlace1" href="/images/<?php echo $this->documentos2->estado_obligacion2; ?>" target="_blank"><?php echo $this->documentos2->estado_obligacion2; ?></a><br />
									        <?php }?>
									    </div>
									</div>
							    <?php }?>

							    <?php if($this->linea->estado_obligacion3==1 and 1==0){ ?>
									<div class="col-12 fondo-gris3">
										<div class="row">
									        <div align="left" class=" col-lg-6 enlinea">Estado de Cuenta de la Obligación </div>
									        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									            <input name="estado_obligacion3B" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos2->estado_obligacion3==""){ echo 'required'; } ?> /> <?php if($this->documentos2->estado_obligacion3!=""){ ?><img src="corte/ok.png" /><?php }?><br />
									            <input name="estado_obligacion3B_ant" type="hidden" value="<?php echo $this->documentos2->estado_obligacion3; ?>" />
									        <?php } else {?>
									            <a class="enlace1" href="/images/<?php echo $this->documentos2->estado_obligacion3; ?>" target="_blank"><?php echo $this->documentos2->estado_obligacion3; ?></a><br />
									        <?php }?>
									    </div>
									</div>
							    <?php }?>

							    <?php if($this->linea->factura_proforma==1 and 1==0){ ?>
									<div class="col-12 fondo-gris3">
										<div class="row">
									        <div align="left" class=" col-lg-6 enlinea">Factura Proforma </div>
									        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									            <input name="factura_proformaB" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos2->factura_proforma==""){ echo 'required'; } ?> /> <?php if($this->documentos2->factura_proforma!=""){ ?><img src="corte/ok.png" /><?php }?><br />
									            <input name="factura_proformaB_ant" type="hidden" value="<?php echo $this->documentos2->factura_proforma; ?>" />
									        <?php } else {?>
									            <a class="enlace1" href="/images/<?php echo $this->documentos2->factura_proforma; ?>" target="_blank"><?php echo $this->documentos2->factura_proforma; ?></a><br />
									        <?php }?>
									    </div>
									</div>
							    <?php }?>

							    <?php if($this->linea->recibo_matricula==1 and 1==0){ ?>
									<div class="col-12 fondo-gris3">
										<div class="row">
									        <div align="left" class=" col-lg-6 enlinea">Recibo Matricula </div>
									        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									            <input name="recibo_matriculaB" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos2->recibo_matricula==""){ echo ''; } ?> /> <?php if($this->documentos2->recibo_matricula!=""){ ?><img src="corte/ok.png" /><?php }?><br />
									            <input name="recibo_matriculaB_ant" type="hidden" value="<?php echo $this->documentos2->recibo_matricula; ?>" />
									        <?php } else {?>
									            <a class="enlace1" href="/images/<?php echo $this->documentos2->recibo_matricula; ?>" target="_blank"><?php echo $this->documentos2->recibo_matricula; ?></a><br />
									        <?php }?>
									    </div>
									</div>
							    <?php }?>


							    <!--codeudor2-->
							    <?php if($_GET['mod']=="detalle_solicitud" and $_GET['n']=="" and $this->documentos3->cedula!=""){ ?>
									<div class="col-12"><br><br></div>
									<?php if($_GET['mod']=="detalle_solicitud"){ ?>
										<?php if($_SESSION['kt_login_level']=="1" or $_SESSION['kt_login_level']=="3"){ ?>
											<div class="text-right col-12"><a class="btn btn-primary btn-sm" href="/administracion/editardocumentos/manage/?id=<?php echo $this->documentos3->id; ?>&solicitud=<?php echo $this->documentos3->solicitud; ?>&tipo=<?php echo $this->documentos3->tipo; ?>" target="_top">Editar documentos codeudor2</a><br><br></div>
										<?php } ?>
									<?php } ?>
									<div class="fondo-gris2 col-12 text-left"><strong>Codeudor2</strong></div>

									<?php if($this->linea->archivo1==1){ ?>
										<div class="col-12 fondo-gris3">
											<div class="row">
										        <div align="left" class=" col-lg-6 enlinea">Cédula </div>
										        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
										            <input name="cedula2" id="cedula2" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos3->cedula==""){ echo 'required'; } ?> /> <?php if($this->documentos3->cedula!=""){ ?><img src="corte/ok.png" /><?php }?>		<br />
										            <input name="cedula2_ant" type="hidden" value="<?php echo $this->documentos3->cedula; ?>" />
										        <?php } else {?>
										            <a class="enlace1" href="/images/<?php echo $this->documentos3->cedula; ?>" target="_blank"><?php echo $this->documentos3->cedula; ?></a><br />
										        <?php }?>
										    </div>
										</div>
								    <?php }?>

									<?php if($this->linea->archivo2==1 or $this->linea->archivo22==1 or $this->linea->archivo23==1 or $this->linea->archivo24==1){ ?>
										<div class="col-12 fondo-gris3">
											<div class="row">
											    <div align="left" class="col-lg-6">Desprendible(s) de Pago</div>
											    <?php if($this->linea->archivo2==1){ ?>
											    	<div class="col-lg-6">
											    		<div class="row">
													    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
													    	<div class="col-1 margin5 text-right d-none">1.</div><div class="col-7" style="padding: 0;"><input name="desprendible_pagoB" id="desprendible_pagoB" type="file" class="file-document1" accept="image/*, application/pdf" <?php if($this->documentos3->desprendible_pago=="" or 1==1){ echo 'required'; } ?> /> <?php if($this->documentos3->desprendible_pago!="" and 1==0){ ?><img src="corte/ok.png" /><?php }?><br />
															<input name="desprendible_pagoB_ant" type="hidden" value="<?php echo $this->documentos3->desprendible_pago; ?>" />
													    	</div>
														<?php } else {?>
													    	<a class="enlace1" href="/images/<?php echo $this->documentos3->desprendible_pago; ?>" target="_blank"><?php echo $this->documentos3->desprendible_pago; ?></a><br />
													    <?php }?>

														</div>
													</div>
												<?php } ?>

												<?php for($i=2;$i<=5;$i++){ ?>
										    		<div class="col-lg-6 offset-lg-6" id="div_desprendible_pagoB<?php echo $i; ?>" <?php if($_GET['mod']!="detalle_solicitud"){ echo 'style="display:none;"'; } ?>>
										    			<div class="row">
														    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
														    	<div class="col-1 margin5 text-right d-none">2.</div><div class="col-7" style="padding: 0;"><input name="desprendible_pagoB<?php echo $i; ?>" id="desprendible_pagoB<?php echo $i; ?>" type="file" class="file-document1" accept="image/*, application/pdf" <?php if($this->documentos3->{'desprendible_pagoB'.$i}=="" and $i<=3 and 1==0){ echo 'required'; } ?> /> <?php if($this->documentos3->{'desprendible_pagoB'.$i}!="" and 1==0){ ?><img src="corte/ok.png" /><?php }?><br />
																<input name="desprendible_pagoB<?php echo $i; ?>_ant" type="hidden" value="<?php echo $this->documentos3->{'desprendible_pagoB'.$i}; ?>" />
																</div>
															<?php } else {?>
														    	<a class="enlace1" href="/images/<?php echo $this->documentos3->{'desprendible_pagoB'.$i}; ?>" target="_blank"><?php echo $this->documentos3->{'desprendible_pagoB'.$i}; ?></a><br />
														    <?php }?>
													    </div>
													</div>
												<?php } ?>

											</div>
										</div>
									<?php }?>



								    <?php if($this->linea->archivo3==1){ ?>
										<div class="col-12 fondo-gris3">
											<div class="row">
										        <div align="left" class=" col-lg-6 enlinea">Certificado laboral </div>
										        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
										            <input name="certificado_laboral2" id="certificado_laboral2" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos3->certificado_laboral==""){ echo 'required'; } ?> /> <?php if($this->documentos3->certificado_laboral!=""){ ?><img src="corte/ok.png" /><?php }?><br />
										            <input name="certificado_laboral2_ant" type="hidden" value="<?php echo $this->documentos3->certificado_laboral; ?>" />
										        <?php } else {?>
										            <a class="enlace1" href="/images/<?php echo $this->documentos3->certificado_laboral; ?>" target="_blank"><?php echo $this->documentos3->certificado_laboral; ?></a><br />
										        <?php }?>
										    </div>
										</div>
								    <?php }?>

								    <?php if($this->linea->archivo4==1){ ?>
										<div class="col-12 fondo-gris3">
											<div class="row">
										        <div align="left" class=" col-lg-6 enlinea">Certificado otros ingresos </div>
										        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
										            <input name="otros_ingresos2" id="otros_ingresos2" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos3->otros_ingresos==""){ echo ''; } ?> /> <?php if($this->documentos3->otros_ingresos!=""){ ?><img src="corte/ok.png" /><?php }?><br />
										            <input name="otros_ingresos2_ant" type="hidden" value="<?php echo $this->documentos3->otros_ingresos; ?>" />
										        <?php } else {?>
										            <a class="enlace1" href="/images/<?php echo $this->documentos3->otros_ingresos; ?>" target="_blank"><?php echo $this->documentos3->otros_ingresos; ?></a><br />
										        <?php }?>
										    </div>
										</div>
								    <?php }?>


									<?php if($this->linea->certificado_tradicion==1){ ?>
										<div class="col-12 fondo-gris3">
											<div class="row">
											    <div align="left" class=" col-lg-6 enlinea">Certificado de Tradición y Libertad </div>
											    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
											    	<input name="certificado_tradicionB" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos3->certificado_tradicion==""){ echo 'required'; } ?> /> <?php if($this->documentos3->certificado_tradicion!=""){ ?><img src="corte/ok.png" /><?php }?><br />
													<input name="certificado_tradicionB_ant" type="hidden" value="<?php echo $this->documentos3->certificado_tradicion; ?>" />
												<?php } else {?>
											    	<a class="enlace1" href="/images/<?php echo $this->documentos3->certificado_tradicion; ?>" target="_blank"><?php echo $this->documentos3->certificado_tradicion; ?></a><br />
											    <?php }?>
											</div>
										</div>
									<?php }?>

									<?php if($this->linea->estado_obligacion==1 and 1==0){ ?>
										<div class="col-12 fondo-gris3">
											<div class="row">
										        <div align="left" class=" col-lg-6 enlinea">Estado de Cuenta de la Obligación </div>
										        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
										            <input name="estado_obligacionB" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos3->certificado_tradicion==""){ echo 'required'; } ?> /> <?php if($this->documentos3->estado_obligacion2!=""){ ?><img src="corte/ok.png" /><?php }?><br />
										            <input name="estado_obligacionB_ant" type="hidden" value="<?php echo $this->documentos3->estado_obligacion; ?>" />
										        <?php } else {?>
										            <a class="enlace1" href="/images/<?php echo $this->documentos3->estado_obligacion; ?>" target="_blank"><?php echo $this->documentos3->estado_obligacion; ?></a><br />
										        <?php }?>
										    </div>
										</div>
								    <?php }?>

								    <?php if($this->linea->estado_obligacion2==1 and 1==0){ ?>
										<div class="col-12 fondo-gris3">
											<div class="row">
										        <div align="left" class=" col-lg-6 enlinea">Estado de Cuenta de la Obligación </div>
										        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
										            <input name="estado_obligacion2B" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos3->estado_obligacion2==""){ echo 'required'; } ?> /> <?php if($this->documentos3->estado_obligacion2!=""){ ?><img src="corte/ok.png" /><?php }?><br />
										            <input name="estado_obligacion2B_ant" type="hidden" value="<?php echo $this->documentos3->estado_obligacion2; ?>" />
										        <?php } else {?>
										            <a class="enlace1" href="/images/<?php echo $this->documentos3->estado_obligacion2; ?>" target="_blank"><?php echo $this->documentos3->estado_obligacion2; ?></a><br />
										        <?php }?>
										    </div>
										</div>
								    <?php }?>

								    <?php if($this->linea->estado_obligacion3==1 and 1==0){ ?>
										<div class="col-12 fondo-gris3">
											<div class="row">
										        <div align="left" class=" col-lg-6 enlinea">Estado de Cuenta de la Obligación </div>
										        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
										            <input name="estado_obligacion3B" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos3->estado_obligacion3==""){ echo 'required'; } ?> /> <?php if($this->documentos3->estado_obligacion3!=""){ ?><img src="corte/ok.png" /><?php }?><br />
										            <input name="estado_obligacion3B_ant" type="hidden" value="<?php echo $this->documentos3->estado_obligacion3; ?>" />
										        <?php } else {?>
										            <a class="enlace1" href="/images/<?php echo $this->documentos3->estado_obligacion3; ?>" target="_blank"><?php echo $this->documentos3->estado_obligacion3; ?></a><br />
										        <?php }?>
										    </div>
										</div>
								    <?php }?>

								    <?php if($this->linea->factura_proforma==1 and 1==0){ ?>
										<div class="col-12 fondo-gris3">
											<div class="row">
										        <div align="left" class=" col-lg-6 enlinea">Factura Proforma </div>
										        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
										            <input name="factura_proformaB" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos3->factura_proforma==""){ echo 'required'; } ?> /> <?php if($this->documentos3->factura_proforma!=""){ ?><img src="corte/ok.png" /><?php }?><br />
										            <input name="factura_proformaB_ant" type="hidden" value="<?php echo $this->documentos3->factura_proforma; ?>" />
										        <?php } else {?>
										            <a class="enlace1" href="/images/<?php echo $this->documentos3->factura_proforma; ?>" target="_blank"><?php echo $this->documentos3->factura_proforma; ?></a><br />
										        <?php }?>
										    </div>
										</div>
								    <?php }?>

								    <?php if($this->linea->recibo_matricula==1 and 1==0){ ?>
										<div class="col-12 fondo-gris3">
											<div class="row">
										        <div align="left" class=" col-lg-6 enlinea">Recibo Matricula </div>
										        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
										            <input name="recibo_matriculaB" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos3->recibo_matricula==""){ echo ''; } ?> /> <?php if($this->documentos3->recibo_matricula!=""){ ?><img src="corte/ok.png" /><?php }?><br />
										            <input name="recibo_matriculaB_ant" type="hidden" value="<?php echo $this->documentos3->recibo_matricula; ?>" />
										        <?php } else {?>
										            <a class="enlace1" href="/images/<?php echo $this->documentos3->recibo_matricula; ?>" target="_blank"><?php echo $this->documentos3->recibo_matricula; ?></a><br />
										        <?php }?>
										    </div>
										</div>
									<?php }?>
						
									
							    <?php }?>

							<?php }?>



					</div>

				</div>
			</div>


	</div>
</div>



</div>

<script type="text/javascript">
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