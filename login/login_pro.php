<?php 

	/*
	 *	Archivo que procesa el ingreso de los nuevos Packs
	*/



  //conexion importa
  include '../conn.php';


  // Recoge las variables del post de la vista
  $post = json_decode(file_get_contents('php://input'), true);



  //datos recibidos
  $doc 							=     $post['doc'];
  $password		      =     $post['password'];


  // validamos si es dni o correo  
  $valida = strpos($doc, '@');

  if ($valida === false) { 

    // validar DNI
    $sql = "SELECT * FROM usuarios where dni='$doc' and password='$password'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

  }else{

    // validar CORREO
    $sql = "SELECT * FROM usuarios where correo='$doc' and password='$password'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);  

  	

  }  

  $count = mysqli_num_rows($result);


  // si existe un registro
	if($count == 1) {

    // inicia session
    session_start();
    $_SESSION['doc']    = $doc;
    $_SESSION['activo'] = $row['activo'];  
    $_SESSION['userid'] = $row['id'];
     echo 'ok';
  }else {
     echo 'no';
  }	

	
?>