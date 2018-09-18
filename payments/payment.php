<?php
  include '../conn.php';
  $user_id = $_GET['user_id'];
  $date_payment = date('Y-m-d');

  // consulta acumulado
  $user_acumulado = "select * from usuarios where id='$user_id'";
  $user_acumulado = $conn->query($user_acumulado)->fetch_array(MYSQLI_ASSOC);
  $user_acumulado = $user_acumulado['acumulado'];

  // insert payment
  $insert_payment = "insert into payments (user_id,date_payment,quantity) values ('$user_id','$date_payment','$user_acumulado') ";
  $conn->query($insert_payment);

  // update users
  $update_payment = "update usuarios set acumulado = '0.00' where id=$user_id";
  $conn->query($update_payment);

  // renew usuarios list
  $new_payments = "select * from usuarios where acumulado != '0.00'";
  $new_payments = $conn->query($new_payments)->fetch_all(MYSQLI_ASSOC);

  echo json_encode($new_payments);

?>