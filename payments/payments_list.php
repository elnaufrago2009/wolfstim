<?php
  include '../conn.php';
  $sql_payments = "select * from usuarios where acumulado != '0.00'";
  $sql_payments = $conn->query($sql_payments)->fetch_all(MYSQLI_ASSOC);
  echo json_encode($sql_payments);
?>