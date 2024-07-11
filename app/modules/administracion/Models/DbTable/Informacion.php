<?php 
/**
* clase que genera la insercion y edicion  de infopage en la base de datos
*/
class Administracion_Model_DbTable_Informacion extends Db_Table
{
	/**
	 * [ nombre de la tabla actual]
	 * @var string
	 */
	protected $_name = 'info_pagina';

	/**
	 * [ identificador de la tabla actual en la base de datos]
	 * @var string
	 */
	protected $_id = 'info_pagina_id';

	/**
	 * insert recibe la informacion de un infopage y la inserta en la base de datos
	 * @param  array Array array con la informacion con la cual se va a realizar la insercion en la base de datos
	 * @return integer      identificador del  registro que se inserto
	 */
	public function insert($data){
		$info_pagina_facebook = $data['info_pagina_facebook'];
		$info_pagina_instagram = $data['info_pagina_instagram'];
		$info_pagina_twitter = $data['info_pagina_twitter'];
		$info_pagina_pinterest = $data['info_pagina_pinterest'];
		$info_pagina_youtube = $data['info_pagina_youtube'];
		$info_pagina_flickr = $data['info_pagina_flickr'];
		$info_pagina_linkedin = $data['info_pagina_linkedin'];
		$info_pagina_google = $data['info_pagina_google'];
		$info_pagina_telefono = $data['info_pagina_telefono'];
		$info_pagina_whatsapp = $data['info_pagina_whatsapp'];
		$info_pagina_correos_contacto = $data['info_pagina_correos_contacto'];
		$info_pagina_direccion_contacto = $data['info_pagina_direccion_contacto'];
		$info_pagina_informacion_contacto = $data['info_pagina_informacion_contacto'];
		$info_pagina_informacion_contacto_footer = $data['info_pagina_informacion_contacto_footer'];
		$info_pagina_latitud = $data['info_pagina_latitud'];
		$info_pagina_longitud = $data['info_pagina_longitud'];
		$info_pagina_zoom = $data['info_pagina_zoom'];
		$info_pagina_descripcion = $data['info_pagina_descripcion'];
		$info_pagina_tags = $data['info_pagina_tags'];
		$info_pagina_robot = $data['info_pagina_robot'];
		$info_pagina_sitemap = $data['info_pagina_sitemap'];
		$info_pagina_scripts = $data['info_pagina_scripts'];
		$info_pagina_metricas = $data['info_pagina_metricas'];
		$query = "INSERT INTO info_pagina( info_pagina_facebook, info_pagina_instagram, info_pagina_twitter, info_pagina_pinterest, info_pagina_youtube, info_pagina_flickr, info_pagina_linkedin, info_pagina_google, info_pagina_telefono, info_pagina_whatsapp, info_pagina_correos_contacto, info_pagina_direccion_contacto, info_pagina_informacion_contacto, info_pagina_informacion_contacto_footer, info_pagina_latitud, info_pagina_longitud, info_pagina_zoom, info_pagina_descripcion, info_pagina_tags, info_pagina_robot, info_pagina_sitemap, info_pagina_scripts, info_pagina_metricas) VALUES ( '$info_pagina_facebook', '$info_pagina_instagram', '$info_pagina_twitter', '$info_pagina_pinterest', '$info_pagina_youtube', '$info_pagina_flickr', '$info_pagina_linkedin', '$info_pagina_google', '$info_pagina_telefono', '$info_pagina_whatsapp', '$info_pagina_correos_contacto', '$info_pagina_direccion_contacto', '$info_pagina_informacion_contacto', '$info_pagina_informacion_contacto_footer', '$info_pagina_latitud', '$info_pagina_longitud', '$info_pagina_zoom', '$info_pagina_descripcion', '$info_pagina_tags', '$info_pagina_robot', '$info_pagina_sitemap', '$info_pagina_scripts', 'info_pagina_metricas')";
		$res = $this->_conn->query($query);
        return mysqli_insert_id($this->_conn->getConnection());
	}

	/**
	 * update Recibe la informacion de un infopage  y actualiza la informacion en la base de datos
	 * @param  array Array Array con la informacion con la cual se va a realizar la actualizacion en la base de datos
	 * @param  integer    identificador al cual se le va a realizar la actualizacion
	 * @return void
	 */
	public function update($data,$id){
		
		$info_pagina_facebook = $data['info_pagina_facebook'];
		$info_pagina_instagram = $data['info_pagina_instagram'];
		$info_pagina_twitter = $data['info_pagina_twitter'];
		$info_pagina_pinterest = $data['info_pagina_pinterest'];
		$info_pagina_youtube = $data['info_pagina_youtube'];
		$info_pagina_flickr = $data['info_pagina_flickr'];
		$info_pagina_linkedin = $data['info_pagina_linkedin'];
		$info_pagina_google = $data['info_pagina_google'];
		$info_pagina_telefono = $data['info_pagina_telefono'];
		$info_pagina_whatsapp = $data['info_pagina_whatsapp'];
		$info_pagina_correos_contacto = $data['info_pagina_correos_contacto'];
		$info_pagina_direccion_contacto = $data['info_pagina_direccion_contacto'];
		$info_pagina_informacion_contacto = $data['info_pagina_informacion_contacto'];
		$info_pagina_informacion_contacto_footer = $data['info_pagina_informacion_contacto_footer'];
		$info_pagina_latitud = $data['info_pagina_latitud'];
		$info_pagina_longitud = $data['info_pagina_longitud'];
		$info_pagina_zoom = $data['info_pagina_zoom'];
		$info_pagina_descripcion = $data['info_pagina_descripcion'];
		$info_pagina_tags = $data['info_pagina_tags'];
		$info_pagina_robot = $data['info_pagina_robot'];
		$info_pagina_sitemap = $data['info_pagina_sitemap'];
		$info_pagina_scripts = $data['info_pagina_scripts'];
		$info_pagina_metricas = $data['info_pagina_metricas'];
		$query = "UPDATE info_pagina SET  info_pagina_facebook = '$info_pagina_facebook', info_pagina_instagram = '$info_pagina_instagram', info_pagina_twitter = '$info_pagina_twitter', info_pagina_pinterest = '$info_pagina_pinterest', info_pagina_youtube = '$info_pagina_youtube', info_pagina_flickr = '$info_pagina_flickr', info_pagina_linkedin = '$info_pagina_linkedin', info_pagina_google = '$info_pagina_google', info_pagina_telefono = '$info_pagina_telefono', info_pagina_whatsapp = '$info_pagina_whatsapp', info_pagina_correos_contacto = '$info_pagina_correos_contacto', info_pagina_direccion_contacto = '$info_pagina_direccion_contacto', info_pagina_informacion_contacto = '$info_pagina_informacion_contacto', info_pagina_informacion_contacto_footer = '$info_pagina_informacion_contacto_footer', info_pagina_latitud = '$info_pagina_latitud', info_pagina_longitud = '$info_pagina_longitud', info_pagina_zoom = '$info_pagina_zoom', info_pagina_descripcion = '$info_pagina_descripcion', info_pagina_tags = '$info_pagina_tags', info_pagina_robot = '$info_pagina_robot', info_pagina_sitemap = '$info_pagina_sitemap', info_pagina_scripts = '$info_pagina_scripts', info_pagina_metricas='$info_pagina_metricas' WHERE info_pagina_id = '".$id."'";
		$res = $this->_conn->query($query);
	}
}