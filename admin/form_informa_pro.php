<?php 


	/*
	 *	Archivo que procesa si va salir el formulario de envio de pago
	*/



  //conexion importa
  include '../conn.php';


  //datos recibidos por get
  $userid 		=		$_GET['userid'];  



  // consulta si hay 
  $informaPendientes = $conn->query("SELECT * FROM user_pack where user_id=$user_id and estado=0")->fetch_array(MYSQLI_ASSOC);

  

  echo 'true';

?>