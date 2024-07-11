<?php
/**
* Controlador de Enviopagare que permite la  creacion, edicion  y eliminacion de los enviopagare del Sistema
*/
class Administracion_enviopagareController extends Administracion_mainController
{
	/**
	 * $mainModel  instancia del modelo de  base de datos enviopagare
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
	protected $_csrf_section = "administracion_enviopagare";

	/**
	 * $namepages nombre de la pvariable en la cual se va a guardar  el numero de seccion en la paginacion del controlador
	 * @var string
	 */
	protected $namepages;



	/**
     * Inicializa las variables principales del controlador enviopagare .
     *
     * @return void.
     */
	public function init()
	{
		$this->mainModel = new Administracion_Model_DbTable_Enviopagare();
		$this->namefilter = "parametersfilterenviopagare";
		$this->route = "/administracion/enviopagare";
		$this->namepages ="pages_enviopagare";
		$this->namepageactual ="page_actual_enviopagare";
		$this->_view->route = $this->route;
		if(Session::getInstance()->get($this->namepages)){
			$this->pages = Session::getInstance()->get($this->namepages);
		} else {
			$this->pages = 20;
		}
		parent::init();
	}


	/**
     * Recibe la informacion y  muestra un listado de  enviopagare con sus respectivos filtros.
     *
     * @return void.
     */
	public function indexAction()
	{
		$title = "Administración de enviopagare";
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
     * Genera la Informacion necesaria para editar o crear un  enviopagare  y muestra su formulario
     *
     * @return void.
     */
	public function manageAction()
	{
		$this->_view->route = $this->route;
		$this->_csrf_section = "manage_enviopagare_".date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$id = $this->_getSanitizedParam("id");
		if ($id > 0) {
			$content = $this->mainModel->getById($id);
			if($content->envio_id){
				$this->_view->content = $content;
				$this->_view->routeform = $this->route."/update";
				$title = "Actualizar enviopagare";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}else{
				$this->_view->routeform = $this->route."/insert";
				$title = "Crear enviopagare";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}
		} else {
			$this->_view->routeform = $this->route."/insert";
			$title = "Crear enviopagare";
			$this->getLayout()->setTitle($title);
			$this->_view->titlesection = $title;
		}
	}

	/**
     * Inserta la informacion de un enviopagare  y redirecciona al listado de enviopagare.
     *
     * @return void.
     */
	public function insertAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {	
			$data = $this->getData();
			$id = $this->mainModel->insert($data);
			
			$data['envio_id']= $id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'CREAR ENVIOPAGARE';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe un identificador  y Actualiza la informacion de un enviopagare  y redirecciona al listado de enviopagare.
     *
     * @return void.
     */
	public function updateAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {
			$id = $this->_getSanitizedParam("id");
			$content = $this->mainModel->getById($id);
			if ($content->envio_id) {
				$data = $this->getData();
					$this->mainModel->update($data,$id);
			}
			$data['envio_id']=$id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'EDITAR ENVIOPAGARE';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe un identificador  y elimina un enviopagare  y redirecciona al listado de enviopagare.
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
					$data['log_tipo'] = 'BORRAR ENVIOPAGARE';
					$logModel = new Administracion_Model_DbTable_Log();
					$logModel->insert($data); }
			}
		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe la informacion del formulario y la retorna en forma de array para la edicion y creacion de Enviopagare.
     *
     * @return array con toda la informacion recibida del formulario.
     */
	private function getData()
	{
		$data = array();
		$data['envio_solicitud'] = $this->_getSanitizedParam("envio_solicitud");
		$data['envio_fecha'] = $this->_getSanitizedParam("envio_fecha");
		$data['envio_quien'] = $this->_getSanitizedParam("envio_quien");
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
            if ($filters->envio_solicitud != '') {
                $filtros = $filtros." AND envio_solicitud LIKE '%".$filters->envio_solicitud."%'";
            }
            if ($filters->envio_fecha != '') {
                $filtros = $filtros." AND envio_fecha LIKE '%".$filters->envio_fecha."%'";
            }
            if ($filters->envio_quien != '') {
                $filtros = $filtros." AND envio_quien LIKE '%".$filters->envio_quien."%'";
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
					$parramsfilter['envio_solicitud'] =  $this->_getSanitizedParam("envio_solicitud");
					$parramsfilter['envio_fecha'] =  $this->_getSanitizedParam("envio_fecha");
					$parramsfilter['envio_quien'] =  $this->_getSanitizedParam("envio_quien");Session::getInstance()->set($this->namefilter, $parramsfilter);
        }
        if ($this->_getSanitizedParam("cleanfilter") == 1) {
            Session::getInstance()->set($this->namefilter, '');
            Session::getInstance()->set($this->namepageactual,1);
        }
    }
}