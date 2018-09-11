<?php

  // Recoge las variables del post de la vista
  $registro = json_decode(file_get_contents('php://input'), true);

  //conexion importa
  include '../conn.php';

  $error = array();

  //datos recibidos
  $dni = $registro['dni'];
  $correo = $registro['correo'];
  $password = $registro['password'];
  $rpassword = $registro['rpassword'];
  $nombres = $registro['nombres'];
  $celular = $registro['celular'];
  $dni_padre = $registro['dni_padre'];
  $arbol_patrocinador = $registro['arbol_patrocinador'];




  // valida que exitan los campos
  if (strlen($dni) == 8 && strlen($password) > 2 && strlen($rpassword) > 2 && strlen($nombres) > 2 && strlen($dni_padre) == 8 && strlen($arbol_patrocinador) == 8 && $dni != $dni_padre && $password == $rpassword){

    // dni hijo unico
    $sql_dni_hijo_unico = "select count(*) dni_hijo from usuarios where dni='$dni'";
    $sql_dni_hijo_unico = $conn->query($sql_dni_hijo_unico)->fetch_array(MYSQLI_ASSOC);    

    // dni padre unico
    $sql_dni_padre_unico = "select count(*) dni_padre from usuarios where dni='$dni_padre'";
    $sql_dni_padre_unico = $conn->query($sql_dni_padre_unico)->fetch_array(MYSQLI_ASSOC);

    //spacio de 4 padre, de 1 en adelante
    $sql_spacio_padre   =  "select count(*) espacio_padre from usuarios where dni='$dni_padre' and  (arbol_hijo1 = 0 or arbol_hijo2 = 0 or arbol_hijo3 = 0 or arbol_hijo4 = 0)";
    $sql_spacio_padre = $conn->query($sql_spacio_padre)->fetch_array(MYSQLI_ASSOC);

    //patrocinador existe
    $sql_patrocinador = "select count(*) count_dni_patrocinador from usuarios where dni='$arbol_patrocinador'";
    $sql_patrocinador = $conn->query($sql_patrocinador)->fetch_array(MYSQLI_ASSOC);

    

    if ($sql_dni_hijo_unico['dni_hijo'] == 0  && $sql_dni_padre_unico['dni_padre'] == 1 && $sql_patrocinador['count_dni_patrocinador'] == 1 && $sql_spacio_padre['espacio_padre'] > 0) {

      // id patrocinador
      $id_patrocinador = "select * from usuarios where dni='$arbol_patrocinador'";
      $id_patrocinador = $conn->query($id_patrocinador)->fetch_array(MYSQLI_ASSOC);
      $id_patrocinador = $id_patrocinador['id'];

      //id padre
      $id_padre = "select * from usuarios where dni='$dni_padre'";
      $id_padre = $conn->query($id_padre)->fetch_array(MYSQLI_ASSOC);
      $id_padre = $id_padre['id'];

      // insercion usuario nuevo
      $sql_insert = "INSERT INTO usuarios (dni,correo,password,nombre,celular,arbol_padre,arbol_patrocinador) VALUES ('$dni','$correo','$password','$nombres','$celular','$id_padre','$id_patrocinador')";
      $conn->query($sql_insert);


      // Login
      session_start();
      if ($correo != '') {         
        $sql_login = "SELECT * FROM usuarios where correo='$correo' and password='$password'";        
        $sql_login = $conn->query($sql_login)->fetch_array(MYSQLI_ASSOC);        
        $_SESSION['doc']    = $correo;
      }else {        
        $sql_login = "SELECT * FROM usuarios where dni='$dni' and password='$password'";        
        $sql_login = $conn->query($sql_login)->fetch_array(MYSQLI_ASSOC);
        $_SESSION['doc']    = $dni;
      }
      $_SESSION['activo'] = $sql_login['activo'];  
      $_SESSION['userid'] = $sql_login['id'];
      $_SESSION['name']   = $sql_login['nombre'];
      $_SESSION['tipuser'] = $sql_login['tipuser'];
      $_SESSION['activo'] = $sql_login['activo'];
      // end Login

      $error['estado']  = 'ok';
      $error['mensaje'] = 'Todo el registro salio bien'; 
     
    }else {
      $error['estado']  = 'no';
      $error['mensaje'] = 'Hay un error en alguno de los Datos ingresados';  
    }    
  }else{
    $error['estado']  = 'no';
    $error['mensaje'] = 'Hay un error en alguno de los Datos ingresados';
    
  }

  echo json_encode($error);


?>
