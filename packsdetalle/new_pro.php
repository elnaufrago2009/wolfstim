<?php 


	/*
	 *	Archivo que procesa el ingreso de los nuevos PacksDetalles
	*/



  //conexion importa
  include '../conn.php';





	// Recoge las variables del post de la vista
  $post = json_decode(file_get_contents('php://input'), true);




  //datos recibidos
  $descripcion      =     $post['descripcion'];
  $cantidad         =     $post['cantidad'];
  $precio           =     $post['precio'];
  $id_pack          =     $post['id_pack'];
  $activo           =     $post['activo'];



  // insercion
  $sql = "INSERT INTO detalle_packs (                              
                              descripcion,
                              cantidad,
                              precio,
                              id_pack,
                              activo
                            ) VALUES (
                              '$descripcion',
                              '$cantidad',
                              '$precio',
                              '$id_pack',
                              '$activo'
                            )";

  if ($conn->query($sql) === TRUE) {
    echo "ok";
  } else {
    echo $conn->error;
  }

  $conn->close();

?>