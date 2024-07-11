<div class="container">
	<div class="row">
	    <form id="form1" name="form1" method="post" action="/page/sistema/guardarpaso/" class="col-12">
			<div class="col-12">
			<?php if ($_GET['consulta']==""): ?>
				<div class="row">
					<div class="col-6 text-left"><h3 class="titulo">Solicitud WEB<?php echo $this->numero; ?></h3></div>
					<div class="col-6 text-right"><h3 class="paso">Paso 2/7</h3></div>
					<div align="left" class="col-12">
						<div class="separador_login2"></div>
					</div>
				</div>
			<?php endif ?>
			</div>

			<div class="col-12 text-center">
				<span class="titulo-seccion ">Información patrimonial</span>
			</div>

			<div class="col-10 offset-lg-1 caja-formulario">
				<br>
				<table border="0" cellspacing="0" cellpadding="5" class=" col-lg-12 azul">
				  <tr class="fondo-gris">
				    <td>&nbsp;</td>
				    <td><div align="center"><strong>Valor bien</strong></div></td>
				    <td><div align="center"><strong>Valor prendario</strong></div></td>
				    <td><div align="center"><strong>Valor cuota</strong></div></td>
				  </tr>

					<?php $concepto = "VIVIENDA"; ?>
				  <tr>
				    <td>Vivienda</td>
				    <td><div align="center">

				      <input type="text" name="VIVIENDA_v1" id="VIVIENDA_v1" value="<?php echo formato_pesos($this->info[$concepto]->v1); ?>" class="form-control campo" onkeyup="puntitos(this); total_patrimonio();" onchange="total_patrimonio();" />

				    </div></td>
				    <td><div align="center"></div></td>
				    <td><div align="center"></div></td>
				  </tr>

					<?php $concepto = "OTRAS"; ?>
				  <tr>
				    <td>Otros inmuebles</td>
				    <td><div align="center"><input type="text" name="OTRAS_v1" id="OTRAS_v1" value="<?php echo formato_pesos($this->info[$concepto]->v1); ?>" class="form-control campo" onkeyup="puntitos(this); total_patrimonio();" onchange="total_patrimonio();" /></div></td>
				    <td><div align="center"></div></td>
				    <td><div align="center"></div></td>
				  </tr>

					<?php $concepto = "HIPOTECA"; ?>
				  <tr>
				    <td>Hipoteca</td>
				    <td><div align="center"><input name="HIPOTECA_v1" id="HIPOTECA_v1" type="checkbox" value="1" <?php if($this->info[$concepto]->v1==1){ echo 'checked="checked"'; } ?>  onclick="validar_hipoteca();" class="form-control campo" /></div></td>
				    <td><div align="center"><input type="text" name="HIPOTECA_v2" id="HIPOTECA_v2" value="<?php echo formato_pesos($this->info[$concepto]->v2); ?>" class="form-control campo" onkeyup="puntitos(this); total_patrimonio2();" onchange="total_patrimonio2();" /></div></td>
				    <td><div align="center"><input type="text" name="HIPOTECA_v3" id="HIPOTECA_v3" value="<?php echo formato_pesos($this->info[$concepto]->v3); ?>" class="form-control campo" onkeyup="puntitos(this); total_patrimonio3();" onchange="total_patrimonio3();" /></div></td>
				  </tr>

					<?php $concepto = "VEHICULO"; ?>
				  <tr>
				    <td>Vehículo</td>
				    <td><div align="center"><input type="text" name="VEHICULO_v1" id="VEHICULO_v1" value="<?php echo formato_pesos($this->info[$concepto]->v1); ?>" onkeyup="puntitos(this); total_patrimonio();" onchange="total_patrimonio();" class="form-control campo"  /></div></td>
				    <td><div align="center"></div></td>
				    <td><div align="center"></div></td>
				  </tr>

					<?php $concepto = "OTROS"; ?>
				  <tr>
				    <td>Otros vehiculos</td>
				    <td><div align="center"><input type="text" name="OTROS_v1" id="OTROS_v1" value="<?php echo formato_pesos($this->info[$concepto]->v1); ?>" onkeyup="puntitos(this); total_patrimonio();" onchange="total_patrimonio();" class="form-control campo"  /></div></td>
				    <td><div align="center"></div></td>
				    <td><div align="center"></div></td>
				  </tr>

					<?php $concepto = "PRENDA";	?>
				  <tr>
				    <td>Prenda</td>
				    <td><div align="center"><input name="PRENDA_v1" id="PRENDA_v1" type="checkbox" value="1" <?php if($this->info[$concepto]->v1==1){ echo 'checked="checked"'; } ?> onclick="validar_prenda();" class="form-control campo"  /></div></td>
				    <td><div align="center"><input type="text" name="PRENDA_v2" id="PRENDA_v2" value="<?php echo formato_pesos($this->info[$concepto]->v2); ?>"  onkeyup="puntitos(this); total_patrimonio2();" onchange="total_patrimonio2();" class="form-control campo"  /></div></td>
				    <td><div align="center"><input type="text" name="PRENDA_v3" id="PRENDA_v3" value="<?php echo formato_pesos($this->info[$concepto]->v3); ?>" onkeyup="puntitos(this); total_patrimonio3();" onchange="total_patrimonio3();" class="form-control campo"  /></div></td>
				  </tr>
				  <tr>
				  		<td colspan="4"><div class="separador_tabla"></div></td>
				  </tr>
				  <tr class="fondo-gris">
				    <td><strong>Otros bienes inmuebles</strong></td>
				    <td><div align="center"></div></td>
				    <td><div align="center"></div></td>
				    <td><div align="center"></div></td>
				  </tr>

					<?php $concepto = "CLASE"; ?>
				  <tr>
				    <td>Valor</td>
				    <td><div align="center"><input type="text" name="CLASE_v1" id="CLASE_v1" value="<?php echo formato_pesos($this->info[$concepto]->v1); ?>" onkeyup="puntitos(this); total_patrimonio();" onchange="total_patrimonio();" class="form-control campo"  /></div></td>
				    <td><div align="center"></div></td>
				    <td><div align="center"></div></td>
				  </tr>

					<?php $concepto = "PATRIMONIO"; ?>
				  <tr>
				    <td>Total patrimonio</td>
				    <td><div align="center"><input type="text" name="PATRIMONIO_v1" id="PATRIMONIO_v1" value="<?php echo formato_pesos($this->info[$concepto]->v1); ?>" readonly="readonly" class="campo_total form-control campo" /></div></td>
				    <td><div align="center"><input type="text" name="PATRIMONIO_v2" id="PATRIMONIO_v2" value="<?php echo formato_pesos($this->info[$concepto]->v2); ?>" readonly="readonly" class="campo_total form-control campo" /></div></td>
				    <td><div align="center"><input type="text" name="PATRIMONIO_v3" id="PATRIMONIO_v3" value="<?php echo formato_pesos($this->info[$concepto]->v3); ?>" readonly="readonly" class="campo_total form-control campo" /></div></td>
				  </tr>
				  <tr>
				    <td>&nbsp;</td>
				    <td><div align="center"></div></td>
				    <td><div align="center"></div></td>
				    <td><div align="center"></div></td>
				  </tr>
				  <tr>
				  		<td colspan="4"><div class="separador_tabla"></div></td>
				  </tr>
				  <tr class="fondo-gris">
				    <td><strong>Otras obligaciones financieras</strong></td>
				    <td><div align="center"></div></td>
				    <td><div align="center"></div></td>
				    <td><div align="center"></div></td>
				  </tr>
				  <tr>
				    <td>&nbsp;</td>
				    <td><div align="center"><strong>Saldo obligación</strong></div></td>
				    <td><div align="center"></div></td>
				    <td><div align="center"><strong>Valor cuota</strong></div></td>
				  </tr>

					<?php $concepto = "TARJETAS"; ?>
				  <tr>
				    <td>Tarjetas de crédito</td>
				    <td><div align="center"><input type="text" name="TARJETAS_v1" id="TARJETAS_v1" value="<?php echo formato_pesos($this->info[$concepto]->v1); ?>" onkeyup="puntitos(this); total_otras();" onchange="total_otras();" class="form-control campo" /></div></td>
				    <td><div align="center"></div></td>
				    <td><div align="center"><input type="text" name="TARJETAS_v3" id="TARJETAS_v3" value="<?php echo formato_pesos($this->info[$concepto]->v3); ?>" onkeyup="puntitos(this); total_otras3();" onchange="total_otras3();" class="form-control campo" /></div></td>
				  </tr>

					<?php $concepto = "OTROS2";	?>
				  <tr>
				    <td>Otros prestamos diferentes a FESDIS</td>
				    <td><div align="center"><input type="text" name="OTROS2_v1" id="OTROS2_v1" value="<?php echo formato_pesos($this->info[$concepto]->v1); ?>" onkeyup="puntitos(this); total_otras();" onchange="total_otras();" class="form-control campo" /></div></td>
				    <td><div align="center"></div></td>
				    <td><div align="center"><input type="text" name="OTROS2_v3" id="OTROS2_v3" value="<?php echo formato_pesos($this->info[$concepto]->v3); ?>" onkeyup="puntitos(this); total_otras3();" onchange="total_otras3();" class="form-control campo" /></div></td>
				  </tr>

					<?php $concepto = "OBLIGACIONES"; ?>
				  <tr>
				    <td>Total otras obligaciones</td>
				    <td><div align="center"><input type="text" name="OBLIGACIONES_v1" id="OBLIGACIONES_v1" value="<?php echo formato_pesos($this->info[$concepto]->v1); ?>" onkeyup="puntitos(this);" onchange="" class="campo_total form-control campo" readonly="readonly" /></div></td>
				    <td><div align="center"></div></td>
				    <td><div align="center"><input type="text" name="OBLIGACIONES_v3" id="OBLIGACIONES_v3" value="<?php echo formato_pesos($this->info[$concepto]->v3); ?>" onkeyup="puntitos(this);" onchange="" class="campo_total form-control campo" readonly="readonly" /></div></td>
				  </tr>
				  <tr>
				    <td>Total obligaciones</td>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td><input type="text" name="TOTAL_OBLIGACIONES" id="TOTAL_OBLIGACIONES" value="" readonly="readonly"  class="campo_total form-control campo" /></td>
				  </tr>

					<?php $concepto = "TOTALPATRIMONIAL"; ?>
				  <tr>
				  		<td colspan="4"><div class="separador_tabla"></div></td>
				  </tr>
				  <tr class="fondo-gris">
				    <td><strong>Total información patrimonial</strong></td>
				    <td><div align="center"></div></td>
				    <td><div align="center"></div></td>
				    <td><div align="center"><input type="text" name="TOTALPATRIMONIAL_v3" id="TOTALPATRIMONIAL_v3" value="<?php echo formato_pesos($this->info[$concepto]->v3); ?>" readonly="readonly"  class="campo_total form-control" /></div></td>
				  </tr>
				</table>
			</div>

			<div class="col-12"><br></div>

			<div class="col-6 offset-lg-1 text-center">
				<div class="row">
					<div class="col-1"><i class="fas fa-exclamation-triangle triangulo2"></i></div>
					<div class="col-11 negro text-left">No olvide actualizar su información patrimonial</div>
				</div>
			</div>

			<div class="col-12"><br></div>
		    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
		    	<div align="center"><input name="Anterior" type="button" value="Anterior" class="btn btn-azul" onclick="window.location='/page/sistema/paso1/?id=<?php echo $this->id; ?>';" /> <input name="Enviar" type="button" value="Siguiente" class="btn btn-azul" onclick="validar_patrimonio();" /> <input id="Enviar1" name="Enviar1" type="submit" value="Siguiente" class="btn btn-azul d-none" /></div><br>
		    <?php }?>

		    <input name="paso" type="hidden" value="2" />
		    <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>" />

		</form>
	</div>
</div>


<script type="text/javascript">

	function validar_patrimonio(){
		var total_patrimonio = sin_puntos(document.getElementById('TOTALPATRIMONIAL_v3').value)*1;
		total_patrimonio = Number(total_patrimonio);

		if(total_patrimonio>0){
			$("#Enviar1").click();
		}else{
			if(total_patrimonio==0){
				var x = confirm("¿Esta seguro que no quiere llenar su información patrimonial?\nNo diligenciar la información completa puede afectar la aprobación de su crédito.");
				if(x===true){
					$("#Enviar1").click();
				}
			}
		}
	}
</script>

