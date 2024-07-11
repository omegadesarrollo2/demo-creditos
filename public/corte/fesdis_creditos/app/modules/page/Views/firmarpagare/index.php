<?php if(($this->valido=="1" and $this->solicitud->paso=='8') or $this->estado=="OK"){ ?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<h3 class="titulo">Firmar Pagaré</h3>
<embed src="<?php echo $this->rutaPDF ?>" width="100%" height="575" type="application/pdf">
			<?php if($this->id!="" and $this->estado==""){ ?>
			<table border="0" align="center" cellpadding="5" cellspacing="0" class="tabla">
			  <tr>
			    <td><strong>Número solicitud</strong></td>
			    <td><?php echo $this->numero; ?></td>
			  </tr>
			  <tr>
			    <td><strong>Número pagare</strong></td>
			    <td><?php echo $this->solicitud->pagare; ?></td>
			  </tr>
			  <tr>
			    <td><strong>Monto</strong></td>
			    <td>$ <?php echo number_format($this->solicitud->valor_desembolso); ?></td>
			  </tr>
			  <tr>
			    <td><strong>Porcentaje intéres</strong></td>
			    <td><?php echo $this->solicitud->tasa_desembolso; ?>% EA</td>
			  </tr>
			  <tr>
			    <td><strong>Modalidad</strong></td>
			    <td><?php echo $this->modalidad; ?></td>
			  </tr>
			  <tr>
			    <td><strong>Documento Asociado</strong></td>
			    <td><?php echo $this->solicitud->cedula; ?></td>
			  </tr>
			  <tr>
			    <td><strong>Nombre Asociado</strong></td>
			    <td><?php echo $this->nombres; ?></td>
			  </tr>
			  <tr>
			    <td><strong>Fecha solicitud</strong></td>
			    <td><?php echo $this->solicitud->fecha_asignado; ?></td>
			  </tr>
			  <tr>
			    <td><strong>Fecha aprobado</strong></td>
			    <td><?php echo $this->solicitud->fecha_aprobado; ?></td>
			  </tr>
			</table>

			<br />

			<?php if($this->existe_pagare->estado!="1"){ ?>
				<?php if($this->solicitud->codeudor1=="" or ($this->solicitud->codeudor1!="" and $this->existe_pagare->fecha_firma=="" and $this->rol==0) or ($this->solicitud->codeudor1!="" and $this->existe_pagare->fecha_firma1=="" and $this->rol==1) or ($this->solicitud->codeudor2!="" and $this->existe_pagare->fecha_firma2=="" and $this->rol==2) ){ ?>
			        <form action="/page/firmarpagare/validartoken/" method="post">
			            <div align="center">
			              <p>Para realizar la firma del pagare, por favor ingrese su <strong>Token</strong> y haga click en FIRMAR</p>
			              <p>
			                <span class="enlace_verde">Token</span>
			                <input name="token" type="text" />
			                <?php if($this->error==1){ ?>
			                	<span class="texto_rojo">Token no válido</span>
			                <?php }?>
			                <input name="solicitud" type="hidden" value="<?php echo $this->id; ?>" />
			                <input name="rol" type="hidden" value="<?php echo $this->rol; ?>" />
			                <input name="prueba" type="hidden" value="<?php echo $this->prueba; ?>" />
			                <input name="hash" type="hidden" value="<?php echo $this->hash; ?>" />
			                <input type="submit" name="FIRMAR" id="FIRMAR" value="FIRMAR" class="boton_azul2" />
			            </p>

			                <div align="center" style="font-size:12px; display: none;">Acepto los <a href="#terminos1" class="fancybox2 enlace_azul" target="_blank">Términos y condiciones</a>
			                  <input name="terminos" type="checkbox" value="1"  /></div>

		                    <div style="display:none;">
		                        <div id="terminos1" align="justify" style="padding:20px;"><?php echo $adicional; ?></div>
		                    </div>
			            </div>

			        </form>
			    <?php }?>
			<?php }else{?>
				<div align="center" class="tituloVerde">El pagaré ya fue firmado</div>
			<?php }?>

				<?php if($this->solicitud->codeudor1!="" and $this->existe_pagare->fecha_firma!="" and $this->existe_pagare->fecha_firma1=="" and $this->rol==0){ ?>
			    	<div align="center" class="tituloVerde">Falta la firma del codeudor</div>
			    <?php }?>
				<?php if($this->solicitud->codeudor1!="" and $this->existe_pagare->fecha_firma1!="" and $this->existe_pagare->fecha_firma=="" and $this->rol==1){ ?>
			    	<div align="center" class="tituloVerde">Falta la firma del asociado</div>
			    <?php }?>
				<?php if($this->solicitud->codeudor2!="" and $this->existe_pagare->fecha_firma!="" and $this->existe_pagare->fecha_firma2=="" and $this->rol==0){ ?>
			    	<div align="center" class="tituloVerde">Falta la firma del codeudor2</div>
			    <?php }?>

			<?php }//if?>


			<?php if($this->error==2){?>
				<div align="center" class="texto_rojo">Ocurrio un error al intentar firmar su pagaré, por favor intente nuevamente o <br />
			envie un email a pagares@fesdis.com</div>
			<?php }?>

			<?php if($this->estado=="OK"){?>
				<div align="center" class="tituloVerde">Su pagaré fue firmado  exitosamente. Un email ha sido enviado con copia del pagaré.</div>
			<?php }?>

		</div>
	</div>
</div>

<?php } ?>

<?php if($this->solicitud->paso!='8' and $this->estado!="OK"){ ?>
<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<h3 class="titulo">Firmar Pagaré</h3>
			<div>El pagare no se puede firmar porque la solicitud fue declarada como incompleta</div>
		</div>
	</div>
</div>
<?php } ?>


<div class="d-none">
	<iframe src="http://creditos.fedeaa.com:8081/page/firmarpagare/consultarpagaresolo/?id=<?php echo $this->id; ?>&f=<?php echo microtime(); ?>"></iframe>
</div>