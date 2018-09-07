<?php

  include '../conn.php';
  session_start();
  if (isset($_SESSION['doc'])){
    $id = json_decode(file_get_contents('php://input'), true);
    $sql_delete = "DELETE FROM user_pack WHERE id=$id";
    $conn->query($sql_delete);
    echo 'ok';
  }else{
    echo 'no';
  }
?>