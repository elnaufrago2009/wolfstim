<?php 

  session_start();
  //conexion importa
  include '../conn.php';
  if (isset($_SESSION['doc'])){
    //datos recibidos
    $pack_id          =     $_GET['pack_id'];
    $user_id          =     $_GET['user_id'];
    $created          =     date('Y-m-d');

    $sql = "INSERT INTO user_pack (pack_id,user_id,created) VALUES ('$pack_id','$user_id','$created')";
    $conn->query($sql);
    $conn->close();
    echo 'ok';
  }else{
    echo 'no';
  }
?>