<?php 

	/*
	 *	Archivo que procesa el ingreso de los nuevos Packs
	*/

  //conexion importa
  include '../conn.php';


	//datos recibidos
  $userid          =     $_GET['userid'];


  $sql_info_pending = "SELECT * FROM user_pack where user_id=$userid and estado=0";  
  $info_pending = $conn->query($sql_info_pending)->fetch_array(MYSQLI_ASSOC);
  $created = $info_pending['created'];
  $packid = $info_pending['pack_id'];



  $sql_updated = "UPDATE user_pack SET estado=1 WHERE pack_id=$packid and user_id=$userid and created='$created'";
  if (mysqli_query($conn, $sql_updated)) {
    echo "true";
  } else {
    echo $conn->error;
  }


  // cierra la conexion
  $conn->close();

?>