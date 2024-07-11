<?php //print_r($_POST); ?>

	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="titulo">Solicitar Crédito</h3>
				<div align="left">
					<div class="separador_login2"></div>
				</div>
			</div>
			<div class="col-12">
				<form id="form1" name="form1" method="post" action="/page/sistema/" onsubmit="return validar('<?php echo $this->valor_min; ?>','<?php echo $this->valor_disponible; ?>');">
					<div class="col-md-12 col-lg-10 offset-lg-1 formulario">
						<div class="row form-group">
							<div class="col-4">
								<div align="right">Línea de crédito</div>
							</div>
							<div class="col-6">
								<select id="linea" name="linea" onchange="seleccionar_linea()" class="form-control">
					          		<option value="" <?php if($this->linea=="") {echo "selected";} ?>>Seleccionar</option>
						        	<?php foreach ($this->lineas as $key => $linea): ?>
						        		<option value="<?php echo $linea->id; ?>" <?php if($this->linea==$linea->id) {echo "selected";} ?>><?php echo $linea->nombre; ?></option>
						        	<?php endforeach ?>
					            </select>
							</div>
							<?php if($this->linea==22 or $this->linea==37){ //vivienda ?>
								<div class="col-4 text-right"><div>Destino</div></div>
								<div class="col-6">
						          <select name="destino" id="destino" class="form-control">
						            <option value="VIVIENDA NUEVA">VIVIENDA NUEVA</option>
						            <option value="VIVIENDA USADA">VIVIENDA USADA</option>
						            <option value="MEJORA VIVIENDA">MEJORA VIVIENDA</option>
						          </select>
								</div>
							<?php } ?>
							<?php if($this->linea==26 or $this->linea==47){ //turismo ?>
								<div class="col-4 text-right"><div>Destino</div></div>
								<div class="col-6">
						          <select name="destino" id="destino" class="form-control">
						            <option value="TIQUETES">TIQUETES</option>
						            <option value="OTROS DESTINOS ">OTROS DESTINOS</option>
						          </select>
								</div>
							<?php } ?>

							<div class="col-4">
								<div class="text-right">Cupo actual</div>
							</div>
							<div class="col-6"><div class="form-control campo_gris"><?php echo formato_pesos($this->cupo_actual); ?></div></div>

							<div class="col-4 text-right">
								<div class="text-right">Saldo actual</div>
							</div>
							<div class="col-6"><div class="form-control campo_gris"><?php echo formato_pesos($this->saldo_actual); ?></div></div>

							<div class="col-4 text-right"><div>Tasa efectiva anual</div></div>
							<div class="col-6"><div class="form-control text-right"><?php echo round($this->tasa_nominal,4); ?>%</div></div>

							<div class="col-4 text-right"><div>Valor disponible</div></div>
							<div class="col-6"><div class="form-control campo_gris"><?php echo formato_pesos($this->valor_disponible); ?></div></div>

							<div class="col-4 text-right"><div>Valor solicitado</div></div>
							<div class="col-6">
									<input type="text" name="valor" id="valor" class="form-control campo" style="text-align:right;" onkeyup="puntitos(this); calcular_monto_solicitado();" value="<?php echo $this->valor1; ?>" required />
							</div>


							<div class="col-4 text-right"><div>Monto unificado</div></div>
							<div class="col-6" id="monto_solicitado1">
								<div class="campo_gris form-control"><?php echo formato_pesos($this->saldo_actual+$this->valor); ?></div>
						      <input id="monto_solicitado" name="monto_solicitado" type="hidden" value="<?php echo $this->saldo_actual+$this->valor; ?>" />
						      <input id="monto_solicitado2" type="hidden" value="<?php echo $this->saldo_actual+$this->valor; ?>" />
							</div>

							<div class="col-4 text-right"><div>Cuotas</div></div>
							<div class="col-6">
					          <select name="cuotas" class="form-control" id="cuotas" onchange="limitarCuotas();">
					          	<?php for($i=$this->min;$i<=$this->max;$i++){ ?>
					            <option value="<?php echo $i; ?>" <?php if($this->n==$i){ echo 'selected="selected"'; } ?> ><?php echo $i; ?></option>
					          	<?php }?>
					          </select>
							</div>

							<div class="col-4 text-right"><div>N° de cuotas extraordinarias</div></div>
							<div class="col-6">
					            <select name="abonos" id="abonos" class="form-control" onchange="validar_extra1();">
					                <option value="">&nbsp;&nbsp;&nbsp;</option>
				                    <?php for($i=1;$i<=floor($this->max/6);$i++){ ?>
				                    <option id="extra<?php echo $i; ?>" value="<?php echo $i; ?>" <?php if (!(strcmp($i, $this->abonos))) { echo "selected=\"selected\"";} ?>><?php echo $i; ?></option>
				                    <?php }?>
				                </select>
							</div>

							<div class="col-4 text-right"><div>Valor cuota extraordinaria</div></div>
							<div class="col-6">
									<input name="extra" type="text"  id="extra" style="text-align:right;" onkeyup="puntitos(this); validar_extra(); validar_extra2();" onchange=" validar_extra(); validar_extra2();" value="<?php echo $this->extra; ?>" class="form-control campo" />
								</div>
							</div>

					      	<div align="center" class="texto_rojo col-12" id="e_minimo" style="display:none;">El valor m&iacute;nimo del cr&eacute;dito es $ <?php echo formato_pesos($this->valor_min); ?></div>
					      	<div align="center" class="texto_rojo col-12" id="e_max" style="display:none;">El valor m&aacute;ximo del cr&eacute;dito es $ <?php echo formato_pesos($this->cupo_actual); ?></div>

							<div class="col-12"><br></div>
							<div align="center" class="div_rojo col-12">
								<span class="margen-warning">Apreciado Asociado, favor preparar y escanear los documentos requeridos en la solicitud de crédito en formato PDF o JPG, para ser adjuntos al final de esta solicitud.</span></div>
								<img src="/corte/fedeaa_04.png" class="warning-logo">

							<div align="center" class="col-12">
								<?php if($this->linea!=""){ ?>
									<button name="simular" value="1" type="submit" class="btn btn-azul">Simular</button><br><br>
								<?php }?>
							</div>

						</div>
					</div>


				</form>
			</div>

		<?php if($_POST['simular']!=""){ ?>
			<div id="resultado" class="col-12">
				<?php if($this->r >0){ ?>
					<div class="col-12">
						<div class="row">
							<div class="col-12 datosResaltados text-center">Cuota ordinaria</div>
							<div class="col-12">
								<div align="center">
									<div class="separador_login3"></div>
								</div>
							</div>
							<div class="col-12 margen-cuotas">
								<div class="row">
									<div class="col-4 text-center"><b>Cantidad Cuotas</b></div>
									<div class="col-4 text-center"><b>Vlr. Cuota</b></div>
									<div class="col-4 text-center"><b>Fecha de Inicio</b></div>
									<div class="col-4 text-center"><div class="form-control"><?php echo $this->n; ?></div></div>
									<div class="col-4 text-center"><div class="form-control campo"><?php echo  number_format(round($this->r,-1),0); ?> *</div></div>
									<div class="col-4 text-center"><div class="form-control"><?php $fecha = date("Y-m-d", strtotime("+1 month")); echo $fecha;?></div></div>
								</div>
							</div>

							<?php if($this->numerocuotasextra>0){ ?>
							<div class="col-12 margen-cuotas">
								<div class="row">
									<div class="col-4 text-center"><b>N° Cuotas Extraordinarias</b></div>
									<div class="col-4 text-center"><b>Vlr Cuota Extraordinaria</b></div>
									<div class="col-4 text-center"></div>
									<div class="col-4 text-center"><div class="form-control"><?php echo $this->numerocuotasextra; ?></div></div>
									<div class="col-4 text-center"><div class="form-control">$<?php echo number_format($this->cuotaextra,0);?></div></div>
									<div class="col-4 text-center"></div>
								</div>
							</div>
							<?php } ?>

						</div>
					</div>
				<?php } ?>

				<div align="center" class="col-12">
					<br>
					<div class="div_rojo col-lg-4"><i class="fas fa-asterisk rojo"></i>  El valor de la cuota es apr&oacute;ximado</div>
				</div>

				<div class="col-12 text-left"><br>
					<b>Observaciones</b><br />
<textarea id="observaciones1" name="observaciones1" class="form-control" onkeyup="set_observaciones();" onchange="set_observaciones();"></textarea>
				</div>


				<div class="col-12">
					<br>
					<div align="left" class="col-12"><b>Tramite</b></div>
				  	<div align="left" class="col-12">
				  		<div class="row">
					      <label class="col-12" onclick="seleccionar_tramite();">
					      	<div class="row">
						      	<div class="col-4">DIRECTO</div>
						      	<div class="col-2"><input type="radio" name="tramite" value="DIRECTO" id="tramite_0" /></div>
					      	</div>
					      </label>
					    </div>
					    <div class="row">
					      <label class="col-12" onclick="seleccionar_tramite();">
							<div class="row">
								<div class="col-4">GESTOR COMERCIAL</div>
								<div class="col-2"><input type="radio" name="tramite" value="GESTOR COMERCIAL" id="tramite_1" checked="checked"  /></div>
						      	<div class="col-4" id="div_gestor_comercial" style="display:;">
						      		<select id="gestor_comercial1" name="gestor_comercial1" onchange="seleccionar_gestor();" class="form-control">
						      		 <?php foreach ($this->gestores as $key => $gestor): ?>
						      		 	<option value="<?php echo $gestor->nombre; ?>"><?php echo utf8_decode($gestor->nombre); ?></option>
						      		 <?php endforeach ?>
						        	</select>
							    </div>
							</div>
					      </label>




					    </div>


				  	</div>
				</div>

				<form id="form2" name="form2" action="/page/sistema/guardarsolicitud" method="post" class="col-12 text-center">
					<input name="linea" type="hidden" value="<?php echo $this->linea; ?>" />
				    <input name="tasa" type="hidden" value="<?php echo $this->tasa; ?>" />
				    <input name="valor" type="hidden" value="<?php echo $this->valor; ?>" />
				    <input name="monto_solicitado" type="hidden" value="<?php echo $this->monto_solicitado; ?>" />
				    <input name="cuotas" type="hidden" value="<?php echo $this->n; ?>" />
				    <input name="cedula" type="hidden" value="<?php echo $_SESSION['kt_login_user']; ?>" />
				    <input name="valor_cuota" type="hidden" value="<?php echo $this->r; ?>" />
				    <input name="cuotas_extra" type="hidden" value="<?php echo $this->numerocuotasextra; ?>" />
				    <input name="valor_extra" type="hidden" value="<?php echo $this->cuotaextra; ?>" />
				    <input name="destino" type="hidden" value="<?php echo $this->destino; ?>" />
				    <input id="observaciones" name="observaciones" type="hidden" value="" autocomplete="off" />
				    <input id="tramite" name="tramite" type="hidden" value="DIRECTO" autocomplete="off" />
				    <input id="gestor_comercial" name="gestor_comercial" type="hidden" value="" autocomplete="off" />
					<br>
					<input name="simular2" type="submit" class="btn btn-azul" value="Radicar solicitud" />
					<br>
				    <div align="center" class="col-6 offset-lg-3"><br>

				    	<div class="div_rojo">La solicitud del prestamo no implica su aprobación</div>
						<div align="left"><img src="/corte/fedeaa_04.png" class="warning-logo2"></div>
				    	<br><br>
				    </div>
				</form>


			</div>
		<?php } ?>

		</div>

	</div>





<script type="text/javascript">
	function seleccionar_linea(){
		var linea = $("#linea").val();
		window.location="/page/sistema/?linea="+linea;
	}
</script>