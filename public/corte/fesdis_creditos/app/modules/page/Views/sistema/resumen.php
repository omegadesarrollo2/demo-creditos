<?php
if($_GET['prueba']=="1"){
	print_r($_SESSION);
}
?>

<div class="container">
	<div class="row">
	    <form id="form1" name="form1" method="post" action="/page/sistema/guardarpaso/" class="col-12">
			<div class="col-12">
				<div class="row">
					<div class="col-6 text-left"><h3 class="titulo">Solicitud WEB<?php echo $this->numero; ?></h3></div>
					<div class="col-6 text-right"><h3 class="paso">Paso 3/3</h3></div>
					<div align="left" class="col-12">
						<div class="separador_login2"></div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="row form-group">

					<div class="col-md-12 col-lg-12">

						<div class="row">
							<div class="col-lg-12">
								<?php echo $this->tabla; ?>
							</div>
							<div class="col-12 text-center texto-azul"><br>
								Si está de acuerdo con su solicitud por favor haga clic en confirmar, si desea realizar algún cambio haga clic en editar.<br><br>
							</div>

						    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
						    	<div align="center" class="col-12 text-center"><input name="Anterior" type="button" value="Editar" class="btn btn-verde d-inline-block" onclick="window.location='/page/sistema/?id=<?php echo $this->id; ?>';" /> <input name="Enviar" type="submit" value="Radicar solicitud" class="btn btn-verde d-inline-block" /></div><br>
						    <?php }?>

						    <input name="paso" type="hidden" value="7" />
						    <input name="id" type="hidden" value="<?php echo $this->id; ?>" />
						</div>

					</div>

				</div>
			</div>


	    </form>
	</div>
</div>
