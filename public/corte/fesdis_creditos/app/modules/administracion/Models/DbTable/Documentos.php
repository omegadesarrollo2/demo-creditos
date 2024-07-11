<?php 
/**
* clase que genera la insercion y edicion  de documentos en la base de datos
*/
class Administracion_Model_DbTable_Documentos extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'documentos';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'id';

	/**
	 * insert recibe la informacion de un documentos y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$solicitud = $data['solicitud'];
		$cedula = $data['cedula'];
		$desprendible_pago = $data['desprendible_pago'];
		$desprendible_pago2 = $data['desprendible_pago2'];
		$desprendible_pago3 = $data['desprendible_pago3'];
		$desprendible_pago4 = $data['desprendible_pago4'];
		$certificado_laboral = $data['certificado_laboral'];
		$otros_ingresos = $data['otros_ingresos'];
		$certificado_tradicion = $data['certificado_tradicion'];
		$estado_obligacion = $data['estado_obligacion'];
		$estado_obligacion2 = $data['estado_obligacion2'];
		$estado_obligacion3 = $data['estado_obligacion3'];
		$factura_proforma = $data['factura_proforma'];
		$recibo_matricula = $data['recibo_matricula'];
		$contrato_vivienda = $data['contrato_vivienda'];
		$orden_medica = $data['orden_medica'];
		$certificacion = $data['certificacion'];
		$cotizacion = $data['cotizacion'];
		$peritaje_vehiculo = $data['peritaje_vehiculo'];
		$evidencia_calamidad = $data['evidencia_calamidad'];
		$declaracion_renta = $data['declaracion_renta'];
		$impuesto_vehiculo = $data['impuesto_vehiculo'];
		$soat = $data['soat'];
		$tipo = $data['tipo'];
		$query = "INSERT INTO documentos( solicitud, cedula, desprendible_pago, desprendible_pago2, desprendible_pago3, desprendible_pago4, certificado_laboral, otros_ingresos, certificado_tradicion, estado_obligacion, estado_obligacion2, estado_obligacion3, factura_proforma, recibo_matricula, contrato_vivienda, declaracion_renta, orden_medica, certificacion, cotizacion, peritaje_vehiculo,evidencia_calamidad,impuesto_vehiculo,soat,tipo) VALUES ( '$solicitud', '$cedula', '$desprendible_pago', '$desprendible_pago2', '$desprendible_pago3', '$desprendible_pago4', '$certificado_laboral', '$otros_ingresos', '$certificado_tradicion', '$estado_obligacion', '$estado_obligacion2', '$estado_obligacion3', '$factura_proforma', '$recibo_matricula', '$contrato_vivienda', '$declaracion_renta', '$orden_medica', '$certificacion', '$cotizacion', '$peritaje_vehiculo', '$evidencia_calamidad','$impuesto_vehiculo','$soat', '$tipo')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	public function insert2($data){
		$solicitud = $data['solicitud'];
		$tipo = $data['tipo'];
		$query = "INSERT INTO documentos( solicitud, tipo) VALUES ( '$solicitud', '$tipo')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un documentos  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$solicitud = $data['solicitud'];
		$cedula = $data['cedula'];
		$desprendible_pago = $data['desprendible_pago'];
		$desprendible_pago2 = $data['desprendible_pago2'];
		$desprendible_pago3 = $data['desprendible_pago3'];
		$desprendible_pago4 = $data['desprendible_pago4'];
		$certificado_laboral = $data['certificado_laboral'];
		$otros_ingresos = $data['otros_ingresos'];
		$certificado_tradicion = $data['certificado_tradicion'];
		$estado_obligacion = $data['estado_obligacion'];
		$estado_obligacion2 = $data['estado_obligacion2'];
		$estado_obligacion3 = $data['estado_obligacion3'];
		$factura_proforma = $data['factura_proforma'];
		$recibo_matricula = $data['recibo_matricula'];
		$contrato_vivienda = $data['contrato_vivienda'];
		$orden_medica = $data['orden_medica'];
		$certificacion = $data['certificacion'];
		$cotizacion = $data['cotizacion'];
		$peritaje_vehiculo = $data['peritaje_vehiculo'];
		$evidencia_calamidad = $data['evidencia_calamidad'];
		$declaracion_renta = $data['declaracion_renta'];
		$impuesto_vehiculo = $data['impuesto_vehiculo'];
		$soat = $data['soat'];
		$tipo = $data['tipo'];
		$query = "UPDATE documentos SET  solicitud = '$solicitud', cedula = '$cedula', desprendible_pago = '$desprendible_pago', desprendible_pago2 = '$desprendible_pago2', desprendible_pago3 = '$desprendible_pago3', desprendible_pago4 = '$desprendible_pago4', certificado_laboral = '$certificado_laboral', otros_ingresos = '$otros_ingresos', certificado_tradicion = '$certificado_tradicion', estado_obligacion = '$estado_obligacion', estado_obligacion2 = '$estado_obligacion2', estado_obligacion3 = '$estado_obligacion3', factura_proforma = '$factura_proforma', recibo_matricula = '$recibo_matricula', contrato_vivienda = '$contrato_vivienda', declaracion_renta = '$declaracion_renta', orden_medica = '$orden_medica', certificacion = '$certificacion', cotizacion = '$cotizacion', peritaje_vehiculo = '$peritaje_vehiculo', evidencia_calamidad = '$evidencia_calamidad',impuesto_vehiculo = '$impuesto_vehiculo',soat = '$soat', tipo = '$tipo' WHERE id = '".$id."'";
		$res = $this->_conn->query($query);
	}


    public function editar($field,$value,$solicitud,$tipo){
        $query =' UPDATE '.$this->_name.' SET '.$field.' = "'.$value.'" WHERE solicitud="'.$solicitud.'" AND tipo="'.$tipo.'" ';
        //echo $query."<br>";
        $res = $this->_conn->query($query);
    }

}