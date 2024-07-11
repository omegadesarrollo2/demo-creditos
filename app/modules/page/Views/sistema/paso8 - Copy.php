

<div class="container">
	<div class="row">
	    <form id="form1" name="form1" method="post" action="/page/sistema/guardarpaso/" class="col-12">
			<div class="col-12">
				<div class="row">
					<div class="col-6 text-left"><h3 class="titulo">Solicitud WEB<?php echo $this->numero; ?></h3></div>
					<div align="left" class="col-12">
						<div class="separador_login2"></div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="row form-group">

					<div class="col-md-12 col-lg-12">

						<?php if($_GET['mod']!="detalle_solicitud"){ ?>
							<div class="row text-center">
								<div class="col-12 titulo-seccion">Solicitud completa</div>
								<div class="col-12 text-center texto-solcompleta"><br><p class="text-center">Apreciado asociado, su solicitud de crédito ha sido radicada,<br> muy pronto recibirá respuesta en su correo.<br>verifique en su bandeja de correo no deseado o spam si no recibe<br>la confirmación de esta radicación</p>
								
								</div>
							</div>
						<?php } ?>
						<div class="row">
							<div class="col-lg-8 offset-lg-2">
								<?php echo $this->tabla; ?>
							</div>
						</div>

					</div>

				</div>
			</div>





	    </form>
	</div>
</div>


<script type="text/javascript">
</script>