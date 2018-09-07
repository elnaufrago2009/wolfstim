<?php 

	/*
	 *	Archivo que procesa el ingreso de los nuevos Packs
	*/


  session_start();

  //conexion importa
  include '../conn.php';
  // Recoge las variables del post de la vista
  $post = json_decode(file_get_contents('php://input'), true);


	//datos recibidos
  $userid          =     $_SESSION['userid'];
  $codigo       =   $post['codigo'];
  $descripcion  =   $post['descripcion'];


  $sql_info_pending = "SELECT * FROM user_pack where user_id=$userid and estado=0";  
  $info_pending = $conn->query($sql_info_pending)->fetch_array(MYSQLI_ASSOC);
  $created = $info_pending['created'];
  $packid = $info_pending['pack_id'];
  $fecha_envio_pago = date('Y-m-d');


  if (strlen($codigo) > 3) {
    $sql_updated = "UPDATE user_pack SET estado=1, pago_operacion='$codigo', pago_descripcion='$descripcion', fecha_envio_pago='$fecha_envio_pago' WHERE pack_id=$packid and user_id=$userid and created='$created'";
    if (mysqli_query($conn, $sql_updated)) {
      echo "true";
    } else {
      echo $conn->error;
    }  
  }else{
    echo 'false';
  }
  


  // cierra la conexion
  $conn->close();

?>