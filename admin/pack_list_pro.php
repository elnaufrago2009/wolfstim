<?php 
	

	//conexion importa
  include '../conn.php';	


  // consulta sql pack list
  $results = $conn->query("SELECT * FROM packs")->fetch_all(MYSQLI_ASSOC);
  $results = json_encode($results);
	//print_r($results);
	echo $results;
	
?>