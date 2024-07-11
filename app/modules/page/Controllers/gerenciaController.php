<?php

/**
 *
 */

class Page_gerenciaController extends Page_mainController
{

  public function indexAction()
  {
    if ($_SESSION['kt_login_id'] == "") {
      //header("Location://FESDIS.com/sistema/");
      //header("Location:/administracion/?url=/page/comiteespecial/&id=".$this->_getSanitizedParam("id")."&e=".$this->_getSanitizedParam("e")."");
      //print_r($_SESSION);
    }
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

    $tipo = 2;

    $comiteModel = new Administracion_Model_DbTable_Comite();
    $existe = $comiteModel->getList(" comite_solicitud_id='$id' AND comite_user_id='$user_id' AND comite_tipo='$tipo' AND (comite_aprobacion='1' OR comite_aprobacion='4') ", "");
    $this->_view->existe = $existe;

    $usuarioModel = new Administracion_Model_DbTable_Usuario();
    $cedula = $solicitud->cedula;
    $usuario = $usuarioModel->getList(" user_user = '$cedula' ", "")[0];

    $linea = $solicitud->linea;
    $linea_desembolso = $solicitud->linea_desembolso;
    $lineaModel = new Administracion_Model_DbTable_Lineas();
    $lineas = $lineaModel->getList(" codigo='$linea' ", "")[0];
    $linea_desembolso = $lineaModel->getList(" codigo='$linea_desembolso' ", "")[0];

    $analista_id = $solicitud->asignado;
    $analista = $usuarioModel->getById($analista_id);

    $tabla = $this->generartabla($numero, $usuario, $solicitud, $lineas, $analista, $linea_desembolso);
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
    $documetosModel = new Administracion_Model_DbTable_Documentos();
    $this->_view->documentos_codeudor = $documentosModel->getList(" solicitud='$id' AND tipo='2' ", "")[0];
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
    $tipo = 2;

    $comiteModel = new Administracion_Model_DbTable_Comite();

    $data['comite_solicitud_id'] = $id;
    $data['comite_aprobacion'] = $aprobacion;
    $data['comite_observacion'] = $observacion;
    $data['comite_user_id'] = $usuario;
    $data['comite_fecha'] = $fecha;
    $data['comite_tipo'] = $tipo;
    $comiteModel = new Administracion_Model_DbTable_Comite();
    $existe = $comiteModel->getList(" comite_solicitud_id='$id' AND comite_user_id='$usuario' AND comite_tipo='$tipo' ", "");
    if (count($existe) == 0) {
      $comiteModel->insert($data);
    } else {
      $comiteModel->editField($existe[0]->comite_id, "comite_aprobacion", $aprobacion);
      $comiteModel->editField($existe[0]->comite_id, "comite_observacion", $observacion);
      $comiteModel->editField($existe[0]->comite_id, "comite_fecha", date("Y-m-d"));
    }
    $aprobado = count($comiteModel->getList(" comite_solicitud_id='$id' AND comite_aprobacion='1' AND comite_tipo='$tipo' ", ""));
    $rechazado = count($comiteModel->getList(" comite_solicitud_id='$id' AND comite_aprobacion='2' AND comite_tipo='$tipo' ", ""));
    $aplazado = count($comiteModel->getList(" comite_solicitud_id='$id' AND comite_aprobacion='3' AND comite_tipo='$tipo' ", ""));
    $cambio = count($comiteModel->getList(" comite_solicitud_id='$id' AND comite_aprobacion='4' AND comite_tipo='$tipo' ", ""));
    $devolucion = count($comiteModel->getList(" comite_solicitud_id='$id' AND comite_aprobacion='9' AND comite_tipo='$tipo' ", ""));
    $solicitudModel = new Administracion_Model_DbTable_Solicitudes();

    $logestado = new Administracion_Model_DbTable_Logestado();
    $hora = date("H:i:s");
    $hoy = date("Y-m-d");
    
    if($aprobacion=="4"){
      $solicitudModel->editField($id, "validacion", "6");
      $solicitudModel->editField($id, "fecha_estado", $hoy);
    }
    
    $this->notificaraprobador($id, $data);
    if($aprobacion == 1){
      if ($aprobado >= 1) {
        $solicitudModel->editField($id, "validacion", "1");
        $solicitudModel->editField($id, "fecha_estado", $hoy);
        $solicitudModel->editField($id, "fecha_aprobado", $hoy);

        $dataestado["solicitud"] = $id;
        $dataestado["estado"] = "Aprobado";
        $dataestado["usuario"] = $_SESSION["kt_login_id"];
        $dataestado["fecha"] = $hoy . " " . $hora;
        $logestado->insert($dataestado);
        $solicitud_data = $solicitudModel->getById($id);
        if ($solicitud_data->recoger_credito != 1) {
          $solicitudModel->editField($id, "correo_aprobacion_enviado", "1");
          if ($this->enviaraprobacion($id, $aprobacion, $observacion)) {
            $solicitudModel->editField($id, "correo_aprobacion_enviado", "1");
          }
        }
      }
    }
    if($aprobacion == 2){
      if ($rechazado >= 1) {
        $solicitudModel->editField($id, "validacion", "4");
        $solicitudModel->editField($id, "fecha_estado", $hoy);
        $this->enviaraprobacion($id, "2", $observacion);
        $dataestado["solicitud"] = $id;
        $dataestado["estado"] = "Rechazado";
        $dataestado["usuario"] = $_SESSION["kt_login_id"];
        $dataestado["fecha"] = $hoy . " " . $hora;
        $logestado->insert($dataestado);
      }
    }
    if($aprobacion == 3){
      if ($aplazado >= 1) {
        $solicitudModel->editField($id, "validacion", "3");
        $solicitudModel->editField($id, "fecha_estado", $hoy);
        $dataestado["solicitud"] = $id;
        $dataestado["estado"] = "Aplazado";
        $dataestado["usuario"] = "Gerencia";
        $dataestado["fecha"] = $hoy . " " . $hora;
        $logestado->insert($dataestado);
        $this->enviaraprobacion($id, "3", $observacion);
      }
    }
    if($aprobacion == 4){
      if ($cambio >= 1) {
        //$solicitudModel->editField($id,"validacion","6");
        $solicitudModel->editField($id, "fecha_estado", $hoy);
        //$this->enviaraprobacion($id,"4",$observacion);
        $solicitudModel->editField($id, "validacion", "6");
        $solicitudModel->editField($id, "fecha_estado", $hoy);
        $dataestado["solicitud"] = $id;
        $dataestado["estado"] = "Cambio de condiciones";
        $dataestado["usuario"] = "Gerencia";
        $dataestado["fecha"] = $hoy . " " . $hora;
        $logestado->insert($dataestado);
      }
    }
    if($aprobacion == 9){
      if ($devolucion >= 1) {
        //$solicitudModel->editField($id,"validacion","6");
        $solicitudModel->editField($id, "fecha_estado", $hoy);
        //$this->enviaraprobacion($id,"4",$observacion);
        $solicitudModel->editField($id, "validacion", "9");
        $solicitudModel->editField($id, "fecha_estado", $hoy);
        $dataestado["solicitud"] = $id;
        $dataestado["estado"] = "Devolución";
        $dataestado["usuario"] = "Gerencia";
        $dataestado["fecha"] = $hoy . " " . $hora;
        $idlog = $logestado->insert($dataestado);
        $logestado->editField($idlog, "observacion", $observacion);
      }
    }
    //validar aprobacion

    header("Location: /page/gerencia/guardado/?validacion=" . $validacion . "&id=" . $id);
  }

  public function enviaraprobacion($id, $validacion, $observacion)
  {
    $validacion1 = "";
    if ($validacion == "1") {
      $validacion1 = "APROBADA";
    } else if ($validacion == "2") {
      $validacion1 = "RECHAZADA";
    } else if ($validacion == "4") {
      $validacion1 = "CAMBIO DE CONDICIONES";
    } else if ($validacion == "3") {
      $validacion1 = "APLAZADO";
    }

    $solicitudModel = new Administracion_Model_DbTable_Solicitudes();
    $numero = str_pad($id, 6, "0", STR_PAD_LEFT);
    $solicitud = $solicitudModel->getById($id);
    $nombre = $solicitud->nombres;
    if ($solicitud->nombres2) {
      $nombre = $nombre . " " . $solicitud->nombres2;
    }
    $nombre = $nombre . " " . $solicitud->apellido1;
    if ($solicitud->apellido2) {
      $nombre = $nombre . " " . $solicitud->apellido2;
    }
    $emailModel = new Core_Model_Mail();
    $asunto = "Novedad solicitud crédito WEB" . $numero . " - " . $nombre;

    $usuarioModel = new Administracion_Model_DbTable_Usuario();
    $analista_id = $solicitud->asignado;
    $analista = $usuarioModel->getById($analista_id);

    $email = $solicitud->correo_personal;
    $correo1 = $analista->user_email;
    if ($validacion != "4" and $validacion != "3") {
      $content = '<br>
      <p>Estimado asociado(a), su solicitud <b>WEB' . $numero . '</b>, por valor de <b>$' . number_format($solicitud->valor_desembolso) . '</b> fue <b>' . $validacion1 . '</b> en las condiciones solicitadas</p>';
    } else if ($validacion == "2") {
      $content = '<br>
      <p>Atendiendo a su solicitud le informamos que su crédito es negado.
        Agradecemos el hecho de tenernos presente como opción, esperamos poder
        contribuir a su necesidad financiera en una próxima oportunidad.
        Fondtodos.
        D-todos, para todos.</p>';
    }
    $hash = md5($solicitud->cedula);
    $ruta = "https://creditosfondtodos.com.co/";
    $enlace = "page/confirmarsolicitud/?id=" . $id . "&hash=" . $hash . "&confirmacion=1";
    $enlace2 = "page/confirmarsolicitud/?id=" . $id . "&hash=" . $hash . "&confirmacion=2";
    $boton_azul2 = "background:#01508A; color:#FFF; font-size:18px; padding:4px 10px; text-decoration:none; max-width:200px; border-bottom:1px solid #FFFFFF; border-radius:4px;margin-right:7px;";
    if ($validacion == "1") {
      $content = $content . "Por favor confirmar su aceptación. <a href='" . $ruta . $enlace . "' style='" . $boton_azul2 . "'>Confirmar</a> <a href='" . $ruta . $enlace2 . "' style='" . $boton_azul2 . "'>Cancelar</a><br>";
    }
    if ($validacion == "4") {
      $content = '<br>
		<p>La solicitud <b>WEB' . $numero . '</b>, tiene cambio de condiciones<br>
		Validación: <b>' . $validacion1 . '</b><br>
		Observación: <b>' . $observacion . '</b><br>
		Fecha: <b>' . $data['comite_fecha'] . '</b><br>
		</p>';
    }
    if ($validacion == "3") {
      $hashinc = md5($solicitud->cedula . "F0nK");
      $content = "
			
			Estimado(a) Asociado(a), la solicitud WEB" . $numero . " esta incompleta.<br /><br /><b>Motivo: </b>" . $observacion . "<br /><br />
			<span style='color: #dc3545;font-size: 16px;'>Ingrese al siguiente enlace para actualizar sus documentos <a href='https://creditosfondtodos.com.co/page/editarincompleta?id=" . $id . "&hash=" . $hashinc . "'>Clic aquí</a></span>
			";
      $asunto = "Solicitud de crédito " . $numero . " - " . $nombre . " incompleta";
      $solicitudModel->editField($id, "documentos_actualizados", 0);
    }
    // if($validacion1=="APROBADA"){
    // 	$content.="<br>Por favor imprima y firme el pagaré y carta de instrucciones anexo en el correo. Debe enviar esta documentación a la oficina de Fendesa en físico.";
    // 	$content.="<br><p><b>Espere próximamente nuestro servicio de pagaré digital</b></p>";
    // 	$content.="Por favor imprima el pagaré y carta de instrucciones adjunto en este correo.<br><br>Debido a la situación actual y las medidas de prevención establecidas por el covid-19,  transitoriamente se acepta el pagaré y carta de instrucciones debidamente firmados y remitidos por medio electrónico al correo auxiliar02@fesdis.com.co, mientras dure la emergencia.<br><br>Una vez cesado el periodo de emergencia, dispondrá de cinco (5) días hábiles para hacer llegar a las  oficinas del Fondo  los documentos originales respectivos.";

    // 	$emailModel->getMail()->addStringAttachment(file_get_contents("https://creditosfondtodos.com.co/corte/ACPAGARE.pdf"), "ACPAGARE.pdf");
    // 	$emailModel->getMail()->addStringAttachment(file_get_contents("https://creditosfondtodos.com.co/corte/formato_seguro_creditos_-_fendesa.pdf"), "formato_seguro_creditos_-_fendesa.pdf");
    // }
    if ($validacion != "4" && $validacion != "3") {
      if ($observacion != "") {
        $content .= "<b>Observación</b>: " . $observacion;
      }
    }

    $emailModel->getMail()->setFrom("notificaciones@fondtodos.com", "Notificaciones FONDTODOS");
    $emailModel->getMail()->addBCC("soporteomega@omegawebsystems.com");
    $emailModel->getMail()->addBCC("desarrollo2@omegawebsystems.com");
    $emailModel->getMail()->addBCC("notificaciones@fondtodos.com");
    $emailModel->getMail()->addBCC("" . $correo1);
    if ($validacion != "4") {
      $emailModel->getMail()->addAddress("" . $email);
    }
    //$emailModel->getMail()->addBCC("".$correo1);

    $emailModel->getMail()->Subject = $asunto;
    $emailModel->getMail()->msgHTML($content);
    $emailModel->getMail()->AltBody = $content;
    $emailModel->sed();
  }

  public function notificaraprobador($id, $data)
  {
    $validacion1 = "";
    $validacion = $data['comite_aprobacion'];
    if ($validacion == "1") {
      $validacion1 = "APROBADA";
    } else if ($validacion == "2") {
      $validacion1 = "RECHAZADA";
    } else if ($validacion == "4") {
      $validacion1 = "CAMBIO DE CONDICIONES";
    }

    $solicitudModel = new Administracion_Model_DbTable_Solicitudes();
    $numero = str_pad($id, 6, "0", STR_PAD_LEFT);
    $solicitud = $solicitudModel->getById($id);
    $nombre = $solicitud->nombres;
    if ($solicitud->nombres2) {
      $nombre = $nombre . " " . $solicitud->nombres2;
    }
    $nombre = $nombre . " " . $solicitud->apellido1;
    if ($solicitud->apellido2) {
      $nombre = $nombre . " " . $solicitud->apellido2;
    }
    $emailModel = new Core_Model_Mail();
    $asunto = "Confirmación solicitud crédito WEB" . $numero . " - " . $nombre;

    $usuarioModel = new Administracion_Model_DbTable_Usuario();
    $aprobador = $usuarioModel->getById($data['comite_user_id']);

    $correo1 = $aprobador->user_email;
    $observacion = "-";
    if ($data['comite_observacion'] != "") {
      $observacion = $data['comite_observacion'];
    }

    $content = '<br>
		<p>Estimado usuario, usted dio su opinión respecto a la solicitud <b>WEB' . $numero . '</b>,<br>
		Validación: <b>' . $validacion1 . '</b><br>
		Observación: <b>' . $observacion . '</b><br>
		Fecha: <b>' . $data['comite_fecha'] . '</b><br>
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
    $this->_view->id = $this->_getSanitizedParam("id");
    $this->_view->validacion = $this->_getSanitizedParam("validacion");
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


  function generartabla($numero, $usuario, $solicitud, $lineas, $analista, $linea_desembolso)
  {

    $nombres = $solicitud->nombres . " " . $solicitud->nombres2 . " " . $solicitud->apellido1 . " " . $solicitud->apellido2;
    $garantias = array("", "APORTES SOCIALES INDIVIDUALES", "DEUDOR SOLIDARIO", "AFIANZADORA", "HIPOTECARIA", "PRENDARIA");

    $fondo_gris = 'background: #CCCCCC; background-color: #CCCCCC; color: #000000';

    $tabla .= '<table width="100%" style="max-width:900px;" border="1" cellspacing="0" cellpadding="3" class="formulario">

			<tr class="fondo-gris" style="' . $fondo_gris . '">
				<td colspan="2"><div align="center">
				<b>Datos personales</b></div></td>
			</tr>
			<tr>
				<td><strong>Documento</strong></td>
				<td align="right">' . $solicitud->cedula . '</td>
			</tr>
			<tr>
				<td><strong>Nombre</strong></td>
				<td align="right">' . $nombres . '</td>
			</tr>
			<tr>
				<td><strong>Email</strong></td>
				<td align="right">' . $solicitud->correo_personal . '</td>
			</tr>
			<tr>
				<td><strong>Celular</strong></td>
				<td align="right">' . $solicitud->celular . '</td>
			</tr>
			<tr>
				<td><strong>Tel&eacute;fono</strong></td>
				<td align="right">' . $solicitud->telefono . '</td>
			</tr>
			<tr>
				<td><strong>Cargo</strong></td>
				<td align="right">' . $solicitud->cargo . '</td>
			</tr>
			<tr>
				<td><strong>Salario</strong></td>
				<td align="right">' . number_format($usuario->salario) . '</td>
			</tr>

			<tr class="fondo-gris" style="' . $fondo_gris . '">
				<td colspan="2"><div align="center">
				<b>Resumen de solicitud</b></div></td>
			</tr>
			<tr>
				<td><strong>Solicitud</strong></td>
				<td align="right">WEB' . $numero . '</td>
			</tr>

			<tr>
				<td><strong>L&iacute;nea de cr&eacute;dito</strong></td>
				<td align="right">' . $lineas->codigo . ' - ' . $lineas->nombre . '&nbsp;</td>
			</tr>';

    if ($solicitud->cuotas_extra_desembolso != '' && $solicitud->cuotas_extra_desembolso != 0) {
      $tabla .= '
      <tr>
        <td><strong>¿Compromete primas?</strong></td>
        <td align="right">Si</td>
      </tr>
      <tr>
        <td><strong>Compromiso de primas</strong></td>
        <td align="right">' . $solicitud->cuotas_extra_desembolso . '</td>
      </tr>
      <tr>
        <td><strong>Valor de compromiso de primas</strong></td>
        <td align="right">' . $solicitud->valor_extra_desembolso . '</td>
      </tr>
      ';
    }

    $valida = array("NO", "SI");
    $valida[''] = "NO";
    $saldo = $solicitud->valor - $solicitud->valor_desembolso;

    $tabla .= '
			<tr>
				<td><strong>Valor solicitado</strong></td>
				<td align="right">$' . $this->formato_pesos($solicitud->valor) . '</td>
			</tr>
			<tr>
				<td><strong>N&uacute;mero de Cuotas</strong></td>
				<td align="right">' . $solicitud->cuotas . '</td>
			</tr>';
    if ($solicitud->linea_desembolso == "LI") {
      $tabla .= '
			<tr>
				<td><strong>Recoge créditos?</strong></td>
				<td align="right">' . $valida[$solicitud->recoger_credito] . '</td>
			</tr>';
    }
    $tabla .= '	
			<tr>
				<td><strong>Valor aproximado de cuota</strong></td>
				<td align="right">$' . $this->formato_pesos($solicitud->valor_cuota) . '</td>
			</tr>
			<tr>
				<td><strong>Fecha solicitud</strong></td>
				<td align="right">' . $solicitud->fecha_asignado . '</td>
			</tr>
			';


    $tabla .= '
			<tr class="fondo-gris" style="' . $fondo_gris . '">
				<td colspan="2"><div align="center">
				<b>Condiciones otorgadas</b></div></td>
			</tr>
			<tr>
				<td><strong>Línea de crédito</strong></td>
				<td align="right">' . $linea_desembolso->codigo . ' - ' . $linea_desembolso->nombre . '&nbsp;</td>
			</tr>
			<tr>
				<td><strong>Valor desembolso</strong></td>
				<td align="right">$' . $this->formato_pesos($solicitud->valor_desembolso) . '</td>
			</tr>';
    if ($solicitud->recoger_credito == "1") {
      $tabla .= '
			 	  <tr>
				    <td><strong>Total saldo recogidos</strong></td>
				    <td align="right">$' . $this->formato_pesos($solicitud->valor_recogidos) . '</td>
			 	  </tr>
				  <tr>
				    <td><strong>Valor aprobado</strong></td>
				    <td align="right">$' . $this->formato_pesos($solicitud->valor_recogidos + $solicitud->valor_desembolso) . '</td>
			 	  </tr>';
    }
    $tabla .= '<tr>
			<td><strong>Cuotas desembolso</strong></td>
			<td align="right">' . ($solicitud->cuotas_desembolso) . '</td>
		</tr>
		<tr>
			<td><strong>Valor aproximado de cuota desembolso</strong></td>
			<td align="right">$' . $this->formato_pesos($solicitud->valor_cuota_desembolso) . '</td>
		</tr>';
    if ($solicitud->cuotas_extra_desembolso && $solicitud->valor_extra_desembolso) {
      $tabla .= ' <tr>
		    <td><strong>Compromiso de primas</strong></td>
		    <td align="right">' . $solicitud->cuotas_extra_desembolso . '</td>
		  </tr>
			<tr>
		    <td><strong>Valor compromiso de primas</strong></td>
		    <td align="right">$' . $this->formato_pesos($solicitud->valor_extra_desembolso) . '</td>
		  </tr>';
    }

    $tabla .= ' 
			<tr>
				<td><strong>Tasa mes vencido</strong></td>
				<td align="right">' . $solicitud->tasa_desembolso . '%</td>
			</tr>
			<tr>
				<td><strong>Garantía</strong></td>
				<td align="right">' . $garantias[$solicitud->tipo_garantia] . '</td>
			</tr>';
    if ($solicitud->garantia_adicional) {
      $tabla .= '
				 <tr>
				   <td><strong>Garantía Adicional</strong></td>
				   <td align="right">' . $garantias[$solicitud->garantia_adicional] . '</td>
				  </tr>';
    }
    if ($solicitud->fecha_anterior != "") {
      $tabla .= '
				<tr>
					<td><strong>Fecha solicitud anterior incompleta</strong></td>
					<td align="right">' . $solicitud->fecha_anterior . '</td>
				</tr>';
    }

    $correo1 = $analista->user_email;
    $extension = "";
    if ($analista->user_ext != "") {
      $extension = " ext " . $analista->user_ext;
    }
    $userModel = new Administracion_Model_DbTable_Usuario();
    $comercial = $userModel->getList("user_regional LIKE '%$solicitud->regional%' AND user_level = 13", "")[0];
    $usuarioModel = new Administracion_Model_DbTable_Usuariosinfo();
    $usuario = $this->_view->usuario = $usuarioModel->getList("documento = '$solicitud->cedula'", "")[0];
    $hoy = date("Y-m-d");
    $fecha_afiliacion = date("Y-m-d", strtotime($usuario->fecha_afiliacion));
    $date1 = new DateTime($hoy);
    $date2 = new DateTime($fecha_afiliacion);

    $diff = $date1->diff($date2);
    $meses_fonkoba = ($diff->y * 12) + $diff->m;


    $fecha_ingreso = date("Y-m-d", strtotime($usuario->fecha_afiliacion_koba));
    $date1 = new DateTime($hoy);
    $date2 = new DateTime($fecha_ingreso);

    $diff = $date1->diff($date2);
    $meses_koba = ($diff->y * 12) + $diff->m;

    $tabla .= '

			<tr class="fondo-gris" style="' . $fondo_gris . '">
				<td colspan="2"><div align="center">
				<b>Información Fondtodos</b></div></td>
			</tr>

			<tr>
				<td><strong>Trámite</strong></td>
				<td align="right">' . $solicitud->tramite . '</td>
			</tr>
			<tr>
				<td><strong>Comercial asignado asignado</strong></td>
				<td align="right">' . $comercial->user_names . '</td>
			</tr>
			<tr>
				<td><strong>Email</strong></td>
				<td align="right">' . $comercial->user_email . '</td>
			</tr>
			<tr>
				<td><strong>Celular</strong></td>
				<td align="right">' . $comercial->user_celular . '</td>
			</tr>
			<tr>
				<td><strong>Fecha de afiliación Fondtodos</strong></td>
				<td align="right">' . $fecha_afiliacion . ' - ' . $meses_fonkoba . ' meses</td>
			</tr>
			<tr>
				<td><strong>Fecha de afiliación D1</strong></td>
				<td align="right">' . $fecha_ingreso . ' - ' . $meses_koba . ' meses</td>
			</tr>
			</table>';

    return $tabla;
  }
}
