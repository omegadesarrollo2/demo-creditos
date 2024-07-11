<style type="text/css">
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

				<form method="post" action="/page/login/login" class="col-md-12 no_pad_cel borde_login">
			    	<div align="center" class="caja_login col-md-12 no_pad_cel">
			        	<div class="titulo_login_azul blanco col-md-12">INGRESO USUARIO</div>
			        	<div align="center">
			        		<div class="separador_login"></div>
			        	</div>
						<div class="col-sm-12 col-md-12 form-group">
							<br><br>
							<div class="col-sm-12 col-md-12 margen_icono">
								<div class="row">
									<div class="col-md-2 no-padding z_icono"><img src="/corte/fedeaa_05.png" class="icono_usuario" /></div>
									<div class="col-md-10 no-padding"><input type="text" name="cedula" required class="form-control texto_normal campo_login" value="<?php echo $_GET['cedula']; ?>" placeholder="Usuario"></div>
								</div>
							</div>
							<div class="col-sm-12 col-md-12">
								<div class="row">
									<div class="col-md-2 no-padding z_icono"><img src="/corte/fedeaa_06.png" class="icono_usuario" /></div>
									<div class="col-md-10 no-padding"><input type="password" name="clave" required class="form-control texto_normal campo_login" value="" placeholder="Contraseña"></div>
								</div>
							</div>


							<div class="col-md-12 text-center"><br><a href="/page/index/recordar" class="enlace blanco">Recordar contraseña</a></div>

							<div class="col-md-12">
								<br>
								<button class="btn btn-azul" type="submit">Entrar <i class="fas fa-chevron-right flecha"></i></button>
								<br><br>
							</div>
						</div>
			      	</div>


					<?php if ($_GET['error']=="1"): ?>
						<div class="col-md-12"><br></div>
						<div class="alert alert-danger col-md-12 text-center">El documento no es válido</div>
					<?php endif ?>

					<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
					<input type="hidden" name="e" value="<?php echo $_GET['e']; ?>">
					<input type="hidden" name="login_codeudor" value="<?php echo $_GET['login_codeudor']; ?>">
				</form>
			</div>
		</div>
	</div>



</div>