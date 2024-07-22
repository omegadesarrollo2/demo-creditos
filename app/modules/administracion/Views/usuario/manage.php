<h1 class="titulo-principal"><i class="fas fa-users"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
  <form class="text-start filters" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>"
    data-bs-toggle="validator">
    <div class="content-dashboard">
      <input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
      <input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
      <?php if ($this->content->user_id) { ?>
      <input type="hidden" name="id" id="id" value="<?= $this->content->user_id; ?>" />
      <?php }?>
      <div class="row">
        <div class="col-2 form-group">
          <label class="control-label">Estado</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono  fondo-azul-claro "><i
                  class="fas fa-clipboard-check"></i></span>
            </div>
            <select class="form-control" name="user_state">
              <option value="">Seleccione...</option>
              <?php foreach ($this->list_user_state AS $key => $value ){?>
              <option <?php if($this->getObjectVariable($this->content,"user_state") == $key ){ echo "selected"; }?>
                value="<?php echo $key; ?>" /> <?= $value; ?></option>
              <?php } ?>
            </select>
          </label>
          <div class="help-block with-errors"></div>
        </div>
        <input type="hidden" name="user_date" value="<?php echo $this->content->user_date ?>">
        <div class="col-2 form-group">
          <label for="user_names" class="control-label">Nombres</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono  fondo-morado "><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text"
              value="<?php if($this->Usuarioinfo[$this->content->user_user]["nombres"]){ echo $this->Usuarioinfo[$this->content->user_user]["nombres"];}else{ echo $this->content->user_names;}?>"
              name="user_names" id="user_names" class="form-control" required>
          </label>
          <div class="help-block with-errors"></div>
        </div>
        <?php if ($this->content->user_id == "" or $this->content->user_level=="2"){?>
        <div class="col-2 form-group">
          <label for="user_apellidos" class="control-label">Apellidos</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono  fondo-morado "><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" value="<?php echo $this->Usuarioinfo[$this->content->user_user]["apellidos"]?>"
              name="user_apellidos" id="user_apellidos" class="form-control" required>
          </label>
          <div class="help-block with-errors"></div>
        </div>
        <?php }?>
        <div class="col-2 form-group">
          <label for="user_email" class="control-label">correo</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono  fondo-verde-claro "><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" value="<?= $this->content->user_email; ?>" name="user_email" id="user_email"
              class="form-control" required>
          </label>
          <div class="help-block with-errors"></div>
        </div>
        <div class="col-2 form-group">
          <label for="user_telefono" class="control-label">telefono</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono  fondo-verde-claro "><i class="fas fa-envelope"></i></span>
            </div>
            <input type="text" value="<?= $this->content->user_telefono; ?>" name="user_telefono" id="user_telefono"
              class="form-control">
          </label>
          <div class="help-block with-errors"></div>
        </div>
        <div class="col-2 form-group">
          <label for="user_celular" class="control-label">celular</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono  fondo-verde-claro "><i class="fas fa-envelope"></i></span>
            </div>
            <input type="text" value="<?= $this->content->user_celular; ?>" name="user_celular" id="user_celular"
              class="form-control">
          </label>
          <div class="help-block with-errors"></div>
        </div>
        <div class="col-2 form-group">
          <label class="control-label">Nivel</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono  fondo-rojo-claro "><i class="far fa-list-alt"></i></span>
            </div>
            <select class="form-control" name="user_level" required>
              <option value="">Seleccione...</option>
              <?php foreach ($this->list_user_level AS $key => $value ){?>
              <option <?php if($this->getObjectVariable($this->content,"user_level") == $key ){ echo "selected"; }?>
                value="<?php echo $key; ?>" /> <?= $value; ?></option>
              <?php } ?>
            </select>
          </label>
          <div class="help-block with-errors"></div>
        </div>
        <div class="col-2 form-group">
          <label for="user_user" class="control-label">Usuario</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono  fondo-rosado "><i class="fas fa-user-tie"></i></span>
            </div>
            <input type="text" value="<?= $this->content->user_user; ?>" name="user_user" id="user_user"
              class="form-control" required
              data-remote="/core/user/validation?csrf=1&user=<?= $this->content->user_user; ?>">
          </label>
          <div class="help-block with-errors"></div>
        </div>
        <div class="col-2 form-group">
          <label for="user_password" class="control-label">Contrase&ntilde;a</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono  fondo-cafe "><i class="fas fa-key"></i></span>
            </div>
            <input type="password" value="" name="user_password" id="user_password" class="form-control"
              <?php if (!$this->content->user_id) { ?>required <?php } ?>>
          </label>
          <div class="help-block with-errors"></div>
        </div>
        <div class="col-2 form-group">
          <label for="user_password" class="control-label">Repita Contrase&ntilde;a</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono  fondo-cafe "><i class="fas fa-key"></i></span>
            </div>
            <input type="password" value="" name="user_passwordr" id="user_passwordr" data-match="#user_password"
              min="8" data-match-error="Las dos contraseñas no son iguales" class="form-control"
              <?php if (!$this->content->user_id) { ?>required <?php } ?>>
          </label>
          <div class="help-block with-errors"></div>
        </div>
        <div class="col-2 form-group">
          <label for="user_salario" class="control-label">Salario</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono  fondo-cafe "><i class="fas fa-key"></i></span>
            </div>
            <input class="form-control" type="text"
              value="<?php echo $this->Usuarioinfo[$this->content->user_user]["sueldo"]?>" name="user_salario"
              id="user_salario">
          </label>
          <div class="help-block with-errors"></div>
        </div>
        <div class="col-2 form-group">
          <label for="user_afiliacion_fonkoba" class="control-label">Fecha de afiliación Fondtodos</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono  fondo-cafe "><i class="fas fa-key"></i></span>
            </div>
            <input class="form-control" type="date"
              value="<?php echo date("Y-m-d", strtotime($this->Usuarioinfo[$this->content->user_user]["afiliacion_fonkoba"]))?>"
              name="user_afiliacion_fonkoba" id="user_afiliacion_fonkoba">
          </label>
          <div class="help-block with-errors"></div>
        </div>
        <div class="col-2 form-group">
          <label for="user_afiliacion_koba" class="control-label">Fecha de afiliación Fondtodos</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono  fondo-cafe "><i class="fas fa-key"></i></span>
            </div>
            <input class="form-control" type="date"
              value="<?php echo date("Y-m-d", strtotime($this->Usuarioinfo[$this->content->user_user]["afiliacion_koba"]))?>"
              name="user_afiliacion_koba" id="user_afiliacion_koba">
          </label>
          <div class="help-block with-errors"></div>
        </div>
        <div class="col-12 form-group">
          <label for="" class="control-label">Regional</label>
          <select class="form-control selec-multiple" id="user_regional" name="user_regional[]" multiple="multiple">

            <?php $user_regional = explode(",", $this->getObjectVariable($this->content, "user_regional")); ?>
            <option value="">Seleccione...</option>
            <?php foreach ($this->regionales as $key => $value) { ?>
            <option <?php if (in_array($value->id, $user_regional)  || (is_countable($this->locations) && count($this->locations)=='1')) {
														echo "selected";
													} ?> value="<?php echo $value->id; ?>" /> <?= $value->nombre; ?></option>
            <?php } ?>
          </select>
        </div>
        <input type="hidden" name="user_delete" value="<?php echo $this->content->user_delete ?>">
        <input type="hidden" name="user_current_user" value="<?php echo $this->content->user_current_user ?>">
        <input type="hidden" name="user_code" value="<?php echo $this->content->user_code ?>">
        <div class="botones-acciones col-12 d-flex justify-content-end">
          <button class="btn btn-guardar me-2" type="submit">Guardar</button>
          <a href="<?php echo $this->route; ?>" class="btn btn-cancelar">Cancelar</a>
        </div>
      </div>
    </div>
  </form>
</div>
<style>
  .content-dashboard {
    min-height: calc(100vh - 190px);
  }
</style>