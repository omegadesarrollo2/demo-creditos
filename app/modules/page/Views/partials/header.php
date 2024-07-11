<div class="col-md-12 separador_gris"></div>
<div class="col-md-12 fondo_header">
	<div class="row">
		<div class="col-md-4">
			<a href="/page/sistema/"><img src="/skins/page/images/logo.jpg" class="logo2"></a>
		</div>
		<div class="col-md-6">
			<div class="titulo_blanco margen_titulo" style="font-size: 30px;">FODUN SOLICITUD DE CRÉDITOS</div>
		</div>
		<?php if ($_SESSION['kt_login_id']!=""){?>
		<div class="col-md-2">
			<div class="mt-4">
		<a href="/page/login/logout/"><span class="text-white"> <i class="fas fa-door-open"></i> Salir</span></a><br>
		<?php if($_SESSION["kt_login_id"]){?>
		<a href="/administracion/solicitudes"><span class="text-white"> <i class="fa fa-arrow-left mr-2 mt-2" aria-hidden="true"></i>Volver</span></a>
		<?php }?>
		</div>
		</div>
		<?php } ?>
	</div>
</div>