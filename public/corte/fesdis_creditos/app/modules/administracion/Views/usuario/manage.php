<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>" data-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->user_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->user_id; ?>" />
			<?php }?>
			<div class="row">
				<div class="col-2 offset-10 form-group">
					<label class="control-label">Estado</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-azul-claro " ><i class="fas fa-clipboard-check"></i></span>
						</div>
						<select class="form-control" name="user_state"   >
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_user_state AS $key => $value ){?>
								<option <?php if($this->getObjectVariable($this->content,"user_state") == $key ){ echo "selected"; }?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<input type="hidden" name="user_date"  value="<?php echo $this->content->user_date ?>">
				<div class="col-4 form-group">
					<label for="user_names"  class="control-label">Nombres</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-morado " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->user_names; ?>" name="user_names" id="user_names" class="form-control"  required >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="user_email"  class="control-label">correo</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro " ><i class="fas fa-envelope"></i></span>
						</div>
						<input type="email" value="<?= $this->content->user_email; ?>" name="user_email" id="user_email" class="form-control"  required data-remote="/core/user/validationemail?csrf=1&email=<?= $this->content->user_email; ?>" >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="user_telefono"  class="control-label">telefono</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro " ><i class="fas fa-envelope"></i></span>
						</div>
						<input type="text" value="<?= $this->content->user_telefono; ?>" name="user_telefono" id="user_telefono" class="form-control"   data-remote="/core/user/validationemail?csrf=1&email=<?= $this->content->user_telefono; ?>" >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="user_celular"  class="control-label">celular</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-verde-claro " ><i class="fas fa-envelope"></i></span>
						</div>
						<input type="text" value="<?= $this->content->user_celular; ?>" name="user_celular" id="user_celular" class="form-control"   data-remote="/core/user/validationemail?csrf=1&email=<?= $this->content->user_celular; ?>" >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label class="control-label">Nivel</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rojo-claro " ><i class="far fa-list-alt"></i></span>
						</div>
						<select class="form-control" name="user_level"  required >
							<option value="">Seleccione...</option>
							<?php foreach ($this->list_user_level AS $key => $value ){?>
								<option <?php if($this->getObjectVariable($this->content,"user_level") == $key ){ echo "selected"; }?> value="<?php echo $key; ?>" /> <?= $value; ?></option>
							<?php } ?>
						</select>
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="user_user"  class="control-label">Usuario</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-rosado " ><i class="fas fa-user-tie"></i></span>
						</div>
						<input type="text" value="<?= $this->content->user_user; ?>" name="user_user" id="user_user" class="form-control"  required data-remote="/core/user/validation?csrf=1&user=<?= $this->content->user_user; ?>" >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="user_password"  class="control-label">Contrase&ntilde;a</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-cafe " ><i class="fas fa-key"></i></span>
						</div>
						<input type="password" value="" name="user_password" id="user_password" class="form-control" <?php if (!$this->content->user_id) { ?>required <?php } ?> data-remote="/core/user/validarclave"  >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-4 form-group">
					<label for="user_password"  class="control-label">Repita Contrase&ntilde;a</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono  fondo-cafe " ><i class="fas fa-key"></i></span>
						</div>
						<input type="password" value="" name="user_passwordr" id="user_passwordr" data-match="#user_password" min="8" data-match-error="Las dos contraseñas no son iguales" class="form-control" <?php if (!$this->content->user_id) { ?>required <?php } ?>   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<input type="hidden" name="user_delete"  value="<?php echo $this->content->user_delete ?>">
				<input type="hidden" name="user_current_user"  value="<?php echo $this->content->user_current_user ?>">
				<input type="hidden" name="user_code"  value="<?php echo $this->content->user_code ?>">
			</div>
		</div>
		<div class="botones-acciones">
			<button class="btn btn-guardar" type="submit">Guardar</button>
			<a href="<?php echo $this->route; ?>" class="btn btn-cancelar">Cancelar</a>
		</div>
	</form>
</div>