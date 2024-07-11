<div class="container formITSign-bx">
  <div class="row">
    <div class="col-12">
      <?php if($this->tipo_usuario == '2'){ ?>        
        <form action="/page/sistema/apiCreateUser" method="post" class="row mt-5 formITSign" autocomplete="off">
          <div class="col-12">
            <h2>Crear Usuario <span>(Firma de documentos)</span></h2>
          </div>
          <div class="col-12">
            <p>
              Sabemos que es tu primera vez creando una solicitud de crédito, por lo cual deberás crear un usuario ITSign para firmar los documentos de tu solicitud.
              <br>
              Tranquilo, solo sera la primera vez, cuando vuelvas a generar una solicitud solo deberás ingresar tu usuario y contraseña para iniciar sesión.
            </p>
          </div>
          <div class="col-lg-6 form-group">
            <label for="" class="form-label"><strong>Usuario</strong></label>
            <input type="text" class="form-control" name="usuario" value="<?php echo $this->solicitud->cedula ?>" readonly>
          </div>
          <div class="col-lg-6 form-group">
            <label for="" class="form-label"><strong>Correo</strong></label>
            <input type="text" class="form-control" name="email" value="<?php echo $this->solicitud->correo_personal ?>" readonly>
          </div>
          <div class="col-lg-6 form-group">
            <label for="" class="form-label"><strong>Contraseña</strong></label>
            <input type="password" class="form-control" name="clave" autocomplete="off" id="pwd1">
          </div>
          <div class="col-lg-6 form-group">
            <label for="" class="form-label"><strong>Repite tu contraseña</strong></label>
            <input type="password" class="form-control" autocomplete="off" id="pwd2">
          </div>
          <div class="col-12">
            <p class="text-danger invalid-pwd" style="display: none">Las contraseñas no son iguales</p>
          </div>
          <div class="col-12">
            <button type="submit" class="btn w-100">Crear Usuario</button>
          </div>
        </form>
      <?php }else{ ?>
        <form action="/page/sistema/firmar" method="post" class="row mt-5 formITSign" autocomplete="off">
          <div class="col-12">
            <h2>Inicia Sesión <span>(Firma de documentos)</span></h2>
          </div>
          <div class="col-12">
            <p>
              Sabemos que es tu primera vez creando una solicitud de crédito, por lo cual deberás crear un usuario ITSign para firmar los documentos de tu solicitud.
              <br>
              Tranquilo, solo sera la primera vez, cuando vuelvas a generar una solicitud solo deberás ingresar tu usuario y contraseña para iniciar sesión.
            </p>
          </div>
          <div class="col-lg-6 form-group">
            <label for="" class="form-label"><strong>Usuario</strong></label>
            <input type="text" class="form-control" name="user" value="<?php echo $this->solicitud->cedula ?>" readonly>
          </div>
          <div class="col-lg-6 form-group">
            <label for="" class="form-label"><strong>Contraseña</strong></label>
            <input type="password" class="form-control" name="password" autocomplete="off">
          </div>
          <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
          <?php if($_GET['error'] == '1'){ ?>
            <div class="col-12">
              <p class="text-danger">Contraseña incorrecta*</p>
            </div>
          <?php } ?>
          <div class="col-12">
            <button type="submit" class="btn w-100">Ingresar</button>
          </div>
        </form>
      <?php } ?>
    </div>
    <?php if($_GET['success'] == '1'){ ?>
      <div class="col-12 mt-3">
        <div class="alert alert-success" role="alert">
          Documentos firmados correctamente
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<script>
  $("#pwd1, #pwd2").on('keyup', function()
  {
      let pwd1 = $("#pwd1").val()
      let pwd2 = $("#pwd2").val()
      if(pwd1 !== pwd2)
      {
          $("#pwd1").addClass('is-invalid')
          $("#pwd2").addClass('is-invalid')
          $("button").attr('disabled', true)
          $(".invalid-pwd").show()
      }
      else
      {
          $("#pwd1").removeClass('is-invalid')
          $("#pwd2").removeClass('is-invalid')
          $("button").attr('disabled', false)
          $(".invalid-pwd").hide()
      }
  })
</script>