<?php

/**
 * Modelo del modulo Core que se encarga de  enviar todos los correos nesesarios del sistema.
 */
class Core_Model_Sendingemail
{
  /**
   * Intancia de la calse emmail
   * @var class
   */
  protected $email;

  protected $_view;

  public function __construct($view)
  {
    $this->email = new Core_Model_Mail();
    $this->_view = $view;
  }


  public function forgotpassword($user)
  {
    if ($user) {
      $code = [];
      $code['user'] = $user->user_id;
      $code['code'] = $user->code;
      $codeEmail = base64_encode(json_encode($code));
      $this->_view->url = "http://" . $_SERVER['HTTP_HOST'] . "/administracion/index/changepassword?code=" . $codeEmail;
      $this->_view->host = "http://" . $_SERVER['HTTP_HOST'] . "/";
      $this->_view->nombre = $user->user_names . " " . $user->user_lastnames;
      $this->_view->usuario = $user->user_user;
      /*fin parametros de la vista */
      //$this->email->getMail()->setFrom("desarrollo4@omegawebsystems.com","Intranet Coopcafam");
      $this->email->getMail()->addAddress($user->user_email,  $user->user_names . " " . $user->user_lastnames);
      $content = $this->_view->getRoutPHP('/../app/modules/core/Views/templatesemail/forgotpassword.php');
      $this->email->getMail()->Subject = "Recuperación de Contraseña Gestor de Contenidos";
      $this->email->getMail()->msgHTML($content);
      $this->email->getMail()->AltBody = $content;
      if ($this->email->sed() == true) {
        return true;
      } else {
        return false;
      }
    }
  }
  public function forgotpassword2($user, $correo, $cedula, $code)
  {
    if ($user) {
      $code = [];
      $code['user'] = $user->user_id;
      $code['code'] = $user->code;
      $codeEmail = base64_encode(json_encode($code));
      $this->_view->url = "https://" . $_SERVER['HTTP_HOST'] . "/page/index/changepassword?code=" . $codeEmail;
      $this->_view->host = "https://" . $_SERVER['HTTP_HOST'] . "/";
      $this->_view->nombre = $user->user_names . " " . $user->user_lastnames;
      $this->_view->usuario = $user->user_user;
      /*fin parametros de la vista */
      $this->email->getMail()->setFrom("$correo", "Recuperación Contraseña creditos fonkoba");
      $this->email->getMail()->addAddress($user->user_email,  $user->user_names . " " . $user->user_lastnames);
      $this->email->getMail()->addBCC("desarrollo2@omegawebsystems.com", "cambio contraseña");
      $content = $this->_view->getRoutPHP('/../app/modules/core/Views/templatesemail/forgotpassword.php');
      $this->email->getMail()->Subject = "Recuperación de Contraseña";
      $this->email->getMail()->msgHTML($content);
      $this->email->getMail()->AltBody = $content;
      if ($this->email->sed()) {
        return 1;
      } else {
        echo $this->email->getMail()->ErrorInfo;
        return 2;
      }
    }
  }
  public function enviarplan($data, $doc)
  {
    $this->_view->data = $data;
    $this->email->getMail()->addAddress($data->correo_personal, $data->nombres . " " . $data->apellidos);
    $this->email->getMail()->addAddress($data->correo_empresarial, $data->nombres . " " . $data->nombres2 . " " . $data->apellido1 . " " . $data->apellido2);
    $this->email->getMail()->addAddress("", "Plan de Pagos");
    $this->email->getMail()->addBCC("desarrollo2@omegawebsystems.com", "Plan de Pagos");
    // $this->email->getMail()->addBCC("yenny.berdugo@fondtodos.com", "Plan de Pagos");
    // $this->email->getMail()->addBCC("katlyn.martinez@fondtodos.com", "Plan de Pagos");
    $this->email->getMail()->addBCC($data->correo_analista, $data->nombre_analista);
    if ($doc != '') {
      $this->email->getMail()->AddAttachment(FILE_PATH . $doc);
    }
    $content = $this->_view->getRoutPHP('/../app/modules/core/Views/templatesemail/plan.php');
    $this->email->getMail()->Subject = "Plan de pagos";
    $this->email->getMail()->msgHTML($content);
    $this->email->getMail()->AltBody = $content;
    if ($this->email->sed()) {
      return 1;
    } else {
      return 2;
    }
  }
  public function sendmessage($data)
  {
    $this->_view->data = $data;
    $this->email->getMail()->addAddress($data->correo_personal, $data->nombres . " " . $data->apellidos);
    $this->email->getMail()->addAddress($data->correo_empresarial, $data->nombres . " " . $data->nombres2 . " " . $data->apellido1 . " " . $data->apellido2);
    $this->email->getMail()->addBCC("desarrollo2@omegawebsystems.com", "Plan de Pagos");
    // $this->email->getMail()->addBCC("yenny.berdugo@fondtodos.com", "Plan de Pagos");
    // $this->email->getMail()->addBCC("katlyn.martinez@fondtodos.com", "Plan de Pagos");
    $this->email->getMail()->addBCC($data->correo_analista, $data->nombre_analista);
    $content = $this->_view->getRoutPHP('/../app/modules/core/Views/templatesemail/message.php');
    $this->email->getMail()->Subject = $data->asunto_correo;
    $this->email->getMail()->msgHTML($content);
    $this->email->getMail()->AltBody = $content;
    if ($this->email->sed()) {
      return 1;
    } else {
      return 2;
    }
  }
  public function sendAproved($correo, $nombres)
  {
    // $this->_view->data = $data;
    $this->email->getMail()->addAddress($correo, $nombres);
    $this->email->getMail()->addBCC("desarrollo2@omegawebsystems.com", "Plan de Pagos");
    // $this->email->getMail()->addBCC("yenny.berdugo@fondtodos.com", "Plan de Pagos");
    // $this->email->getMail()->addBCC("katlyn.martinez@fondtodos.com", "Plan de Pagos");
    // $this->email->getMail()->addBCC($data->correo_analista, $data->nombre_analista);
    $content = $this->_view->getRoutPHP('/../app/modules/core/Views/templatesemail/aproved.php');
    $this->email->getMail()->Subject = "Aprobación de crédito automática";
    $this->email->getMail()->msgHTML($content);
    $this->email->getMail()->AltBody = $content;
    if ($this->email->sed()) {
      return 1;
    } else {
      return 2;
    }
  }
  public function enviarLibranza($solicitud, $correos, $pdflibranza, $pdfpagare)
  {
    $this->_view->data = $solicitud;
    $correos = explode(",", $correos);
    foreach ($correos as $correo) {
      $this->email->getMail()->addAddress($correo, 'Libranza Fondtodos');
    }
    $this->email->getMail()->addBCC("desarrollo2@omegawebsystems.com", "Libranza Fondtodos");
    $content = $this->_view->getRoutPHP('/../app/modules/core/Views/templatesemail/libranza.php');
    $this->email->getMail()->AddAttachment($pdfpagare);
    $this->email->getMail()->AddAttachment($pdflibranza);
    $this->email->getMail()->Subject = 'Libranza Fondtodos solicitud WEB00'.$solicitud->id.' '.$solicitud->cedula.$solicitud->tipo_documento;
    $this->email->getMail()->msgHTML($content);
    $this->email->getMail()->AltBody = $content;
    if ($this->email->sed()) {
      return 1;
    } else {
      return 2;
    }
  }
  public function enviarLinkFirma($correo, $usuario, $solicitud)
  {
    $this->_view->asunto_correo = 'Firma de documentos WEB00'.$solicitud->id.' '.$solicitud->cedula.$solicitud->tipo_documento;
    $this->_view->data = $solicitud;
    $this->_view->usuario = $usuario;
    $this->_view->url = "https://" . $_SERVER['HTTP_HOST'] . "/page/sistema/user?id=" . $solicitud->id;
    $this->email->getMail()->addAddress($correo, $usuario);
    $this->email->getMail()->addBCC("desarrollo2@omegawebsystems.com", "Fodun");
    $content = $this->_view->getRoutPHP('/../app/modules/core/Views/templatesemail/linkFirma.php');
    $this->email->getMail()->Subject = 'Firma de documentos WEB00'.$solicitud->id.' '.$solicitud->cedula.$solicitud->tipo_documento;
    $this->email->getMail()->msgHTML($content);
    $this->email->getMail()->AltBody = $content;
    if ($this->email->sed()) {
      return 1;
    } else {
      return 2;
    }
  }
  public function enviarFirmados($solicitud, $pdf_pagare, $pdf_solicitud)
  {
    $this->_view->asunto_correo = 'Firma de documentos WEB00'.$solicitud->id;
    $this->_view->data = $solicitud;
    $this->email->getMail()->addAddress($solicitud->correo_personal, $solicitud->nombres . " " . $solicitud->nombres2 . " " . $solicitud->apellido1 . " " . $solicitud->apellido2);
    $this->email->getMail()->addBCC("desarrollo2@omegawebsystems.com", "Fodun");
    $content = $this->_view->getRoutPHP('/../app/modules/core/Views/templatesemail/documentosFirmados.php');
    $this->email->getMail()->AddAttachment($pdf_pagare);
    $this->email->getMail()->AddAttachment($pdf_solicitud);
    $this->email->getMail()->Subject = 'Firma de documentos WEB00'.$solicitud->id;
    $this->email->getMail()->msgHTML($content);
    $this->email->getMail()->AltBody = $content;
    if ($this->email->sed()) {
      return 1;
    } else {
      return 2;
    }
  }
}
