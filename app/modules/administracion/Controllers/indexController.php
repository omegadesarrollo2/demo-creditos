<?php 

/**
*
*/

class Administracion_indexController extends Controllers_Abstract
{

	protected $_csrf_section = "login_admin";

	public function indexAction()
	{
		$this->setLayout('administracion_login');
		$this->getLayout()->setTitle("ACCESO A USUARIO");
		$id = Session::getInstance()->get("kt_login_id");
		$level = Session::getInstance()->get("kt_login_level");
		if(isset($id) && $id > 0 && $level != 2 ){
			header('Location: /administracion/panel');
		}
		$csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$this->_view->csrf = $csrf;
		$this->_view->error_login = Session::getInstance()->get("error_login");
		Session::getInstance()->set("error_login","");
	}

	public function olvidoAction()
	{
		$this->setLayout('administracion_login');
		$this->getLayout()->setTitle("¿Haz olvidado tu contraseña?");
		$id = Session::getInstance()->get("kt_login_id");
		$level = Session::getInstance()->get("kt_login_level");
		if(isset($id) && $id > 0 && $level != 2 ){
			header('Location: /administracion/panel');
		}
		$csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$this->_view->csrf = $csrf;
		$this->_view->error_olvido = Session::getInstance()->get("error_olvido");
		Session::getInstance()->set("error_olvido","");
		$this->_view->mensaje_olvido = Session::getInstance()->get("mensaje_olvido");
		Session::getInstance()->set("mensaje_olvido","");
	}

	public function changepasswordAction()
    {
        $this->setLayout('administracion_login');
        $this->getLayout()->setTitle("Cambiar Contraseña");
        $user = $this->validarCodigo();
        if (isset($user['error'])) {
            if ($user['error'] == 1) {
                $this->_view->error = "Lo sentimos este codigo ya fue utilizado.";
            } else {
                $this->_view->error = "La información Suministrada es invalida.";
            }
        } else {
        	$this->_view->usuario = $user['user']->user_user;
        	new Core_Model_Csrf('nueva_contrasena');
            $csrf = Session::getInstance()->get('csrf')['nueva_contrasena'];
            $password = $this->_getSanitizedParam("password");
            $re_password = $this->_getSanitizedParam("re_password");
            if ($this->getRequest()->isPost() == true && $password == $re_password) {
                $id_user = $user['user']->user_id;
                $modelUser = new Core_Model_DbTable_User();
                $modelUser->changePassword($id_user, $password);
                $modelUser->editCode($id_user, $csrf);
                $this->_view->message = "Sea cambiado su contraseña satisfactoriamente.";
            } else {
                $this->_view->code = $this->_getSanitizedParam("code");
                $this->_view->usuario = $user['user']->user_user;
                $this->_view->csrf = $this->_getSanitizedParam("csrf");
            }
        }
    }


    protected function validarCodigo()
    {
        $res = [];
        $code =  base64_decode($this->_getSanitizedParam("code"));
        if (isset($code) && $this->isJson($code)== true) {
            $code = json_decode($code, true);
            $modelUser = new Core_Model_DbTable_User();
            if (isset($code['user'])) {
                $user = $modelUser->getById($code['user']);
                if (isset($user->user_id)) {
                    if ($user->user_code == $code['code']) {
                        $res['user'] = $user;
                    } else {
                        $res['error'] =  1;
                        $res['user'] = $user;
                    }
                } else {
                    $res['error'] =  2;
                }
            } else {
                $res['error'] =  3;
            }
        } else {
            $res['error'] =  4;
        }
        return $res;
    }

    /**
     * verifica si una cadena es de tipo json
     * @param  string  $string cadena a evaluar
     * @return boolean    resultado de la evaluacion
     */
    private function isJson($string)
    {
        return ((is_string($string) && (is_object(json_decode($string)) || is_array(json_decode($string))))) ? true : false;
    }
}