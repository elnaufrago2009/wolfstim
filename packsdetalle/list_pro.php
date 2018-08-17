<?php 
	
	/*
	 *
	 * Archivo que procesa la lista de destalles de un pack
	 * ****************************************************
	 *
	*/




	//conexion importa
  include '../conn.php';


  //receibe get variable
  $id_pack = $_GET['packid'];

  // consulta sql
  $results = $conn->query("SELECT * FROM detalle_packs where id_pack=$id_pack")->fetch_all(MYSQLI_ASSOC);
  $results = json_encode($results);
	//print_r($results);
	echo $results;
	
?>