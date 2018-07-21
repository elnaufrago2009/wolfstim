<?php 
	
	/*
	 *
	 * Archivo que procesa la lista de destalles de un pack
	 * ****************************************************
	 *
	*/




	//conexion importa
  include '../conn.php';



  // consulta sql
  $results = $conn->query("SELECT * FROM detalle_packs")->fetch_all(MYSQLI_ASSOC);
  $results = json_encode($results);
	//print_r($results);
	echo $results;
	
?>