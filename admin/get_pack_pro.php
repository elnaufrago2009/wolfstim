<?php 
	/*
    mysqli_fetch_array devuelve una sola fila, limita y bloquea la memoria para uno solo
    mysqli_fetch_all devuelve todo el array en uno solo

    si estado_cero >= 1  quiere decir que tiene uno pediente ya
    select count(*) estado_cero from user_pack where user_id=31 and estado in (0,1)

    si estado_cero = 0 entonces no tiene uno pendiente,
    si va entrar pero hay que consultar el ultimo ingresado si ya esta activo
    o si no tiene ultimo es primera vez.
    select count(*) estado_count from user_pack where user_id=31 and estado in (2)

    si estado_coun >= 1 entonces comparar si la (fecha actual - updated ) < 30 entonces esta
    activo y no se puede crear el pedido del pack
    select *
    select update from user_pack  order by id desc  limit 1;  sacamos la fecha y con php restamos 30
  */

	//conexion importa
  include '../conn.php';


  // id pack
  $pack_id = $_GET['pack_id'];
  $user_id = $_GET['user_id'];


  // consulta estados 0 y 1 si hay no entra
  $preestado = $conn->query("SELECT count(*) estado_cero FROM user_pack where user_id=$user_id and estado in (0,1)")->fetch_array(MYSQLI_ASSOC);
 
  

  // tiene un paquete pendiente
  if($preestado['estado_cero'] == 0) {
    // entra y hay que seguir comprobando
    // entonces estado_count > 0 entonces es antiguo no es primera vez     
    $completado = $conn->query("SELECT count(*) estado_count from user_pack where user_id=$user_id and estado in (2)")->fetch_array(MYSQLI_ASSOC);

    // si tiene pedidos anteriores entra pero no pendientes
    if ($completado['estado_count'] > 0) {
      //el ultimo paquete saca la fecha
      $antiguo = $conn->query("SELECT * from user_pack where user_id=$user_id and estado in (2) order by id desc limit 1")->fetch_array(MYSQLI_ASSOC);      
      $fecha_pack = strtotime($antiguo['updated']); // convierte a segundos en un referente
      $fecha_actual = strtotime(date('Y-m-d')); // convierte a segundos
      $diferencia = floor(($fecha_actual - $fecha_pack)/3600/24); // convierte de segundos a dias

      if ($diferencia<=30) {
        $id_antiguo = $antiguo['pack_id'];
        $respuesta = $conn->query("SELECT * FROM packs where id=$id_antiguo")->fetch_array(MYSQLI_ASSOC);
        $respuesta['guardar'] = 'no';
        echo json_encode($respuesta);        
      }else {
        // insert
        
        //$created = date('Y-m-d');
        //$sql = "INSERT INTO user_pack (pack_id,user_id,created) VALUES ('$pack_id','$user_id','$created')";
        //if ($conn->query($sql) === TRUE) {
          // entro normal
        //}

        $respuesta = $conn->query("SELECT * FROM packs where id=$pack_id")->fetch_array(MYSQLI_ASSOC);
        $respuesta['guardar'] = 'si';
        echo json_encode($respuesta);
      }
      
    }else{
      //entra todo ok $completado['estado_count'] == 0
      $respuesta = $conn->query("SELECT * FROM packs where id=$pack_id")->fetch_array(MYSQLI_ASSOC);
      $respuesta['guardar'] = 'si';
      echo json_encode($respuesta);
    }



  }else {
    // no entra y no hay mas
    // busca el antiguo por que hay un estado 0,1
    $antiguo = $conn->query("SELECT * from user_pack where user_id=$user_id and estado in (0,1) order by id desc limit 1")->fetch_array(MYSQLI_ASSOC);
    $id_antiguo = $antiguo['pack_id'];
    $respuesta = $conn->query("SELECT * FROM packs where id=$id_antiguo")->fetch_array(MYSQLI_ASSOC);
    $respuesta['guardar'] = 'no';
    echo json_encode($respuesta);
  }
  

  //echo json_encode($row_order_previous);
  
  

	
	
?>