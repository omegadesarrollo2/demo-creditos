<?php
/**
* Controlador de Beneficarios que permite la  creacion, edicion  y eliminacion de los Beneficiarios del Sistema
*/
class Administracion_beneficariosController extends Administracion_mainController
{
	/**
	 * $mainModel  instancia del modelo de  base de datos Beneficiarios
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
	protected $_csrf_section = "administracion_beneficarios";

	/**
	 * $namepages nombre de la pvariable en la cual se va a guardar  el numero de seccion en la paginacion del controlador
	 * @var string
	 */
	protected $namepages;



	/**
     * Inicializa las variables principales del controlador beneficarios .
     *
     * @return void.
     */
	public function init()
	{
		$this->mainModel = new Administracion_Model_DbTable_Beneficarios();
		$this->namefilter = "parametersfilterbeneficarios";
		$this->route = "/administracion/beneficarios";
		$this->namepages ="pages_beneficarios";
		$this->namepageactual ="page_actual_beneficarios";
		$this->_view->route = $this->route;
		if(Session::getInstance()->get($this->namepages)){
			$this->pages = Session::getInstance()->get($this->namepages);
		} else {
			$this->pages = 20;
		}
		parent::init();
	}


	/**
     * Recibe la informacion y  muestra un listado de  Beneficiarios con sus respectivos filtros.
     *
     * @return void.
     */
	public function indexAction()
	{
		$title = "Administración de Beneficiarios";
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
     * Genera la Informacion necesaria para editar o crear un  beneficiarios  y muestra su formulario
     *
     * @return void.
     */
	public function manageAction()
	{
		$this->_view->route = $this->route;
		$this->_csrf_section = "manage_beneficarios_".date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$id = $this->_getSanitizedParam("id");
		if ($id > 0) {
			$content = $this->mainModel->getById($id);
			if($content->id){
				$this->_view->content = $content;
				$this->_view->routeform = $this->route."/update";
				$title = "Actualizar beneficiarios";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}else{
				$this->_view->routeform = $this->route."/insert";
				$title = "Crear beneficiarios";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}
		} else {
			$this->_view->routeform = $this->route."/insert";
			$title = "Crear beneficiarios";
			$this->getLayout()->setTitle($title);
			$this->_view->titlesection = $title;
		}
	}

	/**
     * Inserta la informacion de un beneficiarios  y redirecciona al listado de Beneficiarios.
     *
     * @return void.
     */
	public function insertAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {	
			$data = $this->getData();
			$id = $this->mainModel->insert($data);
			
			$data['id']= $id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'CREAR BENEFICIARIOS';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe un identificador  y Actualiza la informacion de un beneficiarios  y redirecciona al listado de Beneficiarios.
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
					$this->mainModel->update($data,$id);
			}
			$data['id']=$id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'EDITAR BENEFICIARIOS';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe un identificador  y elimina un beneficiarios  y redirecciona al listado de Beneficiarios.
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
					$this->mainModel->deleteRegister($id);$data = (array)$content;
					$data['log_log'] = print_r($data,true);
					$data['log_tipo'] = 'BORRAR BENEFICIARIOS';
					$logModel = new Administracion_Model_DbTable_Log();
					$logModel->insert($data); }
			}
		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe la informacion del formulario y la retorna en forma de array para la edicion y creacion de Beneficarios.
     *
     * @return array con toda la informacion recibida del formulario.
     */
	private function getData()
	{
		$data = array();
		$data['asociado'] = $this->_getSanitizedParam("asociado");
		$data['nombres'] = $this->_getSanitizedParam("nombres");
		$data['documento'] = $this->_getSanitizedParam("documento");
		$data['fecha_d'] = $this->_getSanitizedParam("fecha_d");
		$data['fecha_m'] = $this->_getSanitizedParam("fecha_m");
		$data['fecha_a'] = $this->_getSanitizedParam("fecha_a");
		$data['parentesco'] = $this->_getSanitizedParam("parentesco");
		$data['porcentaje'] = $this->_getSanitizedParam("porcentaje");
		$data['i'] = $this->_getSanitizedParam("i");
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
            if ($filters->asociado != '') {
                $filtros = $filtros." AND asociado LIKE '%".$filters->asociado."%'";
            }
            if ($filters->nombres != '') {
                $filtros = $filtros." AND nombres LIKE '%".$filters->nombres."%'";
            }
            if ($filters->documento != '') {
                $filtros = $filtros." AND documento LIKE '%".$filters->documento."%'";
            }
            if ($filters->fecha_d != '') {
                $filtros = $filtros." AND fecha_d LIKE '%".$filters->fecha_d."%'";
            }
            if ($filters->fecha_m != '') {
                $filtros = $filtros." AND fecha_m LIKE '%".$filters->fecha_m."%'";
            }
            if ($filters->fecha_a != '') {
                $filtros = $filtros." AND fecha_a LIKE '%".$filters->fecha_a."%'";
            }
            if ($filters->parentesco != '') {
                $filtros = $filtros." AND parentesco LIKE '%".$filters->parentesco."%'";
            }
            if ($filters->porcentaje != '') {
                $filtros = $filtros." AND porcentaje LIKE '%".$filters->porcentaje."%'";
            }
            if ($filters->i != '') {
                $filtros = $filtros." AND i LIKE '%".$filters->i."%'";
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
					$parramsfilter['asociado'] =  $this->_getSanitizedParam("asociado");
					$parramsfilter['nombres'] =  $this->_getSanitizedParam("nombres");
					$parramsfilter['documento'] =  $this->_getSanitizedParam("documento");
					$parramsfilter['fecha_d'] =  $this->_getSanitizedParam("fecha_d");
					$parramsfilter['fecha_m'] =  $this->_getSanitizedParam("fecha_m");
					$parramsfilter['fecha_a'] =  $this->_getSanitizedParam("fecha_a");
					$parramsfilter['parentesco'] =  $this->_getSanitizedParam("parentesco");
					$parramsfilter['porcentaje'] =  $this->_getSanitizedParam("porcentaje");
					$parramsfilter['i'] =  $this->_getSanitizedParam("i");Session::getInstance()->set($this->namefilter, $parramsfilter);
        }
        if ($this->_getSanitizedParam("cleanfilter") == 1) {
            Session::getInstance()->set($this->namefilter, '');
            Session::getInstance()->set($this->namepageactual,1);
        }
    }
}