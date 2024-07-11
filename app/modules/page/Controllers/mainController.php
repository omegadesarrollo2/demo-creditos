<?php

  /**
   *
   */

  class Page_mainController extends Controllers_Abstract
  {

    public $template;

    public function init()
    {
      $this->setLayout('page_page');
      $this->template = new Page_Model_Template_Template($this->_view);
      $infopageModel = new Page_Model_DbTable_Informacion();
      $this->_view->infopage = $infopageModel->getById(1);
      $header = $this->_view->getRoutPHP('modules/page/Views/partials/header.php');
      $this->getLayout()->setData("header", $header);
      $footer = $this->_view->getRoutPHP('modules/page/Views/partials/footer.php');
      $botones = $this->_view->getRoutPHP('modules/page/Views/partials/botones.php');
      $this->getLayout()->setData("footer", $footer);
      $this->getLayout()->setData("botones", $botones);
      $this->usuario();
      $this->_view->editoromega = 1;
    }


    public function usuario()
    {
      $userModel = new Core_Model_DbTable_User();
      $user = $userModel->getById(Session::getInstance()->get("kt_login_id"));
      if ($user->user_id == 1) {
        $this->editarpage = 1;
      }
    }

    public function searchUser($user)
    {
      $res = array();
      $url = 'http://186.29.192.82/api/asociado/' . $user;
      $curl = curl_init();
      curl_setopt_array($curl, array(
          CURLOPT_RETURNTRANSFER => 1,
          CURLOPT_URL => $url,
          CURLOPT_USERAGENT => 'Consulta API desde PHP'
        )
      );
      $data = curl_exec($curl);
      curl_close($curl);
      if ($data == 'La cédula especificada no existe') {
        $res['status'] = 'not_found';
      } else {
        $res['status'] = 'found';
        $res['data'] = $data;
      }
      return $res;
    }

    public function authenticateUser()
    {
      $user = '80774696';
      $password = '3$e3d)CKCp6B';
      $url = 'https://componentsign.camerfirmacolombia.co/apiITSign/api/Authenticate';

      $data = array(
        'user' => $user,
        'password' => $password
      );

      $headers = array(
        'Content-Type: application/json',
      );

      $options = array(
        'http' => array(
          'header' => $headers,
          'method' => 'POST',
          'content' => json_encode($data),
        ),
      );

      $context = stream_context_create($options);
      $result = file_get_contents($url, false, $context);

      if ($result === FALSE) {
        // Handle error
        return "Error during authentication.";
      }

      // return $result;
      return json_decode($result, true);
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
          echo $response_data['access_token'];
          return $response_data['access_token'];
        } else {
          echo "Solicitud fallida. Código de respuesta HTTP: $http_code\n";
          echo "Respuesta Token: $response\n";
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
