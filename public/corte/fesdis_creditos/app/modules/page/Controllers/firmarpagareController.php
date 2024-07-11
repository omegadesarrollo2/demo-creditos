<?php

/**
*
*/

class Page_firmarpagareController extends Page_mainController
{

	public function con_ceros($x){
		$x = str_pad($x, 5, "0", STR_PAD_LEFT);
		return $x;
	}

	public function indexAction()
	{
		$this->_view->seccion = 1;
		$this->_view->contenidos = $this->template->getContent(1);

		$header = $this->_view->getRoutPHP('modules/page/Views/partials/header.php');
		$this->getLayout()->setData("header",$header);


		$id = $this->_getSanitizedParam("id");
		//echo $this->pagarepdf($id);
		$this->_view->rutaPDF=$this->pagarepdf($id);
		$numero = "WEB".$this->con_ceros($id);
		$this->_view->numero = $numero;

		$solicitudesModel = new Administracion_Model_DbTable_Solicitudes();
		$solicitud = $solicitudesModel->getById($id);
		$cedula = $solicitud->cedula;
		

		$codeudorModel = new Administracion_Model_DbTable_Codeudor();
		$codeudor1_list = $codeudorModel->getList(" solicitud='$id' AND codeudor_numero='1' ","")[0];
		$codeudor2_list = $codeudorModel->getList(" solicitud='$id' AND codeudor_numero='2' ","")[0];
		$codeudor1 = $codeudor1_list->cedula;
		$codeudor2 = $codeudor2_list->cedula;
		$numero_obligacion = $solicitud->pagare;
		$pagareModel = new Page_Model_DbTable_Pagaredeceval();
		$existe_pagare = $pagareModel->getList(" pagare='$numero_obligacion' ","")[0];

		$linea = $solicitud->linea;
		$lineaModel = new Administracion_Model_DbTable_Lineas();
		$linea_list = $lineaModel->getList(" codigo='$linea' ","")[0];
		$modalidad = $linea." - ".$linea_list->nombre;


		$nombres = $solicitud->nombres." ".$solicitud->nombres2." ".$solicitud->apellido1." ".$solicitud->apellido2;

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

		$sin_codificar = $id."OMEGA";
		$hash = $this->_getSanitizedParam("hash");
		$this->_view->hash = $hash;

		$this->_view->valido = 0;
		if(password_verify($sin_codificar,$hash)){
			$this->_view->valido=1;
		}

	}

	public function validartokenAction()
	{


		$id = $this->_getSanitizedParam("solicitud");
		$solicitudesModel = new Administracion_Model_DbTable_Solicitudes();
		$solicitud = $solicitudesModel->getById($id);

		$numero_obligacion = $solicitud->pagare;
		$pagareModel = new Page_Model_DbTable_Pagaredeceval();
		$existe_pagare = $pagareModel->getList(" pagare='$numero_obligacion' ","")[0];


		$token = $existe_pagare->token;

		$firmado=0;
		if($existe_pagare->estado=="1"){
			$firmado=1;
		}

		$token2 = $this->_getSanitizedParam("token");
		$rol = $this->_getSanitizedParam("rol");
		$prueba = $this->_getSanitizedParam("prueba");
		$hash = $this->_getSanitizedParam("hash");
		$token2 = trim($token2);

		if($firmado==0 and $prueba!="1"){
			if($token!=$token2){
				header("Location:/page/firmarpagare/?id=".$id."&error=1&hash=".$hash);
			}else{
				header("Location:/page/firmarpagare/firmaws/?id=".$id."&rol=".$rol."&hash=".$hash);
			}
		}

		if($prueba=="1"){
			if($token!=$token2){
				echo "TOKEN NO VALIDO";
			}else{
				echo "TOKEN VALIDO";
			}
		}

		if($firmado==1){
			header("Location:/page/firmarpagare/?id=".$id."&rol=".$rol."&hash=".$hash);
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
		$codeudor1_list = $codeudorModel->getList(" solicitud='$id' AND codeudor_numero='1' ","")[0];
		$codeudor1 = $codeudor1_list->cedula;
		$codeudor2 = $codeudor2_list->cedula;
		$cedula = $codeudor1_list->cedula;

		$numero_obligacion = $solicitud->pagare;
		$pagareModel = new Page_Model_DbTable_Pagaredeceval();
		$existe_pagare = $pagareModel->getList(" pagare='$numero_obligacion' ","")[0];
		$id_pagare_deceval = $existe_pagare->id;

		$local_cert = "certificado.pem";
		$wsdl = "https://pruebas.deceval.com.co:446/weblogic/sdl12/services/SDLService?WSDL";
		$wsdl = "http://localhost:8086/DecevalProxy/services/ProxyServicesImplPort?wsdl";

		$client = new soapClient($wsdl, array(
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

		if($rol==0){
			$tipo_documento = $solicitud->tipo_documento;
			if($tipo_documento=="CC"){
				$tipo_documento = 1;
			}
			if($tipo_documento=="CE"){
				$tipo_documento = 2;
			}
			$documento = $solicitud->cedula;
			$id_rol = 5; //otorgante
		}

		if($rol==1){
			$codeudor_list = $codeudorModel->getList(" solicitud='$id' AND codeudor_numero='1' ","")[0];
			$tipo_documento = $codeudor_list->tipo_documento;
			if($tipo_documento=="CC"){
				$tipo_documento = 1;
			}
			if($tipo_documento=="CE"){
				$tipo_documento = 2;
			}
			$documento = $codeudor_list->cedula;
			$id_rol = 6; //codeudor
		}
		if($rol==2){
			$codeudor_list = $codeudorModel->getList(" solicitud='$id' AND codeudor_numero='2' ","")[0];
			$tipo_documento = $codeudor_list->tipo_documento;
			if($tipo_documento=="CC"){
				$tipo_documento = 1;
			}
			if($tipo_documento=="CE"){
				$tipo_documento = 2;
			}
			$documento = $codeudor_list->cedula;
			$id_rol = 6; //codeudor
		}

		$existe = $ceduladecevalModel->getList(" cedula='$documento' ","")[0];
		$id_deceval = $existe->usuario_deceval;

		//pruebas
		$usuario = 'FSECRETARIA';
		$codigo_depositante = '1089';
		$clave = 'Deceval1a*';
		//produccion
		$usuario = '80004306941';
		$codigo_depositante = '1046';
		//$clave = 'Fedeaa2020';

		$xml = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://services.proxy.deceval.com/">
		   <soapenv:Header/>
		   <soapenv:Body>
		      <ser:firmarPagare>
		         <arg0>
		            <header>
		               <codigoDepositante>'.$codigo_depositante.'</codigoDepositante>
		               <fecha>'.$fecha.'T'.$hora.'</fecha>
		               <hora>'.$hora2.'</hora>
		               <usuario>'.$usuario.'</usuario>
		            </header>
		            <informacionFirmaPagareDTO>';
		if(1==0){
			$xml.='
					   <archivosAdjuntos>
		                  <contenido></contenido>
		                  <nombreArchivo></nombreArchivo>
		               </archivosAdjuntos>';
		}

		$xml.='
		               <clave>'.$clave.'</clave>
		               <idDocumentoPagare>'.$id_pagare.'</idDocumentoPagare>
		               <idRolFirmante>'.$id_rol.'</idRolFirmante>
		               <motivo></motivo>
		               <numeroDocumento>'.$documento.'</numeroDocumento>
		               <tipoDocumento>'.$tipo_documento.'</tipoDocumento>
		            </informacionFirmaPagareDTO>
		         </arg0>
		      </ser:firmarPagare>
		   </soapenv:Body>
		</soapenv:Envelope>';

		//echo $xml;
		//print($xml);
		$request = $xml;
		$location = $wsdl;
		$action = "";
		$version = 1.2;

		//var_dump($client->__dorequest($request,$location,$action,$version));
		$xml2 = $client->__dorequest($request,$location,$action,$version);
		$res = $this->soaptoarray($xml2);
		print_r($res);

		$descripcion = $res['descripcion'];
		$res = print_r($res,true);
		$metodo = "firmarPagare";
		$numero_solicitud = $solicitud->pagare;

		$exitoso = "false";
		if( strpos($descripcion,"Exitoso")!==FALSE or strpos($res,"Exitoso")!==FALSE){
			$exitoso = "true";
		}

			//Registro transaccion
			$data = array();
			$ip = $_SERVER['REMOTE_ADDR'];
			$fecha = date("Y-m-d H:i:s");
			$quien = round($_SESSION['kt_login_id']);
			$data['metodo']=$metodo;
			$data['xml']=$xml;
			$data['res']=$res;
			$data['exitoso']=$exitoso;
			$data['codigoError']=$codigoError;
			$data['fecha']=$fecha;
			$data['solicitud']=$id;
			$data['numero_solicitud']=$numero_solicitud;
			$data['ip']=$ip;
			$data['quien']=$quien;
			$transaccionModel = new Page_Model_DbTable_Transaccion();
			$transaccionModel->insert($data);


		if($exitoso=="true"){
			$hoy = date("Y-m-d H:i:s");
			$ip = $_SERVER['REMOTE_ADDR'];
			$rol = $this->_getSanitizedParam("rol");
			$no = $this->_getSanitizedParam("no");

			if($no==""){
				if($rol==0){
					$pagareModel->editField($id_pagare_deceval,"fecha_firma",$hoy);
					$pagareModel->editField($id_pagare_deceval,"ip",$ip);
				}
				if($rol==1){
					$pagareModel->editField($id_pagare_deceval,"fecha_firma1",$hoy);
					$pagareModel->editField($id_pagare_deceval,"ip1",$ip);
				}
				if($rol==2){
					$pagareModel->editField($id_pagare_deceval,"fecha_firma2",$hoy);
					$pagareModel->editField($id_pagare_deceval,"ip2",$ip);
				}
			}

				//CONSULTA ESTADO
		    	$pagare_deceval = $id_pagare;
				$tipo_documento = $solicitud->tipo_documento;
				if($tipo_documento=="CC"){
					$tipo_documento = 1;
				}
				if($tipo_documento=="CE"){
					$tipo_documento = 2;
				}
				$documento = $solicitud->cedula;
				$hoy = date("Y-m-d");

				$res = $this->consultarpagare($pagare_deceval,$documento,$tipo_documento,$id);

				  $estado_deceval = $res['estadoPagare'];

				  if($res['fechaFirmaPagare']!="" and strpos($res['estadoPagare'],"Registrado")!==false){
						$fecha_firma_deceval = $res['fechaFirmaPagare'];
						$pagareModel->editField($id_pagare_deceval,"estado","1");
						$pagareModel->editField($id_pagare_deceval,"fecha_firma_deceval",$fecha_firma_deceval);
						$pagareModel->editField($id_pagare_deceval,"verificado",$hoy);
						$pagareModel->editField($id_pagare_deceval,"estado_deceval",$estado_deceval);
				  }
				  if(strpos($res['estadoPagare'],"Listo para Firmar")!==false){
				  		$pagareModel->editField($id_pagare_deceval,"estado","0");
				  		$pagareModel->editField($id_pagare_deceval,"verificado",$hoy);
				  		$pagareModel->editField($id_pagare_deceval,"estado_deceval",$estado_deceval);
				  }

				//CONSULTA ESTADO
			//cambiar estado
			$this->_view->mensaje = "PAGARE FIRMADO CON EXITO";
			header("Refresh:3; url=/page/firmarpagare/?estado=OK&hash=".$hash);
		}else{
			//echo "PAGARE NO SE PUDO FIRMAR";
			//header("Refresh:3; url=firmar_pagare.php?error=2");
			header("Refresh:3; url=/page/firmarpagare/?error=2&id=".$id."&hash=".$hash);
		}


	}


	public function consultarpagare($pagare_deceval,$documento,$tipo_documento,$id){
		$local_cert = "certificado.pem";
		$wsdl = "http://localhost:8086/DecevalProxy/services/ProxyServicesImplPort?wsdl";

		$client = new soapClient($wsdl, array(
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
		$usuario = 'FSECRETARIA';
		$codigo_depositante = '1089';
		//produccion
		$usuario = '80004306941';
		$codigo_depositante = '1046';


		$xml = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://services.proxy.deceval.com/">
		   <soapenv:Header/>
		   <soapenv:Body>
		      <ser:consultarPagares>
		         <!--Optional:-->
		         <arg0>
		            <consultaPagareServiceDTO>
		               <codigoDeceval>'.$pagare_deceval.'</codigoDeceval>
					   <idTipoIdentificacionFirmante>'.$tipo_documento.'</idTipoIdentificacionFirmante>
		               <numIdentificacionFirmante>'.$documento.'</numIdentificacionFirmante>
		            </consultaPagareServiceDTO>
		            <header>
		               <codigoDepositante>'.$codigo_depositante.'</codigoDepositante>
		               <fecha>'.$fecha.'T'.$hora.'</fecha>
		               <hora>'.$hora2.'</hora>
		               <usuario>'.$usuario.'</usuario>
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
		$xml2 = $client->__dorequest($request,$location,$action,$version);
		$res = $this->soaptoarray($xml2);
		//print_r($res);


		$solicitudesModel = new Administracion_Model_DbTable_Solicitudes();
		$solicitud = $solicitudesModel->getById($id);
		$numero_solicitud = $solicitud->pagare;


	  	$metodo = "consultarpagare";
	  	$exitoso = "false";
	  	if($res['estadoPagare']!=""){
	  		$exitoso="true";
	  	}

		//Registro transaccion
		$data = array();
		$ip = $_SERVER['REMOTE_ADDR'];
		$fecha = date("Y-m-d H:i:s");
		$quien = round($_SESSION['kt_login_id']);
		$data['metodo']=$metodo;
		$data['xml']=$xml;
		$data['res']=print_r($res,true);
		$data['exitoso']=$exitoso;
		$data['codigoError']=$codigoError;
		$data['fecha']=$fecha;
		$data['solicitud']=$id;
		$data['numero_solicitud']=$numero_solicitud;
		$data['ip']=$ip;
		$data['quien']=$quien;
		$transaccionModel = new Page_Model_DbTable_Transaccion();
		$transaccionModel->insert($data);


		//echo $res['estadoPagare'];
		//echo $res['fechaFirmaPagare']; //no tiene firma
		//Registrado - En Blanco
		//Listo para Firmar - En Blanco
		return $res;
	}



	public function consultarpagaresAction(){

		$pagareModel = new Page_Model_DbTable_Pagaredeceval();
		$solicitudesModel = new Administracion_Model_DbTable_Solicitudes();
		$pagares = $pagareModel->getList(" verificado IS NULL "," rand() ");

		$local_cert = "certificado.pem";
		$wsdl = "http://localhost:8086/DecevalProxy/services/ProxyServicesImplPort?wsdl";

		$client = new soapClient($wsdl, array(
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
		$usuario = 'FSECRETARIA';
		$codigo_depositante = '1089';
		//produccion
		$usuario = '80004306941';
		$codigo_depositante = '1046';

		foreach ($pagares as $key => $pagare1){

			$fecha = date("Y-m-d");
			$hora = date("H:i:s");
			$hora2 = date("H:i");

			$pagare_deceval = $pagare1->pagare_deceval;
			$id_pagare_deceval = $pagare1->id;
			$numero_obligacion = $pagare1->pagare;
			$solicitud = $solicitudesModel->getList(" numero_obligacion ='$numero_obligacion' AND paso='8' "," id DESC ")[0];
			$tipo_documento = $solicitud->tipo_documento;
			if($tipo_documento=="CC"){
				$tipo_documento = 1;
			}
			if($tipo_documento=="CE"){
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
			               <codigoDeceval>'.$pagare_deceval.'</codigoDeceval>
						   <idTipoIdentificacionFirmante>'.$tipo_documento.'</idTipoIdentificacionFirmante>
			               <numIdentificacionFirmante>'.$documento.'</numIdentificacionFirmante>
			            </consultaPagareServiceDTO>
			            <header>
			               <codigoDepositante>'.$codigo_depositante.'</codigoDepositante>
			               <fecha>'.$fecha.'T'.$hora.'</fecha>
			               <hora>'.$hora2.'</hora>
			               <usuario>'.$usuario.'</usuario>
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
			$xml2 = $client->__dorequest($request,$location,$action,$version);
			$res = $this->soaptoarray($xml2);

			echo $pagare_deceval." - ".$res['estadoPagare']." ".$res['fechaFirmaPagare']."<br />";


		  $fecha_firma_deceval = $res['fechaFirmaPagare'];
		  $estado_deceval = $res['estadoPagare'];

		  if($estado_deceval!=""){
		  	$pagareModel->editField($id_pagare_deceval,"estado_deceval",$estado_deceval);
		  	$pagareModel->editField($id_pagare_deceval,"verificado",$hoy);
		  }

		  if($res['fechaFirmaPagare']!="" and strpos($res['estadoPagare'],"Registrado")!==false){
		  	$pagareModel->editField($id_pagare_deceval,"estado","1");
			$total++;
		  }
		  if(strpos($res['estadoPagare'],"Listo para Firmar")!==false){
		  	$pagareModel->editField($id_pagare_deceval,"estado","0");
			$total++;
		  }
		  if(strpos($res['estadoPagare'],"Anulado")!==false){
		  	$pagareModel->editField($id_pagare_deceval,"estado","0");
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
		$codeudor1_list = $codeudorModel->getList(" solicitud='$id' AND codeudor_numero='1' ","")[0];
		$codeudor1 = $codeudor1_list->cedula;
		$codeudor2 = $codeudor2_list->cedula;

		$numero_obligacion = $solicitud->pagare;
		$pagareModel = new Page_Model_DbTable_Pagaredeceval();
		$existe_pagare = $pagareModel->getList(" pagare='$numero_obligacion' ","")[0];
		$id_pagare_deceval = $existe_pagare->id;



		$fecha = date("Y-m-d");
		$hora = date("H:i:s");
		$hora2 = date("H:i");

		$id_pagare = $existe_pagare->pagare_deceval;
		$rol = $this->_getSanitizedParam("rol");

		$ceduladecevalModel = new Administracion_Model_DbTable_Ceduladeceval();
		$codeudorModel = new Administracion_Model_DbTable_Codeudor();

		$existe = $ceduladecevalModel->getList(" cedula='$documento' ","")[0];
		$id_deceval = $existe->usuario_deceval;

		//pruebas
		$usuario = 'FSECRETARIA';
		$codigo_depositante = '1089';
		$clave = 'Deceval1a*';

		//produccion
		$usuario = '80004306941';
		$codigo_depositante = '1046';
		$clave = 'Deceval1a*';

		$descripcion = $res['descripcion'];
		$res = print_r($res,true);
		$metodo = "firmarPagare";
		$numero_solicitud = $solicitud->pagare;



		//CONSULTA ESTADO
    	$pagare_deceval = $id_pagare;
		$tipo_documento = $solicitud->tipo_documento;
		if($tipo_documento=="CC"){
			$tipo_documento = 1;
		}
		if($tipo_documento=="CE"){
			$tipo_documento = 2;
		}
		$documento = $solicitud->cedula;
		$hoy = date("Y-m-d");

		$res = $this->consultarpagare($pagare_deceval,$documento,$tipo_documento,$id);


		$estado_deceval = $res['estadoPagare'];

		  if($res['fechaFirmaPagare']!="" and strpos($res['estadoPagare'],"Registrado")!==false){
				$fecha_firma_deceval = $res['fechaFirmaPagare'];
				$pagareModel->editField($id_pagare_deceval,"estado","1");
				$pagareModel->editField($id_pagare_deceval,"fecha_firma_deceval",$fecha_firma_deceval);
				$pagareModel->editField($id_pagare_deceval,"verificado",$hoy);
				$pagareModel->editField($id_pagare_deceval,"estado_deceval",$estado_deceval);
		  }
		  if(strpos($res['estadoPagare'],"Listo para Firmar")!==false){
		  		$pagareModel->editField($id_pagare_deceval,"estado","0");
		  		$pagareModel->editField($id_pagare_deceval,"verificado",$hoy);
		  		$pagareModel->editField($id_pagare_deceval,"estado_deceval",$estado_deceval);
		  }


		//CONSULTA ESTADO



	}

	public function soaptoarray($response)
	{
		$search  = array('<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"','<soapenv:Header/','<soapenv:Body','</', '<');
		$replace = array(' ',' ',' ','@end@', '*start*');
		$customer=str_replace($search, $replace, $response);
		$soapres =explode('*start*',$customer);

		foreach($soapres as $key=>$value)
		{
			$res[$key]=$value;
			$temp=explode('@end@',$value);
			$tempval=explode('>',$temp[0]);
			$tmp=explode("State",$tempval[0]);

			$resp{$tempval[0]}=$tempval[1];
		}
		return $resp;
	}
		public function pagarepdf($id_solicitud){
		$solicitudesModel = new Administracion_Model_DbTable_Solicitudes();
		$codeudoresModel = new Administracion_Model_DbTable_Codeudor();
		$solicitud = $solicitudesModel->getById($id_solicitud);
		$codeudores=$codeudoresModel->getList("solicitud='$id_solicitud'","");
		$this->_view->solicitud=$solicitud;
		$this->_view->codeudores=$codeudores;
		$this->_view->ciudades=$this->ciudades();;
	 //$this->setLayout('blanco');
	 

	
	 $userModel = new Core_Model_DbTable_User();
     $user = $userModel->getById(Session::getInstance()->get("kt_login_id"));
     $cedula=$_SESSION['kt_login_user'];
     //$this->getLayout()->setTitle("PDF");
     $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
     $pdf->SetMargins(10,50, 10);
     $pdf->setPrintHeader(true);
     $pdf->setPrintFooter(true);
     $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
     $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
     $pdf->AddPage('P', 'A4');
	 $pdf->SetFont('helvetica','',8);
	 $pdf->SetPrintFooter(true);
	 $pdf->SetPrintHeader(true);
	 $PDF_HEADER_TITLE="";
	 $PDF_HEADER_STRING="";
	 $PDF_HEADER_LOGO="logo.png";
	 $pdf->SetHeaderData($PDF_HEADER_LOGO, 60, false, false);
	 $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	 $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	 // set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


	 $content = $this->_view->getRoutPHP('modules/page/Views/firmarpagare/pagarepdf.php');
	 
     //$pdf->Image('./corte/logo.png', 9, 90, 192, 10);
	 $pdf->writeHTML($content, true, false, true, false, '');
	 if($_GET["prueba"]==""){
		$ruta=FILE_PATH.'pagare'.$id_solicitud.'.pdf';
		$ruta2="/images/pagare".$id_solicitud.".pdf";
		$pdf->Output($ruta, 'F');
		return $ruta2;
	 }
	}

public function ciudades(){
	$ciudadesModel = new Administracion_Model_DbTable_Ciudad();
	$ciudades_list=$ciudadesModel->getList("","");
	$ciudades=array();
	foreach ($ciudades_list as $key => $value) {
		$ciudades[$value->codigo]=$value->nombre;
	}
return $ciudades;	
}

}