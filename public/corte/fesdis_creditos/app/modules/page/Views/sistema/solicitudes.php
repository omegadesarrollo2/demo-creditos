<div class="container">
	<div class="row">
		<div class="col-12 text-left"><h3 class="titulo">Mis solicitudes</h3></div>
		<div align="left" class="col-12">
			<div class="separador_login2"></div>
		</div>
		<div class="col-12">

			<?php if(count($this->solicitudes)>0){ ?>
				<table width="100%" border="0" cellspacing="0" cellpadding="3" class="tablaGris2 textos3">
				  <tr class="fondo3">
				    <td><div align="center">Fecha radicaci&oacute;n</div></td>
				    <td><div align="center">N&deg; Radicaci&oacute;n</div></td>
				    <td><div align="center">L&iacute;nea de cr&eacute;dito</div></td>
				    <td><div align="center">Valor solicitado</div></td>
				    <td><div align="center">Cuotas</div></td>
				    <td><div align="center">Tasa %</div></td>
				    <td><div align="center">Estado</div></td>
				    <td><div align="left">Valor desembolso</div></td>
				    <td>Observaci&oacute;n analista</td>
				    <td>&nbsp;</td>
				  </tr>
				  	<?php foreach ($this->solicitudes as $key => $solicitud): ?>
					    <tr>
					      <td><div align="center"><?php echo formatoDMY($solicitud->fecha); ?></div></td>
					      <td><div align="center">WEB<?php echo con_ceros($solicitud->id); ?></div></td>
					      <td><div align="center"><?php echo $this->lineas_array[$solicitud->linea]; ?></div></td>
					      <td><div align="right">$ <?php echo formato_pesos($solicitud->valor); ?></div></td>
					      <td><div align="center"><?php echo $solicitud->cuotas; ?></div></td>
					      <td><div align="center"><?php echo $solicitud->tasa; ?></div></td>
					      <td>
					        <div align="left">
					          <?php

								$validacion = $solicitud->validacion;
								$validaciones = array("En estudio","Aprobado","Contabilizado","Anulado","Rechazado","Procesado");
								$validaciones = array("En estudio","Aprobado","Contabilizado","Anulado","Rechazado","En estudio"); //Para usuario
								if($solicitud->paso=="8"){
									echo $validaciones[$validacion];
								}else{
									echo "Sin terminar";
								}

							?>
					        </div></td>
					      <td><div align="left"></div></td>
					      <td><div align="center"><?php echo $solicitud->observacion_analista; ?></div></td>
					      <td width="140">
					      <?php if($solicitud->paso!="8"){ ?>
							<?php if($solicitud->paso==6){ ?>
					      		<div align="left"><a href="/page/sistema/resumen/?id=<?php echo $solicitud->id; ?>" class="btn btn-azul btn-sm">Terminar solicitud</a></div>
					      	<?php } else{ ?>
					      		<div align="left"><a href="/page/sistema/paso<?php echo $solicitud->paso; ?>/?id=<?php echo $solicitud->id; ?>" class="btn btn-azul btn-sm">Terminar solicitud</a></div>
					      	<?php } ?>
					      	<div style="height:10px;"></div>
					      	<div align="left"><a class="btn btn-sm btn-warning" onclick="eliminar_solicitud('<?php echo $solicitud->id; ?>');" style="cursor:pointer;">eliminar</a></div>
					      <?php }?>
					      </td>
					    </tr>
				    <?php endforeach ?>
				</table>
			<?php } else{?>
				<?php if($this->solicitudes[0]->valor_desembolso>0){ echo formato_pesos($this->solicitudes[0]->valor_desembolso); } ?>
				<div align="center">No existen solicitudes</div>
			<?php }?>
				<br><br>
		</div>
	</div>
</div>

