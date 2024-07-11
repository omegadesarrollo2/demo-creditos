<?php //print_r($this->solicitud); ?>

<div class="container">
	<div class="row">

			<div class="col-12">
				<div class="row form-group">

					<div class="col-md-12 col-lg-12">

						<div class="row  text-center">
							<div class="col-12 titulo-seccion">Anexos documentales</div><br><br>

						<?php if($_GET['e']==""){ ?>
							<div align="left" class="col-12 fondo-gris2"><strong>Asociado</strong></div>

							<?php if($this->linea->archivo1==1){ ?>
								<div class="col-12 fondo-gris3">
									<div class="row">
									    <div align="left" class="col-lg-6">Cédula </div>
									    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									   		<input name="cedula" id="cedula" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos->cedula=="" or $this->documentos->cedula=="0"){ echo 'required'; } ?> /> <?php if($this->documentos->cedula!="" and $this->documentos->cedula!="0"){ ?><img src="corte/ok.png" /><?php }?><br />
											<input name="cedula_ant" type="hidden" value="<?php echo $this->documentos->cedula; ?>" />
										<?php } else {?>
									    	<a class="enlace1" href="documentos/<?php echo $this->documentos->cedula; ?>" target="_blank"><?php echo $this->documentos->cedula; ?></a><br />
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
											    	<div class="col-1 margin5 text-right">1.</div><div class="col-11"><input name="desprendible_pago" type="file" class="file-document1" accept="image/*, application/pdf" <?php if($this->documentos->desprendible_pago=="" or 1==1){ echo 'required'; } ?> /> <?php if($this->documentos->desprendible_pago!="" and 1==0){ ?><img src="corte/ok.png" /><?php }?><br />
													<input name="desprendible_pago_ant" type="hidden" value="<?php echo $this->documentos->desprendible_pago; ?>" />
											    	</div>
												<?php } else {?>
											    	<a class="enlace1" href="documentos/<?php echo $this->documentos->desprendible_pago; ?>" target="_blank"><?php echo $this->documentos->desprendible_pago; ?></a><br />
											    <?php }?>

												</div>
											</div>
										<?php } ?>
										<?php if($this->linea->archivo22==1){ ?>
								    		<div class="col-lg-6 offset-lg-6">
								    			<div class="row">
												    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
												    	<div class="col-1 margin5 text-right">2.</div><div class="col-11"><input name="desprendible_pago2" type="file" class="file-document1" accept="image/*, application/pdf" <?php if($this->documentos->desprendible_pago2=="" or 1==1){ echo 'required'; } ?> /> <?php if($this->documentos->desprendible_pago2!="" and 1==0){ ?><img src="corte/ok.png" /><?php }?><br />
														<input name="desprendible_pago2_ant" type="hidden" value="<?php echo $this->documentos->desprendible_pago2; ?>" />
														</div>
													<?php } else {?>
												    	<a class="enlace1" href="documentos/<?php echo $this->documentos->desprendible_pago2; ?>" target="_blank"><?php echo $this->documentos->desprendible_pago2; ?></a><br />
												    <?php }?>
											    </div>
											</div>
										<?php } ?>
										<?php if($this->linea->archivo23==1){ ?>
											<div class="col-lg-6 offset-lg-6">
												<div class="row">
												    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
												    	<div class="col-1 margin5 text-right">3.</div><div class="col-11"><input name="desprendible_pago2" type="file" class="file-document1" accept="image/*, application/pdf" <?php if($this->documentos->desprendible_pago2=="" or 1==1){ echo 'required'; } ?> /> <?php if($this->documentos->desprendible_pago2!="" and 1==0){ ?><img src="corte/ok.png" /><?php }?><br />
														<input name="desprendible_pago2_ant" type="hidden" value="<?php echo $this->documentos->desprendible_pago2; ?>" />
														</div>
													<?php } else {?>
												    	<a class="enlace1" href="documentos/<?php echo $this->documentos->desprendible_pago2; ?>" target="_blank"><?php echo $this->documentos->desprendible_pago2; ?></a><br />
												    <?php }?>

												</div>
											</div>
										<?php } ?>
										<?php if($this->linea->archivo24==1){ ?>
											<div class="col-lg-6 offset-lg-6">
												<div class="row">
												    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
												    	<div class="col-1 margin5 text-right">4.</div><div class="col-11"><input name="desprendible_pago4" type="file" class="file-document1" accept="image/*, application/pdf" <?php if($this->documentos->desprendible_pago4=="" or 1==1){ echo ''; } ?> /> <?php if($this->documentos->desprendible_pago4!="" and 1==0){ ?><img src="corte/ok.png" /><?php }?><br />
														<input name="desprendible_pago4_ant" type="hidden" value="<?php echo $this->documentos->desprendible_pago4; ?>" />
														</div>
													<?php } else {?>
												    	<a class="enlace1" href="documentos/<?php echo $this->documentos->desprendible_pago4; ?>" target="_blank"><?php echo $this->documentos->desprendible_pago4; ?></a><br />
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
									    <div align="left" class="col-lg-6">Certificado laboral </div>
									    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									    	<input name="certificado_laboral" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos->certificado_laboral=="" or $this->documentos->certificado_laboral=="0"){ echo 'required'; } ?> /> <?php if($this->documentos->certificado_laboral!="" and $this->documentos->certificado_laboral!="0"){ ?><img src="corte/ok.png" /><?php }?><br />
											<input name="certificado_laboral_ant" type="hidden" value="<?php echo $this->documentos->certificado_laboral; ?>" />
										<?php } else {?>
									    	<a class="enlace1" href="documentos/<?php echo $this->documentos->certificado_laboral; ?>" target="_blank"><?php echo $this->documentos->certificado_laboral; ?></a><br />
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
									    	<a class="enlace1" href="documentos/<?php echo $this->documentos->otros_ingresos; ?>" target="_blank"><?php echo $this->documentos->otros_ingresos; ?></a><br />
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
									    	<a class="enlace1" href="documentos/<?php echo $this->documentos->certificado_tradicion; ?>" target="_blank"><?php echo $this->documentos->certificado_tradicion; ?></a><br />
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
									    	<a class="enlace1" href="documentos/<?php echo $this->documentos->contrato_vivienda; ?>" target="_blank"><?php echo $this->documentos->contrato_vivienda; ?></a><br />
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
									    	<a class="enlace1" href="documentos/<?php echo $this->documentos->estado_obligacion; ?>" target="_blank"><?php echo $this->documentos->estado_obligacion; ?></a><br />
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
									    	<a class="enlace1" href="documentos/<?php echo $this->documentos->estado_obligacion2; ?>" target="_blank"><?php echo $this->documentos->estado_obligacion2; ?></a><br />
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
									    	<a class="enlace1" href="documentos/<?php echo $this->documentos->estado_obligacion3; ?>" target="_blank"><?php echo $this->documentos->estado_obligacion3; ?></a><br />
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
									    	<a class="enlace1" href="documentos/<?php echo $this->documentos->factura_proforma; ?>" target="_blank"><?php echo $this->documentos->factura_proforma; ?></a><br />
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
									    	<a class="enlace1" href="documentos/<?php echo $this->documentos->recibo_matricula; ?>" target="_blank"><?php echo $this->documentos->recibo_matricula; ?></a><br />
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
									    	<a class="enlace1" href="documentos/<?php echo $this->documentos->declaracion_renta; ?>" target="_blank"><?php echo $this->documentos->declaracion_renta; ?></a><br />
									    <?php }?>
									</div>
								</div>
							<?php }?>
						<?php }?>


							<?php if($this->solicitud->tipo_garantia=="2" and $_GET['e']!=""){ ?>
								<div class="col-12"><br><br></div>
								<div class="fondo-gris2 col-12 text-left"><strong>Deudor solidario</strong></div>

								<?php if($this->linea->archivo1==1){ ?>
									<div class="col-12 fondo-gris3">
										<div class="row">
									        <div align="left" class=" col-lg-6 enlinea">Cédula </div>
									        <?php if($_GET['mod']!="detalle_solicitud"){ ?>
									            <input name="cedula2" id="cedula2" type="file" class="col-lg-6 file-document1" accept="image/*, application/pdf" <?php if($this->documentos2->cedula==""){ echo 'required'; } ?> /> <?php if($this->documentos2->cedula!=""){ ?><img src="corte/ok.png" /><?php }?>		<br />
									            <input name="cedula2_ant" type="hidden" value="<?php echo $this->documentos2->cedula; ?>" />
									        <?php } else {?>
									            <a class="enlace1" href="documentos/<?php echo $this->documentos2->cedula; ?>" target="_blank"><?php echo $this->documentos2->cedula; ?></a><br />
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
												    	<div class="col-1 margin5 text-right">1.</div><div class="col-11"><input name="desprendible_pagoB" id="desprendible_pago2" type="file" class="file-document1" accept="image/*, application/pdf" <?php if($this->documentos2->desprendible_pago=="" or 1==1){ echo 'required'; } ?> /> <?php if($this->documentos2->desprendible_pago!="" and 1==0){ ?><img src="corte/ok.png" /><?php }?><br />
														<input name="desprendible_pagoB_ant" type="hidden" value="<?php echo $this->documentos2->desprendible_pago; ?>" />
												    	</div>
													<?php } else {?>
												    	<a class="enlace1" href="documentos/<?php echo $this->documentos2->desprendible_pago; ?>" target="_blank"><?php echo $this->documentos2->desprendible_pago; ?></a><br />
												    <?php }?>

													</div>
												</div>
											<?php } ?>
											<?php if($this->linea->archivo22==1){ ?>
									    		<div class="col-lg-6 offset-lg-6">
									    			<div class="row">
													    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
													    	<div class="col-1 margin5 text-right">2.</div><div class="col-11"><input name="desprendible_pagoB2" type="file" class="file-document1" accept="image/*, application/pdf" <?php if($this->documentos2->desprendible_pago2=="" or 1==1){ echo 'required'; } ?> /> <?php if($this->documentos2->desprendible_pago2!="" and 1==0){ ?><img src="corte/ok.png" /><?php }?><br />
															<input name="desprendible_pagoB2_ant" type="hidden" value="<?php echo $this->documentos2->desprendible_pago2; ?>" />
															</div>
														<?php } else {?>
													    	<a class="enlace1" href="documentos/<?php echo $this->documentos2->desprendible_pago2; ?>" target="_blank"><?php echo $this->documentos2->desprendible_pago2; ?></a><br />
													    <?php }?>
												    </div>
												</div>
											<?php } ?>
											<?php if($this->linea->archivo23==1){ ?>
												<div class="col-lg-6 offset-lg-6">
													<div class="row">
													    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
													    	<div class="col-1 margin5 text-right">3.</div><div class="col-11"><input name="desprendible_pagoB3" type="file" class="file-document1" accept="image/*, application/pdf" <?php if($this->documentos2->desprendible_pago2=="" or 1==1){ echo 'required'; } ?> /> <?php if($this->documentos2->desprendible_pago2!="" and 1==0){ ?><img src="corte/ok.png" /><?php }?><br />
															<input name="desprendible_pagoB3_ant" type="hidden" value="<?php echo $this->documentos2->desprendible_pago2; ?>" />
															</div>
														<?php } else {?>
													    	<a class="enlace1" href="documentos/<?php echo $this->documentos2->desprendible_pago2; ?>" target="_blank"><?php echo $this->documentos2->desprendible_pago2; ?></a><br />
													    <?php }?>

													</div>
												</div>
											<?php } ?>
											<?php if($this->linea->archivo24==1){ ?>
												<div class="col-lg-6 offset-lg-6">
													<div class="row">
													    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
													    	<div class="col-1 margin5 text-right">4.</div><div class="col-11"><input name="desprendible_pagoB4" type="file" class="file-document1" accept="image/*, application/pdf" <?php if($this->documentos2->desprendible_pago4=="" or 1==1){ echo ''; } ?> /> <?php if($this->documentos2->desprendible_pago4!="" and 1==0){ ?><img src="corte/ok.png" /><?php }?><br />
															<input name="desprendible_pagoB4_ant" type="hidden" value="<?php echo $this->documentos2->desprendible_pago4; ?>" />
															</div>
														<?php } else {?>
													    	<a class="enlace1" href="documentos/<?php echo $this->documentos2->desprendible_pago4; ?>" target="_blank"><?php echo $this->documentos2->desprendible_pago4; ?></a><br />
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
									            <a class="enlace1" href="documentos/<?php echo $this->documentos2->certificado_laboral; ?>" target="_blank"><?php echo $this->documentos2->certificado_laboral; ?></a><br />
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
									            <a class="enlace1" href="documentos/<?php echo $this->documentos2->otros_ingresos; ?>" target="_blank"><?php echo $this->documentos2->otros_ingresos; ?></a><br />
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
										    	<a class="enlace1" href="documentos/<?php echo $this->documentos2->certificado_tradicion; ?>" target="_blank"><?php echo $this->documentos2->certificado_tradicion; ?></a><br />
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
									            <a class="enlace1" href="documentos/<?php echo $this->documentos2->estado_obligacion; ?>" target="_blank"><?php echo $this->documentos2->estado_obligacion; ?></a><br />
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
									            <a class="enlace1" href="documentos/<?php echo $this->documentos2->estado_obligacion2; ?>" target="_blank"><?php echo $this->documentos2->estado_obligacion2; ?></a><br />
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
									            <a class="enlace1" href="documentos/<?php echo $this->documentos2->estado_obligacion3; ?>" target="_blank"><?php echo $this->documentos2->estado_obligacion3; ?></a><br />
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
									            <a class="enlace1" href="documentos/<?php echo $this->documentos2->factura_proforma; ?>" target="_blank"><?php echo $this->documentos2->factura_proforma; ?></a><br />
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
									            <a class="enlace1" href="documentos/<?php echo $this->documentos2->recibo_matricula; ?>" target="_blank"><?php echo $this->documentos2->recibo_matricula; ?></a><br />
									        <?php }?>
									    </div>
									</div>
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
</script>