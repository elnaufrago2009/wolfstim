<?php 

	/*
	 *	Archivo que procesa si va salir el formulario de envio de pago
	*/



  //conexion importa
  include '../conn.php';


  //datos recibidos por get
  $userid 		=		$_GET['userid'];  



  // consulta si hay
  $sql_info_pending = "SELECT count(*) cantidad FROM user_pack where user_id=$userid and estado=0";  
  $info_pending = $conn->query($sql_info_pending)->fetch_array(MYSQLI_ASSOC);
  $cantidad = $info_pending['cantidad'];
  if ($cantidad > 0) {
    echo 'true';
  }else {
    echo 'false';
  }
  

?>