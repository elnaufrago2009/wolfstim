<?php 

	/*
	 *	Archivo que procesa el ingreso de los nuevos Packs
	*/

  //conexion importa
  include '../conn.php';


	//datos recibidos
  $pack_id          =     $_GET['pack_id'];
  $user_id          =     $_GET['user_id'];
  $created          =     date('Y-m-d');


  


  if($count == 1) {
    // si hay un pedido anterior
    echo 'previous';
  }else {
    // si no hay un pedido anterior
    // insercion del pedido
    $sql = "INSERT INTO user_pack (
                              pack_id,
                              user_id,
                              created                              
                            ) VALUES (
                              '$pack_id',
                              '$user_id',
                              '$created'
                            )";
    if ($conn->query($sql) === TRUE) {
    echo "ok";
    } else {
      echo $conn->error;
    }
  }

  

  // cierra la conexion
  $conn->close();

?>