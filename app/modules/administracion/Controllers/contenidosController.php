<?php
/**
* Controlador de Contenidos que permite la  creacion, edicion  y eliminacion de los Contenidos del Sistema
*/
class Administracion_contenidosController extends Administracion_mainController
{
	/**
	 * $mainModel  instancia del modelo de  base de datos Contenidos
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
	protected $_csrf_section = "administracion_contenidos";

	/**
	 * $namepages nombre de la pvariable en la cual se va a guardar  el numero de seccion en la paginacion del controlador
	 * @var string
	 */
	protected $namepages;



	/**
     * Inicializa las variables principales del controlador contenidos .
     *
     * @return void.
     */
	public function init()
	{
		$this->mainModel = new Administracion_Model_DbTable_Contenidos();
		$this->namefilter = "parametersfiltercontenidos";
		$this->route = "/administracion/contenidos";
		$this->namepages ="pages_contenidos";
		$this->namepageactual ="page_actual_contenidos";
		$this->_view->route = $this->route;
		if(Session::getInstance()->get($this->namepages)){
			$this->pages = Session::getInstance()->get($this->namepages);
		} else {
			$this->pages = 20;
		}
		parent::init();
	}


	/**
     * Recibe la informacion y  muestra un listado de  Contenidos con sus respectivos filtros.
     *
     * @return void.
     */
	public function indexAction()
	{
		$title = "Administración de Contenidos";
		$this->getLayout()->setTitle($title);
		$this->_view->titlesection = $title;
		$this->filters();
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$filters =(object)Session::getInstance()->get($this->namefilter);
        $this->_view->filters = $filters;
		$filters = $this->getFilter();
		$order = "orden ASC";
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
		$this->_view->list_contenido_estado = $this->getContenidoestado();
		$this->_view->list_contenido_seccion = $this->getContenidoseccion();
	}

	/**
     * Genera la Informacion necesaria para editar o crear un  Contenido  y muestra su formulario
     *
     * @return void.
     */
	public function manageAction()
	{
		$this->_view->route = $this->route;
		$this->_csrf_section = "manage_contenidos_".date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$this->_view->list_contenido_estado = $this->getContenidoestado();
		$this->_view->list_contenido_seccion = $this->getContenidoseccion();
		$this->_view->list_contenido_enlace_abrir = $this->getContenidoenlaceabrir();
		$id = $this->_getSanitizedParam("id");
		if ($id > 0) {
			$content = $this->mainModel->getById($id);
			if($content->contenido_id){
				$this->_view->content = $content;
				$this->_view->routeform = $this->route."/update";
				$title = "Actualizar Contenido";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}else{
				$this->_view->routeform = $this->route."/insert";
				$title = "Crear Contenido";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}
		} else {
			$this->_view->routeform = $this->route."/insert";
			$title = "Crear Contenido";
			$this->getLayout()->setTitle($title);
			$this->_view->titlesection = $title;
		}
	}

	/**
     * Inserta la informacion de un Contenido  y redirecciona al listado de Contenidos.
     *
     * @return void.
     */
	public function insertAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {	
			$data = $this->getData();
			$uploadImage =  new Core_Model_Upload_Image();
			if($_FILES['contenido_imagen']['name'] != ''){
				$data['contenido_imagen'] = $uploadImage->upload("contenido_imagen");
			}
			if($_FILES['contenido_fondo_imagen']['name'] != ''){
				$data['contenido_fondo_imagen'] = $uploadImage->upload("contenido_fondo_imagen");
			}
			$id = $this->mainModel->insert($data);
			$this->mainModel->changeOrder($id,$id);
			$data['contenido_id']= $id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'CREAR CONTENIDO';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe un identificador  y Actualiza la informacion de un Contenido  y redirecciona al listado de Contenidos.
     *
     * @return void.
     */
	public function updateAction(){
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf ) {
			$id = $this->_getSanitizedParam("id");
			$content = $this->mainModel->getById($id);
			if ($content->contenido_id) {
				$data = $this->getData();
				$uploadImage =  new Core_Model_Upload_Image();
				if($_FILES['contenido_imagen']['name'] != ''){
					if($content->contenido_imagen){
						$uploadImage->delete($content->contenido_imagen);
					}
					$data['contenido_imagen'] = $uploadImage->upload("contenido_imagen");
				} else {
					$data['contenido_imagen'] = $content->contenido_imagen;
				}
			
				if($_FILES['contenido_fondo_imagen']['name'] != ''){
					if($content->contenido_fondo_imagen){
						$uploadImage->delete($content->contenido_fondo_imagen);
					}
					$data['contenido_fondo_imagen'] = $uploadImage->upload("contenido_fondo_imagen");
				} else {
					$data['contenido_fondo_imagen'] = $content->contenido_fondo_imagen;
				}
				$this->mainModel->update($data,$id);
			}
			$data['contenido_id']=$id;
			$data['log_log'] = print_r($data,true);
			$data['log_tipo'] = 'EDITAR CONTENIDO';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe un identificador  y elimina un Contenido  y redirecciona al listado de Contenidos.
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
					$uploadImage =  new Core_Model_Upload_Image();
					if (isset($content->contenido_imagen) && $content->contenido_imagen != '') {
						$uploadImage->delete($content->contenido_imagen);
					}
					
					if (isset($content->contenido_fondo_imagen) && $content->contenido_fondo_imagen != '') {
						$uploadImage->delete($content->contenido_fondo_imagen);
					}
					$this->mainModel->deleteRegister($id);$data = (array)$content;
					$data['log_log'] = print_r($data,true);
					$data['log_tipo'] = 'BORRAR CONTENIDO';
					$logModel = new Administracion_Model_DbTable_Log();
					$logModel->insert($data); }
			}
		}
		header('Location: '.$this->route.''.'');
	}

	/**
     * Recibe la informacion del formulario y la retorna en forma de array para la edicion y creacion de Contenidos.
     *
     * @return array con toda la informacion recibida del formulario.
     */
	private function getData()
	{
		$data = array();
		if($this->_getSanitizedParam("contenido_estado") == '' ) {
			$data['contenido_estado'] = '0';
		} else {
			$data['contenido_estado'] = $this->_getSanitizedParam("contenido_estado");
		}
		if($this->_getSanitizedParam("contenido_seccion") == '' ) {
			$data['contenido_seccion'] = '0';
		} else {
			$data['contenido_seccion'] = $this->_getSanitizedParam("contenido_seccion");
		}
		$data['contenido_fecha'] = $this->_getSanitizedParam("contenido_fecha");
		$data['contenido_titulo'] = $this->_getSanitizedParam("contenido_titulo");
		$data['contenido_subtitulo'] = $this->_getSanitizedParam("contenido_subtitulo");
		$data['contenido_introduccion'] = $this->_getSanitizedParamHtml("contenido_introduccion");
		$data['contenido_descripcion'] = $this->_getSanitizedParamHtml("contenido_descripcion");
		$data['contenido_imagen'] = "";
		$data['contenido_fondo_color'] = $this->_getSanitizedParam("contenido_fondo_color");
		$data['contenido_fondo_imagen'] = "";
		$data['contenido_enlace'] = $this->_getSanitizedParam("contenido_enlace");
		if($this->_getSanitizedParam("contenido_enlace_abrir") == '' ) {
			$data['contenido_enlace_abrir'] = '0';
		} else {
			$data['contenido_enlace_abrir'] = $this->_getSanitizedParam("contenido_enlace_abrir");
		}
		$data['contenido_enlace_vermas'] = $this->_getSanitizedParam("contenido_enlace_vermas");
		return $data;
	}

	/**
     * Genera los valores del campo Estado.
     *
     * @return array cadena con los valores del campo Estado.
     */
	private function getContenidoestado()
	{
		$array = array();
		$array['1'] = 'Activo';
		$array['2'] = 'Inactivo';
		return $array;
	}


	/**
     * Genera los valores del campo Seccion.
     *
     * @return array cadena con los valores del campo Seccion.
     */
	public function getContenidoseccion()
	{
		$array = array();
		$array['1'] = 'Bienvenida Home';
		$array['2'] = 'Introduccion Servicios';
		$array['3'] = 'Servicios';
		return $array;
	}


	/**
     * Genera los valores del campo Abrir En.
     *
     * @return array cadena con los valores del campo Abrir En.
     */
	private function getContenidoenlaceabrir()
	{
		$array = array();
		$array['1'] = 'Ventana Actual';
		$array['1'] = 'Ventana Nueva';
		return $array;
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
            if ($filters->contenido_estado != '') {
                $filtros = $filtros." AND contenido_estado ='".$filters->contenido_estado."'";
            }
            if ($filters->contenido_seccion != '') {
                $filtros = $filtros." AND contenido_seccion ='".$filters->contenido_seccion."'";
            }
            if ($filters->contenido_fecha != '') {
                $filtros = $filtros." AND contenido_fecha LIKE '%".$filters->contenido_fecha."%'";
            }
            if ($filters->contenido_titulo != '') {
                $filtros = $filtros." AND contenido_titulo LIKE '%".$filters->contenido_titulo."%'";
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
					$parramsfilter['contenido_estado'] =  $this->_getSanitizedParam("contenido_estado");
					$parramsfilter['contenido_seccion'] =  $this->_getSanitizedParam("contenido_seccion");
					$parramsfilter['contenido_fecha'] =  $this->_getSanitizedParam("contenido_fecha");
					$parramsfilter['contenido_titulo'] =  $this->_getSanitizedParam("contenido_titulo");Session::getInstance()->set($this->namefilter, $parramsfilter);
        }
        if ($this->_getSanitizedParam("cleanfilter") == 1) {
            Session::getInstance()->set($this->namefilter, '');
            Session::getInstance()->set($this->namepageactual,1);
        }
    }
}