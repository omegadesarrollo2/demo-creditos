<?php

  /**
   *
   */

  class Administracion_mainController extends Controllers_Abstract
  {
    protected $namepages;


    public function init()
    {
      $this->_view->botonpanel = $this->botonpanel;
      $this->setLayout('administracion_panel');
      $botoneralateral = $this->_view->getRoutPHP('modules/administracion/Views/partials/botoneralateral.php');
      $this->getLayout()->setData("panel_botones", $botoneralateral);
      $botonerasuperior = $this->_view->getRoutPHP('modules/administracion/Views/partials/botonerasuperior.php');
      $this->getLayout()->setData("panel_header", $botonerasuperior);
      if (Session::getInstance()->get("kt_login_id") < 0 || Session::getInstance()->get("kt_login_id", "") == '' || Session::getInstance()->get("kt_login_level", "") == '2') {
        if (strpos($_SERVER['REQUEST_URI'], "/correoaprobacion") === false) {
          header('Location: /administracion/');
        }
      }
      $inactivo = 9000000;
      if (Session::getInstance()->get('tiempo') != '') {
        $vida_session = time() - Session::getInstance()->get('tiempo');
        if ($vida_session > $inactivo) {
          session_destroy();
          header('Location: /administracion/?inactividad==1');
        }
      }
      Session::getInstance()->set("tiempo", time());
    }

    public function changepageAction()
    {
      Session::getInstance()->set($this->namepages, $this->_getSanitizedParam("pages"));
    }

    public function orderAction()
    {
      $this->setLayout('blanco');
      $csrf = $this->_getSanitizedParam("csrf");
      if (Session::getInstance()->get('csrf')[$this->_csrf_section] == $csrf) {
        $id1 = $this->_getSanitizedParam("id1");
        $id2 = $this->_getSanitizedParam("id2");
        if (isset($id1) && $id1 > 0 && isset($id2) && $id2 > 0) {
          $content1 = $this->mainModel->getById($id1);
          $content2 = $this->mainModel->getById($id2);
          if (isset($content1) && isset($content2)) {
            $order1 = $content1->orden;
            $order2 = $content2->orden;
            $this->mainModel->changeOrder($order2, $id1);
            $this->mainModel->changeOrder($order1, $id2);
          }
        }
      }
    }

    public function deleteimageAction()
    {
      $this->setLayout('blanco');
      header('Content-Type:application/json');
      $campo = $this->_getSanitizedParam("campo");
      $id = $this->_getSanitizedParam("id");
      $csrf = $this->_getSanitizedParam("csrf");
      $elimino = 0;
      if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf) {
        $id = $this->_getSanitizedParam("id");
        $content = $this->mainModel->getById($id);
        if ($content->$campo != '') {
          $modelUploadImage = new Core_Model_Upload_Image();
          $this->mainModel->editField($id, $campo, '');
          $modelUploadImage->delete($content->$campo);
          $elimino = 1;
        }
      }
      echo json_encode(array('elimino' => $elimino));
    }

    public function DC_createToken()
    {


      // URL de la API
      $url = 'https://uat-api.datacredito.com.co/spla/oauth2/v1/token';

      // Datos de autenticación
      $data = array(
        "username" => "2-800112808.1@demo.datacredito.com.co",
        "password" => "Colombia2024"
      );

      // Cabeceras de la solicitud
      $headers = array(
        'client_id: ' . CLIENT_ID,
        'client_secret: ' . CLIENT_SECRET,
        'Content-Type: application/json',
        'Cookie: incap_ses_9084_2476842=jfhnIjQyrmHw2JFO79kQfkSsaWYAAAAArN7DkfdEGdnl05avuTyfzw==; nlbi_2476842=ifwiafd8UiajhkA1xCGrVAAAAAABpsvnTFXZDN+7opCPoarH; visid_incap_2476842=N0sSIvc3Rfu4rS4SlqIY6HBMaGYAAAAAQUIPAAAAAAA/vggaDxDf55C3BgJ9sT3t; visid_incap_2537388=oMBTN7NJROePxnHsnmhQhEjCR2YAAAAAQUIPAAAAAADWvNq+BBdKuoZAfDGhFVU+'
      );

      // Inicializa cURL
      $ch = curl_init();

      // Configura las opciones de cURL
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

      // Ejecuta la solicitud y obtiene la respuesta
      $response = curl_exec($ch);

      // Manejo de errores
      if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
      } else {
        // Procesa la respuesta
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code == 200) {
          $response_data = json_decode($response, true);
          // Aquí puedes procesar los datos de la respuesta
          return $response_data['access_token'];
        } else {
          echo "Solicitud fallida. Código de respuesta HTTP: $http_code\n";
          echo "Respuesta: $response\n";
        }
      }

      // Cierra cURL
      curl_close($ch);
    }

    public function DC_destroyToken($token)
    {
      // URL de la API
      $url = 'https://uat-api.datacredito.com.co/spla/oauth2/v1/revokeToken';

      // Datos de autenticación
      $data = array(
        "username" => "2-800112808.1@demo.datacredito.com.co",
        "password" => "Colombia2024"
      );

      // Cabeceras de la solicitud
      $headers = array(
        'client_id: ' . CLIENT_ID,
        'client_secret: ' . CLIENT_SECRET,
        'Content-Type: application/json',
        'token: ' . $token, // Reemplaza <token_a_reemplazar> con el token que deseas revocar
        'Cookie: incap_ses_9084_2476842=jfhnIjQyrmHw2JFO79kQfkSsaWYAAAAArN7DkfdEGdnl05avuTyfzw==; nlbi_2476842=ifwiafd8UiajhkA1xCGrVAAAAAABpsvnTFXZDN+7opCPoarH; visid_incap_2476842=N0sSIvc3Rfu4rS4SlqIY6HBMaGYAAAAAQUIPAAAAAAA/vggaDxDf55C3BgJ9sT3t; visid_incap_2537388=oMBTN7NJROePxnHsnmhQhEjCR2YAAAAAQUIPAAAAAADWvNq+BBdKuoZAfDGhFVU+'
      );

      // Inicializa cURL
      $ch = curl_init();

      // Configura las opciones de cURL
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

      // Ejecuta la solicitud y obtiene la respuesta
      $response = curl_exec($ch);

      // Manejo de errores
      if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
      } else {
        // Procesa la respuesta
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code == 200) {
          $response_data = json_decode($response, true);
          // Aquí puedes procesar los datos de la respuesta
          return $response_data;
        } else {
          echo "Solicitud fallida. Código de respuesta HTTP: $http_code\n";
          echo "Respuesta: $response\n";
        }
      }

      // Cierra cURL
      curl_close($ch);
    }

    public function DC_getScore($document, $token)
    {
      // URL de la API
      $url = 'https://uat-api.datacredito.com.co/cs/credit-history/v1/hdcplus';

      // Datos de autenticación y parámetros
      $data = array(
        "user" => DC_USER,
        "password" => DC_PASSWORD,
        "identifyingTrx" => array(
          "requestUUID" => "3fa85f64-5717-4562-b3fc-2c963f66afa6",
          "dateTime" => "2022-12-13T16:04:02-05:00",
          "originatorChannelName" => "FODUN-01",
          "originatorChannelType" => "42"
        ),
        "identifyingUser" => array(
          "person" => array(
            "personId" => array(
              "personIdNumber" => $document,
              "personIdType" => 1
            ),
            "personLastName" => "ESCOVAR"
          )
        ),
        "parameters" => array(
          array(
            "type" => "0",
            "nameParameter" => "codigos",
            "valueParameter" => "TOM-001"
          )
        )
      );

      // Cabeceras de la solicitud
      $headers = array(
        'Content-Type: application/json',
        'serverIpAddress: 161.69.60.20',
        'ProductId: 64',
        'InfoAccountType: 1',
        'client_id: ' . CLIENT_ID,
        'client_secret: ' . CLIENT_SECRET,
        'Authorization: Bearer ' . $token,
        'Cookie: incap_ses_9084_2476842=ja96Fe7CpCPqdhFP79kQftUfamYAAAAATaPWPF4CvVUAmXZg5qYkVw==; nlbi_2476842=uhYJXijdKjKGnwxTxCGrVAAAAABhbAJg5lLch+DncXysARCb; visid_incap_2476842=N0sSIvc3Rfu4rS4SlqIY6HBMaGYAAAAAQUIPAAAAAAA/vggaDxDf55C3BgJ9sT3t; visid_incap_2537388=oMBTN7NJROePxnHsnmhQhEjCR2YAAAAAQUIPAAAAAADWvNq+BBdKuoZAfDGhFVU+'
      );

      // Inicializa cURL
      $ch = curl_init();

      // Configura las opciones de cURL
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

      // Ejecuta la solicitud y obtiene la respuesta
      $response = curl_exec($ch);

      // Manejo de errores
      if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
      } else {
        // Procesa la respuesta
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code == 200) {
          $response_data = json_decode($response, true);
          // Aquí puedes procesar los datos de la respuesta
          return $response_data['ReportHDCplus']['models'][0]['scoreValue'];
        } else {
          echo "Solicitud fallida. Código de respuesta HTTP: $http_code\n";
          echo "Respuesta: $response\n";
        }
      }

      // Cierra cURL
      curl_close($ch);
    }

  }