<?php
/**
* Controlador de Usuario que permite la  creacion, edicion  y eliminacion de los Usuarios del Sistema
*/
class Administracion_usuarioController extends Administracion_mainController
{
	public $botonpanel = 4;
	/**
	 * $mainModel  instancia del modelo de  base de datos Usuarios
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
	protected $_csrf_section = "administracion_usuario";

	/**
	 * $namepages nombre de la pvariable en la cual se va a guardar  el numero de seccion en la paginacion del controlador
	 * @var string
	 */
	protected $namepages;



	/**
     * Inicializa las variables principales del controlador usuario .
     *
     * @return void.
     */
	public function init()
	{
		$this->mainModel = new Administracion_Model_DbTable_Usuario();
		$this->namefilter = "parametersfilterusuario";
		$this->route = "/administracion/usuario";
		$this->namepages ="pages_usuario";
		$this->namepageactual ="page_actual_usuario";
		$this->_view->route = $this->route;
		if(Session::getInstance()->get($this->namepages)){
			$this->pages = Session::getInstance()->get($this->namepages);
		} else {
			$this->pages = 20;
		}
		parent::init();
	}


	/**
     * Recibe la informacion y  muestra un listado de  Usuarios con sus respectivos filtros.
     *
     * @return void.
     */
	public function indexAction()
	{
		$title = "Administración de Usuarios";
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
		$this->_view->list_user_state = $this->getUserstate();
		$this->_view->list_user_level = $this->getUserlevel();
	}

	/**
     * Genera la Informacion necesaria para editar o crear un  Usuario  y muestra su formulario
     *
     * @return void.
     */
	public function manageAction()
	{
		$this->_view->route = $this->route;
		$this->_csrf_section = "manage_usuario_".date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$this->_view->list_user_state = $this->getUserstate();
		$this->_view->list_user_level = $this->getUserlevel();
		$id = $this->_getSanitizedParam("id");
		if ($id > 0) {
			$content = $this->mainModel->getById($id);
			if($content->user_id){
				$this->_view->content = $content;
				$this->_view->routeform = $this->route."/update";
				$title = "Actualizar Usuario";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}else{
				$this->_view->routeform = $this->route."/insert";
				$title = "Crear Usuario";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}
		} else {
			$this->_view->routeform = $this->route."/insert";
			$title = "Crear Usuario";
			$this->getLayout()->setTitle($title);
			$this->_view->titlesection = $title;
		}
	}

	/**
     * Inserta la informacion de un Usuario  y redirecciona al listado de Usuarios.
     *
     * @return void.
     */
	public function insertAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {	
			$data = $this->getData();
			$id = $this->mainModel->insert($data);

			//LOG
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = "CREAR USUARIO";
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe un identificador  y Actualiza la informacion de un Usuario  y redirecciona al listado de Usuarios.
     *
     * @return void.
     */
	public function updateAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {
			$id = $this->_getSanitizedParam("id");
			$content = $this->mainModel->getById($id);
			if ($content->user_id) {
				$data = $this->getData();
					$this->mainModel->update($data,$id);

				//LOG
				$data['user_id']=$id;
				$data['log_log'] = print_r($data,true);
				$data['log_tipo'] = "ACTUALIZAR USUARIO";
				$logModel = new Administracion_Model_DbTable_Log();
				$logModel->insert($data);
			}
		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe un identificador  y elimina un Usuario  y redirecciona al listado de Usuarios.
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
					$this->mainModel->deleteRegister($id);

					//LOG
					$data['user_id']=$id;
					$data['log_log'] = print_r($data,true);
					$data['log_tipo'] = "BORRAR USUARIO";
					$logModel = new Administracion_Model_DbTable_Log();
					$logModel->insert($data);
				}
			}
		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe la informacion del formulario y la retorna en forma de array para la edicion y creacion de Usuario.
     *
     * @return array con toda la informacion recibida del formulario.
     */
	private function getData()
	{
		$data = array();
		if($this->_getSanitizedParam("user_state") == '' ) {
			$data['user_state'] = '0';
		} else {
			$data['user_state'] = $this->_getSanitizedParam("user_state");
		}
		$data['user_date'] = date("Y-m-d");
		$data['user_names'] = $this->_getSanitizedParam("user_names");
		$data['user_email'] = $this->_getSanitizedParam("user_email");
		if($this->_getSanitizedParam("user_level") == '' ) {
			$data['user_level'] = '0';
		} else {
			$data['user_level'] = $this->_getSanitizedParam("user_level");
		}
		$data['user_user'] = $this->_getSanitizedParam("user_user");
		$data['user_password'] = $this->_getSanitizedParam("user_password");
		$data['user_delete'] = '1' ;
		$data['user_current_user'] = '1' ;
		$data['user_code'] = '1' ;

		$data['user_telefono'] = $this->_getSanitizedParam("user_telefono");
		$data['user_celular'] = $this->_getSanitizedParam("user_celular");
		return $data;
	}

	/**
     * Genera los valores del campo Estado.
     *
     * @return array cadena con los valores del campo Estado.
     */
	private function getUserstate()
	{
		$array = array();
		$array['1'] = 'Activo';
		$array['2'] = 'Inactivo';
		return $array;
	}


	/**
     * Genera los valores del campo Nivel.
     *
     * @return array cadena con los valores del campo Nivel.
     */
	private function getUserlevel()
	{
		$array = array();
		$array['1'] = 'Administrador';
		// $array['2'] = 'Asociado';
		$array['3'] = 'Analista de crédito';
		$array['4'] = 'Comité de crédito';
		// $array['5'] = 'Gestor comercial';
		//$array['6'] = 'Auxiliar';
		$array['7'] = 'Asistente de cartera';
		$array['8'] = 'Gerencia';
		$array['9'] = 'Junta directiva';
		$array['10'] = 'Oficial de Cumplimiento';
		$array['11'] = 'Revisoría Fiscal';
		// $array['12'] = 'Junta directiva';

		return $array;
	}

	/**
     * Genera la consulta con los filtros de este controlador.
     *
     * @return array cadena con los filtros que se van a asignar a la base de datos
     */
    protected function getFilter()
    {
    	$filtros = " user_id <> 1 ";
        if (Session::getInstance()->get($this->namefilter)!="") {
            $filters =(object)Session::getInstance()->get($this->namefilter);
            if ($filters->user_state != '') {
                $filtros = $filtros." AND user_state ='".$filters->user_state."'";
            }
            if ($filters->user_date != '') {
                $filtros = $filtros." AND user_date LIKE '%".$filters->user_date."%'";
            }
            if ($filters->user_names != '') {
                $filtros = $filtros." AND user_names LIKE '%".$filters->user_names."%'";
            }
            if ($filters->user_level != '') {
                $filtros = $filtros." AND user_level ='".$filters->user_level."'";
            }
            if ($filters->user_user != '') {
                $filtros = $filtros." AND user_user LIKE '%".$filters->user_user."%'";
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
					$parramsfilter['user_state'] =  $this->_getSanitizedParam("user_state");
					$parramsfilter['user_date'] =  $this->_getSanitizedParam("user_date");
					$parramsfilter['user_names'] =  $this->_getSanitizedParam("user_names");
					$parramsfilter['user_level'] =  $this->_getSanitizedParam("user_level");
					$parramsfilter['user_user'] =  $this->_getSanitizedParam("user_user");Session::getInstance()->set($this->namefilter, $parramsfilter);
        }
        if ($this->_getSanitizedParam("cleanfilter") == 1) {
            Session::getInstance()->set($this->namefilter, '');
            Session::getInstance()->set($this->namepageactual,1);
        }
    }


	/**
     * Recibe la informacion y  muestra un listado de  Usuarios con sus respectivos filtros.
     *
     * @return void.
     */
	public function exportarAction()
	{


		$this->setLayout('blanco');
		$hoy = date("YmdHis");
		$excel = $this->_getSanitizedParam("excel");
		if($excel==1){
			header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
			header("Content-type:   application/x-msexcel; charset=utf-8");
			header("Content-Disposition: attachment; filename=exportar-usuarios-".$hoy.".xls");
		}

		$title = "Administración de Usuarios";
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
		$this->_view->lists = $this->mainModel->getList($filters,$order);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->list_user_state = $this->getUserstate();
		$this->_view->list_user_level = $this->getUserlevel();
	}


}