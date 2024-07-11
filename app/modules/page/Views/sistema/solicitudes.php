<div class="container">
  <div class="row">
    <div class="col-12 text-left">
      <h3 class="titulo">Mis solicitudes</h3>
    </div>
    <div align="left" class="col-12">
      <div class="separador_login2"></div>
    </div>
    <div class="col-12">

      <?php if(count($this->solicitudes)>0){ ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="3" class="tablaGris2 textos3">
        <tr class="fondo3">
          <td>
            <div align="center">Fecha radicaci&oacute;n</div>
          </td>
          <td>
            <div align="center">N&deg; Radicaci&oacute;n</div>
          </td>
          <td>
            <div align="center">L&iacute;nea de cr&eacute;dito</div>
          </td>
          <td>
            <div align="center">Valor solicitado</div>
          </td>
          <td>
            <div align="center">Cuotas</div>
          </td>
          <td>
            <div align="center">Tasa %</div>
          </td>
          <td>
            <div align="center">Estado</div>
          </td>
          <td>
            <div align="left">Valor desembolso</div>
          </td>

          <td>&nbsp;</td </tr>
          <?php foreach ($this->solicitudes as $key => $solicitud): ?>
        <tr>
          <td>
            <div align="center"><?php echo formatoDMY($solicitud->fecha); ?></div>
          </td>
          <td>
            <div align="center">WEB<?php echo con_ceros($solicitud->id); ?></div>
          </td>
          <td>
            <div align="center"><?php echo $this->lineas_array[$solicitud->linea]; ?></div>
          </td>
          <td>
            <div align="right">$ <?php echo formato_pesos($solicitud->valor); ?></div>
          </td>
          <td>
            <div align="center"><?php echo $solicitud->cuotas; ?></div>
          </td>
          <td>
            <div align="center"><?php echo $solicitud->tasa; ?></div>
          </td>
          <td>
            <div align="left">
              <?php

								$validacion = $solicitud->validacion;
								$validaciones = array("En estudio","Aprobado","Desembolsado");
								
                $validaciones[6]="Cambio de condiciones";
                $validaciones[4]="Rechazado";
                $validaciones[5]="Radicado";
                $validaciones[8]="Pasar a desembolso";
								//$validaciones = array("En estudio","Aprobado","Contabilizado","Anulado","Rechazado","En estudio"); //Para usuario
							
							$b=false;
							?>
              <?php $validaciones[3]="Aplazado";?>
              <?php if($solicitud->paso!="8"){ ?>
              <?php if($solicitud->incompleta!=""){ ?>
              Sin terminar
              <?php }else{ ?>
              Incompleta
              <?php } ?>

              <?php }else if($solicitud->validacion=="0" && $solicitud->estado_autorizo=="" ){echo "Radicado";$b=true;}else ?>
              <?php if(($solicitud->confimar_solicitud==1 || $solicitud->acepto_cambios==1)  && ($solicitud->validacion!="8" &&	 $solicitud->validacion!="2" && $solicitud->estado_autorizo!="4")  ){
									echo " Aprobado por el asociado";
									$b=true;
								}else if(($solicitud->confimar_solicitud==2 || $solicitud->vencimiento_aplazado==1 || $solicitud->vencimiento_aprobado==1) ){
									echo " Rechazado por el asociado";
									$b=true;
								}else if($b==false){?>
              <?php
										$validacion = $validaciones[$solicitud->validacion];
										if($solicitud->estado_autorizo=="4"){
											$validacion = "Rechazada";
											
										}
										 if(!$validacion and $solicitud->incompleta!="" ){
											echo "Aplazado";
										 }
										echo $validacion;
									?>
              <?php }  //echo $solicitud->validacion;?>
            </div>
          </td>
          <td>
            <div align="left"></div>
          </td>
          <td width="140">
            <?php if($solicitud->paso!="8" && $solicitud->validacion != 4){ ?>
              <?php if($solicitud->paso==6){ ?>
                <div align="left"><a href="/page/sistema/resumen/?id=<?php echo $solicitud->id; ?>"
                  class="btn btn-azul btn-sm">Terminar solicitud</a></div>
              <?php } else{ ?>
                <div align="left"><a
                  href="/page/sistema/paso<?php echo $solicitud->paso; ?>/?id=<?php echo $solicitud->id; ?>"
                  class="btn btn-azul btn-sm">Terminar solicitud</a></div>
              <?php } ?>
              <div style="height:10px;"></div>
              <!-- <div align="left"><a class="btn btn-sm btn-warning"
                  onclick="eliminar_solicitud('<?php echo $solicitud->id; ?>');" style="cursor:pointer;">eliminar</a>
              </div> -->
            <?php }?>
            <?php if($solicitud->validacion=="0" && $solicitud->estado_autorizo=="" ){ ?>
              <div align="left"><a class="btn btn-sm btn-danger text-white"
                  onclick="eliminar_solicitud('<?php echo $solicitud->id; ?>');" style="cursor:pointer;">eliminar</a>
              </div>
            <?php } ?>
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
<script>
function eliminar_solicitud(id) {
  if (confirm("¿Está seguro de eliminar la solicitud?")) {
    $.ajax({
      url: "/page/sistema/deleterequest/",
      type: "POST",
      dataType: "json",
      data: {
        id: id
      },
      success: function(data) {
        if (data.status == "success") {
          location.reload();
        }
      }
    });
  }
}
</script>