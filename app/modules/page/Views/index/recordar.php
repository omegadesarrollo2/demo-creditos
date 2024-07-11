<!-- <style type="text/css">
.logo2 {
    margin-top: -10px;
}
</style>
<?php //echo password_hash("admin.2008", PASSWORD_DEFAULT);?>
<div class="fondo_negro"></div>
<img src="/corte/fondo.jpg" class="fondo1">
<div class="container-fluid no-padding">

	<div class="container text-center zindexlogin">
		<div class="row">
			<div class="col-md-3 col-md-35"></div>
			<div class="col-md-12 col-lg-5">

				<form method="post" action="/page/login/forgotpassword2?d" class="col-md-12 no_pad_cel borde_login">
			    	<div align="center" class="caja_login col-md-12 no_pad_cel">
			        	<div class="titulo_login_azul blanco col-md-12">Recordar contraseña</div>
			        	<div align="center">
			        		<div class="separador_login"></div>
			        	</div>
						<div class="col-sm-12 col-md-12 form-group">
							<br><br>
							<div class="col-sm-12 col-md-12 margen_icono">
								<div class="row">
									<div class="col-md-2 no-padding z_icono"><img src="/corte/fedeaa_05.png" class="icono_usuario" /></div>
									<div class="col-md-10 no-padding"><input type="text" name="cedula" required class="form-control texto_normal campo_login" value="<?php echo $_GET['cedula']; ?>" placeholder="Cédula"></div>
								</div>
							</div>
							<div class="col-md-12">
              <?php if($this->error_olvido){ ?>
                <div class="alert alert-danger" align="center"><?php echo $this->error_olvido; ?></div>
            <?php } ?>
            <?php if($this->mensaje_olvido){ ?>
                <div class="alert alert-success" align="center"><?php echo $this->mensaje_olvido?><span id="email"><?php echo $this->correo_envio; ?></span></div>
            <?php } ?>
            <input type="hidden" id="csrf" name="csrf" value="<?php echo $this->csrf; ?>" />
								<br>
								<button class="btn btn-azul" type="submit">Enviar <i class="fas fa-chevron-right flecha"></i></button>
								<br><br>
							</div>
						</div>
			      	</div>
					<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
					<input type="hidden" name="e" value="<?php echo $_GET['e']; ?>">
					<input type="hidden" name="login_codeudor" value="<?php echo $_GET['login_codeudor']; ?>">
				</form>
			</div>
		</div>
	</div>
</div> -->

<style type="text/css">
.logo2 {
  margin-top: -10px;
}
body{
  max-height: 100vh;
  overflow: hidden;
}
.separador_gris{
  display: none;
}
header{
  display: none;
}
</style>
<?php //echo password_hash("admin.2008", PASSWORD_DEFAULT);?>
<div class="fondo_negro">
</div>

<img src="/skins/page/images/imagen-fondo.png" class="fondo1">
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
        <form method="post" action="/page/login/login" class="col-md-12 no_pad_cel borde_login">
          <div align="center" class="caja_login col-md-12 no_pad_cel">
            <div class="titulo_login_azul blanco col-md-12 mt-4">
              <img src="/skins/page/images/logo.png" alt="" class="logo">
            </div>
            <div align="center">
              <br>
              <span>
                Ingresa a tu cuenta
              </span>
            </div>
            <div class="col-sm-12 col-md-12 form-group">
              <div class="col-sm-12 col-md-12 px-4">
                <div class="row">
                  <div class="col-md-12 no-padding text-left">
                    <label for="cedula">Cédula</label>
                    <div class="input-container">
                      <img src="/skins/page/images/user.png" alt="">
                      <input type="text" name="cedula" required class="form-control texto_normal campo_login" value="<?php echo $_GET['cedula']; ?>" placeholder="Cédula">
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="col-md-12 text-center">
                <br>
                <a href="/page/index/recordar" class="enlace blanco">¿Olvidaste tu contraseña?</a>
              </div> -->
              <div class="col-md-12">
                <br>
                <button class="btn btn-azul" type="submit">
                  Ingresar
                </button>
                <br><br>
              </div>
            </div>
          </div>
          <?php if ($this->error_olvido): ?>
            <div class="col-12 pb-2">
              <div class="alert alert-danger text-center">
                <?php echo $this->error_olvido; ?>
              </div>
            </div>
          <?php endif ?>
          <?php if ($this->mensaje_olvido): ?>
            <div class="col-12 pb-2">
              <div class="alert alert-success text-center">
                <?php echo $this->mensaje_olvido?><span id="email"><?php echo $this->correo_envio; ?></span>
              </div>
            </div>
          <?php endif ?>
          <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
          <input type="hidden" name="e" value="<?php echo $_GET['e']; ?>">
          <input type="hidden" name="login_codeudor" value="<?php echo $_GET['login_codeudor']; ?>">
        </form>
      </div>
    </div>
  </div>
  <div class="redes">
    <div class="row">
      <?php if($this->infopage->info_pagina_instagram){ ?>
        <a target="_blank" href="<?php echo $this->infopage->info_pagina_instagram ?>">
          <img src="/skins/page/images/instagram.png" alt="">
        </a>
      <?php } ?>
      <?php if($this->infopage->info_pagina_facebook){ ?>
        <a target="_blank" href="<?php echo $this->infopage->info_pagina_facebook ?>">
          <img src="/skins/page/images/facebook.png" alt="">
        </a>
      <?php } ?>
      <?php if($this->infopage->info_pagina_twitter){ ?>
        <a target="_blank" href="<?php echo $this->infopage->info_pagina_twitter ?>">
          <img src="/skins/page/images/twitter.png" alt="">
        </a>
      <?php } ?>
    </div>
  </div>
</div>
<div class="login-derechos">
  Fondtodos &copy;<?php echo date('Y') ?> Todos los derechos reservados | Desarrollado por Omega Soluciones Web
</div>