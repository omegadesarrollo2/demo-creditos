<style type="text/css">
input[type='checkbox'] {
  -webkit-appearance: none;
  width: 30px;
  height: 30px;
  background: white;
  border-radius: 5px;
  border: 2px solid #555;
  margin-bottom: -9px;
}

input[type='checkbox']:checked {
  background: #abd;
  background: url('/corte/ok.png');
  background-size: cover;
}
</style>

<div class="container">
  <div class="row">
    <form id="form1" name="form1" method="post" action="/page/sistema/guardarpaso/" class="col-12">
      <div class="col-12">
        <?php if ($_GET['consulta']==""): ?>
        <div class="row">
          <div class="col-6 text-left">
            <h3 class="titulo">Solicitud WEB<?php echo $this->numero; ?></h3>
          </div>
          <div class="col-6 text-right">
            <h3 class="paso">Paso 2/3</h3>
          </div>
          <div align="left" class="col-12">
            <div class="separador_login2"></div>
          </div>
        </div>
        <?php endif ?>
      </div>
      <div class="col-12">
        <div class="row form-group">
          <div class="col-12">
            <?php if($this->documentos && $this->documentos->desprendible_pago == NULL && $this->documentos->desprendible_pago2 == NULL && $this->documentos->desprendible_pago3 == NULL && $this->documentos->desprendible_pago4 == NULL && $this->documentos->desprendible_pago5 == NULL && $this->documentos->certificado_laboral == NULL && $this->documentos->otros_ingresos == NULL && $this->documentos->certificado_tradicion == NULL && $this->documentos->estado_obligacion == NULL && $this->documentos->estado_obligacion2 == NULL && $this->documentos->estado_obligacion3 == NULL && $this->documentos->factura_proforma == NULL && $this->documentos->recibo_matricula == NULL && $this->documentos->contrato_vivienda == NULL && $this->documentos->declaracion_renta == NULL && $this->documentos->formulario_seguro == NULL && $this->documentos->orden_medica == NULL && $this->documentos->certificacion == NULL && $this->documentos->cotizacion == NULL && $this->documentos->peritaje_vehiculo == NULL && $this->documentos->evidencia_calamidad == NULL && $this->documentos->impuesto_vehiculo == NULL && $this->documentos->soat == NULL && $this->documentos->documento_recoge_creditos == NULL && $this->documentos->otros_documentos1 == NULL && $this->documentos->otros_documentos2 == NULL && $this->documentos->otros_documentos3 == NULL && $this->documentos->otros_documentos4 == NULL && $this->documentos->otros_documentos5 == NULL){ ?>
              <div class="alert alert-warning" role="alert">
                Es posible que ocurriera un error al cargar los documentos, por favor revise los nombres y tamaño de los archivos.
              </div>
            <?php } ?>
          </div>
          <div class="col-md-12 col-lg-12">
            <div align="center" class="col-lg-12">
              <br>
              <div class="titulo-seccion"><strong>Autorización</strong></div>
              <div align="justify" class="col-12 caja-formulario">
                <br>
                <p> Autorizo irrevocablemente a mi empleador para descontar de mi salario y demás emolumentos a mi
                  favor, y pagar a favor de FODUNlas sumas que mensualmente se causen como
                  consecuencia de obligaciones económicas adquiridas, dentro de los límites legales autorizados. De la
                  misma forma autorizo para que con fines de control de mi capacidad de pago y
                  tratamiento de datos personales, mi empleador o entidad pagadora y FODUNse compartan entre sí la
                  información relativa a mi salario, honorarios, devengos, créditos, descuentos y
                  datos personales. La presente autorización se extiende en el evento que llegare a cambiar de empleador
                  o entidad pagadora en los términos del artículo 7° de la Ley 1527 de 2012,
                  permitiendo a FODUNexigir al nuevo empleador o entidad pagadora el descuento de los dineros que se
                  causen a mi favor, pudiendo descontarse hasta el 50% de mi salario, pensión
                  u honorarios, en los términos que dan cuenta el artículo 55° del Decreto 1481 de 1989, con el fin de
                  pagar los saldos insolutos ami cargo.</p>



                <p> Igualmente, Autorizo irrevocablemente a FODUNpara: (I) Consultar, reportar y procesar mi
                  comportamiento crediticio, financiero o comercial ante las Centrales de Información
                  Financiera legalmente constituidas, ya sea nacionales o extranjeras, así como ante cualquier entidad
                  que administre o maneje bases de datos. En general, la presente autorización
                  comprende la facultad para realizar cualquier tratamiento lícito de mis datos personales, comerciales
                  y financieros, conforme a la Ley 1581 del 2012. (II) En el evento de la terminación de

                  mi(nuestro) contrato de trabajo, se retenga de la liquidación definitiva de la relación laboral,
                  cesantías, intereses de cesantías, prima, vacaciones e indemnizaciones, las sumas correspon-
                  dientes al saldo insoluto de la obligación a mi(nuestro) cargo, en los términos que dan cuenta el
                  artículo 55° y 56° del Decreto 1481 de 1989. (III) Compensar contra mis aportes el saldo

                  insoluto de la obligación en el evento de retiro de FODUNpor cualquier causa.</p>
                <strong>Autorizo:</strong> <input name="autorizo" type="checkbox" value="1"
                  <?php if($_GET['mod']=="detalle_solicitud"){ echo 'checked="checked" '; } ?> required />
              </div>

              <br />
              <!-- <div class="titulo-seccion"><strong>Tratamiento de datos</strong></div>

                            <div align="justify" class="caja-formulario col-12">
                                <br>
                                <p>También declaro que he sido informado y que conozco los parámetros definidos en la <a
                                        href="http://www.FESDIS.com/page/conocenos/detalle/73/politica-de-proteccion-de-datos"
                                        target="_blank">política de tratamiento de datos personales</a>, la cual se
                                    encuentra publicado en la página web de FESDIS, <a href="https://www.FESDIS.com"
                                        target="_blank">www.FESDIS.com</a>. por lo anterior, autorizo el tratamiento de
                                    mis datos personales y el de mi núcleo básico familiar.</p>

                                <div align="left"><strong>Aceptación:</strong> <input name="autorizo2" type="checkbox"
                                        value="1"
                                        <?php if($_GET['mod']=="detalle_solicitud"){ echo 'checked="checked" '; } ?>
                                        required /></div>
                            </div> -->
              <div class="titulo-seccion"><strong>DECLARACIÓN DE ORIGEN DE FONDOS</strong></div>

              <div align="justify" class="caja-formulario col-12">
                <br>
                <p>Con el propósito de dar cumplimiento a lo señalado en la normatividad vigente de la Superintendencia
                  de la Economía Solidaria, Ley 1474 de 2011 (Estatuto Anticorrupción) y demás normas legales
                  concordantes, de manera voluntaria doy certeza a FODUNde la siguiente información:
                  A. No admitiré que terceros efectúen depósitos y/o transferencias de fondos a mi nombre provenientes
                  de actividades ilícitas contempladas en el Código penal colombiano o en cualquier norma que lo
                  modique o adicione, ni efectuaré transacciones destinadas a tales actividades o a favor de personas
                  relacionadas con las mismas.
                  B. Autorizo a terminar unilateralmente cualquier producto adquirido con FONDTODOS, en el caso de
                  infracción de cualquier de los numerales contenidos en este documento, eximiendo a FONDTODOSde toda
                  responsabilidad que se derive por información errónea, falsa e inexacta que hubiere proporcionado en
                  este documento, o de la violación del mismo.
                  C. Los recursos que manejo no provienen de ninguna actividad ilícita contemplada en el Código Penal
                  Colombiano o en cualquier norma que lo modique o adicione y por el contrario provienen de una
                  actividad lícita. (Detalle de ocupación, Ocio, profesión, actividad, etc.)
                  <?php echo $this->solicitud->origen_ingresos;?></p>

                <div align="left"><strong>Aceptación:</strong> <input name="autorizo2" type="checkbox" value="1"
                    <?php if($_GET['mod']=="detalle_solicitud"){ echo 'checked="checked" '; } ?> required /></div>
              </div>

              <br />


              <div class="titulo-seccion"><strong>DECLARACIÓN DE PEP ́S</strong></div>

              <div align="justify" class="caja-formulario col-12">
                <br>
                <div class="row my-2">
                  <div class="col-md-7">A. ¿Es una persona políticamente expuesta de acuerdo al Decreto 1674 de 2016?
                  </div>
                  <div class="col-md-1"><?php echo $this->solicitud->persona_expuesta;?></div>
                  <div class="col-md-4"><span style="color:#000">Indique:</span>
                    <?php echo $this->solicitud->persona_expuesta_indique;?></div>
                </div>

                <div class="row my-2">
                  <div class="col-md-7">B. ¿Representa legalmente a alguna organización internacional?</div>
                  <div class="col-md-1"><?php echo $this->solicitud->persona_internacional;?></div>
                  <div class="col-md-4"><span style="color:#000">Indique:</span>
                    <?php echo $this->solicitud->persona_internacional_indique;?></div>
                </div>

                <div class="row my-2">
                  <div class="col-md-7">C. ¿La sociedad y/o los medios lo reconocen como un personaje público?</div>
                  <div class="col-md-1"><?php echo $this->solicitud->persona_publica;?></div>
                  <div class="col-md-4"><span style="color:#000">Indique:</span>
                    <?php echo $this->solicitud->persona_publica_indique;?></div>
                </div>

                <div class="row my-2">
                  <div class="col-md-7">D. ¿Tiene algún vínculo con un PEP (Sociedad conyugal o vínculo familiar hasta
                    en
                    segundo grado de consanguinidad, segundo grado en anidad y primero Civil?</div>
                  <div class="col-md-1"><?php echo $this->solicitud->vinculo_pep;?></div>
                  <div class="col-md-4"><span style="color:#000">Indique:</span>
                    <?php echo $this->solicitud->vinculo_pep_indique;?></div>
                </div>

                <div class="row my-2">
                  <div class="col-md-7">E. ¿Es sujeto de obligaciones tributarias en otro país o grupo de países?</div>
                  <div class="col-md-1"><?php echo $this->solicitud->obligaciones_tributarias;?></div>
                  <div class="col-md-4"><span style="color:#000">Indique:</span>
                    <?php echo $this->solicitud->obligaciones_tributarias_indique;?></div>
                </div>



                <div align="left"><strong>Aceptación:</strong> <input name="autorizo3" type="checkbox" value="1"
                    <?php if($_GET['mod']=="detalle_solicitud"){ echo 'checked="checked" '; } ?> required /></div>
              </div>
              <div class="titulo-seccion"><strong>ACTUALIZACIÓN DE DATOS Y VERACIDAD EN LA INFORMACIÓN</strong></div>

              <div align="justify" class="caja-formulario col-12">
                <br>
                <p>La información por mi suministrada es veraz, completa y exacta y me obligo a suministrar y actualizar
                  como mínimo una vez por año todos los datos y documentos que FODUNme solicite para corroborar
                  la información suministrada en este formulario, con el n de asegurar el conocimiento del asociado. En
                  el evento de incumplir la información aquí
                  establecida, autorizo especialmente a FODUNa rechazar la apertura u otorgamiento de nuevos
                  productos nancieros y de ahorro y a bloquear los que a mi nombre se encuentren vigentes hasta tanto
                  conrme la información proporcionada en este formulario.</p>

                <div align="left"><strong>Aceptación:</strong> <input name="autorizo4" type="checkbox" value="1"
                    <?php if($_GET['mod']=="detalle_solicitud"){ echo 'checked="checked" '; } ?> required /></div>
              </div>
              <br />

            </div>


          </div>

        </div>
      </div>




      <?php if($_GET['mod']!="detalle_solicitud"){ ?>
      <div align="center"><input name="Anterior" type="button" value="Anterior" class="btn btn-azul d-none"
          onclick="window.location='/page/sistema/paso5/?id=<?php echo $this->id; ?>';" /> <input name="Enviar"
          type="submit" value="Siguiente" class="btn btn-verde d-inline-block" /></div><br>
      <?php }?>

      <input name="paso" type="hidden" value="6" />
      <input name="id" type="hidden" value="<?php echo $this->id; ?>" />
    </form>
  </div>