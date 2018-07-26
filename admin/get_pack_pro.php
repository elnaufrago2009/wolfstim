<?php 
	

	//conexion importa
  include '../conn.php';


  // id pack
  $pack_id = $_GET['pack_id'];
  $user_id = $_GET['user_id'];


  // busca si hay pedidos previous
  $sql_order_previous = "SELECT * FROM user_pack where user_id=$user_id and estado=0";
  $result_order_previous = mysqli_query($conn,$sql_order_previous);
  $row_order_previous = mysqli_fetch_array($result_order_previous,MYSQLI_ASSOC);  
  $count = mysqli_num_rows($result_order_previous);
  //$row_order_previous['envio'] = 'previous';
  //echo json_encode($row_order_previous);
  
  
  // compara si hay pacquetes previous
  if($count == 1) {

    // si hay un pedido anterior    
    //echo json_encode($row_order_previous);
    $new_pack_id = $row_order_previous['pack_id'];
    $sql = "SELECT * FROM packs where id=$new_pack_id";


    // asignamos un identificador al tipo de envio
    $envio = 'previous';


  }else {

    // consulta del nuevo pack
    $sql = "SELECT * FROM packs where id=$pack_id";    

    // tipo identificador envio
    $envio = 'new_order';
  }

  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $row['envio'] = $envio;
  echo json_encode($row);
  
  

	
	
?>