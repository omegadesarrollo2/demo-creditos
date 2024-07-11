<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>" data-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->id; ?>" />
			<?php }?>
			<div class="row">
				<div class="col-6 form-group">
					<label for="cedula"  class="control-label">cedula</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->cedula; ?>" name="cedula" id="cedula" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="linea"  class="control-label">linea</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rosado " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->linea; ?>" name="linea" id="linea" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label class="control-label">destino</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-cafe " ><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="destino"   >
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_destino AS $key => $value ){?>
								<option <?php if($this->getObjectVariable($this->content,"destino") == $key ){ echo "selected"; }?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="valor"  class="control-label">valor</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->valor; ?>" name="valor" id="valor" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="monto_solicitado"  class="control-label">monto solicitado</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->monto_solicitado; ?>" name="monto_solicitado" id="monto_solicitado" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="valor_desembolso"  class="control-label">valor desembolso</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->valor_desembolso; ?>" name="valor_desembolso" id="valor_desembolso" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label class="control-label">linea desembolso</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado " ><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="linea_desembolso"   >
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_linea_desembolso AS $key => $value ){?>
								<option <?php if($this->getObjectVariable($this->content,"linea_desembolso") == $key ){ echo "selected"; }?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="cuotas_desembolso"  class="control-label">cuotas desembolso</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rojo-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->cuotas_desembolso; ?>" name="cuotas_desembolso" id="cuotas_desembolso" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="valor_cuota_desembolso"  class="control-label">valor cuota desembolso</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->valor_cuota_desembolso; ?>" name="valor_cuota_desembolso" id="valor_cuota_desembolso" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="tasa_desembolso"  class="control-label">tasa desembolso</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->tasa_desembolso; ?>" name="tasa_desembolso" id="tasa_desembolso" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="cuotas_extra_desembolso"  class="control-label">cuotas extra desembolso</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-cafe " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->cuotas_extra_desembolso; ?>" name="cuotas_extra_desembolso" id="cuotas_extra_desembolso" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="valor_extra_desembolso"  class="control-label">valor extra desembolso</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rosado " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->valor_extra_desembolso; ?>" name="valor_extra_desembolso" id="valor_extra_desembolso" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="cuotas"  class="control-label">cuotas</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->cuotas; ?>" name="cuotas" id="cuotas" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="valor_cuota"  class="control-label">valor cuota</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->valor_cuota; ?>" name="valor_cuota" id="valor_cuota" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="cuotas_extra"  class="control-label">cuotas extra</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->cuotas_extra; ?>" name="cuotas_extra" id="cuotas_extra" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="valor_extra"  class="control-label">valor extra</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rojo-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->valor_extra; ?>" name="valor_extra" id="valor_extra" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="tasa"  class="control-label">tasa</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-cafe " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->tasa; ?>" name="tasa" id="tasa" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="fecha"  class="control-label">fecha</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rosado " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->fecha; ?>" name="fecha" id="fecha" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="validacion"  class="control-label">validacion</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->validacion; ?>" name="validacion" id="validacion" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="radicacion"  class="control-label">radicacion</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->radicacion; ?>" name="radicacion" id="radicacion" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<input type="hidden" name="paso"  value="<?php echo $this->content->paso ?>">
				<div class="col-6 form-group">
					<label for="nombres"  class="control-label">nombres</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->nombres; ?>" name="nombres" id="nombres" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="nombres2"  class="control-label">nombres2</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->nombres2; ?>" name="nombres2" id="nombres2" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="apellido1"  class="control-label">apellido1</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->apellido1; ?>" name="apellido1" id="apellido1" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="apellido2"  class="control-label">apellido2</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rojo-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->apellido2; ?>" name="apellido2" id="apellido2" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="sexo"  class="control-label">sexo</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rosado " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->sexo; ?>" name="sexo" id="sexo" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="tipo_documento"  class="control-label">tipo documento</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->tipo_documento; ?>" name="tipo_documento" id="tipo_documento" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="documento"  class="control-label">documento</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-cafe " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->documento; ?>" name="documento" id="documento" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="fecha_documento"  class="control-label">fecha documento</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde " ><i class="fas fa-calendar-alt"></i></span>
						</div>
					<input type="text" value="<?php if($this->content->fecha_documento){ echo $this->content->fecha_documento; } else { echo date('Y-m-d'); } ?>" name="fecha_documento" id="fecha_documento" class="form-control"   data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-language="es"  >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="ciudad_documento"  class="control-label">ciudad documento</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->ciudad_documento; ?>" name="ciudad_documento" id="ciudad_documento" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="fecha_nacimiento"  class="control-label">fecha nacimiento</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado " ><i class="fas fa-calendar-alt"></i></span>
						</div>
					<input type="text" value="<?php if($this->content->fecha_nacimiento){ echo $this->content->fecha_nacimiento; } else { echo date('Y-m-d'); } ?>" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"   data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-language="es"  >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="empresa"  class="control-label">empresa</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rojo-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->empresa; ?>" name="empresa" id="empresa" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="dependencia"  class="control-label">dependencia</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->dependencia; ?>" name="dependencia" id="dependencia" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="direccion_oficina"  class="control-label">direccion oficina</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->direccion_oficina; ?>" name="direccion_oficina" id="direccion_oficina" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="ciudad_oficina"  class="control-label">ciudad oficina</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->ciudad_oficina; ?>" name="ciudad_oficina" id="ciudad_oficina" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="telefono_oficina"  class="control-label">telefono oficina</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rojo-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->telefono_oficina; ?>" name="telefono_oficina" id="telefono_oficina" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="celular"  class="control-label">celular</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->celular; ?>" name="celular" id="celular" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="direccion_residencia"  class="control-label">direccion residencia</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->direccion_residencia; ?>" name="direccion_residencia" id="direccion_residencia" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="barrio"  class="control-label">barrio</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-cafe " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->barrio; ?>" name="barrio" id="barrio" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="ciudad_residencia"  class="control-label">ciudad residencia</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->ciudad_residencia; ?>" name="ciudad_residencia" id="ciudad_residencia" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="telefono"  class="control-label">telefono</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rosado " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->telefono; ?>" name="telefono" id="telefono" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="correo_empresarial"  class="control-label">correo empresarial</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rosado " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->correo_empresarial; ?>" name="correo_empresarial" id="correo_empresarial" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="correo_personal"  class="control-label">correo personal</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->correo_personal; ?>" name="correo_personal" id="correo_personal" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<input type="hidden" name="situacion_laboral"  value="<?php echo $this->content->situacion_laboral ?>">
				<input type="hidden" name="cual"  value="<?php echo $this->content->cual ?>">
				<input type="hidden" name="ocupacion"  value="<?php echo $this->content->ocupacion ?>">
				<input type="hidden" name="estado_civil"  value="<?php echo $this->content->estado_civil ?>">
				<input type="hidden" name="conyuge_nombre"  value="<?php echo $this->content->conyuge_nombre ?>">
				<input type="hidden" name="conyuge_telefono"  value="<?php echo $this->content->conyuge_telefono ?>">
				<input type="hidden" name="conyuge_celular"  value="<?php echo $this->content->conyuge_celular ?>">
				<input type="hidden" name="peso"  value="<?php echo $this->content->peso ?>">
				<input type="hidden" name="estatura"  value="<?php echo $this->content->estatura ?>">
				<input type="hidden" name="declara_renta"  value="<?php echo $this->content->declara_renta ?>">
				<input type="hidden" name="persona_publica"  value="<?php echo $this->content->persona_publica ?>">
				<input type="hidden" name="cuenta_numero"  value="<?php echo $this->content->cuenta_numero ?>">
				<input type="hidden" name="cuenta_tipo"  value="<?php echo $this->content->cuenta_tipo ?>">
				<input type="hidden" name="entidad_bancaria"  value="<?php echo $this->content->entidad_bancaria ?>">
				<input type="hidden" name="ingreso_mensual"  value="<?php echo $this->content->ingreso_mensual ?>">
				<input type="hidden" name="otros_ingresos"  value="<?php echo $this->content->otros_ingresos ?>">
				<input type="hidden" name="total_ingresos"  value="<?php echo $this->content->total_ingresos ?>">
				<input type="hidden" name="canon_arrendamiento"  value="<?php echo $this->content->canon_arrendamiento ?>">
				<input type="hidden" name="otros_gastos"  value="<?php echo $this->content->otros_gastos ?>">
				<input type="hidden" name="total_egresos"  value="<?php echo $this->content->total_egresos ?>">
				<input type="hidden" name="activos"  value="<?php echo $this->content->activos ?>">
				<input type="hidden" name="pasivos"  value="<?php echo $this->content->pasivos ?>">
				<input type="hidden" name="patrimonio"  value="<?php echo $this->content->patrimonio ?>">
				<input type="hidden" name="descripcion_ingresos"  value="<?php echo $this->content->descripcion_ingresos ?>">
				<input type="hidden" name="descripcion_recursos"  value="<?php echo $this->content->descripcion_recursos ?>">
				<input type="hidden" name="tipo_garantia"  value="<?php echo $this->content->tipo_garantia ?>">
				<input type="hidden" name="FM_meses"  value="<?php echo $this->content->FM_meses ?>">
				<div class="col-12 form-group">
					<label for="observaciones" class="form-label" >observaciones</label>
					<textarea name="observaciones" id="observaciones"   class="form-control tinyeditor" rows="10"   ><?= $this->content->observaciones; ?></textarea>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="observacion_analista" class="form-label" >observacion analista</label>
					<textarea name="observacion_analista" id="observacion_analista"   class="form-control tinyeditor" rows="10"   ><?= $this->content->observacion_analista; ?></textarea>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="observacion_auxiliar" class="form-label" >observacion auxiliar</label>
					<textarea name="observacion_auxiliar" id="observacion_auxiliar"   class="form-control tinyeditor" rows="10"   ><?= $this->content->observacion_auxiliar; ?></textarea>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="observacion_riesgo" class="form-label" >observacion riesgo</label>
					<textarea name="observacion_riesgo" id="observacion_riesgo"   class="form-control tinyeditor" rows="10"   ><?= $this->content->observacion_riesgo; ?></textarea>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="tramite"  class="control-label">tramite</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->tramite; ?>" name="tramite" id="tramite" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label class="control-label">gestor_comercial</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul " ><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="gestor_comercial"   >
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_gestor_comercial AS $key => $value ){?>
								<option <?php if($this->getObjectVariable($this->content,"gestor_comercial") == $key ){ echo "selected"; }?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label class="control-label">asignado</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado " ><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="asignado"   >
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_asignado AS $key => $value ){?>
								<option <?php if($this->getObjectVariable($this->content,"asignado") == $key ){ echo "selected"; }?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="fecha_asignado"  class="control-label">fecha asignado</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-cafe " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->fecha_asignado; ?>" name="fecha_asignado" id="fecha_asignado" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label for="pagare"  class="control-label">pagare</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rojo-claro " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->pagare; ?>" name="pagare" id="pagare" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-12 form-group">
					<label class="control-label">quien</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde " ><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="quien"   >
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_quien AS $key => $value ){?>
								<option <?php if($this->getObjectVariable($this->content,"quien") == $key ){ echo "selected"; }?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<input type="hidden" name="fecha_estado"  value="<?php echo $this->content->fecha_estado ?>">
				<div class="col-12 form-group">
					<label for="numero_obligacion"  class="control-label">numero obligacion</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->numero_obligacion; ?>" name="numero_obligacion" id="numero_obligacion" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<input type="hidden" name="autorizo"  value="<?php echo $this->content->autorizo ?>">
				<input type="hidden" name="fecha_autorizo"  value="<?php echo $this->content->fecha_autorizo ?>">
				<div class="col-12 form-group">
					<label class="control-label">estado autorizo</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado " ><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="estado_autorizo"   >
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_estado_autorizo AS $key => $value ){?>
								<option <?php if($this->getObjectVariable($this->content,"estado_autorizo") == $key ){ echo "selected"; }?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<input type="hidden" name="incompleta"  value="<?php echo $this->content->incompleta ?>">
				<input type="hidden" name="fecha_anterior"  value="<?php echo $this->content->fecha_anterior ?>">
				<input type="hidden" name="asignado_anterior"  value="<?php echo $this->content->asignado_anterior ?>">
			</div>
		</div>
		<div class="botones-acciones">
			<button class="btn btn-guardar" type="submit">Guardar</button>
			<a href="<?php echo $this->route; ?>" class="btn btn-cancelar">Cancelar</a>
		</div>
	</form>
</div>