<?php 

	// BD
	include '../conn.php';

  // paramtros get
  $user_pack_id = $_GET['pedido_id'];
  $user_id = $_GET['user_id'];
  $cantidad = $_GET['cantidad'];
  $arbol_patrocinador = $_GET['arbol_patrocinador']; // id patrocinador
  $arbol_padre = $_GET['arbol_padre'];
  $pack_id = $_GET['pack_id'];
  $uno_level = '1';


	// niveles
  $uno = 0.045; // 9 soles
  $dos = 0.045; // 9 soles
  $tres = 0.05; // 10 soles
  $cuatro = 0.035; // 7 soles
  $cinco = 0.015; // 3 soles
  $seis = 0.01; // 2 soles
  $siete = 0.01; // 2 soles

	// actualiza el estado del pedido paquete
	$updated = "UPDATE user_pack set estado=2 WHERE id=$user_pack_id";
  $conn->query($updated);

  // actualiza el usuario a activo = 1
  $update_usuario_activo = "UPDATE usuarios set activo=1 WHERE id=$user_id";
  $conn->query($update_usuario_activo);


  // BONO WOLFSTIM
  // defina el pase de nivel
  $pase = 1;

  // precio pack
  $pack_precio = $conn->query("select * from packs where id=$pack_id")->fetch_array(MYSQLI_ASSOC);



  // NIVEL UNO
  // ***********************
  if ($pase == 1){
    $nivel_uno = $conn->query("select id,acumulado,arbol_padre,arbol_nivel from usuarios where id=$arbol_padre")->fetch_array(MYSQLI_ASSOC);
    $acumulado_uno = number_format(($nivel_uno['acumulado'] + $pack_precio['costo'] * $uno),2,'.','');

    // nivel usuario
    if ($nivel_uno['arbol_nivel'] < 1){
      $update_arbol_nivel_uno = 1;
    }else{
      $update_arbol_nivel_uno = $nivel_uno['arbol_nivel'];
    }

    // update usuario nive1 01
    $nivel_uno_update = "update usuarios set acumulado = $acumulado_uno, arbol_nivel = $update_arbol_nivel_uno where id=$arbol_padre";
    $conn->query($nivel_uno_update);

    // pase nivel uno
    if ($nivel_uno['id'] == $uno_level){
      $pase = 0;
    }

  }


  // NIVEL DOS
  // ***********************
  if ($pase == 1){

    // usuario nivel dos
    $nivel_dos = $conn->query("select id,acumulado,arbol_padre,arbol_nivel from usuarios where id=".$nivel_uno['arbol_padre'])->fetch_array(MYSQLI_ASSOC);
    $acumulado_dos = number_format(($nivel_dos['acumulado'] + $pack_precio['costo'] * $dos),2,'.','');

    // nivel usuario
    if ($nivel_dos['arbol_nivel'] < 2){
      $update_arbol_nivel_dos = 2;
    }else{
      $update_arbol_nivel_dos = $nivel_dos['arbol_nivel'];
    }

    // update usuario nivel 2
    $nivel_dos_update = "update usuarios set acumulado = $acumulado_dos, arbol_nivel = $update_arbol_nivel_dos where id=".$nivel_uno['arbol_padre'];
    $conn->query($nivel_dos_update);

    // pase nivel dos
    if ($nivel_dos['id'] == $uno_level){
      $pase = 0;
    }

  }


  // NIVEL TRES
  // *************************
  if ($pase == 1){

    // usuario nivel dos
    $nivel_tres = $conn->query("select id,acumulado,arbol_padre,arbol_nivel from usuarios where id=".$nivel_dos['arbol_padre'])->fetch_array(MYSQLI_ASSOC);
    $acumulado_tres = number_format(($nivel_tres['acumulado'] + $pack_precio['costo'] * $tres),2,'.','');

    // nivel usuario
    if ($nivel_tres['arbol_nivel'] < 3){
      $update_arbol_nivel_tres = 3;
    }else{
      $update_arbol_nivel_tres = $nivel_tres['arbol_nivel'];
    }

    // update usuario nivel 2
    $nivel_tres_update = "update usuarios set acumulado = $acumulado_tres, arbol_nivel = $update_arbol_nivel_tres where id=".$nivel_dos['arbol_padre'];
    $conn->query($nivel_tres_update);

    // pase nivel dos
    if ($nivel_tres['id'] == $uno_level){
      $pase = 0;
    }
  }




  // NIVEL CUATRO
  // *************************
  if ($pase == 1){

    // usuario nivel dos
    $nivel_cuatro = $conn->query("select id,acumulado,arbol_padre,arbol_nivel from usuarios where id=".$nivel_tres['arbol_padre'])->fetch_array(MYSQLI_ASSOC);
    $acumulado_tres = number_format(($nivel_cuatro['acumulado'] + $pack_precio['costo'] * $cuatro),2,'.','');

    // nivel usuario
    if ($nivel_cuatro['arbol_nivel'] < 4){
      $update_arbol_nivel_cuatro = 4;
    }else{
      $update_arbol_nivel_cuatro = $nivel_cuatro['arbol_nivel'];
    }

    // update usuario nivel 2
    $nivel_cuatro_update = "update usuarios set acumulado = $acumulado_tres, arbol_nivel = $update_arbol_nivel_cuatro where id=".$nivel_tres['arbol_padre'];
    $conn->query($nivel_cuatro_update);

    // pase nivel dos
    if ($nivel_cuatro['id'] == $uno_level){
      $pase = 0;
    }

  }


  // NIVEL CINCO
  // *************************
  if ($pase == 1){

    // usuario nivel dos
    $nivel_cinco = $conn->query("select id,acumulado,arbol_padre,arbol_nivel from usuarios where id=".$nivel_cuatro['arbol_padre'])->fetch_array(MYSQLI_ASSOC);
    $acumulado_cinco = number_format(($nivel_cinco['acumulado'] + $pack_precio['costo'] * $cinco),2,'.','');

    // nivel usuario
    if ($nivel_cinco['arbol_nivel'] < 5){
      $update_arbol_nivel_cinco = 5;
    }else{
      $update_arbol_nivel_cinco = $nivel_cinco['arbol_nivel'];
    }

    // update usuario nivel 2
    $nivel_cinco_update = "update usuarios set acumulado = $acumulado_cinco, arbol_nivel = $update_arbol_nivel_cinco where id=".$nivel_cuatro['arbol_padre'];
    $conn->query($nivel_cinco_update);

    // pase nivel dos
    if ($nivel_cinco['id'] == $uno_level){
      $pase = 0;
    }

  }




  // NIVEL SEIS
  // *************************
  if ($pase == 1){

    // usuario nivel dos
    $nivel_seis = $conn->query("select id,acumulado,arbol_padre,arbol_nivel from usuarios where id=".$nivel_cinco['arbol_padre'])->fetch_array(MYSQLI_ASSOC);
    $acumulado_seis = number_format(($nivel_seis['acumulado'] + $pack_precio['costo'] * $seis),2,'.','');

    // nivel usuario
    if ($nivel_seis['arbol_nivel'] < 6){
      $update_arbol_nivel_seis = 6;
    }else{
      $update_arbol_nivel_seis = $nivel_seis['arbol_nivel'];
    }

    // update usuario nivel 2
    $nivel_seis_update = "update usuarios set acumulado = $acumulado_seis, arbol_nivel = $update_arbol_nivel_seis where id=".$nivel_cinco['arbol_padre'];
    $conn->query($nivel_seis_update);

    // pase nivel dos
    if ($nivel_seis['id'] == $uno_level){
      $pase = 0;
    }
  }


  // NIVEL SIETE
  // *************************
  if ($pase == 1){

    // usuario nivel dos
    $nivel_siete = $conn->query("select id,acumulado,arbol_padre,arbol_nivel from usuarios where id=".$nivel_seis['arbol_padre'])->fetch_array(MYSQLI_ASSOC);
    $acumulado_siete = number_format(($nivel_siete['acumulado'] + $pack_precio['costo'] * $siete),2,'.','');

    // nivel usuario
    if ($nivel_siete['arbol_nivel'] < 6){
      $update_arbol_nivel_siete = 6;
    }else{
      $update_arbol_nivel_siete = $nivel_siete['arbol_nivel'];
    }

    // update usuario nivel 2
    $nivel_siete_update = "update usuarios set acumulado = $acumulado_siete, arbol_nivel = $update_arbol_nivel_siete where id=".$nivel_seis['arbol_padre'];
    $conn->query($nivel_siete_update);

  }









  // si es nuevo, primer paquete
  if ($cantidad == 'si') {


    // saldo actual del patrocinador acumulado
    $sql_patrocinador = "select * from usuarios where id='$arbol_patrocinador'";
    $sql_patrocinador = $conn->query($sql_patrocinador)->fetch_array(MYSQLI_ASSOC);

    $acumulado = $sql_patrocinador['acumulado'];
    $acumulado = $acumulado + 10.00;
    $acumulado = number_format($acumulado,2,'.','');

    // suma 10 soles al patrocinador
    $update_patrocinador_10 = "update usuarios set acumulado='$acumulado'  where id='$arbol_patrocinador'";
    $conn->query($update_patrocinador_10);


    //actualiza a usuario tipuser=1, 0 es no usuario todavia
    $update_usuario_aceptado = "UPDATE usuarios set tipuser=1 WHERE id=$user_id";
    $conn->query($update_usuario_aceptado);

    // numero de hijo actualizar
    $sql_num_update =  "      
      select 
        case 
          when arbol_hijo1 = 0 and arbol_hijo2 = 0 and arbol_hijo3 = 0 and arbol_hijo4 = 0 then '1' 
          when arbol_hijo1 <> 0 and arbol_hijo2 = 0 and arbol_hijo3 = 0 and arbol_hijo4 = 0 then '2' 
              when arbol_hijo1 <> 0 and arbol_hijo2 <> 0 and arbol_hijo3 = 0 and arbol_hijo4 = 0 then '3' 
              when arbol_hijo1 <> 0 and arbol_hijo2 <> 0 and arbol_hijo3 <> 0 and arbol_hijo4 = 0 then '4' 
              end numero
      from usuarios where id='$arbol_padre'";
    $sql_num_update = $conn->query($sql_num_update)->fetch_array(MYSQLI_ASSOC);

    // asigna hijo al padre
    $update_hijo = "update usuarios set arbol_hijo".$sql_num_update['numero']."='$user_id' where id=$arbol_padre";
    $conn->query($update_hijo);

  }
  echo 'ok';

?>