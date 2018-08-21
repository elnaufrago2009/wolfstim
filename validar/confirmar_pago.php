<?php 

	// BD
	include '../conn.php';

	// paramtros get
	$id = $_GET['pedido_id'];

	// actualiza el estado del pedido paquete
	$updated = "UPDATE user_pack set estado=2 WHERE id=$id";
	mysqli_query($conn,$updated);


	$sql_usuario_primero = "select count(*) cantidad_unico from user_pack a join user_pack b on b.user_id = a.user_id where a.id=$id";
	$sql_usuario_primero = $conn->query($sql_usuario_primero)->fetch_array(MYSQLI_ASSOC);
	if ($sql_usuario_primero['cantidad_unico'] == 1) {
		// inserta hijo al padre
		$sql_padre_hijo = "select b.id,a.dni,b.arbol_hijo1,b.arbol_hijo2,b.arbol_hijo3,b.arbol_hijo4 from user_pack inner join usuarios as a on a.id = user_pack.user_id inner join usuarios as b on b.dni = a.arbol_padre where user_pack.id='$id'";
		$sql_padre_hijo = $conn->query($sql_padre_hijo)->fetch_array(MYSQLI_ASSOC);

		$dni = $sql_padre_hijo['dni'];
		$user_id = $sql_padre_hijo['id'];

		if (strlen($sql_padre_hijo['arbol_hijo1']) == 1) {        
	    $update_padre = "UPDATE usuarios SET arbol_hijo1='$dni' WHERE id=$user_id";
	  }elseif (strlen($sql_padre_hijo['arbol_hijo2']) == 1) {
	    $update_padre = "UPDATE usuarios SET arbol_hijo2='$dni' WHERE id=$user_id";
	  }elseif (strlen($sql_padre_hijo['arbol_hijo3']) == 1) {
	    $update_padre = "UPDATE usuarios SET arbol_hijo3='$dni' WHERE id=$user_id";
	  }elseif (strlen($sql_padre_hijo['arbol_hijo4']) == 1) {
	    $update_padre = "UPDATE usuarios SET arbol_hijo4='$dni' WHERE id=$user_id";
	  }
	  mysqli_query($conn, $update_padre);
	}
		
	$conn->close();
	echo 'ok';
	

?>