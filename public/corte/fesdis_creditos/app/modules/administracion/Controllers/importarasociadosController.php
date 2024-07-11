<?php
/**
* Controlador de Importarasociados que permite la  creacion, edicion  y eliminacion de los importar asociados del Sistema
*/
class Administracion_importarasociadosController extends Administracion_mainController
{
	/**
	 * $mainModel  instancia del modelo de  base de datos importar asociados
	 * @var modeloContenidos
	 */
	public $mainModel;

	/**
	 * $route  url del controlador base
	 * @var string
	 */
	protected $route;

	/**
	 * $pages cantidad de registros a mostrar por pagina]
	 * @var integer
	 */
	protected $pages ;

	/**
	 * $namefilter nombre de la variable a la fual se le van a guardar los filtros
	 * @var string
	 */
	protected $namefilter;

	/**
	 * $_csrf_section  nombre de la variable general csrf  que se va a almacenar en la session
	 * @var string
	 */
	protected $_csrf_section = "administracion_importarasociados";

	/**
	 * $namepages nombre de la pvariable en la cual se va a guardar  el numero de seccion en la paginacion del controlador
	 * @var string
	 */
	protected $namepages;



	/**
     * Inicializa las variables principales del controlador importarasociados .
     *
     * @return void.
     */
	public function init()
	{
		$this->mainModel = new Administracion_Model_DbTable_Importarasociados();
		$this->namefilter = "parametersfilterimportarasociados";
		$this->route = "/administracion/importarasociados";
		$this->namepages ="pages_importarasociados";
		$this->namepageactual ="page_actual_importarasociados";
		$this->_view->route = $this->route;
		if(Session::getInstance()->get($this->namepages)){
			$this->pages = Session::getInstance()->get($this->namepages);
		} else {
			$this->pages = 20;
		}
		parent::init();
	}


	/**
     * Recibe la informacion y  muestra un listado de  importar asociados con sus respectivos filtros.
     *
     * @return void.
     */
	public function indexAction()
	{
		$title = "Administración de importar asociados";
		$this->getLayout()->setTitle($title);
		$this->_view->titlesection = $title;
		$this->filters();
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$filters =(object)Session::getInstance()->get($this->namefilter);
        $this->_view->filters = $filters;
		$filters = $this->getFilter();
		$order = "";
		$list = $this->mainModel->getList($filters,$order);
		$amount = $this->pages;
		$page = $this->_getSanitizedParam("page");
		if (!$page && Session::getInstance()->get($this->namepageactual)) {
		   	$page = Session::getInstance()->get($this->namepageactual);
		   	$start = ($page - 1) * $amount;
		} else if(!$page){
			$start = 0;
		   	$page=1;
			Session::getInstance()->set($this->namepageactual,$page);
		} else {
			Session::getInstance()->set($this->namepageactual,$page);
		   	$start = ($page - 1) * $amount;
		}
		$this->_view->register_number = count($list);
		$this->_view->pages = $this->pages;
		$this->_view->totalpages = ceil(count($list)/$amount);
		$this->_view->page = $page;
		$this->_view->lists = $this->mainModel->getListPages($filters,$order,$start,$amount);
		$this->_view->csrf_section = $this->_csrf_section;
	}

	/**
     * Genera la Informacion necesaria para editar o crear un  importar asociados  y muestra su formulario
     *
     * @return void.
     */
	public function manageAction()
	{
		$this->_view->route = $this->route;
		$this->_csrf_section = "manage_importarasociados_".date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$id = $this->_getSanitizedParam("id");
		if ($id > 0) {
			$content = $this->mainModel->getById($id);
			if($content->id){
				$this->_view->content = $content;
				$this->_view->routeform = $this->route."/update";
				$title = "Actualizar importar asociados";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}else{
				$this->_view->routeform = $this->route."/insert";
				$title = "Crear importar asociados";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}
		} else {
			$this->_view->routeform = $this->route."/insert";
			$title = "Crear importar asociados";
			$this->getLayout()->setTitle($title);
			$this->_view->titlesection = $title;
		}
	}

	/**
     * Inserta la informacion de un importar asociados  y redirecciona al listado de importar asociados.
     *
     * @return void.
     */
	public function insertAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {	
			$data = $this->getData();
			$uploadDocument =  new Core_Model_Upload_Document();
			if($_FILES['archivo2']['name'] != ''){
				$data['archivo2'] = $uploadDocument->upload("archivo2");
			}
			$id = $this->mainModel->insert($data);
			
			$data['id']= $id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'CREAR IMPORTAR ASOCIADOS';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe un identificador  y Actualiza la informacion de un importar asociados  y redirecciona al listado de importar asociados.
     *
     * @return void.
     */
	public function updateAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {
			$id = $this->_getSanitizedParam("id");
			$content = $this->mainModel->getById($id);
			if ($content->id) {
				$data = $this->getData();
					$uploadDocument =  new Core_Model_Upload_Document();
					
				if($_FILES['archivo2']['name'] != ''){
					if($content->archivo2){
						$uploadDocument->delete($content->archivo2);
					}
					$data['archivo2'] = $uploadDocument->upload("archivo2");
				
				} else {
					$data['archivo2'] = $content->archivo2;
				}
				
				$this->mainModel->update($data,$id);
			}
			$data['id']=$id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'EDITAR IMPORTAR ASOCIADOS';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);}
		//header('Location: '.$this->route.''.'');
		header('Location:/administracion/importarasociados/carga');
	}


	public function cargaAction()
	{
		$this->setLayout('blanco');
		$id = 1;
		$content = $this->mainModel->getById($id);
		$archivo = $content->archivo2;
		$this->getLayout()->setTitle("Importar cupos");

		//leer archivo
    	ini_set('memory_limit', '-1');
    	ini_set('max_execution_time', 300);
    	$inputFileName = FILE_PATH.'/'.$archivo;
   		$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
		$infoexel = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		//$ahorrosModel = new Administracion_Model_DbTable_Ahorrosaportes();
		$usuariosinfoModel = new Administracion_Model_DbTable_Usuariosinfo();
		$usuariosModel = new Administracion_Model_DbTable_Usuario();
		//$ahorrosModel->vaciar();
		$i=0;
//print_r($infoexel);
		foreach ($infoexel as $fila) {

			$i++;
			//echo $i;
			if($i>1){
				

				$cedula = $fila[B];
				
				// $dataAhorros['aportes'] = (double)$fila[N];
				// $dataAhorros['ahorros'] = (double)$fila[O];
				//-----------------------------------------------------
				$dataInfousuarios['documento'] = $cedula;
				$dataInfousuarios['tipo_documento'] = "CC";
				$dataInfousuarios['fecha_documento'] = $fila[BB];
				$dataInfousuarios['nombres'] = $fila[D];
				$dataInfousuarios['apellidos'] = $fila[C];
				$dataInfousuarios['ciudad_documento'] = $fila[AZ];
				$dataInfousuarios['fecha_nacimiento'] = $fila[H];
				$dataInfousuarios['fecha_afiliacion'] = $fila[I];
				$dataInfousuarios['ciudad_oficina'] = $fila[BD];
				$dataInfousuarios['genero'] = $fila[G];
				$dataInfousuarios['salario'] = $fila[L];
				$dataInfousuarios['direccion'] = $fila[Z];
				$dataInfousuarios['telefono'] = $fila[AA];
				$dataInfousuarios['telefono2'] = $fila[AB];
				$dataInfousuarios['celular'] = $fila[AC];
				$dataInfousuarios['fecha_ingreso'] = $fila[AJ];
				$dataInfousuarios['email'] = $fila[AL];
				$dataInfousuarios['email2'] = $fila[AM];
				$dataInfousuarios['barrio'] = $fila[AN];
				$dataInfousuarios['nivel_educativo'] = $fila[AO];
				$dataInfousuarios['cargo'] = $fila[AP];
				$dataInfousuarios['direccion_oficina'] = $fila[AQ];
				$dataInfousuarios['telefono_oficina'] = $fila[AR];
				$dataInfousuarios['telefono_oficina2'] = $fila["AS"];
				$dataInfousuarios['telefono_oficina_ext'] = $fila[AT];
				$dataInfousuarios['ciudad_nacimiento'] = $fila[AV];
				$dataInfousuarios['estado_civil'] = $fila[AY];
				$dataInfousuarios['poder_publico'] = $fila[BF];
				$dataInfousuarios['recursos_publicos'] = $fila[BG];
				$dataInfousuarios['reconocimiento'] = $fila[BI];
				$dataInfousuarios['familiares'] = $fila[BK];
				$dataInfousuarios['egresos_mensuales'] = $fila[BL];
				$dataInfousuarios['activos'] = $fila[BM];
				$dataInfousuarios['pasivos'] = $fila[BN];
				$dataInfousuarios['patrimonio'] = $fila[BO];
				$dataInfousuarios['otros_ingresos'] = $fila[BP];
				$dataInfousuarios['concepto_otros_ingresos'] = $fila[BQ];
				$dataInfousuarios['empresa'] = $fila[T];

				//-----------------------------------------------------------
				
				$dataUser['user_state'] = $fila[Q];
				$dataUser['user_date'] = date("Y-m-d");
				$dataUser['user_names'] = $fila[D]." ".$fila[C];
				$dataUser['user_email'] = $fila[AL];
				$dataUser['user_level'] = 2;
				$dataUser['user_user'] = $cedula;
				$dataUser['user_password'] = $cedula;
				$dataUser['user_delete'] = '1' ;
				$dataUser['user_current_user'] = '1' ;
				$dataUser['user_code'] = '1' ;
				$dataUser['user_telefono'] = $fila[AA];
				$dataUser['user_celular'] = $fila[AC];


				if($cedula!=""){
						//$ahorrosModel->insert($dataAhorros);
						$usuariosinfoModel->insert($dataInfousuarios);
						$usuariosModel->insert($dataUser);
				}

			}
		}

		header("Location:/administracion/importarasociados/");
	}

	/**
     * Recibe un identificador  y elimina un importar asociados  y redirecciona al listado de importar asociados.
     *
     * @return void.
     */
	public function deleteAction()
	{
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_csrf_section] == $csrf ) {
			$id =  $this->_getSanitizedParam("id");
			if (isset($id) && $id > 0) {
				$content = $this->mainModel->getById($id);
				if (isset($content)) {
					$uploadDocument =  new Core_Model_Upload_Document();
					if (isset($content->archivo2) && $content->archivo2 != '') {
						$uploadDocument->delete($content->archivo2);
					}
					$this->mainModel->deleteRegister($id);$data = (array)$content;
					$data['log_log'] = print_r($data,true);
					$data['log_tipo'] = 'BORRAR IMPORTAR ASOCIADOS';
					$logModel = new Administracion_Model_DbTable_Log();
					$logModel->insert($data); }
			}
		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe la informacion del formulario y la retorna en forma de array para la edicion y creacion de Importarasociados.
     *
     * @return array con toda la informacion recibida del formulario.
     */
	private function getData()
	{
		$data = array();
		$data['archivo'] = $this->_getSanitizedParam("archivo");
		$data['archivo2'] = '';
		$data['archivo3'] = $this->_getSanitizedParam("archivo3");
		$data['archivo4'] = $this->_getSanitizedParam("archivo4");
		$data['archivo_inactivos'] = $this->_getSanitizedParam("archivo_inactivos");
		return $data;
	}
	/**
     * Genera la consulta con los filtros de este controlador.
     *
     * @return array cadena con los filtros que se van a asignar a la base de datos
     */
    protected function getFilter()
    {
    	$filtros = " 1 = 1 ";
        if (Session::getInstance()->get($this->namefilter)!="") {
            $filters =(object)Session::getInstance()->get($this->namefilter);
            if ($filters->archivo2 != '') {
                $filtros = $filtros." AND archivo2 LIKE '%".$filters->archivo2."%'";
            }
		}
        return $filtros;
    }

    /**
     * Recibe y asigna los filtros de este controlador
     *
     * @return void
     */
    protected function filters()
    {
        if ($this->getRequest()->isPost()== true) {
        	Session::getInstance()->set($this->namepageactual,1);
            $parramsfilter = array();
					$parramsfilter['archivo2'] =  $this->_getSanitizedParam("archivo2");Session::getInstance()->set($this->namefilter, $parramsfilter);
        }
        if ($this->_getSanitizedParam("cleanfilter") == 1) {
            Session::getInstance()->set($this->namefilter, '');
            Session::getInstance()->set($this->namepageactual,1);
        }
    }
}