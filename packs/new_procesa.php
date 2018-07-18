<?php 


	/*
	 *	Archivo que procesa el ingreso de los nuevos Packs
	*/


	// Recoge las variables del post de la vista
  $post = json_decode(file_get_contents('php://input'), true);

  //conexion importa
  include '../conn.php';

  //datos recibidos
  $codigo = $post['codigo'];

  echo $codigo;

	



?>