<style type="text/css">
	.empleado1, .empleado2, .empleado3, .empleado4{
		display: none;
	}
</style>

<div class="container">
	<div class="row">
	    <form id="form1" name="form1" method="post" action="/page/sistema/guardarpaso/" class="col-12">
			<div class="col-12">
				<?php if ($_GET['consulta']==""): ?>
					<div class="row">
						<div class="col-6 text-left"><h3 class="titulo">Solicitud WEB<?php echo $this->numero; ?></h3></div>
						<div class="col-6 text-right"><h3 class="paso">Paso 5/7</h3></div>
						<div align="left" class="col-12">
							<div class="separador_login2"></div>
						</div>
					</div>
				<?php endif ?>
			</div>
			<div class="col-12">
				<div class="row form-group">

					<div class="col-md-12 col-lg-12">

						<div class="row formulario text-center">
							<div class="col-12"><span class="titulo-seccion text-center"><b>Tipo de garantía</b><br><br></span></div>

							<input type="hidden" name="tipo_garantia" id="tipo_garantia" value="<?php echo $this->solicitud->tipo_garantia; ?>">

							<div class="col-12 text-center">
						  		<?php foreach ($this->garantias as $key => $garantia): ?>
						  			<label onclick="llenar();"><input type="checkbox" value="<?php echo $garantia->garantia_id; ?>" id="garantia<?php echo $key; ?>" <?php if(strpos($this->solicitud->tipo_garantia,$garantia->garantia_id)!==false){ echo 'checked'; }  ?>> <?php echo utf8_encode($garantia->garantia_nombre); ?>&nbsp;&nbsp;&nbsp;&nbsp; </label>
						  		<?php endforeach ?>
					  		</div>

<script type="text/javascript">
	function llenar(){
		var res="";
		for(var i = 0; i<=20; i++){
			if(document.getElementById('garantia'+i)){
				if(document.getElementById('garantia'+i).checked===true){
					res+= document.getElementById('garantia'+i).value+",";
				}
			}
		}
		res = res.substring(0, res.length - 1);
		document.getElementById('tipo_garantia').value = res;
	}
</script>


						</div>

						<br>
						<div id="div_paso4">

						</div>


					</div>

				</div>
			</div>


			<div class="col-12"><input type="checkbox" required name="terminos" <?php if($_GET['mod']=="detalle_solicitud"){ echo 'checked="checked" '; } ?>> Acepto <a href="#" data-toggle="modal" data-target="#exampleModal">términos y condiciones</a></div>
			<div class="col-12"><input type="checkbox" required name="terminos2" <?php if($_GET['mod']=="detalle_solicitud"){ echo 'checked="checked" '; } ?>> Certifico bajo la gravedad de juramento que la información ingresada corresponde a la realidad y se ajusta a la <a target="_blank" href="http://www.defensoria.gov.co/public/Normograma%202013_html/Normas/Ley_1581_2012.pdf">ley 1581 de 2012</a></div>
			<div class="col-12"><br></div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Términos y condiciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

		<p><strong><em>ART&Iacute;CULO 7- REQUISITOS GENERALES DE CR&Eacute;DITO. </em></strong><em>Los asociados de FEDEAA, para el estudio de su solicitud de cr&eacute;dito deber&aacute;n cumplir</em><em><u></u><u></u></em></p>
			<p><em>los requisitos descritos a continuaci&oacute;n:<u></u><u></u></em></p>
			<p><em>1. Tener una vinculaci&oacute;n no menor a dos (2) meses como asociado de FEDEAA Diligenciar en todas sus partes los documentos<u></u><u></u></em></p>
			<p><em>establecidos para la prestaci&oacute;n del servicio.<u></u><u></u></em></p>
			<p><em>2. Anexar la documentaci&oacute;n necesaria sobre garant&iacute;as ofrecidas, en especial cuando los codeudores sean externos, a saber:<u></u><u></u></em></p>
			<p><em>fotocopias de c&eacute;dulas, certificados de ingresos y retenciones, declaraciones de renta, certificados de libertad y tradici&oacute;n,<u></u><u></u></em></p>
			<p><em>certificaciones laborales, balances, flujos de ingresos y gastos, etc. Todos estos documentos deben tener una vigencia no<u></u><u></u></em></p>
			<p><em>mayor a treinta (30) d&iacute;as al momento de la presentaci&oacute;n de la respectiva solicitud.<u></u><u></u></em></p>
			<p><em>3. Autorizar a FEDEAA para Consultar y reportar las c&eacute;dulas del solicitante y sus codeudores, en la central de riesgo del sector<u></u><u></u></em></p>
			<p><em>financiero, reporte UIAF, que administren bases de datos y descontar dichas consultas cuando los cr&eacute;ditos superen las<u></u><u></u></em></p>
			<p><em>disposiciones legales vigentes.<u></u><u></u></em></p>
			<p><em>4. Anexar los documentos que acrediten el gasto o la inversi&oacute;n por la l&iacute;nea de calamidad, estudio o cuando se trate de<u></u><u></u></em></p>
			<p><em>adquisici&oacute;n de activos.<u></u><u></u></em></p>
			<p><em>5.   Se podr&aacute;n reestructurar los cr&eacute;ditos m&aacute;ximo dos (2) veces al a&ntilde;o, con   la tasa de inter&eacute;s adicionada un punto (1) sin que esto se<u></u><u></u></em></p>
			<p><em>convierta en una pr&aacute;ctica generalizada.(ver anexo 1)<u></u><u></u></em></p>
			<p><em>6. Tener el apalancamiento requerido de acuerdo con la l&iacute;nea de cr&eacute;dito solicitada. Los aportes, ahorros permanentes, ahorro<u></u><u></u></em></p>
			<p><em>contractual de inversi&oacute;n y voluntarios se tendr&aacute;n en cuenta como apalancamiento de cr&eacute;ditos, a la fecha de la consignaci&oacute;n<u></u><u></u></em></p>
			<p><em>efectiva.<u></u><u></u></em></p>
			<p><em>7. Tener capacidad de pago, sin que el total de los descuentos por todo concepto a favor de FEDEAA sea superior al cincuenta por<u></u><u></u></em></p>
			<p><em>ciento (50%) del salario mensual del asociado. Para facilitar el acceso al cr&eacute;dito en lo referido a la capacidad de pago, la<u></u><u></u></em></p>
			<p><em>administraci&oacute;n de FEDEAA podr&aacute; exigir abonos especiales del valor de las primas, bonificaciones especiales y prestaciones.<u></u><u></u></em></p>
			<p><em>8. Cumplir con los requisitos especiales estipulados en este reglamento para cada una de las l&iacute;neas de cr&eacute;dito.<u></u><u></u></em></p>
			<p><em>9. Estar al d&iacute;a en todas sus obligaciones econ&oacute;micas con FEDEAA.<u></u><u></u></em></p>
			<p><em>10. FEDEAA cobrar&aacute; una tasa de inter&eacute;s a la modalidad de cr&eacute;dito y al plazo en t&eacute;rminos nominales (ver anexo 1).<u></u><u></u></em></p>
			<p><em>11. FEDEAA no cobrara ninguna sanci&oacute;n por el pre-pago o pago anticipado de las obligaciones de los asociados.</em><strong><u></u><u></u></strong></p>
			<p><strong><u></u>&nbsp;<u></u></strong></p>
			<p><strong><em>L&iacute;neas&nbsp; de cr&eacute;dito </em></strong><strong><em><u></u><u></u></em></strong></p>
			<p><strong><em><u></u>&nbsp;<u></u></em></strong></p>
			<p><strong><em>ART&Iacute;CULO 20. MODALIDAD DE CONSUMO. </em></strong><em>Por esta modalidad hay las siguientes l&iacute;neas:<u></u><u></u></em></p>
			<p><em><u></u>&nbsp;<u></u></em></p>
			<p>&bull; <strong>TARJETA DE AFINIDAD FEDEAA - VISA</strong>.<em> Se le asignar&aacute; un cupo rotatorio de cr&eacute;dito (Ver anexo 1) El cupo asignado para el<u></u><u></u></em></p>
			<p><em>manejo de cr&eacute;dito mediante la tarjeta de servicio FEDEAA, se utilizar&aacute; para la adquisici&oacute;n de bienes y servicios en los<u></u><u></u></em></p>
			<p><em>establecimientos comerciales con sistema VISA. Con la tarjeta de AFINIDAD FEDEAA-VISA, se podr&aacute;n efectuar transacciones<u></u><u></u></em></p>
			<p><em>crediticias   por la modalidad de avances en efectivo realizados en cajeros   electr&oacute;nicos nacionales o internacionales. El monto del<u></u><u></u></em></p>
			<p><em>avance ser&aacute; del cupo rotatorio de la tarjeta DE AFINIDAD FEDEAA - VISA El pago de los avances ser&aacute; el pactado por nomina, por<u></u><u></u></em></p>
			<p><em>Caja, recaudo en cuentas del Fondo con los mecanismos establecidos para tal fin. <u></u><u></u></em></p>
			<p><em><u></u>&nbsp;<u></u></em></p>
			<p><strong><em>Garant&iacute;a: </em></strong><em>Sus aportes sociales individuales, ahorros permanentes, Salario<strong><u></u><u></u></strong></em></p>
			<p><strong><em><u></u>&nbsp;<u></u></em></strong></p>
			<p><em>Consumo   LIBRE INVERSI&Oacute;N: Se le asignara el cupo de acuerdo al apalancamiento   representados en Sus aportes sociales individuales, ahorros permanentes   (Ver anexo 1) &nbsp;<u></u><u></u></em></p>
			<p><u></u><em>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </em><u></u><em>Desprendibles de n&oacute;mina de los dos &uacute;ltimos meses<u></u><u></u></em></p>
			<p><u></u><em>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </em><u></u><em>Fotocopia de la cedula de ciudadan&iacute;a<u></u><u></u></em></p>
			<p><u></u><em>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </em><u></u><em>Certificaci&oacute;n laboral, para los asociados independientes y codeudores<u></u><u></u></em></p>
			<p><em><u></u>&nbsp;<u></u></em></p>
			<p><em>Garant&iacute;a: Sus aportes sociales individuales, ahorros permanentes ( l&iacute;nea 1-2)<u></u><u></u></em></p>
			<p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Codeudor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( l&iacute;nea 1-4)&nbsp;&nbsp;y (1-6)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u></u><u></u></em></p>
			<p><em><u></u>&nbsp;<u></u></em></p>
			<p><strong><em>MODALIDAD DE CALAMIDAD<u></u><u></u></em></strong></p>
			<p>1. <em>La solicitud de cr&eacute;dito deber&aacute; presentarse m&aacute;ximo treinta (30) d&iacute;as calendario despu&eacute;s de ocurrido el hecho<u></u><u></u></em></p>
			<p><em>generador de la calamidad.<u></u><u></u></em></p>
			<p>2. <em>A la solicitud se deber&aacute;n anexar los documentos suficientes que acrediten el hecho o el gasto causado por este.<u></u><u></u></em></p>
			<p>3. <em>Anexar los documentos que acrediten el pare</em><strong><em>n</em></strong><em>tesco con el asociado de acuerdo a lo establecido en los reglamentos<u></u><u></u></em></p>
			<p><em>de FEDEAA y los datos inscritos en la ficha de afiliaci&oacute;n como grupo familiar b&aacute;sico del asociado .<u></u><u></u></em></p>
			<p><em><u></u>&nbsp;<u></u></em></p>
			<p><strong><em>Garant&iacute;a: </em></strong><em>Sus aportes sociales individuales, ahorros permanentes ( l&iacute;nea 1-2)<u></u><u></u></em></p>
			<p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Codeudor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( l&iacute;nea 1-4)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u></u><u></u></em></p>
			<p><em><u></u>&nbsp;<u></u></em></p>
			<p>&bull; <strong><em>MODALIDAD PREVISI&Oacute;N.</em></strong><em> Para los cupos de cr&eacute;dito de medicina prepagada, p&oacute;lizas de veh&iacute;culo, p&oacute;lizas de hogar, seguros de<u></u><u></u></em></p>
			<p><em>vida, planes exequiales el Fondo de Empleados - no requiere de apalancamiento ni antig&uuml;edad ,el asociado deber&aacute;, contar con<u></u><u></u></em></p>
			<p><em>suficiente capacidad de pago. En caso de no cancelar las obligaciones en el tiempo estipulado se cobrara la tasa m&aacute;xima legal<u></u><u></u></em></p>
			<p><em>vigente sobre los saldos adeudados y se cancelaran las p&oacute;lizas cumplidos 60 d&iacute;as en mora siempre y cuando no exista<u></u><u></u></em></p>
			<p><em>pignoraci&oacute;n o hipoteca a favor de FEDEAA<u></u><u></u></em></p>
			<p><em><u></u>&nbsp;<u></u></em></p>
			<p><strong><em>Garant&iacute;a: </em></strong><em>Sus aportes sociales individuales, ahorros permanentes ( l&iacute;nea 1-2)<u></u><u></u></em></p>
			<p><em><u></u>&nbsp;<u></u></em></p>
			<p><em><u></u>&nbsp;<u></u></em></p>
			<p>&bull; <strong><em>MODALIDAD DE COMPRA DE VEH&Iacute;CULO</em></strong><em> Para los cr&eacute;ditos de veh&iacute;culo el asociado deber&aacute; presentar los siguientes documentos,<u></u><u></u></em></p>
			<p><em>sin perjuicio de los requisitos generales establecidos para todas las l&iacute;neas de cr&eacute;dito:<u></u><u></u></em></p>
			<p><u></u><em>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </em><u></u><em>1. Desprendibles de n&oacute;mina de los dos &uacute;ltimos meses<u></u><u></u></em></p>
			<p><u></u><em>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </em><u></u><em>Fotocopia de la cedula de ciudadan&iacute;a<u></u><u></u></em></p>
			<p><u></u><em>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </em><u></u><em>Veh&iacute;culos nuevos: se toma el precio de lista</em><em> del concesionario o el valor de la revista motor o cualquier otra<u></u><u></u></em></p>
			<p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; publicaci&oacute;n especializada y de reconocida idoneidad.<u></u><u></u></em></p>
			<p><u></u><em>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </em><u></u><em>El modelo del veh&iacute;culo no deber&aacute; ser superior a diez a&ntilde;os al momento de otorgar el cr&eacute;dito, en caso de ser<u></u><u></u></em></p>
			<p><em>&nbsp;&nbsp;&nbsp;&nbsp; pignorado a favor de FEDEAA, se debe realizar el respectivo peritaje y cumplir con la asegurabilidad seg&uacute;n las<u></u><u></u></em></p>
			<p><em>&nbsp;&nbsp;&nbsp;&nbsp; p&oacute;lizas colectivas de FEDEAA. En ambos casos, FEDEAA exigir&aacute; un codeudor adicional. -<strong><u></u><u></u></strong></em></p>
			<p><strong><em><u></u>&nbsp;<u></u></em></strong></p>
			<p><strong><em>Garant&iacute;a:</em></strong><em> &nbsp;&nbsp;&nbsp;Prendar&iacute;as&nbsp; <u></u><u></u></em></p>
			<p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Codeudor<u></u><u></u></em></p>
			<p><strong><em><u></u>&nbsp;<u></u></em></strong></p>
			<p><strong><em><u></u>&nbsp;<u></u></em></strong></p>
			<p><strong><em><u></u>&nbsp;<u></u></em></strong></p>
			<p><strong><em>ART&Iacute;CULO 18. MODALIDAD DE VIVIENDA. </em></strong><em>Por la modalidad de vivienda, sin excepci&oacute;n alguna, s&oacute;lo se estudiar&aacute;n las solicitudes<u></u><u></u></em></p>
			<p><em>presentadas por los asociados que tengan como m&iacute;nimo DOS (2) a&ntilde;os continuos o tres discontinuos de afiliaci&oacute;n a FEDEAA.<u></u><u></u></em></p>
			<p><strong><em><u></u>&nbsp;<u></u></em></strong></p>
			<p><strong><em><u></u>&nbsp;<u></u></em></strong></p>
			<p><strong><em>PROGRAMA DE CREDITO DE VIVIENDA<u></u><u></u></em></strong></p>
			<p><strong><em>ARTICULO 21. DESTINO Y CUANTIA. </em></strong><em>Por vivienda se entiende la modalidad de cr&eacute;dito que se otorga con destino a la adquisici&oacute;n de<u></u><u></u></em></p>
			<p><em>vivienda   nueva o usada, apartamento o lote con servicios para habitaci&oacute;n del   asociado, o para construir, ampliar o mejorar la vivienda<u></u><u></u></em></p>
			<p><em>que   posee, o para sustituir por otra que se adapte a las necesidades, para   liberar un gravamen hipotecario y para gastos de escrituraci&oacute;n<u></u><u></u></em></p>
			<p><em>y registro.<u></u><u></u></em></p>
			<p><em>La cuant&iacute;a del cr&eacute;dito para vivienda ser&aacute; la establecida en el anexo uno (1) del presente acuerdo,<u></u><u></u></em></p>
			<p><strong><em>ARTICULO 22. REQUISITOS PARA CR&Eacute;DITO DE VIVIENDA. </em></strong><em>Para los cr&eacute;ditos de vivienda el asociado deber&aacute; presentar los siguientes<u></u><u></u></em></p>
			<p><em>documentos, sin perjuicio de los requisitos generales establecidos para todas las l&iacute;neas de cr&eacute;dito:<u></u><u></u></em></p>
			<p><u></u><em>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </em><u></u><em>&nbsp;Desprendibles de n&oacute;mina de los dos &uacute;ltimos meses<u></u><u></u></em></p>
			<p><u></u><em>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </em><u></u><em>Fotocopia de la cedula de ciudadan&iacute;a<u></u><u></u></em></p>
			<p><u></u><em>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </em><u></u><em>Anexar promesa de compraventa debidamente suscrita por cada una de las partes intervinientes, ya sea entre personas<u></u><u></u></em></p>
			<p><em>naturales o jur&iacute;dicas.<u></u><u></u></em></p>
			<p><u></u><em>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </em><u></u><em>Anexar certificado de tradici&oacute;n y libertad del bien inmueble negociado, con fecha de expedici&oacute;n no superior a treinta (30) d&iacute;as<u></u><u></u></em></p>
			<p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; calendario.<u></u><u></u></em></p>
			<p><u></u><em>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </em><u></u><em>Anexar contrato y presupuesto de la obra debidamente firmado por un profesional del &aacute;rea, adjuntando fotocopia simple de la<u></u><u></u></em></p>
			<p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   matr&iacute;cula profesional, cuando el cr&eacute;dito es para construcci&oacute;n, al igual   que la licencia de construcci&oacute;n expedida por la autoridad<u></u><u></u></em></p>
			<p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; competente.<u></u><u></u></em></p>
			<p><u></u><em>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </em><u></u><em>Anexar certificado del saldo de la obligaci&oacute;n expedido por el beneficiario de la hipoteca con fecha no superior a treinta (30)<u></u><u></u></em></p>
			<p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d&iacute;as calendario, cuando el cr&eacute;dito sea para la liberaci&oacute;n de gravamen hipotecario.<u></u><u></u></em></p>
			<p><u></u><em>7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </em><u></u><em>Constituir p&oacute;liza de hogar contra todo riesgo a favor del asociado y cuyo beneficiario sea FEDEAA con las cuales el fondo tenga<u></u><u></u></em></p>
			<p><em>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;convenio<strong><u></u><u></u></strong></em></p>
			<p><strong><em><u></u>&nbsp;<u></u></em></strong></p>
			<p><strong><em>Garant&iacute;a:</em></strong><em> &nbsp;&nbsp;&nbsp;Hipotecarias&nbsp; <u></u><u></u></em></p>
			<p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><u></u><u></u></strong></em></p>
			<p><em><u></u>&nbsp;<u></u></em></p>
			<p><strong><em>ARTICULO 25. REQUISITOS PARA CREDITOS de INMUEBLES DIFERENTES A VIVIENDA</em></strong><em>. Ll&aacute;mese inmuebles diferentes a vivienda los que<u></u><u></u></em></p>
			<p><em>se   destinan para compra de fincas, lotes, bodegas, casa rural o de campo,   recreaci&oacute;n o para pagar obligaciones en el sector financiero y<u></u><u></u></em></p>
			<p><em>como   garant&iacute;a de la deuda se exigir&aacute; hipoteca abierta en primer grado, sin   l&iacute;mite de cuant&iacute;a que represente como m&iacute;nimo el 70 % del<u></u><u></u></em></p>
			<p><em>valor comercial del inmueble.<u></u><u></u></em></p>
			<p><em>Desprendibles de n&oacute;mina de los dos &uacute;ltimos meses<u></u><u></u></em></p>
			<p><em>Fotocopia de la cedula de ciudadan&iacute;a<u></u><u></u></em></p>
			<p><em>Anexar certificado de tradici&oacute;n y libertad del bien inmueble prendado, con fecha de expedici&oacute;n no superior a treinta (30) d&iacute;as<u></u><u></u></em></p>
			<p><em>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;calendario.<u></u><u></u></em></p>
			<p><em>Constituir p&oacute;liza de hogar contra todo riesgo a favor del asociado y cuyo beneficiario sea FEDEAA con las cuales el fondo tenga<u></u><u></u></em></p>
			<p><em>Convenio<u></u><u></u></em></p>
			<p><em>Constituir prenda hipotecaria en primer lugar al Fondo<u></u><u></u></em></p>
			<p><strong><em><u></u>&nbsp;<u></u></em></strong></p>
			<p><em><u></u>&nbsp;<u></u></em></p>
			<p><strong><em>Garant&iacute;a:</em></strong><em> &nbsp;&nbsp;&nbsp;Hipotecarias&nbsp; <u></u><u></u></em></p>
			<p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u></u><u></u></em></p>
			<p><strong><em>ARTICULO 26. REQUISITOS PARA MICROCREDITOS.<u></u><u></u></em></strong></p>
			<p><em>Los   asociados que soliciten recursos por esta modalidad, deber&aacute;n acreditar   ante la administraci&oacute;n soportes confiables como certificados<u></u><u></u></em></p>
			<p><em>de   constituci&oacute;n y gerencia de la microempresa o actividad econ&oacute;mica para   la cual requiera el cr&eacute;dito, flujos de caja de la entidad, estados<u></u><u></u></em></p>
			<p><em>financieros   y dem&aacute;s documentos que se requieran. En caso de que sea para la puesta   en marcha de un negocio, se requerir&aacute; de un estudio<u></u><u></u></em></p>
			<p><em>previo de factibilidad.<u></u><u></u></em></p>
			<p><em><u></u>&nbsp;<u></u></em></p>
			<p><strong><em>Garant&iacute;a:</em></strong><em> &nbsp;&nbsp;&nbsp;<u></u><u></u></em></p>
			<p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Codeudor<u></u><u></u></em></p>
			<p><em><u></u>&nbsp;<u></u></em></p>
			<p><em><u></u>&nbsp;<u></u></em></p>
			<p><strong><em>CAP&Iacute;TULO QUINTO<u></u><u></u></em></strong></p>
			<p><strong><em>GARANT&Iacute;AS<u></u><u></u></em></strong></p>
			<p><strong><em>ART&Iacute;CULO 27. CLASES Y EXIGENCIAS. </em></strong><em>Las garant&iacute;as que FEDEAA exigir&aacute; para los cr&eacute;ditos otorgados a los asociados podr&aacute;n ser</em><strong><em>:<u></u><u></u></em></strong></p>
			<p><em>hipotecarias,   prendar&iacute;as, bancarias, fiduciarias, de seguros o personales solidarias;   quedar&aacute; a criterio del &oacute;rgano que apruebe el cr&eacute;dito<u></u><u></u></em></p>
			<p><em>exigir   una o m&aacute;s de &eacute;stas, as&iacute; como todas las adicionales que crea conveniente   para cada caso en particular. Todo cr&eacute;dito desembolsado<u></u><u></u></em></p>
			<p><em>por   FEDEAA debe tener suscrito un pagar&eacute; oficial de la Entidad, de acuerdo a   las disposiciones contenidas en este cap&iacute;tulo. El asociado<u></u><u></u></em></p>
			<p><em>compromete,   como garant&iacute;a de sus deudas con FEDEAA sus aportes sociales   individuales, ahorros permanentes, voluntarios y especiales,<u></u><u></u></em></p>
			<p><em>sus prestaciones legales y extralegales que tengan con la empresa para la que laboren y todas las dem&aacute;s acreencias a su favor.<u></u><u></u></em></p>
			<p><em><u></u>&nbsp;<u></u></em></p>
			<p><em><u></u>&nbsp;<u></u></em></p>
			<p><strong><em>ART&Iacute;CULO 30. GARANT&Iacute;AS PERSONALES. </em></strong><em>Cuando la garant&iacute;a fuere personal solidaria, se exigir&aacute; la solidaridad de otros asociados o<u></u><u></u></em></p>
			<p><em>terceros   solventes que le den a FEDEAA suficiente respaldo sobre la operaci&oacute;n,   en caso de no contar con esta garant&iacute;a y si su cuant&iacute;a no<u></u><u></u></em></p>
			<p><em>excede   de 17 SMLV podr&aacute; el asociado suplirla por el Fondo Mutual de Garant&iacute;as,   siempre y cuando la calificaci&oacute;n de la CIFIN (Score)<u></u><u></u></em></p>
			<p><em>este dentro de los rangos positivos.</em></p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



		    <?php if($_GET['mod']!="detalle_solicitud"){ ?>
		    	<div align="center"><input name="Anterior" type="button" value="Anterior" class="btn btn-azul" onclick="window.location='/page/sistema/paso4/?id=<?php echo $this->id; ?>';" /> <input name="Enviar" type="submit" value="Siguiente" class="btn btn-azul" /></div><br>
		    <?php }?>

		    <input name="paso" type="hidden" value="5" />
		    <input name="id" type="hidden" value="<?php echo $this->id; ?>" />
	    </form>
	</div>
</div>


<script type="text/javascript">
</script>