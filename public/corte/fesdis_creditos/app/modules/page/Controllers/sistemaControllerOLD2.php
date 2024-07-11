<?php

/**
*
*/

class Page_sistemaController extends Page_mainController
{

	public function indexAction()
	{
		$this->_view->seccion = 1;
		$this->_view->contenidos = $this->template->getContent(1);

		$header = $this->_view->getRoutPHP('modules/page/Views/partials/botonera.php');
		$this->getLayout()->setData("header",$header);

		$lineaModel = new Administracion_Model_DbTable_Lineas();
		$this->_view->lineas = $lineaModel->getList(" activo='1' "," codigo*1 ASC ");

		$this->_view->linea = $linea_id = $this->_getSanitizedParam("linea");

		$gestoresModel = new Administracion_Model_DbTable_Gestores();
		$this->_view->gestores = $gestores = $gestoresModel->getList(" activo='1' "," nombre ASC ");

		$usuarioModel = new Administracion_Model_DbTable_Usuario();
		$user_id = $_SESSION['kt_login_id'];
		$usuario = $usuarioModel->getById($user_id);

		$hoy = date("Y-m-d");
		$ultima_actualizacion = $usuario->user_password_fecha;
		$fecha_vencimiento = date("Y-m-d",strtotime($ultima_actualizacion."+ 6 months"));
		if($hoy > $fecha_vencimiento or $ultima_actualizacion==""){
			header("Location: /page/sistema/perfil/?actualizar=1");
		}


		//paso1
		$cedula = $usuario->user_user;
		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$ultima = $solicitudModel->getList(" cedula='$cedula' AND paso='8' "," id DESC ")[0];
		$ultima_id = $ultima->id;

		if($ultima->nombres!=""){
			$this->_view->nombres = $ultima->nombres;
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
		if($ultima->tipo_vivienda!=""){
			$this->_view->tipo_vivienda = $ultima->tipo_vivienda;
		}
		if($ultima->fecha_ingreso!=""){
			$this->_view->fecha_ingreso = $ultima->fecha_ingreso;
		}
		if($ultima->cargo!=""){
			$this->_view->cargo = $ultima->cargo;
		}
		if($ultima->fecha_afiliacion!=""){
			$this->_view->fecha_afiliacion = $ultima->fecha_afiliacion;
		}
		if($ultima->personas_cargo!=""){
			$this->_view->personas_cargo = $ultima->personas_cargo;
		}
		if($ultima->numero_hijos!=""){
			$this->_view->numero_hijos = $ultima->numero_hijos;
		}
		if($ultima->nomenclatura1!=""){
			$this->_view->nomenclatura1 = $ultima->nomenclatura1;
		}
		if($ultima->nomenclatura2!=""){
			$this->_view->nomenclatura2 = $ultima->nomenclatura2;
		}
		//paso1

		//paso4
		$referenciasModel = new Administracion_Model_DbTable_Referencias();
		$referencias['1'] = $referenciasModel->getList(" solicitud='$id' AND numero='1' ","")[0];
		if(!$referencias['1']->id>0){
			$referencias['1'] = $referenciasModel->getList(" solicitud='$ultima_id' AND numero='1' ","")[0];
		}
		$referencias['2'] = $referenciasModel->getList(" solicitud='$id' AND numero='2' ","")[0];
		if(!$referencias['2']->id>0){
			$referencias['2'] = $referenciasModel->getList(" solicitud='$ultima_id' AND numero='2' ","")[0];
		}
		$referencias['3'] = $referenciasModel->getList(" solicitud='$id' AND numero='3' ","")[0];
		if(!$referencias['3']->id>0){
			$referencias['3'] = $referenciasModel->getList(" solicitud='$ultima_id' AND numero='3' ","")[0];
		}
		$referencias['4'] = $referenciasModel->getList(" solicitud='$id' AND numero='4' ","")[0];
		if(!$referencias['4']->id>0){
			$referencias['4'] = $referenciasModel->getList(" solicitud='$ultima_id' AND numero='4' ","")[0];
		}
		$this->_view->referencias = $referencias;
		//paso4

	}

	public function guardarsolicitudAction()
	{
		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$data['paso']=1;
		$data['cedula']= $this->_getSanitizedParam("cedula");
		$data['linea']= $this->_getSanitizedParam("linea");
		$data['valor']= $this->_getSanitizedParam("valor");
		$data['cuotas']= $this->_getSanitizedParam("cuotas")*1;
		$data['tasa']= $this->_getSanitizedParam("tasa");
		$data['fecha']= date("Y-m-d H:i:s");
		$data['validacion']= 0;
		$data['radicacion']= "";
		$data['cuotas_extra']= $this->_getSanitizedParam("cuotas_extra")*1;
		$data['valor_extra']= $this->_getSanitizedParam("valor_extra")*1;
		$data['valor_cuota']= $this->_getSanitizedParam("valor_cuota")*1;
		$data['destino']= $this->_getSanitizedParam("destino");
		$data['observaciones']= $this->_getSanitizedParam("observaciones");
		$data['tramite']= $this->_getSanitizedParam("tramite");
		$data['gestor_comercial']= $this->_getSanitizedParam("gestor_comercial");
		$data['monto_solicitado']= $this->_getSanitizedParam("monto_solicitado");
		$data['valor_desembolso']= $this->_getSanitizedParam("valor");
		$data['linea_desembolso']= $this->_getSanitizedParam("linea");
		$data['cuotas_desembolso']= $this->_getSanitizedParam("cuotas");
		$data['valor_cuota_desembolso']= $this->_getSanitizedParam("valor_cuota");
		$data['tasa_desembolso']= $this->_getSanitizedParam("tasa");
		$data['cuotas_extra_desembolso']= $this->_getSanitizedParam("cuotas_extra")*1;
		$data['valor_extra_desembolso']= $this->_getSanitizedParam("valor_extra")*1;
		$data['frecuencia']= $this->_getSanitizedParam("frecuencia")*1;


		if($data['cedula']!=""){
			$id = $solicitudModel->insert2($data);
			if($id>0){
				//echo "ENTRO - ".$id;
				header("Location: /page/sistema/paso1/?id=".$id);
			}else{
				header("Location: /page/sistema/");
			}
		}else{
			header("Location: /page/sistema/");
		}


	}

	public function paso1Action()
	{
		$this->_view->seccion = 1;
		$this->_view->contenidos = $this->template->getContent(1);
		$header = $this->_view->getRoutPHP('modules/page/Views/partials/botonera.php');
		$this->getLayout()->setData("header",$header);

		$id = $this->_getSanitizedParam("id");
		$this->_view->numero = str_pad($id,6,"0",STR_PAD_LEFT);

		$bancosModel = new Administracion_Model_DbTable_Bancos();
		$this->_view->bancos = $bancosModel->getList(""," nombre ASC ");

		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$solicitud = $solicitudModel->getById($id);

		$usuarioModel = new Administracion_Model_DbTable_Usuario();
		$user = $usuarioModel->getById($_SESSION['kt_login_id']);

		$nomenclaturaModel = new Administracion_Model_DbTable_Nomenclatura();
		$this->_view->nomenclaturas = $nomenclaturas = $nomenclaturaModel->getList(""," codigo ASC ");

		$ciudadModel = new Administracion_Model_DbTable_Ciudad();
		$this->_view->ciudades = $ciudadModel->getList(""," nombre ASC ");

		//parametros
		$aux = explode(" ",$user->user_names);
		$this->_view->apellido1 = $aux[0];
		$this->_view->apellido2 = $aux[1];
		$this->_view->nombres = $aux[2];
		$this->_view->nombres2 = $aux[3];
		$this->_view->direccion_residencia = $user->direccion;
		$this->_view->telefono = $user->telefono;
		$this->_view->barrio = $user->barrio;
		$this->_view->ciudad_residencia = $user->ciudad_residencia;
		$this->_view->correo_empresarial = $user->correo;
		$this->_view->correo_personal = $user->correo;
		$this->_view->fecha_nacimiento = $user->fecha_nacimiento;
		$this->_view->celular = $user->celular;
		$this->_view->ciudad_documento = $user->ciudad_documento;

		$cedula = $_SESSION['kt_login_user'];
		if($this->_getSanitizedParam("usuario")!=""){
			$cedula = $this->_getSanitizedParam("usuario");
		}
		if($this->_getSanitizedParam("paso")=="4"){
			$cedula = $codeudor->cedula;
		}

		$this->_view->documento = $cedula;

		$ultima = $solicitudModel->getList(" cedula='$cedula' AND paso='8' "," id DESC ")[0];

		if($ultima->nombres!=""){
			$this->_view->nombres = $ultima->nombres;
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
		if($ultima->tipo_vivienda!=""){
			$this->_view->tipo_vivienda = $ultima->tipo_vivienda;
		}
		if($ultima->fecha_ingreso!=""){
			$this->_view->fecha_ingreso = $ultima->fecha_ingreso;
		}
		if($ultima->cargo!=""){
			$this->_view->cargo = $ultima->cargo;
		}
		if($ultima->fecha_afiliacion!=""){
			$this->_view->fecha_afiliacion = $ultima->fecha_afiliacion;
		}
		if($ultima->personas_cargo!=""){
			$this->_view->personas_cargo = $ultima->personas_cargo;
		}
		if($ultima->numero_hijos!=""){
			$this->_view->numero_hijos = $ultima->numero_hijos;
		}
		if($ultima->nomenclatura1!=""){
			$this->_view->nomenclatura1 = $ultima->nomenclatura1;
		}
		if($ultima->nomenclatura2!=""){
			$this->_view->nomenclatura2 = $ultima->nomenclatura2;
		}



		if($solicitud->nombres!=""){
			$this->_view->nombres = $solicitud->nombres;
		}
		if($solicitud->apellido1!=""){
			$this->_view->apellido1 = $solicitud->apellido1;
		}
		if($solicitud->apellido2!=""){
			$this->_view->apellido2 = $solicitud->apellido2;
		}
		if($solicitud->sexo!=""){
			$this->_view->sexo = $solicitud->sexo;
		}
		if($solicitud->direccion_residencia!=""){
			$this->_view->direccion_residencia = $solicitud->direccion_residencia;
		}
		if($solicitud->telefono!=""){
			$this->_view->telefono = $solicitud->telefono;
		}
		if($solicitud->barrio!=""){
			$this->_view->barrio = $solicitud->barrio;
		}
		if($solicitud->ciudad_residencia!=""){
			$this->_view->ciudad_residencia = $solicitud->ciudad_residencia;
		}
		if($solicitud->correo_empresarial!=""){
			$this->_view->correo_empresarial = $solicitud->correo_empresarial;
		}
		if($solicitud->correo_personal!=""){
			$this->_view->correo_personal = $solicitud->correo_personal;
		}
		if($solicitud->tipo_documento!=""){
			$this->_view->tipo_documento = $solicitud->tipo_documento;
		}
		if($solicitud->empresa!=""){
			$this->_view->empresa = $solicitud->empresa;
		}
		if($solicitud->dependencia!=""){
			$this->_view->dependencia = $solicitud->dependencia;
		}
		if($solicitud->direccion_oficina!=""){
			$this->_view->direccion_oficina = $solicitud->direccion_oficina;
		}
		if($solicitud->telefono_oficina!=""){
			$this->_view->telefono_oficina = $solicitud->telefono_oficina;
		}
		if($solicitud->situacion_laboral!=""){
			$this->_view->situacion_laboral = $solicitud->situacion_laboral;
		}
		if($solicitud->cual!=""){
			$this->_view->cual = $solicitud->cual;
		}
		if($solicitud->declara_renta!=""){
			$this->_view->declara_renta = $solicitud->declara_renta;
		}
		if($solicitud->persona_publica!=""){
			$this->_view->persona_publica = $solicitud->persona_publica;
		}
		if($solicitud->fecha_nacimiento!=""){
			$this->_view->fecha_nacimiento = $solicitud->fecha_nacimiento;
		}
		if($solicitud->fecha_documento!=""){
			$this->_view->fecha_documento = $solicitud->fecha_documento;
		}
		if($solicitud->celular!=""){
			$this->_view->celular = $solicitud->celular;
		}
		if($solicitud->ciudad_oficina!=""){
			$this->_view->ciudad_oficina = $solicitud->ciudad_oficina;
		}
		if($solicitud->ciudad_documento!=""){
			$this->_view->ciudad_documento = $solicitud->ciudad_documento;
		}
		if($solicitud->cuenta_numero!=""){
			$this->_view->cuenta_numero = $solicitud->cuenta_numero;
		}
		if($solicitud->cuenta_tipo!=""){
			$this->_view->cuenta_tipo = $solicitud->cuenta_tipo;
		}
		if($solicitud->entidad_bancaria!=""){
			$this->_view->entidad_bancaria = $solicitud->entidad_bancaria;
		}
		if($solicitud->ocupacion!=""){
			$this->_view->ocupacion = $solicitud->ocupacion;
		}
		if($solicitud->estado_civil!=""){
			$this->_view->estado_civil = $solicitud->estado_civil;
		}
		if($solicitud->peso!=""){
			$this->_view->peso = $solicitud->peso;
		}
		if($solicitud->estatura!=""){
			$this->_view->estatura = $solicitud->estatura;
		}
		if($solicitud->conyuge_nombre!=""){
			$this->_view->conyuge_nombre = $solicitud->conyuge_nombre;
		}
		if($solicitud->conyuge_telefono!=""){
			$this->_view->conyuge_telefono = $solicitud->conyuge_telefono;
		}
		if($solicitud->conyuge_celular!=""){
			$this->_view->conyuge_celular = $solicitud->conyuge_celular;
		}
		if($solicitud->tipo_vivienda!=""){
			$this->_view->tipo_vivienda = $solicitud->tipo_vivienda;
		}
		if($solicitud->fecha_ingreso!=""){
			$this->_view->fecha_ingreso = $solicitud->fecha_ingreso;
		}
		if($solicitud->cargo!=""){
			$this->_view->cargo = $solicitud->cargo;
		}
		if($solicitud->fecha_afiliacion!=""){
			$this->_view->fecha_afiliacion = $solicitud->fecha_afiliacion;
		}
		if($solicitud->personas_cargo!=""){
			$this->_view->personas_cargo = $solicitud->personas_cargo;
		}
		if($solicitud->numero_hijos!=""){
			$this->_view->numero_hijos = $solicitud->numero_hijos;
		}
		if($solicitud->nomenclatura1!=""){
			$this->_view->nomenclatura1 = $solicitud->nomenclatura1;
		}
		if($solicitud->nomenclatura2!=""){
			$this->_view->nomenclatura2 = $solicitud->nomenclatura2;
		}
		//parametros



	}

	public function paso2Action()
	{
		$this->_view->seccion = 1;
		$this->_view->contenidos = $this->template->getContent(1);
		$header = $this->_view->getRoutPHP('modules/page/Views/partials/botonera.php');
		$this->getLayout()->setData("header",$header);

		$id = $this->_getSanitizedParam("id");
		$this->_view->id = $id;
		$this->_view->numero = str_pad($id,6,"0",STR_PAD_LEFT);

		$bancosModel = new Administracion_Model_DbTable_Bancos();
		$this->_view->bancos = $bancosModel->getList(""," nombre ASC ");

		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$solicitud = $solicitudModel->getById($id);

		$usuarioModel = new Administracion_Model_DbTable_Usuario();
		$user = $usuarioModel->getById($_SESSION['kt_login_id']);



		$cedula = $_SESSION['kt_login_user'];
		if($this->_getSanitizedParam("usuario")!=""){
			$cedula = $this->_getSanitizedParam("usuario");
		}

		$this->_view->documento = $cedula;



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


	}

	public function blancoAction(){
		$header = "";
		$this->getLayout()->setData("header",$header);
	}

	public function requisitospersonalAction(){

		$header = "";
		$this->getLayout()->setData("header",$header);

	}

	public function fondomutualAction()
	{

		$header = "";
		$this->getLayout()->setData("header",$header);

		$id = $this->_getSanitizedParam("id");
		$this->_view->numero = str_pad($id,6,"0",STR_PAD_LEFT);
		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$solicitud = $solicitudModel->getById($id);
		$this->_view->solicitud = $solicitud;

		$valor = $solicitud->valor;
		$this->_view->valor_garantia = $valor*2/100;

	}

	public function codeudorAction()
	{

		$header = "";
		$this->getLayout()->setData("header",$header);

		$id = $this->_getSanitizedParam("id");
		$this->_view->numero = str_pad($id,6,"0",STR_PAD_LEFT);

		$bancosModel = new Administracion_Model_DbTable_Bancos();
		$this->_view->bancos = $bancosModel->getList(""," nombre ASC ");

		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$solicitud = $solicitudModel->getById($id);

		$codeudorModel = new Administracion_Model_DbTable_Codeudor();
		$codeudor = $codeudorModel->getList(" solicitud='$id' ","")[0];
		$cedula = $codeudor->cedula;

		$this->_view->documento = $cedula;

		$ultima = $codeudorModel->getList(" cedula='$cedula' "," id DESC ")[0];

		if($ultima->nombres!=""){
			$this->_view->nombres = $ultima->nombres;
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
		if($codeudor->correo_personal!=""){
			$this->_view->correo_personal = $codeudor->correo_personal;
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


	}


	public function paso3Action()
	{
		$this->_view->seccion = 1;
		$this->_view->contenidos = $this->template->getContent(1);
		$header = $this->_view->getRoutPHP('modules/page/Views/partials/botonera.php');
		$this->getLayout()->setData("header",$header);

		$id = $this->_getSanitizedParam("id");
		$this->_view->id = $id;
		$this->_view->numero = str_pad($id,6,"0",STR_PAD_LEFT);

		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$solicitud = $solicitudModel->getById($id);

		$cedula = $_SESSION['kt_login_user'];
		if($this->_getSanitizedParam("usuario")!=""){
			$cedula = $this->_getSanitizedParam("usuario");
		}
		if($this->_getSanitizedParam("paso")=="4"){
			$cedula = $codeudor->cedula;
		}

		$cedula = $solicitud->cedula;

		$ultima = $solicitudModel->getList(" cedula='$cedula' AND paso='8' "," id DESC ")[0];

		if($solicitud->descripcion_ingresos==""){
			$solicitud->descripcion_ingresos = $ultima->descripcion_ingresos;
		}
		if($solicitud->descripcion_recursos==""){
			$solicitud->descripcion_recursos = $ultima->descripcion_recursos;
		}

		$this->_view->solicitud = $solicitud;


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

	}


	public function paso4Action()
	{

		$this->_view->seccion = 1;
		$this->_view->contenidos = $this->template->getContent(1);
		$header = $this->_view->getRoutPHP('modules/page/Views/partials/botonera.php');
		$this->getLayout()->setData("header",$header);

		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$id = $this->_getSanitizedParam("id");
		$this->_view->id = $id;
		$this->_view->numero = str_pad($id,6,"0",STR_PAD_LEFT);
		$solicitud = $solicitudModel->getById($id);
		$paso = $this->_getSanitizedParam("paso");

		$cedula = $solicitud->cedula;
		$ultima = $solicitudModel->getList(" cedula='$cedula' AND paso='8' "," id DESC ")[0];
		$ultima_id = $ultima->id;

		$referenciasModel = new Administracion_Model_DbTable_Referencias();
		$referencias['1'] = $referenciasModel->getList(" solicitud='$id' AND numero='1' ","")[0];
		if(!$referencias['1']->id>0){
			$referencias['1'] = $referenciasModel->getList(" solicitud='$ultima_id' AND numero='1' ","")[0];
		}
		$referencias['2'] = $referenciasModel->getList(" solicitud='$id' AND numero='2' ","")[0];
		if(!$referencias['2']->id>0){
			$referencias['2'] = $referenciasModel->getList(" solicitud='$ultima_id' AND numero='2' ","")[0];
		}
		$referencias['3'] = $referenciasModel->getList(" solicitud='$id' AND numero='3' ","")[0];
		if(!$referencias['3']->id>0){
			$referencias['3'] = $referenciasModel->getList(" solicitud='$ultima_id' AND numero='3' ","")[0];
		}
		$referencias['4'] = $referenciasModel->getList(" solicitud='$id' AND numero='4' ","")[0];
		if(!$referencias['4']->id>0){
			$referencias['4'] = $referenciasModel->getList(" solicitud='$ultima_id' AND numero='4' ","")[0];
		}
		$this->_view->referencias = $referencias;

		$parentescoModel = new Administracion_Model_DbTable_Parentescos();
		$this->_view->parentescos = $parentescoModel->getList(""," nombre ASC ");


		$ciudadModel = new Administracion_Model_DbTable_Ciudad();
		$this->_view->ciudades = $ciudadModel->getList(""," nombre ASC ");

		$nomenclaturaModel = new Administracion_Model_DbTable_Nomenclatura();
		$this->_view->nomenclaturas = $nomenclaturas = $nomenclaturaModel->getList(""," codigo ASC ");

	}

	public function paso5Action()
	{

		$this->_view->seccion = 1;
		$this->_view->contenidos = $this->template->getContent(1);
		$header = $this->_view->getRoutPHP('modules/page/Views/partials/botonera.php');
		$this->getLayout()->setData("header",$header);

		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$id = $this->_getSanitizedParam("id");
		$this->_view->id = $id;
		$this->_view->numero = str_pad($id,6,"0",STR_PAD_LEFT);
		$solicitud = $solicitudModel->getById($id);
		$this->_view->solicitud = $solicitud;
		$paso = $this->_getSanitizedParam("paso");

		$cedula = $solicitud->cedula;
		$ultima = $solicitudModel->getList(" cedula='$cedula' AND paso='8' "," id DESC ")[0];
		$ultima_id = $ultima->id;

		$garantialineaModel = new Administracion_Model_DbTable_Garantialinea();
		$filtro_garantias = " ( 1=0 ";
		$codigo = $solicitud->linea;
		$garantialinea = $garantialineaModel->getList(" gl_linea_id='$codigo' ","");
		foreach ($garantialinea as $key => $value) {
			$garantia_id = $value->gl_garantia_id;
			$filtro_garantias.= " OR garantia_id = '$garantia_id'  ";
		}
		$filtro_garantias .= " )";
		$this->_view->array_garantias = $array_garantias;

		$garantiasModel = new Administracion_Model_DbTable_Garantias();
		$this->_view->garantias = $garantiasModel->getList(" 1=1 AND $filtro_garantias "," garantia_nombre ASC ");

	}

	public function paso6Action()
	{

		$this->_view->seccion = 1;
		$this->_view->contenidos = $this->template->getContent(1);
		$header = $this->_view->getRoutPHP('modules/page/Views/partials/botonera.php');
		$this->getLayout()->setData("header",$header);

		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$id = $this->_getSanitizedParam("id");
		$this->_view->id = $id;
		$this->_view->numero = str_pad($id,6,"0",STR_PAD_LEFT);
		$solicitud = $solicitudModel->getById($id);
		$this->_view->solicitud = $solicitud;
		$paso = $this->_getSanitizedParam("paso");

		$linea = $solicitud->linea;
		$lineaModel = new Administracion_Model_DbTable_Lineas();
		$this->_view->linea = $lineaModel->getById($linea);

		$documentosModel = new Administracion_Model_DbTable_Documentos();
		$documentos = $documentosModel->getList(" solicitud = '$id' AND tipo='1' ","");
		$documentos2 = $documentosModel->getList(" solicitud = '$id' AND tipo='2' ","");
		$this->_view->documentos = $documentos;
		$this->_view->documentos2 = $documentos2;

		$cedula = $solicitud->cedula;
		$ultima = $solicitudModel->getList(" cedula='$cedula' AND paso='8' "," id DESC ")[0];
		$ultima_id = $ultima->id;



	}


	public function paso7Action()
	{

		$this->_view->seccion = 1;
		$this->_view->contenidos = $this->template->getContent(1);
		$header = $this->_view->getRoutPHP('modules/page/Views/partials/botonera.php');
		$this->getLayout()->setData("header",$header);

		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$id = $this->_getSanitizedParam("id");
		$this->_view->id = $id;
		$this->_view->numero = str_pad($id,6,"0",STR_PAD_LEFT);
		$solicitud = $solicitudModel->getById($id);
		$this->_view->solicitud = $solicitud;
		$paso = $this->_getSanitizedParam("paso");

		$linea = $solicitud->linea;
		$lineaModel = new Administracion_Model_DbTable_Lineas();
		$this->_view->linea = $lineaModel->getById($linea);

		$documentosModel = new Administracion_Model_DbTable_Documentos();
		$documentos = $documentosModel->getList(" solicitud = '$id' AND tipo='1' ","");
		$documentos2 = $documentosModel->getList(" solicitud = '$id' AND tipo='2' ","");
		$this->_view->documentos = $documentos;
		$this->_view->documentos2 = $documentos2;

		$cedula = $solicitud->cedula;
		$ultima = $solicitudModel->getList(" cedula='$cedula' AND paso='8' "," id DESC ")[0];
		$ultima_id = $ultima->id;

		$enfermedadesModel = new Administracion_Model_DbTable_Enfermedades();
		$this->_view->enfermedades = $enfermedadesModel->getList(""," id ASC ");

		$enfermedadesitemsModel = new Administracion_Model_DbTable_Enfermedadesitems();
		$enfermedadesitems = $enfermedadesitemsModel->getList(" formulario='$id' ","");
		if(count($enfermedadesitems)==0){
			$enfermedadesitems = $enfermedadesitemsModel->getList(" formulario='$ultima_id' ","");
		}

		$enfermedades_array = array();
		foreach ($enfermedadesitems as $key => $value) {
			$item = $value->enfermedad;
			$enfermedades_array[$item]=1;
		}
		$this->_view->enfermedades_array = $enfermedades_array;

		$asegurabilidadModel = new Administracion_Model_DbTable_Asegurabilidad();
		$asegurabilidad =  $asegurabilidadModel->getList(" solicitud='$id' ","");
		if(count($asegurabilidad)==0){
			$asegurabilidad = $enfermedadesitemsModel->getList(" solicitud='$ultima_id' ","");
		}
		$this->_view->asegurabilidad = $asegurabilidad;
		//print_r($asegurabilidad);

	}

	public function paso8Action()
	{

		$this->_view->seccion = 1;
		$this->_view->contenidos = $this->template->getContent(1);
		$header = $this->_view->getRoutPHP('modules/page/Views/partials/botonera.php');
		$this->getLayout()->setData("header",$header);

		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$id = $this->_getSanitizedParam("id");
		$this->_view->id = $id;
		$this->_view->numero = str_pad($id,6,"0",STR_PAD_LEFT);
		$solicitud = $solicitudModel->getById($id);
		$this->_view->solicitud = $solicitud;
		$paso = $this->_getSanitizedParam("paso");

		$id = $this->_getSanitizedParam("id");
		$this->_view->id = $id;
		$this->_view->numero = $numero = str_pad($id,6,"0",STR_PAD_LEFT);

		$emailModel = new Core_Model_Mail();
		$asunto = "Solicitud de crédito WEB".$numero."";
		$content = "";


		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$solicitud = $solicitudModel->getById($id);

		$linea = $solicitud->linea;
		$lineaModel = new Administracion_Model_DbTable_Lineas();
		$lineas = $lineaModel->getList(" codigo='$linea' ","")[0];

		$usuarioModel = new Administracion_Model_DbTable_Usuario();
		$cedula = $solicitud->cedula;
		$usuario = $usuarioModel->getList(" user_user = '$cedula' ","")[0];

		$analista_id = $solicitud->asignado;
		$analista = $usuarioModel->getById($analista_id);

		$gestor_comercial1 = $solicitud->gestor_comercial;
		$gestor_comercial = $usuarioModel->getList(" nombre = 'gestor_comercial' ","")[0];


		$tabla .= '<table width="100%" border="1" cellspacing="5" cellpadding="3" class="formulario">
		  <tr class="fondo-gris">
		    <td colspan="2"><div align="center">
		    <b>Resumen de solicitud</b></div></td>
		  </tr>
		  <tr>
		    <td><strong>Solicitud</strong></td>
		    <td>WEB'.$numero.'</td>
		  </tr>
		  <tr>
		    <td><strong>Documento</strong></td>
		    <td>'.$usuario->user_user.'</td>
		  </tr>
		  <tr>
		    <td><strong>Nombre</strong></td>
		    <td>'.$usuario->user_names.'</td>
		  </tr>
		  <tr>
		    <td><strong>Email</strong></td>
		    <td>'.$solicitud->correo_personal.'</td>
		  </tr>
		  <tr>
		    <td><strong>Celular</strong></td>
		    <td>'.$solicitud->celular.'</td>
		  </tr>
		  <tr>
		    <td><strong>Tel&eacute;fono</strong></td>
		    <td>'.$solicitud->telefono.'</td>
		  </tr>
		  <tr>
		    <td><strong>L&iacute;nea de cr&eacute;dito</strong></td>
		    <td>'.$lineas->codigo.' - '.$lineas->nombre.'&nbsp;</td>
		  </tr>';

		 if($row_rsSolicitud['destino']!=""){
			$tabla.='
			  <tr>
			    <td><strong>Destino</strong></td>
			    <td>'.$solicitud->destino.'</td>
			  </tr>
			';
		}

		/*
		<tr>
			<td><strong>Monto unificado</strong></td>
			<td>'.$this->formato_pesos($solicitud->monto_solicitado).'</td>
		</tr>
		 */

		$tabla.='
		  <tr>
		    <td><strong>Valor solicitado</strong></td>
		    <td>'.$this->formato_pesos($solicitud->valor).'</td>
		  </tr>
		  <tr>
		    <td><strong>N&uacute;mero de Cuotas</strong></td>
		    <td>'.$solicitud->cuotas.'</td>
		  </tr>
		  <tr>
		    <td><strong>Valor aproximado de cuota</strong></td>
		    <td>'.$this->formato_pesos($solicitud->valor_cuota).'</td>
		  </tr>
		  <tr>
		    <td><strong>Tasa de interes</strong></td>
		    <td>'.$solicitud->tasa.'%</td>
		  </tr>
		  <tr>
		    <td><strong>Cuotas extra</strong></td>
		    <td>'.$solicitud->cuotas_extra.'</td>
		  </tr>
		  <tr>
		    <td><strong>Valor cuota extra</strong></td>
		    <td>'.$this->formato_pesos($solicitud->valor_extra).'</td>
		  </tr>
		  <tr>
		    <td><strong>Fecha solicitud</strong></td>
		    <td>'.$solicitud->fecha_asignado.'</td>
		  </tr>';

		  if($solicitud->fecha_anterior!=""){
			$tabla.='
			  <tr>
			    <td><strong>Fecha solicitud anterior incompleta</strong></td>
			    <td>'.$solicitud->fecha_anterior.'</td>
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
		    <td>'.$solicitud->tramite.'</td>
		  </tr>
		  <tr>
		    <td><strong>Ejecutivo de cuenta</strong></td>
		    <td>'.$solicitud->gestor_comercial.'</td>
		  </tr>
		  <tr>
		    <td><strong>Analista de crédito asignado</strong></td>
		    <td>'.$analista->user_names.'</td>
		  </tr>
		  <tr>
		    <td><strong>Email</strong></td>
		    <td>'.$correo1.'</td>
		  </tr>
		  <tr>
		    <td><strong>Tel&eacute;fono</strong></td>
		    <td>'.$analista->user_telefono.$extension.'</td>
		  </tr>
		  <tr>
		    <td><strong>Celular del analista</strong></td>
		    <td>'.$analista->user_celular.'</td>
		  </tr>
		</table>';

		$this->_view->tabla = $tabla;



	}

	public function guardarpasoAction()
	{
		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$id = $this->_getSanitizedParam("id");
		$solicitud = $solicitudModel->getById($id);
		$paso = $this->_getSanitizedParam("paso");

		$documentosModel = new Administracion_Model_DbTable_Documentos();
		$documentos = $documentosModel->getList(" solicitud = '$id' AND tipo='1' ","");
		$documentos2 = $documentosModel->getList(" solicitud = '$id' AND tipo='2' ","");

		extract($_POST);
		//print_r($_POST);
		if($id>0){
			//echo "entro1";
			if($paso=="1"){
				//echo "entro2";
				$ciudad_residencia = $this->limpiar2($ciudad_residencia);
				$ciudad_oficina = $this->limpiar2($ciudad_oficina);
				$ciudad_documento = $this->limpiar2($ciudad_documento);
				$direccion_oficina = $this->limpiar2($direccion_oficina);
				$direccion_residencia = $this->limpiar2($direccion_residencia);
				$dependencia = $this->limpiar2($dependencia);
				$nombres = $this->limpiar2($nombres);
				$apellido1 = $this->limpiar2($apellido1);
				$apellido2 = $this->limpiar2($apellido2);
				$barrio = $this->limpiar2($barrio);
				$cuenta_numero = $this->limpiar2($cuenta_numero);
				$cuenta_tipo = $this->limpiar2($cuenta_tipo);
				$entidad_bancaria = $this->limpiar2($entidad_bancaria);

				$solicitudModel->editField($id,"nombres",$nombres);
				$solicitudModel->editField($id,"apellido1",$apellido1);
				$solicitudModel->editField($id,"apellido2",$apellido2);
				$solicitudModel->editField($id,"sexo",$sexo);
				$solicitudModel->editField($id,"tipo_documento",$tipo_documento);
				$solicitudModel->editField($id,"documento",$documento);
				$solicitudModel->editField($id,"dependencia",$dependencia);
				$solicitudModel->editField($id,"direccion_oficina",$direccion_oficina);
				$solicitudModel->editField($id,"telefono_oficina",$telefono_oficina);
				$solicitudModel->editField($id,"direccion_residencia",$direccion_residencia);
				$solicitudModel->editField($id,"barrio",$barrio);
				$solicitudModel->editField($id,"ciudad_residencia",$ciudad_residencia);
				$solicitudModel->editField($id,"telefono",$telefono);
				$solicitudModel->editField($id,"correo_empresarial",$correo_empresarial);
				$solicitudModel->editField($id,"correo_personal",$correo_personal);
				$solicitudModel->editField($id,"situacion_laboral",$situacion_laboral);
				$solicitudModel->editField($id,"cual",$cual);
				$solicitudModel->editField($id,"ocupacion",$ocupacion);
				$solicitudModel->editField($id,"estado_civil",$estado_civil);
				$solicitudModel->editField($id,"peso",$peso);
				$solicitudModel->editField($id,"estatura",$estatura);
				$solicitudModel->editField($id,"conyuge_nombre",$conyuge_nombre);
				$solicitudModel->editField($id,"conyuge_telefono",$conyuge_telefono);
				$solicitudModel->editField($id,"conyuge_celular",$conyuge_celular);
				$solicitudModel->editField($id,"declara_renta",$declara_renta);
				$solicitudModel->editField($id,"persona_publica",$persona_publica);
				$solicitudModel->editField($id,"fecha_nacimiento",$fecha_nacimiento);
				$solicitudModel->editField($id,"fecha_documento",$fecha_documento);
				$solicitudModel->editField($id,"celular",$celular);
				$solicitudModel->editField($id,"ciudad_oficina",$ciudad_oficina);
				$solicitudModel->editField($id,"ciudad_documento",$ciudad_documento);
				$solicitudModel->editField($id,"cuenta_numero",$cuenta_numero);
				$solicitudModel->editField($id,"cuenta_tipo",$cuenta_tipo);
				$solicitudModel->editField($id,"entidad_bancaria",$entidad_bancaria);
				$solicitudModel->editField($id,"empresa",$empresa);

				//fedeaa
				$solicitudModel->editField($id,"tipo_vivienda",$tipo_vivienda);
				$solicitudModel->editField($id,"fecha_ingreso",$fecha_ingreso);
				$solicitudModel->editField($id,"cargo",$cargo);
				$solicitudModel->editField($id,"fecha_afiliacion",$fecha_afiliacion);
				$solicitudModel->editField($id,"personas_cargo",$personas_cargo);
				$solicitudModel->editField($id,"numero_hijos",$numero_hijos);
				$solicitudModel->editField($id,"nomenclatura1",$nomenclatura1);
				$solicitudModel->editField($id,"nomenclatura2",$nomenclatura2);
				//fedeaa
				$solicitudModel->editField($id,"paso","2");


				header("Location: /page/sistema/paso2/?id=".$id);
			}

			if($paso=="2"){
				//info_patrimonial
				$cedula = $solicitud->cedula;

				$conceptos = array("","VIVIENDA","OTRAS","HIPOTECA","VEHICULO","OTROS","PRENDA","CLASE","PATRIMONIO","TARJETAS","OTROS2","OBLIGACIONES","TOTALPATRIMONIAL");
				$total = count($conceptos);
				$infopatrimonialModel = new Administracion_Model_DbTable_Infopatrimonial();
				for($i=1;$i<=$total;$i++){
					$concepto = $conceptos[$i];
					if($concepto!=""){
						$v1 = $this->sin_puntos($_POST[$concepto."_v1"])*1;
						$v2 = $this->sin_puntos($_POST[$concepto."_v2"])*1;
						$v3 = $this->sin_puntos($_POST[$concepto."_v3"])*1;
						$infopatrimonialModel->borrar($id,$cedula,$concepto);

						$data['solicitud'] = $id;
						$data['cedula'] = $cedula;
						$data['concepto'] = $concepto;
						$data['v1'] = $v1;
						$data['v2'] = $v2;
						$data['v3'] = $v3;
						$infopatrimonialModel->insert($data);
					}
				}
				//info_patrimonial

				$solicitudModel->editField($id,"paso","3");
				header("Location: /page/sistema/paso3/?id=".$id);
			}


			if($paso=="3"){

				$ingreso_mensual = $this->sin_puntos($ingreso_mensual);
				$otros_ingresos = $this->sin_puntos($otros_ingresos);
				$total_ingresos = $this->sin_puntos($total_ingresos);
				$canon_arrendamiento = $this->sin_puntos($canon_arrendamiento);
				$otros_gastos = $this->sin_puntos($otros_gastos);
				$total_egresos = $this->sin_puntos($total_egresos);
				$activos = $this->sin_puntos($activos);
				$pasivos = $this->sin_puntos($pasivos);
				$patrimonio = $this->sin_puntos($patrimonio);

				$solicitudModel->editField($id,"ingreso_mensual",$ingreso_mensual);
				$solicitudModel->editField($id,"otros_ingresos",$otros_ingresos);
				$solicitudModel->editField($id,"total_ingresos",$total_ingresos);
				$solicitudModel->editField($id,"canon_arrendamiento",$canon_arrendamiento);
				$solicitudModel->editField($id,"otros_gastos",$otros_gastos);
				$solicitudModel->editField($id,"total_egresos",$total_egresos);
				$solicitudModel->editField($id,"activos",$activos);
				$solicitudModel->editField($id,"pasivos",$pasivos);
				$solicitudModel->editField($id,"patrimonio",$patrimonio);
				$solicitudModel->editField($id,"descripcion_ingresos",$descripcion_ingresos);
				$solicitudModel->editField($id,"descripcion_recursos",$descripcion_recursos);
				$solicitudModel->editField($id,"paso","4");

				//info financiera
				$salario = $this->sin_puntos($salario1);
				$pension = $this->sin_puntos($pension);
				$arriendos = $this->sin_puntos($arriendos);
				$dividendos = $this->sin_puntos($dividendos);
				$rentas = $this->sin_puntos($rentas);
				$total_ingresos = $this->sin_puntos($total_ingresos);
				$arrendamientos = $this->sin_puntos($arrendamientos);
				$gastos_familiares = $this->sin_puntos($gastos_familiares);
				$obligaciones_financieras = $this->sin_puntos($obligaciones_financieras);
				$otros_gastos = $this->sin_puntos($otros_gastos);
				$total_gastos = $this->sin_puntos($total_gastos);
				$capacidad_endeudamiento = $this->sin_puntos($capacidad_endeudamiento);

				$cedula = $solicitud->cedula;

				$financieraModel = new Administracion_Model_DbTable_Infofinanciera();
				$financieraModel->borrar($id,$cedula);

				$data['solicitud'] = $id;
				$data['cedula'] = $cedula;
				$data['salario'] = $salario;
				$data['pension'] = $pension;
				$data['arriendos'] = $arriendos;
				$data['dividendos'] = $dividendos;
				$data['rentas'] = $rentas;
				$data['otros_ingresos'] = $otros_ingresos;
				$data['total_ingresos'] = $total_ingresos;
				$data['arrendamientos'] = $arrendamientos;
				$data['gastos_familiares'] = $gastos_familiares;
				$data['obligaciones_financieras'] = $obligaciones_financieras;
				$data['otros_gastos'] = $otros_gastos;
				$data['total_gastos'] = $total_gastos;
				$data['capacidad_endeudamiento'] = $capacidad_endeudamiento;

				$financieraModel->insert($data);
				header("Location: /page/sistema/paso4/?id=".$id);
				//info financiera

			}
			if($paso=="4"){
				$referenciasModel = new Administracion_Model_DbTable_Referencias();

				$solicitudModel->editField($id,"paso","5");
				$referenciasModel->borrar($id);

				for($i=1;$i<=4;$i++){
					$nombres = $_POST['nombres'.$i];
					$parentesco = $_POST['parentesco'.$i];
					$direccion = $_POST['direccion'.$i];
					$ciudad = $_POST['ciudad'.$i];
					$telefono = $_POST['telefono'.$i];
					$celular = $_POST['celular'.$i];
					$departamento = $_POST['departamento'.$i];
					$actividad = $_POST['actividad'.$i];
					$empresa = $_POST['nombre_empresa'.$i];
					$telefono_empresa = $_POST['telefono_empresa'.$i];
					$cargo = $_POST['cargo'.$i];
					$nomenclatura = $_POST['nomenclatura'.$i];
					$correo = $_POST['correo'.$i];

					$data['solicitud'] = $id;
					$data['tipo'] = 0;
					$data['numero'] = $i;
					$data['nombres'] = $nombres;
					$data['parentesco'] = $parentesco;
					$data['direccion'] = $direccion;
					$data['ciudad'] = $ciudad;
					$data['telefono'] = $telefono;
					$data['celular'] = $celular;
					$data['departamento'] = $departamento;
					$data['actividad'] = $actividad;
					$data['empresa'] = $empresa;
					$data['cargo'] = $cargo;
					$data['telefono_empresa'] = $telefono_empresa;
					$data['nomenclatura'] = $nomenclatura;
					$data['correo'] = $correo;
					$referenciasModel->insert($data);

					$existe = $referenciasModel->getList(" solicitud='$id' AND numero='$i' ","");
					if(count($existe)>0){
						$id_referencia = $existe[0]->id;
						$referenciasModel->editField($id_referencia,"nombres",$nombres);
						$referenciasModel->editField($id_referencia,"parentesco",$parentesco);
						$referenciasModel->editField($id_referencia,"nomenclatura",$nomenclatura);
						$referenciasModel->editField($id_referencia,"direccion",$direccion);
						$referenciasModel->editField($id_referencia,"ciudad",$ciudad);
						$referenciasModel->editField($id_referencia,"telefono",$telefono);
						$referenciasModel->editField($id_referencia,"celular",$celular);
						$referenciasModel->editField($id_referencia,"departamento",$departamento);
						$referenciasModel->editField($id_referencia,"actividad",$actividad);
						$referenciasModel->editField($id_referencia,"empresa",$empresa);
						$referenciasModel->editField($id_referencia,"cargo",$cargo);
						$referenciasModel->editField($id_referencia,"telefono_empresa",$telefono_empresa);
						$referenciasModel->editField($id_referencia,"email",$email);
					}

				}
				header("Location: /page/sistema/paso5/?id=".$id);

			}

			if($paso=="5"){

				$FM_meses = $FM_meses*1;
				$FM_meses = 0;

				$solicitudModel->editField($id,"paso","6");
				$solicitudModel->editField($id,"tipo_garantia",$tipo_garantia);
				$solicitudModel->editField($id,"FM_meses",$FM_meses);

				$codeudorModel = new Administracion_Model_DbTable_Codeudor();

				if($tipo_garantia=="DEUDOR SOLIDARIO"){

					$codeudorModel->borrar($id);

					$salario = $this->sin_puntos($salario);
					$tiempo_anio = $tiempo_anio*1;
					$tiempo_meses = $tiempo_meses*1;
					if($fecha_nacimiento==""){
						$fecha_nacimiento="0000-00-00";
					}
					if($fecha_documento==""){
						$fecha_documento="0000-00-00";
					}

					$conyuge_nombre = $this->limpiar2($conyuge_nombre);
					$conyuge_telefono = $this->limpiar2($conyuge_telefono);
					$conyuge_celular = $this->limpiar2($conyuge_celular);
					$direccion_residencia = $this->limpiar2($direccion_residencia);

					$data['solicitud']=$id;
					$data['nombres']=$nombres;
					$data['nombres2']=$nombres2;
					$data['apellido1']=$apellido1;
					$data['apellido2']=$apellido2;
					$data['cedula']=$cedula;
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
					$codeudorModel->insert($data);


					//info_patrimonial
					$conceptos = array("","VIVIENDA","OTRAS","HIPOTECA","VEHICULO","OTROS","PRENDA","CLASE","PATRIMONIO","TARJETAS","OTROS2","OBLIGACIONES","TOTALPATRIMONIAL");
					$total = count($conceptos);
					$infopatrimonialModel = new Administracion_Model_DbTable_Infopatrimonial();
					for($i=1;$i<=$total;$i++){
						$concepto = $conceptos[$i];
						if($concepto!=""){
							$v1 = $this->sin_puntos($_POST[$concepto."_v1"])*1;
							$v2 = $this->sin_puntos($_POST[$concepto."_v2"])*1;
							$v3 = $this->sin_puntos($_POST[$concepto."_v3"])*1;
							$infopatrimonialModel->borrar($id,$cedula,$concepto);

							$data['solicitud'] = $id;
							$data['cedula'] = $cedula;
							$data['concepto'] = $concepto;
							$data['v1'] = $v1;
							$data['v2'] = $v2;
							$data['v3'] = $v3;
							$infopatrimonialModel->insert($data);
						}
					}
					//info_patrimonial

					//info financiera
					$salario = $this->sin_puntos($salario1);
					$pension = $this->sin_puntos($pension);
					$arriendos = $this->sin_puntos($arriendos);
					$dividendos = $this->sin_puntos($dividendos);
					$rentas = $this->sin_puntos($rentas);
					$otros_ingresos = $this->sin_puntos($otros_ingresos);
					$total_ingresos = $this->sin_puntos($total_ingresos);
					$arrendamientos = $this->sin_puntos($arrendamientos);
					$gastos_familiares = $this->sin_puntos($gastos_familiares);
					$obligaciones_financieras = $this->sin_puntos($obligaciones_financieras);
					$otros_gastos = $this->sin_puntos($otros_gastos);
					$total_gastos = $this->sin_puntos($total_gastos);
					$capacidad_endeudamiento = $this->sin_puntos($capacidad_endeudamiento);

					$financieraModel->borrar($id,$cedula);

					$data['solicitud'] = $id;
					$data['cedula'] = $cedula;
					$data['salario'] = $salario;
					$data['pension'] = $pension;
					$data['arriendos'] = $arriendos;
					$data['dividendos'] = $dividendos;
					$data['rentas'] = $rentas;
					$data['otros_ingresos'] = $otros_ingresos;
					$data['total_ingresos'] = $total_ingresos;
					$data['arrendamientos'] = $arrendamientos;
					$data['gastos_familiares'] = $gastos_familiares;
					$data['obligaciones_financieras'] = $obligaciones_financieras;
					$data['otros_gastos'] = $otros_gastos;
					$data['total_gastos'] = $total_gastos;
					$data['capacidad_endeudamiento'] = $capacidad_endeudamiento;

					$financieraModel->insert($data);
					//info financiera
				}

				header("Location: /page/sistema/paso6/?id=".$id);

			}

			if($paso=="6"){
				$solicitudModel->editField($id,"paso","7");

				$data['solicitud'] = $id;
				$data['tipo'] = 1;
				$documentosModel->insert2($data);

				$data['solicitud'] = $id;
				$data['tipo'] = 2;
				$documentosModel->insert2($data);

				$uploadImage =  new Core_Model_Upload_Image();


				//archivos asociado
				$tipo=1;
				if($_FILES['cedula']['name'] != ''){
					$archivo = $uploadImage->upload("cedula");
					$documentosModel->editar('cedula',$archivo,$solicitud,$tipo);
				}
				if($_FILES['desprendible_pago']['name'] != ''){
					$archivo = $uploadImage->upload("desprendible_pago");
					$documentosModel->editar('desprendible_pago',$archivo,$solicitud,$tipo);
				}
				if($_FILES['desprendible_pago2']['name'] != ''){
					$archivo = $uploadImage->upload("desprendible_pago2");
					$documentosModel->editar('desprendible_pago2',$archivo,$solicitud,$tipo);
				}
				if($_FILES['desprendible_pago3']['name'] != ''){
					$archivo = $uploadImage->upload("desprendible_pago3");
					$documentosModel->editar('desprendible_pago3',$archivo,$solicitud,$tipo);
				}
				if($_FILES['desprendible_pago4']['name'] != ''){
					$archivo = $uploadImage->upload("desprendible_pago4");
					$documentosModel->editar('desprendible_pago4',$archivo,$solicitud,$tipo);
				}
				if($_FILES['certificado_laboral']['name'] != ''){
					$archivo = $uploadImage->upload("certificado_laboral");
					$documentosModel->editar('certificado_laboral',$archivo,$solicitud,$tipo);
				}
				if($_FILES['otros_ingresos']['name'] != ''){
					$archivo = $uploadImage->upload("otros_ingresos");
					$documentosModel->editar('otros_ingresos',$archivo,$solicitud,$tipo);
				}
				if($_FILES['certificado_tradicion']['name'] != ''){
					$archivo = $uploadImage->upload("certificado_tradicion");
					$documentosModel->editar('certificado_tradicion',$archivo,$solicitud,$tipo);
				}
				if($_FILES['estado_obligacion']['name'] != ''){
					$archivo = $uploadImage->upload("estado_obligacion");
					$documentosModel->editar('estado_obligacion',$archivo,$solicitud,$tipo);
				}
				if($_FILES['estado_obligacion2']['name'] != ''){
					$archivo = $uploadImage->upload("estado_obligacion2");
					$documentosModel->editar('estado_obligacion2',$archivo,$solicitud,$tipo);
				}
				if($_FILES['estado_obligacion3']['name'] != ''){
					$archivo = $uploadImage->upload("estado_obligacion3");
					$documentosModel->editar('estado_obligacion3',$archivo,$solicitud,$tipo);
				}
				if($_FILES['factura_proforma']['name'] != ''){
					$archivo = $uploadImage->upload("factura_proforma");
					$documentosModel->editar('factura_proforma',$archivo,$solicitud,$tipo);
				}
				if($_FILES['recibo_matricula']['name'] != ''){
					$archivo = $uploadImage->upload("recibo_matricula");
					$documentosModel->editar('recibo_matricula',$archivo,$solicitud,$tipo);
				}
				if($_FILES['contrato_vivienda']['name'] != ''){
					$archivo = $uploadImage->upload("contrato_vivienda");
					$documentosModel->editar('contrato_vivienda',$archivo,$solicitud,$tipo);
				}
				if($_FILES['declaracion_renta']['name'] != ''){
					$archivo = $uploadImage->upload("declaracion_renta");
					$documentosModel->editar('declaracion_renta',$archivo,$solicitud,$tipo);
				}
				//archivos asociado

				//archivos codeudor
				if($solicitud->tipo_garantia=="DEUDOR SOLIDARIO"){
					$tipo=2;
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
				}
				//archivos codeudor

				$solicitudModel->editField($id,"paso","7");
				header("Location: /page/sistema/paso7/?id=".$id);

			}


			if($paso=="7"){
				$asegurabilidadModel = new Administracion_Model_DbTable_Asegurabilidad();
				$asegurabilidadModel->borrar($id);

				$data['solicitud'] = $id;
				$data['cobertura'] = $cobertura;
				$data['prima'] = $prima;
				$data['prima_valor'] = $prima_valor;
				$data['otra_cual'] = $otra_cual;
				$data['otra_cual2'] = $otra_cual2;
				$data['tiene'] = $tiene;
				$data['drogas'] = $drogas;
				$data['alcoholismo'] = $alcoholismo;
				$data['drogadiccion'] = $drogadiccion;
				$data['hospitalizado'] = $hospitalizado;
				$data['observaciones'] = $observaciones;
				$data['fecha'] = date("Y-m-d");

				$id_asegurabilidad = $asegurabilidadModel->insert($data);
				$asegurabilidadModel->editField($id_asegurabilidad,"enfermedad",$enfermedad);
				$asegurabilidadModel->editField($id_asegurabilidad,"anio",$anio);
				$asegurabilidadModel->editField($id_asegurabilidad,"tratamiento",$tratamiento);
				$asegurabilidadModel->editField($id_asegurabilidad,"no_conozco",$no_conozco);


				$enfermedadesModel = new Administracion_Model_DbTable_Enfermedades();
				$enfermedades = $enfermedadesModel->getList(""," id ASC ");

				//enfermedades
				$enfermedadesitemsModel = new Administracion_Model_DbTable_Enfermedadesitems();
				$enfermedadesitemsModel->borrar($id);

				foreach ($enfermedades as $enfermedad) {
					$i = $enfermedad->id;
					if($_POST['c'.$i]!=""){
						$enfermedad = $data['enfermedad'] = $i;
						$formulario = $data['formulario'] = $id;
						$enfermedadesitemsModel->insert($data);
					}
				}
				//enfermedades


				$solicitudModel->editField($id,"paso","8");
				header("Location: /page/sistema/asignaranalista/?id=".$id);

			}



		}

		//print_r($_POST);

	}

	public function asignaranalistaAction(){

		$id = $this->_getSanitizedParam("id");

		//asignar analista
		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$hoy = date("Y-m-d");
		$solicitudModel->editField($id,"asignado","2");
		$solicitudModel->editField($id,"fecha_asignado","".$hoy);

		$this->_view->id = $id;
		$this->_view->numero = $numero = str_pad($id,6,"0",STR_PAD_LEFT);

		$emailModel = new Core_Model_Mail();
		$asunto = "Solicitud de crédito WEB".$numero."";
		$content = "";


		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$solicitud = $solicitudModel->getById($id);

		$linea = $solicitud->linea;
		$lineaModel = new Administracion_Model_DbTable_Lineas();
		$lineas = $lineaModel->getList(" codigo='$linea' ","")[0];

		$usuarioModel = new Administracion_Model_DbTable_Usuario();
		$cedula = $solicitud->cedula;
		$usuario = $usuarioModel->getList(" user_user = '$cedula' ","")[0];

		$analista_id = $solicitud->asignado;
		$analista = $usuarioModel->getById($analista_id);

		$gestor_comercial1 = $solicitud->gestor_comercial;
		$gestor_comercial = $usuarioModel->getList(" nombre = 'gestor_comercial' ","")[0];


		$tabla .= '<table width="100%" border="1" cellspacing="0" cellpadding="3">
		  <tr>
		    <td colspan="2"><div align="center">Resumen solicitud</div></td>
		  </tr>
		  <tr>
		    <td><strong>Solicitud</strong></td>
		    <td>WEB'.$numero.'</td>
		  </tr>
		  <tr>
		    <td><strong>Documento</strong></td>
		    <td>'.$usuario->user_user.'</td>
		  </tr>
		  <tr>
		    <td><strong>Nombre</strong></td>
		    <td>'.$usuario->user_names.'</td>
		  </tr>
		  <tr>
		    <td><strong>Email</strong></td>
		    <td>'.$solicitud->correo_personal.'</td>
		  </tr>
		  <tr>
		    <td><strong>Celular</strong></td>
		    <td>'.$solicitud->celular.'</td>
		  </tr>
		  <tr>
		    <td><strong>Tel&eacute;fono</strong></td>
		    <td>'.$solicitud->telefono.'</td>
		  </tr>
		  <tr>
		    <td><strong>L&iacute;nea de cr&eacute;dito</strong></td>
		    <td>'.$lineas->codigo.' - '.$lineas->nombre.'&nbsp;</td>
		  </tr>';

		 if($row_rsSolicitud['destino']!=""){
			$tabla.='
			  <tr>
			    <td><strong>Destino</strong></td>
			    <td>'.$solicitud->destino.'</td>
			  </tr>
			';
		}


/*
		  <tr>
		    <td><strong>Monto unificado</strong></td>
		    <td>'.$this->formato_pesos($solicitud->monto_solicitado).'</td>
		  </tr>
 */

		$tabla.='
		  <tr>
		    <td><strong>Valor solicitado</strong></td>
		    <td>'.$this->formato_pesos($solicitud->valor).'</td>
		  </tr>

		  <tr>
		    <td><strong>N&uacute;mero de Cuotas</strong></td>
		    <td>'.$solicitud->cuotas.'</td>
		  </tr>
		  <tr>
		    <td><strong>Valor aproximado de cuota</strong></td>
		    <td>'.$this->formato_pesos($solicitud->valor_cuota).'</td>
		  </tr>
		  <tr>
		    <td><strong>Tasa de interes</strong></td>
		    <td>'.$solicitud->tasa.'%</td>
		  </tr>
		  <tr>
		    <td><strong>Cuotas extra</strong></td>
		    <td>'.$solicitud->cuotas_extra.'</td>
		  </tr>
		  <tr>
		    <td><strong>Valor cuota extra</strong></td>
		    <td>'.$this->formato_pesos($solicitud->valor_extra).'</td>
		  </tr>
		  <tr>
		    <td><strong>Fecha solicitud</strong></td>
		    <td>'.$solicitud->fecha_asignado.'</td>
		  </tr>';

		  if($solicitud->fecha_anterior!=""){
			$tabla.='
			  <tr>
			    <td><strong>Fecha solicitud anterior incompleta</strong></td>
			    <td>'.$solicitud->fecha_anterior.'</td>
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
		    <td>'.$solicitud->tramite.'</td>
		  </tr>
		  <tr>
		    <td><strong>Ejecutivo de cuenta</strong></td>
		    <td>'.$solicitud->gestor_comercial.'</td>
		  </tr>
		  <tr>
		    <td><strong>Analista de crédito asignado</strong></td>
		    <td>'.$analista->user_names.'</td>
		  </tr>
		  <tr>
		    <td><strong>Email</strong></td>
		    <td>'.$correo1.'</td>
		  </tr>
		  <tr>
		    <td><strong>Tel&eacute;fono</strong></td>
		    <td>'.$analista->user_telefono.$extension.'</td>
		  </tr>
		  <tr>
		    <td><strong>Celular del analista</strong></td>
		    <td>'.$analista->user_celular.'</td>
		  </tr>
		</table>';


		$content = $tabla;


		$email = "creyes@omegawebsystems.com";

        $emailModel->getMail()->setFrom("notificaciones@fonkoba.com.co", "Notificaciones FONKOBA");
        $emailModel->getMail()->addBCC("soporteomega@omegawebsystems.com");
		$emailModel->getMail()->addAddress("".$email);

        $emailModel->getMail()->Subject = $asunto;
        $emailModel->getMail()->msgHTML($content);
        $emailModel->getMail()->AltBody = $content;
        $emailModel->sed();
		//echo $emailModel->getMail()->ErrorInfo;

		header("Location: /page/sistema/paso8/?id=".$id);

	}


	public function solicitudesAction()
	{
		$this->_view->seccion = 1;
		$this->_view->contenidos = $this->template->getContent(1);

		$header = $this->_view->getRoutPHP('modules/page/Views/partials/botonera.php');
		$this->getLayout()->setData("header",$header);

		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$usuarioModel = new Administracion_Model_DbTable_Usuario();
		$user = $usuarioModel->getById($_SESSION['kt_login_id']);

		$cedula = $user->user_user;
		$solicitudes = $solicitudModel->getList(" cedula='$cedula' "," id DESC ");
		$this->_view->solicitudes = $solicitudes;

		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();

		$lineaModel = new Administracion_Model_DbTable_Lineas();
		$lineas = $lineaModel->getList(" activo='1' "," nombre ASC ");
		$lineas_array  = array();
		foreach ($lineas as $key => $value) {
			$lineas_array[$value->codigo] = $value->nombre;
		}
		$this->_view->lineas_array = $lineas_array;

	}


	public function perfilAction()
	{

		$header = $this->_view->getRoutPHP('modules/page/Views/partials/botonera.php');
		$this->getLayout()->setData("header",$header);

		$usuarioModel = new Administracion_Model_DbTable_Usuario();
		$user = $usuarioModel->getById($_SESSION['kt_login_id']);
		$this->_view->content = $user;
	}

	public function guardarperfilAction()
	{

		$usuarioModel = new Administracion_Model_DbTable_Usuario();
		$id = $this->_getSanitizedParam("id");

		$email = $this->_getSanitizedParam("user_email");
		$usuarioModel->editField($id,"user_email",$email);
		$user_password = $this->_getSanitizedParam("user_password");
		if($user_password!=""){
			$hoy = date("Y-m-d");
			$user_password2 = password_hash($user_password, PASSWORD_DEFAULT);
			$usuarioModel->editField($id,"user_password",$user_password2);
			$usuarioModel->editField($id,"user_password_fecha",$hoy);
		}
		header("Location:/page/sistema/perfil/?a=1");
	}

	public function eliminarsolicitudAction()
	{
		$solicitudModel = new Administracion_Model_DbTable_Solicitudes();
		$id = $this->_getSanitizedParam("id");
		if($id>0){
			$solicitudModel->deleteRegister($id);
		}
		header("Location:/page/sistema/solicitudes/");
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

	public function cargar_imagen($archivo){
		//$pre = date("ymdhis")."_";
		$pre = "WEB".$_POST['id']."_";
		$target_dir = "documentos/";
		$target_file = $target_dir.$pre.basename($_FILES["".$archivo]["name"]);
		$archivo1 = $pre.basename($_FILES["".$archivo]["name"]);
		$target_file = limpiar($target_file);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		if ($uploadOk == 0) {
			//echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["".$archivo]["tmp_name"], $target_file)) {
				//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				$archivo1 = limpiar($archivo1);
				return $archivo1;
			} else {
				//echo "Sorry, there was an error uploading your file.";
				if($_POST[$archivo.'_ant']!=""){
					return $_POST[$archivo.'_ant'];
				}else{
					return 0;
				}
			}
		}

	}


	public function filtrolineaAction()
	{
		header('Content-Type:application/json');
		$this->setLayout('blanco');

		$linea = $this->_getSanitizedParam("linea");
		$lineaModel = new Administracion_Model_DbTable_Lineas();
		$lineas = $lineaModel->getList(" codigo='$linea' ","")[0];

		$res.= $lineas->requisitos;
		$respuesta['valores'] = $res;


		//CALCULAR CUPOS
		$cedula = $_SESSION['kt_login_user'];

		$cedulasModel = new Administracion_Model_DbTable_Cedulas();
		$nomina_list = $cedulasModel->getList(" cedula='$cedula' ","");

		$linea_id = $lineas->id;

		$linea_list = $lineaModel->getById($linea_id);
		$linea = $linea_list->codigo;
		$this->_view->tasa_nominal = $linea_list->efectivo_anual;
		$respuesta['tasa_nominal'] = $linea_list->efectivo_anual;

		$cuposModel = new Administracion_Model_DbTable_Cuposlinea();
		$cupos_list = $cuposModel->getList(" cedula='$cedula' AND linea='$linea' ","");

		$cupo_actual = $cupos_list[0]->cupo*1;
		$salario = $nomina_list[0]->cupo;

		$saldo_actual = $cupos_list[0]->saldo_actual*1;
		$valor_disponible = $cupo_actual-$saldo_actual;

		$this->_view->cupo_actual = $cupo_actual;
		$this->_view->saldo_actual = $saldo_actual;
		$this->_view->valor_disponible = $valor_disponible;
		$respuesta['cupo_actual'] = $this->formato_pesos($cupo_actual);
		$respuesta['saldo_actual'] = $saldo_actual;
		$respuesta['saldo_actual1'] = $this->formato_pesos($saldo_actual);
		$respuesta['valor_disponible'] = $this->formato_pesos($valor_disponible);
		//CALCULAR CUPOS

		//PARAMETROS
		$min = 1;
		$max = 36;
		$configModel = new Administracion_Model_DbTable_Config();
		$config_list = $configModel->getList("","");
		$max_meses = $linea_list->max_meses;
		$min_meses = $linea_list->min_meses;
		if($config_list[0]->cuota_min!=""){
			$min = $config_list[0]->cuota_min;
		}
		if($config_list[0]->cuota_max!=""){
			$max = $config_list[0]->cuota_max;
		}
		if($min_meses>0){
			$min = $min_meses;
		}
		if($max_meses>0){
			$max = $max_meses;
		}
		$this->_view->min = $min;
		$this->_view->max = $max;

		$this->_view->valor_min = $valor_min = $config_list[0]->valor_min*0;
		$this->_view->valor_max = $valor_max = $config_list[0]->valor_max;

		$respuesta['min'] = $min;
		$respuesta['max'] = $max;
		$respuesta['valor_min'] = $valor_min;
		$respuesta['valor_max'] = $valor_max;

		$cuotas = $this->_getSanitizedParam("cuotas");
		$menu_cuotas = '';
		for($i=$min;$i<=$max;$i++){
			$seleccionado='';
			if($cuotas==$i){
				$seleccionado=' selected ';
			}
			$menu_cuotas.='<option value="'.$i.'" '.$seleccionado.' >'.$i.'</option>';
		}
		if($linea_id){

		}
		$respuesta['menu_cuotas'] = $menu_cuotas;

		$valor1 = $this->_getSanitizedParam("valor");
		if($valor1==""){
			$valor1 = $this->formato_pesos($valor_min);
		}
		$valor = str_replace(".","",$valor1);
		$this->_view->valor1 = $valor1;
		$this->_view->valor = $valor;
		$respuesta['valor1'] = $valor1;
		$respuesta['valor'] = $valor;

		$monto_solicitado = $this->_getSanitizedParam("monto_solicitado");
		$this->_view->monto_solicitado = $monto_solicitado;
		$respuesta['monto_solicitado'] = $monto_solicitado;

		$monto_aux = $monto_solicitado;

		$cuotas = $this->_getSanitizedParam("cuotas");
		$this->_view->n = $cuotas;
		$respuesta['n'] = $cuotas;

		$abonos = $this->_getSanitizedParam("abonos");
		$this->_view->abonos = $abonos;
		$respuesta['abonos'] = $abonos;

		$extra = $this->_getSanitizedParam("extra");
		$this->_view->extra = $extra;
		$respuesta['extra'] = $extra;

		$tasa = $linea_list->tasa_real;
		$tasa_nominal = $linea_list->efectivo_anual;
		//$tasa = $tasa_nominal/12;
		$this->_view->tasa = $tasa;
		$respuesta['tasa'] = $tasa;

		$destino = $this->_getSanitizedParam("destino");
		$this->_view->destino = $destino;
		$respuesta['destino'] = $destino;
		//PARAMETROS


		//CALCULAR CUOTA

			//CUOTAS EXTRA
			$cuotaextra = str_replace('.','',$extra);
			$numerocuotasextra = $abonos;
			$i = $tasa/100;

				//calcular valor presente cuotas
				$anio = date('Y');
				$hoy = date("Y-m-d");
				if($hoy <= $anio.'-06-30'){
					$meses = 6-date('m');
				}else{
					$meses = 12-date('m');
				}
				$presente = 0;
				for($m = 1; $m <= $numerocuotasextra; $m++){
					$p = 1+($i);
					$p = pow($p,-1*$meses);
					$p = $p*$cuotaextra;
					$presente = $presente + $p;
					$meses = $meses+6;
				}
				//calcular valor presente cuotas

			//CUOTAS EXTRA


		$i = $tasa/100;
		$k1 = $valor - $presente; // prestamo
		$n=$max_meses;
		if($cuotas!=""){
			$n = $cuotas; //cuotas
		}
		$r = $k1 * $i;

		$r1 = 1-pow((1 + $i),(-1*$n));
		if($r1>0){
			$r = $r / $r1; //cuota
		}

		$hoy = date("Y")."-".date("m")."-".date("d");
		$diahoy = date("d");

		$this->_view->r = $r;
		$this->_view->numerocuotasextra = $numerocuotasextra;
		$this->_view->cuotaextra = $cuotaextra;
		$respuesta['r'] = $r;
		$respuesta['r1'] = number_format($r);
		$respuesta['numerocuotasextra'] = $numerocuotasextra;
		$respuesta['cuotaextra'] = $cuotaextra;
		//CALCULAR CUOTA

  		$hoy = date("Y-m-d");
  		$diahoy = date("d");
  		$k = $monto_aux;
		$interes = $k * $i;
		$seguro = $k*0.35/1000;
		//$seguro = 0;
		$abono = $r - $interes;
		$saldo = $k;

		$tabla='<table width="100%" border="1" cellspacing="3" class="table-striped">
		      		<tr class="fondo-gris azul">
		      			<th class="text-center">NUMERO</th>
		      			<th class="text-center">FECHA</th>
		      			<th class="text-center">CAPITAL</th>
		      			<th class="text-center">INTERESES</th>
		      			<th class="text-center">CUOTA</th>
		      			<th class="text-center">SEGUROS</th>
		      			<th class="text-center">TOTAL</th>
		      			<th class="text-center">SALDO</th>
		      		</tr>';
		    for($j=1;$j<=$n;$j++){

				if($diahoy >= 9){
					$meses = $j;
				}else{
					$meses = $j-1;
				}
				$fecha = date("Y-m-d", strtotime("$hoy +$meses month"));
				$var = explode("-",$fecha);

				$max_meses = 120;


				$ultimo =  $this->UltimoDia($var[0],$var[1]);
				$fecha = $var[0]."-".$var[1]."-".$ultimo;
				if($max_meses > 1){
					$fecha2 = $var[0]."-".$var[1];
				}else{
					if($hoy <= (date("Y")."-06-30")){
						$fecha2 = date("Y")."-06";
					}
					else{
						$fecha2 = date("Y")."-12";
					}
				}

				$tabla.='
			      		<tr>
			      			<td class="text-center">'.$j.'</td>
			      			<td class="text-center">'.$fecha.'</td>
			      			<td class="text-center">'.number_format($abono).'</td>
			      			<td class="text-center">'.number_format($interes).'</td>
			      			<td class="text-center">'.number_format($abono+$interes-$seguro).'</td>
			      			<td class="text-center">'.number_format($seguro).'</td>
			      			<td class="text-center">'.number_format($r).'</td>';
	            $saldo = $saldo - $abono - $extra2;
	            if($saldo<200){
	            	//$saldo=0;
	            }

	            $tabla.='
			      			<td class="text-center">'.number_format($saldo).'</td>
			      		</tr>';

			        $interes = $saldo * $i;
			        $seguro = $saldo*0.35/1000;
			        //$seguro = 0;
			        $abono = $r - $interes;

		    }

		    $tabla.='</table>';

		$tabla = str_replace(array("\r", "\n", "\t", "      "), '', $tabla);

		$respuesta['tabla'] = $tabla;


		echo json_encode($respuesta);

	}


	function formato_pesos($x){
		$res = number_format($x,0,',','.');
		return $res;
	}

	function UltimoDia($anho,$mes){
	   if (((fmod($anho,4)==0) and (fmod($anho,100)!=0)) or (fmod($anho,400)==0)) {
	       $dias_febrero = 29;
	   } else {
	       $dias_febrero = 28;
	   }
	   switch($mes) {
	       case 1: return 31; break;
	       case 2: return $dias_febrero; break;
	       case 3: return 31; break;
	       case 4: return 30; break;
	       case 5: return 31; break;
	       case 6: return 30; break;
	       case 7: return 31; break;
	       case 8: return 31; break;
	       case 9: return 30; break;
	       case 10: return 31; break;
	       case 11: return 30; break;
	       case 12: return 31; break;
	   }
	}


}



