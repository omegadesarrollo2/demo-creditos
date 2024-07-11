<?php

/**
*
*/

class Page_webservicesController extends Page_mainController
{



	public function autenticarAction(){

		$data = array(
			'user' => 'CYFF3D340M3GA',
			'pw' => '04d36e68f2f614',
			'nit' => '12345678');

		$options = array(
		  'http' => array(
		    'method'  => 'POST',
		    'content' => json_encode( $data ),
		    'header'=>  "Content-Type: application/json\r\n" .
		                "Accept: application/json\r\n"
		    )
		);

		$url = URL_WS."/GetToken";

		$context  = stream_context_create( $options );
		$result = file_get_contents( $url, false, $context );
		$response = json_decode( $result );
		print_r($response);

	}

	private function getToken(){
		$data = array(
			'user' => 'CYFF3D340M3GA',
			'pw' => '04d36e68f2f614',
			'nit' => '12345678');

		$data = array(
			'user' => 'CYFF3D30M3GA0P1Q',
			'pw' => '0q1p2o9w3ie8r5t6y',
			'nit' => '1079032855');

		$options = array(
		  'http' => array(
		    'method'  => 'POST',
		    'content' => json_encode( $data ),
		    'header'=>  "Content-Type: application/json\r\n" .
		                "Accept: application/json\r\n"
		    )
		);

		$url = URL_WS."/GetToken";

		$context  = stream_context_create( $options );
		$result = file_get_contents( $url, false, $context );
		$response = json_decode( $result );
		return $response->Token;
	}

	public function getlineasAction(){

		$token = $this->getToken();

		$data = array(
			'token' => $token
		);

		$options = array(
		  'http' => array(
		    'method'  => 'POST',
		    'content' => json_encode( $data ),
		    'header'=>  "Content-Type: application/json\r\n" .
		                "Accept: application/json\r\n"
		    )
		);

		$url = URL_WS."/LineasCredito";

		$context  = stream_context_create( $options );
		$result = file_get_contents( $url, false, $context );
		$response = json_decode( $result );
		print_r($response);

	}

	public function getasociadoAction(){

		$token = $this->getToken();
		$nit = '12345678';

		$data = array(
			'token' => $token,
			'nit' => $nit
		);

		$options = array(
		  'http' => array(
		    'method'  => 'POST',
		    'content' => json_encode( $data ),
		    'header'=>  "Content-Type: application/json\r\n" .
		                "Accept: application/json\r\n"
		    )
		);

		$url = URL_WS."/DatosAsociado";

		$context  = stream_context_create( $options );
		$result = file_get_contents( $url, false, $context );
		$response = json_decode( $result );
		print_r($response);

	}


	public function getestadosolicitudAction(){

		$token = $this->getToken();
		$nit = '12345678';
		$numsol = 1;

		$data = array(
			'token' => $token,
			'numsol' => $numsol,
			'nit' => $nit
		);

		$options = array(
		  'http' => array(
		    'method'  => 'POST',
		    'content' => json_encode( $data ),
		    'header'=>  "Content-Type: application/json\r\n" .
		                "Accept: application/json\r\n"
		    )
		);

		$url = URL_WS."/EstadoSolicitud";

		$context  = stream_context_create( $options );
		$result = file_get_contents( $url, false, $context );
		$response = json_decode( $result );
		print_r($response);

	}


	public function generarscoringAction(){

		$token = $this->getToken();
		$nit = '12345678';

		$data = array(
			'token' => $token,
			'nit' => $nit
		);

		$options = array(
		  'http' => array(
		    'method'  => 'POST',
		    'content' => json_encode( $data ),
		    'header'=>  "Content-Type: application/json\r\n" .
		                "Accept: application/json\r\n"
		    )
		);

		$url = URL_WS."/GenerarScoring";

		$context  = stream_context_create( $options );
		$result = file_get_contents( $url, false, $context );
		$response = json_decode( $result );
		print_r($response);

	}


	public function generarscoringdetalleAction(){

		$token = $this->getToken();
		$nit = '12345678';

		$data = array(
			'token' => $token,
			'nit' => $nit
		);

		$options = array(
		  'http' => array(
		    'method'  => 'POST',
		    'content' => json_encode( $data ),
		    'header'=>  "Content-Type: application/json\r\n" .
		                "Accept: application/json\r\n"
		    )
		);

		$url = URL_WS."/GenerarScoring";

		$context  = stream_context_create( $options );
		$result = file_get_contents( $url, false, $context );
		$response = json_decode( $result );

		$CodScoring = $response->codScoring;

		$data = array(
			'CodScoring' => $CodScoring
		);

		$options = array(
		  'http' => array(
		    'method'  => 'POST',
		    'content' => json_encode( $data ),
		    'header'=>  "Content-Type: application/json\r\n" .
		                "Accept: application/json\r\n"
		    )
		);

		$url = URL_WS."/ConDetalleScoring";
		$context  = stream_context_create( $options );
		$result = file_get_contents( $url, false, $context );
		$response = json_decode( $result );

		print_r($response);

	}


	public function consultacupolineaAction(){

		$token = $this->getToken();
		$nit = '12345678';
		$codigo='1';

		$data = array(
			'token' => $token,
			'codlin' => $codigo,
			'nit' => $nit
		);

		$options = array(
		  'http' => array(
		    'method'  => 'POST',
		    'content' => json_encode( $data ),
		    'header'=>  "Content-Type: application/json\r\n" .
		                "Accept: application/json\r\n"
		    )
		);

		$url = URL_WS."/ConsultaCupoLinea";

		$context  = stream_context_create( $options );
		$result = file_get_contents( $url, false, $context );
		$response = json_decode( $result );
		print_r($response);

	}

	public function insertarsolicitudAction(){

		$token = $this->getToken();
		$nit = '12345678';
		$codigo='1';
		$codscoring = $this->getScoring($nit,$token);
		$monto = "100000";
		$plazo = 6;
		$fechapricta = "2019/11/21";
		$codeudor1['nit']='12345';
		$codeudor1['tipo']='E';
		$codeudores = array($codeudor1);
		$codeudores = array();

		$data = array(
			'token' => $token,
			'codscoring' => $codscoring,
			'monto' => $monto,
			'codlin' => $codigo,
			'nit' => $nit,
			'plazo' => $plazo,
			'fechapricta' => $fechapricta,
			'codeudores' => $codeudores
		);
		
		//print_r($data);

		$options = array(
		  'http' => array(
		    'method'  => 'POST',
		    'content' => json_encode( $data ),
		    'header'=>  "Content-Type: application/json\r\n" .
		                "Accept: application/json\r\n"
		    )
		);
		

		$url = URL_WS."/AlmacenaSolicitud";

		$context  = stream_context_create( $options );
		$result = file_get_contents( $url, false, $context );
		$response = json_decode( $result );
		print_r($response);
		echo $response->NumSolicitud;

	}


	public function getScoring($nit,$token){

		//$token = $this->getToken();
		//$nit = '12345678';

		$data = array(
			'token' => $token,
			'nit' => $nit
		);
		
		//print_r($data);

		$options = array(
		  'http' => array(
		    'method'  => 'POST',
		    'content' => json_encode( $data ),
		    'header'=>  "Content-Type: application/json\r\n" .
		                "Accept: application/json\r\n"
		    )
		);

		$url = URL_WS."/GenerarScoring";

		$context  = stream_context_create( $options );
		$result = file_get_contents( $url, false, $context );
		$response = json_decode( $result );
		//print_r($response);
		return $response->CodScoring;

	}

}