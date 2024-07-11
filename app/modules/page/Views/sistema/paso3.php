
<div class="container">
	<div class="row">
	    <form id="form1" name="form1" method="post" action="/page/sistema/guardarpaso/" class="col-12" onsubmit="validar_ingresos();">
			<div class="col-12">
				<?php if ($_GET['consulta']==""): ?>
					<div class="row">
						<div class="col-6 text-left"><h3 class="titulo">Solicitud WEB<?php echo $this->numero; ?></h3></div>
						<div class="col-6 text-right"><h3 class="paso">Paso 3/7</h3></div>
						<div align="left" class="col-12">
							<div class="separador_login2"></div>
						</div>
					</div>
				<?php endif ?>
			</div>

			<div class="col-12 text-center">
				<span class="titulo-seccion ">Información financiera</span>
			</div>

			<div class="col-8 offset-lg-2 caja-formulario">
				<div class="row form-group">

					<div class="col-md-12 col-lg-12">
						<br><br>
						<table border="0" cellspacing="0" cellpadding="5" class="azul  col-lg-12">
						  <tr class="fondo-gris">
						    <td><strong>Ingresos mensuales</strong></td>
						    <td>&nbsp;</td>
						  </tr>
						  <tr>
						    <td>Salario</td>
						    <td><label>
						      <input type="text" name="salario1" id="salario1" value="<?php echo formato_pesos($this->financiera->salario); ?>"  onkeyup="puntitos(this); total_ingresos1();" onchange="total_ingresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>Pensión</td>
						    <td><label>
						      <input type="text" name="pension" id="pension" value="<?php echo formato_pesos($this->financiera->pension); ?>"  onkeyup="puntitos(this); total_ingresos1();" onchange="total_ingresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						  		<td colspan="2"><div class="separador_tabla"></div></td>
						  </tr>
						  <tr class="fondo-gris">
						    <td><strong>Otros ingresos</strong></td>
						    <td><label></label></td>
						  </tr>
						  <tr>
						    <td>Arriendos</td>
						    <td><label>
						      <input type="text" name="arriendos" id="arriendos" value="<?php echo formato_pesos($this->financiera->arriendos); ?>"  onkeyup="puntitos(this); total_ingresos1();" onchange="total_ingresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>Dividendos</td>
						    <td><label>
						      <input type="text" name="dividendos" id="dividendos" value="<?php echo formato_pesos($this->financiera->dividendos); ?>"  onkeyup="puntitos(this); total_ingresos1();" onchange="total_ingresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>Rentas</td>
						    <td><label>
						      <input type="text" name="rentas" id="rentas" value="<?php echo formato_pesos($this->financiera->rentas); ?>"  onkeyup="puntitos(this); total_ingresos1();" onchange="total_ingresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>Otros</td>
						    <td><label><input type="text" name="otros_ingresos" id="otros_ingresos" value="<?php echo formato_pesos($this->financiera->otros_ingresos); ?>"  onkeyup="puntitos(this); total_ingresos1();" onchange="total_ingresos1();" class="form-control" /></label></td>
						  </tr>
						  <tr>
						    <td>(1) Total ingresos mensuales</td>
						    <td><label>
						      <input type="text" name="total_ingresos" id="total_ingresos" value="<?php echo formato_pesos($this->financiera->total_ingresos); ?>" required readonly="readonly" class="campo_total form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>&nbsp;</td>
						    <td>&nbsp;</td>
						  </tr>
						  <tr>
						  		<td colspan="2"><div class="separador_tabla"></div></td>
						  </tr>
						  <tr class="fondo-gris">
						    <td><strong>Gastos mensuales</strong></td>
						    <td><label></label></td>
						  </tr>
						  <tr>
						    <td>&nbsp;</td>
						    <td>&nbsp;</td>
						  </tr>
						  <tr>
						    <td>Arrendamientos</td>
						    <td><label>
						      <input type="text" name="arrendamientos" id="arrendamientos" value="<?php echo formato_pesos($this->financiera->arrendamientos); ?>"   onkeyup="puntitos(this); total_egresos1();" onchange="total_egresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>Gastos familiares</td>
						    <td><label>
						      <input type="text" name="gastos_familiares" id="gastos_familiares" value="<?php echo formato_pesos($this->financiera->gastos_familiares); ?>"  onkeyup="puntitos(this); total_egresos1();" onchange="total_egresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>Obligaciones financieras</td>
						    <td><label>
						      <input type="text" name="obligaciones_financieras" id="obligaciones_financieras" value="<?php echo formato_pesos($this->total_obligaciones); ?>"  onkeyup="puntitos(this); total_egresos1();" onchange="total_egresos1();" readonly="readonly" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>Otros gastos</td>
						    <td><label>
						      <input type="text" name="otros_gastos" id="otros_gastos" value="<?php echo formato_pesos($this->financiera->otros_gastos); ?>"  onkeyup="puntitos(this); total_egresos1();" onchange="total_egresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr >
						    <td>(2) Total gastos mensuales</td>
						    <td><label>
						      <input type="text" name="total_gastos" id="total_gastos" value="<?php echo formato_pesos($this->financiera->total_gastos); ?>"  readonly="readonly" class="campo_total form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>&nbsp;</td>
						    <td>&nbsp;</td>
						  </tr>
						  <tr>
						  		<td colspan="2"><div class="separador_tabla"></div></td>
						  </tr>
						  <tr class="fondo-gris">
						    <td><strong>Capacidad de endeudamiento</strong></td>
						    <td>&nbsp;</td>
						  </tr>
						  <tr>
						    <td>(1) Total ingresos - (2) Total gastos</td>
						    <td><label>
						      <input type="text" name="capacidad_endeudamiento" id="capacidad_endeudamiento" value="<?php echo formato_pesos($this->financiera->capacidad_endeudamiento); ?>"  readonly="readonly" class="campo_total form-control" />
						    </label></td>
						  </tr>
						</table>
						<div class="caja_error" id="error_gastos_familiares" style="display:none;">Debe llenar los gastos familiares</div>
						<div class="caja_error" id="error_salario_pension" style="display:none;">Debe llenar salario o pensión</div>
					</div>

					<div class="col-lg-8 offset-lg-2">
						<div class="row">
							<div class="col-12"><br><br></div>
							<div align="left" class="col-12"><label>Indique a que corresponden los otros ingresos</label>
							  <textarea name="descripcion_ingresos" id="descripcion_ingresos" class="form-control"><?php echo $this->solicitud->descripcion_ingresos; ?></textarea>
							</div>
							<div align="left" class="col-12"><label>Procedencia de los recursos que relaciona</label>
							  <textarea name="descripcion_recursos" id="descripcion_recursos" class="form-control"><?php echo $this->solicitud->descripcion_recursos; ?></textarea>
							</div>
						</div>
					</div>
					<div id="error1" class="error"></div>
				</div>
			</div>


			<div class="col-12"><br></div>

		    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
		    	<div align="center"><input name="Anterior" type="button" value="Anterior" class="btn btn-azul" onclick="window.location='/page/sistema/paso2/?id=<?php echo $this->id; ?>';" /> <input name="Enviar" type="button" value="Siguiente" class="btn btn-azul" onclick="validar_ingresos();" /> <input id="Enviar1" name="Enviar1" type="submit" value="Siguiente" class="btn btn-azul d-none" /></div><br>
		    <?php }?>

		    <input name="paso" type="hidden" value="3" />
		    <input name="id" type="hidden" value="<?php echo $this->id; ?>" />
	    </form>
	</div>
</div>


<script type="text/javascript">
	total_ingresos1();
	total_egresos1();

	function validar_ingresos(){
		var total_ingresos = sin_puntos(document.getElementById('total_ingresos').value)*1;
		var total_gastos = sin_puntos(document.getElementById('total_gastos').value)*1;
		var error="";

		total_ingresos = Number(total_ingresos);
		total_gastos = Number(total_gastos);

		if(total_ingresos>0 && total_gastos>0){
			$("#Enviar1").click();
		}else{
			if(total_ingresos==0){
				error +="- El total de ingresos mensuales debe ser mayor a 0<br>";
			}
			if(total_gastos==0){
				error +="- El total de gastos mensuales debe ser mayor a 0<br>";
			}
			$("#error1").html(error);
		}
	}
</script>