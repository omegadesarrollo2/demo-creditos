<?php 
/**
* clase que genera la insercion y edicion  de Usuarios en la base de datos
*/
class Administracion_Model_DbTable_Usuario extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'user';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'user_id';

	/**
	 * insert recibe la informacion de un Usuario y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$user_state = $data['user_state'];
		$user_date = $data['user_date'];
		$user_names = $data['user_names'];
		$user_email = $data['user_email'];
		$user_level = $data['user_level'];
		$user_user = $data['user_user'];
		$user_password = password_hash($data['user_password'], PASSWORD_DEFAULT);
		$user_delete = $data['user_delete'];
		$user_current_user = $data['user_current_user'];
		$user_code = $data['user_code'];
		$user_password_fecha = date("Y-m-d");
		$user_telefono = $data['user_telefono'];
		$user_celular = $data['user_celular'];
		$user_regional = $data['user_regional'];
		$query = "INSERT INTO user( user_regional,user_state, user_date, user_names, user_email, user_level, user_user, user_password, user_delete, user_current_user, user_code, user_password_fecha,user_telefono,user_celular) VALUES ( '$user_regional','$user_state', '$user_date', '$user_names', '$user_email', '$user_level', '$user_user', '$user_password', '$user_delete', '$user_current_user', '$user_code','$user_password_fecha','$user_telefono','$user_celular')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un Usuario  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){

		$user_state = $data['user_state'];
		$user_date = $data['user_date'];
		$user_names = $data['user_names'];
		$user_email = $data['user_email'];
		$user_level = $data['user_level'];
		$user_user = $data['user_user'];
		$changepasword = '';
		$user_password_fecha = date("Y-m-d");
        if($data['user_password']!=''){
            $user_password = password_hash($data['user_password'], PASSWORD_DEFAULT);
            $changepasword = " , user_password = '$user_password', user_password_fecha='$user_password_fecha' ";
        }
		$user_delete = $data['user_delete'];
		$user_current_user = $data['user_current_user'];
		$user_code = $data['user_code'];
		$user_telefono = $data['user_telefono'];
		$user_celular = $data['user_celular'];
		$user_regional = $data['user_regional'];
		$query = " UPDATE user SET  user_regional = '$user_regional', user_state = '$user_state', user_names = '$user_names', user_email = '$user_email', user_level = '$user_level', user_user = '$user_user', user_delete = '$user_delete', user_current_user = '$user_current_user', user_code = '$user_code' $changepasword, user_telefono='$user_telefono', user_celular='$user_celular'  WHERE user_id = '".$id."' ";
		$res = $this->_conn->query($query);
	}
}