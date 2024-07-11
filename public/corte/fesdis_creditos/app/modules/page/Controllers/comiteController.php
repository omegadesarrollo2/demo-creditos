<?php

/**
*
*/

class Page_comiteController extends Page_mainController
{

	public function indexAction()
	{
		if($_SESSION['kt_login_id']==""){
			//header("Location://FESDIS.com/sistema/");
			header("Location:/administracion/?url=/page/comite/&id=".$this->_getSanitizedParam("id")."&e=".$this->_getSanitizedParam("e")."");
			//print_r($_SESSION);
		}
		$contentModel = new Page_Model_DbTable_Content();
		$this->_view->bannerprincipal= $contentModel->getList("content_section = 'Publicidad - Banner'","orden ASC");

		$id = $this->_getSanitizedParam("id");
		$this->_view->numero = $numero = str_pad($id,6,"0",STR_PAD_LEFT);
		$this->_view->id = $id;
		$bancosModel = new Administracion_Model_DbTable_Bancos();
		$this->_view->bancos = $bancosModel->getList(""," nombre ASC ");

		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$solicitud = $solicitudModel->getById($id);
		$this->_view->solicitud = $solicitud;

		$e = $this->_getSanitizedParam("e");
		$e = str_replace("_","=",$e);
		$user_id = base64_decode($e);

		$userModel = new Administracion_Model_DbTable_Usuario();
		$aprobador = $userModel->getById($user_id);
		$this->_view->aprobador = $aprobador;

		$tipo=1;

		$comiteModel = new Administracion_Model_DbTable_Comite();
		$existe = $comiteModel->getList(" comite_solicitud_id='$id' AND comite_user_id='$user_id' AND comite_tipo='$tipo' AND (comite_aprobacion='1' OR comite_aprobacion='4') ","");
		$this->_view->existe = $existe;

		$usuarioModel = new Administracion_Model_DbTable_Usuario();
		$cedula = $solicitud->cedula;
		$usuario = $usuarioModel->getList(" user_user = '$cedula' ","")[0];

		$linea = $solicitud->linea;
		$lineaModel = new Administracion_Model_DbTable_Lineas();
		$lineas = $lineaModel->getList(" codigo='$linea' ","")[0];

		$analista_id = $solicitud->asignado;
		$analista = $usuarioModel->getById($analista_id);

		$tabla = $this->generartabla($numero,$usuario,$solicitud,$lineas,$analista);
		$this->_view->tabla = $tabla;

		$this->_view->validaciones = array("En estudio","Aprobado","Contabilizado","Anulado","Rechazado","Procesado","Aplazado");

		$documentosadicionalesModel = new Administracion_Model_DbTable_Documentosadicionales();
		$this->_view->adicionales = $documentosadicionalesModel->getList(" solicitud='$id' ","");

		$documentosModel = new Administracion_Model_DbTable_Documentos();
		$documentos = $documentosModel->getList(" solicitud = '$id' AND tipo='1' ","")[0];
		$documentos2 = $documentosModel->getList(" solicitud = '$id' AND tipo='2' ","")[0];
		$documentos3 = $documentosModel->getList(" solicitud = '$id' AND tipo='3' ","")[0];
		$this->_view->documentos = $documentos;
		$this->_view->documentos2 = $documentos2;
		$this->_view->documentos3 = $documentos3;

		$codeudorModel = new Administracion_Model_DbTable_Codeudor();
		$this->_view->codeudor2 = $codeudorModel->getList(" solicitud='$id' AND codeudor_numero='2' ","")[0];

	}

	public function  documentosadicionalesAction(){
	}

	public function  anexosAction(){
	}

	public function guardarAction(){

		$id = $this->_getSanitizedParam("id");
		$aprobacion = $this->_getSanitizedParam("aprobacion");
		$observacion = $this->_getSanitizedParam("observacion");
		$fecha = $this->_getSanitizedParam("fecha");
		$usuario = $this->_getSanitizedParam("usuario");
		$tipo = 1;

		$comiteModel = new Administracion_Model_DbTable_Comite();

		$data['comite_solicitud_id'] = $id;
		$data['comite_aprobacion'] = $aprobacion;
		$data['comite_observacion'] = $observacion;
		$data['comite_user_id'] = $usuario;
		$data['comite_fecha'] = $fecha;
		$data['comite_tipo'] = $tipo;

		$comiteModel->insert($data);

		//validar aprobacion
		$comiteModel = new Administracion_Model_DbTable_Comite();
		$aprobado = count($comiteModel->getList(" comite_solicitud_id='$id' AND comite_aprobacion='1' AND comite_tipo='$tipo' ",""));
		$rechazado = count($comiteModel->getList(" comite_solicitud_id='$id' AND comite_aprobacion='2' AND comite_tipo='$tipo' ",""));
		$aplazado = count($comiteModel->getList(" comite_solicitud_id='$id' AND comite_aprobacion='3' AND comite_tipo='$tipo' ",""));
		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$hoy = date("Y-m-d");
		$this->notificaraprobador($id,$data);
		if($aprobado>=3){
			$solicitudModel->editField($id,"validacion","1");
			$solicitudModel->editField($id,"fecha_estado",$hoy);
			$this->enviaraprobacion($id,"1",$observacion);
		}
		if($rechazado>=3){
			$solicitudModel->editField($id,"validacion","4");
			$solicitudModel->editField($id,"fecha_estado",$hoy);
			$this->enviaraprobacion($id,"2",$observacion);
		}
		if($aplazado>=3){
			$solicitudModel->editField($id,"validacion","6");
			$solicitudModel->editField($id,"fecha_estado",$hoy);
		}
		//validar aprobacion

		header("Location: /page/comite/guardado/");

	}

	public function enviaraprobacion($id,$validacion,$observacion){
		$validacion1 = "";
		if($validacion=="1"){
			$validacion1="APROBADA";
		}else{
			$validacion1="RECHAZADA";
		}

		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$numero = str_pad($id,6,"0",STR_PAD_LEFT);
		$solicitud = $solicitudModel->getById($id);

		$emailModel = new Core_Model_Mail();
		$asunto = "Notificación solicitud crédito WEB".$numero."";

		$usuarioModel = new Administracion_Model_DbTable_Usuario();
		$analista_id = $solicitud->asignado;
		$analista = $usuarioModel->getById($analista_id);

		$email = $solicitud->correo_personal;
		$correo1 = $analista->user_email;

		$content = '<img src="http://creditos.fesdis.com.co/corte/banner.png"><br>
		<p>Estimado asociado(a), su solicitud <b>WEB'.$numero.'</b>, por valor de <b>$'.number_format($solicitud->valor).'</b> fue <b>'.$validacion1.'</b></p>';

		if($validacion1=="APROBADA"){
			//$content.="<br>Por favor imprima y firme el pagaré y carta de instrucciones anexo en el correo. Debe enviar esta documentación a la oficina de Fesdis en físico.";
			//$content.="<br><p><b>Espere próximamente nuestro servicio de pagaré digital</b></p>";
			$content.="Por favor imprima el pagaré y carta de instrucciones adjunto en este correo.<br><br>Debido a la situación actual y las medidas de prevención establecidas por el covid-19,  transitoriamente se acepta el pagaré y carta de instrucciones debidamente firmados y remitidos por medio electrónico al correo auxiliar02@fesdis.com.co, mientras dure la emergencia.<br><br>Una vez cesado el periodo de emergencia, dispondrá de cinco (5) días hábiles para hacer llegar a las  oficinas del Fondo  los documentos originales respectivos.";

			$emailModel->getMail()->addStringAttachment(file_get_contents("http://creditos.fesdis.com.co/corte/ACPAGARE.pdf"), "ACPAGARE.pdf");
			//$emailModel->getMail()->addStringAttachment(file_get_contents("http://creditos.fesdis.com.co/corte/formato_seguro_creditos_-_fendesa.pdf"), "formato_seguro_creditos_-_fendesa.pdf");
		}

		if($observacion!=""){
			$content .= "Observación: ".$observacion;
		}

        $emailModel->getMail()->setFrom("notificaciones@fonkoba.com.co", "Notificaciones FONKOBA");
        $emailModel->getMail()->addBCC("soporteomega@omegawebsystems.com");
		$emailModel->getMail()->addAddress("".$email);
		$emailModel->getMail()->addAddress("".$correo1);

        $emailModel->getMail()->Subject = $asunto;
        $emailModel->getMail()->msgHTML($content);
        $emailModel->getMail()->AltBody = $content;
        $emailModel->sed();

	}

	public function notificaraprobador($id,$data){
		$validacion1 = "";
		$validacion = $data['comite_aprobacion'];
		if($validacion=="1"){
			$validacion1="APROBADA";
		}else{
			$validacion1="RECHAZADA";
		}

		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$numero = str_pad($id,6,"0",STR_PAD_LEFT);
		$solicitud = $solicitudModel->getById($id);

		$emailModel = new Core_Model_Mail();
		$asunto = "Confirmación solicitud crédito WEB".$numero."";

		$usuarioModel = new Administracion_Model_DbTable_Usuario();
		$aprobador = $usuarioModel->getById($data['comite_user_id']);

		$correo1 = $aprobador->user_email;
		$observacion = "-";
		if($data['comite_observacion']!=""){
			$observacion=$data['comite_observacion'];
		}

		$content = '<img src="http://creditos.fesdis.com.co/corte/banner.png"><br>
		<p>Estimado usuario, usted dio su opinión respecto a la solicitud <b>WEB'.$numero.'</b>,<br>
		Validación: <b>'.$validacion1.'</b><br>
		Observación: <b>'.$observacion.'</b><br>
		Fecha: <b>'.$data['comite_fecha'].'</b><br>
		</p>';

        $emailModel->getMail()->setFrom("notificaciones@fonkoba.com.co", "Notificaciones FONKOBA");
        $emailModel->getMail()->addBCC("soporteomega@omegawebsystems.com");
		$emailModel->getMail()->addAddress("".$correo1);

        $emailModel->getMail()->Subject = $asunto;
        $emailModel->getMail()->msgHTML($content);
        $emailModel->getMail()->AltBody = $content;
        $emailModel->sed();

	}

	public function guardadoAction(){

	}

	public function sin_puntos($x){
		$x = str_replace(".","",$x);
		$x = str_replace(",","",$x);
		$x=$x*1;
		return $x;
	}

	public function limpiar($x){
		$mal = array("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","Ñ","*","'"," ","&","$",'"');
		$bien = array("a","e","i","o","u","A","E","I","O","U","n","N","","","_","","",'');
		$x = str_replace($mal,$bien,$x);
		//$x = utf8_encode($x);
		$x = trim($x);
		return $x;
	}

	public function limpiar2($x){
		$mal = array("á","é","í","ó","ú","Á","É","Í","Ó","Ú","*","'"," ","&","$",'"');
		$bien = array("a","e","i","o","u","A","E","I","O","U","",""," ","","",'');
		$x = str_replace($mal,$bien,$x);
		$x = trim($x);
		return $x;
	}

	function formato_pesos($x){
		$res = number_format($x,0,',','.');
		return $res;
	}


	function generartabla($numero,$usuario,$solicitud,$lineas,$analista){

		$nombres = $solicitud->nombres." ".$solicitud->nombres2." ".$solicitud->apellido1." ".$solicitud->apellido2;
		$garantias = array("","APORTES SOCIALES INDIVIDUALES","CODEUDOR","FONDO MUTUAL DE GARANTÍAS","HIPOTECA","PRENDA");

		$tabla .= '<table width="100%" style="max-width:900px;" border="1" cellspacing="0" cellpadding="3" class="formulario tabla_lineas">
		  <tr class="fondo-gris">
		    <td colspan="2"><div align="center">
		    <b>Resumen de solicitud</b></div></td>
		  </tr>
		  <tr>
		    <td><strong>Solicitud</strong></td>
		    <td align="right">WEB'.$numero.'</td>
		  </tr>
		  <tr>
		    <td><strong>Documento</strong></td>
		    <td align="right">'.$solicitud->cedula.'</td>
		  </tr>
		  <tr>
		    <td><strong>Nombre</strong></td>
		    <td align="right">'.$nombres.'</td>
		  </tr>
		  <tr>
		    <td><strong>Email</strong></td>
		    <td align="right">'.$solicitud->correo_personal.'</td>
		  </tr>
		  <tr>
		    <td><strong>Celular</strong></td>
		    <td align="right">'.$solicitud->celular.'</td>
		  </tr>
		  <tr>
		    <td><strong>Tel&eacute;fono</strong></td>
		    <td align="right">'.$solicitud->telefono.'</td>
		  </tr>
		  <tr>
		    <td><strong>L&iacute;nea de cr&eacute;dito</strong></td>
		    <td align="right">'.$lineas->codigo.' - '.$lineas->nombre.'&nbsp;</td>
		  </tr>';


		$valida = array("NO","SI");
		$valida['']="NO";
		$saldo = $solicitud->valor-$solicitud->valor_desembolso;

		$tabla.='
		  <tr>
		    <td><strong>Valor solicitado</strong></td>
		    <td align="right">$'.$this->formato_pesos($solicitud->valor).'</td>
		  </tr>
		  <tr>
		    <td><strong>Recoge créditos?</strong></td>
		    <td align="right">'.$valida[$solicitud->recoger_credito].'</td>
		  </tr>';

		if($solicitud->recoger_credito=="1"){
			$tabla.='
			  <tr>
			    <td><strong>Créditos recogidos</strong></td>
			    <td align="right">'.$solicitud->numeros_recogidos.'</td>
			  </tr>
			  <tr>
			    <td><strong>Total saldo recogidos</strong></td>
			    <td align="right">$'.$this->formato_pesos($solicitud->valor_recogidos).'</td>
			  </tr>';
		}

		// if($solicitud->valor_fm>0){
		//   $tabla.='
		//   <tr>
		//     <td><strong>Valor fondo mutual</strong></td>
		//     <td align="right">$'.$this->formato_pesos($solicitud->valor_fm).'</td>
		//   </tr>';
		// }


		$tabla.='
		  <tr>
		    <td><strong>Valor desembolso</strong></td>
		    <td align="right">$'.$this->formato_pesos($solicitud->valor_desembolso).'</td>
		  </tr>
		  <tr>
		    <td><strong>N&uacute;mero de Cuotas</strong></td>
		    <td align="right">'.$solicitud->cuotas.'</td>
		  </tr>
		  <tr>
		    <td><strong>Valor aproximado de cuota</strong></td>
		    <td align="right">$'.$this->formato_pesos($solicitud->valor_cuota).'</td>
		  </tr>
		  <tr>
		    <td><strong>Tasa efectiva anual</strong></td>
		    <td align="right">'.$solicitud->tasa_anual.'%</td>
		  </tr>
		  <tr>
		    <td><strong>Tasa mes vencido</strong></td>
		    <td align="right">'.$solicitud->tasa.'%</td>
		  </tr>
		  <tr>
		    <td><strong>Garantía</strong></td>
		    <td align="right">'.$garantias[$solicitud->tipo_garantia].'</td>
		  </tr>
		  <tr>
		    <td><strong>Fecha solicitud</strong></td>
		    <td align="right">'.$solicitud->fecha_asignado.'</td>
		  </tr>

		  ';

		  if($solicitud->fecha_anterior!=""){
			$tabla.='
			  <tr>
			    <td><strong>Fecha solicitud anterior incompleta</strong></td>
			    <td align="right">'.$solicitud->fecha_anterior.'</td>
			  </tr>';
		  }

		$correo1 = $analista->user_email;
		$extension = "";
		if($analista->user_ext!=""){
			$extension = " ext ".$analista->user_ext;
		}

		$tabla.='
		  <tr>
		    <td><strong>Trámite</strong></td>
		    <td align="right">'.$solicitud->tramite.'</td>
		  </tr>
		  <tr>
		    <td><strong>Capacidad de endeudamiento</strong></td>
		    <td align="right">'.$solicitud->capacidad_endeudamiento.'</td>
		  </tr>
		  <tr>
		    <td><strong>Analista de crédito asignado</strong></td>
		    <td align="right">'.$analista->user_names.'</td>
		  </tr>
		  <tr>
		    <td><strong>Email</strong></td>
		    <td align="right">'.$correo1.'</td>
		  </tr>
		  <tr>
		    <td><strong>Tel&eacute;fono</strong></td>
		    <td align="right">'.$analista->user_telefono.$extension.'</td>
		  </tr>
		  <tr>
		    <td><strong>Celular del analista</strong></td>
		    <td align="right">'.$analista->user_celular.'</td>
		  </tr>
		</table>';

		return $tabla;

	}

}