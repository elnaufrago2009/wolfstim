<?php 

	//conexion importa
  include '../conn.php';	

  // variables
  $user_id = $_GET['user_id'];

  // consulta sql pack list
  $results = $conn->query("SELECT user_pack.id,user_pack.fecha_envio_pago,packs.descripcion, packs.costo, user_pack.created, user_pack.updated, user_pack.estado FROM user_pack join packs on packs.id=user_pack.pack_id WHERE user_id='$user_id' order by user_pack.id desc")->fetch_all(MYSQLI_ASSOC);
  $results = json_encode($results);
	//print_r($results);
	echo $results;

?>