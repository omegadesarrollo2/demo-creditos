<div class="fondo_negro"></div>
<img src="/skins/administracion/images/imagen-fondo.jpg" class="fondo1">
<div class="container-fluid no-padding login-container d-flex align-items-center">
  <div class="container text-center zindexlogin">
    <div class="row align-items-center ">
      <div class="col-md-8">
        <div class="row">
          <div class="col-12">
            <div class="row title-container">
              <img src="/skins/page/images/credit.png" alt="">
              <span>
                Sistema de 
                <br>
                <strong>
                  Solicitud 
                  <br>
                  de Crédito
                </strong>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 px-0">
        <form method="post" action="/page/login/createUser" class="col-md-12 borde_login" autocomplete="off" id="registerForm">
          <div class="caja_login col-md-12">
            <div class="col-md-12">
              <img src="/skins/page/images/logo.jpg" alt="" class="px-4">
            </div>
            <div align="center">
              <br>
              <span>
                Regístrate
              </span>
            </div>
            <div class="col-sm-12 form-group text-left">
              <div class="col-sm-12 col-md-12 margen_icono">
                <div class="row">
                  <div class="col-md-12 no-padding text-start">
                    <label for="cedula">Documento</label>
                    <div class="input-container">
                      <img src="/skins/page/images/user.png" alt="">
                      <input type="text" class="form-control" id="user" name="user" placeholder="Usuario" required="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 password-container">
                <div class="row">
                  <div class="col-md-12 no-padding text-start">
                    <label for="cedula">Contraseña</label>
                    <div class="input-container">
                      <img src="/skins/page/images/password.png" alt="">
                      <input type="password" class="form-control " id="password" name="password"
                        placeholder="Contraseña" required="">
                    </div>
                  </div>
                  <div class="col-md-12 no-padding text-start">
                    <label for="cedula">Repite la contraseña</label>
                    <div class="input-container">
                      <img src="/skins/page/images/password.png" alt="">
                      <input type="password" class="form-control " id="repeat_password" name="repeat_password"
                        placeholder="Contraseña" required="">
                    </div>
                  </div>
                </div>
                <div class="col-12 alert-contrasenia mt-3" id="alert-contrasenia2">
                  <div class="alert alert-danger" role="alert">
                    Las contraseñas no coinciden.
                  </div>
                </div>
                <div class="col-12 alert-contrasenia" id="alert-contrasenia">
                  <div class="alert alert-danger" role="alert">
                    La contraseña debe incluir:
                    <ul class="pl-4">
                      <li>8 caracteres</li>
                      <li>Una minúscula</li>
                      <li>una mayúscula</li>
                      <li>un numero</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-12 text-center my-2">
                <a href="/" class="enlace blanco">¿Ya tienes una cuenta? Inicia sesión.</a>
              </div>
              <div class="col-md-12 text-center">
                <span class="btn btn-azul" id="btn-found-user">
                  Buscar
                </span>
              </div>
              <div class="col-md-12 password-container text-center">
                <button class="btn btn-azul" type="submit"> 
                  Registrarse
                </button>
              </div>
            </div>
          </div>
        </form>
        <script>
        var alertList = document.querySelectorAll('.alert');
        alertList.forEach(function(alert) {
          new bootstrap.Alert(alert)
        })
        </script>
      </div>
    </div>
  </div>
</div>

<style>
  header{
    display: none;
  }
  .contenedor-general{
    margin-top: 0
  }
  .btn-azul{
    margin-top: 10px;
    background-color: #af1c30 !important;
    color: #FFF;
    border: 1px solid #af1c30 !important;
  }
  .btn-azul:hover{
    margin-top: 10px;
    background-color: #FFF !important;
    color: #af1c30;
    border: 1px solid #af1c30 !important;
  }
  .alert-contrasenia{
    display: none;
  }
  .password-container{
    display: none;
  }
</style>