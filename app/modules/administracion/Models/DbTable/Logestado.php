<?php 
/**
* clase que genera la insercion y edicion  de log estados en la base de datos
*/
class Administracion_Model_DbTable_Logestado extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'log_estado';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'id';

	/**
	 * insert recibe la informacion de un log estados y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$solicitud = $data['solicitud'];
		$estado = $data['estado'];
		$usuario = $data['usuario'];
		$fecha = $data['fecha'];
    $observacion = $data['observacion'];
		$query = "INSERT INTO log_estado( solicitud, estado, usuario, fecha, observacion) VALUES ( '$solicitud', '$estado', '$usuario', '$fecha', '$observacion')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un log estados  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$solicitud = $data['solicitud'];
		$estado = $data['estado'];
		$usuario = $data['usuario'];
		$fecha = $data['fecha'];
    $observacion = $data['observacion'];
		$query = "UPDATE log_estado SET  solicitud = '$solicitud', estado = '$estado', usuario = '$usuario', fecha = '$fecha', observacion = '$observacion' WHERE id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}