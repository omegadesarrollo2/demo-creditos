<?php

/**
 *
 */

class Page_cambiosolicitudController extends Page_mainController
{

  public function indexAction()
  {
    // if($_SESSION['kt_login_id']==""){
    // 	//header("Location://FESDIS.com/sistema/");
    // 	header("Location:/administracion/?url=/page/comite/&id=".$this->_getSanitizedParam("id")."&e=".$this->_getSanitizedParam("e")."");
    // 	//print_r($_SESSION);
    // }
    $contentModel = new Page_Model_DbTable_Content();
    $this->_view->bannerprincipal = $contentModel->getList("content_section = 'Publicidad - Banner'", "orden ASC");

    $id = $this->_getSanitizedParam("id");
    $this->_view->numero = $numero = str_pad($id, 6, "0", STR_PAD_LEFT);
    $this->_view->id = $id;
    $bancosModel = new Administracion_Model_DbTable_Bancos();
    $this->_view->bancos = $bancosModel->getList("", " nombre ASC ");

    $solicitudModel = new Administracion_Model_DbTable_Solicitudes();
    $solicitud = $solicitudModel->getById($id);
    $this->_view->solicitud = $solicitud;

    $e = $this->_getSanitizedParam("e");
    $e = str_replace("_", "=", $e);
    $user_id = base64_decode($e);

    $userModel = new Administracion_Model_DbTable_Usuario();
    $aprobador = $userModel->getById($user_id);
    $this->_view->aprobador = $aprobador;

    $tipo = 1;

    $comiteModel = new Administracion_Model_DbTable_Comite();
    $existe = $solicitudModel->getList("id=$id AND (acepto_cambios=1 or acepto_cambios=2 or acepto_cambios=4) ", "");
    $this->_view->existe = $existe;

    $usuarioModel = new Administracion_Model_DbTable_Usuario();
    $cedula = $solicitud->cedula;
    $usuario = $usuarioModel->getList(" user_user = '$cedula' ", "")[0];

    $linea = $solicitud->linea;
    $linea2 = $solicitud->linea_desembolso;
    $lineaModel = new Administracion_Model_DbTable_Lineas();
    $lineas = $lineaModel->getList(" codigo='$linea' ", "")[0];
    $lineas2 = $lineaModel->getList(" codigo='$linea2' ", "")[0];
    $analista_id = $solicitud->asignado;
    $analista = $usuarioModel->getById($analista_id);

    $tabla = $this->generartabla($numero, $usuario, $solicitud, $lineas, $lineas2, $analista);
    $this->_view->tabla = $tabla;

    $this->_view->validaciones = array("En estudio", "Aprobado", "Contabilizado", "Anulado", "Rechazado", "Procesado", "Aplazado");

    $documentosadicionalesModel = new Administracion_Model_DbTable_Documentosadicionales();
    $this->_view->adicionales = $documentosadicionalesModel->getList(" solicitud='$id' ", "");

    $documentosModel = new Administracion_Model_DbTable_Documentos();
    $documentos = $documentosModel->getList(" solicitud = '$id' AND tipo='1' ", "")[0];
    $documentos2 = $documentosModel->getList(" solicitud = '$id' AND tipo='2' ", "")[0];
    $documentos3 = $documentosModel->getList(" solicitud = '$id' AND tipo='3' ", "")[0];
    $this->_view->documentos = $documentos;
    $this->_view->documentos2 = $documentos2;
    $this->_view->documentos3 = $documentos3;

    $codeudorModel = new Administracion_Model_DbTable_Codeudor();
    $this->_view->codeudor2 = $codeudorModel->getList(" solicitud='$id' AND codeudor_numero='2' ", "")[0];
  }

  public function  documentosadicionalesAction()
  {
  }

  public function  anexosAction()
  {
  }

  public function guardarAction()
  {

    $id = $this->_getSanitizedParam("id");
    $aprobacion = $this->_getSanitizedParam("aprobacion");
    $observacion = $this->_getSanitizedParam("observacion");
    $fecha = $this->_getSanitizedParam("fecha");
    $usuario = $this->_getSanitizedParam("usuario");
    $tipo = 1;
    $solicitudModel = new Administracion_Model_DbTable_Solicitudes();
    $solicitudModel->editField($id, "acepto_cambios", $aprobacion);
    $solicitudModel->editField($id, "fecha_aceptacion", $fecha);
    $solicitudModel->editField($id, "observaciones_cambios", $observacion);

    $logestado = new Administracion_Model_DbTable_Logestado();
    $hora = date("H:i:s");
    $solicitud = $solicitudModel->getById($id);
    $hoy = date("Y-m-d");
    if ($aprobacion == 1) {
      $solicitudModel->editField($id, "validacion", "1");
      $this->notificaranalista($id);
      $dataestado["solicitud"] = $id;
      $dataestado["estado"] = "Aprobado por el asociado";
      $dataestado["usuario"] = "Asociado";
      $dataestado["fecha"] = $hoy . " " . $hora;
      $logestado->insert($dataestado);
      if ($solicitud->linea == "CF" || $solicitud->linea == "SE" || $solicitud->linea == "SO" || $solicitud->linea == "CDU") {
      } else {
        $_SESSION['ingreso_temporal'] = 1;
        $_SESSION['kt_login_id'] = rand(1, 30);
        $_SESSION['kt_login_level'] = 20;
        header("location: /administracion/solicitudes/aprobar/?id=" . $id);
      }
    } else {
      $solicitudModel->editField($id, "validacion", "4");
      $dataestado["solicitud"] = $id;
      $dataestado["estado"] = "Rechazado por el asociado";
      $dataestado["usuario"] = "Asociado";
      $dataestado["fecha"] = $hoy . " " . $hora;
      $logestado->insert($dataestado);
      $this->notificaranalista($id);
      header("Location: /page/cambiosolicitud/guardado?r=$aprobacion");
    }


    //validar aprobacion

    $solicitudModel = new Administracion_Model_DbTable_Solicitudes();


    //validar aprobacion




  }

  public function enviaraprobacion($id, $validacion, $observacion)
  {
    $validacion1 = "";
    if ($validacion == "1") {
      $validacion1 = "APROBADA";
    } else {
      $validacion1 = "RECHAZADA";
    }

    $solicitudModel = new Administracion_Model_DbTable_Solicitudes();
    $numero = str_pad($id, 6, "0", STR_PAD_LEFT);
    $solicitud = $solicitudModel->getById($id);

    $emailModel = new Core_Model_Mail();
    $asunto = "Notificación solicitud crédito WEB" . $numero . "";

    $usuarioModel = new Administracion_Model_DbTable_Usuario();
    $analista_id = $solicitud->asignado;
    $analista = $usuarioModel->getById($analista_id);

    $email = $solicitud->correo_personal;
    $correo1 = $analista->user_email;

    $content = '<br>
		<p>Estimado asociado(a), su solicitud <b>WEB' . $numero . '</b>, por valor de <b>$' . number_format($solicitud->valor) . '</b> fue <b>' . $validacion1 . '</b></p>';

    // if($validacion1=="APROBADA"){
    //$content.="<br>Por favor imprima y firme el pagaré y carta de instrucciones anexo en el correo. Debe enviar esta documentación a la oficina de Fesdis en físico.";
    //$content.="<br><p><b>Espere próximamente nuestro servicio de pagaré digital</b></p>";
    // $content.="Por favor imprima el pagaré y carta de instrucciones adjunto en este correo.<br><br>Debido a la situación actual y las medidas de prevención establecidas por el covid-19,  transitoriamente se acepta el pagaré y carta de instrucciones debidamente firmados y remitidos por medio electrónico al correo auxiliar02@fesdis.com.co, mientras dure la emergencia.<br><br>Una vez cesado el periodo de emergencia, dispondrá de cinco (5) días hábiles para hacer llegar a las  oficinas del Fondo  los documentos originales respectivos.";

    // $emailModel->getMail()->addStringAttachment(file_get_contents("https://creditosfondtodos.com.co/corte/ACPAGARE.pdf"), "ACPAGARE.pdf");
    //$emailModel->getMail()->addStringAttachment(file_get_contents("https://creditosfondtodos.com.co/corte/formato_seguro_creditos_-_fendesa.pdf"), "formato_seguro_creditos_-_fendesa.pdf");
    // }

    if ($observacion != "") {
      $content .= "Observación: " . $observacion;
    }

    $emailModel->getMail()->setFrom("notificaciones@fondtodos.com", "Notificaciones FONDTODOS");
    $emailModel->getMail()->addBCC("soporteomega@omegawebsystems.com");
    $emailModel->getMail()->addBCC("desarrollo2@omegawebsystems.com");
    $emailModel->getMail()->addBCC("notificaciones@fondtodos.com");
    $emailModel->getMail()->addAddress("" . $email);
    $emailModel->getMail()->addAddress("" . $correo1);

    $emailModel->getMail()->Subject = $asunto;
    $emailModel->getMail()->msgHTML($content);
    $emailModel->getMail()->AltBody = $content;
    $emailModel->sed();
  }

  public function notificaranalista($id)
  {


    $solicitudModel = new Administracion_Model_DbTable_Solicitudes();
    $numero = str_pad($id, 6, "0", STR_PAD_LEFT);
    $solicitud = $solicitudModel->getById($id);
    if ($solicitud->acepto_cambios == 1) {
      $validacion1 = "Aprobado";
    } else if ($solicitud->acepto_cambios == 2) {
      $validacion1 = "Rechazado";
    }
    $emailModel = new Core_Model_Mail();
    $asunto = "Notificacion de cambio solicitud crédito WEB" . $numero . "";

    $usuarioModel = new Administracion_Model_DbTable_Usuario();
    $aprobador = $usuarioModel->getById($solicitud->asignado);

    $correo1 = $aprobador->user_email;
    $observacion = "-";
    if ($solicitud->observaciones_cambios != "") {
      $observacion = $solicitud->observaciones_cambios;
    }
    $fecha = $solicitud->fecha_aceptacion;
    $content = '
		<p>Se ha enviado una respuesta para la solicitud de cambio <b>WEB' . $numero . '</b>,<br>
		Validación: <b>' . $validacion1 . '</b><br>
		Observación: <b>' . $observacion . '</b><br>
		Fecha: <b>' . $fecha . '</b><br>
		</p>';

    $emailModel->getMail()->setFrom("notificaciones@fondtodos.com", "Notificaciones FONDTODOS");
    $emailModel->getMail()->addBCC("soporteomega@omegawebsystems.com");
    $emailModel->getMail()->addBCC("desarrollo2@omegawebsystems.com");
    $emailModel->getMail()->addBCC("notificaciones@fondtodos.com");
    $emailModel->getMail()->addAddress("" . $correo1);

    $emailModel->getMail()->Subject = $asunto;
    $emailModel->getMail()->msgHTML($content);
    $emailModel->getMail()->AltBody = $content;
    $emailModel->sed();
  }

  public function guardadoAction()
  {
  }

  public function sin_puntos($x)
  {
    $x = str_replace(".", "", $x);
    $x = str_replace(",", "", $x);
    $x = $x * 1;
    return $x;
  }

  public function limpiar($x)
  {
    $mal = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "Ñ", "*", "'", " ", "&", "$", '"');
    $bien = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "", "", "_", "", "", '');
    $x = str_replace($mal, $bien, $x);
    //$x = utf8_encode($x);
    $x = trim($x);
    return $x;
  }

  public function limpiar2($x)
  {
    $mal = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "*", "'", " ", "&", "$", '"');
    $bien = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "", "", " ", "", "", '');
    $x = str_replace($mal, $bien, $x);
    $x = trim($x);
    return $x;
  }

  function formato_pesos($x)
  {
    $res = number_format($x, 0, ',', '.');
    return $res;
  }


  function generartabla($numero, $usuario, $solicitud, $lineas, $lineas2, $analista)
  {

    $nombres = $solicitud->nombres . " " . $solicitud->nombres2 . " " . $solicitud->apellido1 . " " . $solicitud->apellido2;
    $garantias = array("", "APORTES SOCIALES INDIVIDUALES", "CODEUDOR", "FONDO MUTUAL DE GARANTÍAS", "HIPOTECA", "PRENDA");
    $tabla = "";
    $tabla .= '<table width="100%" style="max-width:900px;" border="1" cellspacing="0" cellpadding="3" class="formulario tabla_lineas">
		  <tr class="fondo-gris">
		    <td colspan="3"><div align="center">
		    <b>Resumen de solicitud</b></div></td>
		  </tr>
		  <tr class="fondo-gris">
		    <td><div align="center">
		    <b></b></div></td>
			<td><div align="center">
		    <b>Valor solicitado</b></div></td>
			<td><div align="center">
		    <b>Valor aprobado</b></div></td>
		  </tr>




		';


    $valida = array("NO", "SI");
    $valida[''] = "NO";
    $saldo = $solicitud->valor - $solicitud->valor_desembolso;

    $tabla .= '
		  <tr>
		    <td><strong>Valor solicitado</strong></td>
		    <td align="right">$' . $this->formato_pesos($solicitud->valor) . '</td>
			<td align="right">$' . $this->formato_pesos($solicitud->valor_desembolso + $solicitud->valor_recogidos) . '</td>
		  </tr>
	';

    // if($solicitud->recoger_credito=="1"){
    // 	$tabla.='
    // 	  <tr>
    // 	    <td><strong>Créditos recogidos</strong></td>
    // 	    <td align="right">'.$solicitud->numeros_recogidos.'</td>
    // 	  </tr>
    // 	  <tr>
    // 	    <td><strong>Total saldo recogidos</strong></td>
    // 	    <td align="right">$'.$this->formato_pesos($solicitud->valor_recogidos).'</td>
    // 	  </tr>';
    // }

    // if($solicitud->valor_fm>0){
    //   $tabla.='
    //   <tr>
    //     <td><strong>Valor fondo mutual</strong></td>
    //     <td align="right">$'.$this->formato_pesos($solicitud->valor_fm).'</td>
    //   </tr>';
    // }


    $tabla .= '

		  <tr>
		    <td><strong>N&uacute;mero de Cuotas</strong></td>
		    <td align="right">' . $solicitud->cuotas . '</td>
			<td align="right">' . $solicitud->cuotas_desembolso . '</td>
		  </tr>
		  <tr>
		    <td><strong>Valor aproximado de cuota</strong></td>
		    <td align="right">$' . $this->formato_pesos($solicitud->valor_cuota) . '</td>
			<td align="right">$' . $this->formato_pesos($solicitud->valor_cuota_desembolso) . '</td>
		  </tr>
		  <tr>
		    <td><strong>Linea</strong></td>
		    <td align="right">' . $lineas->codigo . ' - ' . $lineas->nombre . '&nbsp;</td>
			<td align="right">' . $lineas2->codigo . ' - ' . $lineas2->nombre . '&nbsp;</td>
		  </tr>
		  <tr>
		    <td><strong>Tasa</strong></td>
		    <td align="right">' . $solicitud->tasa . '%&nbsp;</td>
			<td align="right">' . $solicitud->tasa_desembolso . '%&nbsp;</td>
		  </tr>
		  


		  ';
    if ($solicitud->valor_extra && $solicitud->cuotas_extra) {
      $tabla .= ' <tr>
		    <td><strong>Compromiso de primas</strong></td>
		    <td align="right">' . $solicitud->cuotas_extra . '</td>
			<td align="right">' . $solicitud->cuotas_extra_desembolso . '</td>
		  </tr>
			<tr>
		    <td><strong>Valor compromiso de primas</strong></td>
		    <td align="right">$' . $this->formato_pesos($solicitud->valor_extra) . '</td>
			<td align="right">$' . $this->formato_pesos($solicitud->valor_extra_desembolso) . '</td>
		  </tr>';
    }



    $correo1 = $analista->user_email;
    $extension = "";
    if ($analista->user_ext != "") {
      $extension = " ext " . $analista->user_ext;
    }

    $tabla .= '
		
		</table>';

    return $tabla;
  }
}
