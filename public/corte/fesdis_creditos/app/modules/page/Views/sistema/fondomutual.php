<!-- <?php
$smlv = 877803;
$porcentaje = 0;

$valor_solicitado=$_GET['valor_solicitado']*1;
if($_GET['mod']=="detalle_solicitud"){
	$valor_solicitado = $this->solicitud->valor;
}

if($valor_solicitado<=8*$smlv){
	$porcentaje = 1.5;
}
if($valor_solicitado>8*$smlv and $valor_solicitado<=16*$smlv){
	$porcentaje = 1.8;
}
if($valor_solicitado>16*$smlv and $valor_solicitado<=21*$smlv){
	$porcentaje = 2;
}
if($valor_solicitado>21*$smlv){
	$porcentaje = 2.5;
}

$valor_fm = round($valor_solicitado*$porcentaje/100);
if($_GET['mod']=="detalle_solicitud"){
	$valor_fm = $this->solicitud->valor_fm;
}
?> -->

<div class="container " <?php if($_GET['mod']=="detalle_solicitud"){ echo 'style="font-family:Arial; background:white; padding:10px;"'; }?>>
	<div class="row">

			<div class="col-12">
				<div class="row form-group">
					<div class="col-lg-12"><b>FIGARANTIAS</b></div>
					<div class="col-lg-12">
						<p align="justify">Yo (nosotros), identificado(s) como aparece (mos) al pie de mi (nuestra) firma(s), por medio del presente documento expresamente manifiesto (amos) de
manera libre y voluntaria, que:<br>
Acepto (amos) la utilización de servicio de acceso al crédito del FONDO INTERNACIONAL DE GARANTÍAS S.A.S. para respaldar la operación aprobada
por EL FONDO DE EMPLEADOS DE LA SECRETARIA DISTRITAL DE INTEGRACIÓN SOCIAL SIGLA FESDIS en adelante el INTERMEDIARIO, lo cual
no me exime de cumplir con el pago de todas las sumas generadas por esta operación de crédito.<br>
Acepto (amos) de manera incondicional e irrevocable la obligación de pagar las tarifas establecidas por el FONDO INTERNACIONAL DE GARANTÍAS
S.A.S. por concepto del servicio para facilitar el acceso al crédito prestado por el FONDO INTERNACIONAL DE GARANTÍAS S.A.S. y su valor podrá ser
cargado o deducido de cualquier deposito constituido por mí (nosotros), o con cargo a las cuotas del mismo crédito o de cualquier obligación pactada con el
INTERMEDIARIO.<br>
Acepto (amos) pagar las comisiones del 2% establecidas por el FONDO INTERNACIONAL DE GARANTIAS S.A.S., la cual será cobrada de manera
anticipada en el momento del desembolso.<br>
Manifiesto que conozco (conocemos) las condiciones del servicio para facilitar el acceso al crédito que presta el FONDO INTERNACIONAL DE
GARANTIAS S.A.S., y por lo tanto, en caso que éste se vea en la obligación de pagar cualquier suma al INTERMEDIARIO como consecuencia de mi
(nuestro) incumplimiento en el pago de la obligación objeto de la prestación del servicio de acceso al crédito, el FONDO INTERNACIONAL DE GARANTIAS
S.A.S. tendrá derecho a recuperar las sumas pagadas y se subrogará en la calidad de acreedor por el valor pagado, si así lo considera el INTERMEDIARIO.
Autorizo (amos) irrevocablemente al INTERMEDIARIO a entregar al FONDO INTERNACIONAL DE GARANTÍAS S.A.S. toda la información relacionada
con la operación aprobada a mi (nuestro) favor y de igual manera autorizo (amos) al FONDO INTERNACIONAL DE GARANTÍAS S.A.S. a entregar dicha
información a terceros que puedan encargarse de la gestión de cobro de dicha cartera, si así lo considera el INTERMEDIARIO.<br>
Manifiesto que los recursos utilizados para el pago del servicio para facilitar el acceso al crédito a favor del FONDO INTERNACIONAL DE GARANTÍAS
S.A.S. provienen de fuentes licitas y la información que he (hemos) suministrado es verídica. Por lo tanto, doy (damos) mi (nuestro) consentimiento expreso
e irrevocable al FONDO INTERNACIONAL DE GARANTÍAS S.A.S. o a quien sea en el futuro acreedor de la obligación para:<br>
1. Consultar en cualquier tiempo, en las centrales de riesgo toda la información relevante para conocer mi (nuestro) desempeño como deudor (es), mi
(nuestra) capacidad de pago, o para valorar el riesgo futuro de concederme (nos) una garantía.<br>
2. Reportar a las centrales de riegos datos del cumplimiento o incumplimiento de mis (nuestras) obligaciones.<br>
3. Conservar, tanto en el FONDO INTERNACIONAL DE GARANTÍAS S.A.S., como en las centrales de riesgo, con las debidas actualizaciones y durante<br>
el periodo necesario señalados en sus reglamentos, mi (nuestra) información crediticia.
4. Suministrar a las centrales de riesgo datos relativos a mi (nuestra) solicitudes de crédito, así como otros atinentes a mis relaciones comerciales,
financieras y en general socioeconómicas que yo (nosotros) haya (mos) entregado o que consten en registros públicos, bases de datos públicas o
documentos públicos.<br>
5. Reportar a las autoridades públicas, tributarias aduaneras o judiciales la información para cumplir con sus funciones de controlar y velar el acatamiento
de mis deberes constitucionales y legales.<br>
La presente autorización facultará al FONDO INTERNACIONAL DE GARANTÍAS S.A.S. para ejercer su derecho a corroborar en cualquier tiempo que la
información suministrada es veraz, completa, exacta y actualizada, y de la misma forma facultará al INTERMEDIARIO para permitir el acceso a esta
información por parte del FONDO INTERNACIONAL DE GARANTÍAS S.A.S. o a quien en el futuro ostente la calidad de acreedor de la obligación.
La presente autorización faculta al FONDO INTERNACIONAL DE GARANTÍAS S.A.S. y a las centrales de riesgo a divulgar mí (nuestra) información para
elaborar estadísticas.<br>
Acepto (amos) la no devolución del pago del servicio para facilitar el acceso al crédito por parte del FONDO INTERNACIONAL DE GARANTIAS S.A.S. y
por ello renuncio (amos) a cualquier solicitud de cobro o reintegro de comisiones no causadas, lo anterior teniendo en cuenta de que doy fe de entender que
la totalidad del servicio fue prestado por el FONDO INTERNACIONAL DE GARANTÍAS S.A.S. en el momento en el cual el INTERMEDIARIO me otorgo y
desembolso el crédito, gracias a que el FONDO INTERNACIONAL DE GARANTÍAS S.A.S. con el servicio que me presto fue quien hizo posible dicha
aprobación de crédito.<br>
El presente documento tendrá validez desde su firma, por la vigencia del crédito otorgado por el INTERMEDIARIO, o de quien a futuro ostente la calidad de
acreedor de la (s) obligación (es), y en general por el termino establecido en la ley.
Autorización para el tratamiento de datos personales: En atención a la aplicación de la Ley 1581 de 2012 y su Decreto Reglamentario 1377 de 2013, el
titular del dato por medio del presente documento, imparte de manera previa, expresa e informada la siguiente autorización a los responsables y encargados
del tratamiento de datos personales para: El desarrollo de todas las operaciones propias del objeto social de la entidad (actividades relacionadas con el
otorgamiento del crédito, administración, pago y recuperación de cartera), el cumplimiento de las obligaciones establecidas en la Ley, análisis de riesgo,
estadísticos, de control, supervisión, encuestas, gestión de cobranza, comercialización de productos, mercadeo, verificación y actualización de información
entre otras. En cumplimiento de lo anterior, se podrá: Consultar, solicitar, administrar, procesar, modificar, actualizar, eliminar, reportar, almacenar, compilar,
enviar, utilizar, suministrar, grabar, obtener, transmitir, transferir, recolectar, confirmar, conservar, emplear, analizar, rectificar, estudiar y divulgar a los
responsables o encargados del tratamiento de datos personales, los operadores, centrales o bases de información, entidades financieras, sector solidario,
contratistas, cesionarios de cartera o terceras personas con quienes se entablen relaciones comerciales o legales, de prestación de servicios y de cualquier
otra índole para administrar y tratar la información personal suministrada en desarrollo del objeto social del FONDO DE INTERNACIONAL DE GARANTÍAS
S.A.S., dentro de los límites establecidos por la Ley. La presente autorización se hace extensiva a quien represente los intereses del FONDO
INTERNACIONAL DE GARANTÍAS S.A.S., a quien la sociedad ceda sus derechos, obligaciones o su posición contractual a cualquier título, en relación con
los productos o servicios de los que usted es titular.<br>
El Titular de los datos personales tendrá los siguientes derechos: a) Conocer, actualizar y rectificar sus datos personales frente a los Responsables del
Tratamiento o Encargados del Tratamiento; b) Solicitar prueba de la autorización otorgada al Responsable del Tratamiento; c) Ser informado por el
Responsable del Tratamiento o Encargado del Tratamiento, previa solicitud, respecto al uso que le ha dado a sus datos personales; d) Presentar ante la
Superintendencia de Industria y Comercio quejas por infracciones a lo dispuesto en la presente Ley y las demás normar que la modifiquen o adicionen o
complemente; e) Revocar la autorización y/o solicitar la supresión del dato cuando en el tratamiento no respeten los principios, derechos y garantías
constitucionales legales; f) Acceder en forma gratuita a sus datos personales que hayan sido objeto de Tratamiento. La Entidad responsable del tratamiento
de los datos personales será FONDO INTERNACIONAL DE GARANTÍAS S.A.S., con dirección física en la Calle 90 # 12-28 en la ciudad de Bogotá,
dirección electrónica: presidencia@figarantias.com , y teléfono 6381060.<br>
Declaro (amos), haber leído cuidadosamente el contrato contenido en este documento y haberlo comprendido a cabalidad, razón por la cual entiendo
(entendemos) sus alcances e implicaciones y en constancia de lo anterior firmo (amos).</p>

						<input type="hidden" name="valor_fm" id="valor_fm" value="<?php echo $valor_fm; ?>">
						 <div align="left" class="enlinea ancho_form2"><label>Acepto  <input type="checkbox" name="garantia" id="garantia" <?php if($this->solicitud->paso=="6" or $this->solicitud->paso=="5" or $this->solicitud->paso=="7" or $this->solicitud->paso=="8" or $_GET['mod']=="detalle_solicitud"){ echo 'checked="checked" disabled'; }  ?> required />
						</label>
						</div>

						<?php if(1==0){ ?>
							 <div align="left" class="enlinea ancho_form2">Financiado a &nbsp;<label class="margin20">3 meses <input name="FM_meses" type="radio" value="3" <?php if($this->solicitud->FM_meses=="3"){ echo 'checked="checked"'; }  ?> required /></label> &nbsp;&nbsp; <label>6 meses <input name="FM_meses" type="radio" value="6" <?php if($this->solicitud->FM_meses=="6"){ echo 'checked="checked"'; }  ?> required /></label>  </div> 
						<?php } ?>

					</div>





				</div>
			</div>



	</div>
</div>



<?php
function formato_pesos($x){
	$res = number_format($x,0,',','.');
	return $res;
}
?>



<!-- <script type="text/javascript">
	//document.getElementById('Enviar').style.display='';

var valor = $("#valor").val();
var valor_recogidos = $("#valor_recogidos").val();
var valor_desembolso = valor;
var valor_fm='<?php echo $valor_fm ?>';
//console.log("valor_fm"+valor_fm);
valor_desembolso = sin_puntos(valor_desembolso) - sin_puntos(valor_recogidos);
//console.log("valor_desembolso"+valor_desembolso);
$("#valor_desembolso").val(valor_desembolso);
$("#valor_desembolso1").val(valor_desembolso);
puntitos(document.getElementById('valor_desembolso'));

</script> -->


<?php if($_GET['mod']=="detalle_solicitud"){ ?>
	<script type="text/javascript">
		function f1(){
			$("input").prop("disabled", true);
			$("select").prop("disabled", true);
		}
		setTimeout(f1(),1000);
		setTimeout(f1(),2000);
		setTimeout(f1(),3000);
	</script>
<?php } ?>