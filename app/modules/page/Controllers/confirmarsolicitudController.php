<?php

/**
 *
 */

class Page_confirmarsolicitudController extends Page_mainController
{

  public function indexAction()
  {
    $id = $this->_getSanitizedParam("id");
    $this->_view->id = $id;
    $hash = $this->_getSanitizedParam("hash");
    $confirmacion = $this->_getSanitizedParam("confirmacion");
    $solicitudModel = new Administracion_Model_DbTable_Solicitudes();
    $logestado = new Administracion_Model_DbTable_Logestado();
    $hora = date("H:i:s");
    $hoy = date("Y-m-d");
    $solicitud = $solicitudModel->getById($id);
    $hash2 = md5($solicitud->cedula);
    if ($hash == $hash2 && $solicitud->confimar_solicitud == 0 && $solicitud->estado_autorizo != '4') {
      $solicitudModel->editField($id, "confimar_solicitud", $confirmacion);
      $solicitudModel->editField($id, "fecha_confimar_solicitud", date("Y-m-d"));
      if ($confirmacion == '1') {
        $dataestado["solicitud"] = $id;
        $dataestado["estado"] = "Confirmado por el asociado";
        $dataestado["usuario"] = "Asociado";
        $dataestado["fecha"] = $hoy . " " . $hora;
        $logestado->insert($dataestado);
        if ($solicitud->linea == "CF" || $solicitud->linea == "SE" || $solicitud->linea == "SO" || $solicitud->linea == "CDU" || $solicitud->linea == "VEH") {
          $this->_view->mensaje = "Su proceso fue exitoso.";
        } else {
          $this->_view->mensaje = "Se ha enviado su respuesta, en breves instantes llegara a su correo el proceso para la firma del pagaré electronico";
          if ($solicitud->recoger_credito != 1) {
            $_SESSION['ingreso_temporal'] = 1;
            $_SESSION['kt_login_id'] = rand(1, 30);
            $_SESSION['kt_login_level'] = 20;
            header("location: /administracion/solicitudes/aprobar/?id=" . $id);
          }
        }
      }
      if ($confirmacion == '2') {
        $this->_view->mensaje = "Se ha enviado su respuesta.";
        $logModel = new Administracion_Model_DbTable_Logestado();
        $dataestado["solicitud"] = $id;
        $dataestado["estado"] = "Rechazado por el asociado";
        $dataestado["usuario"] = 'Asociado';
        $dataestado["fecha"] = date("Y-m-d H:i:s");
        $logestado->insert($dataestado);

      }
      $this->notificaranalista($id);
    }
  }



  public function notificaranalista($id)
  {


    $solicitudModel = new Administracion_Model_DbTable_Solicitudes();
    $numero = str_pad($id, 6, "0", STR_PAD_LEFT);
    $solicitud = $solicitudModel->getById($id);
    if ($solicitud->confimar_solicitud == 1) {
      $validacion1 = "Aprobado";
    } else if ($solicitud->confimar_solicitud == 2) {
      $validacion1 = "Rechazado";
    }
    $emailModel = new Core_Model_Mail();
    $asunto = "Notificacion de confirmación aprobación solicitud crédito WEB" . $numero . "";

    $usuarioModel = new Administracion_Model_DbTable_Usuario();
    $aprobador = $usuarioModel->getById($solicitud->asignado);

    $correo1 = $aprobador->user_email;
    $observacion = "-";
    if ($solicitud->observaciones_cambios != "") {
      $observacion = $solicitud->observaciones_cambios;
    }
    $fecha = $solicitud->fecha_confimar_solicitud;
    $content = '
    <p>Se ha enviado una respuesta de confirmacion de la solicitud <b>WEB' . $numero . '</b>,<br>
    Validación: El usuario ha <b>' . $validacion1 . '<b> las condiciones del crédito<br>
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
}
