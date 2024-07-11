<?php

/**
*
*/

class Page_codeudorController extends Page_mainController
{

	public function indexAction()
	{

		if($this->_getSanitizedParam("mod")=="detalle_solicitud"){
			$this->getLayout()->setData("header","");
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

		$linea_id = $solicitud->linea;

		$lineaModel = new Administracion_Model_DbTable_Lineas();
		$this->_view->linea = $lineaModel->getList(" codigo = '$linea_id' ","")[0];

		$codeudorModel = new Administracion_Model_DbTable_Codeudor();
		$codeudor = $codeudorModel->getList(" solicitud='$id' AND codeudor_numero='1' ","")[0];
		$n = $this->_getSanitizedParam("n");
		if($n=="2"){
			$codeudor = $codeudorModel->getList(" solicitud='$id' AND codeudor_numero='2' ","")[0];
		}
		$cedula = $codeudor->cedula;
		$this->_view->n = $n;

		$this->_view->documento = $cedula;

		$ultima = $codeudorModel->getList(" cedula='$cedula' "," id DESC ")[0];

		if($ultima->nombres!=""){
			$this->_view->nombres = $ultima->nombres;
		}
		if($ultima->nombres2!=""){
			$this->_view->nombres2 = $ultima->nombres2;
		}
		if($ultima->apellido1!=""){
			$this->_view->apellido1 = $ultima->apellido1;
		}
		if($ultima->apellido2!=""){
			$this->_view->apellido2 = $ultima->apellido2;
		}
		if($ultima->sexo!=""){
			$this->_view->sexo = $ultima->sexo;
		}
		if($ultima->direccion_residencia!=""){
			$this->_view->direccion_residencia = $ultima->direccion_residencia;
		}
		if($ultima->telefono!=""){
			$this->_view->telefono = $ultima->telefono;
		}
		if($ultima->barrio!=""){
			$this->_view->barrio = $ultima->barrio;
		}
		if($ultima->ciudad_residencia!=""){
			$this->_view->ciudad_residencia = $ultima->ciudad_residencia;
		}
		if($ultima->correo_empresarial!=""){
			$this->_view->correo_empresarial = $ultima->correo_empresarial;
		}
		if($ultima->correo_personal!=""){
			$this->_view->correo_personal = $ultima->correo_personal;
		}
		if($ultima->tipo_documento!=""){
			$this->_view->tipo_documento = $ultima->tipo_documento;
		}
		if($ultima->empresa!=""){
			$this->_view->empresa = $ultima->empresa;
		}
		if($ultima->dependencia!=""){
			$this->_view->dependencia = $ultima->dependencia;
		}
		if($ultima->direccion_oficina!=""){
			$this->_view->direccion_oficina = $ultima->direccion_oficina;
		}
		if($ultima->telefono_oficina!=""){
			$this->_view->telefono_oficina = $ultima->telefono_oficina;
		}
		if($ultima->situacion_laboral!=""){
			$this->_view->situacion_laboral = $ultima->situacion_laboral;
		}
		if($ultima->cual!=""){
			$this->_view->cual = $ultima->cual;
		}
		if($ultima->declara_renta!=""){
			$this->_view->declara_renta = $ultima->declara_renta;
		}
		if($ultima->persona_publica!=""){
			$this->_view->persona_publica = $ultima->persona_publica;
		}
		if($ultima->nivel_escolaridad!=""){
			$this->_view->estudios = $ultima->nivel_escolaridad;
		}
		if($ultima->personas_cargo!=""){
			$this->_view->personas_cargo = $ultima->personas_cargo;
		}
		if($ultima->cargo!=""){
			$this->_view->cargo = $ultima->cargo;
		}
		if($ultima->tipo_vivienda!=""){
			$this->_view->tipo_vivienda = $ultima->tipo_vivienda;
		}
		if($ultima->ciiu!=""){
			$this->_view->ciiu = $ultima->ciiu;
		}
		if($ultima->estrato!=""){
			$this->_view->estrato = $ultima->estrato;
		}
		if($ultima->fecha_nacimiento!=""){
			$this->_view->fecha_nacimiento = $ultima->fecha_nacimiento;
		}
		if($ultima->fecha_documento!=""){
			$this->_view->fecha_documento = $ultima->fecha_documento;
		}
		if($ultima->celular!=""){
			$this->_view->celular = $ultima->celular;
		}
		if($ultima->ciudad_oficina!=""){
			$this->_view->ciudad_oficina = $ultima->ciudad_oficina;
		}
		if($ultima->ciudad_documento!=""){
			$this->_view->ciudad_documento = $ultima->ciudad_documento;
		}
		if($ultima->cuenta_numero!=""){
			$this->_view->cuenta_numero = $ultima->cuenta_numero;
		}
		if($ultima->cuenta_tipo!=""){
			$this->_view->cuenta_tipo = $ultima->cuenta_tipo;
		}
		if($ultima->entidad_bancaria!=""){
			$this->_view->entidad_bancaria = $ultima->entidad_bancaria;
		}
		if($ultima->ocupacion!=""){
			$this->_view->ocupacion = $ultima->ocupacion;
		}
		if($ultima->estado_civil!=""){
			$this->_view->estado_civil = $ultima->estado_civil;
		}
		if($ultima->peso!=""){
			$this->_view->peso = $ultima->peso;
		}
		if($ultima->estatura!=""){
			$this->_view->estatura = $ultima->estatura;
		}
		if($ultima->conyuge_nombre!=""){
			$this->_view->conyuge_nombre = $ultima->conyuge_nombre;
		}
		if($ultima->conyuge_telefono!=""){
			$this->_view->conyuge_telefono = $ultima->conyuge_telefono;
		}
		if($ultima->conyuge_celular!=""){
			$this->_view->conyuge_celular = $ultima->conyuge_celular;
		}
		if($ultima->nomenclatura1!=""){
			$this->_view->nomenclatura1 = $ultima->nomenclatura1;
		}
		if($ultima->nomenclatura2!=""){
			$this->_view->nomenclatura2 = $ultima->nomenclatura2;
		}


		if($codeudor->nombres!=""){
			$this->_view->nombres = $codeudor->nombres;
		}
		if($codeudor->nombres2!=""){
			$this->_view->nombres2 = $codeudor->nombres2;
		}
		if($codeudor->apellido1!=""){
			$this->_view->apellido1 = $codeudor->apellido1;
		}
		if($codeudor->apellido2!=""){
			$this->_view->apellido2 = $codeudor->apellido2;
		}
		if($codeudor->sexo!=""){
			$this->_view->sexo = $codeudor->sexo;
		}
		if($codeudor->direccion_residencia!=""){
			$this->_view->direccion_residencia = $codeudor->direccion_residencia;
		}
		if($codeudor->telefono!=""){
			$this->_view->telefono = $codeudor->telefono;
		}
		if($codeudor->barrio!=""){
			$this->_view->barrio = $codeudor->barrio;
		}
		if($codeudor->ciudad_residencia!=""){
			$this->_view->ciudad_residencia = $codeudor->ciudad_residencia;
		}
		if($codeudor->correo_empresarial!=""){
			$this->_view->correo_empresarial = $codeudor->correo_empresarial;
		}
		if($codeudor->correo!=""){
			$this->_view->correo_personal = $codeudor->correo;
		}
		if($codeudor->tipo_documento!=""){
			$this->_view->tipo_documento = $codeudor->tipo_documento;
		}
		if($codeudor->empresa!=""){
			$this->_view->empresa = $codeudor->empresa;
		}
		if($codeudor->dependencia!=""){
			$this->_view->dependencia = $codeudor->dependencia;
		}
		if($codeudor->direccion_oficina!=""){
			$this->_view->direccion_oficina = $codeudor->direccion_oficina;
		}
		if($codeudor->telefono_oficina!=""){
			$this->_view->telefono_oficina = $codeudor->telefono_oficina;
		}
		if($codeudor->situacion_laboral!=""){
			$this->_view->situacion_laboral = $codeudor->situacion_laboral;
		}
		if($codeudor->cual!=""){
			$this->_view->cual = $codeudor->cual;
		}
		if($codeudor->declara_renta!=""){
			$this->_view->declara_renta = $codeudor->declara_renta;
		}
		if($codeudor->persona_publica!=""){
			$this->_view->persona_publica = $codeudor->persona_publica;
		}
		if($codeudor->fecha_nacimiento!=""){
			$this->_view->fecha_nacimiento = $codeudor->fecha_nacimiento;
		}
		if($codeudor->fecha_documento!=""){
			$this->_view->fecha_documento = $codeudor->fecha_documento;
		}
		if($codeudor->celular!=""){
			$this->_view->celular = $codeudor->celular;
		}
		if($codeudor->ciudad_oficina!=""){
			$this->_view->ciudad_oficina = $codeudor->ciudad_oficina;
		}
		if($codeudor->ciudad_documento!=""){
			$this->_view->ciudad_documento = $codeudor->ciudad_documento;
		}
		if($codeudor->cuenta_numero!=""){
			$this->_view->cuenta_numero = $codeudor->cuenta_numero;
		}
		if($codeudor->cuenta_tipo!=""){
			$this->_view->cuenta_tipo = $codeudor->cuenta_tipo;
		}
		if($codeudor->entidad_bancaria!=""){
			$this->_view->entidad_bancaria = $codeudor->entidad_bancaria;
		}
		if($codeudor->ocupacion!=""){
			$this->_view->ocupacion = $codeudor->ocupacion;
		}
		if($codeudor->estado_civil!=""){
			$this->_view->estado_civil = $codeudor->estado_civil;
		}
		if($codeudor->peso!=""){
			$this->_view->peso = $codeudor->peso;
		}
		if($codeudor->estatura!=""){
			$this->_view->estatura = $codeudor->estatura;
		}
		if($codeudor->conyuge_nombre!=""){
			$this->_view->conyuge_nombre = $codeudor->conyuge_nombre;
		}
		if($codeudor->conyuge_telefono!=""){
			$this->_view->conyuge_telefono = $codeudor->conyuge_telefono;
		}
		if($codeudor->conyuge_celular!=""){
			$this->_view->conyuge_celular = $codeudor->conyuge_celular;
		}
		if($codeudor->nomenclatura1!=""){
			$this->_view->nomenclatura1 = $codeudor->nomenclatura1;
		}
		if($codeudor->nomenclatura2!=""){
			$this->_view->nomenclatura2 = $codeudor->nomenclatura2;
		}
		//parametros


		$infopatrimonialModel = new Administracion_Model_DbTable_Infopatrimonial();

		//info patrimonial
		$concepto = "VIVIENDA";
		$info[$concepto] = $infopatrimonialModel->getList(" solicitud='$id' AND cedula='$cedula' AND concepto='$concepto' ","")[0];
		$concepto = "OTRAS";
		$info[$concepto] = $infopatrimonialModel->getList(" solicitud='$id' AND cedula='$cedula' AND concepto='$concepto' ","")[0];
		$concepto = "HIPOTECA";
		$info[$concepto] = $infopatrimonialModel->getList(" solicitud='$id' AND cedula='$cedula' AND concepto='$concepto' ","")[0];
		$concepto = "VEHICULO";
		$info[$concepto] = $infopatrimonialModel->getList(" solicitud='$id' AND cedula='$cedula' AND concepto='$concepto' ","")[0];
		$concepto = "OTROS";
		$info[$concepto] = $infopatrimonialModel->getList(" solicitud='$id' AND cedula='$cedula' AND concepto='$concepto' ","")[0];
		$concepto = "PRENDA";
		$info[$concepto] = $infopatrimonialModel->getList(" solicitud='$id' AND cedula='$cedula' AND concepto='$concepto' ","")[0];
		$concepto = "CLASE";
		$info[$concepto] = $infopatrimonialModel->getList(" solicitud='$id' AND cedula='$cedula' AND concepto='$concepto' ","")[0];
		$concepto = "PATRIMONIO";
		$info[$concepto] = $infopatrimonialModel->getList(" solicitud='$id' AND cedula='$cedula' AND concepto='$concepto' ","")[0];
		$concepto = "TARJETAS";
		$info[$concepto] = $infopatrimonialModel->getList(" solicitud='$id' AND cedula='$cedula' AND concepto='$concepto' ","")[0];
		$concepto = "OTROS2";
		$info[$concepto] = $infopatrimonialModel->getList(" solicitud='$id' AND cedula='$cedula' AND concepto='$concepto' ","")[0];
		$concepto = "OTROS2";
		$info[$concepto] = $infopatrimonialModel->getList(" solicitud='$id' AND cedula='$cedula' AND concepto='$concepto' ","")[0];
		$concepto = "OBLIGACIONES";
		$info[$concepto] = $infopatrimonialModel->getList(" solicitud='$id' AND cedula='$cedula' AND concepto='$concepto' ","")[0];
		$concepto = "TOTALPATRIMONIAL";
		$info[$concepto] = $infopatrimonialModel->getList(" solicitud='$id' AND cedula='$cedula' AND concepto='$concepto' ","")[0];
		$this->_view->info = $info;


		//INFO FINANCIERA
		$financieraModel = new Administracion_Model_DbTable_Infofinanciera();
		$financiera = $financieraModel->getList(" solicitud='$id' AND cedula='$cedula' ","")[0];
		if(count($financiera)==0){
			$ultima_id = $ultima->id;
			$financiera = $financieraModel->getList(" solicitud='$ultima_id' AND cedula='$cedula' ","")[0];
		}
		$this->_view->financiera = $financiera;

		$infopatrimonialModel= new Administracion_Model_DbTable_Infopatrimonial();
		$concepto = "PATRIMONIO";
		$info = $infopatrimonialModel->getList(" solicitud='$id' AND cedula='$cedula' AND concepto='$concepto' ","")[0];
		$v1 = $info->v3;
		$concepto = "OBLIGACIONES";
		$info = $infopatrimonialModel->getList(" solicitud='$id' AND cedula='$cedula' AND concepto='$concepto' ","")[0];
		$v2 = $info->v3;

		$this->_view->total_obligaciones = $v1+$v2;

		$parentescoModel = new Administracion_Model_DbTable_Parentescos();
		$this->_view->parentescos = $parentescoModel->getList(""," nombre ASC ");


		$ciudadModel = new Administracion_Model_DbTable_Ciudad();
		$this->_view->ciudades = $ciudadModel->getList(""," nombre ASC ");

		$nomenclaturaModel = new Administracion_Model_DbTable_Nomenclatura();
		$this->_view->nomenclaturas = $nomenclaturas = $nomenclaturaModel->getList(""," codigo ASC ");

		$e = $this->_getSanitizedParam("e");
		$n = $this->_getSanitizedParam("n");
		$correo = $codeudor->correo;
		$hash = md5($codeudor->cedula);
		$this->_view->e = $e;
		$this->_view->hash = $hash;


		$usuarioModel = new Administracion_Model_DbTable_Usuario();
		$analista_id = $solicitud->asignado;
		$analista = $usuarioModel->getById($analista_id);

		//validar login
		//$usuario_codeudor = $usuarioModel->getList(" user_email='$correo' ","")[0];
		//$usuario_codeudor_id = $usuario_codeudor->user_id;
		if(($_SESSION['kt_login_user']!=$cedula or $cedula=="" or $_SESSION['kt_login_user']=="") and $this->_getSanitizedParam("admin")==""){
			if($_GET['mod']!="detalle_solicitud"){
				//header("Location:http://fendesa.com/sistema/?id=".$id."&e=".$e."&login_codeudor=1&n=".$n);
			}
		}
		//print_r($_SESSION);
		//echo "cedula:".$cedula;
		//validar login


		$lineaModel = new Administracion_Model_DbTable_Lineas();
		$linea = $solicitud->linea;
		$lineas = $lineaModel->getList(" codigo='$linea' "," nombre ASC ")[0];

		$hoy  = date("Y-m-d");
		$fecha_asignado = $solicitud->fecha_asignado;

		$nuevafecha = strtotime ( '+5 day' , strtotime ( $fecha_asignado ) ) ;
		$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
		$this->_view->nuevafecha = $nuevafecha;
		$this->_view->hoy = $hoy;


		$documentosModel = new Administracion_Model_DbTable_Documentos();
		$documentos = $documentosModel->getList(" solicitud = '$id' AND tipo='1' ","")[0];
		$documentos2 = $documentosModel->getList(" solicitud = '$id' AND tipo='2' ","")[0];
		//print_r($documentos2);
		if($n=="2"){
			$documentos2 = $documentosModel->getList(" solicitud = '$id' AND tipo='3' ","")[0];
		}
		//$this->_view->documentos = $documentos;
		$this->_view->documentos2 = $documentos2;

		$tabla .= '<table width="100%" border="1" cellspacing="5" cellpadding="3" class="formulario tabla_lineas">
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
		    <td align="right">'.$solicitud->nombres.' '.$solicitud->nombres2.' '.$solicitud->apellido1.' '.$solicitud->apellido2.'</td>
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

		$saldo = $solicitud->valor_desembolso-$solicitud->valor;

		$tabla.='
		  <tr>
		    <td><strong>Valor solicitado</strong></td>
		    <td align="right">$'.$this->formato_pesos($solicitud->valor).'</td>
		  </tr>
		  <tr>
		    <td><strong>Recoge créditos?</strong></td>
		    <td align="right">'.$valida[$solicitud->recoger_credito].'</td>
		  </tr>';

		// if($solicitud->recoger_credito=="1"){
		// 	$tabla.='
		// 	  <tr>
		// 	    <td><strong>Créditos recogidos</strong></td>
		// 	    <td align="right">'.$solicitud->numeros_recogidos.'</td>
		// 	  </tr>
		// 	  <tr>
		// 	    <td><strong>Total saldo recogidos</strong></td>
		// 	    <td align="right">$'.$saldo.'</td>
		// 	  </tr>';
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
		    <td><strong>Fecha solicitud</strong></td>
		    <td align="right">'.$solicitud->fecha_asignado.'</td>
		  </tr>';

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

		$this->_view->tabla = $tabla;



	}

	public function guardarAction(){

		$id = $this->_getSanitizedParam("id");
		$n = $this->_getSanitizedParam("n");
		if($n==""){
			$n=1;
		}
		$codeudorModel = new Administracion_Model_DbTable_Codeudor();
		$codeudorModel->borrarn($id,$n);

		//$salario = $this->sin_puntos($salario);

		//$conyuge_nombre = $this->limpiar2($conyuge_nombre);
		//$conyuge_telefono = $this->limpiar2($conyuge_telefono);
		//$conyuge_celular = $this->limpiar2($conyuge_celular);
		//$direccion_residencia = $this->limpiar2($direccion_residencia);

		extract($_POST);

		$data['solicitud']= $solicitud = $id;
		$data['nombres']=$nombres;
		$data['nombres2']=$nombres2;
		$data['apellido1']=$apellido1;
		$data['apellido2']=$apellido2;
		$data['cedula']=$documento;
		$data['ciudad_documento']=$ciudad_documento;
		$data['empresa']=$empresa;
		$data['dependencia']=$dependencia;
		$data['cargo']=$cargo;
		$data['ciudad']=$ciudad;
		$data['telefono']=$telefono;
		$data['celular']=$celular;
		$data['salario']=$salario;
		$data['forma_pago']=$forma_pago;
		$data['tiempo_anio']=$tiempo_anio;
		$data['tiempo_meses']=$tiempo_meses;
		$data['correo']=$correo;
		$data['asociado']=$asociado;
		$data['fecha_nacimiento']=$fecha_nacimiento;
		$data['fecha_documento']=$fecha_documento;
		$data['tipo_documento']=$tipo_documento;
		$data['sexo']=$sexo;
		$data['direccion_oficina']=$direccion_oficina;
		$data['telefono_oficina']=$telefono_oficina;
		$data['ciudad_oficina']=$ciudad_oficina;
		$data['direccion_residencia']=$direccion_residencia;
		$data['barrio']=$barrio;
		$data['ciudad_residencia']=$ciudad_residencia;
		$data['correo_empresarial']=$correo_empresarial;
		$data['situacion_laboral']=$situacion_laboral;
		$data['cual']=$cual;
		$data['estado_civil']=$estado_civil;
		$data['declara_renta']=$declara_renta;
		$data['persona_publica']=$persona_publica;
		$data['cuenta_numero']=$cuenta_numero;
		$data['cuenta_tipo']=$cuenta_tipo;
		$data['entidad_bancaria']=$entidad_bancaria;
		$data['conyuge_nombre']=$conyuge_nombre;
		$data['conyuge_telefono']=$conyuge_telefono;
		$data['conyuge_celular']=$conyuge_celular;
		$data['nomenclatura1']=$nomenclatura1;
		$data['nomenclatura2']=$nomenclatura2;
		$data['codeudor_numero']=$n;
		$id=$codeudorModel->insert($data);
		$codeudorModel->editField($id,"nivel_escolaridad",$nivel_escolaridad);
		$codeudorModel->editField($id,"estrato",$estrato);
		$codeudorModel->editField($id,"ciiu",$ciiu);
		$codeudorModel->editField($id,"personas_cargo",$personas_cargo);
		$codeudorModel->editField($id,"tipo_vivienda",$tipo_vivienda);

		//archivos codeudor
			$tipo=2;
			if($n=="2"){
				$tipo=3;
			}
			$uploadImage =  new Core_Model_Upload_Image();
			$documentosModel = new Administracion_Model_DbTable_Documentos();
			//print_r($_FILES);

			if($_FILES['cedula2']['name'] != ''){
				$archivo = $uploadImage->upload("cedula2");
				$documentosModel->editar('cedula',$archivo,$solicitud,$tipo);
			}
			if($_FILES['desprendible_pagoB']['name'] != ''){
				$archivo = $uploadImage->upload("desprendible_pagoB");
				$documentosModel->editar('desprendible_pago',$archivo,$solicitud,$tipo);
			}
			if($_FILES['desprendible_pagoB2']['name'] != ''){
				$archivo = $uploadImage->upload("desprendible_pagoB2");
				$documentosModel->editar('desprendible_pago2',$archivo,$solicitud,$tipo);
			}
			if($_FILES['desprendible_pagoB3']['name'] != ''){
				$archivo = $uploadImage->upload("desprendible_pagoB3");
				$documentosModel->editar('desprendible_pago3',$archivo,$solicitud,$tipo);
			}
			if($_FILES['desprendible_pagoB4']['name'] != ''){
				$archivo = $uploadImage->upload("desprendible_pagoB4");
				$documentosModel->editar('desprendible_pago4',$archivo,$solicitud,$tipo);
			}
			if($_FILES['certificado_laboral2']['name'] != ''){
				$archivo = $uploadImage->upload("certificado_laboral2");
				$documentosModel->editar('certificado_laboral',$archivo,$solicitud,$tipo);
			}
			if($_FILES['otros_ingresos2']['name'] != ''){
				$archivo = $uploadImage->upload("otros_ingresos2");
				$documentosModel->editar('otros_ingresos',$archivo,$solicitud,$tipo);
			}
			if($_FILES['certificado_tradicionB']['name'] != ''){
				$archivo = $uploadImage->upload("certificado_tradicionB");
				$documentosModel->editar('certificado_tradicion',$archivo,$solicitud,$tipo);
			}
			if($_FILES['estado_obligacionB']['name'] != ''){
				$archivo = $uploadImage->upload("estado_obligacionB");
				$documentosModel->editar('estado_obligacion',$archivo,$solicitud,$tipo);
			}
			if($_FILES['estado_obligacion2B']['name'] != ''){
				$archivo = $uploadImage->upload("estado_obligacion2B");
				$documentosModel->editar('estado_obligacion2',$archivo,$solicitud,$tipo);
			}
			if($_FILES['estado_obligacion3B']['name'] != ''){
				$archivo = $uploadImage->upload("estado_obligacion3B");
				$documentosModel->editar('estado_obligacion3',$archivo,$solicitud,$tipo);
			}
			if($_FILES['factura_proformaB']['name'] != ''){
				$archivo = $uploadImage->upload("factura_proformaB");
				$documentosModel->editar('factura_proforma',$archivo,$solicitud,$tipo);
			}
			if($_FILES['recibo_matriculaB']['name'] != ''){
				$archivo = $uploadImage->upload("recibo_matriculaB");
				$documentosModel->editar('recibo_matricula',$archivo,$solicitud,$tipo);
			}
		//archivos codeudor


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

	public function formato_pesos($x){
		$res = number_format($x,0,',','.');
		return $res;
	}


}