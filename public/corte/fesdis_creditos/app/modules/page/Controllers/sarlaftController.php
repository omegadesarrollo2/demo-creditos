<?php

/**
*
*/

class Page_sarlaftController extends Page_mainController
{

	public function indexAction()
	{

		if($_SESSION['kt_login_id']==""){
			//header("Location://fendesa.com/sistema/");
		}

		if($this->_getSanitizedParam("mod")=="detalle_solicitud"){
			$this->getLayout()->setData("header","");
		}

		$documento = $this->_getSanitizedParam("documento");

		$sarlaftModel = new Page_Model_DbTable_Sarlaft();
		$cedula = $_SESSION['kt_login_user'];

		if($documento!=""){
			$cedula = $documento;
		}

		$existe = $sarlaftModel->getList(" cedula='$cedula' ","")[0];
		$this->_view->existe = $existe;

		$usuariosinfoModel = new Administracion_Model_DbTable_Usuariosinfo();
		$usuariosinfo = $usuariosinfoModel->getList(" documento='$cedula' ")[0];
		//print_r($usuariosinfo);

		$usuariospanelModel = new Page_Model_DbTable_Userpanel();
		$usuariopanel = $usuariospanelModel->getList(" user_user='$cedula' ")[0];

		$aux_nombres = $usuariopanel->user_names;
		$aux_apellidos = explode(" ",$usuariopanel->user_lastnames);
		$this->_view->nombres = $aux_nombres;
		$this->_view->apellido1 = $aux_apellidos[0];
		$this->_view->apellido2 = $aux_apellidos[1];

		if($usuariosinfo->nombres!=""){
			$this->_view->nombres = $usuariosinfo->nombres;
		}
		if($usuariosinfo->apellidos!=""){
			$this->_view->apellidos = $usuariosinfo->apellidos;
		}
		if($usuariosinfo->ciudad_nacimiento!=""){
			$this->_view->ciudad_nacimiento = $usuariosinfo->ciudad_nacimiento;
		}
		if($usuariosinfo->pais!=""){
			$this->_view->pais = $usuariosinfo->pais;
		}
		if($usuariosinfo->direccion!=""){
			$this->_view->direccion_residencia = $usuariosinfo->direccion;
		}
		if($usuariosinfo->email!=""){
			$this->_view->correo_personal = $usuariosinfo->email;
		}
		if($usuariosinfo->telefono!=""){
			$this->_view->telefono = $usuariosinfo->telefono;
		}
		if($usuariosinfo->celular!=""){
			$this->_view->celular = $usuariosinfo->celular;
		}
		if($usuariosinfo->fecha_nacimiento!=""){
			$fecha_nacimiento = date("Y-m-d", strtotime($usuariosinfo->fecha_nacimiento));
			$this->_view->fecha_nacimiento = $fecha_nacimiento;
		}
		if($usuariosinfo->fecha_ingreso!=""){
			$fecha_ingreso = date("Y-m-d", strtotime($usuariosinfo->fecha_ingreso));
			$this->_view->fecha_ingreso = $fecha_ingreso;
		}
		if($usuariosinfo->fecha_documento!=""){
			$fechadocumento = date("Y-m-d", strtotime($usuariosinfo->fecha_documento));
			$this->_view->fecha_documento = $fechadocumento;
		}
		if($usuariosinfo->genero!=""){
			$this->_view->sexo = $usuariosinfo->genero;
		}
		if($usuariosinfo->tipo_documento!=""){
			$this->_view->tipo_documento = $usuariosinfo->tipo_documento;
		}
		if($usuariosinfo->barrio!=""){
			$this->_view->barrio = $usuariosinfo->barrio;
		}
		if($usuariosinfo->ciudad_documento!=""){
			$this->_view->ciudad_documento = $usuariosinfo->ciudad_documento;
		}
		if($usuariosinfo->estado_civil!=""){
			$this->_view->estado_civil = $this->remplaceEC($usuariosinfo->estado_civil);
		}
		if($usuariosinfo->empresa!=""){
			$this->_view->empresa = $usuariosinfo->empresa;
		}
		if($usuariosinfo->direccion_oficina!=""){
			$this->_view->direccion_oficina = $usuariosinfo->direccion_oficina;
		}
		if($usuariosinfo->telefono_oficina!=""){
			$this->_view->telefono_oficina = $usuariosinfo->telefono_oficina;
		}
		if($usuariosinfo->fecha_afiliacion!=""){
			$fecha_afiliacion = date("Y-m-d", strtotime($usuariosinfo->fecha_afiliacion));
			$this->_view->fecha_afiliacion = $fecha_afiliacion;
		}
		if($usuariosinfo->cuenta_numero!=""){
			$this->_view->cuenta_numero = $usuariosinfo->cuenta_numero;
		}
		if($usuariosinfo->cuenta_tipo!=""){
			$this->_view->cuenta_tipo = $usuariosinfo->cuenta_tipo;
		}
		if($usuariosinfo->entidad_bancaria!=""){
			$this->_view->entidad_bancaria = $usuariosinfo->entidad_bancaria;
		}

		if($usuariosinfo->nivel_educativo!=""){
			$this->_view->nivel_educativo = $usuariosinfo->nivel_educativo;
		}
		if($usuariosinfo->titulo!=""){
			$this->_view->titulo = $usuariosinfo->titulo;
		}
		if($usuariosinfo->intereses!=""){
			$this->_view->intereses = $usuariosinfo->intereses;
		}
		if($usuariosinfo->codigo_ciuu!=""){
			$this->_view->codigo_ciuu = $usuariosinfo->codigo_ciuu;
		}
		if($usuariosinfo->cargo!=""){
			$this->_view->cargo = $usuariosinfo->cargo;
		}
		if($usuariosinfo->salario!=""){
			$this->_view->salario = $usuariosinfo->salario;
		}
		if($usuariosinfo->ciudad_oficina!=""){
			$this->_view->ciudad_oficina = $usuariosinfo->ciudad_oficina;
		}
		if($usuariosinfo->dependencia!=""){
			$this->_view->dependencia = $usuariosinfo->dependencia;
		}
		if($usuariosinfo->empresa_cual!=""){
			$this->_view->empresa_cual = $usuariosinfo->empresa_cual;
		}
		if($usuariosinfo->valor_cuota_periodica!=""){
			$this->_view->valor_cuota_periodica = $usuariosinfo->valor_cuota_periodica;
		}
		if($usuariosinfo->valor_ahorro_voluntario!=""){
			$this->_view->valor_ahorro_voluntario = $usuariosinfo->valor_ahorro_voluntario;
		}
		if($usuariosinfo->valor_ahorro_incentivo!=""){
			$this->_view->valor_ahorro_incentivo = $usuariosinfo->valor_ahorro_incentivo;
		}


		if($usuariosinfo->recursos_publicos!=""){
			$this->_view->recursos_publicos = $usuariosinfo->recursos_publicos;
		}
		if($usuariosinfo->poder_publico!=""){
			$this->_view->poder_publico = $usuariosinfo->poder_publico;
		}
		if($usuariosinfo->reconocimiento!=""){
			$this->_view->reconocimiento = $usuariosinfo->reconocimiento;
		}
		if($usuariosinfo->familiares!=""){
			$this->_view->familiares = $usuariosinfo->familiares;
		}
		if($usuariosinfo->especifique!=""){
			$this->_view->especifique = $usuariosinfo->especifique;
		}
		if($usuariosinfo->ingresos_mensuales!=""){
			$this->_view->ingresos_mensuales = $usuariosinfo->ingresos_mensuales;
		}
		if($usuariosinfo->egresos_mensuales!=""){
			$this->_view->egresos_mensuales = $usuariosinfo->egresos_mensuales;
		}
		if($usuariosinfo->activos!=""){
			$this->_view->activos = $usuariosinfo->activos;
		}
		if($usuariosinfo->pasivos!=""){
			$this->_view->pasivos = $usuariosinfo->pasivos;
		}
		if($usuariosinfo->otros_ingresos!=""){
			$this->_view->otros_ingresos = $usuariosinfo->otros_ingresos;
		}
		if($usuariosinfo->concepto_otros_ingresos!=""){
			$this->_view->concepto_otros_ingresos = $usuariosinfo->concepto_otros_ingresos;
		}

		if($usuariosinfo->producto_tipo!=""){
			$this->_view->producto_tipo = $usuariosinfo->producto_tipo;
		}
		if($usuariosinfo->producto_numero!=""){
			$this->_view->producto_numero = $usuariosinfo->producto_numero;
		}
		if($usuariosinfo->producto_entidad!=""){
			$this->_view->producto_entidad = $usuariosinfo->producto_entidad;
		}
		if($usuariosinfo->producto_monto!=""){
			$this->_view->producto_monto = $usuariosinfo->producto_monto;
		}
		if($usuariosinfo->producto_ciudad!=""){
			$this->_view->producto_ciudad = $usuariosinfo->producto_ciudad;
		}
		if($usuariosinfo->producto_pais!=""){
			$this->_view->producto_pais = $usuariosinfo->producto_pais;
		}
		if($usuariosinfo->producto_moneda!=""){
			$this->_view->producto_moneda = $usuariosinfo->producto_moneda;
		}
		if($usuariosinfo->situacion_laboral!=""){
			$this->_view->situacion_laboral = $usuariosinfo->situacion_laboral;
		}
		if($usuariosinfo->operaciones_internacionales!=""){
			$this->_view->operaciones_internacionales = $usuariosinfo->operaciones_internacionales;
		}


		$this->_view->documento = $cedula;


		$parentescoModel = new Administracion_Model_DbTable_Parentescos();
		$this->_view->parentescos = $parentescoModel->getList(""," nombre ASC ");


		$ciudadModel = new Administracion_Model_DbTable_Ciudad();
		$this->_view->ciudades = $ciudadModel->getList(""," nombre ASC ");

		$nomenclaturaModel = new Administracion_Model_DbTable_Nomenclatura();
		$this->_view->nomenclaturas = $nomenclaturas = $nomenclaturaModel->getList(""," codigo ASC ");


		$beneficiariosModel = new Administracion_Model_DbTable_Beneficarios();
		$this->_view->beneficiarios = $beneficiariosModel->getList(" asociado='$cedula' "," i*1 ASC ");

		$hijosModel = new Administracion_Model_DbTable_Hijos();
		$this->_view->hijos = $hijosModel->getList(" asociado='$cedula' "," i*1 ASC ");

		$documentosModel = new Administracion_Model_DbTable_Documentossarlaft();
		$this->_view->documentos = $documentosModel->getList(" asociado='$cedula' "," anio DESC ")[0];

	}


	public function guardarAction(){

		//print_r($_POST);
		//error_reporting(E_ALL);
		$documento =  $this->_getSanitizedParam("documento");

		//si no existe crear info y sarlaft
		//actualizar sarlaft
		$sarlaftModel = new Page_Model_DbTable_Sarlaft();
		$existe = $sarlaftModel->getList(" cedula='$documento' ","");
		$usuariosinfoModel = new Administracion_Model_DbTable_Usuariosinfo();
		$usuariosinfo = $usuariosinfoModel->getList(" documento='$documento' ");
		$hoy = date("Y-m-d");
		if(count($usuariosinfo)==0){
			$data['documento'] = $documento;
			$usuariosinfoModel->insert($data);
		}
		if(count($existe)==0){
			$data['documento'] = $documento;
			$id = $sarlaftModel->insert($data);
			$sarlaftModel->editField($id,"fecha",$hoy);
		}else{
			$id = $existe[0]->id;
			$sarlaftModel->editField($id,"fecha",$hoy);
		}


		if($documento!=""){
			$fecha_nacimiento = $this->_getSanitizedParam("fecha_nacimiento");
			$usuariosinfoModel->editField($documento,"fecha_nacimiento",$fecha_nacimiento);
			$ciudad_nacimiento = $this->_getSanitizedParam("ciudad_nacimiento");
			$usuariosinfoModel->editField($documento,"ciudad_nacimiento",$ciudad_nacimiento);
			$tipo_documento = $this->_getSanitizedParam("tipo_documento");
			$usuariosinfoModel->editField($documento,"tipo_documento",$tipo_documento);
			$pais = $this->_getSanitizedParam("pais");
			$usuariosinfoModel->editField($documento,"pais",$pais);
			$ciudad_documento = $this->_getSanitizedParam("ciudad_documento");
			$usuariosinfoModel->editField($documento,"ciudad_documento",$ciudad_documento);
			$fecha_documento = $this->_getSanitizedParam("fecha_documento");
			$usuariosinfoModel->editField($documento,"fecha_documento",$fecha_documento);
			$estado_civil = $this->_getSanitizedParam("estado_civil");
			$usuariosinfoModel->editField($documento,"estado_civil",$estado_civil);
			$sexo = $this->_getSanitizedParam("sexo");
			$usuariosinfoModel->editField($documento,"genero",$sexo);
			$nivel_educativo = $this->_getSanitizedParam("nivel_educativo");
			$usuariosinfoModel->editField($documento,"nivel_educativo",$nivel_educativo);
			$titulo = $this->_getSanitizedParam("titulo");
			$usuariosinfoModel->editField($documento,"titulo",$titulo);
			$direccion_residencia = $this->_getSanitizedParam("direccion_residencia");
			$usuariosinfoModel->editField($documento,"direccion",$direccion_residencia);
			$barrio = $this->_getSanitizedParam("barrio");
			$usuariosinfoModel->editField($documento,"barrio",$barrio);
			$telefono = $this->_getSanitizedParam("telefono");
			$usuariosinfoModel->editField($documento,"telefono",$telefono);
			$celular = $this->_getSanitizedParam("celular");
			$usuariosinfoModel->editField($documento,"celular",$celular);
			$correo_personal = $this->_getSanitizedParam("correo_personal");
			$usuariosinfoModel->editField($documento,"email",$correo_personal);
			$intereses = $this->_getSanitizedParam("intereses");
			$usuariosinfoModel->editField($documento,"intereses",$intereses);

			$fecha_ingreso = $this->_getSanitizedParam("fecha_ingreso");
			$usuariosinfoModel->editField($documento,"fecha_ingreso",$fecha_ingreso);
			$codigo_ciuu = $this->_getSanitizedParam("codigo_ciuu");
			$usuariosinfoModel->editField($documento,"codigo_ciuu",$codigo_ciuu);
			$cargo = $this->_getSanitizedParam("cargo");
			$usuariosinfoModel->editField($documento,"cargo",$cargo);
			$salario = $this->_getSanitizedParam("salario");
			$usuariosinfoModel->editField($documento,"salario",$salario);
			$dependencia = $this->_getSanitizedParam("dependencia");
			$usuariosinfoModel->editField($documento,"dependencia",$dependencia);
			$ciudad_oficina = $this->_getSanitizedParam("ciudad_oficina");
			$usuariosinfoModel->editField($documento,"ciudad_oficina",$ciudad_oficina);
			$direccion_oficina = $this->_getSanitizedParam("direccion_oficina");
			$usuariosinfoModel->editField($documento,"direccion_oficina",$direccion_oficina);
			$empresa = $this->_getSanitizedParam("empresa");
			$usuariosinfoModel->editField($documento,"empresa",$empresa);
			$empresa_cual = $this->_getSanitizedParam("empresa_cual");
			$usuariosinfoModel->editField($documento,"empresa_cual",$empresa_cual);
			$situacion_laboral = $this->_getSanitizedParam("situacion_laboral");
			$usuariosinfoModel->editField($documento,"situacion_laboral",$situacion_laboral);

			$valor_cuota_periodica = $this->_getSanitizedParam("valor_cuota_periodica");
			$usuariosinfoModel->editField($documento,"valor_cuota_periodica",$valor_cuota_periodica);
			$valor_ahorro_voluntario = $this->_getSanitizedParam("valor_ahorro_voluntario");
			$usuariosinfoModel->editField($documento,"valor_ahorro_voluntario",$valor_ahorro_voluntario);
			$valor_ahorro_incentivo = $this->_getSanitizedParam("valor_ahorro_incentivo");
			$usuariosinfoModel->editField($documento,"valor_ahorro_incentivo",$valor_ahorro_incentivo);


			$recursos_publicos = $this->_getSanitizedParam("recursos_publicos");
			$usuariosinfoModel->editField($documento,"recursos_publicos",$recursos_publicos);
			$poder_publico = $this->_getSanitizedParam("poder_publico");
			$usuariosinfoModel->editField($documento,"poder_publico",$poder_publico);
			$reconocimiento = $this->_getSanitizedParam("reconocimiento");
			$usuariosinfoModel->editField($documento,"reconocimiento",$reconocimiento);
			$familiares = $this->_getSanitizedParam("familiares");
			$usuariosinfoModel->editField($documento,"familiares",$familiares);
			$especifique = $this->_getSanitizedParam("especifique");
			$usuariosinfoModel->editField($documento,"especifique",$especifique);
			$ingresos_mensuales = $this->_getSanitizedParam("ingresos_mensuales");
			$usuariosinfoModel->editField($documento,"ingresos_mensuales",$ingresos_mensuales);
			$egresos_mensuales = $this->_getSanitizedParam("egresos_mensuales");
			$usuariosinfoModel->editField($documento,"egresos_mensuales",$egresos_mensuales);
			$activos = $this->_getSanitizedParam("activos");
			$usuariosinfoModel->editField($documento,"activos",$activos);
			$pasivos = $this->_getSanitizedParam("pasivos");
			$usuariosinfoModel->editField($documento,"pasivos",$pasivos);
			$otros_ingresos = $this->_getSanitizedParam("otros_ingresos");
			$usuariosinfoModel->editField($documento,"otros_ingresos",$otros_ingresos);
			$concepto_otros_ingresos = $this->_getSanitizedParam("concepto_otros_ingresos");
			$usuariosinfoModel->editField($documento,"concepto_otros_ingresos",$concepto_otros_ingresos);

			$transacciones_moneda_extranjera = $this->_getSanitizedParam("transacciones_moneda_extranjera");
			$usuariosinfoModel->editField($documento,"transacciones_moneda_extranjera",$transacciones_moneda_extranjera);

			$producto_tipo = $this->_getSanitizedParam("producto_tipo");
			$usuariosinfoModel->editField($documento,"producto_tipo",$producto_tipo);
			$producto_numero = $this->_getSanitizedParam("producto_numero");
			$usuariosinfoModel->editField($documento,"producto_numero",$producto_numero);
			$producto_entidad = $this->_getSanitizedParam("producto_entidad");
			$usuariosinfoModel->editField($documento,"producto_entidad",$producto_entidad);
			$producto_monto = $this->_getSanitizedParam("producto_monto");
			$usuariosinfoModel->editField($documento,"producto_monto",$producto_monto);
			$producto_ciudad = $this->_getSanitizedParam("producto_ciudad");
			$usuariosinfoModel->editField($documento,"producto_ciudad",$producto_ciudad);
			$producto_pais = $this->_getSanitizedParam("producto_pais");
			$usuariosinfoModel->editField($documento,"producto_pais",$producto_pais);
			$producto_moneda = $this->_getSanitizedParam("producto_moneda");
			$usuariosinfoModel->editField($documento,"producto_moneda",$producto_moneda);


			$operaciones_internacionales = $this->_getSanitizedParam("operaciones_internacionales");
			$usuariosinfoModel->editField($documento,"operaciones_internacionales",$operaciones_internacionales);






			$beneficiariosModel = new Administracion_Model_DbTable_Beneficarios();
			$beneficiariosModel->borrar($documento);
			for($i=1;$i<=5;$i++){
				$data['asociado'] = $documento;
				$data['nombres'] = $this->_getSanitizedParam("nombres_".$i);
				$data['documento'] = $this->_getSanitizedParam("documento_".$i);
				$data['fecha_d'] = $this->_getSanitizedParam("fecha_d_".$i);
				$data['fecha_m'] = $this->_getSanitizedParam("fecha_m_".$i);
				$data['fecha_a'] = $this->_getSanitizedParam("fecha_a_".$i);
				$data['parentesco'] = $this->_getSanitizedParam("parentesco_".$i);
				$data['porcentaje'] = $this->_getSanitizedParam("porcentaje_".$i);
				$data['i'] = $i;
				if($data['nombres']!=""){
					$beneficiariosModel->insert($data);
				}
			}

			$hijosModel = new Administracion_Model_DbTable_Hijos();
			$hijosModel->borrar($documento);
			for($i=1;$i<=5;$i++){
				$data['asociado'] = $documento;
				$data['nombres'] = $this->_getSanitizedParam("nombresB_".$i);
				//$data['documento'] = $this->_getSanitizedParam("documentoB_".$i);
				$data['fecha_d'] = $this->_getSanitizedParam("fecha_dB_".$i);
				$data['fecha_m'] = $this->_getSanitizedParam("fecha_mB_".$i);
				$data['fecha_a'] = $this->_getSanitizedParam("fecha_aB_".$i);
				$data['edad'] = $this->_getSanitizedParam("edadB_".$i);
				$data['nivel_escolar'] = $this->_getSanitizedParam("nivel_escolarB_".$i);
				$data['i'] = $i;
				if($data['nombres']!=""){
					$hijosModel->insert($data);
				}
			}

			$documentosModel = new Administracion_Model_DbTable_Documentossarlaft();
			$data['asociado'] = $documento;
			$data['anio'] = date("Y");
			$documentosModel->insert($data);


			$uploadImage =  new Core_Model_Upload_Document();
			if($_FILES['cedula']['name'] != ''){
				$archivo = $uploadImage->upload("cedula");
				$documentosModel->editar('cedula',$archivo,$data['asociado'],$data['anio']);
			}
			if($_FILES['certificado_ingresos']['name'] != ''){
				$archivo = $uploadImage->upload("certificado_ingresos");
				$documentosModel->editar('certificado_ingresos',$archivo,$data['asociado'],$data['anio']);
			}
			if($_FILES['declaracion_renta']['name'] != ''){
				$archivo = $uploadImage->upload("declaracion_renta");
				$documentosModel->editar('declaracion_renta',$archivo,$data['asociado'],$data['anio']);
			}
			if($_FILES['desprendible']['name'] != ''){
				$archivo = $uploadImage->upload("desprendible");
				$documentosModel->editar('desprendible',$archivo,$data['asociado'],$data['anio']);
			}


		}

		//header("Location: /page/sarlaft/actualizado/");
		header("Location: /page/sistema/");

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
	public function remplaceEC($x){
		$x=str_replace(" ","",$x);
		return $x;
	}


}