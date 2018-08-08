<?php 


	//conexion importa
  include '../conn.php';





	// Recoge las variables del post de la vista
  $post = json_decode(file_get_contents('php://input'), true);




  //datos recibidos
  $codigo           =     $post['codigo'];
  $descripcion      =     $post['descripcion'];
  $costo            =     $post['costo'];
  $activo           =     $post['activo'];
  $image            =     $post['image'];



  // insercion
  $sql = "INSERT INTO packs (
                              codigo,
                              descripcion,
                              costo,
                              activo,
                              image
                            ) VALUES (
                              '$codigo',
                              '$descripcion',
                              '$costo',
                              '$activo',
                              '$image'
                            )";

  if ($conn->query($sql) === TRUE) {
    echo "ok";
  } else {
    echo $conn->error;
  }

  $conn->close();

	echo 'true';

?>