
<div class="container">
	<div class="row">
	    <form id="form1" name="form1" method="post" action="/page/sistema/guardarpaso/" class="col-12">
			<div class="col-12">
				<div class="row">
					<div class="col-6 text-left"><h3 class="titulo">Solicitud WEB<?php echo $this->numero; ?></h3></div>
					<div align="left" class="col-12">
						<div class="separador_login2"></div>
					</div>
					<div class="col-6 text-left"><h3 class="paso">Paso 2/6</h3></div>
				</div>
			</div>
			<div class="col-12">
				<div class="row form-group">

					<div class="col-md-12 col-lg-12 text">
						<br><br>
						<table border="0" cellspacing="0" cellpadding="1" class="textos2  col-lg-8 offset-lg-2">
						  <tr>
						    <td colspan="2">
						    <div align="center" class="datosResaltados"><h5>INFORMACIÓN FINANCIERA</h5></div>
								<div align="center">
									<div class="separador_login4"></div>
								</div>
						  	</td>
						  </tr>
						  <tr>
						    <td><strong>INGRESOS MENSUALES</strong></td>
						    <td>&nbsp;</td>
						  </tr>
						  <tr>
						    <td>SALARIO</td>
						    <td><label>
						      <input type="text" name="salario1" id="salario1" value="<?php echo formato_pesos($this->financiera->salario); ?>"  onkeyup="puntitos(this); total_ingresos1();" onchange="total_ingresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>PENSION</td>
						    <td><label>
						      <input type="text" name="pension" id="pension" value="<?php echo formato_pesos($this->financiera->pension); ?>"  onkeyup="puntitos(this); total_ingresos1();" onchange="total_ingresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td><strong>OTROS INGRESOS</strong></td>
						    <td><label></label></td>
						  </tr>
						  <tr>
						    <td>ARRIENDOS</td>
						    <td><label>
						      <input type="text" name="arriendos" id="arriendos" value="<?php echo formato_pesos($this->financiera->arriendos); ?>"  onkeyup="puntitos(this); total_ingresos1();" onchange="total_ingresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>DIVIDENDOS</td>
						    <td><label>
						      <input type="text" name="dividendos" id="dividendos" value="<?php echo formato_pesos($this->financiera->dividendos); ?>"  onkeyup="puntitos(this); total_ingresos1();" onchange="total_ingresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>RENTAS</td>
						    <td><label>
						      <input type="text" name="rentas" id="rentas" value="<?php echo formato_pesos($this->financiera->rentas); ?>"  onkeyup="puntitos(this); total_ingresos1();" onchange="total_ingresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>OTROS</td>
						    <td><label><input type="text" name="otros_ingresos" id="otros_ingresos" value="<?php echo formato_pesos($this->financiera->otros_ingresos); ?>"  onkeyup="puntitos(this); total_ingresos1();" onchange="total_ingresos1();" class="form-control" /></label></td>
						  </tr>
						  <tr>
						    <td><strong>(1) TOTAL INGRESOS MENSUALES</strong></td>
						    <td><label>
						      <input type="text" name="total_ingresos" id="total_ingresos" value="<?php echo formato_pesos($this->financiera->total_ingresos); ?>" required readonly="readonly" class="campo_total form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>&nbsp;</td>
						    <td>&nbsp;</td>
						  </tr>

						  <tr>
						    <td><strong>GASTOS MENSUALES</strong></td>
						    <td><label></label></td>
						  </tr>
						  <tr>
						    <td>&nbsp;</td>
						    <td>&nbsp;</td>
						  </tr>
						  <tr>
						    <td>ARRENDAMIENTOS</td>
						    <td><label>
						      <input type="text" name="arrendamientos" id="arrendamientos" value="<?php echo formato_pesos($this->financiera->arrendamientos); ?>"   onkeyup="puntitos(this); total_egresos1();" onchange="total_egresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>GASTOS FAMILIARES</td>
						    <td><label>
						      <input type="text" name="gastos_familiares" id="gastos_familiares" value="<?php echo formato_pesos($this->financiera->gastos_familiares); ?>"  onkeyup="puntitos(this); total_egresos1();" onchange="total_egresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>OBLIGACIONES FINANCIERAS</td>
						    <td><label>
						      <input type="text" name="obligaciones_financieras" id="obligaciones_financieras" value="<?php echo formato_pesos($this->total_obligaciones); ?>"  onkeyup="puntitos(this); total_egresos1();" onchange="total_egresos1();" readonly="readonly" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>OTROS GASTOS</td>
						    <td><label>
						      <input type="text" name="otros_gastos" id="otros_gastos" value="<?php echo formato_pesos($this->financiera->otros_gastos); ?>"  onkeyup="puntitos(this); total_egresos1();" onchange="total_egresos1();" class="form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td><strong>(2) TOTAL GASTOS MENSUALES</strong></td>
						    <td><label>
						      <input type="text" name="total_gastos" id="total_gastos" value="<?php echo formato_pesos($this->financiera->total_gastos); ?>"  readonly="readonly" class="campo_total form-control" />
						    </label></td>
						  </tr>
						  <tr>
						    <td>&nbsp;</td>
						    <td>&nbsp;</td>
						  </tr>
						  <tr>
						    <td><strong>CAPACIDAD DE ENDEUDAMIENTO</strong></td>
						    <td>&nbsp;</td>
						  </tr>
						  <tr>
						    <td><strong>(1) TOTAL INGRESOS - (2) TOTAL GASTOS</strong></td>
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

				</div>
			</div>




		    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
		    	<div align="center"><input name="Anterior" type="button" value="Anterior" class="btn btn-azul" onclick="window.location='/page/sistema/paso1/?id=<?php echo $this->id; ?>';" /> <input name="Enviar" type="submit" value="Siguiente" class="btn btn-azul" /></div><br>
		    <?php }?>

		    <input name="paso" type="hidden" value="2" />
		    <input name="id" type="hidden" value="<?php echo $this->id; ?>" />
	    </form>
	</div>
</div>


<script type="text/javascript">
	total_ingresos1();
	total_egresos1();
</script>