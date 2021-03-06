<?php

  //conexion
  include '../conn.php';

  session_start();
  $user_id = $_SESSION['userid'];

  # Lista las ordenes de verificacion de pago
  $sql_pagos_list = $conn->query("SELECT usuarios.nombre,user_pack.pack_id,usuarios.arbol_patrocinador,usuarios.arbol_padre, packs.descripcion,user_pack.id,case when (select count(*) cantidad from user_pack where user_id=usuarios.id) = 1 then 'si' else 'no' end cantidad,usuarios.id user_id,user_pack.pago_operacion,packs.costo, user_pack.created,user_pack.fecha_envio_pago, user_pack.updated, user_pack.estado FROM user_pack join packs on packs.id=user_pack.pack_id join usuarios on usuarios.id=user_pack.user_id WHERE estado=1 order by user_pack.id desc")->fetch_all(MYSQLI_ASSOC);
  echo json_encode($sql_pagos_list);

?>