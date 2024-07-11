<style type="text/css">
input[type='checkbox'] {
    -webkit-appearance:none;
    width:30px;
    height:30px;
    background:white;
    border-radius:5px;
    border:2px solid #555;
    margin-bottom: -9px;
}
input[type='checkbox']:checked {
    background: #abd;
    background: url('/corte/ok.png');
    background-size: cover;
}
</style>

<div class="container">
	<div class="row">


			<div class="col-12">
				<div class="row form-group">

					<div class="col-md-12 col-lg-12">




						<div align="center" class="col-lg-12">

							<br>
							<div class="titulo-seccion"><strong>Autorización de descuento</strong></div>

						    <div align="justify" class="col-12 caja-formulario">
						    	<br>
								<p>Yo <strong><?php echo $this->user->nombre; ?><?php if($this->solicitud->tipo_garantia=="2"){ echo ", ".$this->codeudor->nombres; } ?></strong> Identificados como aparece al pie de mi firma electrónica , autorizamos permanente, expresa e irrevocablemente al pagador de la empresa donde laboramos, o a las empresas que paguen nuestras pensiones, o a las empresas en las que por ley debamos mantener nuestras cesantías, para que de conformidad con los artículos 55 y 56 del Decreto Ley 1481 de 1989, 142 y 144 de la ley 79 de 1988 y el artículo 4 de la ley 920 de 2004, deduzca de nuestros salarios, prestaciones legales o extralegales, bonificaciones, indemnizaciones, cesantías, pensión y en general de cualquier valor a nuestro favor, las cuotas a nuestro cargo generadas según el plan de amortización definido para esta obligación con el Fondo de Empleados FESDIS.<br><br>

								Igualmente queda plenamente autorizado para que descuente de nuestras prestaciones sociales y demás derechos de carácter laboral que nos correspondan, los saldos que adeudemos al Fondo de Empleados FESDIS en la fecha que por cualquier causal o motivo nos retiremos de la empresa en la que laboramos, como el pago del seguro y la desmaterialización del pagaré.<br><br>

								En el caso de asociados independientes se cargará en su próxima cuenta de cobro.

								De igual manera autorizo irrevocablemente para descontar cualquier otro valor que se genere con ocasión de la domiciliación que por este documento se realiza.<br><br>
								Autorizamos expresa e irrevocablemente al Fondo de Empleados FESDIS a quien represente sus derechos u ostente en el futuro la calidad de acreedor, para consultar, reportar, procesar, solicitar y divulgar a las centrales de riesgo toda la información correspondiente</p>
						    <strong>Autorizo el descuento:</strong> <input name="autorizo" type="checkbox" value="1" <?php if($_GET['mod']=="detalle_solicitud"){ echo 'checked="checked" '; } ?> required />
						    </div>

							<br />
							<div class="titulo-seccion"><strong>Tratamiento de datos</strong></div>

							<div align="justify" class="caja-formulario col-12">
								<br>
								<p>También declaro que he sido informado y que conozco los parámetros definidos en la <a href="http://www.FESDIS.com/page/conocenos/detalle/73/politica-de-proteccion-de-datos" target="_blank">política de tratamiento de datos personales</a>, la cual se encuentra publicado en la página web de FESDIS, <a href="https://www.FESDIS.com" target="_blank">www.FESDIS.com</a>. por lo anterior, autorizo el tratamiento de mis datos personales y el de mi núcleo básico familiar.</p>

								<div align="left"><strong>Aceptación:</strong> <input name="autorizo2" type="checkbox" value="1" <?php if($_GET['mod']=="detalle_solicitud"){ echo 'checked="checked" '; } ?> required /></div>
							</div>

							<br />


							<div class="titulo-seccion"><strong>Declaración origen de ingresos</strong></div>

							<div align="justify" class="caja-formulario col-12">
								<br>
								<p>Conforme a la circular externa 004 de 2017 de la Superintendencia de la Economía Solidaria y las demás normas legales concordantes sobre prevención de lavado de activos, Declaro que el origen de mis ingresos, no provienen de ninguna actividad ilícita de las contempladas en el código penal colombiano o en cualquier norma que lo modifique o adicione. Autorizo al FONDO DE EMPLEADOS FESDIS a saldar las cuentas y depósitos que mantenga en esta institución, de comprobarse que tengo vínculos comerciales o personales, con empresas o personas incursas en actividades ilícitas, eximiendo a la entidad de toda responsabilidad que se derive por información errónea, falsa o inexacta que yo hubiere proporcionado.</p>

								<div align="left"><strong>Aceptación:</strong> <input name="autorizo3" type="checkbox" value="1" <?php if($_GET['mod']=="detalle_solicitud"){ echo 'checked="checked" '; } ?> required /></div>
							</div>

							<br />

						</div>


					</div>

				</div>
			</div>


	</div>
