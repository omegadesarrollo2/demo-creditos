<?php
function capital($x){
	$x = mb_strtolower($x);
	$x = ucfirst($x);
	return $x;
}
?>
<div class="container" id="emb_paso_1" <?php if($this->get_monto == '1'){ ?> style="width: 95%;" <?php } ?>>
  <div class="row">
    <?php if($this->get_monto == '1'){ ?>
    <div class="col-12">
      <div class="row justify-content-center titulo-seccion no-padding">Información solicitud de crédito</div>
      <div class="row form-group formulario caja-formulario">
        <div class="col-md-4 col-lg-4">
          <label>Linea de credito</label>
          <input type="text" name="nombres" id="nombres" value="<?php echo $this->lineas2->nombre; ?>" required
            readonly="readonly" class="form-control" />
        </div>
        <div class="col-md-4 col-lg-4">
          <label>Valor solicitado</label>
          <input type="text" name="nombres" id="nombres"
            value="<?php echo number_format($this->get_solicitud->monto_solicitado); ?>" required readonly="readonly"
            class="form-control" />
        </div>
        <div class="col-md-4 col-lg-4">
          <label>Plazo</label>
          <input type="text" name="nombres" id="nombres"
            value="<?php echo number_format($this->get_solicitud->cuotas); ?>" required readonly="readonly"
            class="form-control" />
        </div>
        <div class="col-md-6 col-lg-4">
          <label>Compromiso de primas</label>
          <div>
            Si <input type="checkbox" name="" id=""
              <?php if($this->get_solicitud->cuotas_extra_desembolso && $this->get_solicitud->valor_extra_desembolso){ echo 'checked'; }?>>
            No <input type="checkbox" name="" id=""
              <?php if(!$this->get_solicitud->cuotas_extra_desembolso && !$this->get_solicitud->valor_extra_desembolso){ echo 'checked'; }?>>
          </div>
        </div>
        <!-- <div class="col-md-6 col-lg-4">
          <label>Compromiso de primas</label>
          <input type="text" name="nombres" id="nombres"
            value="<?php echo $this->get_solicitud->cuotas_extra_desembolso; ?>" required readonly="readonly"
            class="form-control" />
        </div>
        <div class="col-md-6 col-lg-4">
          <label>Valor compromiso de primas</label>
          <input type="text" name="nombres" id="nombres"
            value="<?php echo number_format($this->get_solicitud->valor_extra_desembolso); ?>" required
            readonly="readonly" class="form-control" />
        </div> -->
        <div class="col-md-6 col-lg-4">
          <label>Recoge saldos</label>
          <div>
            Si <input type="checkbox" name="" id=""
            <?php if($this->get_solicitud->recoger_credito == '1'){ echo 'checked'; }?>>
            No <input type="checkbox" name="" id=""
            <?php if(!$this->get_solicitud->recoger_credito == '1'){ echo 'checked'; }?>>
          </div>
        </div>
        <!-- <div class="col-md-6 col-lg-4">
          <label>Valor recogido</label>
          <input type="text" name="nombres" id="nombres"
            value="<?php echo number_format($this->get_solicitud->valor_recogidos); ?>" required
            readonly="readonly" class="form-control" />
        </div> -->
        <?php
        echo '<pre>';
          print_r($solicitud);
        echo '</pre>';
        ?>
      </div>
    </div>
    <?php } ?>
    <div class="col-12">
      <div class="row justify-content-center titulo-seccion no-padding">Información Personal</div>
      <div class="row form-group formulario caja-formulario">
        <div class="col-md-6 col-lg-3"><label>Primer nombre</label> <input type="text" name="nombres" id="nombres"
            value="<?php echo $this->nombres; ?>" required readonly="readonly" class="form-control" /></div>
        <div class="col-md-6 col-lg-3"><label>Segundo nombre</label> <input type="text" name="nombres2" id="nombres2"
            value="<?php echo $this->nombres2; ?>" required readonly="readonly" class="form-control" /></div>
        <div class="col-md-6 col-lg-3"><label>Primer apellido</label> <input type="text" name="apellido1" id="apellido1"
            value="<?php echo $this->apellido1; ?>" required readonly="readonly" class="form-control" /></div>
        <div class="col-md-6 col-lg-3"><label>Segundo apellido</label> <input type="text" name="apellido2"
            id="apellido2" value="<?php echo $this->apellido2; ?>" required readonly="readonly" class="form-control" />
        </div>

        <div class="col-md-6 col-lg-3"><label>Sexo</label>
          <select name="sexo" class="form-control" required>
            <option value="" <?php if($this->sexo==""){ echo 'selected';} ?>></option>
            <option value="F" <?php if($this->sexo=="F"){ echo 'selected';} ?>>Femenino</option>
            <option value="M" <?php if($this->sexo=="M"){ echo 'selected';} ?>>Masculino</option>
          </select>
        </div>
        <input type="hidden" name="sexo2" value="<?php echo $this->sexo; ?>">
        <div class="col-md-6 col-lg-3"><label>Tipo de identificación</label>
          <select name="tipo_documento" class="form-control" required>
            <option value="" <?php if($this->tipo_documento==""){ echo 'selected';} ?>></option>
            <option value="CC" <?php if($this->tipo_documento=="CC"){ echo 'selected';} ?>>CC</option>
            <option value="CE" <?php if($this->tipo_documento=="CE"){ echo 'selected';} ?>>CE</option>
            <option value="Pasaporte" <?php if($this->tipo_documento=="Pasaporte"){ echo 'selected';} ?>>Pasaporte
            </option>
            <option value="Otro" <?php if($this->tipo_documento=="Otro"){ echo 'selected';} ?>>Otro</option>
          </select>
        </div>
        <input type="hidden" name="tipo_documento2" value="<?php echo $this->tipo_documento; ?>">
        <div class="col-md-6 col-lg-3"><label>Documento</label> <input type="text" name="documento" id="documento"
            value="<?php echo $this->documento; ?>" readonly required class="form-control" /></div>

        <div class="col-md-6 col-lg-3"><label>Fecha de expedición</label> <input type="date" name="fecha_documento"
            id="fecha_documento" value="<?php echo $this->fecha_documento; ?>" required class="form-control"
            onchange="validar_fecha_expedicion();" /></div>
        <input type="hidden" value="<?php echo $this->fecha_documento; ?>" name="fecha_documento2">
        <div class="col-md-6 col-lg-3"><label>Ciudad de expedición</label>
          <select name="ciudad_documento" id="ciudad_documento" required class="form-control">
            <?php foreach ($this->ciudades as $ciudad): ?>
            <option value="<?php echo $ciudad->codigo; ?>"
              <?php if($this->ciudad_documento==$ciudad->codigo){ echo 'selected'; } ?>>
              <?php echo  (capital($ciudad->nombre))." (".($ciudad->departamento).")"; ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <input type="hidden" value="<?php echo $ciudad->codigo; ?>" name="ciudad_documento2">
        <div class="col-md-6 col-lg-3"><label>Fecha nacimiento</label> <input type="date" name="fecha_nacimiento"
            id="fecha_nacimiento" value="<?php echo $this->fecha_nacimiento; ?>"
            max="<?php echo (date("Y")-18).date("-m-d"); ?>" required class="form-control" onchange="calcularEdad();" />
        </div>
        <input type="hidden" value="<?php echo $this->fecha_nacimiento; ?>" name="fecha_nacimiento2">
        <div class="col-md-6 col-lg-3"><label>Edad</label> <input type="text" name="edad" id="edad"
            value="<?php echo $this->edad; ?>" readonly class="form-control" /></div>
        <div class="col-12">
          <div id="error1"></div>
        </div>


        <div class="col-md-6 col-lg-3"><label>Correo electrónico personal</label> <input type="email"
            name="correo_personal" id="correo_personal" required class="form-control"  value="<?php echo $this->correo_personal; ?>"/></div>
        <input type="hidden" value="<?php echo $this->correo_personal; ?>" name="correo_personal2">

        <div class="col-md-6 col-lg-3"><label>Celular</label> <input type="number" name="celular" id="celular"
            value="<?php echo $this->celular; ?>" required class="form-control" maxlength="10" minlenght="10"
            min="1000000000" max="9999999999" /></div>
        <input type="hidden" name="celular2" value="<?php echo $this->celular; ?>" class="form-control" maxlength="10"
          minlenght="10" min="1000000000" max="9999999999" />

        <div class="col-md-3 ">
          <label for="nivel_escolaridad">Nivel de estudios </label>
          <select class="form-control" id="nivel_escolaridad" name="nivel_escolaridad" required>
            <option value="" <?php if (!$this->estudios){ ?> selected<?php }?>>Seleccione...</option>
            <option value="Ninguno" <?php if ($this->nivel_escolaridad=="Ninguno"){ ?> selected<?php }?>>Ninguno</option>
            <option value="Primaria" <?php if ($this->nivel_escolaridad=="Primaria"){ ?> selected<?php }?>>Primaria</option>
            <option value="Secundaria" <?php if ($this->nivel_escolaridad=="Secundaria"){ ?> selected<?php }?>>secundaria
            </option>
            <option value="Bachillerato" <?php if ($this->nivel_escolaridad=="Bachillerato"){ ?> selected<?php }?>>Bachillerato
            </option>
            <option value="Técnico" <?php if ($this->nivel_escolaridad=="Técnico"){ ?> selected<?php }?>>Técnico</option>
            <option value="Tecnólogo" <?php if ($this->nivel_escolaridad=="Tecnólogo"){ ?> selected<?php }?>>Tecnólogo</option>
            <option value="Pregrado" <?php if ($this->nivel_escolaridad=="Pregrado"){ ?> selected<?php }?>>Pregrado</option>
            <option value="Posgrado" <?php if ($this->nivel_escolaridad=="Posgrado"){ ?> selected<?php }?>>Posgrado</option>
            <option value="Especialización" <?php if ($this->nivel_escolaridad=="Especialización"){ ?> selected<?php }?>>
              Especialización</option>
          </select>
        </div>
        <div class="col-md-3 ">
          <label for="personas_cargo">Personas a cargo </label>
          <select class="form-control" id="personas_cargo" name="personas_cargo" required>
            <option value="" <?php if (!$this->personas_cargo){ ?> selected<?php }?>>Seleccione...</option>
            <option value="Ninguna" <?php if ($this->personas_cargo=="Ninguna"){ ?> selected<?php }?>>Ninguna</option>
            <option value="Adultos" <?php if ($this->personas_cargo=="Adultos"){ ?> selected<?php }?>>Adultos</option>
            <option value="Menores de 18 años" <?php if ($this->personas_cargo=="Menores de 18 años"){ ?>
              selected<?php }?>>Menores de 18 años</option>
          </select>
        </div>

        <div class="col-md-6 col-lg-6">
          <label>Dirección residencia</label>
          <div class="row">
            <div class="col-lg-6 d-none">
              <select name="nomenclatura2" id="nomenclatura2" class="form-control">
                <option value="">Nomenclatura</option>
                <?php foreach ($this->nomenclaturas as $key => $value): ?>
                <option value="<?php echo $value->codigo; ?>"
                  <?php if($value->codigo==$this->nomenclatura2){ echo 'selected'; } ?>>
                  <?php echo codificar($value->nombre); ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-lg-12">
              <input type="text" name="direccion_residencia" id="direccion_residencia"
                value="<?php echo $this->direccion_residencia; ?>" required class="form-control"
                placeholder="Complemento dirección" />
              <input type="hidden" name="direccion_residencia2" value="<?php echo $this->direccion_residencia; ?>" />
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3"><label>Barrio</label> <input type="text" name="barrio" id="barrio"
            value="<?php echo $this->barrio; ?>" required class="form-control" /></div>
        <input type="hidden" name="barrio2" value="<?php echo $this->barrio; ?>" />

        <div class="col-md-6 col-lg-3"><label>Ciudad de Residencia</label>
          <select name="ciudad_residencia" id="ciudad_residencia" required class="form-control">
            <?php foreach ($this->ciudades as $ciudad): ?>
            <option value="<?php echo $ciudad->codigo; ?>"
              <?php if($this->ciudad_residencia==$ciudad->codigo){ echo 'selected'; } ?>>
              <?php echo (capital($ciudad->nombre))." (".($ciudad->departamento).")"; ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <input type="hidden" name="ciudad_residencia2" value="<?php echo $this->ciudad_residencia; ?>" />
        <div class="col-md-6 col-lg-3"><label>Teléfono fijo residencia</label> <input type="number" name="telefono"
            id="telefono" value="<?php echo $this->telefono; ?>" class="form-control" /></div>
        <input type="hidden" name="telefono2" value="<?php echo $this->telefono; ?>" />


        <div class="col-md-6 col-lg-3">
          <label>Estado civil</label>
          <select name="estado_civil" id="estado_civil" class="form-control" onchange="validar_conyuge();" required>
            <option value="" <?php if($this->estado_civil==""){ echo 'selected';} ?>></option>
            <option value="SOLTERO-A" <?php if($this->estado_civil=="SOLTERO-A"){ echo 'selected';} ?>>Soltero(a)
            </option>
            <option value="CASADO-A" <?php if($this->estado_civil=="CASADO-A"){ echo 'selected';} ?>>Casado(a)</option>
            <option value="DIVORCIADO-A" <?php if($this->estado_civil=="DIVORCIADO-A"){ echo 'selected';} ?>>Separado(a)
            </option>
            <option value="VIUDO-A" <?php if($this->estado_civil=="VIUDO-A"){ echo 'selected';} ?>>Viudo(a)</option>
            <option value="UNION LIBRE" <?php if($this->estado_civil=="UNIONLIBRE"){ echo 'selected';} ?>>Unión libre
            </option>
          </select>
        </div>
        <input type="hidden" name="estado_civil2" value="<?php echo $this->estado_civil; ?>" />
        <div class="col-md-3 ">
          <label for="tipo_vivienda">Tipo de vivienda</label>
          <select class="form-control" id="tipo_vivienda" name="tipo_vivienda" required>
            <option value="" <?php if (!$this->tipo_vivienda){ ?> selected<?php }?>>Seleccione...</option>
            <option value="Propia" <?php if ($this->tipo_vivienda=="Propia"){ ?> selected<?php }?>>Propia</option>
            <option value="Alquilada" <?php if ($this->tipo_vivienda=="Alquilada"){ ?> selected<?php }?>>Alquilada
            </option>
            <option value="Familiar" <?php if ($this->tipo_vivienda=="Familiar"){ ?> selected<?php }?>>Familiar</option>
          </select>
        </div>
        <div class="col-md-3 ">
          <label for="estrato">Estrato</label>
          <select class="form-control" id="estrato" name="estrato" required>
            <option value="" <?php if (!$this->estrato){ ?> selected<?php }?>>Seleccione...</option>
            <option value="1" <?php if ($this->estrato=="1"){ ?> selected<?php }?>>1</option>
            <option value="2" <?php if ($this->estrato=="2"){ ?> selected<?php }?>>2</option>
            <option value="3" <?php if ($this->estrato=="3"){ ?> selected<?php }?>>3</option>
            <option value="4" <?php if ($this->estrato=="4"){ ?> selected<?php }?>>4</option>
            <option value="5" <?php if ($this->estrato=="5"){ ?> selected<?php }?>>5</option>
          </select>
        </div>
      </div>
      <div class="row justify-content-center titulo-seccion no-padding">Información Laboral</div>
      <div class="row form-group formulario caja-formulario">


        <div class="col-md-6 col-lg-4"><label>Entidad</label> <input type="hidden" name="empresa2" id="empresa"
            value="<?php echo $this->empresa; ?>" class="form-control" />
          <input type="text" name="empresa" id="empresa" value="<?php echo $this->empresa; ?>" class="form-control" />
        </div>

        <div class="col-md-6 col-lg-4"><label>Dependencia/Área</label> <input type="hidden" name="dependencia2"
            id="dependencia" value="<?php echo $this->dependencia; ?>" class="form-control" />
          <select name="dependencia" id="dependencia" class="form-control" required>
            <option value="">Seleccione...</option>
            <option value="Administrativo" <?php if("Administrativo"==$this->dependencia){ echo 'selected'; } ?>>
              Administrativo</option>
            <option value="Cedi" <?php if("Cedi"==$this->dependencia){ echo 'selected'; } ?>>Cedi</option>
            <option value="Ventas" <?php if("Ventas"==$this->dependencia){ echo 'selected'; } ?>>Ventas</option>
          </select>
        </div>



        <div class="col-md-6 col-lg-4"><label>Regional</label>

          <select name="regional" id="regional" class="form-control" required>
            <option value="">Seleccione...</option>
            <?php foreach ($this->regionales as $key => $value): ?>
            <option value="<?php echo $value->id; ?>" <?php if($value->id==$this->regional){ echo 'selected'; } ?>>
              <?php echo ($value->nombre); ?></option>
            <?php endforeach ?>
          </select>


        </div>

        <div class="col-md-6 col-lg-3"><label>Ciudad oficina</label>
          <select name="ciudad_oficina" id="ciudad_oficina" required class="form-control">
            <?php foreach ($this->ciudades as $ciudad): ?>
            <option value="<?php echo $ciudad->codigo; ?>"
              <?php if($this->ciudad_oficina==$ciudad->codigo){ echo 'selected'; } ?>>
              <?php echo  (capital($ciudad->nombre))." (".($ciudad->departamento).")"; ?></option>
            <?php endforeach ?>
          </select>
          <input type="hidden" name="ciudad_oficina2" id="ciudad_oficina2" value="<?php echo $this->ciudad_oficina; ?>"
            class="form-control" />

        </div>

        <div class="col-md-6 col-lg-3"><label>Teléfono fijo oficina</label> <input type="hidden" name="telefono_oficin2"
            id="telefono_oficina" value="<?php echo $this->telefono_oficina; ?>" required class="form-control" />
          <input type="number" name="telefono_oficina" id="telefono_oficina2"
            value="<?php echo $this->telefono_oficina; ?>" required class="form-control" />
        </div>

        <div class="col-md-6 col-lg-3"><label>Correo electrónico empresarial</label> <input type="hidden"
            name="correo_empresarial2" id="correo_empresarial" required class="form-control"/>
          <input type="email" name="correo_empresarial" id="correo_empresarial2" class="form-control"  value="<?php echo $this->correo_empresarial ?>" />
        </div>

        <div class="col-md-6 col-lg-3"><label>Fecha ingreso</label> <input type="hidden" name="fecha_ingreso2"
            id="fecha_ingreso" value="<?php echo $this->fecha_ingreso; ?>" required class="form-control" />
          <input type="date" name="fecha_ingreso2" id="fecha_ingreso" value="<?php echo $this->fecha_ingreso; ?>"
            class="form-control" />
        </div>

        <div class="col-md-6 col-lg-3"><label>Cargo</label> <input type="hidden" name="cargo2" id="cargo"
            value="<?php echo $this->cargo; ?>" required class="form-control" />
          <input type="text" name="cargo" id="cargo" value="<?php echo $this->cargo; ?>" class="form-control" />
        </div>

        <div class="col-md-6 col-lg-3 d-none"><label>Fecha afiliación</label> <input type="hidden"
            name="fecha_afiliacion2" id="fecha_afiliacion" value="<?php echo $this->fecha_afiliacion; ?>"
            class="form-control" />
          <input type="date" name="fecha_afiliacion2" id="fecha_afiliacion"
            value="<?php echo $this->fecha_afiliacion; ?>" class="form-control" />
        </div>
        <div class="col-md-6 col-lg-3">
          <label>Tipo de contrato</label>
          <?php $bandera=0;
						 ?>
          <select name="situacion_laboral" id="situacion_laboral" class="form-control" required>
            <option value="" <?php if($this->situacion_laboral==""){ echo 'selected'; $bandera=1;} ?>></option>
            <option value="Indefinido"
              <?php if($this->situacion_laboral=="Indefinido"){ echo 'selected'; $bandera=1;} ?>>Indefinido</option>
            <option value="Termino fijo"
              <?php if($this->situacion_laboral=="Termino fijo"){ echo 'selected'; $bandera=1;} ?>>Termino fijo</option>
            <option value="Prestación de servicios"
              <?php if($this->situacion_laboral=="Libre nombramiento"){ echo 'selected'; $bandera=1;} ?>>Libre
              nombramiento</option>
            <option value="Obra o labor"
              <?php if($this->situacion_laboral=="Obra o labor"){ echo 'selected'; $bandera=1;} ?>>Obra o labor</option>

          </select>

          <input type="hidden" name="situacion_laboral2" class="form-control"
            value="<?php  echo $this->situacion_laboral;  ?>">
        </div>
        <div class="col-md-6 col-lg-3 d-none"><label>Número asignado</label> <input type="text" name="numero_asignado"
            id="numero_asignado" value="<?php echo $this->numero_asignado; ?>" class="form-control" /></div>

        <div class="col-md-6 col-lg-3"><label>CIIU</label>
          <input type="text" name="ciiu" id="ciiu" value="<?php echo $this->ciiu; ?>" class="form-control" />
        </div>
        <!-- <div class="col-md-6 col-lg-3"><label>Salario</label> <input type="number" name="salario" id="salario" value="<?php echo $this->salario; ?>" required class="form-control"  /></div> -->

      </div>


      <div class="row justify-content-center  titulo-seccion no-padding cuenta-bancaria">Información Bancaria (Para
        desembolso)</div>
      <div class="row form-group formulario caja-formulario cuenta-bancaria">




        <div class="col-md-6 col-lg-3">
          <label>Cuenta Bancaria No</label> <input min="1000000" type="number" name="cuenta_numero" id="cuenta_numero"
            value="<?php echo $this->cuenta_numero; ?>" required class="form-control" />
        </div>

        <div class="col-md-6 col-lg-3">
          <label>Tipo de cuenta</label>
          <select name="cuenta_tipo" id="cuenta_tipo" class="form-control" required>
            <option value="" <?php if($this->cuenta_tipo==""){ echo 'selected';} ?>></option>
            <option value="AHORROS" <?php if($this->cuenta_tipo=="AHORROS"){ echo 'selected';} ?>>AHORROS</option>
            <option value="CORRIENTE" <?php if($this->cuenta_tipo=="CORRIENTE"){ echo 'selected';} ?>>CORRIENTE</option>
          </select>
        </div>

        <div class="col-md-6 col-lg-3">
          <label>Entidad bancaria</label>
          <select name="entidad_bancaria" id="entidad_bancaria" required class="form-control">
            <option value="" <?php if($this->entidad_bancaria==""){ echo 'selected'; } ?>></option>
            <?php foreach ($this->bancos as $key => $value): ?>
            <option value="<?php echo $value->nombre; ?>"
              <?php if($this->entidad_bancaria==$value->nombre){ echo 'selected';} ?>><?php echo $value->nombre; ?>
            </option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="alert alert-warning w-100 mt-4" role="alert">
          La cuenta debe ser del asociado que realiza la solicitud de crédito.
        </div>
      </div>
      <?php if($this->get_monto == '1'){ ?>
        <div class="col-12">
          <div class="row justify-content-center titulo-seccion no-padding">Información Financiera</div>
          <div class="row form-group formulario caja-formulario">
            <div class="col-md-3 col-lg-4">
              <label>Ingreso/Salario mensual</label> 
              <input type="text" name="nombres" id="nombres" value="$<?php echo number_format($this->infoUser->salario, 0 , ',', '.'); ?>" required readonly="readonly" class="form-control" />
            </div>
            <div class="col-md-3 col-lg-4">
              <label>Otros ingresos mensuales</label> 
              <input type="text" name="nombres" id="nombres" value="$<?php echo number_format($this->infoUser->otros_ingresos, 0 , ',', '.'); ?>" required readonly="readonly" class="form-control" />
            </div>
            <div class="col-md-6 col-lg-4">
              <label>Detalle de otros ingresos mensuales</label> 
              <!-- <input type="text" name="nombres" id="nombres" value="<?php echo $this->lineas2->nombre; ?>" required readonly="readonly" class="form-control" /> -->
              <textarea name="" id="" cols="30" rows="2" class="form-control" readonly><?php echo $this->infoUser->concepto_otros_ingresos; ?></textarea>
            </div>
            <div class="col-md-3 col-lg-4">
              <label>Total ingreso mensual</label> 
              <input type="text" name="nombres" id="nombres" value="<?php echo $this->infoUser->ingresos_mensuales; ?>" required readonly="readonly" class="form-control" />
            </div>
            <div class="col-md-3 col-lg-4">
              <label>Total egreso mensual</label> 
              <input type="text" name="nombres" id="nombres" value="<?php echo $this->infoUser->egresos_mensuales; ?>" required readonly="readonly" class="form-control" />
            </div>
            <div class="col-md-3 col-lg-4">
              <label>Total activo</label> 
              <input type="text" name="nombres" id="nombres" value="<?php echo $this->infoUser->activos; ?>" required readonly="readonly" class="form-control" />
            </div>
            <div class="col-md-3 col-lg-4">
              <label>Total pasivo</label> 
              <input type="text" name="nombres" id="nombres" value="<?php echo $this->infoUser->pasivos; ?>" required readonly="readonly" class="form-control" />
            </div>
            <div class="col-md-3 col-lg-4">
              <label>Total patrimonio</label> 
              <input type="text" name="nombres" id="nombres" value="<?php echo $this->infoUser->patrimonio; ?>" required readonly="readonly" class="form-control" />
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="row justify-content-center titulo-seccion no-padding">Referencias Familiares</div>
          <div class="row form-group formulario caja-formulario">
            <?php foreach($this->refFamiliares as $keyRef => $ref): ?>
              <div class="col-md-3 col-lg-6">
                <label><?php echo $keyRef+1 ?>. Nombre(s) Apellido(s)</label> 
                <input type="text" name="nombres" id="nombres" value="<?php echo $ref->nombres; ?>" required readonly="readonly" class="form-control" />
              </div>
              <div class="col-md-3 col-lg-2">
                <label>Parentesco</label> 
                <input type="text" name="nombres" id="nombres" value="<?php echo $ref->parentesco; ?>" required readonly="readonly" class="form-control" />
              </div>
              <div class="col-md-3 col-lg-4">
                <label>Dirección/Barrio</label> 
                <input type="text" name="nombres" id="nombres" value="<?php echo $ref->direccion; ?>" required readonly="readonly" class="form-control" />
              </div>
              <div class="col-md-3 col-lg-3">
                <label>Ciudad/Departamento</label> 
                <input type="text" name="nombres" id="nombres" value="<?php echo $this->ciudadesUser[$ref->ciudad]; ?>" required readonly="readonly" class="form-control" />
              </div>
              <div class="col-md-3 col-lg-3">
                <label>Teléfono fijo/celular</label> 
                <input type="text" name="nombres" id="nombres" value="<?php echo $ref->celular; ?>" required readonly="readonly" class="form-control" />
              </div>
              <div class="col-md-3 col-lg-6">
                <label>Correo electrónico</label> 
                <input type="text" name="nombres" id="nombres" value="<?php echo $ref->correo; ?>" required readonly="readonly" class="form-control" />
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php } ?>
      <div class="row justify-content-center  titulo-seccion no-padding">DECLARACIÓN DE PEP'S</div>
      <div class="row form-group formulario caja-formulario py-4">




        <div class="col-md-4">
          <label>A. ¿Es una persona políticamente expuesta de acuerdo al Decreto 1674 de 2016?</label>
        </div>
        <div class="col-md-4 align-self-center">
          <select class="form-control" id="persona_expuesta" name="persona_expuesta" required>
            <option value="" <?php if (!$this->persona_expuesta){ ?> selected<?php }?>>Seleccione...</option>
            <option value="SI" <?php if ($this->persona_expuesta=="SI"){ ?> selected<?php }?>>SI</option>
            <option value="NO" <?php if ($this->persona_expuesta=="NO"){ ?> selected<?php }?>>NO</option>
          </select>
        </div>
        <div class="col-md-4 align-self-center">
          <input type="text" name="persona_expuesta_indique" id="persona_expuesta_indique"
            value="<?php echo $this->persona_expuesta_indique; ?>" placeholder="Indique" class="form-control" />
        </div>

        <div class="col-md-4">
          <label>B. ¿Representa legalmente a alguna organización internacional?</label>
        </div>
        <div class="col-md-4 align-self-center">
          <select class="form-control" id="persona_internacional" name="persona_internacional" required>
            <option value="" <?php if (!$this->persona_internacional){ ?> selected<?php }?>>Seleccione...</option>
            <option value="SI" <?php if ($this->persona_internacional=="SI"){ ?> selected<?php }?>>SI</option>
            <option value="NO" <?php if ($this->persona_internacional=="NO"){ ?> selected<?php }?>>NO</option>
          </select>
        </div>
        <div class="col-md-4 align-self-center">
          <input type="text" name="persona_internacional_indique" id="persona_internacional_indique"
            value="<?php echo $this->persona_internacional_indique; ?>" placeholder="Indique" class="form-control" />
        </div>
        <div class="col-md-4">
          <label>C. ¿La sociedad y/o los medios lo reconocen como un personaje público?</label>
        </div>
        <div class="col-md-4 align-self-center">
          <select class="form-control" id="persona_publica" name="persona_publica" required>
            <option value="" <?php if (!$this->persona_publica){ ?> selected<?php }?>>Seleccione...</option>
            <option value="SI" <?php if ($this->persona_publica=="SI"){ ?> selected<?php }?>>SI</option>
            <option value="NO" <?php if ($this->persona_publica=="NO"){ ?> selected<?php }?>>NO</option>
          </select>
        </div>
        <div class="col-md-4 align-self-center">
          <input type="text" name="persona_publica_indique" id="persona_publica_indique"
            value="<?php echo $this->persona_publica_indique; ?>" placeholder="Indique" class="form-control" />
        </div>

        <div class="col-md-4">
          <label>D. ¿Tiene algún vínculo con un PEP (Sociedad conyugal o vínculo familiar hasta en
            segundo grado de consanguinidad, segundo grado en anidad y primero Civil?</label>
        </div>
        <div class="col-md-4 align-self-center">
          <?php //echo $this->vinculo_pep?>
          <select class="form-control" id="vinculo_pep" name="vinculo_pep" required>
            <option value="" <?php if (!$this->vinculo_pep){ ?> selected<?php }?>>Seleccione...</option>
            <option value="SI" <?php if ($this->vinculo_pep=="SI"){ ?> selected<?php }?>>SI</option>
            <option value="NO" <?php if ($this->vinculo_pep=="NO"){ ?> selected<?php }?>>NO</option>
          </select>
        </div>
        <div class="col-md-4 align-self-center">
          <input type="text" name="vinculo_pep_indique" id="vinculo_pep_indique"
            value="<?php echo $this->vinculo_pep_indique; ?>" placeholder="Indique" class="form-control" />
        </div>


        <div class="col-md-4">
          <label>E. ¿Es sujeto de obligaciones tributarias en otro país o grupo de países?</label>
        </div>
        <div class="col-md-4 align-self-center">
          <select class="form-control" id="obligaciones_tributarias" name="obligaciones_tributarias" required>
            <option value="" <?php if (!$this->obligaciones_tributarias){ ?> selected<?php }?>>Seleccione...</option>
            <option value="SI" <?php if ($this->obligaciones_tributarias=="SI"){ ?> selected<?php }?>>SI</option>
            <option value="NO" <?php if ($this->obligaciones_tributarias=="NO"){ ?> selected<?php }?>>NO</option>
          </select>
        </div>
        <div class="col-md-4 align-self-center">
          <input type="text" name="obligaciones_tributarias_indique" id="obligaciones_tributarias_indique"
            value="<?php echo $this->obligaciones_tributarias_indique; ?>" placeholder="Indique" class="form-control" />
        </div>

        <div class="col-md-12">
          <label>Actividad de origen de ingresos (Detalle de ocupación, Ocio, profesión, actividad, etc.)</label> <input
            type="text" name="origen_ingresos" id="origen_ingresos" value="<?php echo $this->origen_ingresos; ?>"
            required class="form-control" />
        </div>
      </div>
    </div>
    <?php if($this->get_monto == '1'){ ?>
      <div class="col-12">
        <div class="row justify-content-center titulo-seccion no-padding">Firma del presente formulario</div>
        <div class="row form-group formulario caja-formulario">
          <div class="<?php if($this->codeudor){ echo 'col-md-6'; }else{ echo 'col-12'; } ?>">
            <div class="row">
              <div class="col-md-12">
                <label>Firmado electrónicamente por:</label>
              </div>
              <div class="col-md-12">
                <input type="text" name="nombres" id="nombres" value="<?php echo $this->nombres.' '.$this->nombres2.' '.$this->apellido1.' '.$this->apellido2; ?>" required readonly="readonly" class="form-control" />
              </div>
              <div class="col-md-12 mt-2">
                <input type="text" name="nombres" id="nombres" value="<?php echo $this->tipo_documento.' '.$this->documento; ?>" required readonly="readonly" class="form-control" />
              </div>
              <div class="col-md-12">
                <label>En Calidad de:</label>
              </div>
              <div class="col-md-12">
                <input type="text" name="nombres" id="nombres" value="Asociado" required readonly="readonly" class="form-control" />
              </div>
            </div>
          </div>
          <?php if($this->codeudor){ ?>
            <div class="col-6">
              <div class="row">
                <div class="col-md-12">
                  <label>Firmado electrónicamente por:</label>
                </div>
                <div class="col-md-12">
                  <input type="text" name="nombres" id="nombres" value="<?php echo $this->codeudor->nombres.' '.$this->codeudor->nombres2.' '.$this->codeudor->apellido1.' '.$this->codeudor->apellido2; ?>" required readonly="readonly" class="form-control" />
                </div>
                <div class="col-md-12 mt-2">
                  <input type="text" name="nombres" id="nombres" value="<?php echo $this->codeudor->tipo_documento.' '.$this->codeudor->cedula; ?>" required readonly="readonly" class="form-control" />
                </div>
                <div class="col-md-12">
                  <label>En Calidad de:</label>
                </div>
                <div class="col-md-12">
                  <input type="text" name="nombres" id="nombres" value="Codeudor" required readonly="readonly" class="form-control" />
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php } ?>
    


  </div>
</div>
<script type="text/javascript">
calcularEdad();
</script>


<?php if($_GET['mod']=="detalle_solicitud"){ ?>
<script type="text/javascript">
function f1() {
  $("input").prop("disabled", true);
  $("select").prop("disabled", true);
}
setTimeout(f1(), 1000);
setTimeout(f1(), 2000);
setTimeout(f1(), 3000);
</script>


<?php } ?>
<script type="text/javascript">
$("#situacion_laboral").change(function() {
  var id = $(this).children(":selected").attr("id");
  if (id == "otro") {
    $("#campo_otro").addClass("d-block");
    $("#campo_otro").removeClass("d-none");
    $("#campo_otro input").prop('required', true);
  } else {
    $("#campo_otro").addClass("d-none");
    $("#campo_otro").removeClass("d-block");
    $("#campo_otro input").prop('required', false);
  }
});
$('body').on('keyup', '#campo_otro input', function() {
  $("#otro").val(this.value);
});
</script>