<?php 
/**
* clase que genera la insercion y edicion  de Usuarios ItSign en la base de datos
*/
class Administracion_Model_DbTable_Itusers extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'it_users';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'id';

	/**
	 * insert recibe la informacion de un Usuarios ItSign y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$it_id = $data['it_id'];
		$it_user = $data['it_user'];
		$it_email = $data['it_email'];
		$query = "INSERT INTO it_users( it_id, it_user, it_email) VALUES ( '$it_id', '$it_user', '$it_email')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un Usuarios ItSign  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$it_id = $data['it_id'];
		$it_user = $data['it_user'];
		$it_email = $data['it_email'];
		$query = "UPDATE it_users SET  it_id = '$it_id', it_user = '$it_user', it_email = '$it_email' WHERE id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}