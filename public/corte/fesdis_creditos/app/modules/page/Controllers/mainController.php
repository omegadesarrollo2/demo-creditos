<?php 

/**
*
*/

class Page_mainController extends Controllers_Abstract
{

	public $template;

	public function init()
	{
		$this->setLayout('page_page');
		$this->template = new Page_Model_Template_Template($this->_view);
		$infopageModel = new Page_Model_DbTable_Informacion();
		$this->_view->infopage = $infopageModel->getById(1);
		$header = $this->_view->getRoutPHP('modules/page/Views/partials/header.php');
		$this->getLayout()->setData("header",$header);
		$footer = $this->_view->getRoutPHP('modules/page/Views/partials/footer.php');
		$botones = $this->_view->getRoutPHP('modules/page/Views/partials/botones.php');
		$this->getLayout()->setData("footer",$footer);
		$this->getLayout()->setData("botones",$botones);
		$this->usuario();
		$this->_view->editoromega = 1;

	}


	public function usuario(){
		$userModel = new Core_Model_DbTable_User();
		$user = $userModel->getById(Session::getInstance()->get("kt_login_id"));
		if($user->user_id == 1){
			$this->editarpage = 1;
		}
	}

}