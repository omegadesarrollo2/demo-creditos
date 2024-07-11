<?php if($_GET["prueba"]==1){?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
.form-control {
  display: content !important;
}

.w-100 {
  width: 100%;
}

.titulo-seccion {
  font-size: 24px;
  font-weight: bold;
  color: #FFF;
  margin-bottom: 10px;
  margin-top: 20px;
  background: #EBF0F6;
  background: #88a231;
  padding: 10px;
  border-radius: 18px;
}

table,
th,
td {
  border: 1px solid black;
  border-collapse: collapse;
}

.row {
  margin-left: 0;
  margin-right: 0;
}

.row .col-xs-1,
.row .col-xs-2,
.row .col-xs-3,
.row .col-xs-4,
.row .col-xs-5,
.row .col-xs-6,
.row .col-xs-7,
.row .col-xs-8,
.row .col-xs-9,
.row .col-xs-10,
.row .col-xs-11,
.row .col-xs-12 {
  padding-left: 0;
  padding-right: 0;
}

.user_redondo {
  background: #66a3e0;
  border: 0;
  border-bottom-left-radius: 0px;
  border-bottom-right-radius: 0px;
  border-bottom: 2px #FFFFFF solid;
}

.page_break {
  page-break-before: always;
}

.tabla_sin,
.tabla_sin td,
.tabla_sin tr {
  border: #FFFFFF 1px solid white !important;
}

.caja-campo {
  background-color: #eee;
  padding: 6px 12px;
  border-radius: 4px;
  border: 1px solid #ccc;
  min-height: 34px;
}

.px {
  padding-left: 4px !important;
  padding-right: 4px !important;
}

.col-lg-3 {
  width: 22%;
  float: left;
}

.col-lg-4 {
  width: 32%;
  float: left;
}
</style>
<?php }?>

<div class="container">
  <htmlpageheader name="header">
    <div style="margin-left:15px"><img src='/skins/page/images/logo.png' width='250px' /></div>
  </htmlpageheader>
  <sethtmlpageheader name="header" page="all" value="on" show-this-page="1" />
  <div class="row">
    <?php if($this->get_monto == '1'){ ?>
    <div class="col-12">
      <div class="row justify-content-center titulo-seccion no-padding">Información solicitud de crédito</div>
      <div class="row form-group formulario caja-formulario">

        <div class="col-lg-4 px">
          <label>Linea de credito</label>
          <div class="caja-campo"><?php echo $this->lineas2->nombre; ?></div>
        </div>
        <div class="col-lg-4 px">
          <label>Valor solicitado</label>
          <div class="caja-campo"><?php echo number_format($this->get_solicitud->monto_solicitado); ?></div>
        </div>
        <div class="col-lg-3 px">
          <label>Plazo</label>
          <div class="caja-campo"><?php echo number_format($this->get_solicitud->cuotas); ?></div>
        </div>
        <div class="col-lg-3 px">
          <label>Compromiso de primas</label>
          <br>
          Si <span
            class="checkbox"><?php if($solicitud->cuotas_extra_desembolso && $solicitud->valor_extra_desembolso){ echo 'X'; }else{ echo '&nbsp;';} ?></span>
          No <span
            class="checkbox"><?php if(!$solicitud->cuotas_extra_desembolso && !$solicitud->valor_extra_desembolso){ echo 'X'; }else{ echo '&nbsp;';} ?></span>
        </div>
        <div class="col-lg-3 px">
          <label>Recoge saldos</label>
          <br>
          Si <span
            class="checkbox"><?php if($this->get_solicitud->recoger_credito == '1'){ echo 'X'; }else{ echo '&nbsp;';} ?></span>
          No <span
            class="checkbox"><?php if(!$this->get_solicitud->recoger_credito == '1'){ echo 'X'; }else{ echo '&nbsp;';} ?></span>
        </div>
        <!-- <div class="col-lg-4 px">
          <label>Compromiso de primas</label>
          <div class="caja-campo"><?php echo $this->get_solicitud->cuotas_extra_desembolso; ?></div>
        </div>
        <div class="col-lg-5 px">
          <label>Valor compromiso de primas</label>
          <div class="caja-campo"><?php echo number_format($this->get_solicitud->valor_extra_desembolso); ?></div>
        </div> -->
        <div class="col-lg-12 px">
          <label>Objetivo del crédito</label>
          <div class="caja-campo"><?php echo number_format($this->get_solicitud->destino); ?></div>
        </div>
        <!-- <div class="col-lg-5 px">
          <label>Valor recogido</label>
          <div class="caja-campo"><?php echo number_format($this->get_solicitud->valor_recogidos); ?></div>
        </div> -->
      </div>
    </div>
    <?php } ?>
    <div class="col-xs-12">
      <div class="row justify-content-center titulo-seccion no-padding">Información Personal</div>
      <div class="row form-group formulario caja-formulario">
        <div class="col-lg-3 px"><label>Primer nombre</label>
          <div class="caja-campo"><?php echo $this->nombres; ?></div>
        </div>
        <div class="col-lg-3 px"><label>Segundo nombre</label>
          <div class="caja-campo"><?php echo $this->nombres2; ?></div>
        </div>
        <div class="col-lg-3 px"><label>Primer apellido</label>
          <div class="caja-campo"><?php echo $this->apellido1; ?></div>
        </div>
        <div class="col-lg-3 px"><label>Segundo apellido</label>
          <div class="caja-campo"><?php echo $this->apellido2; ?></div>
        </div>

        <div class="col-lg-3 px"><label>Sexo</label><br>
          <div class="caja-campo"><?php if($this->sexo=="F"){ echo 'Femenino';} ?>
            <?php if($this->sexo=="M"){ echo 'Masculino';} ?></div>

        </div>
        <input type="hidden" name="sexo2" value="<?php echo $this->sexo; ?>">
        <div class="col-lg-3 px"><label>Tipo de identificación</label>
          <div class="caja-campo"><?php echo $this->tipo_documento; ?></div>
        </div>
        <input type="hidden" name="tipo_documento2" value="<?php echo $this->tipo_documento; ?>">
        <div class="col-lg-3 px"><label>Documento</label>
          <div class="caja-campo"><?php echo $this->documento; ?></div>
        </div>

        <div class="col-lg-3 px"><label>Fecha de expedición</label>
          <div class="caja-campo"><?php echo $this->fecha_documento; ?></div>
        </div>
        <input type="hidden" value="<?php echo $this->fecha_documento; ?>" name="fecha_documento2">
        <div class="col-lg-3 px"><label>Ciudad de expedición</label>

          <?php foreach ($this->ciudades as $ciudad){ ?>
          <?php if($this->ciudad_documento==$ciudad->codigo){  ?> <div class="caja-campo">
            <?php echo  (($ciudad->nombre)); ?></div> <?php }?>
          <?php }?>

        </div>
        <input type="hidden" value="<?php echo $ciudad->codigo; ?>" name="ciudad_documento2">

        <div class="col-lg-3 px"><label>Fecha nacimiento</label>
          <div class="caja-campo"><?php echo $this->fecha_nacimiento; ?></div>
        </div>
        <input type="hidden" value="<?php echo $this->fecha_nacimiento; ?>" name="fecha_nacimiento2">
        <div class="col-lg-2 px"><label>Edad</label>
          <div class="caja-campo"><?php echo $this->edad; ?></div>
        </div>
        <div class="col-12">
          <div id="error1"></div>
        </div>


        <div class="col-lg-4 px"><label>Correo electrónico personal</label>
          <div class="caja-campo"><?php echo $this->correo_personal; ?></div>
        </div>
        <input type="hidden" value="<?php echo $this->correo_personal; ?>" name="correo_personal2">

        <div class="col-lg-4 px"><label>Celular</label>
          <div class="caja-campo"><?php echo $this->celular; ?></div>
        </div>
        <input type="hidden" name="celular2" value="<?php echo $this->celular; ?>" class="form-control" maxlength="10"
          minlenght="10" min="1000000000" max="9999999999" />

        <div class="col-lg-5 px ">
          <label for="nivel_escolaridad">Nivel de estudios </label>
          <div class="caja-campo"><?php echo $this->nivel_escolaridad; ?></div>
        </div>
        <div class="col-lg-3 px">
          <label for="personas_cargo">Personas a cargo </label>
          <div class="caja-campo"><?php echo $this->personas_cargo; ?></div>

        </div>

        <div class="col-lg-6 px">
          <label>Dirección residencia</label>

          <div class="caja-campo">
            <?php foreach ($this->nomenclaturas as $key => $value): ?><?php if($value->codigo==$this->nomenclatura2){ ?><?php echo codificar($value->nombre); ?><?php }?><?php endforeach ?>
            <?php echo $this->direccion_residencia; ?></div>


        </div>

        <div class="col-lg-3 px"><label>Barrio</label>
          <div class="caja-campo"><?php echo $this->barrio; ?></div>
        </div>
        <input type="hidden" name="barrio2" value="<?php echo $this->barrio; ?>" />

        <div class="col-lg-3 px"><label>Ciudad de Residencia</label>

          <?php foreach ($this->ciudades as $ciudad): ?>
          <?php if($this->ciudad_residencia==$ciudad->codigo){ ?> <div class="caja-campo">
            <?php echo (($ciudad->nombre)); ?></div><?php }?>
          <?php endforeach ?>

        </div>
        <input type="hidden" name="ciudad_residencia2" value="<?php echo $this->ciudad_residencia; ?>" />
        <div class="col-lg-3 px"><label>Teléfono fijo residencia</label>
          <div class="caja-campo"><?php echo $this->telefono; ?></div>
        </div>
        <input type="hidden" name="telefono2" value="<?php echo $this->telefono; ?>" />


        <div class="col-lg-3 px">
          <label>Estado civil</label>
          <div class="caja-campo"><?php echo $this->estado_civil; ?></div>
        </div>
        <input type="hidden" name="estado_civil2" value="<?php echo $this->estado_civil; ?>" />
        <div class="col-lg-3 px">
          <label for="tipo_vivienda">Tipo de vivienda</label>
          <div class="caja-campo"><?php echo $this->tipo_vivienda; ?></div>
        </div>
        <div class="col-md-3 ">
          <label for="estrato">Estrato</label>
          <div class="caja-campo"><?php echo $this->estrato; ?></div>
        </div>
      </div>
      <div class="row justify-content-center titulo-seccion no-padding">Información Laboral</div>
      <div class="row form-group formulario caja-formulario">


        <div class="col-lg2-4 px"><label>Entidad</label>
          <div class="caja-campo"><?php echo $this->empresa; ?></div>
        </div>

        <div class="col-lg2-4 px"><label>Dependencia/Área</label> <input type="hidden" name="dependencia2"
            id="dependencia" value="<?php echo $this->dependencia; ?>" class="form-control" />

          <div class="caja-campo"><?php  echo $this->dependencia; ?></div>
        </div>



        <div class="col-lg2-4 px"><label>Regional</label>


          <?php foreach ($this->regionales as $key => $value): ?>
          <?php if($value->id==$this->regional){  ?> <div class="caja-campo"><?php  echo ($value->nombre); ?></div>
          <?php }?>
          <?php endforeach ?>



        </div>

        <div class="col-lg-3 px"><label>Ciudad oficina</label>
          <?php foreach ($this->ciudades as $ciudad): ?>
          <?php if($this->ciudad_oficina==$ciudad->codigo){  ?><div class="caja-campo">
            <?php echo  (($ciudad->nombre)); ?></div> <?php }?>
          <?php endforeach ?>
          <input type="hidden" name="ciudad_oficina2" id="ciudad_oficina2" value="<?php echo $this->ciudad_oficina; ?>"
            class="form-control" />

        </div>

        <div class="col-lg-3 px"><label>Teléfono fijo oficina</label>
          <div class="caja-campo"><?php  echo $this->telefono_oficina; ?></div>
        </div>

        <div class="col-lg-4 px"><label>Correo electrónico empresarial</label>
          <div class="caja-campo"><?php  echo $this->correo_empresarial; ?></div>
        </div>

        <div class="col-lg-2 px"><label>Fecha ingreso</label>
          <div class="caja-campo"><?php  echo $this->fecha_ingreso; ?></div>
        </div>

        <div class="col-lg-3 px"><label>Cargo</label>
          <div class="caja-campo"><?php  echo $this->cargo; ?></div>
        </div>



        <div class="col-lg-3 px">
          <label>Tipo de contrato</label>
          <div class="caja-campo"><?php  echo $this->situacion_laboral; ?></div>


          <input type="hidden" name="situacion_laboral2" class="form-control"
            value="<?php  echo $this->situacion_laboral;  ?>">
        </div>

        <div class="col-lg-3 px"><label>CIIU</label>
          <div class="caja-campo"><?php  echo $this->ciiu; ?></div>
        </div>
        <!-- <div class="col-xs-3"><label>Salario</label> <input type="number" name="salario" id="salario" value="<?php echo $this->salario; ?>" required class="form-control"  /></div> -->

      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <div class="row form-group formulario caja-formulario cuenta-bancaria">
        <?php if($this->get_monto == '1'){ ?>
          <div class="col-12">
            <div class="row justify-content-center titulo-seccion no-padding">Información Financiera</div>
            <div class="row form-group formulario caja-formulario">
              <div class="col-lg-3 px">
                <label>Ingreso/Salario mensual</label>
                <div class="caja-campo"><?php echo number_format($this->infoUser->salario); ?></div>
              </div>
              <div class="col-lg-3 px">
                <label>Otros ingresos mensuales</label>
                <div class="caja-campo"><?php echo number_format($this->infoUser->otros_ingresos); ?></div>
              </div>
              <div class="col-lg-6 px">
                <label>Detalle de otros ingresos mensuales</label>
                <div class="caja-campo"><?php $this->infoUser->concepto_otros_ingresos ?></div>
              </div>
              <div class="col-lg-3 px">
                <label>Total ingreso mensual</label>
                <div class="caja-campo"><?php echo number_format($this->infoUser->ingresos_mensuales); ?></div>
              </div>
              <div class="col-lg-3 px">
                <label>Total egreso mensual</label>
                <div class="caja-campo"><?php echo number_format($this->infoUser->egresos_mensuales); ?></div>
              </div>
              <div class="col-lg-3 px">
                <label>Total activo</label>
                <div class="caja-campo"><?php echo number_format($this->infoUser->activos); ?></div>
              </div>
              <div class="col-lg-3 px">
                <label>Total pasivo</label>
                <div class="caja-campo"><?php echo number_format($this->infoUser->pasivos); ?></div>
              </div>
              <div class="col-lg-3 px">
                <label>Total patrimonio</label>
                <div class="caja-campo"><?php echo number_format($this->infoUser->patrimonio); ?></div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="row justify-content-center titulo-seccion no-padding">Referencias Familiares</div>
            <div class="row form-group formulario caja-formulario">
              <?php foreach($this->refFamiliares as $keyRef => $ref){ ?>
                <div class="col-lg-6 px">
                  <label><?php echo $keyRef + 1; ?>. Nombre(s) Apellido(s)</label>
                  <div class="caja-campo"><?php echo $ref->nombres; ?></div>
                </div>
                <div class="col-lg-2 px">
                  <label>Parentesco</label>
                  <div class="caja-campo"><?php echo $ref->parentesco; ?></div>
                </div>
                <div class="col-lg-4 px">
                  <label>Dirección/Barrio</label>
                  <div class="caja-campo"><?php echo $ref->direccion; ?></div>
                </div>
                <div class="col-lg-3 px">
                  <label>Ciudad/Departamento</label>
                  <div class="caja-campo"><?php echo $this->ciudadesUser[$ref->ciudad]; ?></div>
                </div>
                <div class="col-lg-3 px">
                  <label>Teléfono fijo/celular</label>
                  <div class="caja-campo"><?php echo $ref->celular; ?></div>
                </div>
                <div class="col-lg-6 px">
                  <label>Correo electrónico</label>
                  <div class="caja-campo"><?php echo $ref->correo; ?></div>
                </div>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="row justify-content-center  titulo-seccion no-padding cuenta-bancaria">Información Bancaria (Para
        desembolso)</div>
      <div class="row form-group formulario caja-formulario cuenta-bancaria">




        <div class="col-lg-3 px">
          <label>Cuenta Bancaria No</label>
          <div class="caja-campo"><?php  echo $this->cuenta_numero; ?></div>
        </div>

        <div class="col-lg-3 px">
          <label>Tipo de cuenta</label>
          <div class="caja-campo"><?php  echo $this->cuenta_tipo; ?></div>

        </div>

        <div class="col-lg-3 px">
          <label>Entidad bancaria</label>
          <div class="caja-campo"><?php  echo $this->entidad_bancaria; ?></div>

        </div>
      </div>

    </div>
    <pagebreak />
    <sethtmlpageheader name="header" page="all" value="on" show-this-page="1" />
    <div class="row justify-content-center  titulo-seccion no-padding" style="text-align:center;">Autorización</div>
    <div class="row form-group formulario caja-formulario py-4">
      <div class="col-lg-12 px">
        <p> Autorizo irrevocablemente a mi empleador para descontar de mi salario y demás emolumentos a mi favor, y
          pagar a favor de FODUNlas sumas que mensualmente se causen como
          consecuencia de obligaciones económicas adquiridas, dentro de los límites legales autorizados. De la misma
          forma autorizo para que con fines de control de mi capacidad de pago y
          tratamiento de datos personales, mi empleador o entidad pagadora y FODUNse compartan entre sí la
          información relativa a mi salario, honorarios, devengos, créditos, descuentos y
          datos personales. La presente autorización se extiende en el evento que llegaré a cambiar de empleador o
          entidad pagadora en los términos del artículo 7° de la Ley 1527 de 2012,
          permitiendo a FODUNexigir al nuevo empleador o entidad pagadora el descuento de los dineros que se causen a
          mi favor, pudiendo descontarse hasta el 50% de mi salario, pensión
          u honorarios, en los términos que dan cuenta el artículo 55° del Decreto 1481 de 1989, con el fin de pagar los
          saldos insolutos ami cargo.</p>



        <p> Igualmente, Autorizo irrevocablemente a FODUNpara: (I) Consultar, reportar y procesar mi comportamiento
          crediticio, financiero o comercial ante las Centrales de Información
          Financiera legalmente constituidas, ya sea nacionales o extranjeras, así como ante cualquier entidad que
          administre o maneje bases de datos. En general, la presente autorización
          comprende la facultad para realizar cualquier tratamiento lícito de mis datos personales, comerciales y
          financieros, conforme a la Ley 1581 del 2012. (II) En el evento de la terminación de

          mi(nuestro) contrato de trabajo, se retenía de la liquidación definitiva de la relación laboral, cesantías,
          intereses de cesantías, prima, vacaciones e indemnizaciones, las sumas correspon-
          dientes al saldo insoluto de la obligación a mi(nuestro) cargo, en los términos que dan cuenta el artículo 55°
          y 56° del Decreto 1481 de 1989. (III) Compensar contra mis aportes el saldo

          Insoluto de la obligación en el evento de retiro de FODUNpor cualquier causa.</p>
        <!-- <div style="text-align:center;">Autorizo: <span style="height:40px;width:40px;"><img src="/corte/ok.png" /></span></div> -->
      </div>
    </div>

    <div class="row justify-content-center  titulo-seccion no-padding" style="text-align:center;">DECLARACIÓN DE ORIGEN
      DE FONDOS</div>
    <div class="row form-group formulario caja-formulario py-4">
      <div class="col-lg-12 px">

        Con el propósito de dar cumplimiento a lo señalado en la normatividad vigente de la Superintendencia de la
        Economía Solidaria, Ley 1474 de 2011 (Estatuto Anticorrupción) y demás normas legales concordantes, de manera
        voluntaria doy certeza a FODUNde la siguiente información: A. No admitiré que terceros efectúen depósitos y/o
        transferencias de fondos a mi nombre provenientes de actividades ilícitas contempladas en el Código penal
        colombiano o en cualquier norma que lo modique o adicione, ni efectuaré transacciones destinadas a tales
        actividades o a favor de personas relacionadas con las mismas. B. Autorizo a terminar unilateralmente cualquier
        producto adquirido con FONDTODOS, en el caso de infracción de cualquier de los numerales contenidos en este
        documento, eximiendo a FONDTODOSde toda responsabilidad que se derive por información errónea, falsa e inexacta
        que hubiere proporcionado en este documento, o de la violación del mismo. C. Los recursos que manejo no
        provienen de ninguna actividad ilícita contemplada en el Código Penal Colombiano o en cualquier norma que lo
        modique o adicione y por el contrario provienen de una actividad lícita. (Detalle de ocupación, Ocio, profesión,
        actividad, etc.)
        <?php echo $this->origen_ingresos;?>
        <!-- <div style="text-align:center;">Autorizo: <span style="height:40px;width:40px;"><img src="/corte/ok.png" /></span></div> -->
      </div>
    </div>

    <div class="row justify-content-center  titulo-seccion no-padding" style="text-align:center;">DECLARACIÓN DE PEP'S
    </div>
    <div class="row form-group formulario caja-formulario py-4">
      <div class="col-lg-12 px">
        <div class="col-lg-6 px">
          <label>A. ¿Es una persona políticamente expuesta de acuerdo al Decreto 1674 de 2016?</label>
        </div>
        <div class="col-lg-2 px align-self-center">
          <div class="caja-campo"><?php  echo $this->persona_expuesta; ?></div>
        </div>
        <div class="col-lg-4 px align-self-center">
          <div class="caja-campo"><?php  echo $this->persona_expuesta_indique; ?></div>
        </div>

        <div class="col-lg-6 px mb-3">
          <label>B. ¿Representa legalmente a alguna organización internacional?</label>
        </div>
        <div class="col-lg-2 px mb-3 align-self-center">
          <div class="caja-campo"><?php  echo $this->persona_internacional; ?></div>
        </div>
        <div class="col-lg-4 px mb-3 align-self-center">
          <div class="caja-campo"><?php  echo $this->persona_internacional_indique; ?></div>
        </div>

        <div class="col-lg-6 px">
          <label>C. ¿La sociedad y/o los medios lo reconocen como un personaje público?</label>
        </div>
        <div class="col-lg-2 px align-self-center">
          <div class="caja-campo"><?php  echo $this->persona_publica; ?></div>

        </div>
        <div class="col-lg-4 px align-self-center">
          <div class="caja-campo"><?php  echo $this->persona_publica_indique; ?></div>
        </div>

        <div class="col-lg-6 px">
          <label>D. ¿Tiene algún vínculo con un PEP (Sociedad conyugal o vínculo familiar hasta en
            segundo grado de consanguinidad, segundo grado en anidad y primero Civil?</label>
        </div>
        <div class="col-lg-2 px align-self-center">
          <?php //echo $this->vinculo_pep?>
          <div class="caja-campo"><?php  echo $this->vinculo_pep; ?></div>

        </div>
        <div class="col-lg-4 px align-self-center">
          <div class="caja-campo"><?php  echo $this->vinculo_pep_indique; ?></div>
        </div>


        <div class="col-lg-6 px">
          <label>E. ¿Es sujeto de obligaciones tributarias en otro país o grupo de países?</label>
        </div>
        <div class="col-lg-2 px align-self-center">
          <div class="caja-campo"><?php  echo $this->obligaciones_tributarias; ?></div>
        </div>
        <div class="col-lg-4 px align-self-center">
          <div class="caja-campo"><?php  echo $this->obligaciones_tributarias_indique; ?></div>
        </div>
        <div style="text-align:center;">Autorizo: <span style="height:40px;width:40px;"><img
              src="/corte/ok.png" /></span></div>
      </div>
    </div>
    <pagebreak />
    <sethtmlpageheader name="header" page="all" value="on" show-this-page="1" />

    <div class="row justify-content-center  titulo-seccion no-padding" style="text-align:center;">ACTUALIZACIÓN DE DATOS
      Y VERACIDAD EN LA INFORMACIÓN
    </div>
    <div class="row form-group formulario caja-formulario py-4">
      <div class="col-lg-12 px">
        La información por mi suministrada es veraz, completa y exacta y me obligo a suministrar y actualizar como
        mínimo una vez por año todos los datos y documentos que FODUNme solicite para corroborar la información
        suministrada en este formulario, con el n de asegurar el conocimiento del asociado. En el evento de incumplir la
        información aquí establecida, autorizo especialmente a FODUNa rechazar la apertura u otorgamiento de nuevos
        productos nancieros y de ahorro y a bloquear los que a mi nombre se encuentren vigentes hasta tanto conrme la
        información proporcionada en este formulario.
        <div style="text-align:center;">Autorizo: <span style="height:40px;width:40px;"><img
              src="/corte/ok.png" /></span></div>
      </div>
    </div>
    <table
      style="width: 100%; margin: auto; margin-top: 20px; margin-bottom: 20px; text-align: center; font-size: 14px; color: #88a231;border:none">

      <tr>
        <td style="border:none">
          Firmado electrónicamente por:
        </td>
        <?php if($this->codeudor){ ?>
          <td style="border:none">
            Firmado electrónicamente por:
          </td>
        <?php } ?>
      </tr>
      <tr>
        <td style="border:none">
          Nombre: <?php echo $this->nombres.' '.$this->nombres2.' '.$this->apellido1.' '.$this->apellido2 ?>
        </td>
        <?php if($this->codeudor){ ?>
          <td style="border:none">
            Nombre: <?php echo $this->codeudor->nombres.' '.$this->codeudor->nombres2.' '.$this->codeudor->apellido1.' '.$this->codeudor->apellido2 ?>
          </td>
        <?php } ?>
      </tr>
      <tr>
        <td style="border:none">
          <?php echo $this->tipo_documento.' '.$this->documento ?>
        </td>
        <?php if($this->codeudor){ ?>
          <td style="border:none">
            <?php echo $this->codeudor->tipo_documento.' '.$this->codeudor->documento ?>
          </td>
        <?php } ?>
      </tr>
      <?php if($this->pagares->fecha_firma){ ?>
      <tr>
        <td style="border:none">
          Fecha: <?php echo $this->pagares->fecha_firma ?>
        </td>
        <?php if($this->codeudor){ ?>
          <td style="border:none">
            Fecha: <?php echo $this->pagares->fecha_firma ?>
          </td>
        <?php } ?>
      </tr>
      <?php } ?>
      <tr>
        <td style="border:none">
          En calidad de: Asociado
        </td>
        <?php if($this->codeudor){ ?>
          <td style="border:none">
            En calidad de: Codeudor
          </td>
        <?php } ?>
      </tr>
    </table>

  </div>
</div>