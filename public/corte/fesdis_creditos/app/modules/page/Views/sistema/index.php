<?php
//print_r($_POST);
//print_r($_SESSION);
?>
<style type="text/css">
	.div_recoge{
		display: none;
	}
</style>

	<div class="container">
		<div class="row">
			<div class="col-6">
				<h3 class="titulo">Solicitar Crédito</h3>
				<div align="left">
					<div class="separador_login2"></div>
				</div>
			</div>
			<div class="col-6 text-right"><h3 class="titulo">Paso 1/3</h3></div>
			<div class="col-lg-7">
					<div class="col-md-12 col-lg-12 formulario2">
						<div class="row form-group">
							<div class="col-4">
								<div align="right">Línea de crédito</div>
							</div>
							<div class="col-8">
								<select id="linea" name="linea" onchange="seleccionar_linea();" class="form-control">
					          		<option value="" <?php if($this->linea=="") { echo "selected";} ?>>Seleccionar</option>
						        	<?php foreach ($this->lineas as $key => $linea): ?>
						        		<option value="<?php echo $linea->codigo; ?>" <?php if($this->solicitud->linea==$linea->codigo) {echo "selected";} ?>><?php echo $linea->codigo; ?> - <?php echo $linea->nombre; ?></option>
						        	<?php endforeach ?>
					            </select>
							</div>
							<div class="col-4 text-right" id="div_destino1" style="display: none;"><div>Destino</div></div>
							<div class="col-8" id="div_destino2" style="display: none;">
					          <select name="destino" id="destino" class="form-control">
					            <option value="VIVIENDA NUEVA">VIVIENDA NUEVA</option>
					            <option value="VIVIENDA USADA">VIVIENDA USADA</option>
					            <option value="MEJORA VIVIENDA">MEJORA VIVIENDA</option>
					          </select>
							</div>
							<?php if($this->linea=="turismo"){ //turismo ?>
								<div class="col-4 text-right"><div>Destino</div></div>
								<div class="col-8">
						          <select name="destino" id="destino" class="form-control">
						            <option value="TIQUETES">TIQUETES</option>
						            <option value="OTROS DESTINOS ">OTROS DESTINOS</option>
						          </select>
								</div>
							<?php } ?>

							<div class="col-4">
								<div class="text-right">Cupo disponible</div>
							</div>
							<div class="col-8"><div class="form-control campo_gris" id="cupo_actual"><?php echo formato_pesos($this->cupo_actual); ?></div>
								<div id="div_credifacil" style="display: none;">*cupo maximo $8.281.160

</div>
							</div>

							<div class="col-4 text-right d-none">
								<div class="text-right">Saldo actual</div>
							</div>
							<div class="col-8 d-none">
								<div class="form-control campo_gris" id="saldo_actual1"><?php echo formato_pesos($this->saldo_actual); ?>
								</div>
								<input type="hidden" name="saldo_actual" id="saldo_actual" value="">
							</div>


							<div class="col-4 text-right"><div>Tasa mes vencido</div></div>
							<div class="col-8"><div class="form-control text-right" id="tasa_mes"><?php echo round($this->tasa_mes,2); ?>%</div></div>

							<div class="col-4 text-right d-none"><div>Valor disponible</div></div>
							<div class="col-8 d-none"><div class="form-control campo_gris" id="valor_disponible"><?php echo formato_pesos($this->valor_disponible); ?></div></div>

							<div class="col-4 text-right"><div><span id="div_credifacil2" style="display: none;">**</span>Valor solicitado</div></div>
							<div class="col-8">
									<input type="text" name="valor" id="valor" class="form-control campo" style="text-align:right;" onkeyup="puntitos(this); calcular_monto_solicitado(); seleccionar_linea();" value="<?php echo formato_pesos($this->valor1); ?>" autocomplete="off" required />
																</div>

							<div class="col-6 text-right div_recoge"><div>¿Recoge créditos anteriores?</div></div>
							<div class="col-6 text-left margin10 div_recoge">
									<input type="checkbox" name="recoge" id="recoge" value="1" onclick="recoger();" <?php if($this->recoger_credito=="1"){ echo 'checked'; } ?> />
							</div>

							<?php //if($_SESSION['kt_login_user']=="1023865304" and 1==0){ ?>
							<?php if($_SESSION['kt_login_user']=="14326998"){ ?>
								<div class="col-6 text-right  div_novacion" style="display: none;"><div>¿Novación?</div></div>
								<div class="col-6 text-left margin10  div_novacion" style="display: none;">
										<input type="checkbox" name="novacion" id="novacion" value="1" onclick="recoger();" <?php if($this->novacion=="1"){ echo 'checked'; } ?> />
								</div>
							<?php }else{ ?>
								<div class="d-none">
									<input type="checkbox" name="novacion" id="novacion" value="1" onclick="recoger();" <?php if($this->novacion=="1"){ echo 'checked'; } ?> />
								</div>
							<?php } ?>

							<div class="col-lg-12 div_recoge" id="div_saldos"></div>

							<div class="col-4 text-right d-none"><div>Valor a desembolsar</div></div>
							<div class="col-8 d-none">
									<input type="text" name="valor_desembolso" id="valor_desembolso" class="form-control campo" style="text-align:right;" value="<?php echo formato_pesos($this->valor_desembolso); ?>" autocomplete="off" readonly />
							</div>

							<div class="col-4 text-right d-none"><div>Monto unificado</div></div>
							<div class="col-8 d-none">
								<div class="campo_gris form-control" id="monto_solicitado1"><?php echo formato_pesos($this->saldo_actual+$this->valor); ?></div>
							</div>
							<input name="monto_solicitado" type="hidden" value="<?php echo $this->saldo_actual+$this->valor; ?>" />
						      <input id="monto_solicitado2" type="hidden" value="<?php echo $this->saldo_actual+$this->valor; ?>" />

							<div class="col-4 text-right"><div>Cuotas</div></div>
							<div class="col-8">
					          <select name="cuotas" class="form-control" id="cuotas" onchange="limitarCuotas(); seleccionar_linea();">
					          	<?php for($i=$this->min;$i<=$this->max;$i++){ ?>
					            <option value="<?php echo $i; ?>" <?php if($this->n==$i){ echo 'selected="selected"'; } ?> ><?php echo $i; ?></option>
					          	<?php }?>
					          </select>
							</div>

							<div class="col-4 text-right d-none"><div>Tipo de cuota extra</div></div>
							<div class="col-8 d-none">
					          <select name="frecuencia" class="form-control" id="frecuencia" onchange="limitarCuotas(); seleccionar_linea();">
					            <option value="6">Prima (Semestral)</option>
					            <option value="12">Cesantia (Anual)</option>
					          </select>
							</div>

							<div class="col-4 text-right d-none"><div>N° de cuotas extraordinarias</div></div>
							<div class="col-8 d-none">
					            <select name="abonos" id="abonos" class="form-control" onchange="validar_extra1(); seleccionar_linea();">
				                </select>
							</div>

							<div class="col-4 text-right d-none"><div>Valor cuota extraordinaria</div></div>
							<div class="col-8 d-none">
									<input name="extra" type="text"  id="extra" style="text-align:right;" onkeyup="puntitos(this); validar_extra(); validar_extra2(); seleccionar_linea();" onchange=" validar_extra(); validar_extra2(); seleccionar_linea();" value="<?php echo $this->extra; ?>" class="form-control campo" />
								</div>
							</div>

					      	<div align="center" class="texto_rojo col-12" id="e_minimo" style="display:none;">El valor m&iacute;nimo del cr&eacute;dito es $ <?php echo formato_pesos($this->valor_min); ?></div>
					      	<div align="center" class="texto_rojo col-12" id="e_max" style="display:none;">El valor m&aacute;ximo del cr&eacute;dito es $ <?php echo formato_pesos($this->cupo_actual); ?></div>



							<div align="center" class="col-12">
								<?php if($this->linea!=""){ ?>
									<button name="simular" value="1" type="submit" class="btn btn-azul">Simular</button><br><br>
								<?php }?>
							</div>

						</div>
					</div>

				<div class="col-lg-5">
					<div id="titulo_requisitos" style="display: none;"><b>REQUISITOS</b>
				</div>
					<div id="requisitos" style="display: none;">
				
				</div>
				<div align="left" class="col-12" id="mensaje" style="display:none">
				<div class="row">
					<div class="rosado pt-2">Apreciado Asociado, favor preparar y escanear los documentos requeridos en la solicitud de crédito en formato PDF o JPG, para ser adjuntos al final de esta solicitud.</div>
				</div>

			</div>
					<div class="col-12" id="div_valor" style="display: none;">
						<div class="row">
							<div class="col-lg-12 text-right">
							Valor de su cuota:<br>
							<span class="valor_cuota">$ <span id="valor_cuota1">0</span> <span class="cop">COP</span></span><br>
							<a class="btn btn-azul" data-toggle="modal" data-target="#myModal">Ver plan de pagos</a>
							</div>
						</div>

					</div>
					<div class="div_rojo col-12" id="div_valor2" style="display: none;"><i class="fas fa-asterisk rojo"></i>  El valor de la cuota es apr&oacute;ximado</div>
				
				</div>


			</div>


		<!-- The Modal -->
		<div class="modal" id="myModal">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">

		      <!-- Modal Header -->
		      <div class="modal-header">
		        <h4 class="modal-title">Plan de pagos</h4>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		      </div>

		      <!-- Modal body -->
		      <div class="div_rojo col-10 offset-md-1"><i class="fas fa-asterisk rojo"></i>  El valor de la cuota es apr&oacute;ximado y esta sujeto a cambios</div>
		      <div class="modal-body" id="modal1">

		      </div>

		      <!-- Modal footer -->
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
		      </div>

		    </div>
		  </div>
		</div>



		<?php if($_POST['simular']!="" or 1==1){ ?>

			<div class="col-12"><br></div>
	

			<a name="solicitar" id="solicitar"></a>

			<div id="resultado" class="col-12">
				<div class="row">
					<div class="col-lg-12 text-left rosado"><br>
						<b>Observaciones del asociado</b> <span>(Si tienes alguna duda u observación respecto a la solicitud)</span><br />
						<textarea id="observaciones1" name="observaciones1" class="form-control" onkeyup="set_observaciones();" onchange="set_observaciones();"></textarea>
					</div>


					<div class="col-lg-6 d-none">
						<br>
						<div align="left" class="col-12"><b>Tramite</b></div>
					  	<div align="left" class="col-12">
					  		<div class="row d-none">
						      <label class="col-12" onclick="seleccionar_tramite();">
						      	<div class="row">
							      	<div class="col-4">DIRECTO</div>
							      	<div class="col-2"><input type="radio" name="tramite" value="DIRECTO" id="tramite_0" checked="checked"  /></div>
						      	</div>
						      </label>
						    </div>
						    <div class="row d-none">
						      <label class="col-12" onclick="seleccionar_tramite(); seleccionar_gestor();">
								<div class="row">
									<div class="col-4">EJECUTIVO DE CUENTA</div>
									<div class="col-2"><input type="radio" name="tramite" value="GESTOR COMERCIAL" id="tramite_1"  /></div>
							    	<div class="col-6" id="div_gestor_comercial" style="display:;">
							      		<select id="gestor_comercial1" name="gestor_comercial1" onchange="seleccionar_gestor();" class="form-control">
							      		 <?php foreach ($this->gestores as $key => $gestor): ?>
							      		 	<option value="<?php echo $gestor->nombre; ?>"><?php echo utf8_decode($gestor->nombre); ?></option>
							      		 <?php endforeach ?>
							        	</select>
									</div>
								</div>
						      </label>
						    </div>
						    <div class="row">

						    </div>


					  	</div>
					</div>

				</div>



				    	<br><br>



			</div>
		<?php } ?>

		</div>

	</div>

<form id="form2" name="form2" action="/page/sistema/guardarsolicitud" method="post" enctype="multipart/form-data" class="col-12 text-center">
	<input name="linea" id="linea2" type="hidden" value="<?php echo $this->linea; ?>" />
    <input name="tasa" type="hidden" id="tasa" value="<?php echo $this->tasa; ?>" />
    <input name="tasa_anual" type="hidden" id="tasa_anual" value="<?php echo $this->tasa_anual; ?>" />
    <input name="valor" id="valor2" type="hidden" value="<?php echo $this->valor; ?>" />
    <input name="monto_solicitado" id="monto_solicitado" type="hidden" value="<?php echo $this->monto_solicitado; ?>" />
    <input name="cuotas" type="hidden" id="cuotas2" value="<?php echo $this->n; ?>" />
    <input name="cedula" type="hidden" value="<?php echo $_SESSION['kt_login_user']; ?>" />
    <input name="valor_cuota" id="valor_cuota2" type="hidden" value="<?php echo $this->r; ?>" />
    <input name="cuotas_extra" type="hidden" value="<?php echo $this->numerocuotasextra; ?>" />
    <input name="valor_extra" type="hidden" value="<?php echo $this->cuotaextra; ?>" />
    <input name="destino" type="hidden" value="<?php echo $this->destino; ?>" />
    <input id="observaciones" name="observaciones" type="hidden" value="" autocomplete="off" />
    <input id="tramite" name="tramite" type="hidden" value="DIRECTO" autocomplete="off" />
    <input id="gestor_comercial" name="gestor_comercial" type="hidden" value="" autocomplete="off" />
    <input id="frecuencia2" name="frecuencia" type="hidden" value="" autocomplete="off" />
    <input id="recoger_credito" name="recoger_credito" type="hidden" value="0" autocomplete="off" />
    <input id="numeros_recogidos" name="numeros_recogidos" type="hidden" value="" autocomplete="off" />
    <input id="valor_recogidos" name="valor_recogidos" type="hidden" value="" autocomplete="off" />
    <input id="valor_desembolso1" name="valor_desembolso" type="hidden" value="" autocomplete="off" />
    <input id="id1" name="id1" type="hidden" value="<?php echo $this->id; ?>" autocomplete="off" />

    <input id="cupo_auxiliar" type="hidden" value="" autocomplete="off" />
    <input id="cupo_auxiliar2" type="hidden" value="" autocomplete="off" />
    <input id="bandera" type="hidden" value="" autocomplete="off" />



	<?php echo $this->getRoutPHP('modules/page/Views/sistema/paso1.php'); ?>
	<div id="div_paso5"><?php echo $this->getRoutPHP('modules/page/Views/sistema/paso5.php'); ?></div>
	<div id="div_paso6"><?php echo $this->getRoutPHP('modules/page/Views/sistema/paso6.php'); ?></div>

	<br>
	<div align="center" id="div_siguiente"><input name="simular2" type="submit" class="btn btn-azul" value="Siguiente" /></div>


	<?php
	$smlv = 877803;
	$cuota_minima = round($smlv*6/100);
	?>
	<div class="rojo" align="center" id="error_cuota" style="display: none;">La cuota mínima debe ser superior al 6% de 1 SMMLV ($<?php echo number_format($cuota_minima) ?>)</div>

    <div align="center" class="col-12 offset-lg-0"><br>

    	<div class="div_rojo">
			<div class="row">
				<div class="col-1">
					<i class="fas fa-asterisk rojo"></i>
				</div>
				<div class="col-11 text-left">
					La solicitud del prestamo no implica su aprobación, está sujeta a la verificación del analista de crédito de acuerdo a los parametros del reglamento de crédito.
				</div>
    		</div>
		</div>
    </div>
	<br>
</form>


<script type="text/javascript">
	//calcularEdad();

</script>



<script type="text/javascript">
	function seleccionar_linea(){

		var linea = $("#linea").val();
		var valor = $("#valor").val();
		var monto_solicitado = $("#monto_solicitado").val();
		var cuotas = $("#cuotas").val();
		var abonos = $("#abonos").val();
		var extra = $("#extra").val();
		var destino = $("#destino").val();
		var frecuencia = $("#frecuencia").val();

		$("#div_paso5").load("/page/sistema/paso5/?linea="+linea);
		$("#div_paso6").load("/page/sistema/paso6/?linea="+linea);

		if(linea=="1" || linea=="2" || linea=="48"){
			$("#div_destino1").show();
			$("#div_destino2").show();
		}else{
			$("#div_destino1").hide();
			$("#div_destino2").hide();
		}

		if(linea=="TR" || linea=="LI" || linea=="FE" || linea=="AP" || linea=="CV"){
			$(".div_recoge").show();
		}else{
			$(".div_recoge").hide();
		}

		if(linea=="CFU"){
			$("#div_credifacil").show();
			$("#div_credifacil2").show();
		}else{
			$("#div_credifacil").hide();
			$("#div_credifacil2").hide();
		}



		$("#linea2").val(linea);
		$("#cuotas2").val(cuotas);
		$("#frecuencia2").val(frecuencia);

		//$("#valor_desembolso").val(valor);
		//$("#valor_desembolso1").val(valor);


		$.post("/page/sistema/filtrolinea/",{"linea":linea, "valor":valor, "monto_solicitado":monto_solicitado, "cuotas":cuotas, "abonos":abonos, "extra":extra, "destino":destino },function(res){
			$('#requisitos').html(res.valores);
			$("#requisitos").show();
			//alert(res.saldos);
			$("#mensaje").show();
			$("#titulo_requisitos").show();
			if($("#recoge").prop('checked')===false){
				$('#cupo_actual').html(res.cupo_actual);
				
			}
			$('#saldo_actual1').html(res.saldo_actual1);
			res.tasa_nominal = res.tasa_nominal.substring(0, 4);
			$('#tasa_nominal').html(res.tasa_nominal+"%");
			$('#tasa_mes').html(res.tasa+"%");
			$('#valor_disponible').html(res.valor_disponible);
			$('#cupo_auxiliar').val(res.valor_disponible);
			$('#cuotas').html(res.menu_cuotas);
			limitarCuotas();
		

			if(res.r>0){
				$("#valor_cuota1").html(res.r1);
				$("#valor_cuota").val(res.r);
				$("#valor_cuota2").val(res.r);
				$("#div_valor").show();
				$("#div_valor2").show();
			}
			$('#tasa').val(res.tasa);
			$('#tasa_anual').val(res.tasa_nominal);
			$('#saldo_actual').val(res.saldo_actual);
			$("#valor2").val(res.valor);
			$("#modal1").html(res.tabla);


			//$("#tipo_garantia").val('<?php //echo $this->solicitud->tipo_garantia; ?>');
			//$("#tipo_garantia").change();

			var valor_desembolso = valor;
			//valor_desembolso = sin_puntos(valor_desembolso) - sin_puntos(valor_fm);
			$("#valor_desembolso").val(valor_desembolso);
			$("#valor_desembolso1").val(valor_desembolso);

			sumar_saldos(0);

			var smmlv = 877803;
			var cuota_minima = Number(smmlv*6/100);
			if(Number(res.r) < Number(cuota_minima)){
				$("#div_siguiente").hide();
				$("#error_cuota").show();
			}else{
				$("#div_siguiente").show();
				$("#error_cuota").hide();
			}
			

		});
		//window.location="/page/sistema/?linea="+linea;
	}

	function recoger(){
		var cedula = '<?php echo $_SESSION['kt_login_user']; ?>';
		if($("#recoge").prop('checked')===true){
			$.post("/page/sistema/recoger/",{"cedula":cedula},function(res){
				if($("#bandera").val()==""){
					$("#div_saldos").html(res.tabla);
					//$("#bandera").val(1)
				}
			});
			$("#recoger_credito").val(1);
			$(".div_novacion").show();
		}else{
			$("#div_saldos").html('');
			$("#recoger_credito").val(0);
			$(".div_novacion").hide();
		}
		sumar_saldos(0);
	}

	function sumar_saldos(key){
		var i=0;
		var saldo=0;
		var valor_desembolso = 0;
		var valor = $("#valor").val();
		var numeros_recogidos = '';
		valor = sin_puntos(valor);
		var linea = '';
		var valor_multiproposito = 0;
		for(i=0;i<=50;i++){
			if($("#saldo"+i)){
				if($("#saldo"+i).prop('checked')===true){
					saldo+=Number($("#valor_saldo"+i).val());
					numeros_recogidos+=$("#numero"+i).val()+", ";
					linea = $("#linea_recoger"+i).val();
					if(linea.indexOf("MULTIPROPOSITO")!=-1){
						valor_multiproposito += Number($("#valor_saldo"+i).val());
					}else{
						valor_multiproposito -= Number($("#valor_saldo"+i).val());
					}
				}
			}
		}

		var max_aportes = Number('<?php echo $this->aportes; ?>')*7;

		if($("#valor").val()=="0" && valor_multiproposito>0){
			$("#valor").val(valor_multiproposito);
			$("#valor2").val(valor_multiproposito);
			puntitos(document.getElementById('valor'));
			valor = valor_multiproposito;
		}

		// if(valor>max_aportes){
		// 	valor = max_aportes;
		// 	// $("#valor").val(max_aportes);
		// 	// $("#valor2").val(max_aportes);
		// 	puntitos(document.getElementById('valor'));
		// }


		var cupo_actual=0;
		//console.log("valor_multiproposito:"+valor_multiproposito);
		// if(valor_multiproposito>0){
			
		// 	cupo_actual = sin_puntos($('#cupo_auxiliar').val());
		// 	cupo_actual  = Number(cupo_actual)+Number(valor_multiproposito);
		// 	if(cupo_actual>max_aportes){
		// 		cupo_actual = max_aportes;
		// 	}
		// 	$('#cupo_actual').html(cupo_actual);
		// 	$('#valor_disponible').html(cupo_actual);

		// 	$('#cupo_auxiliar2').val(cupo_actual);
		// 	puntitos(document.getElementById('cupo_auxiliar2'));
		// 	$('#cupo_actual').html($('#cupo_auxiliar2').val());
		// }else{
		// 	cupo_actual = sin_puntos($('#cupo_auxiliar').val());
		// 	//cupo_actual  = Number(cupo_actual)+Number(valor_multiproposito);
		// 	$('#cupo_actual').html(cupo_actual);
		// 	$('#valor_disponible').html(cupo_actual);

		// 	$('#cupo_auxiliar2').val(cupo_actual);
		// 	puntitos(document.getElementById('cupo_auxiliar2'));
		// 	$('#cupo_actual').html($('#cupo_auxiliar2').val());

		// 	calcular_monto_solicitado();
		// }

		numeros_recogidos = numeros_recogidos.slice(0, -2);
		valor_desembolso = Number(valor)-Number(saldo);
		$("#valor_desembolso").val(valor_desembolso);
		$("#valor_desembolso1").val(valor_desembolso);
		// puntitos(document.getElementById('valor_desembolso'));
		$("#numeros_recogidos").val(numeros_recogidos);
		$("#valor_recogidos").val(saldo);

		var novacion = $("#novacion").prop('checked');

		if(valor_desembolso<0 && novacion===false){
			if(valor_multiproposito==0){
				$("#saldo"+key).prop('checked',false);
				sumar_saldos(key);
			}
			$("#div_siguiente").hide();
		}else{
			$("#div_siguiente").show();
		}

	}

	$('#linea').on('change', function() {
	$("#valor").val("");
	$("#div_valor").hide();
});

</script>