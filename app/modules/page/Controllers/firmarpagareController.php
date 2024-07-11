<?php

/**
 *
 */

class Page_firmarpagareController extends Page_mainController
{

  public function con_ceros($x)
  {
    $x = str_pad($x, 5, "0", STR_PAD_LEFT);
    return $x;
  }

  public function indexAction()
  {
    $this->_view->seccion = 1;
    $this->_view->contenidos = $this->template->getContent(1);

    $header = $this->_view->getRoutPHP('modules/page/Views/partials/header.php');
    $this->getLayout()->setData("header", $header);


    $id = $this->_getSanitizedParam("id");
    //echo $this->pagarepdf($id);
    $this->_view->rutaPDF = $this->pagarepdf($id);
    $numero = "WEB" . $this->con_ceros($id);
    $this->_view->numero = $numero;

    $solicitudesModel = new Administracion_Model_DbTable_Solicitudes();
    $solicitud = $solicitudesModel->getById($id);
    $cedula = $solicitud->cedula;


    $codeudorModel = new Administracion_Model_DbTable_Codeudor();
    $codeudor1_list = $codeudorModel->getList(" solicitud='$id' AND codeudor_numero='1' ", "")[0];
    $codeudor2_list = $codeudorModel->getList(" solicitud='$id' AND codeudor_numero='2' ", "")[0];
    $codeudor1 = $codeudor1_list->cedula;
    $codeudor2 = $codeudor2_list->cedula;
    $numero_obligacion = $solicitud->pagare;
    $pagareModel = new Page_Model_DbTable_Pagaredeceval();
    $existe_pagare = $pagareModel->getList(" pagare='$numero_obligacion' ", "")[0];

    $linea = $solicitud->linea;
    $lineaModel = new Administracion_Model_DbTable_Lineas();
    $linea_list = $lineaModel->getList(" codigo='$linea' ", "")[0];
    $modalidad = $linea . " - " . $linea_list->nombre;


    $nombres = $solicitud->nombres . " " . $solicitud->nombres2 . " " . $solicitud->apellido1 . " " . $solicitud->apellido2;

    $this->_view->solicitud = $solicitud;
    $this->_view->modalidad = $modalidad;
    $this->_view->nombres = $nombres;
    $this->_view->existe_pagare = $existe_pagare;
    $this->_view->id = $id;

    $rol = $this->_getSanitizedParam("rol");
    $this->_view->rol = $rol;
    $prueba = $this->_getSanitizedParam("prueba");
    $this->_view->prueba = $prueba;
    $error = $this->_getSanitizedParam("error");
    $this->_view->error = $error;
    $estado = $this->_getSanitizedParam("estado");
    $this->_view->estado = $estado;

    $sin_codificar = $id . "OMEGA";
    $hash = $this->_getSanitizedParam("hash");
    if ($hash == "$2y$10$2Uc1DbZTZUOMsqEYuDbt/e6LDY.Wh5x/GBD1ss4hMlsZAd5xjs5Yu") {
      header("location: https://creditosfondtodos.com.co/");
    }
    $this->_view->hash = $hash;

    $this->_view->valido = 0;
    if (password_verify($sin_codificar, $hash)) {
      $this->_view->valido = 1;
    }
  }

  public function validartokenAction()
  {


    $id = $this->_getSanitizedParam("solicitud");
    $solicitudesModel = new Administracion_Model_DbTable_Solicitudes();
    $solicitud = $solicitudesModel->getById($id);

    $numero_obligacion = $solicitud->pagare;
    $pagareModel = new Page_Model_DbTable_Pagaredeceval();
    $existe_pagare = $pagareModel->getList(" pagare='$numero_obligacion' ", "")[0];


    $token = $existe_pagare->token;

    $firmado = 0;
    if ($existe_pagare->estado == "1") {
      $firmado = 1;
    }

    $token2 = $this->_getSanitizedParam("token");
    $rol = $this->_getSanitizedParam("rol");
    $prueba = $this->_getSanitizedParam("prueba");
    $hash = $this->_getSanitizedParam("hash");
    $token2 = trim($token2);

    if ($firmado == 0 and $prueba != "1") {
      if ($token != $token2) {
        header("Location:/page/firmarpagare/?id=" . $id . "&error=1&hash=" . $hash);
      } else {
        header("Location:/page/firmarpagare/firmaws/?id=" . $id . "&rol=" . $rol . "&hash=" . $hash);
      }
    }

    if ($prueba == "1") {
      if ($token != $token2) {
        echo "TOKEN NO VALIDO";
      } else {
        echo "TOKEN VALIDO";
      }
    }

    if ($firmado == 1) {
      header("Location:/page/firmarpagare/?id=" . $id . "&rol=" . $rol . "&hash=" . $hash);
    }
  }

  public function firmawsAction()
  {
    $this->setLayout('blanco');
    $id = $this->_getSanitizedParam("id");
    $solicitudesModel = new Administracion_Model_DbTable_Solicitudes();
    $solicitud = $solicitudesModel->getById($id);

    $hash = $this->_getSanitizedParam("hash");

    $codeudorModel = new Administracion_Model_DbTable_Codeudor();
    $codeudor1_list = $codeudorModel->getList(" solicitud='$id' AND codeudor_numero='1' ", "")[0];
    $codeudor1 = $codeudor1_list->cedula;
    $codeudor2 = $codeudor2_list->cedula;
    $cedula = $codeudor1_list->cedula;

    $numero_obligacion = $solicitud->pagare;
    $pagareModel = new Page_Model_DbTable_Pagaredeceval();
    $existe_pagare = $pagareModel->getList(" pagare='$numero_obligacion' ", "")[0];
    $id_pagare_deceval = $existe_pagare->id;

    $local_cert = "certificado.pem";
    $wsdl = "https://pruebas.deceval.com.co:446/weblogic/sdl12/services/SDLService?WSDL";
    $wsdl = "http://localhost:8086/SDLProxy/services/ProxyServicesImplPort?wsdl";

    $client = new soapClient(
      $wsdl,
      array(
        "trace"         => 1,
        "exceptions"    => true,
        "local_cert"    => $local_cert,
        "uri"           => "urn:xmethods-delayed-quotes",
        "style"         => SOAP_RPC,
        "use"           => SOAP_ENCODED,
        "soap_version"  => SOAP_1_2
      )
    );

    $fecha = date("Y-m-d");
    $hora = date("H:i:s");
    $hora2 = date("H:i");

    $id_pagare = $existe_pagare->pagare_deceval;
    $rol = $this->_getSanitizedParam("rol");

    $ceduladecevalModel = new Administracion_Model_DbTable_Ceduladeceval();
    $codeudorModel = new Administracion_Model_DbTable_Codeudor();

    if ($rol == 0) {
      $tipo_documento = $solicitud->tipo_documento;
      if ($tipo_documento == "CC") {
        $tipo_documento = 1;
      }
      if ($tipo_documento == "CE") {
        $tipo_documento = 2;
      }
      $documento = $solicitud->cedula;
      $id_rol = 5; //otorgante
    }

    if ($rol == 1) {
      $codeudor_list = $codeudorModel->getList(" solicitud='$id' AND codeudor_numero='1' ", "")[0];
      $tipo_documento = $codeudor_list->tipo_documento;
      if ($tipo_documento == "CC") {
        $tipo_documento = 1;
      }
      if ($tipo_documento == "CE") {
        $tipo_documento = 2;
      }
      $documento = $codeudor_list->cedula;
      $id_rol = 6; //codeudor
    }
    if ($rol == 2) {
      $codeudor_list = $codeudorModel->getList(" solicitud='$id' AND codeudor_numero='2' ", "")[0];
      $tipo_documento = $codeudor_list->tipo_documento;
      if ($tipo_documento == "CC") {
        $tipo_documento = 1;
      }
      if ($tipo_documento == "CE") {
        $tipo_documento = 2;
      }
      $documento = $codeudor_list->cedula;
      $id_rol = 6; //codeudor
    }

    $existe = $ceduladecevalModel->getList(" cedula='$documento' ", "")[0];
    $id_deceval = $existe->usuario_deceval;

    //pruebas
    $usuario = '90128148371';
    $codigo_depositante = '640';
    $clave = 'Deceval1a*';
    //produccion
    //$usuario = '80004306941';
    //$codigo_depositante = '1046';
    //$clave = 'Fedeaa2020';

    $xml = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://services.proxy.deceval.com/">
       <soapenv:Header/>
       <soapenv:Body>
          <ser:firmarPagares>
             <arg0>
                <header>
                   <codigoDepositante>' . $codigo_depositante . '</codigoDepositante>
                   <fecha>' . $fecha . 'T' . $hora . '</fecha>
                   <hora>' . $hora2 . '</hora>
                   <usuario>' . $usuario . '</usuario>
                </header>
                <informacionFirmaPagareDTO>';
    if (1 == 0) {
      $xml .= '
             <archivosAdjuntos>
                      <contenido></contenido>
                      <nombreArchivo></nombreArchivo>
                   </archivosAdjuntos>';
    }

    $xml .= '
                   <clave>' . $clave . '</clave>
                   <idDocumentoPagare>' . $id_pagare . '</idDocumentoPagare>
                   <idRolFirmante>' . $id_rol . '</idRolFirmante>               
                   <numeroDocumento>' . $documento . '</numeroDocumento>
                   <tipoDocumento>' . $tipo_documento . '</tipoDocumento>
                </informacionFirmaPagareDTO>
             </arg0>
          </ser:firmarPagares>
       </soapenv:Body>
    </soapenv:Envelope>';

    //echo $xml;
    //print($xml);
    $request = $xml;
    $location = $wsdl;
    $action = "";
    $version = 1.2;

    //var_dump($client->__dorequest($request,$location,$action,$version));
    $xml2 = $client->__dorequest($request, $location, $action, $version);
    $res = $this->soaptoarray($xml2);
    //print_r($res);

    $descripcion = $res['descripcion'];
    $res = print_r($res, true);
    $metodo = "firmarPagares";
    $numero_solicitud = $solicitud->pagare;

    $exitoso = "false";
    if (strpos($descripcion, "Exitoso") !== FALSE or strpos($res, "Exitoso") !== FALSE) {
      $exitoso = "true";
    }

    //Registro transaccion
    $data = array();
    $ip = $_SERVER['REMOTE_ADDR'];
    $fecha = date("Y-m-d H:i:s");
    $quien = round($_SESSION['kt_login_id']);
    $data['metodo'] = $metodo;
    $data['xml'] = $xml;
    $data['res'] = $res;
    $data['exitoso'] = $exitoso;
    $data['codigoError'] = $codigoError;
    $data['fecha'] = $fecha;
    $data['solicitud'] = $id;
    $data['numero_solicitud'] = $numero_solicitud;
    $data['ip'] = $ip;
    $data['quien'] = $quien;
    $transaccionModel = new Page_Model_DbTable_Transaccion();
    $transaccionModel->insert($data);


    if ($exitoso == "true") {
      $hoy = date("Y-m-d H:i:s");
      $ip = $_SERVER['REMOTE_ADDR'];
      $rol = $this->_getSanitizedParam("rol");
      $no = $this->_getSanitizedParam("no");

      if ($no == "") {
        if ($rol == 0) {
          $pagareModel->editField($id_pagare_deceval, "fecha_firma", $hoy);
          $pagareModel->editField($id_pagare_deceval, "ip", $ip);
        }
        if ($rol == 1) {
          $pagareModel->editField($id_pagare_deceval, "fecha_firma1", $hoy);
          $pagareModel->editField($id_pagare_deceval, "ip1", $ip);
        }
        if ($rol == 2) {
          $pagareModel->editField($id_pagare_deceval, "fecha_firma2", $hoy);
          $pagareModel->editField($id_pagare_deceval, "ip2", $ip);
        }
      }

      //CONSULTA ESTADO
      $pagare_deceval = $id_pagare;
      $tipo_documento = $solicitud->tipo_documento;
      if ($tipo_documento == "CC") {
        $tipo_documento = 1;
      }
      if ($tipo_documento == "CE") {
        $tipo_documento = 2;
      }
      $documento = $solicitud->cedula;
      $hoy = date("Y-m-d");

      $res = $this->consultarpagare($pagare_deceval, $documento, $tipo_documento, $id);

      $estado_deceval = $res['estadoPagare'];

      if ($res['fechaFirmaPagare'] != "" and strpos($res['estadoPagare'], "Registrado") !== false) {
        $fecha_firma_deceval = $res['fechaFirmaPagare'];
        $pagareModel->editField($id_pagare_deceval, "estado", "1");
        $pagareModel->editField($id_pagare_deceval, "fecha_firma_deceval", $fecha_firma_deceval);
        $pagareModel->editField($id_pagare_deceval, "verificado", $hoy);
        $pagareModel->editField($id_pagare_deceval, "estado_deceval", $estado_deceval);

        $this->notificarfirma($id);
      }
      if (strpos($res['estadoPagare'], "Listo para Firmar") !== false) {
        $pagareModel->editField($id_pagare_deceval, "estado", "0");
        $pagareModel->editField($id_pagare_deceval, "verificado", $hoy);
        $pagareModel->editField($id_pagare_deceval, "estado_deceval", $estado_deceval);
      }

      //CONSULTA ESTADO
      //cambiar estado
      $this->_view->mensaje = "PAGARE FIRMADO CON EXITO";

      $this->libranza($id);
      header("Refresh:3; url=/page/firmarpagare/?estado=OK&hash=" . $hash);
    } else {
      //echo "PAGARE NO SE PUDO FIRMAR";
      //header("Refresh:3; url=firmar_pagare.php?error=2");
      header("Refresh:3; url=/page/firmarpagare/?error=2&id=" . $id . "&hash=" . $hash);
    }
  }

  public function notificarfirma($id)
  {


    $solicitudModel = new Administracion_Model_DbTable_Solicitudes();
    $numero = str_pad($id, 6, "0", STR_PAD_LEFT);
    $solicitud = $solicitudModel->getById($id);
    $emailModel = new Core_Model_Mail();
    $asunto = "Pagaré solicitud crédito WEB" . $numero . " firmado";

    $usuarioModel = new Administracion_Model_DbTable_Usuario();
    $aprobador = $usuarioModel->getById($solicitud->asignado);

    $correo1 = $aprobador->user_email;

    $correo_personal = $solicitud->correo_personal;
    $correo_empresarial = $solicitud->correo_empresarial;

    $content = '
    <p>Notificamos que el pagaré # de la solicitud <b>WEB' . $numero . '</b>, ha sido firmado. <br>En un lapso de 48 horas hábiles o menos, su dinero se verá reflejado en su cuenta después de las 6pm.
    </p>';

    $emailModel->getMail()->setFrom("notificaciones@fondtodos.com", "Notificaciones FONDTODOS");
    $emailModel->getMail()->addBCC("soporteomega@omegawebsystems.com");
    $emailModel->getMail()->addBCC("desarrollo2@omegawebsystems.com");
    $emailModel->getMail()->addBCC("notificaciones@fondtodos.com");
    $emailModel->getMail()->addBCC("" . $correo1);

    if ($correo_personal != "") {
      $emailModel->getMail()->addAddress("" . $correo_personal);
    }
    if ($correo_empresarial != "") {
      $emailModel->getMail()->addAddress("" . $correo_empresarial);
    }

    $emailModel->getMail()->Subject = $asunto;
    $emailModel->getMail()->msgHTML($content);
    $emailModel->getMail()->AltBody = $content;
    $emailModel->sed();
  }

  public function consultarpagare($pagare_deceval, $documento, $tipo_documento, $id)
  {
    $local_cert = "certificado.pem";
    $wsdl = "http://localhost:8086/SDLProxy/services/ProxyServicesImplPort?wsdl";

    $client = new soapClient(
      $wsdl,
      array(
        "trace"         => 1,
        "exceptions"    => true,
        "local_cert"    => $local_cert,
        "uri"           => "urn:xmethods-delayed-quotes",
        "style"         => SOAP_RPC,
        "use"           => SOAP_ENCODED,
        "soap_version"  => SOAP_1_2,
        "connection_timeout" => 120
      )
    );

    $fecha = date("Y-m-d");
    $hora = date("H:i:s");
    $hora2 = date("H:i");

    //pruebas
    $usuario = '90128148371';
    $codigo_depositante = '640';
    //produccion
    //$usuario = '80004306941';
    //$codigo_depositante = '1046';


    $xml = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://services.proxy.deceval.com/">
       <soapenv:Header/>
       <soapenv:Body>
          <ser:consultarPagares>
             <!--Optional:-->
             <arg0>
                <consultaPagareServiceDTO>
                   <codigoDeceval>' . $pagare_deceval . '</codigoDeceval>
             <idTipoIdentificacionFirmante>' . $tipo_documento . '</idTipoIdentificacionFirmante>
                   <numIdentificacionFirmante>' . $documento . '</numIdentificacionFirmante>
                </consultaPagareServiceDTO>
                <header>
                   <codigoDepositante>' . $codigo_depositante . '</codigoDepositante>
                   <fecha>' . $fecha . 'T' . $hora . '</fecha>
                   <hora>' . $hora2 . '</hora>
                   <usuario>' . $usuario . '</usuario>
                </header>
             </arg0>
          </ser:consultarPagares>
       </soapenv:Body>
    </soapenv:Envelope>';

    if ($pagare_deceval == "") {
      $xml = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://services.proxy.deceval.com/">
         <soapenv:Header/>
         <soapenv:Body>
          <ser:consultarPagares>
           <!--Optional:-->
           <arg0>
            <consultaPagareServiceDTO>
               <idTipoIdentificacionFirmante>' . $tipo_documento . '</idTipoIdentificacionFirmante>
               <numIdentificacionFirmante>' . $documento . '</numIdentificacionFirmante>
            </consultaPagareServiceDTO>
            <header>
               <codigoDepositante>' . $codigo_depositante . '</codigoDepositante>
               <fecha>' . $fecha . 'T' . $hora . '</fecha>
               <hora>' . $hora2 . '</hora>
               <usuario>' . $usuario . '</usuario>
            </header>
           </arg0>
          </ser:consultarPagares>
         </soapenv:Body>
      </soapenv:Envelope>';
    }

    $request = $xml;
    $location = $wsdl;
    $action = "";
    $version = 1.2;

    //var_dump($client->__dorequest($request,$location,$action,$version));
    $xml2 = $client->__dorequest($request, $location, $action, $version);
    $res = $this->soaptoarray($xml2);


    //print_r($res);


    $solicitudesModel = new Administracion_Model_DbTable_Solicitudes();
    $solicitud = $solicitudesModel->getById($id);
    $numero_solicitud = $solicitud->pagare;


    $metodo = "consultarpagare";
    $exitoso = "false";
    if ($res['estadoPagare'] != "") {
      $exitoso = "true";
    }

    //Registro transaccion
    $data = array();
    $ip = $_SERVER['REMOTE_ADDR'];
    $fecha = date("Y-m-d H:i:s");
    $quien = round($_SESSION['kt_login_id']);
    $data['metodo'] = $metodo;
    $data['xml'] = $xml;
    $data['res'] = print_r($res, true);
    $data['exitoso'] = $exitoso;
    $data['codigoError'] = $codigoError;
    $data['fecha'] = $fecha;
    $data['solicitud'] = $id;
    $data['numero_solicitud'] = $numero_solicitud;
    $data['ip'] = $ip;
    $data['quien'] = $quien;
    $transaccionModel = new Page_Model_DbTable_Transaccion();
    $transaccionModel->insert($data);


    //echo $res['estadoPagare'];
    //echo $res['fechaFirmaPagare']; //no tiene firma
    //Registrado - En Blanco
    //Listo para Firmar - En Blanco
    return $res;
  }



  public function consultarpagaresAction()
  {

    ini_set('max_execution_time', '300');
    $pagareModel = new Page_Model_DbTable_Pagaredeceval();
    $solicitudesModel = new Administracion_Model_DbTable_Solicitudes();
    $two_months_ago = date("Y-m-d H:i:s", strtotime("-2 months"));
    $pagares = $pagareModel->getList(" (verificado IS NULL OR verificado = '') AND fecha >= DATE('$two_months_ago') ", " rand() ");

    $local_cert = "certificado.pem";
    $wsdl = "http://localhost:8086/SDLProxy/services/ProxyServicesImplPort?wsdl";

    $client = new soapClient(
      $wsdl,
      array(
        "trace"         => 1,
        "exceptions"    => true,
        "local_cert"    => $local_cert,
        "uri"           => "urn:xmethods-delayed-quotes",
        "style"         => SOAP_RPC,
        "use"           => SOAP_ENCODED,
        "soap_version"  => SOAP_1_2,
        "connection_timeout" => 120
      )
    );



    //pruebas
    $usuario = '90128148371';
    $codigo_depositante = '640';
    //produccion
    //$usuario = '80004306941';
    //$codigo_depositante = '1046';

    foreach ($pagares as $key => $pagare1) {

      $fecha = date("Y-m-d");
      $hora = date("H:i:s");
      $hora2 = date("H:i");

      $pagare_deceval = $pagare1->pagare_deceval;
      $id_pagare_deceval = $pagare1->id;
      $numero_obligacion = $pagare1->pagare;
      $solicitud = $solicitudesModel->getList(" pagare ='$numero_obligacion' AND paso='8' ", " id DESC ")[0];
      $tipo_documento = $solicitud->tipo_documento;
      if ($tipo_documento == "CC") {
        $tipo_documento = 1;
      }
      if ($tipo_documento == "CE") {
        $tipo_documento = 2;
      }
      $documento = $solicitud->cedula;



      $xml = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://services.proxy.deceval.com/">
         <soapenv:Header/>
         <soapenv:Body>
            <ser:consultarPagares>
               <!--Optional:-->
               <arg0>
                  <consultaPagareServiceDTO>
                     <codigoDeceval>' . $pagare_deceval . '</codigoDeceval>
               <idTipoIdentificacionFirmante>' . $tipo_documento . '</idTipoIdentificacionFirmante>
                     <numIdentificacionFirmante>' . $documento . '</numIdentificacionFirmante>
                  </consultaPagareServiceDTO>
                  <header>
                     <codigoDepositante>' . $codigo_depositante . '</codigoDepositante>
                     <fecha>' . $fecha . 'T' . $hora . '</fecha>
                     <hora>' . $hora2 . '</hora>
                     <usuario>' . $usuario . '</usuario>
                  </header>
               </arg0>
            </ser:consultarPagares>
         </soapenv:Body>
      </soapenv:Envelope>';

      $request = $xml;
      $location = $wsdl;
      $action = "";
      $version = 1.2;

      //var_dump($client->__dorequest($request,$location,$action,$version));
      $xml2 = $client->__dorequest($request, $location, $action, $version);
      $res = $this->soaptoarray($xml2);

      echo $pagare_deceval . " - " . $res['estadoPagare'] . " " . $res['fechaFirmaPagare'] . "<br />";
      // echo '<pre>';
      // print_r($res);
      // echo '</pre>';

      $fecha_firma_deceval = $res['fechaFirmaPagare'];
      $estado_deceval = $res['estadoPagare'];

      $hoy = date("Y-m-d");
      if ($estado_deceval != "") {
        $pagareModel->editField($id_pagare_deceval, "estado_deceval", $estado_deceval);
        $pagareModel->editField($id_pagare_deceval, "verificado", $hoy);
      }

      if ($res['fechaFirmaPagare'] != "" and strpos($res['estadoPagare'], "Registrado") !== false) {
        $pagareModel->editField($id_pagare_deceval, "estado", "1");
        $total++;
        $this->notificarfirma($solicitud->id);
      }
      if (strpos($res['estadoPagare'], "Listo para Firmar") !== false) {
        $pagareModel->editField($id_pagare_deceval, "estado", "0");
        $total++;
      }
      if (strpos($res['estadoPagare'], "Anulado") !== false) {
        $pagareModel->editField($id_pagare_deceval, "estado", "0");
        $total++;
      }


      $pagareModel->actualizarfirmados($pagare_deceval);
    }
    //print_r($res);
    //echo $res['estadoPagare'];
    //echo $res['fechaFirmaPagare']; //no tiene firma
    //Registrado - En Blanco
    //Listo para Firmar - En Blanco
  }



  public function consultarpagaresoloAction()
  {
    $this->setLayout('blanco');
    $id = $this->_getSanitizedParam("id");
    $solicitudesModel = new Administracion_Model_DbTable_Solicitudes();
    $solicitud = $solicitudesModel->getById($id);
    $cedula = $codeudor1_list->cedula;
    $hash = $this->_getSanitizedParam("hash");

    $codeudorModel = new Administracion_Model_DbTable_Codeudor();
    $codeudor1_list = $codeudorModel->getList(" solicitud='$id' AND codeudor_numero='1' ", "")[0];
    $codeudor1 = $codeudor1_list->cedula;
    $codeudor2 = $codeudor2_list->cedula;

    $numero_obligacion = $solicitud->pagare;
    $pagareModel = new Page_Model_DbTable_Pagaredeceval();
    $existe_pagare = $pagareModel->getList(" pagare='$numero_obligacion' ", "")[0];
    $id_pagare_deceval = $existe_pagare->id;



    $fecha = date("Y-m-d");
    $hora = date("H:i:s");
    $hora2 = date("H:i");

    $id_pagare = $existe_pagare->pagare_deceval;
    $rol = $this->_getSanitizedParam("rol");

    $ceduladecevalModel = new Administracion_Model_DbTable_Ceduladeceval();
    $codeudorModel = new Administracion_Model_DbTable_Codeudor();

    $existe = $ceduladecevalModel->getList(" cedula='$documento' ", "")[0];
    $id_deceval = $existe->usuario_deceval;

    //pruebas
    $usuario = '90128148371';
    $codigo_depositante = '640';
    $clave = 'Deceval1a*';

    //produccion
    //$usuario = '80004306941';
    //$codigo_depositante = '1046';
    //$clave = 'Deceval1a*';

    $descripcion = $res['descripcion'];
    $res = print_r($res, true);
    $metodo = "firmarPagares";
    $numero_solicitud = $solicitud->pagare;



    //CONSULTA ESTADO
    $pagare_deceval = $id_pagare;
    $tipo_documento = $solicitud->tipo_documento;
    if ($tipo_documento == "CC") {
      $tipo_documento = 1;
    }
    if ($tipo_documento == "CE") {
      $tipo_documento = 2;
    }
    $documento = $solicitud->cedula;
    $hoy = date("Y-m-d");

    $res = $this->consultarpagare($pagare_deceval, $documento, $tipo_documento, $id);


    $estado_deceval = $res['estadoPagare'];

    if ($res['fechaFirmaPagare'] != "" and strpos($res['estadoPagare'], "Registrado") !== false) {
      $fecha_firma_deceval = $res['fechaFirmaPagare'];
      $pagareModel->editField($id_pagare_deceval, "estado", "1");
      $pagareModel->editField($id_pagare_deceval, "fecha_firma_deceval", $fecha_firma_deceval);
      $pagareModel->editField($id_pagare_deceval, "verificado", $hoy);
      $pagareModel->editField($id_pagare_deceval, "estado_deceval", $estado_deceval);

      $this->notificarfirma($id);
    }
    if (strpos($res['estadoPagare'], "Listo para Firmar") !== false) {
      $pagareModel->editField($id_pagare_deceval, "estado", "0");
      $pagareModel->editField($id_pagare_deceval, "verificado", $hoy);
      $pagareModel->editField($id_pagare_deceval, "estado_deceval", $estado_deceval);
    }


    //CONSULTA ESTADO

    echo $res['descripcion'];
  }

  public function soaptoarray($response)
  {
    $search  = array('<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"', '<soapenv:Header/', '<soapenv:Body', '</', '<');
    $replace = array(' ', ' ', ' ', '@end@', '*start*');
    $customer = str_replace($search, $replace, $response);
    $soapres = explode('*start*', $customer);

    foreach ($soapres as $key => $value) {
      $res[$key] = $value;
      $temp = explode('@end@', $value);
      $tempval = explode('>', $temp[0]);
      $tmp = explode("State", $tempval[0]);

      $resp{
        $tempval[0]} = $tempval[1];
    }
    return $resp;
  }
  public function pagarepdf($id_solicitud)
  {
    $solicitudesModel = new Administracion_Model_DbTable_Solicitudes();
    $codeudoresModel = new Administracion_Model_DbTable_Codeudor();
    $solicitud = $solicitudesModel->getById($id_solicitud);
    $codeudores = $codeudoresModel->getList("solicitud='$id_solicitud'", "");
    $this->_view->solicitud = $solicitud;
    $this->_view->codeudores = $codeudores;
    $this->_view->ciudades = $this->ciudades();;
    //$this->setLayout('blanco');



    $userModel = new Core_Model_DbTable_User();
    $user = $userModel->getById(Session::getInstance()->get("kt_login_id"));
    $cedula = $_SESSION['kt_login_user'];
    //$this->getLayout()->setTitle("PDF");
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetMargins(10, 50, 10);
    $pdf->setPrintHeader(true);
    $pdf->setPrintFooter(true);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->AddPage('P', 'A4');
    $pdf->SetFont('helvetica', '', 8);
    $pdf->SetPrintFooter(true);
    $pdf->SetPrintHeader(true);
    $PDF_HEADER_TITLE = "";
    $PDF_HEADER_STRING = "";
    $PDF_HEADER_LOGO = "logo.png";
    $pdf->SetHeaderData($PDF_HEADER_LOGO, 60, false, false);
    $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


    $content = $this->_view->getRoutPHP('modules/page/Views/firmarpagare/pagarepdf.php');

    //$pdf->Image('./skins/page/images/logo.png', 9, 90, 192, 10);
    $pdf->writeHTML($content, true, false, true, false, '');
    if ($_GET["prueba"] == "") {
      $ruta = FILE_PATH . 'pagare' . $id_solicitud . '.pdf';
      $ruta2 = "/images/pagare" . $id_solicitud . ".pdf";
      $pdf->Output($ruta, 'F');
      return $ruta2;
    }
  }

  public function ciudades()
  {
    $ciudadesModel = new Administracion_Model_DbTable_Ciudad();
    $ciudades_list = $ciudadesModel->getList("", "");
    $ciudades = array();
    foreach ($ciudades_list as $key => $value) {
      $ciudades[$value->codigo] = $value->nombre;
    }
    return $ciudades;
  }

  public function pruebaenvioAction()
  {
    $emailModel = new Core_Model_Mail();
    $asunto = "Solicitud de crédito WEB" . $numero . "";
    $content = "";

    $tabla .= '
      <tr>
        <td><strong>Trámite</strong></td>
        <td>' . $solicitud->tramite . '</td>
      </tr>
      <tr>
        <td><strong>Ejecutivo de cuenta</strong></td>
        <td>' . $gestor_comercial_nombre . '</td>
      </tr>
      <tr>
        <td><strong>Analista de crédito asignado</strong></td>
        <td>' . $analista->user_names . '</td>
      </tr>
      <tr>
        <td><strong>Email</strong></td>
        <td>' . $correo1 . '</td>
      </tr>
      <tr>
        <td><strong>Tel&eacute;fono</strong></td>
        <td>' . $analista->user_telefono . $extension . '</td>
      </tr>
      <tr>
        <td><strong>Celular del ejecutivo de cuenta</strong></td>
        <td>' . $gestorcomercial->user_celular . '</td>
      </tr>
    </table>';


    $content = $tabla;

    //$emailModel->getMail()->Username ="creditosfonkoba@gmail.com";
    //$emailModel->getMail()->Password ="Admin.2008";
    $emailModel->getMail()->SMTPDebug = 0;


    $emailModel->getMail()->addBCC("soporteomega@omegawebsystems.com");

    $emailModel->getMail()->Subject = $asunto;
    $emailModel->getMail()->msgHTML($content);
    $emailModel->getMail()->AltBody = $content;
    $emailModel->sed();
    echo $emailModel->getMail()->ErrorInfo;
  }

  public function libranza($id)
  {
    $solicitudesModel = new Administracion_Model_DbTable_Solicitudes();
    $solicitud = $solicitudesModel->getById($id);
    $lineasModel = new Administracion_Model_DbTable_Lineas();
    $linea = $lineasModel->getList("codigo = '" . $solicitud->linea . "'", "")[0];
    $linea_desembolso = $lineasModel->getList("codigo = '" . $solicitud->linea_desembolso . "'", "")[0];
    $garantiasModel = new Administracion_Model_DbTable_Garantias();
    $garantia = $garantiasModel->getList("garantia_id = " . $solicitud->tipo_garantia, "")[0];
    $pagaresModel = new Page_Model_DbTable_Pagaredeceval();
    $pagare = $pagaresModel->getList("pagare = " . $solicitud->pagare, "")[0];

    $mpdf = new \Mpdf\Mpdf();
    $html = '
    <body>
      <div class="container">
        <header>
          <img src="https://creditosfondtodos.com.co/skins/page/images/logo.png" class="logo" />
          <h1>Documento de Solicitud de Crédito</h1>
        </header>

        <section class="info">
          <h2>Datos Personales</h2>
          <p><strong>Documento:</strong> ' . $solicitud->documento . '</p>
          <p><strong>Nombre:</strong> ' . $solicitud->nombres . ' ' . $solicitud->nombres2 . ' ' . $solicitud->apellido1 . ' ' . $solicitud->apellido2 . '</p>
          <p><strong>Email:</strong> ' . $solicitud->correo_personal . '</p>
          <p><strong>Celular:</strong> ' . $solicitud->celular . '</p>
          <p><strong>Teléfono:</strong> ' . $solicitud->telefono_oficina . '</p>
          <p><strong>Cargo:</strong> ' . $solicitud->cargo . '</p>

          <h2>Resumen de Solicitud</h2>
          <p><strong>Solicitud:</strong> WEB00' . $solicitud->id . '</p>
          <p><strong>Línea de Crédito:</strong> ' . $solicitud->linea . ' - ' . $linea->nombre . '</p>
          <p><strong>Valor Solicitado:</strong> ' . number_format($solicitud->monto_solicitado, 0, ',', '.') . '</p>
          <p><strong>Número de Cuotas:</strong> ' . $solicitud->cuotas . '</p>
          <p><strong>Fecha de Solicitud:</strong> ' . $solicitud->fecha . '</p>

          <h2>Condiciones Otorgadas</h2>
          <p><strong>Línea de Crédito:</strong> ' . $solicitud->linea_desembolso . ' - ' . $linea_desembolso->nombre . '</p>
          <p><strong>Valor Desembolso:</strong> ' . number_format($solicitud->valor_desembolso, 0, ',', '.') . '</p>
          <p><strong>Cuotas Desembolso:</strong> ' . $solicitud->cuotas_desembolso . '</p>
          <p><strong>Valor Aproximado de Cuota Desembolso:</strong> ' . number_format($solicitud->valor_cuota_desembolso, 0, ',', '.') . '</p>
          <p><strong>Tasa Mes Vencido:</strong> ' . $solicitud->tasa_desembolso . '</p>
          <p><strong>Garantía:</strong> ' . $garantia->garantia_nombre . '</p>
        </section>
        <section class="terminos">
          <h2>Autorización</h2>
          <div class="contenido-terminos">
            <p>
            Autorizo irrevocablemente a mi empleador para descontar de mi salario y demás emolumentos a mi favor, y pagar a favor de FONDTODOS
            las sumas que mensualmente se causen como consecuencia de obligaciones económicas adquiridas, dentro de los límites legales
            autorizados. De la misma forma autorizo para que con fines de control de mi capacidad de pago y tratamiento de datos personales, mi
            empleador o entidad pagadora y FODUNse compartan entre sí la información relativa a mi salario, honorarios, devengos, créditos,
            descuentos y datos personales. La presente autorización se extiende en el evento que llegare a cambiar de empleador o entidad
            pagadora en los términos del artículo 7° de la Ley 1527 de 2012, permitiendo a FODUNexigir al nuevo empleador o entidad pagadora
            el descuento de los dineros que se causen a mi favor, pudiendo descontarse hasta el 50% de mi salario, pensión u honorarios, en los
            términos que dan cuenta el artículo 55° del Decreto 1481 de 1989, con el fin de pagar los saldos insolutos ami cargo. <br>
            Igualmente, Autorizo irrevocablemente a FODUNpara: (I) Consultar, reportar y procesar mi comportamiento crediticio, financiero o
            comercial ante las Centrales de Información Financiera legalmente constituidas, ya sea nacionales o extranjeras, así como ante cualquier
            entidad que administre o maneje bases de datos. En general, la presente autorización comprende la facultad para realizar cualquier
            tratamiento lícito de mis datos personales, comerciales y financieros, conforme a la Ley 1581 del 2012. (II) En el evento de la terminación
            de mi(nuestro) contrato de trabajo, se retenga de la liquidación definitiva de la relación laboral, cesantías, intereses de cesantías, prima,
            vacaciones e indemnizaciones, las sumas correspondientes al saldo insoluto de la obligación a mi(nuestro) cargo, en los términos que
            dan cuenta el artículo 55° y 56° del Decreto 1481 de 1989. (III) Compensar contra mis aportes el saldo insoluto de la obligación en el
            evento de retiro de FODUNpor cualquier causa.

            </p>
          </div>
          <div class="aceptacion">
            <span class="checkmark">✔</span>
            Autorizo.
          </div>
        </section>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <section class="terminos">
          <h2>DECLARACIÓN DE ORIGEN DE FONDOS</h2>
          <div class="contenido-terminos">
            <p>
            Con el propósito de dar cumplimiento a lo señalado en la normatividad vigente de la Superintendencia de la Economía Solidaria, Ley 1474
            de 2011 (Estatuto Anticorrupción) y demás normas legales concordantes, de manera voluntaria doy certeza a FODUNde la siguiente
            información: A. No admitiré que terceros efectúen depósitos y/o transferencias de fondos a mi nombre provenientes de actividades ilícitas
            contempladas en el Código penal colombiano o en cualquier norma que lo modique o adicione, ni efectuaré transacciones destinadas a
            tales actividades o a favor de personas relacionadas con las mismas. B. Autorizo a terminar unilateralmente cualquier producto adquirido
            con FONDTODOS, en el caso de infracción de cualquier de los numerales contenidos en este documento, eximiendo a FODUNde toda
            responsabilidad que se derive por información errónea, falsa e inexacta que hubiere proporcionado en este documento, o de la violación
            del mismo. C. Los recursos que manejo no provienen de ninguna actividad ilícita contemplada en el Código Penal Colombiano o en
            cualquier norma que lo modique o adicione y por el contrario provienen de una actividad lícita. (Detalle de ocupación, Ocio, profesión,
            actividad, etc.)

            </p>
          </div>
          <div class="aceptacion">
            <span class="checkmark">✔</span>
            Autorizo.
          </div>
        </section>
        <section class="preguntas">
          <h2>Preguntas de Verificación</h2>
          
          <div class="pregunta">
            <p>A. ¿Es una persona políticamente expuesta de acuerdo al Decreto 1674 de 2016?</p>
            <div class="respuesta">
              '.$solicitud->persona_expuesta.'
              <input type="text" placeholder="Detalle en caso de \'Sí\'" class="detalle" value="'.$solicitud->persona_expuesta_indique.'">
            </div>
          </div>
          <div class="pregunta">
            <p>B. ¿Representa legalmente a alguna organización internacional?</p>
            <div class="respuesta">
              '.$solicitud->persona_internacional.'
              <input type="text" placeholder="Detalle en caso de \'Sí\'" class="detalle" value="'.$solicitud->persona_internacional_indique.'">
            </div>
          </div>
          <div class="pregunta">
            <p>C. ¿La sociedad y/o los medios lo reconocen como un personaje público? </p>
            <div class="respuesta">
              '.$solicitud->persona_publica.'
              <input type="text" placeholder="Detalle en caso de \'Sí\'" class="detalle" value="'.$solicitud->persona_publica_indique.'">
            </div>
          </div>
          <div class="pregunta">
            <p>D. ¿Tiene algún vínculo con un PEP (Sociedad conyugal o vínculo familiar hasta en segundo grado de consanguinidad, segundo grado en anidad y primero Civil?</p>
            <div class="respuesta">
              '.$solicitud->vinculo_pep.'
              <input type="text" placeholder="Detalle en caso de \'Sí\'" class="detalle" value="'.$solicitud->vinculo_pep_indique.'">
            </div>
          </div>
          <div class="pregunta">
            <p>E. ¿Es sujeto de obligaciones tributarias en otro país o grupo de países? </p>
            <div class="respuesta">
              '.$solicitud->obligaciones_tributarias.'
              <input type="text" placeholder="Detalle en caso de \'Sí\'" class="detalle" value="'.$solicitud->obligaciones_tributarias_indique.'">
            </div>
          </div>

        </section>
        <section class="terminos">
          <h2>ACTUALIZACIÓN DE DATOS Y VERACIDAD EN LA INFORMACIÓN</h2>
          <div class="contenido-terminos">
            <p>
            La información por mi suministrada es veraz, completa y exacta y me obligo a suministrar y actualizar como mínimo una vez por año
            todos los datos y documentos que FODUNme solicite para corroborar la información suministrada en este formulario, con el fin de
            asegurar el conocimiento del asociado. En el evento de incumplir la información aquí establecida, autorizo especialmente a FODUNa
            rechazar la apertura u otorgamiento de nuevos productos financieros y de ahorro y a bloquear los que a mi nombre se encuentren
            vigentes hasta tanto conforme la información proporcionada en este formulario

            </p>
          </div>
          <div class="aceptacion">
            <span class="checkmark">✔</span>
            Autorizo.
          </div>
        </section>
        <section class="firma">
          <h2>Firma Digital</h2>
          <div class="linea-firma"></div>
          <p><strong>Nombre:</strong> ' . $solicitud->nombres . ' ' . $solicitud->nombres2 . ' ' . $solicitud->apellido1 . ' ' . $solicitud->apellido2 . '</p>
          <p><strong>Documento:</strong> ' . $solicitud->documento . '</p>
          <p class="fecha"><strong>Fecha:</strong> ' . $pagare->fecha_firma . '</p>
        </section>
      </div>
    </body>

    ';

    $css = '
    body {
      font-family: \'Arial\', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }
    .container {
      max-width: 900px;
      margin: 10px auto;
      background-color: #fff;
      padding: 20px 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    header {
      text-align: center;
      border-bottom: 2px solid #333;
      padding-bottom: 10px;
      margin-bottom: 10px;
    }
    
    header h1 {
      margin: 0;
      color: #333;
    }
    
    .info h2 {
      background-color: #333;
      color: #fff;
      padding: 5px;
      margin-top: 20px;
    }
    
    p {
      font-size: 16px;
      line-height: 1.5;
      margin-bottom: 10px;
    }
    
    strong {
      font-weight: bold;
    }
    .logo {
      max-width: 150px; 
      margin-bottom: 20px; 
      display: block;
      margin-left: auto;
      margin-right: auto;
    }
    .firma {
      margin-top: 40px;
      border-top: 1px solid #ccc;
      padding-top: 10px;
      text-align: center;
    }
  
    .linea-firma {
      width: 60%;
      height: 1px;
      background-color: #333;
      margin: 10px auto;
    }
    
    .fecha {
      margin-top: 20px;
    }
    .terminos {
      margin-top: 40px;
      border-top: 1px solid #ccc;
      padding-top: 20px;
    }
    
    .contenido-terminos {
      font-size: 8px;
      margin-bottom: 20px;
    }
    .contenido-terminos {
      font-size: 8px;
    }

    .aceptacion {
      font-weight: bold;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .checkmark {
      color: green;
      font-size: 24px;
      margin-right: 10px;
    }

    .preguntas {
      margin-top: 40px;
      border-top: 1px solid #ccc;
      padding-top: 20px;
    }
    
    .pregunta {
      margin-bottom: 10px;
    }
    
    .respuesta {
      display: flex;
      align-items: center;
    }
    
    .respuesta label {
      margin-right: 10px;
    }
    
    .detalle {
      flex: 1;
      margin-left: 20px;
      padding: 10px; 
      font-size: 18px; 
      border: 1px solid #ccc;
      border-radius: 5px;
      height: 40px; 
      width: 300px;
    }
    ';

    $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);


    $pdf_solicitud = APP_PATH . "../htdocs/files/pdf_solicitud_" . $id . ".pdf";
    $mpdf->Output($pdf_solicitud, 'F');

    //Consultar pagare

    $pagare = $this->consultarpagare($pagare->pagare_deceval, $solicitud->documento, 1, $id);

    // Crear archivo de
    $dataBase64 = $pagare['contenido'];

    $dataDecoded = base64_decode($dataBase64);

    $path = APP_PATH . "../htdocs/files/pagare_deceval_" . $id . ".pdf";

    file_put_contents($path, $dataDecoded);

    //Obtener correos de la regional 
    $regionalesModel = new Administracion_Model_DbTable_Regionaleslibranza();
    $regionales = $regionalesModel->getList(" regional_identificacion = '" . $solicitud->regional . "'", "")[0];

    //Enviar  Correo
    $mailModel = new Core_Model_Sendingemail($this->_view);
    // echo '<pre>';
    //   print_r($regionales->regional_correos);
    // echo '</pre>';
    $mailModel->enviarLibranza($solicitud, $regionales->regional_correos, $pdf_solicitud, $path);
    return true;
  }
  public function generarpdfAction()
  {
    $id = $this->_getSanitizedParam("id");
    $solicitudesModel = new Administracion_Model_DbTable_Solicitudes();
    $solicitud = $solicitudesModel->getById($id);
    $lineasModel = new Administracion_Model_DbTable_Lineas();
    $linea = $lineasModel->getList("codigo = '" . $solicitud->linea . "'", "")[0];
    $linea_desembolso = $lineasModel->getList("codigo = '" . $solicitud->linea_desembolso . "'", "")[0];
    $garantiasModel = new Administracion_Model_DbTable_Garantias();
    $garantia = $garantiasModel->getList("garantia_id = " . $solicitud->tipo_garantia, "")[0];
    $pagaresModel = new Page_Model_DbTable_Pagaredeceval();
    $pagare = $pagaresModel->getList("pagare = " . $solicitud->pagare, "")[0];

    $mpdf = new \Mpdf\Mpdf();
    $html = '
    <body>
      <div class="container">
        <header>
          <img src="https://creditosfondtodos.com.co/skins/page/images/logo.png" class="logo" />
          <h1>Documento de Solicitud de Crédito</h1>
        </header>

        <section class="info">
          <h2>Datos Personales</h2>
          <p><strong>Documento:</strong> ' . $solicitud->documento . '</p>
          <p><strong>Nombre:</strong> ' . $solicitud->nombres . ' ' . $solicitud->nombres2 . ' ' . $solicitud->apellido1 . ' ' . $solicitud->apellido2 . '</p>
          <p><strong>Email:</strong> ' . $solicitud->correo_personal . '</p>
          <p><strong>Celular:</strong> ' . $solicitud->celular . '</p>
          <p><strong>Teléfono:</strong> ' . $solicitud->telefono_oficina . '</p>
          <p><strong>Cargo:</strong> ' . $solicitud->cargo . '</p>

          <h2>Resumen de Solicitud</h2>
          <p><strong>Solicitud:</strong> WEB00' . $solicitud->id . '</p>
          <p><strong>Línea de Crédito:</strong> ' . $solicitud->linea . ' - ' . $linea->nombre . '</p>
          <p><strong>Valor Solicitado:</strong> ' . number_format($solicitud->monto_solicitado, 0, ',', '.') . '</p>
          <p><strong>Número de Cuotas:</strong> ' . $solicitud->cuotas . '</p>
          <p><strong>Fecha de Solicitud:</strong> ' . $solicitud->fecha . '</p>

          <h2>Condiciones Otorgadas</h2>
          <p><strong>Línea de Crédito:</strong> ' . $solicitud->linea_desembolso . ' - ' . $linea_desembolso->nombre . '</p>
          <p><strong>Valor Desembolso:</strong> ' . number_format($solicitud->valor_desembolso, 0, ',', '.') . '</p>
          <p><strong>Cuotas Desembolso:</strong> ' . $solicitud->cuotas_desembolso . '</p>
          <p><strong>Valor Aproximado de Cuota Desembolso:</strong> ' . number_format($solicitud->valor_cuota_desembolso, 0, ',', '.') . '</p>
          <p><strong>Tasa Mes Vencido:</strong> ' . $solicitud->tasa_desembolso . '</p>
          <p><strong>Garantía:</strong> ' . $garantia->garantia_nombre . '</p>
        </section>
        <section class="terminos">
          <h2>Autorización</h2>
          <div class="contenido-terminos" style="text-align:justify;">
            <p>
            Autorizo irrevocablemente a mi empleador para descontar de mi salario y demás emolumentos a mi favor, y pagar a favor de FONDTODOS
            las sumas que mensualmente se causen como consecuencia de obligaciones económicas adquiridas, dentro de los límites legales
            autorizados. De la misma forma autorizo para que con fines de control de mi capacidad de pago y tratamiento de datos personales, mi
            empleador o entidad pagadora y FODUNse compartan entre sí la información relativa a mi salario, honorarios, devengos, créditos,
            descuentos y datos personales. La presente autorización se extiende en el evento que llegare a cambiar de empleador o entidad
            pagadora en los términos del artículo 7° de la Ley 1527 de 2012, permitiendo a FODUNexigir al nuevo empleador o entidad pagadora
            el descuento de los dineros que se causen a mi favor, pudiendo descontarse hasta el 50% de mi salario, pensión u honorarios, en los
            términos que dan cuenta el artículo 55° del Decreto 1481 de 1989, con el fin de pagar los saldos insolutos a mi cargo. <br>
            Igualmente, Autorizo irrevocablemente a FODUNpara: (I) Consultar, reportar y procesar mi comportamiento crediticio, financiero o
            comercial ante las Centrales de Información Financiera legalmente constituidas, ya sea nacionales o extranjeras, así como ante cualquier
            entidad que administre o maneje bases de datos. En general, la presente autorización comprende la facultad para realizar cualquier
            tratamiento lícito de mis datos personales, comerciales y financieros, conforme a la Ley 1581 del 2012. (II) En el evento de la terminación
            de mi(nuestro) contrato de trabajo, se retenga de la liquidación definitiva de la relación laboral, cesantías, intereses de cesantías, prima,
            vacaciones e indemnizaciones, las sumas correspondientes al saldo insoluto de la obligación a mi(nuestro) cargo, en los términos que
            dan cuenta el artículo 55° y 56° del Decreto 1481 de 1989. (III) Compensar contra mis aportes el saldo insoluto de la obligación en el
            evento de retiro de FODUNpor cualquier causa.

            </p>
          </div>
          <div class="aceptacion">
            <span class="checkmark">✔</span>
            Autorizo.
          </div>
        </section>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <section class="terminos">
          <h2>DECLARACIÓN DE ORIGEN DE FONDOS</h2>
          <div class="contenido-terminos">
            <p>
            Con el propósito de dar cumplimiento a lo señalado en la normatividad vigente de la Superintendencia de la Economía Solidaria, Ley 1474
            de 2011 (Estatuto Anticorrupción) y demás normas legales concordantes, de manera voluntaria doy certeza a FODUNde la siguiente
            información: A. No admitiré que terceros efectúen depósitos y/o transferencias de fondos a mi nombre provenientes de actividades ilícitas
            contempladas en el Código penal colombiano o en cualquier norma que lo modique o adicione, ni efectuaré transacciones destinadas a
            tales actividades o a favor de personas relacionadas con las mismas. B. Autorizo a terminar unilateralmente cualquier producto adquirido
            con FONDTODOS, en el caso de infracción de cualquier de los numerales contenidos en este documento, eximiendo a FODUNde toda
            responsabilidad que se derive por información errónea, falsa e inexacta que hubiere proporcionado en este documento, o de la violación
            del mismo. C. Los recursos que manejo no provienen de ninguna actividad ilícita contemplada en el Código Penal Colombiano o en
            cualquier norma que lo modique o adicione y por el contrario provienen de una actividad lícita. (Detalle de ocupación, Ocio, profesión,
            actividad, etc.)

            </p>
          </div>
          <div class="aceptacion">
            <span class="checkmark">✔</span>
            Autorizo.
          </div>
        </section>
        <section class="preguntas">
          <h2>Preguntas de Verificación</h2>
          
          <div class="pregunta">
            <p>A. ¿Es una persona políticamente expuesta de acuerdo al Decreto 1674 de 2016?</p>
            <div class="respuesta">
              '.$solicitud->persona_expuesta.'
              <input type="text" placeholder="Detalle en caso de \'Sí\'" class="detalle" value="'.$solicitud->persona_expuesta_indique.'">
            </div>
          </div>
          <div class="pregunta">
            <p>B. ¿Representa legalmente a alguna organización internacional?</p>
            <div class="respuesta">
              '.$solicitud->persona_internacional.'
              <input type="text" placeholder="Detalle en caso de \'Sí\'" class="detalle" value="'.$solicitud->persona_internacional_indique.'">
            </div>
          </div>
          <div class="pregunta">
            <p>C. ¿La sociedad y/o los medios lo reconocen como un personaje público? </p>
            <div class="respuesta">
              '.$solicitud->persona_publica.'
              <input type="text" placeholder="Detalle en caso de \'Sí\'" class="detalle" value="'.$solicitud->persona_publica_indique.'">
            </div>
          </div>
          <div class="pregunta">
            <p>D. ¿Tiene algún vínculo con un PEP (Sociedad conyugal o vínculo familiar hasta en segundo grado de consanguinidad, segundo grado en anidad y primero Civil?</p>
            <div class="respuesta">
              '.$solicitud->vinculo_pep.'
              <input type="text" placeholder="Detalle en caso de \'Sí\'" class="detalle" value="'.$solicitud->vinculo_pep_indique.'">
            </div>
          </div>
          <div class="pregunta">
            <p>E. ¿Es sujeto de obligaciones tributarias en otro país o grupo de países? </p>
            <div class="respuesta">
              '.$solicitud->obligaciones_tributarias.'
              <input type="text" placeholder="Detalle en caso de \'Sí\'" class="detalle" value="'.$solicitud->obligaciones_tributarias_indique.'">
            </div>
          </div>

        </section>
        <section class="terminos">
          <h2>ACTUALIZACIÓN DE DATOS Y VERACIDAD EN LA INFORMACIÓN</h2>
          <div class="contenido-terminos" style="text-align:justify;">
            <p>
            La información por mi suministrada es veraz, completa y exacta y me obligo a suministrar y actualizar como mínimo una vez por año
            todos los datos y documentos que FODUNme solicite para corroborar la información suministrada en este formulario, con el fin de
            asegurar el conocimiento del asociado. En el evento de incumplir la información aquí establecida, autorizo especialmente a FODUNa
            rechazar la apertura u otorgamiento de nuevos productos financieros y de ahorro y a bloquear los que a mi nombre se encuentren
            vigentes hasta tanto conforme la información proporcionada en este formulario

            </p>
          </div>
          <div class="aceptacion">
            <span class="checkmark">✔</span>
            Autorizo.
          </div>
        </section>
        <section class="firma">
          <h2>Firma Digital</h2>
          <div class="linea-firma"></div>
          <p><strong>Nombre:</strong> ' . $solicitud->nombres . ' ' . $solicitud->nombres2 . ' ' . $solicitud->apellido1 . ' ' . $solicitud->apellido2 . '</p>
          <p><strong>Documento:</strong> ' . $solicitud->documento . '</p>
          <p class="fecha"><strong>Fecha:</strong> ' . $pagare->fecha_firma . '</p>
        </section>
      </div>
    </body>

    ';

    $css = '
    body {
      font-family: \'Arial\', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }
    .container {
      max-width: 900px;
      margin: 10px auto;
      background-color: #fff;
      padding: 20px 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    header {
      text-align: center;
      border-bottom: 2px solid #333;
      padding-bottom: 10px;
      margin-bottom: 10px;
    }
    
    header h1 {
      margin: 0;
      color: #333;
    }
    
    .info h2 {
      background-color: #333;
      color: #fff;
      padding: 5px;
      margin-top: 20px;
    }
    
    p {
      font-size: 16px;
      line-height: 1.5;
      margin-bottom: 10px;
    }
    
    strong {
      font-weight: bold;
    }
    .logo {
      max-width: 150px; 
      margin-bottom: 20px; 
      display: block;
      margin-left: auto;
      margin-right: auto;
    }
    .firma {
      margin-top: 40px;
      border-top: 1px solid #ccc;
      padding-top: 10px;
      text-align: center;
    }
  
    .linea-firma {
      width: 60%;
      height: 1px;
      background-color: #333;
      margin: 10px auto;
    }
    
    .fecha {
      margin-top: 20px;
    }
    .terminos {
      margin-top: 40px;
      border-top: 1px solid #ccc;
      padding-top: 20px;
    }
    
    .contenido-terminos {
      font-size: 8px;
      margin-bottom: 20px;
    }
    .contenido-terminos {
      font-size: 8px;
    }

    .aceptacion {
      font-weight: bold;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .checkmark {
      color: green;
      font-size: 24px;
      margin-right: 10px;
    }

    .preguntas {
      margin-top: 40px;
      border-top: 1px solid #ccc;
      padding-top: 20px;
    }
    
    .pregunta {
      margin-bottom: 10px;
    }
    
    .respuesta {
      display: flex;
      align-items: center;
    }
    
    .respuesta label {
      margin-right: 10px;
    }
    
    .detalle {
      flex: 1;
      margin-left: 20px;
      padding: 10px; 
      font-size: 18px; 
      border: 1px solid #ccc;
      border-radius: 5px;
      height: 40px; 
      width: 300px;
    }
    ';

    $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

    $mpdf->Output();
  }

  public function enviarLibranzasAction(){
    ini_set('max_execution_time', 3000);
    ini_set('memory_limit', '1024M');
    ini_set('post_max_size', '1024M');
    $this->setLayout("blanco");
    $solicitudesModel = new Administracion_Model_DbTable_Solicitudes();
    $solicitudes_firmadas = $solicitudesModel->getListFirmas("pd.estado = '1' AND STR_TO_DATE(pd.fecha_firma, '%Y-%m-%d') > '2023-09-15'", "");
    foreach ($solicitudes_firmadas as $solicitud) {
      $this->libranza($solicitud->id);
    }
  }
}
